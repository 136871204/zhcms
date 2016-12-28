<?php

/**
 * 权限节点管理
 * Class NodeControl
 * @author 周鸿 <136871204@qq.com>
 */
class TourOrderControl extends AuthControl{
    //模型
    private $_db;
    //节点树
    private $_node;
    
    public function __init()
    {
        //获得模型实例
        //$this->_db = K("Node");
        //$this->_node = cache("node");
    }
    
    //节点列表
    public function index()
    {
        $db_prefix=C('DB_PREFIX');
        $tourModelModel=K('TourModel');
        $tourMemberOrderModel=K('TourMemberOrder');
        
        
        $action=Q("action");
        $typeid=Q("typeid");
        $webid=Q("webid");
        
        $this->assign('typeid',$typeid);
        $channelname = $tourModelModel->getModuleName($typeid);
        if(empty($action))  //显示列表
        {
            $this->assign('position',$channelname.'订单');
            $this->assign('channelname',$channelname);
            $this->display('list.php');
        }else if($action=='read')    //读取列表
        {
            $start=Q("start");
            $limit=Q("limit");
            $keyword=Q("keyword");
            $order='order by a.addtime desc';
            $w = "where a.typeid = $typeid";
            if(!empty($keyword))
            {
                $w .=" and (a.ordersn like '%{$keyword}%' or a.linkman like '%{$keyword}%' or a.linktel like '%{$keyword}%' or a.productname like '%{$keyword}%')";
                $start = 0;
            }
            $w.=empty($webid)||$webid==1?'  ':" and a.webid=$webid";
            $sql="select a.*  from ".$db_prefix."tour_member_order as a $w $order limit $start,$limit";
            $countSql="select count(*) as num from ".$db_prefix."tour_member_order a $w ";
            $totalcount_arr=M()->query($countSql);
            $list=M()->query($sql);
            $new_list=array();
            if(!empty($list)){
                foreach($list as $k=>$v)
                {
                    $v['addtime'] = TourCommon::myDate('Y-m-d H:i:s',$v['addtime']);
                    if($v['pid']!=0)
                    {
                        $v['productname'] = $v['productname']."[<span style='color:red'>子订单</span>]";
                    }
    
                    $new_list[] = $v;
                }
            }
            
            $result['total']=$totalcount_arr[0]['num'];
            $result['lists']=$new_list;
            $result['success']=true;
            echo json_encode($result);exit;
        }else if($action=='update'){
            $id=Q("id");
            $field=Q("field");
            $val=Q("val");
            if(is_numeric($id))
            {
                $model=$tourMemberOrderModel->find($id);
            }
            if($model['id'])
            {
                $oldstatus = $model['status'];
                $model[$field]=$val;
                $opid=$tourMemberOrderModel->update($model);
                if($opid){
                    echo 'ok';
                    if($field=='status' && $val==2)//完成交易
                    {
                        //Model_Member_Order::refundJifen($id);
                    }
                    if($field=='status' && $val==3)//取消订单
                    {
                        $tourMemberOrderModel->refundStorage($id,'plus');
                    }
                    else if($field=='status' && $oldstatus==3 && $val==1) //由取消变为在处理中
                    {
                        $tourMemberOrderModel->refundStorage($id,'minus');//订单增加,库存减少
                    }

                    exit;
                }else{
                    echo 'no';exit;
                }
            }
        }
    }
    
    public function view(){
        $db_prefix=C('DB_PREFIX');
        $tourMemberOrderModel=K('TourMemberOrder');
        
        $id = Q('id');
        $type = Q('type');
        $typeid = Q('typeid');
        if($type == 'dz') //customize订单
        {
            $info = ORM::factory('customize')->where('id','=',$id)->find()->as_array();
            $templet = 'dz_view';
        }

        else if($type == 'xy') //协议订单
        {
            $info = ORM::factory('dzorder')->where('id','=',$id)->find()->as_array();
            $templet = 'xy_view';

        }
        else //普通产品订单
        {
            $info = $tourMemberOrderModel->find($id);
            $templet = 'view.php';
        }
        
        if($typeid=='1' || $typeid=='8') //线路和签证有游客信息
        {
            $sql = "select * from ".$db_prefix."tour_member_order_tourer where orderid='{$info['id']}'";
            $tourer =M()->query($sql);
            if(!empty($tourer))$this->assign('tourer',$tourer);
        }
        
        $this->assign('info',$info);
        $this->assign('typeid',$typeid);
        $this->display($templet);
    }
    
    public function ajax_save(){
        $tourMemberOrderModel=K('TourMemberOrder'); 
        
        $id = Q('id');
        $type = Q('type');
        
        $status = false;
        if(empty($type))
        {
            $model = $tourMemberOrderModel->find($id);  
            $model['price'] = Q('price');
            $oldstatus = $model['status'];//原来状态*/

        }    
        else if($type == 'dz')
        {
            //$model = ORM::factory('customize',$id);

        }
        else if($type == 'xy')
        {
            //$model = ORM::factory('dzorder',$id);
        }
        $model['status'] = Q('status');
        $opid=$tourMemberOrderModel->update($model);
        if($opid)
        {
            $current_status = Q('status');
            if($oldstatus!=$current_status)
            {
                if($oldstatus!=3 && $current_status==3)
                {
                    $tourMemberOrderModel->refundStorage($id,'plus');//订单取消,增加库存
                }
                else if($oldstatus==3 && $current_status==1) //由取消变为在处理中
                { 
                    $tourMemberOrderModel->refundStorage($id,'minus');//订单增加,库存减少
                }
            }
            $status = true;
        }
        echo json_encode(array('status'=>$status));exit;
    }
    
    
    public function excel(){
               
        $this->assign('typeid',Q('typeid'));
        $this->display('excel.php');
                            
    }
    
    public function genexcel(){
        $tourMemberOrderModel=K('TourMemberOrder');
        
        
        $typeid = Q('typeid');
        $timetype = Q('timetype');
        $starttime = strtotime(Q('starttime'));
        $endtime = strtotime(Q('endtime'));
        switch($timetype)
        {
            case 1:
                $time_arr = TourCommon::getTimeRange(1);
                break;
            case 2:
                $time_arr = TourCommon::getTimeRange(2);
                break;
            case 3:
                $time_arr = TourCommon::getTimeRange(3);
                break;
            case 5:
                $time_arr = TourCommon::getTimeRange(5);
                break;
            case 6:
                $time_arr = array($starttime,$endtime);
                break;

        }
        $stime = date('Y-m-d',$time_arr[0]);
        $etime = date('Y-m-d',$time_arr[1]);
        
        $arr = $tourMemberOrderModel->where("addtime>=$time_arr[0] and addtime<=$time_arr[1] and typeid='$typeid' and pid=0")->All();
        $table = "<table><tr>";
        $table.="<td>订单号</td>";
        $table.="<td>产品名称</td>";
        $table.="<td>预订日期</td>";
        $table.="<td>使用日期</td>";
        $table.="<td>成人数量</td>";
        $table.="<td>成人价格</td>";
         if($typeid==1)
        {
            $table.="<td>儿童数量</td>";
            $table.="<td>儿童价格</td>";
            $table.="<td>老人数量</td>";
            $table.="<td>老人价格</td>";
        }
        $table.="</tr>";
        if(!empty($arr)){
            foreach($arr as $row)
            {
                $table.="<tr>";
                $table.="<td>{$row['ordersn']}</td>";
                $table.="<td>{$row['productname']}</td>";
                $table.="<td>".TourCommon::myDate('Y-m-d H:i:s',$row['addtime'])."</td>";
                $table.="<td>{$row['usedate']}</td>";
                $table.="<td>{$row['dingnum']}</td>";
                $table.="<td>{$row['price']}</td>";
    
                if($typeid==1)
                {
                    $table.="<td>{$row['childnum']}</td>";
                    $table.="<td>{$row['childprice']}</td>";
                    $table.="<td>{$row['oldnum']}</td>";
                    $table.="<td>{$row['oldprice']}</td>";
                }
                $table.="</tr>";
    
            }
        }
        $table.="</table>";
        
        $filename = date('Ymdhis');
        header ( 'Pragma:public');
        header ( 'Expires:0');
        header ( 'Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header ( 'Content-Type:application/force-download');
        header ( 'Content-Type:application/vnd.ms-excel');
        header ( 'Content-Type:application/octet-stream');
        header ( 'Content-Type:application/download');
        header ( 'Content-Disposition:attachment;filename='.$filename.".xls" );
        header ( 'Content-Transfer-Encoding:binary');
        echo $table;
        exit();
    }
    
    /*
     * 订单统计数据查看
     * */
    public function dataview()
    {
        $year = date('Y');
        $this->assign('thisyear',$year);
        $this->assign('typeid',Q('typeid'));
        $this->display('data_view.php');
    }
    
    public function ajax_year_tj(){
        $year = Q('year');
        $typeid = Q('typeid');
        $current_year = date('Y');
        if($current_year<$year) exit('12');
        for($i=1;$i<=12;$i++)
        {
            $starttime =date('Y-m-d',mktime(0,0,0,$i,1,$year));//开始时间

            $endtime = strtotime("$starttime +1 month -1 day");//结束时间
            $timearr = array(strtotime($starttime),$endtime);

            $out[$i]= $this->getOrderDetailPrice($timearr,$typeid);
        }
        echo json_encode($out);exit;
    }
    
    public function ajax_sell_tj(){
        $out = array();
        $typeid = Q('typeid');
        //今日销售
        $time_arr = TourCommon::getTimeRange(1);
        $out['today'] = $this->getOrderDetailPrice($time_arr,$typeid);

        //昨日销售
        $time_arr = TourCommon::getTimeRange(2);
        $out['last'] = $this->getOrderDetailPrice($time_arr,$typeid);

        //本周销售
        $time_arr = TourCommon::getTimeRange(3);
        $out['thisweek'] = $this->getOrderDetailPrice($time_arr,$typeid);

        //本月销售
        $time_arr = TourCommon::getTimeRange(5);
        $out['thismonth'] = $this->getOrderDetailPrice($time_arr,$typeid);

        echo json_encode($out);exit;
    }
    
    /*
     * 获取已付款,未付款,已取消数量及价格
     * */
    private function getOrderDetailPrice($timearr,$typeid)
    {
        $tourMemberOrderModel=K('TourMemberOrder');
        $where = '';
        $out = array();
        if(is_array($timearr))
        {
            $starttime = $timearr[0];
            $endtime = $timearr[1];
            $where = "addtime>=$starttime and addtime<=$endtime and";
        }
        //已付款
        $arr = $tourMemberOrderModel->where("{$where} typeid=$typeid and ispay=1")->All();
        $price = 0;
        if(!empty($arr)){
            foreach($arr as $row)
            {
                $price+= intval($row['dingnum'])*$row['price']+intval($row['childnum'])*$row['childprice'];
            } 
        }
        
        $out['pay']=array(
            'num'=>count($arr),
            'price'=>$price
        );
        //未付款
        $arr = $tourMemberOrderModel->where("{$where} typeid=$typeid and ispay=0")->All();
        $price = 0;
        if(!empty($arr)){
            foreach($arr as $row)
            {
                $price+= intval($row['dingnum'])*$row['price']+intval($row['childnum'])*$row['childprice'];
            }
        }
        $out['unpay']=array(
            'num'=>count($arr),
            'price'=>$price
        );
        //已取消
        $arr = $tourMemberOrderModel->where("{$where} typeid=$typeid and status=3")->All();
        $price = 0;
        if(!empty($arr)){
            foreach($arr as $row)
            {
                $price+= intval($row['dingnum'])*$row['price']+intval($row['childnum'])*$row['childprice'];
            }
        }
        $out['cancel']=array(
            'num'=>count($arr),
            'price'=>$price
        );
        return $out;


    }
    
    
    public function ajax_sell_info(){
        $out = array();
        $typeid = Q('typeid');
        
        //今日销售
        $time_arr = TourCommon::getTimeRange(1);
        $out['today'] = $this->getOrderPrice($time_arr,$typeid);
        
         //昨日销售
        $time_arr = TourCommon::getTimeRange(2);
        $out['last'] = $this->getOrderPrice($time_arr,$typeid);

        //本周销售
        $time_arr = TourCommon::getTimeRange(3);
        $out['thisweek'] = $this->getOrderPrice($time_arr,$typeid);

        //本月销售
        $time_arr = TourCommon::getTimeRange(5);
        $out['thismonth'] = $this->getOrderPrice($time_arr,$typeid);

        //全部销售额
        $out['total'] = $this->getOrderPrice(0,$typeid);
        
        echo json_encode($out);
        exit;
        
    }
    
    //根据时间范围获取某个产品类型订单数量.
    private function getOrderPrice($timearr,$typeid)
    {
        $tourMemberOrderModel=K('TourMemberOrder');
        $where = '';
        if(is_array($timearr))
        {
            $starttime = $timearr[0];
            $endtime = $timearr[1];
            $where = "addtime>=$starttime and addtime<=$endtime and";
        }
        $arr =$tourMemberOrderModel->where("{$where} typeid=$typeid")->All();
        $price = 0;
        if(empty($arr)){
            return $price;
        }
        foreach($arr as $row)
        {
            $price+= intval($row['dingnum'])*$row['price']+intval($row['childnum'])*$row['childprice'];
        }
        return $price;
    }
    
    
}
