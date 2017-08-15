<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $segments = $request->segments();
        $empresa = $segments[0];

        if (!$request->session()->has('_id')
            ){
            return redirect(url('/'.$empresa.'/login'));
        }else if($request->session()->has('_empresa')
                && $request->session()->get('_empresa') != $empresa){
            return redirect(url('/'.$empresa.'/login'));
        }
        return $next($request);
    }
}
