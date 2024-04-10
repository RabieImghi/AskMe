<?php 

namespace App\Repositories\Interfaces; 

interface IAuthRepository 
{ 
    public function login($request);
    public function register($request);
    public function Permession_vues_users_create($permissions,$user_id);
    public function getPermessionVue_Role();
    public function PermissionVueJs($request);
}