<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class HomeMiddleware
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
        $res = DB::table('conf')->first();

        //查看见面此时开关状态
        $open = $res->open;
      
        if($open){

             return $next($request);

        } else {

            return redirect('404');

        }
    }
}
