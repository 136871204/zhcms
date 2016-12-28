<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><style type="text/css">
body,td { font-size:13px; }
</style>
<h1 align="center">订单信息</h1>
<table width="100%" cellpadding="1">
    <tr>
        <td width="8%">购 货 人：</td>
        <td><?php if($order['user_name']){?><?php echo $order['user_name'];?><?php  }else{ ?><?php echo $lang['anonymous'];?><?php }?><!-- 购货人姓名 --></td>
        <td align="right">下单时间：</td><td><?php echo $order['order_time'];?><!-- 下订单时间 --></td>
        <td align="right">支付方式：</td><td><?php echo $order['pay_name'];?><!-- 支付方式 --></td>
        <td align="right">订单编号：	</td><td><?php echo $order['order_sn'];?><!-- 订单号 --></td>
    </tr>
    <tr>
        <td>付款时间：</td><td><?php echo $order['pay_time'];?></td><!-- 付款时间 -->
        <td align="right">发货时间：</td><td><?php echo $order['shipping_time'];?><!-- 发货时间 --></td>
        <td align="right">配送方式：</td><td><?php echo $order['shipping_name'];?><!-- 配送方式 --></td>
        <td align="right">发货单号：</td><td><?php echo $order['invoice_no'];?> <!-- 发货单号 --></td>
    </tr>
    <tr>
        <td>收货地址：</td>
        <td colspan="7">
        [<?php echo $order['region'];?>]&nbsp;<?php echo $order['address'];?>&nbsp;<!-- 收货人地址 -->
        收货人：<?php echo $order['consignee'];?>&nbsp;<!-- 收货人姓名 -->
        <?php if($order['zipcode']){?>邮编：<?php echo $order['zipcode'];?>&nbsp;<?php }?><!-- 邮政编码 -->
        <?php if($order['tel']){?>电话：<?php echo $order['tel'];?>&nbsp; <?php }?><!-- 联系电话 -->
        <?php if($order['mobile']){?>手机：<?php echo $order['mobile'];?><?php }?><!-- 手机号码 -->
        </td>
    </tr>
</table>
<table width="100%" border="1" style="border-collapse:collapse;border-color:#000;">
    <tr align="center">
        <td bgcolor="#cccccc">商品名称  <!-- 商品名称 --></td>
        <td bgcolor="#cccccc">货号    <!-- 商品货号 --></td>
        <td bgcolor="#cccccc">属性  <!-- 商品属性 --></td>
        <td bgcolor="#cccccc">价格 <!-- 商品单价 --></td>
        <td bgcolor="#cccccc">数量<!-- 商品数量 --></td>
        <td bgcolor="#cccccc">小计    <!-- 价格小计 --></td>
    </tr>
    <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods_key=>$goods){ ?>
    <tr>
        <td>
            &nbsp;<?php echo $goods['goods_name'];?><!-- 商品名称 -->
            <?php if($goods['is_gift']){?>
                <?php if($goods['goods_price'] > 0){?>
                    （特惠品）
                <?php  }else{ ?>
                    （赠品）
                <?php }?>
            <?php }?>
            <?php if($goods['parent_id'] > 0){?>
                （配件）
            <?php }?>
        </td>
        <td>&nbsp;<?php echo $goods['goods_sn'];?> <!-- 商品货号 --></td>
        <td>
            <!-- 商品属性 -->
            <?php if(is_array($goods_attr[$goods_key])):?><?php $index=0; ?><?php  foreach($goods_attr[$goods_key] as $attr_key=>$attr){ ?>
                <?php if($attr['name']){?>
                    <?php echo $attr['name'];?>:<?php echo $attr['value'];?>
                <?php }?>
            <?php $index++; ?><?php }?><?php endif;?>
        </td>
        <td align="right"><?php echo $goods['formated_goods_price'];?>&nbsp;<!-- 商品单价 --></td>
        <td align="right"><?php echo $goods['goods_number'];?>&nbsp;<!-- 商品数量 --></td>
        <td align="right"><?php echo $goods['formated_subtotal'];?>&nbsp;<!-- 商品金额小计 --></td>
    </tr>
    <?php $index++; ?><?php }?><?php endif;?>
    <tr>
        <!-- 发票抬头和发票内容 -->
        <td colspan="4">
            <?php if($order['inv_payee']){?>
                发票抬头：<?php echo $order['inv_payee'];?>&nbsp;&nbsp;&nbsp;
                发票内容：<?php echo $order['inv_content'];?>
            <?php }?>
        </td>
        <!-- 商品总金额 -->
        <td colspan="2" align="right">商品总金额：<?php echo $order['formated_goods_amount'];?></td>
    </tr>
</table>
<table width="100%" border="0">
    <tr align="right">
        <td>
            <?php if($order['discount'] > 0){?>
                - 折扣：<?php echo $order['formated_discount'];?>
            <?php }?>
            <?php if($order['pack_name'] and $order['pack_fee'] <> '0.00'){?>
                 <!-- 包装名称包装费用 -->
                + 包装费用：<?php echo $order['formated_pack_fee'];?>
            <?php }?>
            <?php if($order['card_name'] and $order['card_fee'] <> '0.00'){?><!-- 贺卡名称以及贺卡费用 -->
                + 贺卡费用：<?php echo $order['formated_card_fee'];?>
            <?php }?>
            <?php if($order['pay_fee'] <> '0.00'){?><!-- 支付手续费 -->
                + 支付费用：<?php echo $order['formated_pay_fee'];?>
            <?php }?>
            <?php if($order['shipping_fee'] <> '0.00'){?><!-- 配送费用 -->
                + 配送费用：<?php echo $order['formated_shipping_fee'];?>
            <?php }?>
            <?php if($order['insure_fee'] <> '0.00'){?><!-- 保价费用 -->
                + 保价费用：<?php echo $order['formated_insure_fee'];?>
            <?php }?>
            <!-- 订单总金额 -->
            = 订单总金额：<?php echo $order['formated_total_fee'];?>        
        </td>
    </tr>
    <tr align="right">
        <td>
            <!-- 如果已付了部分款项, 减去已付款金额 -->
            <?php if($order['money_paid'] <> '0.00'){?>
                - 已付款金额：<?php echo $order['formated_money_paid'];?>
            <?php }?>
    
            <!-- 如果使用了余额支付, 减去已使用的余额 -->
            <?php if($order['surplus'] <> '0.00'){?>
                - 使用余额：<?php echo $order['formated_surplus'];?>
            <?php }?>
    
            <!-- 如果使用了积分支付, 减去已使用的积分 -->
            <?php if($order['integral_money'] <> '0.00'){?>
                - 使用积分：<?php echo $order['formated_integral_money'];?>
            <?php }?>
    
            <!-- 如果使用了红包支付, 减去已使用的红包 -->
            <?php if($order['bonus'] <> '0.00'){?>
                - 使用红包：<?php echo $order['formated_bonus'];?>
            <?php }?>
    
            <!-- 应付款金额 -->
            = 应付款金额：<?php echo $order['formated_order_amount'];?>
        </td>
    </tr>
</table>
<table width="100%" border="0">
    <?php if($order['to_buyer']){?>
        <tr><!-- 给购货人看的备注信息 -->
            <td>商家给客户的留言：<?php echo $order['to_buyer'];?></td>
        </tr>
    <?php }?>
    <?php if($order['invoice_note']){?>
        <tr> <!-- 发货备注 -->
            <td>发货备注： <?php echo $order['invoice_note'];?></td>
        </tr>
    <?php }?>
    <?php if($order['pay_note']){?>
    <tr> <!-- 支付备注 -->
        <td>支付备注： <?php echo $order['pay_note'];?></td>
    </tr>
    <?php }?>

    <tr><!-- 网店名称, 网店地址, 网店URL以及联系电话 -->
        <td>
        <?php echo $shop_name;?>（<?php echo $shop_url;?>）
        地址：<?php echo $shop_address;?>&nbsp;&nbsp;电话：<?php echo $service_phone;?>
        </td>
    </tr>
    <tr align="right"><!-- 订单操作员以及订单打印的日期 -->
        <td>打印时间：<?php echo $print_time;?>&nbsp;&nbsp;&nbsp;操作者：<?php echo $action_user;?></td>
    </tr>
</table>