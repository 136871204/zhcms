<?php
/**
 * 用户管理模型
 * Class UserModel
 */
class LineModel extends ViewModel {
    public $table = "line";
    
    
    /*
    * 更新最低报价
    * */
    public  function updateMinPrice($lineid)
    {
        $db_prefix=C("DB_PREFIX");
	    $newtime = time();
        $sql = "SELECT 
                    MIN(adultprice) as price 
                FROM 
                    ".$db_prefix."line_suit_price WHERE lineid='$lineid' and adultprice>0 and day>=$newtime";
        $ar = M()->query($sql);
        $price = $ar[0]['price'] ? $ar[0]['price'] : 0;
        $model = $this->find($lineid);
        $model['lineprice'] = $price;
        $this->update($model);


    }
   
   //线路信息
    public function getStandardInfo($aid)
    {
    	$db_prefix=C("DB_PREFIX");
    	$sql="select * from ".$db_prefix."line where id=$aid";
        $row=M()->GetOneRow($sql);
    	return $row;	
    } 
    
}
?>