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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

/* User */

Route::get('/', function () {
    return view('userStepA.show');
})->name('stepa.show');

Route::get('/stepb', function () {
    return view('userStepB.show');
})->name('stepb.show');

Route::get('/stepc', function () {
    return view('userStepC.show');
})->name('stepc.show');

Route::get('/stepd', 'StepdController@show')->name('stepd.show');

Route::get('/themes', 'ThemeController@show')->name('themes.show');
Route::get('/themes/{theme}/options', 'OptionController@show')->name('options.show');


/* Admin */
Route::get('/admin/triggers', 'AdminTriggersController@show')->name('admin.triggers.show');
Route::get('/admin/triggers/create', 'AdminTriggersController@create')->name('admin.triggers.create');
Route::post('/admin/triggers/store', 'AdminTriggersController@store')->name('admin.triggers.store');

Route::get('/admin/themes', 'AdminThemesController@show')->name('admin.themes.show');
Route::get('/admin/themes/create', 'AdminThemesController@create')->name('admin.themes.create');
Route::post('/admin/themes/store', 'AdminThemesController@store')->name('admin.themes.store');

Route::get('/admin/themes/{theme}/options/create', 'AdminOptionsController@create')->name('admin.options.create');
Route::post('/admin/themes/{theme}/options/store', 'AdminOptionsController@store')->name('admin.options.store');
