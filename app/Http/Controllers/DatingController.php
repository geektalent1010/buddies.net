<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DatingController extends Controller
{
    //
    public function index()
    {
        return view('panel.dating');
    }
}
