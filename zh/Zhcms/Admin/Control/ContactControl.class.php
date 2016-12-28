<?php
/**
 * 更新缓存
 * @author 周红 <136871204@qq.com>
 */
class ContactControl extends AuthControl {
    
    protected $db;
    protected $statusarr = array(
                        0=>'未处理',
                        1=>'处理中',
                        2=>'已处理');
    
    
    public function __init() {
		$this -> db = K("Contact");
	}
    
    
	public function index() {
	    $count = $this -> db -> count();
		$page = new Page($count);
		$this -> page = $page -> show();
		$contact = $this -> db -> order("status asc,addtime asc") -> limit($page -> limit()) -> all();
        
        if(!empty($contact)){
            foreach($contact as $key => &$val){
                $val['status_show']=$this->statusarr[$val['status']];
            }
        }
        //p($contact);die;
        $this -> contact = $contact;
		$this -> display();
	}

    public function edit(){
        if (IS_POST) {
			if ($this -> db->update($_POST)) {
				$this -> success("修正成功！");
			} else {
				$this -> error("修正失败！");
			}
		} else {
			$id = Q("id",0, "intval");
			if ($id) {
				$field = $this -> db-> find($id);
				$this->assign('field',$field);
                $this->assign('statusarr',$this->statusarr);
				$this -> display();
			}
		}
    }

}
