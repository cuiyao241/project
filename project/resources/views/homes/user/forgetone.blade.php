@extends('layout.home')

@section('title','忘记密码')

@section('content')

<div class="content">
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写账户名</strong></div>
       <div class="liutext"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
	<form action="/home/forgetpwd/username" method="post"  class="forget-pwd">
       <dl>
        <dt>账户名：</dt>
        <dd><input name="User_name" style="color:black;" type="text" /></dd>
        <div class="clears"></div>
       </dl> 
        {{ csrf_field()}}
       <div class="subtijiao"><input type="submit" value="提交" /></div> 
      </form><!--forget-pwd/-->
   </div><!--web-width/-->
  </div><!--content/-->

@endsection