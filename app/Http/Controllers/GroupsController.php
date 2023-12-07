<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Invite;
use App\Models\Member;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client;

class GroupsController extends Controller
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(config('app.TWILIO_AUTH_SID'), config('app.TWILIO_AUTH_TOKEN'));
    }

    public function index()
    {
        $authUser = Auth::user();
        $groups = Group::where('user_id', '=', $authUser->id)->get();

        return view('panel.groups.own', compact('groups', 'authUser'));
    }

    public function show()
    {
        $id = Auth::user()->id;
        $data['is_me'] = $id === Auth::user()->id;
        $data['user'] = User::find($id);
        if ( ! isset($data['user'])) {
            $data['user'] = Auth::user();
        }

        return view('panel.groups.create', $data);
    }

    public function edit($groupId)
    {
        $id = Auth::user()->id;
        $data['user'] = Auth::user();
        $data['users'] = User::where('id', '<>', $id)
            ->where('is_admin', null)
            ->get();
        // $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        // $data['users'] = User::where('user_type', '=', 0)->whereIn('id', $friendIds)->get();
        $data['group'] = Group::find($groupId);
        if ( ! isset($data['group'])) {
            return redirect()->route('group.create.index')->with('error', 'Group is not exist');
        }
        $data['members'] = $data['group']->members->where('is_banned', '<>', 1)->pluck('user_id')->toArray();

        return view('panel.groups.edit', $data);
    }

    public function showOwnGroups()
    {
        $authUser = Auth::user();
        $groups = Group::where('user_id', '=', $authUser->id)->get();

        return view('panel.groups.ownGroups', compact('groups', 'authUser'));
    }

    public function showFriendsGroups()
    {
        $authUser = Auth::user();
        $invites = Invite::where('user_id', '=', $authUser->id)->where('is_active', '=', 1)->get();
        $members = Member::whereHas('group', function ($query) use ($authUser): void {
            $query->where('user_id', '<>', $authUser->id);
        })
            ->where('user_id', $authUser->id)->where('is_banned', '<>', 1)->get();

        return view('panel.groups.friends', compact('members', 'invites', 'authUser'));
    }

    public function chat($id)
    {
        $authUser = Auth::user();

        $channelInfo = null;
        if ( ! $id) {
            $channelInfo = Group::where('user_id', '=', $authUser->id)->first();
        } else {
            $channelInfo = Group::find($id);
        }

        if ( ! isset($channelInfo)) {
            return redirect()->route('groups.index');
        }
        $data['channelInfo'] = $channelInfo;

        $twilio = new Client(config('app.TWILIO_AUTH_SID'), config('app.TWILIO_AUTH_TOKEN'));

        try {
            $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels($channelInfo->channel_unique_name)
                ->members($authUser->username)
                ->fetch();

        } catch (RestException $e) {
            $member = $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels($channelInfo->channel_unique_name)
                ->members
                ->create($authUser->username);
        }

        return view('panel.groups.chat', $data);
    }

    public function createGroupChatRoom(Request $request)
    {
        $authUser = Auth::user();
        $currentDateTime = new DateTime();
        $currentDateTime = $currentDateTime->getTimestamp();
        $uniqueName = 'group_chatroom_' . $authUser->id . '_' . $currentDateTime . uniqid();

        $groupInfo = Group::where('channel_unique_name', '=', $uniqueName)->first();

        $twilio = new Client(config('app.TWILIO_AUTH_SID'), config('app.TWILIO_AUTH_TOKEN'));

        if (isset($groupInfo)) {
            try {
                $channel = $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($uniqueName)
                    ->fetch();
            } catch (RestException $e) {
                $channel = $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels
                    ->create([
                        'friendlyName' => $uniqueName,
                        'uniqueName' => $uniqueName,
                        'createdBy' => $authUser->username,
                    ]);
            }

            // Add Admin user to the channel
            try {
                $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($channel->sid)
                    ->members($authUser->username)
                    ->fetch();

            } catch (RestException $e) {
                $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($channel->sid)
                    ->members
                    ->create($authUser->username, [
                        'roleSid' => config('app.MIX_CHANNEL_ADMIN_ROLE_SID'),
                    ]);
            }

            return response()->json(['status' => true, 'exist' => true]);
        }
        $logo = $request->file('logo');
        $filename = null;
        if (isset($logo)) {
            if ( ! file_exists(base_path() . '/public/uploads/groups')) {
                mkdir(base_path() . '/public/uploads/groups', 0777, true);
            }
            $currentDateTime = new DateTime();
            $currentDateTime = $currentDateTime->getTimestamp();
            $filename = $currentDateTime . uniqid() . '.jpg';
            $logo->move(base_path() . '/public/uploads/groups', $filename);
        }
        $group = Group::create([
            'user_id' => $authUser->id,
            'channel_unique_name' => $uniqueName,
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $filename,
        ]);

        Member::create([
            'group_id' => $group->id,
            'user_id' => $authUser->id,
        ]);

        // Fetch channel or create a new one if it doesn't exist
        try {
            $channel = $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels($uniqueName)
                ->fetch();
        } catch (RestException $e) {
            $channel = $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels
                ->create([
                    'friendlyName' => $uniqueName,
                    'uniqueName' => $uniqueName,
                    'createdBy' => $authUser->username,
                ]);
        }

        // Add Admin user to the channel
        try {
            $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels($channel->sid)
                ->members($authUser->username)
                ->fetch();

        } catch (RestException $e) {
            $twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels($channel->sid)
                ->members
                ->create($authUser->username, [
                    'roleSid' => config('app.MIX_CHANNEL_ADMIN_ROLE_SID'),
                ]);
        }

        return response()->json(['status' => true, 'exist' => false]);

    }

    public function updateGroupInfo(Request $request)
    {
        $group = Group::find($request->groupId);
        $logo = $request->file('logo');
        if (isset($logo)) {
            if ( ! file_exists(base_path() . '/public/uploads/groups')) {
                mkdir(base_path() . '/public/uploads/groups', 0777, true);
            }
            $currentDateTime = new DateTime();
            $currentDateTime = $currentDateTime->getTimestamp();
            $filename = $group->logo ?? $currentDateTime . uniqid() . '.jpg';
            $filename = $currentDateTime . uniqid() . '.jpg';
            $logo->move(base_path() . '/public/uploads/groups', $filename);
            $group->logo = $filename;
        }
        if ('true' === $request->removeLogo) {
            if ($group->logo && file_exists(base_path() . '/public/uploads/groups/' . $group->logo)) {
                unlink(base_path() . '/public/uploads/groups/' . $group->logo);
            }
            $group->logo = null;
        }
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return response()->json(['status' => true]);
    }

    public function ban(Request $request)
    {
        $member = Member::where('group_id', '=', $request->groupId)->where('user_id', '=', $request->userId)->first();
        if (isset($member)) {
            $requestInfo = Invite::where('member_id', '=', $member->id)->where('user_id', '=', $request->userId)->first();
            if (isset($requestInfo)) {
                $requestInfo->delete();
            }

            $member->is_banned = 1;
            $member->save();
        } else {
            return response()->json(['status' => false, 'message' => 'Member is not exist']);
        }
        $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
            ->channels($member->group->channel_unique_name)
            ->members($member->user->username)
            ->update([
                'roleSid' => config('app.MIX_CHANNEL_BANNED_ROLE_SID'),
            ]);

        return response()->json(['status' => true, 'message' => 'Member banned']);
    }

    public function unban(Request $request)
    {
        $user = User::find($request->userId);
        $member = Member::where('group_id', '=', $request->groupId)->where('user_id', '=', $request->userId)->first();
        if (isset($member)) {
            // $member->is_banned = 0;
            // $member->save();
            Invite::create([
                'requester' => $request->user()->id,
                'user_id' => $request->userId,
                'member_id' => $member->id,
            ]);

            $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                ->channels($member->group->channel_unique_name)
                ->members($user->username)
                ->update([
                    'roleSid' => config('app.MIX_CHANNEL_MEMBER_ROLE_SID'),
                ]);
        } else {
            $group = Group::find($request->groupId);
            $member = Member::create([
                'group_id' => $request->groupId,
                'user_id' => $request->userId,
                'is_banned' => 1,
            ]);
            Invite::create([
                'requester' => $request->user()->id,
                'user_id' => $request->userId,
                'member_id' => $member->id,
            ]);

            try {
                $channel = $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($group->channel_unique_name)
                    ->fetch();
            } catch (RestException $e) {
                $channel = $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels
                    ->create([
                        'friendlyName' => $group->channel_unique_name,
                        'uniqueName' => $group->channel_unique_name,
                        'createdBy' => $user->username,
                    ]);
            }

            // Add Admin user to the channel
            try {
                $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($channel->sid)
                    ->members($user->username)
                    ->fetch();

            } catch (RestException $e) {
                $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($channel->sid)
                    ->members
                    ->create($user->username, [
                        'roleSid' => config('app.MIX_CHANNEL_MEMBER_ROLE_SID'),
                    ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Member unbanned',
        ]);
    }

    public function accept(Request $request)
    {
        $requestInfo = Invite::find($request->request_id);
        if (isset($requestInfo)) {
            $member = $requestInfo->inviteMember;
            if (isset($member)) {
                $member->is_banned = 0;
                $member->save();

                $this->twilio->chat->v2->services(config('app.TWILIO_SERVICE_SID'))
                    ->channels($member->group->channel_unique_name)
                    ->members($requestInfo->user->username)
                    ->update([
                        'roleSid' => config('app.MIX_CHANNEL_MEMBER_ROLE_SID'),
                    ]);
            } else {
                return response()->json(['status' => false, 'message' => 'Member is not exist']);
            }
            $requestInfo->delete();

            return response()->json(['status' => true, 'message' => 'The request successfully accepted.']);
        }

        return response()->json(['status' => false, 'message' => 'Member is not exist']);
    }

    public function delete(Request $request)
    {
        $group = Group::find($request->id);
        $group->delete();

        return response()->json(['success' => 'Group Successfully Deleted']);
    }
}
