<?php if(!defined('ZHPHP_PATH'))exit;
return array (
  'zh_access' => 
  array (
    'tablename' => 'zh_access',
    'engine' => 'MyISAM',
    'rows' => '110',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 770,
    'field' => 
    array (
      'rid' => 
      array (
        'field' => 'rid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'nid' => 
      array (
        'field' => 'nid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_admin_log' => 
  array (
    'tablename' => 'zh_admin_log',
    'engine' => 'MyISAM',
    'rows' => '10',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 664,
    'field' => 
    array (
      'log_id' => 
      array (
        'field' => 'log_id',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'log_time' => 
      array (
        'field' => 'log_time',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'user_id' => 
      array (
        'field' => 'user_id',
        'type' => 'tinyint(3) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'log_info' => 
      array (
        'field' => 'log_info',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'ip_address' => 
      array (
        'field' => 'ip_address',
        'type' => 'varchar(15)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'log_id',
    'autoincrement' => '476',
  ),
  'zh_attribute' => 
  array (
    'tablename' => 'zh_attribute',
    'engine' => 'MyISAM',
    'rows' => '211',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '56',
    'size' => 6888,
    'field' => 
    array (
      'attr_id' => 
      array (
        'field' => 'attr_id',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'cat_id' => 
      array (
        'field' => 'cat_id',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'attr_name' => 
      array (
        'field' => 'attr_name',
        'type' => 'varchar(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'attr_input_type' => 
      array (
        'field' => 'attr_input_type',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'attr_type' => 
      array (
        'field' => 'attr_type',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'attr_values' => 
      array (
        'field' => 'attr_values',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'attr_index' => 
      array (
        'field' => 'attr_index',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'sort_order' => 
      array (
        'field' => 'sort_order',
        'type' => 'tinyint(3) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'is_linked' => 
      array (
        'field' => 'is_linked',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'attr_group' => 
      array (
        'field' => 'attr_group',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'attr_id',
    'autoincrement' => '216',
  ),
  'zh_brand' => 
  array (
    'tablename' => 'zh_brand',
    'engine' => 'MyISAM',
    'rows' => '11',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '296',
    'size' => 2780,
    'field' => 
    array (
      'brand_id' => 
      array (
        'field' => 'brand_id',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'brand_name' => 
      array (
        'field' => 'brand_name',
        'type' => 'varchar(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'brand_logo' => 
      array (
        'field' => 'brand_logo',
        'type' => 'varchar(80)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'brand_desc' => 
      array (
        'field' => 'brand_desc',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'site_url' => 
      array (
        'field' => 'site_url',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'sort_order' => 
      array (
        'field' => 'sort_order',
        'type' => 'tinyint(3) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '50',
        'extra' => '',
      ),
      'is_show' => 
      array (
        'field' => 'is_show',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
    ),
    'primarykey' => 'brand_id',
    'autoincrement' => '16',
  ),
  'zh_category' => 
  array (
    'tablename' => 'zh_category',
    'engine' => 'MyISAM',
    'rows' => '4',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 660,
    'field' => 
    array (
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'mediumint(5) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'pid' => 
      array (
        'field' => 'pid',
        'type' => 'mediumint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'catname' => 
      array (
        'field' => 'catname',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'catdir' => 
      array (
        'field' => 'catdir',
        'type' => 'varchar(255)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'cat_keyworks' => 
      array (
        'field' => 'cat_keyworks',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'cat_description' => 
      array (
        'field' => 'cat_description',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'index_tpl' => 
      array (
        'field' => 'index_tpl',
        'type' => 'varchar(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'list_tpl' => 
      array (
        'field' => 'list_tpl',
        'type' => 'varchar(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'arc_tpl' => 
      array (
        'field' => 'arc_tpl',
        'type' => 'varchar(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'cat_html_url' => 
      array (
        'field' => 'cat_html_url',
        'type' => 'varchar(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'arc_html_url' => 
      array (
        'field' => 'arc_html_url',
        'type' => 'varchar(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'cattype' => 
      array (
        'field' => 'cattype',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'arc_url_type' => 
      array (
        'field' => 'arc_url_type',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'cat_url_type' => 
      array (
        'field' => 'cat_url_type',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'cat_redirecturl' => 
      array (
        'field' => 'cat_redirecturl',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'catorder' => 
      array (
        'field' => 'catorder',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '100',
        'extra' => '',
      ),
      'cat_show' => 
      array (
        'field' => 'cat_show',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'cat_seo_title' => 
      array (
        'field' => 'cat_seo_title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'cat_seo_description' => 
      array (
        'field' => 'cat_seo_description',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'add_reward' => 
      array (
        'field' => 'add_reward',
        'type' => 'smallint(5)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'show_credits' => 
      array (
        'field' => 'show_credits',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'repeat_charge_day' => 
      array (
        'field' => 'repeat_charge_day',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'allow_user_set_credits' => 
      array (
        'field' => 'allow_user_set_credits',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'member_send_state' => 
      array (
        'field' => 'member_send_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
    ),
    'primarykey' => 'cid',
    'autoincrement' => '5',
  ),
  'zh_category_access' => 
  array (
    'tablename' => 'zh_category_access',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'rid' => 
      array (
        'field' => 'rid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'show' => 
      array (
        'field' => 'show',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'add' => 
      array (
        'field' => 'add',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'edit' => 
      array (
        'field' => 'edit',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'del' => 
      array (
        'field' => 'del',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'order' => 
      array (
        'field' => 'order',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'move' => 
      array (
        'field' => 'move',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'audit' => 
      array (
        'field' => 'audit',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'admin' => 
      array (
        'field' => 'admin',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_comment' => 
  array (
    'tablename' => 'zh_comment',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'comment_id' => 
      array (
        'field' => 'comment_id',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'comment_state' => 
      array (
        'field' => 'comment_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'pubtime' => 
      array (
        'field' => 'pubtime',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'pid' => 
      array (
        'field' => 'pid',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'reply_comment_id' => 
      array (
        'field' => 'reply_comment_id',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'comment_id',
    'autoincrement' => '1',
  ),
  'zh_config' => 
  array (
    'tablename' => 'zh_config',
    'engine' => 'MyISAM',
    'rows' => '65',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 4584,
    'field' => 
    array (
      'id' => 
      array (
        'field' => 'id',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'name' => 
      array (
        'field' => 'name',
        'type' => 'varchar(45)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'value' => 
      array (
        'field' => 'value',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'type' => 
      array (
        'field' => 'type',
        'type' => 'enum(\'站点配置\',\'高级配置\',\'上传配置\',\'会员配置\',\'邮箱配置\',\'安全配置\',\'水印配置\',\'内容相关\',\'性能优化\',\'伪静态\',\'COOKIE配置\',\'SESSION配置\',\'自定义\')',
        'null' => 'NO',
        'key' => false,
        'default' => '站点配置',
        'extra' => '',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'show_type' => 
      array (
        'field' => 'show_type',
        'type' => 'enum(\'文本\',\'数字\',\'布尔(1/0)\',\'多行文本\')',
        'null' => 'YES',
        'key' => false,
        'default' => '文本',
        'extra' => '',
      ),
      'message' => 
      array (
        'field' => 'message',
        'type' => 'varchar(255)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'order_list' => 
      array (
        'field' => 'order_list',
        'type' => 'smallint(6) unsigned',
        'null' => 'YES',
        'key' => false,
        'default' => '100',
        'extra' => '',
      ),
    ),
    'primarykey' => 'id',
    'autoincrement' => '71',
  ),
  'zh_content' => 
  array (
    'tablename' => 'zh_content',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'flag' => 
      array (
        'field' => 'flag',
        'type' => 'set(\'人気\',\'トップ\',\'推薦\',\'画像\',\'エキス\',\'スライド\',\'マスタ推薦\')',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'new_window' => 
      array (
        'field' => 'new_window',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'seo_title' => 
      array (
        'field' => 'seo_title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'thumb' => 
      array (
        'field' => 'thumb',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'click' => 
      array (
        'field' => 'click',
        'type' => 'int(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'source' => 
      array (
        'field' => 'source',
        'type' => 'char(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'redirecturl' => 
      array (
        'field' => 'redirecturl',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'html_path' => 
      array (
        'field' => 'html_path',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'allowreply' => 
      array (
        'field' => 'allowreply',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'addtime' => 
      array (
        'field' => 'addtime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'updatetime' => 
      array (
        'field' => 'updatetime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'color' => 
      array (
        'field' => 'color',
        'type' => 'char(7)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'template' => 
      array (
        'field' => 'template',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'url_type' => 
      array (
        'field' => 'url_type',
        'type' => 'tinyint(80)',
        'null' => 'NO',
        'key' => false,
        'default' => '3',
        'extra' => '',
      ),
      'arc_sort' => 
      array (
        'field' => 'arc_sort',
        'type' => 'mediumint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '100',
        'extra' => '',
      ),
      'content_state' => 
      array (
        'field' => 'content_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'keywords' => 
      array (
        'field' => 'keywords',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'description' => 
      array (
        'field' => 'description',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'favorites' => 
      array (
        'field' => 'favorites',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'comment_num' => 
      array (
        'field' => 'comment_num',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'tag' => 
      array (
        'field' => 'tag',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'read_credits' => 
      array (
        'field' => 'read_credits',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'aid',
    'autoincrement' => '1',
  ),
  'zh_content_data' => 
  array (
    'tablename' => 'zh_content_data',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_content_tag' => 
  array (
    'tablename' => 'zh_content_tag',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'tid' => 
      array (
        'field' => 'tid',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_custom_js' => 
  array (
    'tablename' => 'zh_custom_js',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'id' => 
      array (
        'field' => 'id',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'file_name' => 
      array (
        'field' => 'file_name',
        'type' => 'varchar(100)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'description' => 
      array (
        'field' => 'description',
        'type' => 'varchar(255)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'options' => 
      array (
        'field' => 'options',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'name' => 
      array (
        'field' => 'name',
        'type' => 'varchar(100)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'addtime' => 
      array (
        'field' => 'addtime',
        'type' => 'int(10)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'username' => 
      array (
        'field' => 'username',
        'type' => 'char(30)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => 'id',
    'autoincrement' => '1',
  ),
  'zh_favorite' => 
  array (
    'tablename' => 'zh_favorite',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'fid' => 
      array (
        'field' => 'fid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'fid',
    'autoincrement' => '1',
  ),
  'zh_field' => 
  array (
    'tablename' => 'zh_field',
    'engine' => 'MyISAM',
    'rows' => '59',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 7652,
    'field' => 
    array (
      'fid' => 
      array (
        'field' => 'fid',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'field_state' => 
      array (
        'field' => 'field_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'field_type' => 
      array (
        'field' => 'field_type',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'table_type' => 
      array (
        'field' => 'table_type',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'table_name' => 
      array (
        'field' => 'table_name',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'field_name' => 
      array (
        'field' => 'field_name',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'tips' => 
      array (
        'field' => 'tips',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'enable' => 
      array (
        'field' => 'enable',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'is_system' => 
      array (
        'field' => 'is_system',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'fieldsort' => 
      array (
        'field' => 'fieldsort',
        'type' => 'mediumint(9)',
        'null' => 'NO',
        'key' => false,
        'default' => '100',
        'extra' => '',
      ),
      'set' => 
      array (
        'field' => 'set',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'css' => 
      array (
        'field' => 'css',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'minlength' => 
      array (
        'field' => 'minlength',
        'type' => 'char(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'maxlength' => 
      array (
        'field' => 'maxlength',
        'type' => 'char(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'validate' => 
      array (
        'field' => 'validate',
        'type' => 'char(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'required' => 
      array (
        'field' => 'required',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'error' => 
      array (
        'field' => 'error',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'isunique' => 
      array (
        'field' => 'isunique',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'isbase' => 
      array (
        'field' => 'isbase',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'issearch' => 
      array (
        'field' => 'issearch',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'isadd' => 
      array (
        'field' => 'isadd',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
    ),
    'primarykey' => 'fid',
    'autoincrement' => '61',
  ),
  'zh_goods_type' => 
  array (
    'tablename' => 'zh_goods_type',
    'engine' => 'MyISAM',
    'rows' => '10',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 276,
    'field' => 
    array (
      'cat_id' => 
      array (
        'field' => 'cat_id',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'cat_name' => 
      array (
        'field' => 'cat_name',
        'type' => 'varchar(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'enabled' => 
      array (
        'field' => 'enabled',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'attr_group' => 
      array (
        'field' => 'attr_group',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'cat_id',
    'autoincrement' => '14',
  ),
  'zh_link' => 
  array (
    'tablename' => 'zh_link',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'id' => 
      array (
        'field' => 'id',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'webname' => 
      array (
        'field' => 'webname',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'url' => 
      array (
        'field' => 'url',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'logo' => 
      array (
        'field' => 'logo',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'email' => 
      array (
        'field' => 'email',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'tid' => 
      array (
        'field' => 'tid',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '2',
        'extra' => '',
      ),
      'qq' => 
      array (
        'field' => 'qq',
        'type' => 'char(15)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'comment' => 
      array (
        'field' => 'comment',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'state' => 
      array (
        'field' => 'state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'id',
    'autoincrement' => '1',
  ),
  'zh_link_config' => 
  array (
    'tablename' => 'zh_link_config',
    'engine' => 'MyISAM',
    'rows' => '1',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 628,
    'field' => 
    array (
      'id' => 
      array (
        'field' => 'id',
        'type' => 'tinyint(3) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'webname' => 
      array (
        'field' => 'webname',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'url' => 
      array (
        'field' => 'url',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'logo' => 
      array (
        'field' => 'logo',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'email' => 
      array (
        'field' => 'email',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'comment' => 
      array (
        'field' => 'comment',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'allow' => 
      array (
        'field' => 'allow',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'code' => 
      array (
        'field' => 'code',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'qq' => 
      array (
        'field' => 'qq',
        'type' => 'char(15)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'id',
    'autoincrement' => '2',
  ),
  'zh_link_type' => 
  array (
    'tablename' => 'zh_link_type',
    'engine' => 'MyISAM',
    'rows' => '2',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 308,
    'field' => 
    array (
      'tid' => 
      array (
        'field' => 'tid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'type_name' => 
      array (
        'field' => 'type_name',
        'type' => 'char(50)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'system' => 
      array (
        'field' => 'system',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'tid',
    'autoincrement' => '3',
  ),
  'zh_menu_favorite' => 
  array (
    'tablename' => 'zh_menu_favorite',
    'engine' => 'MyISAM',
    'rows' => '2',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '28',
    'size' => 70,
    'field' => 
    array (
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'nid' => 
      array (
        'field' => 'nid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_model' => 
  array (
    'tablename' => 'zh_model',
    'engine' => 'MyISAM',
    'rows' => '3',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 100,
    'field' => 
    array (
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'model_name' => 
      array (
        'field' => 'model_name',
        'type' => 'char(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'table_name' => 
      array (
        'field' => 'table_name',
        'type' => 'char(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'enable' => 
      array (
        'field' => 'enable',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'description' => 
      array (
        'field' => 'description',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'is_system' => 
      array (
        'field' => 'is_system',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'mid',
    'autoincrement' => '8',
  ),
  'zh_navigation' => 
  array (
    'tablename' => 'zh_navigation',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'nid' => 
      array (
        'field' => 'nid',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '菜单名称',
        'extra' => '',
      ),
      'pid' => 
      array (
        'field' => 'pid',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'target' => 
      array (
        'field' => 'target',
        'type' => 'enum(\'_self\',\'_blank\')',
        'null' => 'NO',
        'key' => false,
        'default' => '_self',
        'extra' => '',
      ),
      'state' => 
      array (
        'field' => 'state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'list_order' => 
      array (
        'field' => 'list_order',
        'type' => 'mediumint(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '100',
        'extra' => '',
      ),
      'url' => 
      array (
        'field' => 'url',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'nid',
    'autoincrement' => '1',
  ),
  'zh_news' => 
  array (
    'tablename' => 'zh_news',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'flag' => 
      array (
        'field' => 'flag',
        'type' => 'set(\'人気\',\'トップ\',\'推薦\',\'画像\',\'エキス\',\'スライド\',\'マスタ推薦\')',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'new_window' => 
      array (
        'field' => 'new_window',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'seo_title' => 
      array (
        'field' => 'seo_title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'thumb' => 
      array (
        'field' => 'thumb',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'click' => 
      array (
        'field' => 'click',
        'type' => 'int(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'source' => 
      array (
        'field' => 'source',
        'type' => 'char(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'redirecturl' => 
      array (
        'field' => 'redirecturl',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'html_path' => 
      array (
        'field' => 'html_path',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'allowreply' => 
      array (
        'field' => 'allowreply',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'addtime' => 
      array (
        'field' => 'addtime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'updatetime' => 
      array (
        'field' => 'updatetime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'color' => 
      array (
        'field' => 'color',
        'type' => 'char(7)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'template' => 
      array (
        'field' => 'template',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'url_type' => 
      array (
        'field' => 'url_type',
        'type' => 'tinyint(80)',
        'null' => 'NO',
        'key' => false,
        'default' => '3',
        'extra' => '',
      ),
      'arc_sort' => 
      array (
        'field' => 'arc_sort',
        'type' => 'mediumint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content_state' => 
      array (
        'field' => 'content_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'keywords' => 
      array (
        'field' => 'keywords',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'description' => 
      array (
        'field' => 'description',
        'type' => 'varchar(255)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'favorites' => 
      array (
        'field' => 'favorites',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'comment_num' => 
      array (
        'field' => 'comment_num',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'tag' => 
      array (
        'field' => 'tag',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'read_credits' => 
      array (
        'field' => 'read_credits',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'aid',
    'autoincrement' => '19',
  ),
  'zh_news_data' => 
  array (
    'tablename' => 'zh_news_data',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_node' => 
  array (
    'tablename' => 'zh_node',
    'engine' => 'MyISAM',
    'rows' => '56',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 4076,
    'field' => 
    array (
      'nid' => 
      array (
        'field' => 'nid',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'app_group' => 
      array (
        'field' => 'app_group',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => 'Zhcms',
        'extra' => '',
      ),
      'app' => 
      array (
        'field' => 'app',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'control' => 
      array (
        'field' => 'control',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'method' => 
      array (
        'field' => 'method',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'param' => 
      array (
        'field' => 'param',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'comment' => 
      array (
        'field' => 'comment',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'state' => 
      array (
        'field' => 'state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'type' => 
      array (
        'field' => 'type',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '2',
        'extra' => '',
      ),
      'pid' => 
      array (
        'field' => 'pid',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'list_order' => 
      array (
        'field' => 'list_order',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '100',
        'extra' => '',
      ),
      'is_system' => 
      array (
        'field' => 'is_system',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'favorite' => 
      array (
        'field' => 'favorite',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'nid',
    'autoincrement' => '210',
  ),
  'zh_plugin' => 
  array (
    'tablename' => 'zh_plugin',
    'engine' => 'MyISAM',
    'rows' => '1',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 88,
    'field' => 
    array (
      'pid' => 
      array (
        'field' => 'pid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'name' => 
      array (
        'field' => 'name',
        'type' => 'char(50)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'install_time' => 
      array (
        'field' => 'install_time',
        'type' => 'date',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'version' => 
      array (
        'field' => 'version',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'team' => 
      array (
        'field' => 'team',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'app' => 
      array (
        'field' => 'app',
        'type' => 'char(50)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'email' => 
      array (
        'field' => 'email',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'web' => 
      array (
        'field' => 'web',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'pubdate' => 
      array (
        'field' => 'pubdate',
        'type' => 'date',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => 'pid',
    'autoincrement' => '19',
  ),
  'zh_role' => 
  array (
    'tablename' => 'zh_role',
    'engine' => 'MyISAM',
    'rows' => '12',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 552,
    'field' => 
    array (
      'rid' => 
      array (
        'field' => 'rid',
        'type' => 'smallint(5)',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'rname' => 
      array (
        'field' => 'rname',
        'type' => 'char(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'admin' => 
      array (
        'field' => 'admin',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'system' => 
      array (
        'field' => 'system',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'creditslower' => 
      array (
        'field' => 'creditslower',
        'type' => 'mediumint(9)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'comment_state' => 
      array (
        'field' => 'comment_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'allowsendmessage' => 
      array (
        'field' => 'allowsendmessage',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
    ),
    'primarykey' => 'rid',
    'autoincrement' => '17',
  ),
  'zh_search' => 
  array (
    'tablename' => 'zh_search',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'sid' => 
      array (
        'field' => 'sid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'word' => 
      array (
        'field' => 'word',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'total' => 
      array (
        'field' => 'total',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
    ),
    'primarykey' => 'sid',
    'autoincrement' => '1',
  ),
  'zh_session' => 
  array (
    'tablename' => 'zh_session',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'sessid' => 
      array (
        'field' => 'sessid',
        'type' => 'char(32)',
        'null' => 'NO',
        'key' => true,
        'default' => '',
        'extra' => '',
      ),
      'data' => 
      array (
        'field' => 'data',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'atime' => 
      array (
        'field' => 'atime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'ip' => 
      array (
        'field' => 'ip',
        'type' => 'char(15)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'sessid',
    'autoincrement' => '',
  ),
  'zh_system_message' => 
  array (
    'tablename' => 'zh_system_message',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'message' => 
      array (
        'field' => 'message',
        'type' => 'varchar(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'state' => 
      array (
        'field' => 'state',
        'type' => 'tinyint(4) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'sendtime' => 
      array (
        'field' => 'sendtime',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'mid',
    'autoincrement' => '1',
  ),
  'zh_tag' => 
  array (
    'tablename' => 'zh_tag',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'tid' => 
      array (
        'field' => 'tid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'tag' => 
      array (
        'field' => 'tag',
        'type' => 'varchar(30)',
        'null' => 'YES',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'total' => 
      array (
        'field' => 'total',
        'type' => 'mediumint(9)',
        'null' => 'YES',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
    ),
    'primarykey' => 'tid',
    'autoincrement' => '1',
  ),
  'zh_template_tag' => 
  array (
    'tablename' => 'zh_template_tag',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'tid' => 
      array (
        'field' => 'tid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'type' => 
      array (
        'field' => 'type',
        'type' => 'mediumint(8) unsigned',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'options' => 
      array (
        'field' => 'options',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'name' => 
      array (
        'field' => 'name',
        'type' => 'varchar(100)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'addtime' => 
      array (
        'field' => 'addtime',
        'type' => 'int(10)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => 'tid',
    'autoincrement' => '1',
  ),
  'zh_test' => 
  array (
    'tablename' => 'zh_test',
    'engine' => 'MyISAM',
    'rows' => '2',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 1920,
    'field' => 
    array (
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'cid' => 
      array (
        'field' => 'cid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'title' => 
      array (
        'field' => 'title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'flag' => 
      array (
        'field' => 'flag',
        'type' => 'set(\'人気\',\'トップ\',\'推薦\',\'画像\',\'エキス\',\'スライド\',\'マスタ推薦\')',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'new_window' => 
      array (
        'field' => 'new_window',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'seo_title' => 
      array (
        'field' => 'seo_title',
        'type' => 'char(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'thumb' => 
      array (
        'field' => 'thumb',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'click' => 
      array (
        'field' => 'click',
        'type' => 'int(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'source' => 
      array (
        'field' => 'source',
        'type' => 'char(60)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'redirecturl' => 
      array (
        'field' => 'redirecturl',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'html_path' => 
      array (
        'field' => 'html_path',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'allowreply' => 
      array (
        'field' => 'allowreply',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'addtime' => 
      array (
        'field' => 'addtime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'updatetime' => 
      array (
        'field' => 'updatetime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'color' => 
      array (
        'field' => 'color',
        'type' => 'char(7)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'template' => 
      array (
        'field' => 'template',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'url_type' => 
      array (
        'field' => 'url_type',
        'type' => 'tinyint(80)',
        'null' => 'NO',
        'key' => false,
        'default' => '3',
        'extra' => '',
      ),
      'arc_sort' => 
      array (
        'field' => 'arc_sort',
        'type' => 'mediumint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content_state' => 
      array (
        'field' => 'content_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'keywords' => 
      array (
        'field' => 'keywords',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'description' => 
      array (
        'field' => 'description',
        'type' => 'varchar(255)',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'favorites' => 
      array (
        'field' => 'favorites',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'comment_num' => 
      array (
        'field' => 'comment_num',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'tag' => 
      array (
        'field' => 'tag',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'read_credits' => 
      array (
        'field' => 'read_credits',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'images' => 
      array (
        'field' => 'images',
        'type' => 'mediumtext',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
      'images2' => 
      array (
        'field' => 'images2',
        'type' => 'mediumtext',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => 'aid',
    'autoincrement' => '21',
  ),
  'zh_test_data' => 
  array (
    'tablename' => 'zh_test_data',
    'engine' => 'MyISAM',
    'rows' => '2',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 40,
    'field' => 
    array (
      'aid' => 
      array (
        'field' => 'aid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'text',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_upload' => 
  array (
    'tablename' => 'zh_upload',
    'engine' => 'MyISAM',
    'rows' => '35',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 4060,
    'field' => 
    array (
      'id' => 
      array (
        'field' => 'id',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'name' => 
      array (
        'field' => 'name',
        'type' => 'varchar(255)',
        'null' => 'YES',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'filename' => 
      array (
        'field' => 'filename',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'basename' => 
      array (
        'field' => 'basename',
        'type' => 'varchar(100)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'path' => 
      array (
        'field' => 'path',
        'type' => 'char(200)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'ext' => 
      array (
        'field' => 'ext',
        'type' => 'varchar(45)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'image' => 
      array (
        'field' => 'image',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'size' => 
      array (
        'field' => 'size',
        'type' => 'mediumint(8) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'uptime' => 
      array (
        'field' => 'uptime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'state' => 
      array (
        'field' => 'state',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'smallint(6)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'id',
    'autoincrement' => '36',
  ),
  'zh_user' => 
  array (
    'tablename' => 'zh_user',
    'engine' => 'MyISAM',
    'rows' => '4',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 632,
    'field' => 
    array (
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'nickname' => 
      array (
        'field' => 'nickname',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'username' => 
      array (
        'field' => 'username',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'password' => 
      array (
        'field' => 'password',
        'type' => 'char(40)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'code' => 
      array (
        'field' => 'code',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'email' => 
      array (
        'field' => 'email',
        'type' => 'char(30)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'validatecode' => 
      array (
        'field' => 'validatecode',
        'type' => 'char(50)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'regtime' => 
      array (
        'field' => 'regtime',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'logintime' => 
      array (
        'field' => 'logintime',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'regip' => 
      array (
        'field' => 'regip',
        'type' => 'char(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'lastip' => 
      array (
        'field' => 'lastip',
        'type' => 'char(15)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'user_state' => 
      array (
        'field' => 'user_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'lock_end_time' => 
      array (
        'field' => 'lock_end_time',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'qq' => 
      array (
        'field' => 'qq',
        'type' => 'char(20)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'sex' => 
      array (
        'field' => 'sex',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'favicon' => 
      array (
        'field' => 'favicon',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'credits' => 
      array (
        'field' => 'credits',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'rid' => 
      array (
        'field' => 'rid',
        'type' => 'smallint(5) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'allow_user_set_credits' => 
      array (
        'field' => 'allow_user_set_credits',
        'type' => 'tinyint(1) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '1',
        'extra' => '',
      ),
      'signature' => 
      array (
        'field' => 'signature',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'domain' => 
      array (
        'field' => 'domain',
        'type' => 'char(20)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'spec_num' => 
      array (
        'field' => 'spec_num',
        'type' => 'mediumint(9) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'icon' => 
      array (
        'field' => 'icon',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'language' => 
      array (
        'field' => 'language',
        'type' => 'char(20)',
        'null' => 'NO',
        'key' => false,
        'default' => '\'\'',
        'extra' => '',
      ),
    ),
    'primarykey' => 'uid',
    'autoincrement' => '17',
  ),
  'zh_user_deny_ip' => 
  array (
    'tablename' => 'zh_user_deny_ip',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'ip' => 
      array (
        'field' => 'ip',
        'type' => 'char(15)',
        'null' => 'NO',
        'key' => true,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'ip',
    'autoincrement' => '',
  ),
  'zh_user_dynamic' => 
  array (
    'tablename' => 'zh_user_dynamic',
    'engine' => 'MyISAM',
    'rows' => '2',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 320,
    'field' => 
    array (
      'did' => 
      array (
        'field' => 'did',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'text',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'addtime' => 
      array (
        'field' => 'addtime',
        'type' => 'int(11)',
        'null' => 'NO',
        'key' => false,
        'default' => '0',
        'extra' => '',
      ),
    ),
    'primarykey' => 'did',
    'autoincrement' => '3',
  ),
  'zh_user_follow' => 
  array (
    'tablename' => 'zh_user_follow',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'fans_uid' => 
      array (
        'field' => 'fans_uid',
        'type' => 'int(11) unsigned',
        'null' => 'YES',
        'key' => false,
        'default' => NULL,
        'extra' => '',
      ),
    ),
    'primarykey' => '',
    'autoincrement' => '',
  ),
  'zh_user_guest' => 
  array (
    'tablename' => 'zh_user_guest',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'gid' => 
      array (
        'field' => 'gid',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'guest_uid' => 
      array (
        'field' => 'guest_uid',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'uid' => 
      array (
        'field' => 'uid',
        'type' => 'int(11) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'gid',
    'autoincrement' => '1',
  ),
  'zh_user_message' => 
  array (
    'tablename' => 'zh_user_message',
    'engine' => 'MyISAM',
    'rows' => '0',
    'collation' => 'utf8_general_ci',
    'charset' => 'utf8',
    'datafree' => '0',
    'size' => 0,
    'field' => 
    array (
      'mid' => 
      array (
        'field' => 'mid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => true,
        'default' => NULL,
        'extra' => 'auto_increment',
      ),
      'from_uid' => 
      array (
        'field' => 'from_uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'to_uid' => 
      array (
        'field' => 'to_uid',
        'type' => 'int(10) unsigned',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'content' => 
      array (
        'field' => 'content',
        'type' => 'varchar(255)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'user_message_state' => 
      array (
        'field' => 'user_message_state',
        'type' => 'tinyint(1)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
      'sendtime' => 
      array (
        'field' => 'sendtime',
        'type' => 'int(10)',
        'null' => 'NO',
        'key' => false,
        'default' => '',
        'extra' => '',
      ),
    ),
    'primarykey' => 'mid',
    'autoincrement' => '1',
  ),
);
?>