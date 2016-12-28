<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class GoodTrashControl extends AuthControl {
    protected $db;
    
    public function __init() {
		$this -> db = K("Goods");
	}
    
	//ブランド一覧
	public function index() {
	    /*商品检索*/
        $is_delete= 1;
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);
        
        $where=$this -> db->goods_list_condition($is_delete);
         /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " .$this->db->tableFull. " AS g WHERE is_delete='$is_delete' $where";
        $count=M()->getOne($sql,'COUNT(*)');
        $page = new Page($count);
        $this -> page = $page -> show();
        $sql = "SELECT goods_id, goods_name, goods_type, goods_sn, shop_price, is_on_sale, is_best, is_new, is_hot, sort_order, goods_number, integral, " .
                        " (promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today') AS is_promote ".
                        " FROM " . $this->db->tableFull . " AS g WHERE is_delete='$is_delete' $where" .
                        " LIMIT " . implode(",", $page -> limit());
        $goods_list=M()->getAll($sql);
        $this->goods_list=$goods_list;
        $this -> display();
	}
    
    
	

	

	
    
    
}
