<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">

<!-- <link rel="stylesheet" type="text/css" href="/admins/css/style.css" media="screen"> -->


<title>@yield('title')</title>

</head>

<body>
    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <!-- <img src="/admins/images/mws-logo.png" alt="mws admin"> -->
                <span id='logo' style="color:red;font-size:20px;"><h3 id="site-description" class="logo">For Laravel Artist</h3></span>
                
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
            <!-- Notifications -->
            <div id="mws-user-notif" class="mws-dropdown-menu">
                <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <?php 
                    $newName = session('username');
                    $User_id = session('User_id'); 
                    //通过session值查询数据
                    $res = DB::table('user')->where('User_name',$newName)->first();


                 ?>
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                            <li class="read">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
                <a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-messages">
                            <li class="read">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="{{$res->Profile}}" alt="User Photo"  width=100% >
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{$newName}}

                    </div>
                    <ul>    
                        <li><a href="/admin/user/edit/{{$User_id}}">修改头像</a></li>
                        <li><a href="/admin/user/pwdedit/{{$newName}}">修改密码</a></li>
                        <li><a href="/home/login/close">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <!-- <div id="mws-searchbox" class="mws-inset"> -->
             <!--    <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form> -->
            <!-- </div> -->
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>    
                    <!-- 关于用户 -->
                    <li>
                        <a href="#"><i class="icon-official"></i>用户管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/user/add"><i class="icon-add-contact"></i>　用户添加</a></li>
                            <li><a href="/admin/user/index"><i class="icon-users"></i>　用户列表页</a></li>
                            
                        </ul>
                    </li>   

                    <!-- 关于商品 -->
                    <li>
                        <a href="#"><i class="icon-th"></i>商品管理</a>
                        <ul class='closed'>
                            
                            <li><a href="/admin/cate/index"><i class="icon-calendar-month"></i>　商品列表</a></li>
                            <li><a href="/admin/cate/add/ding"><i class="icon-google-plus"></i>　添加种类</a></li>
                            <li><a href="/admin/goods/allup"><i class="icon-box-remove"></i>　销售中商品</a></li>
                            <li><a href="/admin/goods/alldown"><i class="icon-box-add"></i>　已下架商品</a></li>
                            
                        </ul>
                    </li> 
                    
                    <!-- 关于订单 -->
                     <li>
                        <a href="#"><i class="icon-shopping-cart"></i>订单中心</a>
                        <ul class='closed'>
                            <li><a href="/admin/order/index"><i class="icon-bag"></i>　订单详情</a></li>
                            <li><a href="/admin/order/isconsignment"><i class="icon-truck"></i>　未发货</a></li>
                            <li><a href="/admin/order/ispayment"><i class="icon-print"></i>　未付款</a></li>

                        </ul>
                    </li>

                     <!-- 关于配置 -->
                     <li>
                        <a href="#"><i class="icon-cog-2"></i>网站管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/conf/edit"><i class="icon-settings"></i>　网站配置</a></li>
                            <li><a href="/admin/adv"><i class="icon-pictures"></i>　首页轮播</a></li>
                            
                        </ul>
                    </li>

                    <!-- 关于友情链接 -->
                     <li>
                        <a href="#"><i class="icon-unlink"></i>友链管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/friends"><i class="icon-network"></i>　浏览友链</a></li>
                            <li><a href="/admin/friends/add"><i class="icon-github-4"></i>　添加友链</a></li>
                            
                        </ul>
                    </li>   
                                          
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
            @section('content')
            
                
            @show
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
                Copyright ©2017 Gaoda Powered By CuiYao.HaoXiaoBin.LiZiHao.WangJianXin Version 1.0.0 
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>

    
    @section('js')
    
    @show
</body>
</html>