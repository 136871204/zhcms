<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>邮件模板</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <script src='__STATIC__/js/utils.js'></script>
    <script src='__STATIC__/js/transport.js'></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
                <li><a href="{|U:'index'}" class="action">邮件模板</a></li>
        </ul>
    </div>
    <div class="form-div" id="conent_area">
        <form method="post" name="theForm"  action="{|U:'save_template'}">
            <table id="general-table" align="center" class="table1">
                <tr>
                    <td style="font-weight: bold; " width="15%">请选择邮件模版：</td>
                    <td>
                        <select id="selTemplate" name="selTemplate" onchange="loadTemplate()">
                            <html_options  options="$templates" selected="{$cur}" >
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; " width="15%">邮件主题:</td>
                    <td>
                        <input type="text" name="subject" id="subject" style="width: 300px" value="{$template.template_subject}"/>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold" >邮件类型:</td>
                    <td>
                        <input type="radio" name="mail_type" value="0"  <if value="{$template.is_html} eq '0' ">checked="true"</if> />纯文本邮件
                        <input type="radio" name="mail_type" value="1" <if value="{$template.is_html} eq '1'">checked="true"</if> />HTML 邮件 
                
                        <input type="hidden" name="tpl" value="{$tpl}" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="content" id="content" style="width:90%" rows="16" >{$template.template_content}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="确定" class="button" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
   
</div>
<script>
/**
 * 载入模板
 */
function loadTemplate()
{
    var tpl = document.getElementById('selTemplate').value;
    var ajaxurl=APP +"&is_ajax=1&c=MailTemplate&m=loat_templatecontent"; 
    Ajax.call(ajaxurl, 'tpl=' + tpl, loadTemplateResponse, "GET", "JSON");
}
 
 /**
 * 将模板的内容载入到文本框中
 */
function loadTemplateResponse(result, textResult)
{
    $('#content').html(result.content);
    
}
 

</script>
</body>
</html>