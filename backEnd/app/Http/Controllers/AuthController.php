<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) 
            return response()->json(['message' => 'Email not exist or not correct!','error'=>"email"], 401);
        if (!Hash::check($request->password, $user->password)) 
            return response()->json(['message' => "Password not correct!",'error'=>"password"], 401);
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'points' => 'required',
            'role_id' => 'required',
        ]);
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'points' => $request->points,
            'role_id' => $request->role_id,
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getAuthenticatedUser(Request $request)
    {
        return response()->json($request->user());
    }
}