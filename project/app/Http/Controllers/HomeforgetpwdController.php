<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeforgetpwdController extends Controller
{
    //忘记密码第一步
     public function getIndex()
    {
        return view('homes.user.forgetone');
    }

    public function postUsername(Request $request)
    {
        
        $User_name = $request->input('User_name');
         
        $res = DB::table('user')->where('User_name',$User_name)->first();
         // dd($res);
        if($res){

            return view('homes.user.forgettwo',['res'=>$res]);
        }else{

            return back()->with('into','用户名错误');
        }
    }

    //  public function getVertwo()
    // {
    //     return view('homes.user.forgetone');
    // }


    public function postForgettwo(Request $request)
    {

       $data = $request->all();
       $data['token'] = str_random(50);
       // dd($res);
       $res = DB::table('user')->where('User_name',$data['User_name'])->first();
       // echo '<pre>';
       // var_dump($data);
       if($data['Emails'] == $res->Emails){
             $User_name = $res->User_name;
             //发送邮件
            $this->getSendmail($User_name,$data['token'],$data['Emails']);
            return view('homes.user.jc');
       }else{

         return view('homes.user.forgettwo',['res'=>$res])->with('into','邮箱错误');
       }
    }

    public function getForgetthree(Request $request)
    {
        $res = $request->input('User_name');
        // dd($res);
        // $data = DB::table('user')->where('User_name',$res['User_name'])->first();

        return view('homes.user.forgetthree',['res'=>$res]);
    }

    public function postForupdate(Request $request)
    {
        // $res = $request->all();

        // dd($res);
        // 表单验证
        $this->validate($request,[

            'Password' => 'required|regex:/^\w{5,12}$/',
            'rePassword'=>'required|same:Password',
            ],[      
            'Password.required' => '密码不能为空',
            'Password.regex' => '密码格式不正确',
            'rePassword.required' => '确认密码不能为空',
            'Password.regex' => '确认密码格式不正确',
            'rePassword.same' => '俩次密码不一致',
        ]);

        $User_name = $request->input('User_name');

        $res = $request->except('_token','rePassword','oldPassword');

        // 哈希加密密码
        $res['Password'] = Hash::make($request->input('Password'));

        $pro = DB::table('user')->where('User_name',$User_name)->update($res);

         if($pro){

                return redirect("/home/forgetpwd/forgetfor");
            } else {

                return back()->with('into','注册失败');
        }

    }

    public function getForgetfor()
    {
        return view('homes.user.forgetfour');
    }
   /*
    ** 发送邮件
     */
    public function getSendmail($User_name,$token,$Emails)
    {
        $host = $_SERVER['SERVER_NAME'];
        $url = "<a href='".$host."/home/forgetpwd/forgetthree?User_name=$User_name&token=$token'>点击修改密码</a>";
        Mail::raw($url, function ($message) use($Emails){
            //邮件标题
            $message->subject('找回密码');
            $message->to($Emails);
        });
    }

}


