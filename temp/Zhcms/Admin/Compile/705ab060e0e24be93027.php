<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容ページ作成</title>
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
    <script>
        //栏目缓存数据
        var category = <?php echo $category;?>;
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Html/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Html/css/css.css"/>

</head>
<body>
<form method="post" action="http://www.metacms.com/index.php?a=Admin&c=Html&m=create_content" class="zh-form">
    <div class="wrap">
        <div class="title-header">暖かいヒント</div>
        <div class="help">
        	作成失敗の場合、毎回作成件数を小さく設置してください
        </div>
        <div class="title-header">ルール設置</div>
        <table class="table2">
            <tr>
                <td class="w200">Modelで更新</td>
                <td class="w300">カテゴリ範囲選択</td>
                <td>操作内容選択</td>
            </tr>
            <tr>
                <td class="w200" rowspan="5">
                    <select name="mid" id="mid" style="height: 200px;width: 99%" size="2">
                        <option value="0" selected="selected">Model限定なし</option>
                        <?php $zh["list"]["m"]["total"]=0;if(isset($model) && !empty($model)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($model));
$zh["list"]["m"]["first"]=true;
$zh["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$zh["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($model,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$zh["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$zh["list"]["m"]["last"]=true;endif;?>

                            <option value="<?php echo $m['mid'];?>"><?php echo $m['model_name'];?></option>
                        <?php $zh["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
                <td class="w300" rowspan="5">
                    <select name="cid[]" id="cid" style="height: 200px;width: 99%"
                            title="Ctrl 或いは　Shiftを押しながら、複数選択できます" multiple="multiple">
                        <option value="0" selected="selected">カテゴリ限定なし</option>
                        <?php $zh["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                            <option value="<?php echo $c['cid'];?>"
                            <?php echo $c['opt'];?>><?php echo $c['catname'];?></option>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
                <td>
                    <font color="red">
                        毎回更新
                        <input class="w100" type="text" value="20" id="row" name="step_row">
                        件
                    </font></td>
                </td>
            </tr>
            <tr>
                <td> すべての情報更新 <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('all')"/>
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    最新発表の <input class="input" type="text" size="4" value="100" name="total_row"> 件内容
                    <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('new')"/>
                </td>
            </tr>
            <tr style="display: none;">
                <td>発表開始時間
                    <input class="w80" type="text" id="start_time" name="start_time"> ～
                    <input class="w80" type="text" id="end_time" name="end_time"> の内容
                    <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('time')"/>
                    <script>
                        $('#start_time').calendar({format: 'yyyy/MM/dd'});
                        $('#end_time').calendar({format: 'yyyy/MM/dd'});
                    </script>
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    更新ID <input class="input" type="text" size="4" name="start_id"> ～
                    <input class="input" type="text" size="4" name="end_id"> の内容
                    <input type="button" value="更新開始" class="zh-cancel-small" onclick="form_submit('id')"/>
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>