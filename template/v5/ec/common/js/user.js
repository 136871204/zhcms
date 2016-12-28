/* $Id : user.js 4865 2007-01-31 14:04:10Z paulgao $ */

/* *
 * 修改会员信息
 */
function userEdit()
{
    var frm = document.forms['formEdit'];
    var email = frm.elements['email'].value;
    var msg = '';
    var reg = null;
    var passwd_answer = frm.elements['passwd_answer'] ? Utils.trim(frm.elements['passwd_answer'].value) : '';
    var sel_question =  frm.elements['sel_question'] ? Utils.trim(frm.elements['sel_question'].value) : '';
    
    if (email.length == 0)
    {
        msg += email_empty + '\n';
    }
    else
    {
        if ( ! (Utils.isEmail(email)))
        {
            msg += email_error + '\n';
        }
    }
    
    if (passwd_answer.length > 0 && sel_question == 0 || document.getElementById('passwd_quesetion') && passwd_answer.length == 0)
    {
        msg += no_select_question + '\n';
    }
    
    for (i = 7; i < frm.elements.length - 2; i++)	// 从第七项开始循环检查是否为必填项
    {
        needinput = document.getElementById(frm.elements[i].name + 'i') ? document.getElementById(frm.elements[i].name + 'i') : '';
        
        if (needinput != '' && frm.elements[i].value.length == 0)
        {
            msg += '- ' + needinput.innerHTML + msg_blank + '\n';
        }
    }
    
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        return true;
    }
}

/* 会员修改密码 */
function editPassword()
{
    var frm              = document.forms['formPassword'];
    var old_password     = frm.elements['old_password'].value;
    var new_password     = frm.elements['new_password'].value;
    var confirm_password = frm.elements['comfirm_password'].value;
    
    var msg = '';
    var reg = null;
    
    if (old_password.length == 0)
    {
        msg += old_password_empty + '\n';
    }
    
    if (new_password.length == 0)
    {
        msg += new_password_empty + '\n';
    }
    
    if (confirm_password.length == 0)
    {
        msg += confirm_password_empty + '\n';
    }
    
    if (new_password.length > 0 && confirm_password.length > 0)
    {
        if (new_password != confirm_password)
        {
            msg += both_password_error + '\n';
        }
    }
    
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        return true;
    }
}

/* *
 * 对会员的留言输入作处理
 */
function submitMsg()
{
    
    var frm         = document.forms['formMsg'];
    var msg_title   = frm.elements['msg_title'].value;
    var msg_content = frm.elements['msg_content'].value;
    var msg = '';
    
    if (msg_title.length == 0)
    {
        msg += msg_title_empty + '\n';
    }
    if (msg_content.length == 0)
    {
        msg += msg_content_empty + '\n'
    }
    
    if (msg_title.length > 200)
    {
        msg += msg_title_limit + '\n';
    }
    //alert(msg);
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        return true;
    }
}

/* *
 * 会员找回密码时，对输入作处理
 */
function submitPwdInfo()
{
    var frm = document.forms['getPassword'];
    var user_name = frm.elements['user_name'].value;
    var email     = frm.elements['email'].value;
    
    var errorMsg = '';
    if (user_name.length == 0)
    {
        errorMsg += user_name_empty + '\n';
    }
    
    if (email.length == 0)
    {
        errorMsg += email_address_empty + '\n';
    }
    else
    {
        if ( ! (Utils.isEmail(email)))
        {
            errorMsg += email_address_error + '\n';
        }
    }
    
    if (errorMsg.length > 0)
    {
        alert(errorMsg);
        return false;
    }
    
    return true;
}

/* *
 * 会员找回密码时，对输入作处理
 */
function submitPwd()
{
    var frm = document.forms['getPassword2'];
    var password = frm.elements['new_password'].value;
    var confirm_password = frm.elements['confirm_password'].value;
    
    var errorMsg = '';
    if (password.length == 0)
    {
        errorMsg += new_password_empty + '\n';
    }
    
    if (confirm_password.length == 0)
    {
        errorMsg += confirm_password_empty + '\n';
    }
    
    if (confirm_password != password)
    {
        errorMsg += both_password_error + '\n';
    }
    
    if (errorMsg.length > 0)
    {
        alert(errorMsg);
        return false;
    }
    else
    {
        return true;
    }
}

/* *
 * 处理会员提交的缺货登记
 */
function addBooking()
{
    alert('user.js--addBooking');
}

/* *
 * 会员登录
 */
function userLogin()
{
    var frm      = document.forms['formLogin'];
    var username = frm.elements['username'].value;
    var password = frm.elements['password'].value;
    var msg = '';

    if (username.length == 0)
    {
        msg += username_empty + '\n';
    }
    
    if (password.length == 0)
    {
        msg += password_empty + '\n';
    }
    
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        return true;
    }
}

function chkstr(str)
{
    for (var i = 0; i < str.length; i++)
    {
        if (str.charCodeAt(i) < 127 && !str.substr(i,1).match(/^\w+$/ig))
        {
            return false;
        }
    }
    return true;
}

function check_password( password )
{
    if ( password.length < 6 )
    {
        document.getElementById('password_notice').innerHTML = password_shorter;
    }
    else
    {
        document.getElementById('password_notice').innerHTML = msg_can_rg;
    }
}

function check_conform_password( conform_password )
{
    password = document.getElementById('password1').value;
    
    if ( conform_password.length < 6 )
    {
        document.getElementById('conform_password_notice').innerHTML = password_shorter;
        return false;
    }
    if ( conform_password != password )
    {
        document.getElementById('conform_password_notice').innerHTML = confirm_password_invalid;
    }
    else
    {
        document.getElementById('conform_password_notice').innerHTML = msg_can_rg;
    }
}

function is_registered( username )
{
    var submit_disabled = false;
	var unlen = username.replace(/[^\x00-\xff]/g, "**").length;

    if ( username == '' )
    {
        document.getElementById('username_notice').innerHTML = msg_un_blank;
        var submit_disabled = true;
    }

    if ( !chkstr( username ) )
    {
        document.getElementById('username_notice').innerHTML = msg_un_format;
        var submit_disabled = true;
    }
    if ( unlen < 3 )
    { 
        document.getElementById('username_notice').innerHTML = username_shorter;
        var submit_disabled = true;
    }
    if ( unlen > 14 )
    {
        document.getElementById('username_notice').innerHTML = msg_un_length;
        var submit_disabled = true;
    }
    if ( submit_disabled )
    {
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
        return false;
    }
    var ajaxurl=APP+"&c=EcUser&m=index&act=is_registered";
    Ajax.call( ajaxurl, 'username=' + username, registed_callback , 'GET', 'TEXT', true, true );
}



function registed_callback(result)
{
    if ( result == "true" )
    {
        document.getElementById('username_notice').innerHTML = msg_can_rg;
        document.forms['formUser'].elements['Submit'].disabled = '';
    }
    else
    {
        document.getElementById('username_notice').innerHTML = msg_un_registered;
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
    }
}

function checkEmail(email)
{
    var submit_disabled = false;
  
    if (email == '')
    {
        document.getElementById('email_notice').innerHTML = msg_email_blank;
        submit_disabled = true;
    }
    else if (!Utils.isEmail(email))
    {
        document.getElementById('email_notice').innerHTML = msg_email_format;
        submit_disabled = true;
    }
    
    if( submit_disabled )
    {
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
        return false;
    }
    var ajaxurl=APP+"&c=EcUser&m=index&act=check_email";
    Ajax.call( ajaxurl, 'email=' + email, check_email_callback , 'GET', 'TEXT', true, true );
}

function check_email_callback(result)
{
    if ( result == 'ok' )
    {
        document.getElementById('email_notice').innerHTML = msg_can_rg;
        document.forms['formUser'].elements['Submit'].disabled = '';
    }
    else
    {
        document.getElementById('email_notice').innerHTML = msg_email_registered;
        document.forms['formUser'].elements['Submit'].disabled = 'disabled';
    }
}

/* *
 * 处理注册用户
 */
function register()
{
    var frm  = document.forms['formUser'];
    var username  = Utils.trim(frm.elements['username'].value);
    var email  = frm.elements['email'].value;
    var password  = Utils.trim(frm.elements['password'].value);
    var confirm_password = Utils.trim(frm.elements['confirm_password'].value);
    var checked_agreement = frm.elements['agreement'].checked;
    var msn = frm.elements['extend_field1'] ? Utils.trim(frm.elements['extend_field1'].value) : '';
    var qq = frm.elements['extend_field2'] ? Utils.trim(frm.elements['extend_field2'].value) : '';
    var home_phone = frm.elements['extend_field4'] ? Utils.trim(frm.elements['extend_field4'].value) : '';
    var office_phone = frm.elements['extend_field3'] ? Utils.trim(frm.elements['extend_field3'].value) : '';
    var mobile_phone = frm.elements['extend_field5'] ? Utils.trim(frm.elements['extend_field5'].value) : '';
    var passwd_answer = frm.elements['passwd_answer'] ? Utils.trim(frm.elements['passwd_answer'].value) : '';
    var sel_question =  frm.elements['sel_question'] ? Utils.trim(frm.elements['sel_question'].value) : '';
    
    
    var msg = "";
    // 检查输入
    var msg = '';
    if (username.length == 0)
    {
        msg += username_empty + '\n';
    }
    else if (username.match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
    {
        msg += username_invalid + '\n';
    }
    else if (username.length < 3)
    {
        //msg += username_shorter + '\n';
    }
    
    if (email.length == 0)
    {
        msg += email_empty + '\n';
    }
    else
    {
        if ( ! (Utils.isEmail(email)))
        {
            msg += email_invalid + '\n';
        }
    }
    if (password.length == 0)
    {
        msg += password_empty + '\n';
    }
    else if (password.length < 6)
    {
        msg += password_shorter + '\n';
    }
    if (/ /.test(password) == true)
    {
        msg += passwd_balnk + '\n';
    }
    if (confirm_password != password )
    {
        msg += confirm_password_invalid + '\n';
    }
    if(checked_agreement != true)
    {
        msg += agreement + '\n';
    }
    
    if (msn.length > 0 && (!Utils.isEmail(msn)))
    {
        msg += msn_invalid + '\n';
    }
    
    if (qq.length > 0 && (!Utils.isNumber(qq)))
    {
        msg += qq_invalid + '\n';
    }
    
    if (office_phone.length>0)
    {
        var reg = /^[\d|\-|\s]+$/;
        if (!reg.test(office_phone))
        {
            msg += office_phone_invalid + '\n';
        }
    }
    if (home_phone.length>0)
    {
        var reg = /^[\d|\-|\s]+$/;
        
        if (!reg.test(home_phone))
        {
            msg += home_phone_invalid + '\n';
        }
    }
    if (mobile_phone.length>0)
    {
        var reg = /^[\d|\-|\s]+$/;
        if (!reg.test(mobile_phone))
        {
            msg += mobile_phone_invalid + '\n';
        }
    }
    if (passwd_answer.length > 0 && sel_question == 0 || document.getElementById('passwd_quesetion') && passwd_answer.length == 0)
    {
        msg += no_select_question + '\n';
    }
    
    for (i = 4; i < frm.elements.length - 4; i++)	// 从第五项开始循环检查是否为必填项
    {
        needinput = document.getElementById(frm.elements[i].name + 'i') ? document.getElementById(frm.elements[i].name + 'i') : '';
        
        if (needinput != '' && frm.elements[i].value.length == 0)
        {
            msg += '- ' + needinput.innerHTML + msg_blank + '\n';
        }
    }
    
    if (msg.length > 0)
    {
        alert(msg);
        return false;
    }
    else
    {
        return true;
    }
}

/* *
 * 用户中心订单保存地址信息
 */
function saveOrderAddress(id)
{
    alert('user.js--saveOrderAddress');
}

/* *
 * 会员余额申请
 */
function submitSurplus()
{
    alert('user.js--submitSurplus');
}

/* *
 *  处理用户添加一个红包
 */
function addBonus()
{
    alert('user.js--addBonus');
}

/* *
 *  合并订单检查
 */
function mergeOrder()
{
    alert('user.js--mergeOrder');
}

/* *
 * 订单中的商品返回购物车
 * @param       int     orderId     订单号
 */
function returnToCart(orderId)
{
  alert('user.js--returnToCart');
}

function returnToCartResponse(result)
{
  alert('user.js--returnToCartResponse');
}

/* *
 * 检测密码强度
 * @param       string     pwd     密码
 */
function checkIntensity(pwd)
{
    var Mcolor = "#FFF",Lcolor = "#FFF",Hcolor = "#FFF";
    var m=0;

    var Modes = 0;
    for (i=0; i<pwd.length; i++)
    {
        var charType = 0;
        var t = pwd.charCodeAt(i);
        if (t>=48 && t <=57)
        {
            charType = 1;
        }
        else if (t>=65 && t <=90)
        {
            charType = 2;
        }
        else if (t>=97 && t <=122)
            charType = 4;
        else
            charType = 4;
        Modes |= charType;
    }

    for (i=0;i<4;i++)
    {
        if (Modes & 1) m++;
            Modes>>>=1;
    }

    if (pwd.length<=4)
    {
        m = 1;
    }

    switch(m)
    {
        case 1 :
            Lcolor = "2px solid red";
            Mcolor = Hcolor = "2px solid #DADADA";
            break;
        case 2 :
            Mcolor = "2px solid #f90";
            Lcolor = Hcolor = "2px solid #DADADA";
            break;
        case 3 :
            Hcolor = "2px solid #3c0";
            Lcolor = Mcolor = "2px solid #DADADA";
            break;
        case 4 :
            Hcolor = "2px solid #3c0";
            Lcolor = Mcolor = "2px solid #DADADA";
            break;
        default :
            Hcolor = Mcolor = Lcolor = "";
            break;
    }
    if (document.getElementById("pwd_lower"))
    {
        document.getElementById("pwd_lower").style.borderBottom  = Lcolor;
        document.getElementById("pwd_middle").style.borderBottom = Mcolor;
        document.getElementById("pwd_high").style.borderBottom   = Hcolor;
    }

}

function changeType(obj)
{
  alert('user.js--changeType');
}

function calResult()
{
    alert('user.js--calResult');
}
