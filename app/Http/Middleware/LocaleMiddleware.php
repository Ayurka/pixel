<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class LocaleMiddleware
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
        if (session()->has('locale') && array_key_exists(session()->get('locale'), config('locale.languages'))) {

            app()->setLocale(session()->get('locale'));

            setlocale(LC_TIME, config('locale.languages')[session()->get('locale')][1]);

            Carbon::setLocale(config('locale.languages')[session()->get('locale')][0]);

            if (config('locale.languages')[session()->get('locale')][2]) {
                session(['lang-rtl' => true]);
            } else {
                session()->forget('lang-rtl');
            }
        }
        return $next($request);
    }
}
