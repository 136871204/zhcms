<?php
/**
 * 用户管理模型
 * Class UserModel
 */
class BonusTypeModel extends ViewModel {
    public $table = "bonus_type";
    
    
    
    /**
     * 取得红包类型数组（用于生成下拉列表）
     *
     * @return  array       分类数组 bonus_typeid => bonus_type_name
     */
    public function get_bonus_type()
    {
        $bonus = array();
        $sql = 'SELECT type_id, type_name, type_money FROM ' . $this->tableFull .
               ' WHERE send_type = 3';
        $res = M()->query($sql);
        
        if(!empty($res)){
            foreach($res  as $k => $row){
                $bonus[$row['type_id']] = $row['type_name'].' [' .sprintf(C('CURRENCY_FORMAT'), $row['type_money']).']';
            }
        }
        
    
        return $bonus;
    }


    /**
     * 取得红包类型信息
     * @param   int     $bonus_type_id  红包类型id
     * @return  array
     */
    public function bonus_type_info($bonus_type_id)
    {
        $sql = "SELECT * FROM " . $this->tableFull .
                " WHERE type_id = '$bonus_type_id'";
    
        return $this->getRowSql($sql);
    }
        
    
    /**
     * 取得红包信息
     * @param   int     $bonus_id   红包id
     * @param   string  $bonus_sn   红包序列号
     * @param   array   红包信息
     */
    function bonus_info($bonus_id, $bonus_sn = '')
    {
        $db_prefix=C('DB_PREFIX');
        $sql = "SELECT t.*, b.* " .
                "FROM " . $db_prefix.'bonus_type' . " AS t," .
                    $db_prefix.'user_bonus' . " AS b " .
                "WHERE t.type_id = b.bonus_type_id ";
        if ($bonus_id > 0)
        {
            $sql .= "AND b.bonus_id = '$bonus_id'";
        }
        else
        {
            $sql .= "AND b.bonus_sn = '$bonus_sn'";
        }
    
        return $this->getRowSql($sql);
    }


}
?>