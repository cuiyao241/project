<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    //前台首页
    public function index()
    {

    	$res = DB::table('home_adv')->where('pid', 0)->get();

    	$pro = DB::table('home_adv')->where('pid', 1)->get();

    	$pth = DB::table('cate_ins')->get();

    	return view('homes.index', ['res'=>$res, 'pro'=>$pro, 'pth'=>$pth]);
    }


}
