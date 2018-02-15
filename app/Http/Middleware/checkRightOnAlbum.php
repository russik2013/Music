<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class checkRightOnAlbum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * Проверка прав пользователя на изменение альбомов
     *
     */
    public function handle($request, Closure $next)
    {
        if(User::where('remember_token', $request -> token) -> first() -> handleAlbum())
            return $next($request);
        else return response()->json(['status' => 'server_error','message' => "permission denied and Fuck the laravel", 'body' => null], 404);
    }
}
