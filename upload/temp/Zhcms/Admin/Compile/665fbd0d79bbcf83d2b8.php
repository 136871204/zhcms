<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
var todolist_confirm_clear = "<?php echo L("admin_eccommon_js_todolist_confirm_clear");?>";
var name_not_null = "<?php echo L("admin_ecattribute_js_name_not_null");?>";
var values_not_null = "<?php echo L("admin_ecattribute_js_values_not_null");?>";
var cat_id_not_null = "<?php echo L("admin_ecattribute_js_cat_id_not_null");?>";
//-->
</script>
<div class="main-div">
    <form  action="<?php echo U('index');?>" method="post" name="theForm" onsubmit="return validate();">
        <table width="100%" id="general-table">
            <tr>
                <td class="label"><?php echo L("admin_ecattribute_info_page_table_th4");?>：</td>
                <td>
                    <input type='text' name='attr_name' value="<?php echo $attr['attr_name'];?>" size='30' />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecattribute_info_page_table_th12");?>：</td>
                <td>
                  <select name="cat_id" onchange="onChangeGoodsType(this.value)">
                  <option value="0"><?php echo L("admin_ecattribute_info_page_table_th13");?></option>
                    <?php echo $goods_type_list;?>
                  </select> <span class="require-field">*</span> 
                </td>
            </tr>
            <tr id="attrGroups"  style="display:none">
                <td class="label"><?php echo L("admin_ecattribute_info_page_table_th14");?>：</td>
                <td>
                  <select name="attr_group">
                  <?php if($attr_groups){?>
                  <?php if(isset($attr_groups) && !empty($attr_groups)):$arr["options"]=$attr_groups;$arr["selected"]=$attr['attr_group'];echo html_options($arr);endif;
?>
                  <?php }?>
                  </select>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeindex');" title="<?php echo L("admin_ecattribute_info_page_table_th15");?>">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecattribute_info_page_table_th15");?>"/>
                    </a><?php echo L("admin_ecattribute_info_page_table_th16");?>：
                </td>
                <td>
                    <input type="radio" name="attr_index" value="0" <?php if($attr['attr_index'] == 0){?> checked="true" <?php }?>  />
                    <?php echo L("admin_ecattribute_info_page_table_th17");?>
                    <input type="radio" name="attr_index" value="1" <?php if($attr['attr_index'] == 1){?> checked="true" <?php }?>/>
                    <?php echo L("admin_ecattribute_info_page_table_th18");?>
                    <input type="radio" name="attr_index" value="2"  <?php if($attr['attr_index'] == 2){?> checked="true" <?php }?>/>
                    <?php echo L("admin_ecattribute_info_page_table_th19");?> 
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeindex">
                    <?php echo L("admin_ecattribute_info_page_table_th20");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecattribute_info_page_table_th21");?></td>
                <td>
                    <input type="radio" name="is_linked" value="0" <?php if($attr['is_linked'] == 0){?> checked="true" <?php }?> /> <?php echo L("admin_ecattribute_info_page_table_th22");?> 
                    <input type="radio" name="is_linked" value="1" <?php if($attr['is_linked'] == 1){?> checked="true" <?php }?> /> <?php echo L("admin_ecattribute_info_page_table_th23");?> 
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeAttrType');" title="<?php echo L("admin_ecattribute_info_page_table_th15");?>">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecattribute_info_page_table_th15");?>"/>
                    </a>
                    <?php echo L("admin_ecattribute_info_page_table_th24");?>
                </td>
                <td>
                    <input type="radio" name="attr_type" value="0" <?php if($attr['attr_type'] == 0){?> checked="true" <?php }?>  />
                    <?php echo L("admin_ecattribute_info_page_table_th25");?> 
                    <input type="radio" name="attr_type" value="1" <?php if($attr['attr_type'] == 1){?> checked="true" <?php }?>  />
                    <?php echo L("admin_ecattribute_info_page_table_th26");?>
                    <input type="radio" name="attr_type" value="2" <?php if($attr['attr_type'] == 2){?> checked="true" <?php }?>  />
                    <?php echo L("admin_ecattribute_info_page_table_th27");?>
                    <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeAttrType">
                        <?php echo L("admin_ecattribute_info_page_table_th28");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecattribute_info_page_table_th29");?>：</td>
                <td>
                    <input type="radio" name="attr_input_type" value="0" <?php if($attr['attr_input_type'] == 0){?> checked="true" <?php }?>  onclick="radioClicked(0)"/>
                    <?php echo L("admin_ecattribute_info_page_table_th30");?> 
                    <input type="radio" name="attr_input_type" value="1" <?php if($attr['attr_input_type'] == 1){?> checked="true" <?php }?>  onclick="radioClicked(1)"/>
                    <?php echo L("admin_ecattribute_info_page_table_th31");?>
                    <input type="radio" name="attr_input_type" value="2" <?php if($attr['attr_input_type'] == 2){?> checked="true" <?php }?>  onclick="radioClicked(0)"/>
                    <?php echo L("admin_ecattribute_info_page_table_th32");?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecattribute_info_page_table_th7");?>：</td>
                <td>
                <textarea name="attr_values" cols="30" rows="5"><?php echo $attr['attr_values'];?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="button-div">
                        <input type="submit" value="<?php echo L("admin_ecattribute_info_page_table_btn2");?>" class="button"/>
                        <input type="reset" value="<?php echo L("admin_ecattribute_info_page_table_btn3");?>" class="button" />
                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" name="act" value="<?php echo $form_act;?>" />
        <input type="hidden" name="attr_id" value="<?php echo $attr['attr_id'];?>" />
    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">


onload = function()
{
    radioClicked(<?php echo $attr['attr_input_type'];?>);
    onChangeGoodsType(<?php echo $attr['cat_id'];?>);
}

/**
 * 检查表单输入的数据
 */
function validate()
{
  var ele = document.forms['theForm'].elements;
  var msg = '';

  if (Utils.trim(ele['attr_name'].value) == '')
  {
    msg += name_not_null + '\n';
  }

  if (ele['cat_id'].value == 0)
  {
    msg += cat_id_not_null + '\n';
  }

  if (ele['attr_input_type'][1].checked && Utils.trim(ele['attr_values'].value) == '')
  {
    msg += values_not_null + '\n';
  }

  if (msg.length > 0)
  {
    alert(msg);
    return false;
  }
  else
  {
    return true;
  }
}

/**
 * 点击类型按钮时切换选项的禁用状态
 */
function radioClicked(n)
{
  document.forms['theForm'].elements["attr_values"].disabled = n > 0 ? false : true;
}

/**
 * 改变商品类型的处理函数
 */
function onChangeGoodsType(catId)
{
    var ajaxurl=CONTROL +"&is_ajax=1&act=get_attr_groups&cat_id="+catId;
  Ajax.call(ajaxurl, '', changeGoodsTypeResponse, 'GET', 'JSON');
}

function changeGoodsTypeResponse(res)
{
  if (res.error == 0)
  {
    var row = document.getElementById('attrGroups');
    if (res.content.length == 0) {
      row.style.display = 'none';
    } else {
      row.style.display = document.all ? 'block' : 'table-row';

      var sel = document.forms['theForm'].elements['attr_group'];

      sel.length = 0;

      for (var i = 0; i < res.content.length; i++)
      {
        var opt = document.createElement('OPTION');
        opt.value = i;
        opt.text = res.content[i];
        sel.options.add(opt);
        if (i == '<?php echo $attr['attr_group'];?>')
        {
          opt.selected=true;
        }
      }
    }
  }

  if (res.message)
  {
    alert(res.message);
  }
}



//-->  
</script>



