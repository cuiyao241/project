@extends('layout.home')

@section('title','商品的详情页')

@section('content')
<style type="text/css">
	a{ color:#ffffff;}
	.label-warning a:hover{
		color:#3CB371;
	}
</style>
<h1 class="w3wthreeheadingaits" style="height:150px">Congratulations! Success!</h1>
 <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
	<div class="panel-body panel_text">
		<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;font-size:30px; margin-left:70px" > 恭喜您、商品已成功加入购物车！</span>
		<br><br>
		<span style="float:right;margin-right:140px;height:20px"><span class="label label-warning" style="font-size:15px"><a href="javascript:history.go(-1)" >继续购物</a></span> 
		<span class="label label-success" style="font-size:15px;"><a href="/home/cart/shopcart">去购物车结算</a></span></span>
			
	</div>
</div>
<br><br>
<div class="w3lsnewsletter" id="w3lsnewsletter">
		<div class="container">
			<div class="w3lsnewsletter-grids">
				<div class="col-md-5 w3lsnewsletter-grid w3lsnewsletter-grid-1 subscribe">
					<p>Subscribe to our Newsletter</p>
				</div>
				<div class="col-md-7 w3lsnewsletter-grid w3lsnewsletter-grid-2 email-form">
					<form action="#" method="post">
						<input class="email" name="Email" placeholder="Email Address" required="" type="email">
						<input class="submit" value="SUBSCRIBE" type="submit">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@endsection


