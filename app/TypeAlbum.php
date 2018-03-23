<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAlbum extends Model
{
    protected $fillable = ['album_id', 'type_id'];
    protected $hidden =["created_at", "updated_at"];
    public function typeName(){

        return $this->hasOne('App\Type','id', 'type_id');

    }
}
