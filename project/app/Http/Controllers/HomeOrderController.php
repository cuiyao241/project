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

        $User_name = session('User_name');
	    	// dd($data);
	  	$address = DB::table('order_address')->where('User_name',$User_name )->get();
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
        $ReceiverName = $request->input('ReceiverName');
        $ReceiverPhone = $request->input('ReceiverPhone');
        $ReceiverAddress = $request->input('ReceiverAddress');
        $User_name = $request->input('User_name');
        $Leave = $request->input('Leave');
        $TotalPrice = $request->input('TotalPrice');


        
        $time = date("Y-m-d H:i",time());
        // dd($TotalPrice);
        
        $into = [$tits,$newcs,$newsizes,$newnums,$pics,$prices,$urls,$TotalPrice];
        // dd($into);
        $ids = [];
        $cou = count($into['0']);
        
        for ($i=0; $i < $cou; $i++) { 
            foreach ($into as $k => $v) {
            // echo '<pre>';
            // var_dump($v);    
                $ids[$i][] = $v[$i];
            }  
        }
        // dd($ids);
        // echo '<pre>';

        for ($i=0; $i < $cou; $i++) { 
            // var_dump($ids[$i][5]);
            DB::table('orderinfo')->insert([
                'UserName'=>$User_name,
                'ReceiverName'=>$ReceiverName,
                'ReceiverPhone'=>$ReceiverPhone,
                'ReceiverAddress'=>$ReceiverAddress,
                'GoodsName'=>$ids[$i][0],
                'GoodsNum'=>$ids[$i][3],
                'GoodsSize'=>$ids[$i][2],
                'GoodsColor'=>$ids[$i][1],
                'GoodsFee'=>$ids[$i][5],
                'TotalPrice'=>$ids[$i][7],
                'OrderDate'=>$time,
                'Leave'=>$Leave,
                'GoodsUrl'=>$ids[$i][6]
                ]);
        }
       
        return view('homes.cart.orderSuccess');
    }

    public function getAjaxorder(Request $request)
    {
        $aname = $request->input('aname');
        // $id = $asd->aid;
        $res = DB::table('order_address')->where('User_name',$aname)->where('default',1)->get();
            
        return $res;
            
        
    }
    public function getAjaxordertwo(Request $request)
    {
        $aid = $request->input('aid');
        
        $res = DB::table('order_address')->where('Address_id',$aid)->get();
            
        return $res;
            
        
    }



}
