<?php

namespace App\Http\Middleware;

use Closure;

class teacher_url_checking
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
        if (!$request->session()->has('t_id')) {
             return redirect('/teacher_login_page');
           
        }
        else{
            return $next($request);
        }
    }
}
