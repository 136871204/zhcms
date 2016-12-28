<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C("WEBNAME");?><?php if($ur_here){?> - <?php echo $ur_here;?> <?php }?></title>
<meta name="robots" content="noindex, nofollow"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/general.css" rel="stylesheet" type="text/css" />
<link href="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/styles/main.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/transport.js"></script>
<script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/common.js"></script>
<script src='http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/json2.js'></script>
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
    var process_request = "処理中...";
    var todolist_caption = "ノート";
    var todolist_autosave = "自動保存";
    var todolist_save = "保存";
    var todolist_clear = "クリア";
    var todolist_confirm_save = "ノートに最新情報保存するか？";
    var todolist_confirm_clear = "内容をクリアしますか？";
    //-->
    </script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <form method="post" action="" name="listForm">
    <!-- start brand list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellspacing='1' cellpadding='3' id='list-table'>
                <tr>
                    <th>名称</th>
                    <th>表示選択</th>
                    <th>new open</th>
                    <th>ソート</th>
                    <th>位置</th>
                    <th width="60px">操作</th>
                </tr>
                <?php if(!empty($navdb)){?>
                    <?php if(is_array($navdb)):?><?php $index=0; ?><?php  foreach($navdb as $val){ ?>
                    <tr>
                        <td align="center">
                            <?php if($val['id']){?>
                                <?php echo $val['name'];?>
                            <?php  }else{ ?>
                                &nbsp;
                            <?php }?>
                        </td>
                        <td align="center">
                            <?php if($val['id']){?>
                                <?php if($val['ifshow'] == '1'){?>
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" onclick="listTable.toggle(this, 'toggle_ifshow', <?php echo $val['id'];?>)" />
                                <?php  }else{ ?>
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" onclick="listTable.toggle(this, 'toggle_ifshow', <?php echo $val['id'];?>)" />
                                <?php }?>
                            <?php }?>
                        </td>
                        <td align="center">
                            <?php if($val['id']){?>
                                <?php if($val['opennew'] == '1'){?>
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" onclick="listTable.toggle(this, 'toggle_opennew', <?php echo $val['id'];?>)" />
                                <?php  }else{ ?>
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" onclick="listTable.toggle(this, 'toggle_opennew', <?php echo $val['id'];?>)" />
                                <?php }?>
                            <?php }?>
                        </td>
                        <td align="center">
                            <?php if($val['id']){?>
                                <span onclick="listTable.edit(this, 'edit_sort_order', <?php echo $val['id'];?>)"><?php echo $val['vieworder'];?></span>
                            <?php }?>
                        </td>
                        <td align="center">
                            <?php if($val['id']){?>
                                <?php echo $lang[$val['type']];?>
                            <?php }?>
                        </td>
                        <td align="center">
                            <?php if($val['id']){?>
                                <a href="<?php echo U('index',array('act'=>'edit','id'=>$val['id']));?>" title="変更">
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" width="16" height="16" border="0" />
                                </a>
                                <a href="<?php echo U('index',array('act'=>'del','id'=>$val['id']));?>" onclick="return confirm('削除しますか?');" title="削除">
                                    <img src="http://www.metacms.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" width="16" height="16" border="0" />
                                </a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10">データなし</td></tr>
                <?php }?>
            </table>
            <table cellpadding="4" cellspacing="0">
                <tr>
                    <td align="right">
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
      <div id="turn-page">
        総計  <span id="totalRecords"><?php echo $record_count;?></span>
        個記録があり、全部 <span id="totalPages"><?php echo $page_count;?></span>
        ページわけ、いまは　<span id="pageCurrent"><?php echo $filter['page'];?></span>
        ページ，毎ページ <input type='text' size='3' id='pageSize' value="<?php echo $filter['page_size'];?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">一ページ</a>
          <a href="javascript:listTable.gotoPagePrev()">前へ</a>
          <a href="javascript:listTable.gotoPageNext()">次へ</a>
          <a href="javascript:listTable.gotoPageLast()">末ページ</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <?php 
                echo smarty_create_pages($filter['page'],$page_count);
            ?>
          </select>
        </span>
      </div>

                    </td>
                </tr>
            </table>
            
            
<?php if($full_page){?>
        </div>
    </form>
<!-- end 添加货品 -->

<script type="text/javascript">
listTable.recordCount = <?php echo $record_count;?>;
listTable.pageCount = <?php echo $page_count;?>;

  
<?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
<?php $index++; ?><?php }?><?php endif;?>


</script>
<?php }?>