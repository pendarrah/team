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


Auth::routes();

Route::get('/', 'AppController@index')->name('app.index');



// Add middleware auth
Route::namespace('Panel')->prefix('panel')->middleware('auth')->group(function () {

    Route::get('/', 'PanelController@index')->name('panel.index');

    Route::get('event/my', 'EventController@my')->name('event.my');
    Route::resource('event', 'EventController');
    Route::get('event/delete/{id}', 'EventController@destroy')->name('event.delete');

    Route::resource('team', 'TeamController');
    Route::get('team/delete/{id}', 'TeamController@destroy')->name('team.delete');



});







Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/index', 'DashboardController@index')->name('dashboard.index');
    Route::resource('events', 'EventController');

});



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('dashboard-logout');
