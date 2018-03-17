<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/themes', 'AdminThemesController@show')->name('admin.themes.show');
Route::get('/', 'AdminThemesController@create')->name('admin.themes.create');
Route::post('/admin/themes/store', 'AdminThemesController@store')->name('admin.themes.store');
