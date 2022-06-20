<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


// admin functions

Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//user management routes

Route::prefix('users')->group(function(){
    Route::get('view',[UserController::class,'UserView'])->name('users.view');
    Route::get('/addUser',[UserController::class,'AddUser']);
    Route::post('/storeUser',[UserController::class,'storeUser'])->name('users.store');
    Route::get('/editUser/{id}',[UserController::class,'editUser'])->name('users.edit');
    Route::get('/deleteUser/{id}',[UserController::class,'deleteUser'])->name('users.delete');
    Route::post('/updateUser/{id}',[UserController::class,'updateUser'])->name('users.update');
});

///profile management

Route::prefix('profile')->group(function(){
    Route::get('view',[ProfileController::class,'profileView'])->name('profile.view');
});
