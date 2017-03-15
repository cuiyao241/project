@extends('layout.personal')

@section('title','修改密码')

@section('content')

@if (session('info'))
    <div class="alert alert-success" style="margin-left:186px;width:1013px;height:30px;text-align:center;font-size:17px;color:red;background-color:pink;">
        {{ session('info') }}
    </div>
@endif
  <div class="settings_box"> 
   <strong class="settings_title">用户密码</strong> 
   <fieldset class="setPersonal"> 
    <form  method="post"  action="/home/personal/pwdupdate"> 
      {{ csrf_field() }}
      @if (count($errors) > 0)
         <div class="mws-form-message error">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style='font-size:5px;list-style:none'>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <div class="form-list"> 
      <label class="account-label">旧密码</label> 
 
      <!-- for disable autocomplete on chrome --> 
      <input  class="l_ipt" name="oldPassword" type="password" value="" required/> 
      <strong></strong> 
     </div> 

     <div class="form-list"> 
      <label class="account-label">新密码</label> 
  
      <!-- for disable autocomplete on chrome --> 
      <input autocomplete="off" class="l_ipt" name="Password" type="password" value="" required/> 
      <strong></strong> 
     </div> 
     <div class="form-list"> 
      <label class="account-label">确认密码</label> 
      <input style="display:none" />
      <!-- for disable autocomplete on chrome --> 
      <input autocomplete="off" class="l_ipt"  name="rePassword" type="password" value="" required/> 
      <strong class="setPasswordErrorMessageLine"></strong> 
     </div> 
    <input type="hidden" name="User_name" value="{{$data->User_name}}">
     <input type="submit" value="确 认" id="submit" class="ext_submit" /> 
     <span class="submit_error"></span> 
    </form> 
   </fieldset>
  </div>


@endsection

@section('js')
<script type="text/javascript">
// alert($);
 //全局变量
  var PU = false;
  var RPU = false;
  var OPW = false;

  //旧密码
  $('input[name=oldPassword]').focus(function(){
    $(this).css('border','solid 1px #999');
    $(this).next().text(' *请输入旧密码').css('color','black');
    $(this).addClass('cur');
  })


  //密码
  //获取焦点
  $('input[name=Password]').focus(function(){
    $(this).css('border','solid 1px #999');
    $(this).next().text(' *请输入新密码').css('color','black');
    $(this).addClass('cur');
  })
  //失去焦点
  $('input[name=Password]').blur(function(){
    //获取输入密码的值
    var pv = $(this).val();

    //正则表达式
    var reg = /^\w{5,12}$/;
    //检测
    var pvs = reg.test(pv);

    if(!pvs){

      $(this).css('border','solid 1px red');
      $(this).next().text(' *密码格式不正确').css('color','red');

      PU = false;
    } else {

      $(this).css('border','solid 1px green');
      $(this).next().text(' √').css('color','green');

      PU = true;

    }
  })

  //确认密码
  $('input[name=rePassword]').focus(function(){
    $(this).css('border','solid 1px #999');
    $(this).next().text(' *请输入确认密码').css('color','black');
    $(this).addClass('cur');
  })

  //失去焦点
  $('input[name=rePassword]').blur(function(){

    //获取确认密码值
    var rpv = $(this).val();
    //获取输入密码的值
    var pv = $('input[name=Password]').val();

    if(rpv != pv){

      $(this).css('border','solid 1px red');
      $(this).next().text(' *两次密码不一致').css('color','red');

      RPU = false;

    } else {
      $(this).css('border','solid 1px green');
      $(this).next().text(' √').css('color','green');

      RPU = true;


    }
  })

</script>
@show

