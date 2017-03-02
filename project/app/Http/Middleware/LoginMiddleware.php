<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        $ip = $request->ip();
        file_put_contents('ip.log', $ip, FILE_APPEND);

        $uid = session('gid');
        //判断有没有登录
        if ($uid) {
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
