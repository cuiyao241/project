<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;
class HomeLoginController extends Controller
{
    //
    public function getIndex()
    {

    	return view('homes.logined');
    }

    public function postTest(Request $request)
    {

        // echo 1234;
        // die;

        // dd($request->all());
    	//获取表单信息
    	$postUser = $request->except('_token');
        // dd($postUser);

    	//表单中获取输入的用户名
        $newName = $postUser['User_name']; 
        // dd($newName);

        //表单中获取的输入的密码
        $newPassword = $postUser['Password'];
		// dd($newPassword);

        //通过用户名查询密码	
        $user = DB::table('user')->where('User_name',$newName)->first();
        // $Status = $user->Status;
        // dd($user);
        if(!$user){

            return back()->with('into','请输入有效字段');

        }
        $User_name = $user->User_name;
        $Profile = $user->Profile;
        $nickname = $user->nickname;
        // dd($user);
        
        // $User_id = $user->User_id;

        // var_dump($user->Password);die;
        // dd($User_name);

        // die;
        
        //用户名判断
        if (!$user) {

            return back()->with('into','用户不存在');

        } else {
        		// if($newName){

                 //密码判断
                if(Hash::check($postUser['Password'], $user->Password)){
                   
                	session(['Status'=>$Status]);
                	session(['User_name'=>$User_name]);
                	session(['Profile'=>$Profile]);
                    session(['nickname'=>$nickname]);
                	// Session::put('Status',$status);
                    // Session::put('User_name',$User_name);
                    // Session::put('User_id',$User_id);
                	// dd($status);
                	// $_SESSION['Status'] = $status;



                    return redirect('home')->with('into','登录成功');

                } else {

                    return back()->with('into','密码错误!');
                }

            // }
        }
    }

    public function getClose()
    {
        session(['Status'=>null]);
        session(['User_name'=>null]);
        session(['Profile'=>null]);
        session(['nickname'=>null]);
        // session(['User_id'=>null]);
        return redirect('home');
    }


}
