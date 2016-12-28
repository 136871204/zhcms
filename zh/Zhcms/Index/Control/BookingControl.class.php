<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class BookingControl extends TripControl {
    
    
	//网站首页
	public function index() {
	   $typeid=1; //线路栏目
       
       $lineid=Q('lineid');
       $lineid=pregReplace($lineid,2);
       $suitid=Q('suitid');
       $dopost=Q('dopost');
       $usedate=Q('usedate');
       $adultnum=Q('adultnum');
       $childnum=Q('childnum');
       $oldnum=Q('oldnum');
       if(empty($dopost))
       {

            $lineinfo=$this->getLineInfo($lineid);
            $suitinfo=$this->getLineSuitInfo($suitid);
            $priceinfo = $this->getDayPrice($usedate,$suitid);
            if(!isset($lineinfo))
            {
                head404();
         
            }
            if(empty($lineinfo['linesn'])){
                $line_sn = 'HIS' . str_repeat('0', 8 - strlen($aid)) . $aid;
                $lineinfo['lineseries']=$line_sn;//线路编号
            }else{
                $lineinfo['lineseries']=$lineinfo['linesn'];//线路编号
            }
            $lineinfo['usedate']=$usedate;//出团日期
            $lineinfo['title'] = $lineinfo['linename']."({$suitinfo['suitname']})";
            $lineinfo['suitname'] = $suitinfo['suitname'];
  
            $lineinfo['price'] = $priceinfo['adultprice']; //成人价格
            $lineinfo['childprice'] =  $priceinfo['childprice']; //小孩价格
            $lineinfo['oldprice'] =  $priceinfo['oldprice']; //婴儿价格
  
            
            $lineinfo['dingnum'] = intval($adultnum) ? intval($adultnum) : 1;//数量
            $lineinfo['childnum'] = intval($childnum) ? intval($childnum) : 0;
            $lineinfo['oldnum'] = intval($oldnum) ? intval($oldnum) : 0;
            $group = explode(',',$suitinfo['propgroup']);//人群
            
            $lineinfo['suitid'] = $suitid;
            $lineinfo['totalprice'] = $priceinfo['adultprice'] * $adultnum + $priceinfo['childprice'] * $childnum + $priceinfo['oldprice']* $oldnum;//总价格
            if(!empty($suitinfo['dingjin']))$GLOBALS['condition']['_djsupport']=1;//是否支持定金
            if(!empty($suitinfo['jifentprice']))$GLOBALS['condition']['_has_jifentprice']=1;
            if(!empty($suitinfo['jifencomment']))$GLOBALS['condition']['_has_jifencomment']=1;
            if(!empty($suitinfo['jifenbook']))$GLOBALS['condition']['_has_jifenbook']=1;
            if(in_array(1,$group))$lineinfo['haschild']=1;
            if(in_array(2,$group))$lineinfo['hasadult']=1;
            if(in_array(3,$group))$lineinfo['hasold']=1;
            $lineinfo['dingjin'] = $suitinfo['dingjin'];
            $lineinfo['jifentprice'] = $suitinfo['jifentprice'];
            $lineinfo['jifencomment'] = $suitinfo['jifencomment'];
            $lineinfo['jifenbook'] = $suitinfo['jifenbook'];
            //p($lineinfo);
            
            $this -> assign("lineinfo", $lineinfo);
            $this -> assign("handleshop", get_handle_shop());
            
            $CacheTime =-1;
            $this -> display('template/' . C('WEB_STYLE') . '/lines/line_booking.html', $CacheTime);
        
       }else if($dopost=="savebooking"){
            //p($_POST);
            $tourer = getTourer($_POST);
            
            $ordersn=get_order_sn('01');//订单号
            $suitinfo=$this->getLineSuitInfo($suitid);
            $priceinfo = $this->getDayPrice($usedate,$suitid);
            //p($suitinfo);die;
            $status = $suitinfo['paytype']==1 ? 1 : 0;
            $adultnum = pregReplace($adultnum,2);
            $childnum = pregReplace($childnum,2);
            $oldnum = pregReplace($oldnum,2);
            $total_dingnum = $adultnum+$childnum+$oldnum;
            if(intval($priceinfo['number'])!=-1 && intval($priceinfo['number']) < $total_dingnum)
            {
                echo 'nonumber';
                exit;
            }
            
            
            $linkman=Q('linkman');
            $linktel=Q('linktel');
            $linkemail=Q('linkemail');
            $remarkinfo=Q('remarkinfo');
            $productautoid=Q('productautoid');
            $productaid=Q('productaid');
            $dingjin=Q('dingjin');
            $productname=Q('productname');
            $handleshop=Q('handleshop');
            $linksex=Q('linksex');
            $linktel=pregReplace($linktel,2);
            //'webid'=>$webid,需要根据选择支店来分配
            $webid='1';
            $memberid='1';
            $arr = array(
                'ordersn'=>$ordersn,//产品序列号
                'memberid'=>$memberid,
                'webid'=>$webid,//站点id
                'typeid'=>$typeid,//线路的typeid是1
                'productautoid'=>$productautoid,//线路id
                'productaid'=>$productaid,
                'productname'=>$productname,
                'price'=>$priceinfo['adultprice'],
                'childprice'=>$priceinfo['childprice'],
                'oldprice'=>$priceinfo['oldprice'],
                'usedate'=>$usedate,
                'dingnum'=>pregReplace($adultnum,2),
                'childnum'=>pregReplace($childnum,2),
                'oldnum'=>pregReplace($oldnum,2),
                'linkman'=>pregReplace($linkman,5),
                'linktel'=>pregReplace($linktel,2),
                'linkemail'=>pregReplace($linkemail,5),
                'addtime'=>time(),
                'dingjin'=>pregReplace($dingjin,2),
                'paytype'=>$suitinfo['paytype'],
                'suitid'=>$suitid,
                'status'=>$status,
                'remark'=>pregReplace($remarkinfo,5),
                'handleshop'=>$handleshop,
                'linksex'=>$linksex,
                'tourer'=>$tourer
            );
            $price    =  $arr['price'];
            $remark   = $arr['remark'];
            $dingnum  = $arr['dingnum'];
            $childnum = $arr['childnum'];
            if($this->addOrder($arr))
            {
                //line_booking_success.html
                $CacheTime =-1;
                $this -> display('template/' . C('WEB_STYLE') . '/lines/line_booking_success.html', $CacheTime);
            }else{
                $CacheTime =-1;
                $this -> display('template/' . C('WEB_STYLE') . '/lines/line_booking_error.html', $CacheTime);
            }
       }
       //p($lineid);
       //echo 'booking';die;
	}
    
    public  function addOrder($arr)
    {
        
        $flag = 0;
        
        $tourMemberOrderModel=K('TourMemberOrder');
        if(is_array($arr))
        {
            $arr['kindlist'] = $this->getProductKindList($arr['productautoid'],$arr['typeid']);
            if($arr['paytype']=='3')//这里补充一个当为二次确认时,修改订单为未处理状态.
            {
                $arr['status'] = 0;
            }
            else
            {
                //$arr['status'] = 1;
            }
            if(isset($arr['tourer']))
            {
                $tourer = $arr['tourer'];
                unset($arr['tourer']);
            }
            $flag =$tourMemberOrderModel->add($arr);
            if($flag)
            {
                $this->addTourer($tourer,$flag);//添加联系人
                //减库存
                $dingnum = intval($arr['dingnum'])+intval($arr['childnum'])+intval($arr['oldnum']);
                $this->minusStorage($arr['usedate'],$arr['typeid'],$arr['suitid'],$arr['productautoid'],$dingnum);
                //$mobile = $memberinfo['mobile'];
                
                //p($dingnum);
            }
            return $flag;
        }
    }
    
    
    public function minusStorage($dingdate,$typeid,$suitid,$productid,$dingnum)
    {
        $db_prefix=C("DB_PREFIX");
        $day = strtotime($dingdate);
        $dingnum = $dingnum ? $dingnum : 1;
        switch($typeid)
        {
            case '1':

                $sql = "update ".$db_prefix."line_suit_price set number=number-$dingnum where day='$day' and suitid='$suitid' and number!=0 and number!=-1";
                M()->exe($sql);
                break;
        }
    }
    
    public function addTourer($arr,$orderid)
    {
        $tourMemberOrderTourerModel=K('TourMemberOrderTourer');
        $i=1;
        foreach($arr as $row)
        {
            $ar = array();
            $ar['tourername']= $row['tourername'.$i];
            $ar['sex'] = $row['tourersex'.$i];
            $ar['fnamealp'] = $row['tourerfnamealp'.$i];
            $ar['lnamealp'] = $row['tourerlnamealp'.$i];
            $ar['birthdayy'] = $row['tourerbirthdayy'.$i];
            $ar['birthdaym'] = $row['tourerbirthdaym'.$i];
            $ar['birthdayd'] = $row['tourerbirthdayd'.$i];
            $ar['passbook'] = $row['tourerpassbook'.$i];
            $ar['orderid'] = $orderid;
            $tourMemberOrderTourerModel->add($ar);
            $i++;
        }
    }
    
    public function getProductKindList($id,$typeid){
        $db_prefix=C("DB_PREFIX");
        $sql = "select maintable from ".$db_prefix."tour_model where id=$typeid";
        $row = M()->GetOneRow($sql);
        $table = $db_prefix.$row['maintable'];
        $sql = "select kindlist from $table where id='$id'";
        $row1 = M()->GetOneRow($sql);
        return $row1['kindlist'];
    }
    
    public function getDayPrice($usedate,$suitid)
    {
        $db_prefix=C("DB_PREFIX");
        $day = strtotime($usedate);
        $sql = "select 
                    adultprice,childprice,oldprice,number 
                from ".$db_prefix."line_suit_price where day='$day' and suitid='$suitid'";
        $row = M()->GetOneRow($sql);
        return $row;
    }

    
    /**
     *  获得预订线路套餐基本信息
     *
     * @access    private
     * @return    array
     */
    public function getLineSuitInfo($suitid)
    {
        $db_prefix=C("DB_PREFIX");
        $sql="select * from ".$db_prefix."line_suit where id=$suitid";
        $row=M()->GetOneRow($sql);
        return $row;
    }
        
    
    /**
     *  获得预订线路的基本信息
     *
     * @access    private
     * @return    array
     */
    public function getLineInfo($id)
    {
       $db_prefix=C("DB_PREFIX");
       $sql="select a.* from ".$db_prefix."line a where a.id=$id";
       $row=M()->GetOneRow($sql);
       return $row;
    }
        
}
