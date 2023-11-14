<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboard\Country\CountryController;

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
    //country
    Route::resource('country', CountryController::class);
    Route::post('countryDeleteSelected', [CountryController::class, 'deleteSelected'])->name('country.deleteSelected');
});

