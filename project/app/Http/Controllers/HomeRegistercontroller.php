<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeRegistercontroller extends Controller
{
    /**
    *    显示用户注册页面
    */

    public function getRegister()
    {
        return view('homes.register');
    }

   
}
