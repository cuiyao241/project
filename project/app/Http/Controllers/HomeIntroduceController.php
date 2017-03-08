<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeIntroduceController extends Controller
{
    public function getIndex($id)
    {
    	$res = DB::table('cate_goods')->where('id', $id)->first();

    	return view('homes.lists.introduce',['res'=>$res]);
    }
}
