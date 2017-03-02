@extends('layout.admin')

@section('title','用户添加')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>用户的添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form action="/admin/user/insert" method='post' enctype='multipart/form-data' class="mws-form">
			
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
        				<label class="mws-form-label">用户名:</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='username'>
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">密码:</label>
        				<div class="mws-form-item">
        					<input type="password" class="small" name='password'>
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">确认密码:</label>
        				<div class="mws-form-item">
        					<input type="password" class="small" name='repassword'>
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱:</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='email'>
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号:</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='phone'>
        				</div>
        			</div>

        			<div class="mws-form-row">
                    	<label class="mws-form-label">文件上传:</label>
                    	<div class="mws-form-item">
                        	<div style="position: relative;" class="fileinput-holder"><input type="file" readonly="readonly" class="small"  name='profile' placeholder="No file selected..."><span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">Browse...</span></div>
                        </div>
                    </div>

        					
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" class="btn btn-success btn-lg" value="添加">
        			{{ csrf_field() }}
        			<input type="reset" class="btn btn-warning" value="重置">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection