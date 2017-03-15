 @extends('layout.admin')

@section('title','分类列表')

@section('content')

<style type="text/css">
    #dvs a{
    text-decoration:none;
    background-color: #444444;
    border-left: 1px solid rgba(255, 255, 255, 0.15);
    border-right: 1px solid rgba(0, 0, 0, 0.5);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
    color: #fff;
    cursor: pointer;
    display: block;
    float: left;
    font-size: 12px;
    height: 20px;
    line-height: 20px;
    outline: medium none;
    padding: 0 10px;
    text-align: center;
    text-decoration: none;
    border-left: 0;   
    
    }
.active{
    background-color: #c5d52b;
    background-image: none;
    border: medium none;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
    color: #323232;
    border-left: 1px solid rgba(255, 255, 255, 0.15);
    border-right: 1px solid rgba(0, 0, 0, 0.5);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
    color: #fff;
    cursor: pointer;
    display: block;
    float: left;
    font-size: 12px;
    height: 20px;
    line-height: 20px;
    outline: medium none;
    padding: 0 10px;
    text-align: center;
    text-decoration: none;

}
.disabled{
    text-decoration:none;
    background-color: #444444;
    border-left: 1px solid rgba(255, 255, 255, 0.15);
    border-right: 1px solid rgba(0, 0, 0, 0.5);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
    color: #fff;
    cursor: pointer;
    display: block;
    float: left;
    font-size: 12px;
    height: 20px;
    line-height: 20px;
    outline: medium none;
    padding: 0 10px;
    text-align: center;
    text-decoration: none;

}
#dvs ul{
    list-style: none;
    background-color: rgba(0, 0, 0, 0.15);
    border-radius: 5px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 2px rgba(0, 0, 0, 0.5) inset;
    color: #ffffff;
    float: right;
    margin: 10px 8px 10px 0;
    padding: 2px;   
}
#dvs li{
    
    float:left;
}


</style>


<div class="mws-panel grid_8" style="margin-top:20px">
    <div class="mws-panel-header">
        <span>
            <i class="icon-magic">
            </i>
            商品管理
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div class="wizard-nav wizard-nav-horizontal">
            <ul>
                <li data-wzd-id="wzd_1ba7mhs2942punr16go_0" class="current">
                    <span>
                        <i class="icon-table">
                        </i>
                        当前所在位置
                    </span>
                </li>
                <li data-wzd-id="wzd_1ba7mhs2942punr16go_1">
                    <span>
                        <i class="icon-calendar-month"></i>
                        商品管理
                    </span>
                </li>
                <li data-wzd-id="wzd_1ba7mhs2942punr16go_2">
                    <span>
                        <i class="icon-lightning-2"></i>
                        已下架商品
                    </span>
                </li>
            </ul>
        </div>



        @if (session('info'))
            <div class="mws-form-message success" style="line-height:50px">
              {{ session('info') }}
            </div>

        @endif


        <div class="mws-panel-toolbar">
            <div class="btn-toolbar">

            </div>
        </div>

       <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <form action="/admin/goods/alldown" method="get">
        <div id="DataTables_Table_1_length" class="dataTables_length">
            <label>
                显示
                <select size="1" name="num" aria-controls="DataTables_Table_1">
                        <option value="10" @if($request->num == '10') selected="selected" @endif>
                            10
                        </option>
                        <option value="25" @if($request->num == '25') selected="selected" @endif>
                            25
                        </option>
                        <option value="50" @if($request->num == '50') selected="selected" @endif>
                            50
                        </option>
                        <option value="100" @if($request->num == '100') selected="selected" @endif>
                            100
                        </option>
                    </select>
                页
            </label>
        </div>
        <div class="dataTables_filter" id="DataTables_Table_1_filter">
            <label>
                商品搜索: 
                <input aria-controls="DataTables_Table_1" type="text" name="search" value="{{$request->search}}">
                <select name="sele" >
                    <option value="1">商品名称</option>
                    <option value="2">店铺名称</option>
                    <option value="3">商品名称</option>
                </select>
                <button>搜索</button>
            </label>
        </div>
        </form>
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
        aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="checkbox-column">
                            <input type="checkbox">
                    </th>
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" style="width: 211px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                        商品名称
                    </th>
                
                    
                    
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" style="width: 99px;" aria-label="CSS grade: activate to sort column ascending">
                        状态
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" style="width: 259px;" aria-label="CSS grade: activate to sort column ascending">
                        操作
                    </th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($res as $k=>$v)
                <tr class="@if($k % 2 == 1) odd @else even @endif">
                    <td class="checkbox-column odd">
                        <input type="checkbox">
                    </td>
                    <td class="  sorting_1">

                         <span style='color:blue'>{{$v->title}}</span>
                        
                    </td>
                    
                   
                    <td class=" ">
                        [ <a href="/admin/goods/edit/{{$v->id}}" style="color:purple">下架</a> ]
                    </td>

                   
                    <td class=" ">
                        [<a href="/admin/goods/edit/{{$v->id}}" style="color:orange">编辑</a> | <a href="/admin/goods/delete?id={{$v->id}}&pid={{$v->pid}}" style='color:red'>删除</a>]
                    </td>
    
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">
                第 {{$res->currentPage()}}  页  共 {{$res->total()}} 条数据
            </div>
            <div id="dvs"  id="DataTables_Table_1_paginate">
                {{--<!-- {!! $res->render() !!} -->--}}
                    {!! $res->appends(['search' => $request->search,'num' => $request->num ])->render() !!}

            </div>


        </div>
    </div>
</div>
        
 

@endsection


@section('js')

alert($);

@endsection