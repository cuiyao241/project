@extends('layout.admin')

@section('title','修改密码')

@section('content')


<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>修改密码</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form action="/admin/user/pwdupdate" method='post' enctype='multipart/form-data' class="mws-form">
            


                           
        		<div class="mws-form-inline">
        		@if (session('into'))

                    <div class="mws-form-message error">
                        {{ session('into') }}
                    </div>

                @endif
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户名: </label>
                        <div class="mws-form-item">
                            <input type="text" name='name' value="{{$res->User_name}}" disabled>
                            <input type="hidden" name="User_name" value="{{$res->User_name}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">旧密码: </label>
                        <div class="mws-form-item">
                            <input type="password" name='Password' placeholder="输入原密码">
                        </div>
                    </div> 

					<div class="mws-form-row">
                        <label class="mws-form-label">新密码: </label>
                        <div class="mws-form-item">
                            <input type="password" name='newPassword' placeholder="输入新密码">
                        </div>
                    </div>
        			
        			<div class="mws-form-row">
                        <label class="mws-form-label">确认密码: </label>
                        <div class="mws-form-item">
                            <input type="password" name='rePassword' placeholder="确认密码">
                        </div>
                    </div>
        			  
    
                </div>
        		 

                    
        		<div class="mws-button-row">
                    <input type="hidden" name="id" value="{{$res->User_id}}">
        			<input type="submit" class="btn btn-success" value="修改">
                    {{ csrf_field()}}
        			<input type="reset" class="btn btn-danger" value="重置">
        		</div>

                </div> 
            </form>
        </div>    	
    </div>
@endsection