<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($full_page){?>
    <?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    var process_request = "正在处理您的请求...";
    var todolist_caption = "记事本";
    var todolist_autosave = "自动保存";
    var todolist_save = "保存";
    var todolist_clear = "清除";
    var todolist_confirm_save = "是否将更改保存到记事本？";
    var todolist_confirm_clear = "是否清空内容？";
    var no_username = "没有输入用户名。";
    var invalid_email = "没有输入邮件地址或者输入了一个无效的邮件地址。";
    var no_password = "没有输入密码。";
    var less_password = "输入的密码不能少于六位。";
    var passwd_balnk = "密码中不能包含空格";
    var no_confirm_password = "没有输入确认密码。";
    var password_not_same = "输入的密码和确认密码不一致。";
    var invalid_pay_points = "消费积分数不是一个整数。";
    var invalid_rank_points = "等级积分数不是一个整数。";
    var password_len_err = "新密码和确认密码的长度不能小于6";
    //-->
    </script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/utils.js"></script>
    <script type="text/javascript" src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/js/listtable.js"></script>
    
    <div class="form-div">
        <form action="javascript:searchUser()" name="searchForm">
            <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
            &nbsp;会员等级 
            <select name="user_rank">
                <option value="0">所有等级</option>
                <?php if(isset($user_ranks) && !empty($user_ranks)):$arr["options"]=$user_ranks;$arr["selected"]=null;echo html_options($arr);endif;
?>
            </select>
            &nbsp;会员积分大于&nbsp;
            <input type="text" name="pay_points_gt" size="8" />
            &nbsp;会员积分小于&nbsp;
            <input type="text" name="pay_points_lt" size="10" />
            &nbsp;会员名称 &nbsp;
            <input type="text" name="keyword" /> 
            <input type="submit" value=" 搜索 " />
        </form>
    </div>


    <form method="POST" action="<?php echo U('index');?>" name="listForm" onsubmit="return confirm_bath()">
        <!-- start users list -->
        <div class="list-div" id="listDiv">
<?php }?>
            <!--用户列表部分-->
            <table cellpadding="3" cellspacing="1">
                <tr>
                    <th>
                    <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox">
                    <a href="javascript:listTable.sort('user_id'); ">编号</a><?php echo $sort_user_id;?>
                    </th>
                    <th><a href="javascript:listTable.sort('user_name'); ">会员名称</a><?php echo $sort_user_name;?></th>
                    <th><a href="javascript:listTable.sort('email'); ">邮件地址</a><?php echo $sort_email;?></th>
                    <th><a href="javascript:listTable.sort('is_validated'); ">是否已验证</a><?php echo $sort_is_validate;?></th>
                    <th>可用资金</th>
                    <th>冻结资金</th>
                    <th>等级积分</th>
                    <th>消费积分</th>
                    <th><a href="javascript:listTable.sort('reg_time'); ">注册日期</a><?php echo $sort_reg_time;?></th>
                    <th>操作</th>
                </tr>
                <?php if(!empty($user_list)){?>
                    <?php if(is_array($user_list)):?><?php $index=0; ?><?php  foreach($user_list as $user){ ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="checkboxes[]" value="<?php echo $user['user_id'];?>" notice="<?php if($user['user_money'] <> 0){?>1<?php  }else{ ?>0<?php }?>"/><?php echo $user['user_id'];?>
                        </td>
                        <td class="first-cell"><?php echo $user['user_name'];?></td>
                        <td><span onclick="listTable.edit(this, 'edit_email', <?php echo $user['user_id'];?>)"><?php echo $user['email'];?></span></td>
                        <td align="center">
                            <?php if($user['is_validated']){?> 
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/yes.gif"/> 
                            <?php  }else{ ?> 
                                <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/no.gif"/> 
                            <?php }?>
                        </td>
                        <td><?php echo $user['user_money'];?></td>
                        <td><?php echo $user['frozen_money'];?></td>
                        <td><?php echo $user['rank_points'];?></td>
                        <td><?php echo $user['pay_points'];?></td>
                        <td align="center"><?php echo $user['reg_time'];?></td>
                        <td align="center">
                            <a href="users.php?act=edit&id=<?php echo $user['user_id'];?>" title="编辑"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_edit.gif" border="0" height="16" width="16" /></a>
                            <a href="users.php?act=address_list&id=<?php echo $user['user_id'];?>" title="收货地址"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/book_open.gif" border="0" height="16" width="16" /></a>
                            <a href="order.php?act=list&user_id=<?php echo $user['user_id'];?>" title="查看订单"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_view.gif" border="0" height="16" width="16" /></a>
                            <a href="account_log.php?act=list&user_id=<?php echo $user['user_id'];?>" title="查看账目明细"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_account.gif" border="0" height="16" width="16" /></a>
                            <a href="javascript:confirm_redirect('<?php if($user['user_money'] <> 0){?>该会员有余额或欠款\n<?php }?>您确定要删除该会员账号吗？', 'users.php?act=remove&id=<?php echo $user['user_id'];?>')" title="移除"><img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_drop.gif" border="0" height="16" width="16" /></a>
                        </td>
                    </tr>
                    <?php $index++; ?><?php }?><?php endif;?>
                <?php  }else{ ?>
                    <tr><td class="no-records" colspan="10">没有任何数据</td></tr>
                <?php }?>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="act" value="batch_remove" />
                        <input type="submit" id="btnSubmit" value="删除会员" disabled="true" class="button" />
                    </td>
                    <td align="right" nowrap="true" colspan="8">
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
        <!-- end users list -->
    </form>

<script type="text/javascript">
    listTable.recordCount = <?php echo $record_count;?>;
    listTable.pageCount = <?php echo $page_count;?>;
    
      
    <?php if(is_array($filter)):?><?php $index=0; ?><?php  foreach($filter as $key=>$item){ ?>
    listTable.filter.<?php echo $key;?> = '<?php echo $item;?>';
    <?php $index++; ?><?php }?><?php endif;?>
    
    onload = function()
    {
        document.forms['searchForm'].elements['keyword'].focus();
        // 开始检查订单
        //startCheckOrder();
    }

    /**
     * 搜索用户
     */
    function searchUser()
    {
        listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['rank'] = document.forms['searchForm'].elements['user_rank'].value;
        listTable.filter['pay_points_gt'] = Utils.trim(document.forms['searchForm'].elements['pay_points_gt'].value);
        listTable.filter['pay_points_lt'] = Utils.trim(document.forms['searchForm'].elements['pay_points_lt'].value);
        listTable.filter['page'] = 1;
        listTable.loadList();
    }
    
    function confirm_bath()
    {
        userItems = document.getElementsByName('checkboxes[]');
    
        cfm = '您确定要删除所有选中的会员账号吗？';
    
        for (i=0; userItems[i]; i++)
            {
            if (userItems[i].checked && userItems[i].notice == 1)
            {
                cfm = '选中的会员账户中仍有余额或欠款\n' + '您确定要删除所有选中的会员账号吗？';
                break;
            }
        }
    
        return confirm(cfm);
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
<?php }?>