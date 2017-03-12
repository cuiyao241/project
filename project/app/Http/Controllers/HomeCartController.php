<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class HomeCartController extends Controller
{

    //加入购物车提醒
    public function postRemind(Request $request)
    {
    	$res = $request->except('_token');
    	//把数据存入到数据库
    	Session::push('cart',$res);
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
        // dd();
    	return view('homes.cart.cart',['data'=>$data]);

    }
    //删除
    public function getDel(Request $request)
    {
        $id = $request->input('id');
        $color = $request->input('color');
        $size = $request->input('size');

        $res = Session::get('cart');
        
        // echo '<pre>';
        // var_dump($id);die;
        foreach ($res as $k => $v) {
            if ($v['id'] == $id && $v['color'] == $color && $v['size'] == $size) {
                Session::forget('cart.'.$k);
                return '1';
            }
        }
    return '0';
    }

}
