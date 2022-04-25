<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// admin route
Route::get('admin/home', [App\Http\Controllers\AdminHomcontroller::class, 'index'])->name('admin.home')->middleware('isAdmin');
Route::get('admin/addProduct', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index')->middleware('isAdmin');
Route::post('admin/postProduct', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('product.add')->middleware('isAdmin');
