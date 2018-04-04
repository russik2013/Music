<?php

namespace App\Http\Controllers\Publics;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $musics = Album::orderBy('id', 'desc') ->take(4) -> get();

        $albumsArray = Album::orderBy('id', 'desc') ->paginate(16)->toArray();

        $albums = Album::orderBy('id', 'desc') ->paginate(16);

        $sliders = Album::orderBy('id', 'desc') ->take(3) -> get();

        return view('index', compact('musics','albumsArray', 'albums', 'sliders'));
       // return view('index');

    }
}
