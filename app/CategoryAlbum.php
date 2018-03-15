<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryAlbum extends Model
{

    protected $fillable = ['album_id', 'category_id'];
    protected $hidden =["created_at", "updated_at"];

    public function categoryName(){

        return $this->hasOne('App\Category','id', 'category_id');

    }
}
