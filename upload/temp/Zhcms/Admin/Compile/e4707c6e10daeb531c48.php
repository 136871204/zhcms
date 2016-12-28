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
    var no_title = "<?php echo L("admin_ecarticle_js_no_title");?>";
    var no_cat = "<?php echo L("admin_ecarticle_js_no_cat");?>";
    var not_allow_add = "<?php echo L("admin_ecarticle_js_not_allow_add");?>";
    var drop_confirm = "<?php echo L("admin_ecarticle_js_drop_confirm");?>";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectzone.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>


<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab"><?php echo L("admin_ecarticle_info_page_article_info1");?></span>
            <span class="tab-back" id="detail-tab"><?php echo L("admin_ecarticle_info_page_article_info2");?></span>
            <span class="tab-back" id="goods-tab"><?php echo L("admin_ecarticle_info_page_article_info3");?></span>
        </p>
    </div>
    <div id="tabbody-div">
        <form  action="<?php echo U('index');?>" method="post" enctype="multipart/form-data" name="theForm" onsubmit="return validate();">
            <table width="90%" id="general-table">
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_control_index_insert3");?></td>
                    <td>
                        <input type="text" name="title" size ="40" maxlength="60" value="<?php echo $article['title'];?>" />
                        <span class="require-field">*</span>
                    </td>
                </tr>   
                <?php if($article['cat_id'] >= 0){?>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_list5");?>  </td>
                    <td>
                        <select name="article_cat" onchange="catChanged()">
                            <option value="0"><?php echo L("admin_ecarticle_info_page_article_list18");?></option>
                            <?php echo $cat_select;?>
                        </select>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <?php  }else{ ?>
                <input type="hidden" name="article_cat" value="-1" />
                <?php }?>
                <?php if($article['cat_id'] >= 0){?>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_list6");?></td>
                    <td>
                        <input type="radio" name="article_type" value="0" <?php if($article['article_type'] == 0){?>checked<?php }?>><?php echo L("admin_ecarticle_info_page_article_list11");?>
                        <input type="radio" name="article_type" value="1" <?php if($article['article_type'] == 1){?>checked<?php }?>><?php echo L("admin_ecarticle_info_page_article_list12");?>
                        <span class="require-field">*</span>        
                    </td>
                </tr>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_list7");?></td>
                    <td>
                        <input type="radio" name="is_open" value="1" <?php if($article['is_open'] == 1){?>checked<?php }?>> <?php echo L("admin_ecarticle_info_page_article_info4");?>
                        <input type="radio" name="is_open" value="0" <?php if($article['is_open'] == 0){?>checked<?php }?>> <?php echo L("admin_ecarticle_info_page_article_info5");?>
                        <span class="require-field">*</span>      
                    </td>
                </tr>
                <?php  }else{ ?>
                <tr style="display:none">
                    <td colspan="2">
                        <input type="hidden" name="article_type" value="0" />
                        <input type="hidden" name="is_open" value="1" />
                    </td>
                </tr>
                <?php }?>  
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_info6");?></td>
                    <td><input type="text" name="author" maxlength="60" value="<?php echo $article['author'];?>" /></td>
                </tr>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_info7");?></td>
                    <td><input type="text" name="author_email" maxlength="60" value="<?php echo $article['author_email'];?>" /></td>
                </tr>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_info8");?></td>
                    <td><input type="text" name="keywords" maxlength="60" value="<?php echo $article['keywords'];?>" /></td>
                </tr>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_info9");?></td>
                    <td><textarea name="description" id="description" cols="40" rows="5"><?php echo $article['description'];?></textarea></td>
                </tr>   
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_info10");?></td>
                    <td>
                        <input name="link_url" type="text" id="link_url" value="<?php if($article['link'] <> ''){?><?php echo htmlspecialchars($article['link']);?><?php  }else{ ?>http://<?php }?>" maxlength="60" />
                    </td>
                </tr>
                <tr>
                    <td class="narrow-label"><?php echo L("admin_ecarticle_info_page_article_info11");?></td>
                    <td>
                        <input type="file" name="file"/>
                        <span class="narrow-label">
                            <?php echo L("admin_ecarticle_info_page_article_info12");?>
                            <input name="file_url" type="text" value="<?php echo $article['file_url'];?>" size="30" maxlength="255" />
                        </span>
                    </td>
                </tr>
            </table>
            <table width="90%" id="detail-table" style="display:none">
                <tr>
                    <td>
                        <script type="text/javascript" charset="utf-8" src="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/"</script><script id="zh_FCKeditor1" name="FCKeditor1" type="text/plain"><?php echo $article['content'];?></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('zh_FCKeditor1',{
                imageUrl:'http://www.works.com/index.php?a=Admin&c=EcArticle&act=add&m=ueditor_upload&g=Zhcms&water=0&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
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
            <table width="90%" id="goods-table" style="display:none">
                <!-- 商品搜索 -->
                <tr>
                    <td colspan="5">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
                        <!-- 分类 -->
                        <select name="cat_id">
                            <option value="0"><?php echo L("admin_ecarticle_info_page_article_info13");?></option>
                            <?php echo $goods_cat_list;?>
                        </select>
                        <!-- 品牌 -->
                        <select name="brand_id">
                            <option value="0"><?php echo L("admin_ecarticle_info_page_article_info14");?></option>
                            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                        </select>
                        <!-- 关键字 -->
                        <input type="text" name="keyword" size="30" />
                        <input type="button" value="<?php echo L("admin_ecarticle_info_page_article_info15");?>" onclick="searchGoods()" class="button" />
                    </td>
                </tr>
                <!-- 商品列表 -->
                <tr>
                    <th></th>
                    <th><?php echo L("admin_ecarticle_info_page_article_list9");?></th>
                    <th></th>
                </tr>
                <tr>
                    <td width="45%" align="center">
                        <select name="source_select" size="20" style="width:90%" ondblclick="sz.addItem(false, 'add_link_goods', articleId)" multiple="true">
                        </select>
                    </td>
                    <td align="center">
                        <p><input type="button" value="&gt;&gt;" onclick="sz.addItem(true, 'add_link_goods', articleId)" class="button" /></p>
                        <p><input type="button" value="&gt;" onclick="sz.addItem(false, 'add_link_goods', articleId)" class="button" /></p>
                        <p><input type="button" value="&lt;" onclick="sz.dropItem(false, 'drop_link_goods', articleId)" class="button" /></p>
                        <p><input type="button" value="&lt;&lt;" onclick="sz.dropItem(true, 'drop_link_goods', articleId)" class="button" /></p>
                    </td>
                    <td width="45%" align="center">
                        <select name="target_select" multiple="true" size="20" style="width:90%" ondblclick="sz.dropItem(false, 'drop_link_goods', articleId)">
                            <?php if(is_array($goods_list)):?><?php $index=0; ?><?php  foreach($goods_list as $goods){ ?>
                                <option value="<?php echo $goods['goods_id'];?>"><?php echo $goods['goods_name'];?></option>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input type="hidden" name="act" value="<?php echo $form_action;?>" />
                <input type="hidden" name="old_title" value="<?php echo $article['title'];?>"/>
                <input type="hidden" name="id" value="<?php echo $article['article_id'];?>" />
                <input type="submit" value="<?php echo L("admin_ecarticle_info_page_article_list23");?>" class="button"  />
                <input type="reset" value="<?php echo L("admin_ecarticle_info_page_article_info16");?>" class="button" />
            </div>
        </form>
    </div>
</div>

<script language="JavaScript">

var articleId = <?php echo default_value($article['article_id'],0);?>;
var elements  = document.forms['theForm'].elements;
var sz        = new SelectZone(1, elements['source_select'], elements['target_select'], '');

onload = function()
{
    // 开始检查订单
    //startCheckOrder();
}

function validate()
{
    var validator = new Validator('theForm');
    validator.required('title', no_title);
    
    <?php if($article['cat_id'] >= 0){?>
    validator.isNullOption('article_cat',no_cat);
    <?php }?>
    
    
    return validator.passed();
}

document.getElementById("tabbar-div").onmouseover = function(e)
{
    var obj = Utils.srcElement(e);

    if (obj.className == "tab-back")
    {
        obj.className = "tab-hover";
    }
}

document.getElementById("tabbar-div").onmouseout = function(e)
{
    var obj = Utils.srcElement(e);

    if (obj.className == "tab-hover")
    {
        obj.className = "tab-back";
    }
}

document.getElementById("tabbar-div").onclick = function(e)
{
    var obj = Utils.srcElement(e);

    if (obj.className == "tab-front")
    {
        return;
    }
    else
    {
        objTable = obj.id.substring(0, obj.id.lastIndexOf("-")) + "-table";

        var tables = document.getElementsByTagName("table");
        var spans  = document.getElementsByTagName("span");

        for (i = 0; i < tables.length; i++)
        {
            if (tables[i].id == objTable)
            {
                tables[i].style.display = (Browser.isIE) ? "block" : "table";
            }
            else
            {
                tables[i].style.display = "none";
            }
        }
        for (i = 0; spans.length; i++)
        {
            if (spans[i].className == "tab-front")
            {
                spans[i].className = "tab-back";
                obj.className = "tab-front";
                break;
            }
        }
    }
}

function showNotice(objId)
{
    var obj = document.getElementById(objId);

    if (obj)
    {
        if (obj.style.display != "block")
        {
            obj.style.display = "block";
        }
        else
        {
            obj.style.display = "none";
        }
    }
}

function searchGoods()
{
    var elements  = document.forms['theForm'].elements;
    var filters   = new Object;

    filters.cat_id = elements['cat_id'].value;
    filters.brand_id = elements['brand_id'].value;
    filters.keyword = Utils.trim(elements['keyword'].value);

    sz.loadOptions('get_goods_list', filters);
}

/**
 * 选取上级分类时判断选定的分类是不是底层分类
 */
function catChanged()
{
    var obj = document.forms['theForm'].elements['article_cat'];
    
    cat_type = obj.options[obj.selectedIndex].getAttribute('cat_type');
    if (cat_type == undefined)
    {
        cat_type = 1;
    }
    
    if ((obj.selectedIndex > 0) && (cat_type == 2 || cat_type == 4))
    {
        alert(not_allow_add);
        obj.selectedIndex = 0;
        return false;
    }
    
    return true;
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

