<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var process_request = "<?php echo L("admin_ecnavigator_js_process_request");?>";
    var todolist_caption = "<?php echo L("admin_ecnavigator_js_todolist_caption");?>";
    var todolist_autosave = "<?php echo L("admin_ecnavigator_js_todolist_autosave");?>";
    var todolist_save = "<?php echo L("admin_ecnavigator_js_todolist_save");?>";
    var todolist_clear = "<?php echo L("admin_ecnavigator_js_todolist_clear");?>";
    var todolist_confirm_save = "<?php echo L("admin_ecnavigator_js_todolist_confirm_save");?>";
    var todolist_confirm_clear = "<?php echo L("admin_ecnavigator_js_todolist_confirm_clear");?>";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <form method="post" action="" name="listForm">
    <!-- start brand list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <table cellspacing='1' cellpadding='3' id='list-table'>
                <tr>
                    <th><?php echo L("admin_ecnavigator_navigator_page_table_th1");?></th>
                    <th><?php echo L("admin_ecnavigator_navigator_page_table_th2");?></th>
                    <th><?php echo L("admin_ecnavigator_navigator_page_table_th3");?></th>
                    <th><?php echo L("admin_ecnavigator_navigator_page_table_th4");?></th>
                    <th><?php echo L("admin_ecnavigator_navigator_page_table_th5");?></th>
                    <th width="60px"><?php echo L("admin_ecnavigator_navigator_page_table_th6");?></th>
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
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" onclick="listTable.toggle(this, 'toggle_ifshow', <?php echo $val['id'];?>)" />
                                <?php  }else{ ?>
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" onclick="listTable.toggle(this, 'toggle_ifshow', <?php echo $val['id'];?>)" />
                                <?php }?>
                            <?php }?>
                        </td>
                        <td align="center">
                            <?php if($val['id']){?>
                                <?php if($val['opennew'] == '1'){?>
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif" onclick="listTable.toggle(this, 'toggle_opennew', <?php echo $val['id'];?>)" />
                                <?php  }else{ ?>
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" onclick="listTable.toggle(this, 'toggle_opennew', <?php echo $val['id'];?>)" />
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
                                <a href="<?php echo U('index',array('act'=>'edit','id'=>$val['id']));?>" title="<?php echo L("admin_ecnavigator_navigator_page_table_other1");?>">
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" width="16" height="16" border="0" />
                                </a>
                                <a href="<?php echo U('index',array('act'=>'del','id'=>$val['id']));?>" onclick="return confirm('<?php echo L("admin_ecnavigator_navigator_page_table_other2");?>');" title="<?php echo L("admin_ecnavigator_navigator_page_table_other2");?>">
                                    <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif" width="16" height="16" border="0" />
                                </a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10"><?php echo L("admin_ecnavigator_navigator_page_table_other3");?></td></tr>
                <?php }?>
            </table>
            <table cellpadding="4" cellspacing="0">
                <tr>
                    <td align="right">
                    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
      <div id="turn-page">
        <?php echo L("admin_eccommon_page_t1");?>  <span id="totalRecords"><?php echo $record_count;?></span>
        <?php echo L("admin_eccommon_page_t2");?> <span id="totalPages"><?php echo $page_count;?></span>
        <?php echo L("admin_eccommon_page_t3");?> <span id="pageCurrent"><?php echo $filter['page'];?></span>
        <?php echo L("admin_eccommon_page_t4");?> <input type='text' size='3' id='pageSize' value="<?php echo $filter['page_size'];?>" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()"><?php echo L("admin_eccommon_page_t5");?></a>
          <a href="javascript:listTable.gotoPagePrev()"><?php echo L("admin_eccommon_page_t6");?></a>
          <a href="javascript:listTable.gotoPageNext()"><?php echo L("admin_eccommon_page_t7");?></a>
          <a href="javascript:listTable.gotoPageLast()"><?php echo L("admin_eccommon_page_t8");?></a>
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