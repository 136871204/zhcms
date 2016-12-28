<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div class="box">
    <div class="box_1">
        <h3><span class="text">商品标签</span></h3>
        <div class="boxCenterList clearfix ie6">
            <form name="tagForm" action="javascript:;" onSubmit="return submitTag(this)" id="tagForm">
                <p id="ECS_TAGS" style="margin-bottom:5px;">
                    <!-- 标记 -->
                    <?php if(is_array($tags)):?><?php $index=0; ?><?php  foreach($tags as $tag){ ?>
                        <a href="<?php echo U('ec/EcSearch/index');?>&keywords=<?php echo htmlspecialchars($tag['tag_words']);?>" style="color:#006ace; text-decoration:none; margin-right:5px;">
                            <?php echo htmlspecialchars($tag['tag_words']);?>[<?php echo $tag['tag_count'];?>]
                        </a>
                    <?php $index++; ?><?php }?><?php endif;?>
                </p>
                <p>
                    <input type="text" name="tag" id="tag" class="inputBg" size="35" />
                    <input type="submit" value="添 加" class="bnt_blue" style="border:none;" />
                    <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id'];?>"  />
                </p>
                <script type="text/javascript">
                    function submitTag(frm)
                    {
                        try
                        {
                            var tag = frm.elements['tag'].value;
                            var idx = frm.elements['goods_id'].value;
                            
                            if (tag.length > 0 && parseInt(idx) > 0)
                            {
                                var ajaxurl=APP+'&c=EcUser&m=index&act=add_tag';
                                Ajax.call(ajaxurl, "id=" + idx + "&tag=" + tag, submitTagResponse, "POST", "JSON");
                            }
                        }
                        catch (e) { alert(e); }
                        
                        return false;
                    }
                    
                    function submitTagResponse(result)
                    {
                        var div = document.getElementById('ECS_TAGS');
                        
                        if (result.error > 0)
                        {
                            alert(result.message);
                        }
                        else
                        {
                            try
                            {
                                div.innerHTML = '';
                                var tags = result.content;
                                
                                for (i = 0; i < tags.length; i++)
                                {
                                    div.innerHTML += '<a href="<?php echo U("ec/EcSearch/index");?>&keywords='+tags[i].word+'" style="color:#006ace; text-decoration:none; margin-right:5px;">' +tags[i].word + '[' + tags[i].count + ']<\/a>&nbsp;&nbsp; ';
                                }
                            }
                            catch (e) { alert(e); }
                        }
                    }
                </script>
            </form>
        </div>
    </div>
</div>
<div class="blank5"></div>