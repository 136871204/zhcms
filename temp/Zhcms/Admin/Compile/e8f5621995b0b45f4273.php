<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>システムメニュー管理</title>
    <script type='text/javascript' src='http://www.metacms.com/zh/ZHPHP/zhphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/css/zhjs.css' rel='stylesheet' media='screen'>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/zhjs.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/js/slide.js'></script>
<script src='http://www.metacms.com/zh/ZHPHP/zhphp/../zhjs/org/cal/lhgcalendar.min.js'></script>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Node/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Node/css/css.css"/>
    <script>
    var admin_node_js_check_message1='メニュ名は必須';
    var admin_node_js_update_order_error1='ソート更新失敗';
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">メニュー一覧</a></li>
            <li><a href="<?php echo U('add',array('pid'=>0));?>">メニュー新規</a></li>
            <li><a href="javascript:zh_ajax('<?php echo U(update_cache);?>');">キャッシュ更新</a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50">ソート</td>
            <td class="w50">ID</td>
            <td>メニュー名</td>
            <td>状態</td>
            <td class="w80">タイプ</td>
            <td class="w250">操作</td>
        </tr>
        </thead>
        <?php $zh["list"]["n"]["total"]=0;if(isset($node) && !empty($node)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($node));
$zh["list"]["n"]["first"]=true;
$zh["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$zh["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($node,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$zh["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$zh["list"]["n"]["last"]=true;endif;?>

            <tr <?php if($n['pid'] == 0){?>class="top"<?php }?>>
                <td>
                    <input type="text" class="w30" value="<?php echo $n['list_order'];?>" name="list_order[<?php echo $n['nid'];?>]"/>
                </td>
                <td><?php echo $n['nid'];?></td>
                <td>
                    <?php if($n['pid'] == 0 && Data::hasChild(cache('node'),$n['nid'])){?>
                        <img src="http://www.metacms.com/Static/image/contract.gif" action="2" class="explodeCategory"/>
                    <?php }?>
                    <?php if($n['pid'] == 0){?>
                        <strong><?php echo $n['_name'];?></strong>
                        <?php  }else{ ?>
                        <?php echo $n['_name'];?>
                    <?php }?>
                </td>
                <td>
                    <?php if($n['state']==1){?>
                        表示
                        <?php  }else{ ?>
                        表示しない
                    <?php }?>
                </td>
                <td>
                    <?php if($n['type']==1){?>
                        権限メニュー
                        <?php  }else{ ?>
                        普通メニュー
                    <?php }?>
                </td>
                <td style="text-align: right">
                    <?php if($n['_level']==3){?>
                        <span class="disabled">子メニュー新規  | </span>
                    <?php  }else{ ?>
                        <a href="<?php echo U('add',array('pid'=>$n['nid']));?>">子メニュー新規</a> |
                    <?php }?>

                    <?php if($n['is_system']==0){?>
                        <a href="<?php echo U('edit',array('nid'=>$n['nid']));?>">変更</a> |
                        <a href="javascript:if(confirm('このメニュー削除しますか？'))zh_ajax('<?php echo U(del);?>',{nid:<?php echo $n['nid'];?>})">削除</a>
                    <?php  }else{ ?>
                         <span class="disabled">変更 | </span>
                         <span class="disabled">削除</span>
                    <?php }?>
                </td>
            </tr>
        <?php $zh["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <br /><br /><br /><br />
</div>
<div class="position-bottom">
    <input type="button" class="zh-success" value="ソート更新" onclick="update_order();"/>
</div>
<style type="text/css">
    img.explodeCategory {
        cursor: pointer;
    }
</style>
<script>
    //չ����Ŀ
    $(".explodeCategory").click(function () {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        switch (action) {
            case 1://չʾ
                $(tr).nextUntil('.top').show();
                $(this).attr('action', 2);
                $(this).attr('src', "http://www.metacms.com/Static/image/contract.gif");
                break;
            case 2://����
                $(tr).nextUntil('.top').hide();
                $(this).attr('action', 1);
                $(this).attr('src', "http://www.metacms.com/Static/image/explode.gif");
                break;
        }
    })
    //�ر���Ŀ����Ŀ����������Ŀ��
    $(".explodeCategory").trigger('click');
    //ȫ����������Ŀ
    function explodeCategory() {
        $(".explodeCategory").each(function (i) {
            $(this).trigger('click');
        })
    }
</script>

</body>
</html>