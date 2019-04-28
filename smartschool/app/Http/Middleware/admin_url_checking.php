<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class admin_url_checking
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
        if (Auth::Check()) {
            return $next($request);
        }
        else{
            return redirect('/admin/login');
        }
    }
}
