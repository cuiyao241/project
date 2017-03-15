@extends('layout.admin')

@section('title','添加友链')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>添加友情</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/friends/insert" method="post">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站名称：</label>
    				<div class="mws-form-item">
    					<input  type="text" name="link_Name" size="20" required>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">网站地址：</label>
    				<div class="mws-form-item">
    					<input type="text" name="link_Website" size="40" required>
    				</div>
    			</div>
    		</div>
		{{csrf_field()}}
    		<div class="mws-button-row">
    			<input value="提交" class="btn btn-danger" type="submit">
    			<input value="重置" class="btn " type="reset">
    		</div>
    	</form>
    </div>    	
</div>

@endsection

@section('js')
 
@endsection