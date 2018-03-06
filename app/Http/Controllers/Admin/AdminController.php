<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\User;
use App\UserPermission;
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

            $this->setPermissions($request ->permission, $user -> id);

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'server error','message' => "Fuck the laravel", 'body' => null], 404);

    }

    public function read(){

        $users = User::with('permissions.permissionInfo') -> get();

        if($users) {

            foreach ($users as $user){

                $userPermission = [];

                foreach ($user->permissions as $permission){

                    $userPermission[] = $permission->permissionInfo-> toArray();

                }

                $user -> permission = $userPermission;
            }

            return response()->json(['status' => 'success', 'message' => "", 'body' => $users], 200);
        }

        else return response()->json(['status' => 'server error','message' => "Not find user table or model and Fuck the laravel", 'body' => null], 404);
    }

    public function update(AdminRequest $request){

        $user = User::find($request -> id);

        if($user){

            $user -> fill($request -> all());

            if($request -> password)

                $user -> password = md5($request -> password);

            $user -> save();

            $this->setPermissions($request ->permission, $user -> id);

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

    public function setPermissions($permissions, $userId){

        if($permissions) {

            UserPermission::where('user_id', $userId) -> delete();

            foreach ($permissions as $permission) {

                UserPermission::created(['user_id' => $userId, 'permission_id' => $permission]);

            }
        }

    }
}
