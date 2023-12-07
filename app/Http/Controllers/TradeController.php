<?php

namespace App\Http\Controllers;

use App\Models\Buddies;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TradeController extends Controller
{
    public function index()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['trades'] = Post::where('type', '=', 2)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->get();

        $lastTrade = Post::where('type', '=', 2)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastTrade) && $lastTrade->id !== $authUser->notification->last_read_trade_id) {
                $notification = $authUser->notification;
                $notification->last_read_trade_id = $lastTrade->id;
                $notification->save();
            }
        } else {
            if (isset($lastTrade)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_trade_id' => $lastTrade->id,
                ]);
            }
        }

        return view('panel.trade.index', $data);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $data['is_me'] = $id === Auth::user()->id;
        $data['user'] = User::find($id);
        if ( ! isset($data['user'])) {
            $data['user'] = Auth::user();
        }

        return view('panel.trade.create', $data);
    }

    public function edit($id)
    {
        $data['user'] = Auth::user();
        $data['trade'] = Post::find($id);

        return view('panel.trade.edit', $data);
    }

    public function buddies()
    {
        $data['authUser'] = $authUser = Auth::user();
        $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        $data['trades'] = Post::where('type', '=', 2)->where('is_active', '=', 1)->whereIn('created_by', $friendIds)->orderBy('created_at', 'desc')->get();

        return view('panel.trade.buddies', $data);
    }

    public function mine()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['trades'] = Post::where('type', '=', 2)->where('is_active', '=', 1)->where('created_by', $authUser->id)->orderBy('created_at', 'desc')->get();

        return view('panel.trade.mine', $data);
    }
}
