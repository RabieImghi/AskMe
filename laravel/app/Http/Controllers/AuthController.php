<?php

namespace App\Http\Controllers;

use App\Models\PermessionVue;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PermessionVue_Role;
use App\Models\permession_vues_users;
use App\Repositories\Interfaces\IAuthRepository;

class AuthController extends Controller
{
    protected $iAuthRepository;

    public function __construct(IAuthRepository $iAuthRepository){
        $this->iAuthRepository = $iAuthRepository;
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = $this->iAuthRepository->login($request);
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

    public function register(Request $request){
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        
        $user = $this->iAuthRepository->register($request);
        $permissions = $this->iAuthRepository->getPermessionVue_Role();
        $this->iAuthRepository-> Permession_vues_users_create($permissions,$user->id);
        return response()->json([
            'user' => $user,
        ]);
    }

    public function logout(Request $request){
        cookie('authToken', "", time() - (60 * 60 * 24 * 365));
        cookie('authUser', "", time() - (60 * 60 * 24 * 365));
        return response()->json(['message' => 'Successfully logged out'],200);
    }

    public function CheckPermission(){
        return response()->json(['message' => 'You have permission to access this route!'],200);
    }

    public function PermissionVueJs(Request $request){
        $this->iAuthRepository->PermissionVueJs($request);
        return response()->json(['test' => $request->router[2]],200);
    }
}