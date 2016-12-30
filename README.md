##这是一个功能非常非常多的cms
(里面有类似dedecms的内容管理系统，还用MVC方式完全复制ecshop的功能)


显示画面

内容管理前台画面：http://cms.metaphasedemo.com/


EC功能前台画面：http://cms.metaphasedemo.com/index.php?a=ec&c=EcIndex&m=index


管理画面登入：http://cms.metaphasedemo.com/index.php?a=Admin&c=Login&m=login

管理画面ID:test

管理画面PW：test

由于本人是在日本公司，开发系统的时候使用的日语版。请多多见谅，大家翻译软件用上吧哈哈哈

##项目安装

1.自己创建数据库（使用utf8_general_ci）

2.导入metacms.sql

3.修改程序数据库连接配置文件（\data\config\db.inc.php）里面内容应该看的懂

4.由于前段画面的导航是在管理画面设置的，所以进入EC的首页应该是错误的链接，修改方式有2中

*a.进入管理画面（内容ー＞カテゴリ管理）点击ECデモ的变更，里面有个【遷移Url】设定成http://【自己的域名】/index.php?a=ec&c=EcIndex&m=index

*b.直接访问http://【自己的域名】/index.php?a=ec&c=EcIndex&m=index

5.自己开始尝试使用吧


