<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminGoodsController extends Controller
{
    //
    public function getIndex()
    {
    	//商品列表页
    	return  view('admins.goods.list');
    }

    public function getAdd()
    {
    	
    }

    public function postInsert(requeset $request)
    {
    	
    }
}
