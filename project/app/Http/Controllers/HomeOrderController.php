<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class HomeOrderController extends Controller
{
    //


    public function postOrder(Request $request)
    {
    	$res = $request->except('_token');
    	$pics = $request->input('pic');
    	$titles = $request->input('title');
    	$colors = $request->input('color');
    	$sizes = $request->input('size');
    	$prices = $request->input('price');
    	$nums = $request->input('num');

    	// dd($nums);
    	// $data = [];
    	foreach ($titles as $k => $v) {
    		$tmp = DB::table('cate_goods')->where('title',$v)->first();
    		$tmp->newnum = $nums[$k];
    		$tmp->newcolor = $colors[$k];
    		$tmp->newsize = $sizes[$k];
    		$data[] = $tmp;	
    	}
	    	// dd($data);
	  	
    	return view('homes.cart.order',['data'=>$data]);
    }
}
