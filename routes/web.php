<?php


 Route::get('/', 'HomeController@index')->name('/');

Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
//middleware('auth')
Route::get('login', 'Auth\CustomAuthController@login')-> name('login');
Route::post('checklogin', 'Auth\CustomAuthController@checklogin')-> name('checklogin');
Route::get('logout', 'Auth\LoginController@logout');
Route::group(['middleware' => 'auth:admin','namespace' => 'Auth'], function (){
    Route::get('admin', 'CustomAuthController@admin')-> name('admin');
    Route::get('consulter_les_zones/','admin@consulter_les_zones')->name('consulter_les_zones');
    Route::get('add_zone/','admin@addzoneforme')->name('add_zone');
    Route::post('admin/create_zone/','admin@create_zone')->name('create_zone');
});
Route::group(['middleware' => 'auth:sub_admins','namespace' => 'Auth'], function (){
    Route::get('my_news/','sub_admins@my_news')->name('my_news');
    Route::get('add_news/','sub_admins@add_news')->name('add_news');
    Route::post('sub_admins/create_news/','sub_admins@create_news')->name('create_news');
    Route::get('/news_delet/{id}', 'sub_admins@delet')->name('news.delet');
    Route::get('/news_edit/{id}', 'sub_admins@edit')->name('news.edit');
    Route::post('/news_apdate/{id}', 'sub_admins@apdate')->name('news.apdate');
    Route::get('sub_admins', 'CustomAuthController@sub_admins')-> name('sub_admins');
});
Route::group(['middleware' => 'auth:web'], function (){
    Route::get('profil/','HomeController@profil')->name('profil');
});


#routes/web.php

Route::get('/changePassword', [App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
Route::post('/cchangePassword', [App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');


Route::group([], function() {
    Route::get('/changePassword',[App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
});


Route::get('news/','HomeController@news')->name('news');
Route::post('search/','HomeController@search')->name('search');
Route::get('news_details/{id}','HomeController@news_details')->name('news_details');
Route::post('add_commment/{id}','HomeController@add_commment')->name('add_commment');
Route::get('commentdelet/{id}','HomeController@commentdelet')->name('comment.delet');

