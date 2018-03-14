<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request){

        $category = new Category();

        $category -> fill($request -> all());

        if($category -> save()){

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'server error','message' => "Fuck the laravel", 'body' => null], 404);

    }

    public function update(CategoryRequest $request){

        $category = Category::find($request -> id);

        if($category -> id){

            $category -> fill($request -> all());

            if($request -> level == 0)

                $category -> father_id = null;

            $category -> save();

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'server error','message' => "Wrong category id and Fuck the laravel", 'body' => null], 404);

    }

    public function delete(Request $request){

        $category = Category::find($request -> id);

        if($category -> id){

            $category -> delete();

            return response()->json(['status' => 'success','message' => "", 'body' => null], 200);

        }else return response()->json(['status' => 'server error','message' => "Wrong category id and Fuck the laravel", 'body' => null], 404);

    }

    public function show(){

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

        return response()->json(['status' => 'success','message' => "", 'body' => $categories], 200);

    }

    public function index(){



    }
}
