<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\RoleController;

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


//================================================== start login ==================================================//
Route::get('/', [HomeController::class, 'index'])->name('selection');
Route::group(['namespace' => 'Auth'], function () 
{
    Route::get('/login/{type}',[LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login',[LoginController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');

});
//================================================== end login ==================================================//


Route::get('/home', [HomeController::class, 'index'])->name('home');




//user & roles
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::post('rolesDelete', [RoleController::class, 'delete'])->name('roles.delete');

    // Route::resource('users', UserController::class);
    // Route::get('usersShowNotification/{id}', [UserController::class, 'showNotification'])->name('users.showNotification');   
});



//general routes
Route::get('show_file/{folder_name}/{photo_name}', [GeneralController::class, 'show_file'])->name('show_file');
Route::get('download_file/{folder_name}/{photo_name}', [GeneralController::class, 'download_file'])->name('download_file');
Route::get('allNotifications', [GeneralController::class, 'allNotifications'])->name('allNotifications');
Route::get('markAllAsRead', [GeneralController::class, 'markAllAsRead'])->name('markAllAsRead');
Route::get('/{page}', [GeneralController::class, 'index']);



// Auth::routes(['register' => false]);