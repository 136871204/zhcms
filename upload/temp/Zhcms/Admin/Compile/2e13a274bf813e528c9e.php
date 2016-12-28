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
var posit_name_empty = "广告位名称不能为空!";
var ad_width_empty = "请输入广告位的宽度!";
var ad_height_empty = "请输入广告位的高度!";
var ad_width_number = "广告位的宽度必须是一个数字!";
var ad_height_number = "广告位的高度必须是一个数字!";
var no_outside_address = "建议您指定该广告所要投放的站点的名称，方便于该广告的来源统计!";
var width_value = "广告位的宽度值必须在1到1024之间!";
var height_value = "广告位的高度值必须在1到1024之间!";
var ad_name_empty = "请输入广告名称!";
var ad_link_empty = "请输入广告的链接URL!";
var ad_text_empty = "广告的内容不能为空!";
var ad_photo_empty = "广告的图片不能为空!";
var ad_flash_empty = "广告的flash不能为空!";
var ad_code_empty = "广告的代码不能为空!";
var empty_position_style = "广告位的模版不能为空!";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
        
<div class="main-div">
    <form action="<?php echo U('index');?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
        <table width="100%" id="general-table">
            <tr>
                <td  class="label">
                    <a href="javascript:showNotice('NameNotic');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                    </a>
                    广告名称
                </td>
                <td>
                    <input type="text" name="ad_name" value="<?php echo $ads['ad_name'];?>" size="35" />
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="NameNotic">
                        广告名称只是作为辨别多个广告条目之用，并不显示在广告中
                    </span>
                </td>
            </tr>
            <?php if($action == 'add'){?>
            <tr>
                <td class="label">媒介类型</td>
                <td>
                    <select name="media_type" onchange="showMedia(this.value)">
                        <option value='0'>图片</option>
                        <option value='1'>Flash</option>
                        <option value='2'>代码</option>
                        <option value='3'>文字</option>
                    </select>
                </td>
            </tr>
            <?php  }else{ ?>
            <input type="hidden" name="media_type" value="<?php echo $ads['media_type'];?>" />
            <?php }?>
            <tr>
                <td  class="label">广告位置</td>
                <td>
                    <select name="position_id">
                        <option value='0'>站外广告</option>
                        <?php if(isset($position_list) && !empty($position_list)):$arr["options"]=$position_list;$arr["selected"]=$ads['position_id'];echo html_options($arr);endif;
?>
                    </select>
                </td>
            </tr>
            <tr>
                <td  class="label">开始日期</td>
                <td>
                    <input name="start_time" type="text" id="start_time" size="22" value='<?php echo $ads['start_time'];?>' readonly="readonly" />
                    <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"/>
                </td>
            </tr>
            <tr>
                <td class="label">结束日期</td>
                <td>
                    <input name="end_time" type="text" id="end_time" size="22" value='<?php echo $ads['end_time'];?>' readonly="readonly" />
                    <input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('end_time', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button"/>
                </td>
            </tr>
            <?php if($ads['media_type'] == 0 or $action == 'add'){?>
                <tbody id="0">
                    <tr>
                      <td  class="label">广告链接</td>
                      <td>
                        <input type="text" name="ad_link" value="<?php echo $ads['ad_link'];?>" size="35" />
                      </td>
                    </tr>
                    <tr>
                        <td  class="label">
                            <a href="javascript:showNotice('AdCodeImg');" title="点击此处查看提示信息">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                            </a>上传广告图片
                        </td>
                        <td>
                            <input type='file' name='ad_img' size='35' />
                            <?php if($img_src){?>
                                <a href="<?php echo $img_src;?>" target="_blank">
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" border="0" />
                                </a>
                            <?php  }else{ ?>
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" />
                            <?php }?>
                            <br />
                            <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="AdCodeImg">
                                上传该广告的图片文件,或者你也可以指定一个远程URL地址为广告的图片
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td  class="label">或图片网址</td>
                        <td><input type="text" name="img_url" value="<?php echo $url_src;?>" size="35" /></td>
                    </tr>
                </tbody>
            <?php }?>
            <?php if($ads['media_type'] == 1 or $action == 'add'){?>
                <?php if($ads['media_type'] <> 1 OR $action == 'add'){?>
                <tbody id="1" style="display:none">
                <?php  }else{ ?>
                <tbody id="1" >
                <?php }?>
                    <tr>
                        <td  class="label">
                            <a href="javascript:showNotice('AdCodeFlash');" title="点击此处查看提示信息">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                            </a>上传Flash文件
                        </td>
                        <td>
                            <input type='file' name='upfile_flash' size='35' />
                            <?php if($flash_src){?>
                                <a href="<?php echo $flash_src;?>" target="_blank">
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" border="0" />
                                </a>
                            <?php  }else{ ?>
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" />
                            <?php }?>
                            <br />
                            <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="AdCodeFlash">
                                上传该广告的Flash文件,或者你也可以指定一个远程的Flash文件
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">或Flash网址</td>
                        <td>
                            <input type="text" name="flash_url" value="<?php echo $flash_url;?>" size="35" />
                        </td>
                    </tr>
                </tbody>
            <?php }?>
            <?php if($ads['media_type'] == 2 or $action == 'add'){?>
            <tbody id="2" style="<?php if($ads['media_type'] <> 2 OR $action == 'add'){?>display:none<?php }?>">
                <tr>
                    <td  class="label">输入广告代码</td>
                    <td><textarea name="ad_code" cols="50" rows="7"><?php echo $ads['ad_code'];?></textarea></td>
                </tr>
            </tbody>
            <?php }?>
            <?php if($ads['media_type'] == 3 or $action == 'add'){?>
            <tbody id="3" style="<?php if($ads['media_type'] <> 3 OR $action == 'add'){?>display:none<?php }?>">
                <tr>
                    <td  class="label">广告链接</td>
                    <td>
                        <input type="text" name="ad_link2" value="<?php echo $ads['ad_link'];?>" size="35" />
                    </td>
                </tr>
                <tr>
                    <td  class="label">广告内容</td>
                    <td><textarea name="ad_text" cols="40" rows="3"><?php echo $ads['ad_code'];?></textarea></td>
                </tr>
            </tbody>
            <?php }?>
            <tr>
                <td  class="label">是否开启</td>
                <td>
                    <input type="radio" name="enabled" value="1" <?php if($ads['enabled'] == 1){?> checked="true" <?php }?> />开启
                    <input type="radio" name="enabled" value="0" <?php if($ads['enabled'] == 0){?> checked="true" <?php }?> />关闭
                </td>
            </tr>
            <tr>
                <td  class="label">广告联系人</td>
                <td>
                    <input type="text" name="link_man" value="<?php echo $ads['link_man'];?>" size="35" />
                </td>
            </tr>
            <tr>
                <td  class="label">联系人Email 	</td>
                <td>
                <input type="text" name="link_email" value="<?php echo $ads['link_email'];?>" size="35" />
                </td>
            </tr>
            <tr>
                <td  class="label">联系电话</td>
                <td>
                <input type="text" name="link_phone" value="<?php echo $ads['link_phone'];?>" size="35" />
                </td>
            </tr>
            <tr>
                <td class="label">&nbsp;</td>
                <td>
                    <input type="submit" value="确定" class="button" />
                    <input type="reset" value="重置" class="button" />
                    <input type="hidden" name="act" value="<?php echo $form_act;?>" />
                    <input type="hidden" name="id" value="<?php echo $ads['ad_id'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">

document.forms['theForm'].elements['ad_name'].focus();

var MediaList = new Array('0', '1', '2', '3');

function showMedia(AdMediaType)
{
    for (I = 0; I < MediaList.length; I ++)
    {
        if (MediaList[I] == AdMediaType)
            document.getElementById(AdMediaType).style.display = "";
        else
            document.getElementById(MediaList[I]).style.display = "none";
    }
}

/**
* 检查表单输入的数据
*/
function validate()
{
    validator = new Validator("theForm");
    validator.required("ad_name",     ad_name_empty);
    return validator.passed();
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

