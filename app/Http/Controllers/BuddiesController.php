<?php

namespace App\Http\Controllers;

use App\User;
use App\Requests;
use App\Buddies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuddiesController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $requests = Requests::where('user_id', '=', $authUser->id)->where('is_active', '=', 1)->get();
        $lastRequest = Requests::where('user_id', '=', $authUser->id)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastRequest) && $lastRequest->id != $authUser->notification->last_read_request_id) {
                $notification = $authUser->notification;
                $notification->last_read_request_id = $lastRequest->id;
                $notification->save();
            }
        } else {
            if (isset($lastRequest)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_request_id' => $lastRequest->id
                ]);
            }
        }
        return view('panel.buddies.index', compact('requests'));
    }

    public function individuals()
    {
        $authUser = Auth::user();
        $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        $users = User::where('user_type', '=', 0)->whereIn('id', $friendIds)->get();
        return view('panel.buddies.individuals', compact('users'));
    }

    public function companies()
    {
        $authUser = Auth::user();
        $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        $users = User::where('user_type', '=', 1)->whereIn('id', $friendIds)->get();
        return view('panel.buddies.companies', compact('users'));
    }

    public function accept(Request $request) {       
        $requestInfo = Requests::find($request->request_id);
        Buddies::create([
            'user_id' => $requestInfo->user_id,
            'connected_user_id' => $requestInfo->requester,
        ]);
        Buddies::create([
            'user_id' => $requestInfo->requester,
            'connected_user_id' => $requestInfo->user_id,
        ]);
        $sameRequest = Requests::where('user_id', $requestInfo->requester)->where('requester', $requestInfo->user_id)->first();
        if (isset($sameRequest))
            $sameRequest->delete();
        $requestInfo->delete();

        return response()->json(['success' => 'The request successfully accepted.']);
    }

    public function remove(Request $request) {
        $friend = Buddies::where('user_id', '=', $request->user()->id)->where('connected_user_id', '=', $request->friend_id);
        $friend->delete();
        $friend = Buddies::where('connected_user_id', '=', $request->user()->id)->where('user_id', '=', $request->friend_id);
        $friend->delete();

        return response()->json(['success' => 'The friend successfully removed.']);
    }
}
