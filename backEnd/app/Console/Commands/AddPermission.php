<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use App\Models\Role;
class AddPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes = Route::getRoutes();
        Permission::truncate();
        foreach($routes as $route){
            $uri = $route->uri();
            if(strstr($uri, '_')) continue;
            if(strstr($uri, 'csrf')) continue;
            $routeModel =  new Permission();
            $routeModel->name = $uri;
            $routeModel->save();  
        }
        if(Role::count()==0){
            Role::create(["name"=>"admin"]);
            Role::create(["name"=>"user"]);
            Role::create(["name"=>"guest"]);
        }
    }
}
