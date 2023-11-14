<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboard\User\UserController;

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

Route::group(['middleware' => ['auth:admin']], function () {
    //user
    Route::resource('user', UserController::class);
    Route::post('userDeleteSelected', [UserController::class, 'deleteSelected'])->name('user.deleteSelected');
});