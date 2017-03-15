<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminFriendsController extends Controller
{
    //友情链接
    public function getIndex()
    {
        $res = DB::table('link')->get();
        // dd($res);
    	return  view('admins.friends.friends',['res'=>$res]);
 
    }
    
    // 添加页面
    public function getAdd()
    {
        return  view('admins.friends.add');
    }

    // 添加方法
    public function postInsert(Request $request)
    {
    	$res = $request->except('_token');
        $data = DB::table('link')->insert($res);
       	
       	if ($data) {
            return redirect("admin/friends");
        } else {
            return redirect("admin/friends");
        }
    	
    }

    //修改页面
    public function getEdit($link_Id)
    {

        $res = DB::table('link')->where('link_Id',$link_Id)->first();
        // dd($res);
        return view('admins.friends.edit',['res'=>$res]);

    }

    //修改数据方法
    public function postUpdate(Request $request)
    {
        $res = $request->except('_token','link_Id');
        // dd($res);
        $link_Id = $request->link_Id;
        // dd($link_Id);
        $update = DB::table('link')->where('link_Id',$link_Id)->update($res);
        //判断是否修改成功
        if ($update) {
            return redirect("admin/friends");    
        } else {
            return redirect("admin/friends");         
        }

    }

    //删除订单
    public function getDelete($link_Id)
    {   

        $res = DB::table('link')->where('link_Id',$link_Id)->delete();

        if ($res) {
            return redirect("admin/friends");    
        } else {
            return redirect("admin/friends");         
        }

    }

}
