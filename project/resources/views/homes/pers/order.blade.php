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

	<table width="1014" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" valign="middle">
    <td width="15%"><img src="/upload/12691488972037.jpg" width="60%" height="10%" style="padding-left:10px;"/></td>
    <td width="17%" align="left">商品名商品名商品名商品名商品名商品名</td>
    <td width="11%" align="center">订单号</td>
    <td width="11%" align="center">单价</td>
    <td width="7%" align="center">数量</td>
    <td width="13%" align="center">总价</td>
    <td width="13%" align="center">已付款<br/><span>已发货</span></td>
    <td width="13%" align="center"><a href="allinfo/313">确认收货</a></td>
  </tr>

</table>



@endsection