<?php

namespace App\Http\Middleware;

use App\Helpers\TRKHelper;
use Closure;

class TRKMiddleware
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
        TRKHelper::updateVisitors();
        TRKHelper::updateOS();
        TRKHelper::updateBrowser();
        TRKHelper::updateReferrer();
        TRKHelper::updateCountries();
        TRKHelper::updateCities();
        TRKHelper::updateUrls();

        return $next($request);
    }
}
