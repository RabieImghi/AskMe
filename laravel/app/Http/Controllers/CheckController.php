<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermessionVue_Role;

class CheckController extends Controller
{
    public function CheckPermission(Request $request)
    {
        $uri = $request->uri;
        $role_id = $request->role_id;
        $allowedRoutes = PermessionVue_Role::with('permessionVue')->where('role_id', $role_id)->get();
        $allowedRouteTable =[];
        foreach($allowedRoutes as $allowed){
            $allowedRouteTable[]= $allowed->permessionVue->name;
        }
        if (in_array($uri, $allowedRouteTable)) return response()->json(['uri'=>$uri]);
        else return response()->json(['errors'=>"Not Auth ouriside"], 401);
    }

}
