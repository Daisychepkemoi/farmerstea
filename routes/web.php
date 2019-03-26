<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|contact
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

Route::get('/readmore', 'UsersController@readmore');
Route::get('/admin/contactus', 'ContactsController@index');
Route::get('/admin/contactus/sort', 'ContactsController@sort');
Route::get('/admin/contact/{id}', 'ContactsController@contactid');
Route::post('/admin/contactus/reply', 'ContactsController@reply');

Route::get('/blog', 'PostsController@blog');
Route::get('/homeordash', 'UsersController@homeordash');
Route::get('/addteaproduce', 'TeaDetailsController@index')->name('addteaproduce');
Route::get('/addteaproduce/edit/{id}', 'TeaDetailsController@editteaproduce');
Route::get('/receipt/{id}', 'TeaDetailsController@receipt');
Route::get('/printreceipt/{id}', 'TeaDetailsController@printreceipt');
Route::get('/viewdailyproducereport', 'TeaDetailsController@dailyreport');
Route::post('/editteaproduce/edit/{id}', 'TeaDetailsController@edit');
Route::post('/agentsort', 'TeaDetailsController@sort');
Route::get('/home', 'UsersController@index');
Route::get('/', 'UsersController@index');
Route::post('/addteaproduce', 'TeaDetailsController@store');
Route::get('/report', 'UsersController@report')->name('report');
Route::get('/createpost', 'PostsController@post')->name('welcome');
Route::get('/post/{id}', 'PostsController@postid')->name('postid');
Route::get('/editpostview/{id}', 'PostsController@editpostview')->name('postid');
Route::post('/editpost/{id}', 'PostsController@editpost')->name('editpost');
Route::get('/deletepost/{id}', 'PostsController@destroy')->name('deletepost');
Route::post('/postcreate', 'PostsController@store')->name('store');
Route::get('/sortreport', 'UsersController@sortreport')->name('sortreport');
Route::get('/notifications', 'UsersController@notification');
Route::get('/notification/{id}', 'UsersController@notificationid');
Route::get('/notificationview/edit/{id}', 'AdminsController@editnotificationview');
Route::post('/notification/edit/{id}', 'AdminsController@editnotificationid');
Route::get('/profile', 'UsersController@profile');
Route::post('/profile/editsave/{id}', 'UsersController@editsave');
Route::get('/profile/edit/{id}', 'UsersController@editprofile');
Route::get('/pdfgenerate', 'UsersController@generate')->name('generate');
//admin
// Route::get('/', 'UsersController@index')->name('home');
Route::get('/admin/createevents', 'AdminsController@createevents');
Route::post('/admin/createevents', 'AdminsController@store')->name('createevent');
Route::get('/viewevents', 'AdminsController@viewevents');
Route::get('/events/{id}', 'AdminsController@vieweventid');
Route::get('/vieweventid/edit/{id}', 'AdminsController@editeventview')->name('editevent');
Route::post('/events/edit/{id}', 'AdminsController@editevent')->name('editevent');
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
Route::post('/admin/editfarmersave/{id}', 'AdminsController@saveeditfarmer');
Route::get('/back', 'AdminsController@back');
// Route::get('/admin/editprofile', 'AdminsController@editprofile');
Route::get('/admin/farmersreport', 'ReportController@farmersreport')->name('farmersreport');
Route::get('/farmers', 'ReportController@farmers');
Route::post('/farmersort', 'ReportController@farmersort');

Route::get('/admin/teareport', 'ReportController@teasreport')->name('teareport');
Route::post('/admin/teareport/sort', 'ReportController@teasreportsort')->name('teareportsort');
Route::get('/tea', 'ReportController@tea');


//eventscontoller
Route::post('/eventsperdate', 'EventController@eventsperday')->name('eventsperday');
//charts
Route::get('/dashboard', 'TeaController@admindash')->name('admindash');
Route::post('/admin/netperday', 'TeaController@netperday');
Route::post('/admin/netpermonth', 'TeaController@netpermonth');
Route::post('/farmersortline', 'TeaController@farmersline');
Route::post('//farmersbaryear', 'TeaController@farmersbaryear');
Route::post('/notificationsperdate', 'EventController@notificationsperday')->name('notificationsperday');
Route::post('/search', 'PostsController@search')->name('search');
Route::post('/back', 'PostsController@backa')->name('back');
Route::post('/email', 'PostsController@email');

Route::post('/post/{id}/comment', 'PostsController@commentstore');
//contact us
Route::post('/contactus', 'AdminsController@contactus');










