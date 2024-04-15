<?php 

namespace App\Repositories\Interfaces; 

interface IUserRepository 
{ 
    public function login($request);
    public function register($request);
    public function Permession_vues_users_create($permissions,$user_id);
    public function getPermessionVue_Role();
    public function PermissionVueJs($request);
    public function getStatisicsCount();
    public function getStatisicsTage();
    public function getStatisicsUser();
    public function uploadImage($request);
    public function getUserInfo($id,$followerId);
    public function updateUserInfo($request);
    public function follow($request);
    public function getusers($request,$skip);
    public function searchUser($request, $search);
    public function deleteUser($request);
    public function banneUser($request);
    public function changeUser($request);
}