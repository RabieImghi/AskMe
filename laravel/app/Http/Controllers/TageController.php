<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tage;

class TageController extends Controller
{
    public function index()
    {
        $tages = Tage::with('posts')->get();
        return response()->json($tages);
    }
    public function getAllTages(){
        $tages = Tage::get();
        $dataTage=[];
        foreach($tages as $tage){
            $dataTage[]=[
                'id'=>$tage->id,
                'name'=>$tage->name,
                'descriprtion'=>$tage->descriprtion,
            ];
        }
        return response()->json([
            'tages' => $dataTage,
        ]);
    }
    public function deleteTage(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $tage = Tage::find($request->id);
        $tage->delete();
        return response()->json(['message' => 'Tage deleted']);
    }
    public function addNewTage(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'name' => 'required|unique:tages',
            'descriprtion' => 'required',
        ]);
        Tage::create([
            'name' => $request->name,
            'descriprtion' => $request->descriprtion,
        ]);
        return response()->json(['message' => 'Tage added']);
    }
    public function updateTage(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'name' => 'required|unique:tages',
            'descriprtion'=>'required',
            'id' => 'required',
        ]);
        $tage = Tage::find($request->id);
        $tage->name = $request->name;
        $tage->save();
        return response()->json(['message' => 'Tage updated']);
    }
}
