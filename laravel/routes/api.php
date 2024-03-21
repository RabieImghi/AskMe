<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\PermissionController;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\TageController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/RegisterUser',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);
Route::post('/PermissionVueJs',[AuthController::class,'PermissionVueJs']);
Route::post('/CheckPermission',[CheckController::class,'CheckPermission']);
Route::post('/CheckPermissionUser',[CheckController::class,'CheckPermissionUser']);

Route::get('/getPemissionsAndRole',[PermissionController::class,'getPemissionsAndRole']);
Route::get('/getRolePemissions',[PermissionController::class,'getRolePemissions']);
Route::get('/getRolePemissionsUsers',[PermissionController::class,'getRolePemissionsUsers']);
Route::post('/ChangeStatusPermissions',[PermissionController::class,'ChangeStatusPermissionsUser']);
Route::post('/addNewPermissions',[PermissionController::class,'addNewPermissions']);
Route::post('/deleteNewPermissions',[PermissionController::class,'deleteNewPermissions']);

Route::post('/AddQuestions',[PostController::class,'AddQuestions']);
Route::get('/allPost',[PostController::class,'allPost']);
Route::get('/MyPost/{id}',[PostController::class,'MyPost']);
Route::delete('/DeletePost/{id}',[PostController::class,'DeletePost']);
Route::post('/UpdateQuestions',[PostController::class,'UpdateQuestions']);
Route::get('/ChangeReating/{id}/{userId}/{type}',[PostController::class,'ChangeReating']);
Route::get('/ChangeReatingAnswer/{id}/{userId}/{type}',[PostController::class,'ChangeReatingAnswer']);
Route::get('/addViewsPost/{id}',[PostController::class,'addViewsPost']);


Route::get('/getPostAnswers/{id}',[AnswerController::class,'getPostAnswers']);
Route::post('/addAnswer', [AnswerController::class, 'addAnswer']);
Route::post('/updateAnswer', [AnswerController::class, 'updateAnswer']);
Route::get('/deleteAnswer/{id}', [AnswerController::class, 'deleteAnswer']);

Route::get('/getAllTages', [TageController::class, 'getAllTages']);
Route::post('/deleteTage', [TageController::class, 'deleteTage']);
Route::post('/addNewTage', [TageController::class, 'addNewTage']);
Route::post('/updateTage', [TageController::class, 'updateTage']);

Route::get('/getAllCategory', [CategoryController::class, 'getAllCategory']);
Route::post('/addNewCategory', [CategoryController::class, 'addNewCategory']);
Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
Route::post('/deleteCategory', [CategoryController::class, 'deleteCategory']);

Route::get('/getAllTagesCategory', [CategoryController::class, 'getAllTagesCategory']);
Route::get('/getStatisics', [UserController::class, 'getStatisics']);

Route::post('/uploadImage', [UserController::class, 'uploadImage']);


