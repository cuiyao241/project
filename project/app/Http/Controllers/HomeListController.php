<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeListController extends Controller
{
    public function getIndex(Request $request)
    {
        // echo 12345;
    	$id = $request->input('id');

        $res = DB::table('cate_goods')->where('pid',$id)->get();

        // $pro = DB::table('goods_images')->where('pid,');


        $ding = DB::table('cate')->where('id', $id)->first();



        $pro = [];
        foreach($res as $k=>$v){

        	$pro['size'] = explode(',', $v->size);
        	$pro['color'] =explode(',', $v->color);
        	
        }

        $pro['good'] = $res;

        // dd($pro);

        return view('homes.lists.list', ['pro'=>$pro, 'res'=>$res, 'ding'=>$ding]);
    }

    

    // public function postAdd(Request $request)
    // {
    // 	$res = $request->all();

    // 	dd($res);
    // }

}
