@extends('layout.personal')

@section('title','我的信息')

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
            <div class="settings_box">
              <strong class="settings_title">我的信息</strong>
              <fieldset class="setPersonal">
                <form id="setPersonForm" method="post"  action="/home/personal/update">
                  {{ csrf_field() }}
                  <div class="form-list">
                    <label class="account-label">注册邮箱</label>
                    <input id="register_mail" name="register_mail" autocomplete="off" class="l_ipt input_disable" type="text" placeholder="{{$data->Emails}}" disabled>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">真实姓名</label>
                    <input  name="TrueName" type="text" value="{{$data->TrueName}}">
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">用户名</label>
                    <input id="nickname" name="User_name" type="text" value="{{$data->User_name}}" >
                    <strong></strong>
                  </div>
                  <!--[if IE 8]>
                    <div class="gender">
                      <label class="account-label">性别</label>
                      <input name="gender" style="margin-top:7px" id="female" type="radio" value="2" />
                      <lable for="female">女</lable>
                      <input name="gender" id="male" type="radio" value="1" />
                      <lable for="male">男</lable></div>
                  <![endif]-->
                  <div class="gender">
                    <label class="account-label">性别</label>
                    <input type="radio" class="regular-radio" value="0" id="female" name="Sex">
                    <label class="regular-radio-label" for="female"></label>
                    <span>男</span>
                    <input type="radio" class="regular-radio" value="1" id="male" name="Sex">
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
                  <input type="hidden" name="User_id" value="{{$data->User_id}}">
                </form>
              </fieldset>
            </div>
			
@endsection

@section('js')
<script type="text/javascript">

    //全局变量
    var NU = false;
    var BU = false;

    var TU = false;
    var CU = false;
    var RPU = false;

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

    // //用户名
    // //获取焦点
    // $('input[name=User_name]').focus(function(){

    //   // $(this).css('border','solid 2px blue');
    //   $(this).addClass('cur');
    // })

    // //失去焦点
    // $(':text:eq(2)').blur(function(){

    //   //获取文本框里面的值
    //   var tv = $(this).val();
    //   //正则表达式
    //   var reg = /^\S{5,12}$/;
    //   //检测
    //   var che = reg.test(tv);

    //   var tu = $(this);
    //   //判断
    //   if(!che){
    //     $('#text').text(' *用户名格式不正确');
    //     $('#text').css('color','red');
    //     $(this).css('border','solid 2px red');

    //     TU = false;

    //   } else {
    //     //发送ajax
    //     $.get('checkUser.php',{name:tv},function(data){

    //       // console.log(data);
    //       if(data == '1'){
    //         //用户名已存在
    //         $('#text').text(' *用户名已存在').css('color','red');
    //         tu.css('border','solid 1px red');

    //         TU = false;

    //       } else {

    //         $('#text').text(' √').css('color','green');
    //         tu.css('border','solid 1px green');

    //         TU = true;

    //       }

    //     })
        
    //   }
    // })

    //

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