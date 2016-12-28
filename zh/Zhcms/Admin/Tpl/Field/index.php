<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Field管理</title>
    <zhjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'Model/index'}">Model一覧</a></li>
            <li><a href="javascript:;" class="action">Field一覧</a></li>
            <li><a href="{|U('add',array('mid'=>$_GET['mid']))}">Field新規</a></li>
            <li><a href="javascript:;" onclick="zh_ajax('{|U:updateCache}',{mid:{$zh.get.mid}})">キャッシュ更新</a></li>
        </ul>
    </div>
    <table class="table2 zh-form">
        <thead>
        <tr>
            <td class="w50">ソート</td>
            <td class="w50">Fid</td>
            <td class="w200">説明</td>
            <td>Field名</td>
            <td class="w200">テーブル名</td>
            <td class="w100">タイプ</td>
            <td class="w80">システム</td>
            <td class="w80">必須</td>
            <td class="w80">検索</td>
            <td class="w80">投稿</td>
            <td class="w120">操作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
        </thead>
        <tbody>
        <list from="$field" name="f">
            <tr>
                <td>
                    <input type="text" name="fieldsort[{$f.fid}]" class="w30" value="{$f.fieldsort}"/>
                </td>
                <td>
                    {$f.fid}
                </td>
                <td>{$f.title}</td>
                <td>{$f.field_name}</td>
                <td>{$f.table_name}</td>
                <td>{$f.field_type}</td>
                <td>
                    <if value="{$f.is_system}">
                    	<font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="{$f.required}">
                    	<font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="{$f.issearch}">
                    	<font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="{$f.isadd}">
                    	<font color="red">√</font>
                        <else><font color="blue">×</font>
                    </if>
                </td>
                <td>
                	 <a href="{|U:'edit',array('mid'=>$f['mid'],'fid'=>$f['fid'])}">変更</a>       
                	 |
                	 <?php if(in_array($f['field_name'],$noallowforbidden)){?>
                	 	<span style='color:#666'>禁じる</span>
                	 	<?php }else if($f['field_state']==1){?>
                   <a href="javascript:zh_ajax('{|U:forbidden}',{fid:{$f.fid},field_state:0,mid:{$f.mid}})" >禁じる</a>             
                   		<?php }else{?>
                   		<a href="javascript:zh_ajax('{|U:forbidden}',{fid:{$f.fid},field_state:1,mid:{$f.mid}},'__URL__')" style='color:red'>禁じない</a>			
                   			<?php }?>
                    |
                    <?php if(in_array($f['field_name'],$noallowdelete)):?>
                			<span style='color:#666'>削除</span>
                	<?php else:?>
                		 <a href="javascript:"
                       onclick="return confirm('【{$f.title}】を削除しますか？')?zh_ajax('{|U:del}',{mid:{$f['mid']},fid:{$f['fid']}}):false;">削除</a>
                	<?php endif;?>
                   
                </td>
            </tr>
        </list>
        </tbody>
    </table>
    <br /><br /><br />
    <div class="position-bottom">
        <input type="button" class="zh-success" onclick="update_sort({$zh.get.mid});" value="ソート"/>
    </div>
</div>
</body>
</html>