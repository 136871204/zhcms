<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><link rel="stylesheet" type="text/css" href="http://www.metacms.com/zh/Zhcms/Index/Tpl/Comment/css/comment.css?ver=1.0"/>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Index/Tpl/Comment/js/comment.js"></script>
<script>
 	var WEB='http://www.metacms.com/index.php';
    $(function(){
    	//跳转到指定的评论
        var comment_id = '<?php echo _default($_GET['comment_id'],0);?>';
        if(comment_id){
            var id = 'c'+comment_id;
            var _top = $("#"+id).offset().top;
            $(window).scrollTop(_top);
        }
    })
</script>
<!--发表评论-->
<div class="zh-comment">
    <!--评论标题-->
    <div class="title">
        <img src="<?php echo _default($_SESSION['icon'],'http://www.metacms.com/data/image/user/50-gray.png');?>"/> コメントを発表
    </div>
    <!--发表评论-->
    <div class="publish">
        <form method="post" onsubmit="return add_comment(this)">
            <input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"/>
            <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"/>
            <input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>"/>
            <input type="hidden" name="pid" value="0"/>
            <textarea name="content" placeholder="何か書きましょう..." name="content"></textarea>
            <input type="submit" value="コメント発表" class="comment-submit"/>
        </form>
    </div>
    <!--评论列表-->
    <div class="zh-comment-list">
        <ol class="comment-list">
            <?php $zh["list"]["a"]["total"]=0;if(isset($data) && !empty($data)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($data));
$zh["list"]["a"]["first"]=true;
$zh["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$zh["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($data,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$zh["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$zh["list"]["a"]["last"]=true;endif;?>

                <li id="c<?php echo $a['comment_id'];?>">
                    <div class="zh-comment-face">
                        <a href="http://www.metacms.com/index.php?<?php echo $a['domain'];?>">
                        <img src="<?php echo $a['icon'];?>"  onmouseover="user.show(this,<?php echo $a['uid'];?>)"/>
                            </a>
                    </div>
                    <div class="zh-comment-content">
                        <?php echo $a['content'];?>
                        <div class="zh-author-info">
                            <span class="zh-comment-author">
                                <a href="http://www.metacms.com/index.php?<?php echo $a['domain'];?>"><?php echo $a['nickname'];?></a>&nbsp;&nbsp;
                            </span>
                            <?php echo date('Y-m-d H:i',$a['pubtime']);?> (<?php echo date_before($a['pubtime']);?>)
                            <a class="comment-reply-link" href="javascript:;">返事 </a>
                        </div>
                    </div>
                    <!--回复-->
                    <div class="zh-comment-reply">
                        <div class="zh-comment-face">
                            <img src="<?php echo $_SESSION['icon50'];?>"/>
                        </div>
                        <div class="zh-reply-content">
                            <form method="post" onsubmit="return add_comment(this,'reply')">
                                <input type="hidden" name="mid" value="<?php echo $a['mid'];?>"/>
                                <input type="hidden" name="cid" value="<?php echo $a['cid'];?>"/>
                                <input type="hidden" name="aid" value="<?php echo $a['aid'];?>"/>
                                <input type="hidden" name="pid" value="<?php echo $a['comment_id'];?>"/>
                                <input type="hidden" name="reply_comment_id" value="<?php echo $a['comment_id'];?>"/>
                                <textarea name="content" placeholder="何か書きましょう..."></textarea>
                                <input type="submit" value="コメント発表" class="comment-submit"/>
                                <input type="button" value="発表取消し" class="comment-cancel"/>
                            </form>
                        </div>
                    </div>
                    <!--子评论-->
                    <ul class="children">
                        <?php $zh["list"]["b"]["total"]=0;if(isset($a['_data']) && !empty($a['_data'])):$_id_b=0;$_index_b=0;$lastb=min(1000,count($a['_data']));
$zh["list"]["b"]["first"]=true;
$zh["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$zh["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($a['_data'],0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$zh["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$zh["list"]["b"]["last"]=true;endif;?>

                            <li id="c<?php echo $b['comment_id'];?>">
                                <div class="zh-comment-face">
                                    <a href="http://www.metacms.com/index.php?<?php echo $b['domain'];?>">
                                    <img src="<?php echo $b['icon'];?>"  onmouseover="user.show(this,<?php echo $b['uid'];?>)"/>
                                        </a>
                                </div>
                                <div class="zh-comment-content">
                                    <?php echo $b['content'];?>
                                    <div class="zh-author-info">
                            <span class="zh-comment-author">
                                <a href="http://www.metacms.com/index.php?<?php echo $b['domain'];?>"><?php echo $b['nickname'];?></a>&nbsp;&nbsp;
                            </span>
                                        <?php echo date('Y-m-d H:i',$b['pubtime']);?> (<?php echo date_before($b['pubtime']);?>)
                                        <a class="comment-reply-link" href="javascript:;">返事 </a>
                                    </div>
                                </div>
                                <!--回复-->
                                <div class="zh-comment-reply">
                                    <div class="zh-comment-face">
                                        <img src="<?php echo $_SESSION['icon50'];?>"/>
                                    </div>
                                    <div class="zh-reply-content">
                                        <form method="post" onsubmit="return add_comment(this,'reply')">
                                            <input type="hidden" name="mid" value="<?php echo $b['mid'];?>"/>
                                            <input type="hidden" name="cid" value="<?php echo $b['cid'];?>"/>
                                            <input type="hidden" name="aid" value="<?php echo $b['aid'];?>"/>
                                            <input type="hidden" name="pid" value="<?php echo $b['comment_id'];?>"/>
                                            <input type="hidden" name="reply_comment_id" value="<?php echo $a['comment_id'];?>"/>
                                            <textarea name="content" placeholder="何か書きましょう..."></textarea>
                                            <input type="submit" value="コメント発表" class="comment-submit"/>
                                            <input type="button" value="発表取消し" class="comment-cancel"/>
                                        </form>
                                    </div>
                                </div>
                                <ul class="children">
                                    <?php $zh["list"]["c"]["total"]=0;if(isset($b['_data']) && !empty($b['_data'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($b['_data']));
$zh["list"]["c"]["first"]=true;
$zh["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$zh["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($b['_data'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$zh["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$zh["list"]["c"]["last"]=true;endif;?>

                                        <li class="bg-white" id="c<?php echo $c['comment_id'];?>">
                                            <div class="zh-comment-face">
                                                <a href="http://www.metacms.com/index.php?<?php echo $c['domain'];?>">
                                                <img src="<?php echo $c['icon'];?>"  onmouseover="user.show(this,<?php echo $c['uid'];?>)"/>
                                                    </a>
                                            </div>
                                            <div class="zh-comment-content">
                                                <?php echo $c['content'];?>
                                                <div class="zh-author-info">
                                                <span class="zh-comment-author">
                                                    <a href="http://www.metacms.com/index.php?<?php echo $c['domain'];?>"><?php echo $c['nickname'];?></a>&nbsp;&nbsp;
                                                </span>
                                                    <?php echo date('Y-m-d H:i',$c['pubtime']);?> (<?php echo date_before($c['pubtime']);?>)
                                                    <a class="comment-reply-link" href="javascript:;">返事 </a>
                                                </div>
                                            </div>
                                            <!--回复-->
                                            <div class="zh-comment-reply">
                                                <div class="zh-comment-face">
                                                    <img src="<?php echo $_SESSION['icon50'];?>"/>
                                                </div>
                                                <div class="zh-reply-content">
                                                    <form method="post" onsubmit="return add_comment(this,'reply')">
                                                        <input type="hidden" name="mid" value="<?php echo $c['mid'];?>"/>
                                                        <input type="hidden" name="cid" value="<?php echo $c['cid'];?>"/>
                                                        <input type="hidden" name="aid" value="<?php echo $c['aid'];?>"/>
                                                        <input type="hidden" name="pid" value="<?php echo $c['comment_id'];?>"/>
                                                        <input type="hidden" name="reply_comment_id"
                                                               value="<?php echo $a['comment_id'];?>"/>
                                                        <textarea name="content" placeholder="何か書きましょう..."></textarea>
                                                        <input type="submit" value="コメント発表" class="comment-submit"/>
                                                        <input type="button" value="発表取消し" class="comment-cancel"/>
                                                    </form>
                                                </div>
                                            </div>
                                            <ul class="children">
                                                <?php $zh["list"]["d"]["total"]=0;if(isset($c['_data']) && !empty($c['_data'])):$_id_d=0;$_index_d=0;$lastd=min(1000,count($c['_data']));
$zh["list"]["d"]["first"]=true;
$zh["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$zh["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($c['_data'],0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$zh["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$zh["list"]["d"]["last"]=true;endif;?>

                                                    <li id="c<?php echo $d['comment_id'];?>">
                                                        <div class="zh-comment-face">
                                                            <a href="http://www.metacms.com/index.php?<?php echo $d['domain'];?>">
                                                            <img src="<?php echo $d['icon'];?>"  onmouseover="user.show(this,<?php echo $d['uid'];?>)"/>
                                                                </a>
                                                        </div>
                                                        <div class="zh-comment-content">
                                                            <?php echo $d['content'];?>
                                                            <div class="zh-author-info">
                                                            <span class="zh-comment-author">
                                                                <a href="http://www.metacms.com/index.php?<?php echo $d['domain'];?>"><?php echo $d['nickname'];?></a>&nbsp;&nbsp;
                                                            </span>
                                                                <?php echo date('Y-m-d H:i',$d['pubtime']);?>
                                                                (<?php echo date_before($d['pubtime']);?>)
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php $zh["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                            </ul>
                                        </li>
                                    <?php $zh["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </ul>
                            </li>
                        <?php $zh["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </ul>
                </li>
            <?php $zh["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </ol>
    </div>
    <div class="page">
        <?php echo $page;?>
    </div>
</div>
<div class="comment_alter">
    発表成功しました！
</div>




