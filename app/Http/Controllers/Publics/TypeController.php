<?php

namespace App\Http\Controllers\Publics;

use App\Album;
use App\Type;
use App\TypeAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function show($id){

        $type = Type::find($id);

        if($type) {

            $typeAlbumIds = TypeAlbum::where('type_id', $id)->pluck('album_id')->toArray();

            $albumsArray = Album::whereIn('id', $typeAlbumIds)->paginate(16)->toArray();

            $albums = Album::whereIn('id', $typeAlbumIds)->paginate(16);

            $name = $type -> name;

            return view('result', compact('albums', 'name', 'albumsArray'));

        }else{

            $error = true;

            return view('result', compact('error')) ;

        }

    }
}
