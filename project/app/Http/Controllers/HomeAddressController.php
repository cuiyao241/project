<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class HomeAddressController extends Controller
{

    //
    public function getIndex()
    {
    	$User_name = Session::get('User_name');
    	echo $User_name;
        // return  view('homes.pers.address',['User_name'=>$User_name]);

    } 
}
