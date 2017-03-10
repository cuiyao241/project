@extends('layout.home')

@section('title','商品的详情页')

@section('content')
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
		background: red;

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

							@foreach($das as $k=>$v)
								<li data-thumb="{{$v->pic}}" >
									<div class="thumb-image detail_images"> <img src="{{$v->pic}}" data-imagezoom="true" class="img-responsive" alt="Groovy Apparel"></div>
								</li>

							@endforeach
							</ul>
						</div>
					</div>

					<div class="col-md-6 single-top-right">
						<h1 class="item_name">{{$res->title}}</h1>
						<!-- <p>This item will be delivered within 5-10 working days.</p> -->
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

						

						<!-- <p class="single-price-text"> </p> -->


						<ul class="color">
							<li style="border-style:none;color:#1abc9c">颜色：</li>	
							@foreach($goods['color'] as $k => $v)	
							<li>{{$v}}</li>
							@endforeach				
						</ul>

						<div class="clear"></div>
						
						<br><br>
						
						<ul class="size">
							<li style="border-style:none;color:#1abc9c">尺寸：</li>
							@foreach($goods['size'] as $ak => $av)
							<li>{{$av}}</li>
							@endforeach

						</ul>

						<br><br>
						<div class="cbp-pgcontent aitssinglew3" id="mens_single">

							<input type="hidden" name="id" value="{{$res->id}}">
							<input type="hidden" name="color" value="">
							<input type="hidden" name="size" value="">

							<button class="btn btn-danger agileits my-cart-btn" data-id="mens_single" data-name="Black Leather Jacket" data-summary="Black Leather Jacket" data-price="67.5" data-quantity="1" data-image="images/s1.jpg"><i class="fa fa-cart-plus" aria-hidden="true"></i> 加入购物车</button>
							<div class="clearfix"></div>
						</div>

						<div class="agilesocialwthree">
							<h4>分享本店</h4>
							<ul class="social-icons">
								<li><a href="#" class="facebook w3ls" title="Go to Our Facebook Page"><i class="fa w3ls fa-facebook-square" aria-hidden="true"></i></a></li>
								
							</ul>
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
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Description <span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>
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



							@foreach($pro as $k=>$v)
								<div class="ac-img" style="width:24%;text-align:center;margin-top:10px;">
									<a href="#"><img src="{{$v->pic}}" width="230px" height="320px" alt="Groovy Apparel"></a>
									<br>
									<a href="#" class="title">{{$v->title}}</a>
									<br>
									<a href="#" style="margin-left:3px">￥{{$v->price}}</a>
								</div>

							@endforeach
								
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title asd">
								<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">等级 & 评论 (40+) <span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<h3>"Excellent Quality & Fitting!"</h3>
							<h4>Léon, Certified Buyer.</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
							<span>5 Stars</span>
							<a href="#" class="next">Next Review &rarr;</a>
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




	<!-- Footer -->
<!-- 	<div class="agileinfofooter">
		<div class="agileinfofooter-grids">

			<div class="col-md-4 agileinfofooter-grid agileinfofooter-grid1">
				<ul>
					<li><a href="about.html">ABOUT</a></li>
					<li><a href="mens.html">MEN'S</a></li>
					<li><a href="mens_accessories.html">MEN'S ACCESSORIES</a></li>
					<li><a href="womens.html">WOMEN'S</a></li>
					<li><a href="womens_accessories.html">WOMEN'S ACCESSORIES</a></li>
				</ul>
			</div>

			<div class="col-md-4 agileinfofooter-grid agileinfofooter-grid2">
				<ul>
					<li><a href="stores.html">STORE LOCATOR</a></li>
					<li><a href="faq.html">FAQs</a></li>
					<li><a href="codes.html">CODES</a></li>
					<li><a href="icons.html">ICONS</a></li>
					<li><a href="contact.html">CONTACT</a></li>
				</ul>
			</div>

			<div class="col-md-4 agileinfofooter-grid agileinfofooter-grid3">
				<address>
					<ul>
						<li>40019 Parma Via Modena</li>
						<li>Sant'Agata Bolognese</li>
						<li>BO, Italy</li>
						<li>+1 (734) 123-4567</li>
						<li><a class="mail" href="mailto:mail@example.com">info@example.com</a></li>
					</ul>
				</address>
			</div>
			<div class="clearfix"></div>

		</div>
	</div> -->
	<!-- //Footer  --> <!-- w3aitssinglewthree -->

@endsection

	<!-- Copyright -->
	<div class="w3lscopyrightaits">
		<div class="col-md-8 w3lscopyrightaitsgrid w3lscopyrightaitsgrid1">
			<p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://www.17sucai.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
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

<!-- Default-JavaScript -->
<script src="/homes/js/jquery-2.2.3.js"></script>
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

			//console.log(tx);

		})

	//});



	//尺寸
	$('.size li:gt(0)').click(function(){

		$(this).addClass('.cur');

		$(this).siblings().removeClass('.cur');


	})

</script>

@endsection



