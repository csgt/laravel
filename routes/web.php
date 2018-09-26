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

Route::group(['middleware' => ['auth', 'cancerbero', 'menu']], function () {
    Route::get('/', ['as' => 'index.index', 'uses' => 'HomeController@index']);

    Route::namespace ('Catalogs')->prefix('catalogos')->name('catalogos.')->group(function () {
        Route::resource('usuarios', 'UsersController');
        Route::resource('roles', 'RolesController');
    });
});
