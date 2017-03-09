<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminGoodsController extends Controller
{

     /**
    *   获取查询结果用于分页
    */
    public function getCateType()
    {
        $res = DB::table('cate')
            ->select(DB::raw('*,concat(path,",",id) as paths'))
            ->orderBy('paths')
            ->get();

        return $res;
    }


    /**
    *   将结果集转化成树状结构
    */

    public function getCateList($res)
    {
        
        foreach($res as $k => $v) {
           
            $into = explode(',',$v->path);

            //获取添加的字符串 '|--'

            $level = count($into) - 1;

            $v->title = str_repeat('|--',$level).$v->title;

        }
        
        return $v->title;

    }



    /**
    *   所有商品列表
    */

    public function getIndex(Request $request)
    {

        $id = $request->input('id');

        $sea = $request->input('sea');

        $res = DB::table('cate_goods')
            ->where('pid', $id)
            ->where('title', 'like', '%'.$request->input('sea').'%')
            ->paginate($request->input('num',10));
        
        $parent = DB::table('cate')->where('id', $id)->first();

        //商品列表页
        return  view('admins.good.lists',['request'=>$request,
            'res'=>$res,'parent'=>$parent]);
    }


    /**
    *   添加商品页
    */

    public function getAdd($id)
    {
        $son = DB::table('cate')->where('id', $id)->first();
        // dd($res);

        $res = $this->getCateType();

        $this->getCateList($res);

        return view('admins.good.add', ['res'=>$res, 'son'=>$son]);
    }


    /**
    *   后台商品的添加数据处理的方法
    */
    public function postInsert(Request $request)
    {

        //表单验证
        $this->validate($request,[
                'title' => 'required|regex:/^\S{1,32}$/',
                'color' => 'required|regex:/^\S{1,32}$/',
                'price'=>'required|regex:/^\w{1,10}$/',
                'size'=> 'required|',

            ],[
                'title.required' => '商品名不能为空',
                'title.regex'=>'商品名格式不正确',
                'color.required'=>'颜色不能为空',
                'color.regex'=>'颜色格式不正确',
                'price.required'=>'价格不能为空',
                'size.required'=>'尺寸不能为空',             
            ]);


            //获取表单传过来的信息
            $res = $request->except('_token');

            $pid = $res['pid'];

            //得到要插入的商品id

            $goodpid = DB::table('cate_goods')->max('id')+1;
               
            // $users = DB::table('cate_goods')
            //          ->select(DB::raw('count(*) as user_count'))
            //          ->get();

            // dd($goodpid);

            //判断文件上传
            if($request->hasFile('pic')) {

                $new = $request->file('pic');

                foreach($new as $k => $v){

                    //自定义上传文件的名字
                    $names = rand(1111,9999).time();

                    //获取上传文件的后缀
                    $suffix = $v->getClientOriginalExtension();

                    $v->move('./upload/',$names.'.'.$suffix);

                    $exc['pid'] = $goodpid;
                    $exc['pic'] = '/upload/'.$names.'.'.$suffix;

                    
                    DB::table('goods_images')->insert($exc);

                }
               
                //把上传的图片存储到数据库中
                $res['pic'] = '/upload/'.$names.'.'.$suffix;
            }



            //数据的添加
            $pro = DB::table('cate_goods')->insert($res);

            //判断结果
            if($pro) {
                // echo 123456;
                return redirect("/admin/goods/index?id=$pid");
            } else {

                echo '添加失败';
            }
    }

    /**
    *   删除商品
    */

    public function getDelete(Request $request)
    {
        $ros = $request->all();

        $id = $ros['id'];

        $pid = $ros['pid'];

        $res = DB::table('goods_images')->where('pid', $id)->delete();

        $info = DB::table('cate_goods')->where('id', $id)->delete();

        // dd($res->pid);

        if($info && $info) {

            // admin/goods/index?id=21
            
            return redirect("/admin/goods/index?id=$pid")->with('info', '删除成功');
        } else {

            // return back()->with('info','删除失败');
        }
    }

    /**
    *   修改商品
    */

    public function getEdit($id)
    {

        $good = DB::table('cate_goods')->where('id', $id)->first();

        // dd($good);
        $parent = DB::table('cate')->where('id', $good->pid)->first();

        //调用分类树
        $res = $this->getCateType();

        $this->getCateList($res);

        return view('admins/good/edit', ['res'=>$res, 'parent'=>$parent, 'good'=>$good]);
        
    }



    /**
    *   后台商品修改数据处理的方法
    */
    public function postUpdate(Request $request)
    {

        //表单验证
        $this->validate($request,[
                'title' => 'required|regex:/^\S{1,255}$/',
                'color' => 'required|regex:/^\S{1,32}$/',
                // 'price'=>'required|regex:/^\w{1,8}.?\d{2}/',
                'size'=> 'required|',

            ],[
                'title.required' => '商品名不能为空',
                'title.regex'=>'商品名格式不正确',
                'color.required'=>'颜色不能为空',
                'color.regex'=>'颜色格式不正确',
                'price.required'=>'价格不能为空',
                'size.required'=>'尺寸不能为空',             
            ]);


            //获取表单传过来的信息
            $res = $request->except('_token', 'imgs');

            
            //商品id
            $id = $res['id'];

            //所在分区id
            $pid = $res['pid'];

            $imgs = $request->input('imgs');


            // dd($res);
            //判断文件上传
            if($request->hasFile('pic')) {

                $new = $request->file('pic');

                foreach($new as $k => $v){

                    //自定义上传文件的名字
                    $names = rand(1111,9999).time();

                    //获取上传文件的后缀
                    $suffix = $v->getClientOriginalExtension();

                    $v->move('./upload/',$names.'.'.$suffix);

                    $exc['pid'] = $id;

                    $exc['pic'] = '/upload/'.$names.'.'.$suffix;

                    
                    DB::table('goods_images')->insert($exc);

                }
               
                //把上传的图片存储到数据库中
                $res['pic'] = '/upload/'.$names.'.'.$suffix;

            } else {

                $res['pic'] = $imgs;

            }


            //数据的添加
            $pro = DB::table('cate_goods')->where('id', $id)->update($res);

            //判断结果
            if($pro) {
                // echo 123456;
                return redirect("/admin/goods/index?id=$pid")->with('info', '修改成功');
            } else {

                 return back()->with('info','修改失败');
            }
    }

    /**
    *   上架、下架
    */
    public function getStatus(Request $request)
    {
        $res = $request->except('id','pid');

        $id = $request->input('id');

        $pid = $request->input('pid');

        if($res['status']){

            $res['status'] = 0;
            $info = DB::table('cate_goods')->where('id', $id)->update($res);

        } else {

            $res['status'] = 1;
            $info = DB::table('cate_goods')->where('id', $id)->update($res);

        }

        if($info){

            return redirect("/admin/goods/index?id=$pid")->with('info', '修改成功');

        } else {

            return back()->with('info','修改失败');
        }

    }

    /**
    *
    *   所有上架商品
    */

    public function getAllup(Request $request)
    {
        $res = DB::table('cate_goods')
            ->where('status', 1)
            ->where('title', 'like', '%'.$request->input('sea').'%')
            ->paginate($request->input('num',10));
    

        return  view('admins.good.allup',['request'=>$request,
            'res'=>$res]);
    }

        /**
    *
    *   所有下架商品
    */

    public function getAlldown(Request $request)
    {
        $res = DB::table('cate_goods')
            ->where('status', 0)
            ->where('title', 'like', '%'.$request->input('sea').'%')
            ->paginate($request->input('num',10));
    
        // $parent = DB::table('cate')->where('id', $id)->first();

        return  view('admins.good.alldown',['request'=>$request,
            'res'=>$res]);
    }
}
