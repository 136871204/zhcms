<?php if(!defined("ZHPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if($pictures){?>
    <div class="clearfix">
        <span onmouseover="moveLeft()" onmousedown="clickLeft()" onmouseup="moveLeft()" onmouseout="scrollStop()"></span>
        <div class="gallery">
            <div id="demo">
                <div id="demo1" style="float:left">
                    <ul>
                        <?php if(is_array($pictures)):?><?php $picture_no=0; ?><?php  foreach($pictures as $picture){ ?>
                            <li>
                                <a href="gallery.php?id=<?php echo $id;?>&amp;img=<?php echo $picture['img_id'];?>" target="_blank">
                                    <img src="<?php if($picture['thumb_url']){?><?php echo $picture['thumb_url'];?><?php  }else{ ?><?php echo $picture['img_url'];?><?php }?>" alt="<?php echo $goods['goods_name'];?>" class="B_blue" />
                                </a>
                            </li>
                        <?php $picture_no++; ?><?php }?><?php endif;?>
                    </ul>
                </div>
                <div id="demo2" style="display:inline; overflow:visible;"></div>
            </div>
        </div>
        <span onmouseover="moveRight()" onmousedown="clickRight()" onmouseup="moveRight()" onmouseout="scrollStop()" class="spanR"></span>
        <script>
        function $gg(id){  
            return (document.getElementById) ? document.getElementById(id): document.all[id]
        }
        
        var boxwidth=53;//跟图片的实际尺寸相符
        
        var box=$gg("demo");
        var obox=$gg("demo1");
        var dulbox=$gg("demo2");
        obox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
        dulbox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
        box.style.width=obox.getElementsByTagName("li").length*boxwidth*3+'px';
        var canroll = false;
        if (obox.getElementsByTagName("li").length >= 4) {
            canroll = true;
            dulbox.innerHTML=obox.innerHTML;
        }
        var step=5;temp=1;speed=50;
        var awidth=obox.offsetWidth;
        var mData=0;
        var isStop = 1;
        var dir = 1;
        
        function s(){
            if (!canroll) return;
            if (dir) {
                if((awidth+mData)>=0)
                {
                    mData=mData-step;
                }
                else
                {
                    mData=-step;
                }
            } else {
                if(mData>=0)
                {
                    mData=-awidth;
                }
                else
                {
                    mData+=step;
                }
            }
            
            obox.style.marginLeft=mData+"px";
            
            if (isStop) return;
            
            setTimeout(s,speed)
        }
        
        
        function moveLeft() {
            var wasStop = isStop;
            dir = 1;
            speed = 50;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        
        function moveRight() {
            var wasStop = isStop;
            dir = 0;
            speed = 50;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        
        function scrollStop() {
            isStop=1;
        }
        
        function clickLeft() {
            var wasStop = isStop;
            dir = 1;
            speed = 25;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        
        function clickRight() {
            var wasStop = isStop;
            dir = 0;
            speed = 25;
            isStop=0;
            if (wasStop) {
                setTimeout(s,speed);
            }
        }
        </script>
    </div>
<?php }?>
