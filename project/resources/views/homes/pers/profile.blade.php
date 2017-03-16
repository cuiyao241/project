@extends('layout.personal')

@section('title','修改头像')

@section('content')
@if (session('info'))
    <div class="alert alert-success" style="margin-left:186px;width:1013px;height:30px;text-align:center;font-size:15px;color:red;background-color:pink;">
        {{ session('info') }}
    </div>
@endif
  <div class="settings_box"> 
   <strong class="settings_title">个人头像</strong> 
   <fieldset> 
    <div class="setAvatar"> 
     <form id="setAvatar" method="post" action="/home/personal/proupdate"  enctype="multipart/form-data"> 
      <div> 
       <div class="img_submit"> 
        <span>选择上传的图片</span> 
        <input type="file" name="Profile" class="img_submit_in" id="img_submit" /> 
       </div> 
       <input type="submit" style="display:none;" id="uploadBtn" /> 
       <iframe id="get_upload_file" name="upload_file" class="none_f" frameborder="0"> </iframe> 
      </div> 
      <p>建议使用正方形的图片，支持JPG、GIF、JPEG、PNG格式，8M以内</p> 
      <img src="{{$data->Profile}}" class="original" /> 
      <div class="clear_both"></div> 
     {{ csrf_field() }}
     <input type="submit" name="save_thumbnail"  value="确 认"  class="ext_submit" style="margin-left:0px;"/> 
     <span class="submit_error"></span> 
     <input type="hidden" name="User_name" value="{{$data->User_name}}">
     </form> 
    </div> 
   </fieldset> 
  </div>


@endsection
@section('js')
<script type="text/javascript">
    setTimeout(function(){
         $('.alert-success').slideUp(1000);
   },1000)
   </script>
@endsection