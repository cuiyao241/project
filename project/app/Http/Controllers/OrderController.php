<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{

    //订单详情页
    public function getIndex(Request $request)
    {
       	$res = DB::table('orderinfo')->
       		where('ReceiverName','like','%'.$request->input('search').'%')->
       		paginate($request->input('num',10));
       
        return view('admins.order.index',['res'=>$res,'request'=>$request]);

    }

    //商品详细信息
    public function getAllinfo($id)
    {	

    	$res = DB::table('orderinfo')->where('Order_id',$id)->get();
    	// echo '<pre>';
    	// var_dump($res);
    	return view('admins.order.allInfo',['res'=>$res]);
    }

    //确认订单
    public function getClose($id)
    {   
        // var_dump($id);

        $res = DB::table('orderinfo')->where('Order_id',$id)->update(['IsConfirm'=>1,'IsPayment'=>1,'IsConsignment'=>1]);
        if ($res) {
            return back()->with('info','订单关闭成功!');
        } else {
            return back()->with('infos','订单关闭失败,请重新关闭');
        }
    }

    //修改页面
    public function getEdit($id)
    {

    	$res = DB::table('orderinfo')->where('Order_id',$id)->get();
    	return view('admins.order.edit',['res'=>$res,'id'=>$id]);

    }

    //修改数据方法
    public function postUpdate(Request $request)
    {
    	$res = $request->except('_token','Order_id');
    	// echo '<pre>';
    	// var_dump($res);
    	$Order_id = $request->Order_id;
    	// echo $Order_id;

    	$update = DB::table('orderinfo')->where('Order_id',$Order_id)->update($res);
		//判断是否修改成功
		if ($update) {
            return redirect("/admin/order/allinfo/$Order_id")->with('order_edit','恭喜,修改成功!');
            // echo '成功';

        } else {
           
            return redirect("/admin/order/allinfo/$Order_id")->with('order_edit_X','修改失败,请重新修改!');
            
        }

    }

    //删除订单
    public function getDelete($id)
    {   
        // var_dump($id);

        $res = DB::table('orderinfo')->where('Order_id','=',$id)->delete();

        if ($res) {
            return redirect("/admin/order/index")->with('order_delete','恭喜,删除成功');
        } else {
            return redirect("/admin/order/index")->with('order_delete_X','订单删除失败,请重新删除!');
        }
    }



}
