<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //前台首页
    public function index()
    {
    	// echo '这是前台首页';
    	return view('homes.index');
    }

    
    
}
