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

/* Admin */
Route::get('/admin/themes', 'AdminThemesController@show')->name('admin.themes.show');
Route::get('/admin/themes/create', 'AdminThemesController@create')->name('admin.themes.create');
Route::post('/admin/themes/store', 'AdminThemesController@store')->name('admin.themes.store');

Route::get('/admin/themes/{theme}/options/create', 'AdminOptionsController@create')->name('admin.options.create');
Route::post('/admin/themes/{theme}/options/store', 'AdminOptionsController@store')->name('admin.options.store');

Route::get('/', 'ThemeController@show')->name('themes.show');
Route::get('/themes/{theme}/options', 'OptionController@show')->name('options.show');
