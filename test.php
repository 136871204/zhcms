<?php
$clean = false;
function shutdown_func(){
    global $clean;
    if (!$clean){
        die("not a clean shutdown");
    }
    //echo 'aaa';
    return false;
}
register_shutdown_function("shutdown_func");
$a = 1;
//$a = new FooClass(); // ����Ϊ���������ʧ��
$clean = true;
?>