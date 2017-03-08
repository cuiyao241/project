<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminCateController extends Controller
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
    *   分类展示页
    */   

    public function getIndex(Request $request)
    {

        $res = DB::table('cate')->
        select(DB::raw("*,concat(path,',',id) as paths"))->
        orderBy('paths')->
        where('title','like','%'.$request->input('search').'%')->paginate($request->input('num',10));
        

        foreach ($res as $k => $v) {

            $info = explode(',',$v->path);

            $count = count($info)-1;

            $v->title = str_repeat('|--', $count).$v->title;

            //获取所有列表中的pid值
            $pids[] = $v->pid;
        }

        //获取底层分类的id
        $value = [];
        foreach ($res as $k => $v) {

            if(!in_array($v->id, $pids)){

                $value[] = $v->id;
            }
        }

       //  //商品列表页
        return  view('admins.cate.list',['request'=>$request,'res'=>$res,'value'=>$value]);

    }


    /**
    *   添加分类
    */
    public function getAdd($str)
    {    
        $res = $this->getCateType();

        $this->getcateList($res);

        
        $arr = explode('-', $str);
        
        // die;
        if($arr[0] == 'ding'){

            $son = $arr[0];
        } else {

            $son = DB::table('cate')->where('id', $arr[1])->first();
        }
        
        return view('admins.cate.add',['res'=>$res,'son'=>$son]);

    }


    /**
    *   删除分类
    */

    public function getDelete($id)
    {

        $res = DB::table('cate')->where('id', $id)->first();

        $paths = $res->path .','. $res->id;

        if($res){

           $into = DB::table('cate')->where('path', 'like', $paths . '%')->orWhere('id', $id)->delete();

        } else {

           $into = DB::table('cate')->where('id', $id)->delete();
        }

       if($into) {

            echo '删除成功';
            return redirect('/admin/cate/index')->with('info', '删除成功');
        } else {

            return back()->with('info','删除失败');
        }

    }



    /**
    *   在此分类下添加子类（可以更改父类）
    */

    public function postInsert(Request $request)
    {

        $res = $request->except('_token');

        $res['path'] = 0;


        if($request->pid == '0'){

            $res['path'] = '0';
        } else {

            $info = DB::table('cate')->where('id','=',$request->pid)->first();

            $res['path'] = $info->path . ',' . $info->id;

        }

        $res = DB::table('cate')->insert($res);

        return redirect('/admin/cate/index');
        
    }

   

    /**
    *   修改
    */

    //修改模板页面
    public function getEdit($id){

        $son = DB::table('cate')->where('id', $id)->first();

        if($son->pid != 0){

           $parent = DB::table('cate')->where('id',$son->pid)->first(); 

        } else {

            // $arr = array(0, '顶级大类');
            
            // $parent = (object)$arr;

            $parent = (object)['id'=>0, 'title'=>'顶级大类'];
        }  


        $res = DB::table('cate')->get();

        $this->getcateList($res);


        return view('admins/cate/edit', ['res'=>$res, 'son'=>$son, 'parent'=>$parent]);

    }

    //修改处理页
    public function postUpdate(Request $request)
    {

       $res = $request->except('_token','id');

       $id = $request->id;

       $pid = $request->pid;

       $exc = DB::table('cate')->where('id',$pid)->first();
       
       //得到新的path,用于页面排序
       $res['path'] = $exc->path. ','. $exc->id;

       $pro = DB::table('cate')->where('id', $id)->update($res);

       if($pro) {

            return redirect('/admin/cate/index')->with('cate_info','修改成功');
        } else {

            return back()->with('cate_info','修改失败');
        }

    }

    /**
    *      递归获取全部分类信息
    */

    public function getCateDiGuiMessage($pid)
    {
        //先确认顶级信息
        $cates = DB::table('cate')->where('pid',$pid)->get();

        $num_cate = [];
       foreach($cates as $k => $v) {

            $v->num_cate[] = $this->getCateDiGuiMessage($v->id);    

       }

       // dd($num_cate);
       
       return $num_cate;

    }
}



