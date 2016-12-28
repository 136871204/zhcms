<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="custabbar-div">
    <p>
        <?php if(is_array($group_list)):?><?php $index=0; ?><?php  foreach($group_list as $group_key=>$group){ ?>
            <?php if($group_key == $current){?>
                <span class="custab-front" id="<?php echo $group_key;?>-tab"><?php echo $group['text'];?></span>
            <?php  }else{ ?>
                <span class="custab-back" id="<?php echo $group_key;?>-tab" onclick="javascript:location.href='<?php echo $group['url'];?>';"><?php echo $group['text'];?></span>
            <?php }?>
        <?php $index++; ?><?php }?><?php endif;?>
    </p>
</div>
<script language="javascript">
  /**
   * 标签上鼠标移动事件的处理函数
   * @return
   */
  document.getElementById("custabbar-div").onmouseover = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.className == "custab-back")
    {
      obj.className = "custab-hover";
    }
  }
  
    document.getElementById("custabbar-div").onmouseout = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.className == "custab-hover")
    {
      obj.className = "custab-back";
    }
  }
</script>