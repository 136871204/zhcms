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
    var topic_name_empty = "请输入专题名称!";
    var start_time_empty = "请选择专题开始时间!";
    var end_time_empty = "请选择专题结束时间!";
    var delete_topic_confirm = "确定删除选中项吗?";
    var sort_name_exist = "该分类已经存在";
    var sort_name_empty = "请输入分类名称";
    var move_item_confirm = "已选商品已经转移到\"className\"分类下";
    var item_upper_limit = "每个分类下的商品不能超过50个";
    var start_lt_end = "专题开始时间不能大于结束时间";
//-->
</script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/selectzone.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/colorselector_topic.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar.php?lang=<?php echo $_SESSION['language'];?>"></script>
<link href="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
 
<?php if($warning){?>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
    <li style="border: 1px solid #CC0000; background: #FFFFCC; padding: 10px; margin-bottom: 5px;" ><?php echo $warning;?></li>
</ul>
<?php }?>   
<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
        <p> 
            <span class="tab-front" id="general-tab">通用信息</span> 
            <span class="tab-back" id="goods-tab">专题商品</span> 
            <span class="tab-back" id="desc-tab">专题介绍</span>
            <span class="tab-back" id="advanced-tab">高级选项</span> 
        </p>
    </div>
    <!-- tab body -->
    <div id="tabbody-div">
        <form action="<?php echo U('index');?>" method="post" name="theForm" enctype="multipart/form-data">
            <table cellspacing="1"  id="general-table" cellpadding="3" width="100%">
                <tr>
                    <td class="label">专题名称</td>
                    <td><input name="topic_name" type="text" value="<?php echo $topic['title'];?>" size="40" /></td>
                </tr>
                <tr>
                    <td class="label">专题页面关键字</td>
                    <td><textarea name="keywords" id="keywords" cols="40" rows="3"><?php echo $topic['keywords'];?></textarea></td>
                </tr>
                <tr>
                    <td class="label">专题页面描述</td>
                    <td><textarea name="description" id="description" cols="40" rows="5"><?php echo $topic['description'];?></textarea></td>
                </tr>
                <tr>
                    <td class="label">图片类型</td>
                    <td>
                        <select name="topic_type" id="topic_type" onchange="showMedia(this.value)">
                            <option value='0'>图片</option>
                            <option value='1'>Flash</option>
                            <option value='2'>代码</option>
                        </select>
                    </td>
                </tr>
                <tbody id="content_01">
                    <tr>
                        <td  class="label">
                            <a href="javascript:showNotice('title_upload');" title="点击此处查看提示信息">
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                            </a>上传
                        </td>
                        <td>
                            <input type='file' name='topic_img' id='topic_img' size='35' />
                            <br />
                            <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="title_upload">
                                <?php echo $width_height;?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">或者远程URL地址</td>
                        <td><input type="text" name="url" id="url" value="" size="35" /></td>
                    </tr>
                </tbody>
                <tbody id="edit_img">
                    <tr>
                        <td class="label">&nbsp;</td>
                        <td><input type="text" name="img_url" id="img_url" value="<?php echo $topic['topic_img'];?>" size="35" readonly="readonly"/></td>
                    </tr>
                </tbody>
                <tbody id="content_23">
                    <tr>
                        <td class="label">内容</td>
                        <td><textarea name="htmls" id="htmls" cols="50" rows="7"><?php echo $topic['htmls'];?></textarea></td>
                    </tr>
                </tbody>
                <tr>
                    <td  class="label">
                        <a href="javascript:showNotice('title_pic_upload');" title="点击此处查看提示信息">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
                        </a>商品分类标题图片
                    </td>
                    <td>
                        <input type='file' name='title_pic' id='title_pic' size='35' />
                        <br />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="title_pic_upload">
                            <?php echo $title_width_height;?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label">或者远程URL地址</td>
                    <td><input type="text" name="title_url" id="title_url" value="" size="35" /></td>
                </tr>
                <tbody id="edit_title_img">
                    <tr>
                        <td class="label">&nbsp;</td>
                        <td><input type="text" name="title_img_url" id="title_img_url" value="<?php echo $topic['title_pic'];?>" size="35" readonly="readonly"/></td>
                    </tr>
                </tbody>
                <tr>
                    <td class="label">基本风格样式</td>
                    <td>
                        <input type="text" name="base_style" id="base_style" value="<?php echo $topic['base_style'];?>" size="7" maxlength="6" style="float:left;color:<?php echo $goods_name_color;?>;" size="30"/>
                        <div style="background-color:#<?php echo $topic['base_style'];?>;float:left;margin-left:2px;" id="font_color" onclick="ColorSelecter.Show(this);">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/color_selecter.gif" style="margin-top:-1px;" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label">活动周期</td>
                    <td>
                        <input name="start_time" type="text" id="start_time" size="12" value='<?php echo $topic['start_time'];?>' readonly="readonly" />
                        <input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"/>
                        -
                        <input name="end_time" type="text" id="end_time" size="12" value='<?php echo $topic['end_time'];?>' readonly="readonly" />
                        <input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('end_time', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button"/>
                    </td>
                </tr>
            </table>
            <table width="90%" border="0"  align="center" cellpadding="0" cellspacing="0" id="goods-table" style="display:none;" >
                <tr>
                    <td colspan="4" class="label" style="text-align:left">
                        专题分类
                        <select name="topic_class_list" id="topic_class_list" onchange="showTargetList()">
                        </select>
                        <input name="new_cat_name" type="text" id="new_cat_name" />
                        <input name="create_class_btn" type="button" id="create_class_btn" value="添加" class="button" onclick="addClass()" />
                        <input name="delete_class_btn" type="button" id="delete_class_btn" value="移除" class="button" onclick="deleteClass()" />          
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
                        <select name="cat_id2">
                            <option value="0">所有分类</option>
                            <?php echo $cat_list;?>
                        </select>
                        <select name="brand_id2">
                            <option value="0">所有品牌</option>
                            <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=null;echo html_options($arr);endif;
?>
                        </select>
                        <input type="text" name="keyword2"/>
                        <input name="button" type="button" class="button" onclick="searchGoods('cat_id2', 'brand_id2', 'keyword2')" value="搜索" />          
                    </td>
                </tr>
                <!-- 商品列表 -->
                <tr height="37">
                    <th>可选商品</th>
                    <th>操作</th>
                    <th>已选商品</th>
                </tr>
                <tr>
                    <td width="42%">
                        <select name="source_select" id="source_select" size="20" style="width:100%;height:300px;"  ondblclick="addItem(this)">
                        </select>          
                    </td>
                    <td align="center">
                        <p>
                            <input name="button" type="button" class="button" onclick="addAllItem(document.getElementById('source_select'))" value="&gt;&gt;" />
                        </p>
                        <p>
                            <input name="button" type="button" class="button" onclick="addItem(document.getElementById('source_select'))" value="&gt;" />
                        </p>
                        <p>
                            <input name="button" type="button" class="button" onclick="removeItem(document.getElementById('target_select'))" value="&lt;" />
                        </p>
                        <p>
                            <input name="button" type="button" class="button" value="&lt;&lt;" onclick="removeItem(document.getElementById('target_select'), true)" />
                        </p>
                    </td>
                    <td width="42%">
                        <select name="target_select" id="target_select" size="20" style="width:100%;height:300px" multiple="multiple">
                        </select>          
                    </td>
                </tr>
            </table>
            <table width="90%" border="0"  align="center" cellpadding="0" cellspacing="0" id="desc-table" style="display:none;">
                <tr>
                    <td><script type="text/javascript" charset="utf-8" src="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://www.works.com/zh/ZHPHP/zhphp/Extend/Org/Ueditor/"</script><script id="zh_topic_intro" name="topic_intro" type="text/plain"><?php echo $topic['intro'];?></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('zh_topic_intro',{
                imageUrl:'http://www.works.com/index.php?a=Admin&c=EcTopic&act=add&m=ueditor_upload&g=Zhcms&water=0&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
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
        </script></td>
                </tr>
            </table>
            <table width="90%" border="0"  align="center" cellpadding="0" cellspacing="0" id="advanced-table" style="display:none;">
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeTemplateFile');" title="点击此处查看提示信息">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                        </a>专题模板文件
                    </td>
                    <td >
                        <input name="topic_template_file" type="text" id="topic_template_file" value="<?php echo $topic['template'];?>" size="40" />
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeTemplateFile">
                            填写当前专题的模板文件名,模板文件应上传到当前商城模板目录下,不填写将调用默认模板。
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="label">
                        <a href="javascript:showNotice('noticeCss');" title="点击此处查看提示信息">
                            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"/>
                        </a>专题样式表
                    </td>
                    <td >
                        <textarea name="topic_css" id="topic_css" cols="40" rows="5"><?php echo $topic['css'];?></textarea>
                        <span class="notice-span" <?php if($help_open){?>style="display:block" <?php  }else{ ?> style="display:none" <?php }?> id="noticeCss">
                            填写当前专题的CSS样式代码,不填写将调用模板默认CSS文件
                        </span>
                        <div> 
                            <a href="javascript:chanageSize(3,'topic_css');">[+]</a> <a href="javascript:chanageSize(-3,'topic_css');">[-]</a> 
                        </div>
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input  name="topic_data" type="hidden" id="topic_data" value='' />
                <input  name="act" type="hidden" id="act" value='<?php echo $act;?>' />
                <input  name="topic_id" type="hidden" id="topic_id" value='<?php echo $topic['topic_id'];?>' />
                <input type="submit"  name="Submit"       value="确定" class="button" onclick="return checkForm()"/>
                <input type="reset"   name="Reset"        value="重置" class="button"/>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/validator.js"></script>
<script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/tab.js"></script>
<script type="Text/Javascript" language="JavaScript">

    var data = '<?php echo $topic['data'];?>';
    var defaultClass = "无分类";
    var myTopic = Object();
    var status_code = "<?php echo $topic['topic_type'];?>"; // 初始页面参数
    
    onload = function()
    {
        var classList = document.getElementById("topic_class_list");
        // 初始化表单项
        initialize_form(status_code);
        
        if (data == "")
        {
            classList.innerHTML = "";
            myTopic['default'] = new Array();
            
            var newOpt    = document.createElement("OPTION");
            newOpt.value  = -1;
            newOpt.text   = defaultClass;
            classList.options.add(newOpt);
            return;
        }
        
        var temp    = data.parseJSON();
        var counter = 0;
        for (var k in temp)
        {
            if(typeof(myTopic[k]) != "function")
            {
                myTopic[k] = temp[k];
                var newOpt    = document.createElement("OPTION");
                newOpt.value  = k == "default" ? -1 : counter;
                newOpt.text   = k == "default" ? defaultClass : k;
                classList.options.add(newOpt);
                counter++;
            }
        }
        showTargetList();
    }
    
    /**
     * 初始化表单项目
     */
    function initialize_form(status_code)
    {
        var nt = navigator_type();
        var display_yes = (nt == 'IE') ? 'block' : 'table-row-group';
        status_code = parseInt(status_code);
        status_code = status_code ? status_code : 0;
        document.getElementById('topic_type').options[status_code].selected = true;
        
        switch (status_code)
        {
            case 0 :
                document.getElementById('content_01').style.display = display_yes;
                document.getElementById('content_23').style.display = 'none';
                document.getElementById('title_upload').innerHTML = '<?php echo $width_height;?>';
                document.getElementById('edit_img').style.display = display_yes;
            break;
            
            case 1 :
                document.getElementById('content_01').style.display = display_yes;
                document.getElementById('content_23').style.display = 'none';
                document.getElementById('title_upload').innerHTML = '上传该广告的图片文件,或者你也可以指定一个远程URL地址为广告的图片';
                document.getElementById('edit_img').style.display = display_yes;
            break;
            
            case 2 :
                document.getElementById('content_01').style.display = 'none';
                document.getElementById('content_23').style.display = display_yes;
                document.getElementById('edit_img').style.display = 'none';
            break;
        }
        
        <?php if($isadd == 'isadd'){?>
        document.getElementById('edit_img').style.display = 'none';
	    document.getElementById('edit_title_img').style.display = 'none';
        <?php }?>
        
        
    }
    
    /**
    * 类型表单项切换
    */
    function showMedia(code)
    {
        var obj = document.getElementById('topic_type');
        
        initialize_form(code);
    }


    function checkForm()
    {
        var validator = new Validator('theForm');
        validator.required('topic_name', topic_name_empty);
        validator.required('start_time', start_time_empty);
        validator.required('end_time', end_time_empty);
        validator.islt('start_time', 'end_time', start_lt_end);
        var tempstr=JSON.stringify(myTopic);
        document.getElementById("topic_data").value = tempstr;
        
        return validator.passed();
    }

    function chanageSize(num, id)
    {
        var obj = document.getElementById(id);
        if (obj.tagName == "TEXTAREA")
        {
            var tmp = parseInt(obj.rows);
            tmp += num;
            if (tmp <= 0) return;
                obj.rows = tmp;
        }
    }

    function searchGoods(catId, brandId, keyword)
    {
        var elements = document.forms['theForm'].elements;
        var filters = new Object;
        filters.cat_id = elements[catId].value;
        filters.brand_id = elements[brandId].value;
        filters.keyword = Utils.trim(elements[keyword].value);
        Ajax.call("<?php echo U('index');?>&act=get_goods_list", filters, 
            function(result)
            {
                clearOptions("source_select");
                var obj = document.getElementById("source_select");
                for (var i=0; i < result.content.length; i++)
                {
                    var opt   = document.createElement("OPTION");
                    opt.value = result.content[i].value;
                    opt.text  = result.content[i].text;
                    opt.id    = result.content[i].data;
                    obj.options.add(opt);
                }
            }, "GET", "JSON");
    }


    function clearOptions(id)
    {
        var obj = document.getElementById(id);
        while(obj.options.length>0)
        {
            obj.remove(0);
        }
    }
    
    function addAllItem(sender)
    {
        if(sender.options.length == 0) return false;
        for (var i = 0; i < sender.options.length; i++)
        {
            var opt = sender.options[i];
            addItem(null, opt.value, opt.text);
        }
    }
    
    function addItem(sender, value, text)
    {
        var target_select = document.getElementById("target_select");
        var sortList = document.getElementById("topic_class_list");
        var newOpt   = document.createElement("OPTION");
        if (sender != null)
        {
            if(sender.options.length == 0) return false;
            var option = sender.options[sender.selectedIndex];
            newOpt.value = option.value;
            newOpt.text  = option.text;
        }
        else
        {
            newOpt.value = value;
            newOpt.text  = text;
        }
        if (targetItemExist(newOpt)) return false;
        if (target_select.length>=50)
        {
            alert(item_upper_limit);
        }
            target_select.options.add(newOpt);
            var key = sortList.options[sortList.selectedIndex].value == "-1" ? "default" : sortList.options[sortList.selectedIndex].text;
            
        if(!myTopic[key])
        {
            myTopic[key] = new Array();
        }
        myTopic[key].push(newOpt.text + "|" + newOpt.value);
    }
    
    // 商品是否存在
    function targetItemExist(opt)
    {
        var options = document.getElementById("target_select").options;
        for ( var i = 0; i < options.length; i++)
        {
            if(options[i].text == opt.text && options[i].value == opt.value) 
            {
                return true;
            }
        }
        return false;
    }
    
    function addClass()
    {
        var obj = document.getElementById("topic_class_list");
        var newClassName = document.getElementById("new_cat_name");
        var regExp = /^[a-zA-Z0-9]+$/;
        if (newClassName.value == ""){
            alert(sort_name_empty);
            return;
        }   
        for(var i=0;i < obj.options.length; i++)
        {
            if(obj.options[i].text == newClassName.value)
            {
                alert(sort_name_exist);
                newClassName.focus(); 
                return;
            }
        }
        
        var className = document.getElementById("new_cat_name").value;
        document.getElementById("new_cat_name").value = "";
        var newOpt    = document.createElement("OPTION");
        newOpt.value  = obj.options.length;
        newOpt.text   = className;
        obj.options.add(newOpt);
        newOpt.selected = true;
        if ( obj.options[0].value == "-1")
        {
            if (myTopic["default"].length > 0)
                alert(move_item_confirm.replace("className",className));
            myTopic[className] = myTopic["default"];
            delete myTopic["default"];
            obj.remove(0);
        }
        else
        {
            myTopic[className] = new Array();
            clearOptions("target_select");
        }
    }
    
    function deleteClass()
    {
        var classList = document.getElementById("topic_class_list");
        if (classList.value != "-1")
        {
            delete myTopic[classList.options[classList.selectedIndex].text];
            classList.remove(classList.selectedIndex);
            clearOptions("target_select");
        }
        if (classList.options.length < 1)
        {
            var newOpt    = document.createElement("OPTION");
            newOpt.value  = "-1";
            newOpt.text   = defaultClass;
            classList.options.add(newOpt);
            myTopic["default"] = new Array();
        }
    }
    
    function showTargetList()
    {
        clearOptions("target_select");
        var obj = document.getElementById("topic_class_list");
        var index = obj.options[obj.selectedIndex].text;
        if (index == defaultClass)
        {
            index = "default";
        }
        var options = myTopic[index];
        
        for ( var i = 0; i < options.length; i++)
        {
            var newOpt    = document.createElement("OPTION");
            var arr = options[i].split('|');
            newOpt.value  = arr[1];
            newOpt.text   = arr[0];
            document.getElementById("target_select").options.add(newOpt);
        }
    }
    
    function removeItem(sender,isAll)
    {
        var classList = document.getElementById("topic_class_list");
        var key = 'default';
        if (classList.value != "-1")
        {
            key = classList.options[classList.selectedIndex].text;
        }
        var arr = myTopic[key];
        if (!isAll)
        {
            var goodsName = sender.options[sender.selectedIndex].text;
            for (var j = 0; j < arr.length; j++)
            {
                if (arr[j].indexOf(goodsName) >= 0)
                {
                    myTopic[key].splice(j,1);
                }
            }
            
            for (var i = 0; i < sender.options.length;)
            {
                if (sender.options[i].selected) {
                    sender.remove(i);
                    myTopic[key].splice(i, 0);
                }
                else
                {
                    i++;
                }
            }
        }
        else
        {
            myTopic[key] = new Array();
            sender.innerHTML = "";
        }
    }
    
    /**
     * 判断当前浏览器类型
     */
    function navigator_type()
    {
        var type_name = '';
        
        if (navigator.userAgent.indexOf('MSIE') != -1)
        {
            type_name = 'IE'; // IE
        }
        else if(navigator.userAgent.indexOf('Firefox') != -1)
        {
            type_name = 'FF'; // FF
        }
        else if(navigator.userAgent.indexOf('Opera') != -1)
        {
            type_name = 'Opera'; // Opera
        }
        else if(navigator.userAgent.indexOf('Safari') != -1)
        {
            type_name = 'Safari'; // Safari
        }
        else if(navigator.userAgent.indexOf('Chrome') != -1)
        {
            type_name = 'Chrome'; // Chrome
        }
        
        return type_name;
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


