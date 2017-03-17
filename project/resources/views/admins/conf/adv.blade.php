@extends('layout.admin')

@section('title','网站配置')

@section('content')
<style type="text/css">
    textarea.input {
    height: auto;
    }
    .input {
    border: 1px solid #ddd;
    border-radius: 3px;
    display: block;
    font-size: 14px;
    line-height: 20px;
    padding: 10px;
    width: 100%;
    }
    .border-yellow{
        color:#f60;
        font-size:17px;
    }

    .padding {
    padding: 10px;
    }
    .border-bottom {
        border-bottom: 1px solid #ddd;
    }



</style>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>首页轮播</span>
    </div>
    <div class="mws-panel-body no-padding">

    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="document.getElementById('adds').scrollIntoView(false);"><span class="icon-plus-square-o"></span>添加内容</button>

    
    </div>
    


    	<form action="/admin/adv/update" method="post" enctype="multipart/form-data" class="mws-form">
    		
			@if (count($errors) > 0)
			    <div class="mws-form-message error">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li style='font-size:17px;list-style:none;'>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			@if (session('cg'))

                <div class="mws-form-message success">
                    {{ session('cg') }}
                </div>

            @elseif (session('sb'))

                <div class="mws-form-message error">
                    {{ session('sb') }}
                </div>

             @endif

            <style type="text/css">
            .fu{
                float:left;
                margin-right:15px;
                margin-bottom:15px;
            }

            .mws-form .mws-form-inline .mws-form-label {
                float: left;
                padding-top: 25px;
                width: 140px;
            }

            </style>
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">图片播放</label>
                    <div class="mws-form-item">
                      
                        <div>
                        @foreach($res as $k=>$v)
                            <div class="fu" style="width:400px" >
                                <img src="{{$v->pic}}" width="400" class="lunbo"  alt="" style="margin-bottom:20px">
                                <input type="hidden" name="id" value="{{$v->id}}">
                                排序：<input type="text" name="tid[]" value="{{$v->tid}}" placeholder="{{$v->tid}}">
                            </div>

                        @endforeach
                        
                        </div>

                    </div>
                </div>
                <div class="border-bottom"></div>
        

                <div class="mws-form-row">

                    <label class="mws-form-label">网站轮播图:</label>
                   
                    <div class="mws-form-item" style="margin-top:20px">
                        <!-- <div style="position: relative;width:55%" class="fileinput-holder"> -->
                        
                            <input type="file" readonly="readonly" class="large" multiple name='lunbo[]' placeholder="图片尺寸：220*320">
                            <a id="adds">
                            <span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">添加图片</span></a>
                            <!-- </div> -->
                    </div>

                </div>
                        
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" value="修改">
                {{ csrf_field() }}
                
            </div>

    	</form>
    </div>    	
</div>

@endsection

@section('js')
    <script type="text/javascript">
         setTimeout(function(){
               $('.mws-form-message').slideUp(1000);
         },800)
    </script>

    <script type="text/javascript">

        $('.lunbo').dblclick(function(){

            // $(this).parent('div').css('display', 'none');

            var id = $(this).next().val();

            var tx = $(this);

            $.get('adv/del', {id: id}, function(data){

                if(data){

                    tx.parent('div').css('display', 'none');
                }

            })

        })

    </script>
@endsection