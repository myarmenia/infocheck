<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // for logout is status == 0

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (! $request->user()->hasRole($roles)) {
            return redirect()->route('register');
            // դժվար էլ լինի սրա կարիքը, լռությամբ բոլորը ստանում են role=i_user
        }
        /* User-STATUS --- does he active or not */
        if ( $request->user()->status !== 1) {
            Auth::logout();
            return redirect()->route('login')->with('blocked_msg', 'you are blocked');
        }


        return $next($request);
    }
}
