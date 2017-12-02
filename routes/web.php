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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::resource('users', 'UserController');

    Route::get('roles/{id}/manage-permission', [
        'as' => 'roles.managepermission', 
        'uses' => 'RoleController@managePermission'
        ]);

    Route::post('roles/{id}/make-permission', [
        'as'    => 'roles.makepermission',
        'uses'  => 'RoleController@makePermission'
        ]);

    Route::resource('roles', 'RoleController');

    Route::resource('tours', '\Modules\Tour\Http\Controllers\TourController');
});

Route::get('/home', 'HomeController@index')->name('home');
