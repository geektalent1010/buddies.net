<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $authUser = $request->user();

        return view('panel.info', compact('authUser'));
    }
}
