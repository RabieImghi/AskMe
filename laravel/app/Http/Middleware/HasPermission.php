<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Cookie;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uri = $request->route()->uri;
        $role_id = $request->input('role_id');
        $allowedRoutes = RolePermission::with('permission')->where('role_id', $role_id)->get();
        $allowedRouteTable =[];
        foreach($allowedRoutes as $allowed){
            $allowedRouteTable[]= $allowed->permission->name;
        }
        if (in_array($uri, $allowedRouteTable)) return $next($request);
        else return response()->json(['errorss'=>"erroe auth"], 401);
    }
}
