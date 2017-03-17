@extends('layout.admin')

@section('title','用户的添加页面')

@section('content')

<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>添加用户</span>
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
        				<label class="mws-form-label">会员名: </label>
        				<div class="mws-form-item">
        					<input type="text" name='User_name' placeholder="请输入5~12位用户名">
        				</div>
        			</div>   

                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">密码: </label>
                        <div class="mws-form-item">
                            <input type="password" name='Password' placeholder="请输入5~10位密码">
                        </div>
                    </div> 
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">确认密码:</label>
                        <div class="mws-form-item">
                            <input type="password" name='rePassword' placeholder="请输入确认密码">
                        </div>
                    </div>


        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱: </label>
        				<div class="mws-form-item">
        					<input type="text" name='Emails' placeholder="请输入邮箱">
        				</div>
        			</div>   

        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号: </label>
        				<div class="mws-form-item">
        					<input type="text" name='Phonecode' placeholder="请输入验证码">
        				</div>
        			</div>   
    
                    
        			<div class="mws-form-row">
                                    <label class="mws-form-label">登陆权限: </label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name='isAdmin' value=1> <label>是</label></li>
                                            <li><input type="radio" name='isAdmin' value=0> <label>否</label></li>                          
                                        </ul>
                                    </div>
                                </div>
        		</div>  

                    <div class="mws-form-row">
                        <label class="mws-form-label">文件上传:</label>
                        <div class="mws-form-item">
                            <div style="position: relative;" class="fileinput-holder">
                            <input type="file" readonly="readonly" name='profile' placeholder="">
                            <span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">Browse...</span>
                            </div>
                        </div>
                    </div>

        		<div class="mws-button-row">
        			<input type="submit" class="btn btn-success" value="添加">
                    {{ csrf_field()}}
        			<input type="reset" class="btn btn-danger" value="重置">
        		</div>
            </form>
        </div>    	
    </div>
@endsection