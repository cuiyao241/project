
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
<!-- Bootstrap-CSS -->	<link rel="stylesheet" href="/homes/css/bootstrap.css"	type="text/css" media="all">
<!-- Index-Page-CSS -->	<link rel="stylesheet" href="/homes/css/style.css"		type="text/css" media="all">

<!-- Font-Awesome-File-Links -->
<!-- CSS --> <link rel="stylesheet" href="/homes/css/font-awesome.css" 		 type="text/css" media="all">
<!-- TTF --> <link rel="stylesheet" href="/homes/fonts/fontawesome-webfont.ttf" type="text/css" media="all">
<!-- //Font-Awesome-File-Links -->

<style type="text/css">
	
	label {
    margin: -4px;
}

input.css-checkbox[type="checkbox"] + label.css-label {
    background-position: 0 -30px;
    background-repeat: no-repeat;
    cursor: pointer;
    display: inline-block;
    font-size: 15px;
    height: 30px;
    line-height: 30px;
    padding-left: 30px;
    vertical-align: initial;
    width: 43px;

}

.one{
	
	border:solid 1px red;

}


</style>
<!-- Body -->
<body>


	<!-- Heading -->
	<h1 class="w3wthreeheadingaits">{{$ding->title}}</h1>
	<!-- //Heading -->



	<!-- Men's-Product-Display -->
	<div class="wthreeproductdisplay">
		<div id="cbp-pgcontainer" class="cbp-pgcontainer">
			<ul class="cbp-pggrid">

				@foreach($res as $k=>$v)
				<li class="wthree aits w3l">
					<div class="cbp-pgcontent" id="men-8">
						<span class="cbp-pgrotate"><i class="fa fa-exchange" aria-hidden="true"></i></span>
						<a href="mens_single.html">
							<div class="cbp-pgitem a3ls">
								<div class="cbp-pgitem-flip">
									<img src="{{$v->pic}}" alt="Groovy Ael">
									<!-- <img src="{{$v->title}}" alt="Groovy Apparel"> -->
								</div>
							</div>
						</a>
						<ul class="cbp-pgoptions w3l">
							<li class="cbp-pgoptcompare">

								<div style="text-aligin:center">
								
								<input type="checkbox" name="checkboxG8" id="checkboxG8" class="css-checkbox w3"><label for="checkboxG8" class="css-label"></label>
								<span>2445</span>
								</div>
							</li>

<!-- 							<li class="cbp-pgoptfav">
								此处为衣服的等级
								<span>5 <i class="fa fa-star" aria-hidden="true"></i></span>

							</li> -->


							<li class="cbp-pgoptsize agile">
								<span data-size="XL">尺寸</span>
								<div class="cbp-pgopttooltip">

									<!-- 遍历尺寸 -->
									@foreach($pro['size'] as $qk=>$qv)

										<span class="sizes xuanzhong" data-size="{{$qv}}" style="font-size:9px;width:40px;">{{$qv}}</span>

									@endforeach
								</div>
							</li>
									
							<li class="cbp-pgoptsize agile">
								<span data-size="XL">颜色</span>
								<div class="cbp-pgopttooltip">

									<!-- 遍历颜色 -->
									@foreach($pro['color'] as $ak=>$av)

										<span class="colors xuanzhong" data-size="{{$av}}" style="font-size:9px">{{$av}}</span>

									@endforeach
								</div>
							</li>
							<li class="cbp-pgoptcart">
								<!-- <form action="/home/list/add" method="post"> -->
							
								<form action="/home/cart/remind" method="post">
										<input type="hidden" id="incolor" name="color" value="">
										<input type="hidden" id="insize" name="size" value=""> 
										<input type="hidden" name="id" value="{{$v->id}}"> 
										<input type="hidden" name="price" value="{{$v->price}}"> 
										<button type="submit" class="w3l-cart pw3l-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
										<span class="w3-agile-line"></span>
										{{csrf_field()}}
										<a href="#" data-toggle="modal" data-target="#myModal1"></a>
								</form>
							</li>
						</ul>
					</div>
					<a href="mens_single.html">
						<div class="cbp-pginfo w3layouts">
							<h3>{{$v->title}}</h3>
							<span class="cbp-pgprice" style="font-size:12px">${{$v->price}}</span>
						</div>
					</a>
				</li>
				@endforeach
			
			</ul>
		</div>
	</div>
	<!-- //Men's-Product-Display -->



	<!-- Copyright
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
	</div> -->


	<!-- //Copyright -->
   <!-- Custom-JavaScript-File-Links -->
<!-- Default-JavaScript -->
<script src="/homes/js/jquery-2.2.3.js"></script>


<script src="/homes/js/modernizr.custom.js"></script>

		<!-- Shopping-Cart-JavaScript -->
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

		<script src="/homes/js/cbpShop.min.js"></script>
		<script>
			var shop = new cbpShop( document.getElementById( 'cbp-pgcontainer' ) ); 
		</script>

		<!-- 商品选中 -->
		<script type="text/javascript">

		//获取颜色
		$('.colors').click(function(){

			// alert(123);
			var tx = $(this).text();


			$(this).addClass('one');

			$('#incolor').attr('value', tx);

			// console.log($('#incolor'));


		})

		//获取尺寸
			$('.sizes').click(function(){

			// alert(123);
			var tx = $(this).text();


			$(this).addClass('one');

			$('#insize').attr('value', tx);

			// alert(tx);


		})

		// $('xuanzhong').click(function(){

		// 	$(this).addClass('curs');

		// })



		</script>

	<!-- //Custom-JavaScript-File-Links -->




@endsection

