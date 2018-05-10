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
Route::delete('/snaps/{snap}', 'SnapController@destroy')->name('snaps.delete');


/* Theme */
Route::get('/snaps/{snap}/themes', 'ThemeController@show')->name('themes.show');

/* Option*/
Route::get('/snaps/{snap}/options/{option}/create', 'OptionController@create')->name('options.create');
Route::get('/snaps/{snap}/themes/{theme}/options', 'OptionController@show')->name('options.show');
Route::post('/snaps/{snap}/options/{option}/store', 'OptionController@store')->name('options.store');
Route::get('/snaps/{snap}/options/{option}/edit', 'OptionController@edit')->name('options.edit');
Route::patch('/snaps/{snap}/options/{option}/update', 'OptionController@update')->name('options.update');

/* Admin */
/* Triggers */
Route::get('/admin/triggers', 'AdminTriggersController@show')->name('admin.triggers.show');
Route::get('/admin/triggers/create', 'AdminTriggersController@create')->name('admin.triggers.create');
Route::post('/admin/triggers/store', 'AdminTriggersController@store')->name('admin.triggers.store');
Route::get('/admin/triggers/{trigger}/edit', 'AdminTriggersController@edit')->name('admin.triggers.edit');
Route::patch('/admin/triggers/{trigger}/update', 'AdminTriggersController@update')->name('admin.triggers.update');

/* Theme */
Route::get('/admin/themes', 'AdminThemesController@show')->name('admin.themes.show');
Route::get('/admin/themes/create', 'AdminThemesController@create')->name('admin.themes.create');
Route::post('/admin/themes/store', 'AdminThemesController@store')->name('admin.themes.store');
Route::get('/admin/themes/{theme}/edit', 'AdminThemesController@edit')->name('admin.themes.edit');
Route::patch('/admin/themes/{theme}/update', 'AdminThemesController@update')->name('admin.themes.update');

/* Option */
Route::get('/admin/themes/{theme}/options/create', 'AdminOptionsController@create')->name('admin.options.create');
Route::post('/admin/themes/{theme}/options/store', 'AdminOptionsController@store')->name('admin.options.store');
Route::get('/admin/options/{option}/edit', 'AdminOptionsController@edit')->name('admin.options.edit');
Route::patch('/admin/options/{option}/update', 'AdminOptionsController@update')->name('admin.options.update');

/* Link */
Route::get('/admin/options/{option}/links/create', 'AdminLinksController@create')->name('admin.links.create');
Route::post('/admin/options/{option}/links/store', 'AdminLinksController@store')->name('admin.links.store');
Route::get('/admin/options/{option}/links/{link}/edit', 'AdminLinksController@edit')->name('admin.links.edit');
Route::patch('/admin/links/{link}/update', 'AdminLinksController@update')->name('admin.links.update');
