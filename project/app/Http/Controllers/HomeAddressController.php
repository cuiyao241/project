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
    	// $newName = session('username');
    	// echo $User_name;
        return  view('homes.pers.address');

    } 
}
