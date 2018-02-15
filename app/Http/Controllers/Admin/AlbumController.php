<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Category;
use App\Http\Requests\AlbumRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function store(AlbumRequest $request) {

        $album = new Album();

        $album -> fill($request -> all());

        $album -> image = 'image';

        if($album -> save())

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        else return response()->json(['status' => 'server error','message' => "Fuck the laravel", 'body' => null], 404);

    }

    public function update(AlbumRequest $request){

        $album = Album::find($request -> id);

        if($album){

            $album -> fill($request -> all());

            $album -> save();

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'client error','message' => "wrong album id and Fuck the laravel", 'body' => null], 404);

    }

    public function delete(Request $request){

        $album = Album::find($request -> id);

        if($album){

            $album -> delete();

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'client error','message' => "wrong album id and Fuck the laravel", 'body' => null], 404);

    }

    public function show(){
        if(Album::all())

            return response()->json(['status' => 'success','message' => "", 'body' =>Album::with('category') -> get()], 200);

        else return response()->json(['status' => 'server error','message' => "Not find user table or model and Fuck the laravel", 'body' => null], 404);

    }
}
