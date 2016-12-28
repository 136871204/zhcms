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
var goods_name_not_null = "<?php echo L("admin_ecgoods_js_goods_name_not_null");?>";
var goods_cat_not_null = "<?php echo L("admin_ecgoods_js_goods_cat_not_null");?>";
var category_cat_not_null = "<?php echo L("admin_ecgoods_js_category_cat_not_null");?>";
var brand_cat_not_null = "<?php echo L("admin_ecgoods_js_brand_cat_not_null");?>";
var goods_cat_not_leaf = "<?php echo L("admin_ecgoods_js_goods_cat_not_leaf");?>";
var shop_price_not_null = "<?php echo L("admin_ecgoods_js_shop_price_not_null");?>";
var shop_price_not_number = "<?php echo L("admin_ecgoods_js_shop_price_not_number");?>";
var select_please = "<?php echo L("admin_ecgoods_js_select_please");?>";
var button_add = "<?php echo L("admin_ecgoods_js_button_add");?>";
var button_del = "<?php echo L("admin_ecgoods_js_button_del");?>";
var spec_value_not_null = "<?php echo L("admin_ecgoods_js_spec_value_not_null");?>";
var spec_price_not_number = "<?php echo L("admin_ecgoods_js_spec_price_not_number");?>";
var market_price_not_number = "<?php echo L("admin_ecgoods_js_market_price_not_number");?>";
var goods_number_not_int = "<?php echo L("admin_ecgoods_js_goods_number_not_int");?>";
var warn_number_not_int = "<?php echo L("admin_ecgoods_js_warn_number_not_int");?>";
var promote_not_lt = "<?php echo L("admin_ecgoods_js_promote_not_lt");?>";
var promote_start_not_null = "<?php echo L("admin_ecgoods_js_promote_start_not_null");?>";
var promote_end_not_null = "<?php echo L("admin_ecgoods_js_promote_end_not_null");?>";
var drop_img_confirm = "<?php echo L("admin_ecgoods_js_drop_img_confirm");?>";
var batch_no_on_sale = "<?php echo L("admin_ecgoods_js_batch_no_on_sale");?>";
var batch_trash_confirm = "<?php echo L("admin_ecgoods_js_batch_trash_confirm");?>";
var go_category_page = "<?php echo L("admin_ecgoods_js_go_category_page");?>";
var go_brand_page = "<?php echo L("admin_ecgoods_js_go_brand_page");?>";
var volume_num_not_null = "<?php echo L("admin_ecgoods_js_volume_num_not_null");?>";
var volume_num_not_number = "<?php echo L("admin_ecgoods_js_volume_num_not_number");?>";
var volume_price_not_null = "<?php echo L("admin_ecgoods_js_volume_price_not_null");?>";
var volume_price_not_number = "<?php echo L("admin_ecgoods_js_volume_price_not_number");?>";
var cancel_color = "<?php echo L("admin_ecgoods_js_cancel_color");?>";
//-->
</script>
<script type="text/javascript" src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js'></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectzone.js"></script>
<script type="text/javascript" src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/colorselector.js'></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
        
<?php if($warning){?>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
  <li style="border: 1px solid #CC0000; background: #FFFFCC; padding: 10px; margin-bottom: 5px;" ><?php echo $warning;?></li>
</ul>
<?php }?> 
<!-- start goods form -->
<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab"><?php echo L("admin_ecgoods_info_page_table_span1");?></span>
            <span class="tab-back" id="detail-tab"><?php echo L("admin_ecgoods_info_page_table_span2");?></span>
            <span class="tab-back" id="mix-tab"><?php echo L("admin_ecgoods_info_page_table_span3");?></span>
            <?php if($goods_type_list){?>
            <span class="tab-back" id="properties-tab"><?php echo L("admin_ecgoods_info_page_table_span4");?></span>
            <?php }?>
            <span class="tab-back" id="gallery-tab"><?php echo L("admin_ecgoods_info_page_table_span5");?></span>
            <span class="tab-back" id="linkgoods-tab"><?php echo L("admin_ecgoods_info_page_table_span6");?></span>
            <?php if($code == ''){?>
            <span class="tab-back" id="groupgoods-tab"><?php echo L("admin_ecgoods_info_page_table_span7");?></span>
            <?php }?>
            <span class="tab-back" id="article-tab"><?php echo L("admin_ecgoods_info_page_table_span8");?></span>
        </p>
    </div>
    
    <!-- tab body -->
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="<?php echo U('index');?>" method="post" name="theForm" >
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
            <table width="90%" id="general-table" align="center">
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_table_th2");?>：</td>
                    <td>
                        <input type="text" name="goods_name" value="<?php echo htmlspecialchars($goods['goods_name']);?>" style="float:left;color:<?php echo $goods_name_color;?>;" size="30" />
                        <div style="background-color:<?php echo $goods_name_color;?>;float:left;margin-left:2px;" id="font_color" onclick="ColorSelecter.Show(this);">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/color_selecter.gif" style="margin-top:-1px;" />
                        </div>
                        <input type="hidden" id="goods_name_color" name="goods_name_color" value="<?php echo $goods_name_color;?>" />&nbsp;
                        <select name="goods_name_style">
                            <option value=""><?php echo L("admin_ecgoods_info_page_info_table_select1");?></option>
                            <?php if(isset($font_styles) && !empty($font_styles)):$arr["options"]=$font_styles;$arr["selected"]=$goods_name_style;echo html_options($arr);endif;
?>
                        </select>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeGoodsSN');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a> 
                        <?php echo L("admin_ecgoods_info_page_info_table_td1");?>：
                    </td>
                    <td>
                        <input type="text" name="goods_sn" value="<?php echo escape($goods['goods_sn']);?>" size="20" onblur="checkGoodsSn(this.value,'<?php echo $goods['goods_id'];?>')" />
                        <span id="goods_sn_notice"></span><br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsSN">
                            <?php echo L("admin_ecgoods_info_page_info_table_td2");?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td3");?>：</td>
                    <td>
                        <select name="cat_id" onchange="hideCatDiv()" >
                            <option value="0"><?php echo L("admin_ecgoods_js_select_please");?></option>
                            <?php echo $cat_list;?>
                        </select>
                        <?php if($is_add){?>
                            <a href="javascript:void(0)" onclick="rapidCatAdd()" title="<?php echo L("admin_ecgoods_info_page_info_table_td4");?>" class="special">
                                <?php echo L("admin_ecgoods_info_page_info_table_td4");?>
                            </a>
                            <span id="category_add" style="display:none;">
                                <input class="text" size="10" name="addedCategoryName" />
                                <a href="javascript:void(0)" onclick="addCategory()" title="<?php echo L("admin_ecgoods_info_page_table_button1");?>" class="special" >
                                    <?php echo L("admin_ecgoods_info_page_table_button1");?>
                                </a>
                                <a href="javascript:void(0)" onclick="return goCatPage()" title="<?php echo L("admin_ecgoods_info_page_info_table_td5");?>" class="special" >
                                    <?php echo L("admin_ecgoods_info_page_info_table_td5");?>
                                </a>
                                <a href="javascript:void(0)" onclick="hideCatDiv()" title="<?php echo L("admin_ecgoods_common7");?>" class="special" ><<</a>
                            </span>
                        <?php }?>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td6");?>：</td>
                    <td>
                        <input type="button" value="<?php echo L("admin_ecgoods_js_button_add");?>" onclick="addOtherCat(this.parentNode)" class="button" />
                        <?php if(is_array($goods['other_cat'])):?><?php $index=0; ?><?php  foreach($goods['other_cat'] as $cat_id){ ?>
                            <select name="other_cat[]">
                                <option value="0"><?php echo L("admin_ecgoods_js_select_please");?></option>
                                <?php echo $other_cat_list[$cat_id];?>
                            </select>
                        <?php $index++; ?><?php }?><?php endif;?>
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td7");?>：</td>
                    <td>
                        <select name="brand_id" onchange="hideBrandDiv()" >
                            <option value="0"><?php echo L("admin_ecgoods_js_select_please");?></option>
                            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=$goods['brand_id'];echo html_options($arr);endif;
?>
                        </select>
                        <?php if($is_add){?>
                            <a href="javascript:void(0)" title="<?php echo L("admin_ecgoods_info_page_info_table_td8");?>" onclick="rapidBrandAdd()" class="special" >
                                <?php echo L("admin_ecgoods_info_page_info_table_td8");?>
                            </a>
                            <span id="brand_add" style="display:none;">
                                <input class="text" size="15" name="addedBrandName" />
                                <a href="javascript:void(0)" onclick="addBrand()" class="special" ><?php echo L("admin_ecgoods_info_page_table_button1");?></a>
                                <a href="javascript:void(0)" onclick="return goBrandPage()" title="<?php echo L("admin_ecgoods_info_page_info_table_td9");?>" class="special" >
                                    <?php echo L("admin_ecgoods_info_page_info_table_td9");?>
                                </a>
                                <a href="javascript:void(0)" onclick="hideBrandDiv()" title="<?php echo L("admin_ecgoods_common7");?>" class="special" ><<</a>
                            </span>
                        <?php }?>
                    </td>
                </tr>
                <?php if($suppliers_exists == 1){?>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td10");?>：</td>
                    <td>
                        <select name="suppliers_id" id="suppliers_id">
                            <option value="0"><?php echo L("admin_ecgoods_info_page_info_table_td11");?></option>
                            <?php if(isset($suppliers_list_name) && !empty($suppliers_list_name)):$arr["options"]=$suppliers_list_name;$arr["selected"]=$goods['suppliers_id'];echo html_options($arr);endif;
?>
                        </select>
                    </td>
                </tr>
                <?php }?>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td12");?>：</td>
                    <td>
                        <input type="text" name="shop_price" value="<?php echo $goods['shop_price'];?>" size="20" onblur="priceSetted()"/>
                        <input type="button" value="<?php echo L("admin_ecgoods_info_page_info_table_td13");?>" onclick="marketPriceSetted()" />
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <?php if($user_rank_list){?>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeUserPrice');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a>
                        <?php echo L("admin_ecgoods_info_page_info_table_td14");?>：
                    </td>
                    <td>
                        <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $user_rank){ ?>
                            <?php echo $user_rank['rank_name'];?><span id="nrank_<?php echo $user_rank['rank_id'];?>"></span>
                            <input type="text" id="rank_<?php echo $user_rank['rank_id'];?>" name="user_price[]" value="<?php echo _default($member_price_list[$user_rank['rank_id']],-1);?>" 
                                    onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(<?php echo $user_rank['rank_id'];?>)"  class="w100" />
                            <input type="hidden" name="user_rank[]" value="<?php echo $user_rank['rank_id'];?>" />
                        <?php $index++; ?><?php }?><?php endif;?>
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeUserPrice">
                            <?php echo L("admin_ecgoods_info_page_info_table_td15");?>
                        </span>
                    </td>
                </tr>
                <?php }?>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('volumePrice');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a>
                        <?php echo L("admin_ecgoods_info_page_info_table_td16");?>：
                    </td>
                    <td>
                        <table width="100%" id="tbody-volume" align="center">
                            <?php if(is_array($volume_price_list)):?><?php $index=0; ?><?php  foreach($volume_price_list as $volume_key=>$volume_price){ ?>
                            <tr>
                                <td>
                                    <?php if($volume_key == 0){?>
                                        <a href="javascript:;" onclick="addVolumePrice(this)">[+]</a>
                                    <?php  }else{ ?>
                                        <a href="javascript:;" onclick="removeVolumePrice(this)">[-]</a>
                                    <?php }?>
                                    <?php echo L("admin_ecgoods_info_page_info_table_td17");?><input type="text" name="volume_number[]" class="w100" value="<?php echo $volume_price['number'];?>"/>
                                    <?php echo L("admin_ecgoods_info_page_info_table_td18");?><input type="text" name="volume_price[]" class="w100" value="<?php echo $volume_price['price'];?>"/>
                                </td>
                            </tr>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </table>
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="volumePrice">
                            <?php echo L("admin_ecgoods_info_page_info_table_td19");?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td20");?>：</td>
                    <td>
                        <input type="text" name="market_price" value="<?php echo $goods['market_price'];?>" size="20" />
                        <input type="button" value="<?php echo L("admin_ecgoods_info_page_info_table_td21");?>" onclick="integral_market_price()" />
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('giveIntegral');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a> 
                        <?php echo L("admin_ecgoods_info_page_info_table_td22");?>：
                    </td>
                    <td>
                        <input type="text" name="give_integral" value="<?php echo $goods['give_integral'];?>" size="20" />
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="giveIntegral">
                            <?php echo L("admin_ecgoods_info_page_info_table_td23");?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('rankIntegral');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a> 
                        <?php echo L("admin_ecgoods_info_page_info_table_td24");?>：
                    </td>
                    <td>
                        <input type="text" name="rank_integral" value="<?php echo $goods['rank_integral'];?>" size="20" />
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="rankIntegral">
                            <?php echo L("admin_ecgoods_info_page_info_table_td25");?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticPoints');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a> 
                        <?php echo L("admin_ecgoods_info_page_info_table_td26");?>：
                    </td>
                    <td>
                        <input type="text" name="integral" value="<?php echo $goods['integral'];?>" size="20" onblur="parseint_integral();" />
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticPoints">
                            <?php echo L("admin_ecgoods_info_page_info_table_td27");?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <label for="is_promote">
                            <input type="checkbox" id="is_promote" name="is_promote" value="1" <?php if($goods['is_promote']){?>checked="checked"<?php }?>  onclick="handlePromote(this.checked);" /> 
                            <?php echo L("admin_ecgoods_info_page_info_table_td28");?>：
                        </label>
                    </td>
                    <td id="promote_3">
                        <input type="text" id="promote_1" name="promote_price" value="<?php echo $goods['promote_price'];?>" size="20" />
                    </td>
                </tr>
                <tr id="promote_4">
                    <td class="label" id="promote_5"><?php echo L("admin_ecgoods_info_page_info_table_td29");?>：</td>
                    <td id="promote_6">
                        <input name="promote_start_date" type="text" id="promote_start_date" size="12" value='<?php echo $goods['promote_start_date'];?>' readonly="readonly" />
                        <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"/> - 
                        <input name="promote_end_date" type="text" id="promote_end_date" size="12" value='<?php echo $goods['promote_end_date'];?>' readonly="readonly" />
                        <input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('promote_end_date', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button"/>
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td30");?>：</td>
                    <td>
                        <input type="file" name="goods_img" size="35" />
                        <?php if($goods['goods_img']){?>
                            <a href="<?php echo U('index');?>&act=show_image&img_url=<?php echo $goods['goods_img'];?>" target="_blank">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" border="0" />
                            </a>
                        <?php  }else{ ?>
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" />
                        <?php }?>
                        <br />
                        <input type="text" size="40" value="<?php echo L("admin_ecgoods_info_page_info_table_td31");?>" style="color:#aaa;" onfocus="if (this.value == '<?php echo L("admin_ecgoods_info_page_info_table_td31");?>'){this.value='http://';this.style.color='#000';}" name="goods_img_url"/>
                    </td>
                </tr>
                <tr id="auto_thumb_1">
                    <td class="label"> <?php echo L("admin_ecgoods_info_page_info_table_td32");?>：</td>
                    <td id="auto_thumb_3">
                        <input type="file" name="goods_thumb" size="35" />
                        <?php if($goods['goods_thumb']){?>
                            <a href="<?php echo U('index');?>&act=show_image&img_url=<?php echo $goods['goods_thumb'];?>" target="_blank">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" border="0" />
                            </a>
                        <?php  }else{ ?>
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" />
                        <?php }?>
                        <br />
                        <input type="text" size="40" value="<?php echo L("admin_ecgoods_info_page_info_table_td33");?>" style="color:#aaa;" onfocus="if (this.value == '<?php echo $lang['lab_thumb_url'];?>'){this.value='http://';this.style.color='#000';}" name="goods_thumb_url"/>
                        <?php if($gd > 0){?>
                            <br />
                            <label for="auto_thumb">
                                <input type="checkbox" id="auto_thumb" name="auto_thumb" checked="true" value="1" onclick="handleAutoThumb(this.checked)" />
                                <?php echo L("admin_ecgoods_info_page_info_table_td34");?>
                            </label>
                        <?php }?>
                    </td>
                </tr>
            </table>
            
            <table width="90%" id="detail-table" style="display:none">
                <tr>
                    <td>
                    <script type="text/javascript" charset="utf-8" src="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/"</script><script id="zh_goods_desc" name="goods_desc" type="text/plain"><?php echo $goods['goods_desc'];?></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('zh_goods_desc',{
                imageUrl:'http://www.works.com/index.php?a=Admin&c=EcGoods&act=add&m=ueditor_upload&g=Zhcms&water=0&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
                ,zIndex : 0
                ,autoClearinitialContent:false
                ,initialFrameWidth:"100%" //宽度1000
                ,initialFrameHeight:"300" //宽度1000
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,maximumWords:2000 //允许的最大字符数
                ,readonly : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false
                ,wordCount:true //是否开启字数统计
                ,imagePath:''//图片修正地址
                , toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe','insertcode', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars',  'wordimage', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                'print', 'preview', 'searchreplace']
            ]//工具按钮
                , initialStyle:'p{line-height:1em; font-size: 14px; }'
            });
        })
        </script>
                    </td>
                </tr>
            </table>
            
            <table width="90%" id="mix-table" style="display:none" align="center">
                <?php if($code == ''){?>
                    <tr>
                        <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td35");?>：</td>
                        <td>
                            <input type="text" name="goods_weight" value="<?php echo $goods['goods_weight_by_unit'];?>" size="20" /> 
                            <select name="weight_unit">
                                <?php if(isset($unit_list) && !empty($unit_list)):$arr["options"]=$unit_list;$arr["selected"]=$weight_unit;echo html_options($arr);endif;
?>
                            </select>
                        </td>
                    </tr>
                <?php }?>
                <?php if($cfg['ec_use_storage']){?>
                    <tr>
                        <td class="label">
                            <a href="javascript:showNotice('noticeStorage');" title="<?php echo L("admin_ecgoods_common6");?>">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                            </a> <?php echo L("admin_ecgoods_info_page_info_table_td36");?>：
                        </td>
                        <td>
                            <input type="text" name="goods_number" value="<?php echo $goods['goods_number'];?>" size="20" /><br />
                            <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeStorage">
                                <?php echo L("admin_ecgoods_info_page_info_table_td37");?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td38");?>：</td>
                        <td><input type="text" name="warn_number" value="<?php echo $goods['warn_number'];?>" size="20" /></td>
                    </tr>
                <?php }?>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td39");?>：</td>
                    <td>
                        <input type="checkbox" name="is_best" value="1" <?php if($goods['is_best']){?>checked="checked"<?php }?> />&nbsp;<?php echo L("admin_ecgoods_info_page_info_table_td40");?>&nbsp;&nbsp; 
                        <input type="checkbox" name="is_new" value="1" <?php if($goods['is_new']){?>checked="checked"<?php }?> />&nbsp;<?php echo L("admin_ecgoods_info_page_info_table_td41");?>&nbsp;&nbsp;
                        <input type="checkbox" name="is_hot" value="1" <?php if($goods['is_hot']){?>checked="checked"<?php }?> />&nbsp;<?php echo L("admin_ecgoods_info_page_info_table_td42");?>&nbsp;&nbsp;
                    </td>
                </tr>
                <tr id="alone_sale_1">
                    <td class="label" id="alone_sale_2"><?php echo L("admin_ecgoods_info_page_table_th5");?>：</td>
                    <td id="alone_sale_3">
                        <input type="checkbox" name="is_on_sale" value="1" <?php if($goods['is_on_sale']){?>checked="checked"<?php }?> /> 打勾表示允许销售，否则不允许销售。
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td43");?>：</td>
                    <td>
                        <input type="checkbox" name="is_alone_sale" value="1" <?php if($goods['is_alone_sale']){?>checked="checked"<?php }?> /> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td44");?></td>
                    <td>
                        <input type="checkbox" name="is_shipping" value="1" <?php if($goods['is_shipping']){?>checked="checked"<?php }?> /> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td45");?>：</td>
                    <td>
                        <input type="text" name="keywords" value="<?php echo htmlspecialchars($goods['keywords']);?>" size="40" /> <?php echo L("admin_ecgoods_info_page_info_table_td46");?>
                    </td>
                </tr>
                <tr>
                    <td class="label"><?php echo L("admin_ecgoods_info_page_info_table_td47");?>：</td>
                    <td>
                        <textarea name="goods_brief" cols="40" rows="3"><?php echo escape($goods['goods_brief']);?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeSellerNote');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a>  <?php echo L("admin_ecgoods_info_page_info_table_td48");?>：
                    </td>
                    <td>
                        <textarea name="seller_note" cols="40" rows="3"><?php echo $goods['seller_note'];?></textarea><br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeSellerNote">
                            <?php echo L("admin_ecgoods_info_page_info_table_td49");?>
                        </span>
                    </td>
                </tr>
            </table>
            
            <?php if($goods_type_list){?>
            <table width="90%" id="properties-table" style="display:none" align="center">
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeGoodsType');" title="<?php echo L("admin_ecgoods_common6");?>">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="<?php echo L("admin_ecgoods_common6");?>"/>
                        </a><?php echo L("admin_ecgoods_common6");?><?php echo L("admin_ecgoods_info_page_info_table_td50");?>：
                    </td>
                    <td>
                        <select name="goods_type" onchange="getAttrList(<?php echo $goods['goods_id'];?>)">
                            <option value="0"><?php echo L("admin_ecgoods_info_page_info_table_td51");?></option>
                            <?php echo $goods_type_list;?>
                        </select>
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsType">
                            <?php echo L("admin_ecgoods_info_page_info_table_td52");?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td id="tbody-goodsAttr" colspan="2" style="padding:0"><?php echo $goods_attr_html;?></td>
                </tr>
            </table>
            <?php }?>
            
            <table width="90%" id="gallery-table" style="display:none" align="center">
                <tr>
                    <td>
                    <?php if(is_array($img_list)):?><?php $index=0; ?><?php  foreach($img_list as $i=>$img){ ?>
                        <div id="gallery_<?php echo $img['img_id'];?>" style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
                            <a href="javascript:;" onclick="if (confirm('<?php echo L("admin_ecgoods_info_page_info_table_td53");?>')) dropImg('<?php echo $img['img_id'];?>')">[-]</a><br />
                            <a href="<?php echo U('index');?>&act=show_image&img_url=<?php echo $img['img_url'];?>" target="_blank">
                                <img src="http://www.works.com/<?php if($img['thumb_url']){?><?php echo $img['thumb_url'];?><?php  }else{ ?><?php echo $img['img_url'];?><?php }?>" 
                                                    <?php if($thumb_width <> 0){?>width="<?php echo $thumb_width;?>"<?php }?> 
                                                    <?php if($thumb_height <> 0){?>height="<?php echo $thumb_height;?>"<?php }?> border="0" />
                            </a><br />
                            <input type="text" value="<?php echo htmlspecialchars($img['img_desc']);?>" size="15" name="old_img_desc[<?php echo $img['img_id'];?>]" />
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <a href="javascript:;" onclick="addImg(this)">[+]</a>
                        <?php echo L("admin_ecgoods_info_page_info_table_td54");?> <input type="text" name="img_desc[]" size="20" />
                        <?php echo L("admin_ecgoods_info_page_info_table_td55");?> <input type="file" name="img_url[]" />
                        <input type="text" size="40" value="<?php echo L("admin_ecgoods_info_page_info_table_td56");?>" style="color:#aaa;" onfocus="if (this.value == '或者输入外部图片链接地址'){this.value='http://';this.style.color='#000';}" name="img_file[]"/>
                    </td>
                </tr>
            </table>
            
            <table width="90%" id="linkgoods-table" style="display:none" align="center">
                <tr>
                    <td colspan="3">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
                        <select name="cat_id1">
                            <option value="0"><?php echo L("admin_ecgoods_common8");?></option>
                            <?php echo $cat_list;?>
                        </select>
                        <select name="brand_id1">
                            <option value="0"><?php echo L("admin_ecgoods_common9");?></option>
                            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                        </select>
                        <input type="text" name="keyword1" />
                        <input type="button" value="<?php echo L("admin_ecgoods_common10");?>"  class="button" onclick="searchGoods(sz1, 'cat_id1','brand_id1','keyword1')" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo L("admin_ecgoods_common11");?></th>
                    <th><?php echo L("admin_ecgoods_info_page_table_th11");?></th>
                    <th><?php echo L("admin_ecgoods_info_page_info_table_td57");?></th>
                </tr>
                <tr>
                    <td width="42%">
                        <select name="source_select1" size="20" style="width:100%" ondblclick="sz1.addItem(false, 'add_link_goods', goodsId, this.form.elements['is_single'][0].checked)" multiple="true">
                        </select>
                    </td>
                    <td align="center">
                        <p>
                            <input name="is_single" type="radio" value="1" checked="checked" /><?php echo L("admin_ecgoods_info_page_info_table_td58");?><br />
                            <input name="is_single" type="radio" value="0" /><?php echo L("admin_ecgoods_info_page_info_table_td59");?>
                        </p>
                        <p><input type="button" value=">>" onclick="sz1.addItem(true, 'add_link_goods', goodsId, this.form.elements['is_single'][0].checked)" class="button" /></p>
                        <p><input type="button" value=">" onclick="sz1.addItem(false, 'add_link_goods', goodsId, this.form.elements['is_single'][0].checked)" class="button" /></p>
                        <p><input type="button" value="<" onclick="sz1.dropItem(false, 'drop_link_goods', goodsId, elements['is_single'][0].checked)" class="button" /></p>
                        <p><input type="button" value="<<" onclick="sz1.dropItem(true, 'drop_link_goods', goodsId, elements['is_single'][0].checked)" class="button" /></p>
                    </td>
                    <td width="42%">
                        <select name="target_select1" size="20" style="width:100%" multiple ondblclick="sz1.dropItem(false, 'drop_link_goods', goodsId, elements['is_single'][0].checked)">
                            <?php if(is_array($link_goods_list)):?><?php $index=0; ?><?php  foreach($link_goods_list as $link_goods){ ?>
                            <option value="<?php echo $link_goods['goods_id'];?>"><?php echo $link_goods['goods_name'];?></option>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </select>
                    </td>
                </tr>
            </table>
            
            <table width="90%" id="groupgoods-table" style="display:none" align="center">
                <tr>
                    <td colspan="3">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
                        <select name="cat_id2">
                            <option value="0"><?php echo L("admin_ecgoods_common8");?></option>
                            <?php echo $cat_list;?>
                        </select>
                        <select name="brand_id2">
                            <option value="0"><?php echo L("admin_ecgoods_common9");?></option>
                            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                        </select>
                        <input type="text" name="keyword2" />
                        <input type="button" value="<?php echo L("admin_ecgoods_common10");?>" onclick="searchGoods(sz2, 'cat_id2', 'brand_id2', 'keyword2')" class="button" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo L("admin_ecgoods_common11");?></th>
                    <th><?php echo L("admin_ecgoods_info_page_table_th11");?></th>
                    <th><?php echo L("admin_ecgoods_info_page_info_table_td60");?></th>
                </tr>
                <tr>
                    <td width="42%">
                        <select name="source_select2" size="20" style="width:100%" onchange="sz2.priceObj.value = this.options[this.selectedIndex].id" ondblclick="sz2.addItem(false, 'add_group_goods', goodsId, this.form.elements['price2'].value)">
                        </select>
                    </td>
                    <td align="center">
                        <p><?php echo L("admin_ecgoods_info_page_table_th4");?><br /><input name="price2" type="text" size="6" /></p>
                        <p><input type="button" value=">" onclick="sz2.addItem(false, 'add_group_goods', goodsId, this.form.elements['price2'].value)" class="button" /></p>
                        <p><input type="button" value="<" onclick="sz2.dropItem(false, 'drop_group_goods', goodsId, elements['is_single'][0].checked)" class="button" /></p>
                        <p><input type="button" value="<<" onclick="sz2.dropItem(true, 'drop_group_goods', goodsId, elements['is_single'][0].checked)" class="button" /></p>
                    </td>
                    <td width="42%">
                        <select name="target_select2" size="20" style="width:100%" multiple ondblclick="sz2.dropItem(false, 'drop_group_goods', goodsId, elements['is_single'][0].checked)">
                            <?php if(is_array($group_goods_list)):?><?php $index=0; ?><?php  foreach($group_goods_list as $group_goods){ ?>
                            <option value="<?php echo $group_goods['goods_id'];?>"><?php echo $group_goods['goods_name'];?></option>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </select>
                    </td>
                </tr>
            </table>
            
            <table width="90%" id="article-table" style="display:none" align="center">
                <tr>
                    <td colspan="3">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
                        <?php echo L("admin_ecgoods_info_page_info_table_td61");?> <input type="text" name="article_title" />
                        <input type="button" value="<?php echo L("admin_ecgoods_common10");?>" onclick="searchArticle()" class="button" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo L("admin_ecgoods_info_page_info_table_td62");?></th>
                    <th><?php echo L("admin_ecgoods_info_page_table_th11");?></th>
                    <th><?php echo L("admin_ecgoods_info_page_info_table_td63");?></th>
                </tr>
                <tr>
                    <td width="45%">
                        <select name="source_select3" size="20" style="width:100%" multiple ondblclick="sz3.addItem(false, 'add_goods_article', goodsId, this.form.elements['price2'].value)">
                        </select>
                    </td>
                    <td align="center">
                        <p><input type="button" value=">>" onclick="sz3.addItem(true, 'add_goods_article', goodsId, this.form.elements['price2'].value)" class="button" /></p>
                        <p><input type="button" value=">" onclick="sz3.addItem(false, 'add_goods_article', goodsId, this.form.elements['price2'].value)" class="button" /></p>
                        <p><input type="button" value="<" onclick="sz3.dropItem(false, 'drop_goods_article', goodsId, elements['is_single'][0].checked)" class="button" /></p>
                        <p><input type="button" value="<<" onclick="sz3.dropItem(true, 'drop_goods_article', goodsId, elements['is_single'][0].checked)" class="button" /></p>
                    </td>
                    <td width="45%">
                        <select name="target_select3" size="20" style="width:100%" multiple ondblclick="sz3.dropItem(false, 'drop_goods_article', goodsId, elements['is_single'][0].checked)">
                            <?php if(is_array($goods_article_list)):?><?php $index=0; ?><?php  foreach($goods_article_list as $goods_article){ ?>
                            <option value="<?php echo $goods_article['article_id'];?>"><?php echo $goods_article['title'];?></option>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </select>
                    </td>
                </tr>
            </table>
            
            <div class="button-div">
                <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id'];?>" />
                <?php if($code <> ''){?>
                    <input type="hidden" name="extension_code" value="<?php echo $code;?>" />
                <?php }?>
                <input type="button" value="<?php echo L("admin_ecgoods_info_page_table_button1");?>" class="button" onclick="validate('<?php echo $goods['goods_id'];?>')" />
                <input type="reset" value="<?php echo L("admin_ecgoods_info_page_info_table_td64");?>" class="button" />
            </div>
            <input type="hidden" name="act" value="<?php echo $form_act;?>" />
        </form>
    </div>
    
</div>

<script type="text/javascript" src='http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js'></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/tab.js"></script>

<script language="JavaScript">

    var goodsId = '<?php echo $goods['goods_id'];?>';
    var elements = document.forms['theForm'].elements;
    var sz1 = new SelectZone(1, elements['source_select1'], elements['target_select1']);
    var sz2 = new SelectZone(2, elements['source_select2'], elements['target_select2'], elements['price2']);
    var sz3 = new SelectZone(1, elements['source_select3'], elements['target_select3']);
    var marketPriceRate =<?php echo default_value($cfg['ec_market_price_rate'],1);?>;
    var integralPercent = <?php echo default_value($cfg['ec_integral_percent'],0);?>;
    
    $(function () {
        handlePromote(document.forms['theForm'].elements['is_promote'].checked);
        if (document.forms['theForm'].elements['auto_thumb'])
        {
            handleAutoThumb(document.forms['theForm'].elements['auto_thumb'].checked);
        }
        
        <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $item){ ?>
        set_price_note(<?php echo $item['rank_id'];?>);
        <?php $index++; ?><?php }?><?php endif;?>
        document.forms['theForm'].reset();
    });

    function validate(goods_id){
        var validator = new Validator('theForm');
        var goods_sn  = document.forms['theForm'].elements['goods_sn'].value;
        validator.required('goods_name', goods_name_not_null);
        if (document.forms['theForm'].elements['cat_id'].value == 0)
        {
          validator.addErrorMsg(goods_cat_not_null);
        }
        
        checkVolumeData("1",validator);
        
        validator.required('shop_price', shop_price_not_null);
        validator.isNumber('shop_price', shop_price_not_number, true);
        validator.isNumber('market_price', market_price_not_number, false);
        if (document.forms['theForm'].elements['is_promote'].checked){
            validator.required('promote_start_date', promote_start_not_null);
            validator.required('promote_end_date', promote_end_not_null);
            validator.islt('promote_start_date', 'promote_end_date', promote_not_lt);
        }
        if (document.forms['theForm'].elements['goods_number'] != undefined)
        {
            validator.isInt('goods_number', goods_number_not_int, false);
            validator.isInt('warn_number', warn_number_not_int, false);
        }
        var callback = function(res)
        {
            if (res.error > 0)
            {
                alert('<?php echo L("admin_ecgoods_js_validate_error");?>');
            }
            else
            {
                if(validator.passed())
                {
                    document.forms['theForm'].submit();
                }
            }
        }
        var params = "goods_sn=" + goods_sn + "&goods_id=" + goods_id;
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=check_goods_sn";
        Ajax.call(ajaxurl, params, callback, "GET", "JSON");
    }

    /**
    * 鍒囨崲鍟嗗搧绫诲瀷
    */
    function getAttrList(goodsId)
    {
        var selGoodsType = document.forms['theForm'].elements['goods_type'];
        
        if (selGoodsType != undefined)
        {
            var goodsType = selGoodsType.options[selGoodsType.selectedIndex].value;
            
            var params = 'goods_id=' + goodsId + "&goods_type=" + goodsType;
            var ajaxurl=CONTROL +"&is_ajax=1&act=get_attr";
            
            Ajax.call(ajaxurl, params, setAttrList, "GET", "JSON");
        }
    }
    
    function setAttrList(result, text_result)
    {
        document.getElementById('tbody-goodsAttr').innerHTML = result.content;
    }
    



    /**
    * 鎸夋瘮渚嬭?绠椾环鏍
    * @param   string  inputName   杈撳叆妗嗗悕绉
    * @param   float   rate        姣斾緥
    * @param   string  priceName   浠锋牸杈撳叆妗嗗悕绉帮紙濡傛灉娌℃湁锛屽彇shop_price锛
    */
    function computePrice(inputName, rate, priceName)
    {
        var shopPrice = priceName == undefined ? document.forms['theForm'].elements['shop_price'].value : document.forms['theForm'].elements[priceName].value;
        shopPrice = Utils.trim(shopPrice) != '' ? parseFloat(shopPrice)* rate : 0;
        if(inputName == 'integral')
        {
          shopPrice = parseInt(shopPrice);
        }
        shopPrice += "";
        
        n = shopPrice.lastIndexOf(".");
        if (n > -1)
        {
          shopPrice = shopPrice.substr(0, n + 3);
        }
        
        if (document.forms['theForm'].elements[inputName] != undefined)
        {
          document.forms['theForm'].elements[inputName].value = shopPrice;
        }
        else
        {
          document.getElementById(inputName).value = shopPrice;
        }
    }

    /**
    * 璁剧疆浜嗕竴涓?晢鍝佷环鏍硷紝鏀瑰彉甯傚満浠锋牸銆佺Н鍒嗕互鍙婁細鍛樹环鏍
    */
    function priceSetted()
    {
        computePrice('market_price', marketPriceRate);
        computePrice('integral', integralPercent / 100);
        <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $item){ ?>
        set_price_note(<?php echo $item['rank_id'];?>);
        <?php $index++; ?><?php }?><?php endif;?>
    
    }
    
    /**
    * 璁剧疆浼氬憳浠锋牸娉ㄩ噴
    */
    function set_price_note(rank_id)
    {
        var shop_price = parseFloat(document.forms['theForm'].elements['shop_price'].value);
        var rank = new Array();
        <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $item){ ?>
        rank[<?php echo $item['rank_id'];?>] = <?php echo default_value($item['discount'],100);?>;
        <?php $index++; ?><?php }?><?php endif;?>
        if (shop_price >0 && 
            rank[rank_id] && 
            document.getElementById('rank_' + rank_id) && 
            parseInt(document.getElementById('rank_' + rank_id).value) == -1)
        {
            var price = parseInt(shop_price * rank[rank_id] + 0.5) / 100;
            if (document.getElementById('nrank_' + rank_id))
            {
                document.getElementById('nrank_' + rank_id).innerHTML = '(' + price + ')';
            }
        }
        else
        {
            if (document.getElementById('nrank_' + rank_id))
            {
                document.getElementById('nrank_' + rank_id).innerHTML = '';
            }
        }
    }
    
    /**
    * 鏍规嵁甯傚満浠锋牸锛岃?绠楀苟鏀瑰彉鍟嗗簵浠锋牸銆佺Н鍒嗕互鍙婁細鍛樹环鏍
    */
    function marketPriceSetted()
    {
        computePrice('shop_price', 1/marketPriceRate, 'market_price');
        computePrice('integral', integralPercent / 100);
        
        <?php if(is_array($user_rank_list)):?><?php $index=0; ?><?php  foreach($user_rank_list as $item){ ?>
        set_price_note(<?php echo $item['rank_id'];?>);
        <?php $index++; ?><?php }?><?php endif;?>
    }
    
    
    /**
    * 鏂板?涓€涓??鏍
    */
    function addSpec(obj)
    {
        var src   = obj.parentNode.parentNode;
        var idx   = rowindex(src);
        var tbl   = document.getElementById('attrTable');
        var row   = tbl.insertRow(idx + 1);
        var cell1 = row.insertCell(-1);
        var cell2 = row.insertCell(-1);
        var regx  = /<a([^>]+)<\/a>/i;
        
        cell1.className = 'label';
        cell1.innerHTML = src.childNodes[0].innerHTML.replace(/(.*)(addSpec)(.*)(\[)(\+)/i, "$1removeSpec$3$4-");
        cell2.innerHTML = src.childNodes[1].innerHTML.replace(/readOnly([^\s|>]*)/i, '');
    }
    
    /**
    * 鍒犻櫎瑙勬牸鍊
    */
    function removeSpec(obj)
    {
        var row = rowindex(obj.parentNode.parentNode);
        var tbl = document.getElementById('attrTable');
        
        tbl.deleteRow(row);
    }
    
    function handlePromote(checked)
    {
        document.forms['theForm'].elements['promote_price'].disabled = !checked;
        document.forms['theForm'].elements['selbtn1'].disabled = !checked;
        document.forms['theForm'].elements['selbtn2'].disabled = !checked;
    }
        
    function handleAutoThumb(checked)
    {
        document.forms['theForm'].elements['goods_thumb'].disabled = checked;
        document.forms['theForm'].elements['goods_thumb_url'].disabled = checked;
    }


    /**
    * 蹇?€熸坊鍔犲搧鐗
    */
    function rapidBrandAdd(conObj)
    {
        var brand_div = document.getElementById("brand_add");
        
        if(brand_div.style.display != '')
        {
            var brand =document.forms['theForm'].elements['addedBrandName'];
            brand.value = '';
            brand_div.style.display = '';
        }
    }

    function hideBrandDiv()
    {
        var brand_add_div = document.getElementById("brand_add");
        if(brand_add_div.style.display != 'none')
        {
            brand_add_div.style.display = 'none';
        }
    }
    
    
    function goBrandPage()
    {
        if(confirm(go_brand_page))
        {
            window.location.href='<?php echo U("Admin/EcBrand/Index");?>&act=add';
        }
        else
        {
            return;
        }
    }
    
    function rapidCatAdd()
    {
        var cat_div = document.getElementById("category_add");
        
        if(cat_div.style.display != '')
        {
          var cat =document.forms['theForm'].elements['addedCategoryName'];
          cat.value = '';
          cat_div.style.display = '';
        }
    }
    
    
    function addBrand()
    {
        var brand = document.forms['theForm'].elements['addedBrandName'];
        if(brand.value.replace(/^\s+|\s+$/g, '') == '')
        {
            alert(brand_cat_not_null);
            return;
        }
        var ajaxurl=APP +"&c=EcBrand&m=index&is_ajax=1&act=add_brand";
        var params = 'brand=' + brand.value;
        Ajax.call(ajaxurl, params, addBrandResponse, 'GET', 'JSON');
    }
    
    function addBrandResponse(result)
    {
        if (result.error == '1' && result.message != '')
        {
            alert(result.message);
            return;
        }
        
        var brand_div = document.getElementById("brand_add");
        brand_div.style.display = 'none';
        
        var response = result.content;
        
        var selCat = document.forms['theForm'].elements['brand_id'];
        var opt = document.createElement("OPTION");
        opt.value = response.id;
        opt.selected = true;
        opt.text = response.brand;
        
        if (Browser.isIE)
        {
            selCat.add(opt);
        }
        else
        {
            selCat.appendChild(opt);
        }
        
        return;
    }
    
    function hideCatDiv()
    {
        var category_add_div = document.getElementById("category_add");
        if(category_add_div.style.display != null)
        {
            category_add_div.style.display = 'none';
        }
    }


    function goCatPage()
    {
        if(confirm(go_category_page))
        {
            window.location.href='<?php echo U("Admin/EcCategory/index/");?>&act=add';
        }
        else
        {
            return;
        }
    }
    
    

    /**
    * 娣诲姞鎵╁睍鍒嗙被
    */
    function addOtherCat(conObj)
    {
        var sel = document.createElement("SELECT");
        var selCat = document.forms['theForm'].elements['cat_id'];
        
        for (i = 0; i < selCat.length; i++)
        {
            var opt = document.createElement("OPTION");
            opt.text = selCat.options[i].text;
            opt.value = selCat.options[i].value;
            if (Browser.isIE)
            {
                sel.add(opt);
            }
            else
            {
                sel.appendChild(opt);
            }
        }
        conObj.appendChild(sel);
        sel.name = "other_cat[]";
        sel.onChange = function() {checkIsLeaf(this);};
    }
  
    /* 鍏宠仈鍟嗗搧鍑芥暟 */
    function searchGoods(szObject, catId, brandId, keyword)
    {
        var filters = new Object;
        
        filters.cat_id = elements[catId].value;
        filters.brand_id = elements[brandId].value;
        filters.keyword = Utils.trim(elements[keyword].value);
        filters.exclude = document.forms['theForm'].elements['goods_id'].value;
        
        szObject.loadOptions('get_goods_list', filters);
    }

    /**
    * 鍏宠仈鏂囩珷鍑芥暟
    */
    function searchArticle()
    {
        var filters = new Object;
        
        filters.title = Utils.trim(elements['article_title'].value);
        
        sz3.loadOptions('get_article_list', filters);
    }




    /**
    * 鏂板?涓€涓?浘鐗
    */
    function addImg(obj)
    {
        var src  = obj.parentNode.parentNode;
        var idx  = rowindex(src);
        var tbl  = document.getElementById('gallery-table');
        var row  = tbl.insertRow(idx + 1);
        var cell = row.insertCell(-1);
        cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
    }


    
    /**
    * 鍒犻櫎鍥剧墖涓婁紶
    */
    function removeImg(obj)
    {
        var row = rowindex(obj.parentNode.parentNode);
        var tbl = document.getElementById('gallery-table');
        
        tbl.deleteRow(row);
    }
    
    /**
    * 鍒犻櫎鍥剧墖
    */
    function dropImg(imgId)
    {
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=drop_image";
        Ajax.call(ajaxurl, "img_id="+imgId, dropImgResponse, "GET", "JSON");
    }
  
    function dropImgResponse(result)
    {
        if (result.error == 0)
        {
            document.getElementById('gallery_' + result.content).style.display = 'none';
        }
    }
    /**
    * 灏嗗競鍦轰环鏍煎彇鏁
    */
    function integral_market_price()
    {
        document.forms['theForm'].elements['market_price'].value = parseInt(document.forms['theForm'].elements['market_price'].value);
    }
  
    /**
    * 妫€鏌ヨ揣鍙锋槸鍚﹀瓨鍦
    */
    function checkGoodsSn(goods_sn, goods_id)
    {
        if (goods_sn == '')
        {
            document.getElementById('goods_sn_notice').innerHTML = "";
            return;
        }
        var callback = function(res)
        {
            //alert(res);
            if (res.error > 0)
            {
                document.getElementById('goods_sn_notice').innerHTML = res.message;
                document.getElementById('goods_sn_notice').style.color = "red";
            }
            else
            {
                document.getElementById('goods_sn_notice').innerHTML = "";
            }
        }
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=check_goods_sn";
        Ajax.call(ajaxurl, "goods_sn=" + goods_sn + "&goods_id=" + goods_id, callback, "GET", "JSON");
    }
  
    /**
    * 鏂板?涓€涓?紭鎯犱环鏍
    */
    function addVolumePrice(obj)
    {
        var src      = obj.parentNode.parentNode;
        var tbl      = document.getElementById('tbody-volume');
        
        var validator  = new Validator('theForm');
        checkVolumeData("0",validator);
        if (!validator.passed())
        {
          return false;
        }
        
        var row  = tbl.insertRow(tbl.rows.length);
        var cell = row.insertCell(-1);
        cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addVolumePrice)(.*)(\[)(\+)/i, "$1removeVolumePrice$3$4-");
        
        var number_list = document.getElementsByName("volume_number[]");
        var price_list  = document.getElementsByName("volume_price[]");
        
        number_list[number_list.length-1].value = "";
        price_list[price_list.length-1].value   = "";
    }
  
    /**
    * 鍒犻櫎浼樻儬浠锋牸
    */
    function removeVolumePrice(obj)
    {
        var row = rowindex(obj.parentNode.parentNode);
        var tbl = document.getElementById('tbody-volume');
        
        tbl.deleteRow(row);
    }

    
    /**
    * 鏍￠獙浼樻儬鏁版嵁鏄?惁姝ｇ‘
    */
    function checkVolumeData(isSubmit,validator)
    {
        var volumeNum = document.getElementsByName("volume_number[]");
        var volumePri = document.getElementsByName("volume_price[]");
        var numErrNum = 0;
        var priErrNum = 0;
    
        for (i = 0 ; i < volumePri.length ; i ++)
        {
            if ((isSubmit != 1 || volumeNum.length > 1) && numErrNum <= 0 && volumeNum.item(i).value == "")
            {
                validator.addErrorMsg(volume_num_not_null);
                numErrNum++;
            }
            
            if (numErrNum <= 0 && Utils.trim(volumeNum.item(i).value) != "" && ! Utils.isNumber(Utils.trim(volumeNum.item(i).value)))
            {
                validator.addErrorMsg(volume_num_not_number);
                numErrNum++;
            }
            
            if ((isSubmit != 1 || volumePri.length > 1) && priErrNum <= 0 && volumePri.item(i).value == "")
            {
                validator.addErrorMsg(volume_price_not_null);
                priErrNum++;
            }
            
            if (priErrNum <= 0 && Utils.trim(volumePri.item(i).value) != "" && ! Utils.isNumber(Utils.trim(volumePri.item(i).value)))
            {
                validator.addErrorMsg(volume_price_not_number);
                priErrNum++;
            }
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


