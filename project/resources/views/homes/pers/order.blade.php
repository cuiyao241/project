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
                <li class="total">实付款(元)</li>
                <li class="status">交易状态</li>
                <li class="other">操作</li>
            </ul>
        </div>

        <div id="orderWrap"></div>
    </div>

	<table width="1014" border="1" cellspacing="0" cellpadding="0">
  <tr align="center" valign="middle">
    <td width="20%">商品图</td>
    <td width="12%">商品信息</td>
    <td width="11%">订单</td>
    <td width="11%">单价</td>
    <td>数量</td>
    <td>总价</td>
    <td>状态</td>
    <td>操作</td>
  </tr>
  <tr align="center" valign="middle">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
  </tr>
</table>



@endsection