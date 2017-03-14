<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomeListController extends Controller
{
    /**
    *   商品列表页
    */
    public function getIndex(Request $request)
    {

    	$id = $request->input('id');

        $res = DB::table('cate_goods')->where('pid',$id)->get();


        $ding = DB::table('cate')->where('id', $id)->first();

        $pro = $this->func($res);

        return view('homes.lists.list', ['pro'=>$pro, 'res'=>$res, 'ding'=>$ding]);
    }

    /**
    *   热销商品列表
    */

    public function getHots(Request $request)
    {

        $title = $request->input('title');

        $res = DB::table('cate_goods')->where('isHot', 1)->get();

        $pro = $this->func($res);
        

        return view('homes.lists.status', ['pro'=>$pro, 'res'=>$res, 'title'=>$title]);

    }

    /**
    *   新品商品列表
    */
    public function getNews(Request $request)
    {

        $title = $request->input('title');

        $res = DB::table('cate_goods')->where('isNew', 1)->get();

        $pro = $this->func($res);        

        return view('homes.lists.status', ['pro'=>$pro, 'res'=>$res, 'title'=>$title]);

    }

    /**
    *   新品商品列表
    */
    public function getZhes(Request $request)
    {

        $title = $request->input('title');

        $res = DB::table('cate_goods')->where('isZhe', 1)->get();

        $pro = $this->func($res);        

        return view('homes.lists.status', ['pro'=>$pro, 'res'=>$res, 'title'=>$title]);

    }


    /**
    *   新品商品列表
    */
    public function getAll(Request $request)
    {
        $title = $request->input('title');

        $res = DB::table('cate_goods')->get();

        $pro = $this->func($res);        

        return view('homes.lists.status', ['pro'=>$pro, 'res'=>$res, 'title'=>$title]);
    }

    /**
    *   自定义函数，获取服装样式 
    */
    public function func($res)
    {

        $pro = [];
        foreach($res as $k=>$v){

            $pro['size'] = explode(',', $v->size);
            $pro['color'] =explode(',', $v->color);
            
        }

        $pro['good'] = $res;

        return $pro;
    }

    public function getAjax(Request $request)
    {
       

        $id = $request->input('id');

        $totZan = $request->input('totZan');

        $res['totZan'] = $totZan;

        $zan = Session::get($id);

        if($zan){

            return 0;

        } else {

            $pro =  DB::table('cate_goods')->where('id', $id)->update($res);

                if($pro){
         
                    echo 1;
                    Session::put($id, 1);

                } else {
         
                    echo 0;
                }


        }

 
            

        

            
        
    }

    /**
    *   数据测试使用
    */

    // public function postAdd(Request $request)
    // {
    //     // var_dump();
    //     $res = $request->except('_token');

    //     dd($res);
    // }

}
