<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() && (auth()->user()->role == 'staff' || auth()->user()->role == 'admin') ){
            return $next($request);
        }else{
            abort(403, 'Only for Staff');
        }
        
        
        
    }
}
