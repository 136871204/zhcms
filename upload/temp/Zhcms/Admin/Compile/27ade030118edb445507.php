<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var region_name_empty = "您必须输入地区的名称!";
    var option_name_empty = "必须输入调查选项名称!";
    var drop_confirm = "您确定要删除这条记录吗?";
    var drop = "删除";
    var country = "一级地区";
    var province = "二级地区";
    var city = "三级地区";
    var cantonal = "四级地区";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form method="post" action="<?php echo U('index');?>" name="theForm" onsubmit="return add_area()">
            <?php if($region_type == '0'){?>
                添加一级地区
            <?php  }elseif($region_type == '1'){ ?>
                添加二级地区
            <?php  }elseif($region_type == '2'){ ?>
                添加三级地区
            <?php  }elseif($region_type == '3'){ ?>
                添加四级地区
            <?php }?>
            <input type="text" name="region_name" maxlength="150" size="40" />
            <input type="hidden" name="region_type" value="<?php echo $region_type;?>" />
            <input type="hidden" name="parent_id" value="<?php echo $parent_id;?>" />
            <input type="submit" value="确定" class="button" />
        </form>
    </div>
    
    <div class="list-div">
        <table cellspacing='1' cellpadding='3' id='listTable'>
            <tr>
                <th><?php echo $area_here;?></th>
            </tr>
        </table>
    </div>
    
    <div class="list-div" id="listDiv">
<?php }?>
        <table cellspacing='1' cellpadding='3' id='listTable'>
            <tr>
                <?php if(is_array($region_arr)):?><?php $index=0; ?><?php  foreach($region_arr as $area_name_key=>$list){ ?>
                    <?php if(($area_name_key > 1) and ($area_name_key)%3 == 0){?>
                        </tr><tr>
                    <?php }?>
                    <td class="first-cell" align="left">
                        <span onclick="listTable.edit(this, 'edit_area_name', '<?php echo $list['region_id'];?>'); return false;"><?php echo $list['region_name'];?></span>
                        <span class="link-span">
                            <?php if($region_type < 3){?>
                                <a href="<?php echo U('index');?>&act=list&type={$list.region_type+1}&pid=<?php echo $list['region_id'];?>" title="管理">
                                    管理
                                </a>&nbsp;&nbsp;
                            <?php }?>
                            <a href="javascript:listTable.remove(<?php echo $list['region_id'];?>, '如果订单或用户默认配送方式中使用以下地区，这些地区信息将显示为空。您确认要删除这条记录吗?', 'drop_area')" title="删除">
                                删除
                            </a>
                        </span>
                    </td>
                <?php $index++; ?><?php }?><?php endif;?>
            </tr>
        </table>
                
            
<?php if($full_page){?>
    </div>
<!-- end 添加货品 -->

<script type="text/javascript">

onload = function() {
    document.forms['theForm'].elements['region_name'].focus();
    // 开始检查订单
    //startCheckOrder();
}

/**
 * 新建区域
 */
function add_area()
{
    var region_name = Utils.trim(document.forms['theForm'].elements['region_name'].value);
    var region_type = Utils.trim(document.forms['theForm'].elements['region_type'].value);
    var parent_id   = Utils.trim(document.forms['theForm'].elements['parent_id'].value);

    if (region_name.length == 0)
    {
        alert(region_name_empty);
    }
    else
    {
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=add_area";
        Ajax.call(ajaxurl,
        'parent_id=' + parent_id + '&region_name=' + region_name + '&region_type=' + region_type,
        listTable.listCallback, 'POST', 'JSON');
    }

    return false;
}

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
<?php }?>