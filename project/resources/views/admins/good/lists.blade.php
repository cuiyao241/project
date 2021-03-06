 @extends('layout.admin')

@section('title','商品列表')

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


<div class="mws-panel grid_8">
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
                        <i class="icol-delivery">
                        </i>
                        商品管理
                    </span>
                </li>
                <li data-wzd-id="wzd_1ba7mhs2942punr16go_2">
                    <span>
                        <i class="icon-coffee-2">
                        </i>
                        商品列表
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
                <div class="btn-group">
                   <a href="/admin/goods/add/{{$parent->id}}" class="btn">
                         <i class="icol-add">
                        </i>
                        </i>
                        添加商品
                    </a>
                    <a href="/admin/goods/add" class="btn">
                        <i class="icol-accept">
                        </i>
                        </i>
                        商品上架
                    </a>
                    <a href="/admin/goods/status" class="btn">
                        </i>
                        <i class="icol-anchor">
                        </i>
                        商品下架
                    </a>
                    <a href="/admin/goods/add" class="btn">
                        </i>
                        <i class="icol-cross">
                        </i>
                        删除商品
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#">
                                <i class="icol-disconnect">
                                </i>
                               dsfas
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#">
                                More Options
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        Contact Administrator
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Destroy Table
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

       <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <form action="/admin/goods/index" method="get">
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
                <input aria-controls="DataTables_Table_1" type="text" name="sea" value="{{$request->search}}">
                <input type="hidden" name="id" value="{{$parent->id}}">
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
                    rowspan="1" colspan="1" style="width: 140px;" aria-label="Browser: activate to sort column ascending">
                        所属类型
                    </th>
                    
                    
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" style="width: 59px;" aria-label="CSS grade: activate to sort column ascending">
                        价格
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" style="width: 99px;" aria-label="CSS grade: activate to sort column ascending">
                       图片 
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" style="width: 189px;" aria-label="CSS grade: activate to sort column ascending">
                        商品标签
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
                        <input type="checkbox" name="check[]">
                    </td>
                    <td class="  sorting_1">
     
                         {{$v->title}}

                    </td>
                    <td class=" ">
                        {{$parent->title}}
                        
                    </td>
                    
                    
                    <td class=" ">
                        {{$v->price}}
                    </td>
                    <td class=" ">
                        
                        <img src="{{$v->pic}}" class="imges" alt="" />

                    </td>
                    <td class=" ">
                        @if($v->isNew)

                            [新品]

                        @endif

                        
                        @if($v->isHot)
                            [热销]
                        @endif

                        @if($v->isZhe)
                            [特价]
                        @endif



                    </td>
                    <td class=" ">
                        @if($v->status)

                            [<a href="/admin/goods/status?id={{$v->id}}&status={{$v->status}}&pid={{$parent->id}}" style="color:orange"> 上架 </a>]

                        @else

                            [<a href="/admin/goods/status?id={{$v->id}}&status={{$v->status}}&pid={{$parent->id}}" style="color:orange"> 下架 </a>]

                        @endif
                    </td>
                    <td class=" ">
                        [<a href="/admin/goods/edit/{{$v->id}}"  style="color:orange">编辑</a> |
                        <a href="/admin/goods/delete?id={{$v->id}}&pid={{$parent->id}}"  style='color:red'>删除</a> ]
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
                    {!! $res->appends(['search' => $request->search,'num' => $request->num, 'id'=>$parent->id ])->render() !!}

            </div>


        </div>
    </div>
</div>
        
 

@endsection

@section('js')

  <script type="text/javascript">
     setTimeout(function(){
           $('.mws-form-message').slideUp(1000);
     },3000)


    // $('.butt').click(function(){

    //     $(this).parent().html('<img src="{{$v->pic}}" class="imges" alt="" />')

    //  })

    // $('.imges').click(function(){

    //     $(this).parent().html('<button class="butt" >点击查看</button>')
    //  })
  </script>


@endsection
