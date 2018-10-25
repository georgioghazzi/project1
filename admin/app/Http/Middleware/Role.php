<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
            
        if(auth::user()->user_type === "")
        {
            return redirect()->route('admin.forbiden');
        }
        
        
        if(is_Array($roles))
        {
            foreach($roles as $role)
            {
                if  (auth::user()->user_type === $role)
       {
        return $next($request);
       }
            }
        }

       if  (auth::user()->user_type === $roles)
       {
        return $next($request);
       }
       return redirect()->route('admin.forbiden');
    }
}
