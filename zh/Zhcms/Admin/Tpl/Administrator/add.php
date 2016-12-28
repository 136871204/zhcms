<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>管理者管理</title>
    <zhjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">一覧</a></li>
            <li><a href="javascript:;" class="action">新規</a></li>
        </ul>
    </div>
    <div class="title-header">情報</div>
    <form action="{|U:'add'}" method="post" class="form-inline zh-form" onsubmit="return zh_submit(this,'__CONTROL__')">
        <input type="hidden" name="admin" value="1"/>
        <table class="table1">
            <tr>
                <th class="w100">アカウント</th>
                <td>
                    <input type="text" name="username" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">所属役</th>
                <td>
                    <select name="rid">
                        <list from="$role" name="r">
                            <option value="{$r.rid}">{$r.rname}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">パスワード</th>
                <td>
                    <input type="password" name="password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">パスワード確認</th>
                <td>
                    <input type="password" name="c_password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">メールアドレス</th>
                <td>
                    <input type="text" name="email" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">ポイント</th>
                <td>
                    <input type="text" name="credits" class="w200" value="{$zh.config.init_credits}"/>
                </td>
            </tr>
            <tr>
                <th class="w100">言語</th>
                <td>
                    <select name="language">
                        <foreach from="$selectlan" value="$lanv" key="$lank" >
                            <option value="{$lank}">
                            {$lanv}
                            </option>
                        </foreach>
                    </select>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="zh-success" value="確定"/>
            <input type="button" class="zh-cancel" value="キャンセル" onclick="location.href='__CONTROL__'"/>
        </div>
    </form>
</div>
<script type="text/javascript" charset="utf-8">
	$("form").validate({
        //验证规则
        username: {
            rule: {
                required: true,
                ajax: {url: CONTROL + '&m=check_username', field: ['uid']}
            },
            error: {
                required: "アカウントを入力してください",
                ajax: 'アカウントがすでに存在している'
            }
        },
        email: {
            rule: {
                required: true,
                email: true,
                ajax: {url: CONTROL + '&m=check_email'}
            },
            error: {
                required: 'メールアドレスを入力してください',
                email: "メールアドレスが正しくない",
                ajax: 'メールアドレスはすでに存在している'
            }

        },
        password: {
            rule: {
                required: true,
                regexp: /^\w{5,}$/
            },
            error: {
                required: "パスワードを入力してください",
                regexp: "パスワードは5文字以上してください"
            }
        },
        c_password: {
            rule: {
                required: true,
                confirm: "password"
            },
            error: {
                required: "パスワード確認を入力してください",
                confirm: "二回入力したパスワード不一致です"
            }
        },
        credits: {
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "ポイントを入力してください",
                regexp: "数値を入力してください"
            }
        }
    })
</script>
</body>
</html>