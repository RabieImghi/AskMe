<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermessionVue_Role;
use App\Models\permession_vues_users;

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
    // public function CheckPermissionUser(Request $request)
    // {
    //     $uri = $request->uri;
    //     $user_id = $request->user_id;
    //     $allowedRoutes = permession_vues_users::with('permessionVue')->where('user_id', $user_id)->get();
    //     $allowedRouteTable =[];
    //     foreach($allowedRoutes as $allowed){
    //         $allowedRouteTable['route'][]= $allowed->permessionVue->name;
    //         $allowedRouteTable['isActive'][]= $allowed->is_active;
    //     }
    //     // for($i=0; $i<count($allowedRouteTable['route']); $i++){
    //     //     if($allowedRouteTable['route'][$i]==$uri && $allowedRouteTable['isActive'][$i]==1)
    //     //     return response()->json(['uri'=>$uri]);
    //     // }
    //     return response()->json(['permissionsUser'=>$allowedRouteTable]);
    // }

    public function CheckPermissionUser(Request $request)
    {
        $uri = $request->dataUser['uri'];
        $role_id = $request->dataUser['role_id'];
        $user_id = $request->dataUser['user_id'];
        $message = "";
        if($user_id != null){
            $allowedRoutesRole = PermessionVue_Role::with('permessionVue')->where('role_id', $role_id)->get();
            $allowedRouteRoleTable =[];
            foreach($allowedRoutesRole as $allowed){
                $allowedRouteRoleTable[]= $allowed->permessionVue->name;
            }
            if (in_array($uri, $allowedRouteRoleTable)){
                $allowedRoutes = permession_vues_users::with('permessionVue')->where('user_id', $user_id)->get();
                $allowedRouteTable =[];
                foreach($allowedRoutes as $allowed){
                    $allowedRouteTable['route'][]= $allowed->permessionVue->name;
                    $allowedRouteTable['isActive'][]= $allowed->is_active;
                }
                $index = array_search($uri, $allowedRouteTable['route']);
                if($index !== FALSE){
                    if( $allowedRouteTable['isActive'][$index] == 1){
                        $message = "Auth";
                    }else $message = "notAuth";
                }else $message = "notAuth";
            }else $message = "notAuth";
        }else{
            $allowedRoutes = permession_vues_users::with('permessionVue')->where('user_id', $user_id)->get();
            $allowedRouteTable =[];
            foreach($allowedRoutes as $allowed){
                $allowedRouteTable['route'][]= $allowed->permessionVue->name;
                $allowedRouteTable['isActive'][]= $allowed->is_active;
            }
            $index = array_search($uri, $allowedRouteTable['route']);
            if($index !== FALSE){
                if( $allowedRouteTable['isActive'][$index] == 1){
                    $message = "Auth";
                }
            }else $message = "notAuth";
        }
        return response()->json($message);
    }
}
