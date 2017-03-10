@extends('layout.home')

@section('title','我的购物车')

@section('content')

<div id="navlist">
    <ul>
        <li class="navlist_red_left">
        </li>
        <li class="navlist_red">
            1. 查看购物车
        </li>
        <li class="navlist_red_arrow">
        </li>
        <li class="navlist_gray">
            2. 确认订单信息
        </li>
        <li class="navlist_gray_arrow">
        </li>
        <li class="navlist_gray">
            3. 付款到支付宝
        </li>
        <li class="navlist_gray_arrow">
        </li>
        <li class="navlist_gray">
            4. 确认收货
        </li>
        <li class="navlist_gray_arrow">
        </li>
        <li class="navlist_gray">
            5. 评价
        </li>
        <li class="navlist_gray_right">
        </li>
    </ul>
</div>
<div id="content">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="shopping">
        <form action="" method="post" name="myform">
            <tr>
                <td class="title_1">
                    <input id="allCheckBox" type="checkbox" value="" onclick="selectAll()"
                    />
                    全选
                </td>
                <td class="title_2" colspan="2">
                    店铺宝贝
                </td>
                <td class="title_3">
                    获积分
                </td>
                <td class="title_4">
                    单价（元）
                </td>
                <td class="title_5">
                    数量
                </td>
                <td class="title_6">
                    小计（元）
                </td>
                <td class="title_7">
                    操作
                </td>
            </tr>
            <tr>
                <td colspan="8" class="line">
                </td>
            </tr>
            @foreach ($data as $k => $v)
            <tr id="product1">
                <td class="cart_td_1">
                    <input name="cartCheckBox" type="checkbox" value="product1" onclick="selectSingle()"
                    />
                </td>
                <td class="cart_td_2">
                    <img style="width:100px; height: 100px;" src="/homes/images/taobao_cart_01.jpg" alt="shopping" />
                </td>
                <td class="cart_td_3">
                    <a href="#">
                        {{$v['sub_cart']->title}}
                    </a>
                    <br />
                    颜色：{{$v['color']}} 尺码：asd
                    <br />
                    保障：
                    <img style="width:15px" src="/homes/images/taobao_icon_01.jpg" alt="icon" />
                </td>
                <td class="cart_td_4">
                    5
                </td>
                <td class="cart_td_5">
                    138.00
                </td>
                <td class="cart_td_6">

                    <span class="glyphicon glyphicon-minus-sign" aria-hidden="true" alt="minus" onclick="changeNum('num_1','minus')"
                    class="hand" style="font-size:15px;"></span> 
    
                    <input id="num_1" type="text" value="1" class="num_input" readonly="readonly" style="width:50px;height:15px;background-color:white;color:red; border-radius:10px; font-size:15px;" ;
                    /> 
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="changeNum('num_1','add')"
                    class="hand" style="font-size:15px;"></span>
                </td>
                <td class="cart_td_7">
                </td>
                <td class="cart_td_8">
                    <a href="javascript:deleteRow('product1');">
                        删除
                    </a>
                </td>
            </tr>
            @endforeach
            <tr>
                 <td  colspan="3"><a href="javascript:deleteSelectRow()"><img style="width:100px" src="/homes/images/taobao_del.jpg" alt="delete"/></a></td>
                <td colspan="5" class="shopend">商品总价（不含运费）：<label id="total" class="yellow"></label> 元<br />可获积分 <label class="yellow" id="integral"></label> 点<br />
                <input name=" " type="image" src="/homes/images/taobao_subtn.jpg" /></td>
            </tr>


        </form>
    </table>
</div>

@endsection

@section('js')

@endsection