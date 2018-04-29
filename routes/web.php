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
})->name('stepa.show')->middleware('auth');

Route::get('/stepb', function () {
    return view('userStepB.show');
})->name('stepb.show')->middleware('auth');

Route::get('/stepc', function () {
    return view('userStepC.show');
})->name('stepc.show')->middleware('auth');

Route::get('/stepd', 'StepdController@show')->name('stepd.show');

/* Snap */
Route::post('/snaps/store', 'SnapController@store')->name('snaps.store');

/* Theme */
Route::get('/snaps/{snap}/themes', 'ThemeController@show')->name('themes.show');


/* Option*/
Route::get('/snaps/{snap}/options/{option}/create', 'OptionController@create')->name('options.create');
Route::get('/snaps/{snap}/themes/{theme}/options', 'OptionController@show')->name('options.show');
Route::post('/snaps/{snap}/options/{option}/store', 'OptionController@store')->name('options.store');


/* Admin */
Route::get('/admin/triggers', 'AdminTriggersController@show')->name('admin.triggers.show');
Route::get('/admin/triggers/create', 'AdminTriggersController@create')->name('admin.triggers.create');
Route::post('/admin/triggers/store', 'AdminTriggersController@store')->name('admin.triggers.store');

Route::get('/admin/themes', 'AdminThemesController@show')->name('admin.themes.show');
Route::get('/admin/themes/create', 'AdminThemesController@create')->name('admin.themes.create');
Route::post('/admin/themes/store', 'AdminThemesController@store')->name('admin.themes.store');

Route::get('/admin/themes/{theme}/options/create', 'AdminOptionsController@create')->name('admin.options.create');
Route::post('/admin/themes/{theme}/options/store', 'AdminOptionsController@store')->name('admin.options.store');
