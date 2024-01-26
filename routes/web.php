<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServantController;
use App\Http\Controllers\CategoryController;

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

Route::get('/home', function () {
    return view('managments.categories.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('tables', TableController::class);
Route::resource('serveurs', ServantController::class);
Route::resource('menus', MenuController::class);
Route::resource('sales', SalesController::class);

Route::get('payments', [PaymentController::class,'index']);






Auth::routes(['register'=>false,'reset'=>false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
