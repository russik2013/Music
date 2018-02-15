<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function store(AdminRequest $request){

        $user = new User();
        $user -> fill($request ->all());
        //$user -> email = $request -> login;
        $user -> password = md5($request -> password);
        $user -> remember_token = str_random(32);
        if($user -> save()){

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'server error','message' => "Fuck the laravel", 'body' => null], 404);

    }

    public function read(){

        if(User::all())

            return response()->json(['status' => 'success','message' => "", 'body' =>User::all()], 200);

        else return response()->json(['status' => 'server error','message' => "Not find user table or model and Fuck the laravel", 'body' => null], 404);
    }

    public function update(AdminRequest $request){

        $user = User::find($request -> id);

        if($user){

            $user -> fill($request -> all());

            if($request -> password)
                $user -> password = md5($request -> password);

            $user -> save();

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'client error','message' => "wrong user id and Fuck the laravel", 'body' => null], 404);

    }
    public function delete(Request $request){

        $user = User::find($request -> id);

        if($user){

            $user -> delete();

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'client error','message' => "wrong user id and Fuck the laravel", 'body' => null], 404);

    }
}
