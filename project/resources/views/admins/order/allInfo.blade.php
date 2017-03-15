@extends('layout.admin')

@section('title','后台商品详细信息')

@section('content')
	<style type="text/css">
	.sorting_1{
	width:100px;
	font-weight:bold;
	}
	#but a{
		text-decoration:none;
	    color: black;
		}
	a{
		text-decoration:none;
	    color: black;
	}
	</style>

	<div class="mws-panel grid_8" style="margin-top:20px">
	    <div class="mws-panel-header">
	        <span>
	            <i class="icon-table">
	            </i>
	            订单详细信息
	        </span>
	    </div>
	    <!-- 路径提示 -->
			 @if (session('order_edit'))

       			<div class="mws-form-message success">
            		{{ session('order_edit') }}
       			</div>

    		@elseif (session('order_edit_X'))

       			<div class="mws-form-message error">
            		{{ session('order_edit_X') }}
       			</div>

    		@endif 
	    	<div class="wizard-nav wizard-nav-horizontal" >
			    <ul>
			        <li data-wzd-id="wzd_1ba7mes6n1obkvhs1gha_0" class="current">
			            <a href="/admin/order/index"><span>
			                <i class="icon-shopping-cart">
			                </i>
			                订单中心
			            </span></a>
			        </li>
			        <li data-wzd-id="wzd_1ba7mes6n1obkvhs1gha_1" class="">
			            <span>
			                <i class="icon-bag">
			                </i>
			                详细信息
			            </span>
			        </li>
			   
			    </ul>
			    <button type="button" class="btn responsive-prev-btn" disabled="disabled">
			        <i class="icon-caret-left">
			        </i>
			    </button>
			    <button type="button" class="btn responsive-next-btn">
			        <i class="icon-caret-right">
			        </i>
			    </button>
			</div>
			<!-- 详细信息 -->
	    <div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
	            
	           
	            <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0"
	            aria-describedby="DataTables_Table_0_info">
	               @foreach($res as $k => $v)
	               @endforeach
	                <tbody role="alert" aria-live="polite" aria-relevant="all">
	                    <tr class="odd">
	                        <td class="  sorting_1" >
	                            订单号:
	                        </td>
	                        <td class=" " style="width:297px">
	                        	{{ $v->Order_id }}
	                        </td>
	                        
	                        <td class="  sorting_1">
	                            消费用户:
	                        </td>
	                        <td class=" ">
	                       		{{ $v->UserName}}
	                        </td>
	                    </tr>

	                    <tr class="even">
	                        <td class="  sorting_1">
	                            商品:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->GoodsName}}
	                        </td>
	                        
	                         <td class="  sorting_1">
	                            收件人:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->ReceiverName}}
	                        </td>
	                    </tr>
	                    <tr class="odd">
	                        <td class="  sorting_1" >
	                            单价:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->GoodsFee}} 元
	                        </td>
	                        
	                        <td class="  sorting_1">
	                            收货人电话:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->ReceiverPhone}}
	                        </td>
	                    </tr>
	                    <tr class="even">
	                        <td class="  sorting_1">
	                           尺寸:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->GoodsSize}}
	                        </td>

	                        <td class="  sorting_1">
	                           收货人地址:
	                        </td>
	                        <td class=" " >
	                       		{{ $v->ReceiverAddress}}
	                        </td>
	                       
	                    </tr>
	                    
	                    <tr class="odd">
	                        <td class="  sorting_1">
	                            颜色:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->GoodsColor}}
	                        </td>
								
	                        <td class="  sorting_1">
	                            下单时间:
	                        </td>
	                        <td class=" " >
	                       		{{ $v->OrderDate}}
	                        </td>
	                        
	                    </tr>
	                    <tr class="even">
	                        <td class="  sorting_1">
	                            数量:
	                        </td>
	                        <td class=" ">
	                        	{{ $v->GoodsNum}} 件
	                        </td>

	                        <td class="  sorting_1">
	                            商品链接:
	                        </td>
	                        <td class=" ">
	                        	<a href="{{ $v->GoodsUrl}}" target="view_window">{{ $v->GoodsUrl}}</a> <span style="color:#999;font-size:15px;">*请点击查看</span>
	                        </td>
	                        
	                    </tr>
	                    <tr class="odd">
	                        <td class="  sorting_1">
	                            总价
	                        </td>
	                        <td class=" ">
	                        	{{ $v->GoodsFee}} * {{ $v->GoodsNum}} = {{ $v->TotalPrice}} 元
	                        </td>

	                        <td class="  sorting_1">
	                            
	                        </td>
	                        <td class=" ">
	                        	
	                        </td>
	                        
	                    </tr>
	                    <tr class="even">
	                        <td class="  sorting_1">
	                           	留言:
	                        </td>
	                        <td class=" " colspan="3">
	                        	{{ $v->Leave}}
	                        </td>

	                        
	                        
	                    </tr>

	                    <tr class="odd">
	                    	<td class="  sorting_1">
	                            操作:
	                        </td>
	                     
	                        <td class=" " colspan="3">
	                          	<button id="but"><a href="/admin/order/edit/{{ $v->Order_id }}" >修改订单</a></button>
	                        	
	                          	<button id="but"><a href="/admin/order/delete/{{ $v->Order_id }}" >删除订单</a></button>
	                        </td>
	                    </tr>
	                </tbody>

	            </table>
	            <div class="dataTables_info" id="DataTables_Table_0_info">
	                版权所有 ©2017&nbsp;GaoDa&nbsp;
	                
	            </div>
	           
	        </div>
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