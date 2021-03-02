<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $user = Auth::user()->role;

       
        if(Auth::check() && $user == 1 || $user == 2 || $user == 3 ){
        
        return $next($request);
        
        }
        else {
                return redirect()->route('error404');
            }
    }
}
