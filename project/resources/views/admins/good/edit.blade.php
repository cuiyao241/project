@extends('layout.admin')

@section('title','商品添加')

@section('content')
            
            
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>商品修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/goods/update" method="post" enctype="multipart/form-data">
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
                        <input class="small" type="text" name="title" value="{{$good->title}}" placeholder="{{$good->title}}">

                    </div>
                </div>
                
                <input type="hidden" name="id" value="{{$good->id}}">

                <div class="mws-form-row">
                    <label class="mws-form-label" name="goods_name">颜色</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="color" value="{{$good->color}}"  placeholder="黑色,白色,蓝色">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" name="goods_name">尺寸</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="size" value="{{$good->size}}" placeholder="S,L,M,XL,XXL,XXXL">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label" name="goods_name">价格</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="price" value="{{$good->price}}" placeholder="{{$good->price}}">
                    </div>
                </div>                    

                <div class="mws-form-row">
                    <label class="mws-form-label">所属分类</label>
                    <div class="mws-form-item">
                        <select class="small" name="pid" >

                           <option value="{{$parent->id}}">{{$parent->title}}</option>

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
                    <input type="hidden" name="imgs" value="{{$good->pic}}">
                </div>
                
                <div class="mws-panel grid_4" style="margin-left:180px;">

                    <div class="mws-tabs ui-tabs ui-widget ui-widget-content ui-corner-all">

                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-1" aria-labelledby="ui-id-2" aria-selected="true"><a href="#tab-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Tab 1</a></li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-2" aria-labelledby="ui-id-3" aria-selected="false"><a href="#tab-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Tab 2</a></li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-3" aria-labelledby="ui-id-4" aria-selected="false"><a href="#tab-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">Tab 3</a></li>
                        </ul>
                        
                        <div id="tab-1" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
                            <p><img src="{{$good->pic}}" alt=""></p>
                        </div>                                          
                    </div>
                </div>
                
                <div class="clear"></div>

                <div class="mws-form-row">

                    <label class="mws-form-label">商品介绍:</label>
                    <div class="mws-form-item">
              
                        <script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.config.js"></script>
                        <script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.all.min.js"> </script>

                        <script type="text/javascript" charset="utf-8" src="/admins/ueditor/lang/zh-cn/zh-cn.js"></script>

                        <script type="text/javascript">

                            var ue = UE.getEditor('editor');
                        </script>

                        <script id="editor" type="text/plain" style="width:700px;height:300px;"name='content'>{!!$good->content!!}
                        </script>

                    </div>

                </div>


                <div class="clear"></div>
               <div class="mws-form-row">
                    <label class="mws-form-label">商品状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="status" value="1"  @if($good->status == 1) checked @endif > <label>上架</label></li>
                            <li><input type="radio" name="status" value="0"  @if($good->status == 0) checked @endif > <label>下架</label></li>
                           
                        </ul>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">是否置顶</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline"> 
                            <li><input type="radio" name="isHot" value="0" @if($good->status == 1) checked @endif > <label>普通</label></li>
                            <li><input type="radio" name="isHot" value="0"> <label>置顶</label></li>
                           
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