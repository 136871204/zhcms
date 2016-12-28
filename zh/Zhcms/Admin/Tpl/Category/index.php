<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>カテゴリ一覧</title>
		<zhjs/>
	</head>
	<body>
		<form action='{|U:'BulkEdit'}' method="post">
			<div class="wrap">
				<div class="menu_list">
					<ul>
						<li>
							<a href="{|U:index}" class="action">
								カテゴリ一覧
							</a>
						</li>
						<li>
							<a href="{|U:'add'}">
								トップカテゴリ新規
							</a>
						</li>
						<li>
							<a href="javascript:zh_ajax('{|U:updateCache}')">
								カテゴリキャッシュ更新
							</a>
						</li>
					</ul>
				</div>
				<table class="table2 zh-form">
					<thead>
						<tr>
							<td class="w30">
							<input type="checkbox" class="select_all"/>
							</td>
                            <td class="w30">CID</td>
							<td class="w50">ソート</td>
							<td>カテゴリ名称</td>
							<td class="w100">タイプ</td>
							<td class="w100">Model</td>
							<td class="w180">操作</td>
						</tr>
					</thead>
					<list from="$category" name="c">
						<tr>
							<td>
							<input type="checkbox" name="cid[]" value="{$c.cid}"/>
							</td>
							<td>{$c.cid}</td>
							<td>
							<input type="text" class="w30" value="{$c.catorder}" name="list_order[{$c.cid}]"/>
							</td>
							<td>{$c._name}</td>
							<td>{$c.cat_type_name}</td>
							<td>{$c.model_name}</td>
							<td>
							<a href="<?php echo Url::getCategoryUrl($c)?>" target="_blank">
								ブラウズ
							</a>
								<span class="line">|</span>
							<a href="{|U:'add',array('pid'=>$c['cid'],'mid'=>$c['mid'])}">
								子カテ新規
							</a>
								<span class="line">|</span>
							<a href="{|U:'edit',array('cid'=>$c['cid'])}">
								変更
							</a>
								<span class="line">|</span>
							<a href="javascript:zh_confirm('削除しますか？',function(){zh_ajax(CONTROL + '&m=del', {cid: {$c.cid},mid: {$c.mid}})})">
								削除
							</a></td>
						</tr>
					</list>
				</table>
                
				<div class="h60"></div>
			</div>
			<div class="position-bottom">
				<input type="button" class="zh-cancel" onclick="select_all(1)" value='全て選択'/>
				<input type="button" class="zh-cancel" onclick="select_all(0)" value='反选'/>
				<input type="button" class="zh-cancel" onclick="updateOrder()" value="ソート変更"/>
				<input type="button" class="zh-cancel" onclick="BulkEdit()" value="一括変更"/>				
			</div>
		</form>
		<script>
			//更新排序
function updateOrder() {
    //栏目检测
    if ($("input[type='text']").length == 0) {
        alert('ソートするカテゴリ選択してください');
        return false;
    }
    var post = $("input[type='text']").serialize();
    zh_ajax(CONTROL + '&m=updateOrder', post);
}
//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked",$(this).attr('checked')=='checked');
    })
})
//全选复选框
function select_all(state){
	if(state==1){
		$("[type='checkbox']").attr("checked",state);
	}else{
		$("[type='checkbox']").attr("checked",function(){return !$(this).attr('checked')});
	}
}
//指量编辑
function BulkEdit() {
    //栏目检测
    if ($("input[type='checkbox']:checked").length == 0) {
        alert('変更するカテゴリ選択してください');
        return false;
    }
   	$("form").trigger('submit');
}
		</script>
	</body>
</html>