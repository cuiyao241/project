<?php
	namespace App\Http\Controllers;
	use Session;
	Use DB;
	$username = Session::get('User_name');

	$profile = Session::get('Profile');

	$nickname = Session::get('nickname');
	// dd($nickname);
?>
@extends('layout.home')

@section('title','商品的详情页')

@section('content')
<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<!-- Custom-Stylesheet-Links -->
<!-- Bootstrap-CSS -->	<link rel="stylesheet" href="/homes/css/bootstrap.css"	 type="text/css" media="all">
<!-- Index-Page-CSS -->	<link rel="stylesheet" href="/homes/css/style.css"		 type="text/css" media="all">
<!-- FlexSlider-CSS -->	<link rel="stylesheet" href="/homes/css/flexslider.css" type="text/css" media="all">
<!-- //Custom-Stylesheet-Links -->


<!-- Font-Awesome-File-Links -->
<!-- CSS --> <link rel="stylesheet" href="homes/css/font-awesome.css" 		 type="text/css" media="all">
<!-- TTF --> <link rel="stylesheet" href="homes/fonts/fontawesome-webfont.ttf" type="text/css" media="all">
<!-- //Font-Awesome-File-Links -->

</head>
<!-- //Head -->



<!-- Body -->
<body>

<style type="text/css">
	.color li{
		border:1px solid #e5e5e5;
		border-radius:2px;
		color:#666;
		display:block;
		float:left;
		font-size:13px;
		margin-bottom:4px;
		margin-right:6px;
		padding:3px 6px;
		cursor:pointer;

	}
	.size li{
		border:1px solid #e5e5e5;
		border-radius:2px;
		color:#666;
		display:block;
		float:left;
		font-size:13px;
		margin-bottom:4px;
		margin-right:6px;
		padding:3px 6px;
		cursor:pointer;

	} 

	.color .addcolor{

		border:solid 2px red;

	}
	.size .addcolor{

		border:solid 2px red;
		/*background: red;*/

	}

</style>



	<!-- Single-Product-View -->
	<div class="w3aitssinglewthree">
		<div class="container">

			<div class="products">
			<div class="single-page">

				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">
						<div class="flexslider">
							<ul class="slides">

								<li data-thumb="{{$res->pic}}">
									<div class="thumb-image detail_images"> <img src="{{$res->pic}}" data-imagezoom="true" class="img-responsive" alt="Groovy Apparel"></div>
								</li>

								@foreach($das as $k=>$v)

								<li data-thumb="{{$v->pic}}">
									<div class="thumb-image detail_images"> <img src="{{$v->pic}}" data-imagezoom="true" class="img-responsive" alt="Groovy Apparel"></div>
								</li>
							
								@endforeach
							</ul>
						</div>
					</div>

					<div class="col-md-6 single-top-right">
						<h1 class="item_name">{{$res->title}}</h1>
						<p>This item will be delivered within 5-10 working days.</p>
						<div class="rating">
							<span class="starRating">
								<input id="rating5" type="radio" name="rating" value="5">
								<label for="rating5">5</label>
								<input id="rating4" type="radio" name="rating" value="4" checked>
								<label for="rating4">4</label>
								<input id="rating3" type="radio" name="rating" value="3">
								<label for="rating3">3</label>
								<input id="rating2" type="radio" name="rating" value="2">
								<label for="rating2">2</label>
								<input id="rating1" type="radio" name="rating" value="1">
								<label for="rating1">1</label>
							</span>
						</div>
						<div class="single-price">
							<ul>
								<li>￥{{$res->price}}</li>
								<br>
								<li><del>$75</del></li>
								
								<li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i>Apply Coupon</a></li>
							</ul>
						</div>
						<p class="single-price-text">一段描述</p>


						<ul class="color">
							<li style="border-style:none;color:#1abc9c">颜色：</li>	
							@foreach($goods['color'] as $k => $v)	
							<li>{{$v}}</li>
							@endforeach				
						</ul>
						
						<br>
						<br>
						<ul class="size">
							<li style="border-style:none;color:#1abc9c">尺寸：</li>
							@foreach($goods['size'] as $ak => $av)
							<li>{{$av}}</li>
							@endforeach

						</ul>

						<br><br>
						<div class="cbp-pgcontent aitssinglew3" id="mens_single">
							<form action="/home/cart/remind" method="post">
								<input type="hidden" name="id" value="{{$res->id}}">
								<input id="incolor" type="hidden" name="color" value="">
								<input id="insize" type="hidden" name="size" value="">
								 {{ csrf_field()}}
								<input type="submit" class="btn btn-danger agileits my-cart-btn" data-id="mens_single" data-name="Black Leather Jacket" data-summary="Black Leather Jacket" data-price="67.5" data-quantity="1" data-image="images/s1.jpg" value="加入购物车">
	
							</form>
							<div class="clearfix"></div>
						</div>

						<div class="agilesocialwthree">
							<h4>分享本店</h4>

							<div class="bdsharebuttonbox" data-tag="share_1">
							<p>分享一下：</p>
									<a class="bds_mshare" data-cmd="mshare"></a>
									<a class="bds_qzone" data-cmd="qzone" href="#"></a>
									<a class="bds_tsina" data-cmd="tsina"></a>
									<a class="bds_baidu" data-cmd="baidu"></a>
									<a class="bds_renren" data-cmd="renren"></a>
									<a class="bds_tqq" data-cmd="tqq"></a>
									<a class="bds_more" data-cmd="more">　更多</a>
									<a class="bds_count" data-cmd="count"></a>
							</div>

							<script>
								with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
							</script>	
							</div>	

							<!-- <ul class="social-icons">
								<li><a href="#" class="facebook w3ls" title="Go to Our Facebook Page"><i class="fa w3ls fa-facebook-square" aria-hidden="true"></i></a></li>
								<li><a href="#" class="twitter w3l" title="Go to Our Twitter Account"><i class="fa w3l fa-twitter-square" aria-hidden="true"></i></a></li>
								<li><a href="#" class="googleplus w3" title="Go to Our Google Plus Account"><i class="fa w3 fa-google-plus-square" aria-hidden="true"></i></a></li>
								<li><a href="#" class="instagram wthree" title="Go to Our Instagram Account"><i class="fa wthree fa-instagram" aria-hidden="true"></i></a></li>
							</ul> -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="aitsaccordionw3layouts">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title asd">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">详细介绍 <span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body panel_text">
								<div class="scrollbar" id="style-2">
									详细介绍
									{!!$res->content!!}
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">同类商品 <span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<style type="text/css">
							.title {
							    color: #333;
							    display: block;
							    font-size: 14px;
							    height: 14px;
							    line-height: 14px;
							    margin-top: 10px;
							    overflow: hidden;
							    text-overflow: ellipsis;
							    white-space: nowrap;
							}
							.accordion-image img{
								width:90%;
							}

						</style>
							<div class="accordion-image">

<!-- 274 * 411 -->

							@foreach($pro as $k=>$v)
								<div class="ac-img" style="width:274px; height:410px;text-align:center;margin-top:10px;">
								<!-- <div class="ac-img" style="width:24%;text-align:center;margin-top:10px;"> -->
									<img src="{{$v->pic}}" style="width:230px;height:320px" alt="Groovy Apparel">
									<br>
									<a href="/home/introduce/index/{{$v->id}}" class="title">{{$v->title}}</a>
									<br>
									<a href="/home/introduce/index/{{$v->id}}" style="margin-left:3px">￥{{$v->price}}</a>
								</div>

							@endforeach
								
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">等级 & 评论 ({{count($post)}}) <span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<h3>"买家评价 !"</h3>
							<h4><span>5.00分</span></h4>

								

							<div>
								<p>
									<p>
										<b>全部评价（{{count($post)}}）</b>
										<!-- <b>晒图（10）</b> -->
									</p>
                    				
									
								</p>
							</div>	

							@for($i = 0; $i < count($post); $i++)

							<div class="liuyan">
							
								<?php

									$users = DB::table('user')->where('User_name', $post[$i]->UserName)->first();

									$user = DB::table('post')->where('id',5)->first();
								// echo '<pre>';
								// var_dump($users);
								?>	
								<div style="float:left">
									<img src="{{$profile}}" style="width:60px;height:60px">
									<br>

									@if($users)
	                                	<b>{{$users->nickname}}</b>
	                                @else
	                                	<b>{{$user->UserName}}</b>
	                                @endif

								</div>

								<div style="margin-left:115px;">

							
									<p>{{date('Y-m-d H:i:s', $post[$i]->addtime)}} </p>
									<p>
										@if($posts)
										<b>
	                                        尺码:{{$posts[$i]->GoodsSize}}
	                                    </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                    <b>
	                                        颜色:{{$posts[$i]->GoodsColor}}
	                                    </b>
	                                    @endif
									</p>
									<p>{!!$post[$i]->content!!}</p>

									<p>
										<ul class="list clearfix">
	                                        <li>
	                                            <div class="img-box">
	                                                
	                                                    <img src="{{$post[$i]->pic}}" style="width:40px">

	                                            </div>
	                                        </li>
	                                        
	                                    </ul>
									</p>
								</div>
								
							</div>						
							

							<hr style="width:100%;background:#999"></hr>

							@endfor

							<!-- <a href="#" class="next">Next Review &rarr;</a> -->
							@if($username)
							<div style="float:left">		
							<img src="{{$profile}}" style="width:60px;height:60px" alt="">
							<br>
							
	                        <b>{{$nickname}}</b>
	                        </div>


							<div class="mws-form-row" style="margin-left:115px">

			                    <label class="mws-form-label">留下您宝贵意见:</label>

			                    <form action="/home/introduce/liuyan" method="post" enctype="multipart/form-data">
				                    <div class="mws-form-item">
				              
				                        <script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.config.js"></script>
				                        <script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.all.min.js"> </script>

				                        <script type="text/javascript" charset="utf-8" src="/admins/ueditor/lang/zh-cn/zh-cn.js"></script>

				                        <script type="text/javascript">

				                            var ue = UE.getEditor('editor');
				                        </script>

				                        <script id="editor" type="text/plain" style="width:700px;height:300px;"name='content'>
				                        </script>

				                    </div>

				                    <input type="hidden" name="GoodsName" value="{{$res->title}}">
				                    <input type="hidden" name="UserName" value="{{$username}}">
				                    <input type="hidden" name="addtime" value="{{time()}}">


								 	{{ csrf_field()}}
									
				                    <input type="submit" class="butt" value="留言" style="width:240px">
			                    </form>

			                </div>

			                @else
								<a  class="next" id="pinglun">去评论 &rarr;</a>

			                @endif
								
						</div>

					</div>


					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFour">
							<h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Shipping Info <span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<h3>Shipping</h3>
							<ul class="ship">
								<li class="day"><i class="fa fa-calendar" aria-hidden="true"></i> 5-10 Business Days</li>
								<li class="home"><i class="fa fa-truck" aria-hidden="true"></i> Free Home Delivery</li>
								<li class="cod"><i class="fa fa-male" aria-hidden="true"></i> Cash On Delivery Available*</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>

		</div>
	</div>
	<!-- //Single-Product-View -->



	<!-- Newsletter -->
	<div class="w3lsnewsletter" id="w3lsnewsletter">
		<div class="container">
			<div class="w3lsnewsletter-grids">
				<div class="col-md-5 w3lsnewsletter-grid w3lsnewsletter-grid-1 subscribe">
					<h2>Subscribe to our Newsletter</h2>
				</div>
				<div class="col-md-7 w3lsnewsletter-grid w3lsnewsletter-grid-2 email-form">
					<form action="#" method="post">
						<input class="email" type="email" name="Email" placeholder="Email Address" required="">
						<input type="submit" class="submit" value="SUBSCRIBE">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //Newsletter -->


@endsection

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

		<!-- Popup-Box-JavaScript -->
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
		<!-- //Popup-Box-JavaScript -->

		<!-- FlexSlider-JavaScript -->
			<script defer src="/homes/js/jquery.flexslider.js"></script>
			<script>
				$(window).load(function() {
					$('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					});
				});
			</script>
		<!-- //FlexSlider-JavaScript -->

		<!-- ImageZoom-JavaScript --><script src="/homes/js/imagezoom.js"></script>

	<!-- //Custom-JavaScript-File-Links -->



		<!-- Bootstrap-JavaScript --> <script src="/homes/js/bootstrap.js"></script>


@section('js')

<script type="text/javascript">

	//$(window).ready(function(){
	
		//颜色
		$('.color li:gt(0)').click(function(){


			$(this).addClass('addcolor');


			$(this).siblings().removeClass('addcolor');

			//var tx = 12345;

			var tx = $(this).text();
			$('#incolor').attr('value',tx);
			// var tt = $('#incolor').attr('value');
			// console.log(tt);

		})

	//});



	//尺寸
	$('.size li:gt(0)').click(function(){

		$(this).addClass('addcolor');

		$(this).siblings().removeClass('addcolor');

		var ts = $(this).text();
		$('#insize').attr('value',ts);
			// var ta = $('#insize').attr('value');
			// console.log(ta);


	})

	$('#pinglun').click(function(){

		alert('请登录！');
	})

	// $('.butt').click(function(){

	
	// 	return false;
	// })

</script>

@endsection