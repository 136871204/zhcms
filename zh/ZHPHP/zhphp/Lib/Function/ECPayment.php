<?php
/**
 * 取得返回信息地址
 * @param   string  $code   支付方式代码
 */
function return_url($code)
{
    return WEB_URL . '?a=ec&c=EcRespond&m=index&code=' . $code;
}