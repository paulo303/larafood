<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->group(function () {
    Route::any('plans/search/', [PlanController::class, 'search'])->name('plans.search');
    Route::resource('plans', PlanController::class);

    Route::get('/', [PlanController::class, 'search'])->name('admin.index');
});




Route::get('/', function () {
    return view('welcome');
});
