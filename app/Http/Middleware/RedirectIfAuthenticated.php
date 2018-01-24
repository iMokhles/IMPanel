<?php

namespace App\Http\Middleware;

use App\Helpers\ApiHelper;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // MultiAuthGuards


        switch ($guard) {
            case 'user':
                if (Auth::guard($guard)->check()) {
                    dd($guard);
                    return redirect(route('user.home'));
                }
            break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('admin.home'));
                }
            break;
            case 'admin_api':
                if (Auth::guard($guard)->check()) {
                    return ApiHelper::sendResponse("Authenticated", Response::HTTP_ACCEPTED);
                }
                break;
            case 'web':
                dd($guard);
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
            default:
                dd($guard);
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
        }
        return $next($request);
    }
}
