<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class AdminConfController extends Controller
{

    public function getIndex(Request $request)
    {
         return view('admins/edit');
    }

    public function getEdit()
    {
        $res = DB::table('conf')->first();
        // dd($res->description);
        return view('admins.conf.edit', ['res'=>$res]);
    }

    public function postUpdate(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required|between:1,10',
            'keywords' => 'required|between:1,20',
            'description'=>'required|between:1,20',
            'copyright' => 'required|between:1,20',
            'logo' => 'required|image',
            ],[
            'title.required' => '标题不能为空',
            'title.regex' =>'标题格式不正确',
            'keywords.required' => '关键字不能为空',
            'keywords.regex' => '关键字格式不正确',
            'description.required' => '网站描述不能为空',
            'description.regex' =>'描述格式不正确',
            'copyright.required' => '版权不能为空',
            'copyright.regex' =>'版权格式不正确',
            'logo.required' => 'logo不能为空',
            'logo.regex' =>'图片格式不正确',
            ]);

            //获取信息
            $res = $request->except('_token');

            //判断文件上传
            if($request->hasFile('logo')){

                //修改上传文件名字
                $name = rand(1111,9999).time();
                //获取上传文件后缀
                $suffix = $request->file('logo')->getClientOriginalExtension();

                $request->file('logo')->move('./upload/',$name.'.'.$suffix);

            }

            //把上传的图片存储到数据库
            $res['logo'] = '/upload/'.$name.'.'.$suffix;

            //网站开关
            // $res['open'] = '1';

            //数据修改
            $pro = DB::table('conf')->update($res);

            //判断结果
            if($pro){

                return redirect('/admin/conf/edit')->with('cg','修改成功');
            
            } else {

                return redirect('/admin/conf/edit')->with('sb','修改失败');
        }
    }
}

