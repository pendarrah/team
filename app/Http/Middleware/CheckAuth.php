<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
        if(strstr($request->route()->getPrefix(),"panel") && \Auth::user()->type === 'admin'){
                return redirect()->route('dashboard.index');
        }else{
            return $next($request);
        }
    }
}
