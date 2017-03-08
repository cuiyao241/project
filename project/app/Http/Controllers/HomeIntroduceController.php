<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeIntroduceController extends Controller
{
    public function getIndex($id)
    {
    	// $res = DB::table('cate')
    	return view('homes.lists.introduce');
    }
}
