<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //读取session 因为登录后具有以下 session 中的一种
        $individual = DB::table('individual')->where('email', session()->get('email'))->first();
        $client = DB::table('client')->where('email', session()->get('email'))->first();
        $sp = DB::table('service_provider')->where('email', session()->get('email'))->first();

        //读取请求的地址，return cliens || inidvidual || sp
        $path = explode('/',$request->path())[0];

        if ($sp || $individual || $client) {
            return $next($request);
        } else {
            switch($path){
                case "individual":
                    return redirect('individual/login')->withErrors('请重新登录');
                    break;
                case "clients":
                    return redirect("clients/login")->withErrors("请重新登录");
                    break;
                case "sp";
                    return redirect("sp/login")->withErrors("请重新登录");
                    break;
                default:
                    return redirect('individual/login')->withErrors('请重新登录');
            }
        }
    }
}
