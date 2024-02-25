<?php

namespace App\Http\Controllers;

use App\Models\PermessionVue_Role;
use Illuminate\Http\Request;
use App\Models\permession_vues_users;
use App\Models\PermessionVue;
use App\Models\Role;

class PermissionController extends Controller
{
    public function getRolePemissions(){
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
    public function getRolePemissionsUsers(){
        $permissions = permession_vues_users::with('permessionVue')->with('user')->get();
        $Data = [];
        foreach($permissions as $permission){
            $Data[$permission->user->name][] = [
                "route" => $permission->permessionVue->name, 
                "isActive" => $permission->is_active,
                'id' => $permission->id,
            ];
        }
        return response()->json(['permissions'=>$Data],200);
    } 
    public function ChangeStatusPermissionsUser(Request $request){
        $permission = permession_vues_users::find($request->id);
        $permission->is_active = $request->is_active;
        $permission->save();
        return response()->json(['message'=>'Permission Updated'],200);
    }
    public function getPemissionsAndRole(){
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
        PermessionVue_Role::where('id',$request->id)->delete();
        return response()->json(['data'=>$request->id],200);
    }
}
