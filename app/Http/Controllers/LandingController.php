<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }

        return view('home');
    }

    public function landing()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }

        return view('landing');
    }
}
