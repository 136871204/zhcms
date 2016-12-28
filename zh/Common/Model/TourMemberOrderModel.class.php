<?php
/**
 * 用户管理模型
 * Class UserModel
 */
class TourMemberOrderModel extends ViewModel {
    public $table = "tour_member_order";
    
    
    /*
     * 返积分操作
     * */
    public  function refundJifen($orderid)
    {
        /*$row = $this->find($orderid)
        if(isset($row))
        {
            $memberid = $row['memberid'];
            $jifenbook = intval($row['jifenbook']);
            $member = ORM::factory('member')->where("mid=$memberid");
            $member->jifen = intval($member->jifen) + $jifenbook;
            $member->save();
            if($member->saved())
            {
                $memberid = $member->mid;
                $content = "预订{$row['productname']}获得{$jifenbook}积分";
                self::addJifenLog($memberid,$content,$jifenbook,2);
            }

        }*/

    }
    
    /*
     * 返库存操作
     * */
    public  function refundStorage($orderid,$op)
    {
        $row = $this->where('id='.$orderid)->find();
        if(isset($row))
        {
            $dingnum = intval($row['dingnum'])+intval($row['childnum']);
            $suitid = $row['suitid'];
            $productid = $row['productautoid'];
            $typeid = $row['typeid'];
            $usedate = strtotime($row['usedate']);


            $storage_table=array(
                    '1'=>'zh_line_suit_price',
                    '2'=>'zh_hotel_room_price',
                    '3'=>'zh_car_suit_price',
                    '5'=>'zh_spot_ticket',
                    '8'=>'zh_visa',
                    '13'=>'zh_tuan'
            );
            $table = $storage_table[$typeid];
            //加库存
            if($op=='plus')
            {
                if($typeid==1||$typeid==2||$typeid==3)
                 $sql = "update {$table} set number=number+$dingnum where day='$usedate' and suitid='$suitid'";
                else
                 $sql = "update {$table} set number=number+$dingnum where id=$productid";
            }
            else if($op=='minus')
            {
                if($typeid==1||$typeid==2||$typeid==3)
                    $sql = "update {$table} set number=number-$dingnum where day='$usedate' and suitid='$suitid'";
                else
                    $sql = "update {$table} set number=number-$dingnum where id=$productid";
            }
            M()->exe($sql);
            //DB::query(2,$sql)->execute();
        }
    }
    
}
?>