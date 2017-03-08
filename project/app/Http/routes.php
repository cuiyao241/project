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





//后台登录
Route::controller('login','AdminLoginController');

//分组-后台
Route::group(['middleware'=>'Login'],function(){

	//后台用户
	Route::get('admin','AdminController@index');
	//用户操作
	Route::controller('admin/user','AdminUserController');
	//订单详情
	Route::controller('admin/order','OrderController');
	//分类详情
	Route::controller('admin/cate','AdminCateController');
	//商品详情
	Route::controller('admin/goods','AdminGoodsController');
	

});

//分组-前台
Route::group([],function(){

	//后台用户
	Route::get('home','HomeController@index');
	//用户操作 //注册
	Route::controller('home/user','HomeRegisterController');
	//订单详情
	Route::controller('home/order','HomeOrderController');
	
});

//404
Route::get('404',function(){
	adort('404');
});

