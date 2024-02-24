<?php

namespace App\Http\Controllers;

use App\Models\PermessionVue_Role;
use Illuminate\Http\Request;
use App\Models\RolePermission;

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
}
