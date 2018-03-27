<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index(){

        $types = Type::all();

        return response()->json(['status' => 'success','message' => "", 'body' => $types], 200);

    }
}
