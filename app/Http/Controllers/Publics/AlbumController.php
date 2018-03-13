<?php

namespace App\Http\Controllers\Publics;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function finderName(){

        $album = Album::where('title','album name')->paginate(15);

    }

    public function category(){



    }
}
