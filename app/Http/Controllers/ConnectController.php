<?php

namespace App\Http\Controllers;

use App\Models\Buddies;
use App\Models\City;
use App\Models\Country;
use App\Models\Profile;
use App\Models\Requests;
use App\Models\SearchSettings;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ConnectController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $requests = Requests::where('user_id', '=', $authUser->id)->where('is_active', '=', 1)->get();
        $lastRequest = Requests::where('user_id', '=', $authUser->id)->where('is_active', '=', 1)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastRequest) && $lastRequest->id !== $authUser->notification->last_read_request_id) {
                $notification = $authUser->notification;
                $notification->last_read_request_id = $lastRequest->id;
                $notification->save();
            }
        } else {
            if (isset($lastRequest)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_request_id' => $lastRequest->id,
                ]);
            }
        }
        $friendIds = Buddies::where('user_id', '=', $authUser->id)->pluck('connected_user_id')->toArray();
        $searchSetting = SearchSettings::where('user_id', $authUser->id)->where('type', 0)->first();
        $users = [];
        if (isset($searchSetting)) {
            $ages = isset($searchSetting->age) ? explode(',', $searchSetting->age) : [];
            $genders = isset($searchSetting->gender) ? explode(',', $searchSetting->gender) : [];

            $users = Profile::whereHas('user', function ($query): void {
                $query->where('user_type', 0);
                $query->where('is_admin', null);
            })
                ->where(function ($query) use ($ages): void {
                    /** @var Builder $query */
                    foreach ($ages as $age) {
                        $terms = explode('-', $age);
                        $query->orWhere(function ($query) use ($terms): void {
                            $query->whereYear('birthday', '<=', date('Y') - $terms[0]);
                            $query->whereYear('birthday', '>=', date('Y') - $terms[1]);
                        });
                    }
                })
                ->where(function ($query) use ($genders, $authUser): void {
                    /** @var Builder $query */
                    foreach ($genders as $gender) {
                        $query->orWhere('gender', '=', $gender);
                        $query->where('interest_based', 'LIKE', '%' . $authUser->profile->gender . '%');
                    }
                })
                ->where(function ($query) use ($searchSetting): void {
                    /** @var Builder $query */
                    // if ($searchSetting->interest_based === 'YES') {
                    //     $interests = isset($searchSetting->categories) ? explode(",", $searchSetting->categories) : [];
                    //     foreach($interests as $interest)
                    //     {
                    //         $query->orWhere('other_interests', 'LIKE', '%'.$interest.'%');
                    //     }
                    // }

                    if ($searchSetting->distance && 'GLOBAL' !== $searchSetting->distance) {
                        $addressArray = explode(',', $searchSetting->address);
                        switch ($searchSetting->distance) {
                            case 'CITY':
                                $query->where('city', '=', $addressArray[0])
                                    ->where('state', '=', $addressArray[1])
                                    ->where('country', '=', $addressArray[2]);
                                break;
                            case 'AREA':
                                $query->where('state', '=', $addressArray[0])
                                    ->where('country', '=', $addressArray[1]);
                                break;
                            case 'COUNTRY':
                                $query->where('country', '=', $addressArray[0]);
                                break;
                            default:
                                break;
                        }
                    }
                })
                ->where('user_id', '<>', $authUser->id)
                ->whereNotIn('user_id', $friendIds)->orderBy('first_name', 'asc')->get();
        } else {
            $users = Profile::whereHas('user', function ($query): void {
                $query->where('user_type', 0);
                $query->where('is_admin', null);
            })
                ->where('user_id', '<>', $authUser->id)->whereNotIn('user_id', $friendIds)->orderBy('first_name', 'asc')->get();
        }

        return view('panel.connects.index', compact('users', 'requests'));
    }

    public function request($userId)
    {
        $data['user'] = User::find($userId);
        if ( ! isset($data['user'])) {
            return redirect()->route('connect.index');
        }

        return view('panel.connects.request', $data);
    }

    public function searchSetting()
    {
        $data['user'] = $user = Auth::user();
        $data['searchSetting'] = $setting = SearchSettings::where('user_id', $user->id)->where('type', 0)->first();
        $data['address'] = '';
        if (isset($setting) && 'GLOBAL' !== $setting->distance) {
            $addressArray = explode(',', $setting->address);
            switch ($setting->distance) {
                case 'CITY':
                    $city = $addressArray[0] ? City::find($addressArray[0])->name : '';
                    $state = $addressArray[1] ? City::find($addressArray[1])->name : '';
                    $country = $addressArray[2] ? Country::find($addressArray[2])->name : '';
                    $data['address'] = $city . ', ' . $state . ', ' . $country;
                    break;
                case 'AREA':
                    $state = $addressArray[0] ? City::find($addressArray[0])->name : '';
                    $country = $addressArray[1] ? Country::find($addressArray[1])->name : '';
                    $data['address'] = $state . ', ' . $country;
                    break;
                case 'COUNTRY':
                    $data['address'] = $addressArray[0] ? Country::find($addressArray[0])->name : '';
                    break;
                default:
                    break;
            }
        }

        return view('panel.connects.searchEngineSetting', $data);
    }

    public function addressFilter(Request $request)
    {
        $distance = $request->get('distance');
        $keyword = $request->get('keyword');
        $data = [];
        if ('CITY' === $distance) {
            $cities = City::query()
                ->where('name', 'LIKE', "%{$keyword}%")
                ->get();
            if (count($cities)) {
                foreach ($cities as $city) {
                    $name = $city->name . ', ' . $city->state->name . ', ' . $city->state->country->name;
                    $address = $city->id . ',' . $city->state->id . ',' . $city->state->country->id;
                    $data[] = ['name' => $name, 'address' => $address];
                }
            }
        } elseif ('AREA' === $distance) {
            $states = State::query()
                ->where('name', 'LIKE', "%{$keyword}%")
                ->get();
            if (count($states)) {
                foreach ($states as $state) {
                    $name = $state->name . ', ' . $state->country->name;
                    $address = $state->id . ',' . $state->country->id;
                    $data[] = ['name' => $name, 'address' => $address];
                }
            }
        } elseif ('COUNTRY' === $distance) {
            $countries = Country::query()
                ->where('name', 'LIKE', "%{$keyword}%")
                ->get();
            if (count($countries)) {
                foreach ($countries as $country) {
                    $data[] = ['name' => $country->name, 'address' => $country->id];
                }
            }
        }

        return response()->json($data);
    }

    public function filter(Request $request)
    {
        $keyword = $request->get('keyword');
        $data = Profile::whereHas('user', function ($query) use ($keyword): void {
            /** @var Builder $query */
            $query->where('is_admin', null);
            $query->where(function ($query) use ($keyword): void {
                /** @var Builder $query */
                $query->whereRaw('concat(email," ",customer_id) LIKE ?', "%{$keyword}%");
            });
        })
            ->orWhere(function ($query) use ($keyword): void {
                /** @var Builder $query */
                $query->where(function ($query) use ($keyword): void {
                    /** @var Builder $query */
                    $query->whereRaw('concat(first_name," ",last_name) LIKE ?', "{$keyword}%");
                });
            })
            ->get();

        return response()->json($data);
    }

    public function send(Request $request)
    {
        $authUser = $request->user();
        $existingRequest = Requests::where('user_id', $request->user_id)->where('requester', $authUser->id)->first();
        $friend = Buddies::where('user_id', '=', $authUser->id)->where('connected_user_id', $request->user_id)->first();
        if (isset($existingRequest)) {
            return response()->json(['error' => 'The request already has been sent.']);
        }
        if (isset($friend)) {
            return response()->json(['error' => 'You already have been connected.']);
        }
        Requests::create([
            'requester' => $authUser->id,
            'user_id' => $request->user_id,
            'context' => $request->message,
        ]);

        return response()->json(['success' => 'The request successfully send.']);
    }

    public function saveSearchSetting(Request $request)
    {
        $user = Auth::user();
        $searchSetting = SearchSettings::find($request->id);
        if (isset($searchSetting)) {
            $searchSetting->categories = $request->categories;
            $searchSetting->distance = $request->distance;
            $searchSetting->address = $request->address;
            $searchSetting->gender = $request->gender;
            $searchSetting->age = $request->age;
            $searchSetting->interest_based = $request->interest_based;
            $searchSetting->save();

            return response()->json(['success' => 'The Search Setting successfully updated', 'settingId' => $searchSetting->id]);
        }
        $searchSetting = SearchSettings::create([
            'user_id' => $user->id,
            'categories' => $request->categories,
            'distance' => $request->distance,
            'address' => $request->address,
            'gender' => $request->gender,
            'age' => $request->age,
            'interest_based' => $request->interest_based,
            'type' => $request->type,
        ]);

        return response()->json(['success' => 'The Search Setting successfully updated', 'settingId' => $searchSetting->id]);

    }
}
