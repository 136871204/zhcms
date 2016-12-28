<?php

/**
 * 网站前台
 * Class IndexControl
 * @author 周鸿 <136871204@qq.com>
 */
class EcVoteControl extends EcControl {
    
    public function __init(){
        define('IN_ECS', true);
        parent::ecinit();
        
        //echo 'aaa';die;
    }
    
    public function index()
    {
        $ecs=$GLOBALS['ec_globals']['ecs'];
        if (!isset($_REQUEST['vote']) || !isset($_REQUEST['options']) || !isset($_REQUEST['type']))
        {
            ec_header("Location: ".U('ec/EcIndex/index')."\n");
            exit;
        }
        $res        = array('error' => 0, 'message' => '', 'content' => '');
        $vote_id    = intval($_POST['vote']);
        $options    = trim($_POST['options']);
        $type       = intval($_POST['type']);
        $ip_address = real_ip();
        if ($this -> vote_already_submited($vote_id, $ip_address))
        {
            $res['error']   = 1;
            $res['message'] = '对不起，您已经投过票了!';
        }
        else
        {
            $this -> save_vote($vote_id, $ip_address, $options);
            
            $vote = get_vote($vote_id);
            if (!empty($vote))
            {
                $this->assign('vote_id', $vote['id']);
                $this->assign('vote',    $vote['content']);
            }
            $str = $this->fetch('template/' . C('WEB_STYLE') . '/ec/common/library/vote.lbi');
            $pattern = '/(?:<(\w+)[^>]*> .*?)?<div\s+id="ECS_VOTE">(.*)<\/div>(?:.*?<\/\1>)?/is';
            if (preg_match($pattern, $str, $match))
            {
                $res['content'] = $match[2];
            }
            $res['message'] = '恭喜你，投票成功';
        }
        $json = new JSON;
        
        echo $json->encode($res);
        die;
    }
    
    
    /**
     * 检查是否已经提交过投票
     *
     * @access  private
     * @param   integer     $vote_id
     * @param   string      $ip_address
     * @return  boolean
     */
    public function vote_already_submited($vote_id, $ip_address)
    {
        $sql = "SELECT COUNT(*) FROM ".$GLOBALS['ec_globals']['ecs']->table('ec_vote_log')." ".
               "WHERE ip_address = '$ip_address' AND vote_id = '$vote_id' ";
    
        return (M()->GetOne($sql,'COUNT(*)') > 0);
    }
    
    /**
     * 保存投票结果信息
     *
     * @access  public
     * @param   integer     $vote_id
     * @param   string      $ip_address
     * @param   string      $option_id
     * @return  void
     */
    public function save_vote($vote_id, $ip_address, $option_id)
    {
        $sql = "INSERT INTO " . $GLOBALS['ec_globals']['ecs']->table('ec_vote_log') . " (vote_id, ip_address, vote_time) " .
               "VALUES ('$vote_id', '$ip_address', " . gmtime() .")";
        $res = M()->exe($sql);
    
        /* 更新投票主题的数量 */
        $sql = "UPDATE " .$GLOBALS['ec_globals']['ecs']->table('ec_vote'). " SET ".
               "vote_count = vote_count + 1 ".
               "WHERE vote_id = '$vote_id'";
        M()->exe($sql);
    
        /* 更新投票选项的数量 */
        $sql = "UPDATE " . $GLOBALS['ec_globals']['ecs']->table('ec_vote_option') . " SET " .
               "option_count = option_count + 1 " .
               "WHERE " . db_create_in($option_id, 'option_id');
        M()->exe($sql);
    }
        
        
    
    


}
