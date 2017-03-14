@extends('layout.admin')

@section('title','用户的修改页面')

@section('content')

<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>修改用户</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form action="/admin/user/update" method='post' enctype='multipart/form-data' class="mws-form">

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
        					<input type="text" name='User_name' value="{{$res->User_name}}">
        				</div>
        			</div>   

        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱: </label>
        				<div class="mws-form-item">
        					<input type="text" name='Emails' value="{{$res->Emails}}">
        				</div>
        			</div>   

        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号: </label>
        				<div class="mws-form-item">
        					<input type="text" name='Phonecode' value="{{$res->Phonecode}}">
        				</div>
        			</div>   
    
                </div>
        		 

                    <div class="mws-form-row">
                        
                        <label class="mws-form-label">文件上传:</label>
                        <img src="{{$res->Profile}}" alt="" width='100' height="100">
                        <div class="mws-form-item">
                            <div style="position: relative;" class="fileinput-holder">
                            <input type="file" readonly="readonly" name='Profile' placeholder="">
                            <span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">Browse...</span>
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