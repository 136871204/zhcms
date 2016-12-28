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
//-->
</script>
<table width="100%">
    <tr>
        <td>
            <div class="main-div" style="background-color: white;">
                <br/><?php echo L("admin_ecgoodsexport_info_page_table_th1");?>：
                <ol>
                    <li><?php echo L("admin_ecgoodsexport_info_page_table_th2");?></li>'
                    <li><?php echo L("admin_ecgoodsexport_info_page_table_th3");?></li>
                </ol>
                <h3><center><?php echo L("admin_ecgoodsexport_info_page_table_th4");?></center></h3>
                <div>
                    <form action="<?php echo U('index');?>" method="post" name="searchForm" onsubmit="return queryGoods(this)">
                        <strong><?php echo L("admin_ecgoodsexport_info_page_table_th5");?></strong>
                        <!-- 分类 -->
                        <select name="cat_id">
                            <option value="0"><?php echo L("admin_ecgoodsexport_info_page_table_th6");?></option>
                            <?php echo $cat_list;?>
                        </select>
                        <!-- 品牌 -->
                        <select name="brand_id">
                            <option value="0"><?php echo L("admin_ecgoodsexport_info_page_table_th7");?></option>
                            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                        </select>
                        <!-- 关键字 -->
                        <?php echo L("admin_ecgoodsexport_info_page_table_th8");?><input type="text" name="keyword"/>
                        <!-- 搜索 -->
                        <input type="submit" name="search_submit" id="search_submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn1");?>" class="button" />
                    </form>
                </div>
                <table>
                    <tr>
                        <td width="46%">
                            <select name="src_goods_lists" id="src_goods_lists" size="14" style="width:100%" multiple="true">
                            </select>
                        </td>
                        <td rowspan="2" width="8%" style="text-align:center;">
                            <p><input type="button" value=">>" id="addAllGoods" class="button" /></p>
                            <p><input type="button" value=">" id="addGoods" class="button" /></p>
                            <p><input type="button" value="<" id="delGoods" class="button" /></p>
                            <p><input type="button" value="<<" id="delAllGoods" class="button" /></p>
                        </td>
                        <td width="46%">
                            <select name="dst_goods_lists" id="dst_goods_lists" size="14" style="width:100%" multiple="true">
                            </select>
                        </td>
                    </tr>
                </table>
                <div>
                    <strong><?php echo L("admin_ecgoodsexport_info_page_table_th9");?></strong>
                    <!-- 导出的数据格式 -->
                    <select name="data_format" id="data_format">
                        <?php if(isset($data_format) && !empty($data_format)):$arr["options"]=$data_format;$arr["selected"]=null;echo html_options($arr);endif;
?>
                    </select>
                    <div id="export_format">
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
<div id="ecshop_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post" name="theForm" onsubmit="return formValidate0()">
        <table width="100%" >
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_info_page_table_th10");?></td>
                <td>
                    <select name="charset" >
                        <option value="UTF8">UTF8</option>
                        <option value="GB2312">GB2312</option>
                        <option value="GBK">GBK</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input name="cat_id" type="hidden" value="" />
                    <input name="brand_id" type="hidden" value="" />
                    <input name="keyword" type="hidden" value="" />
                    <input name="goods_ids" type="hidden" value="" />
                    <input type="hidden" name="act" value="act_export_ecshop"/>
                </td>
                <td>
                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="taobao_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post" name="theForm1" onsubmit="return formValidate1()">
        <table width="100%" >
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGoodsClass');" title="L('admin_ecgoodsexport_common22')">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="L('admin_ecgoodsexport_common22')"/>
                    </a><?php echo L("admin_ecgoodsexport_common23");?>
                </td>
                <td>
                    <input type="text" name="goods_class" value="0" /><br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsClass">
                        <?php echo L("admin_ecgoodsexport_common24");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common25");?></td>
                <td><input type="text" name="post_express" value="0" />
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common26");?></td>
                <td><input type="text" name="express" value="0" /></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common27");?></td>
                <td><input type="text" name="express" value="0" /></td>
            </tr>
            <tr>
                <td>
                &nbsp;
                </td>
                <td> 
                    <input name="cat_id" type="hidden" value="" />
                    <input name="brand_id" type="hidden" value="" />
                    <input name="keyword" type="hidden" value="" />
                    <input name="goods_ids" type="hidden" value="" />
                    <input type="hidden" name="act" value="act_export_taobao"/>
                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="taobao V4.3_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post" name="theForm3" onsubmit="return formValidate3()">
        <table width="100%" >
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGoodsClass');" title="L('admin_ecgoodsexport_common22')">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="L('admin_ecgoodsexport_common22')"/>
                    </a>
                    <?php echo L("admin_ecgoodsexport_common23");?>
                </td>
                <td>
                    <input type="text" name="goods_class" value="0" /><br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsClass">
                        <?php echo L("admin_ecgoodsexport_common24");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common25");?></td>
                <td><input type="text" name="post_express" value="0" /></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common26");?></td>
                <td><input type="text" name="express" value="0" /></td>
            <tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common27");?></td>
                <td><input type="text" name="ems" value="0" /></td>
            <tr>
            <tr>
                <td>
                &nbsp;
                </td>
                <td>   
                    <input name="cat_id" type="hidden" value="" />
                    <input name="brand_id" type="hidden" value="" />
                    <input name="keyword" type="hidden" value="" />
                    <input name="goods_ids" type="hidden" value="" />
                    <input type="hidden" name="act" value="act_export_taobao V4.3"/>
                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="taobao V4.6_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post" name="theForm6" onsubmit="return formValidate3()">
        <table width="100%" >
            <tr>
                <td class="label">
                    <a href="javascript:showNotice('noticeGoodsClass');" title="L('admin_ecgoodsexport_common22')">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="L('admin_ecgoodsexport_common22')"/>
                    </a>
                    <?php echo L("admin_ecgoodsexport_common23");?>
                </td>
                <td>
                    <input type="text" name="goods_class" value="0" /><br />
                    <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeGoodsClass">
                        <?php echo L("admin_ecgoodsexport_common24");?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common25");?></td>
                <td><input type="text" name="post_express" value="0" /></td>
            </tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common26");?></td>
                <td><input type="text" name="express" value="0" /></td>
            <tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common27");?></td>
                <td><input type="text" name="ems" value="0" /></td>
            <tr>
            <tr>
                <td>
                &nbsp;
                </td>
                <td>   
                    <input name="cat_id" type="hidden" value="" />
                    <input name="brand_id" type="hidden" value="" />
                    <input name="keyword" type="hidden" value="" />
                    <input name="goods_ids" type="hidden" value="" />
                    <input type="hidden" name="act" value="act_export_taobao V4.6"/>
                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="paipai_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post"  name="theForm2" onsubmit="return formValidate2()">
        <table width="100%" >
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common25");?></td>
                <td><input type="text" name="post_express" value="0" /></td>
            <tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common26");?></td>
                <td><input type="text" name="express" value="0" /></td>
            <tr>
            <tr>
                <td>
                &nbsp;
                </td>
                <td> 
                    <input name="cat_id" type="hidden" value="" />
                    <input name="brand_id" type="hidden" value="" />
                    <input name="keyword" type="hidden" value="" />
                    <input name="goods_ids" type="hidden" value="" />
                    <input type="hidden" name="act" value="act_export_paipai"/>
                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="paipai4_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post"  name="theForm5" onsubmit="return formValidate5()">
        <table width="100%" >
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common25");?></td>
                <td><input type="text" name="post_express" value="0" /></td>
            <tr>
            <tr>
                <td class="label"><?php echo L("admin_ecgoodsexport_common26");?></td>
                <td><input type="text" name="express" value="0" /></td>
            <tr>
            <tr>
                <td>
                &nbsp;
                </td>
                <td>
                    <input name="cat_id" type="hidden" value="" />
                    <input name="brand_id" type="hidden" value="" />
                    <input name="keyword" type="hidden" value="" />
                    <input name="goods_ids" type="hidden" value="" />
                    <input type="hidden" name="act" value="act_export_paipai4"/>
                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="custom_form" style="display:none">
    <form action="<?php echo U('index');?>" method="post"  name="theForm4" onsubmit="return formValidate4()">
        <table width="100%">
            <tr>
                <td>
                    <div class="main-div" style="background-color: white;">
                        <table>
                            <tr>
                                <td width="45%">
                                    <strong><?php echo L("admin_ecgoodsexport_info_page_table_th11");?></strong>
                                    <span style="margin-left:20px;">
                                        <select name="goods_type" id="goods_type">
                                            <option value="0"><?php echo L("admin_ecgoodsexport_info_page_table_th12");?></option>
                                            <?php echo $goods_type_list;?>
                                        </select>
                                    </span>
                                </td>
                                <td rowspan="2" width="5%" style="text-align:center;">
                                    <p><input type="button" value=">>" id="addAllItem" class="button" /></p>
                                    <p><input type="button" value=">" id="addItem" class="button" /></p>
                                    <p><input type="button" value="<" id="delItem" class="button" /></p>
                                    <p><input type="button" value="<<" id="delAllItem" class="button" /></p>
                                </td>
                                <td width="45%"><strong><?php echo L("admin_ecgoodsexport_info_page_table_th13");?></strong></td>
                                <td rowspan="2" width="5%" style="text-align:center;">
                                    <p><input type="button" value="<?php echo L("admin_ecgoodsexport_info_page_table_th14");?>" id="mvUp" class="button" /></p>
                                    <p><input type="button" value="<?php echo L("admin_ecgoodsexport_info_page_table_th15");?>" id="mvDown" class="button" /></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="src_goods_fields" id="src_goods_fields" size="14" style="width:100%" multiple="true">
                                        <?php if(isset($goods_fields) && !empty($goods_fields)):$arr["options"]=$goods_fields;$arr["selected"]=null;echo html_options($arr);endif;
?>
                                    </select>
                                </td>
                                <td>
                                    <select name="dst_goods_fields" id="dst_goods_fields" size="14" style="width:100%" multiple="true">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><?php echo L("admin_ecgoodsexport_info_page_table_th10");?></td>
                                <td>
                                    <select name="charset_custom" >
                                        <option value="UTF8">UTF8</option>
                                        <option value="GB2312">GB2312</option>
                                        <option value="GBK">GBK</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <input name="cat_id" type="hidden" value="" />
                                    <input name="brand_id" type="hidden" value="" />
                                    <input name="keyword" type="hidden" value="" />
                                    <input name="goods_ids" type="hidden" value="" />
                                    <input type="hidden" name="act" value="act_export_custom"/>
                                    <input type="hidden" name="custom_goods_export" value=""/>
                                    <input name="submit" type="submit" id="submit" value="<?php echo L("admin_ecgoodsexport_info_page_table_btn2");?>" class="button" />
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script language="JavaScript">
var post_express_not_null = "<?php echo L("admin_ecgoodsexport_js_post_express_not_null");?>";
var express_not_null = "<?php echo L("admin_ecgoodsexport_js_express_not_null");?>";
var ems_not_null = "<?php echo L("admin_ecgoodsexport_js_ems_not_null");?>";
var custom_goods_field_not_null = "<?php echo L("admin_ecgoodsexport_js_custom_goods_field_not_null");?>";

var elements;

function formValidate0()
{
    var src_obj = document.forms['searchForm'];
    var dst_obj = document.forms['theForm'];
    copy_search_result(src_obj, dst_obj);
    return true;
}

/**
 * 检查输入是否完整
 */
function formValidate2()
{
    var elements = document.forms['theForm2'].elements;
    var msg = '';

    if (parseFloat(elements['post_express'].value) <= 0)
    {
        msg += post_express_not_null + '\n';
    }
    if (parseFloat(elements['express'].value) <= 0)
    {
        msg += express_not_null + '\n';
    }
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        var src_obj = document.forms['searchForm'];
        var dst_obj = document.forms['theForm2'];
        copy_search_result(src_obj, dst_obj);
        return true;
    }
}

/**
 * 检查输入是否完整
 */
function formValidate1()
{
    var elements = document.forms['theForm1'].elements;
    var msg = '';

    if (parseFloat(elements['post_express'].value) <= 0)
    {
        msg += post_express_not_null + '\n';
    }
    if (parseFloat(elements['express'].value) <= 0)
    {
        msg += express_not_null + '\n';
    }
    if (parseFloat(elements['ems'].value) <= 0)
    {
        msg += ems_not_null + '\n';
    }
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        var src_obj = document.forms['searchForm'];
        var dst_obj = document.forms['theForm1'];
        copy_search_result(src_obj, dst_obj);
        return true;
    }
}
    
/**
 * 检查输入是否完整
 */
function formValidate3()
{
    var elements = document.forms['theForm3'].elements;
    var msg = '';

    if (parseFloat(elements['post_express'].value) <= 0)
    {
        msg += post_express_not_null + '\n';
    }
    if (parseFloat(elements['express'].value) <= 0)
    {
        msg += express_not_null + '\n';
    }
    if (parseFloat(elements['ems'].value) <= 0)
    {
        msg += ems_not_null + '\n';
    }
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        var src_obj = document.forms['searchForm'];
        var dst_obj = document.forms['theForm3'];
        copy_search_result(src_obj, dst_obj);
        return true;
    }
}

/**
 * 检查输入是否完整
 */
function formValidate6()
{
    var elements = document.forms['theForm6'].elements;
    var msg = '';

    if (parseFloat(elements['post_express'].value) <= 0)
    {
        msg += post_express_not_null + '\n';
    }
    if (parseFloat(elements['express'].value) <= 0)
    {
        msg += express_not_null + '\n';
    }
    if (parseFloat(elements['ems'].value) <= 0)
    {
        msg += ems_not_null + '\n';
    }
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        var src_obj = document.forms['searchForm'];
        var dst_obj = document.forms['theForm6'];
        copy_search_result(src_obj, dst_obj);
        return true;
    }
}
    


/* 检查输入是否完整 */
function formValidate4 ()
{
    var elements = document.forms['theForm4'].elements;
    var msg = '';
    if (elements['dst_goods_fields'].options.length <= 0)
    {
        msg += custom_goods_field_not_null + '\n';
    }
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        elements['custom_goods_export'].value = '';
        for (var i=0,l=elements['dst_goods_fields'].options.length; i<l; i++)
        {
            var separator = (i==0)?'':',';
            elements['custom_goods_export'].value += separator + elements['dst_goods_fields'].options[i].value;
        }
        var src_obj = document.forms['searchForm'];
        var dst_obj = document.forms['theForm4'];
        copy_search_result(src_obj, dst_obj);
        return true;
    }
}

/**
 * 检查输入是否完整
 */
function formValidate5()
{
    var elements = document.forms['theForm5'].elements;
    var msg = '';

    if (parseFloat(elements['post_express'].value) <= 0)
    {
        msg += post_express_not_null + '\n';
    }
    if (parseFloat(elements['express'].value) <= 0)
    {
        msg += express_not_null + '\n';
    }
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        var src_obj = document.forms['searchForm'];
        var dst_obj = document.forms['theForm5'];
        copy_search_result(src_obj, dst_obj);
        return true;
    }
}

function copy_search_result(src_obj, dst_obj)
{
    dst_obj.cat_id.value = src_obj.cat_id.value;
    dst_obj.brand_id.value = src_obj.brand_id.value;
    dst_obj.keyword.value = src_obj.keyword.value;
    var goods_lists = Utils.$('dst_goods_lists');
    for (var i=0,l=goods_lists.options.length; i<l; i++)
    {
        var separator = (i==0)?'':',';
        dst_obj.goods_ids.value += separator + goods_lists.options[i].value;
    }
}

/**
 * 绑定商品类型控件事件
 */
if(Utils.$('goods_type'))
{
    Utils.$('goods_type').onchange = function ()
    {
        var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=get_goods_fields&cat_id="+this.value;
        Ajax.call(ajaxurl, '' , goodsFieldsResponse , 'POST', 'JSON');
    }
}

function goodsFieldsResponse (result)
{
    if (result.error > 0)
    {
        alert(result.message);
        return;
    }
    Utils.$('src_goods_fields').innerHTML = '';
    for (var key in result.content)
    {
        if (typeof (result.content[key]) == 'string')
        {
            var new_opt = document.createElement('OPTION');
            new_opt.value = key;
            new_opt.innerHTML = result.content[key];
            Utils.$('src_goods_fields').appendChild(new_opt);
        }
    }
}

/* 搜索商品列表 */
function queryGoods(obj)
{
    var filters = new Object;
    filters.cat_id = obj.cat_id.value;
    filters.brand_id = obj.brand_id.value;
    filters.keyword = obj.keyword.value;

    var ajaxurl=CONTROL +"&m=index&is_ajax=1&act=get_goods_list";
    Ajax.call(ajaxurl, filters, queryGoodsResponse , 'POST', 'JSON');
    return false;
}
function queryGoodsResponse (result)
{
    if (result.error > 0)
    {
        alert(result.message);
        return;
    }
    Utils.$('src_goods_lists').innerHTML = '';
    for (var i=0,l=result.content.length;i<l;++i)
    {
        var new_opt = document.createElement('OPTION');
        new_opt.value = result.content[i].goods_id;
        new_opt.innerHTML = result.content[i].goods_name;
        Utils.$('src_goods_lists').appendChild(new_opt);
    }
}

/* 操作自定义导出商品的Select Box */
var MySelectBox;
var MySelectBox2;
if (!MySelectBox)
{
    var global = $import("http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/global.js","js");
    global.onload = global.onreadystatechange= function(){
        if(this.readyState && this.readyState=="loading")return;
        var selectbox = $import("http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectbox.js","js");
        selectbox.onload = selectbox.onreadystatechange = function()
        {
            if(this.readyState && this.readyState=="loading")return;
            MySelectBox = new SelectBox('src_goods_fields', 'dst_goods_fields');
            MySelectBox2 = new SelectBox('src_goods_lists', 'dst_goods_lists', true);
        }
    }
 
}

if (Utils.$('addItem'))
{
    Utils.$('addItem').onclick = function ()
    {
        MySelectBox.addItem();
    }
}
if (Utils.$('delItem'))
{
    Utils.$('delItem').onclick = function ()
    {
        MySelectBox.delItem();
    }
}
if (Utils.$('addAllItem'))
{
    Utils.$('addAllItem').onclick = function ()
    {
        MySelectBox.addItem(true);
    }
}
if (Utils.$('delAllItem'))
{
    Utils.$('delAllItem').onclick = function ()
    {
        MySelectBox.delItem(true);
    }
}
if (Utils.$('src_goods_fields'))
{
    Utils.$('src_goods_fields').ondblclick = function ()
    {
        MySelectBox.addItem();
    }
}
if (Utils.$('dst_goods_fields'))
{
    Utils.$('dst_goods_fields').ondblclick = function ()
    {
        MySelectBox.delItem();
    }
}
if (Utils.$('mvUp'))
{
    Utils.$('mvUp').onclick = function ()
    {
        MySelectBox.moveItem('up');
    }
}
if (Utils.$('mvDown'))
{
    Utils.$('mvDown').onclick = function ()
    {
        MySelectBox.moveItem('down');
    }
}


if (Utils.$('addGoods'))
{
    Utils.$('addGoods').onclick = function ()
    {
        MySelectBox2.addItem();
    }
}
if (Utils.$('delGoods'))
{
    Utils.$('delGoods').onclick = function ()
    {
        MySelectBox2.delItem();
    }
}
if (Utils.$('addAllGoods'))
{
    Utils.$('addAllGoods').onclick = function ()
    {
        MySelectBox2.addItem(true);
    }
}
if (Utils.$('delAllGoods'))
{
    Utils.$('delAllGoods').onclick = function ()
    {
        MySelectBox2.delItem(true);
    }
}
if (Utils.$('src_goods_lists'))
{
    Utils.$('src_goods_lists').ondblclick = function ()
    {
        MySelectBox2.addItem();
    }
}
if (Utils.$('dst_goods_lists'))
{
    Utils.$('dst_goods_lists').ondblclick = function ()
    {
        MySelectBox2.delItem();
    }
}

/**
 * 上一次操作的对象
 */
window.last_form = new Object;

/**
 * 初始化导出格式
 */
function init_data_format ()
{
    var _format = Utils.$('data_format');
    show_data_format(_format.value);
    _format.onchange = function ()
    {
        show_data_format(this.value);
    }
}

/**
 * 显示要导出的格式页面
 *
 * @param page string 页面
 *
 * @return void
 */
function show_data_format (page)
{
    try
    {
        window.last_form.style.display = 'none';
    }
    catch (e)
    {
    }
    var _page = Utils.$(page+'_form');
    _page.style.display = '';
    Utils.$('export_format').appendChild(_page);
    window.last_form = _page;
}

if (Browser.isIE)
{
    window.attachEvent("onload", init_data_format);
}
else
{
    window.addEventListener("load", init_data_format, false);
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
