<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
APIENDPOINT = '<?php echo $GLOBALS['user']['APIENDPOINT'];?>';
PAYPALURL = '<?php echo $GLOBALS['user']['PAYPALURL'];?>';
</script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
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
var lang_removeconfirm = "您确定要卸载该支付方式吗？";
//-->
</script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>

<div class="list-div" id="listDiv">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th>支付方式名称</th>
            <th width="40%">支付方式描述</th>
            <th>插件版本</th>
            <th>插件作者</th>
            <th>费用</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($modules)):?><?php $index=0; ?><?php  foreach($modules as $module){ ?>
            <?php if($module['code'] <> 'tenpayc2c'){?>
                <tr>
                    <td class="first-cell" valign="top">
                        <?php if($module['install'] == 1){?>
                            <span onclick="listTable.edit(this, 'edit_name', '<?php echo $module['code'];?>'); return false;"><?php echo $module['name'];?></span>
                        <?php  }else{ ?>
                            <?php echo $module['name'];?>
                        <?php }?>
                    </td>
                    <td><?php echo nl2br($module['desc']);?></td>
                    <td valign="top"><?php echo $module['version'];?></td>
                    <td valign="top"><a href="<?php echo $module['website'];?>"><?php echo $module['author'];?></a></td>
                    <td valign="top" align="right">
                        <?php if($module['is_cod']){?>
                            配送決定
                        <?php  }else{ ?>
                            <?php if($module['install'] == 1){?>
                                <span onclick="listTable.edit(this, 'edit_pay_fee', '<?php echo $module['code'];?>'); return false;"><?php echo $module['pay_fee'];?></span>
                            <?php  }else{ ?>
                                <?php echo $module['pay_fee'];?>
                            <?php }?>
                        <?php }?>
                    </td>
                    <td align="right" valign="top"> <?php if($module['install'] == 1){?> <span onclick="listTable.edit(this, 'edit_order', '<?php echo $module['code'];?>'); return false;"><?php echo $module['pay_order'];?></span> <?php  }else{ ?> &nbsp; <?php }?> </td>
                    <td align="center" valign="top">
                        <?php if($module['install'] == 1){?>
                            <?php if($module['code'] == 'tenpay'){?>
                                <a href="javascript:confirm_redirect(lang_removeconfirm, '<?php echo U('index');?>&act=uninstall&code=<?php echo $module['code'];?>')">卸载财付通</a>
                                <a href="<?php echo U('index');?>&act=edit&code=<?php echo $module['code'];?>">编辑</a><br />
                                <?php if($tenpayc2c['install'] == '1'){?>
                                    <a href="javascript:confirm_redirect(lang_removeconfirm, '<?php echo U('index');?>&act=uninstall&code=tenpayc2c')">卸载中介担保</a>
                                    <a href="<?php echo U('index');?>&act=edit&code=tenpayc2c">编辑</a>
                                <?php  }else{ ?>
                                    <a href="<?php echo U('index');?>&act=install&code=tenpayc2c">安装中介担保</a>
                                <?php }?>
                            <?php  }else{ ?>
                                <a href="javascript:confirm_redirect(lang_removeconfirm, '<?php echo U('index');?>&act=uninstall&code=<?php echo $module['code'];?>')">卸载</a>
                                <a href="<?php echo U('index');?>&act=edit&code=<?php echo $module['code'];?>">编辑</a>
                            <?php }?>
                        <?php  }else{ ?>
                            <?php if($module['code'] == 'tenpay'){?>
                                <a href="<?php echo U('index');?>&act=install&code=<?php echo $module['code'];?>">安装即时到账 </a><br />
                                <?php if($tenpayc2c['install'] == '1'){?>
                                    <a href="javascript:confirm_redirect(lang_removeconfirm, '<?php echo U('index');?>&act=uninstall&code=tenpayc2c')">卸载中介担保</a>
                                    <a href="<?php echo U('index');?>&act=edit&code=tenpayc2c">编辑</a>
                                <?php  }else{ ?>
                                    <a href="<?php echo U('index');?>&act=install&code=tenpayc2c">安装中介担保</a>
                                <?php }?>
                            <?php  }else{ ?>
                                <a href="<?php echo U('index');?>&act=install&code=<?php echo $module['code'];?>">安装</a>
                            <?php }?>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
    </table>
</div>
<!-- end payment list -->
<script type="Text/Javascript" language="JavaScript">
onload = function()
{
    // 开始检查订单
    //startCheckOrder();
}
</script>
<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
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
