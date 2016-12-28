<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="form-div">
    <form action="javascript:searchGoods()" name="searchForm">
        <img src="http://www.works.com/zh/Zhcms/Admin/Tpl/Public/ec/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
        <?php if($_GET['act'] <> 'trash'){?>
            <!-- 分类 -->
            <select name="cat_id">
                <option value="0"><?php echo L("admin_ecgoods_info_page_info_table_search1");?></option>
                <?php echo $cat_list;?>
            </select>
            <!-- 品牌 -->
            <select name="brand_id">
                <option value="0"><?php echo L("admin_ecgoods_info_page_info_table_search2");?></option>
                <?php if(isset($brand_list) && !empty($brand_list)):$arr["options"]=$brand_list;$arr["selected"]=$_GET['brand_id'];echo html_options($arr);endif;
?>
            </select>
            <!-- 推荐 -->
            <select name="intro_type">
                <option value="0"><?php echo L("admin_ecgoods_common12");?></option>
                <?php if(isset($intro_list) && !empty($intro_list)):$arr["options"]=$intro_list;$arr["selected"]=$_GET['intro_type'];echo html_options($arr);endif;
?>
                {html_options options=$intro_list selected=$smarty.get.intro_type}
            </select>
            <?php if($suppliers_exists == 1){?>
                <!-- 供货商 -->
                <select name="suppliers_id">
                    <option value="0"><?php echo L("admin_ecgoods_common12");?></option>
                    <?php if(isset($suppliers_list_name) && !empty($suppliers_list_name)):$arr["options"]=$suppliers_list_name;$arr["selected"]=$_GET['suppliers_id'];echo html_options($arr);endif;
?>
                </select>
            <?php }?>
            <!-- 上架 -->
            <select name="is_on_sale">
                <option value=''><?php echo L("admin_ecgoods_common12");?></option>
                <option value="1"><?php echo L("admin_ecgoods_info_page_table_th5");?></option>
                <option value="0"><?php echo L("admin_ecgoods_info_page_table_select1");?></option>
            </select>
        <?php }?>
        <!-- 关键字 -->
        <?php echo L("admin_ecgoods_info_page_info_table_search3");?> <input type="text" name="keyword" size="15" />
        <input type="submit" value="<?php echo L("admin_ecgoods_info_page_info_table_search4");?>" class="button" />
    </form>
</div>

<script language="JavaScript">
function searchGoods()
{
    <?php if($_GET['act'] <> 'trash'){?>
        listTable.filter['cat_id'] = document.forms['searchForm'].elements['cat_id'].value;
        listTable.filter['brand_id'] = document.forms['searchForm'].elements['brand_id'].value;
        listTable.filter['intro_type'] = document.forms['searchForm'].elements['intro_type'].value;
        listTable.filter['is_on_sale'] = document.forms['searchForm'].elements['is_on_sale'].value;
        <?php if($suppliers_exists == 1){?>
            listTable.filter['suppliers_id'] = document.forms['searchForm'].elements['suppliers_id'].value;
        <?php }?>
    <?php }?>
    listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
    listTable.filter['page'] = 1;

    listTable.loadList();
    
}
</script>