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
          
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/page/account/setAvatar.css?1607171726.25">  
         <link rel="stylesheet" type="text/css" href="pc/css/page/account/setPassword.css?1607171728.25">
          <link rel="stylesheet" type="text/css" href="/homes/mls/pc/css/page/account/setPersonal.css">
          <script type="text/javascript" src="/homes/mls/pc/jsmin/fml.js"></script>
        <style type="text/css">.im-frame-container{width:580px;height:430px;position:fixed;z-index:1000;display:none;left:10px;top:10px}.im-frame-container .im-frame-box{width:100%;height:100%;border:none}.im-frame-container .im-frame-drag{width:470px;height:32px;position:absolute;z-index:3;left:75px;top:24px}.im-frame-container .im-frame-btn{width:32px;height:32px;position:absolute;right:0;top:24px;z-index:2;cursor:pointer;opacity:0;background-color:rgba(255,102,153,0)}</style></head>
        
        <body>
          <div class="head">
            <div id="com-topbar"><div class="inner"></div></div>
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
                      <a href="/home/personal/proedit/20">
                        <img style="width: 100%" src="{{$data->Profile}}" alt="">
                       <p>修改头像</p>
                        <div class="header_info_mask"></div>
                      </a>
                    </div>
                  </div>
                  <div class="username">{{$data->User_name}}</div>
                </div>
              </div>
              <ul class="pcenter_navBar_ul">

                <li>
                  <a class="disable-a">账号管理</a>
                  <ul>
                    <li>
                      <a class="menu_setPersonal" href="/home/personal/edit">我的信息</a></li>
                    <li>
                      <a class="menu_setAvatar" href="/home/personal/proedit/20">修改头像</a></li>
                       <li>
                      <a class="menu_setPassword" href="/home/personal/pwdedit/69">修改密码</a></li>
                  </ul>
                </li>
              </ul>
            </div> 
            @section('content')
            
                
            @show
           </div>
       
         
          <!--[if IE 8]>
            <script type="text/javascript">var genderEle = document.getElementById('gender');
              genderEle.style.display = "none";</script>
          <![endif]-->
          <div id="com-foot">
            <div class="inner">
              <div class="flist">
                <h4>买家帮助</h4>
                <div>
                  <a href="noviceGuide.html" target="_blank">新手指南</a></div>
                <div>
                  <a href="serviceEnsure.html" target="_blank">服务保障</a></div>
                <div>
                  <a href="helpCommon.html" target="_blank">常见问题</a></div>
                <div>
                  <a href="shoppingHelp.html" target="_blank">购物帮助</a></div>
              </div>
              <div class="flist">
                <h4>商家帮助</h4>
                <div>
                  <a href="#/business" target="_blank">商家入驻</a></div>
                <div>
                  <a href="#" target="_blank">商家后台</a></div>
                <div>
                  <a href="#" target="_blank">商家推广</a></div>
              </div>
              <div class="flist">
                <h4>关于我们</h4>
                <div>
                  <a href="aboutus.html" target="_blank">关于美丽说</a></div>
                <div>
                  <a href="contactus.html" target="_blank">联系我们</a></div>
              </div>
              <div class="flist aboutus">
                <h4>关注我们</h4>
                <div>
                  <a href="#" target="_blank">
                    <span class="i-sina"></span>新浪微博
                    <div class="follow">一键关注新浪微博
                      <wb:follow-button uid="1718455577" type="red_1" width="67" height="24"></wb:follow-button></div>
                  </a>
                </div>
                <div>
                  <a href="#" target="_blank">
                    <span class="i-qzone"></span>QQ空间</a>
                </div>
                <div>
                  <a href="#" target="_blank">
                    <span class="i-tencent"></span>腾讯微博</a>
                </div>
              </div>
              <div class="flist service">
                <h4>美丽说微信服务号</h4>
                <img class="qrcode" src="" alt="美丽说服务号二维码"></div>
              <div class="flist last" style="float:left;">
                <h4>美丽说客户端下载</h4>
                <p style="background:none; margin-top:0px;" class="client">
                  <img class="qrcode" src="/homes/mls/p2/160802/7e_74j23d2a5f5j3bj31h70375gbeec1_100x100.png"></p>
              </div>
              <div class="record">Copyright ©2016 Meilishuo.com &nbsp;
                <a href="" target="_blank">电信与信息服务业务经营许可证100798号</a>&nbsp;
                <a href="">经营性网站备案信息</a>&nbsp;
                <br>京ICP备11031139号&nbsp; 京公网安备110108006045&nbsp;&nbsp; 客服电话：4000-800-577&nbsp; 文明办网文明上网举报电话：010-82615762 &nbsp;
                <a href="">违法不良信息举报中心</a></div>
            </div>
          </div>
          <p style="display: none" class="biu-login">11cnkktq</p>
          <div class="biu-sidebar" style="height: 1472px;">
            <div class="biu-options">
              <div class="biu-download">下载
                <span>APP</span>
                <div class="mls-qrcode">
                  <img src="/homes/mls/p2/160802/7e_0h22fa0g03cgl0c5676cb6k2ii71h_140x140.png"></div>
              </div>
              <div class="biu-cart">
                <a href="mycart.html" target="_blank">
                  <span class="cart-num biu-cart-num"></span>购物车</a>
              </div>
              <div class="biu-mark">
                <a href="mylike.html" target="_blank">收藏</a>
              </div>
              
            </div>
            <div class="biu-go2top"></div>
            
          </div>
          <script type="text/javascript" src="/homes/mls/pc/jsmin/jquery.js?1.12.4"></script>
          
  
        @section('js')
    
        @show
        
        </body>
      </html>