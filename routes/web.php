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


Route::get('/events', 'AppController@events')->name('app.events.index');
Route::get('/events/{id}', 'AppController@eventShow')->name('app.events.show');


Route::get('/coaches', 'AppController@coaches')->name('app.coaches');



// Add middleware auth
Route::namespace('Panel')->prefix('panel')->middleware('auth')->group(function () {


    Route::get('verification/mobile/{mobileCode?}', 'VerificationController@mobile')->name('panel.verification.mobile');
    Route::get('verification/mobile/send', 'VerificationController@send')->name('panel.verification.send');
    Route::get('verification/profile', 'VerificationController@profile')->name('panel.verification.profile');
    Route::post('verification/profile/store', 'VerificationController@profileStore')->name('panel.verification.profile.store');


    Route::get('/', 'PanelController@index')->name('panel.index');

    Route::get('event/my', 'EventController@my')->name('event.my');
    Route::resource('event', 'EventController');
    Route::get('event/delete/{id}', 'EventController@destroy')->name('event.delete');

    Route::resource('team', 'TeamController');
    Route::get('team/delete/{id}', 'TeamController@destroy')->name('team.delete');

    Route::resource('category', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    Route::resource('transaction', 'TransactionController');


    Route::post('/payment/', 'PaymentController@payment')->name('payment');
    Route::any('/paid/{amount}/{userId}','PaymentController@paid');

});







Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/index', 'DashboardController@index')->name('dashboard.index');
    Route::resource('events', 'EventController');

});



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('dashboard-logout');
