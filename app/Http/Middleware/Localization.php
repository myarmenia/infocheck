<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $segment_one = $request->segment(1);
        if (array_key_exists($segment_one, config('app.locales'))) {
            app()->setLocale($request->segment(1));
        }
        return $next($request);
    }
}
