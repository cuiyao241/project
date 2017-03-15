<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class HomePersonalController extends Controller
{

    //个人中心首页
     public function getIndex()
    {
        $User_name = session('User_name');
        // dd($User_name);
        $data = DB::table('user')->where('User_name',$User_name)->first();
        return view('homes.pers.index',['data'=>$data]);
    }

    
    //修改个人信息
    public function getEdit()
    {
        $User_name = session('User_name');
    
        $data = DB::table('user')->where('User_name',$User_name)->first();
        // dd($data);
        return view('homes.pers.edit',['data'=>$data]);
    }
  
    public function postUpdate(Request $request)
    {
        $data = $request->except('User_id','_token');
       
        $User_name = $request->input('User_name');

        $res = DB::table('user')->where('User_name',$User_name)->update($data);
         // dd($res);
        if($res){
            return redirect("/home/personal/index");
        }else{
            return back()->with('info','修改失败');

        }
        // if ($data) {
    //         return redirect("/home/address");
    //     } else {
    //         return redirect("/home/address");
    //     }
    }

    //修改头像
     public function getProedit()
    {
        $User_name = session('User_name');

        $data = DB::table('user')->where('User_name',$User_name)->first();
        // dd($id);
        return view('homes.pers.profile',['data'=>$data]);
    }
    
    public function postProupdate(Request $request)
    {   

        $data = $request->except('_token');
        $User_name = $request->input('User_name');
        
        if($request->hasFile('Profile')){
            //自定义上传的文件名
            $names = rand(1111,9999).time();
          
            //获取上传文件的后缀
            $suffix = $request->file('Profile')->getClientOriginalExtension();

            $request->file('Profile')->move('./upload/',$names.'.'.$suffix);

              //把上传的图片存储到数据库中
            $res['profile'] = '/upload/'.$names.'.'.$suffix;
        }

         $pro = DB::table('user')->where('User_name',$User_name)->update($res);

        if($pro){
            return back()->with('info','修改成功');
        }else{
            return back()->with('info','修改失败!');
        }
    }

    //修改密码
    public function getPwdedit()
    {
        $User_name = session('User_name');

        $data = DB::table('user')->where('User_name',$User_name)->first();
        // dd($data);
        return view('homes.pers.Setpassword',['data'=>$data]);
    }
  
    public function postPwdupdate(Request $request)
    {   

        // 表单验证
        $this->validate($request,[

            'oldPassword'=>'required',
            'Password' => 'required|regex:/^\w{5,12}$/',
            'rePassword'=>'required|same:Password',
            ],[      
            'oldPassword.required' => '旧密码不能为空',
            'Password.required' => '密码不能为空',
            'Password.regex' => '密码格式不正确',
            'rePassword.required' => '确认密码不能为空',
            'rePassword.same' => '俩次密码不一致',
        ]);
        $res = $request->except('_token','rePassword','oldPassword');
        
        $User_name = $request->input('User_name');

        $opwd = $request->input('oldPassword');

        $data = DB::table('user')->where('User_name',$User_name)->first();

        $pwd = $data->Password;
        // dd($pwd);
        if (Hash::check($opwd, $pwd)) {

             //哈希加密密码
             $res['Password'] = Hash::make($request->input('Password'));
             // dd($res);
             $pro = DB::table('user')->where('User_name',$User_name)->update($res);

            return redirect("/home");
         } else {

            return back()->with('info','修改失败,请重新修改!');
        }
    } 


    //全部订单
    public function getOrder()
    {
        $User_name = session('User_name');

        $data = DB::table('orderinfo')
            ->join('cate_goods','orderinfo.GoodsName','=','cate_goods.title')
            ->select('orderinfo.*','cate_goods.pic')
            ->where('UserName',$User_name)
            ->get();
                        
        // dd($data);
        return view('homes.pers.order',['data'=>$data]);

    }   
    public function postOrdok(Request $request)
    {
        $Order_id = $request->input('Order_id');
        // dd($Order_id);
        $res = DB::table('orderinfo')->where('Order_id',$Order_id)->update(['IsConfirm'=>1]);
        if ($res) {
            return back();
        } else {
            return back();
        }

    }

    public static function message(){
        $User_name = session('User_name');
        $data = DB::table('user')->where('User_name',$User_name)->first();
        // dd($data);
        // $username = $data->nickname;
        // $Profile = $data->Profile;
        return $data;
    }



}


