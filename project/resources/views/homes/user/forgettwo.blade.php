@extends('layout.home')

@section('title','忘记密码')

@section('content')

  <div class="content">
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写账户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
     <form action="/home/forgetpwd/forgettwo" method="post" class="forget-pwd">
       <dl>
        <dt>验证方式：</dt>
        <dd>
         <select class="selyz">
          <!-- <option value="0">已验证手机</option> -->
          <option value="1">通过邮箱验证</option>
         </select>
        </dd>
        <div class="clears"></div>
       </dl>
       <dl>
        <dt>用户名：</dt>
        <dd><input style="color:black;" name="User_name" type="text" value="{{$res->User_name}}" disabled /></dd>
        <div class="clears"></div>
       </dl>

       <dl class="sel-yzyx">
        <dt>验证邮箱：</dt>
        <dd><input type="email" value="" name="Emails"  style="color:black;"/></dd>
        <div class="clears"></div>
       </dl>
      {{ csrf_field()}}
      <input type="hidden" name="User_name" value="{{$res->User_name}}"/>
       <div class="subtijiao"><input type="submit" value="提交" /></div> 
      </form><!--forget-pwd/-->
   </div><!--web-width/-->
  </div><!--content/-->
@endsection

@section('js')
  <script type="text/javascript">
 //导航定位
 $(function(){
  // $(".nav li:eq(2) a:first").addClass("navCur")
   //验证手机 邮箱 
   $(".selyz").change(function(){
     var selval=$(this).find("option:selected").val();
     if(selval=="0"){
       $(".sel-yzsj").show()
       $(".sel-yzyx").hide()
       }
     else if(selval=="1"){
       $(".sel-yzsj").hide()
       $(".sel-yzyx").show()
       }
     })
   })
</script>
@endsection