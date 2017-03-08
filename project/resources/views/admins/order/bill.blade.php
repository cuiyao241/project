@extends('layout.admin')

@section('title','消费记录查询')

			
@section('content')
	<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            Data Table with Numbered Pagination
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                   显示
                    <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
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
                    页
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter" style="height: 50px;">
               	<form action="">
	                <label>
	                    关键字:
	                    <input aria-controls="DataTables_Table_1" type="text">
	                </label>
	                <select class="large">
                        <option>已支付</option>
                        <option></option>
                        <option>Option 4</option>
                        <option>Option 5</option>
                    </select>
	                <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
				</form>
            </div>
       
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 149px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            Rendering engine
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 194px;" aria-label="Browser: activate to sort column ascending">
                            Browser
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 182px;" aria-label="Platform(s): activate to sort column ascending">
                            Platform(s)
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 125px;" aria-label="Engine version: activate to sort column ascending">
                            Engine version
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 90px;" aria-label="CSS grade: activate to sort column ascending">
                            CSS grade
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <tr class="odd">
                        <td class="  sorting_1">
                            Gecko
                        </td>
                        <td class=" ">
                            Firefox 1.0
                        </td>
                        <td class=" ">
                            Win 98+ / OSX.2+
                        </td>
                        <td class=" ">
                            1.7
                        </td>
                        <td class=" ">
                            A
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                <a tabindex="0" class="first paginate_button paginate_button_disabled"
                id="DataTables_Table_1_first">
                    First
                </a>
                <a tabindex="0" class="previous paginate_button paginate_button_disabled"
                id="DataTables_Table_1_previous">
                    Previous
                </a>
                <span>
                    <a tabindex="0" class="paginate_active">
                        1
                    </a>
                    <a tabindex="0" class="paginate_button">
                        2
                    </a>
                    <a tabindex="0" class="paginate_button">
                        3
                    </a>
                    <a tabindex="0" class="paginate_button">
                        4
                    </a>
                    <a tabindex="0" class="paginate_button">
                        5
                    </a>
                </span>
                <a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">
                    Next
                </a>
                <a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">
                    Last
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
   
@endsection