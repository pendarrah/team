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
Route::get('/eventsSearch/{city_id?}/{gender?}/', 'AppController@eventsSearch')->name('app.events.search');
Route::get('/events/{id}', 'AppController@eventShow')->name('app.events.show');

Route::get('/events/request/{id}', 'AppController@eventRequest')->name('app.events.request');



Route::get('/teams', 'AppController@teams')->name('app.teams.index');
Route::get('/teamsSearch/{city_id?}/{gender?}/', 'AppController@teamsSearch')->name('app.teams.search');
Route::get('/teams/{id}', 'AppController@teamShow')->name('app.teams.show');
Route::get('/teams/{id}/events', 'AppController@teamEvents')->name('app.teams.events');

Route::get('/teams/request/{id}', 'AppController@teamRequest')->name('app.teams.request');

// Add middleware auth
Route::namespace('Panel')->prefix('panel')->middleware('auth')->group(function () {


    Route::get('verification/mobile/{mobileCode?}', 'VerificationController@mobile')->name('panel.verification.mobile');
    Route::get('verification/mobile/send', 'VerificationController@send')->name('panel.verification.send');
    Route::get('verification/profile', 'VerificationController@profile')->name('panel.verification.profile');
    Route::post('verification/profile/store', 'VerificationController@profileStore')->name('panel.verification.profile.store');


    Route::get('/', 'PanelController@index')->name('panel.index');

    Route::get('event/request/accept/{id}', 'EventController@requestAccept')->name('event.requestAccept');
    Route::get('event/request/reject/{id}', 'EventController@requestReject')->name('event.requestReject');


    Route::get('event/my', 'EventController@my')->name('event.my');
    Route::resource('event', 'EventController');
    Route::get('event/delete/{id}', 'EventController@destroy')->name('event.delete');
    Route::get('event/wallet/{id}', 'EventController@wallet')->name('event.wallet');
    Route::get('event/wallet/offlinePayemnt/{id}', 'EventController@offlinePayment')->name('event.offlinePayment');

    Route::get('requests/index', 'ReqController@index')->name('requests.index');
    Route::get('requests/payFromWallet/{id}', 'ReqController@payFromWallet')->name('requests.payFromWallet');


    Route::resource('team', 'TeamController');
    Route::get('team/delete/{id}', 'TeamController@destroy')->name('team.delete');
    Route::get('team/{id}/users', 'TeamController@users')->name('team.users');
    Route::get('team/{id}/events', 'TeamController@events')->name('team.events');
    Route::post('team/invite', 'TeamController@invite')->name('team.invite');
    Route::get('team/remove/{team_id}/{user_id}', 'TeamController@remove')->name('team.remove');
    Route::get('team/exit/{team_id}/{user_id}', 'TeamController@exit')->name('team.exit');


    Route::get('team/request/accept/{id}', 'TeamController@requestAccept')->name('team.requestAccept');
    Route::get('team/request/reject/{id}', 'TeamController@requestReject')->name('team.requestReject');


    Route::resource('category', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    Route::resource('checkout', 'CheckoutController');
    Route::get('checkout/request/{event_id}', 'CheckoutController@request')->name('checkout.request');

    Route::resource('transaction', 'TransactionController');


    Route::post('/payment/', 'PaymentController@payment')->name('payment');
    Route::any('/paid/{amount}/{userId}/','PaymentController@paid');

    Route::resource('users', 'UserController');
    Route::get('user/{id}/plays', 'UserController@plays')->name('users.plays');
    Route::get('user/{id}/transactions', 'UserController@transactions')->name('users.transactions');
    Route::get('user/ban/{id}', 'UserController@ban')->name('user.ban');


    Route::get('user/profile', 'UserController@profileShow')->name('panel.profile');
    Route::post('user/profile/store', 'UserController@profileStore')->name('panel.profile.store');

    Route::get('user/password', 'UserController@passwordShow')->name('panel.password');
    Route::post('user/password/store', 'UserController@passwordStore')->name('panel.password.store');

});







Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/index', 'DashboardController@index')->name('dashboard.index');
    Route::resource('events', 'EventController');

});



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('dashboard-logout');
