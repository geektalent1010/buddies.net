<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Job;
use App\Description;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobsController extends Controller
{
    public function index()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['jobs'] = Job::with(['descriptions'])->where('is_active', '=', 1)->where('type', '=', 1)->orderBy('created_at', 'asc')->get();
        $lastJob = Job::where('type', '=', 1)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastJob) && $lastJob->id >= $authUser->notification->last_read_job_id) {
                $notification = $authUser->notification;
                $notification->last_read_job_id = $lastJob->id;
                $notification->save();
            }
        } else {
            if (isset($lastJob)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_job_id' => $lastJob->id
                ]);
            }
        }
        
        return view('panel.jobs.index', $data);
    }

    public function individuals()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['jobs'] = Job::with(['descriptions'])->where('is_active', '=', 1)->where('type', '=', 0)->orderBy('created_at', 'asc')->get();
        $lastJob = Job::where('type', '=', 0)->where('is_active', '=', 1)->where('created_by', '!=', $authUser->id)->orderBy('created_at', 'desc')->first();
        if (isset($authUser->notification)) {
            if (isset($lastJob) && $lastJob->id >= $authUser->notification->last_read_job_id) {
                $notification = $authUser->notification;
                $notification->last_read_job_id = $lastJob->id;
                $notification->save();
            }
        } else {
            if (isset($lastJob)) {
                Notification::create([
                    'user_id' => $authUser->id,
                    'last_read_job_id' => $lastJob->id
                ]);
            }
        }
      
        return view('panel.jobs.individuals', $data);
    }

    public function mine()
    {
        $data['authUser'] = $authUser = Auth::user();
        $data['jobs'] = Job::with(['descriptions'])->where('is_active', '=', 1)->where('created_by', $authUser->id)->orderBy('created_at', 'asc')->get();

        return view('panel.jobs.mine', $data);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $data['is_me'] = $id === Auth::user()->id;
        $data['user'] = User::find($id);
        if (!isset($data['user']))
            $data['user'] = Auth::user();

        return view('panel.jobs.create', $data);
    }

    public function edit($id)
    {
        $data['user'] = Auth::user();
        $data['job'] = Job::with(['descriptions'])->find($id);

        return view('panel.jobs.edit', $data);
    }

    public function store(Request $request) {
      $user = Auth::user();
      $job = Job::create([
        'created_by' => $user->id,
        'title' => $request->title,
        'about_us' => $request->about_us,
        'qualifications' => $request->qualifications,
        'skills' => $request->skills,
        'offer' => $request->offer,
        'closing_text' => $request->closing_text,
        'type' => $request->type
      ]);
      $description = Description::create([
        'job_id' => $job->id,
        'hours' => $request->hours,
        'employees' => $request->employees,
        'category' => $request->category,
        'area' => $request->area
      ]);

      return response()->json(['success' => 'Job successfully uploaded']);
    }
  
    public function delete(Request $request)
    {
      $job = Job::find($request->id);
      $job->delete();
      return response()->json(['success' => 'Job Successfully Deleted']);
    }
  
    public function likes(Request $request) {
      $authUserId = Auth::user()->id;
      $job = Job::find($request->id);
      $followers = [];
      $like = true;
      if ($job->followers && count(explode(',', $job->followers)) > 0) {
        $followers = explode(',', $job->followers);
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
      $job->followers = implode(",", $followers);
      $job->save();
      return response()->json(['like' => $like, 'followers' => count($followers)]);
    }
  
    public function update(Request $request) {
      $user = Auth::user();
      $job = Job::find($request->id);
      $description = Description::where('job_id', '=', $job->id)->first();
      
      $job->title = $request->title;
      $job->about_us = $request->about_us;
      $job->qualifications = $request->qualifications;
      $job->skills = $request->skills;
      $job->offer = $request->offer;
      $job->closing_text = $request->closing_text;
      $job->save();
      
      $description->hours = $request->hours;
      $description->employees = $request->employees;
      $description->category = $request->category;
      $description->area = $request->area;
      $description->save();
  
      return response()->json(['success' => 'Job successfully updated']);
    }
}
