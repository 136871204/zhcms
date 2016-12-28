<?php

/**
 * 获得模版文件中的编辑区域及其内容
 *
 * @access  public
 * @param   string  $tmp_name   模版名称
 * @param   string  $tmp_file   模版文件名称
 * @return  array
 */
function get_template_region($tmp_name, $tmp_file, $lib=true)
{
    $file = ROOT_PATH.'template/'.$tmp_name . '/ec/' . $tmp_file;
    /* 将模版文件的内容读入内存 */
    $content = file_get_contents($file);
    //p($content);die;
    /* 获得所有编辑区域 */
    static $regions = array();
    if (empty($regions))
    {
        $matches = array();
        //<!-- TemplateBeginEditable name="左边区域" -->
        $result  = preg_match_all('/(<!--\\s*TemplateBeginEditable\\sname=")([^"]+)("\\s*-->)/', $content, $matches, PREG_SET_ORDER);
        
        p($matches);
        p($result);die;
        if ($result && $result > 0)
        {
            foreach ($matches AS $key => $val)
            {
                if ($val[2] != 'doctitle' && $val[2] != 'head')
                {
                    $regions[] = $val[2];
                }
            }
        }
    }
    p($file);die;
}