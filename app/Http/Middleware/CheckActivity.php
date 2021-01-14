<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon, Auth;

class CheckActivity
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
        
        if(Auth::check()){
            $last_activity_at = Carbon::parse(Auth::user()->last_activity_at);
            $now = Carbon::now();
            $diff = $last_activity_at->diffInSeconds($now);
            
            if($diff >= 50){
                Auth::logout();
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
