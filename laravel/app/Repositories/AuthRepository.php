<?php 

namespace App\Repositories; 

use App\Models\Auth; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use App\Models\PermessionVue_Role;
use App\Models\PermessionVue;
use App\Models\permession_vues_users;



use App\Repositories\Interfaces\IAuthRepository; 

class AuthRepository implements IAuthRepository 
{ 
    public function login($request){
        $user = User::where('email', $request->email)->first();
        if (!$user) 
            return response()->json(['message' => 'Email not exist or not correct!','error'=>"email"], 401);
        if (!Hash::check($request->password, $user->password)) 
            return response()->json(['message' => "Password not correct!",'error'=>"password"], 401);
        if($user->isBanne == "1")
            return response()->json(['message' => "You Are Banned"],401);
        return $user;
    }
    public function register($request){
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'points' => 20,
            'role_id' => 2,
        ]);
        return $user;
        
    }
    public function Permession_vues_users_create($permissions,$user_id){
        foreach($permissions as $permission){
            permession_vues_users::create([
                'user_id' => $user_id,
                'permession_vue_id' => $permission,
                'is_active'=>1,
                'is_deleted'=>0,
            ]);
        }

    }
    public function getPermessionVue_Role(){
        return PermessionVue_Role::where('role_id',2)->pluck('permession_vue_id')->toArray();
    }
    public function PermissionVueJs($request){
        PermessionVue::truncate();
        foreach($request->router as $router){
            if($router == '/user' || $router == '/admin' || $router == null || $router == '/user/Error404' || $router == '/user/auth') continue;
            PermessionVue::create([
                'name' => $router,
            ]);
        }
    }
}