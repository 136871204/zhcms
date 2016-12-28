<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/utils.js"></script>
<div id="ECS_ORDERTOTAL">
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if($_SESSION['ec_user_id'] > 0 and (C("ec_use_integral") or C("ec_use_bonus") )){?>
            <tr>
                <td align="right" bgcolor="#ffffff">
                    受注完了後，
                    <!-- 是否使用积分-->
                    <?php if(C("ec_use_integral")){?>
                        <font class="f4_b"><?php echo $total['will_get_integral'];?></font> <?php echo $points_name;?>　を貰える
                    <?php }?> 
                    <!--  是否同时使用积分红包-->
                    <?php if(C("ec_use_integral") and C("ec_use_bonus")){?>，かつ  <?php }?>
                    <!-- 是否使用红包-->
                    <?php if(C("ec_use_bonus")){?>
                        <font class="f4_b"><?php echo $total['will_get_bonus'];?></font>のボーナスをもらえます。
                    <?php }?>
                </td>
            </tr>
        <?php }?>
        <tr>
            <td align="right" bgcolor="#ffffff">
                商品総計: <font class="f4_b"><?php echo $total['goods_price_formated'];?></font>
                <!-- 折扣 -->
                <?php if($total['discount'] > 0){?> 
                    - 割引: <font class="f4_b"><?php echo $total['discount_formated'];?></font>
                <?php }?>
                <!--  税 -->
                <?php if($total['tax'] > 0){?> 
                    + レシート税金: <font class="f4_b"><?php echo $total['tax_formated'];?></font>
                <?php }?>
                <!-- 配送费用 -->
                <?php if($total['shipping_fee'] > 0){?> 
                    + 配達費: <font class="f4_b"><?php echo $total['shipping_fee_formated'];?></font>
                <?php }?>
                <!-- 保价费用 -->
                <?php if($total['shipping_insure'] > 0){?> 
                    + 商品保険費: <font class="f4_b"><?php echo $total['shipping_insure_formated'];?></font>
                <?php }?>
                <!--  支付费用 -->
                <?php if($total['pay_fee'] > 0){?> 
                    + 支払い手続き費: <font class="f4_b"><?php echo $total['pay_fee_formated'];?></font>
                <?php }?>
                <!-- 包装费用-->
                <?php if($total['pack_fee'] > 0){?> 
                    + 包み費: <font class="f4_b"><?php echo $total['pack_fee_formated'];?></font>
                <?php }?>
                <!-- 贺卡费用-->
                <?php if($total['card_fee'] > 0){?> 
                    + 祝いカード費: <font class="f4_b"><?php echo $total['card_fee_formated'];?></font>
                <?php }?>
            </td>
        </tr>
        <!--  使用余额或积分或红包 -->
        <?php if($total['surplus'] > 0 or $total['integral'] > 0 or $total['bonus'] > 0){?>
            <tr>
                <td align="right" bgcolor="#ffffff">
                    <!-- 使用余额 -->
                    <?php if($total['surplus'] > 0){?> 
                        - 殘高使用: <font class="f4_b"><?php echo $total['surplus_formated'];?></font>
                    <?php }?>
                    <!-- 使用积分 -->
                    <?php if($total['integral'] > 0){?>
                        - ポイント使用: <font class="f4_b"><?php echo $total['integral_formated'];?></font>
                    <?php }?>
                    <!-- 使用红包 -->
                    <?php if($total['bonus'] > 0){?>
                        - ポーナス使用: <font class="f4_b"><?php echo $total['bonus_formated'];?></font>
                    <?php }?>  
                </td>
            </tr>
        <?php }?>
        <tr>
            <td align="right" bgcolor="#ffffff"> 
                支払う金額: <font class="f4_b"><?php echo $total['amount_formated'];?></font>
                <?php if($is_group_buy){?>
                    <br />
                   （備考：団体購入には保証金があり，初めて保証金だけ支払う）
                <?php }?>
                <!--消耗积分-->
                <?php if($total['exchange_integral']){?>
                    <br />
                    ポイント商品は使用するポイント：<font class="f4_b"><?php echo $total['exchange_integral'];?></font>
                <?php }?>
            </td>
        </tr>
        
    </table>
</div>