<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class AdminAdvController extends Controller
{
    //   
    public function getIndex()
    {
    	$res = DB::table('home_adv')->get();

    	// dd($res);
    	return view('admins.conf.adv', ['res'=>$res]);
    }

    public function getDel(Request $request)
    {
    	$id = $request->input('id');

    	$res = DB::table('home_adv')->where('id', $id)->delete();

    	if($res){

    		echo 1;

    	} else {

    		echo 0;

    	}

    }

}
