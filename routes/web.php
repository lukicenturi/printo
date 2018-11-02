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
Route::auth();
Route::get('/','MainController@getIndex');
Route::get('home', function(){
    return redirect('/');
});

Route::group(['middleware'=>'auth'],function(){
	Route::get('logout','Auth\LoginController@logout');
	Route::group(['prefix'=>'dashboard'],function(){
		Route::get('/','DashboardController@getIndex');
		Route::get('print','DashboardController@print');
		Route::get('top-up','DashboardController@topup');
		Route::post('buy','DashboardController@buy');
		Route::get('pay/{id}','DashboardController@pay');
		Route::post('submission','DashboardController@postSubmission');
		Route::get('submission/{id_topup}','DashboardController@getSubmission');
		Route::post('upload','DashboardController@upload');
		Route::post('print','DashboardController@postPrint');
		Route::get('confirm/{kode}','DashboardController@confirm');
		Route::post('confirm/','DashboardController@postConfirm');
		Route::get('accept/{id}','DashboardController@accept');
		Route::get('done/{id}','DashboardController@done');
		Route::get('confirmSent/{id}','DashboardController@confirmSent');
		Route::get('confirmPrinted/{id}','DashboardController@confirmPrinted');
		Route::get('withdraw','DashboardController@withdraw');
		Route::post('withdraw','DashboardController@postWithdraw');
	});
	Route::group(['prefix'=>'history'],function(){
		Route::get('top-up','HistoryController@topup');
		Route::get('print','HistoryController@print');
	});
	Route::get('atm','DashboardController@atm');
	Route::get('checkatm','DashboardController@checkatm');
	Route::get('atmpay','DashboardController@atmpay');
	Route::get('indomaret','DashboardController@indomaret');
	Route::get('checkindomaret','DashboardController@checkindomaret');
	Route::get('indomaretpay','DashboardController@indomaretpay');
});