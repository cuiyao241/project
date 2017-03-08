@extends('layout.admin')

@section('title','用户的列表页')

@section('content')
<div class="mws-panel grid_8">
     @if (session('info'))
                <div class="mws-form-message info">
                    {{ session('info')}}
                </div>
            @endif
    <div class="mws-panel-header"> 
        <span><i class="icon-table"></i>用户控制列表页</span>
    </div>

    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

            <form action="/admin/user/index" method='get'>
                 <!-- <form action="/admin/cate/index" method="get"> -->
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
                关键字: 
                <input aria-controls="DataTables_Table_1" type="text" name="search" value="{{$request->search}}">
                
                <button>搜索</button>
            </label>
        </div>
        </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 169px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 229px;" aria-label="Browser: activate to sort column ascending">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 213px;" aria-label="Platform(s): activate to sort column ascending">
                            邮箱
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 145px;" aria-label="Engine version: activate to sort column ascending">
                            手机号
                        </th>
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 106px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 106px;" aria-label="CSS grade: activate to sort column ascending">
                            头像
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                @foreach($res as $k => $v)
                    <tr class="@if($k % 2 == 1) odd @else even @endif">
                        <td class="  sorting_1">
                            {{$v->User_id}}
                        </td>
                        <td class=" ">
                            {{$v->User_name}}
                        </td>
                        <td class=" ">
                            {{$v->Emails}}
                        </td>
                        <td class=" ">
                            {{$v->Phonecode}}
                        </td>
                        <td class=" ">
                            {{$v->Status ? 1 : 0}}
                        </td>
                        <td class=" ">
                            <img src="{{$v->Profile}}" alt="" width='100' height='100'>
                        </td>
                        <td class=" ">
                            <a href="/admin/user/edit/{{$v->User_id}}" class='btn btn-m btn-info'>修改</a>
                            <a href="/admin/user/delete/{{$v->User_id}}" class='btn btn-m btn-danger'>删除</a> 
                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">   
                <style type="text/css">
                    
                    #page li{

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
                    #page .active{

                        background-color: #88a9eb;
                        background-image: none;
                        border:medium none;
                        box-shadow: 0 0 4px rgba(0,0,0,0.5) inset;
                        color:#323232;
                    }

                    #page a{
                        color:#fff;
                    }

                    #page .disabled{

                         color:#666666;

                         cursor: default;
                    }

                    #page ul{

                        margin:0px;
                    }
                </style>
                   
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                 <div id='page'>
                    {!! $res->render() !!}

                    </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')

    <script type="text/javascript">

    setTimeout(function(){

        $('.mws-form-message').slideUp(2000);
    },3000)

    </script>

@endsection