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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/programador', function () {
    return view('static.programador');
});

Route::get('/versoes', function () {
    return view('static.versoes');
});

Route::get('/list/oms', 'OmController@listaSimples');



// Authenticated application routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // controles de usuario
    Route::resource('/admin/usermanager', 'UserController');
    Route::get('/allusers', 'UserController@alluser');

    // controles de OM
    Route::resource('ommanager', 'OmController');
    Route::get('/allOm', 'OmController@listaOms');
    Route::get('/myom', 'OmController@omDirecionada');
    Route::get('/mytypes/{id}', 'OmController@omTypes');



});
