<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null)
    {
        // dd(Auth::guard('siswa')->check());
        if (Auth::guard($guard)->check()) {
            return $this->redirectTo();
        }
        // dd($next($request));
        return $next($request);
    }
    
    public function redirectTo()
    {
        $user= Auth::user();
        switch($user->role) {
            case 'siswa': 
                return redirect("/siswa");
            case 'guru':
                return redirect('/guru');
            case 'admin': 
                return redirect('/admin');
        }   
    }
}
