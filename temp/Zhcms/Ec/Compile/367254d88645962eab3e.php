<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(empty($order_query)){?>
    <script>
        var invalid_order_sn = "無効な注文番号";
    </script>
    <div class="box">
        <div class="box_1">
            <h3><span>注文番号検索</span></h3>
            <div class="boxCenterList">
                <form name="ecsOrderQuery">
                    <input type="text" name="order_sn" class="inputBg" /><br />
                    <div class="blank5"></div>
                    <input type="button" value="検索" class="bnt_blue_2" onclick="orderQuery()" />
                </form>
                <div id="ECS_ORDER_QUERY" style="margin-top:8px;">
                    <?php  }else{ ?>
                        <?php if($order_query['user_id']){?>
                            <b>注文番号：</b>
                            <a href="<?php echo U('ec/EcUser/index');?>&act=order_detail&order_id=<?php echo $order_query['order_id'];?>" class="f6">
                                <?php echo $order_query['order_sn'];?>
                            </a><br/>
                        <?php  }else{ ?>
                            <b>注文番号：</b><?php echo $order_query['order_sn'];?><br/>
                        <?php }?>
                        <b>注文状態：</b><br/><font class="f1"><?php echo $order_query['order_status'];?></font><br/>
                        <?php if($order_query['invoice_no']){?>
                            <b>配達書 ：</b><?php echo $order_query['invoice_no'];?><br/>
                        <?php }?>
                        <?php if($order_query['shipping_date']){?>
                            配達時間： <?php echo $order_query['shipping_date'];?><br/>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<div class="blank5"></div>