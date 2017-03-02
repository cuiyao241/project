<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
    	// echo '这是后台首页';
    	return view('admins.index');
    }
}
