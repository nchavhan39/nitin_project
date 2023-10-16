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
Route::get('/index', [App\Http\Controllers\LoginController::class, 'Loginindex'])->name('index');

Route::get('/create-category', [App\Http\Controllers\CategoryController::class, 'CreateCategory'])->name('create-category');
Route::post('/store-category', [App\Http\Controllers\CategoryController::class, 'storeCategory'])->name('store-category');
Route::get('/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('/update-category/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('update-category');
Route::get('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete-category');

