<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title','artist','image','year_of_release','tracklist','description','label','genre','quality','total_time',
        'total_size','download_link','show_in_slider','big_image'
    ];

    protected $hidden = ['categories', 'types'];

    public function categories(){

        return $this->hasMany('App\CategoryAlbum','album_id', 'id');

    }

    public function types(){

        return $this->hasMany('App\TypeAlbum','album_id', 'id');

    }

}
