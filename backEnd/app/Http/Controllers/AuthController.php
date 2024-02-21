<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;

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
        $badge ='';
        if($user->points>=150) $badge = "Professional";
        else if($user->points>=100) $badge = "Enlightened";
        else if($user->points>=50) $badge = "Explainer";
        else if($user->points>=5) $badge = "Beginner";
        $dataUser = [
            'username'=>$user->name,
            'badge'=>$badge,
            'points'=>$user->points,
            'role_id'=>$user->role_id,
        ];
        $jsonDataUser = json_encode($dataUser);
        cookie("authToken", $token, time() + (60 * 60 * 24 * 365));
        cookie("authUser", $jsonDataUser, time() + (60 * 60 * 24 * 365));
        return response()->json(['user' => $dataUser, 'token' => $token]);
    }

    public function register(Request $request)
    {
        
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
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
        return response()->json([
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        cookie('authToken', "", time() - (60 * 60 * 24 * 365));
        cookie('authUser', "", time() - (60 * 60 * 24 * 365));
        return response()->json(['message' => 'Successfully logged out'],200);
    }

    public function getAuthenticatedUser(Request $request)
    {
        return response()->json($request->user());
    }
}