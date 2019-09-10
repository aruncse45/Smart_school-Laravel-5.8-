<?php

namespace App\Http\Middleware;

use Closure;

class student_url_checking
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
        if(!empty(session('id')))
        {
        if (!session('id')){
             return redirect('/student_login_page');
           
        }
        else{
            return $next($request);
        }
    }
    }
}
