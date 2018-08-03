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
        $empresa = \Session::get('_empresa');

        if (!\Session::get('_id')){
            return redirect(url('/'.$empresa->link.'/login'));
        }else if(
            \Session::has('_empresa')
            && \Session::get('_empresa')->link != $empresa->link
        ){
            return redirect(url('/'.$empresa->link.'/login'));
        }
        return $next($request);
    }
}
