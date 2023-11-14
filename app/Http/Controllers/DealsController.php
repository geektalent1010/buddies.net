<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
use App\Buddies;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DealsController extends Controller
{
    public function index()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['deals'] = Post::where('type', '=', 4)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();
        $data['trashUserIds'] = [];
        $lastDeal = Post::where('type', '=', 4)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastDeal) && $lastDeal->id != $authUser->notification->last_read_deal_id) {
                $notification = $authUser->notification;
                $notification->last_read_deal_id = $lastDeal->id;
                $notification->save();
            }
        } else {
            if (isset($lastDeal)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_deal_id' => $lastDeal->id
                ]);
            }
        }
        if (isset($data['authUser']->profile->trash_buddies)) {
            $data['trashUserIds'] = json_decode($data['authUser']->profile->trash_buddies);
        }

        return view('panel.deals.index', $data);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $data['is_me'] = $id === Auth::user()->id;
        $data['user'] = User::find($id);
        if (!isset($data['user']))
            $data['user'] = Auth::user();

        return view('panel.deals.create', $data);
    }

    public function edit($id)
    {
        $data['user'] = Auth::user();
        $data['deal'] = Post::find($id);

        return view('panel.deals.edit', $data);
    }

    public function buddies()
    {
        $data['authUser'] = $authUser = Auth::user();
        $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        $data['deals'] = Post::where('type', '=', 4)->where('is_active', '=', 1)->whereIn('created_by', $friendIds)->orderBy('created_at', 'desc')->get();

        return view('panel.deals.buddies', $data);
    }

    public function mine()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['deals'] = Post::where('type', '=', 4)->where('is_active', '=', 1)->where('created_by', $authUser->id)->orderBy('created_at', 'desc')->get();

        return view('panel.deals.mine', $data);
    }

    
}
