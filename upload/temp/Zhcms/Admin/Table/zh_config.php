<?php if(!defined('ZHPHP_PATH'))exit;
return array (
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
    'type' => 'enum(\'站点配置\',\'微信微博\',\'客服设置\',\'高级配置\',\'上传配置\',\'会员配置\',\'邮箱配置\',\'安全配置\',\'水印配置\',\'内容相关\',\'性能优化\',\'伪静态\',\'COOKIE配置\',\'SESSION配置\',\'网店信息\',\'EC基本设置\',\'EC显示设置\',\'EC购物流程\',\'EC商品显示设置\',\'自定义\')',
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
    'type' => 'enum(\'文本\',\'数字\',\'布尔(1/0)\',\'多行文本\',\'select\',\'image\')',
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
  'store_range' => 
  array (
    'field' => 'store_range',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'webid' => 
  array (
    'field' => 'webid',
    'type' => 'int(11) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
);
?>