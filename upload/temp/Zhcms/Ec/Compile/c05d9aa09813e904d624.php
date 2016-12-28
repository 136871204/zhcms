<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><script type="text/javascript">
          //初始化主菜单
            function sw_nav2(obj,tag)
            {
            var DisSub2 = document.getElementById("DisSub2_"+obj);
            var HandleLI2= document.getElementById("HandleLI2_"+obj);
                if(tag==1)
                {
                    DisSub2.style.display = "block";
					HandleLI2.className="current";
                }
                else
                {
                    DisSub2.style.display = "none";
					HandleLI2.className="";
                }
            }
</script>
<div id="category_tree">
    <dl class="clearfix" style=" margin-top:-455px;" >
        <?php if(is_array($categories)):?><?php $index=0; ?><?php  foreach($categories as $tno=>$cat){ ?>
            <?php $no = $tno+1;?>
            <div  class="dt"  <?php if($no == 9){?>style="border-bottom:none;"<?php }?>  onMouseOver="sw_nav2(<?php echo $no;?>,1);" onMouseOut="sw_nav2(<?php echo $no;?>,0);" >
                <div id="HandleLI2_<?php echo $no;?>">
                    <a    class="a<?php if($no % 2 == 0){?><?php  }else{ ?> t <?php }?> "href="<?php echo $cat['url'];?>">
                        <?php echo htmlspecialchars($cat['name']);?>
                        <img src="http://www.works.com/template/v3/ec/common/images/biao8.gif"/>
                    </a>
                </div>
                <dd  id=DisSub2_<?php echo $no;?> style="display:none">
                    <?php if(is_array($cat['cat_id'])):?><?php $index=0; ?><?php  foreach($cat['cat_id'] as $child){ ?>
                        <a class="over_2" href="<?php echo $child['url'];?>"><?php echo htmlspecialchars($child['name']);?></a>  
                        <div class="clearfix">
                            <?php if(is_array($child['cat_id'])):?><?php $index=0; ?><?php  foreach($child['cat_id'] as $childer){ ?>
                                <a class="over_3" href="<?php echo $childer['url'];?>"><?php echo htmlspecialchars($childer['name']);?></a>
                            <?php $index++; ?><?php }?><?php endif;?>
                        </div>
                    <?php $index++; ?><?php }?><?php endif;?>
                </dd> 
            </div>
        <?php $index++; ?><?php }?><?php endif;?>
    </dl>
</div>