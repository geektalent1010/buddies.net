<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Buddies;
use App\Requests;
use App\SearchSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CompaniesController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $searchSetting = SearchSettings::where('user_id', $authUser->id)->where('type', 1)->first();
        $companies = [];
        if (isset($searchSetting)) {
            $companies = Profile::whereHas('user', function($query) {
                    $query->where('user_type', 1);
                    $query->where('is_admin', null);
                })
                ->where(function ($query) use ($searchSetting) {
                    /** @var Builder $query */
                    $categories = isset($searchSetting->categories) ? explode(",", $searchSetting->categories) : [];
                    foreach($categories as $category)
                    {
                        $query->orWhere('main_interests', 'LIKE', '%'.$category.'%');
                    }
                })
                ->where('user_id', '<>', $authUser->id)
                ->orderBy('first_name', 'asc')
                ->get();
        } else {
            $companies = Profile::whereHas('user', function($query) {
                    $query->where('user_type', 1);
                    $query->where('is_admin', null);
                })
                ->where('user_id', '<>', $authUser->id)
                ->orderBy('first_name', 'asc')
                ->get();
        }

        return view('panel.companies.index', compact('companies', 'authUser'));
    }

    public function searchSetting()
    {
        $data['user'] = $user = Auth::user();
        $data['searchSetting'] = SearchSettings::where('user_id', $user->id)->where('type', 1)->first();

        return view('panel.companies.searchSetting', $data);
    }

    public function filter(Request $request)
    {
        $data = User::query()
            ->where('is_admin', null)
            ->when($keyword = $request->get('keyword'), function ($query) use ($keyword) {
                /** @var Builder $query */
                $query->where(function ($query) use ($keyword) {
                    /** @var Builder $query */
                    $query->whereRaw('name LIKE ?', "{$keyword}%");
                });
            })
            ->get();

        return response()->json($data);
    }

    public function likes(Request $request) {
        $authUserId = Auth::user()->id;
        $profile = Profile::find($request->id);
        $followers = [];
        $like = true;
        if ($profile->followers && count(explode(',', $profile->followers)) > 0) {
            $followers = explode(',', $profile->followers);
            if (in_array($authUserId, $followers)) {
                $index = array_search($authUserId, $followers);
                array_splice($followers, $index, 1);
                $like = false;
            } else {
                array_push($followers, $authUserId);
            }
        } else {
            array_push($followers, $authUserId);
        }
        if ($like) {
            Buddies::create([
                'user_id' => $authUserId,
                'connected_user_id' => $profile->user_id,
            ]);
            Buddies::create([
                'user_id' => $profile->user_id,
                'connected_user_id' => $authUserId,
            ]);

            $requestInfo = Requests::where('user_id', $profile->user_id)->where('requester', $authUserId)->first();
            if (isset($requestInfo)) $requestInfo->delete();
            $requestInfo = Requests::where('user_id', $authUserId)->where('requester', $profile->user_id)->first();
            if (isset($requestInfo)) $requestInfo->delete();
        } else {
            $friend = Buddies::where('user_id', '=', $authUserId)->where('connected_user_id', '=', $profile->user_id);
            if ($friend) $friend->delete();
            $friend = Buddies::where('connected_user_id', '=', $authUserId)->where('user_id', '=', $profile->user_id);
            if ($friend) $friend->delete();
        }
        $profile->followers = implode(",", $followers);
        $profile->save();
        return response()->json(['like' => $like, 'followers' => count($followers)]);
    }
}
