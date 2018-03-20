<?php

namespace App\Http\Controllers\Publics;

use App\Album;
use App\Category;
use App\CategoryAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categoryFilter($view){

        $levels = [];

        $category_max_lvl = Category::max('level');

        for ($i = 1; $i <= $category_max_lvl ; $i++){

            $levels[] = str_repeat("child.", $i);

        }

        for ($j = 0; $j < count($levels); $j++){

            $new = explode('.',$levels[$j]);

            unset($new[count($new) - 1]);

            $levels[$j] = implode('.',$new);

        }

        $categories = Category::with($levels) -> where('father_id','=',null)->get();


        $view->with('categories', $categories);

    }

    public function show($id){

        $levels = [];

        $category_max_lvl = Category::max('level');

        for ($i = 1; $i <= $category_max_lvl ; $i++){

            $levels[] = str_repeat("child.", $i);

        }

        for ($j = 0; $j < count($levels); $j++){

            $new = explode('.',$levels[$j]);

            unset($new[count($new) - 1]);

            $levels[$j] = implode('.',$new);

        }

        $categories = Category::with($levels) -> where('id','=',$id)->first();

        $categoriesIds = [];
        $categoriesIds[] = $categories -> id;

        foreach ($categories -> child as $category){

            $categoriesIds[] = $category -> id;

            if($category -> child -> count() > 0){

                foreach ($category -> child as $item){

                    $categoriesIds[] = $item -> id;

                }

            }

        }

        $CategoryAlbum = CategoryAlbum::whereIn('category_id', $categoriesIds) -> distinct() ->pluck('album_id') -> toArray();

        $albumsArray = Album::whereIn('id', $CategoryAlbum) -> paginate(16)->toArray();

        $albums = Album::whereIn('id', $CategoryAlbum) -> paginate(16);

        $name = $categories -> name;

        return view('result', compact('albums', 'name', 'albumsArray'));

    }
}
