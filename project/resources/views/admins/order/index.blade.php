@extends('layout.admin')

@section('title','订单详情页')

@section('content')
    <style type="text/css">
    .noConsignment a{
        text-decoration:none;
        color: green;
    }
    .yesConsignment {
        color: red;
    }
    #but a{
        text-decoration:none;
        color: black;
        }
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
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            订单详情页
        </span>
    </div>
            @if (session('order_delete'))

                <div class="mws-form-message success">
                    {{ session('order_delete') }}
                </div>

            @elseif (session('order_delete_X'))

                <div class="mws-form-message error">
                    {{ session('order_delete_X') }}
                </div>

             @endif 
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <form action="/admin/order/index" method="get">
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
                    {{ csrf_field()}}
                    关键字:
                        <input aria-controls="DataTables_Table_1" type="text" name="search" value="{{$request->search}}"></label>
                        <input type="submit" value="搜索">
                    </form> 
                
            </div>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            订单号
                        </th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            姓名
                        </th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 149px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            商品名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="Browser: activate to sort column ascending">
                            下单时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Platform(s): activate to sort column ascending">
                            收货人
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-label="Engine version: activate to sort column ascending">
                            单价
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-label="CSS grade: activate to sort column ascending">
                            总金额
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 70px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 90px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 1) odd @else even @endif">
                        <td class="  sorting_1">
                            {{ $v->Order_id }}
                        </td>
                        <td class=" ">
                            {{ $v->UserName }}
                        </td>
                        <td class=" ">
                            {{ $v->GoodsName }}
                        </td>
                        <td class=" ">
                            {{ $v->OrderDate }}
                        </td>
                        <td class=" ">
                            {{ $v->ReceiverName }}
                        </td>
                        <td class=" ">
                            {{ $v->GoodsFee }}
                        </td>
                        <td class=" ">
                            {{ $v->TotalPrice }}
                        </td>
                        <td class=" ">
                            @if($v->IsPayment == '0') 
                                未付款 <br>
                            @else
                                已付款 <br>
                            @endif

                            @if($v->IsConsignment == '0') 
                                <span class="noConsignment"><a  href="/admin/order/consignment/{{ $v->Order_id }}" >[确认发货] </a></span> 
                            @else
                                <span class="yesConsignment">[已发货]</span> 
                            @endif

                        </td>
                        <td id="but">
                            @if($v->IsConfirm == '0') 
                                <button><a  href="/admin/order/close/{{ $v->Order_id }}">确认订单 </a></button>
                            @else
                                <button disabled = "disabled">订单完成 </button>
                            @endif
                            <button><a  href="allinfo/{{ $v->Order_id }}">查看详情</a></button>
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
    <script type="text/javascript">
         setTimeout(function(){
               $('.mws-form-message').slideUp(1000);
         },800)
    </script>
@endsection