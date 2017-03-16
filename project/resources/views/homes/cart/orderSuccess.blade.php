@extends('layout.home')

@section('title','支付页面')

@section('content')
	<div class="panel-body panel_text">
		<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;font-size:30px; margin-left:70px"> 订单完成,请支付！</span>
		<br><br>

	</div>
	<center>
	<div class="bs-example bs-example-tabs" role="tabpanel" style="width:700px"  data-example-id="togglable-tabs">
		<ul id="myTab" class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">支付宝</a></li>
		<li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">微信</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
			<img src="/homes/img/cuiyaozfb.jpg" alt="" style="width:400px">
		</div>
		<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
		<img src="/homes/img/cuiyaowx.jpg" alt="" style="width:400px">
		</div>
		</div>
	
</div>
</center>
	<span class="label label-success" style="font-size:20px;float:right; margin-right:200px;margin-bottom:10px"><a href="/home">返回首页</a></span>
	<form action="/home/order/pay" method="post">
@foreach ($Order_id as $k => $v)

		<input type="hidden" value="{{$v}}" name="Order_id[]">
	
@endforeach	
		{{ csrf_field()}}
		<input type="submit" value="人工支付">
	</form>
@endsection

@section('js')


@endsection