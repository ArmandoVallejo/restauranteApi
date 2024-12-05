<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories,200);
    }

    public function show($id){
        try{

            $category = Category::findOrFail($id);
            return response()->json($category);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json(['message' => 'Category not found'], 404);
        }
        
    }
}
