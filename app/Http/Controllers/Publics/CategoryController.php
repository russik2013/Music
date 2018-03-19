<?php

namespace App\Http\Controllers\Publics;

use App\Category;
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

    public function categories($view){



    }
}
