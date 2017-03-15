@extends('layout.personal')

@section('title','我的订单')

@section('content')

	<div class="mu_content_wrap">
        <div class="order-title">
            <ul class="order-title-column clearfix">
                <li class="goods">商品</li>
                <li class="aftersale">订单号</li>
                <li class="price">单价(元)</li>
                <li class="quantity">数量</li>
                <li class="total">总金额(元)</li>
                <li class="status">交易状态</li>
                <li class="other">操作</li>
            </ul>
        </div>

        <div id="orderWrap"></div>
    </div>

<table width="1014" border="0" cellspacing="0" cellpadding="0" >
    @foreach ($data as $k => $v )
      <tr align="center" valign="middle" bgcolor="#FFF7FB" style="border-top:dotted 1px 	#ff3366;border-bottom:dotted 1px 	#ff3366; font-size:13px;">
        <td width="15%"><img src="{{$data[$k]->pic}}" width="100px;" height="80px;" style="margin:10px;"/></td>
        <td width="17%" align="left" style="border-right: 1px dotted #ccc;
"><a href="{{$data[$k]->GoodsUrl}}" target="view_window">{{$data[$k]->GoodsName}}</a></td>
        <td width="12%" align="center" style="border-right: 1px dotted #ccc;">{{$data[$k]->Order_id}}</td>
        <td width="11%" align="center" style="border-right: 1px dotted #ccc;"> {{$data[$k]->GoodsFee}} </td>
        <td width="8%" align="center" style="border-right: 1px dotted #ccc;">{{$data[$k]->GoodsNum}}</td>
        <td width="12%" align="center" style="border-right: 1px dotted #ccc;">{{$data[$k]->TotalPrice}}</td>
        <td width="12%" align="center" style="border-right: 1px dotted #ccc;"> 
            @if($data[$k]->IsPayment == '0') 
                                [未付款] <br>
                            @else
                                [已付款] <br>
                            @endif

                            @if($data[$k]->IsConsignment == '0') 
                                [未发货]
                            @else
                                [已发货]
                            @endif
                        </td>
        <td width="12%" align="center">
            
        <form action="/home/personal/ordok" method="post">
            {{ csrf_field()}}
            @if($data[$k]->IsConfirm == '0') 
             <input type="submit" value="确认收货">
             @else
                [已收货]
             @endif
             <input type="hidden" name="Order_id" value="{{$data[$k]->Order_id}}">
        </form>
        </td>
      </tr>
    @endforeach 
</table>



@endsection