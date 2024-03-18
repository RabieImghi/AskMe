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
            ];
        }
        return response()->json([
            'tages' => $dataTage,
        ]);
    }
    public function deleteTage(Request $request)
    {
        $tage = Tage::find($request->id);
        $tage->delete();
        return response()->json(['message' => 'Tage deleted']);
    }
    public function addNewTage(Request $request){
        $request->validate([
            'name' => 'required|unique:tages',
        ]);
        Tage::create([
            'name' => $request->name,
        ]);
        return response()->json(['message' => 'Tage added']);
    }
    public function updateTage(Request $request){
        $request->validate([
            'name' => 'required|unique:tages',
            'id' => 'required',
        ]);
        $tage = Tage::find($request->id);
        $tage->name = $request->name;
        $tage->save();
        return response()->json(['message' => 'Tage updated']);
    }
}
