<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>会員情報変更</title>
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/User/js/edit.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">会員一覧</a></li>
            <li><a href="javascript:;" class="action">会員変更</a></li>
        </ul>
    </div>
    <div class="title-header">会員情報変更</div>
    <form method="post" class="zh-form" onsubmit="return zh_submit(this,'<?php echo U(index);?>')">
        <input type="hidden" name="uid" value="<?php echo $field['uid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100">ユーザ名</th>
                <td>
                    <?php echo $field['username'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">会員グループ</th>
                <td>
                    <select name="rid">
                        <?php $zh["list"]["r"]["total"]=0;if(isset($role) && !empty($role)):$_id_r=0;$_index_r=0;$lastr=min(1000,count($role));
$zh["list"]["r"]["first"]=true;
$zh["list"]["r"]["last"]=false;
$_total_r=ceil($lastr/1);$zh["list"]["r"]["total"]=$_total_r;
$_data_r = array_slice($role,0,$lastr);
if(count($_data_r)==0):echo "";
else:
foreach($_data_r as $key=>$r):
if(($_id_r)%1==0):$_id_r++;else:$_id_r++;continue;endif;
$zh["list"]["r"]["index"]=++$_index_r;
if($_index_r>=$_total_r):$zh["list"]["r"]["last"]=true;endif;?>

                            <option value="<?php echo $r['rid'];?>"
                            <?php if($field['rid'] == $r['rid']){?>selected=""<?php }?>
                            ><?php echo $r['rname'];?></option>
                        <?php $zh["list"]["r"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">ネックネーム</th>
                <td>
                    <?php echo $field['nickname'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">ロック時間</th>
                <td>
                    <label>
                    	<input type="text"  name="lock_end_time" id="lock_end_time" value="<?php echo date('Y/m/d',$field['lock_end_time']);?>"/>
                    	<script>
                    		$('#lock_end_time').calendar({format: 'yyyy/MM/dd'})
                    	</script>
                    	<span id="zh_lock_end_time" class="validate-message">この時間を越えると、自動的にロック解消</span>
                </td>
            </tr>
            <tr>
                <th class="w100">パスワード</th>
                <td>
                    <input type="password" name="password" value="" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">確認パスワード</th>
                <td>
                    <input type="password" name="password_c" value="" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">メールアドレス</th>
                <td>
                    <input type="text" name="email" value="<?php echo $field['email'];?>" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">QQ</th>
                <td>
                    <input type="text" name="qq" value="<?php echo $field['qq'];?>" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">積分</th>
                <td>
                    <input type="text" name="credits" value="<?php echo $field['credits'];?>" class="w300" required=""/>
                </td>
            </tr>

        </table>
        <div class="position-bottom">
            <input type="submit" value="確定" class="zh-success"/>
        </div>
    </form>
</div>
</body>
</html>