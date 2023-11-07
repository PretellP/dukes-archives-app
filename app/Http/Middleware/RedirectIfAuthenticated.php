<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                switch(Auth::user()->role_id)
                {
                    case '1':
                    case '2':
                        $verifiedRoute = route('admin.dashboard.index');
                        break;
                    default:
                        $verifiedRoute = route('home.index');
                }
                return redirect($verifiedRoute);
            }
        }

        return $next($request);
    }
}
