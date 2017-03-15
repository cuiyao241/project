<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    //
    public function getIndex()
    {
        return view('admins.login');

    }

    public function postTest(Request $request)
    {
        // var_dump(Hash::make('admin'));die;
        // dd($request->all());
        //获取表单信息
        $postUser = $request->except('_token');
        //获取输入用户名
        $newName = $postUser['username']; 
        // 获取输入密码
        $newPassword = $postUser['password'];
        
        // var_dump($postUser);
        // var_dump($newName);
        // var_dump($newPassword);die;
        //
        $user = DB::table('user')->where('User_name',$newName)->first();
        // dd($user);

        // if($isAdmin == 0){

        //     return back()->with('admin_login','没有登录权限');
        // }
        // dd($User_id);
        // var_dump($user->Password);
        // var_dump($newPassword);
        // dd($user);
        // die;
        
        //用户名判断
        if (!$user) {

            return back()->with('admin_login','用户不存在');

        } else {

            //判断是否为管理员
            if ($user->isAdmin == 1) {
                 //密码判断 
                if(Hash::check($postUser['password'], $user->Password)){
                 // if(Hash::check($newPassword, $user->Password)){
                    //存值
                    $User_id = $user->User_id;
                    session(['username'=>$newName]);
                    $isAdmin = $user->isAdmin;
                    session(['User_id'=>$User_id]);
                    return redirect('admin')->with('admin_logins','登录成功');

                } else {

                    return back()->with('admin_login','登录失败,密码错误!');
                }

            } else {

                return back()->with('admin_login','该用户非管理员!');
            
            }
        }

    }

    //退出
    public function getClose()
    {
        session(['username'=>null]);
        return redirect('login');
    }



   

}
