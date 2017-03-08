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
        					<input type="text" name='User_name'>
        				</div>
        			</div>   

        			<div class="mws-form-row">
                        <label class="mws-form-label">会员性别: </label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" name='Sex'> <label>男</label></li>
                                <li><input type="radio" name='Sex'> <label>女</label></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">会员密码: </label>
                        <div class="mws-form-item">
                            <input type="password" name='password'>
                        </div>
                    </div> 
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">确认密码:</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name='repassword'>
                        </div>
                    </div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">会员真实名字: </label>
        				<div class="mws-form-item">

        					<input type="text" name='TrueName'>
        				</div>
        			</div> 

        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱: </label>
        				<div class="mws-form-item">
        					<input type="text" name='Emails'>
        				</div>
        			</div>   

        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号: </label>
        				<div class="mws-form-item">
        					<input type="text" name='Phonecode'>
        				</div>
        			</div>   

					<div class="mws-form-row">
                        <label class="mws-form-label">所在城市</label>
                        <div class="mws-form-item">
                            <select>
                                <option>北京</option>
                                <option>上海</option>
                                <option>广州</option>
                                <option>疙瘩村</option>
                            </select>
                        </div>
                    </div>		
        			
        		</div>

				<div class="mws-form-row">
        				<label class="mws-form-label">邮编号码: </label>
        				<div class="mws-form-item">

        					<input type="text" name='PostCode'>
        				</div>
        			</div> 

				<div class="mws-form-row">
        				<label class="mws-form-label">账户余额: </label>
        				<div class="mws-form-item">

        					<input type="text" name='AdvancePayment'>
        				</div>
        			</div> 

        			<div class="mws-form-row">
        				<label class="mws-form-label">上次登录时间: </label>
        				<div class="mws-form-item">

        					<input type="text" name='LoadDate'>
        				</div>
        			</div> 

                    <div class="mws-form-row">
                        <label class="mws-form-label">文件上传:</label>
                        <div class="mws-form-item">
                            <div style="position: relative;" class="fileinput-holder"><input type="file" readonly="readonly" class="small"  name='profile' placeholder="No file selected..."><span style="display:block; overflow: hidden; position: absolute; top: 0; right: 0; cursor: pointer;" type="button" class="fileinput-btn btn">Browse...</span></div>
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

