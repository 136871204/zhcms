<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>システムメニュー管理</title>
    <zhjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
    var admin_node_js_check_message1='メニュ名は必須';
    var admin_node_js_update_order_error1='ソート更新失敗';
    </script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">メニュー一覧</a></li>
            <li><a href="{|U:'add',array('pid'=>0)}">メニュー新規</a></li>
            <li><a href="javascript:zh_ajax('{|U:update_cache}');">キャッシュ更新</a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50">ソート</td>
            <td class="w50">ID</td>
            <td>メニュー名</td>
            <td>状態</td>
            <td class="w80">タイプ</td>
            <td class="w250">操作</td>
        </tr>
        </thead>
        <list from="$node" name="n">
            <tr <if value="$n.pid eq 0">class="top"</if>>
                <td>
                    <input type="text" class="w30" value="{$n.list_order}" name="list_order[{$n.nid}]"/>
                </td>
                <td>{$n.nid}</td>
                <td>
                    <if value="$n.pid eq 0 && Data::hasChild(cache('node'),$n.nid)">
                        <img src="__STATIC__/image/contract.gif" action="2" class="explodeCategory"/>
                    </if>
                    <if value="$n.pid eq 0">
                        <strong>{$n._name}</strong>
                        <else/>
                        {$n._name}
                    </if>
                </td>
                <td>
                    <if value="$n.state==1">
                        表示
                        <else>
                        表示しない
                    </if>
                </td>
                <td>
                    <if value="$n.type==1">
                        権限メニュー
                        <else>
                        普通メニュー
                    </if>
                </td>
                <td style="text-align: right">
                    <if value="$n._level==3">
                        <span class="disabled">子メニュー新規  | </span>
                    <else>
                        <a href="{|U('add',array('pid'=>$n['nid']))}">子メニュー新規</a> |
                    </if>

                    <if value="$n.is_system==0">
                        <a href="{|U('edit',array('nid'=>$n['nid']))}">変更</a> |
                        <a href="javascript:if(confirm('このメニュー削除しますか？'))zh_ajax('{|U:del}',{nid:{$n.nid}})">削除</a>
                    <else/>
                         <span class="disabled">変更 | </span>
                         <span class="disabled">削除</span>
                    </if>
                </td>
            </tr>
        </list>
    </table>
    <br /><br /><br /><br />
</div>
<div class="position-bottom">
    <input type="button" class="zh-success" value="ソート更新" onclick="update_order();"/>
</div>
<style type="text/css">
    img.explodeCategory {
        cursor: pointer;
    }
</style>
<script>
    //չ����Ŀ
    $(".explodeCategory").click(function () {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        switch (action) {
            case 1://չʾ
                $(tr).nextUntil('.top').show();
                $(this).attr('action', 2);
                $(this).attr('src', "__STATIC__/image/contract.gif");
                break;
            case 2://����
                $(tr).nextUntil('.top').hide();
                $(this).attr('action', 1);
                $(this).attr('src', "__STATIC__/image/explode.gif");
                break;
        }
    })
    //�ر���Ŀ����Ŀ����������Ŀ��
    $(".explodeCategory").trigger('click');
    //ȫ����������Ŀ
    function explodeCategory() {
        $(".explodeCategory").each(function (i) {
            $(this).trigger('click');
        })
    }
</script>

</body>
</html>