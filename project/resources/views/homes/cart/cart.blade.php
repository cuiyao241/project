@extends('layout.home')

@section('title','我的购物车')

@section('content')
<center>  
<br>
<div class="but_list" style="width:800px">
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active" ><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true" style="color:red"><b>我的购物车</b></a></li>
        
    </div>
</div>
</center>  

<br>

<div id="content">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="shopping">
        <form action="" method="post" name="myform">
            <tr>
                <td class="title_1">
                    <label><input id="allCheckBox" type="checkbox" value="" onclick="selectAll()"
                    />
                    <span style="font-size:15px;color:red"><b>全选</b></span></label>
                </td>
                <td class="title_2" colspan="2">
                    <b>店铺宝贝</b>
                </td>
                <td class="title_3">
                    <b>获积分</b>
                </td>
                <td class="title_4">
                    <b>单价（元）</b>
                </td>
                <td class="title_5">
                    <b>数量</b>
                </td>
                <td class="title_6">
                    <b>小计（元）</b>
                </td>
                <td class="title_7">
                    <b>操作</b>
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
                    <img style="width:100px; height: 100px;" src="{{$v['sub_cart']->pic}}" alt="shopping" />
                </td>
                <td class="cart_td_3">
                    <a href="#">
                        {{$v['sub_cart']->title}}
                    </a>
                    <br />
                    颜色：{{$v['color']}} 尺码：{{$v['size']}}
                    <br />
                    保障：
                    <img style="width:15px" src="/homes/images/taobao_icon_01.jpg" alt="icon" />
                </td>
                <td class="cart_td_4">
                    5
                </td>
                <td class="cart_td_5">
                    {{$v['sub_cart']->price}}
                </td>

                <td class="cart_td_6">
                    <br>
                    <span class="glyphicon glyphicon-minus-sign" aria-hidden="true" alt="minus" onclick="changeNum('num_1','minus')"
                    class="hand" style="font-size:15px;"></span> 
    
                    <input id="num_1" type="text" value="1" class="num_input" readonly="readonly" style="width:50px;height:15px;background-color:#DCDCDC;color:#cc0000; border-radius:10px; font-size:15px;" ;
                    /> 
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="changeNum('num_1','add')"
                    class="hand" style="font-size:15px;"></span>
                </td>
                <td class="cart_td_7">
                </td>
                <td class="cart_td_8">
                    <a href="javascript:deleteRow('product1');">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            <tr>
                 <td  colspan="3"></td>
                <td colspan="5" class="shopend">商品总价（不含运费）：<label id="total" class="yellow"></label> 元<br />可获积分 <label class="yellow" id="integral"></label> 点<br />
                <input name=" " type="image" src="/homes/images/taobao_subtn.jpg" /></td>
            </tr>


        </form>
    </table>
</div>
<!-- 相关商品 -->
<div class="w3lsnewsletter" id="w3lsnewsletter">
        <div class="container">
            <div class="w3lsnewsletter-grids">
                <div class="col-md-5 w3lsnewsletter-grid w3lsnewsletter-grid-1 subscribe">
                    <h2>Subscribe to our Newsletter</h2>
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

@section('js')

@endsection