@extends('layout.admin')

@section('title','轮播图添加')

@section('content')
            
            
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>轮播图添加</span>
    </div>
    <div class="mws-panel-body no-padding">
      @if (session('info'))
            <div class="mws-form-message success" style="line-height:50px">
              {{ session('info') }}
            </div>

        @endif

        <form class="mws-form" action="/admin/adv/insert" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
               <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='font-size:17px;list-style:none'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label" name="cate_name">图片名称</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="title">
                    </div>
                </div>

                <div class="mws-form-row">
                        <label class="mws-form-label">轮播图:</label>
                        <div class="mws-form-item" style="margin-top:20px">
                        <div style="position: relative;width:55%" class="fileinput-holder">
                            <input type="file" readonly="readonly" class="large" multiple name='pic' placeholder="图片尺寸：220*320">
                            <span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">添加轮播图</span></div>
                    </div>
                </div>
                 {{ csrf_field() }}
              
                
            <div class="mws-button-row">

                <input value="添加" class="btn btn-danger" type="submit">
                
            </div>
        </form>
    </div>      
</div>    


@endsection

@section('js')

  <script type="text/javascript">
     setTimeout(function(){
           $('.mws-form-message').slideUp(1000);
     },3000)
  </script>
@endsection