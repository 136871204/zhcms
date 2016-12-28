<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($invoice_list){?>
    <style type="text/css">
    .boxCenterList form{display:inline;}
    .boxCenterList form a{color:#404040; text-decoration:underline;}
    </style>
    <div class="box">
        <div class="box_1">
            <h3><span>发货查询</span></h3>
            <div class="boxCenterList">
                <?php if(is_array($invoice_list)):?><?php $index=0; ?><?php  foreach($invoice_list as $invoice){ ?>
                    订单号 <?php echo $invoice['order_sn'];?><br />
                    发货单 <?php echo $invoice['invoice_no'];?>
                    <div class="blank"></div>
                <?php $index++; ?><?php }?><?php endif;?>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
<?php }?>