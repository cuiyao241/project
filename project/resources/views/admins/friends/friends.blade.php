@extends('layout.admin')

@section('title','友情链接')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-table"></i> 友情链接</span>
	</div>
	<div class="mws-panel-body no-padding">

	               
	    <table class="mws-table">
	        <thead>
	            <tr>
	                <th style="width:200px">网站名称</th>
	                <th>网站地址</th>
	                <th>操作</th>
	            </tr>
	        </thead>
	       <tbody>
	    		@foreach($res as $k => $v) 
	            <tr>
	                <td>{{ $v->link_Name }}</td>
	                <td>
	                	<a href="{{ $v->link_Website }}" target="view_window"><span style="color:green">{{ $v->link_Website }}</span></a></td>
	                <td>
	                	<a href="/admin/friends/edit/{{ $v->link_Id }}"><span style="color:blue">[修改]</span></a>
	                	<a href="/admin/friends/delete/{{ $v->link_Id }}"><span style="color:red">[删除]</span></a>
	                </td>
	            </tr>
				@endforeach
	        </tbody>
	    </table>
	</div>
</div>

@endsection

@section('js')
 
@endsection