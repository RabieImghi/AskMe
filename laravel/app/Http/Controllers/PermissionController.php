<?php

namespace App\Http\Controllers;

use App\Models\PermessionVue_Role;
use Illuminate\Http\Request;
use App\Models\permession_vues_users;
use App\Models\PermessionVue;
use App\Models\Role;
use App\Models\User;

class PermissionController extends Controller
{
    public function getRolePemissions(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $permissions = PermessionVue_Role::with('permessionVue')->with('role')->get();
        $Data = [];
        foreach($permissions as $permission){
            $Data[$permission->role->name][] = [
                "name"=>$permission->permessionVue->name,
                "id"=>$permission->id,
            ];
        }
        return response()->json(['permissions'=>$Data],200);
    } 
    public function getRolePemissionsUsers(Request $request,$skip){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $permissions = permession_vues_users::with('permessionVue')
            ->with(['user' => function ($query) use ($skip)  {
                $query->skip($skip)->take(6);
            }])->get();
        $Data = [];
        foreach($permissions as $permission){
            if ($permission->user && $permission->permessionVue) {
                $Data[$permission->user->name][] = [
                    "route" => $permission->permessionVue->name, 
                    "isActive" => $permission->is_active,
                    'id' => $permission->id,
                ];
            }
        }
        return response()->json(['permissions'=>$Data, 'count'=>User::count()],200);
    } 
    public function ChangeStatusPermissionsUser(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $permission = permession_vues_users::find($request->id);
        $permission->is_active = $request->is_active;
        $permission->save();
        return response()->json(['message'=>'Permission Updated'],200);
    }
    public function getPemissionsAndRole(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $roles = Role::all();
        $rolesData = [];
        foreach($roles as $role){
            $rolesData[]=[
                'id'=>$role->id,
                'text'=>$role->name
            ];
        }
        $permissions = PermessionVue::all();
        $permissionData=[];
        foreach($permissions as $permission){
            $permissionData[]=[
                'id'=>$permission->id,
                'text'=>$permission->name
            ];
        }
        return response()->json(['roles'=>$rolesData,'permsissions'=>$permissionData],200);
        
    }

    public function addNewPermissions(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        foreach($request->formData['permissions_id'] as $data){
            $res = PermessionVue_Role::where('role_id',$request->formData["role_id"])->where('permession_vue_id',$data)->count();
            if($res == 0){
                $permission = new PermessionVue_Role();
                $permission->role_id = $request->formData['role_id'];
                $permission->permession_vue_id = $data;
                $permission->save();
            }
        }
        return response()->json(['data'=>$request->formData],200);
    }
    public function deleteNewPermissions(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        PermessionVue_Role::where('id',$request->id)->delete();
        return response()->json(['data'=>$request->id],200);
    }
}
