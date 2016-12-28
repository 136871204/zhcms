<!DOCTYPE html>
<html>
<head>
    <title>EC演示</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <zhjs/>
    <bootstrap/>
    <link rel="stylesheet" type="text/css" href="__CONTROL_TPL__/css/article-list.css?ver=1.0"/>
    <zhcms/>
    <link href="__STATIC__/ecimage/themes/default/style.css" rel="stylesheet" type="text/css" />
    <script src='__STATIC__/js/utils.js'></script>
    <script src='__STATIC__/js/transport.js'></script>

</head>
<body>
<include file='__TEMPLATE__/ec/library/page_header.lbi'/>
<!--当前位置 start-->
<div class="block box">
    <div id="ur_here">
        <include file='__TEMPLATE__/ec/library/ur_here.lbi'/>
    </div>
</div>
<!--当前位置 end-->
<div class="blank"></div>
<div class="block clearfix">
    <!--left start-->
    <div class="AreaL">
        <div class="cart" id="ECS_CARTINFO">
        <?php 
            echo insert_cart_info();
        ?>
        </div>
        <div class="blank5"></div>
        <include file='__TEMPLATE__/ec/library/category_tree.lbi'/>
        <div class="blank5"></div>
        <include file='__TEMPLATE__/ec/library/history.lbi'/>
    </div>
    <!--left end-->
    
    <!--right start-->
    <div class="AreaR">
        <div class="box">
            <h3><span>商品筛选</span></h3>
            <div class="screeBox">
                <strong>品牌：</strong>
                <foreach from="$brands" value="$brand" >
                    <if value="$brand['selected']">
                        <span>{$brand.brand_name}</span>
                    <else/>
                        <a href="{$brand.url}">{$brand.brand_name}</a>&nbsp;
                    </if>
                </foreach>
            </div>
            <div class="screeBox">
                <strong>价格：</strong>
                <foreach from="$price_grade" value="$grade" >
                    <if value="$grade['selected']">
                        <span>{$grade.price_range}</span>
                    <else/>
                        <a href="{$grade.url}">{$grade.price_range}</a>&nbsp;
                    </if>
                </foreach>
            </div>
            
            <foreach from="$filter_attr_list" value="$filter_attr" >
                <div class="screeBox">
                <strong>{$filter_attr.filter_attr_name|htmlspecialchars:@@} :</strong>
                <foreach from="$filter_attr['attr_list']" value="$attr" >
                    <if value="$attr['selected']">
                        <span>{$attr.attr_value}</span>
                    <else/>
                        <a href="{$attr.url}">{$attr.attr_value}</a>&nbsp;
                    </if>
                </foreach> 
                </div>
            </foreach>
            
        </div>
        <div class="blank5"></div>
        <include file='__TEMPLATE__/ec/library/recommend_best.lbi'/>
        
        <include file='__TEMPLATE__/ec/library/goods_list.lbi'/>
    </div>
    
</div>
</body>
</html>