<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function index()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['posts'] = Post::where('type', '=', 6)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();
        $lastEvent = Post::where('type', '=', 6)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastEvent) && $lastEvent->id != $authUser->notification->last_read_event_id) {
                $notification = $authUser->notification;
                $notification->last_read_event_id = $lastEvent->id;
                $notification->save();
            }
        } else {
            if (isset($lastEvent)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_event_id' => $lastEvent->id
                ]);
            }
        }

        return view('panel.events.index', $data);
    }

    public function mine()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['posts'] = Post::where('type', '=', 6)->where('is_active', '=', 1)->where('created_by', $authUser->id)->orderBy('created_at', 'desc')->get();

        return view('panel.events.mine', $data);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $data['is_me'] = $id === Auth::user()->id;
        $data['user'] = User::find($id);
        if (!isset($data['user']))
            $data['user'] = Auth::user();

        return view('panel.events.create', $data);
    }

    public function edit($id)
    {
        $data['user'] = Auth::user();
        $data['post'] = Post::find($id);

        return view('panel.events.edit', $data);
    }
}
