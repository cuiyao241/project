@extends('layout.admin')

@section('title','商品类添加')

@section('content')
            
            
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>商品类添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/cate/insert" method="post">
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
                    <label class="mws-form-label" name="cate_name">商品类名</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="title">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">所属类别</label>
                    <div class="mws-form-item">
                        <select class="small" name="pid" >
                            @if($son == 'ding')

                             <option value="0">顶级大类</option>
                            
                            @else

                           <option value="{{$son->id}}">{{$son->title}}</option>
                            @endif

                            @foreach($res as $k=>$v)
                            <option value="{{$v->id}}">{{$v->title}}</option>
                            
                            @endforeach
                        </select>
                        {{ csrf_field() }}
                    </div>
                </div>

                
            <div class="mws-button-row">

                <input value="添加" class="btn btn-danger" type="submit">
                <input value="重置" class="btn " type="reset">
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