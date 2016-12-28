<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="category_tree">
    <div class="tit">所有商品分类</div>
    <dl class="clearfix" style=" overflow:hidden;" >
        <div class="box1 cate" id="cate">
            <?php $no=0; ?>
            <?php if(is_array($categories)):?><?php $index=0; ?><?php  foreach($categories as $cat){ ?>
                <h1 onclick="tab(<?php echo $no;?>)"  <?php if($no == 0){?>style="border-top:none"<?php }?>>
                    <span class="f_l">
                        <img src="http://www.works.com/template/v3/ec/common/images/btn_fold.gif" style="padding-top:10px;padding-right:6px;cursor:pointer;"/>
                    </span>
                    <a href="<?php echo $cat['url'];?>" class="  f_l"><?php echo $cat['name'];?></a>
                </h1>
                <ul style="display:none" >
                    <?php if(is_array($cat['cat_id'])):?><?php $no1=0; ?><?php  foreach($cat['cat_id'] as $child){ ?>
                        <a class="over_2" href="<?php echo $child['url'];?>"><?php echo $child['name'];?></a> 
                        <div class="clearfix">
                            <?php if(is_array($child['cat_id'])):?><?php $index=0; ?><?php  foreach($child['cat_id'] as $childer){ ?>
                                <a class="over_3" href="<?php echo $childer['url'];?>"><?php echo $childer['name'];?></a>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </div>
                    <?php $no1++; ?><?php }?><?php endif;?>
                </ul>
                <div style="clear:both"></div>
                <?php $no++; ?>
            <?php $index++; ?><?php }?><?php endif;?>
        </div>
        <div style="clear:both"></div>  
    </dl>
</div>
<div class="blank"></div>
<script type="text/javascript">
obj_h4 = document.getElementById("cate").getElementsByTagName("h4")
obj_ul = document.getElementById("cate").getElementsByTagName("ul")
obj_img = document.getElementById("cate").getElementsByTagName("img")
function tab(id)
{ 
    //alert(id);
	if(obj_ul.item(id).style.display == "block")
	{
		obj_ul.item(id).style.display = "none"
		obj_img.item(id).src = "http://www.works.com/template/v3/ec/common/images/btn_fold.gif"
		return false;
	}
	else(obj_ul.item(id).style.display == "none")
	{
		obj_ul.item(id).style.display = "block"
		obj_img.item(id).src = "http://www.works.com/template/v3/ec/common/images/btn_unfold.gif"
	}
}
</script>