<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * Проверка польвоывтеля на принадлежность к системе
     *
     */
    public function handle($request, Closure $next)
    {
        if(User::where('remember_token', $request -> token) -> first())
            return $next($request);
        else return response()->json(['status' => 'client error','message' => "wrong token and Fuck the laravel", 'body' => null], 404);
    }
}
