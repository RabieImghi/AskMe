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
}
