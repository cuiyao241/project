<html>
<!--<![endif]-->
<head>
          <meta charset="utf-8">
          <title>@yield('title')</title>
          <meta name="description" content="流行款!">
          <meta name="keywords" content="higo">
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/base.css">
          <link rel="icon" href="/homes/mls/pic/_o/75/6e/2f6871f198c0bd7615ffbf9a2f5f_49_48.c5.png" type="image/x-icon">
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/page/account/common.css">
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/page/account/datepicker.css">
           <link href="/homes/mls/css/index.css-63e7a9a6.css" rel="stylesheet" type="text/css">
          <link href="/homes/mls/css/index.css-6b668861.css" rel="stylesheet" type="text/css">
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/page/account/setAvatar.css?1607171726.25">  
         <link rel="stylesheet" type="text/css" href="pc/css/page/account/setPassword.css?1607171728.25">
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/page/account/setPersonal.css">
          <script type="text/javascript" src="/homes/mls/pc/jsmin/fml.js"></script>
        <style type="text/css">.im-frame-container{width:580px;height:430px;position:fixed;z-index:1000;display:none;left:10px;top:10px}.im-frame-container .im-frame-box{width:100%;height:100%;border:none}.im-frame-container .im-frame-drag{width:470px;height:32px;position:absolute;z-index:3;left:75px;top:24px}.im-frame-container .im-frame-btn{width:32px;height:32px;position:absolute;right:0;top:24px;z-index:2;cursor:pointer;opacity:0;background-color:rgba(255,102,153,0)}</style></head>
        
        <body>
            <div id="com-topbar">
              <div class="inner">
                <ul>
                  <li class="drop">
                    <a href="" target="_blank">
                      <em class="collect"></em>我的收藏</a>
                  </li>

                  <li class="drop cart-wrapper">
                    <a target="_blank" href="" class="my-cart">
                      <em class="cart"></em>我的购物车
                    </a>
                  </li>

                  <li>
                    <a href="/home" class="last">返回首页</a>
                  </li>
                </ul>
              </div>
            </div>

             <div class="nav_main_box">
              <ul class="nav_main">
                <li class="all">个人中心</li> 
              </ul>
            </div>
          </div>
          <div class="settings">
            <div class="pcenter_navBar">
              <div class="pcenter_userhead">
                <div class="pcenter_userhead_content">
                  <div class="header_info">
                    <div class="header_avatar">
                      <a href="/home/personal/proedit">
                        <?php

                        $message = \App\Http\Controllers\HomePersonalController::message();

                        ?>
                        <img style="width: 100%" src="{{$message->Profile}}" alt="">
                       <p>修改头像</p>
                        <div class="header_info_mask"></div>
                      </a>
                    </div>
                  </div>
                  <div class="username">{{$message->nickname}}</div>
                </div>
              </div>
              <ul class="pcenter_navBar_ul">

                <li>
                  <a class="menu_order disable-a">我的订单
                    <!-- <em class="little-triangle"></em> <em class="little-triangle-hover"></em> --></a>
                  <ul>
                    <li>
                      <a class="" href="/home/personal/order">全部订单</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a class="disable-a">账号管理</a>
                  <ul>
                    <li>
                      <a class="menu_setPersonal" href="/home/personal/edit">修改信息</a></li>
                    <li>
                      <a class="menu_setAvatar" href="/home/personal/proedit">修改头像</a></li>
                       <li>
                      <a class="menu_setPassword" href="/home/personal/pwdedit">修改密码</a></li>

                  </ul>
                </li>
                <li> 
                    <a class="menu_pcenter" href="/home/address"> 收货地址
                    <em class="little-triangle"></em>
                    <em class="little-triangle-hover"></em> 
                    </a> 
                </li>
              </ul>
            </div> 
            @section('content')
            
                
            @show
           </div>
              
            </div>
            <div class="biu-go2top"></div>
            
          </div>
          <script type="text/javascript" src="/homes/mls/pc/jsmin/jquery.js?1.12.4"></script>
          
  
        @section('js')
    
        @show
        
        </body>
      </html>