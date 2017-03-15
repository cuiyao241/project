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
                <li class="goods">用户</li>
                <li class="aftersale">收货人姓名</li>
                <li class="price">电话</li>
                <li class="quantity">是否为默认地址</li>
                <li class="other">操作</li>
            </ul>
        </div>
        <div id="orderWrap">
        	<ul class="order-title-column clearfix">
                <li class="goods">用户</li>
                <li class="aftersale">收货人姓名</li>
                <li class="price">电话</li>
                <li class="quantity">是否为默认地址</li>
                <li class="other">操作</li>
            </ul>
        </div>
</div>
       <table width="1014" border="1" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td>商品图</td>
    <td>商品信息</td>
    <td>订单</td>
    <td>单价</td>
    <td>数量</td>
    <td>总价</td>
    <td>状态</td>
    <td>操作</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody></table> 
@endsection

@section('js')
<script type="text/javascript">

//     //全局变量
//     var NU = false;
//     var BU = false;
    


//     //真实姓名
//     //获取焦点
//     $('input[name=TrueName]').focus(function(){

//       $(this).addClass('cur');
//     })
//     //失去焦点
//     $('input[name=TrueName]').blur(function(){
//       //获取输入姓名的值
//       var nv = $(this).val();

//       //正则表达式
//       var reg = /[\u4E00-\u9FA5]{2,5}(?:·[\u4E00-\u9FA5]{2,5})*/;
//       //检测
//       var nvs = reg.test(nv);

//       if(!nvs){

//         $(this).css('border','solid 1px red');
//         $(this).next().text(' *姓名格式错误').css('color','red');
//         NU = false;
//       } else {

//         $(this).css('border','solid 1px green');
//         $(this).next().text(' √').css('color','green');
//         NU = true;

//       }
//     })


//     //生日
//   $('input[name=birthday]').focus(function(){

//     $(this).addClass('cur');
//     $(this).css('border','solid 1px #999');
//     $(this).next().text(' *日期格式1997-01-01').css('color','black');
//   })

//   //失去焦点
//   $('input[name=birthday]').blur(function(){
//     //获取值
//     var bv = $(this).val();
//     //正则表达式
//     var reg = /^((?:19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;
//     //检测
//     var bvs = reg.test(bv);
//     if(!bvs) {

//       $(this).css('border','solid 1px red');
//       $(this).next().text(' *日期格式错误').css('color','red');

//       BU = false;
//     } else {

//       $(this).css('border','solid 1px green');
//       $(this).next().text(' √').css('color','green');

//       BU = true;
//     }

//   })

// </script>
@endsection