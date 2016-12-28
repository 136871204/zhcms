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
var no_packname = "没有输入包装名";
var packfee_un_num = "包装费用为空或不是数字";
var packmoney_un_num = "包装免费额度为空或不是数字";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/region.js"></script>

<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">办事处名称：</td>
                <td>
                    <input type="text" name="agency_name" maxlength="60" value="<?php echo $agency['agency_name'];?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">办事处描述：</td>
                <td><textarea  name="agency_desc" cols="60" rows="4"  ><?php echo $agency['agency_desc'];?></textarea></td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeAdmins');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo $lang['form_notice'];?>"/>
                    </a>
                    负责该办事处的管理员：
                </td>
                <td>
                    <?php if(is_array($agency['admin_list'])):?><?php $index=0; ?><?php  foreach($agency['admin_list'] as $admin){ ?>
                        <input type="checkbox" name="admins[]" value="<?php echo $admin['uid'];?>" <?php if($admin['type'] == 'this'){?>checked="checked"<?php }?> />
                        <?php echo $admin['username'];?><?php if($admin['type'] == 'other'){?>(*)<?php }?>&nbsp;&nbsp;
                    <?php $index++; ?><?php }?><?php endif;?>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeAdmins">
                        用星号(*)标注的管理员表示已经负责其他的办事处了
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">该办事处管辖的地区：</td>
                <td id="regionCell">
                    <?php if(is_array($agency['region_list'])):?><?php $index=0; ?><?php  foreach($agency['region_list'] as $region){ ?>
                        <input type="checkbox" name="regions[]" value="<?php echo $region['region_id'];?>" checked="true" />
                        <?php echo $region['region_name'];?>&nbsp;&nbsp;
                    <?php $index++; ?><?php }?><?php endif;?>
                </td>
            </tr>
        </table>
        <hr/>
        <table cellspacing="1" cellpadding="3" width="100%">
            <caption><strong>从下面的列表中选择地区，点加号按钮添加到该办事处管辖的地区</strong></caption>
            <tr>
                <td width="10%">&nbsp;</td>
                <td>一级地区：</td>
                <td>二级地区：</td>
                <td>三级地区：</td>
                <td>四级地区：</td>
                <td width="10">&nbsp;</td>
                <td width="10%">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <select name="country" id="selCountries" onChange="region.changed(this, 1, 'selProvinces')" size="10">
                        <?php if(is_array($countries)):?><?php $index=0; ?><?php  foreach($countries as $fe_country=>$country){ ?>
                        <option value="<?php echo $country['region_id'];?>" <?php if($fe_country == 0){?>selected<?php }?>>
                        <?php echo $country['region_name'];?>
                        </option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                </td>
                <td>
                    <select name="province" id="selProvinces" onChange="region.changed(this, 2, 'selCities')" size="10">
                        <option value="">请选择...</option>
                    </select>
                </td>
                <td>
                    <select name="city" id="selCities" onChange="region.changed(this, 3, 'selDistricts')" size="10">
                        <option value="">请选择...</option>
                    </select>
                </td>
                <td>
                    <select name="district" id="selDistricts" size="10">
                        <option value="">请选择...</option>
                    </select>
                </td>
                <td><input type="button" value="+" class="button" onclick="addRegion()" /></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="button" value="确定" />
                    <input type="reset" class="button" value="重置" />
                    <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                    <input type="hidden" name="id" value="<?php echo $agency['agency_id'];?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">
    region.isAdmin = true;
    document.forms['theForm'].elements['agency_name'].focus();
    onload = function()
    {
        var selCountry = document.forms['theForm'].elements['country'];
        if (selCountry.selectedIndex >= 0)
        {
            region.loadProvinces(selCountry.options[selCountry.selectedIndex].value);
        }
        // 开始检查订单
        //startCheckOrder();
    }
    
    /**
     * 检查表单输入的数据
     */
    function validate()
    {
        validator = new Validator("theForm");
        validator.required("agency_name",  no_agencyname);
        return validator.passed();
    }

    /**
     * 添加一个区域
     */
    function addRegion()
    {
        var selCountry  = document.forms['theForm'].elements['country'];
        var selProvince = document.forms['theForm'].elements['province'];
        var selCity     = document.forms['theForm'].elements['city'];
        var selDistrict = document.forms['theForm'].elements['district'];
        var regionCell  = document.getElementById("regionCell");
        
        if (selDistrict.selectedIndex > 0)
        {
            regionId = selDistrict.options[selDistrict.selectedIndex].value;
            regionName = selDistrict.options[selDistrict.selectedIndex].text;
        }
        else
        {
            if (selCity.selectedIndex > 0)
            {
                regionId = selCity.options[selCity.selectedIndex].value;
                regionName = selCity.options[selCity.selectedIndex].text;
            }
            else
            {
                if (selProvince.selectedIndex > 0)
                {
                    regionId = selProvince.options[selProvince.selectedIndex].value;
                    regionName = selProvince.options[selProvince.selectedIndex].text;
                }
                else
                {
                    if (selCountry.selectedIndex >= 0)
                    {
                        regionId = selCountry.options[selCountry.selectedIndex].value;
                        regionName = selCountry.options[selCountry.selectedIndex].text;
                    }
                    else
                    {
                        return;
                    }
                }
            }
            
        }
        
        // 检查该地区是否已经存在
        exists = false;
        for (i = 0; i < document.forms['theForm'].elements.length; i++)
        {
            if (document.forms['theForm'].elements[i].type=="checkbox" && 
                document.forms['theForm'].elements[i].name.substr(0, 6) == 'region')
            {
                if (document.forms['theForm'].elements[i].value == regionId)
                {
                    exists = true;
                    alert(region_exists);
                    break;
                }
            }
        }
        
        // 创建checkbox
        if (!exists)
        {
            regionCell.innerHTML += "<input type='checkbox' name='regions[]' value='" + regionId + "' checked='true' /> " + regionName + "&nbsp;&nbsp;";
        }
        
        
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


