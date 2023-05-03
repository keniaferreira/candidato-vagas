<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Session;

class CheckUsuarioLogado
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
        if ( !\Session::has(\App\Config::NOME_SESSAO) ){
            return redirect('/');  
        }
        return $next($request);
    }
}
