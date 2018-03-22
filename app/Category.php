<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','level','father_id' ];

    protected $hidden = ["created_at", "updated_at", "father_id"];

    public function child (){

        return $this -> hasMany($this,'father_id', 'id');

    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }


}
