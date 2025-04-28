<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AppController;


Route::apiResource('posts', PostController::class);


Route::post('/register', [AppController::class, 'register']);
Route::get('/ini_app',[AppController::class, 'ini_app']);
Route::post('/login',[AppController::class,'login']);
Route::get('/get_user/{id}',[AppController::class,'get_user']);
Route::get('/get_list_task',[TaskController::class, 'get_list_task']);
Route::put('/get_task/{id}',[TaskController::class, 'update_task']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
