<?php
/**
 * ブランド管理
 * @author 周鸿 <136871204@qq.com>
 */
class MailTemplateControl extends AuthControl {
    //protected $db;
    
    public function __init() {
		//$this -> db = K("Brand");
	}
    
	//ブランド一覧
	public function index() {
        $db_prefix=C('DB_PREFIX');
        /* 模板描述 */
        $_LANG['order_confirm'] = '订单确认模板';
        $_LANG['deliver_notice'] = '发货通知模板';
        $_LANG['send_password'] = '发送密码模板';
        $_LANG['order_cancel'] = '订单取消模板';
        $_LANG['order_invalid'] = '订单无效模板';
        $_LANG['send_bonus'] = '发送红包模板';
        $_LANG['group_buy'] = '团购商品模板';
        $_LANG['register_validate'] = '邮件验证模板';
        $_LANG['virtual_card'] = '虚拟卡片模板';
        $_LANG['remind_of_new_order'] = '新订单提醒模板';
        $_LANG['goods_booking'] = '缺货回复模板';
        $_LANG['user_message'] = '留言回复模板';
        $_LANG['recomment'] = '用户评论回复模板';
        $_LANG['attention_list'] = '关注管理';
        
	    /* 获得所有邮件模板 */
        $sql = "SELECT template_id, template_code FROM " .$db_prefix.'mail_templates' . " WHERE  type = 'template'";
        $res = M()->query($sql);
        $cur = null;
        if(!empty($res)){
            foreach($res as $row){
                if ($cur == null)
                {
                    $cur = $row['template_id'];
                }
                $len = strlen($_LANG[$row['template_code']]);
                $templates[$row['template_id']] = $len < 18 ?
                        $_LANG[$row['template_code']].str_repeat('&nbsp;', (18-$len)/2) ." [$row[template_code]]" :
                        $_LANG[$row['template_code']] . " [$row[template_code]]";
            }
        }
        $content = $this->load_template($cur);
        
        $this->assign('tpl', $cur);
        $this->assign('templates',    $templates);
        $this->assign('template',     $content);
        $this->assign('cur',          $cur);
        $this->assign('htmlcontent',           $content['template_content']);
       
        
        $this->display('mail_template');
        
	}
    
    public function loat_templatecontent(){
        $db_prefix=C('DB_PREFIX');
        $tpl = Q('tpl');
        /* 获得所有邮件模板 */
        $sql = "SELECT template_content FROM " .$db_prefix.'mail_templates' . " WHERE  type = 'template' and template_id = '{$tpl}' ";
        $content=M()->getOne($sql,'template_content');
        make_json_result($content);
    }
    
    public function save_template(){
        $db_prefix=C('DB_PREFIX');
        $subject = trim($_POST['subject']);
        $content = trim($_POST['content']);
        $type   = intval($_POST['mail_type']);
        $tpl_id = intval($_POST['selTemplate']);
        $sql = "UPDATE " .$db_prefix.'mail_templates'. " SET ".
                "template_subject = '" .str_replace('\\\'\\\'', '\\\'', $subject). "', ".
                "template_content = '" .str_replace('\\\'\\\'', '\\\'', $content).  "', ".
                "is_html = '$type', ".
                "last_modify = '" .gmtime(). "' ".
            "WHERE template_id='$tpl_id'";
        $opid=M()->exe($sql);
        if($opid){
            $this -> success("更新成功！");
        }else{
            $this -> error("更新失败！");
        }
        
    }
    
    /**
     * 加载指定的模板内容
     *
     * @access  public
     * @param   string  $temp   邮件模板的ID
     * @return  array
     */
    public function load_template($temp_id)
    {
        $db_prefix=C('DB_PREFIX');
        $sql = "SELECT template_subject, template_content, is_html ".
                "FROM " .$db_prefix.'mail_templates'. " WHERE template_id='$temp_id'";
        $row = M()->getRowSql($sql);

        return $row;
    }
    

	

	

	
    
    
}
