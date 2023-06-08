<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next,$role='')
{

        $userRole = $request->user();

        if($userRole && $userRole->count() > 0)
        {
            $userRole = $userRole->role;
            $checkRole = 0;
            if($userRole == $role && $role ==1)
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role ==2)
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role ==3)
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role ==4)
            {
                $checkRole = 1;
            }
            
            if($checkRole == 1)
                return $next($request);
            else
               return abort(401);
        }
        else
        {
            return redirect('login');
        }
    }
}
