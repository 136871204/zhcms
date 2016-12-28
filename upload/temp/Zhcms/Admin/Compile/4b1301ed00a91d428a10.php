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
var process_request = "<?php echo L("admin_eccategory_js_process_request");?>";
var todolist_caption = "<?php echo L("admin_eccategory_js_todolist_caption");?>";
var todolist_autosave = "<?php echo L("admin_eccategory_js_todolist_autosave");?>";
var todolist_save = "<?php echo L("admin_eccategory_js_todolist_save");?>";
var todolist_clear = "<?php echo L("admin_eccategory_js_todolist_clear");?>";
var todolist_confirm_save = "<?php echo L("admin_eccategory_js_todolist_confirm_save");?>";
var todolist_confirm_clear = "<?php echo L("admin_eccategory_js_todolist_confirm_clear");?>";
var catname_empty = "<?php echo L("admin_eccategory_js_catname_empty");?>分类名称不能为空!";
var unit_empyt = "<?php echo L("admin_eccategory_js_unit_empyt");?>";
var is_leafcat = "<?php echo L("admin_eccategory_js_is_leafcat");?>";
var not_leafcat = "<?php echo L("admin_eccategory_js_not_leafcat");?>";
var filter_attr_not_repeated = "<?php echo L("admin_eccategory_js_filter_attr_not_repeated");?>";
var filter_attr_not_selected = "<?php echo L("admin_eccategory_js_filter_attr_not_selected");?>";
//-->
</script>
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
        <table width="100%" id="general-table">
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title1");?></td>
                <td>
                    <input type='text' name='cat_name' maxlength="20" value='<?php echo $cat_info['cat_name'];?>' size='27' /> <font color="red">*</font>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title2");?></td>
                <td>
                    <select name="parent_id">
                        <option value="0"><?php echo L("admin_eccategory_category_info_page_form_title2_other1");?></option>
                        <?php echo $cat_select;?>
                    </select>
                </td>
            </tr>
            <tr id="measure_unit">
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title3");?></td>
                <td>
                    <input type="text" name='measure_unit' value='<?php echo $cat_info['measure_unit'];?>' size="12" />
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title4");?></td>
                <td>
                    <input type="text" name='sort_order' <?php if($cat_info['sort_order']){?> value='<?php echo $cat_info['sort_order'];?>' <?php  }else{ ?> value="50" <?php }?>  size="15" />
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title5");?></td>
                <td>
                    <input type="radio" name="is_show" value="1" <?php if($cat_info['is_show'] <> 0){?> checked="true" <?php }?>/> <?php echo L("admin_eccommon_yes");?>
                    <input type="radio" name="is_show" value="0" <?php if($cat_info['is_show'] == 0){?> checked="true" <?php }?> /> <?php echo L("admin_eccommon_no");?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title6");?></td>
                <td>
                    <input type="radio" name="show_in_nav" value="1" <?php if($cat_info['show_in_nav'] <> 0){?> checked="true" <?php }?>/> <?php echo L("admin_eccommon_yes");?>
                    <input type="radio" name="show_in_nav" value="0" <?php if($cat_info['show_in_nav'] == 0){?> checked="true" <?php }?> /> <?php echo L("admin_eccommon_no");?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title7");?></td>
                <td>
                    <input type="checkbox" name="cat_recommend[]" value="1" <?php if($cat_recommend[1] == 1){?> checked="true" <?php }?> /> <?php echo L("admin_eccategory_category_info_page_form_title7_other1");?>
                    <input type="checkbox" name="cat_recommend[]" value="2" <?php if($cat_recommend[2] == 1){?> checked="true" <?php }?>  /> <?php echo L("admin_eccategory_category_info_page_form_title7_other2");?>
                    <input type="checkbox" name="cat_recommend[]" value="3" <?php if($cat_recommend[3] == 1){?> checked="true" <?php }?>  /> <?php echo L("admin_eccategory_category_info_page_form_title7_other3");?>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeFilterAttr');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt=""/>
                    </a>
                    <?php echo L("admin_eccategory_category_info_page_form_title8");?>
                </td>
                <td>
                <script type="text/javascript">
                        var arr = new Array();
                        var sel_filter_attr = "<?php echo L("admin_eccategory_category_info_page_form_title8_other1");?>";
                        <?php if(is_array($attr_list)):?><?php $index=0; ?><?php  foreach($attr_list as $att_cat_id=>$val){ ?>
                            arr[<?php echo $att_cat_id;?>] = new Array();
                            <?php if(is_array($val)):?><?php $index=0; ?><?php  foreach($val as $i=>$item){ ?>
                                <?php if(is_array($item)):?><?php $index=0; ?><?php  foreach($item as $attr_id=>$attr_val){ ?>
                                    arr[<?php echo $att_cat_id;?>][<?php echo $i;?>] = ["<?php echo $attr_val;?>", <?php echo $attr_id;?>];
                                <?php $index++; ?><?php }?><?php endif;?>
                            <?php $index++; ?><?php }?><?php endif;?>
                        <?php $index++; ?><?php }?><?php endif;?>
                        
                        function changeCat(obj)
                      {
                        var key = obj.value;
                        var sel = window.ActiveXObject ? obj.parentNode.childNodes[4] : obj.parentNode.childNodes[5];
                        sel.length = 0;
                        sel.options[0] = new Option(sel_filter_attr, 0);
                        if (arr[key] == undefined)
                        {
                          return;
                        }
                        for (var i= 0; i < arr[key].length ;i++ )
                        {
                          sel.options[i+1] = new Option(arr[key][i][0], arr[key][i][1]);
                        }
            
                      }
                    </script>
                    <table width="100%" id="tbody-attr" align="center">
                        <?php if($attr_cat_id == 0){?>
                        <tr>
                            <td> 
                                <a href="javascript:;" onclick="addFilterAttr(this)">[+]</a> 
                                <select onChange="changeCat(this)">
                                    <option value="0"><?php echo L("admin_eccategory_category_info_page_form_title8_other2");?></option>
                                    <?php echo $goods_type_list;?>
                                </select>&nbsp;&nbsp;
                                <select name="filter_attr[]">
                                    <option value="0"><?php echo L("admin_eccategory_category_info_page_form_title8_other1");?></option>
                                </select>
                            </td>
                        </tr>
                        <?php }?>
                        <?php if(is_array($filter_attr_list)):?><?php $index=0; ?><?php  foreach($filter_attr_list as $filter_attr_tab_i=>$filter_attr){ ?>
                        <tr>
                            <td>
                                <?php if($filter_attr_tab_i == 0){?>
                                    <a href="javascript:;" onclick="addFilterAttr(this)">[+]</a>
                                <?php  }else{ ?>
                                    <a href="javascript:;" onclick="removeFilterAttr(this)">[-]&nbsp;</a>
                                <?php }?>
                                <select onChange="changeCat(this)">
                                    <option value="0"><?php echo L("admin_eccategory_category_info_page_form_title8_other2");?></option>
                                    <?php echo $filter_attr['goods_type_list'];?>
                                </select>&nbsp;&nbsp;
                                <select name="filter_attr[]">
                                    <option value="0"><?php echo L("admin_eccategory_category_info_page_form_title8_other1");?></option>
                                    <?php if(isset($filter_attr['option']) && !empty($filter_attr['option'])):$arr["options"]=$filter_attr['option'];$arr["selected"]=$filter_attr['filter_attr'];echo html_options($arr);endif;
?>
                                </select>
                                <br />
                            </td>
                        </tr>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </table>
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeFilterAttr">
                        <?php echo L("admin_eccategory_category_info_page_form_title8_other3");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGrade');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" />
                    </a><?php echo L("admin_eccategory_category_info_page_form_title9");?>
                </td>
                <td>
                    <input type="text" name="grade" value="<?php echo _default($cat_info['grade'],0);?>" size="40" /> <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGrade">
                    <?php echo L("admin_eccategory_category_info_page_form_title9_other1");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGoodsSN');" title="点击此处查看提示信息">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0"/>
                    </a><?php echo L("admin_eccategory_category_info_page_form_title10");?>
                </td>
                <td>
                    <input type="text" name="style" value="<?php echo $cat_info['style'];?>" size="40" /> <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsSN">
                        <?php echo L("admin_eccategory_category_info_page_form_title10_other1");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title11");?></td>
                <td>
                    <input type="text" name="keywords" value='<?php echo $cat_info['keywords'];?>' size="50"/>
                </td>
            </tr>
            
            <tr>
                <td class="label"><?php echo L("admin_eccategory_category_info_page_form_title12");?></td>
                <td>
                    <textarea name='cat_desc' rows="6" cols="48"><?php echo $cat_info['cat_desc'];?></textarea>
                </td>
            </tr>
        </table>
        <div class="button-div">
            <input type="submit" value="<?php echo L("admin_eccategory_category_info_page_form_title13");?>" />
            <input type="reset" value="<?php echo L("admin_eccategory_category_info_page_form_title14");?>" />
        </div>
        <input type="hidden" name="act" value="<?php echo $form_act;?>" />
        <input type="hidden" name="old_cat_name" value="<?php echo $cat_info['cat_name'];?>" />
        <input type="hidden" name="cat_id" value="<?php echo $cat_info['cat_id'];?>" />
    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">

document.forms['theForm'].elements['cat_name'].focus();
/**
 * 检查表单输入的数据
 */
function validate()
{
  validator = new Validator("theForm");
  validator.required("cat_name",      catname_empty);
  if (
        parseInt(document.forms['theForm'].elements['grade'].value) >10 || 
        parseInt(document.forms['theForm'].elements['grade'].value) < 0)
  {
    validator.addErrorMsg('<?php echo L("admin_eccategory_category_info_page_js1");?>');
  }
  return validator.passed();
}


/**
 * 新增一个筛选属性
 */
function addFilterAttr(obj)
{
  var src = obj.parentNode.parentNode;
  var tbl = document.getElementById('tbody-attr');

  var validator  = new Validator('theForm');
  var filterAttr = document.getElementsByName("filter_attr[]");

  if (filterAttr[filterAttr.length-1].selectedIndex == 0)
  {
    validator.addErrorMsg(filter_attr_not_selected);
  }
  
  for (i = 0; i < filterAttr.length; i++)
  {
    for (j = i + 1; j <filterAttr.length; j++)
    {
      if (filterAttr.item(i).value == filterAttr.item(j).value)
      {
        validator.addErrorMsg(filter_attr_not_repeated);
      } 
    } 
  }

  if (!validator.passed())
  {
    return false;
  }

  var row  = tbl.insertRow(tbl.rows.length);
  var cell = row.insertCell(-1);
  cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addFilterAttr)(.*)(\[)(\+)/i, "$1removeFilterAttr$3$4-");
  filterAttr[filterAttr.length-1].selectedIndex = 0;
}

/**
 * 删除一个筛选属性
 */
function removeFilterAttr(obj)
{
  var row = rowindex(obj.parentNode.parentNode);
  var tbl = document.getElementById('tbody-attr');

  tbl.deleteRow(row);
}

</script>



