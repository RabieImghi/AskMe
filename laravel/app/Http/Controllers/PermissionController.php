<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;

class PermissionController extends Controller
{
    public function getPermissions()
    {
        $permissions = RolePermission::with("permission")->get();
        return response()->json(["permissions"=>$permissions], 200);
    }   
}
