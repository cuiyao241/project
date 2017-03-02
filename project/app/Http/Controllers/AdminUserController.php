<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminUserController extends Controller
{

	public function getIndex()
    {
        echo '12357';
    }
	//后台的用户的添加页面
    public function getAdd()
    {

    	return view('admins.user.add');
    }
   
    //后台用户的添加数据处理的方法
    public function postInsert(Request $request)
    {
    	//表单验证
    	$this->validate($request,[
    			'username' => 'required|regex:/^\S{8,16}$/|unque:user',
    			'password' => 'required|regex:/^\w{6,12}$/',
            	'repassword'=>'required|same:password',
            	'email'=> 'required|email',
            	'phone'=> 'required|regex:/^1[34578]\d{9}$/',

    		],[
    			'username.required' => '用户名不能为空',
	            'username.regex'=>'用户名格式不正确',
	            'username.unique'=>'用户名已存在',
	            'password.required'=>'密码不能为空',
	            'password.regex'=>'密码格式不正确',
	            'repassword.required'=>'确认密码不能为空',
	            'repassword.same'=>'两次密码不一致',
	            'email.required'=>'邮箱不能为空',
	            'email.email'=>'邮箱格式不正确',
	            'phone.required'=>'手机号码不能为空',
	            'phone.regex'=>'手机号码格式不正确'

    		]);
    		//获取表单传过来的信息
    		$res = $request->except('_token',
    			'profile','repassword');
    		//判断文件上传
	        if($request->hasFile('profile')) {
	            //自定义上传文件的名字
	            $names = rand(1111,9999).time();
	            //获取上传文件的后缀
	            $suffix = $request->file('profile')->getClientOriginalExtension();

	            $request->file('profile')->move('./upload/',$names.'.'.$suffix);
	        }
	        //把上传的图片存储到数据库中
	        $res['profile'] = '/upload/'.$names.'.'.$suffix;

	        //哈希加密密码
	        $res['password'] = Hash::make($request->input('password'));
	        //用户的状态
	        $res['status'] = '0';
	        //数据的添加
	        $pro = DB::table('user')->insert($res);
	        //判断结果
	        if($pro) {

	            return redirect('/admin/user/index');
	        } else {

	            echo '添加失败';
	        }
    }

}
