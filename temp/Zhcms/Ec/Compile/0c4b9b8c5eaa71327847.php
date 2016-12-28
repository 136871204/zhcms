<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!--
TODO:
1.javascipty方法没有完成
 -->
<?php 
    $vote = get_vote();
    if (!empty($vote))
    {
        $vote_id=$vote['id'];
        $vote=$vote['content'];
    }
    //p($vote);
?>
<?php if($vote){?>
    <script type="text/javascript" src="http://www.metacms.com/template/v5/ec/common/js/transport.js"></script>
    <div id="ECS_VOTE">
        <div  class="box">
            <div class="box_1">
                <h3><span>オンライン調査</span></h3>
                <div  class="boxCenterList">
                    <form id="formvote" name="ECS_VOTEFORM" method="post" action="javascript:submit_vote()">
                        <?php if(is_array($vote)):?><?php $index=0; ?><?php  foreach($vote as $title){ ?>
                        <?php echo $title['vote_name'];?><br />
                        (参加数:<?php echo $title['vote_count'];?>)<br />
                        <?php $index++; ?><?php }?><?php endif;?>
                        <?php if(is_array($vote)):?><?php $index=0; ?><?php  foreach($vote as $title){ ?>
                            <?php if(is_array($title['options'])):?><?php $index=0; ?><?php  foreach($title['options'] as $item){ ?>
                                <?php if($title['can_multi'] == 0){?>
                                    <input type="checkbox" name="option_id" value="<?php echo $item['option_id'];?>" />
                                    <?php echo $item['option_name'];?> (<?php echo $item['percent'];?>%)<br />
                                <?php  }else{ ?>
                                    <input type="radio" name="option_id" value="<?php echo $item['option_id'];?>" />
                                    <?php echo $item['option_name'];?> (<?php echo $item['percent'];?>%)<br />
                                <?php }?>
                            <?php $index++; ?><?php }?><?php endif;?>
                            <input type="hidden" name="type" value="<?php echo $title['can_multi'];?>" />
                        <?php $index++; ?><?php }?><?php endif;?>
                        <input type="hidden" name="id" value="<?php echo $vote_id;?>" />
                        <input type="submit" name="submit" style="border:none;" value="確定"  class="bnt_bonus" />
                        <input type="reset" style="border:none;" value="リセット" class="bnt_blue" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="blank5"></div>
    <script type="text/javascript">
    /**
    * 处理用户的投票
    */
    function submit_vote()
    {
        var frm     = document.forms['ECS_VOTEFORM'];
        var type    = frm.elements['type'].value;
        var vote_id = frm.elements['id'].value;
        var option_id = 0;
        if (frm.elements['option_id'].checked)
        {
            option_id = frm.elements['option_id'].value;
        }
        else
        {
            for (i=0; i<frm.elements['option_id'].length; i++ )
            {
                if (frm.elements['option_id'][i].checked)
                {
                    option_id = (type == 0) ? option_id + "," + frm.elements['option_id'][i].value : frm.elements['option_id'][i].value;
                }
            }
        }
        if (option_id == 0)
        {
            return;
        }
        else
        {
            var ajaxurl='index.php?a=ec&c=EcVote&m=index';
            Ajax.call(ajaxurl, 'vote=' + vote_id + '&options=' + option_id + "&type=" + type, voteResponse, 'POST', 'JSON');
        }
        
    }
    
    /**
     * 处理投票的反馈信息
     */
    function voteResponse(result)
    {
        if (result.message.length > 0)
        {
            alert(result.message);
        }
        if (result.error == 0)
        {
            var layer = document.getElementById('ECS_VOTE');
            if (layer)
            {
                layer.innerHTML = result.content;
            }
        }
    }
    </script>
<?php }?>
