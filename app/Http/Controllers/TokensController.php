<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TokensController extends Controller
{
    public function index()
    {
        return view('panel.wallet.credits');
    }

    public function referrals()
    {
        $authUser = Auth::user();

        return view('panel.wallet.referrals', ['user' => $authUser]);
    }
}
