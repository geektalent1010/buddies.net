<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $authUser = $request->user();

        return view('panel.info', compact('authUser'));
    }
}
