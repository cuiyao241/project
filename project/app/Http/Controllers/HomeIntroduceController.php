<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeIntroduceController extends Controller
{
    public function getIndex($id)
    {
    	$res = DB::table('cate_goods')->where('id', $id)->first();

    	$das = DB::table('goods_images')->where('pid',$id)->get();


    	$goods['color'] = explode(',', $res->color);

    	$goods['size'] = explode(',', $res->size);

    	// dd(explode('，', $res->color));

    	//同类商品
    	$pro = DB::table('cate_goods')->where('pid', $res->pid)->get();

    	// dd($das);
   
    	return view('homes.lists.introduce',['res'=>$res, 'das'=>$das, 'goods'=>$goods, 'pro'=>$pro]);
    }
}
