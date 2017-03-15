<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class HomeAddressController extends Controller
{

    //
    public function getIndex()
    {
    	$User_name = session('User_name');
    	// dd($User_name);
        $data = DB::table('order_address')->where('User_name',$User_name)->get();
        // dd($data);

        return  view('homes.pers.address',['data'=>$data]);

    } 

    public function postAdd(Request $request)
    {
    	$User_name = $request->input('User_name');
    	// dd($User_name);
        return  view('homes.pers.addAddress',['User_name'=>$User_name]);
    }

    public function postInsert(Request $request)
    {
    	$res = $request->except('_token');
    	// dd($res);
    	// $User_name = $request->input('User_name');
    	// dd($User_name);
        $data = DB::table('order_address')->insert($res);
       	
       	if ($data) {
            return redirect("/home/address");
        } else {
            return redirect("/home/address");
        }
    	
    }

    //修改订单
    public function getEdit($Address_id)
    {
    	// dd($Address_id);
        $data = DB::table('order_address')->where('Address_id',$Address_id)->first();
        return view('homes.pers.editAddress',['data'=>$data]);

    }

    //修改数据方法
    public function postUpdate(Request $request)
    {
        $res = $request->except('_token','Address_id');
        // dd($res);
        $Address_id = $request->Address_id;
        // dd($Address_id);

        $update = DB::table('order_address')->where('Address_id',$Address_id)->update($res);

        //判断是否修改成功
        if ($update) {
            return redirect("/home/address");

        } else {
           
            return redirect("/home/address");      
        }

    }

    //删除订单
    public function getDelete($Address_id)
    {   
        // dd($Address_id);

        $res = DB::table('order_address')->where('Address_id',$Address_id)->delete();

        if ($res) {
            return redirect("/home/address");
        } else {
            return redirect("/home/address");
        }
    }

    //设置默认
    public function getDefault(Request $request)
    {
    	$res = $request->except('_token');
        // dd($res);
        $Address_id = $request->Address_id;
        $User_name = $request->User_name;
        // dd($User_name);

        $Default = DB::table('order_address')
        	->where('Address_id',$Address_id)
        	->where('User_name',$User_name)
        	->update(['default'=>1]);

        $NoDefault = DB::table('order_address')
        	->where('Address_id','<>',$Address_id)
        	->where('User_name',$User_name)
        	->update(['default'=>0]);
        
        if ($Default && $NoDefault) {
        	return redirect("/home/address");
        } else {
            return redirect("/home/address");
        }
        
        
    }


}
