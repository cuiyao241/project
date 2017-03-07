@extends('layout.admin')

@section('title','用户的列表页')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            用户控制列表页
        </span>
    </div>

    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <form action="admin/user/index" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                    显示
                        <select name="num" size="1" aria-controls="DataTables_Table_1">
                            <option value="10" selected="selected">
                                10
                            </option>
                            <option value="25">
                                25
                            </option>
                            <option value="50">
                                50
                            </option>
                            <option value="100">
                                100
                            </option>
                        </select>
                        条数据
                    </label>
                </div>
            </form>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    关键字:
                    <input type="text" name='search' aria-controls="DataTables_Table_1">
                </label>
                <button class='btn btn-md btn-info'>搜索</button>
            </div>
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
                        rowspan="1" colspan="1" style="width: 106px;" aria-label="CSS grade: activate to sort column ascending">
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
                            <img src="{{$v->Profile}}" alt="" width="100%" height="100%">
                        </td>
                        <td class=" ">
                            <a href="/admin/user/edit">修改</a>
                            <a href="/admin/user/delete">删除</a> 
                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <a class="first paginate_button paginate_button_disabled" tabindex="0"
                id="DataTables_Table_1_first">
                    First
                </a>
                <a class="previous paginate_button paginate_button_disabled" tabindex="0"
                id="DataTables_Table_1_previous">
                    Previous
                </a>
                <span>
                    <a class="paginate_active" tabindex="0">
                        1
                    </a>
                    <a class="paginate_button" tabindex="0">
                        2
                    </a>
                    <a class="paginate_button" tabindex="0">
                        3
                    </a>
                    <a class="paginate_button" tabindex="0">
                        4
                    </a>
                    <a class="paginate_button" tabindex="0">
                        5
                    </a>
                </span>
                <a class="next paginate_button" tabindex="0" id="DataTables_Table_1_next">
                    Next
                </a>
                <a class="last paginate_button" tabindex="0" id="DataTables_Table_1_last">
                    Last
                </a>
            </div>
        </div>
    </div>
</div>
@endsection