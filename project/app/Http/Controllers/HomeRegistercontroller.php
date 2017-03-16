<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRegisterRequest;
use DB;
use Hash;
use Session;
use Gregwar\Captcha\CaptchaBuilder;



class HomeRegistercontroller extends Controller
{
    /**
    *    显示用户注册页面
    */

    public function getRegister()
    {
        return view('homes.user.register');
    }

    public function postDoregister(HomeRegisterRequest $request)
    {
        // echo 1234;
        // dd($request->all());

        $res = $request->except('_token','rePassword','Captcha');
        // dd($res);
        
        $res['Password'] = Hash::make($request->input('Password'));
        // dd();

        $res['Status'] = '1';

        $res['nickName'] = $request->input('User_name');
        // dd($res);

        $data = DB::table('user')->insert($res);

        // dd($data);

        if($data){

            return redirect('home')->with('into','注册成功');
        } else {

            return back()->with('into','注册失败');
        }
        // return back();
        if (Session::get('Captcha') != $res['Captcha']) {

            return back()->with('info','验证码错误!');
        }
    }

      public function getCaptcha()
    {
                //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 180, $height = 80, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('captcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }


} 