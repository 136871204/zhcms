<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>{$zh.language.admin_template_style_style_list_page_title}</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/style_list.js"/>
    <css file="__CONTROL_TPL__/css/style_list.css"/>
</head>
<body>
<div class="wrap" style="bottom: 0px;">
    <div class="title-header">説明</div>
    <div class="help">
        <!--TODO：模板页面，和视频教程 之后运营的时候在制作-->
        <p>1. METACMSは優秀なテンプレートどんどん発表する <a href="http://www.metaphase.co.jp" class="action" target="_blank">すぐ取得</a></p>
        <p>2. METACMS以外のテンプレートは、ウイルスがある可能性がある,ご注意</p>
    </div>
    <div class="title-header">現在のテンプレート</div>
    <div class="help">
        <p>METACMSのタグを理解して、テンプレートがもっと活用できます、もちろん簡単でサイトを作れます >>><a href="http://www.metaphase.co.jp" target="_blank">操作マニュアル</a></p>
    </div>
    <div class="tpl-list">
        <ul>
            <list from="$style" name="t">
                <li <if value="$t.current==1">class="active current"</if>>
                    <img src="{$t.template_img}" width="260"/>
                    <h2>{$t.name}</h2>
                    <p>作者: {$t.author}</p>
                    <p>Email: {$t.email}</p>
                    <p>ディレクトリ : {$t.dir_name}</p>

                    <div class="link">
                        <if value="$t.current neq 1">
                            <a href="javascript:;" class="btn" attr='select_tpl' onclick="zh_ajax('{|U:select_style}',{dir_name:'{$t.dir_name|basename}'})">使用</a>
                       <else/>
                        <strong>使用中...</strong>
                        </if>
                    </div>
                </li>
            </list>
        </ul>
    </div>
</div>
</body>
</html>