<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = ['user_id', 'permission_id'];

    public function permissionInfo(){

        return $this->hasOne('App\Permission', 'id', 'permission_id');

    }
}
