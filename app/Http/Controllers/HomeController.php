<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function auth(Request $request){

        $user = User::where('login', $request -> login) -> where('password', md5($request -> password)) -> with('permissions.permissionInfo') -> first();

        if($user){

                $userPermission = [];

                foreach ($user->permissions as $permission){

                    $userPermission[] = $permission->permissionInfo-> toArray();

                }
                $user -> permission = $userPermission;


            return response()->json(['status' => 'success','message' => "", 'body' => [
                'name' => $user -> name,
                'token' => $user ->remember_token,
                'permission' => $user -> permission
                ]
            ], 200);

        }else return response()->json(['status' => 'client error','message' => "wrong login or password and Fuck the laravel", 'body' => null], 404);

    }
}
