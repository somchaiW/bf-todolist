<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\TaskController;


Route::apiResource('posts', PostController::class);


Route::post('/register', [AppController::class, 'register']);
Route::get('/ini_app',[AppController::class, 'ini_app']);
Route::post('/login',[AppController::class, 'login']);
Route::get('/get_user/{id}',[AppController::class,'get_user']);
Route::get('/get_list_task',[TaskController::class, 'get_list_task']);
Route::put('/get_task/{id}',[TaskController::class, 'update_task']);
Route::post('/add_task',[TaskController::class, 'add_task']);
Route::get('/get_category',[TaskController::class, 'get_category']);
Route::get('/get_priority',[TaskController::class, 'get_priority']);
Route::put('/change_name/{id}',[TaskController::class, 'change_name']);
Route::put('/change_pass/{id}',[TaskController::class, 'change_pass']);
Route::put('/change_image/{id}',[TaskController::class, 'change_image']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
