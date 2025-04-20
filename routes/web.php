<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\CompanyCRUDController;
use App\Http\Controllers\UserController;



Route::resource('companies',CompanyCRUDController::class);

Route::get('/home', function(){
    return view('home');
})->name('home');

Route::get('/admin/User',[UserController::class,'index'])->name('users.index');

Route::get('/admin/Register',[UserController::class,'register'])->name('users.register');
Route::post('/admin', [UserController::class,'store'])->name('users.store');

Route::get('/admin/users/{id}',[UserController::class,'show'])->name('users.show');
Route::delete('/admin/users/{id}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('/admin/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
Route::put('/admin/users/{id}',[UserController::class,'update'])->name('users.update');



/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

