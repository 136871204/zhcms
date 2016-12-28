<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class LinesControl extends TripControl {
    
    
    public function ajax_suitoption(){
        $db_prefix=C("DB_PREFIX");
        $suitid=Q('suitid');
        $time = strtotime(date('Y-m-d'));//现在时间
        $sql = "select * from ".$db_prefix."line_suit_price 
                where suitid='$suitid' and day > '$time' and adultprice>0 and `number`!=0 limit 0,100";
        $arr = M()->query($sql);
        $monthli = '';
        $suitinfo = $this->getPeopleGroup($suitid);
        $group = explode(',',$suitinfo['propgroup']);//适用人群
        $jifentprice = $suitinfo['jifentprice'] ? $suitinfo['jifentprice'] : '无';
        $jifenbook = $suitinfo['jifenbook'] ? $suitinfo['jifenbook'] : '无';
        $jifenarr = array('jifentprice'=>$jifentprice,'jifenbook'=>$jifenbook);
        $out = array();
        $childprice="";
        $oldprice="";
        if(!empty($arr)){
            foreach($arr as $row)
            {
                $day = date('Y-m-d',$row['day']); //m-d
                $weekday = '周'.getWeekDay(date('w',$row['day']));//周X
                if(in_array(2,$group))
                {
                    $adultprice = $row['adultprice'];
                    $peopleinfo = '成人价 '.$adultprice;
                    $out['hasadult'] = 1;
        
                }
                if(in_array(1,$group) && !empty($row['childprice']))
                {
                    $childprice = $row['childprice'];
                    $peopleinfo .= '儿童价 '.$childprice;
                    $out['haschild'] = 1;
                }
                if(in_array(3,$group) && !empty($row['oldprice']))
                {
                    $oldprice = $row['oldprice'];
                    $peopleinfo.= '婴儿价 '.$oldprice;
                    $out['hasold'] = 1;
                }
                $text = $day.'('.$weekday.')'.$peopleinfo;
                $monthli.='<option value="'.$day.'" data-price="'.$adultprice.'" data-childprice="'.$childprice.'" data-oldprice="'.$oldprice.'" data-number="'.$row['number'].'">'.$text.'</option>';
            }
        }
        $out['monthli']=$monthli;
        $out['jifen']=$jifenarr;
        echo json_encode($out);
        exit;
    }
    
    
    
    
    //获取套餐适用人群与优惠
    public function getPeopleGroup($suitid)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = "select propgroup,jifentprice,jifenbook from ".$db_prefix."line_suit
                where id='$suitid' ";
                
        $group =M()->getOneRow($sql);
        
        return $group;
    
    }
    
    
    public function show(){
        //p($_GET);
        $typeid=1;
        $aid=Q('aid');
        
        $lineModel=K('Line');
        $row = $lineModel->getStandardInfo($aid);//基本信息
        
        updateVisit($aid,$typeid);
        $line_sn = 'HIS' . str_repeat('0', 8 - strlen($aid)) . $aid;
        if(empty($row['linesn'])){
            $row['linesn']=$line_sn;
        }
        $row['shopname']=getShopName($row['webid']);
        //p($row);
        $real=getLineRealPrice($row['id'],$row['webid']);
        $row['lineprice']=$real ? $real : $row['lineprice'];
        $row['price'] = empty($row['lineprice'])?'<strong class="price_one"><span>电询</span></strong>': '<strong class="price_one">¥ <span>'.$row['lineprice'].'</span> 起</strong>';
        
        $startplaceModel=K('Startplace');
        $row['startcity'] = $startplaceModel->getStartCityName($row['startcity']);
        
        $row['maxmindateshow']=getMaxMinSuitTime($row['id']);

        $magrecommend=explode(',',$row['magrecommend']);
        
        $magrecommendHtml="";
        if(!empty($magrecommend)){
            foreach($magrecommend as $key => $val){
                $magrecommendHtml.="<li><span>".$val."</span></li>";
            }
        }
        $row['magrecommendHtml']=$magrecommendHtml;
        
        //行程下载 Addby xie
        $linedocHtml = "";
        if( $row["linedoc"] !='' ){
            $linedoc = explode( ",",trim($row["linedoc"],",") );
            foreach($linedoc as $key => $val){
                $linedocone = explode("||",$val);
                if(empty($linedocone[1])){
                    $title = "点击下载";
                }else{
                    $title = $linedocone[1];
                }
                $linedocHtml .= "<li><a href='".__ROOT__."/".$linedocone[0]."' target='_blank'><img src='".__TEMPLATE__."/common/images/ico/ico_pdf.png' alt=''><span>".$title."</span></a></li>\n";
            }
        }
        $row['linedocHtml']=$linedocHtml;
        // end
        
        $pic_arr_show=$this->getPiclistArr($row);//读取图片带样式列表
        $row['photoHtml']=$pic_arr_show;
        
        $this -> getLineSuit($row['id']);
        
        $jieshoout=$this -> getJieShao_smore($row['id']);
        $daysout=$this -> getdayshtml($row['lineday']);
        
        
        $basefield = "a.aid,a.id,a.webid,a.linename,a.lineicon,a.seotitle,a.sellpoint,a.linepic,a.storeprice,a.lineprice,a.linedate,a.features,a.transport,a.lineday,a.startcity,a.overcity,a.shownum,a.satisfyscore,a.bookcount,a.jifentprice,a.jifenbook,a.jifencomment,a.attrid,a.kindlist,a.color,a.iconlist";
        $db_prefix=C("DB_PREFIX");
        if(empty($row['hotlines'])){
            $kindarr = explode(",", $row['kindlist']);
            $fieldwhere="";
            if(!empty($kindarr)){
                $fieldwhere.=" AND ( ";
                $index=0;
                foreach($kindarr AS $val)
            	{
            	   if($index==0){
            	       $fieldwhere.="  FIND_IN_SET($val,a.kindlist) ";
            	   }else{
            	       $fieldwhere.="  OR FIND_IN_SET($val,a.kindlist) ";
            	   }
                   $index++;
                        
            			
            	}
                $fieldwhere.=" ) ";
            }
            
    
            $sql="select {$basefield} from {$db_prefix}line a where  a.ishidden=0 {$fieldwhere} order by a.shownum desc,a.modtime desc,a.addtime desc limit 0,4";
        	$hostLines=M()->query($sql);
        }else{
            
            $sql="select {$basefield} from {$db_prefix}line a where  a.ishidden=0 and id in({$row['hotlines']}) order by a.shownum desc,a.modtime desc,a.addtime desc limit 0,4";
            $hostLines=M()->query($sql);            
        }
        /*
        if(!empty($hostLines)){
            foreach($hostLines as $key => $val){
                if( $val["lineprice"]=="0" || $val["lineprice"]=="" ){
                    $hostLines[$key]["lineprice"] = "电询";
                }
            }
        }*/
        
        $this -> assign("jieshoout", $jieshoout);
        $this -> assign("daysout", $daysout);
        $this -> assign("lineinfo", $row);
        $this -> assign("hostLines", $hostLines);

        $CacheTime =-1;
        $this -> display('template/' . C('WEB_STYLE') . '/lines/line_show.html', $CacheTime);
    }
    
    public function getdayshtml($lineday){
        $dayshtml='';
        for($i=1; $i<=$lineday; $i++)
        {
            $dayshtml.='<li><a href="">Day '.$i.'</a></li>';
        }
        return $dayshtml;
    }
    
    public function getJieShao_smore($lineid)
    {
        $db_prefix=C("DB_PREFIX");
        if($this ->checkJieShao3($lineid))
        {
            return $this ->getJieShao_transfer($lineid);
        }else{
            /*$str = "";
            $sql = "select id,isstyle,lineday,txtjieshao,jieshao,showrepast from ".$db_prefix."line where id='$lineid' ";
            $row = M()->getOneRow($sql);
            p($row);*/
        }
    }
    
    public function getJieShao_transfer($lineid)
    {
        $db_prefix=C("DB_PREFIX");
        $str = "";
        $sql = "select id,isstyle,lineday,jieshao,showrepast from ".$db_prefix."line where id='$lineid' ";
        $row = M()->getOneRow($sql);
        $repast_style = empty($row['showrepast']) ? "style='display:none'" : '';
        $lineday = $row['lineday'];
        $out = '';
        if(empty($row['isstyle']) || $row['isstyle'] == 0)
        {
            $row['isstyle'] = 1;
        }
        else
        {
            $row['isstyle'] = $row['isstyle'];
        }
        if($row['isstyle'] == 1) //编辑器里编辑的行程,直接读取
        {
            $out = $row['jieshao'];
        }
        else if($row['isstyle'] == 2) //按天数上传的行程
        {
            $sql = "select * from ".$db_prefix."line_jieshao where lineid='$lineid' order by day asc";
            $arr = M()->query($sql);
            $out .= '<div class="tour_day_detail">';
            for($i=1; $i<=$lineday; $i++)
            {
                $j = $i-1;
                //餐饮信息
                $breakinfo = $arr[$j]['breakfirsthas'] ? '含' : '不含';
                $lunchinfo = $arr[$j]['lunchhas'] ? '含' : '不含';
                $supperinfo = $arr[$j]['supperhas'] ? '含' : '不含';
                $b_desc = !empty($arr[$j]['breakfirst']) ? $arr[$j]['breakfirst'] : '无';
                $l_desc = !empty($arr[$j]['lunch']) ? $arr[$j]['lunch'] : '无';
                $s_desc = !empty($arr[$j]['supper']) ? $arr[$j]['supper'] : '无';
                
                //酒店信息
                $arr[$j]['hotel'] = str_replace('\'','',$arr[$j]['hotel']);
                //$hotelinfo = getInfo('#@__hotel',"where hotelname='{$arr[$j]['hotel']}'");
                $hotelinfo = array();
                $hashotel = !empty($hotelinfo['hotelname']) ? 1 : 0;//是否有对应酒店.
                if($hashotel)
                {
                }
                else
                {
                    $hotelstyle = "style='display:none'"; //酒店隐藏
                    $simple_hotel_style =  "style='display:block'"; //简单酒店显示
                }
                
                $dayimages=$arr[$j]['timg'];
                $timgarr=explode(',',$dayimages);
                $timghtml="";
                foreach($timgarr as $ivalue)
                {
                    if(empty($ivalue))
                    {
                        continue;
                    }
                    $temparr=explode('||',$ivalue);
                    $timghtml .='<li>
                					<a href="/'.$temparr[0].'">
                						<img width="150" height="150" src="/'.$temparr[0].'" title="">
                					</a>
                				</li>';
                }
                
                $detailhtml="";
                if(!empty($arr[$j]['jieshao'])){
                    $detailhtml.='<p>
                                  '.html_entity_decode($arr[$j]['jieshao']).'
                                  </p>';
                }
                
                $out.='<div class="tdd_content">
    		                <span class="td_begin">第'.$i.'天  '.$arr[$j]['title'] .'</span>
							<div class="td_content_detail">
                                <span class="td_detail_begin eat"'.$repast_style.'>用餐情况</span>
                                <table class="td_eat_table"'.$repast_style.'>
    					            <tbody>
                                      <tr>
                                        <td>早餐</td>
                                        <td>'.$breakinfo.'</td>
                                        <td>参考：'.$b_desc.'</td>
                                      </tr>
                                      <tr>
                                        <td>午餐</td>
                                        <td>'.$lunchinfo.'</td>
                                        <td>参考：'.$l_desc.'</td>
                                      </tr>
                                      <tr>
                                        <td>晚餐</td>
                                        <td>'.$supperinfo.'</td>
                                        <td>参考：'.$s_desc.'</td>
                                      </tr>
                                    </tbody>
                                </table>
                                <span class="td_detail_begin hotel" '.$simple_hotel_style.'>
                                     住宿:'.$arr[$j]['hotel'].'
                                </span>
                                <span class="td_detail_begin vehicle">
                                    交通工具：'.$arr[$j]['transport'].'
                                </span>
                                <div class="td_travel_detai">
                                    <dl>
                                        <dt>介绍</dt>
                                        <dd>
                                            <p>'.nl2br($arr[$j]['tjieshao']).'</p>
					                        <ul class="fix">
                                                '.$timghtml.'
                                            </ul>
                                            '.$detailhtml.'
                                        </dd>
                                    </dl>
                                </div>
                            </div>
    					</div>';
            }
            $out .= '</div>';
        }
        return $out;
    }
    
    public function checkJieShao3($lineid)
    {
        $db_prefix=C("DB_PREFIX");
        $sql = "select count(*) as num from ".$db_prefix."line_jieshao where lineid='$lineid'";
        $row = M()->getOneRow($sql);
        //p($row);
        return $row['num']>0 ? 1 : 0;
    
    }
        
    
    public function getLineSuit($lineid){
        $db_prefix=C("DB_PREFIX");
        $sql="select a.* from ".$db_prefix."line_suit a where a.lineid='$lineid' order by a.displayorder asc";
        $suitR=M()->query($sql);
        $this -> assign("linesuit", $suitR);
    }
    
    public function getPiclistArr($row)
    {
        $num=0;
        $defaultImg='template/' . C('WEB_STYLE') ."/common/images/240x135_default.jpg";
        $biglist="";
        if(empty($row['linepic'])&&empty($row['piclist']))//没有任何图片时处理
        {
            /*$temp_small=empty($GLOBALS['cfg_df_img'])?'/templets/default/images/pic_tem.gif':$GLOBALS['cfg_df_img'];
            $temp_big=empty($GLOBALS['cfg_df_img'])?'/templets/default/images/pic_tem.gif':$GLOBALS['cfg_df_img'];

            $biglist =' <li><img src="'.$temp_big.'" width="611" height="300"/></li>';
            $thumblist =' <li><s></s><img src="'.$temp_small.'" width="96" height="65"/></li>';*/
            $biglist .='<li>
            					<a href="/'.$defaultImg.'">
            						<img src="/'.$defaultImg.'" title="">
            					</a>
            				</li>';
        }else if(empty($row['piclist'])&&!empty($row['linepic'])) //只上传封面的情况.
        {
            /*$litpic=str_replace('litpic','lit160',$row['linepic']);
            $bigpic = str_replace('litimg','allimg',$litpic);
            $biglist =' <li><img src="'.$biglist.'" width="611" height="300"/></li>';
            $thumblist =' <li><s></s><img src="'.$litpic.'" width="96" height="65"/></li>';*/
            $biglist .='<li>
            					<a href="/'.$row['linepic'].'">
            						<img src="/'.$row['linepic'].'" title="">
            					</a>
            				</li>';
        }else
        {
            $picarr=explode(',',$row['piclist']);
            if(!empty($row['linepic']))
            {
                $biglist .='<li>
            					<a href="/'.$row['linepic'].'">
            						<img src="/'.$row['linepic'].'" title="">
            					</a>
            				</li>';
            }
            foreach($picarr as $value)
            {
                if(empty($value))
                {
                    continue;
                }
                $temparr=explode('||',$value);
                $biglist .='<li>
            					<a href="/'.$temparr[0].'">
            						<img src="/'.$temparr[0].'" title="">
            					</a>
            				</li>';
            }
        }
        return $biglist;
    }
    
	//网站首页
	public function search() {
	   $typeid=1;
       $db_prefix=C("DB_PREFIX");
       
       $dest_id=Q('dest_id');
       if(!is_numeric($dest_id)) //如果dest_id不是数字,则用户使用拼音访问需要获取相应的目的地id,否则,则直接赋值
       {
            if($dest_id!='all')
            {
                $d_id = getDestIdByPinYin($dest_id);
                $dest_id = !empty($d_id) ? $d_id : 0;
            }
            else
            {
               $dest_id = 0 ;
            }
       }
	   //存储前一个用户选择导航.
       $dest_id=isset($dest_id) ? $dest_id : 0;
       $pkname = get_par_value($dest_id,$typeid);//上一级
       $para1=Q('para1',0);
       $day=Q('day',0);
       $priceid=Q('priceid',0);
       $attrid=Q('attrid',0);
       $sorttype=Q('sorttype',0);
       /*if($sorttype==0){
            $sorttype=6;
       }*/
       $cityid =$startcity=Q('startcity',0);
       
       $this -> assign("destid", $dest_id);
       $this -> assign("para1", $para1);
       $this -> assign("day", $day);
       $this -> assign("priceid", $priceid);
       $this -> assign("sorttype", $sorttype);
       $this -> assign("attrid", $attrid);
       $this -> assign("startcity", $startcity);
       $this -> assign("pkname", $pkname);



        //下级目的地
        $destlist = getChildDest($dest_id,$typeid);
        
        
        $tempDestStr="";
        foreach($destlist as $key => $val){
            $tempDestStr.=$val['id'].',';
        }
        $tempDestStr=trim($tempDestStr,',');
        $last_dest_id = array_remove_value($tempDestStr);
        $destinfo = getParentDestNav($last_dest_id);
        if($dest_id==0){
           $this -> assign("lastDestinfo", null); 
        }else{
            $this -> assign("lastDestinfo", $destinfo[count($destinfo)-2]);
        }
        
        //p($destinfo[count($destinfo)-1]);die;
        
        
        
        $this -> assign("destlist", $destlist);
        
        
        $this->getlineguide('day');
        $this->getlineguide('price');
        
        //p($destlist);die;

       
	   $this->getstartplace();
       
       $this->attrgrouplist();
       
       
        $where="where a.ishidden=0 ";
        $wherecount=" where  a.ishidden=0 ";
        if(!empty($dest_keyword))
        {
        	//$keyword=$dest_keyword;
        }
        //关键词搜索
        if(!empty($keyword))
        {
            
        }
        $orderby="";
        //$destkind = new destination($dest_id);
        
        if(!empty($dest_id)&& $dest_id!=0)
        {
            if(empty($key_dest))
            {
                $where.=" and FIND_IN_SET($dest_id,a.kindlist)";
                $wherecount.="  and FIND_IN_SET($dest_id,a.kindlist)";
                $orderby=" order by b.isding desc,case when b.displayorder is null then 9999 end,b.displayorder asc ";
               // p($dest_id);
            }
            else
            {
                $orderby=" order by b.isding desc,case when b.displayorder is null then 9999 end,b.displayorder asc ";
            }
        }else{
            $orderby="order by a.isding desc,a.displayorder asc ";
        }
        
        //天数
        if(!empty($day) && $day!=0)
        { 
          $where.=" and a.lineday=$day ";
          $wherecount.=" and a.lineday=$day ";
        }
        //价格范围
        if(!empty($priceid)&& $priceid!=0)
        {
           $pricearr=$this->getMinMaxprice($priceid);//取得价格范围的最小与最大值 .
           
           $where.=" and a.lineprice >= {$pricearr['min']} and a.lineprice <= {$pricearr['max']} ";
           $wherecount.=" and a.lineprice >= {$pricearr['min']} and a.lineprice <= {$pricearr['max']} ";
        }

        //出发城市
        if(!empty($startcity) && $startcity!=0)
        {
            $where.=" and a.startcity = '$startcity' ";
            $wherecount.=" and a.startcity = '$startcity' ";
        }
        
        //属性
        if($attrid)
        { 
           $attrwhere = getAttWhere($attrid);//属性条件
           $where.= $attrwhere;
          
           $wherecount.= $attrwhere;
        }
        
        $fields="a.id,a.aid,a.linepic,a.iconlist,a.webid,a.lineicon,a.linename as title,a.piclist,a.seotitle,a.sellpoint,a.linepic as litpic,a.storeprice,a.lineprice,a.linedate,a.transport,a.lineday,a.startcity,a.overcity,a.shownum,a.satisfyscore,a.bookcount,a.features,a.jifenbook,a.jifentprice,a.jifencomment,a.paytype,a.attrid,a.storeprice";
        if(!empty($sorttype) && $sorttype!=0)
        {
            if($sorttype==1)//特价排序
        	{
        	
        	   $orderby = "order by b.istejia desc";
        	}
            else if($sorttype==1) //推荐排序
            {
                $orderby = "order by b.isjian desc";	
            }
            else if($sorttype==2) //价格
        	{
        	    $orderby=" order by a.lineprice asc";	
        	}
            else if($sorttype==3) //销量
        	{
        		$orderby=" order by a.bookcount desc";
        	}
            else if($sorttype==5) //满意度
        	{
        		$orderby=" order by a.satisfyscore desc";
        	}
            else if($sorttype==6) //按目的地设置的排序
            {
               $orderby=" order by case when b.displayorder is null then 9999 end,b.displayorder asc";
            }
        }
        
        //查询sql
        if(!empty($dest_id))
        {

            $countsql="select 
                    count(*) as cnt
                    from 
                    ".$db_prefix."line as a left join 
                    ".$db_prefix."kindorderlist b on(a.id=b.aid and b.typeid=1 and b.classid=$dest_id ) 
                    {$where}
                    {$orderby},modtime desc,addtime desc ";
            
        }
        else
        {

            $countsql="select 
                    count(*) as cnt
                    from 
                    ".$db_prefix."line as a left join 
                    ".$db_prefix."allorderlist b on(a.id=b.aid and b.typeid=1 ) 
                    {$where}
                    {$orderby},modtime desc,addtime desc ";

        }
        //p($hotLineSql);
        //$temparr = getLineCount($wherecount);
        $count = M()->getOne($countsql,'cnt');
        //p($count);
        $page = new TourPage($count,2);
        $this -> page = $page -> show(6);
        $limitarr=$page -> limit();
        $limitstr=$limitarr['limit'];
        
        //查询sql
        if(!empty($dest_id))
        {
            $sql="select 
                    {$fields},a.linepic as litpic,b.isjian,b.isding,b.istejia 
                    from 
                    ".$db_prefix."line as a left join 
                    ".$db_prefix."kindorderlist b on(a.id=b.aid and b.typeid=1 and b.classid=$dest_id ) 
                    {$where}
                    {$orderby},modtime desc,addtime desc limit {$limitstr} ";

            
        }
        else
        {
            $sql="select 
                    {$fields},a.linepic as litpic,b.isjian,b.isding,b.istejia 
                    from 
                    ".$db_prefix."line as a left join 
                    ".$db_prefix."allorderlist b on(a.id=b.aid and b.typeid=1 ) 
                    {$where}
                    {$orderby},modtime desc,addtime desc  limit {$limitstr}  ";


        }
        //p($orderby);
        $hotLineSql="select 
                    {$fields},a.linepic as litpic
                    from 
                    ".$db_prefix."line as a left join 
                    ".$db_prefix."allorderlist b on(a.id=b.aid and b.typeid=1 and b.webid=1 ) 
                     where a.ishidden=0   and FIND_IN_SET(1,a.iconlist)
                    {$orderby} , modtime desc,addtime desc ";
        
        
        
        $lineList=M()->query($sql);
        $startplaceModel=K('Startplace');
        if(!empty($lineList)){
            foreach($lineList as $key => &$val){
                $val['startcity'] = $startplaceModel->getStartCityName($val['startcity']);
                $val['maxmindateshow']=getMaxMinSuitTime($val['id']);
                $showAttrs=getLineAttrName2($val['attrid'],20);
                $val['showattrs']=$showAttrs;
                $real=getLineRealPrice($val['id'],$val['webid']);
                $val['lineprice']=$real ? $real : $val['lineprice'];
                $val['price'] = empty($val['lineprice'])?'<p><strong>电询</strong></p>': '<p>¥ <strong>'.$val['lineprice'].'</strong>起</p>';
                $val['iconshow']=$this->getIconList($val['iconlist']);
            }
        }
        //p($lineList);
        $this -> assign("lineList", $lineList);
        
        
        $hotLineList=M()->query($hotLineSql);
        if(!empty($hotLineList)){
            foreach($hotLineList as $key => &$val){
                $val['startcity'] = $startplaceModel->getStartCityName($val['startcity']);
                $val['maxmindateshow']=getMaxMinSuitTime($val['id']);
                $showAttrs=getLineAttrName2($val['attrid'],1);
                $val['showattrs']=$showAttrs;
                $real=getLineRealPrice($val['id'],$val['webid']);
                $val['lineprice']=$real ? $real : $val['lineprice'];
                $val['price'] = empty($val['lineprice'])?'<strong>电询</strong>': '<strong>¥'.$val['lineprice'].'起</strong>';
                $val['iconshow']=$this->getIconList($val['iconlist']);
            }
        }
        $this -> assign("hotLineList", $hotLineList);
        
	    $CacheTime = C('CACHE_LINES_SEARCH') >= 1 ? C('CACHE_LINES_SEARCH') : -1;
        //echo U('index/index/index/',array('webid'=>2));
		$this -> display('template/' . C('WEB_STYLE') . '/lines/line_search.html', $CacheTime);
	}
    
    public function getIconList($iconids,$esplit=',')
    {
        $db_prefix=C("DB_PREFIX");
        $arr = explode($esplit,$iconids);
        $out = array();
        
        
        
        foreach($arr as $id)
        {
            $sql = "select kind from ".$db_prefix."icon where id='$id' ";  
            $row = M()->getOneRow($sql);
            if(!empty($row['kind']))
                array_push($out,$row['kind']);
    
        }
        
        $count=1;
        $i=0;
        $outstr="";
        foreach($out as $v)
        {
            if($i>=$count){
                break;
            }
            $outstr.="<i class='travel_tag_01'>{$v}</i> ";
            $i++;
        }
        return $outstr;
    }
    
    /**
     *  获得线路条数和访问次数
     *
     * @access    private
     * @return    arr
     */
    public function getLineCount($where)
    {
        /*$db_prefix=C("DB_PREFIX");
      
        $arr=array();
        $where=!empty($where) ? " {$where} " : '';
     
        $sql="select 
                    count(a.id) as num,
                    SUM(a.shownum) as showcount 
                from 
                    ".$db_prefix."line as a  left join 
                    ".$db_prefix."kindorderlist b on (a.id=b.aid and b.typeid='{$typeid}' and b.classid='{$dest_id}')  
                    {$where}";  
     
      $row=$dsql->GetOne($sql);
      if(is_array($row))
      {
       $arr[]=isset($row['num']) ? $row['num'] : 0;
       $arr[]=isset($row['showcount'])?$row['showcount'] : 0;
      }
      return $arr;*/
    }
    
    public function getMinMaxprice($priceid)
    {
        $db_prefix=C("DB_PREFIX");
        $arr=array();
        $arr['min']='';
        $arr['max']='';
        $sql="select lowerprice as min,highprice as max from ".$db_prefix."line_pricelist where id=$priceid";
        $row=M()->getOneRow($sql);
    
        if(is_array($row))
        {
            $arr['min']=!empty($row['min'])?$row['min']:0;
            $arr['max']=!empty($row['max'])?$row['max']:99999;
        }
     
        return $arr;
    }
        
    
    
    public function attrgrouplist($typeid="1",$filterid='91',$row=8){
        $db_prefix=C("DB_PREFIX");
        $w = !empty($filterid) ? " and id not in($filterid)" : '';//排除不要的项
        $w.= $typeid>13 ? " and typeid=$typeid" : '';//如果是扩展模块,则增加typeid判断
        $tablearr=array(
                    '1'=>$db_prefix.'line_attr',
                    '2'=>$db_prefix.'hotel_attr',
                    '3'=>$db_prefix.'car_attr',
                    '4'=>$db_prefix.'article_attr',
                    '5'=>$db_prefix.'spot_attr',
                    '6'=>$db_prefix.'photo_attr',
                    '11'=>$db_prefix.'jieban_attr',
                    '13'=>$db_prefix.'tuan_attr');
        $tablename=isset($tablearr[$typeid]) ? $tablearr[$typeid] : $db_prefix.'model_attr';
        $sql="select 
                    id,webid,attrname as groupname 
                from {$tablename} 
                where 
                    pid=0 and 
                    webid=1 and
                    isopen=1 
                    {$w} 
                order by displayorder asc limit 0,$row" ;
        $attrGroupList=M()->query($sql);
        //p($attrGroupList);
        if(!empty($attrGroupList)){
            foreach($attrGroupList as $key=>&$val){
                $val['attrList']=$this->getattrbygroup('1',$val['id'],$val['webid']);
                $val['attrid']=$val['id'];

            }
        }
        $this -> assign("attrGroupList", $attrGroupList);
        //p($attrGroupList);die;
    }
    
    public function getattrbygroup($typeid="1",$pid,$webid){
        $db_prefix=C("DB_PREFIX");
        $row=80;
        $tablearr=array(
                    '1'=>$db_prefix.'line_attr',
                    '2'=>$db_prefix.'hotel_attr',
                    '3'=>$db_prefix.'car_attr',
                    '4'=>$db_prefix.'article_attr',
                    '5'=>$db_prefix.'spot_attr',
                    '6'=>$db_prefix.'photo_attr',
                    '11'=>$db_prefix.'jieban_attr',
                    '13'=>$db_prefix.'tuan_attr');
        $tablename=isset($tablearr[$typeid]) ? $tablearr[$typeid] : $db_prefix.'model_attr';
        $sql="select id,attrname from {$tablename} where pid='$pid' and webid='$webid'  order by displayorder asc limit 0,{$row}";
        $attrlist=M()->query($sql);
        if(!empty($attrlist)){
            foreach($attrlist as $key=>&$val){
                $val['groupid_attrid']=$pid.'_'.$val['id'];
                $val['attrid']=$val['id'];

            }
        }
        return $attrlist;
    }
    
    
    public function getlineguide($flag='',$row=10){
        $db_prefix=C("DB_PREFIX");
        if($flag=='day')
    	{
            $sql="select id,word from ".$db_prefix."line_day  where webid=1 order by word asc";
            $dayResult=M()->query($sql);
            if(!empty($dayResult)){
                $autoindex=0;
                $rowcount=count($dayResult);
                foreach($dayResult as $key=>&$row){
                    $autoindex++;
                    $number=substr($row['word'],0,2);
                    $arr=array("零","一","二","三","四","五","六","七","八","九");
                    if(strlen($number)==1)
      		        {
                       $result=$arr[$number];
                    }
                    else
                    {
                        if($number==10)
                        {
                            $result="十";
                        }
                        else{
                            if($number<20)
                            {
                                $result="十";
                            }
                            else{
                                $result=$arr[substr($number,0,1)]."十";
                            }
                            if(substr($number,1,1)!="0")
                            {
                                $result.=$arr[substr($number,1,1)]; 
                            }
                        }
                    }
                    if(true) //检测是否存在.
                    {
                        if($autoindex==$rowcount){
                            $row['title']=$result."日游以上";
                        }
                        else
                        {
                            $row['title']=$result."日游";
                        }
                        
                    }else
      		        {
                        continue;
      		        }
                }
                
            }

            $this -> assign("dayResult", $dayResult);
    	}else if($flag=='price'){
    	   $sql="select 
                    id,aid,lowerprice as min,highprice as max 
                from ".$db_prefix."line_pricelist where webid=1 order by min limit 0,{$row}";
            $priceResult=M()->query($sql);
            if(!empty($priceResult)){
                $autoindex=0;
                $rowcount=count($priceResult);
                foreach($priceResult as $key=>&$row){
                    if(true) //检测价格范围是否存在.
                    {
                        if($row['min']!=''&& $row['max']!='' && $row['min']!=0)
        			   {
        				  $row['title']=$row['min'].'~'.$row['max'].'';
        			   }
        			   else if($row['min']=='' || $row['min']==0)
        			   {
        				  $row['title']=$row['max'].'以下';
        			   }
        			   else if($row['max']=='')
        			   {
        				  $row['title']=$row['min'].'以上';
        			   }
                    }
                }
            }
            $this -> assign("priceResult", $priceResult);
    	}
        
    }
    
    public function getstartplace($row=20,$flag='top',$limit=0,$pname=''){
        $db_prefix=C("DB_PREFIX");
        if($flag=='top')
    	{
    		$sql="select * from ".$db_prefix."startplace where isopen=1 and pid!=0 order by displayorder asc limit $limit,$row";
    	}
        $startplace=M()->query($sql);
        $this -> assign("startplace", $startplace);
    }
    
    public function vlist($row=100,$name=''){
        
    }
    
    
}
