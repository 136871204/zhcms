<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
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

var process_request = "<?php echo L("admin_eccommon_js_process_request");?>";
var todolist_caption = "<?php echo L("admin_eccommon_js_todolist_caption");?>";
var todolist_autosave = "<?php echo L("admin_eccommon_js_todolist_autosave");?>";
var todolist_save = "<?php echo L("admin_eccommon_js_todolist_save");?>";
var todolist_clear = "<?php echo L("admin_eccommon_js_todolist_clear");?>";
var todolist_confirm_save = "<?php echo L("admin_eccommon_js_todolist_confirm_save");?>";
var setupConfirm = "<?php echo L("admin_ecflashplay_js_setupConfirm");?>";
//-->
</script>
<div class="tab-div">
    <!-- tab bar -->
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="custabbar-div">
    <p>
        <?php if(is_array($group_list)):?><?php $index=0; ?><?php  foreach($group_list as $group_key=>$group){ ?>
            <?php if($group_key == $current){?>
                <span class="custab-front" id="<?php echo $group_key;?>-tab"><?php echo $group['text'];?></span>
            <?php  }else{ ?>
                <span class="custab-back" id="<?php echo $group_key;?>-tab" onclick="javascript:location.href='<?php echo $group['url'];?>';"><?php echo $group['text'];?></span>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
    </p>
</div>
<script language="javascript">
  /**
   * 标签上鼠标移动事件的处理函数
   * @return
   */
  document.getElementById("custabbar-div").onmouseover = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.className == "custab-back")
    {
      obj.className = "custab-hover";
    }
  }
  
    document.getElementById("custabbar-div").onmouseout = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.className == "custab-hover")
    {
      obj.className = "custab-back";
    }
  }
</script>
    <!-- body -->
    <div class="tab-body">
        <div class="list-div list-div-ad" id="listDiv">
            <table cellspacing='1' cellpadding='3' id='list-table' width="70%">
                <tr>
                    <th width="400px"><?php echo L("admin_ecflashplay_flashplay_list_page_table_th1");?></th>
                    <th><?php echo L("admin_ecflashplay_flashplay_list_page_table_th2");?></th>
                    <th><?php echo L("admin_ecflashplay_flashplay_list_page_table_th3");?></th>
                    <th><?php echo L("admin_ecflashplay_flashplay_list_page_table_th4");?></th>
                    <th width="70px"><?php echo L("admin_ecflashplay_flashplay_list_page_table_th5");?></th>
                </tr>
                <?php if(is_array($playerdb)):?><?php $index=0; ?><?php  foreach($playerdb as $key=>$item){ ?>
                <tr>
                    <td><a href="<?php echo $item['src'];?>" target="_blank"><?php echo $item['src'];?></a></td>
                    <td align="left"><a href="<?php echo $item['url'];?>" target="_blank"><?php echo $item['url'];?></a></td>
                    <td align="left"><?php echo $item['text'];?></td>
                    <td align="left"><?php echo $item['sort'];?></td>
                    <td align="center">
                        <a href="<?php echo U('index',array('act'=>'edit','id'=>$key));?>" title="<?php echo $lang['edit'];?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" width="16" height="16" border="0" />
                        </a>
                        <a href="<?php echo U('index',array('act'=>'del','id'=>$key));?>" onclick="return check_del();" title="<?php echo $lang['trash_img'];?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" width="16" height="16" border="0" />
                        </a>
                    </td>
                </tr>
                <?php $index++; ?><?php }?><?php endif;?>
            </table>
            <table cellspacing="0">
                <tr>
                  <td>
                    <input name="add" type="submit" id="btnSubmit" value="<?php echo $action_link_special['text'];?>" onclick="location.href='<?php echo $action_link_special['href'];?>';" class="button"/>
                  </td>
                </tr>
            </table>
        </div>
        <div class="list-div list-div-ad" style="margin-top:15px;">
            <table  style="display: none;">
                <tr>
                    <th>可用Flash轮播图片样式</th>
                </tr>
                <tr>
                    <td>
                        <?php if(is_array($flashtpls)):?><?php $index=0; ?><?php  foreach($flashtpls as $flashtpl){ ?>
                        <table style="float:left;width: 220px;">
                            <tr>
                                <td>
                                    <strong>
                                        <center><?php echo $flashtpl['name'];?>&nbsp;
                                        <?php if($flashtpl['code'] == $current_flashtpl){?>
                                            <span style="color:red;" id="current_theme"><?php echo $lang['current_theme'];?></span>
                                        <?php }?>
                                        </center>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if($flashtpl['screenshot']){?>
                                        <img src="<?php echo $flashtpl['screenshot'];?>" border="0" style="cursor:pointer" onclick="setupFlashTpl('<?php echo $flashtpl['code'];?>', this)" />
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top"><?php echo $flashtpl['desc'];?></td>
                            </tr>
                        </table>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script language="JavaScript">
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