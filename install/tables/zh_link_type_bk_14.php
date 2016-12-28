<?php if(!defined('ZHPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."link_type (`tid`,`type_name`,`system`) VALUES('1','友情リンク','1')");
$db->exe("REPLACE INTO ".$db_prefix."link_type (`tid`,`type_name`,`system`) VALUES('2','パートナー','1')");
