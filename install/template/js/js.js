//点击下一步时检测
function check_dir() {
    if ($(".dir_error").length > 0) {
        alert("インストール環境を修正してください");
        return false;
    }
    return true;
}
//表单验证
function validation_input() {
    $("span").removeClass("error").hide();
    var _input = $("input[type='text']");
    _input.each(function (i) {
        var required = $(this).attr('mast_required') == 1;
        var error = $(this).attr('error');
        var value = $.trim($(this).val());
        var span = $(this).next("span");
        if (required && !value) {
            span.addClass("error").html(error).show();
        }
    })
    //验证邮箱
    var email = $.trim($("[name='EMAIL']").val());
    if(!/^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i.test(email)){
        $("[name='EMAIL']").next("span").addClass("error").show().html("メールアドレスは正しくない");
        return false;
    }
    //验证密码
    var password = $.trim($("[name='PASSWORD']").val());
    var c_password = $.trim($("[name='C_PASSWORD']").val());

    if (password != c_password) {
        $("[name='C_PASSWORD']").next("span").addClass("error").show().html("二つのパスワード不一致です");
        return false;
    }
    if ($("span.error").length > 0) {
        return false;
    }
    return true;
}
$(function () {
    $("input").blur(function () {
        validation_input();
    })
    $("a#check_config").click(function () {
        if (validation_input()) {
            $.ajax({
                url: "?step=check_connect",
                data: $("input").serialize(),
                type: "post",
                timeout: 3000,
                success: function (stat) {
                    if (stat == 1) {
                        location.href = "?step=6";
                    } else if (stat == 2) {
                        if (confirm("データベースが存在しています、元もデータを削除してインストール続きますか？")) {
                            $.ajax({
                                url: "?step=create_database",
                                data: $("input").serialize(),
                                type: "post",
                                success: function (stat) {
                                    if (stat == 1) {
                                        location.href = "?step=6";
                                    } else {
                                        alert("データベース作成失敗、MYSQL権限を確認してください");
                                    }
                                }
                            })
                        }
                    } else if(stat==3){
                    	alert("配置ファイル../data/config/db.inc.php更新失敗");
                    }else {
                        alert("DBアクセス失敗、DBユーザ名とパスワード再確認してください");
                    }
                },
                error: function () {
                    alert("DBアクセス失敗、DBユーザ名とパスワード再確認してください");
                }
            })
        }
    })
})