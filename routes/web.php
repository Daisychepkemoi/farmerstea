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

Route::get('/', function () {
    return view('posts.index');
});

Auth::routes();

Route::get('/charts', 'TeaController@index')->name('chart');
Route::get('/home', 'UsersController@index')->name('home');
Route::get('/regista', 'UsersController@regista');
Route::post('/reg', 'UsersController@store');
Route::get('/dashboard', 'UsersController@admin')->name('dash');
Route::get('/report', 'UsersController@report')->name('report');
Route::get('/events', 'UsersController@events')->name('event');
Route::get('/eventid', 'UsersController@eventid')->name('eventid');
Route::get('/notification', 'UsersController@notification');
Route::get('/notificationid', 'UsersController@notificationid');
Route::get('/profile', 'UsersController@profile');
Route::post('/profile/edit/{id}', 'UsersController@edit');
Route::get('/profile/edit/{id}', 'UsersController@editprofile');
Route::get('/pdfgenerate', 'UsersController@generate')->name('generate');
//admin
// Route::get('/', 'UsersController@index')->name('home');
Route::get('/admin/admindashboard', 'AdminsController@admin')->name('dash');
Route::get('/admin/createevents', 'AdminsController@createevents');
Route::post('/admin/createevents', 'AdminsController@store')->name('createevent');
Route::get('/admin/viewevents', 'AdminsController@viewevents');
Route::get('/admin/events/{id}', 'AdminsController@vieweventid');
Route::get('/admin/createnotification', 'AdminsController@createnotification');
Route::post('/admin/createnotification', 'AdminsController@storenotification');
Route::get('/admin/viewnotification/{id}', 'AdminsController@viewnotificationid');
Route::get('/admin/viewnotifications', 'AdminsController@viewnotifications');
Route::get('/admin/viewprofile', 'AdminsController@profile');
Route::get('/admin/upgradefarmer', 'AdminsController@upgradefarmer');
Route::get('/admin/verifyfarmer', 'AdminsController@verifyfarmer');
Route::get('/admin/verifyfarmer/{id}', 'AdminsController@verifyfarmer');
Route::get('/admin/notverifyfarmer/{id}', 'AdminsController@denyfarmer');
Route::get('/admin/revokefarmer/{id}', 'AdminsController@revokefarmer');
Route::get('/admin/unrevokefarmer/{id}', 'AdminsController@unrevokefarmer');
Route::get('/admin/addrole', 'AdminsController@addrole');
Route::post('/admin/addadmin', 'AdminsController@addadmin');
Route::get('/admin/removepriviledge/{id}', 'AdminsController@removepriviledge');
Route::get('/admin/addpriviledge/{id}', 'AdminsController@addpriviledge');
Route::get('/back', 'AdminsController@back');
// Route::get('/admin/editprofile', 'AdminsController@editprofile');
Route::get('/admin/farmersreport', 'ReportController@farmersreport')->name('farmersreport');
Route::get('/admin/teareport', 'ReportController@farmersreport')->name('farmersreport');
//eventscontoller
Route::post('/eventsperdate', 'EventController@eventsperday')->name('eventsperday');
Route::post('/notificationsperdate', 'EventController@notificationsperday')->name('notificationsperday');

