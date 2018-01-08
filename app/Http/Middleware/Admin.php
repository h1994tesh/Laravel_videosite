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
        //var_dump(Auth::check());die;
        if(Auth::check()){
            return redirect('users/login');
            die('ddddd');
        }else{
            $user = Auth::user();
//            var_dump($user); die;
            if($user->hasRole('Admin')){
                die('eeee');
            }else{
//                return redirect('/');
                die('sdfsdf');
            }
        }
        return $next($request);
    }
}
