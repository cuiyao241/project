<?php

	namespace App\Http\Controllers;

	use DB;
	use Session;

	$data = AdminCateController::getCateDiGuiMessage(0);

	$isNow = AdminCateController::getIsNow();

	// $status = session('status');

	// $User_name = session('User_name');

	// $status = Session::get('Status');

	// $status = Session::get('Status');
	// $User_name = Session::get('User_name');
	$Status = session('Status');
	$User_name = session('User_name');
	$Profile = session('Profile');
	// var_dump($User_name);die;	

?>
<!DOCTYPE html>
<html lang="zxx"> 
<!-- Head -->
<head>

<title>@yield('title')</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<!-- Custom-StyleSheet-Links -->
<!-- Bootstrap-CSS -->	   <link rel="stylesheet" href="/homes/css/bootstrap.css"					type="text/css" media="all">
<!-- Index-Page-CSS -->	   <link rel="stylesheet" href="/homes/css/style.css"						type="text/css" media="all">
<!-- Header-Slider-CSS --> <link rel="stylesheet" href="/homes/css/fluid_dg.css" id="fluid_dg-css" type="text/css" media="all">
<!-- //Custom-StyleSheet-Links -->



<!-- Font-Awesome-File-Links -->
<!-- CSS --> <link rel="stylesheet" href="/homes/css/font-awesome.css" 		 type="text/css" media="all">
<!-- TTF --> <link rel="stylesheet" href="/homes/fonts/fontawesome-webfont.ttf" type="text/css" media="all">
<!-- //Font-Awesome-File-Links -->

<!-- Supportive-Modernizr-JavaScript --><script src="/homes/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<!-- Default-JavaScript --><script src="/homes/js/jquery-2.2.3.js"></script>

<!-- 关于购物车 -->
<link href="/homes/css/myCart.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/homes/js/myCart.js"></script>
<!-- 订单 -->
<link rel="stylesheet" href="/homes/css/tasp.css" />
<link href="/homes/css/orderconfirm.css" rel="stylesheet" />

<style type="text/css">

	#bs-megadropdown-tabs li{
		
		list-style:none ;
	}


</style>

</head>
<!-- //Head -->



<!-- Body -->
<body>



	<!-- Header -->
	<div class="agileheader" id="agileitshome">

		<!-- Navigation顶部信息 -->



		<nav class="navbar navbar-default w3ls navbar-fixed-top">
			<div class="container">
				<div class="navbar-header wthree nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar">1</span>
						<span class="icon-bar">2</span>
						<span class="icon-bar">3</span>
					</button>
					<a class="navbar-brand agileinfo" href="/home"><span>玛丽莲</span> 梦露</a> 
					<ul class="w3header-cart">
						<li class="wthreecartaits"><span class="my-cart-icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span class="badge badge-notify my-cart-badge"></span></span></li>
					</ul>
				</div>
				<div id="bs-megadropdown-tabs" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">

					@foreach($data as $k => $v)

						<li class="dropdown">
							<a href="#" class="dropdown-toggle w3-agile hyper" data-toggle="dropdown"><span> {{$v->title}} &nbsp;</span></a>

							<ul class="dropdown-menu aits-w3 multi multi1">


								 <div class="row">
								
									<div class="col-sm-3 w3layouts-nav-agile w3layouts-mens-nav-agileits w3layouts-mens-nav-agileits-1">
										<ul class="multi-column-dropdown">
											<li class="heading">{{$v->title}}</li>

											@foreach($v->num_cate as $ak => $av)
											<li class="heading"><a href="/home/list?id={{$av->id}}">{{$av->title}}</a>
											</li>					
											
											@endforeach
											
										</ul>
									</div>


									<div class="col-sm-3 w3layouts-nav-agile w3layouts-mens-nav-agileits w3layouts-mens-nav-agileits-2">
										<p>热门推荐</p>
										<a href="/home/list/hots?title=热门推荐"><img src="{{$isNow['isHot'][$k]->pic}}" alt="Groovy Apparel"></a>
									</div>
								
									<div class="col-sm-3 w3layouts-nav-agile w3layouts-mens-nav-agileits w3layouts-mens-nav-agileits-3">
										<p>新品上市</p>
										<a href="/home/list/news?title=新品上市"><img src="{{$isNow['isNew'][$k]->pic}}" alt="Groovy Apparel"></a>
									</div>

									<div class="col-sm-3 w3layouts-nav-agile w3layouts-mens-nav-agileits w3layouts-mens-nav-agileits-2">
										<p>品牌折扣</p>
										<a href="/home/list/zhes?title=品牌折扣"><img src="{{$isNow['isZhe'][$k]->pic}}" alt="Groovy Apparel"></a>
									</div>
									<div class="clearfix"></div>
									<p class="promo">使用优惠码 <span>#CFFGTY56</span> 全场打折 8.8 折 <a href="#">详情</a></p>
								</div> 
							</ul>
						</li>

					@endforeach	
					</ul>	

					
						<li class="wthreesearch">
							<form action="" method="post">
								<input type="search" name="Search" placeholder="Search for a Product" required="">
								<button type="submit" class="btn btn-default search" aria-label="Left Align">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</li> 
						<li class="wthreecartaits wthreecartaits2 cart cart box_1"> 
						 <form action="#" method="post" class="last"> 
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="display" value="1" />
								<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
							</form>   
						</li>
					
				</div>

			</div>
		</nav>
		<!-- //Navigation --> <!-- introduce -->




		<!-- Header-Top-Bar-(Hidden) -->
		<div class="agileheader-topbar">
			<div class="container">
				<div class="col-md-6 agileheader-topbar-grid agileheader-topbar-grid1">
					<p> 全场满 $ 199 免邮费。 <a href="payment.html">详情</a></p>
				</div>
				<div class="col-md-6 agileheader-topbar-grid agileheader-topbar-grid2">
				@if (!$Status)

					<ul>
						<li><a href="stores.html">商店定位</a></li>
						<li><a href="faq.html">常见问题</a></li>
						<li><a class="popup-with-zoom-anim" href="#small-dialog1">亲! 请登录</a></li>
						<li><a class="popup-with-zoom-anim" href="#small-dialog2">免费注册</a></li>
						<li><a href="contact.html">联系大嫂</a></li>
					</ul>
				@else

					

					欢迎 <font size="4" color="red">{{$User_name}}</font> 登陆
	
					<a href="/home/personal/index"><font size="3" color=green>个人中心</font></a>
					

					<a href="/logined/close"><font size="2" color=blue>退出</a>
					
				@endif
				</div>
				<div class="clearfix"></div>
			</div>

			<!-- Popup-Box  -->

			<div id="popup1">
				<div id="small-dialog1" class="mfp-hide agileinfo">
				@if (session('into'))

	                <div class="mws-form-message error">
	                    {{ session('into') }}
	                </div>

	            @endif
					<div class="pop_up">
						<form action="/logined/test" method="post">
							<h3>会员入口</h3>
							<input type="text" Name="User_name">
							<input type="password" Name="Password">
							<ul class="tick w3layouts agileinfo">
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>记住账号</label>
								</li>
								<li>
									<a href="#">忘记 PASSWORD?</a>
								</li>
							</ul>
							<div class="send-button wthree agileits">
							{{ csrf_field()}}
								<input type="submit" value="登录">
							</div>
						</form>
					</div>
				</div>

	            
					
				<div id="small-dialog2" class="mfp-hide agileinfo">
				@if (session('into'))

	                <div class="mws-form-message error">
	                    {{ session('into') }}
	                </div>

	            @endif

	             @if (count($errors) > 0)
	               <div class="mws-form-message error">
	                    <ul>
	                        @foreach ($errors->all() as $error)
	                            <li style='font-size:17px;list-style:none'>{{ $error }}</li>
	                        @endforeach
	                    </ul>
	                </div>
	            @endif
					<div class="pop_up">
	
						<form action="/home/user/doregister" method="post">
							<h3>用户注册</h3>
							<input type="text" Name="User_name" placeholder="请输入5~12位用户名" >							
							<input type="password" Name="Password" placeholder="请输入5~10位密码" >
							<input type="password" Name="rePassword" placeholder="请输入确认密码" >
							<input type="text" Name="Emails" placeholder="请输入邮箱" >
							<input type="text" Name="Phonecode" placeholder="请输入手机号" >
							<input type="text" Name="Captcha" placeholder="请输入验证码" >
							<img src="/home/user/captcha" alt="" height='50px' onclick='this.src = this.src+="?a"'>
							<div class="send-button wthree agileits">
								{{ csrf_field()}}
								<input type="submit" value="提交信息">
							</div>
						</form>

					</div>
				</div>
			</div>
			<!-- //Popup-Box -->			


		</div>
		<!-- //Header-Top-Bar-(Hidden) -->
		


		<!-- Header-Slider -->
<!-- 		<div class="w3slideraits">
			<div class="fluid_dg_wrap fluid_dg_emboss pattern_1 fluid_dg_white_skin" id="fluid_dg_wrap_4">
				<div data-thumb="images/slide-1-small.jpg" data-src="images/slide-1.jpg"></div>
				<div data-thumb="images/slide-2-small.jpg" data-src="images/slide-2.jpg"></div>
				<div data-thumb="images/slide-3-small.jpg" data-src="images/slide-3.jpg"></div>
				<div data-thumb="images/slide-4-small.jpg" data-src="images/slide-4.jpg"></div>
				<div data-thumb="images/slide-5-small.jpg" data-src="images/slide-5.jpg"></div>
			</div>
		</div> -->
		<!-- //Header-Slider -->

	</div>
	<!-- //Header -->
	@section('content')

	


	@show
	<!-- Footer -->
	<div class="agileinfofooter">
		<div class="agileinfofooter-grids">

			<div class="col-md-3 agileinfofooter-grid agileinfofooter-grid1">
				<ul>
					<li><a href="about.html">帮助中心</a></li>
					<li><a href="mens.html">账户管理</a></li>
					<li><a href="mens_accessories.html">购物指南</a></li>
					<li><a href="womens.html">订单操作</a></li>
				</ul>
			</div>

			<div class="col-md-3 agileinfofooter-grid agileinfofooter-grid2">
				<ul>
					<li><a href="stores.html">服务支持</a></li>
					<li><a href="faq.html">售后政策</a></li>
					<li><a href="codes.html">自助服务</a></li>
					<li><a href="icons.html">相关下载</a></li>
				</ul>
			</div>

			<div class="col-md-3 agileinfofooter-grid agileinfofooter-grid2">
				<ul>
					<li><a href="stores.html">线下门店</a></li>
					<li><a href="faq.html">服装之家</a></li>
					<li><a href="codes.html">服务网点</a></li>
					<li><a href="icons.html">零售网点</a></li>
				</ul>
			</div>

			<div class="col-md-3 agileinfofooter-grid agileinfofooter-grid3">
				<address>
					<ul>
						<li>地址</li>
						<li>帕尔马路摩德纳街道404号</li>
						<li>100-5678-8888</li>
						<li><a class="mail" href="mailto:mail@example.com">cuiyao241@163.com</a></li>
					</ul>
				</address>
			</div>

			<div class="clearfix"></div>

		</div>
	</div>
	<!-- //Footer -->



	<!-- Copyright -->
	<div class="w3lscopyrightaits">
		<div class="col-md-8 w3lscopyrightaitsgrid w3lscopyrightaitsgrid1">
			<p>Copyright ©2017 Gaoda Powered By CuiYao.HaoXiaoBin.LiZiHao.WangJianXin Version 1.0.0<a target="_blank" href="http://www.17sucai.com/"></a></p>
		</div>
		<div class="col-md-4 w3lscopyrightaitsgrid w3lscopyrightaitsgrid2">
			<div class="agilesocialwthree">
				<ul class="social-icons">
					<li><a href="#" class="facebook w3ls" title="Go to Our Facebook Page"><i class="fa w3ls fa-facebook-square" aria-hidden="true"></i></a></li>
					<li><a href="#" class="twitter w3l" title="Go to Our Twitter Account"><i class="fa w3l fa-twitter-square" aria-hidden="true"></i></a></li>
					<li><a href="#" class="googleplus w3" title="Go to Our Google Plus Account"><i class="fa w3 fa-google-plus-square" aria-hidden="true"></i></a></li>
					<li><a href="#" class="instagram wthree" title="Go to Our Instagram Account"><i class="fa wthree fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#" class="youtube w3layouts" title="Go to Our Youtube Channel"><i class="fa w3layouts fa-youtube-square" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //Copyright -->



	<!-- Custom-JavaScript-File-Links -->

<!-- Default-JavaScript --><script src="/homes/js/jquery-2.2.3.js"></script>
<script src="/homes/js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links -->

	<!-- cart-js -->
	<script src="/homes/js/minicart.js"></script>
	<script>
        w3l.render();

        w3l.cart.on('w3agile_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        			
        		}
        	}
        });
    </script>  
	<!-- //cart-js --> 
		<!-- Shopping-Cart-JavaScript -->

		<!-- Header-Slider-JavaScript-Files -->
			<script type='text/javascript' src='/homes/js/jquery.easing.1.3.js'></script>
			<script type='text/javascript' src='/homes/js/fluid_dg.min.js'></script>
			<script>jQuery(document).ready(function(){
					jQuery(function(){
						jQuery('#fluid_dg_wrap_4').fluid_dg({
							height: 'auto',
							loader: 'bar',
							pagination: false,
							thumbnails: true,
							hover: false,
							opacityOnGrid: false,
							imagePath: '',
							time: 4000,
							transPeriod: 2000,
						});
					});
				})
			</script>
		<!-- //Header-Slider-JavaScript-Files -->

		<!-- Dropdown-Menu-JavaScript -->
			<script>
				$(document).ready(function(){
					$(".dropdown").hover(
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
							$(this).toggleClass('open');
						},
						function() {
							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
							$(this).toggleClass('open');
						}
					);
				});
			</script>
		<!-- //Dropdown-Menu-JavaScript -->

		<!-- Pricing-Popup-Box-JavaScript -->
			<script src="/homes/js/jquery.magnific-popup.js" type="text/javascript"></script>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});
				});
			</script>
		<!-- //Pricing-Popup-Box-JavaScript -->

		<!-- Model-Slider-JavaScript-Files -->
			<script src="/homes/js/jquery.film_roll.js"></script>
			<script>
				(function() {
					jQuery(function() {
						this.film_rolls || (this.film_rolls = []);
						this.film_rolls['film_roll_1'] = new FilmRoll({
							container: '#film_roll_1',
							height: 560
						});
						return true;
					});
				}).call(this);
			</script>
		<!-- //Model-Slider-JavaScript-Files -->

	<!-- //Custom-JavaScript-File-Links -->

		<!-- // <script type="text/javascript" src="/homes/js/jquery-1.8.3.min.js"></script> -->

		<!-- Bootstrap-JavaScript --> <script src="/homes/js/bootstrap.js"></script>
	
	@section('js')

	@show
</body>
<!-- //Body -->


	
</html>