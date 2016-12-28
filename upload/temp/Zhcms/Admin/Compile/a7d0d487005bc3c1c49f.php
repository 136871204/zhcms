<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
ZHPHP = '<?php echo $GLOBALS['user']['ZHPHP'];?>';
ZHPHPDATA = '<?php echo $GLOBALS['user']['ZHPHPDATA'];?>';
ZHPHPTPL = '<?php echo $GLOBALS['user']['ZHPHPTPL'];?>';
ZHPHPEXTEND = '<?php echo $GLOBALS['user']['ZHPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
PHPSELF = '<?php echo $GLOBALS['user']['PHPSELF'];?>';
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
<script language="JavaScript">

</script>
</head>
<body>

<h1>
<?php if($action_link){?>
<span class="action-span"><a href="<?php echo $action_link['href'];?>"><?php echo $action_link['text'];?></a></span>
<?php }?>
<?php if($action_link2){?>
<span class="action-span"><a href="<?php echo $action_link2['href'];?>"><?php echo $action_link2['text'];?></a>&nbsp;&nbsp;</span>
<?php }?>
<span class="action-span1">
    <a href="index.php?act=main"><?php echo C("WEBNAME");?></a> 
</span>
<span id="search_id" class="action-span1">
    <?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?>
</span>
<div style="clear:both"></div>
</h1>

<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var remove_confirm = "删除订单将清除该订单的所有信息。您确定要这么做吗？";
var confirm_merge = "您确实要合并这两个订单吗？";
var input_price = "自定义价格";
var pls_search_user = "请搜索并选择会员";
var confirm_drop = "确认要删除该商品吗？";
var invalid_goods_number = "商品数量不正确";
var pls_search_goods = "请搜索并选择商品";
var pls_select_area = "请完整选择所在地区";
var pls_select_shipping = "请选择配送方式";
var pls_select_payment = "请选择支付方式";
var pls_select_pack = "请选择包装";
var pls_select_card = "请选择贺卡";
var pls_input_note = "请您填写备注！";
var pls_input_cancel = "请您填写取消原因！";
var pls_select_refund = "请选择退款方式！";
var pls_select_agency = "请选择办事处！";
var pls_select_other_agency = "该订单现在就属于这个办事处，请选择其他办事处！";
var loading = "加载中...";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/topbar.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectzone.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<?php if($user){?>
    <div id="topbar">
        <div align="right"><a href="" onclick="closebar(); return false"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/close.gif" border="0" /></a></div>
        <table width="100%" border="0">
            <caption><strong> 购货人信息 </strong></caption>
            <tr>
                <td> 电子邮件 </td>
                <td> <a href="mailto:<?php echo $user['email'];?>"><?php echo $user['email'];?></a> </td>
            </tr>
            <tr>
                <td> 账户余额 </td>
                <td> <?php echo $user['formated_user_money'];?> </td>
            </tr>
            <tr>
                <td> 消费积分 </td>
                <td> <?php echo $user['pay_points'];?> </td>
            </tr>
            <tr>
                <td> 等级积分 </td>
                <td> <?php echo $user['rank_points'];?> </td>
            </tr>
            <tr>
                <td> 会员等级 </td>
                <td> <?php echo $user['rank_name'];?> </td>
            </tr>
            <tr>
                <td> 红包数量 </td>
                <td> <?php echo $user['bonus_count'];?> </td>
            </tr>
        </table>
        <?php if(is_array($address_list)):?><?php $index=0; ?><?php  foreach($address_list as $address){ ?>
            <table width="100%" border="0">
                <caption><strong> 收货人 : <?php echo $address['consignee'];?> </strong></caption>
                <tr>
                    <td> 电子邮件 </td>
                    <td> <a href="mailto:<?php echo $address['email'];?>"><?php echo $address['email'];?></a> </td>
                </tr>
                <tr>
                    <td> 地址 </td>
                    <td> <?php echo $address['address'];?> </td>
                </tr>
                <tr>
                    <td> 邮编 </td>
                    <td> <?php echo $address['zipcode'];?> </td>
                </tr>
                <tr>
                    <td> 电话 </td>
                    <td> <?php echo $address['tel'];?> </td>
                </tr>
                <tr>
                    <td> 备用电话 </td>
                    <td> <?php echo $address['mobile'];?> </td>
                </tr>
            </table>
        <?php $index++; ?><?php }?><?php endif;?>
    </div>
<?php }?>

<form action="<?php echo U('index');?>&act=operate" method="post" name="theForm">
    <div class="list-div" style="margin-bottom: 5px">
        <table width="100%" cellpadding="3" cellspacing="1">
            <tr>
                <td colspan="4">
                    <div align="center">
                        <input name="prev" type="button" class="button" onClick="location.href='<?php echo U('index');?>&act=info&order_id=<?php echo $prev_id;?>';" value="前一个订单" <?php if(!$prev_id){?>disabled<?php }?> />
                        <input name="next" type="button" class="button" onClick="location.href='<?php echo U('index');?>&act=info&order_id=<?php echo $next_id;?>';" value="后一个订单" <?php if(!$next_id){?>disabled<?php }?> />
                        <input type="button" onclick="window.open('<?php echo U('index');?>&act=info&order_id=<?php echo $order['order_id'];?>&print=1')" class="button" value="打印订单" />
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="4">基本信息</th>
            </tr>
            <tr>
                <td width="18%"><div align="right"><strong>订单号：</strong></div></td>
                <td width="34%">
                    <?php echo $order['order_sn'];?>
                    <?php if($order['extension_code'] == 'group_buy'){?>
                        <a href="group_buy.php?act=edit&id=<?php echo $order['extension_id'];?>"><?php echo $lang['group_buy'];?></a>
                    <?php  }elseif($order['extension_code'] == 'exchange_goods'){ ?>
                        <a href="exchange_goods.php?act=edit&id=<?php echo $order['extension_id'];?>"><?php echo $lang['exchange_goods'];?></a>
                    <?php }?>
                </td>
                <td width="15%"><div align="right"><strong>订单状态：</strong></div></td>
                <td><?php echo $order['status'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>购货人：</strong></div></td>
                <td>
                    <?php echo default_value($order['user_name'],'匿名用户');?> 
                    <?php if($order['user_id'] > 0){?>
                        [ <a href="" onclick="staticbar();return false;">显示购货人信息</a> ] 
                        [ <a href="<?php echo U('Admin/EcUserMsg/index');?>&act=add&order_id=<?php echo $order['order_id'];?>&user_id=<?php echo $order['user_id'];?>">发送/查看留言</a> ]
                    <?php }?>
                </td>
                <td><div align="right"><strong>下单时间：</strong></div></td>
                <td><?php echo $order['formated_add_time'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>支付方式：</strong></div></td>
                <td>
                    <?php if($order['pay_id'] > 0){?>
                        <?php echo $order['pay_name'];?>
                    <?php  }else{ ?>
                        <span class="require-field">*</span>
                    <?php }?>
                    <a href="<?php echo U('index');?>&act=edit&order_id=<?php echo $order['order_id'];?>&step=payment&pay_id=<?php echo $order['pay_id'];?>" class="special">编辑</a>
                    (备注: <span onclick="listTable.edit(this, 'edit_pay_note', <?php echo $order['order_id'];?>)"><?php if($order['pay_note']){?><?php echo $order['pay_note'];?><?php  }else{ ?>N/A<?php }?></span>)</td>
                <td><div align="right"><strong>付款时间：</strong></div></td>
                <td><?php echo $order['pay_time'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>配送方式：</strong></div></td>
                <td>
                    <?php if($exist_real_goods){?>
                        <?php if($order['shipping_id'] > 0){?>
                            <?php echo $order['shipping_name'];?>
                        <?php  }else{ ?>
                            <span class="require-field">*</span>
                        <?php }?>
                        <a href="order.php?act=edit&order_id=<?php echo $order['order_id'];?>&step=shipping" class="special">编辑</a>&nbsp;&nbsp;
                        <input type="button" onclick="window.open('order.php?act=info&order_id=<?php echo $order['order_id'];?>&shipping_print=1')" class="button" value="打印快递单"/> 
                        <?php if($order['insure_fee'] > 0){?>
                            （保价费用：<?php echo $order['formated_insure_fee'];?>）
                        <?php }?>
                    <?php }?>
                </td>
                <td><div align="right"><strong>发货时间：</strong></div></td>
                <td><?php echo $order['shipping_time'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>发货单号：</strong></div></td>
                <td>
                    <?php if($order['shipping_id'] > 0 and $order['shipping_status'] > 0){?>
                        <span><?php if($order['invoice_no']){?><?php echo $order['invoice_no'];?><?php  }else{ ?>N/A<?php }?></span>
                        <a href="order.php?act=edit&order_id=<?php echo $order['order_id'];?>&step=shipping" class="special">编辑</a>
                    <?php }?>
                </td>
                <td><div align="right"><strong>订单来源：</strong></div></td>
                <td><?php echo $order['referer'];?></td>
            </tr>
            <tr>
                <th colspan="4">其他信息<a href="order.php?act=edit&order_id=<?php echo $order['order_id'];?>&step=other" class="special">编辑</a></th>
            </tr>
            <tr>
                <td><div align="right"><strong>发票类型：</strong></div></td>
                <td><?php echo $order['inv_type'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><div align="right"><strong>发票抬头：</strong></div></td>
                <td><?php echo $order['inv_payee'];?></td>
                <td><div align="right"><strong>发票内容：</strong></div></td>
                <td><?php echo $order['inv_content'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>客户给商家的留言：</strong></div></td>
                <td colspan="3"><?php echo $order['postscript'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>缺货处理：</strong></div></td>
                <td><?php echo $order['how_oos'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><div align="right"><strong>包装：</strong></div></td>
                <td><?php echo $order['pack_name'];?></td>
                <td><div align="right"><strong>贺卡：</strong></div></td>
                <td><?php echo $order['card_name'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>贺卡祝福语：</strong></div></td>
                <td colspan="3"><?php echo $order['card_message'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>商家给客户的留言：</strong></div></td>
                <td colspan="3"><?php echo $order['to_buyer'];?></td>
            </tr>
            <tr>
                <th colspan="4">收货人信息<a href="order.php?act=edit&order_id=<?php echo $order['order_id'];?>&step=consignee" class="special">编辑</a></th>
            </tr>
                <tr>
                <td><div align="right"><strong>收货人：</strong></div></td>
                <td><?php echo $order['consignee'];?></td>
                <td><div align="right"><strong>电子邮件：</strong></div></td>
                <td><?php echo $order['email'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>地址：</strong></div></td>
                <td>[<?php echo $order['region'];?>] <?php echo $order['address'];?></td>
                <td><div align="right"><strong>邮编：</strong></div></td>
                <td><?php echo $order['zipcode'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>电话：</strong></div></td>
                <td><?php echo $order['tel'];?></td>
                <td><div align="right"><strong>手机：</strong></div></td>
                <td><?php echo $order['mobile'];?></td>
            </tr>
            <tr>
                <td><div align="right"><strong>标志性建筑：</strong></div></td>
                <td><?php echo $order['sign_building'];?></td>
                <td><div align="right"><strong>最佳送货时间：</strong></div></td>
                <td><?php echo $order['best_time'];?></td>
            </tr>
        </table>
    </div>
    
    <div class="list-div" style="margin-bottom: 5px">
        <table width="100%" cellpadding="3" cellspacing="1">
            <tr>
                <th colspan="8" scope="col">
                    商品信息
                    <a href="order.php?act=edit&order_id=<?php echo $order['order_id'];?>&step=goods" class="special">编辑</a>
                </th>
            </tr>
            <tr>
                <td scope="col"><div align="center"><strong>商品名称 [ 品牌 ]</strong></div></td>
                <td scope="col"><div align="center"><strong>货号</strong></div></td>
                <td scope="col"><div align="center"><strong>货品号</strong></div></td>
                <td scope="col"><div align="center"><strong>价格</strong></div></td>
                <td scope="col"><div align="center"><strong>数量</strong></div></td>
                <td scope="col"><div align="center"><strong>属性</strong></div></td>
                <td scope="col"><div align="center"><strong>库存</strong></div></td>
                <td scope="col"><div align="center"><strong>小计</strong></div></td>
            </tr>
            <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                <tr>
                    <td>
                        <?php if($goods['goods_id'] > 0 and $goods['extension_code'] <> 'package_buy'){?>
                            <a href="../goods.php?id=<?php echo $goods['goods_id'];?>" target="_blank"><?php echo $goods['goods_name'];?> 
                            <?php if($goods['brand_name']){?>[ <?php echo $goods['brand_name'];?> ]<?php }?>
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
                            </a>
                        <?php  }elseif($goods['goods_id'] > 0 and $goods['extension_code'] == 'package_buy'){ ?>
                            <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $goods['goods_id'];?>)">
                                <?php echo $goods['goods_name'];?><span style="color:#FF0000;">（礼包）</span>
                            </a>
                            <div id="suit_<?php echo $goods['goods_id'];?>" style="display:none">
                                <?php if(is_array($goods['package_goods_list'])):?><?php $index=0; ?><?php  foreach($goods['package_goods_list'] as $package_goods_list){ ?>
                                    <a href="../goods.php?id=<?php echo $package_goods_list['goods_id'];?>" target="_blank">
                                        <?php echo $package_goods_list['goods_name'];?>
                                    </a><br />
                                <?php $index++; ?><?php }?><?php endif;?>
                            </div>
                        <?php }?>
                    </td>
                    <td><?php echo $goods['goods_sn'];?></td>
                    <td><?php echo $goods['product_sn'];?></td>
                    <td><div align="right"><?php echo $goods['formated_goods_price'];?></div></td>
                    <td><div align="right"><?php echo $goods['goods_number'];?></div></td>
                    <td><?php echo nl2br($goods['goods_attr']);?></td>
                    <td><div align="right"><?php echo $goods['storage'];?></div></td>
                    <td><div align="right"><?php echo $goods['formated_subtotal'];?></div></td>
                </tr>
            <?php $index++; ?><?php }?><?php endif;?>
            <tr>
                <td></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <?php if($order['total_weight']){?>
                        <div align="right"><strong>商品总重量：</strong></div>
                    <?php }?>
                </td>
                <td>
                    <?php if($order['total_weight']){?>
                    <div align="right"><?php echo $order['total_weight'];?></div>
                    <?php }?>
                </td>
                <td>&nbsp;</td>
                <td><div align="right"><strong>合计：</strong></div></td>
                <td><div align="right"><?php echo $order['formated_goods_amount'];?></div></td>
            </tr>
        </table>
    </div>
    
    <div class="list-div" style="margin-bottom: 5px">
        <table width="100%" cellpadding="3" cellspacing="1">
            <tr>
                <th>费用信息<a href="order.php?act=edit&order_id=<?php echo $order['order_id'];?>&step=money" class="special">编辑</a></th>
            </tr>
            <tr>
                <td>
                    <div align="right">
                        商品总金额：<strong><?php echo $order['formated_goods_amount'];?></strong>
                        - 折扣：<strong><?php echo $order['formated_discount'];?></strong>     
                        + 发票税额：<strong><?php echo $order['formated_tax'];?></strong>
                        + 配送费用：<strong><?php echo $order['formated_shipping_fee'];?></strong>
                        + 保价费用：<strong><?php echo $order['formated_insure_fee'];?></strong>
                        + 支付费用：<strong><?php echo $order['formated_pay_fee'];?></strong>
                        + 包装费用：<strong><?php echo $order['formated_pack_fee'];?></strong>
                        + 贺卡费用：<strong><?php echo $order['formated_card_fee'];?></strong>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div align="right"> = 订单总金额：<strong><?php echo $order['formated_total_fee'];?></strong></div></td>
            </tr>
            <tr>
                <td>
                    <div align="right">
                    - 已付款金额：<strong><?php echo $order['formated_money_paid'];?></strong> 
                    - 使用余额： <strong><?php echo $order['formated_surplus'];?></strong>
                    - 使用积分： <strong><?php echo $order['formated_integral_money'];?></strong>
                    - 使用红包： <strong><?php echo $order['formated_bonus'];?></strong>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="right"> 
                        = <?php if($order['order_amount'] >= 0){?>
                            应付款金额：<strong><?php echo $order['formated_order_amount'];?></strong>
                        <?php  }else{ ?>
                            应退款金额：<strong><?php echo $order['formated_money_refund'];?></strong>
                            <?php if($order['user_id'] <= 0){?>
                                <input name="refund" type="button" value="退款" onclick="location.href='order.php?act=process&func=load_refund&anonymous=1&order_id=<?php echo $order['order_id'];?>&refund_amount=<?php echo $order['money_refund'];?>'" />
                            <?php  }else{ ?>
                                <input name="refund" type="button" value="退款" onclick="location.href='order.php?act=process&func=load_refund&anonymous=0&order_id=<?php echo $order['order_id'];?>&refund_amount=<?php echo $order['money_refund'];?>'" />
                            <?php }?>
                        <?php }?>
                        <?php if($order['extension_code'] == 'group_buy'){?>
                            <br />（备注：团购如果有保证金，第一次只需支付保证金和相应的支付费用）
                        <?php }?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="list-div" style="margin-bottom: 5px">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th colspan="6">操作信息</th>
            </tr>
            <tr>
                <td><div align="right"><strong>操作备注：</strong></div></td>
                <td colspan="5"><textarea name="action_note" cols="80" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>
                    <div align="right"></div>
                    <div align="right"><strong>当前可执行操作：</strong> </div>
                </td>
                <td colspan="5">
                    <?php if($operable_list['confirm']){?>
                        <input name="confirm" type="submit" value="确认" class="button" />
                    <?php }?>
                    <?php if($operable_list['pay']){?>
                        <input name="pay" type="submit" value="付款" class="button" />
                    <?php }?> 
                    <?php if($operable_list['unpay']){?>
                        <input name="unpay" type="submit" class="button" value="设为未付款" />
                    <?php }?>  
                    <?php if($operable_list['prepare']){?>
                    <input name="prepare" type="submit" value="配货" class="button" />
                    <?php }?> 
                    <?php if($operable_list['split']){?>
                        <input name="ship" type="submit" value="生成发货单" class="button" />
                    <?php }?> 
                    <?php if($operable_list['unship']){?>
                        <input name="unship" type="submit" value="未发货" class="button" />
                    <?php }?> 
                    <?php if($operable_list['receive']){?>
                        <input name="receive" type="submit" value="已收货" class="button" />
                    <?php }?> 
                    <?php if($operable_list['cancel']){?>
                        <input name="cancel" type="submit" value="取消" class="button" />
                    <?php }?> 
                    <?php if($operable_list['invalid']){?>
                        <input name="invalid" type="submit" value="无效" class="button" />
                    <?php }?> 
                    <?php if($operable_list['return']){?>
                        <input name="return" type="submit" value="退货" class="button" />
                    <?php }?> 
                    <?php if($operable_list['to_delivery']){?>
                        <input name="to_delivery" type="submit" value="去发货" class="button"/>
                        <input name="order_sn" type="hidden" value="<?php echo $order['order_sn'];?>" />
                    <?php }?> 
                    <input name="after_service" type="submit" value="售后" class="button" />
                    <?php if($operable_list['remove']){?>
                        <input name="remove" type="submit" value="移除" class="button" onClick="return window.confirm('<?php echo $lang['js_languages']['remove_confirm'];?>');" />
                    <?php }?>
                    <?php if($order['extension_code'] == 'group_buy'){?>
                        备注：团购活动未处理为成功前，不能发货
                    <?php }?>
                    <?php if($agency_list){?>
                        <input name="assign" type="submit" value="指派给" class="button" onclick="return assignTo(document.forms['theForm'].elements['agency_id'].value)" />
                        <select name="agency_id">
                            <option value="0">请选择...</option>
                            <?php if(is_array($agency_list)):?><?php $index=0; ?><?php  foreach($agency_list as $agency){ ?>
                                <option value="<?php echo $agency['agency_id'];?>" <?php if($agency['agency_id'] == $order['agency_id']){?>selected<?php }?>><?php echo $agency['agency_name'];?></option>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </select>
                    <?php }?>
                    <input name="order_id" type="hidden" value="<?php echo $_REQUEST['order_id'];?>"/>
                </td>
            </tr>
            <tr>
                <th>操作者：</th>
                <th>操作时间</th>
                <th>订单状态</th>
                <th>付款状态</th>
                <th>发货状态</th>
                <th>备注</th>
            </tr>
            <?php if(is_array($action_list)):?><?php $index=0; ?><?php  foreach($action_list as $action){ ?>
                <tr>
                    <td><div align="center"><?php echo $action['action_user'];?></div></td>
                    <td><div align="center"><?php echo $action['action_time'];?></div></td>
                    <td><div align="center"><?php echo $action['order_status'];?></div></td>
                    <td><div align="center"><?php echo $action['pay_status'];?></div></td>
                    <td><div align="center"><?php echo $action['shipping_status'];?></div></td>
                    <td><?php echo nl2br($action['action_note']);?></td>
                </tr>
            <?php $index++; ?><?php }?><?php endif;?>
        </table>
    </div>
</form>

<script language="JavaScript">
    var oldAgencyId = <?php echo default_value($order['agency_id'],0);?>;
    onload = function()
    {
        // 开始检查订单
        //startCheckOrder();
    }
    
    /**
   * 把订单指派给某办事处
   * @param int agencyId
   */
   
   
</script>

<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script language="JavaScript">
if (document.getElementById("listDiv"))
{
    
    document.getElementById("listDiv").onmouseover = function(e)
    {
        obj = Utils.srcElement(e);
    
        if (obj)
        {
            if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
            else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
            else return;
    
            for (i = 0; i < row.cells.length; i++)
            {
                if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
            }
        }
    
    }
    
    document.getElementById("listDiv").onmouseout = function(e)
    {
        obj = Utils.srcElement(e);
        
        if (obj)
        {
            if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
            else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
            else return;
            
            for (i = 0; i < row.cells.length; i++)
            {
                if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
            }
        }
    }

    
    document.getElementById("listDiv").onclick = function(e)
    {
        var obj = Utils.srcElement(e);
    
        if (obj.tagName == "INPUT" && obj.type == "checkbox")
        {
            if (!document.forms['listForm'])
            {
                return;
            }
            var nodes = document.forms['listForm'].elements;
            var checked = false;
            
            for (i = 0; i < nodes.length; i++)
            {
                if (nodes[i].checked)
                {
                    checked = true;
                    break;
                }
            }
            
            if(document.getElementById("btnSubmit"))
            {
                document.getElementById("btnSubmit").disabled = !checked;
            }
            for (i = 1; i <= 10; i++)
            {
                if (document.getElementById("btnSubmit" + i))
                {
                    document.getElementById("btnSubmit" + i).disabled = !checked;
                }
            }
        }
    }
}
</script>


