@extends('layout.personal')

@section('title','个人中心首页')

@section('content')

            <div class="settings_box">
              <strong class="settings_title">个人信息</strong>
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
                    <input  name="TrueName" type="text" value="" placeholder="{{$data->TrueName}}" disabled>
                    <strong></strong>
                  </div>
                  <div class="form-list">
                    <label class="account-label">昵称</label>
                    <input  name="nickname" type="text" value="" placeholder="{{$data->nickname}}" disabled>
                    <strong></strong>
                  </div>
                <div class="gender">
                    <label class="account-label">性别</label>
                    <input type="radio" disabled class="regular-radio" value="0" id="female" name="Sex" @if($data->Sex=="0") checked @endif>
                    <label class="regular-radio-label" for="female"></label>
                    <span>男</span>
                    <input type="radio" disabled class="regular-radio" value="1" id="male" name="Sex" @if($data->Sex=="1") checked @endif>
                    <label for="male" class="regular-radio-label"></label>
                    <span>女</span>
                    <strong></strong>
                  </div>
                  <div class="form-list" id="birthday-list">
                    <label class="account-label">生日</label>
                    <input id="" name="birthday" autocomplete="off" class="l_ipt" type="text" value="" placeholder="{{$data->birthday}}" disabled>
                    <strong></strong>
                  </div>
                 
                  <div class="form-list">
                    <label class="account-label">个人说明</label>
                    <textarea  class="introduction" name="intro" placeholder="{{$data->intro}}" disabled></textarea>
                    <br>
                    <strong class="introduction-error"></strong>
                  </div>
                  
                  <span class="submitError"></span>
                  <input type="hidden" name="" value="">
                </form>
              </fieldset>
            </div>

@endsection

@section('js')

@endsection