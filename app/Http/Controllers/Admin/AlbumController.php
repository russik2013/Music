<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Category;
use App\CategoryAlbum;
use App\Http\Requests\AlbumRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function store(AlbumRequest $request) {

        $album = new Album();

        $album -> fill($request -> all());

        if($request -> image){

            $time = Carbon::now();

            $request->image->move('images/albums', "album_image_" . $time . '.png');

            $album -> image = "images/albums/album_image_" . $time . '.png';

        }

        if($request -> big_image){

            $time = Carbon::now();

            $request->big_image->move('images/albums', "album_big_" . $time . '.png');

            $album -> big_image = "images/albums/album_big_" . $time . '.png';

        }

        if($album -> save()) {

            $this->addCategory($request->category, $album->id);

            return response()->json(['status' => 'success', 'message' => "", 'body' => null], 200);
        }

        else return response()->json(['status' => 'server error','message' => "Fuck the laravel", 'body' => null], 404);

    }

    public function addCategory($categories, $AlbumId){

        CategoryAlbum::where('album_id', $AlbumId) -> delete();

        $insertArray = [];

        foreach ($categories as $category){

            $insertArray[] = ['album_id' => $AlbumId, 'category_id' => $category];

        }

        CategoryAlbum::insert($insertArray);

    }

    public function update(AlbumRequest $request){

        $album = Album::find($request -> id);

        if($album){

            $album -> fill($request -> all());

            if($request -> image){

                $time = Carbon::now();

                if(file_exists($album -> image))

                $request->image->move('images/albums', "album_image_" . $time . '.png');

                $album -> image = "images/albums/album_image_" . $time . '.png';

            }

            if($request -> big_image){

                $time = Carbon::now();

                if(file_exists($album -> big_image))

                $request->big_image->move('images/albums', "album_big_" . $time . '.png');

                $album -> big_image = "images/albums/album_big_" . $time . '.png';

            }

            $album -> save();

            if($request->category)
            $this->addCategory($request->category, $album->id);

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

        if(Album::all()){

            $albums = Album::with('categories.categoryName') -> get();

            foreach ($albums as $album){

                $catArray = [];

                foreach ($album->categories as $item){

                    $catArray[] = ['id' => $item ->categoryName-> id, 'name' => $item ->categoryName-> name, 'level' => $item ->categoryName->level];

                }
                $album -> category = $catArray;

            }

            return response()->json(['status' => 'success','message' => "", 'body' =>$albums], 200);

        }

        else return response()->json(['status' => 'server error','message' => "Not find user table or model and Fuck the laravel", 'body' => null], 404);

    }
}
