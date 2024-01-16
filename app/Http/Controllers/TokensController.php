<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TokensController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();

        return view('panel.wallet.credits', ['user' => $authUser]);
    }

    public function referrals()
    {
        $authUser = Auth::user();

        return view('panel.wallet.referrals', ['user' => $authUser]);
    }
}
