<?php

namespace App\Http\Middleware;

use Closure;

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
        return $next($request);
    }
}
