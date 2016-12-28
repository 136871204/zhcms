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
var process_request = "処理中...";
var todolist_caption = "ノート";
var todolist_autosave = "自動保存";
var todolist_save = "保存";
var todolist_clear = "クリア";
var todolist_confirm_save = "ノートに最新情報保存するか？";
var todolist_confirm_clear = "内容をクリアしますか？";
var catname_empty = "カテゴリ名称は日必須!分类名称不能为空!";
var unit_empyt = "数簡易は入力してください!";
var is_leafcat = "選らんだカテゴリは一番下級カテゴリ。\r\n新カテゴリの上階級は一番下級カテゴリになってはできません";
var not_leafcat = "選らんだカテゴリは一番下級カテゴリではない。\r\n商品のカテゴリ移行は一番下級カテゴリしか使えません。";
var filter_attr_not_repeated = "属性は重複できません";
var filter_attr_not_selected = "属性を選択してください";
//-->
</script>
<div class="main-div">
    <form method="post" action="<?php echo U('index');?>" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
        <table width="100%" id="general-table">
            <tr>
                <td class="label">カテゴリ名称:</td>
                <td>
                    <input type='text' name='cat_name' maxlength="20" value='<?php echo $cat_info['cat_name'];?>' size='27' /> <font color="red">*</font>
                </td>
            </tr>
            <tr>
                <td class="label">上級カテゴリ:</td>
                <td>
                    <select name="parent_id">
                        <option value="0">トップカテゴリ</option>
                        <?php echo $cat_select;?>
                    </select>
                </td>
            </tr>
            <tr id="measure_unit">
                <td class="label">数単位:</td>
                <td>
                    <input type="text" name='measure_unit' value='<?php echo $cat_info['measure_unit'];?>' size="12" />
                </td>
            </tr>
            <tr>
                <td class="label">ソート:</td>
                <td>
                    <input type="text" name='sort_order' <?php if($cat_info['sort_order']){?> value='<?php echo $cat_info['sort_order'];?>' <?php  }else{ ?> value="50" <?php }?>  size="15" />
                </td>
            </tr>
            <tr>
                <td class="label">表示:</td>
                <td>
                    <input type="radio" name="is_show" value="1" <?php if($cat_info['is_show'] <> 0){?> checked="true" <?php }?>/> YES
                    <input type="radio" name="is_show" value="0" <?php if($cat_info['is_show'] == 0){?> checked="true" <?php }?> /> NO
                </td>
            </tr>
            <tr>
                <td class="label">ナビで表示:</td>
                <td>
                    <input type="radio" name="show_in_nav" value="1" <?php if($cat_info['show_in_nav'] <> 0){?> checked="true" <?php }?>/> YES
                    <input type="radio" name="show_in_nav" value="0" <?php if($cat_info['show_in_nav'] == 0){?> checked="true" <?php }?> /> NO
                </td>
            </tr>
            <tr>
                <td class="label">トップ進め設置:</td>
                <td>
                    <input type="checkbox" name="cat_recommend[]" value="1" <?php if($cat_recommend[1] == 1){?> checked="true" <?php }?> /> best
                    <input type="checkbox" name="cat_recommend[]" value="2" <?php if($cat_recommend[2] == 1){?> checked="true" <?php }?>  /> new
                    <input type="checkbox" name="cat_recommend[]" value="3" <?php if($cat_recommend[3] == 1){?> checked="true" <?php }?>  /> hot
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeFilterAttr');" title="クリックして、ヒントを見る">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt=""/>
                    </a>
                    属性選択: 
                </td>
                <td>
                <script type="text/javascript">
                        var arr = new Array();
                        var sel_filter_attr = "属性選択してください";
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
                                    <option value="0">商品タイプ選択してください</option>
                                    <?php echo $goods_type_list;?>
                                </select>&nbsp;&nbsp;
                                <select name="filter_attr[]">
                                    <option value="0">属性選択してください</option>
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
                                    <option value="0">商品タイプ選択してください</option>
                                    <?php echo $filter_attr['goods_type_list'];?>
                                </select>&nbsp;&nbsp;
                                <select name="filter_attr[]">
                                    <option value="0">属性選択してください</option>
                                    <?php if(isset($filter_attr['option']) && !empty($filter_attr['option'])):$arr["options"]=$filter_attr['option'];$arr["selected"]=$filter_attr['filter_attr'];echo html_options($arr);endif;
?>
                                </select>
                                <br />
                            </td>
                        </tr>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </table>
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeFilterAttr">
                        属性設置すると、カテゴリ画面では検索リンクとして表示する
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGrade');" title="クリックして、ヒントを見る">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" />
                    </a>価額区間数:  
                </td>
                <td>
                    <input type="text" name="grade" value="<?php echo _default($cat_info['grade'],0);?>" size="40" /> <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGrade">
                    回答カテゴリ画面の商品の一番高い～一番低い値段のうちに自動的に値段を分けて、検索条件として表示する，0は表示階級なし，10を超えないこと。      
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGoodsSN');" title="クリックして、ヒントを見る">
                        <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0"/>
                    </a>カテゴリ画面表示cssファイル:  
                </td>
                <td>
                    <input type="text" name="style" value="<?php echo $cat_info['style'];?>" size="40" /> <br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsSN">
                         商品カテゴリごとに画面表示css違うことが可能。例：フォルダ themes 下なら：themes/style.cssを入力して 
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label">キーワード:</td>
                <td>
                    <input type="text" name="keywords" value='<?php echo $cat_info['keywords'];?>' size="50"/>
                </td>
            </tr>
            
            <tr>
                <td class="label">カテゴリ紹介:</td>
                <td>
                    <textarea name='cat_desc' rows="6" cols="48"><?php echo $cat_info['cat_desc'];?></textarea>
                </td>
            </tr>
        </table>
        <div class="button-div">
            <input type="submit" value="確定" />
            <input type="reset" value="リーセット" />
        </div>
        <input type="hidden" name="act" value="<?php echo $form_act;?>" />
        <input type="hidden" name="old_cat_name" value="<?php echo $cat_info['cat_name'];?>" />
        <input type="hidden" name="cat_id" value="<?php echo $cat_info['cat_id'];?>" />
    </form>
</div>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
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
    validator.addErrorMsg('カテゴリ価額階層数は0-10ないにしてください');
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



