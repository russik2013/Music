<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title','artist','image','year_of_release','tracklist','description','label','genre','quality','total_time',
        'total_size','download_link','show_in_slider','big_image'
    ];


    public function category(){

        return $this->hasMany('App\CategoryAlbum','album_id', 'id');

    }

}
