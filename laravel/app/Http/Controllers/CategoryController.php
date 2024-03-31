<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('posts')->get();
        return response()->json($categories);
    }
    public function getAllCategory(){
        $Categorys = Category::get();
        $dataCategory=[];
        foreach($Categorys as $Category){
            $dataCategory[]=[
                'id'=>$Category->id,
                'name'=>$Category->name,
            ];
        }
        return response()->json([
            'Categorys' => $dataCategory,
        ]);
    }
    public function deleteCategory(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $Category = Category::find($request->id);
        $Category->delete();
        return response()->json(['message' => 'Tage deleted']);
    }
    public function addNewCategory(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'name' => 'required|unique:categorys',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return response()->json(['message' => 'Category added']);
    }
    public function updateCategory(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'name' => 'required|unique:categorys',
            'id' => 'required',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return response()->json(['message' => 'category updated']);
    }
    public function getAllTagesCategory(){
        $Categorys = Category::get();
        $tages = Tage::get();
        $dataCategory=[];
        $dataTage=[];
        foreach($Categorys as $Category){
            $dataCategory[]=[
                'id'=>$Category->id,
                'name'=>$Category->name,
            ];
        }
        foreach($tages as $tage){
            $dataTage[]=[
                'id'=>$tage->id,
                'text'=>$tage->name,
            ];
        }
        return response()->json([
            'Categorys' => $dataCategory,
            'Tages' => $dataTage,
        ]);
    }
}
