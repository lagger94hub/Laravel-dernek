<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_roles = Auth::user()->roles->pluck('name');
        if (!$user_roles->contains('admin')) {
            return redirect(route('adminLogIn'))->with('error', 'You dont have permission');
        }
        return $next($request);
    }
}
