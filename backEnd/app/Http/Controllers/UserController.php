<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function CreateUser(Request $request){
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'points' => 'required'
        ]);
        $validatedData['password'] = Hash::make($request->password);
        User::create($validatedData);
        return response()->json([
            'data' => "User Created Successfully!",
        ]);
    }
}
