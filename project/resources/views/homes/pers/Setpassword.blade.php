@extends('layout.personal')

@section('title','修改密码')

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
  <div class="settings_box"> 
   <strong class="settings_title">用户密码</strong> 
   <fieldset class="setPersonal"> 
    <form  method="post"  action="/home/personal/pwdupdate/20"> 
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
     <div class="form-list" id="old-form"> 
      <label class="account-label">当前密码</label> 
      <input style="display:none" />
      <!-- for disable autocomplete on chrome --> 
      <input autocomplete="off" class="l_ipt"  name="
      Password" type="password" value="{{$data->Password}}"  disabled/> 
      <strong style="display:none;"></strong> 
      <!-- <a id="forget"><strong>忘记密码？</strong></a> --> 
     </div> 
     <div class="form-list"> 
      <label class="account-label">新密码</label> 
      <input style="display:none" />
      <!-- for disable autocomplete on chrome --> 
      <input autocomplete="off" class="l_ipt" name="Password" type="password" value="" /> 
      <strong></strong> 
     </div> 
     <div class="pw_safe none_f" style="display: block;"> <span class="txt">安全程度</span> <div class="pw_strength pw_weak pw_medium pw_strong"> <div class="pw_bar"></div> <div class="pw_letter"> <span class="strength_l pw_strength_color">低</span> <span class="strength_m">中</span> <span class="strength_h">强</span> </div> </div> </div>
     <div class="form-list"> 
      <label class="account-label">确认密码</label> 
      <input style="display:none" />
      <!-- for disable autocomplete on chrome --> 
      <input autocomplete="off" class="l_ipt"  name="rePassword" type="password" value="" /> 
      <strong class="setPasswordErrorMessageLine"></strong> 
     </div> 
    <input type="hidden" name="User_id" value="{{$data->User_id}}">
     <input type="submit" value="确 认" id="submit" class="ext_submit" /> 
     <span class="submit_error"></span> 
    </form> 
   </fieldset>
  </div>


@endsection

@section('js')

 @show

