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
//users

Route::get('/blog', 'PostsController@blog');
Route::get('/homeordash', 'UsersController@homeordash');
Route::get('/addteaproduce', 'TeaDetailsController@index');
Route::get('/addteaproduce/edit/{id}', 'TeaDetailsController@editteaproduce');
Route::get('/viewdailyproducereport', 'TeaDetailsController@dailyreport');
Route::post('/editteaproduce/edit/{id}', 'TeaDetailsController@edit');
Route::post('/agentsort', 'TeaDetailsController@sort');
Route::get('/home', 'UsersController@index');
Route::get('/', 'UsersController@index');
Route::post('/addteaproduce', 'TeaDetailsController@store');
Route::get('/report', 'UsersController@report')->name('report');
Route::get('/createpost', 'PostsController@post')->name('welcome');
Route::get('/post/{id}', 'PostsController@postid')->name('postid');
Route::post('/postcreate', 'PostsController@store')->name('store');
Route::get('/sortreport', 'UsersController@sortreport')->name('sortreport');
Route::get('/notifications', 'UsersController@notification');
Route::get('/notification/{id}', 'UsersController@notificationid');
Route::get('/profile', 'UsersController@profile');
Route::post('/profile/edit/{id}', 'UsersController@edit');
Route::get('/profile/edit/{id}', 'UsersController@editprofile');
Route::get('/pdfgenerate', 'UsersController@generate')->name('generate');
//admin
// Route::get('/', 'UsersController@index')->name('home');
Route::get('/admin/createevents', 'AdminsController@createevents');
Route::post('/admin/createevents', 'AdminsController@store')->name('createevent');
Route::get('/viewevents', 'AdminsController@viewevents');
Route::get('/events/{id}', 'AdminsController@vieweventid');
Route::get('/admin/createnotification', 'AdminsController@createnotification');
Route::post('/admin/createnotification', 'AdminsController@storenotification');
Route::get('/admin/viewnotification/{id}', 'AdminsController@viewnotificationid');
// Route::get('/admin/viewnotifications', 'AdminsController@viewnotifications');
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
Route::get('/admin/editfarmer/{id}', 'AdminsController@editfarmer');
Route::post('/admin/editfarmer/{id}', 'AdminsController@saveeditfarmer');
Route::get('/back', 'AdminsController@back');
// Route::get('/admin/editprofile', 'AdminsController@editprofile');
Route::get('/admin/farmersreport', 'ReportController@farmersreport')->name('farmersreport');
Route::get('/admin/teareport', 'ReportController@farmersreport')->name('farmersreport');

//eventscontoller
Route::post('/eventsperdate', 'EventController@eventsperday')->name('eventsperday');
//charts
Route::get('/dashboard', 'TeaController@admindash')->name('admindash');
Route::post('/admin/netperday', 'TeaController@netperday');
Route::post('/admin/netpermonth', 'TeaController@netpermonth');
Route::post('/notificationsperdate', 'EventController@notificationsperday')->name('notificationsperday');
Route::post('/search', 'PostsController@search')->name('search');



