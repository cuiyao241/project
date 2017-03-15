@extends('layout.personal')

@section('title','我的信息')

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
<div class="settings_box">
              <strong class="settings_title">修改地址</strong>
              <fieldset class="setPersonal">
                <form id="setPersonForm" method="post" action="/home/address/update">
                  <input type="hidden" name="Address_id" value="{{$data->Address_id}}">
                   <div class="form-list">
                    <label class="account-label">收货人姓名</label>
                    <input name="OrderName" type="text"  value="{{$data->OrderName}}" required>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">收货人电话</label>
                    <input name="Phone" type="text" value="{{$data->Phone}}" placeholder="" required>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">收货地址</label>
                    <input name="Address" type="text" value="{{$data->Address}}" required>
                    <strong></strong>
                  </div>
                  {{ csrf_field()}}
                  <input type="submit" value="确 认" id="submit" class="ext_submit">
                  
                </form>
              </fieldset>
            </div>
@endsection

@section('js')
<script type="text/javascript">

     //全局变量
    var NU = false;
    var BU = false;

    
    //真实姓名
     //获取焦点
    $('input[name=OrderName]').focus(function(){

      $(this).addClass('cur');
    })
    //失去焦点
    $('input[name=OrderName]').blur(function(){
      //获取输入姓名的值
      var nv = $(this).val();

      //正则表达式
      var reg = /[\u4E00-\u9FA5]{2,5}(?:·[\u4E00-\u9FA5]{2,5})*/;
      //检测
      var nvs = reg.test(nv);

      if(!nvs){

        $(this).css('border','solid 1px red');
        $(this).next().text(' *姓名格式错误').css('color','red');
        NU = false;
      } else {

        $(this).css('border','solid 1px green');
        $(this).next().text(' √').css('color','green');
        NU = true;

      }
    })


    //生日
  $('input[name=Phone]').focus(function(){

    $(this).addClass('cur');
    $(this).css('border','solid 1px #999');
    $(this).next().text(' *填写手机号').css('color','black');
  })

  //失去焦点
  $('input[name=Phone]').blur(function(){
    //获取值
    var bv = $(this).val();
    //正则表达式
    var reg = /^1(3|4|5|7|8)\d{9}$/;
    //检测
    var bvs = reg.test(bv);
    if(!bvs) {

      $(this).css('border','solid 1px red');
      $(this).next().text(' *手机格式错误').css('color','red');

      BU = false;
    } else {

      $(this).css('border','solid 1px green');
      $(this).next().text(' √').css('color','green');

      BU = true;
    }

  })
  

 </script>
@endsection