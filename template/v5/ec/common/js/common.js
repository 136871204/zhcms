/* $Id : common.js 4865 2007-01-31 14:04:10Z paulgao $ */

/* *
 * 添加商品到购物车 
 */
function addToCart(goodsId, parentId)
{
    var goods        = new Object();
    var spec_arr     = new Array();
    var fittings_arr = new Array();
    var number       = 1;
    var formBuy      = document.forms['ECS_FORMBUY'];
    var quick		   = 0;

    // 检查是否有商品规格 
    if (formBuy)
    {
        spec_arr = getSelectedAttributes(formBuy);
        if (formBuy.elements['number'])
        {
            number = formBuy.elements['number'].value;
        }
        quick = 1;
    }
    goods.quick    = quick;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
    
    var ajaxurl=APP+"&c=EcFlow&m=index&step=add_to_cart";
    Ajax.call(ajaxurl, 'goods=' + goods.toJSONString(), addToCartResponse, 'POST', 'JSON');

}

/**
 * 获得选定的商品属性
 */
function getSelectedAttributes(formBuy)
{
    var spec_arr = new Array();
    var j = 0;
    
    for (i = 0; i < formBuy.elements.length; i ++ )
    {
        var prefix = formBuy.elements[i].name.substr(0, 5);
    
        if (prefix == 'spec_' && 
                (
                    (
                        (formBuy.elements[i].type == 'radio' || formBuy.elements[i].type == 'checkbox') && 
                        formBuy.elements[i].checked
                    ) ||
                    formBuy.elements[i].tagName == 'SELECT'
                )
            )
        {
            spec_arr[j] = formBuy.elements[i].value;
            j++ ;
        }
    }
    
    return spec_arr;
}

/* *
 * 处理添加商品到购物车的反馈信息
 */
function addToCartResponse(result)
{
    if (result.error > 0)
    {
        // 如果需要缺货登记，跳转
        if (result.error == 2)
        {
            if (confirm(result.message))
            {
                location.href = APP+'&c=EcUser&m=index&act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
            }
        }
        // 没选规格，弹出属性选择框
        else if (result.error == 6)
        {
            openSpeDiv(result.message, result.goods_id, result.parent);
        }
        else
        {
            alert(result.message);
        }
    }
    else
    {
        var cartInfo = document.getElementById('ECS_CARTINFO');
        var cart_url = APP+'&c=EcFlow&m=index&step=cart';
        if (cartInfo)
        {
            cartInfo.innerHTML = result.content;
        }
        if (result.one_step_buy == '1')
        {
            location.href = cart_url;
        }
        else
        {
            switch(result.confirm_type)
            {
                case '1' :
                    if (confirm(result.message)) location.href = cart_url;
                    break;
                case '2' :
                    if (!confirm(result.message)) location.href = cart_url;
                    break;
                case '3' :
                    location.href = cart_url;
                    break;
                default :
                    break;
            }
        }
    }
    
}

/* *
 * 添加商品到收藏夹
 */
function collect(goodsId)
{
    var ajaxurl="index.php?a=ec&c=EcUser&m=index&act=collect";
    Ajax.call(ajaxurl, 'id=' + goodsId, collectResponse, 'GET', 'JSON');
}

/* *
 * 处理收藏商品的反馈信息
 */
function collectResponse(result)
{
    alert(result.message);
}

/* *
 * 处理会员登录的反馈信息
 */
function signInResponse(result)
{
    alert('common.js---signInResponse');
}

/* *
 * 评论的翻页函数
 */
function gotoPage(page, id, type)
{
    var ajaxurl=APP+'&c=EcComment&m=index&act=gotopage';
    Ajax.call(ajaxurl, 'page=' + page + '&id=' + id + '&type=' + type, gotoPageResponse, 'GET', 'JSON');
    
}

function gotoPageResponse(result)
{
    document.getElementById("ECS_COMMENT").innerHTML = result.content;
}

/* *
 * 商品购买记录的翻页函数
 */
function gotoBuyPage(page, id)
{
  alert('common.js---gotoBuyPage');
}

function gotoBuyPageResponse(result)
{
  alert('common.js---gotoBuyPageResponse');
}

/* *
 * 取得格式化后的价格
 * @param : float price
 */
function getFormatedPrice(price)
{
    alert('common.js---getFormatedPrice');
}

/* *
 * 夺宝奇兵会员出价
 */

function bid(step)
{
  alert('common.js---bid');
}

/* *
 * 夺宝奇兵会员出价反馈
 */

function bidResponse(result)
{
  alert('common.js---bidResponse');
}
onload = function()
{
    //alert('common.js---onload');
}

/* *
 * 夺宝奇兵最新出价
 */

function newPrice(id)
{
    var ajaxurl="index.php?a=ec&c=EcSnatch&m=index&act=new_price_list&id=" + id;
    Ajax.call(ajaxurl, '', newPriceResponse, 'GET', 'TEXT');
  //alert('common.js---newPrice');
}

/* *
 * 夺宝奇兵最新出价反馈
 */

function newPriceResponse(result)
{
    document.getElementById('ECS_PRICE_LIST').innerHTML = result;
}

/* *
 *  返回属性列表
 */
function getAttr(cat_id)
{
  alert('common.js---getAttr');
}

/* *
 * 截取小数位数
 */
function advFormatNumber(value, num) // 四舍五入
{
  alert('common.js---advFormatNumber');
}

function formatNumber(value, num) // 直接去尾
{
  alert('common.js---formatNumber');
}

/* *
 * 根据当前shiping_id设置当前配送的的保价费用，如果保价费用为0，则隐藏保价费用
 *
 * return       void
 */
function set_insure_status()
{
  alert('common.js---set_insure_status');
}

/* *
 * 当支付方式改变时出发该事件
 * @param       pay_id      支付方式的id
 * return       void
 */
function changePayment(pay_id)
{
  alert('common.js---changePayment');
}

function getCoordinate(obj)
{
  alert('common.js---getCoordinate');
}

function showCatalog(obj)
{
  alert('common.js---showCatalog');
}

function hideCatalog(obj)
{
  alert('common.js---hideCatalog');
}

function sendHashMail()
{
    var ajaxurl=APP+'&c=EcUser&m=index&act=send_hash_mail';
    Ajax.call(ajaxurl, '', sendHashMailResponse, 'GET', 'JSON')
}

function sendHashMailResponse(result)
{
    alert(result.message);
}

/* 订单查询 */
function orderQuery()
{
    var order_sn = document.forms['ecsOrderQuery']['order_sn'].value;
    var reg = /^[\.0-9]+/;
    if (order_sn.length < 10 || ! reg.test(order_sn))
    {
        alert(invalid_order_sn);
        return;
    }
    var ajaxurl='index.php?a=ec&c=EcUser&m=index&act=order_query&order_sn=s' + order_sn;
    Ajax.call(ajaxurl, '', orderQueryResponse, 'GET', 'JSON');
}

function orderQueryResponse(result)
{
    if (result.message.length > 0)
    {
        alert(result.message);
    }
    if (result.error == 0)
    {
        var div = document.getElementById('ECS_ORDER_QUERY');
        div.innerHTML = result.content;
    }
}

function display_mode(str)
{
    document.getElementById('display').value = str;
    setTimeout(doSubmit, 0);
    function doSubmit() {document.forms['listform'].submit();}
}

function display_mode_wholesale(str)
{
    alert('common.js---display_mode_wholesale');
}

/* 修复IE6以下版本PNG图片Alpha */
function fixpng()
{
    var arVersion = navigator.appVersion.split("MSIE")
    var version = parseFloat(arVersion[1])
    
    if ((version >= 5.5) && (document.body.filters))
    {
        for(var i=0; i<document.images.length; i++)
        {
            var img = document.images[i]
            var imgName = img.src.toUpperCase()
            if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
            {
                var imgID = (img.id) ? "id='" + img.id + "' " : ""
                var imgClass = (img.className) ? "class='" + img.className + "' " : ""
                var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
                var imgStyle = "display:inline-block;" + img.style.cssText
                if (img.align == "left") imgStyle = "float:left;" + imgStyle
                if (img.align == "right") imgStyle = "float:right;" + imgStyle
                if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
                var strNewHTML = "<span " + imgID + imgClass + imgTitle
                + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
                + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
                + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>"
                img.outerHTML = strNewHTML
                i = i-1
            }
        }
    }
}

function hash(string, length)
{
  alert('common.js---hash');
}

function stringxor(s1, s2)
{
  alert('common.js---stringxor');
}

var evalscripts = new Array();
function evalscript(s)
{
  alert('common.js---evalscript');
}

function $$(id)
{
    alert('common.js---11');
}

function appendscript(src, text, reload, charset)
{
  alert('common.js---appendscript');
}

function in_array(needle, haystack)
{
  alert('common.js---in_array');
}

var pmwinposition = new Array();

var userAgent = navigator.userAgent.toLowerCase();
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);
function pmwin(action, param)
{
    alert('common.js---pmwin');
}

var pmwindragstart = new Array();
function pmwindrag(e, op)
{
  alert('common.js---pmwindrag');
}

function doane(event)
{
  alert('common.js---doane');
}

/* *
 * 添加礼包到购物车
 */
function addPackageToCart(packageId)
{
    var package_info = new Object();
    var number       = 1;
    
    package_info.package_id = packageId
    package_info.number     = number;
    
    var ajaxurl=APP+'&c=EcFlow&m=index&step=add_package_to_cart';
    Ajax.call(ajaxurl, 'package_info=' + package_info.toJSONString(), addPackageToCartResponse, 'POST', 'JSON');
}

/* *
 * 处理添加礼包到购物车的反馈信息
 */
function addPackageToCartResponse(result)
{
    if (result.error > 0)
    {
        if (result.error == 2)
        {
            alert('common.js---addPackageToCartResponse-1');
            /*if (confirm(result.message))
            {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
            }*/
        }
        else
        {
            alert(result.message);
        }
    }
    else
    {
        var cartInfo = document.getElementById('ECS_CARTINFO');
        var cart_url = APP+'&c=EcFlow&m=index&step=cart';
        if (cartInfo)
        {
            cartInfo.innerHTML = result.content;
        }
        if (result.one_step_buy == '1')
        {
            location.href = cart_url;
        }
        else
        {
            switch(result.confirm_type)
            {
                case '1' :
                    if (confirm(result.message)) location.href = cart_url;
                    break;
                case '2' :
                    if (!confirm(result.message)) location.href = cart_url;
                    break;
                case '3' :
                    location.href = cart_url;
                    break;
                default :
                    break;
            }
        }
    }
}

function setSuitShow(suitId)
{
    var suit    = document.getElementById('suit_'+suitId);

    if(suit == null)
    {
        return;
    }
    if(suit.style.display=='none')
    {
        suit.style.display='';
    }
    else
    {
        suit.style.display='none';
    }
}


/* 以下四个函数为属性选择弹出框的功能函数部分 */
//检测层是否已经存在
function docEle() 
{
    return document.getElementById(arguments[0]) || false;
}

//生成属性选择层
function openSpeDiv(message, goods_id, parent) 
{
    var _id = "speDiv";
    var m = "mask";
    if (docEle(_id)) document.removeChild(docEle(_id));
    if (docEle(m)) document.removeChild(docEle(m));
  
    //计算上卷元素值
    var scrollPos; 
    if (typeof window.pageYOffset != 'undefined') 
    { 
        scrollPos = window.pageYOffset; 
    } 
    else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') 
    { 
        scrollPos = document.documentElement.scrollTop; 
    } 
    else if (typeof document.body != 'undefined') 
    { 
        scrollPos = document.body.scrollTop; 
    }
    var i = 0;
    var sel_obj = document.getElementsByTagName('select');
    while (sel_obj[i])
    {
        sel_obj[i].style.visibility = "hidden";
        i++;
    }
    
    // 新激活图层
    var newDiv = document.createElement("div");
    newDiv.id = _id;
    newDiv.style.position = "absolute";
    newDiv.style.zIndex = "10000";
    newDiv.style.width = "300px";
    newDiv.style.height = "260px";
    newDiv.style.top = (parseInt(scrollPos + 200)) + "px";
    newDiv.style.left = (parseInt(document.body.offsetWidth) - 200) / 2 + "px"; // 屏幕居中
    newDiv.style.overflow = "auto"; 
    newDiv.style.background = "#FFF";
    newDiv.style.border = "3px solid #59B0FF";
    newDiv.style.padding = "5px";

    //生成层内内容
    newDiv.innerHTML = '<h4 style="font-size:14; margin:15 0 0 15;">' + select_spe + "</h4>";
    for (var spec = 0; spec < message.length; spec++)
    {
        newDiv.innerHTML += '<hr style="color: #EBEBED; height:1px;"><h6 style="text-align:left; background:#ffffff; margin-left:15px;">' +  message[spec]['name'] + '</h6>';
        
        if (message[spec]['attr_type'] == 1)
        {
            for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
            {
                if (val_arr == 0)
                {
                    newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' checked /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
                }
                else
                {
                    newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
                }
            } 
            newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
        }
        else
        {
            for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
            {
                newDiv.innerHTML += "<input style='margin-left:15px;' type='checkbox' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + ' [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';     
            }
            newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
        }
    }
    newDiv.innerHTML += "<br /><center>[<a href='javascript:submit_div(" + goods_id + "," + parent + ")' class='f6' >" + btn_buy + "</a>]&nbsp;&nbsp;[<a href='javascript:cancel_div()' class='f6' >" + is_cancel + "</a>]</center>";
    document.body.appendChild(newDiv);
    
    
    // mask图层
    var newMask = document.createElement("div");
    newMask.id = m;
    newMask.style.position = "absolute";
    newMask.style.zIndex = "9999";
    newMask.style.width = document.body.scrollWidth + "px";
    newMask.style.height = document.body.scrollHeight + "px";
    newMask.style.top = "0px";
    newMask.style.left = "0px";
    newMask.style.background = "#FFF";
    newMask.style.filter = "alpha(opacity=30)";
    newMask.style.opacity = "0.40";
    document.body.appendChild(newMask);
} 

//获取选择属性后，再次提交到购物车
function submit_div(goods_id, parentId) 
{
    var goods        = new Object();
    var spec_arr     = new Array();
    var fittings_arr = new Array();
    var number       = 1;
    var input_arr      = document.getElementsByTagName('input'); 
    var quick		   = 1;
    
    var spec_arr = new Array();
    var j = 0;
    for (i = 0; i < input_arr.length; i ++ )
    {
        var prefix = input_arr[i].name.substr(0, 5);
    
        if (    prefix == 'spec_' && 
                (
                    ((input_arr[i].type == 'radio' || input_arr[i].type == 'checkbox') && 
                    input_arr[i].checked)
                )
            )
        {
            spec_arr[j] = input_arr[i].value;
            j++ ;
        }
    }
    goods.quick    = quick;
    goods.spec     = spec_arr;
    goods.goods_id = goods_id;
    goods.number   = number;
    goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
    
    var ajaxurl=APP+"&c=EcFlow&m=index&step=add_to_cart";
    Ajax.call(ajaxurl, 'goods=' + goods.toJSONString(), addToCartResponse, 'POST', 'JSON');
    
    document.body.removeChild(docEle('speDiv'));
    document.body.removeChild(docEle('mask'));
    
    var i = 0;
    var sel_obj = document.getElementsByTagName('select');
    while (sel_obj[i])
    {
        sel_obj[i].style.visibility = "";
        i++;
    }

}

// 关闭mask和新图层
function cancel_div() 
{
    document.body.removeChild(docEle('speDiv'));
    document.body.removeChild(docEle('mask'));
    
    var i = 0;
    var sel_obj = document.getElementsByTagName('select');
    while (sel_obj[i])
    {
        sel_obj[i].style.visibility = "";
        i++;
    }
}
