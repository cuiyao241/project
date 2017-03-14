@extends('layout.home')

@section('title','订单结算页')

@section('content')
<style>
    #page{width:auto;}
    #comm-header-inner,#content{width:950px;margin:auto;}
    #logo{padding-top:26px;padding-bottom:12px;}
    #header .wrap-box{margin-top:-67px;}
    #logo .logo{position:relative;overflow:hidden;display:inline-block;width:140px;height:35px;font-size:35px;line-height:35px;color:#f40;}
    #logo .logo .i{position:absolute;width:140px;height:35px;top:0;left:0;}
</style>
<img src="/homes/images/banner.jpg" alt="Groovy Apparel">
<div id="page">
    <div id="content" class="grid-c">
        <div id="address" class="address" style="margin-top: 20px;" data-spm="2">
            <form name="addrForm" id="addrForm" action="#">
                    <h1><b>确认收货地址</b></h1>
                <h3>
                    <span class="manage-address">
                        <a href="http://member1.taobao.com/member/fresh/deliver_address.htm" target="_blank"
                        title="管理我的收货地址" class="J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.7">
                            管理收货地址
                        </a>
                    </span>
                </h3>
                <ul id="address-list" class="address-list">

            @foreach ($address as $k => $v)

                    <li class="J_Addr J_MakePoint clearfix  J_DefaultAddr " data-point-url="http://log.mmstat.com/buy.1.20">
                        <s class="J_Marker marker">
                        </s>
                        <span class="marker-tip">
                            寄送至
                        </span>
                        <div class="address-info">
                            <a href="#" class="J_Modify modify J_MakePoint" >
                                修改本地址
                            </a>
                            <input name="address" class="J_MakePoint " type="radio" value="674944241"
                            id="addrId_674944241" checked="checked">
                            <label for="addrId_674944241" class="user-address">
                                {{$v->Address}} ({{$v->OrderName}} 收)
                                <em>
                                   &nbsp;&nbsp;&nbsp;电话: {{$v->Phone}}
                                </em>
                            </label>
                            <em class="tip" style="display: none">
                                默认地址
                            </em>
                            <a class="J_DefaultHandle set-default J_MakePoint" href="/auction/update_address_selected_status.htm?addrid=674944241"
                            style="display: none" data-point-url="http://log.mmstat.com/buy.1.18">
                                设置为默认收货地址
                            </a>
                        </div>
                    </li>

                 @endforeach   
                </ul>
                <ul id="J_MoreAddress" class="address-list hidden">
                </ul>
                <div class="address-bar">
                    <a href="#" class="new J_MakePoint" id="J_NewAddressBtn">
                        使用新地址
                    </a>
                </div>
            </form>
        </div>
        <form id="J_Form" name="J_Form" action="/home/order/orderinsert"
        method="post">
            <div>
                <h2 class="dib">
                    <b>确认订单信息</b>
                </h2>
                <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable"
                summary="统一下单订单信息区域">
                    <caption style="display: none">
                        统一下单订单信息区域
                    </caption>
                    <thead>
                        <tr style="color:red;">
                            <th class="s-title">
                                店铺宝贝
                                <hr/>
                            </th>
                            <th class="s-price">
                                单价(元)
                                <hr/>
                            </th>
                            <th class="s-amount">
                                数量
                                <hr/>
                            </th>
                            <th class="s-agio">
                                优惠方式(元)
                                <hr/>
                            </th>
                            <th class="s-total">
                                小计(元)
                                <hr/>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-spm="3" class="J_Shop" data-tbcbid="0" data-outorderid="47285539868"
                    data-isb2c="false" data-postMode="2" data-sellerid="1704508670">
                        <tr class="first">
                            <td colspan="5">
                            </td>
                        </tr>
                        <tr class="shop blue-line">
                            
                            <td colspan="2" class="promo">
                                <div>
                                    <ul class="scrolling-promo-hint J_ScrollingPromoHint">
                                    </ul>
                                </div>
                            </td>
                        </tr>
            @foreach ($data as $k => $v)
        
                        <tr class="item" data-lineid="19614514619:31175333266:35612993875" data-pointRate="0" style="border-bottom:#999 solid 1px;border-top:#999 solid 1px;">
                            <td class="s-title">
                                <a href="#"
                                class="J_MakePoint"  >
                                    <img style="width:50px" src="{{$v->pic}}"
                                    class="itempic">
                                    <span class="title J_MakePoint" >
                                        {{$v->title}}
                                    </span>
                                </a>
                                <div class="props">
                                    <span>
                                        颜色: {{$v->newcolor}}
                                    </span>
                                    　　　
                                    <span>
                                        尺寸: {{$v->newsize}}
                                    </span>
                                </div>
                                <a title="消费者保障服务，卖家承诺商品如实描述" href="#" target="_blank">
                                    <img style="width:15px" src="/homes/images/taobao_icon_01.jpg"
                                    />
                                </a>
                                <div>
                                    <span style="color:gray;">
                                        卖家承诺72小时内发货
                                    </span>
                                </div>
                            </td>
                            <td class="s-price">
                                <span class='price '>
                                    <em class="style-normal-small-black J_ItemPrice">
                                        {{$v->price}}
                                    </em>
                                </span>
                                <input type="hidden" name="costprice" value="630.00" class="J_CostPrice"
                                />
                            </td>
                            <td class="s-amount" data-point-url="">
                                <input type="hidden" class="J_Quantity" value="1" name="19614514619_31175333266_35612993875_quantity"
                                />
                                {{$v->newnum}}
                            </td>
                            <td class="s-agio">
                                <div class="J_Promotion promotion" data-point-url="">
                                    无优惠
                                </div>
                            </td>
                            <td class="s-total">
                                <span class='price '>
                                    <em class="style-normal-bold-red J_ItemTotal ">
                                    {{$v->price*$v->newnum}}
                                    </em>
                                </span>
                                
                            </td>
                        </tr>
                        <input type="hidden" name="tit[]" value="{{$v->title}}" >
                        <input type="hidden" name="pic[]" value="{{$v->pic}}" >
                        <input type="hidden" name="newc[]" value="{{$v->newcolor}}" >
                        <input type="hidden" name="newsize[]" value="{{$v->newsize}}" >
                        <input type="hidden" name="newnum[]" value="{{$v->newnum}}" >
                        <input type="hidden" name="prices[]" value="{{$v->price}}" >
                        <input type="hidden" name="url[]" value="asdasd.asdasd" >
                       




            @endforeach

                        <tr class="item-service">
                            <td colspan="5" class="servicearea" style="display: none">
                            </td>
                        </tr>
                        <tr class="blue-line" style="height: 2px;">
                            <td colspan="5">
                            </td>
                        </tr>
                        <tr class="other other-line">
                            <td colspan="5">
                                <ul class="dib-wrap">
                                    <li class="dib user-info">
                                        <ul class="wrap">
                                            <li>
                                                <div class="field gbook">
                                                    <label class="label">
                                                        给卖家留言:
                                                    </label><textarea style="width:350px;height:80px;resize:none;" title="选填：对本次交易的补充说明（建议填写已经和卖家达成一致的说明）"  name=""></textarea>
                                                </div>
                                                <p style="margin-left:85px;flont-size:5px">*小于100字</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dib extra-info">
                                        <div class="shoparea">
                                            <ul class="dib-wrap">
                                                <li class="dib title">
                                                    店铺优惠：
                                                </li>
                                                <li class="dib sel">
                                                    <div class="J_ShopPromo J_Promotion promotion clearfix" data-point-url="http://log.mmstat.com/buy.1.16">
                                                    </div>
                                                </li>
                                                <li class="dib fee">
                                                    <span class='price '>
                                                        -
                                                        <em class="style-normal-bold-black J_ShopPromo_Result">
                                                            0.00
                                                        </em>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="shoppointarea">
                                        </div>
                                        <div class="farearea">
                                            <ul class="dib-wrap J_farearea">
                                                <li class="dib title">
                                                    运送方式：
                                                </li>
                                                <li class="dib sel" data-point-url="http://log.mmstat.com/jsclick?cache=*&tyxd=wlysfs">
                                                    <input type="hidden" name="1704508670:2|actualPaidFee" value="0" class="J_ActualPaidFee"
                                                    />
                                                    <input type="hidden" name="1704508670:2|codAllowMultiple" value="true"
                                                    />
                                                    <input type="hidden" name="1704508670:2|codSellerFareFee" value="" class="J_CodSellerFareFee"
                                                    />
                                                    <input type="hidden" name="1704508670:2|codServiceFeeRate" value="" class="J_CodServiceFeeRate"
                                                    />
                                                    <input type="hidden" name="1704508670:2|codPostFee" value="0" class="J_CodPostFee"
                                                    />
                                            <?php 
                                                $i=0;
                                             ?>

                                @foreach ($data as $k => $v)
                                    <?php 
                                        $i = $v->price*$v->newnum + $i;
                                     ?>
                                @endforeach
                                                @if ($i>=99)

                                                
                                                    <select name="1704508670:2|post" class="J_Fare">
                                                        <option data-fare="1500" value=" 2 " data-codServiceType="2" data-level=""
                                                        selected="selected">
                                                            满99免邮 0.00元
                                                        </option>
                                                    </select>
                                                    <li class="dib fee">
                                                    <span class='price '>
                                                        <em class="style-normal-bold-red J_FareSum">
                                                            <?php 
                                                                $pri = '0.00';
                                                                echo $pri;    
                                                            ?>
                                                        </em>
                                                    </span>
                                                </li>
                                                @else
                                                    <select name="1704508670:2|post" class="J_Fare">
                                                        <option data-fare="1500" value=" 2 " data-codServiceType="2" data-level=""
                                                        selected="selected">
                                                            邮费 15.00元
                                                        </option>
                                                    </select>                                                   
                                                </li>
                                                <li class="dib fee">
                                                    <span class='price '>
                                                        <em class="style-normal-bold-red J_FareSum">
                                                            <?php 
                                                                $pri = '15.00';
                                                                echo $pri;    
                                                            ?>

                                                        </em>
                                                    </span>
                                                @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="extra-area">
                                            <ul class="dib-wrap">
                                                <li class="dib title">
                                                    发货时间：
                                                </li>
                                                <li class="dib content">
                                                    卖家承诺订单在买家付款后，72小时内发货   
                                                   
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="servicearea" style="display: none">
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="shop-total blue-line">
                            <td colspan="5">
                                店铺合计(
                                <span class="J_Exclude" style="display: none">
                                    不
                                </span>
                                含运费
                                <span class="J_ServiceText" style="display: none">
                                    ，服务费
                                </span>
                                )：
                                <span class='price g_price '>
                                    <span>
                                        &yen;
                                    </span>
                                    <em class="style-middle-bold-red J_ShopTotal">
                                           
                                    <?php 
                                        echo $i+$pri;
                                    ?>
                                    </em>
                                </span>
                                <input type="hidden" name="1704508670:2|creditcard" value="false" />
                                <input type="hidden" id="J_IsLadderGroup" name="isLadderGroup" value="false"
                                />
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="order-go" data-spm="4">
                                    <div class="J_AddressConfirm address-confirm">
                                        <div class="kd-popup pop-back" style="margin-bottom: 40px;">
                                            <div class="box">
                                                <div class="bd">
                                                    <div class="point-in">
                                                        <em class="t">
                                                            实付款：
                                                        </em>
                                                        <span class='price g_price '>
                                                            <span>
                                                                &yen;
                                                            </span>
                                                            <em class="style-large-bold-red" id="J_ActualFee">
                                                                <?php 
                                                                    echo $i+$pri;
                                                                ?>
                                                            </em>
                                                        </span>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <em>
                                                                寄送至:
                                                            </em>
                                                            <span id="J_AddrConfirm" style="word-break: break-all;">
                                                                湖北省 恩施土家族苗族自治州 恩施市 湖北民族学院（信息工程学院） 男生宿舍楼235栋1234202
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <em>
                                                                收货人:
                                                            </em>
                                                            <span id="J_AddrNameConfirm">
                                                                某某某 18124317260
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                       
                                            <!-- <a id="J_Go" class="btn-go" data-point-url="" tabindex="0" title="点击此按钮，提交订单。"> -->
                {{ csrf_field()}}

                                        <span style="padding-top:10px">
                                        <input type="submit" style="width:100px;height:50px;" value="提交订单">
                                        </span>     
                                                <b class="dpl-button">
                                                </b>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="J_confirmError confirm-error">
                                        <div class="msg J_shopPointError" style="display: none;">
                                            <p class="error">
                                                积分点数必须为大于0的整数
                                            </p>
                                        </div>
                                    </div>
                                    <div class="msg" style="clear: both;">
                                        <p class="tips naked" style="float:right;padding-right: 0">
                                            若价格变动，请在提交订单后联系卖家改价，并查看已买到的宝贝
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <input type="hidden" id="J_useSelfCarry" name="useSelfCarry" value="false"
            />
            <input type="hidden" id="J_selfCarryStationId" name="selfCarryStationId"
            value="0" />
            <input type="hidden" id="J_useMDZT" name="useMDZT" value="false" />
            <input type="hidden" name="useNewSplit" value="true" />
            <input type="hidden" id="J_sellerIds" name="allSellIds" value="1704508670"
            />
        </form>
    </div>
    <br>
    <div class="w3lsnewsletter" id="w3lsnewsletter">
        <div class="container">
            <div class="w3lsnewsletter-grids">
                <div class="col-md-5 w3lsnewsletter-grid w3lsnewsletter-grid-1 subscribe">
                    <h2>寄信给我们</h2>
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



    </script>
@endsection