<?php

namespace App\Http\Controllers;

use App\Models\PermessionVue_Role;
use Illuminate\Http\Request;
use App\Models\permession_vues_users;

class PermissionController extends Controller
{
    public function getRolePemissions(){
        $permissions = PermessionVue_Role::with('permessionVue')->with('role')->get();
        $Data = [];
        foreach($permissions as $permission){
            $Data[$permission->role->name][] = $permission->permessionVue->name;
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
}
