<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class checkRightOnAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * Проверка прав пользователя на изменение администраторов
     *
     */
    public function handle($request, Closure $next)
    {
        if(User::where('remember_token', $request -> token) -> first() -> handleAdmin())
            return $next($request);
        else return response()->json(['status' => 'server_error','message' => "permission denied and Fuck the laravel", 'body' => null], 404);
    }
}
