@extends('layout.home')

@section('title','我的购物车')

@section('content')
<img src="/homes/images/banner.jpg" alt="Groovy Apparel">
<center>  
<br>
<div class="but_list" style="width:800px">
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active" ><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true" style="color:red"><b>我的购物车</b></a></li>
        
    </div>
</div>
</center>  

<br>

<div id="content">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="shopping">
        <form action="/home/order/order" method="post" name="myform">
            

            <?php 
                $q = 0; 
             ?>
            
        @if(Session::get('cart'))
            <tr>
                <td class="title_1">
                    <!-- <label><input id="allCheckBox" type="checkbox" class="remove" value="" 
                    />
                    <span  style="font-size:15px;color:red"><b>全选</b></span></label> -->
                </td>
                <td class="title_2" colspan="2">
                    <b>店铺宝贝</b>
                </td>
                <td class="title_3">
                    <b>获积分</b>
                </td>
                <td class="title_4">
                    <b>单价（元）</b>
                </td>
                <td class="title_5">
                    <b>数量</b>
                </td>
                <td class="title_6">
                    <b>小计（元）</b>
                </td>
                <td class="title_7">
                    <b>操作</b>
                </td>
            </tr>
            <tr>
                <td colspan="8" class="line">
                </td>
            </tr>

            @foreach ($data as $k => $v)
            <tr id="product1">
                <td class="cart_td_1">
                    
                    <input class="check" checked name="cartCheckBox[]" value="{{$v['id']}},{{$v['color']}},{{$v['size']}},1" type="checkbox"  gid="{{$v['id']}}" />
                </td>
                <td class="cart_td_2">
                    <img style="width:100px; height: 100px;" src="{{$v['sub_cart']->pic}}" alt="shopping" />
                </td>
                <td class="cart_td_3">
                    <a href="#">
                        {{$v['sub_cart']->title}}
                    </a>
                    <br />
                    
                    颜色：<span class="colors">{{$v['color']}}</span>
                    尺码：<span class="sizes">{{$v['size']}}</span>
                    <br />
                    保障：
                    <img style="width:15px" src="/homes/images/taobao_icon_01.jpg" alt="icon" />
                </td>
                <td class="cart_td_4">
                    5
                </td>
                <td class="cart_td_5" >
                    {{$v['sub_cart']->price}}
                </td>

                <td class="cart_td_6">
                    <br>
                    <span  class="glyphicon glyphicon-minus-sign" aria-hidden="true" alt="minus" class="hand" style="font-size:15px;cursor:pointer;"></span> 
                    
                    <input type="text" value="1" name="num[]"   style="width:60px;background-color:#DCDCDC;color:#cc0000; border-radius:10px; font-size:15px;text-align:center;"> 
                   
                    <span  class="glyphicon glyphicon-plus-sign" aria-hidden="true" 
                    class="hand" style="font-size:15px;cursor:pointer;"></span>
                </td>
                <td class="cart_td_7">
                {{$v['sub_cart']->price}}
                </td>
                <td class="cart_td_8">
                        <span style="cursor:pointer" class="glyphicon glyphicon-trash"  aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
            <!-- 传值到订单页 -->
                <!-- <input type="hidden" name="id[]" value="{{$v['sub_cart']->id}}"> -->
                
                <input type="hidden" name="title[]" value="{{$v['sub_cart']->title}}">
                <input type="hidden" name="pic[]" value="{{$v['sub_cart']->pic}}">
                <input type="hidden" name="color[]" value="{{$v['color']}}">
                <input type="hidden" name="size[]" value="{{$v['size']}}">
                <input type="hidden" name="price[]" value="{{$v['sub_cart']->price}}">
                <input type="hidden" value="2">
                    <?php 
                        $q += $v['sub_cart']->price;
                     ?>
                
            @endforeach
            <tr>

                <label><input id="asdsd" type="radio" class="removes" value="0" 
                    />
                    <span  style="font-size:15px;color:red"><b>全选</b></span></label>
                <td  colspan="3"></td>
                <td colspan="5" class="shopend">商品总价（不含运费）： <label id="total" class="yellow"> <?php echo $q; ?> </label> 元<br />可获积分 ：<label class="yellow" id="integral"></label> 10 点<br />
                <!-- <input name=" " type="image" src="/homes/images/taobao_subtn.jpg" /> -->
                
                {{ csrf_field()}}
           
                <input style="width:100px" class="lijidenglu"  type="submit" value="立即购买" />
                </td>
            </tr>
                
        @else
            <tr>
                <td colspan="8">
                    <div class="alert alert-info" role="alert">
                        <strong>购物车空空的!</strong> <a href="/home">快去购物吧!</a>
                    </div>

                </td>
            </tr>
        @endif

   

        </form>
    </table>





</div>
<!-- 相关商品 -->
<div class="w3lsnewsletter" id="w3lsnewsletter">
        <div class="container">
            <div class="w3lsnewsletter-grids">
                <div class="col-md-5 w3lsnewsletter-grid w3lsnewsletter-grid-1 subscribe">
                    <h2>Subscribe to our Newsletter</h2>
                </div>
                <div class="col-md-7 w3lsnewsletter-grid w3lsnewsletter-grid-2 email-form">
                    <form action="#" method="post">
                        <input class="email" name="Email" placeholder="Email Address" required="" type="email">
                        <input class="submit" value="SUBSCRIBE" type="submit">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
    
    // //加法
    $('.glyphicon-plus-sign').click(function(){
        // alert('asd');
        var pv = $(this).prev().val();
        // console.log(pv);
        pv++;
        $(this).prev().val(pv);

        // 获取单价 
        var pri = $(this).parents('tr').find('.cart_td_5').text();
        // 小计
        $(this).parents('tr').find('.cart_td_7').text(pri*pv);
        totals();

        // value 传值
        var oldVal = $(this).parents('tr').find('.check').val();
        // console.log(pv);
        var newVal = oldVal+','+pv;
               
        $(this).parents('tr').find('.check').val(newVal);

        
    })
    //减法
    $('.glyphicon-minus-sign').click(function(){
        // alert('123');
        var ne = $(this).next().val();
        // console.log(ne);
        if (ne <= 1 ) {
            ne = 2;
        };
        ne--;
        $(this).next().val(ne);

       //获取单价 
        var pri = $(this).parents('tr').find('.cart_td_5').text();
        //小计
        $(this).parents('tr').find('.cart_td_7').text(pri*ne);
        totals();

        // value 传值
        var oldVal = $(this).parents('tr').find('.check').val();
    
        var newVal = oldVal+','+ne;
               
        $(this).parents('tr').find('.check').val(newVal);
    })

    //总计
    $('.check').click(function(){
       $(this).checked = true;
        totals();
    })

    function totals()
    {
        var total = 0;

        $('input[type=checkbox]:checked').each(function(){
           
            total += parseInt($(this).parents('tr').find('.cart_td_7').text());
        
        })
       
        $('#total').text(total);
    }

    //全选
    $('.removes').click(function(){
        // alert('asd');

        $('.check').each(function(){
         
            this.checked = true;
        })

        totals();
        
    })
    //删除
    $('.glyphicon-trash').click(function(){
        

        //获取id
        var id = $(this).parents('tr').find('.check').attr('gid');
        //获取颜色
        var color = $(this).parents('tr').find('.colors').text();
        var size = $(this).parents('tr').find('.sizes').text();
        // alert(id+color+size);

        //获取tr
        var trs = $(this).parents('tr');

        $.get('/home/cart/del',{id:id,color:color,size:size},function(data){
            console.log(data);  
            if (data == '1') {
                trs.remove();
                totals();
   
                
            }else if(data == '2'){
                    trs.remove();
                totals();

                location.reload();
            };
        })
     
    })

    //选择
    $('.removes').click(function(){
        // alert('asd');

        $('.check').each(function(){
         
            this.checked = true;
        })

        totals();
        
    })
 

    </script> 
    

@endsection