<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class HomeCartController extends Controller
{

    public function getOne()
    {	
    	$res[] = null;
    	$res = array('color'=>'红色','size'=>'xxl','num'=>'5','id'=>'13');
    	Session::push('cart',$res);
    }
    // public function getTwo()
    // {	
    // 	$res[] = null;
    // 	$res = array('color'=>'蓝色','size'=>'xl','num'=>'2','id'=>'14');
    // 	Session::push('cart',$res);
    // }
    // public function getTh()
    // {	
    // 	$res[] = null;
    // 	$res = array('color'=>'棕色','size'=>'xxxl','num'=>'1','id'=>'16');
    // 	Session::push('cart',$res);
    // }
    //加入购物车提醒
    public function postRemind(Request $request)
    {
    	$res = $request->except('_token');
    	//把数据存入到数据库
    	// Session::push('cart',$res);
        // dd($res);

    	return view('homes.cart.remind');
    }

    //购物车
    public function getShopcart()
    {
    	$data = Session::get('cart');

    	

    	foreach ($data as $k => $v) {
    		$data[$k]['sub_cart'] = DB::table('cate_goods')->where('id',$v['id'])->first();
    	}
    	// echo '<pre>';
    	// var_dump($data);
    	return view('homes.cart.cart',['data'=>$data]);

    }

}
