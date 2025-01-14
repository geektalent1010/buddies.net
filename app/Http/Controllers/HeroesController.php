<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HeroesController extends Controller
{
    public function index()
    {
        $data['authUser'] = Auth::user();
        $topHeroes = User::withCount('referrals') // Count the number of referrals
            ->has('referrals')
            ->where(function ($query): void {
                $query->where('is_admin', '!=', 1)
                    ->orWhereNull('is_admin');
            })
            ->orderByDesc('referrals_count') // Order by the number of referrals in descending order
            ->limit(10)
            ->get();
        $data['heroes'] = $topHeroes;

        return view('panel.heroes.index', $data);
    }
}
