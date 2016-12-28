<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>友情链接-<?php echo C("webname");?></title>
    <meta name="keywords" content="<?php echo C("keyworkds");?>">
    <meta name="description" content="<?php echo C("description");?>">
    <link href="http://www.metacms.com/zh/Plugin/Link/Tpl/Index/css/style.css" rel="stylesheet" type="text/css">
    <link href="http://www.metacms.com/zh/Plugin/Link/Tpl/Index/css/about.css" rel="stylesheet" type="text/css">
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
    <script type="text/javascript" src="http://www.metacms.com/zh/Plugin/Link/Tpl/Index/js/link.js"></script>
</head>
<body>
<div id="warpper">
    <div id="g-apply" class="g-apply">
        <div class="m-apply-hd">
            <h3 class="lks-ico tit">友情链接说明</h3>
        </div>
        <div class="box clearfix">
            <div class="fl m-apply-tip">
                <strong style="color:#2C516D;font-size:14px;">友情链接说明</strong><br/>
                <?php echo nl2br($zhcms['comment']);?>
                <br>
                <strong>友链联系方式：</strong><br>
                E-mail: <a href="mailto:<?php echo $zhcms['email'];?>"><?php echo $zhcms['email'];?></a><br/>
                QQ: <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $zhcms['qq'];?>&site=qq&menu=yes" target="_blank">
                    <img border="0" title="点击这里给我发消息" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=2:1455067020:44">
                </a>
            </div>
            <div class="fr m-apply-form" style="height: 250px;">
                <strong style="color:#2C516D;font-size:14px;">图片链接代码</strong><br/>
                <textarea class="w350 h60" style="padding:5px;font-size:12px;" readonly="">
                    <a href="<?php echo $zhcms['url'];?>" target="_blank"><img title="<?php echo $zhcms['webname'];?>" alt="<?php echo $zhcms['webname'];?>" src="http://www.metacms.com/<?php echo $zhcms['logo'];?>" border="0"/></a>
                </textarea>
                <div style="margin-top: 10px;margin-bottom: 15px;">
                示例：<a href="<?php echo $zhcms['url'];?>" target="_blank" style="margin-top: 10px;"><img title="<?php echo $zhcms['webname'];?>" align="middle" class="h30" alt="<?php echo $zhcms['webname'];?>" src="http://www.metacms.com/<?php echo $zhcms['logo'];?>" border="0"/></a>
                </div>
                <strong style="color:#2C516D;font-size:14px;">文字链接代码</strong><br/>
                <textarea id="ImgCode" class="w350 h60" style="padding:5px;font-size:12px;" readonly=""><a href="<?php echo $zhcms['url'];?>" target="_blank"><?php echo $zhcms['webname'];?></a></textarea>
                <br/>
                示例：<a href="<?php echo $zhcms['url'];?>" target="_blank"><?php echo $zhcms['webname'];?></a>
            </div>
        </div>
    </div>
    <!--提交申请-->
    <div id="g-apply" class="g-apply">
        <div class="m-apply-hd"><h3 class="lks-ico tit">提交申请</h3></div>
        <form action="<?php echo U('add',array('g'=>'Plugin'));?>" method="post" enctype="multipart/form-data">
            <table class="table1 hd-form">
                <tr>
                    <th class="w100">链接分类 <span class="star">*</span></th>
                    <td>
                        <select name="tid">
                            <?php $zh["list"]["t"]["total"]=0;if(isset($type) && !empty($type)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($type));
$zh["list"]["t"]["first"]=true;
$zh["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$zh["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($type,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$zh["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$zh["list"]["t"]["last"]=true;endif;?>

                                <option value="<?php echo $t['tid'];?>"><?php echo $t['type_name'];?></option>
                            <?php $zh["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="w100">网站名称 <span class="star">*</span></th>
                    <td>
                        <input type="text" name='webname' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>网址 <span class="star">*</span></th>
                    <td>
                        <input type="text" name='url' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>logo</th>
                    <td>
                        <input type="file" name="logo"/>
                    </td>
                </tr>
                <tr>
                    <th>电子邮箱 <span class="star">*</span></th>
                    <td>
                        <input type="text" name='email' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>联系QQ</th>
                    <td>
                        <input type="text" name='qq' class="w300"/>
                    </td>
                </tr>
                <tr>
                    <th>网站介绍</th>
                    <td>
                        <textarea name="comment" class="w400 h100"></textarea>
                    </td>
                </tr>

                <?php if($conf['code'] == 1){?>
                    <tr>
                        <th>验证码</th>
                        <td>
                            <input type="text" name="code"/>
                            <img style="cursor:pointer" src="<?php echo U(code,array('g'=>'Plugin'));?>" alt="验证码"
                                 onclick="update_code()" id="code"/> <a href="javascript:update_code();">看不清，换一张</a>
                            <span id="hd_code"></span>
                        </td>
                    </tr>
                <?php }?>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="提交申请" class="zh-success"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="h50"></div>
</div>
</body>
</html>