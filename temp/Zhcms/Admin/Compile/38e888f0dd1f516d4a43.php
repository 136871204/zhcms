<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Field管理</title>
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
    <link type="text/css" rel="stylesheet" href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Field/css/css.css"/>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Field/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Model/index');?>">Model一覧</a></li>
            <li><a href="javascript:;" class="action">Field一覧</a></li>
            <li><a href="<?php echo U('add',array('mid'=>$_GET['mid']));?>">Field新規</a></li>
            <li><a href="javascript:;" onclick="zh_ajax('<?php echo U(updateCache);?>',{mid:<?php echo $_GET['mid'];?>})">キャッシュ更新</a></li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w50">ソート</td>
            <td class="w50">Fid</td>
            <td class="w200">説明</td>
            <td>Field名</td>
            <td class="w200">テーブル名</td>
            <td class="w100">タイプ</td>
            <td class="w80">システム</td>
            <td class="w80">必須</td>
            <td class="w80">検索</td>
            <td class="w80">投稿</td>
            <td class="w120">操作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </thead>
        <tbody>
        <?php $zh["list"]["f"]["total"]=0;if(isset($field) && !empty($field)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($field));
$zh["list"]["f"]["first"]=true;
$zh["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$zh["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($field,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$zh["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$zh["list"]["f"]["last"]=true;endif;?>

            <tr>
                <td>
                    <input type="text" name="fieldsort[<?php echo $f['fid'];?>]" class="w30" value="<?php echo $f['fieldsort'];?>"/>
                </td>
                <td>
                    <?php echo $f['fid'];?>
                </td>
                <td><?php echo $f['title'];?></td>
                <td><?php echo $f['field_name'];?></td>
                <td><?php echo $f['table_name'];?></td>
                <td><?php echo $f['field_type'];?></td>
                <td>
                    <?php if($f['is_system']){?>
                    	<font color="red">√</font>
                        <?php  }else{ ?><font color="blue">×</font>
                    <?php }?>
                </td>
                <td>
                    <?php if($f['required']){?>
                    	<font color="red">√</font>
                        <?php  }else{ ?><font color="blue">×</font>
                    <?php }?>
                </td>
                <td>
                    <?php if($f['issearch']){?>
                    	<font color="red">√</font>
                        <?php  }else{ ?><font color="blue">×</font>
                    <?php }?>
                </td>
                <td>
                    <?php if($f['isadd']){?>
                    	<font color="red">√</font>
                        <?php  }else{ ?><font color="blue">×</font>
                    <?php }?>
                </td>
                <td>
                	 <a href="<?php echo U('edit',array('mid'=>$f['mid'],'fid'=>$f['fid']));?>">変更</a>       
                	 |
                	 <?php if(in_array($f['field_name'],$noallowforbidden)){?>
                	 	<span style='color:#666'>禁じる</span>
                	 	<?php }else if($f['field_state']==1){?>
                   <a href="javascript:zh_ajax('<?php echo U(forbidden);?>',{fid:<?php echo $f['fid'];?>,field_state:0,mid:<?php echo $f['mid'];?>})" >禁じる</a>             
                   		<?php }else{?>
                   		<a href="javascript:zh_ajax('<?php echo U(forbidden);?>',{fid:<?php echo $f['fid'];?>,field_state:1,mid:<?php echo $f['mid'];?>},'http://www.metacms.com/index.php?a=Admin&c=Field&m=index&mid=19')" style='color:red'>禁じない</a>			
                   			<?php }?>
                    |
                    <?php if(in_array($f['field_name'],$noallowdelete)):?>
                			<span style='color:#666'>削除</span>
                	<?php else:?>
                		 <a href="javascript:"
                       onclick="return confirm('【<?php echo $f['title'];?>】を削除しますか？')?zh_ajax('<?php echo U(del);?>',{mid:<?php echo $f['mid'];?>,fid:<?php echo $f['fid'];?>}):false;">削除</a>
                	<?php endif;?>
                   
                </td>
            </tr>
        <?php $zh["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </tbody>
    </table>
    <br /><br /><br />
    <div class="position-bottom">
        <input type="button" class="zh-success" onclick="update_sort(<?php echo $_GET['mid'];?>);" value="ソート"/>
    </div>
</div>
</body>
</html>