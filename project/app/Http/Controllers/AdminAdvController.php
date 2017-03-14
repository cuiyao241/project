<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class AdminAdvController extends Controller
{
    //轮播控制器 
    public function getIndex()
    {
    	$res = DB::table('home_adv')->where('pid',0)->orderBy('tid', 'asc')->get();

    	// dd($res);
    	return view('admins.conf.adv', ['res'=>$res]);
    }

    // public function getAdd()
    // {

    // }

    /**
    *    轮播图排序
    */
    public function postUpdate(Request $request)
    {

        // dd($request->all());
        $tid = $request->input('tid');

        //判断文件上传
        if($request->hasFile('lunbo')) {

            $new = $request->file('lunbo');

           $maxtid = DB::table('home_adv')->max('tid');

            foreach($new as $k => $v){

                //自定义上传文件的名字
                $names = rand(1111,9999).time();

                //获取上传文件的后缀
                $suffix = $v->getClientOriginalExtension();

                $v->move('./images/',$names.'.'.$suffix);

                $exc['pid'] = 0;
                $exc['tid'] = ++$maxtid;
                $exc['pic'] = '/images/'.$names.'.'.$suffix;

                
                DB::table('home_adv')->insert($exc);

            }
        
        }


        foreach($tid as $k=>$v){

          $pth = DB::table('home_adv')->where('id', $k+1)->update(['tid'=>$v]);

        }

        $res = DB::table('home_adv')->where('pid',0)->orderBy('tid', 'asc')->get();

        return back();
    }


    /**
    *   轮播图删除 ajax   
    */
    public function getDel(Request $request)
    {
    	$id = $request->input('id');

    	$res = DB::table('home_adv')->where('id', $id)->delete();

    	if($res){

    		echo 1;

    	} else {

    		echo 0;

    	}

    }

}
