<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>内容一覧</title>
		<zhjs/>
		<js file="__CONTROL_TPL__/js/content.js"/>
		<css file="__CONTROL_TPL__/css/css.css"/>
	</head>
	<body>
		<div class="wrap">
			<form action="{|U:'content'}" class="zh-form" method="get">
				<input type="hidden" name="m" value="content"/>
                <input type="hidden" name="c" value="content"/>
                <input type="hidden" name="a" value="admin"/>
				<input type="hidden" name="mid" value="{$zh.get.mid}"/>
				<input type="hidden" name="cid" value="{$zh.get.cid}"/>
				<input type="hidden" name="state" value="{$zh.get.state}"/>
				<div class="search">
					新規時間：
					<input id="begin_time" placeholder="開始時間" readonly="readonly" class="w80" type="text" value="" name="search_begin_time">
					<script>
						$('#begin_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					-
					<input id="end_time" placeholder="終了時間" readonly="readonly" class="w80" type="text" value="" name="search_end_time">
					<script>
						$('#end_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					&nbsp;&nbsp;&nbsp;
					<select name="flag" class="w100">
						<option selected="" value="">全部</option>
						<list from="$flag" name="f">
							<option value="{$f}" <if value="$zh.get.flag eq $f">selected=''</if>>{$f}</option>
						</list>
					</select>
					&nbsp;&nbsp;&nbsp;
					<select name="search_type" class="w100">
						<option value="1" <if value="$zh.get.search_type eq 1">selected=''</if>>タイトル</option>
						<option value="2" <if value="$zh.get.search_type eq 2">selected=''</if>>説明</option>
						<option value="3" <if value="$zh.get.search_type eq 3">selected=''</if>>ユーザ名</option>
						<option value="4" <if value="$zh.get.search_type eq 4">selected=''</if>>ユーザuid</option>
					</select>&nbsp;&nbsp;&nbsp;
					キーワード：
					<input class="w200" type="text" placeholder="キーワード入力..." value="{$zh.get.search_keyword}" name="search_keyword">
					<button class="zh-cancel" type="submit">
						検索
					</button>
				</div>
			</form>
			<div class="menu_list">
				<ul>
					<li>
						<a href="{|U:'content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_state'=>1)}"
						<if value="$zh.get.content_state==1">class="action"</if> >
							内容一覧
						</a>
					</li>
					<li>
						<a href="{|U:'content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_state'=>0)}"
						<if value="$zh.get.content_state==0">class="action"</if> >
							未審査
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="zh_open_window('{|U:add,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid'])}')">
							内容新規
						</a>
					</li>
				</ul>
			</div>
			<table class="table2 zh-form">
				<thead>
					<tr>
						<td class="w30">
						<input type="checkbox" id="select_all"/>
						</td>
						<td class="w30">aid</td>
						<td class="w30">cid</td>
						<td class="w30">ソート</td>
						<td>タイトル</td>
						<td class="w50">状態</td>
						<td class="w100">作者</td>
						<td class="w80">修正時間</td>
						<td class="w120">操作</td>
					</tr>
				</thead>
				<list from="$data" name="c">
					<tr>
						<td>
						<input type="checkbox" name="aid[]" value="{$c.aid}"/>
						</td>
						<td>{$c.aid}</td>
						<td>{$c.cid}</td>
						<td>
						<input type="text" class="w30" value="{$c.arc_sort}" name="arc_order[{$c.aid}]"/>
						</td>
						<td>
						<a href="{|U:'Index/Index/content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'aid'=>$c['aid'])}" target="_blank">
							{$c.title}
						</a>
						<if value="$c.flag">
							<span style="color:#FF0000"> [{$c.flag}]</span>
						</if></td>
						<td>
						<if value="$c.content_state eq 1">
							審査済
							<else>
								未審査
						</if></td>
						<td>{$c.username}</td>
						<td>{$c.updatetime|date:"Y-m-d",@@}</td>
						<td>
						<a href="<?php echo Url::getContentUrl($c);?>" target="_blank">
							訪問
						</a><span
						class="line">|</span>
						<a href="javascript:zh_open_window('{|U:edit,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid'],'aid'=>$c['aid'])}')">変更
						</a><span class="line">|</span>
						<a href="javascript:" onclick="zh_confirm('削除しますか？',function(){zh_ajax('{|U:'del'}',{aid:{$c['aid']},cid:{$c['cid']},mid:{$c['mid']}})})">
							削除
						</a>
						</td>
					</tr>
				</list>
			</table>
			<div class="page1">
				{$page}
			</div>
            <br /><br /><br /><br /><br /><br /><br /><br />
		</div>

		<div class="position-bottom">
			<input type="button" class="zh-cancel" value="全て選択" onclick="select_all('.table2')"/>
			<input type="button" class="zh-cancel" value="反选" onclick="reverse_select('.table2')"/>
			<input type="button" class="zh-cancel" onclick="order({$zh.get.mid},{$zh.get.cid})" value="ソート変更"/>
			<input type="button" class="zh-cancel" onclick="del({$zh.get.mid},{$zh.get.cid})" value="一括削除"/>
			<input type="button" class="zh-cancel" onclick="audit({$zh.get.mid},{$zh.get.cid},1)" value="審査通る"/>
			<input type="button" class="zh-cancel" onclick="audit({$zh.get.mid},{$zh.get.cid},0)" value="審査取り消す"/>
			<input type="button" class="zh-cancel" onclick="move({$zh.get.mid},{$zh.get.cid})" value="一括移動"/>
		</div>

	</body>
</html>