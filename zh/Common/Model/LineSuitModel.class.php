<?php
/**
 * 用户管理模型
 * Class UserModel
 */
class LineSuitModel extends ViewModel {
    public $table = "line_suit";
    
    public function deleteClear($id)
    {
        $lineSuitPriceModel = K('LineSuitPrice');
        $lineSuitPriceModel->where(" suitid={$id} ")->del();
        $this->del($id);
    }
    
    
}
?>