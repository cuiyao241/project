@extends('layout.home')

@section('title','忘记密码')

@section('content')


<div class="content">
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写账户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext for-cur"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
     <form action="/home/forgetpwd/forupdate" method="post" class="forget-pwd">
          @if (count($errors) > 0)
         <div class="alert alert-danger" role="alert" >
              <ul>
          @foreach ($errors->all() as $error)
                   <strong>{{ $error }}</strong> 
          @endforeach
              </ul>
          </div>
          @endif
       <dl>
        <dt>新密码：</dt>
        <dd><input name="Password" type="password" style="color:black;"/></dd>
        <div class="clears"></div>
       </dl> 
       <dl>
        <dt>确认密码：</dt>
        <dd><input name="rePassword" type="password" style="color:black;"/></dd>
        <div class="clears"></div>
       </dl> 
       {{ csrf_field()}}
       <input type="hidden" name="User_name" value="{{$res}}"/>
       <div class="subtijiao"><input type="submit" value="提交" /></div> 
      </form><!--forget-pwd/-->
   </div><!--web-width/-->
  </div><!--content/-->
@endsection

@section('js')
<script type="text/javascript">
   setTimeout(function(){
         $('.alert-danger').slideUp(1000);
   },1000)
   </script>
@endsection