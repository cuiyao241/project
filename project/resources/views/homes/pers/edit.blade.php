@extends('layout.personal')

@section('title','修改信息')

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
            <div class="settings_box">
              <strong class="settings_title">修改信息</strong>
              <fieldset class="setPersonal">
                <form method="post"  action="/home/personal/update">
                  {{ csrf_field() }}
                   <div class="form-list">
                    <label class="account-label">用户名</label>
                    <input name="User_name" type="text"  placeholder="{{$data->User_name}}" disabled>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">邮箱</label>
                    <input  name="Emails" type="text"  placeholder="{{$data->Emails}}" disabled>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">真实姓名</label>
                    <input  name="TrueName" type="text" value="{{$data->TrueName}}" required>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">昵称</label>
                    <input  name="nickname" type="text" value="{{$data->nickname}}" required>
                    <strong></strong>
                  </div>

                  <div class="gender">
                    <label class="account-label">性别</label>
                    <input type="radio" class="regular-radio" value="0" id="female" name="Sex" @if($data->Sex=="0") checked @endif>
                    <label class="regular-radio-label" for="female"></label>
                    <span>男</span>
                    <input type="radio" class="regular-radio" value="1" id="male" name="Sex" @if($data->Sex=="1") checked @endif>
                    <label for="male" class="regular-radio-label"></label>
                    <span>女</span>
                    <strong></strong>
                  </div>
                  <div class="form-list" id="birthday-list">
                    <label class="account-label">生日</label>
                    <input id="" name="birthday" autocomplete="off" class="l_ipt" type="text" value="{{$data->birthday}}" >
                    <strong></strong>
                  </div>
                 
                  <div class="form-list">
                    <label class="account-label">个人说明</label>
                    <textarea id="introduction" class="introduction" name="intro">{{$data->intro}}</textarea>
                    <br>
                    <strong class="introduction-error"></strong>
                  </div>
                  <input type="submit" value="确 认" id="submit" class="ext_submit">
                  <span class="submitError"></span>
                  <input type="hidden" name="User_name" value="{{$data->User_name}}">
                </form>
              </fieldset>
            </div>
			
@endsection

@section('js')
<script type="text/javascript">

    //全局变量
    var NU = false;
    var BU = false;
    var PU = false;

    //真实姓名
    //获取焦点
    $('input[name=TrueName]').focus(function(){

      $(this).addClass('cur');
    })
    //失去焦点
    $('input[name=TrueName]').blur(function(){
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

    //昵称
    //获取焦点
    $('input[name=nickname]').focus(function(){
      // alert('123');
      $(this).addClass('cur');
    })
    //失去焦点
    $('input[name=nickname]').blur(function(){
      //获取输入昵称的值
      var pv = $(this).val();

      //正则表达式
      var reg = /^[\u4E00-\u9FA5A-Za-z0-9]{2,10}$/;
      //检测
      var pvs = reg.test(pv);

      if(!pvs){

        $(this).css('border','solid 1px red');
        $(this).next().text(' *昵称格式错误').css('color','red');
        PU = false;
      } else {

        $(this).css('border','solid 1px green');
        $(this).next().text(' √').css('color','green');
        PU = true;

      }
    })


    //生日
  $('input[name=birthday]').focus(function(){

    $(this).addClass('cur');
    $(this).css('border','solid 1px #999');
    $(this).next().text(' *日期格式1997-01-01').css('color','black');
  })

  //失去焦点
  $('input[name=birthday]').blur(function(){
    //获取值
    var bv = $(this).val();
    //正则表达式
    var reg = /^((?:19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;
    //检测
    var bvs = reg.test(bv);
    if(!bvs) {

      $(this).css('border','solid 1px red');
      $(this).next().text(' *日期格式错误').css('color','red');

      BU = false;
    } else {

      $(this).css('border','solid 1px green');
      $(this).next().text(' √').css('color','green');

      BU = true;
    }

  })

</script>
@show