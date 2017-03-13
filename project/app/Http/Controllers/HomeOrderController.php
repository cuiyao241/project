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
        $titles = $request->input('title');
    	$colors = $request->input('color');
    	$sizes = $request->input('size');
    	$nums = $request->input('num');
        $infos = $request->input('cartCheckBox');


        foreach ($infos as $k => $v) {

            // dd(explode(",",$v));
            $vValue = explode(",",$v);
            $vId = explode(",",$v)[0];
            $vColor = explode(",",$v)[1];
            $vSize = explode(",",$v)[2];
            $vNum = array_pop($vValue);
            
            $tmp = DB::table('cate_goods')->where('id',$vId)->first();
            $tmp->newnum = $vNum;
            $tmp->newcolor = $vColor;
            $tmp->newsize = $vSize;
            $data[] = $tmp; 
        }

	    	// dd($data);
	  	$address = DB::table('order_address')->where('User_name',"崔尧")->get();
        // dd($address);
    	return view('homes.cart.order',['data'=>$data,'address'=>$address]);
    }

    public function postOrderinsert(Request $request)
    {
        $res = $request->except('_token');
        $newcs = $request->input('newc');
        $newsizes = $request->input('newsize');
        $newnums = $request->input('newnum');
        $pics = $request->input('pic');
        $prices = $request->input('prices');
        $urls = $request->input('url');
        $tits = $request->input('tit');

        // dd($tits);
        $into = [$tits,$newcs,$newsizes,$newnums,$pics,$prices,$urls];

        dd($into);

    }

}
