<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
use App\Buddies;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StoriesController extends Controller
{
    public function index()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['stories'] = Post::where('type', '=', 1)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();

        $lastStory = Post::where('type', '=', 1)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastStory) && $lastStory->id != $authUser->notification->last_read_story_id) {
                $notification = $authUser->notification;
                $notification->last_read_story_id = $lastStory->id;
                $notification->save();
            }
        } else {
            if (isset($lastStory)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_story_id' => $lastStory->id
                ]);
            }
        }

        return view('panel.stories.index', $data);
    }
    
    public function buddies()
    {
        $data['authUser'] = $authUser = Auth::user();
        $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        $data['stories'] = Post::where('type', '=', 1)->where('is_active', '=', 1)->whereIn('created_by', $friendIds)->orderBy('created_at', 'desc')->get();

        return view('panel.stories.buddies', $data);
    }

    public function mine()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['stories'] = Post::where('type', '=', 1)->where('is_active', '=', 1)->where('created_by', $authUser->id)->orderBy('created_at', 'desc')->get();

        return view('panel.stories.mine', $data);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $data['is_me'] = $id === Auth::user()->id;
        $data['user'] = User::find($id);
        if (!isset($data['user']))
            $data['user'] = Auth::user();

        return view('panel.stories.create', $data);
    }

    public function edit($id)
    {
        $data['user'] = Auth::user();
        $data['story'] = Post::find($id);

        return view('panel.stories.edit', $data);
    }
}
