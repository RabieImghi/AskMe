<?php

namespace App\Http\Controllers;

use App\Models\PermessionVue;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PermessionVue_Role;
use App\Models\permession_vues_users;


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
        $token = $user->createToken('API Token')->plainTextToken;
        $dataUser = [
            'firstName'=>$user->firstname,
            'lastName'=>$user->lastname,
            'username'=>$user->name,
            'badge'=>AnswerController::getBadge($user->points),
            'points'=>$user->points,
            'role_id'=>$user->role_id,
            'avatar'=>asset('uploads/'.$user->avatar),
            'coverImage'=>asset('uploads/'.$user->coverImage),
        ];
        return response()->json(['user' => $dataUser, 'token' => $token, "user_id"=>$user->id],200);
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
            'role_id' => 2,
        ]);
        $permissions = PermessionVue_Role::where('role_id',2)->pluck('permession_vue_id')->toArray();
        foreach($permissions as $permission){
            permession_vues_users::create([
                'user_id' => $user->id,
                'permession_vue_id' => $permission,
                'is_active'=>1,
                'is_deleted'=>0,
            ]);
        }
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

    public function CheckPermission()
    {
        return response()->json(['message' => 'You have permission to access this route!'],200);
    }

    public function PermissionVueJs(Request $request){
        PermessionVue::truncate();
        foreach($request->router as $router){
            if($router == '/user' || $router == '/admin' || $router == null || $router == '/user/Error404' || $router == '/user/auth') continue;
            PermessionVue::create([
                'name' => $router,
            ]);
        }
        return response()->json(['test' => $request->router[2]],200);
    }
}