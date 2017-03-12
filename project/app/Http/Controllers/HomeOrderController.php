<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeOrderController extends Controller
{
    //


    public function postOrder(Request $request)
    {
    	$res = $request->except('_token');
    	echo'<pre>';
    	var_dump($res);
    	// return view('homes.cart.order');
    }
}
