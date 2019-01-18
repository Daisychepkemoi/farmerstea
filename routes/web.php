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

Route::get('/home', 'UsersController@index')->name('home');
Route::get('/dashboard', 'UsersController@admin')->name('dash');
Route::get('/report', 'UsersController@report')->name('report');
Route::get('/events', 'UsersController@events')->name('event');
Route::get('/eventid', 'UsersController@eventid')->name('eventid');
Route::get('/notification', 'UsersController@notification');
Route::get('/notificationid', 'UsersController@notificationid');
Route::get('/profile', 'UsersController@profile');
Route::get('/editprofile', 'UsersController@editprofile');
Route::get('/pdfgenerate', 'UsersController@generate')->name('generate');
//admin
// Route::get('/', 'UsersController@index')->name('home');
Route::get('/admindashboard', 'AdminsController@admin')->name('dash');
Route::get('/adminreport', 'AdminsController@report')->name('report');
Route::get('/createevents', 'AdminsController@events');
Route::get('/viewevents', 'AdminsController@viewevents');
Route::get('/vieweventsid', 'AdminsController@vieweventid');
Route::get('/createnotification', 'AdminsController@createnotification');
Route::get('/viewnotificationid', 'AdminsController@viewnotificationid');
Route::get('/viewnotifications', 'AdminsController@viewnotifications');
Route::get('/viewprofile', 'AdminsController@profile');
// Route::get('/editprofile', 'AdminsController@editprofile');

