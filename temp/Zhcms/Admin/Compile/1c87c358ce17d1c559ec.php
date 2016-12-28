<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var process_request = "正在处理您的请求...";
    var todolist_caption = "记事本";
    var todolist_autosave = "自动保存";
    var todolist_save = "保存";
    var todolist_clear = "清除";
    var todolist_confirm_save = "是否将更改保存到记事本？";
    var todolist_confirm_clear = "是否清空内容？";
    var goods_name_not_null = "商品名称を入力してください。";
    var goods_cat_not_null = "商品カテゴリを選んでください。";
    var category_cat_not_null = "カテゴリ名を入力してください。";
    var brand_cat_not_null = "ブランド名を入力してください。";
    var goods_cat_not_leaf = "選んで商品カテゴリは一番下カテゴリではない，一番下階層のカテゴリ選んでください。";
    var shop_price_not_null = "店舗価額を入力してください。";
    var shop_price_not_number = "店舗価額数値ではない。";
    var select_please = "選択してください...";
    var button_add = "新規";
    var button_del = "削除";
    var spec_value_not_null = "スペックは空にはいけません";
    var spec_price_not_number = "価額は数値ではない";
    var market_price_not_number = "市場価額は数値ではない";
    var goods_number_not_int = "商品在庫は数値ではない";
    var warn_number_not_int = "在庫広告は数値ではない";
    var promote_not_lt = "促销開始時間は促销終わる日付より大きくしている";
    var promote_start_not_null = "促销開始時間は空にはいけません";
    var promote_end_not_null = "促销終わる時間は空にはいけません";
    var drop_img_confirm = "この画像を削除するか？";
    var batch_no_on_sale = "選んだ商品をを非公開するか？";
    var batch_trash_confirm = "選んだ商品を回収所に置くですか？";
    var go_category_page = "このページ閉じて，商品カテゴリ遷移してカテゴリ新規するか？";
    var go_brand_page = "このページ閉じて，商品ブランド遷移しブランド新規するか？";
    var volume_num_not_null = "優遇数を入力してください";
    var volume_num_not_number = "優遇数は数ではない";
    var volume_price_not_null = "優遇価額を入力してください";
    var volume_price_not_number = "優遇価額は数ではない";
    var cancel_color = "スタイルなし";
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/Static/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
    <!-- 添加货品 -->
    <div class="list-div" style="margin-bottom: 5px; margin-top: 10px;" id="listDiv">
<?php }?>
    <form method="post" action="<?php echo U('index');?>" name="addForm" id="addForm" >
        <input type="hidden" name="goods_id" value="<?php echo $goods_id;?>" />
        <input type="hidden" name="act" value="product_add_execute" />
        <table width="100%" cellpadding="3" cellspacing="1" id="table_list">
            <tr>
                <th colspan="20" scope="col"><?php echo $goods_name;?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $goods_sn;?></th>
            </tr>
            <tr>
                <!-- start for specifications -->
                <?php if(!empty($attribute)){?>
                    <?php if(is_array($attribute)):?><?php $index=0; ?><?php  foreach($attribute as $attribute_value){ ?>
                        <td scope="col"><div align="center"><strong><?php echo $attribute_value['attr_name'];?></strong></div></td>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <td scope="col">&nbsp;</td>
                <?php }?>
                <!-- end for specifications -->
                <td class="label_2">番号</td>
                <td class="label_2">在庫</td>
                <td class="label_2">&nbsp;</td>
            </tr>
            <?php if(is_array($product_list)):?><?php $index=0; ?><?php  foreach($product_list as $product){ ?>
            <tr>
                <?php if(is_array($product['goods_attr'])):?><?php $index=0; ?><?php  foreach($product['goods_attr'] as $goods_attr){ ?>
                <td scope="col"><div align="center"><?php echo $goods_attr;?></div></td>
                <?php $index++; ?><?php }?><?php endif;?>
                <td class="td_1">
                    <span onclick="listTable.edit(this, 'edit_product_sn', <?php echo $product['product_id'];?>)"><?php echo default_value($product['product_sn'],'N/A');?></span>
                </td>
                <td class="td_1">
                    <span onclick="listTable.edit(this, 'edit_product_number', <?php echo $product['product_id'];?>)"><?php echo $product['product_number'];?></span>
                </td>
                <td>
                    <input type="button" class="button" value=" - " onclick="listTable.remove(<?php echo $product['product_id'];?>, 'この品物削除するか？', 'product_remove')"/>
                </td>
            </tr>
            <?php $index++; ?><?php }?><?php endif;?>
            <tr id="attr_row">
            <!-- start for specifications_value -->
            <?php if(is_array($attribute)):?><?php $index=0; ?><?php  foreach($attribute as $attribute_key=>$attribute_value){ ?>
                <td align="center">
                    <select name="attr[<?php echo $attribute_value['attr_id'];?>][]">
                        <option value="" selected>選択して...</option>
                        <?php if(is_array($attribute_value['attr_values'])):?><?php $index=0; ?><?php  foreach($attribute_value['attr_values'] as $value){ ?>
                        <option value="<?php echo $value;?>"><?php echo $value;?></option>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </select>
                </td>
            <?php $index++; ?><?php }?><?php endif;?>
            <!-- end for specifications_value -->
                <td class="label_2"><input type="text" name="product_sn[]" value="" size="20"/></td>
                <td class="label_2"><input type="text" name="product_number[]" value="<?php echo $product_number;?>" size="10"/></td>
                <td><input type="button" class="button" value=" + " onclick="javascript:add_attr_product();"/></td>
            </tr>
            <tr>
                <td align="center" colspan="<?php echo $attribute_count_3;?>">
                    <input type="button" class="button" value="保存" onclick="checkgood_sn()" />
                </td>
            </tr>
        </table>
    </form>
<?php if($full_page){?>
</div>
<!-- end 添加货品 -->

<script type="text/javascript">
<?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
<?php $index++; ?><?php }?><?php endif;?>

listTable.query = 'product_query';
var _attr = new Array;



<?php if(is_array($attribute)):?><?php $index=0; ?><?php  foreach($attribute as $attribute_key=>$attribute_value){ ?>
_attr[<?php echo $attribute_key;?>] = '<?php echo $attribute_value['attr_id'];?>';
<?php $index++; ?><?php }?><?php endif;?>


/**
 * 追加货品添加表格
 */
function add_attr_product()
{
    var table_list = document.getElementById('table_list');
    var new_tr_id = rand_str('t');
    var attr_row, attr_col, new_row, new_col;
    var index = table_list.rows.length - 2; //此行号为输入框所在行
    
    //创建新行
    attr_row = document.getElementById('attr_row');
    attr_col = attr_row.getElementsByTagName('td');
    
    new_row = table_list.insertRow(index);//新增行
    new_row.setAttribute("id", new_tr_id);
    
    //创建新行的列
    for (var i = 0; i < attr_col.length; i++)
    {
        new_col = new_row.insertCell(-1);
        new_col.setAttribute("align", attr_col[i].getAttribute("align"));
        new_col.setAttribute("class", attr_col[i].getAttribute("class"));
        new_col.setAttribute("className", attr_col[i].getAttribute("className"));
        if (i + 1 == attr_col.length)
        {
            new_col.innerHTML = '<input type="button" class="button" value=" - " onclick="javascript:minus_attr_product(\'' + new_tr_id + '\');"/>';
        }
        else
        {
            new_col.innerHTML = attr_col[i].innerHTML;
        }
    }
    return true;
    
}

/**
 * 删除追加的货品表格
 */
function minus_attr_product(tr_number)
{
  if (tr_number.length > 0)
  {
    if (confirm("削除するか？") == false)
    {
      return false;
    }

    var table_list = document.getElementById('table_list');

    for (var i = 0; i < table_list.rows.length; i++)
    {
      if (table_list.rows[i].id == tr_number)
      {
        table_list.deleteRow(i);
      }
    }
  }

  return true;
}

function  checkgood_sn()
{
    var validator = new Validator('addForm');
    var volumePri = document.getElementsByName("product_sn[]");
    var check_sn='';
    for (i = 0 ; i < volumePri.length ; i ++)
    {
        if(volumePri.item(i).value == "")
        {
            
        }else
        {
            check_sn=check_sn+'||'+volumePri.item(i).value;
        }
    }
    var callback = function(res)
    {
        if (res.error > 0)
        {
            alert(res.message);
        }
        else
        {
            //alert('提交表单');
            document.forms['addForm'].submit();
        }
    }
    var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=check_products_goods_sn";
    Ajax.call(ajaxurl, "goods_sn=" + check_sn, callback, "GET", "JSON");
    
}
</script>
<?php }?>