@extends('layout.personal')

@section('title','个人中心')

@section('content')

            <div class="settings_box">
              <strong class="settings_title">我的信息</strong>
              <fieldset class="setPersonal">
                <form id="setPersonForm" method="post"  action="">
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
                    <input  name="TrueName" type="text" value="{{$data->TrueName}}">
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
                  <div class="form-list" id="birthday-list">
                    <label class="account-label">生日</label>
                    <input id="" name="birthday" autocomplete="off" class="l_ipt" type="text" value="" >
                    <strong></strong>
                  </div>
                 
                  <div class="form-list">
                    <label class="account-label">个人说明</label>
                    <textarea id="introduction" class="introduction" name="intro"></textarea>
                    <br>
                    <strong class="introduction-error"></strong>
                  </div>
                  <input type="submit" value="确 认" id="submit" class="ext_submit">
                  <span class="submitError"></span>
                  <input type="hidden" name="User_id" value="">
                </form>
              </fieldset>
            </div>

@endsection

@section('js')

@endsection