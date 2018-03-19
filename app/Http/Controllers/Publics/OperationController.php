<?php

namespace App\Http\Controllers\Publics;

use App\Album;
use App\Category;
use App\CategoryAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OperationController extends Controller
{
    public function finder(){

        if(isset($_GET['name']) || isset($_GET['category'])) {

            if (isset($_GET['name'])) {

                $albums = Album::where('title', 'like', '%' . $_GET['name'] . '%')->get();

                return redirect('result/'.$_GET['name']) ->with( 'albums', $albums );

            }else if(isset($_GET['category'])) {

                $categories = Category::where('name', 'like', '%' . $_GET['category'] . '%')->pluck('id')->toArray();

                $albumsCaregories = CategoryAlbum::whereIn('category_id', $categories)->pluck('album_id')->toArray();

                $albums = Album::whereIn('id', $albumsCaregories)->get();

                return redirect('result/'.$_GET['category']) ->with( 'albums', $albums );

            }else {

                $albums = Album::all();

                return redirect('result') ->with( 'albums', $albums );
            }

        }else {

            $albums = Album::all();

            return redirect('result') ->with( 'albums', $albums );
        }

    }

    public function result($name = ""){

        $albums = Session::get('albums');

        if($albums) {

            $albums = Album::whereIn('id', $albums->pluck('id')->toArray())->paginate(16);

            $albumsArray = Album::whereIn('id', $albums->pluck('id')->toArray())->paginate(16)->toArray();


        }

        else{
            $albumsArray = Album::paginate(16)->toArray();

            $albums = Album::paginate(16);

        }

        return view('result', compact('albums', 'name', 'albumsArray'));

    }

}
