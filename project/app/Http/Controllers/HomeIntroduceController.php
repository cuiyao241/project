<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeIntroduceController extends Controller
{   
    //传入商品id
    public function getIndex($id)
    {
    	$res = DB::table('cate_goods')->where('id', $id)->first();

    	$das = DB::table('goods_images')->where('pid',$id)->get();


    	$goods['color'] = explode(',', $res->color);

    	$goods['size'] = explode(',', $res->size);

        // //查询商品订单ID

        // $posts = DB::select('select post.*,orderinfo.GoodsColor,orderinfo.GoodsSize from post join orderinfo on post.UserName = orderinfo.UserName and post.GoodsName = orderinfo.GoodsName');

        //查询留言信息
        $post = DB::table('post')->where('GoodsName', $res->title)->get();


       

            foreach($post as $k => $v){

            $posts = DB::table('orderinfo')   
                    ->where("UserName", $v->UserName)
                    ->where('GoodsName', $v->GoodsName)
                    ->get();

            // $posts[$k][] = $v;
            
        }
        


        /**
        *   两条sql语句
        */
        // select post.*,orderinfo.GoodsColor,orderinfo.GoodsSize from post,orderinfo where post.UserName = orderinfo.UserName and post.GoodsName = orderinfo.GoodsName

        // select post.*,orderinfo.GoodsColor,orderinfo.GoodsSize from post join orderinfo on post.UserName = orderinfo.UserName and post.GoodsName = orderinfo.GoodsName


    	//同类商品
    	$pro = DB::table('cate_goods')->where('pid', $res->pid)->get();


        if($post){

            return view('homes.lists.introduce',[

            'res'=>$res, 
            'das'=>$das, 
            'goods'=>$goods, 
            'pro'=>$pro,
            'post'=>$post,
            'posts'=>$posts

            ]);

        } else{


            return view('homes.lists.introduce',[

            'res'=>$res, 
            'das'=>$das, 
            'goods'=>$goods, 
            'pro'=>$pro,
            'post'=>$post,


            ]);

        }
    	
    }
}
