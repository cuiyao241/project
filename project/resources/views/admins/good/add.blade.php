@extends('layout.admin')

@section('title','商品添加')

@section('content')
            
            
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/goods/insert" method="post" enctype="multipart/form-data">
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
                    <label class="mws-form-label" name="goods_name">商品名</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="title">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label" name="goods_name">颜色</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="color" value="黑色,白色,蓝色"  placeholder="黑色,白色,蓝色">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" name="goods_name">尺寸</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="size" value="S,L,M,XL,XXL,XXXL" placeholder="S,L,M,XL,XXL,XXXL">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" name="goods_name">价格</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="price">
                    </div>
                </div>                    

                <div class="mws-form-row">
                    <label class="mws-form-label">所属分类</label>
                    <div class="mws-form-item">
                        <select class="small" name="pid" >

                           <option value="{{$son->id}}">{{$son->title}}</option>

                            @foreach($res as $k=>$v)

                                <option value="{{$v->id}}">{{$v->title}}</option>
                            
                            @endforeach
                        </select>
                        {{ csrf_field() }}
                    </div>
                </div>

                <div class="mws-form-row">
                        <label class="mws-form-label">商品视图:</label>
                        <div class="mws-form-item">
                            <div style="position: relative;width:55%" class="fileinput-holder"><input type="file" readonly="readonly" class="small" multiple name='pic[]' placeholder="图片尺寸：220*320">
                                <span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">上传 图片</span></div>
                        </div>
                    </div>




               <div class="mws-form-row">
                    <label class="mws-form-label">商品状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="status" value="1" checked> <label>上架</label></li>
                            <li><input type="radio" name="status" value="0"> <label>下架</label></li>
                           
                        </ul>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">是否置顶</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="isHot" value="0" checked> <label>普通</label></li>
                            <li><input type="radio" name="isHot" value="1"> <label>置顶</label></li>
                           
                        </ul>
                    </div>
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