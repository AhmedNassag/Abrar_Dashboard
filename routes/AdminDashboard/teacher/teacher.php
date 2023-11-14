<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboard\Teacher\TeacherController;

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
    //teacher
    Route::resource('teacher', TeacherController::class);
    Route::post('teacherDeleteSelected', [TeacherController::class, 'deleteSelected'])->name('teacher.deleteSelected');
});