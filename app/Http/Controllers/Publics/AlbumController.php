<?php

namespace App\Http\Controllers\Publics;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function one($id)
    {

        $album = Album::with('categories.categoryName', 'types.typeName') -> find($id);

        if ($album) {


            return view('music', compact('album'));


        }

        else{

            $error = 'Альбюом не найден';

            return view('music', compact('error'));
        }

    }
}
