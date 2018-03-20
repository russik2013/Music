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

    public function finder($name = ''){

        $albumsArray = Album:: where('title', $name) -> orWhere('artist', $name) -> paginate(16)->toArray();

        $albums = Album:: where('title', $name) -> orWhere('artist', $name) -> paginate(16);

        return view('result', compact('albums', 'name', 'albumsArray'));

    }
/////////////////////////////////// Этот пиздец что то ищет

//    public function finder(){
//
//        if(isset($_GET['name']) || isset($_GET['category'])) { // проверка на наличие в гет запросе имени или названия категории
//
//            if (isset($_GET['name'])) { // if only name
//
//                $albums = Album::where('title', 'like', '%' . $_GET['name'] . '%')->get();
//
//                return redirect('result/'.$_GET['name']) ->with( 'albums', $albums );
//
//            }else if(isset($_GET['category'])) { // if only category
//
//                $categories = Category::where('name', 'like', '%' . $_GET['category'] . '%')->pluck('id')->toArray();
//
//                $albumsCaregories = CategoryAlbum::whereIn('category_id', $categories)->pluck('album_id')->toArray();
//
//                $albums = Album::whereIn('id', $albumsCaregories)->get();
//
//                return redirect('result/'.$_GET['category']) ->with( 'albums', $albums );
//
//            }else { // alternative
//
//                $albums = Album::all();
//
//                return redirect('result') ->with( 'albums', $albums );
//            }
//
//        }else {// alternative
//
//            $albums = Album::all();
//
//            return redirect('result') ->with( 'albums', $albums ); // redirect to result
//        }
//
//    }
//
//    public function result($name = ""){
//
//        $albums = Session::get('albums'); //become input values from finder
//
//        if($albums) { // check of isset input values from finder
//
//            $albums = Album::whereIn('id', $albums->pluck('id')->toArray())->paginate(16);
//
//            $albumsArray = Album::whereIn('id', $albums->pluck('id')->toArray())->paginate(16)->toArray();
//
//
//        }
//
//        else{
//            $albumsArray = Album::paginate(16)->toArray();
//
//            $albums = Album::paginate(16);
//
//        }
//
//        return view('result', compact('albums', 'name', 'albumsArray')); //print result albums
//
//    }

}
