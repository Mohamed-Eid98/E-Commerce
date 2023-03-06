<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEnd\FrontController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', [FrontController::class , 'index']);
Route::get('category', [FrontController::class , 'category']);
Route::get('view category/{slug}', [FrontController::class , 'view_category']);
Route::get('view category/{cate_slug}/{prod_slug}', [FrontController::class , 'prod_view']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/nav', function(){
    return view('nav');
});

route::get('test' , function(){
    return view('test');
});



Route::middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::get('/dashboard', [FrontendController::class , 'index']);
    // Route::get('/categories', [CategoryController::class , 'index']);
    // Route::get('/add-category', [CategoryController::class , 'add']);
    // Route::post('/insert_category', [CategoryController::class , 'insert'])->name('insert-category');
    // Route::get('edit-prod/{id}', [CategoryController::class ,'edit'])->name('editProduct');
    // Route::put('update_category', [CategoryController::class ,'update'])->name('update_category');
    // Route::delete('delete-prod/{id}', [CategoryController::class ,'destroy'])->name('delete-prod');
    Route::resource('categories' , CategoryController::class );
    Route::resource('products' , ProductController::class );

});
