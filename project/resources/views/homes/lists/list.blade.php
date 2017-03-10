
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>商品列表页面</title>

<link href='http://fonts.useso.com/css?family=Work+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/homes/lists/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/homes/lists/css/style.css" type="text/css" />

<script src="/homes/lists/js/modernizr.js"></script> -->
@extends('layout.home')

@section('title','商品的详情页')


@section('content')

<!-- <link href='http://fonts.useso.com/css?family=Work+Sans:400,600,700' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" href="/homes/lists/css/reset.css" type="text/css" />
<link rel="stylesheet" href="/homes/lists/css/style.css" type="text/css" />

<script src="/homes/lists/js/modernizr.js"></script> 


<header>
	<h1>添加到购物车</h1>	
</header>


<ul class="cd-gallery">
	<li>

		@foreach($res as $k => $v)
		<div class="cd-single-item">
			<a href="#0">
				<ul class="cd-slider-wrapper">
					<!-- <li><img src="" alt="Preview image"></li> -->
						
					<?php
						$arr = DB::table('goods_images')->where('pid', $v->id)->get();
					?>
					@foreach($arr as $zk=>$zv)
					<li class="selected"><img src="{{$zv->pic}}" alt="Preview image"></li>
					@endforeach
				</ul>
			</a>

			<div class="cd-customization">
				<div class="color selected-2" data-type="select">
					<ul>
						@foreach($pro['color'] as $ak=>$av)
						<li class="color-2 active">{{$av}}</li>
						@endforeach
		
					</ul>
				</div>
				
				<div class="size" data-type="select">
					<ul>
						@foreach($pro['size'] as $qk=>$qv)
						<li class="small active">{{$qv}}</li>
						@endforeach
					
					</ul>
				</div>

				<button class="add-to-cart">
					<em>加入购物车</em>
					<svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
						<path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/>
					</svg>
				</button>
			</div> <!-- .cd-customization -->

			<button class="cd-customization-trigger">Customize</button>
		</div> <!-- .cd-single-item -->

		<div class="cd-item-info">
			<b><a href="#0">{{$v->title}}</a></b>
			<em>${{$v->price}}</em>
		</div> <!-- cd-item-info -->
		@endforeach
	</li>

</ul> <!-- cd-gallery -->

<script type="text/javascript" src="/homes/lists/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/homes/lists/js/main.js"></script>

@endsection