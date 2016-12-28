<?php

/**
 * ���ģ���ļ��еı༭����������
 *
 * @access  public
 * @param   string  $tmp_name   ģ������
 * @param   string  $tmp_file   ģ���ļ�����
 * @return  array
 */
function get_template_region($tmp_name, $tmp_file, $lib=true)
{
    $file = ROOT_PATH.'template/'.$tmp_name . '/ec/' . $tmp_file;
    /* ��ģ���ļ������ݶ����ڴ� */
    $content = file_get_contents($file);
    //p($content);die;
    /* ������б༭���� */
    static $regions = array();
    if (empty($regions))
    {
        $matches = array();
        //<!-- TemplateBeginEditable name="�������" -->
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