<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\fronendController;
use App\Http\Controllers\AjaxController;

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

Route::get('/',[fronendController::class,'index'])->name('homepage');
Route::get('search_product',[fronendController::class,'searchProduct'])->name('search.product');

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'is_admin'], function() {
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('category-add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('category-store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('category-delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');


    Route::get('subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('subcategory-add', [SubCategoryController::class, 'create'])->name('admin.subcategory.add');
    Route::post('subcategory-store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('subcategory-edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::post('subcategory-update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::get('subcategory-delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.subcategory.delete');
    Route::get('/get/subcategory/{category_id}',[ProductController::class, 'getSubCategory']);

    Route::get('fetch-products', [ProductController::class, 'fetchproduct']);

    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('add-product', [ProductController::class, 'store'])->name('admin.product.add');
    Route::delete('delete-product', [ProductController::class, 'delete'])->name('admin.product.delete');




});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
