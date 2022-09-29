<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthenticateController;

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

Route::get('/', function(){
    return view('core.welcome');
});

 Route::middleware('auth')->group(function () {
    Route::resource('/employee', EmployeeController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/detail', [DetailController::class, 'index']);
});

Route::controller(AuthenticateController::class)->group(function() {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'enter');
    Route::post('/logout', 'exit');
});