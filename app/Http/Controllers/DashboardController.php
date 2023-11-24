<?php

namespace App\Http\Controllers;

use App\Post;
use App\Job;
use App\Channel;
use App\Requests;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authUser = Auth::user();
        $otherUser = $channelInfo = null;
        $isNewRequests = false;
        $isNews = false;
        $isNewEvent = false;
        $isNewStory = false;
        $isNewTrade = false;
        $isNewDeal = false;
        $isNewJob = false;
        $channels = Channel::where('user_id', '=', $authUser->id)->where('is_connected', '=', 1)->get();
        $lastJob = Job::whereIn('type', [0, 1])->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();

        $lastStory = Post::where('type', '=', 1)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();

        $lastTrade = Post::where('type', '=', 2)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();

        $lastDeal = Post::where('type', '=', 4)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();

        $lastNews = Post::where('type', '=', 5)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();

        $lastEvent = Post::where('type', '=', 6)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        $lastRequest = Requests::where('user_id', '=', $authUser->id)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->first();
        
        if (isset($authUser->notification)) {
            if (isset($lastJob) && $lastJob->id != $authUser->notification->last_read_job_id) {
                $isNewJob = true;
            }
            if (isset($lastStory) && $lastStory->id != $authUser->notification->last_read_story_id) {
                $isNewStory = true;
            }
            if (isset($lastTrade) && $lastTrade->id != $authUser->notification->last_read_trade_id) {
                $isNewTrade = true;
            }
            if (isset($lastDeal) && $lastDeal->id != $authUser->notification->last_read_deal_id) {
                $isNewDeal = true;
            }
            if (isset($lastNews) && $lastNews->id != $authUser->notification->last_read_news_id) {
                $isNews = true;
            }
            if (isset($lastEvent) && $lastEvent->id != $authUser->notification->last_read_event_id) {
                $isNewEvent = true;
            }
            if (isset($lastRequest) && $lastRequest->id > $authUser->notification->last_read_request_id) {
                $isNewRequests = true;
            }
        } else {
            Notification::create([
                'user_id' => $authUser->id,
            ]);
            if (isset($lastJob)) {
                $isNewJob = true;
            }
            if (isset($lastStory)) {
                $isNewStory = true;
            }
            if (isset($lastTrade)) {
                $isNewTrade = true;
            }
            if (isset($lastDeal)) {
                $isNewDeal = true;
            }
            if (isset($lastNews)) {
                $isNews = true;
            }
            if (isset($lastEvent)) {
                $isNewEvent = true;
            }
            if (isset($lastRequest)) {
                $isNewRequests = true;
            }
        }
        if ($authUser->IsAdmin()) {
            return view('admin.dashboard', compact('authUser', 'isNews', 'isNewEvent'));
        }
        return view('dashboard', compact('authUser', 'otherUser', 'channelInfo', 'channels', 'isNewRequests', 'isNewJob', 'isNewTrade', 'isNewStory', 'isNewDeal', 'isNews', 'isNewEvent'));
    }
}
