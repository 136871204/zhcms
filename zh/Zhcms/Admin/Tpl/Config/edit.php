<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>サイト設置</title>
    <zhjs/>
    <script>
    
/**
 * 文件上传
 * @param id 显示图片列表id
 * @param type 类型 images image
 * @param num 数量
 * @param name 表单名
 * @param upload_img_max_width 最大宽度（超过这个尺寸，会进行图片裁切)
 * @param upload_img_max_width 最大高度（超过这个尺寸，会进行图片裁切)
 * @param water 是否加水印
 * @returns {boolean}
 * id, type, num, name, upload_img_max_width, upload_img_max_height
 */
function file_upload(options) {
   
    //{id:'thumb',type:'thumb',num:1,name:'thumb'}
	//多文件(图片与文件)上传时，判断是否已经超出了允许上传的图片数量
	switch(options.type) {
		case 'thumb':
            alert('TODO:content/js/addedit.js --- thumb');
			var url =WEB + "?a=Admin&c=ContentUpload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name;
//alert(url);
            break;
		case 'image':

            //alert('TODO:content/js/addedit.js --- file_upload');
			var url = WEB + "?a=Admin&c=Upload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name+ "&dir=" + options.dir;
			break;
		case 'images':
            alert('TODO:content/js/addedit.js --- images');
			//span储存的文件数量
			num = $('#zh_up_' + options.id).text() * 1;
			if (num == 0) {
				alert('アップロードMAX数到達!');
				return false;
			}
			var url =WEB + "?a=Admin&c=ContentUpload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype + '&upload_img_max_width=' + options.upload_img_max_width + '&upload_img_max_height=' + options.upload_img_max_height;
			break;
		case 'files':
            alert('TODO:content/js/addedit.js --- files');
			num = $('#zh_up_' + options.id).text() * 1;
			if (num == 0) {
				alert('アップロードMAX数到達!');
				return false;
			}
			var url = WEB + "?a=Admin&c=ContentUpload&m=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype;
			break;
	}
    //alert(url);
	$.modal({
		title : '文件上传',
		width : 650,
		height : 500,
		content : '<iframe frameborder=0 scrolling="no" style="height:99%;border:none;" src="' + url + '"></iframe>'
	});
}

//预览单张图片
function view_image(obj) {
	var src = $(obj).attr('src');
	var id = $(obj).attr('id');
	var viewImg = $('#view_' + id);
	//删除预览图
	if (viewImg.length >= 1) {
		viewImg.remove();
	}
	//鼠标移除时删除预览图
	$(obj).mouseout(function(){
		$('#view_' + id).remove();
	})
	if (src) {
		var offset = $(obj).offset();
		var _left = 450+offset.left+"px";
		var _top = offset.top-100+"px";
		var html = '<img src="' + src + '" style="border:solid 5px #dcdcdc;position:absolute;z-index:1000;width:300px;height:200px;left:'+_left+';top:'+_top+';" id="view_'+id+'"/>';
		$('body').append(html);
	}
}

/**
 * 删除单图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload_one_img(obj) {
	$(obj).parent().find('input').val('').attr('src', '');
}
    
    </script>
</head>
<body>
<form action="{|U:edit}" method="post" class="zh-form" onsubmit="return zh_submit(this)">
    <input type="hidden" name="webid" value="{$zh.get.webid}"/>
    <div class="wrap">
        <div class="content-nr">

        </div>
        <div class="title-header">暖かい提示</div>
        <div class="help">
            1 テンプレート中、設置項目の使い方{ $zh.config.変数名称}
            <br/>
            2 設置項目を正しく設定してください、不正な設置はサイトの性能と安全に影響する
            <br/>
            3 設置項目がよくわからない場合、修正しないでください
        </div>
        <div class="tab">
            <ul class="tab_menu">
                
                <li lab="web"><a href="#">サイト設置</a></li>
                <li lab="weixinweibo"><a href="#">微信微博</a></li>
                <li lab="custion_service"><a href="#">問い合わせ設置</a></li>
                <li lab="rewrite"><a href="#">偽静態</a></li>
                <li lab="upload"><a href="#">アップロード設置</a></li>
                <li lab="member"><a href="#">会員設置</a></li>
                <li lab="content"><a href="#">内容関係</a></li>
                <li lab="water"><a href="#">water mark設置</a></li>
                <li lab="safe"><a href="#">安全配置</a></li>
                <li lab="optimize"><a href="#">性能最適化</a></li>
                <li lab="email"><a href="#">メールアドレス設置</a></li>
                <li lab="cookie"><a href="#">COOKIE設置</a></li>
                <li lab="session"><a href="#">SESSION設置</a></li>
                <li lab="ec_shop_info"><a href="#">ショップ情報</a></li>
                <li lab="ec_basic"><a href="#">EC基本設置</a></li>
                <li lab="ec_display"><a href="#">EC表示設置</a></li>
                <li lab="ec_shopping_flow"><a href="#">ECショッピングフロー</a></li>
                <li lab="ec_goods_display"><a href="#">EC商品表示設置</a></li>
            </ul>
            <div class="tab_content">
                <div id="web">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '站点配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="weixinweibo">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '微信微博'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="custion_service">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '客服设置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                
                <div id="rewrite">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '伪静态'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="upload">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                       <list from="$config" name="c">
                        	<if value="$c.type eq '上传配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="member">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '会员配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="content">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '内容相关'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="water">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '水印配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="safe">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '安全配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="optimize">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '性能优化'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="email">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq '邮箱配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                        <tr>
                        	<td colspan="4">
                        		<button class="zh-cancel-small" id="checkEmail" type="button">メールアドレステスト</button>
                        	</td>
                        </tr>
                    </table>
                </div>
                <div id="cookie">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq 'COOKIE配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="session">
                    <table class="table1">
                    	<tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                    	<list from="$config" name="c">
                        	<if value="$c.type eq 'SESSION配置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>
                <div id="ec_shop_info">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq '网店信息'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div>  
                <div id="ec_basic">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        
                        <list from="$config" name="c">
                        	<if value="$c.type eq 'EC基本设置'">
                                <if value="$c.name eq 'EC_SHOP_COUNTRY'" >
                                    <tr>
    	                        		<td>{$c.title|L:@@}</td>
    	                        		<td>
                                        <select name="EC_SHOP_COUNTRY" id="selCountries" onchange="region.changed(this, 1, 'selProvinces')">
                                            <option value=''>選んでください...</option>
                                            <foreach from="$countries" value="$region">
                                                <option value="{$region.region_id}" <if value="{$region.region_id} eq {$cfg.ec_shop_country}">selected</if> >{$region.region_name}</option>
                                            </foreach>
                                        </select>
                                        </td>
    	                        		<td>{$c.name}</td>
    	                        		<td>{$c.message|L:@@}</td>
                            		</tr>
                                <elseif value="$c.name eq 'EC_SHOP_PROVINCE'"/>
                                    <tr>
    	                        		<td>{$c.title|L:@@}</td>
    	                        		<td>
                                            <select name="EC_SHOP_PROVINCE" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                                                <option value=''>選んでください...</option>
                                                <foreach from="$provinces" value="$region">
                                                    <option value="{$region.region_id}" <if value="{$region.region_id} eq {$cfg.ec_shop_province}">selected</if>>{$region.region_name}</option>
                                                </foreach>
                                            </select>
                                        </td>
    	                        		<td>{$c.name}</td>
    	                        		<td>{$c.message|L:@@}</td>
                            		</tr>
                                <elseif value="$c.name eq 'EC_SHOP_CITY'"/>
                                    <tr>
    	                        		<td>{$c.title|L:@@}</td>
    	                        		<td>
                                            <select name="EC_SHOP_CITY" id="selCities">
                                                <option value=''>選んでください...</option>
                                                <foreach from="$cities" value="$region">
                                                    <option value="{$region.region_id}" <if value="{$region.region_id} eq {$cfg.ec_shop_city}">selected</if>>{$region.region_name}</option>
                                                </foreach>
                                            </select>
                                        </td>
    	                        		<td>{$c.name}</td>
    	                        		<td>{$c.message|L:@@}</td>
                            		</tr>
                                <else/>
                                    <tr>
    	                        		<td>{$c.title|L:@@}</td>
    	                        		<td>{$c.html}</td>
    	                        		<td>{$c.name}</td>
    	                        		<td>{$c.message|L:@@}</td>
                            		</tr>
                                </if>
                            </if>
                        </list>
                    </table>
                </div>  
                <div id="ec_display">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq 'EC显示设置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div> 
                <div id="ec_shopping_flow">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq 'EC购物流程'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div> 
                
                <div id="ec_goods_display">
                    <table class="table1">
                        <tr style="background: #E6E6E6;">
                    		<th  class="w150">タイトル</th>
                    		<th>配置</th>
                    		<th class="w300">変数</th>
                    		<th class="w300">説明</th>
                    	</tr>
                        <list from="$config" name="c">
                        	<if value="$c.type eq 'EC商品显示设置'">
                        		<tr>
	                        		<td>{$c.title|L:@@}</td>
	                        		<td>{$c.html}</td>
	                        		<td>{$c.name}</td>
	                        		<td>{$c.message|L:@@}</td>
                        		</tr>
                            </if>
                        </list>
                    </table>
                </div> 
            </div>
        </div>
        <br /><br /><br /><br /><br /><br />
    </div>
    
    <div class="position-bottom">
        <input type="submit" class="zh-success" value="確定"/>
    </div>
</form>
<script type="text/javascript" src="__PUBLIC__/ec/js/transport.js"></script>
<script type="text/javascript" src="__PUBLIC__/ec/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/ec/js/region.js"></script>
<script type="text/javascript" charset="utf-8">
region.isAdmin = true;

	$("#checkEmail").click(function(){
		$.post("{|U:'checkEmail'}",$('form').serialize(),function(json){
				if(json.state){
					alert(json.message);
				}else{
					alert(json.message);
				}
			},'json');
	});
</script>
</body>
</html>