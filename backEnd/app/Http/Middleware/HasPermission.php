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
        $publics = RolePermission::where('role_id',3)->with('permission')->get();
        $publicRoutes =[];
        foreach($publics as $publicRoute){
            $publicRoutes[]= $publicRoute->permission->name;
        }
        $uri = $request->route()->uri;
        $cookie = request()->cookie('authUser');
        $role_id ='';
        if($cookie) {
            $dataUser = json_decode($cookie, true);
            $role_id = $dataUser['role_id'];
        }
        if ($role_id) {
            $allowedRoutes = Permission::where('role_id', $role_id)->get();
            foreach ($allowedRoutes as $route) {
                $allowedUri = $route->route->name;
                if (count(explode('/', $uri)) > 2) {
                    if (strstr($uri, $allowedUri))  return $next($request);
                } else {
                    if ($uri === $allowedUri) return $next($request);
                }
            }
            return abort(401);
        } else {
            if (in_array($uri, $publicRoutes)) return $next($request);
            else return abort(401);
        }
    }
}
