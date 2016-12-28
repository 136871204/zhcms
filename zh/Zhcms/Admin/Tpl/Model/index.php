<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Model管理</title>
		<zhjs/>
	</head>
	<body>
		<div class="wrap">
			<div class="menu_list">
				<ul>
					<li>
						<a href="{|U:'index'}" class="action">
							Model一覧
						</a>
					</li>
					<li>
						<a href="{|U:'add'}">
							Model新規
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="zh_ajax('{|U:updateCache}')">
							キャッシュ更新
						</a>
					</li>
				</ul>
			</div>
			<div class="content">
				<table class="table2 table-title">
					<thead>
						<tr>
							<td class="w30">mid</td>
							<td>Model名称</td>
							<td class="w100">システム</td>
							<td class="w100">メインテーブル</td>
							<td class="w30">状態</td>
							<td class="w150">操作</td>
						</tr>
					</thead>
					<tbody>
						<list from="$model" name="m">
							<tr>
								<td>{$m.mid}</td>
								<td>{$m.model_name}</td>
								<td>
								<if value='$m.is_system eq 1'>
									<font color="red">√</font>
									<else>
									<font color="blue">×</font>
								</if></td>
								<td>{$m.table_name}</td>
								<td>
								<if value="$m['enable']">
									NO
									<else>
										OFF
								</if></td>
								<td>
								<a href="{|U:'Field/index',array('mid'=>$m['mid'])}">
									Field管理
								</a> |
								<if value="$m.is_system==1">
									変更
									<else>
										<a href="{|U:'edit',array('mid'=>$m['mid'])}">
											変更
										</a>
								</if> |
								<if value="$m.is_system==1 || in_array($m['table_name'],$forbidDelete)">
									削除
									<else>
										<a href="javascript:zh_confirm('削除しますか？',function(){zh_ajax('{|U:'del'}', {mid: {$m.mid}})})">
											削除
										</a>
								</if></td>
							</tr>
						</list>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>