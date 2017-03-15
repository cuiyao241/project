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
        $status = $user->Status;
        $User_name = $user->User_name;
        // $User_id = $user->User_id;

        // var_dump($user->Password);die;
        // dd($User_name);

        // die;
        
        //用户名判断
        if (!$user) {

            return back()->with('into','用户不存在');

        } else {

                 //密码判断
                if(Hash::check($postUser['Password'], $user->Password)){
                   
                	// session(['Status'=>$status]);
                	// session(['User_name'=>$User_name]);

                	Session::put('Status',$status);
                    Session::put('User_name',$User_name);
                	// dd($status);
                	// $_SESSION['Status'] = $status;



                    return redirect('home')->with('into','登录成功');

                } else {

                    return back()->with('into','密码错误!');
                }

            
        }
    }

    public function getClose()
    {
        session(['status'=>null]);
        
        return redirect('home');

}
}
