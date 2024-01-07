<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', '\App\Http\Controllers\HomeController@index');
Route::get('/blog/{slug}', '\App\Http\Controllers\HomeController@view');
Route::get('/category/{id}', '\App\Http\Controllers\HomeController@category');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth', 'prefix'=>'admin'], function () {

    Route::get('/', '\App\Http\Controllers\Admin\DashboardController@index');

    //Blog
    Route::get('/blog', '\App\Http\Controllers\Admin\BlogController@index')->name('blogs.index');
    Route::get('/blog/create', '\App\Http\Controllers\Admin\BlogController@create')->name('blogs.create');
    Route::post('/blog', '\App\Http\Controllers\Admin\BlogController@store')->name('blogs.store');
    Route::get('/blog/{id}', '\App\Http\Controllers\Admin\BlogController@show')->name('blogs.show');
    Route::get('/blog/edit/{id}', '\App\Http\Controllers\Admin\BlogController@edit')->name('blogs.edit');
    Route::put('/blog/{id}', '\App\Http\Controllers\Admin\BlogController@update')->name('blogs.update');
    Route::delete('/blog/{id}', '\App\Http\Controllers\Admin\BlogController@destroy')->name('blogs.destroy');

    //Category
    Route::get('/category', '\App\Http\Controllers\Admin\CategoryController@index')->name('category.index');
    Route::get('/category/create', '\App\Http\Controllers\Admin\CategoryController@create')->name('category.create');
    Route::post('/category', '\App\Http\Controllers\Admin\CategoryController@store')->name('category.store');
    Route::get('/category/{id}', '\App\Http\Controllers\Admin\CategoryController@show')->name('category.show');
    Route::get('/category/edit/{id}', '\App\Http\Controllers\Admin\CategoryController@edit')->name('category.edit');
    Route::put('/category/{id}', '\App\Http\Controllers\Admin\CategoryController@update')->name('category.update');
    Route::delete('/category/{id}', '\App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy');

});



