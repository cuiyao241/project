<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//创建session
Route::get('session',function(){
	session(['gid'=>'15']);
	echo '登入成功';
});

Route::get('login',function(){
	echo '这是登录';
});

//分组-后台
Route::group(['middleware'=>'Login'],function(){

	//后台用户
	Route::get('admin','AdminController@index');
	//用户操作
	Route::controller('admin/user','AdminUserController');
});

//分组-前台
Route::group([],function(){
	Route::get('home',function(){
		
		echo '这是前台';
	
	

	});	
});

//404
Route::get('404',function(){
	adort('404');
});

