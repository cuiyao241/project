<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;
class AdminUserController extends Controller
{
    public function getIndex(Request $request)
    {
        // search 搜索用户名 num 每页的条数
        $res = DB::table('user')->
        where('User_name','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));

        // dd($res);
        return view('admins.user.index',['res'=>$res]);
        
    }

    public function getAdd()

    {
        //后台的用户添加页面
        return view('admins.user.add');

    }

        //后台用户的数据添加
    public function postInsert(Request $request)
    {
        
        // 表单验证
        $this->validate($request,[

            'User_name' => 'required|regex:/^\S{5,12}$/|unique:user',
            'Password' => 'required|regex:/^\w{5,12}$/',
            'rePassword'=>'required|same:Password',
            'Emails' => 'required|email',
            'Phonecode' => 'required|regex:/^1[34578]\d{9}$/',
            ],[

            'User_name.required' => '用户名不能为空',
            'User_name.regex' =>'用户名格式不正确',
            'User_name.unique' => '用户名已存在',
            'Password.required' => '密码不能为空',
            'Password.regex' => '密码格式不正确',
            'rePassword.required' => '确认密码不能为空',
            'rePassword.same' => '俩次密码不一致',
            'Emails.required' => '邮箱不能为空',
            'Emails.email' => '邮箱格式不正确',
            'Phonecode.required' => '手机号码不能为空',
            'Phonecode.regex' => '手机号码格式不正确',
            ]);

        // 表单验证
        $res = $request->except('_token','rePassword','Profile');
        // echo '<pre>';
        // var_dump($res);die;
        //判断文件上传
        if($request->hasFile('profile')){
            //自定义上传的文件名
            $names = rand(1111,9999).time();
            // dd($names);
            //获取上传文件的后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./upload/',$names.'.'.$suffix);
        }

        //把上传的图片存储到数据库中
        $res['profile'] = '/upload/'.$names.'.'.$suffix;

        //哈希加密密码
        $res['Password'] = Hash::make($request->input('Password'));



        //用户的添加
        $pro = DB::table('user')->insert($res);
        //判断结果
        if($pro){

            return redirect('/admin/user/index')->with('info','添加成功');
        } else {

            return back();
        }
    }

    public function postEdit($id)
    {
        $res = DB::table('user')->where('id','=',$id)->first();

        return view('admins/user/edit',['res'=>$res]);
    }
}
