<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboard\Course\CourseController;

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
    //course
    Route::resource('course', CourseController::class);
    Route::post('courseDeleteSelected', [CourseController::class, 'deleteSelected'])->name('course.deleteSelected');
});

