@extends('layout.personal')

@section('title','我的信息')

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif

<div class="mu_content_wrap">
        <div class="order-title">
            <ul class="order-title-column clearfix">
                <li class="goods" style="width:10%">用户</li>
                <li class="aftersale" style="width:10%">收货人姓名</li>
                <li class="price" style="width:15%">电话</li>
                <li class="quantity" style="width:40%">收货地址</li>
                <li class="other" style="width:15%">操作</li>
            </ul>
        </div>
  
        <div id="orderWrap">
        @foreach ($data as $k => $v )
        	<ul class="order-title-column clearfix" >
                <li style="border:1px solid #ccc;width:10%;height:20px" >{{$data[$k]->User_name}}</li>
                <li style="border:1px solid #ccc;width:10%;height:20px">{{$data[$k]->OrderName}}</li>
                <li style="border:1px solid #ccc;width:15%;height:20px">{{$data[$k]->Phone}}</li>
                <li style="border:1px solid #ccc;width:40%;height:20px">{{$data[$k]->Address}}</li>
                <li style="border:1px solid #ccc;width:15%;height:20px">
                <a href="/home/address/edit/{{$data[$k]->Address_id}}">[修改]</a> 
                <a href="/home/address/delete/{{$data[$k]->Address_id}}">[删除]</a> @if($data[$k]->default)
                 	[已默认] 
                @else 
                	<a href="/home/address/default?Address_id={{$data[$k]->Address_id}}&User_name={{$data[$k]->User_name}}">　[默认]</a> 
                @endif
                </li>
            </ul> 
         @endforeach 
 
    <?php 
        $User_name = session('User_name');
     ?> 
         		<br>
         		<form action="/home/address/add" method="post">
         			<input type="hidden" value="{{$User_name}}" name="User_name">
         			{{ csrf_field()}}
         			<input type="submit" value="增添新地址" style="float:right;margin-right:151px">
         		</form>
                	
        </div>
</div>

@endsection
