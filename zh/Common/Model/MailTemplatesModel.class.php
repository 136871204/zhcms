<?php
/**
 * 用户管理模型
 * Class UserModel
 */
class MailTemplatesModel extends ViewModel {
    public $table = "mail_templates";
    
    /**
     * 获取邮件模板
     *
     * @access  public
     * @param:  $tpl_name[string]       模板代码
     *
     * @return array
     */
    public function get_mail_template($tpl_name)
    {
        $sql = 'SELECT template_subject, is_html, template_content FROM ' .$this->tableFull . " WHERE template_code = '$tpl_name'";
    
        return $this->getRowSql($sql); 
    
    }
    
    
    
    
    
}
?>