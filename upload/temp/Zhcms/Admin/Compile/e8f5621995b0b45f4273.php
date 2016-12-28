<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title><?php echo L("admin_node_index_page_title");?></title>
    <script type='text/javascript' src='http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.works.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
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
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Node/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.works.com/zh/Zhcms/Admin/Tpl/Node/css/css.css"/>
    <script>
    var admin_node_js_check_message1='<?php echo L("admin_node_js_check_message1");?>';
    var admin_node_js_update_order_error1='<?php echo L("admin_node_js_update_order_error1");?>';
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action"><?php echo L("admin_node_index_page_tab1");?></a></li>
            <li><a href="<?php echo U('add',array('pid'=>0));?>"><?php echo L("admin_node_index_page_tab2");?></a></li>
            <li><a href="javascript:zh_ajax('<?php echo U(update_cache);?>');"><?php echo L("admin_node_index_page_tab3");?></a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50"><?php echo L("admin_node_index_page_table_column_header1");?></td>
            <td class="w50"><?php echo L("admin_node_index_page_table_column_header2");?></td>
            <td><?php echo L("admin_node_index_page_table_column_header3");?></td>
            <td><?php echo L("admin_node_index_page_table_column_header4");?></td>
            <td class="w80"><?php echo L("admin_node_index_page_table_column_header5");?></td>
            <td class="w150"><?php echo L("admin_node_index_page_table_column_header6");?></td>
        </tr>
        </thead>
        <?php $zh["list"]["n"]["total"]=0;if(isset($node) && !empty($node)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($node));
$zh["list"]["n"]["first"]=true;
$zh["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$zh["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($node,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$zh["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$zh["list"]["n"]["last"]=true;endif;?>

            <tr <?php if($n['pid'] == 0){?>class="top"<?php }?>>
                <td>
                    <input type="text" class="w30" value="<?php echo $n['list_order'];?>" name="list_order[<?php echo $n['nid'];?>]"/>
                </td>
                <td><?php echo $n['nid'];?></td>
                <td>
                    <?php if($n['pid'] == 0 && Data::hasChild(cache('node'),$n['nid'])){?>
                        <img src="http://www.works.com/Static/image/contract.gif" action="2" class="explodeCategory"/>
                    <?php }?>
                    <?php if($n['pid'] == 0){?>
                        <strong><?php echo $n['_name'];?></strong>
                        <?php  }else{ ?>
                        <?php echo $n['_name'];?>
                    <?php }?>
                </td>
                <td>
                    <?php if($n['state']==1){?>
                        <?php echo L("admin_node_index_page_table_column_show1");?>
                        <?php  }else{ ?>
                        <?php echo L("admin_node_index_page_table_column_show2");?>
                    <?php }?>
                </td>
                <td>
                    <?php if($n['type']==1){?>
                        <?php echo L("admin_node_index_page_table_column_show3");?>
                        <?php  }else{ ?>
                        <?php echo L("admin_node_index_page_table_column_show4");?>
                    <?php }?>
                </td>
                <td style="text-align: right">
                    <?php if($n['_level']==3){?>
                        <span class="disabled"><?php echo L("admin_node_index_page_table_operator1");?>  | </span>
                    <?php  }else{ ?>
                        <a href="<?php echo U('add',array('pid'=>$n['nid']));?>"><?php echo L("admin_node_index_page_table_operator1");?></a> |
                    <?php }?>

                    <?php if($n['is_system']==0){?>
                        <a href="<?php echo U('edit',array('nid'=>$n['nid']));?>"><?php echo L("admin_node_index_page_table_operator2");?></a> |
                        <a href="javascript:if(confirm('<?php echo L("admin_node_index_page_confirm_delete");?>'))zh_ajax('<?php echo U(del);?>',{nid:<?php echo $n['nid'];?>})"><?php echo L("admin_node_index_page_table_operator3");?></a>
                    <?php  }else{ ?>
                         <span class="disabled"><?php echo L("admin_node_index_page_table_operator2");?> | </span>
                         <span class="disabled"><?php echo L("admin_node_index_page_table_operator3");?></span>
                    <?php }?>
                </td>
            </tr>
        <?php $zh["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <br /><br /><br /><br />
</div>
<div class="position-bottom">
    <input type="button" class="zh-success" value="<?php echo L("admin_node_index_page_form_update_order");?>" onclick="update_order();"/>
</div>
<style type="text/css">
    img.explodeCategory {
        cursor: pointer;
    }
</style>
<script>
    //展开栏目
    $(".explodeCategory").click(function () {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        switch (action) {
            case 1://展示
                $(tr).nextUntil('.top').show();
                $(this).attr('action', 2);
                $(this).attr('src', "http://www.works.com/Static/image/contract.gif");
                break;
            case 2://收缩
                $(tr).nextUntil('.top').hide();
                $(this).attr('action', 1);
                $(this).attr('src', "http://www.works.com/Static/image/explode.gif");
                break;
        }
    })
    //关闭栏目子栏目（隐藏子栏目）
    $(".explodeCategory").trigger('click');
    //全部收起子栏目
    function explodeCategory() {
        $(".explodeCategory").each(function (i) {
            $(this).trigger('click');
        })
    }
</script>

</body>
</html>