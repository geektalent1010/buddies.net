<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HeartsController extends Controller
{
    public function index()
    {
        $data['user'] = $user = Auth::user();

        return view('panel.hearts.index', $data);
    }
}
