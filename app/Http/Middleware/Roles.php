<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        foreach ($roles as $role) {
            if ($this->checkRole($role)) {
                //At least one role passes
                return $next($request);
            }
        }

        return redirect()->route('dashboard')->with('error', 'You cannot access this page');
    }

    private function checkRole($role)
    {
        switch ($role) {
            case 'individual': return Auth::user()->isIndividual();
            case 'company': return Auth::user()->isCompany();
            case 'admin': return Auth::user()->isAdmin();
        }

        return false;
    }
}
