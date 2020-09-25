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

        if(strstr($request->route()->getPrefix(),"panel") && \Auth::user()->status  === 0){
            if ($request->route()->getName() == 'panel.verification.mobile' OR $request->route()->getName() == 'panel.verification.send' OR $request->route()->getName() == 'panel.verification.profile' OR $request->route()->getName() == 'panel.verification.prfile.store') {
                return $next($request);
            } else {
                return redirect()->route('panel.verification.mobile');
            }
        }elseif(strstr($request->route()->getPrefix(),"panel") && \Auth::user()->status === 1) {
            if ($request->route()->getName() == 'panel.verification.profile' OR $request->route()->getName() == 'panel.verification.prfile.store') {
                return $next($request);
            } else {
                return redirect()->route('panel.verification.profile');
            }
        }else{
            return $next($request);
        }

    }
}
