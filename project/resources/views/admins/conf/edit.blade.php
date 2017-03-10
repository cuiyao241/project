@extends('layout.admin')

@section('title','网站配置')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>网站配置</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/conf/update" method="post" enctype="multipart/form-data" class="mws-form">
    		
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


    		<div class="mws-form-inline">
    			<div class="mws-form-row"> 
    				<label class="mws-form-label">网站标题</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='title'>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站关键字</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name='keywords'>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站描述</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name='description'>
    				</div>
    			</div>
				<div class="mws-form-row">
                	<label class="mws-form-label">网站LOGO</label>
                	<div class="mws-form-item">
                    	<div style="position: relative;" class="fileinput-holder">
                    		<input type="text" readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected...">
                    		<span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">
                    			<input type="file" name="logo" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                    		</span>
                    	</div>
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站版权</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name="copyright">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站开关</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name='open' value='0' checked="checked"> <label>开</label></li>
    						<li><input type="radio" name='open' value='1'> <label>关</label></li>
    						<!--  单选框的获取和设置获取默认选中的值 -->
					        <script type="text/javascript">
					            var sexs = $('input[name=open]');
					            //遍历数组对象
					            sexs.each(function(){
					                var che = $(this).attr('checked');
					            })
					            
					            //设置  value='开'  checked默认选中的状态
					            $('input[name=sex][value=0]').attr('checked',true);
					        </script>
    					</ul>
    				</div>
    			</div>				  			
    		<div class="mws-button-row">
    			<input type="submit" class="btn btn-danger" value="修改">
    			{{ csrf_field() }}
    			<input type="reset" class="btn " value="重置">
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
@endsection