-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 12 朁E28 日 10:10
-- サーバのバージョン： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `works`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_access`
--

CREATE TABLE IF NOT EXISTS `zh_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';

--
-- テーブルのデータのダンプ `zh_access`
--

INSERT INTO `zh_access` (`rid`, `nid`) VALUES
(15, 1),
(15, 2),
(15, 4),
(15, 180),
(15, 13),
(15, 184),
(15, 185),
(15, 186),
(15, 187),
(15, 5),
(15, 61),
(15, 8),
(15, 6),
(15, 9),
(15, 10),
(15, 70),
(15, 179),
(15, 15),
(15, 14),
(15, 3),
(15, 79),
(15, 69),
(15, 80),
(15, 200),
(15, 12),
(15, 16),
(15, 11),
(15, 18),
(15, 17),
(15, 19),
(15, 20),
(15, 21),
(15, 206),
(15, 207),
(15, 209),
(15, 208),
(15, 36),
(15, 37),
(15, 38),
(15, 39),
(15, 30),
(15, 34),
(15, 35),
(15, 31),
(15, 33),
(15, 32),
(15, 26),
(15, 29),
(15, 28),
(15, 27),
(15, 91),
(15, 92),
(15, 93),
(15, 94),
(15, 205),
(16, 1),
(16, 2),
(16, 4),
(16, 180),
(16, 13),
(16, 184),
(16, 185),
(16, 186),
(16, 187),
(16, 5),
(16, 61),
(16, 8),
(16, 6),
(16, 9),
(16, 10),
(16, 70),
(16, 179),
(16, 15),
(16, 14),
(16, 3),
(16, 79),
(16, 69),
(16, 80),
(16, 200),
(16, 12),
(16, 16),
(16, 11),
(16, 18),
(16, 17),
(16, 19),
(16, 20),
(16, 21),
(16, 206),
(16, 207),
(16, 209),
(16, 208),
(16, 36),
(16, 37),
(16, 38),
(16, 39),
(16, 30),
(16, 34),
(16, 35),
(16, 31),
(16, 33),
(16, 32),
(16, 26),
(16, 29),
(16, 28),
(16, 27),
(16, 91),
(16, 92),
(16, 93),
(16, 94),
(16, 205),
(17, 206),
(17, 215),
(17, 216),
(17, 223),
(17, 224),
(17, 220),
(17, 221),
(17, 222),
(17, 213),
(17, 214),
(17, 218),
(17, 219),
(17, 207),
(17, 208),
(17, 217),
(17, 212),
(17, 209),
(17, 210),
(18, 234),
(18, 235),
(18, 233),
(18, 229),
(18, 232),
(18, 231),
(18, 228),
(18, 227),
(18, 226),
(18, 225),
(18, 17),
(18, 11),
(20, 234),
(20, 233),
(20, 227),
(18, 16),
(18, 4),
(18, 2),
(18, 1),
(20, 235),
(19, 227),
(19, 233),
(19, 234),
(19, 235),
(21, 227),
(21, 233),
(21, 234),
(21, 235),
(22, 227),
(22, 233),
(22, 234),
(22, 235),
(24, 249),
(24, 236),
(24, 187),
(24, 186),
(24, 185),
(24, 184),
(24, 13),
(24, 180),
(24, 4),
(24, 2),
(24, 1),
(24, 5),
(24, 61),
(24, 8),
(24, 6),
(24, 9),
(24, 10),
(24, 70),
(24, 14),
(24, 179),
(24, 3),
(24, 15),
(24, 79),
(24, 69),
(24, 200),
(24, 12),
(24, 80),
(24, 16),
(24, 11),
(24, 17),
(24, 225),
(24, 230),
(24, 226),
(24, 19),
(24, 20),
(24, 21),
(24, 240),
(24, 30),
(24, 31),
(24, 32),
(24, 33),
(24, 34),
(24, 35),
(24, 227),
(24, 228),
(24, 232),
(24, 229),
(24, 231),
(24, 233),
(24, 234),
(24, 235),
(24, 36),
(24, 37),
(24, 38),
(24, 238),
(24, 39),
(24, 26),
(24, 29),
(24, 27),
(24, 28),
(24, 206),
(24, 207),
(24, 212),
(24, 210),
(24, 251),
(24, 208),
(24, 209),
(24, 241),
(24, 252),
(24, 254),
(24, 253),
(24, 255),
(24, 256),
(24, 239),
(24, 217),
(24, 257),
(24, 258),
(24, 223),
(24, 243),
(24, 224),
(24, 259),
(24, 260),
(24, 261),
(24, 247),
(24, 248),
(24, 250),
(24, 218),
(24, 219),
(24, 213),
(24, 237),
(24, 214),
(24, 244),
(24, 245),
(24, 246),
(24, 220),
(24, 221),
(24, 222),
(24, 91),
(24, 92),
(24, 93),
(24, 94),
(24, 211),
(25, 209),
(25, 210),
(25, 212),
(25, 207),
(25, 206),
(25, 17),
(25, 11),
(25, 16),
(25, 241),
(27, 245),
(27, 272),
(27, 270),
(27, 244),
(27, 280),
(27, 219),
(27, 218),
(27, 237),
(27, 213),
(27, 241),
(27, 209),
(27, 208),
(27, 210),
(27, 212),
(27, 207),
(27, 206),
(27, 38),
(27, 37),
(27, 36),
(27, 35),
(27, 34),
(27, 33),
(27, 32),
(27, 31),
(27, 30),
(27, 27),
(27, 28),
(27, 29),
(27, 26),
(27, 18),
(27, 17),
(27, 11),
(27, 21),
(27, 20),
(27, 19),
(27, 16),
(27, 70),
(27, 15),
(27, 14),
(27, 10),
(27, 187),
(27, 186),
(27, 185),
(27, 184),
(27, 13),
(27, 180),
(27, 4),
(27, 2),
(27, 1),
(27, 271);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ad_custom`
--

CREATE TABLE IF NOT EXISTS `zh_ad_custom` (
  `ad_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ad_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ad_name` varchar(60) DEFAULT NULL,
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext,
  `url` varchar(255) DEFAULT NULL,
  `ad_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_category`
--

CREATE TABLE IF NOT EXISTS `zh_category` (
  `cid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` mediumint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `catname` char(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `catdir` varchar(255) DEFAULT NULL,
  `cat_keyworks` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目关键字',
  `cat_description` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目描述',
  `index_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '封面模板',
  `list_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `arc_tpl` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页模板',
  `cat_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目页URL规则\n\n',
  `arc_html_url` varchar(200) NOT NULL DEFAULT '' COMMENT '内容页URL规则',
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型ID',
  `cattype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 栏目,2 封面,3 外部链接,4 单文章',
  `arc_url_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章访问方式 1 静态访问 2 动态访问',
  `cat_url_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目访问方式 1 静态访问 2 动态访问',
  `cat_redirecturl` varchar(100) NOT NULL DEFAULT '' COMMENT '跳转url',
  `catorder` smallint(5) unsigned NOT NULL DEFAULT '100' COMMENT '栏目排序',
  `cat_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'channel标签调用时是否显示',
  `cat_seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `cat_seo_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `add_reward` smallint(5) NOT NULL DEFAULT '0' COMMENT '搞稿奖励',
  `show_credits` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '查看积分',
  `repeat_charge_day` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '重复收费天数',
  `allow_user_set_credits` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许会员投稿设置积分 1 允许 0 不允许',
  `member_send_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员投稿状态 1 审核 2 未审核',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='栏目表' AUTO_INCREMENT=28 ;

--
-- テーブルのデータのダンプ `zh_category`
--

INSERT INTO `zh_category` (`cid`, `pid`, `catname`, `catdir`, `cat_keyworks`, `cat_description`, `index_tpl`, `list_tpl`, `arc_tpl`, `cat_html_url`, `arc_html_url`, `mid`, `cattype`, `arc_url_type`, `cat_url_type`, `cat_redirecturl`, `catorder`, `cat_show`, `cat_seo_title`, `cat_seo_description`, `add_reward`, `show_credits`, `repeat_charge_day`, `allow_user_set_credits`, `member_send_state`) VALUES
(27, 0, 'ニュース', 'news', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', 19, 1, 2, 2, '', 100, 1, '', '', 1, 0, 1, 1, 1),
(25, 0, 'ECデモ', 'ecdemo', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', 1, 3, 2, 2, 'http://www.metacms.com/index.php?a=ec&c=EcIndex&m=index', 2, 1, '', '', 1, 0, 1, 1, 1),
(19, 0, 'スレッド', 'thread', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', 1, 2, 2, 2, '', 1, 1, '', '', 1, 0, 1, 1, 1),
(22, 19, 'BUG報告', 'bugreport', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', 1, 1, 2, 2, '', 2, 1, '', '', 1, 0, 1, 1, 1),
(23, 19, '操作マニュアル', 'howuse', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', 1, 1, 2, 2, '', 1, 1, '', '', 1, 0, 1, 1, 1),
(24, 19, '他いろいろ', 'other', '', '', 'article_index.html', 'article_list.html', 'article_default.html', '{catdir}/{cid}{page}.html', '{catdir}/{y}/{m}{d}/{aid}.html', 1, 1, 2, 2, '', 3, 1, '', '', 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_category_access`
--

CREATE TABLE IF NOT EXISTS `zh_category_access` (
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `mid` smallint(1) NOT NULL DEFAULT '0' COMMENT '模型mid',
  `show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许访问 1 允许 0 不允许',
  `add` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许投稿(添加) 1允许 0 不允许',
  `edit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许更新 1允许 0 不允许',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许删除 1允许 0 不允许',
  `order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许排序 1允许 0 不允许',
  `move` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许移动 1允许 0 不允许',
  `audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '允许审核栏目文章 1 允许 0 不允许',
  `admin` tinyint(1) NOT NULL COMMENT '是否为管理员权限 1 管理员 2 前台用户'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目权限表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_collection_content`
--

CREATE TABLE IF NOT EXISTS `zh_collection_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nodeid` int(10) unsigned NOT NULL DEFAULT '0',
  `siteid` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` char(255) NOT NULL,
  `title` char(100) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nodeid` (`nodeid`,`siteid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- テーブルのデータのダンプ `zh_collection_content`
--

INSERT INTO `zh_collection_content` (`id`, `nodeid`, `siteid`, `status`, `url`, `title`, `data`) VALUES
(1, 5, 0, 2, 'http://job.zcool.com.cn/posts/7765.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039677'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''深圳市富途网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、  负责富途网站、专题网页、活动页面的视觉设计；2、  根据交互稿或者产品需求文档完成和改进产品视觉设计；3、  与相关部门配合，独立完成公司产品的设计及实现。4、  参与界面规范的制定与实施；'',\n  ''request'' => ''有志于UI设计，懂得互联网web视觉创作和表现，熟练PS、AI 1、  网页设计相关工作经验1年以上，具备网页设计与活动专题设计的相关经验；2、  独立创新的风格设定能力、优秀的视觉表达能力；3、  具备自己独有的设计风格，并成功运用在产品设计中；4、  有良好的图形表达能力和沟通能力，有手绘能力者优先！5、  熟练掌握Photoshop、Coreldraw、Illustrator、Flash等设计软件，其中flash强者优先；6、  了解Dreamweaver 等网页制作软件,对HTML、CSS等制作技术有一定了解；'',\n  ''department'' => '''',\n  ''work_address'' => ''广东省-深圳市-南山区'',\n  ''company_img'' => ''2016/0129/20160129115437779.jpg'',\n  ''company_simple_name'' => ''富途网络'',\n  ''company_detail_name'' => ''深圳市富途网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(2, 5, 0, 2, 'http://job.zcool.com.cn/posts/10740.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039677'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''北京奇虎科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.负责公司游戏产品的相关视觉设计工作；<br>2.参与项目创意前期视觉用户研究、设计流行趋势分析，主导设定整体视觉风格和VI设计；<br>3.负责定期分享优秀案例或设计心得。<br>'',\n  ''request'' => ''1.能独立完成平面、网站等视觉设计；<br>2.&nbsp;开过像素眼，拥有无影手，有一定设计理论知识，具有创新能力，色彩感强，对各种设计趋势有灵敏触觉和领悟能力；<br>3.有较好的沟通能力，具备团队合作精神，并富有创造力和责任感，能承受高强度的工作压力；<br>4.学历不限，无论你是潜力股还是设计大牛，我们都非常欢迎。<br>'',\n  ''department'' => ''游戏部门'',\n  ''work_address'' => ''北京市朝阳区奇虎360'',\n  ''company_img'' => ''2016/0129/20160129115437777.jpg'',\n  ''company_simple_name'' => ''奇虎360'',\n  ''company_detail_name'' => ''北京奇虎科技有限公司'',\n  ''company_home_page_url'' => ''http://www.360.cn/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.360.cn/'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '',\n)'),
(3, 5, 0, 2, 'http://job.zcool.com.cn/posts/7546.html', '', 'array (\n  ''title'' => ''设计总监'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039676'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京优艾众合创意文化传播有限公司'',\n  ''salary'' => ''25k-30k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''UIDWOKRS是一个优质年轻创意设计团队，只要你觉得自己行，没有太多限制。<br>但需要有团队管理与项目管理能力，沟通没问题。'',\n  ''request'' => ''1.把控团队的创意与创意执行。<br>2.管理设计团队。<br>3.项目的协调与沟通。<br>'',\n  ''department'' => ''创意设计'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115436110.jpg'',\n  ''company_simple_name'' => ''UID WORKS'',\n  ''company_detail_name'' => ''北京优艾众合创意文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.uidworks.com'',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => ''www.uidworks.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">uidworks</span>          	          '',\n)'),
(4, 5, 0, 2, 'http://job.zcool.com.cn/posts/18044.html', '', 'array (\n  ''title'' => ''网页设计经理'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039676'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''站酷猎头'',\n  ''salary'' => ''20k-25k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.负责网站产品的创意设计工作；<br>2.负责网站活动类系列视觉创意设计工作；<br>3.负责对外广告形象创意设计；&nbsp;<br>4.指导flash设计师完成互动类表现工作。&nbsp;<br>'',\n  ''request'' => ''1.&nbsp;教育背景：本科及以上学历，美术/设计类专业优先；<br>2.&nbsp;工作经验：设计行业工作3年以上，最好有时尚、服装类网站工作经验；<br>3.&nbsp;基础素质要求：美术基本功扎实，审美能力优秀，有创意和平面设计基础，对网页设计有一定见解和思路，善于沟通和学习；责任心强，富有团队精神，工作踏实细心。<br>4.&nbsp;专业能力要求：熟练掌握PS/AI等主流设计软件，具有独立设计能力，可以根据要求设计网页、造型、界面；具备一定的手绘能力。<br>'',\n  ''department'' => ''创意部'',\n  ''work_address'' => '''',\n  ''company_img'' => ''2016/0129/20160129115436795.png'',\n  ''company_simple_name'' => ''站酷猎头'',\n  ''company_detail_name'' => ''站酷猎头'',\n  ''company_home_page_url'' => ''http://www.zcool.com.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.zcool.com.cn'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">为企业推荐优秀的设计人才</span>          	          	<span class="label">为设计师提供优质的工作机会</span>          	          '',\n)'),
(5, 5, 0, 2, 'http://job.zcool.com.cn/posts/2463.html', '', 'array (\n  ''title'' => ''资深/中级视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039676'',\n  ''recruit_num'' => ''4名'',\n  ''company'' => ''北京深度沟通广告有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责公司重点项目和日常项目的支持；<br>2、项目提案设计、主要风格设计、项目全程设计；<br>3、部分项目全程沟通、协调，对策划、设计、制作、程序的全程负责。'',\n  ''request'' => ''1、5年以上本职位工作经验；<br>2、优异的设计创意能力及独立完成个案的能力；<br>3、优秀的人机交互思想，具有整体框架性设计思维；<br>4、有较强的创新能力，对色彩的把握独到，能把设计风格和栏目特色进行有效的结合；<br>5、善于把握客户需求，对页面设计从多层面考虑；<br>6、有一定领导能力，有对作品全程负责的态度和毅力；<br>7、良好的沟通、领悟能力，具有团队合作精神和敬业精神，能与团队其他成员进行有效沟通；<br>8、像素级精确设计。<br><br>具备以下能力者优先考虑：<br>1、具备移动平台（iPhone，Android等）设计经验；<br>2、有带队经验；<br>3、有UED团队经验。<br><br>[应聘方式]：发送简历至 hr@deeping.cn<br>邮件标题请如以下格式：【职位名称】 + 姓名 + 【站酷网】，谢谢！<br>PS：请务必在简历中附上5个主要作品，作品可以网站链接形式发送，期待您的加入！'',\n  ''department'' => ''用户体验部'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115436436.png'',\n  ''company_simple_name'' => ''DEEP深度沟通'',\n  ''company_detail_name'' => ''北京深度沟通广告有限公司'',\n  ''company_home_page_url'' => ''http://www.deeping.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.deeping.cn'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">用户体验</span>          	          	<span class="label">UCD</span>          	          	<span class="label">UE</span>          	          	<span class="label">UX</span>          	          '',\n)'),
(6, 5, 0, 2, 'http://job.zcool.com.cn/posts/13209.html', '', 'array (\n  ''title'' => ''UI设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039676'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京奇虎科技有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.为好搜（原360搜索）移动搜索及垂搜产品线服务，通过分析产品需求，提供优秀设计及创意；<br>2.负责产品界面、手机客户端界面的视觉设计及在线推广设计；<br>3.参与产品前期界面视觉用户研究、设计流行趋势分析，对网站产品进行持续视觉优化；<br>4.从全局角度把握界面美观度、色彩风格、图标、插图、产品气质品牌形象。<br>5.设定网站、手机应用及产品界面的整体视觉风格和VI设计，参与设计体验、流程的制定和规范；<br>6.分享设计经验、推动提高团队的设计能力。'',\n  ''request'' => ''1.熟练photoshop、Illustrator等相关设计软件，对网站前端技术有基本的了解。<br>2.具有专业的视觉设计能力,能阐述具有说服力的设计理论.有比较全面的设计知识。<br>3.熟悉web端、移动客户端视觉设计，擅长把握各种设计风格。<br>4.对用户体验有深刻的认识，能够针对用户体验踊跃提出自己的建议并能不断推动改进的优先。<br>5.具备良好合作态度及团队精神，并富有工作激情、创造力和责任感。'',\n  ''department'' => ''搜索事业部'',\n  ''work_address'' => ''北京市朝阳区奇虎360'',\n  ''company_img'' => ''2016/0129/20160129115436745.jpg'',\n  ''company_simple_name'' => ''奇虎360'',\n  ''company_detail_name'' => ''北京奇虎科技有限公司'',\n  ''company_home_page_url'' => ''http://www.360.cn/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.360.cn/'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '',\n)'),
(7, 5, 0, 2, 'http://job.zcool.com.cn/posts/15652.html', '', 'array (\n  ''title'' => ''广告设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039675'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''在线途游（北京）科技有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;主要负责公司效果广告投放的广告图文素材制作；<br>2.&nbsp;配合投放人员的需求制作不同风格的素材，并根据投放人员的数据反馈更换或优化素材；<br>3.&nbsp;了解最新的设计发展趋势，收集行业竞品的信息，从美术角度配合投放人员共同提高投放效果；<br>4.&nbsp;协助完成市场品牌的其它平面设计需求。'',\n  ''request'' => ''1.&nbsp;有设计经验或相关专业本科以上学历；（能力优秀者可放宽到大专学历）<br>2.&nbsp;审美观正常，有设计动手能力，色彩搭配感觉好；<br>3.&nbsp;熟练使用Photoshop、Illustrator、Flash等相关的设计软件（至少其中两种）；<br>4.&nbsp;面试需带作品或发作品链接。'',\n  ''department'' => ''美术设计部'',\n  ''work_address'' => ''北苑路'',\n  ''company_img'' => ''2016/0129/20160129115435835.png'',\n  ''company_simple_name'' => ''途游棋牌'',\n  ''company_detail_name'' => ''在线途游（北京）科技有限公司'',\n  ''company_home_page_url'' => ''http://www.tuyoo.com/'',\n  ''industry_attr'' => ''游戏'',\n  ''company_home_page_name'' => ''http://www.tuyoo.com/'',\n  ''enterprise_size'' => ''100-200人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">途游游戏</span>          	          '',\n)'),
(8, 5, 0, 2, 'http://job.zcool.com.cn/posts/18782.html', '', 'array (\n  ''title'' => ''高级视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039675'',\n  ''recruit_num'' => ''4名'',\n  ''company'' => ''北京智能管家科技有限公司'',\n  ''salary'' => ''20k-25k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''工作职责：<br>1、设计趋势分析，把控平台及平台产品的整体视觉风格和系统VI；<br>2、负责为运营活动以及日常维护提供视觉设计支持；<br>3、协同市场营销一同完成对外的品牌及产品的视觉传达设计；<br>4、参与开创性产品的定义和前期开发，完成动态演示DEMO；<br>5、管理视觉设计师团队。'',\n  ''request'' => ''职位要求：<br>1、本科或以上学历，5年及以上的视觉传达设计从业经验；<br>2、有4A广告公司从业背景优先考虑；<br>3、热爱创新性设计，执行力强，热心好学；<br>4、拥有广阔的设计视角和敏锐度更佳，如平面设计，交互设计，产品设计等；<br>5、具有分享精神，良好的沟通和团队合作能力。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''北京市朝阳区北苑路甲13号北辰泰岳11层'',\n  ''company_img'' => ''2016/0129/20160129115435843.png'',\n  ''company_simple_name'' => ''roobo'',\n  ''company_detail_name'' => ''北京智能管家科技有限公司'',\n  ''company_home_page_url'' => ''http://www.roobo.com.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.roobo.com.cn'',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">帅哥美女</span>          	          	<span class="label">优秀团队</span>          	          	<span class="label">智能硬件</span>          	          '',\n)'),
(9, 5, 0, 2, 'http://job.zcool.com.cn/posts/19138.html', '', 'array (\n  ''title'' => ''高级UI设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039675'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''柒佰（北京）科技发展有限公司'',\n  ''salary'' => ''15k-20k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责参与产品的页面设计；<br>2、根据产品特点，把控整体设计风格、交互效果，页面制作及流程完善；<br>3、为日常的运营活动及功能维护提供视觉支持和持续优化。<br>'',\n  ''request'' => ''1、美术、设计或相关专业，能够熟练使用Photoshop、Illustrator、&nbsp;Flash、Dreamweaver等软件；<br>2、从事设计行业工作3年以上，有WEB电商页面项目和移动端的设计经验；<br>3、足够的自主思维和需求把握能力。具备一定的交互知识；对产品流程、用户操作流程及用户需求有深入理解；热爱用户界面设计，对于改善用户体验有深刻认识，能够从用户体验角度来设计界面；<br>4、具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br><br>投递简历请附带作品。'',\n  ''department'' => ''数字产品部'',\n  ''work_address'' => ''北京市东城区77文化创意产业园'',\n  ''company_img'' => ''2016/0129/20160129115435464.png'',\n  ''company_simple_name'' => ''700Bike'',\n  ''company_detail_name'' => ''柒佰（北京）科技发展有限公司'',\n  ''company_home_page_url'' => ''http://www.700bike.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.700bike.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">自行车</span>          	          	<span class="label">电商</span>          	          	<span class="label">网站&APP</span>          	          	<span class="label">城市通勤</span>          	          	<span class="label">生活方式</span>          	          	<span class="label">健康潮流</span>          	          	<span class="label">简单快乐</span>          	          	<span class="label">环境Cool</span>          	          '',\n)'),
(10, 5, 0, 2, 'http://job.zcool.com.cn/posts/17353.html', '', 'array (\n  ''title'' => ''用户界面设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039674'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''站酷猎头'',\n  ''salary'' => ''15k-20k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.和产品设计师一起制订产品策略<br>2.让&nbsp;Web&nbsp;端更具视觉吸引力和更易使用<br>'',\n  ''request'' => ''1.可以为复杂的问题找到简单优雅的解决方案<br>2.设计工具的使用不会成为遏制想象力的瓶颈<br>3.了解技术的限制并能将自己的设计思路准确传递给其他人<br>4.心思细腻，迷恋细节，像素完美<br><br>'',\n  ''department'' => ''设计部'',\n  ''work_address'' => '''',\n  ''company_img'' => ''2016/0129/20160129115435824.png'',\n  ''company_simple_name'' => ''站酷猎头'',\n  ''company_detail_name'' => ''站酷猎头'',\n  ''company_home_page_url'' => ''http://www.zcool.com.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.zcool.com.cn'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">为企业推荐优秀的设计人才</span>          	          	<span class="label">为设计师提供优质的工作机会</span>          	          '',\n)'),
(11, 5, 0, 2, 'http://job.zcool.com.cn/posts/18066.html', '', 'array (\n  ''title'' => ''视觉推广设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039674'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京搜狐新媒体信息技术有限公司'',\n  ''salary'' => ''15k-20k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.负责搜狐大客户的视觉创意；配合搜狐营销体系出品视觉方案；&nbsp;<br>2.sohu&nbsp;app，手机搜狐，搜狐网广告的创新。（精通web设计，mobile&nbsp;h5设计，手绘设计，动画设计）；<br>3.能把策略型思考落地为创意作品，表现出来。&nbsp;<br><br>'',\n  ''request'' => ''1.具备优秀的设计能力，勇于创新，创意丰富；<br>2.把握互动创意和设计的前沿的趋势。具备优秀的互联网思维；<br>3.拥有良好的商业手绘功底优先，有优秀的网站作品优先；<br>4.熟练使用设计软件，Photoshop,flash,Illustrator等；<br>5.熟悉iOS和Android交互体验和UI设计规范；<br>6.具备良好合作态度及团队精神，有强烈的责任感,求完美，能够承受工作压力；<br>7.3年以上互联网，广告，互动营销行业相关工作经验。'',\n  ''department'' => ''广告营销中心'',\n  ''work_address'' => ''北京市海淀区搜狐媒体大厦'',\n  ''company_img'' => ''2016/0129/20160129115434594.jpg'',\n  ''company_simple_name'' => ''搜狐'',\n  ''company_detail_name'' => ''北京搜狐新媒体信息技术有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(12, 5, 0, 2, 'http://job.zcool.com.cn/posts/9512.html', '', 'array (\n  ''title'' => ''广告设计'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039674'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''在线途游（北京）科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;主要负责公司效果广告投放的广告图文素材制作；<br>&nbsp;<br>2.&nbsp;配合投放人员的需求制作不同风格的素材，并根据投放人员的数据反馈更换或优化<br>素材；<br>&nbsp;<br>3.&nbsp;了解最新的设计发展趋势，收集行业竞品的信息，从美术角度配合投放人员共同提<br>高投放效果；<br>&nbsp;<br>4.&nbsp;协助完成市场品牌的其它平面设计需求。'',\n  ''request'' => ''1.&nbsp;大专及以上学历，美术、艺术设计、工业设计、平面设计、广告设计等相关专业&nbsp;或<br>有1年以上相关经验；<br>&nbsp;<br>2.&nbsp;有扎实的美术功底和优秀的设计动手能力，审美观正常，色彩搭配感觉好，能够围<br>绕产品需求做出不同风格的素材；<br>&nbsp;<br>3.&nbsp;熟练使用Photoshop、Illustrator、Flash等相关的设计软件（至少其中一种）；<br>&nbsp;<br>4.&nbsp;学习能力强，乐于沟通。能够根据工作需求不断学习；<br>&nbsp;<br>5.&nbsp;做事严谨认真，对自己的工作成果负责；<br>&nbsp;<br>6.&nbsp;面试需带作品或发作品链接。'',\n  ''department'' => ''品牌市场中心'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115434173.png'',\n  ''company_simple_name'' => ''途游棋牌'',\n  ''company_detail_name'' => ''在线途游（北京）科技有限公司'',\n  ''company_home_page_url'' => ''http://www.tuyoo.com/'',\n  ''industry_attr'' => ''游戏'',\n  ''company_home_page_name'' => ''http://www.tuyoo.com/'',\n  ''enterprise_size'' => ''100-200人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">途游游戏</span>          	          '',\n)'),
(13, 5, 0, 2, 'http://job.zcool.com.cn/posts/19137.html', '', 'array (\n  ''title'' => ''UI设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039674'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''柒佰（北京）科技发展有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责参与产品的页面设计；<br>2、根据产品特点，把控整体设计风格、交互效果，页面制作及流程完善；<br>3、为日常的运营活动及功能维护提供视觉支持和持续优化。'',\n  ''request'' => ''1、美术、设计或相关专业，能够熟练使用Photoshop、Illustrator、&nbsp;Flash、Dreamweaver等软件；<br>2、从事设计行业工作1年以上，有WEB电商页面项目和移动端的设计经验；<br>3、足够的自主思维和需求把握能力。具备一定的交互知识；对产品流程、用户操作流程及用户需求有深入理解；热爱用户界面设计，对于改善用户体验有深刻认识，能够从用户体验角度来设计界面；<br>4、具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br><br>投递简历请附带作品。'',\n  ''department'' => ''数字产品部'',\n  ''work_address'' => ''北京市东城区77文化创意产业园'',\n  ''company_img'' => ''2016/0129/20160129115434329.png'',\n  ''company_simple_name'' => ''700Bike'',\n  ''company_detail_name'' => ''柒佰（北京）科技发展有限公司'',\n  ''company_home_page_url'' => ''http://www.700bike.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.700bike.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">自行车</span>          	          	<span class="label">电商</span>          	          	<span class="label">网站&APP</span>          	          	<span class="label">城市通勤</span>          	          	<span class="label">生活方式</span>          	          	<span class="label">健康潮流</span>          	          	<span class="label">简单快乐</span>          	          	<span class="label">环境Cool</span>          	          '',\n)'),
(14, 5, 0, 2, 'http://job.zcool.com.cn/posts/9461.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039673'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''一加三餐（上海）电子商务有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、独立负责天猫店铺的装修设计、活动促销页面等等<br>2、负责公司商品的图片的处理<br>3、商品描述模板设计以及信息上架<br>4、独立电子商务网站图片的设计<br><br>'',\n  ''request'' => ''1、有着优秀的独力设计能力，熟练运用photoshop，懂Dreamweaver等设计软件先考虑。<br>2、有着非常好的审美意识，具有良好的版式设计和整体布局感觉先。<br>3、有着非常好的创意和想法，并且可以把想法转化为图像。<br>4、讲求实效，有强烈的责任感，能用心深入细节，追求完美，能够承受工作压力。<br>5、一年以上相关工作经验。<br>'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层'',\n  ''company_img'' => ''2016/0129/20160129115434142.png'',\n  ''company_simple_name'' => ''一加三餐'',\n  ''company_detail_name'' => ''一加三餐（上海）电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.ecmoho.com'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.ecmoho.com'',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '',\n)'),
(15, 5, 0, 2, 'http://job.zcool.com.cn/posts/17663.html', '', 'array (\n  ''title'' => ''资深时尚网页设计'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039673'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''北京创锐文化传媒有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.负责公司自营服装业务的创意设计工作；<br>2.负责网站活动类系列视觉创意设计工作；<br>3.负责对外广告形象创意设计；&nbsp;<br>4.指导并协助flash设计师完成互动类表现工作。&nbsp;&nbsp;<br>'',\n  ''request'' => ''1.&nbsp;教育背景：本科及以上学历，美术/设计类专业优先；<br>2.&nbsp;工作经验：设计行业工作3年以上，有时尚、服装类网站工作经验；<br>3.&nbsp;基础素质要求：美术基本功扎实，审美能力优秀，有创意和平面设计基础，对网页设计有一定见解和思路，善于沟通和学习；责任心强，富有团队精神，工作踏实细心。<br>4.&nbsp;专业能力要求：熟练掌握PS/AI等主流设计软件，具有独立设计能力，可以根据要求设计网页、造型、界面；具备一定的手绘能力。'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''东四十条A口，中汇广场B座20层'',\n  ''company_img'' => ''2016/0129/20160129115433430.png'',\n  ''company_simple_name'' => ''聚美优品'',\n  ''company_detail_name'' => ''北京创锐文化传媒有限公司'',\n  ''company_home_page_url'' => ''http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq'',\n  ''enterprise_size'' => ''500-1000人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(16, 5, 0, 2, 'http://job.zcool.com.cn/posts/19531.html', '', 'array (\n  ''title'' => ''网页设计师偏运营类'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039673'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海春迪网络科技有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''设计，拍摄产品推广图片。'',\n  ''request'' => ''1、三年以上平面设计相关工作经验，有运营经验优先，有丰富的品牌、宣传品、推广活动、包装等方面的设计经验&nbsp;<br>2、扎实的美术功底及整体色彩，布局把握能力，视觉美感及创意构思能力；熟练使用photoshop，illustrator等绘图软件及dreamwear等平面设计软件&nbsp;<br>3、熟练使用日常办公软件&nbsp;<br>4、创意构思能力；表达沟通能力&nbsp;<br>5、注重细节，能接受创业企业，对未来拥有梦想并拥有高度责任感，能承受一定的加班和工作压力'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市黄浦区淮海中华大厦'',\n  ''company_img'' => ''2016/0129/20160129115433386.png'',\n  ''company_simple_name'' => ''发条科技'',\n  ''company_detail_name'' => ''上海春迪网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">微信</span>          	          	<span class="label">互联网</span>          	          '',\n)'),
(17, 5, 0, 2, 'http://job.zcool.com.cn/posts/8087.html', '', 'array (\n  ''title'' => ''Web前端开发'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039673'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海莫凡信息技术有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责将设计师设计的PSD稿子生成HTML代码，并实现相应的交互效果;2、根据客户需求制作相应的HTML代码；'',\n  ''request'' => ''1、精通DIV+CSS，熟悉Javascript。2、了解浏览器对前端代码的兼容性，能够撰写兼容多浏览器的前端代码；3、熟悉Web前端制作的流程和规范，1年或以上的工作经验；4、了解PHP程序开发者优先考虑；5、良好的沟通能力，有团队协作精神、踏实上进者优化考虑。'',\n  ''department'' => '''',\n  ''work_address'' => ''上海市-黄浦区'',\n  ''company_img'' => ''2016/0129/20160129115433845.jpg'',\n  ''company_simple_name'' => ''MoreFun莫凡'',\n  ''company_detail_name'' => ''上海莫凡信息技术有限公司'',\n  ''company_home_page_url'' => ''http://www.morefun.me'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.morefun.me'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '',\n)'),
(18, 5, 0, 2, 'http://job.zcool.com.cn/posts/7466.html', '', 'array (\n  ''title'' => ''前端开发工程师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039672'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海奕尚网络信息有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、较强的责任心和耐心，良好的团队合作意识，性格踏实稳重，能承受高强度的工作压力；<br>2、有手机端开发经验者优先考虑；<br>3、熟悉W3C标准，精通WEB前端HTML5/XHTML/HTML/CSS/JavaScript等主流技术；<br>4、能熟练手工编写HTML5及DIV+CSS代码，并对各种常用浏览器做到良好兼容，确保网页可以跨平台跨浏览器运行（PC及移动端）；<br>'',\n  ''request'' => ''<br>1、熟练运用常见AJAX框架，熟悉Javascript，&nbsp;掌握一些常用JS库，如JQuery；<br>2、能熟练使用Photoshop,Dreamweaver等软件。<br><br>欢迎加入我们脑洞大开欢乐和谐的设计师大家庭，we&nbsp;need&nbsp;u!&nbsp;'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市-长宁区'',\n  ''company_img'' => ''2016/0129/20160129115433978.jpg'',\n  ''company_simple_name'' => ''奕尚网络'',\n  ''company_detail_name'' => ''上海奕尚网络信息有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '',\n)'),
(19, 5, 0, 2, 'http://job.zcool.com.cn/posts/15267.html', '', 'array (\n  ''title'' => ''美工'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039672'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京动乐网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责公司网站设计装修、新品详情页设计及图片处理上传、设计制作、逐步形成品牌风格；<br>2、根据品牌活动完成活动促销页面设计；<br>3、负责网站相关活动的策划、专题页面的设计等；<br>4、领导临时安排的其它工作<br>'',\n  ''request'' => ''1、熟练使用Photoshop、AI、Dreamweaver、IIIustrator、HTML语言等相关设计软件，对图片渲染和视觉效果有较好的把控和认识；<br>2、具有２年以上的网页设计工作经验；本科及以上学历<br>3、具有良好的网店设计能力，较强的创意、策划能力，良好的文字表达能力；<br>4、工作认真、有责任心、踏实肯干，富有团队精神<br>'',\n  ''department'' => ''电商运营部'',\n  ''work_address'' => ''北京市朝阳区酒仙桥10号恒通国际商务园B12C三层'',\n  ''company_img'' => ''2016/0129/20160129115432931.png'',\n  ''company_simple_name'' => ''动乐网'',\n  ''company_detail_name'' => ''北京动乐网络科技有限公司'',\n  ''company_home_page_url'' => ''http://www.51dongle.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.51dongle.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '',\n)'),
(20, 5, 0, 2, 'http://job.zcool.com.cn/posts/8591.html', '', 'array (\n  ''title'' => ''WEB前端工程师--H5'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039672'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''辉塔信息技术咨询（上海）有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责将网页效果图切成HTML代码；<br>2、网站前端页面制作、优化，以及JS互动效果实现；<br>3、能够不断的对前端代码进行优化，使网站符合SEO的要求；<br>4、调试网站页面在不同浏览器下的兼容性；<br>5、调试手机端页面在有不同手机终端下的兼容性；<br>6、负责与设计人员和开发人员的沟通。<br>'',\n  ''request'' => ''1、精通DIV+CSS流动布局的HTML代码编写，熟练手写标准WEB页面符合W3C标准；熟练使用常规网站制作软件；<br>2、精通JavaScript开发,能够熟练的使用JavaScript进行面向对象编程；<br>3、熟悉调整各种跨浏览器兼容性技术；<br>4、熟悉手机端html5页面开发；<br>5、具备较强的快速学习能力，独立解决问题能力和抗压能力；<br>'',\n  ''department'' => ''技术部'',\n  ''work_address'' => ''上海市-浦东新区'',\n  ''company_img'' => ''2016/0129/20160129115432837.jpg'',\n  ''company_simple_name'' => ''faceui'',\n  ''company_detail_name'' => ''辉塔信息技术咨询（上海）有限公司'',\n  ''company_home_page_url'' => ''http://www.faceui.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.faceui.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">交通补助</span>          	          '',\n)'),
(21, 5, 0, 2, 'http://job.zcool.com.cn/posts/4416.html', '', 'array (\n  ''title'' => ''高级网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039672'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京凯罗天下科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;负责萝卜品牌（luobo.cn）WEB端/移动端官网设计重构及长期维护；<br>2.&nbsp;负责萝卜相关子站点及H5的设计。'',\n  ''request'' => ''1.&nbsp;3年以上网页/移动站点设计经验；<br>2.&nbsp;优秀的平面美术功底及审美能力；<br>3.&nbsp;熟悉目前主流网页设计风格，对网页设计有独到理解；<br>4.&nbsp;应聘时请附个人作品。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''建外SOHO东区9号楼'',\n  ''company_img'' => ''2016/0129/20160129115432579.png'',\n  ''company_simple_name'' => ''飞鱼科技'',\n  ''company_detail_name'' => ''北京凯罗天下科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''游戏'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(22, 5, 0, 2, 'http://job.zcool.com.cn/posts/14339.html', '', 'array (\n  ''title'' => ''文案策划'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039672'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''上海博广广告传媒有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、抓取社会化媒体、事件、话题等进行网络活动策划；&lt;br&gt;2、配合部门同事指定执行计划，完善细化文案创意，完成从概念到创意到执行的具体工作； &lt;br&gt;3、负责整体创意文案撰写工作，含微博及微信内容、论坛软文、新闻公关稿等；&lt;br&gt;4、配合部门同事完成内容资料及数据搜集、提炼、整合。'',\n  ''request'' => ''喜思考，不封闭，手快，爱沟通，会取经，实习生也欢迎&lt;br&gt; 1、是不是圈内人，是不是科班出身，是男是女，都无关紧要。只要你本身热爱互联网，关注八卦时事，即能上知乎、网易和大神胡扯，也能静下心来做140个字的“微博控”。&lt;br&gt;2、对某一个领域，如体育、金融、IT等专精，或其他相关杂业“游戏、八卦、明星”等深入了解。&lt;br&gt;3、手快，活好，头脑转得动，资深网虫+创造思维，有情趣更佳。'',\n  ''department'' => ''策划部'',\n  ''work_address'' => ''上海市闸北区108创意广场金座716-717室'',\n  ''company_img'' => ''2016/0129/20160129115432658.png'',\n  ''company_simple_name'' => ''博广传媒'',\n  ''company_detail_name'' => ''上海博广广告传媒有限公司'',\n  ''company_home_page_url'' => ''http://www.boguang001.com/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.boguang001.com/'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '',\n)'),
(23, 5, 0, 2, 'http://job.zcool.com.cn/posts/11626.html', '', 'array (\n  ''title'' => ''unity3d游戏主美'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039671'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''在线途游（北京）科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责：<br>1、负责UI、场景、原画、特效的总体风格设计，并对团队成员的工作进行指导和约束；<br>2、分解和管理美术资源数量、质量和速度，管理和统筹外包资源完成情况； <br>3、与策划、技术团队沟通合作，从美术角度给整个项目提出建议。<br>'',\n  ''request'' => ''任职要求：<br>1、大学专科及以上学历，美术或动画专业毕业；3年以上游戏美术设计经验，熟悉游戏美术设计管理流程 ；<br>2、熟悉各类型游戏，对游戏品质和美术表现方式有自己的见解和看法；<br>3、熟练掌握各种美术制作软件，能够独立担当设计任务；<br>4、具有团队合作精神，富于创造力，良好的理解力，流畅的沟通能力，能够承受工作压力；<br>5、有unity引擎制作经验者优先，曾经在网游公司担任主美职位者优先；<br>6、简历中需要附带能够体现该岗位能力的作品。'',\n  ''department'' => ''美术'',\n  ''work_address'' => ''北京市朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115431440.png'',\n  ''company_simple_name'' => ''途游棋牌'',\n  ''company_detail_name'' => ''在线途游（北京）科技有限公司'',\n  ''company_home_page_url'' => ''http://www.tuyoo.com/'',\n  ''industry_attr'' => ''游戏'',\n  ''company_home_page_name'' => ''http://www.tuyoo.com/'',\n  ''enterprise_size'' => ''100-200人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">途游游戏</span>          	          '',\n)'),
(24, 5, 0, 2, 'http://job.zcool.com.cn/posts/12845.html', '', 'array (\n  ''title'' => ''创意周边设计策划'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039671'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''成都超有爱科技有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''成都 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''百词斩周边产品策划<br><br>如果你是一枚种草小能手，总是能安利身边的朋友各种有趣，好玩，漂亮的产品<br>如果你是资深剁手族，国内外有什么设计师品牌，各种小众大众品牌都很熟悉<br>如果你觉得像line那样的周边产品萌萌哒<br>如果你热爱日本的周边文化<br>如果你总是觉得很多品牌的产品要么设计low，要么质量差，要么.......<br>如果你认为你总是有很多想法，想要把他们实践出来，想要设计出让朋友们都觉得为你而骄傲的产品<br><br><br>那么这个职位就简直就是为你量身定做了！<br><br>在这里，你会为百词斩策划周边产品，并与设计师合作将产品设计—&gt;生产—&gt;上架<br>在这里，可以满足你天马行空的想法，并且看到你的idea被很多百词斩的用户喜欢和欣赏<br>在这里，我们会提供让你的朋友们都觉得：“哇，不错哦。”的薪资与工作环境<br>'',\n  ''request'' => ''工作内容：<br>1．收集广泛的国内外各种创意类产品的信息和动态，了解目标产品的功能和特性，评估与分析其市场潜力。<br>2．定期将收集的产品进行分类、筛选和询价，形成产品备选池。<br>3.&nbsp;为百词斩做周边产品策划，并与设计合作将产品商品化。<br>4．为产品寻找OEM代工厂并跟进生产和质检。<br>喜闻乐见的加分条件：开过淘宝小C店，或经营过任何线上平台网店，或线下实体店。'',\n  ''department'' => ''运营部门'',\n  ''work_address'' => ''成都市武侯区天府软件园e区'',\n  ''company_img'' => ''2016/0129/20160129115431429.png'',\n  ''company_simple_name'' => ''百词斩'',\n  ''company_detail_name'' => ''成都超有爱科技有限公司'',\n  ''company_home_page_url'' => ''http://www.baicizhan.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.baicizhan.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">Mac</span>          	          	<span class="label">期权诱惑</span>          	          	<span class="label">税后薪资</span>          	          	<span class="label">可口饭菜</span>          	          	<span class="label">不加班</span>          	          	<span class="label">健身年卡</span>          	          '',\n)');
INSERT INTO `zh_collection_content` (`id`, `nodeid`, `siteid`, `status`, `url`, `title`, `data`) VALUES
(25, 5, 0, 2, 'http://job.zcool.com.cn/posts/20008.html', '', 'array (\n  ''title'' => ''平面设计主管'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039671'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海马克华菲电子商务有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责：<br>1、负责马克华菲品牌所有线上平台(天猫、京东、一号店、优购、唯品会等)的整体形象设计，把握线上渠道整体风格和视觉呈现，全面提升整体视觉效果<br>2、管理设计团队，与运营部，策划部，视觉部密切配合，根据公司的营销活动方案完成天猫旗舰店及其他平台的大型活动、店铺活动的主题页面设计和广告图片的设计任务<br>3、监控天猫、京东、一号店、优购、唯品会等活动页面效果并优化用户体验<br>4、负责大型设计项目和外界供应商的对接工作<br>'',\n  ''request'' => ''任职资格：<br>1、美术、设计或相关专业大专以上学历，有扎实的美术功底<br>2、3年以上平面设计、网页设计工作经验，有电商平台设计经验，服装或时尚行业工作经验优先<br>3、有敏锐的时尚触觉，较强的色彩搭配能力及审美观念<br>4、精通Photoshop、Illustrator&nbsp;、Dreamweaver等设计软件，丰富的平面设计经验<br>5、具备良好团队管理能力，并富有工作激情、创新欲望和责任感，并能推动团队的设计能力<br>'',\n  ''department'' => ''电商事业部'',\n  ''work_address'' => ''上海市徐汇区龙漕路-地铁站'',\n  ''company_img'' => ''2016/0129/20160129115431347.png'',\n  ''company_simple_name'' => ''马克华菲'',\n  ''company_detail_name'' => ''上海马克华菲电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.markfairwhale.com'',\n  ''industry_attr'' => ''其他'',\n  ''company_home_page_name'' => ''www.markfairwhale.com'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">时尚</span>          	          	<span class="label">服装</span>          	          	<span class="label">潮人</span>          	          	<span class="label">幸福</span>          	          '',\n)'),
(26, 5, 0, 2, 'http://job.zcool.com.cn/posts/14959.html', '', 'array (\n  ''title'' => ''助理Web设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039671'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海铭塔飞信息技术有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''助理设计师通过工作提升自身WEB设计实力。<br>同时需要协助设计师进行WEB设计工作并且完成工作任务。'',\n  ''request'' => ''年龄要求：20-30岁<br>学历要求：大专以上<br><br>对Web网站设计有极深的兴趣、Web以外（纸媒体、包装，广告等）有经验者。<br>Photoshop使用经验者。<br>在设计公司有工作经验者优先。<br><br>无工作经验者也没有关系，注重个人综合素质和设计潜力，公司愿意通过实际的案例训练培养与其共同成长。<br><br>补充：具有实际相关工作经验者，请注明本人作品的URL地址。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市长宁区延安西路-地铁站'',\n  ''company_img'' => ''2016/0129/20160129115431561.jpg'',\n  ''company_simple_name'' => ''Metaphase'',\n  ''company_detail_name'' => ''上海铭塔飞信息技术有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(27, 5, 0, 2, 'http://job.zcool.com.cn/posts/8636.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039670'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海凯淳实业有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责：<br>1.负责天猫旗舰店网站的设计、改版；&nbsp;<br>2.负责旗舰店产品的界面设计，制定相关产品的设计规范；&nbsp;<br>3.负责线上推广活动相关的视觉设计和前端实现，包括EDM、页面、专题、Banner等；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。'',\n  ''request'' => ''任职资格：<br>1、有较强的美术功底和出色的网页平面设计审美功力；&nbsp;<br>2、能够熟练使用Dreamweaver、Flash、Fireworks、Photoshop等设计工具；&nbsp;<br>3、能独立策划、设计、制作高品位的网页；&nbsp;<br>4、了解网页制作技术如javascript、HTML、CSS等编程语言；&nbsp;<br>5、善于沟通，具有良好的职业素质和团队合作精神，并能与项目开发人员合作完成项目。'',\n  ''department'' => ''Creative'',\n  ''work_address'' => ''上海市-徐汇区'',\n  ''company_img'' => ''2016/0129/20160129115430445.jpg'',\n  ''company_simple_name'' => ''凯淳实业'',\n  ''company_detail_name'' => ''上海凯淳实业有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '',\n)'),
(28, 5, 0, 2, 'http://job.zcool.com.cn/posts/8161.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039670'',\n  ''recruit_num'' => ''8名'',\n  ''company'' => ''上海友尊文化传播有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;负责网站前端页面（包括PC端与移动端）的创意与设计；<br>2.负责完善网站推广页面及维护；<br>3.熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4.了解Dreamweaver&nbsp;等网页制作软件,对HTML、CSS等制作技术有一定了解；<br>'',\n  ''request'' => ''1、网页设计相关工作经验1年以上，具备网页设计与活动专题设计的相关经验；有较强的网站设计能力，有门户网站设计经验，有较强的美术功底；（如无经验者大学毕业生，需提交优秀作品）<br>2、独立创新的风格设定能力、优秀的视觉表达能力；<br>3、具备自己独有的设计风格，并成功运用在产品设计中；<br>4、良好的团队合作精神，待人热忱，思维敏捷，良好的人际沟通能力，责任心强；<br>5、有很好的自学能力和上进心，能把握最新的设计趋势。<br>UIMIX感谢设计师小主、贵人们的投递：<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;丰厚项目季度奖以及超级棒棒哒年终奖&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！）<br>公司网址：www.uimix.com<br>（备注：薪资待遇根据能力定义，以上只是大框架，能者多酬劳！）<br>'',\n  ''department'' => ''设计组'',\n  ''work_address'' => ''上海市-宝山区'',\n  ''company_img'' => ''2016/0129/20160129115430314.jpg'',\n  ''company_simple_name'' => ''uimix'',\n  ''company_detail_name'' => ''上海友尊文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.uimix.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.uimix.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '',\n)'),
(29, 5, 0, 2, 'http://job.zcool.com.cn/posts/8596.html', '', 'array (\n  ''title'' => ''WEB前端工程师--H5'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039670'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''辉塔信息技术咨询（上海）有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责将网页效果图切成HTML代码；&nbsp;<br>2、网站前端页面制作、优化，以及JS互动效果实现；&nbsp;<br>3、能够不断的对前端代码进行优化，使网站符合SEO的要求；&nbsp;<br>4、调试网站页面在不同浏览器下的兼容性；&nbsp;<br>5、调试手机端页面在有不同手机终端下的兼容性；&nbsp;<br>6、负责与设计人员和开发人员的沟通。&nbsp;'',\n  ''request'' => ''1、精通DIV+CSS流动布局的HTML代码编写，熟练手写标准WEB页面符合W3C标准；熟练使用常规网站制作软件；&nbsp;<br>2、精通JavaScript开发,能够熟练的使用JavaScript进行面向对象编程；&nbsp;<br>3、熟悉调整各种跨浏览器兼容性技术；&nbsp;<br>4、熟悉手机端html5页面开发；&nbsp;<br>5、具备较强的快速学习能力，独立解决问题能力和抗压能力；&nbsp;'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115430514.jpg'',\n  ''company_simple_name'' => ''faceui'',\n  ''company_detail_name'' => ''辉塔信息技术咨询（上海）有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(30, 5, 0, 2, 'http://job.zcool.com.cn/posts/8731.html', '', 'array (\n  ''title'' => ''项目经理'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039670'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''北京博特创想文化有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、建立并维护新老客户关系，为企业树立良好的口碑；&nbsp;<br>2、在项目进展中，能与客户、设计团队进行双向沟通并有很好的项目协调能力；&nbsp;<br>3、会制作完美的PPT，把公司开发的产品及时准确的传达到客户手中；&nbsp;<br>4、新老客户的开发及跟踪回访；&nbsp;<br>5、负责公司产品的后期印刷、加工、发货等事宜。<br>'',\n  ''request'' => ''职位要求：<br>1、有两年及以上广告、传媒、设计公司的工作经验；&nbsp;<br>1、具有优秀的语言表达能力、商务谈判能力及项目提案能力；&nbsp;<br>2、有强烈的进取心，头脑清晰、反应机敏，具有良好的职业素养和职业道德；&nbsp;<br>3、有良好的团队意识、协调能力和合作能力；&nbsp;<br>'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''北京市-西城区'',\n  ''company_img'' => ''2016/0129/20160129115430716.jpg'',\n  ''company_simple_name'' => ''博特创想'',\n  ''company_detail_name'' => ''北京博特创想文化有限公司'',\n  ''company_home_page_url'' => ''http://www.besthinking.com.cn'',\n  ''industry_attr'' => ''艺术/文化传播'',\n  ''company_home_page_name'' => ''www.besthinking.com.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">错峰上班不打卡</span>          	          	<span class="label">加班包餐包打车</span>          	          	<span class="label">带薪旅游</span>          	          	<span class="label">每天下午茶</span>          	          '',\n)'),
(31, 5, 0, 2, 'http://job.zcool.com.cn/posts/16560.html', '', 'array (\n  ''title'' => ''网页设计/美工'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039669'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京动乐网络科技有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责页面广告图设计，有独立完成整个广告设计的工作能力；<br><br>2、&nbsp;独立完成海报、logo及网页的设计制作上传；<br><br>3、了解CSS+Html页面制作流程及基础代码；<br><br>4、逻辑思维清晰，做事认真、细致，表达能力强，具备良好的工作习惯<br>'',\n  ''request'' => ''1、&nbsp;精通&nbsp;Photoshop、Dreamweaer、Illustrator、sketch等；<br>2、熟悉&nbsp;Html、css&nbsp;,会切图；<br>3、有较强的平面设计感觉及良好的美术基础；<br>4、有良好的学习能力、沟通能力和领悟能力，能够承受较大的工作压力；<br>5、有良好的团队合作意识，耐心、诚恳，有强烈的责任心和积极主动的工作态度；<br>6、2年以上网站设计相关经验，熟悉网站建设流程；<br>7、有Wap端、H5设计经验者优先。简历需附带个人作品或作品链接<br>'',\n  ''department'' => ''平台事业部'',\n  ''work_address'' => ''北京市朝阳区酒仙桥10号恒通国际商务园B12C三层'',\n  ''company_img'' => ''2016/0129/20160129115429189.png'',\n  ''company_simple_name'' => ''动乐网'',\n  ''company_detail_name'' => ''北京动乐网络科技有限公司'',\n  ''company_home_page_url'' => ''http://www.51dongle.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.51dongle.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '',\n)'),
(32, 5, 0, 2, 'http://job.zcool.com.cn/posts/17092.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039669'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''北京创锐文化传媒有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;负责网站产品及活动类系列视觉创意设计工作；<br>2.&nbsp;负责对外广告形象创意设计；&nbsp;<br>'',\n  ''request'' => ''1.本科及以上学历，设计类相关专业；&nbsp;<br>2.有1年以上相关工作经验；&nbsp;<br>3.擅长视觉设计和创意表现类的工作；&nbsp;<br>3.掌握各种视觉设计软件，并精通至少2种；<br>4.习惯先动脑，后动手,&nbsp;有较强执行能力；&nbsp;<br>备注：投递简历时请附带个人作品&nbsp;，谢谢'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''东四十条A口，中汇广场B座20层'',\n  ''company_img'' => ''2016/0129/20160129115429295.png'',\n  ''company_simple_name'' => ''聚美优品'',\n  ''company_detail_name'' => ''北京创锐文化传媒有限公司'',\n  ''company_home_page_url'' => ''http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq'',\n  ''enterprise_size'' => ''500-1000人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(33, 5, 0, 2, 'http://job.zcool.com.cn/posts/7500.html', '', 'array (\n  ''title'' => ''视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039669'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京站酷网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''	我们是小团队作战，所以需要各种多面手<br>	你或能独立完成产品界面设计(Web、APP)<br>	你或能独立完成线上活动专题设计<br>	你或能独立完成平面相关设计(平面物料和站酷周边)<br>	并能帮助团队完成日常运营设计(在线广告和小活动)<br>'',\n  ''request'' => ''	热爱站酷，适应力强，具备良好的团队合作精神，能承受工作压力<br>	良好的手绘创作能力，发达的视觉细胞<br>	界面设计、网页设计、平面设计、相关专业优先<br>	熟练使用各种设计工具(PS、AI)<br>'',\n  ''department'' => ''用户体验中心'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115429995.jpg'',\n  ''company_simple_name'' => ''站酷网'',\n  ''company_detail_name'' => ''北京站酷网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(34, 5, 0, 2, 'http://job.zcool.com.cn/posts/14367.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039668'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''上海磐特文化传播有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''品牌类、产品类、活动类、电商类网站页面设计；<br>电脑端和手机端网站前端页面设计；<br>APP和交互多媒体界面设计；<br>制作html页面，切片，和程序员对接；<br>维护更新网站内容；<br>面试请带好相关作品。'',\n  ''request'' => ''工作经验：同等岗位工作，1年以上<br>专业要求：多媒体设计、艺术设计、装潢设计、平面设计、计算机开发<br><br>整体要求：<br><br>有成熟的商业作品，包含但不限于平面设计（vi、平面排版、主视觉类）或者网站设计（网站、app软件、游戏），丰富的设计素材库，创意和动手设计能力强,良好团队合作能力,吃苦耐劳,具备良好的艺术鉴赏度和时尚敏锐度<br><br>技能要求：<br><br>熟练使用平面设计软件(PS,AI),掌握网页设计软件(Dreamweaver)、网页动画软件（flash）、非编类软件（AE,PM）<br>'',\n  ''department'' => ''数字广告部'',\n  ''work_address'' => ''上海市徐汇区田林路192号华鑫科技园101室'',\n  ''company_img'' => ''2016/0129/20160129115429700.png'',\n  ''company_simple_name'' => ''美腾库博'',\n  ''company_detail_name'' => ''上海磐特文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.exmatecube.com '',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.exmatecube.com '',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">创意设计</span>          	          	<span class="label">数字广告</span>          	          	<span class="label">涨工资快</span>          	          	<span class="label">有高手带</span>          	          	<span class="label">老板幽默</span>          	          	<span class="label">气氛轻松</span>          	          	<span class="label">交通方便</span>          	          	<span class="label">团队旅游</span>          	          	<span class="label">可午睡</span>          	          '',\n)'),
(35, 5, 0, 2, 'http://job.zcool.com.cn/posts/14957.html', '', 'array (\n  ''title'' => ''天猫美工/网页设计'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039668'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''百互润贸易（上海）有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责天猫商城店铺的设计装修、负责店铺的整体形象、首页、产品展示页面等模块的美工设计；<br>2、负责对上架产品进行排版、优化店内宝贝描述、美化产品图片等；<br>3、定期更新设计店铺促销图片及页面。同时配合促销活动，调整及修改产品页面及店铺主页更新 ；<br>4、店铺的日常维护及其他设计调整；<br>5、图片尺寸调整、实物修片等美工；'',\n  ''request'' => ''1、美术、平面设计等相关专业，专科以上学历；<br>2、熟悉天猫商城店铺的设计装修流程、熟悉店铺的整体形象、首页、产品展示页面等模块的美工设计；<br>3、熟悉店铺上下架流程，对上架产品进行排版、优化店内宝贝描述、美化产品图片等熟练掌握 ；<br>4、精通设计软件Photoshop、Illustrator等，熟悉Dreamweaver、HTML等网页及图形制作软件；<br>5、有良好的沟通及策略理解能力、极强的责任性和独立完成工作的能力；<br>6、有化妆品电子商务美工、网页设计或平面设计工作经验优先 ；<br>面试时请提供设计作品。'',\n  ''department'' => ''皮肤美容事业部'',\n  ''work_address'' => ''上海市静安区东方众鑫大厦'',\n  ''company_img'' => ''2016/0129/20160129115428262.jpg'',\n  ''company_simple_name'' => ''百润'',\n  ''company_detail_name'' => ''百互润贸易（上海）有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''外商独资'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(36, 5, 0, 2, 'http://job.zcool.com.cn/posts/2502.html', '', 'array (\n  ''title'' => ''客户服务/AE'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039668'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''光合线（北京）广告策划有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''你是公司与客户的桥梁。'',\n  ''request'' => ''1、性格开朗大方；<br>2、有正规广告公司AE工作经验；<br>2、优秀的理解和沟通能力；<br>4、团队意识强，服务过地产客户者优先。'',\n  ''department'' => ''客户'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115428627.jpg'',\n  ''company_simple_name'' => ''光合线广告'',\n  ''company_detail_name'' => ''光合线（北京）广告策划有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(37, 5, 0, 2, 'http://job.zcool.com.cn/posts/9447.html', '', 'array (\n  ''title'' => ''视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039668'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''深圳市青木文化传播有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''视觉传达'',\n  ''request'' => ''1. 2年以上视觉设计相关工作经验； 2. 熟练操作Photoshop、Illustrator、3d软件、手绘能力、优先考虑；3. 良好的沟通能力，积极主动，对工作富有高度的热情及耐心； 4. 有较强的抗压能力。'',\n  ''department'' => '''',\n  ''work_address'' => ''广东省-深圳市-南山区'',\n  ''company_img'' => ''2016/0129/20160129115428356.jpg'',\n  ''company_simple_name'' => ''treedom'',\n  ''company_detail_name'' => ''深圳市青木文化传播有限公司'',\n  ''company_home_page_url'' => ''http://treedom.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''treedom.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          '',\n)'),
(38, 5, 0, 2, 'http://job.zcool.com.cn/posts/9056.html', '', 'array (\n  ''title'' => ''资深互动广告文案'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039668'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海利宣广告有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''为一系列知名国际品牌提供互动创意的想法和文案产出，客户涵盖化妆品，汽车，服装配饰，家装，IT等。<br><br>工作涉及活动创作，网站，横幅广告，移动应用程序和社交媒体提案<br>负责品牌的社交媒体常规内容撰文<br>负责和参与品牌社交媒体帐户的定位与年度规划<br>社交媒体活动创意想法<br>网络媒体新闻通稿，软文撰写<br><br>请将作品简历发送至以下邮箱：momo.li@net-show.cn&nbsp;,&nbsp;lee.li@net-show.cn&nbsp;,&nbsp;winn.wang@net-show.cn<br>'',\n  ''request'' => ''热爱文字,博览群书,爱好广泛<br>有天马行空,机灵古怪的想法<br>具有很强的文字功底,对文字精益求精<br>熟悉网络,擅长用网络语言与用户沟通,了解互动整合营销<br>具有很强的时间及团队合作观念,善于沟通<br>高度适应能力以及抗压能力<br><br>公司福利<br>每月综合补助（加班餐补，出租车费报销）<br>员工年度体检<br>员工年度旅游（境外为主）<br>组织不定期团建活动（如各类专业培训、拓展训练、聚餐等）<br>庆生会、节日祝福及礼品等<br>'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''灵石路658号802室（大宁财智中心）'',\n  ''company_img'' => ''2016/0129/20160129115428542.png'',\n  ''company_simple_name'' => ''Net-show'',\n  ''company_detail_name'' => ''上海利宣广告有限公司'',\n  ''company_home_page_url'' => ''http://net-show.cn'',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => ''http://net-show.cn'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">弹性工作</span>          	          	<span class="label">年底分红</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">人性化管理</span>          	          '',\n)'),
(39, 5, 0, 2, 'http://job.zcool.com.cn/posts/9192.html', '', 'array (\n  ''title'' => ''文案'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039667'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京蓝桃文化有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、组织参与重要项目的创意构思、文案及客户提案,&nbsp;给予前期提案、设计创意说明及后期结案报告等服务。&nbsp;&nbsp;&nbsp;&nbsp;<br>2、在设计师指导下，执行并监督所负责项目的创意构思和文案。&nbsp;&nbsp;&nbsp;&nbsp;<br>3、稿件思路清晰，能够完成稿件写作思路规划。&nbsp;&nbsp;&nbsp;&nbsp;<br>4、协助项目经理进行创意提案，保证工作的顺利推进。&nbsp;&nbsp;&nbsp;&nbsp;<br>5、独立撰写各类稿件（新闻稿、综述稿、评论稿、专访稿等）、策划方案、报告等。'',\n  ''request'' => ''1、新闻学、传播学、中文、经济管理类相关专业，大学本科以上学历。&nbsp;&nbsp;&nbsp;&nbsp;<br>2、熟悉品牌推广行业，三年以上市场策划及文案工作经验，有整合推广成功案例者优先。&nbsp;&nbsp;&nbsp;&nbsp;<br>3、能够准确捕捉产品亮点，具备恰如其分的文字表现能力。&nbsp;&nbsp;&nbsp;&nbsp;<br>4、熟悉专业创意方法，思维敏捷，洞察力强，文字功底扎实，语言表达能力强。&nbsp;&nbsp;&nbsp;&nbsp;<br>5、能独立完成项目、广告等推广文案的撰写。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''广顺北大街融创动力产业园B223'',\n  ''company_img'' => ''2016/0129/20160129115427804.png'',\n  ''company_simple_name'' => ''蓝桃文化'',\n  ''company_detail_name'' => ''北京蓝桃文化有限公司'',\n  ''company_home_page_url'' => ''http://www.lantaochina.com'',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => ''www.lantaochina.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(40, 5, 0, 2, 'http://job.zcool.com.cn/posts/11380.html', '', 'array (\n  ''title'' => ''文案策划经理'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039667'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''北京蓝桃文化有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、关注互联网新鲜事，熟知网络语言，擅长“一句顶一万句”。<br>2、负责提供优质、高效的创意方案，确保满足客户需求；&nbsp;<br>3、关注客户及竞品的品牌策略与市场策略，提出对应的方案；<br>4、极佳的文字驾驭和创作能力，能独立撰写完成各种活动策划和品牌基础物料的撰写。'',\n  ''request'' => ''1、两年以上互联网公司市场部、4A公司、数字营销公司经验；<br>2、能够独立策划、文案撰写，有赋予事件以意义的策划能力<br>3、有在活动前期掌控传播、造势的能力，了解传播规律和常用媒介；了解互联网用户心理，有“网感”<br>4、了解活动策划中如何制造亮点，能够预知流程中的用户气氛<br>5、对于高强度爆发的活动执行工作，有兴奋感<br>6、较好的逻辑思维能力，创意想法多，有良好的执行力。'',\n  ''department'' => ''品牌部'',\n  ''work_address'' => ''广顺北大街融创动力产业园B223'',\n  ''company_img'' => ''2016/0129/20160129115427211.png'',\n  ''company_simple_name'' => ''蓝桃文化'',\n  ''company_detail_name'' => ''北京蓝桃文化有限公司'',\n  ''company_home_page_url'' => ''http://www.lantaochina.com'',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => ''www.lantaochina.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(41, 5, 0, 2, 'http://job.zcool.com.cn/posts/15335.html', '', 'array (\n  ''title'' => ''资深视觉设计'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039667'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''南京卓奇软件设计有限公司 '',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''南京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''工作职责<br>-	负责偏向推广、营销、海报方向的页面视觉设计<br>-	部分平面相关的设计<br>-	页面中视觉元素的创意与绘制<br>-	设计反馈的翻译者，能够将客户等非设计专业人士的意见转化整理为实际可行的修改点；<br>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;能够担当视觉专题设计小组领导工作，给中级视觉&nbsp;初级视觉给予指导<br>'',\n  ''request'' => ''职位要求<br>-	3年以上从业经验，学历不限；<br>-	优秀的审美，有能力提供让人眼前一亮的设计；<br>-	有一定相关项目经验；<br>-	热爱设计，有良好的美术功底，手绘能力优秀者优先；<br>-	良好的沟通能力，以及团队协作精神；<br>'',\n  ''department'' => ''设计部门'',\n  ''work_address'' => ''玄武区珠江路88号新世界中心B座1611'',\n  ''company_img'' => ''2016/0129/20160129115427314.jpg'',\n  ''company_simple_name'' => ''卓奇设计'',\n  ''company_detail_name'' => ''南京卓奇软件设计有限公司 '',\n  ''company_home_page_url'' => ''http://www.zocdesign.net'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.zocdesign.net'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">高薪</span>          	          	<span class="label">福利全面</span>          	          	<span class="label">追求卓越</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">工作灵活</span>          	          	<span class="label">环境优良</span>          	          	<span class="label">年轻进取</span>          	          	<span class="label">下午茶</span>          	          '',\n)'),
(42, 5, 0, 2, 'http://job.zcool.com.cn/posts/4836.html', '', 'array (\n  ''title'' => ''资深网页设计师 '',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039667'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海莫凡信息技术有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、追求震撼的视觉体验的设计;<br>2、改善和优化电商页面的用户体验，并能给出具体的方案；<br>3、配合产品开发进度完成设计工作并适时对相关业务开展提出建议和解决办法。'',\n  ''request'' => ''1、精通Photoshop、Illustrato、Indesign等工具；<br>2、对电商及Web实现有较深入的了解；<br>3、具有一定的美术鉴赏、排版/色彩搭配能力；<br>4、思维活跃，具有创新意识；<br>5、具备高度的责任心、诚信的工作作风、优秀的学习和沟通能力及团队精神；<br>6、艺术设计类专业，并从事网站设计1-2年以上工作经历；<br>数位板经验者优先；'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市-闵行区'',\n  ''company_img'' => ''2016/0129/20160129115427720.jpg'',\n  ''company_simple_name'' => ''MoreFun莫凡'',\n  ''company_detail_name'' => ''上海莫凡信息技术有限公司'',\n  ''company_home_page_url'' => ''http://www.morefun.me'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.morefun.me'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '',\n)'),
(43, 5, 0, 2, 'http://job.zcool.com.cn/posts/18236.html', '', 'array (\n  ''title'' => ''网页兼平面设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039666'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海慨一实业有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''负责公司网页以及平面设计的工作。'',\n  ''request'' => ''1、3年以上网页设计工作经验，有成熟的网页设计作品；<br>2、熟练使用&nbsp;PS、AI&nbsp;、FLASH等图像处理软件；<br>3、熟知线上线下物料；<br>4、会网页的同时也会平面设计；<br>5、能接受加班；<br>6、团队合作意识较强。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''静安区南京西路934号406室'',\n  ''company_img'' => ''2016/0129/20160129115426606.jpg'',\n  ''company_simple_name'' => ''慨一实业'',\n  ''company_detail_name'' => ''上海慨一实业有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(44, 5, 0, 2, 'http://job.zcool.com.cn/posts/8962.html', '', 'array (\n  ''title'' => ''高级用户体验研究设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039666'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海洛可可整合设计有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责设计实施各种用户研究，分析用户需求及产品使用行为，统计分析各项用户体验研究数据，为设计及产品开发提供依据和建议；<br>2、产品可用性测试：理解设计需求及问题，设计测试方案，进行测试工作并完成测试报告；<br>3、项目管理：负责与客户的沟通过，推动项目顺利执行，按时交付设计成果；&nbsp;&nbsp;<br>4、制作用户访谈、问卷调查等具体执行方案；执行用户访谈，与用户进行面对面的沟通，了解用户特征，挖掘用户需求，并能快速记录所获得的重点信息；&nbsp;<br>5、运用专家评估、桌面研究、竞争分析等方法对相关产品进行用户体验水平评估；&nbsp;<br>6、对收集到的用户、市场等信息进行整理分析，并提出设计改进建议，制作相应的研究报告；&nbsp;'',\n  ''request'' => ''1、熟练掌握各种用户研究方法，有坚实的统计和数据分析基础，逻辑分析能力强，善于独立思考，善表达与沟通；<br>2、有独立执行深度访谈、可用性测试、专家评估、问卷调查等用户研究工作的经历和能力，须有相关案例介绍；<br>3、思维活跃，能接受挑战，认真踏实，做事细致严谨，积极主动，并能同时应对多个项目，能针对不同项目有效权衡和分配工作时间；<br>4、心理学、社会学、统计学、人机交互或相关专业，本科以上学历，硕士学历者优先；'',\n  ''department'' => ''UED部门'',\n  ''work_address'' => ''上海市-黄浦区'',\n  ''company_img'' => ''2016/0129/20160129115426202.png'',\n  ''company_simple_name'' => ''上海洛可可'',\n  ''company_detail_name'' => ''上海洛可可整合设计有限公司'',\n  ''company_home_page_url'' => ''http://www.lkkdesign.com'',\n  ''industry_attr'' => ''艺术/文化传播'',\n  ''company_home_page_name'' => ''www.lkkdesign.com'',\n  ''enterprise_size'' => ''500-1000人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">独具一格的设计公司</span>          	          '',\n)'),
(45, 5, 0, 2, 'http://job.zcool.com.cn/posts/14341.html', '', 'array (\n  ''title'' => ''项目经理助理'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039666'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海博广广告传媒有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、根据项目需求，跟进各类制作品的进程，质量，时间把控，成本把控；&lt;br&gt;2、维护客户关系，根进并落实项目进度和制作情况，现场监督项目质量和协调；&lt;br&gt;3、遵守公司制作流程相关规定，控制项目预算；&lt;br&gt;4、负责客户广告投放的总结、归档，内部资料的整理归纳；&lt;br&gt;5、 对项目执行进行跟踪、监控、反馈及阶段性总结及数据报表；&lt;br&gt;6、.负责协调活动相关人员、物料、流程执行。'',\n  ''request'' => ''1、大专以上学历，两年以上互联网或广告公司客户执行经验；中文、广告、公关、营销专业优先；&lt;br&gt;2、工作认真负责、个性积极主动、性格开朗、讲求效率、乐于接受挑战；&lt;br&gt;3、善于与客户建立良好关系，沟通能力强，耐心、细心，能够承受工作压力；&lt;br&gt;4、熟悉办公软件，熟练使用WORD，EXCEL和POWERPOINT, 有较好的文字功底； &lt;br&gt;5、出色的口头表达、逻辑清晰，能高效的和各部门协调；&lt;br&gt;6、有强烈的工作责任心和团队合作精神，能快速适应不同的工作环境；&lt;br&gt;7、具备良好的商务沟通和人际交往能力，工作积极主动，具有较强的团队协作意识； &lt;br&gt;8、具有较高能动性，可以独立判断机会和风险，在工作团队中能及时寻求和提供帮助。'',\n  ''department'' => ''项目部'',\n  ''work_address'' => ''上海市闸北区108创意广场金座716-717室'',\n  ''company_img'' => ''2016/0129/20160129115426333.png'',\n  ''company_simple_name'' => ''博广传媒'',\n  ''company_detail_name'' => ''上海博广广告传媒有限公司'',\n  ''company_home_page_url'' => ''http://www.boguang001.com/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.boguang001.com/'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '',\n)'),
(46, 5, 0, 2, 'http://job.zcool.com.cn/posts/15274.html', '', 'array (\n  ''title'' => ''中级视觉设计师专题'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039666'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''南京卓奇软件设计有限公司 '',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''南京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责偏向推广、营销、海报方向的页面视觉设计；<br>2、部分平面相关的设计；<br>3、页面中视觉元素的创意与绘制；<br>'',\n  ''request'' => ''1、1年以上从业经验，学历不限；<br>2、熟练使用&nbsp;Ps&nbsp;或&nbsp;Sketch，Ai&nbsp;等视觉设计软件；<br>3、有一定相关项目经验；<br>4、热爱设计，有良好的美术功底，手绘能力优秀者优先；<br>5、良好的沟通能力，以及团队协作精神；'',\n  ''department'' => ''设计部门'',\n  ''work_address'' => ''珠江路88号新世界中心B座'',\n  ''company_img'' => ''2016/0129/20160129115426361.jpg'',\n  ''company_simple_name'' => ''卓奇设计'',\n  ''company_detail_name'' => ''南京卓奇软件设计有限公司 '',\n  ''company_home_page_url'' => ''http://www.zocdesign.net'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.zocdesign.net'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">高薪</span>          	          	<span class="label">福利全面</span>          	          	<span class="label">追求卓越</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">工作灵活</span>          	          	<span class="label">环境优良</span>          	          	<span class="label">年轻进取</span>          	          	<span class="label">下午茶</span>          	          '',\n)'),
(47, 5, 0, 2, 'http://job.zcool.com.cn/posts/12077.html', '', 'array (\n  ''title'' => ''WEB网页前端设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039665'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海奕尚网络信息有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.熟悉W3C标准，精通WEB前端HTML5/XHTML/HTML/CSS/JavaScript等主流技术<br>2.能熟练手工编写HTML5及DIV+CSS代码，并对各种常用浏览器做到良好兼容，确保网页可以跨平台跨浏览器运行（PC及移动端）<br>3.熟练运用常见AJAX框架，熟悉Javascript，&nbsp;掌握一些常用JS库，如JQuery<br>4.能熟练使用Photoshop,Dreamweaver等软件<br>5.较强的责任心和耐心，良好的团队合作意识，性格踏实稳重，能承受高强度的工作压力<br>6.有手机端开发经验者优先考虑'',\n  ''request'' => ''1.大专以上学历<br>2.相关电子商务网站一年以上工作经验'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市长宁区金钟路-道路'',\n  ''company_img'' => ''2016/0129/20160129115425708.jpg'',\n  ''company_simple_name'' => ''奕尚网络'',\n  ''company_detail_name'' => ''上海奕尚网络信息有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '',\n)');
INSERT INTO `zh_collection_content` (`id`, `nodeid`, `siteid`, `status`, `url`, `title`, `data`) VALUES
(48, 5, 0, 2, 'http://job.zcool.com.cn/posts/8732.html', '', 'array (\n  ''title'' => ''网络运营专员'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039665'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京博特创想文化有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、把我们公司的产品包装成营销服务产品；负责我公司自有产品的营销推广策划与执行。<br>2、负责公司未来淘宝店与天猫店的日常运营，包括：店铺设计策划、宝贝描述页的策划与分析优化等。&nbsp;<br>'',\n  ''request'' => ''1、对市场具有敏锐地洞察力，热爱市场策划工作，积极、勇于接受挑战；&nbsp;<br>2、了解互联网营销等新营销，是深度的互联网网民，思维活跃，对新事物新互联网技术特别敏感充满兴趣；有网络运营推广经验者优先；<br>3、具备一定的数据分析能力，能够清晰且有感染力的表达能力；&nbsp;<br>4、具备高度的敬业和团队合作精神，有较强的责任心，工作细致负责；&nbsp;<br>5、有丰富的市场营销、销售团队管理、策划执行经验者，优先考虑。<br>'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''北京市-西城区'',\n  ''company_img'' => ''2016/0129/20160129115425401.jpg'',\n  ''company_simple_name'' => ''博特创想'',\n  ''company_detail_name'' => ''北京博特创想文化有限公司'',\n  ''company_home_page_url'' => ''http://www.besthinking.com.cn'',\n  ''industry_attr'' => ''艺术/文化传播'',\n  ''company_home_page_name'' => ''www.besthinking.com.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">错峰上班不打卡</span>          	          	<span class="label">加班包餐包打车</span>          	          	<span class="label">带薪旅游</span>          	          	<span class="label">每天下午茶</span>          	          '',\n)'),
(49, 5, 0, 2, 'http://job.zcool.com.cn/posts/14958.html', '', 'array (\n  ''title'' => ''Web设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039665'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海铭塔飞信息技术有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''我司客户主要以日系企业为主，提供网站的搭建制作等服务。<br>1、同客户担当一起，针对网站课题进行设计提案从而解决问题。<br>2、使用Photoshop等设计工具对客户网站的页面和Banner横幅广告进行全新设计；<br>3、对既有网站进行修改等。'',\n  ''request'' => ''年龄要求：20-30岁<br>学历要求：大专以上<br><br>应聘资格（技能）：<br>具备网站制作公司从业经验<br>熟练使用Photoshop进行网页设计<br>对HTML、CSS等网页脚本有一定理解<br><br>若对HTML・CSS不了解的话，只有Photoshop设计经验者也可。<br><br>补充：具有实际相关工作经验者，请注明本人作品的URL地址。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市长宁区延安西路地铁-地铁站'',\n  ''company_img'' => ''2016/0129/20160129115425329.jpg'',\n  ''company_simple_name'' => ''Metaphase'',\n  ''company_detail_name'' => ''上海铭塔飞信息技术有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(50, 5, 0, 2, 'http://job.zcool.com.cn/posts/2464.html', '', 'array (\n  ''title'' => ''资深网页设计师-深圳'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039665'',\n  ''recruit_num'' => ''10名'',\n  ''company'' => ''北京深度沟通广告有限公司'',\n  ''salary'' => ''15k-20k'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''注：网站视觉设计、移动app界面设计，不仅是图标设计，不是平面设计。<br><br>1、与公司UCD团队一起完成高质量网站项目、移动app项目；&nbsp;<br>2、视觉设计提案、视觉风格定义、视觉规范制定、视觉设计；&nbsp;<br>3、撰写ppt，诠释并分享视觉作品。'',\n  ''request'' => ''1、4年以上本职位工作经验；&nbsp;<br>2、优异的设计创意能力及独立完成个案的能力（看作品）；&nbsp;<br>3、设计要可以讲出道理，思维要严谨；&nbsp;<br>4、有较强的创新能力，对色彩的把握独到，能把设计风格和栏目特色进行有效的结合；&nbsp;<br>5、良好的沟通、领悟能力，具有团队合作精神和敬业精神，能与团队其他成员进行有效沟通；&nbsp;<br>7、有对作品全程负责的态度和毅力，像素级精确设计；<br>具备以下能力者优先考虑：&nbsp;<br>1、优秀的企业网站设计作品、成熟的app设计作品；&nbsp;<br>2、有带队经验。'',\n  ''department'' => ''用户体验'',\n  ''work_address'' => ''坂田华为基地'',\n  ''company_img'' => ''2016/0129/20160129115425845.png'',\n  ''company_simple_name'' => ''DEEP深度沟通'',\n  ''company_detail_name'' => ''北京深度沟通广告有限公司'',\n  ''company_home_page_url'' => ''http://www.deeping.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.deeping.cn'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">用户体验</span>          	          	<span class="label">UCD</span>          	          	<span class="label">UE</span>          	          	<span class="label">UX</span>          	          '',\n)'),
(51, 5, 0, 2, 'http://job.zcool.com.cn/posts/19492.html', '', 'array (\n  ''title'' => ''资深设计师/设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039664'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''北京天纳广告有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''参与创意，负责网页设计表现执行'',\n  ''request'' => ''具备较强专业控制力<br>具备原创性<br>不以干行活为终极职业目标<br><br><br>有意应聘者请将简历和作品发至：hr@tamnaaaa.com'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''北京市朝阳区22院街艺术区'',\n  ''company_img'' => ''2016/0129/20160129115424802.png'',\n  ''company_simple_name'' => ''天纳'',\n  ''company_detail_name'' => ''北京天纳广告有限公司'',\n  ''company_home_page_url'' => ''http://www.tamnaaaa.com'',\n  ''industry_attr'' => ''影视/媒体'',\n  ''company_home_page_name'' => ''www.tamnaaaa.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">天纳</span>          	          	<span class="label">TAMNAAAA</span>          	          '',\n)'),
(52, 5, 0, 2, 'http://job.zcool.com.cn/posts/18544.html', '', 'array (\n  ''title'' => ''资深网站视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039664'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''网易（杭州）网络有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''杭州 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.具备良好的审美能力、动手能力、沟通能力、有相关的设计工作经验；<br>2.&nbsp;负责游戏运营及品牌宣传的推广设计工作；<br>3.&nbsp;设计时，根据需求进行系统分析，设计出符合要求的设计作品；<br>4.&nbsp;关注所负责产品的设计动向，为产品提供专业的美术意见及建议。'',\n  ''request'' => ''1.&nbsp;热爱游戏，对UI设计趋势有灵敏触觉和领悟能力；<br>2.&nbsp;关注用户体验设计，并对网站的易用性有一定研究；<br>3.&nbsp;良好的创意思维和理解能力，有深厚的美术功底；<br>4.&nbsp;能熟练使用Photoshop、Flash、Illustrator、Fireworks、After&nbsp;Effects等流行设计软件；<br>5.&nbsp;设计相关专业学历，3年以上设计工作经验；（能力优秀者可放宽）<br>6.&nbsp;具备良好合作态度及团队精神，并富有工作激情、创造力和责任感。'',\n  ''department'' => ''网易游戏'',\n  ''work_address'' => ''网商路599号'',\n  ''company_img'' => ''2016/0129/20160129115424163.png'',\n  ''company_simple_name'' => ''网易'',\n  ''company_detail_name'' => ''网易（杭州）网络有限公司'',\n  ''company_home_page_url'' => ''http://www.163.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.163.com'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">网易</span>          	          	<span class="label">态度</span>          	          	<span class="label">游戏</span>          	          	<span class="label">电子商务</span>          	          	<span class="label">教育</span>          	          	<span class="label">音乐</span>          	          	<span class="label">社交</span>          	          '',\n)'),
(53, 5, 0, 2, 'http://job.zcool.com.cn/posts/20102.html', '', 'array (\n  ''title'' => ''网页视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039664'',\n  ''recruit_num'' => ''10名'',\n  ''company'' => ''深圳欣米文化传播有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''我们是一群对设计偏执狂热的人，我们崇尚有价值的好设计，我们倡导自由激发式的工作氛围，我们追求极致的细节和生活态度。如果你热爱着设计，那么请加入我们。<br>主要负责公司视觉设计工作&nbsp;(电商、游戏等类）<br>公司网站：CIMIDESIGN.COM'',\n  ''request'' => ''1.&nbsp;具备较强的沟通表达协调能力，踏实认真、性格开朗积极、有较强的抗压能力；<br>2.&nbsp;二年以上的网页设计经验和相关作品<br>3.&nbsp;精通PS/AI等看家工具；<br>4.&nbsp;拥有宽广的行业视野及优秀的审美；<br><br>'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''深圳市宝安区西乡-地铁站'',\n  ''company_img'' => ''2016/0129/20160129115424668.png'',\n  ''company_simple_name'' => ''欣米文化'',\n  ''company_detail_name'' => ''深圳欣米文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.cimidesign.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.cimidesign.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">开黑</span>          	          	<span class="label">国外旅游</span>          	          	<span class="label">LOL开黑</span>          	          '',\n)'),
(54, 5, 0, 2, 'http://job.zcool.com.cn/posts/17511.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039664'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''深圳市汇石金融科技有限公司'',\n  ''salary'' => ''20k-25k'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''职位描述<br>工作内容：<br>1）负责产品的UI/UE设计，监控UI设计师的页面呈现，把控UI设计师对UE设计理解及呈现的完美到位；&nbsp;<br>2)&nbsp;对产品的易用性和功能分析，进行用户研究；参与产品前期界面视觉设计、流行趋势分析、UI规范；<br>3)&nbsp;结合用户体验，优化完善设计流程，高质量完成产品；<br>4)&nbsp;产品的整体视觉风格设计及后期跟进，与产品技术配合，进行跨部门合作的协调和沟通，共同推动产品的最终实现；<br>5)&nbsp;分享设计经验、推动提高团队的设计能力。<br><br>工作地址<br>深圳市南山区深南大道瑞思中心34层（世界之窗地铁站C1出口）'',\n  ''request'' => ''大专以上学历，美术、艺术设计或相关专业；<br>1)&nbsp;精通Photoshop、Illustartor等设计软件；<br>2)&nbsp;3年以上的互联网或移动互联网优秀产品设计经验，时刻关注互联网动态，对业界新技术有热烈的好奇心和钻研精神；<br>3)&nbsp;热爱设计，拥有宽广的行业（平面设计、互联网）视野与时尚的审美标准；<br>4）有较强的美术功底和创意能力，热爱交互设计和视觉设计，具备良好的美感，对页面的色彩和布局有较好的把握<br>5)&nbsp;具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br>注：（投递简历时请附作品，无作品不接受面试）'',\n  ''department'' => ''产品'',\n  ''work_address'' => ''益田假日广场瑞思国际中心3414'',\n  ''company_img'' => ''2016/0129/20160129115424398.png'',\n  ''company_simple_name'' => ''汇石金融'',\n  ''company_detail_name'' => ''深圳市汇石金融科技有限公司'',\n  ''company_home_page_url'' => ''http://www.currone.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.currone.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">绩效奖金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">氛围活跃</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">金融证券</span>          	          	<span class="label">互联网</span>          	          	<span class="label">对冲基金</span>          	          '',\n)'),
(55, 5, 0, 2, 'http://job.zcool.com.cn/posts/12081.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039663'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海奕尚网络信息有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责公司属下品牌的平面图片设计工作。以符合客户活动要求及审美为前提。&lt;br&gt;2、与市场部，运营部，客服部相关部门相协调，不断调整公司页面视觉，以达到最完美的图片设计以促进销售。 3、具有独立页面设计的能力，也有带领设计师团队工作完成项目的能力。 【加分の个人魅力】情商高，轻微完美主义，经得起甲方龟毛の审核，受得了邮件来来回回の改改改，有一颗温柔抗虐の坚强的心'',\n  ''request'' => ''1、具有三年以上平面设计经验，具网页设计或电子商务背景的尤佳。&lt;br&gt; 2、能熟练使用adobe软件，如photoshop，illustrator，会使用dreamwaver，可以读懂基本html代码，对css，java等代码有所了解，如有淘宝，天猫等第三方电子商务平台设计经验的更佳。&lt;br&gt; 3、具有良好的审美，对时尚及流行趋势敏感。&lt;br&gt; 4、具有责任心，耐心，纪律性。有团队合作精神，能够在压力之下工作。&lt;br&gt; 5、具有良好的领导能力和沟通能力，能够合理安排和分配工作。 时尚，最时尚。。。（情不自禁唱起来的节奏） 如果你恰好符合以上条件（颜值够高的话以上软性条件可适当放宽=_=），且对服装行业感兴趣，对设计充满热情，请立即将简历发送给我们!'',\n  ''department'' => ''设计部 '',\n  ''work_address'' => ''上海市长宁区金钟路-道路'',\n  ''company_img'' => ''2016/0129/20160129115423128.jpg'',\n  ''company_simple_name'' => ''奕尚网络'',\n  ''company_detail_name'' => ''上海奕尚网络信息有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '',\n)'),
(56, 5, 0, 2, 'http://job.zcool.com.cn/posts/8459.html', '', 'array (\n  ''title'' => ''网页设计师-天猫淘宝电商'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039663'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海宠乐宠物用品有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、公司旗下所有电商平台的相关设计；&nbsp;<br>2、平台首页、banner、活动页、产品描述页等。'',\n  ''request'' => ''1、丰富的知识储备，开阔的眼界，从电影到非洲大迁徙。&nbsp;<br>2、细微的洞察力，上大号时都在观察门板的阴影结构。&nbsp;<br>3、时间允许的情况下，偏激的在意作品细节，较客观的考虑用户体验。&nbsp;<br>4、无性别、专业、学历要求，作品说话。&nbsp;<br>5、不需要&nbsp;能承受压力，但接受的工作需按时完成。&nbsp;<br>6、不需要&nbsp;为人和善、谦虚踏实，但必须有责任心、诚实守信。&nbsp;<br>7、不认为国外作品都是好作品，不把创意两字挂嘴边。&nbsp;<br>8、面试需带电子档作品集，或站酷、dribbble、behance等个人主页。<br>9、认同smartisan价值观，你没看错。'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''上海市-闵行区'',\n  ''company_img'' => ''2016/0129/20160129115423190.jpg'',\n  ''company_simple_name'' => ''乐宠控股'',\n  ''company_detail_name'' => ''上海宠乐宠物用品有限公司'',\n  ''company_home_page_url'' => ''http://weibo.com/u/2628202111&nbsp;http://www.weibaquan.com/&nbsp;http://qpet.taobao.com/'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''http://weibo.com/u/2628202111&nbsp;http://www.weibaquan.com/&nbsp;http://qpet.taobao.com/'',\n  ''enterprise_size'' => ''100-200人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">福利</span>          	          '',\n)'),
(57, 5, 0, 2, 'http://job.zcool.com.cn/posts/19782.html', '', 'array (\n  ''title'' => ''前端开发工程师H5'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039663'',\n  ''recruit_num'' => ''4名'',\n  ''company'' => ''北京易动纷享科技有限责任公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.参与公司web前端的架构设计和标准和规范制定；<br>2.利用各种Web技术实现web产品的交互效果，参与项目开发；<br>3.对产品经理、设计师提出的需求给出技术评估和解决方案；'',\n  ''request'' => ''1.精通HTML和CSS&nbsp;及JavaScript、熟悉前端mvc/mvvm开发框架（例如backbone/angularjs等）优先； <br>2.熟练使用前端技术开发单页面应用（SPA）； <br>3.熟练解决页面兼容性问题； <br>4.有jQuery、Zepto、Angular、Bootstrap等框架的使用经验，对ECMA规范有一定了解； <br>5.熟练掌握HTML5相关技术，如：WebSocket,&nbsp;Web&nbsp;Storage,&nbsp;Cross-document消息传递,XMLHttpRequest&nbsp;Level&nbsp;2等;<br>6.&nbsp;熟悉移动端Web绘图相关高级特性,&nbsp;如canvas,&nbsp;webGL,&nbsp;CSS3动画效果等。'',\n  ''department'' => ''研发中心'',\n  ''work_address'' => ''北京市海淀区知春里-地铁站卫星大厦'',\n  ''company_img'' => ''2016/0129/20160129115423365.png'',\n  ''company_simple_name'' => ''纷享销客'',\n  ''company_detail_name'' => ''北京易动纷享科技有限责任公司'',\n  ''company_home_page_url'' => ''http://www.fxiaoke.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.fxiaoke.com'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">连接企业一切</span>          	          '',\n)'),
(58, 5, 0, 2, 'http://job.zcool.com.cn/posts/16696.html', '', 'array (\n  ''title'' => ''网站重构工程师&nbsp;&nbsp;'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039662'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''莉莉丝科技（上海）有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1)	负责公司及游戏产品的官网制作、日常维护、更新等<br>2)	审核外包项目的页面重构品质<br>3)	负责参与设计体验、流程的制定和规范<br>4)	通过技术提升网站的用户体验和可用性<br>5)	懂设计，可负责部分设计工作<br>'',\n  ''request'' => ''1)	本科以上学历，从事网页设计及重构工作2年以上<br>2)	对符合web标准的网站重构有丰富经验，有成功案例<br>3)	精通html、css能快构建出兼容主流浏览器的页面&nbsp;<br>4)	熟悉javascript语言，对性能优化有一定了解&nbsp;<br>5)	了解至少一种后台语言的开发机制(如php，Java等)<br>6)	熟练使用Photoshop，有较好审美及设计能力<br>7)	热爱游戏行业，能接受挑战并承受工作压力<br>'',\n  ''department'' => ''研发部'',\n  ''work_address'' => ''上海市闵行区新意城商务广场'',\n  ''company_img'' => ''2016/0129/20160129115422400.png'',\n  ''company_simple_name'' => ''莉莉丝'',\n  ''company_detail_name'' => ''莉莉丝科技（上海）有限公司'',\n  ''company_home_page_url'' => ''http://www.lilithgame.com/'',\n  ''industry_attr'' => ''游戏'',\n  ''company_home_page_name'' => ''http://www.lilithgame.com/'',\n  ''enterprise_size'' => ''100-200人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">萌妹子多</span>          	          	<span class="label">16薪</span>          	          '',\n)'),
(59, 5, 0, 2, 'http://job.zcool.com.cn/posts/19944.html', '', 'array (\n  ''title'' => ''网页前端设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039662'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''广州银汉科技有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''广州 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责：<br>负责公司官网、产品网站、活动专题、手机H5页面等网站重构搭建及相关前端开发工作。<br><br>'',\n  ''request'' => ''任职要求：<br>1、&nbsp;本科，三年以上网站重构、前端开发工作经验，有网站交互设计，技术开发，移动端页面重构开发等经验优先；<br>2、有良好的代码编写习惯及项目文件管理，能制定相关开发规范，高效响应需求；<br>3、精通HTML5，CSS3，熟悉JS，JQ，能做基础javascript开发；<br>4、有良好的理解和沟通表达能力，能承受工作压力，接受挑战。'',\n  ''department'' => ''设计中心'',\n  ''work_address'' => ''中山大道238号勤天大厦'',\n  ''company_img'' => ''2016/0129/20160129115422176.png'',\n  ''company_simple_name'' => ''银汉公司'',\n  ''company_detail_name'' => ''广州银汉科技有限公司'',\n  ''company_home_page_url'' => ''http://www.yh.cn'',\n  ''industry_attr'' => ''游戏'',\n  ''company_home_page_name'' => ''www.yh.cn'',\n  ''enterprise_size'' => ''500-1000人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">年底双薪</span>          	          	<span class="label">年终奖</span>          	          	<span class="label">年度体检</span>          	          	<span class="label">年假</span>          	          	<span class="label">伙食补贴</span>          	          	<span class="label">免费</span>          	          	<span class="label">下午茶</span>          	          '',\n)'),
(60, 5, 0, 2, 'http://job.zcool.com.cn/posts/13733.html', '', 'array (\n  ''title'' => ''资深网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039662'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海友尊文化传播有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责网站前端页面（包括PC端与移动端）的创意与设计；PC/移动网站的WEB端、移动端整体UI设计、视觉设计；<br>2、配合市场运营部门，完成网站推广图、专题活动页面策划与设计；<br>3、负责策划设计网站的整体风格、布局、视觉感受及内容设计；<br>4、分析业务需求，研究用户行为和使用场景，优化产品设计；<br>5、负责完善网站推广页面及维护。'',\n  ''request'' => ''1、有3年及以上的移动互联网、软件或者互联网行业视觉设计工作经验&nbsp;<br>2、具有良好的美术功底及审美能力，较强的视觉设计和创意能力&nbsp;<br>3、良好的沟通能力，善于对设计的表达<br>4.、良好的创造力和审美感知力，能够独立创作并有很多创意，乐于学习；<br>5、&nbsp;请提供相关的设计作品案例到招聘邮箱供参考；<br>6、有团队合作精神，富有激情及责任心。&nbsp;<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！公司网址：www.uimix.com'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''淞兴西路258号5号楼5109室（半岛1919）'',\n  ''company_img'' => ''2016/0129/20160129115422736.jpg'',\n  ''company_simple_name'' => ''uimix'',\n  ''company_detail_name'' => ''上海友尊文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.uimix.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.uimix.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '',\n)'),
(61, 5, 0, 2, 'http://job.zcool.com.cn/posts/15266.html', '', 'array (\n  ''title'' => ''高级视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039662'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京动乐网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''&nbsp;1、主要负责公司官网及商城的视觉设计，以及产品及促销专题页面设计等工作；<br>&nbsp;2、负责公司广告Banner图片及促销专题页面设计、制作及维护，整体提升公司品牌视觉感<br>&nbsp;3、负责设计制作和优化公司产品详情页文字信息及图片，需要结合产品的特性制作成图文并茂的、有美感的、有较强实用性及吸引力的详细信息页面；<br>４、完善视觉设计流程，实现产品在用户体验上的一致性；<br>&nbsp;5、参与对视觉设计规范的维护、更新、实施；参与前瞻性产品的创意设计<br>&nbsp;6、完成领导上级交给的其他工作<br>'',\n  ''request'' => ''1.&nbsp;本科及以上学历，美术、设计等相关专业<br>2.&nbsp;三年以上互联网或移动端视觉设计经验；<br>3.&nbsp;丰富的视觉表现力，精通色彩、图形、信息和&nbsp;gui&nbsp;设计原则及方法<br>4.&nbsp;熟练使用&nbsp;Photoshop&nbsp;、&nbsp;Freehand&nbsp;、&nbsp;illustrator&nbsp;等平面设计软件<br>5.&nbsp;具有良好的价值观，能融入团队协作；<br>6.&nbsp;请提供近期设计作品。<br>'',\n  ''department'' => ''信息运营部'',\n  ''work_address'' => ''北京市朝阳区酒仙桥10号恒通国际商务园B12C三层'',\n  ''company_img'' => ''2016/0129/20160129115422687.png'',\n  ''company_simple_name'' => ''动乐网'',\n  ''company_detail_name'' => ''北京动乐网络科技有限公司'',\n  ''company_home_page_url'' => ''http://www.51dongle.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.51dongle.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '',\n)'),
(62, 5, 0, 2, 'http://job.zcool.com.cn/posts/7238.html', '', 'array (\n  ''title'' => ''网页视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039661'',\n  ''recruit_num'' => ''10名'',\n  ''company'' => ''深圳市朋沃科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''主要工作负责腾讯游戏类专题页面，官网，海报周边，手机端页面，广告。'',\n  ''request'' => ''1、美术相关专业或计算机相关专业；2、一年以上设计工作经验，美术功底良好，较强的设计能力，有创意及良好的色彩感觉； 3、能熟练使用Photoshop、Flash、Dreamweaver等流行设计软件； 4、一年以上互联网网站美术设计经验，熟悉网页设计的规范，能独立完成设计案例； 5、有游戏/电商类专题、活动页面、UI设计或者懂手绘经验者优先；6、具有良好的沟通能力、学习能力、适应能力、优秀的团队合作能力。'',\n  ''department'' => '''',\n  ''work_address'' => ''广东省-深圳市-宝安区'',\n  ''company_img'' => ''2016/0129/20160129115421879.jpg'',\n  ''company_simple_name'' => ''PALWO'',\n  ''company_detail_name'' => ''深圳市朋沃科技有限公司'',\n  ''company_home_page_url'' => ''http://www.palwo.com'',\n  ''industry_attr'' => ''艺术/文化传播'',\n  ''company_home_page_name'' => ''www.palwo.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '',\n)'),
(63, 5, 0, 2, 'http://job.zcool.com.cn/posts/11122.html', '', 'array (\n  ''title'' => ''平面设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039661'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''廿一客（上海）电子商务有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、公司各类平面视觉相关设计执行；&nbsp;<br>2、公司产品，宣传，展示及各项活动的设计与制作工作；&nbsp;<br>3、配合各部门设计相关的平面宣传资料；&nbsp;<br>4、公司品牌形象传达系统的维护与更新工作。&nbsp;'',\n  ''request'' => ''1、正规美术院校设计专业，良好的审美意识及艺术修养；&nbsp;<br>2、能独立完成各种平面设计工作；&nbsp;<br>3、熟练运用相关专业设计软件，熟悉设计输出、印刷流程、工艺材料等相关专业知识&nbsp;；<br>4、工作踏实认真，责任心强，良好的沟通能力、团队协作精神及服务意识；&nbsp;<br>5、较强的创意能力，能承受一定的工作压力；<br>&nbsp;<br>面试时需携带近期设计作品，应届生也可。&nbsp;&nbsp;&nbsp;&nbsp;<br>'',\n  ''department'' => ''品牌推广部'',\n  ''work_address'' => ''春中路588号'',\n  ''company_img'' => ''2016/0129/20160129115421187.jpg'',\n  ''company_simple_name'' => ''21Cake'',\n  ''company_detail_name'' => ''廿一客（上海）电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.21cake.com'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.21cake.com'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">吃到爽</span>          	          	<span class="label">大食堂</span>          	          '',\n)'),
(64, 5, 0, 2, 'http://job.zcool.com.cn/posts/18778.html', '', 'array (\n  ''title'' => ''美工/网页设计'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039661'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''百互润贸易（上海）有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责天猫或其他平台（京东、聚美、1号店等）的设计装修、负责店铺的整体形象、首页、产品展示页面等模块的美工设计&nbsp;<br>2、负责上架产品进行排版、优化宝贝描述、美化产品图片等&nbsp;<br>3、定期更新设计店铺促销图片及页面，同时配合促销活动，调整及修改产品页面及店铺主页更新&nbsp;<br>4、店铺的日常维护及其他设计调整&nbsp;<br>5、图片尺寸调整、实物修片等美工&nbsp;<br>'',\n  ''request'' => ''1、美术、平面设计等相关专业，专科以上学历&nbsp;<br>2、熟悉天猫或其他平台（京东、聚美、1号店）的设计装修流程、熟悉店铺的整体形象、首页、产品展示页面等模块的美工设计&nbsp;<br>3、精通设计软件Photoshop、Illustrator等，熟悉Dreamweaver、HTML等网页及图形制作软件&nbsp;<br>4、有良好的沟通及策略理解能力、极强的责任性和独立完成工作的能力<br>5、良好的抗压能力，并能接受工作需要的加班安排&nbsp;<br>6、有化妆品电子商务美工、网页设计或平面设计工作经验优先&nbsp;<br>面试时请提供设计作品<br>'',\n  ''department'' => ''消费品事业部'',\n  ''work_address'' => ''南京西路699号'',\n  ''company_img'' => ''2016/0129/20160129115421704.jpg'',\n  ''company_simple_name'' => ''百润'',\n  ''company_detail_name'' => ''百互润贸易（上海）有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''外商独资'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(65, 5, 0, 2, 'http://job.zcool.com.cn/posts/8083.html', '', 'array (\n  ''title'' => ''WEB设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039661'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海莫凡信息技术有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、具基本美术功底，配合项目组根据客户提供的资料进行规范和分析；<br>2、随时根据市场上最新的美术设计时尚元素，注重相关资料和图库的收集和调整；<br>3、能够根据客户需求，直接将客户所想的转化为设计作品；'',\n  ''request'' => ''1、&nbsp;能独立完成项目的设计以及有较好的表达能力；<br>2、&nbsp;熟练操作PHOTOSHOP&nbsp;AI等相关设计软件；<br>3、&nbsp;具有1年以上网页或电商设计工作经验,&nbsp;有创意和设计能力；<br>4、&nbsp;热爱设计工作，工作认真负责，富有创意；<br>5、&nbsp;具有团队合作精神,能够吃苦耐劳；<br>6、&nbsp;设计相关专业专科以上学历；<br>7、&nbsp;有成熟的作品.'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市-闵行区'',\n  ''company_img'' => ''2016/0129/20160129115421648.jpg'',\n  ''company_simple_name'' => ''MoreFun莫凡'',\n  ''company_detail_name'' => ''上海莫凡信息技术有限公司'',\n  ''company_home_page_url'' => ''http://www.morefun.me'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.morefun.me'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '',\n)'),
(66, 5, 0, 2, 'http://job.zcool.com.cn/posts/17826.html', '', 'array (\n  ''title'' => ''资深天猫美工'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039660'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''一加三餐（上海）电子商务有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位概述：<br>1、负责天猫的店铺页面（首页、二级页和宝贝页）的美工制作及上传；<br>2、负责制作天猫上的活动促销图片及广告Banner，并根据店铺活动实际情况及时更新；<br>3、根据店铺实际情况做好宝贝图片的页面位置排版工作；<br>4、收集竞争对手的店铺信息，做出有针对性的图片呈现变化；<br>5、完成领导交代的其他事宜。'',\n  ''request'' => ''岗位要求：<br>1、大专以上学历，艺术设计相关专业；<br>2、有一年以上的美工工作经验,&nbsp;有淘宝店铺美工经验者优先；<br>3、能够熟练运用PS、DW等制图软件，了解淘宝代码的运用；<br>4、有极强的执行能力，做事认真仔细；<br>5、有较强的敬业精神和团队合作精神。'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层'',\n  ''company_img'' => ''2016/0129/20160129115421511.png'',\n  ''company_simple_name'' => ''一加三餐'',\n  ''company_detail_name'' => ''一加三餐（上海）电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.ecmoho.com'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.ecmoho.com'',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '',\n)'),
(67, 5, 0, 2, 'http://job.zcool.com.cn/posts/19128.html', '', 'array (\n  ''title'' => ''平面设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039660'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海随时信息科技有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责公司品牌营销资料以及VI视觉传达创意、设计和制作<br>2、完成公司的平面设计和印刷品设计需求，包括PPT、海报、宣传品、创意展示、印刷品、微信以及微信美工等<br>3、配合市场推广、活动策划进行相应专题推广页面的设计制作、图片处理等'',\n  ''request'' => ''1、美术或其他相关专业，优秀的色彩以及图形把握能力，具备独立设计操作能力<br>2、1年以上平面设计或网站美工经验，熟练掌握图形设计软件<br>3、对图片有较强的审美力，能根据需求设计版面风格<br>4、做事认真细致，善于沟通<br>5、具备优秀的执行力以及良好的工作习惯<br>'',\n  ''department'' => ''市场部'',\n  ''work_address'' => ''国定东路200号4幢302室'',\n  ''company_img'' => ''2016/0129/20160129115420751.png'',\n  ''company_simple_name'' => ''领路'',\n  ''company_detail_name'' => ''上海随时信息科技有限公司'',\n  ''company_home_page_url'' => ''http://www.mentornow.com/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.mentornow.com/'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">高前景</span>          	          	<span class="label">团队优秀</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">年终奖</span>          	          	<span class="label">苹果电脑</span>          	          '',\n)'),
(68, 5, 0, 2, 'http://job.zcool.com.cn/posts/15478.html', '', 'array (\n  ''title'' => ''主设计师/设计主管'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039660'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海马克华菲电子商务有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责：<br>1、负责马克华菲MF或RESHAKE品牌所有线上平台(天猫、京东、一号店、优购、唯品会等)的整体形象设计，把握线上渠道整体风格和视觉呈现，全面提升整体视觉效果。<br>2、管理设计团队，与运营部，策划部，视觉部密切配合，根据公司的营销活动方案完成天猫旗舰店及其他平台的大型活动、店铺活动的主题页面设计和广告图片的设计任务。<br>3、监控天猫、京东、一号店、优购、唯品会等活动页面效果并优化用户体验。<br>4、负责大型设计项目和外界供应商的对接工作。'',\n  ''request'' => ''任职资格：<br>1、美术、设计或相关专业大专以上学历，有扎实的美术功底。<br>2、3年以上平面设计、网页设计工作经验，有电商平台设计经验，服装或时尚行业工作经验优先。<br>3、有敏锐的时尚触觉，较强的色彩搭配能力及审美观念。<br>4、精通Photoshop、Illustrator 、Dreamweaver等设计软件，丰富的平面设计经验。<br>5、具备良好团队管理能力，并富有工作激情、创新欲望和责任感，并能推动团队的设计能力。<br>关于马克华菲<br>官方网站：www.markfairwhale.com<br>天猫-马克华菲官方旗舰店： http://fairwhale.tmall.com<br>天猫-华菲型格官方旗舰店：http://fairwhaleshake.tmall.com<br>天猫-马克新绅士官方旗舰店：http://makexinshenshi.tmall.com'',\n  ''department'' => ''电子商务部'',\n  ''work_address'' => ''上海市徐汇区龙漕路-地铁站'',\n  ''company_img'' => ''2016/0129/20160129115420346.png'',\n  ''company_simple_name'' => ''马克华菲'',\n  ''company_detail_name'' => ''上海马克华菲电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.markfairwhale.com'',\n  ''industry_attr'' => ''其他'',\n  ''company_home_page_name'' => ''www.markfairwhale.com'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">时尚</span>          	          	<span class="label">服装</span>          	          	<span class="label">潮人</span>          	          	<span class="label">幸福</span>          	          '',\n)'),
(69, 5, 0, 2, 'http://job.zcool.com.cn/posts/20103.html', '', 'array (\n  ''title'' => ''网页设计助理'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039660'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''深圳欣米文化传播有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验一年以下'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''我们是一群对设计偏执狂热的人，我们崇尚有价值的好设计，我们倡导自由激发式的工作氛围，我们追求极致的细节和生活态度。如果你热爱着设计，那么请加入我们。<br>主要负责公司视觉设计工作&nbsp;(电商、游戏等类）<br>公司网站：CIMIDESIGN.COM'',\n  ''request'' => ''1.&nbsp;具备较强的沟通表达协调能力，踏实认真、性格开朗积极、有较强的抗压能力；<br>2.&nbsp;熟悉PS/AI等看家工具；<br>3.&nbsp;学习能力强，积极、主动，对设计富有激情'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''深圳市宝安区西乡-地铁站'',\n  ''company_img'' => ''2016/0129/20160129115420614.png'',\n  ''company_simple_name'' => ''欣米文化'',\n  ''company_detail_name'' => ''深圳欣米文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.cimidesign.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.cimidesign.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">开黑</span>          	          	<span class="label">国外旅游</span>          	          	<span class="label">LOL开黑</span>          	          '',\n)');
INSERT INTO `zh_collection_content` (`id`, `nodeid`, `siteid`, `status`, `url`, `title`, `data`) VALUES
(70, 5, 0, 2, 'http://job.zcool.com.cn/posts/19602.html', '', 'array (\n  ''title'' => ''前端开发工程师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039659'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''北京大疆文化传媒有限责任公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;根据设计稿和规范文档完成web和mobile界面制作与交互编写；<br>2.&nbsp;解决多浏览器的兼容性；<br>3.&nbsp;编写基础控件，业务组件；<br>4.&nbsp;配合技术部服务器端开发工程师完成项目整体开发；<br>5.&nbsp;参与前端构建与技术预研。<br>&nbsp;'',\n  ''request'' => ''1.&nbsp;本科及以上学历，专业不限； <br>2.&nbsp;知名互联网企业工作经验3年以上（同时具有&nbsp;web&nbsp;和&nbsp;h5开发开发经验）； <br>3.&nbsp;熟练掌握W3C标准，制作兼容性良好的页面（含&nbsp;ps&nbsp;切图）；<br> 4.&nbsp;精通Jquery，RequireJs，等框架，了解&nbsp;backbone&nbsp;等&nbsp;mvc，mvvm&nbsp;框架；<br>5.&nbsp;熟练使用&nbsp;bootstrap&nbsp;easyui&nbsp;等快速开发框架；<br>6.&nbsp;有大型单页交互应用实战；<br>7.&nbsp;有前端工程意识，熟练使用前端构建工具；<br> 8.&nbsp;了解服务器端开发语言PHP、PYTHON等；<br>9.&nbsp;掌握日常&nbsp;linux&nbsp;操作。'',\n  ''department'' => ''品牌部'',\n  ''work_address'' => ''北京市朝阳区三里屯外交公寓'',\n  ''company_img'' => ''2016/0129/20160129115419227.png'',\n  ''company_simple_name'' => ''大疆传媒'',\n  ''company_detail_name'' => ''北京大疆文化传媒有限责任公司'',\n  ''company_home_page_url'' => ''http://studiochina.dji.com/cn'',\n  ''industry_attr'' => ''艺术/文化传播'',\n  ''company_home_page_name'' => ''http://studiochina.dji.com/cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">dji</span>          	          '',\n)'),
(71, 5, 0, 2, 'http://job.zcool.com.cn/posts/8635.html', '', 'array (\n  ''title'' => ''&nbsp;资深网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039659'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海凯淳实业有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责：<br>1.负责淘宝天猫旗舰店网站的设计、改版；<br>2.负责旗舰店产品的界面设计，制定相关产品的设计规范；<br>3.负责线上推广活动相关的视觉设计和前端实现，包括EDM、页面、专题、Banner等；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。'',\n  ''request'' => ''岗位要求：<br>1、有较强的美术功底和出色的网页平面设计审美功力；&nbsp;<br>2、能够熟练使用Dreamweaver、Flash、Fireworks、Photoshop等设计工具；<br>3、能独立策划、设计、制作高品位的网页；<br>4、了解网页制作技术如javascript、HTML、CSS等编程语言；&nbsp;<br>5、善于沟通，具有良好的职业素质和团队合作精神，并能与项目开发人员合作完成项目。<br><br><br>P.S.请务必在简历中附带个人作品'',\n  ''department'' => ''Creative'',\n  ''work_address'' => ''上海市-徐汇区'',\n  ''company_img'' => ''2016/0129/20160129115419211.jpg'',\n  ''company_simple_name'' => ''凯淳实业'',\n  ''company_detail_name'' => ''上海凯淳实业有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '',\n)'),
(72, 5, 0, 2, 'http://job.zcool.com.cn/posts/12452.html', '', 'array (\n  ''title'' => ''资深产品设计-21cake'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039659'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''廿一客（上海）电子商务有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;全面负责公司新产品及周边用品的外观设计与革新工作.&nbsp;<br>2.&nbsp;能独立完成产品创意,二维平面及三维建模和渲染工作.&nbsp;<br>3.&nbsp;配合市场需求,进行产品上市前,中,后的外观设计开发与推进.&nbsp;<br>4.&nbsp;能够独立分析和解决产品研发过程中遇到的各类设计问题.&nbsp;<br>5.&nbsp;配合完成公司各种产品包装的设计优化.&nbsp;<br>'',\n  ''request'' => ''1.&nbsp;三年以上工作经验,工业设计类本科及以上学历.具备良好的审美与艺术鉴赏力.&nbsp;<br>2.&nbsp;熟练使用Photoshop，犀牛等2D.3D设计与渲染软件.&nbsp;<br>3.&nbsp;突出的创新设计能力及产品外观审美能力，熟悉各种材料工艺与加工方式.&nbsp;<br>4.&nbsp;良好的沟通能力及团队合作精神，较强的自我管理能力及工作责任心.&nbsp;<br>5.&nbsp;有家居及相关行业设计经验者优先；&nbsp;<br>（面试时需携带近期设计作品）<br>'',\n  ''department'' => ''品牌推广部'',\n  ''work_address'' => ''春中路588号'',\n  ''company_img'' => ''2016/0129/20160129115419367.jpg'',\n  ''company_simple_name'' => ''21Cake'',\n  ''company_detail_name'' => ''廿一客（上海）电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.21cake.com'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.21cake.com'',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">吃到爽</span>          	          	<span class="label">大食堂</span>          	          '',\n)'),
(73, 5, 0, 2, 'http://job.zcool.com.cn/posts/16094.html', '', 'array (\n  ''title'' => ''页游-高级视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039658'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''深圳市迅雷网络技术有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.负责云加速产品设计：牛X页游官网、游戏官网、积分官网、金钻官网、平台官网、游戏盒子以及运营活动页相关设计工作；&nbsp;<br>2.根据产品和运营需求，独立完成设计方案，并对方案进行总结评估；&nbsp;<br>3.配合交互，前端调整视觉设计，跟进项目上线发布。'',\n  ''request'' => ''1.美术或相关专业毕业，具备设计相关工作经验2年以上;&nbsp;<br>2.对产品流程、用户流程及用户需求有深入理解，了解网站开发工作流程和页面制作流程;&nbsp;<br>3.有良好的创意理念和页面版式规划能力，能很好的把握色彩与网页布局，熟悉用户体验;&nbsp;<br>4.具备优秀的视觉表达能力,，有门户网页设计与活动专题设计的相关经验，具备自己独有的设计风格,并成功运用在产品设计中。'',\n  ''department'' => ''云加速'',\n  ''work_address'' => ''科技园'',\n  ''company_img'' => ''2016/0129/20160129115418501.jpg'',\n  ''company_simple_name'' => ''迅雷'',\n  ''company_detail_name'' => ''深圳市迅雷网络技术有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(74, 5, 0, 2, 'http://job.zcool.com.cn/posts/6500.html', '', 'array (\n  ''title'' => ''设计作品评审实习生'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039658'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京站酷网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;协助编辑进行UGC内容审核；&nbsp;<br>2.&nbsp;参与策划&执行社区专题活动；<br>3.&nbsp;协助编辑完成“站酷画我”内容审核；<br>'',\n  ''request'' => ''1.&nbsp;&nbsp;热爱设计创意行业，有志于长期从事这一行业。设计相关专业应届毕业生优先；<br>2.&nbsp;&nbsp;注重细节和工作质量，做事认真负责。<br>3.&nbsp;&nbsp;具备设计行业基础知识以及对设计类内容的鉴赏能力；<br>4.&nbsp;&nbsp;熟悉HTML代码，熟悉Photoshop、Dreamweaver等软件，对页面维护有一定经验。<br>&nbsp;<br>实习期满，通过考核可优先转为正式员工，入职待遇从优'',\n  ''department'' => ''内容编辑部'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115418503.jpg'',\n  ''company_simple_name'' => ''站酷网'',\n  ''company_detail_name'' => ''北京站酷网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(75, 5, 0, 2, 'http://job.zcool.com.cn/posts/16904.html', '', 'array (\n  ''title'' => ''高级网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039658'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''深圳市阿牛哥智慧生活医药有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责大型医药电商网站PC端UI界面创意、设计及网页制作；<br>2、负责大型医药电商网站移动端H5版UI界面创意、设计及网页制作；<br>3、负责天猫、京东及管网旗舰店等产品详情页美术创意、设计及网页制作；<br>4、参与用户交互研究，把握官网、天猫等平台整体风格、视觉效果；<br>5、紧密配合产品经理、市场部、开发团队，完成页面设计。<br>6、完成公司的其他UI或平面的设计工作。<br>'',\n  ''request'' => ''1、美术或设计专业本科以上学历；<br>2、扎实的美术基础和设计功底；<br>3、熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4、数量掌握Dreamweaver&nbsp;等网页制作软件,熟悉HTML、CSS等技术；<br>4、对PC端及移动端（APP）UI设计趋势有灵敏触觉和领悟能力；<br>5、对界面设计、图片处理、平面设计有深刻的理解，有敏锐设计感；<br>6、对视觉用户研究有一定经验和见解，对互联网产品可用性有深入的认识；<br>7、有团队精神和工作激情，能适应较高强度的工作环境。<br><br>---------------------------------------------------------------------<br>赶快加入阿牛哥……….<br><br>我们给你的，&nbsp;不会是一份朝九晚五，待遇看资历，上班忙炒股的工作！<br>而是一份让你倍感兴奋、既有前途更有钱途的工作。&nbsp;<br>&nbsp;<br>一个财富弯道超车的机遇<br>行业著名大咖独创的商业模式，上有云端互联的健康管理，下有智慧医疗和智慧药店的专业服务体系，形成完整的健康服务及商业闭环。<br>&nbsp;<br>大咖问你，Are&nbsp;you&nbsp;OK？<br>创始团队包含各领域精英，深受投资界热捧！<br>当接地气的医药，遇到飘天上的智能生活，连接的机遇悄然发生，火箭开始准备起飞，你准备好跟着我们去改变中国，去成为中国智慧健康领域的阿牛哥吗？<br>&nbsp;<br>开放、个性是唯一标签<br>开放办公环境，85、90后妹子靓仔遍地，我们鼓励你提出不同观点，支持随时开撕！<br>至于领导？领导是什么？是牛么？可以拉马车么？<br>&nbsp;<br>我们唯一的承诺是你可以完全做你自己，告别职场“装”时代！<br>我们为每位提供良好的发展空间，如果你能一个人顶几个人用，快速适应环境且扛得住压力，那么毫不犹豫来上班吧！<br>否则，你失去的会是一个短时间内加速成长自己，同时也失去高成长高回报的高速发展空间的机会。<br>这儿，有你最想要的青春！<br>'',\n  ''department'' => ''用户体验设计部'',\n  ''work_address'' => ''南山大道'',\n  ''company_img'' => ''2016/0129/20160129115418955.png'',\n  ''company_simple_name'' => ''阿牛哥'',\n  ''company_detail_name'' => ''深圳市阿牛哥智慧生活医药有限公司'',\n  ''company_home_page_url'' => ''http://www.zanwj.com/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.zanwj.com/'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">移动医疗</span>          	          	<span class="label">医药电商</span>          	          	<span class="label">良好的办公环境</span>          	          	<span class="label">优秀的团队</span>          	          	<span class="label">#轻松的工作氛围</span>          	          '',\n)'),
(76, 5, 0, 2, 'http://job.zcool.com.cn/posts/6402.html', '', 'array (\n  ''title'' => ''设计作品评审'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039658'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京站酷网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、配合编辑进行UGC内容的运营，达到站酷网内容运营要求；&nbsp;<br><br>2、参与策划&执行社区专题活动；<br><br>3、配合市场营销部门，对各类商业活动进行协助跟进。'',\n  ''request'' => ''1、&nbsp;热爱设计创意行业，有志于长期从事这一行业。设计相关专业应届毕业生优先；<br><br>2、&nbsp;注重细节和工作质量，做事认真负责；<br><br>3、&nbsp;具备设计行业基础知识以及对设计类内容的鉴赏能力；<br><br>4、&nbsp;熟悉HTML代码，熟悉Photoshop、Dreamweaver等软件，对页面维护有一定经验。'',\n  ''department'' => ''内容编辑部'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115418118.jpg'',\n  ''company_simple_name'' => ''站酷网'',\n  ''company_detail_name'' => ''北京站酷网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(77, 5, 0, 2, 'http://job.zcool.com.cn/posts/14344.html', '', 'array (\n  ''title'' => ''Web全栈工程师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039657'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''上海博广广告传媒有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''负责移动端Web开发，参与创新型的页面制作工作。'',\n  ''request'' => ''1、本科及以上学历，至少1年以上WEB开发经验；<br>2、熟悉HTML5、CSS3、JAVASCRIPT前端编程技能，有响应式页面开发经验<br>3、熟悉Java或C#，有面向对象编程开发经验<br>4、熟悉MySQL或SQL&nbsp;Server，了解视图、存储过程等常用数据库对象<br>5、有较强的逻辑思维与抽象思维，对常用算法有一定了解<br>6、能够在手机上开发出兼容性较好的移动网站者优先<br>PS:公司年轻化，萌宠陪伴，妹子多。'',\n  ''department'' => ''技术部'',\n  ''work_address'' => ''上海市闸北区108创意广场金座716-717室'',\n  ''company_img'' => ''2016/0129/20160129115418675.png'',\n  ''company_simple_name'' => ''博广传媒'',\n  ''company_detail_name'' => ''上海博广广告传媒有限公司'',\n  ''company_home_page_url'' => ''http://www.boguang001.com/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.boguang001.com/'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '',\n)'),
(78, 5, 0, 2, 'http://job.zcool.com.cn/posts/15226.html', '', 'array (\n  ''title'' => ''商品编辑经理'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039657'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京动乐网络科技有限公司'',\n  ''salary'' => ''15k-20k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责商城商品的分类、调整、内容编辑，制定品类运营规则、规划并执行；<br>2、负责建立商城商品编辑部门工作流程、任务量化方案、绩效考核方案；<br>3、负责类目消费信息的搜集与分析，相关商品的消费者心理研究；<br>4、负责所有频道、专场的每日内容更新、编辑工作，&nbsp;完成编辑部门的运营和维护'',\n  ''request'' => ''1、具有本科及以上学历<br>2、具有三年及以上电商行业运营编辑管理工作经验，有母婴编辑管理经验者优先考虑；<br>3、有一定的数据分析能力和文字功底，掌握行业知识，了解行业动态；<br>4、具备出色的统筹能力、团队协作能力，扎实敬业'',\n  ''department'' => ''电商运营部'',\n  ''work_address'' => ''北京市朝阳区酒仙桥10号恒通国际商务园B12C三层'',\n  ''company_img'' => ''2016/0129/20160129115417468.png'',\n  ''company_simple_name'' => ''动乐网'',\n  ''company_detail_name'' => ''北京动乐网络科技有限公司'',\n  ''company_home_page_url'' => ''http://www.51dongle.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.51dongle.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '',\n)'),
(79, 5, 0, 2, 'http://job.zcool.com.cn/posts/19031.html', '', 'array (\n  ''title'' => ''包装设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039657'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京创锐文化传媒有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责聚美优品产品包装设计<br>2、能够独立完成设计的整体方案，具备丰富的空间想象力及创新能力；<br>3、对色彩敏感，对流行有敏锐的洞察力，有悟性；&nbsp;<br>4、能很好地在设计中体现品牌设计理念，充分理解需求、设计思路符合市场产品的规律；'',\n  ''request'' => ''1.&nbsp;正规院校大学专科以上学历，包装或平面设计相关专业<br>2.&nbsp;熟悉印刷工艺、印刷流程等<br>3.&nbsp;熟练使用Photoshop、Illustrator等相关工作软件<br>4.&nbsp;有化妆品包装设计经验者优先<br>5.&nbsp;善于表达和沟通，可以进行部门间的合作 <br>6.&nbsp;请附简历及作品'',\n  ''department'' => ''OBM事业部'',\n  ''work_address'' => ''东四十条A口，中汇广场B座20层'',\n  ''company_img'' => ''2016/0129/20160129115417424.png'',\n  ''company_simple_name'' => ''聚美优品'',\n  ''company_detail_name'' => ''北京创锐文化传媒有限公司'',\n  ''company_home_page_url'' => ''http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq'',\n  ''enterprise_size'' => ''500-1000人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(80, 5, 0, 2, 'http://job.zcool.com.cn/posts/7670.html', '', 'array (\n  ''title'' => ''资深WEB设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039657'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''传成文化传媒（上海）有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责公司官网、产品网站及专题页、运营、推广等相关页面设计；<br>2、负责产品后台页面设计调试及操作体验优化；<br>3、把控页面视觉方向，与各部门顺畅沟通，高标准按时完成页面设计任务；<br>4、不断学习先进WEB设计理念，持续改进设计思路和方法<br>'',\n  ''request'' => ''1、3年以上网页设计工作经验，有成功的线上作品；<br>2、优秀的网站设计理念和审美理念，能根据产品特色快速制定设计标准；<br>3、熟练操作Photoshop、Illustrator、Flash等相关设计软件；<br>4、熟练使用HTML、CSS、JS等网页技术，能够和产品、工程师进行良好的沟通；<br>5、有高度的责任心，具备优秀合作态度、沟通能力及团队精神，并富有工作激情、创造力和责任感，能承受高强度的工作压力；<br>6、有团队管理经验者优先。<br>'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115417304.jpg'',\n  ''company_simple_name'' => ''Earth2113'',\n  ''company_detail_name'' => ''传成文化传媒（上海）有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''艺术/文化传播'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(81, 5, 0, 2, 'http://job.zcool.com.cn/posts/8167.html', '', 'array (\n  ''title'' => ''web前端工程师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039656'',\n  ''recruit_num'' => ''10名'',\n  ''company'' => ''上海友尊文化传播有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、Web页面和交互制作于开发。<br>2、移动客户端应用和交互制作(HTML5、mobile&nbsp;js)。<br>3、要有团队意识、良好的合作态度、激情、责任心和沟通能力。<br>'',\n  ''request'' => ''1、&nbsp;熟练掌握DIV&nbsp;CSS样式编写，能精确规划网页结构，融入bootstrap、foundation等新颖技术,熟悉canvas绘图原理。<br>2、&nbsp;熟悉Dreamweaver、webstorm等设计软件，并根据界面设计图制作出符合规范的网页。<br>3、&nbsp;熟练运用各种javascript网页特效。熟悉jq、angularjs、json等js开发框架。<br>注：按照产品计划完成前端实现、符合web标准并保证质量。熟悉HTTP协议及W3C相关互联网规范；较强的文档编写能力；熟悉Jquery框架，熟练掌握Javascript。<br>UIMIX感谢设计师小主、贵人们的投递：<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;丰厚项目季度奖及超级棒棒哒年终奖&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！）<br>公司网址：www.uimix.com<br>（备注：薪资待遇根据能力定义，以上只是大框架，能者多酬劳！）<br>'',\n  ''department'' => ''开发部'',\n  ''work_address'' => ''上海市-宝山区'',\n  ''company_img'' => ''2016/0129/20160129115416151.jpg'',\n  ''company_simple_name'' => ''uimix'',\n  ''company_detail_name'' => ''上海友尊文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.uimix.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.uimix.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '',\n)'),
(82, 5, 0, 2, 'http://job.zcool.com.cn/posts/7798.html', '', 'array (\n  ''title'' => ''资深/网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039656'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''百互润贸易（上海）有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、按策划方案及网页设计规范进行网页美工设计，把握网页的整体风格及视觉效果&nbsp;<br>2、配合业务部门各类公关广告活动的推广页面设计工作：包括UI界面、横幅广告、邮件DM&nbsp;<br>3、设计友好的网页互交界面：包括专题设计、视觉设计、互交设计、用户体验和可用性分析&nbsp;<br>4、根据品牌风格定位和品牌推广策略，制作完善的客户提案&nbsp;<br>5、负责后期页面builder，后期维护工作&nbsp;<br>6、负责策划中项目的创意概念提供与沟通<br><br>'',\n  ''request'' => ''1、大专及以上学历，美术、设计、计算机等相关专业&nbsp;<br>2、三年以上大型网站网页设计、制作经验。擅长图标设计，整体配色设计&nbsp;<br>3、熟练掌握网站主体风格设计，UI交互设计，用户体验设计&nbsp;<br>4、精通Photoshop、Flash、Illustrators、等设计软件，熟悉HTML、JavaScript&nbsp;DIV&nbsp;+&nbsp;CSS制作规范，架构页面程序&nbsp;<br>5、熟悉网页制作流程，能够独立完成首页及各级页面设计，动画以及HTML静态页面制作&nbsp;<br>6、了解网页SEO优化，web标准等&nbsp;<br>7、具有较高的艺术设计能力和美术功底，有一定的创意策划能力。对设计潮流把握准确&nbsp;<br>8、有优秀的团队合作意识，学习沟通能力。耐心、诚恳，有强烈的责任心和积极主动的工作态度&nbsp;<br>9、具有成熟的商业作品、丰富的设计案例尤佳<br>'',\n  ''department'' => ''消费品事业部'',\n  ''work_address'' => ''上海市-静安区'',\n  ''company_img'' => ''2016/0129/20160129115416600.jpg'',\n  ''company_simple_name'' => ''百润'',\n  ''company_detail_name'' => ''百互润贸易（上海）有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''外商独资'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(83, 5, 0, 2, 'http://job.zcool.com.cn/posts/19680.html', '', 'array (\n  ''title'' => ''高级美术指导'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039656'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''宁波中哲慕尚电子商务有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''宁波 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''我们需要你做什么？<br>1、	店铺整体视觉设计方向指导及建议；<br>2、	进行高质量的产品视觉设计；<br>3、	完成中等以上活动项目的平面设计工作，与文案、运营协作进行设计提案；<br>4、	有效指导团队完成设计工作；<br>5、	理解视觉营销，进行数据分析与提案。<br>'',\n  ''request'' => ''我们需要怎样的你？<br>1、	精通Photoshop，并熟练使用AI、AE、DW等软件；<br>2、	优秀的沟通协调和团队合作能力，对互联网用户行为及习惯有深刻理解；<br>3、	绝佳的审美和创新能力，符合电子商务唯快不破的理念；<br>4、	具备整体运营思路，架构店铺视觉设计方向。<br>'',\n  ''department'' => ''品牌项目部'',\n  ''work_address'' => ''杉杉路111号'',\n  ''company_img'' => ''2016/0129/20160129115416110.png'',\n  ''company_simple_name'' => ''GXG'',\n  ''company_detail_name'' => ''宁波中哲慕尚电子商务有限公司'',\n  ''company_home_page_url'' => ''https://gxg.tmall.com'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''https://gxg.tmall.com'',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">好玩</span>          	          	<span class="label">创意</span>          	          	<span class="label">团队旅行</span>          	          	<span class="label">带薪假期</span>          	          	<span class="label">各种趴</span>          	          	<span class="label">时尚high</span>          	          '',\n)'),
(84, 5, 0, 2, 'http://job.zcool.com.cn/posts/7555.html', '', 'array (\n  ''title'' => ''创意文案'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039656'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''光合线（北京）广告策划有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''你必须是：<br>紧跟潮流，思维活跃<br>文艺起来像张爱玲，二逼起来像留一手<br>的普通青年<br><br>你最好是：<br>干过几年广告（资历不重要，我们更看重你这个人）<br>又碰巧伺候过互联网金融、快消之类的客户（看，我们的客户很高大上吧）<br>爱玩三国杀（因为我们爱玩，这是一种深刻的“企业文化”）<br><br>你要做的是：<br>想概念，写东西'',\n  ''request'' => ''看作品<br>'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''北京市-朝阳区'',\n  ''company_img'' => ''2016/0129/20160129115416276.jpg'',\n  ''company_simple_name'' => ''光合线广告'',\n  ''company_detail_name'' => ''光合线（北京）广告策划有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(85, 5, 0, 2, 'http://job.zcool.com.cn/posts/18701.html', '', 'array (\n  ''title'' => ''动画师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039655'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''深圳市青木文化传播有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、熟悉动画原理，有动画方面自己的创意。<br><br>2、精通flash、AE、PS,无纸动画软件。<br><br>3、具备动画制作的基础，懂得动画表演、运动规律、视听语言等。'',\n  ''request'' => ''1、大专以上学历，有AE动画经验优先。<br><br>2、具备较好的美术修养，有构图意识，色彩关系意识，画面层次意识等。<br><br>3、良好的理解能力和学习能力，对待工作认真负责，善于思考，能够高效高质独立的完成工作。<br><br>PS：投简历请附上作品。'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''南山大道与创业路交界处南园枫叶大厦16M'',\n  ''company_img'' => ''2016/0129/20160129115415194.jpg'',\n  ''company_simple_name'' => ''treedom'',\n  ''company_detail_name'' => ''深圳市青木文化传播有限公司'',\n  ''company_home_page_url'' => ''http://treedom.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''treedom.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          '',\n)'),
(86, 5, 0, 2, 'http://job.zcool.com.cn/posts/2846.html', '', 'array (\n  ''title'' => ''WEB设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039655'',\n  ''recruit_num'' => ''10名'',\n  ''company'' => ''广州华多网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''广州 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责网站产品界面设计、制定相关产品的设计规范； &lt;br&gt;2、根据需求提供界面优化建议，完成产品最终的视觉设计； &lt;br&gt;3、负责网站页面设计/专题及产品日常维护性设计和新项目的开发性界面设计工作。 &lt;br&gt;   '',\n  ''request'' => ''-最好是美术专业，本科或以上。&lt;br&gt;-最好有两年以上相关领域从业经验。&lt;br&gt;-最好热爱游戏，了解多玩和YY的产品。&lt;br&gt;-最好年轻有活力，开朗易沟通。&lt;br&gt;-最好有绝活儿，平时深藏不露，关键时刻可以拯救世界的那种。&lt;br&gt;如果以上你都不具备，问题也不大，但以下条件你必须具备:&lt;br&gt;必须有责任心&lt;br&gt;必须诚实正直&lt;br&gt;必须热爱设计&lt;br&gt;必须能拿出来一堆很酷的作品。&lt;br&gt;&lt;br&gt;简历和作品请发至 yypic@yy.com &lt;br&gt;标题格式：【广州】WEB设计师+姓名 or 【珠海】WEB设计师+姓名 &lt;br&gt;  '',\n  ''department'' => ''YY'',\n  ''work_address'' => ''广东省-广州市-天河区'',\n  ''company_img'' => ''2016/0129/20160129115415927.jpg'',\n  ''company_simple_name'' => ''多玩YY'',\n  ''company_detail_name'' => ''广州华多网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(87, 5, 0, 2, 'http://job.zcool.com.cn/posts/19290.html', '', 'array (\n  ''title'' => ''H5移动端研发工程师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039655'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''北京百舜华年文化传播有限公司'',\n  ''salary'' => ''20k-25k'',\n  ''workin_place'' => ''北京 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''利用HTML5相关技术实现趣味休闲游戏研发，移动端内容维护；<br>解决移动设备包括iOS和Android的WebKit兼容性问题；'',\n  ''request'' => ''熟悉H5开发常用算法；<br>精通Javascript、HTML/HTML5/XML、CSS/CSS3、Ajax、html5&nbsp;Canvas等前端开发技术<br>熟悉cocos2d-html5、cocos2d-jsbinding、QuarkJS或createsJS等html5框架<br>具有HTML5开发经验，熟悉html5标准；<br>使用HTML5的相关技术进行设计和开发，包括各种UI的研发；<br>使用HTML5进行图形化设计，制作动画效果；'',\n  ''department'' => ''开发部'',\n  ''work_address'' => ''北京市东城区银河soho(a座)'',\n  ''company_img'' => ''2016/0129/20160129115415153.png'',\n  ''company_simple_name'' => ''魔漫相机'',\n  ''company_detail_name'' => ''北京百舜华年文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.momentcamoffical.com'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.momentcamoffical.com'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">九险一金</span>          	          	<span class="label">下午茶</span>          	          	<span class="label">零食铺子</span>          	          	<span class="label">员工活动</span>          	          	<span class="label">14薪</span>          	          	<span class="label">艺术气息浓郁</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">节日福利丰厚</span>          	          	<span class="label">成长空间</span>          	          '',\n)'),
(88, 5, 0, 2, 'http://job.zcool.com.cn/posts/7252.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039655'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''上海班田企业形象策划有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、调研客户的品牌，做最适合客户的设计；2、深入理解用户体验，做最易用的设计； 3、细节的完美体现，做最精致的设计； 4、沟通顺畅，高效对接工作每个环节；'',\n  ''request'' => ''1、专科及以上学历；2、一年以上网页设计工作经验； 3、具有优秀的审美能力以及独特的创意，有较强的平面设计和网页设计创意能力； 4、精通Photoshop、Illustrator等设计软件（有优秀作品者优先） 5、对HTML、DIV+CSS布局有一定了解；'',\n  ''department'' => '''',\n  ''work_address'' => ''上海市-杨浦区'',\n  ''company_img'' => ''2016/0129/20160129115415740.png'',\n  ''company_simple_name'' => ''班田互动创意'',\n  ''company_detail_name'' => ''上海班田企业形象策划有限公司'',\n  ''company_home_page_url'' => ''http://www.brandsh.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.brandsh.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">数字营销</span>          	          	<span class="label">网页设计</span>          	          	<span class="label">社交媒体</span>          	          	<span class="label">APP</span>          	          '',\n)'),
(89, 5, 0, 2, 'http://job.zcool.com.cn/posts/13547.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039654'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海凯淳实业有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验3-5年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.负责互联网推广及全网电商平台创意视觉管理（利用高质量的视觉创意，达成高转化的实际售卖效果）；<br>2.负责店铺产品的界面设计，制定相关产品的设计规范；<br>3.负责辅助线下项目的配合物料设计；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。<br><br>'',\n  ''request'' => ''1、具有丰富互动广告及商业网站设计和制作经验，热衷提供高质量、简洁、具有传播力的视觉创意；<br>2、品德端正，性情温善，具有良好的沟通能力，理解力强，有团队合作意识，具有敬业负责的精神；<br>3、具有良好的美术设计功底，不低于三年同等行业工作经验，一经录用，公司将提供有足够竞争力的薪资及发展环境；<br>4、精通Photoshop，熟悉&nbsp;Flash、Illustrator等设计制作软件；<br>5、能吃苦耐劳，可接受加班；<br>6、简历中必须提供近期设计作品及最成功的作品。<br><br>工作地址<br>上海市南京西路388号仙乐斯广场'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''上海市南京西路388号仙乐斯广场'',\n  ''company_img'' => ''2016/0129/20160129115414721.jpg'',\n  ''company_simple_name'' => ''凯淳实业'',\n  ''company_detail_name'' => ''上海凯淳实业有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1000人以上'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '',\n)'),
(90, 5, 0, 2, 'http://job.zcool.com.cn/posts/4803.html', '', 'array (\n  ''title'' => ''网页重构工程师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039654'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''深圳市玖作文化传播有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''我们服务：腾讯、京东、网易、迅雷、百度、一号店等。<br>我们所做的东西，会在这些平台发布，让你的作品得到全国人的关注、议论。<br>与行业最TOP的人共事，获得行业新资料及知识。<br>加入我们，我们是WISEMIND&nbsp;-&nbsp;玖作文化。'',\n  ''request'' => ''要求<br>1，精通XHTML及DIV布局重构，可快速构建稳健的HTML页面，精通CSS2.0样式表。<br>2，熟悉jQuery等常用前端代码库的使用。<br>3，熟悉html5及css3，有案例者优先。<br>4，对前端技术有强烈的兴趣，喜欢钻研；<br>5，踏实可靠，对待工作有强烈责任心，沟通良好；<br>6，工作经验1-2年；&nbsp;<br><br>官网：www.wisemind.cc<br>微博：weibo.com/szwisemind<br>邮箱：wisemindcareer@qq.com'',\n  ''department'' => ''开发部'',\n  ''work_address'' => ''广东省-深圳市-南山区'',\n  ''company_img'' => ''2016/0129/20160129115414127.jpg'',\n  ''company_simple_name'' => ''WISEMIND'',\n  ''company_detail_name'' => ''深圳市玖作文化传播有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)'),
(91, 5, 0, 2, 'http://job.zcool.com.cn/posts/7586.html', '', 'array (\n  ''title'' => ''视觉设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039654'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海迈若网络科技有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''网页设计，UI相关工作'',\n  ''request'' => ''任职要求：&nbsp;<br>1.&nbsp;有较强的美术功底和良好的设计表现力，能准确把握网站的整体风格及视觉表现，对网站的结构策划有一定经验。<br>2.&nbsp;三年以上网站设计、有平面设计经验者优先&nbsp;。&nbsp;<br>3.&nbsp;领悟能力强，能够理解先进的技术和概念，较强的创新能力。&nbsp;<br>4.&nbsp;精通Photoshop，&nbsp;flash，fireworks&nbsp;等软件。&nbsp;<br>5.&nbsp;良好的沟通能力及团队协作能力，富有责任心，学习能力强，能承受较强的工作压力&nbsp;'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市-长宁区'',\n  ''company_img'' => ''2016/0129/20160129115414243.jpg'',\n  ''company_simple_name'' => ''迈若网络'',\n  ''company_detail_name'' => ''上海迈若网络科技有限公司'',\n  ''company_home_page_url'' => '''',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => '''',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">季度奖金</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">节日福利</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">团队轻松</span>          	          	<span class="label">工作激情</span>          	          '',\n)'),
(92, 5, 0, 2, 'http://job.zcool.com.cn/posts/12250.html', '', 'array (\n  ''title'' => ''平面设计'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039654'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海态趣服装有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''岗位职责： <br>1. 负责品牌平面视觉的形象设计 <br>2. 设计品牌画册、DM、礼品包装、海报、店铺平面视觉、网站视觉、活动视觉等 <br>3. 监督跟进所有平面物料最后成品质量<br>4. 大片拍摄策划提案，监控大片质量 5. 以及上级安排的其它任务 '',\n  ''request'' => ''职位要求： <br>1. 了解潮流品牌风格，把握潮牌调性<br> 2. 能熟练运用Photoshop、Illustrator、Dreamweaver等应用软件 <br>3. 成熟的绘画技巧，对色彩、图形、字体敏感；有丰富的想象力和创造力 <br>4. 有团队合作精神，认真负责 <br>5. 需要有1-2年相关工作经验<br> 6. 有相关行业经验的优先录用  '',\n  ''department'' => ''市场部'',\n  ''work_address'' => ''上海世贸商城'',\n  ''company_img'' => ''2016/0129/20160129115414147.jpg'',\n  ''company_simple_name'' => ''THETHING'',\n  ''company_detail_name'' => ''上海态趣服装有限公司'',\n  ''company_home_page_url'' => ''http://www.thething.cn'',\n  ''industry_attr'' => ''其他'',\n  ''company_home_page_name'' => ''www.thething.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)');
INSERT INTO `zh_collection_content` (`id`, `nodeid`, `siteid`, `status`, `url`, `title`, `data`) VALUES
(93, 5, 0, 2, 'http://job.zcool.com.cn/posts/14364.html', '', 'array (\n  ''title'' => ''资深网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039654'',\n  ''recruit_num'' => ''5名'',\n  ''company'' => ''上海磐特文化传播有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验5-7年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''参与网站、微站、app等项目的设计和建设提报<br>设计和创意平面主视觉和网站主视觉layout；<br>和网页程序员沟通，协助完成视觉设计到网页制作的转变；<br>制作网页前端程序，html页面，css，html5，切片<br>熟知企业官网、电商类网站、crm类后台管理；<br>维护更新网站内容；<br>能独立提出多种可执行设计方案，并撰写PPT说明。'',\n  ''request'' => ''有独立操作网整站设计经验<br>对网页平面设计、app界面设计熟练掌握<br>对网页前端程序、html、css掌握，会html5者俱佳<br>懂得后台管理和程序是怎么一回事，能顺利和程序员共同协作并测试<br>具有一定的视觉眼光和品味，善于寻找网页设计素材，提高工作效率<br>擅长表达自己的设计思路和想法去说服客户<br>有一定的设计和传播素材库，所以反应迅速<br>抗压能力强、体力好<br>需附作品'',\n  ''department'' => ''数字广告部'',\n  ''work_address'' => ''上海市徐汇区田林路192号华鑫科技园101室'',\n  ''company_img'' => ''2016/0129/20160129115414297.png'',\n  ''company_simple_name'' => ''美腾库博'',\n  ''company_detail_name'' => ''上海磐特文化传播有限公司'',\n  ''company_home_page_url'' => ''http://www.exmatecube.com '',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.exmatecube.com '',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">创意设计</span>          	          	<span class="label">数字广告</span>          	          	<span class="label">涨工资快</span>          	          	<span class="label">有高手带</span>          	          	<span class="label">老板幽默</span>          	          	<span class="label">气氛轻松</span>          	          	<span class="label">交通方便</span>          	          	<span class="label">团队旅游</span>          	          	<span class="label">可午睡</span>          	          '',\n)'),
(94, 5, 0, 2, 'http://job.zcool.com.cn/posts/15735.html', '', 'array (\n  ''title'' => ''包装设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039653'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海一融设计咨询有限公司'',\n  ''salary'' => ''12k-15k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''包装设计师，具备3d设计能力，如善用c4d软件。&nbsp;协助并执行设计概念'',\n  ''request'' => ''包装设计师，具备3d设计能力，如善用c4d软件。&nbsp;协助并执行设计概念'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''淮海西路666号2206室'',\n  ''company_img'' => ''2016/0129/20160129115413929.jpg'',\n  ''company_simple_name'' => ''Rong'',\n  ''company_detail_name'' => ''上海一融设计咨询有限公司'',\n  ''company_home_page_url'' => ''http://www.rong-design.com'',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => ''www.rong-design.com'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          '',\n)'),
(95, 5, 0, 2, 'http://job.zcool.com.cn/posts/16903.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039653'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''深圳市阿牛哥智慧生活医药有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''深圳 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、负责大型医药电商网站PC端UI界面创意、设计及网页制作；<br>2、负责大型医药电商网站移动端H5版UI界面创意、设计及网页制作；<br>3、负责天猫、京东及管网旗舰店等产品详情页美术创意、设计及网页制作；<br>4、参与用户交互研究，把握官网、天猫等平台整体风格、视觉效果；<br>5、紧密配合产品经理、市场部、开发团队，完成页面设计。<br>6、完成网页的制作；<br>7、完成公司的其他UI或平面的设计工作。<br>'',\n  ''request'' => ''1、美术或设计专业专科以上学历；<br>2、扎实的美术基础和设计功底；<br>3、熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4、数量掌握Dreamweaver&nbsp;等网页制作软件,熟悉HTML、CSS等技术；<br>4、对PC端及移动端（APP）UI设计趋势有灵敏触觉和领悟能力；<br>5、对界面设计、图片处理、平面设计有深刻的理解，有敏锐设计感；<br>6、对视觉用户研究有一定经验和见解，对互联网产品可用性有深入的认识；<br>7、有团队精神和工作激情，能适应较高强度的工作环境。<br><br>---------------------------------------------------------------------<br>赶快加入阿牛哥……….<br><br>我们给你的，&nbsp;不会是一份朝九晚五，待遇看资历，上班忙炒股的工作！<br>而是一份让你倍感兴奋、既有前途更有钱途的工作。&nbsp;<br>&nbsp;<br>一个财富弯道超车的机遇<br>行业著名大咖独创的商业模式，上有云端互联的健康管理，下有智慧医疗和智慧药店的专业服务体系，形成完整的健康服务及商业闭环。<br>&nbsp;<br>大咖问你，Are&nbsp;you&nbsp;OK？<br>创始团队包含各领域精英，深受投资界热捧！<br>当接地气的医药，遇到飘天上的智能生活，连接的机遇悄然发生，火箭开始准备起飞，你准备好跟着我们去改变中国，去成为中国智慧健康领域的阿牛哥吗？<br>&nbsp;<br>开放、个性是唯一标签<br>开放办公环境，85、90后妹子靓仔遍地，我们鼓励你提出不同观点，支持随时开撕！<br>至于领导？领导是什么？是牛么？可以拉马车么？<br>&nbsp;<br>我们唯一的承诺是你可以完全做你自己，告别职场“装”时代！<br>我们为每位提供良好的发展空间，如果你能一个人顶几个人用，快速适应环境且扛得住压力，那么毫不犹豫来上班吧！<br>否则，你失去的会是一个短时间内加速成长自己，同时也失去高成长高回报的高速发展空间的机会。<br>这儿，有你最想要的青春！<br>'',\n  ''department'' => ''用户体验设计部'',\n  ''work_address'' => ''南山大道'',\n  ''company_img'' => ''2016/0129/20160129115413521.png'',\n  ''company_simple_name'' => ''阿牛哥'',\n  ''company_detail_name'' => ''深圳市阿牛哥智慧生活医药有限公司'',\n  ''company_home_page_url'' => ''http://www.zanwj.com/'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''http://www.zanwj.com/'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">移动医疗</span>          	          	<span class="label">医药电商</span>          	          	<span class="label">良好的办公环境</span>          	          	<span class="label">优秀的团队</span>          	          	<span class="label">#轻松的工作氛围</span>          	          '',\n)'),
(96, 5, 0, 2, 'http://job.zcool.com.cn/posts/3565.html', '', 'array (\n  ''title'' => ''资深网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039653'',\n  ''recruit_num'' => ''3名'',\n  ''company'' => ''一加三餐（上海）电子商务有限公司'',\n  ''salary'' => ''8k-12k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验1-3年'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''资深设计师（请务必附作品或链接）<br><br>工作描述：<br>1、艺术设计类专业，并从事网站设计1-2年以上工作经历；<br>2、有良好的美术功底，具有良好的艺术审美观及独特的创意理念；<br>3、负责网站创意、设计、页面制作及网页广告、相关图片、动效等制作工作&nbsp;<br>4、引导并规范网站的界面表现，优化用户体验，并确保技术实施&nbsp;<br>5、配合产品开发进度完成设计工作并适时对相关业务开展提出建议和解决办法&nbsp;<br>6、对设计行业富有激情&nbsp;<br>'',\n  ''request'' => ''职位要求：<br>1、精通Photoshop、Flash、Dreamweaver等工具。&nbsp;<br>2、了解网站建设的流程和网页设计制作流程&nbsp;<br>2、具有一定的美术鉴赏、色彩搭配能力。&nbsp;<br>3、有良好的学习能力、沟通能力及团队协作能力。&nbsp;<br>4、电商设计及相关工作经验者优先。<br>5、提供五个以上个人作品，要求正式上线，并能通过网站地址访问。<br><br>'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''上海市-徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层'',\n  ''company_img'' => ''2016/0129/20160129115413100.png'',\n  ''company_simple_name'' => ''一加三餐'',\n  ''company_detail_name'' => ''一加三餐（上海）电子商务有限公司'',\n  ''company_home_page_url'' => ''http://www.ecmoho.com'',\n  ''industry_attr'' => ''电子商务'',\n  ''company_home_page_name'' => ''www.ecmoho.com'',\n  ''enterprise_size'' => ''200-500人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '',\n)'),
(97, 5, 0, 2, 'http://job.zcool.com.cn/posts/7225.html', '', 'array (\n  ''title'' => ''资深网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039653'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海班田企业形象策划有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1、调研客户的品牌，做最适合客户的设计； 2、深入理解用户体验，做最易用的设计； 3、细节的完美体现，做最精致的设计； 4、沟通顺畅，高效对接工作每个环节； '',\n  ''request'' => ''1. 从事网页设计工作至少5年以上； 2. 美术基本功扎实，对PS/AI/CD/FL应用软件超级熟练； 3. 曾服务过至少3个知名品牌以上，作品数量需要达到30个以上； 4. 对时尚以及社会要有强烈认识； 5. 有独立创新能力及工作执行力； 6. 能与团队人员合作及沟通能力；'',\n  ''department'' => '''',\n  ''work_address'' => ''上海市-杨浦区'',\n  ''company_img'' => ''2016/0129/20160129115413638.png'',\n  ''company_simple_name'' => ''班田互动创意'',\n  ''company_detail_name'' => ''上海班田企业形象策划有限公司'',\n  ''company_home_page_url'' => ''http://www.brandsh.cn'',\n  ''industry_attr'' => ''互联网'',\n  ''company_home_page_name'' => ''www.brandsh.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">数字营销</span>          	          	<span class="label">网页设计</span>          	          	<span class="label">社交媒体</span>          	          	<span class="label">APP</span>          	          '',\n)'),
(98, 5, 0, 2, 'http://job.zcool.com.cn/posts/8990.html', '', 'array (\n  ''title'' => ''互动设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039652'',\n  ''recruit_num'' => ''2名'',\n  ''company'' => ''上海利宣广告有限公司'',\n  ''salary'' => ''5k-8k'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''为一系列知名国际品牌提供互动创意的想法和制作，客户涵盖化妆品，汽车，服装配饰，家装，IT等。<br>主要负责客户的网站（官网，minisite），微信，微博的视觉设计，熟知国内各大社交平台。<br>在创意设计总监的指导下完成客户的创意表现。<br>了解客户需求，并密切与客户部，策略部和其他部门合作，将客户需求贯彻到创意中。<br>注重创意工作的出品质量，保证产品美术创作符合客户的诉求点。<br>维护和提高公司的创意标准和程序。<br><br>请将作品简历发送至以下邮箱：momo.li@net-show.cn&nbsp;,&nbsp;lee.li@net-show.cn&nbsp;,&nbsp;winn.wang@net-show.cn<br><br><br><br><br>'',\n  ''request'' => ''美术设计，UI设计相关专业2年以上经验<br>熟练操作AI，PHOTOSHOP等设计软件<br>有扎实的美术功底，具备手绘能力，略懂程序<br>高度适应能力以及抗压能力<br><br>公司福利<br>每月综合补助（加班餐补，出租车费报销）<br>员工年度体检<br>员工年度旅游（境外为主）<br>组织不定期团建活动（如各类专业培训、拓展训练、聚餐等）<br>庆生会、节日祝福及礼品等<br>'',\n  ''department'' => ''创意部'',\n  ''work_address'' => ''灵石路658号802室（大宁财智中心）'',\n  ''company_img'' => ''2016/0129/20160129115412210.png'',\n  ''company_simple_name'' => ''Net-show'',\n  ''company_detail_name'' => ''上海利宣广告有限公司'',\n  ''company_home_page_url'' => ''http://net-show.cn'',\n  ''industry_attr'' => ''广告/公关/会展'',\n  ''company_home_page_name'' => ''http://net-show.cn'',\n  ''enterprise_size'' => ''50-100人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          	<span class="label">弹性工作</span>          	          	<span class="label">年底分红</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">人性化管理</span>          	          '',\n)'),
(99, 5, 0, 2, 'http://job.zcool.com.cn/posts/7725.html', '', 'array (\n  ''title'' => ''网页设计师'',\n  ''comeform'' => ''站酷招聘'',\n  ''time'' => ''1454039652'',\n  ''recruit_num'' => ''1名'',\n  ''company'' => ''上海态趣服装有限公司'',\n  ''salary'' => ''面议'',\n  ''workin_place'' => ''上海 '',\n  ''experience'' => ''经验不限'',\n  ''full_part_time'' => ''全职'',\n  ''duty'' => ''1.&nbsp;负责网页设计'',\n  ''request'' => ''1.&nbsp;对潮流文化及街头着装风格有独特理解者优先<br>2.&nbsp;能熟练运用Photoshop、Illustratorr等应用软件<br>3.&nbsp;成熟的绘画技巧，对色彩、图形、字体敏感；有丰富的想象力和创造力<br>4.&nbsp;有团队合作精神，认真负责<br>5.&nbsp;需要有1-2年相关工作经验<br>6.&nbsp;有相关行业经验的优先录用'',\n  ''department'' => ''设计部'',\n  ''work_address'' => ''上海市-长宁区'',\n  ''company_img'' => ''2016/0129/20160129115412678.jpg'',\n  ''company_simple_name'' => ''THETHING'',\n  ''company_detail_name'' => ''上海态趣服装有限公司'',\n  ''company_home_page_url'' => ''http://www.thething.cn'',\n  ''industry_attr'' => ''其他'',\n  ''company_home_page_name'' => ''www.thething.cn'',\n  ''enterprise_size'' => ''1-50人'',\n  ''enterprise_nature'' => ''私营企业'',\n  ''enterprise_tag'' => ''           	          '',\n)');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_collection_history`
--

CREATE TABLE IF NOT EXISTS `zh_collection_history` (
  `md5` char(32) NOT NULL,
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`md5`,`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_collection_history`
--

INSERT INTO `zh_collection_history` (`md5`, `siteid`) VALUES
('0347230406f3884c684dfafdab216a1c', 0),
('0717232b483bee8cc80f2a88c812e774', 0),
('08fb15e1b60f1b633abb2e636eea835b', 0),
('0c5dd8836eda8c4ccdcd94a3d7e6d622', 0),
('0cb02081914e74717ae715a52372b2b4', 0),
('1055dd710dc7a6deb726c15ab16b5cd9', 0),
('14b1945ace0c24276b0f18f344219e9b', 0),
('19d7d7b586fd57b83fc262c6f46cee16', 0),
('1c3084a0b700a9e9eb06c9887d3e79f4', 0),
('235785fdd79268bd7a1265b653dbd2fe', 0),
('26f846773cc3682e5a68196e7fe3d778', 0),
('282eadd7cab7ba27c636b004aca809d7', 0),
('2a263a9a543c93d77ad9dc1401677aa0', 0),
('2d574f0b9092fdb0dfd1a643622a75fe', 0),
('2f3153df5828ac094b2db7a0de263d72', 0),
('309facd1d5736cfba241f8076f1a832d', 0),
('3447f708973284a9f52f8f44e3a3a930', 0),
('38a908ab41c0ad8b69ed04d5a9fe7740', 0),
('3b513c766091e5c76fb31bea3e69d745', 0),
('3d4e5ce57ec03535f0e70d752eb7100a', 0),
('43b02202288b209fd731494681e8b6e7', 0),
('4555e558d0338058c27322739f58984b', 0),
('467ca9bbde21e8b0409d25bf7eca01ac', 0),
('47b3a705b86a200e01020e54ae9bb6cc', 0),
('4bca5eafb1df527b138567b4985ce0c4', 0),
('508833e50221fc0900e4941c699b1de0', 0),
('50d730b0e1f4386b393f2e50efe6910d', 0),
('52c44473b2da48139013f6bf840d3139', 0),
('5c08aaf26e25d6841b04eaefd2004425', 0),
('5db65276d23251d0a8b1d7c186e6014e', 0),
('5ee45ebb4217a07d6b22f0f9401e0cbe', 0),
('62be2ec31f62259368911a64e8dac424', 0),
('68181afb89aa8e167e43640cfdff8bf1', 0),
('6902095ec6bb24333eeafa100525573c', 0),
('699207c57c4460277110162eaefcdeae', 0),
('6c94a0c4a6fcbfccf610af6b2ba01559', 0),
('6cd55bfb7ad928d55279bc93672abcf8', 0),
('7408efa0b58bdad56744fc9f63eb77b9', 0),
('74a8d762a802654d23010cb1b4802e9c', 0),
('750443f0e4d2d02759d4fe0dd35083d0', 0),
('793ab1f68e174cd7087a5ce10e1b650f', 0),
('7b6c96df3c525055e58b7889d528d7e9', 0),
('7cddf54a796eccad09d083cc5c728c5b', 0),
('7e665fca74aa6aafccb8162cb50a7d93', 0),
('801e728a027d325fcabc1630deb6008c', 0),
('85f6898aa572bdf55763fb45fd8dbc36', 0),
('8620dbe7bc2007534beac63f5c66d21b', 0),
('920f2588115b552ac80dfb8283deeb57', 0),
('927b0f1ec33d839542f8b3f29225cc9d', 0),
('927b9201112c86ed7403105e50433b52', 0),
('92a8fb11287b56bbd973a5c962d566c7', 0),
('93f377221bf38ba3026d020edb62250d', 0),
('9917db9befc45614da1edbac25cb54ec', 0),
('99f73b0e34b2a0dc8dccdec52d8c2bc8', 0),
('9d0341ddd86a114b62670b34c896d938', 0),
('9ed9491aef6e2c57e6c07656ee04b6f5', 0),
('a10c091182f81df73d42fb632adfd2d9', 0),
('a53f9237fbb1d0b80df3537213451dfa', 0),
('abe4819cad75ac5db87b8064ed045a60', 0),
('ac7844e2fa07ea1e5525734efed3dfc7', 0),
('aec9cc566ae6e6286b030601ae45d073', 0),
('af616d8a2400a77a35cbf06e48cf25b3', 0),
('b0f7fd9ef5012dfe38c22a11a7f1a479', 0),
('b27b6eb536753c22a000ec7e0564e9e1', 0),
('b316dd296afa043624b9a401b67f3187', 0),
('b59a76289eae8730f4ab38d09a809a84', 0),
('b678aa306442bd6dad7229ec6f108999', 0),
('b8261cc3dc24b3bf31c44ba92a42da4d', 0),
('b8673d3a628e84e5791b2acc120dca70', 0),
('badf92b3589a26623213c333fea7811a', 0),
('bae688cbebc5db2de28406cc1952660d', 0),
('beb2e20614f663ee4068ae0c7be1e1b0', 0),
('bffc56cfb9027be0a357da4165662578', 0),
('c08cbe997f15d2cf5ccad6829fd75a9d', 0),
('c16eb87f5ef2e5b59b30053e161787dd', 0),
('c1a8094043335b3bde2a72be4d34255b', 0),
('c1f054f68701bc9ee22c2430628d4827', 0),
('c3094edd22a27a6eda58bb74b6136e7a', 0),
('c47701114d26a0f95d45bec60c8d62c7', 0),
('c627d2fc48016c47ad49ed38df58eb18', 0),
('c84ff4b7f943c6f74b6cf1a0f0cd6b44', 0),
('c8c420df0b0053668f487faa4f060a99', 0),
('cb474fa3be2e88babcd7eeaffc99ebf2', 0),
('cc550d87a53e076c6a8f0d2bfffee5f1', 0),
('d2f54611904e71a203a5e0bf0842607a', 0),
('d31eb0cbec5ad4704ad45aafedf71db0', 0),
('d45205e8d10c2673f0b8aa02897ad335', 0),
('d9b4cbe9b858d30655cf53479e65824d', 0),
('e2cac41b1a4fec29fe194f0db3e55a76', 0),
('eb37625ff040d23518dd8c4b8106bdba', 0),
('ecf0dad6cb3fe067bad990dc897288b0', 0),
('ee82a27887ce6fcbb0e9a7184bb24839', 0),
('f534c89cf9b4ed5ebd4f3f29b1988bc0', 0),
('f6829e457990a332769211c2c421f3fa', 0),
('f99cba0e856f25aba4888ac542d520e6', 0),
('f9a7b6977a8561216d600aa58eead101', 0),
('fb63b0f278e9632d1a9aaf510af9d170', 0),
('fb7f3fd20579c005f5665f7eecd2d301', 0),
('ff66e7ee8c977925c4b1c4a00a55324a', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_collection_node`
--

CREATE TABLE IF NOT EXISTS `zh_collection_node` (
  `nodeid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `lastdate` int(10) unsigned NOT NULL DEFAULT '0',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sourcecharset` varchar(8) NOT NULL,
  `sourcetype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `urlpage` text NOT NULL,
  `pagesize_start` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pagesize_end` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `page_base` char(255) NOT NULL,
  `par_num` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `url_contain` char(100) NOT NULL,
  `url_except` char(100) NOT NULL,
  `url_start` char(100) NOT NULL DEFAULT '',
  `url_end` char(100) NOT NULL DEFAULT '',
  `title_rule` char(100) NOT NULL,
  `title_html_rule` text NOT NULL,
  `author_rule` char(100) NOT NULL,
  `author_html_rule` text NOT NULL,
  `comeform_rule` char(100) NOT NULL,
  `comeform_html_rule` text NOT NULL,
  `time_rule` char(100) NOT NULL,
  `time_html_rule` text NOT NULL,
  `content_rule` char(100) NOT NULL,
  `content_html_rule` text NOT NULL,
  `content_page_start` char(100) NOT NULL,
  `content_page_end` char(100) NOT NULL,
  `content_page_rule` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content_page` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content_nextpage` char(100) NOT NULL,
  `down_attachment` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `watermark` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `coll_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `customize_config` text NOT NULL,
  PRIMARY KEY (`nodeid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `zh_collection_node`
--

INSERT INTO `zh_collection_node` (`nodeid`, `name`, `lastdate`, `siteid`, `sourcecharset`, `sourcetype`, `urlpage`, `pagesize_start`, `pagesize_end`, `page_base`, `par_num`, `url_contain`, `url_except`, `url_start`, `url_end`, `title_rule`, `title_html_rule`, `author_rule`, `author_html_rule`, `comeform_rule`, `comeform_html_rule`, `time_rule`, `time_html_rule`, `content_rule`, `content_html_rule`, `content_page_start`, `content_page_end`, `content_page_rule`, `content_page`, `content_nextpage`, `down_attachment`, `watermark`, `coll_order`, `customize_config`) VALUES
(6, '我的联盟', 0, 0, 'utf-8', 1, 'http://my.68design.net/job?p=(*)', 1, 10, '', 1, '', '', '<table class="project">', '<div class="pagelist">', '<title>[content]</title>', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '', 0, 0, 1, 'array (\n)'),
(5, '站酷招聘', 1454039677, 0, 'utf-8', 1, 'http://job.zcool.com.cn/posts?pageNo=(*)&clickleitou=&post_type=1&city=-1&salary=0&experience=0&working_status=0&sended=0&headhunter=0', 1, 10, '', 1, 'http://job.zcool.com.cn/posts/', '', '<div id="zuixin-zhaopin" class="job-list">', '<div class="bigPage radius" id="pageInfo" align="center">', '<div class="f-40 text-overflow" title="[content]（', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '', 1, 0, 1, 'array (\n  0 => \n  array (\n    ''name'' => ''招聘人数'',\n    ''en_name'' => ''recruit_num'',\n    ''rule'' => '' <span class="f-18">（[content]）</span>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  1 => \n  array (\n    ''name'' => ''招聘公司'',\n    ''en_name'' => ''company'',\n    ''rule'' => ''<p class="f-14 c-666">[content]</p>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  2 => \n  array (\n    ''name'' => ''月薪'',\n    ''en_name'' => ''salary'',\n    ''rule'' => ''<span class="c-ff8600 f-24">[content]</span>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  3 => \n  array (\n    ''name'' => ''工作地点'',\n    ''en_name'' => ''workin_place'',\n    ''rule'' => ''/<div class="f-14 c-999 mt-10">(.*) \\\\/  (.*)  \\\\/  (.*)  \\\\/  (.*)<\\\\/div>/i'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''1'',\n  ),\n  4 => \n  array (\n    ''name'' => ''工作经验'',\n    ''en_name'' => ''experience'',\n    ''rule'' => ''/<div class="f-14 c-999 mt-10">(.*) \\\\/  (.*)  \\\\/  (.*)  \\\\/  (.*)<\\\\/div>/i'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''2'',\n  ),\n  5 => \n  array (\n    ''name'' => ''全职兼职'',\n    ''en_name'' => ''full_part_time'',\n    ''rule'' => ''/<div class="f-14 c-999 mt-10">(.*) \\\\/  (.*)  \\\\/  (.*)  \\\\/  (.*)<\\\\/div>/i'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''3'',\n  ),\n  6 => \n  array (\n    ''name'' => ''岗位职责'',\n    ''en_name'' => ''duty'',\n    ''rule'' => ''<tr>\r\n                <td class="va-t"><strong>岗位职责：</strong></td>\r\n                <td class="va-t c-666">[content]</td>\r\n              </tr>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  7 => \n  array (\n    ''name'' => ''职位要求'',\n    ''en_name'' => ''request'',\n    ''rule'' => ''<tr>\r\n                <td class="va-t" width="80"><strong>职位要求：</strong></td>\r\n                <td class="va-t c-666">[content]</td>\r\n              </tr>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  8 => \n  array (\n    ''name'' => ''所属部门'',\n    ''en_name'' => ''department'',\n    ''rule'' => ''<tr>\r\n                <td class="va-t" width="80"><strong>所属部门：</strong></td>\r\n                <td class="va-t c-666">[content]</td>\r\n              </tr>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  9 => \n  array (\n    ''name'' => ''工作地点'',\n    ''en_name'' => ''work_address'',\n    ''rule'' => ''/<p><\\\\!-- <a href="javascript:;" onClick="baidumap\\\\(\\\\)" class="c-148cf1 r">查看完整地图<\\\\/a> -->(.*)<\\\\/p>/'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => '''',\n  ),\n  10 => \n  array (\n    ''name'' => ''公司图片'',\n    ''en_name'' => ''company_img'',\n    ''rule'' => ''/<div class="qiye-logo opacity radius"><a href="(.*)" target="_blank"><img src="(.*)"><\\\\/a><\\\\/div>/'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''1'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''2'',\n  ),\n  11 => \n  array (\n    ''name'' => ''公司简称'',\n    ''en_name'' => ''company_simple_name'',\n    ''rule'' => ''/<p class="f-24 mt-20"><a href="(.*)" target="_blank">(.*)<\\\\/a><\\\\/p>/'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''2'',\n  ),\n  12 => \n  array (\n    ''name'' => ''公司详细名称'',\n    ''en_name'' => ''company_detail_name'',\n    ''rule'' => ''<p class="f-14 c-666">[content]</p>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  13 => \n  array (\n    ''name'' => ''企业官网网址'',\n    ''en_name'' => ''company_home_page_url'',\n    ''rule'' => ''/<li>企业官网：<a href="(.*)" target="_blank">(.*)<\\\\/a><\\\\/li>/'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''1'',\n  ),\n  14 => \n  array (\n    ''name'' => ''行业属性'',\n    ''en_name'' => ''industry_attr'',\n    ''rule'' => ''<li>行业属性：[content]</li>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  15 => \n  array (\n    ''name'' => ''企业官网名'',\n    ''en_name'' => ''company_home_page_name'',\n    ''rule'' => ''/<li>企业官网：<a href="(.*)" target="_blank">(.*)<\\\\/a><\\\\/li>/'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''1'',\n    ''preg_index'' => ''2'',\n  ),\n  16 => \n  array (\n    ''name'' => ''企业规模'',\n    ''en_name'' => ''enterprise_size'',\n    ''rule'' => ''<li>企业规模：[content]</li>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  17 => \n  array (\n    ''name'' => ''企业性质'',\n    ''en_name'' => ''enterprise_nature'',\n    ''rule'' => ''<li>企业性质：[content]</li>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n  18 => \n  array (\n    ''name'' => ''企业tag'',\n    ''en_name'' => ''enterprise_tag'',\n    ''rule'' => ''<div class="tag-box cl mt-15"> \r\n          	\r\n          	[content]\r\n          	\r\n          </div>'',\n    ''html_rule'' => '''',\n    ''is_image'' => ''0'',\n    ''is_preg'' => ''0'',\n    ''preg_index'' => '''',\n  ),\n)');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_collection_program`
--

CREATE TABLE IF NOT EXISTS `zh_collection_program` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `nodeid` int(10) unsigned NOT NULL DEFAULT '0',
  `modelid` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `config` text NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `siteid` (`siteid`),
  KEY `nodeid` (`nodeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_collection_program`
--

INSERT INTO `zh_collection_program` (`id`, `siteid`, `nodeid`, `modelid`, `catid`, `config`, `table_name`, `program_name`) VALUES
(1, 0, 5, 0, 0, 'array (\n  ''add_introduce'' => ''0'',\n  ''auto_thumb'' => ''0'',\n  ''introcude_length'' => ''200'',\n  ''auto_thumb_no'' => ''1'',\n  ''content_status'' => ''1'',\n  ''map'' => \n  array (\n    ''title'' => ''title'',\n    ''comeform'' => ''comeform'',\n    ''time'' => ''time'',\n    ''recruit_num'' => ''recruit_num'',\n    ''company'' => ''company'',\n    ''salary'' => ''salary'',\n    ''workin_place'' => ''workin_place'',\n    ''experience'' => ''experience'',\n    ''full_part_time'' => ''full_part_time'',\n    ''duty'' => ''duty'',\n    ''request'' => ''request'',\n    ''department'' => ''department'',\n    ''work_address'' => ''work_address'',\n    ''company_img'' => ''company_img'',\n    ''company_simple_name'' => ''company_simple_name'',\n    ''company_detail_name'' => ''company_detail_name'',\n    ''company_home_page_url'' => ''company_home_page_url'',\n    ''industry_attr'' => ''industry_attr'',\n    ''company_home_page_name'' => ''company_home_page_name'',\n    ''enterprise_size'' => ''enterprise_size'',\n    ''enterprise_nature'' => ''enterprise_nature'',\n    ''enterprise_tag'' => ''enterprise_tag'',\n  ),\n)', 'zh_zhanku', '站酷直接保存数据方案');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_comment`
--

CREATE TABLE IF NOT EXISTS `zh_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论mid',
  `mid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目id\n1 基本配置\n2 ',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章aid',
  `content` text NOT NULL COMMENT '评论内容',
  `uid` int(11) NOT NULL COMMENT '用户名',
  `comment_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示 1 显示  0 不显示',
  `pubtime` int(11) NOT NULL DEFAULT '0' COMMENT '发表时间',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id',
  `reply_comment_id` int(11) NOT NULL DEFAULT '0' COMMENT '回复的最顶层评论comment_id',
  PRIMARY KEY (`comment_id`),
  KEY `reply_comment_id` (`reply_comment_id`),
  KEY `cid_aid_state` (`aid`,`cid`,`comment_state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_comment`
--

INSERT INTO `zh_comment` (`comment_id`, `mid`, `cid`, `aid`, `content`, `uid`, `comment_state`, `pubtime`, `pid`, `reply_comment_id`) VALUES
(1, 1, 24, 43, 'aaaaa', 1, 1, 1471947387, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_config`
--

CREATE TABLE IF NOT EXISTS `zh_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称\n',
  `value` text NOT NULL COMMENT '配置值',
  `type` enum('站点配置','微信微博','客服设置','高级配置','上传配置','会员配置','邮箱配置','安全配置','水印配置','内容相关','性能优化','伪静态','COOKIE配置','SESSION配置','网店信息','EC基本设置','EC显示设置','EC购物流程','EC商品显示设置','自定义') NOT NULL DEFAULT '站点配置' COMMENT '配置类型1 站点配置2 性能设置3 上传配置4 交互设置5 会员设置',
  `title` char(100) NOT NULL,
  `show_type` enum('文本','数字','布尔(1/0)','多行文本','select','image') DEFAULT '文本',
  `message` varchar(255) DEFAULT NULL COMMENT '提示',
  `order_list` smallint(6) unsigned DEFAULT '100' COMMENT '排序',
  `store_range` varchar(255) NOT NULL,
  `webid` int(11) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统配置' AUTO_INCREMENT=197 ;

--
-- テーブルのデータのダンプ `zh_config`
--

INSERT INTO `zh_config` (`id`, `name`, `value`, `type`, `title`, `show_type`, `message`, `order_list`, `store_range`, `webid`) VALUES
(1, 'WEBNAME', 'METACMSデモサイト', '站点配置', 'admin_config_webname', '文本', '', 1, '', 1),
(2, 'ICP', 'metaphase', '站点配置', 'admin_config_icp', '文本', '', 100, '', 1),
(3, 'HTML_PATH', 'h', '站点配置', 'admin_config_html_path', '文本', '', 8, '', 1),
(4, 'COPYRIGHT', 'Copyright © 2014 METACMS', '站点配置', 'admin_config_copyright', '文本', '', 100, '', 1),
(5, 'KEYWORDS', 'HIS中国  SEO关键字', '站点配置', 'admin_config_keywords', '文本', '', 100, '', 1),
(6, 'DESCRIPTION', 'HIS中国 SEO说明', '站点配置', 'admin_config_description', '多行文本', '', 100, '', 1),
(7, 'EMAIL', '136871204@qq.com', '站点配置', 'admin_config_email', '文本', '', 100, '', 1),
(8, 'BACKUP_DIR', 'backup', '内容相关', 'admin_config_backup_dir', '文本', '', 100, '', 1),
(9, 'WEB_OPEN', '1', '站点配置', 'admin_config_web_open', '布尔(1/0)', '', 100, '', 1),
(10, 'AUTH_KEY', 'metaphase.co.jp', '安全配置', 'admin_config_auth_key', '文本', '', 100, '', 1),
(63, 'UPLOAD_PATH', 'upload', '上传配置', 'admin_config_upload_path', '文本', '', 100, '', 1),
(19, 'UPLOAD_IMG_PATH', 'img', '上传配置', 'admin_config_upload_img_path', '文本', '', 100, '', 1),
(20, 'ALLOW_TYPE', 'jpg,jpeg,png,bmp,gif', '上传配置', 'admin_config_allow_type', '文本', '', 100, '', 1),
(21, 'ALLOW_SIZE', '10480000000', '上传配置', 'admin_config_allow_size', '数字', '', 100, '', 1),
(22, 'WATER_ON', '0', '上传配置', 'admin_config_water_on', '布尔(1/0)', '', 100, '', 1),
(24, 'MEMBER_VERIFY', '1', '会员配置', 'admin_config_member_verify', '布尔(1/0)', '', 1, '', 1),
(25, 'REG_SHOW_CODE', '1', '会员配置', 'admin_config_reg_show_code', '布尔(1/0)', '', 2, '', 1),
(68, 'WEB_TITLE', '日本屋', '站点配置', 'admin_config_web_title', '文本', '', 2, '', 1),
(27, 'REG_INTERVAL', '0', '会员配置', 'admin_config_reg_interval', '数字', 'admin_config_reg_interval_message', 100, '', 1),
(28, 'DEFAULT_MEMBER_GROUP', '4', '会员配置', 'admin_config_default_member_group', '数字', '', 100, '', 1),
(29, 'TOKEN_ON', '0', '会员配置', 'admin_config_token_on', '布尔(1/0)', '', 100, '', 1),
(30, 'LOG_KEY', 'metaphase.co.jp', '安全配置', 'admin_config_log_key', '文本', '', 100, '', 1),
(61, 'SESSION_NAME', 'zhsid', 'SESSION配置', 'admin_config_session_name', '文本', 'admin_config_session_name_message', 100, '', 1),
(17, 'super_admin_key', 'SUPER_ADMIN', '高级配置', 'admin_config_super_admin_key', '文本', '', 100, '', 1),
(64, 'TEL', '13167001526', '站点配置', 'admin_config_tel', '文本', '', 100, '', 1),
(41, 'WATER_TEXT', 'metaphase.co.jp', '水印配置', 'admin_config_water_text', '文本', '', 100, '', 1),
(42, 'WATER_TEXT_SIZE', '16', '水印配置', 'admin_config_water_text_size', '数字', '', 100, '', 1),
(43, 'WATER_IMG', 'data/water/water.png', '水印配置', 'admin_config_water_img', '文本', '', 100, '', 1),
(44, 'WATER_PCT', '80', '水印配置', 'admin_config_water_pct', '数字', '', 100, '', 1),
(45, 'WATER_QUALITY', '90', '水印配置', 'admin_config_water_quality', '数字', '', 100, '', 1),
(46, 'WATER_POS', '9', '水印配置', 'admin_config_water_pos', '数字', '', 100, '', 1),
(47, 'DEL_CONTENT_MODEL', '0', '内容相关', 'admin_config_del_content_model', '布尔(1/0)', '', 100, '', 1),
(67, 'CREATE_INDEX_HTML', '0', '站点配置', 'admin_config_create_index_html', '布尔(1/0)', '', 9, '', 1),
(31, 'REPLY_CREDITS', '1', '会员配置', 'admin_config_reply_credits', '文本', 'admin_config_reply_credits_message', 100, '', 1),
(48, 'DOWN_REMOTE_PIC', '1', '内容相关', 'admin_config_down_remote_pic', '布尔(1/0)', '', 100, '', 1),
(49, 'AUTO_DESC', '1', '内容相关', 'admin_config_auto_desc', '布尔(1/0)', '', 100, '', 1),
(50, 'AUTO_THUMB', '1', '内容相关', 'admin_config_auto_thumb', '布尔(1/0)', '', 100, '', 1),
(51, 'UPLOAD_IMG_MAX_WIDTH', '2000', '内容相关', 'admin_config_upload_img_max_width', '数字', 'admin_config_upload_img_max_width_message', 100, '', 1),
(52, 'UPLOAD_IMG_MAX_HEIGHT', '2000', '内容相关', 'admin_config_upload_img_max_height', '数字', 'admin_config_upload_img_max_height_message', 100, '', 1),
(32, 'MEMBER_OPEN', '1', '会员配置', 'admin_config_member_open', '布尔(1/0)', '', 100, '', 1),
(11, 'WEB_CLOSE_MESSAGE', 'サイトはメンテナンス中、後で訪問してください...', '站点配置', 'admin_config_web_close_message', '文本', '', 100, '', 1),
(12, 'WEB_STYLE', 'v5', '站点配置', 'admin_config_web_style', '文本', '', 100, '', 1),
(13, 'QQ', '136871204', '站点配置', 'admin_config_qq', '文本', '', 100, '', 1),
(14, 'WEIBO', 'http://weibo.com/u/1594449317/home?wvr=5&sudaref=www.baidu.com', '站点配置', 'admin_config_weibo', '文本', '', 100, '', 1),
(15, 'TWEIBO', 'hong@metaphase.co.jp', '站点配置', 'admin_config_tweibo', '文本', '', 100, '', 1),
(16, 'ENTERPRISE_EMAIL', 'hong@metaphase.co.jp', '站点配置', 'admin_config_enterprise_email', '文本', '', 100, '', 1),
(33, 'INIT_CREDITS', '100', '会员配置', 'admin_config_init_credits', '文本', '', 100, '', 1),
(53, 'CACHE_INDEX', '0', '性能优化', 'admin_config_cache_index', '文本', 'admin_config_cache_index_message', 100, '', 1),
(54, 'CACHE_CATEGORY', '0', '性能优化', 'admin_config_cache_category', '文本', 'admin_config_cache_category_message', 100, '', 1),
(55, 'CACHE_CONTENT', '0', '性能优化', 'admin_config_cache_content', '文本', 'admin_config_cache_content_message', 100, '', 1),
(34, 'COMMENT_STEP_TIME', '10', '会员配置', 'admin_config_comment_step_time', '文本', 'admin_config_comment_step_time_message', 100, '', 1),
(56, 'PATHINFO_TYPE', '1', '伪静态', 'admin_config_pathinfo_type', '布尔(1/0)', 'admin_config_pathinfo_type_message', 100, '', 1),
(57, 'OPEN_REWRITE', '0', '伪静态', 'admin_config_open_rewrite', '布尔(1/0)', 'admin_config_open_rewrite_message', 100, '', 1),
(35, 'EMAIL_USERNAME', 'meta_test@163.com', '邮箱配置', 'admin_config_email_username', '文本', '', 100, '', 1),
(36, 'EMAIL_PASSWORD', 'metaphase', '邮箱配置', 'admin_config_email_password', '文本', '', 100, '', 1),
(37, 'EMAIL_HOST', 'smtp.163.com', '邮箱配置', 'admin_config_email_host', '文本', '', 100, '', 1),
(38, 'EMAIL_PORT', '25', '邮箱配置', 'admin_config_email_port', '文本', '', 100, '', 1),
(39, 'EMAIL_FROMNAME', '周鸿', '邮箱配置', 'admin_config_email_fromname', '文本', '', 100, '', 1),
(58, 'COOKIE_EXPIRE', '', 'COOKIE配置', 'admin_config_cookie_expire', '文本', '', 100, '', 1),
(59, 'COOKIE_DOMAIN', '', 'COOKIE配置', 'admin_config_cookie_domain', '文本', '', 100, '', 1),
(60, 'COOKIE_PATH', '/', 'COOKIE配置', 'admin_config_cookie_path', '文本', '', 100, '', 1),
(62, 'SESSION_DOMAIN', '', 'SESSION配置', 'admin_config_session_domain', '文本', '', 100, '', 1),
(65, 'MEMBER_EMAIL_VALIDATE', '0', '会员配置', 'admin_config_member_email_validate', '布尔(1/0)', '', 3, '', 1),
(69, 'WEB_DOMAIN', '', '站点配置', 'admin_config_web_domain', '文本', '', 3, '', 1),
(70, 'LANGUAGE', 'zh', '站点配置', 'admin_config_language', '文本', '', 1, '', 1),
(71, 'EC_USE_STORAGE', '1', 'EC基本设置', 'admin_config_use_storage', '布尔(1/0)', ' ', 100, '', 1),
(72, 'EC_DEFAULT_STORAGE', '1', 'EC基本设置', 'admin_config_ec_default_storage', '文本', ' ', 100, '', 1),
(73, 'EC_MARKET_PRICE_RATE', '1.2', 'EC基本设置', 'admin_config_ec_market_price_rate', '文本', 'admin_config_ec_market_price_rate_message', 100, '', 1),
(74, 'EC_INTEGRAL_PERCENT', '1', 'EC基本设置', 'admin_config_ec_integral_percent', '文本', 'admin_config_ec_integral_percent_message', 100, '', 1),
(75, 'PRICE_FORMAT', '1', 'EC显示设置', 'admin_config_price_format', 'select', ' ', 100, '0,1,2,3,4,5', 1),
(76, 'EC_CURRENCY_FORMAT', '￥%s元', 'EC显示设置', 'admin_config_ec_currency_format', '文本', 'admin_config_ec_currency_format_message', 100, '', 1),
(77, 'EC_TIME_FORMAT', 'Y-m-d H:i:s', 'EC显示设置', 'admin_config_ec_time_format', '文本', ' ', 100, '', 1),
(78, 'EC_BGCOLOR', '#FFFFFF', 'EC基本设置', 'admin_config_ec_bgcolor', '文本', 'admin_config_ec_bgcolor_message', 100, '', 1),
(79, 'EC_AUTO_GENERATE_GALLERY', '1', 'EC基本设置', 'admin_config_ec_auto_generate_gallery', '布尔(1/0)', ' ', 100, '', 1),
(80, 'EC_IMAGE_WIDTH', '230', 'EC显示设置', 'admin_config_ec_image_width', '文本', ' ', 100, '', 1),
(81, 'EC_IMAGE_HEIGHT', '230', 'EC显示设置', 'admin_config_ec_image_height', '文本', 'admin_config_ec_image_height_message', 100, '', 1),
(82, 'EC_WATERMARK_PLACE', '1', 'EC基本设置', 'admin_config_ec_watermark_place', 'select', ' ', 100, '0,1,2,3,4,5', 1),
(83, 'EC_WATERMARK', 'data/water/water.gif', 'EC基本设置', 'admin_config_ec_watermark', '文本', ' admin_config_ec_watermark_message', 100, '', 1),
(84, 'EC_WATERMARK_ALPHA', '65', 'EC基本设置', 'admin_config_ec_watermark_alpha', '文本', 'admin_config_ec_watermark_alpha_message', 100, '', 1),
(85, 'EC_SN_PREFIX', 'EC', 'EC基本设置', 'admin_config_ec_sn_prefix', '文本', ' ', 100, '', 1),
(86, 'EC_RETAIN_ORIGINAL_IMG', '1', 'EC基本设置', 'admin_config_ec_retain_original_img', '布尔(1/0)', ' ', 100, '', 1),
(87, 'EC_SHOP_NOTICE', 'ようこそ、METACMS\r\n<MARQUEE onmouseover=this.stop() onmouseout=this.start() \r\nscrollAmount=3><U><FONT color=red>\r\n<P>問い合わせ電話：13167001526</P></FONT></U></MARQUEE>', '网店信息', 'admin_config_ec_shop_notice', '多行文本', 'admin_config_ec_shop_notice_message', 100, '', 1),
(88, 'EC_TOP10_TIME', '0', 'EC基本设置', 'admin_config_ec_top10_time', 'select', ' ', 100, '0,1,2,3,4', 1),
(89, 'EC_TOP_NUMBER', '10', 'EC显示设置', 'admin_config_ec_top_number', '文本', ' ', 100, '', 1),
(90, 'EC_GOODS_NAME_LENGTH', '7', 'EC显示设置', 'admin_config_ec_goods_name_length', '文本', ' ', 100, '', 1),
(91, 'EC_DATE_FORMAT', 'Y-m-d', 'EC显示设置', 'admin_config_ec_date_format', '文本', ' ', 100, '', 1),
(92, 'EC_SHOP_NAME', 'METACMS', '网店信息', 'admin_config_ec_shop_name', '文本', ' ', 100, '', 1),
(93, 'EC_INDEX_AD', 'sys', 'EC显示设置', 'admin_config_ec_index_ad', '文本', ' ', 100, '', 1),
(94, 'EC_ARTICLE_NUMBER', '8', 'EC显示设置', 'admin_config_ec_article_number', '文本', ' ', 100, '', 1),
(95, 'EC_ARTICLE_TITLE_LENGTH', '16', 'EC显示设置', 'admin_config_ec_article_title_length', '文本', ' ', 100, '', 1),
(96, 'EC_RECOMMEND_ORDER', '0', 'EC显示设置', 'admin_config_ec_recommend_order', 'select', 'admin_config_ec_recommend_order_message', 100, '0,1', 1),
(128, 'EC_SHOW_ORDER_TYPE', '1', 'EC显示设置', 'admin_config_ec_show_order_type', 'select', ' ', 100, '0,1,2', 1),
(99, 'WEIBO_LINK', 'http://weibo.com/u/1594449317/home?wvr=5&sudaref=www.baidu.com', '微信微博', 'admin_config_weibo_link', '文本', ' ', 100, '', 1),
(100, 'WEICHAT_QR', 'upload/original/config/2015/09/16/93181442390524.jpg', '微信微博', 'admin_config_weichat_qr', 'image', ' ', 100, '', 1),
(129, 'EC_SORT_ORDER_TYPE', '0', 'EC显示设置', 'admin_config_ec_sort_order_type', 'select', ' ', 100, '0,1,2', 1),
(130, 'EC_SORT_ORDER_METHOD', '0', 'EC显示设置', 'admin_config_ec_sort_order_method', 'select', ' ', 100, '0,1', 1),
(131, 'EC_PAGE_SIZE', '10', 'EC显示设置', 'admin_config_ec_page_size', '文本', ' ', 100, '', 1),
(123, 'ALLDAY_PHONE', '400-1111-1111', '客服设置', 'admin_config_allday_phone', '文本', ' ', 100, '', 1),
(132, 'EC_SHOW_MARKETPRICE', '1', 'EC商品显示设置', 'admin_config_ec_show_marketprice', '布尔(1/0)', ' ', 100, '', 1),
(133, 'EC_RELATED_GOODS_NUMBER', '4', 'EC显示设置', 'admin_config_ec_related_goods_number', '文本', ' ', 100, '', 1),
(134, 'EC_ATTR_RELATED_NUMBER', '5', 'EC显示设置', 'admin_config_ec_attr_related_number', '文本', 'admin_config_ec_attr_related_number', 100, '', 1),
(135, 'EC_GOODS_GALLERY_NUMBER', '5', 'EC显示设置', 'admin_config_ec_goods_gallery_number', '文本', ' ', 100, '', 1),
(136, 'EC_SHOW_GOODSSN', '1', 'EC商品显示设置', 'admin_config_ec_show_goodssn', '布尔(1/0)', ' ', 100, '', 1),
(137, 'EC_SHOW_GOODSNUMBER', '1', 'EC商品显示设置', 'admin_config_ec_show_goodsnumber', '布尔(1/0)', ' ', 100, '', 1),
(138, 'EC_SHOW_BRAND', '1', 'EC商品显示设置', 'admin_config_ec_show_brand', '布尔(1/0)', ' ', 100, '', 1),
(139, 'EC_SHOW_GOODSWEIGHT', '1', 'EC商品显示设置', 'admin_config_ec_show_goodsweight', '布尔(1/0)', ' ', 100, '', 1),
(140, 'EC_SHOW_ADDTIME', '1', 'EC商品显示设置', 'admin_config_ec_show_addtime', '布尔(1/0)', ' ', 100, '', 1),
(141, 'EC_INTEGRAL_NAME', '积分', 'EC显示设置', 'admin_config_ec_integral_name', '文本', 'admin_config_ec_integral_name_message', 100, '', 1),
(142, 'EC_USE_INTEGRAL', '1', 'EC购物流程', 'admin_config_ec_use_integral', '布尔(1/0)', ' ', 100, '', 1),
(143, 'EC_INTEGRAL_SCALE', '1', 'EC显示设置', 'admin_config_ec_integral_scale', '文本', 'admin_config_ec_integral_scale_message', 100, '', 1),
(144, 'EC_GOODSATTR_STYLE', '1', 'EC商品显示设置', 'admin_config_ec_goodsattr_style', 'select', ' ', 100, '0,1', 1),
(145, 'EC_BOUGHT_GOODS', '3', 'EC显示设置', 'admin_config_ec_bought_goods', '文本', 'admin_config_ec_bought_goods_message', 100, ' ', 1),
(146, 'EC_ONE_STEP_BUY', '0', 'EC购物流程', 'admin_config_ec_one_step_buy', '布尔(1/0)', ' ', 100, '', 1),
(147, 'EC_CART_CONFIRM', '1', 'EC购物流程', 'admin_config_ec_cart_confirm', 'select', 'admin_config_ec_cart_confirm_message', 100, '1,2,3,4', 1),
(148, 'EC_SHOW_GOODS_IN_CART', '3', 'EC购物流程', 'admin_config_ec_show_goods_in_cart', 'select', ' ', 100, '1,2,3', 1),
(149, 'EC_SHOW_ATTR_IN_CART', '1', 'EC购物流程', 'admin_config_ec_show_attr_in_cart', '布尔(1/0)', '  ', 100, '', 1),
(150, 'EC_ANONYMOUS_BUY', '1', 'EC购物流程', 'admin_config_ec_anonymous_buy', '布尔(1/0)', ' ', 100, '', 1),
(151, 'EC_SHOP_REG_CLOSED', '0', 'EC基本设置', 'admin_config_ec_shop_reg_closed', '布尔(1/0)', ' ', 100, '', 1),
(152, 'EC_SHOP_KEYWORDS', 'METACMS商店关键字', '网店信息', 'admin_config_ec_shop_keywords', '文本', ' ', 100, '', 1),
(153, 'EC_SHOP_DESC', 'METACMS商店描述', '网店信息', 'admin_config_ec_shop_desc', '文本', ' ', 100, '', 1),
(154, 'EC_SHOP_TITLE', 'METACMS商店标题', '网店信息', 'admin_config_ec_shop_title', '文本', 'admin_config_ec_shop_title_message', 100, '', 1),
(155, 'EC_HELP_OPEN', '1', 'EC显示设置', 'admin_config_ec_help_open', '布尔(1/0)', ' ', 100, '', 1),
(156, 'EC_SHOP_ADDRESS', '上海市长宁区延安西路555号', '网店信息', 'admin_config_ec_shop_address', '文本', ' ', 100, '', 1),
(157, 'EC_SERVICE_PHONE', '13167001526', '网店信息', 'admin_config_ec_service_phone', '文本', ' ', 100, '', 1),
(158, 'EC_SERVICE_EMAIL', '136871204@qq.com', '网店信息', 'admin_config_ec_service_email', '文本', ' ', 100, '', 1),
(159, 'EC_QQ', '336523658,136871204', '网店信息', 'admin_config_ec_qq', '文本', 'admin_config_ec_qq_message', 100, '', 1),
(160, 'EC_WW', 'ww1,ww2,ww3', '网店信息', 'admin_config_ec_ww', '文本', 'admin_config_ec_ww_message', 100, '', 1),
(161, 'EC_SKYPE', 'zhouhong860418', '网店信息', 'admin_config_ec_skype', '文本', 'admin_config_ec_skype_message', 100, '', 1),
(162, 'EC_YM', 'ym1,ym2,ym3,', '网店信息', 'admin_config_ec_ym', '文本', 'admin_config_ec_ym_message', 100, '', 1),
(163, 'EC_MSN', 'msn1,msn2', '网店信息', 'admin_config_ec_msn', '文本', 'admin_config_ec_msn_message', 100, '', 1),
(164, 'EC_ICP_NUMBER', 'METACMS@icp13167001526', 'EC基本设置', 'admin_config_ec_icp_number', '文本', ' ', 100, '', 1),
(165, 'EC_THUMB_WIDTH', '100', 'EC显示设置', 'admin_config_ec_thumb_width', '文本', ' ', 100, '', 1),
(166, 'EC_THUMB_HEIGHT', '100', 'EC显示设置', 'admin_config_ec_thumb_height', '文本', ' ', 100, '', 1),
(167, 'EC_SHOP_COUNTRY', '1', 'EC基本设置', 'admin_config_ec_shop_country', '文本', ' ', 100, '', 1),
(168, 'EC_SHOP_PROVINCE', '25', 'EC基本设置', 'admin_config_ec_shop_province', '文本', ' ', 100, '', 1),
(169, 'EC_SHOP_CITY', '321', 'EC基本设置', 'admin_config_ec_shop_city', '文本', ' ', 100, '', 1),
(170, 'EC_WEIBO_LINK', 'http://www.metaphase.asia/', '网店信息', 'admin_config_ec_weibo_link', '文本', ' ', 100, '', 1),
(171, 'EC_QQ_WEIBO_LINK', 'http://www.metaphase.co.jp/', '网店信息', 'admin_config_ec_qq_weibo_link', '文本', ' ', 100, '', 1),
(172, 'EC_WEICHAT_QR', 'upload/original/config/2016/02/06/38971454739410.jpg', '网店信息', 'admin_config_ec_weichat_qr', 'image', ' ', 100, '', 1),
(173, 'EC_COMMENTS_NUMBER', '5', 'EC显示设置', 'admin_config_ec_comments_number', '数字', 'admin_config_ec_comments_number_message', 100, '', 1),
(174, 'EC_PAGE_STYLE', '1', 'EC显示设置', 'admin_config_ec_page_style', 'select', ' ', 100, '0,1', 1),
(175, 'EC_MESSAGE_BOARD', '1', 'EC基本设置', 'admin_config_ec_message_board', 'select', NULL, 100, '0,1', 1),
(176, 'EC_ARTICLE_PAGE_SIZE', '10', 'EC显示设置', 'admin_config_ec_article_page_size', '文本', ' ', 100, '', 1),
(177, 'EC_MEMBER_EMAIL_VALIDATE', '1', 'EC基本设置', 'admin_config_ec_member_email_validate', '布尔(1/0)', ' ', 100, '', 1),
(178, 'EC_USER_NOTICE', 'ユーザセンタメッセージ、管理画面設定できる', '网店信息', 'admin_config_ec_user_notice', '多行文本', 'admin_config_ec_user_notice_message', 100, '', 1),
(179, 'EC_NAME_OF_REGION_1', '国家', 'EC显示设置', 'admin_config_ec_name_of_region_1', '文本', ' ', 100, '', 1),
(180, 'EC_NAME_OF_REGION_2', '省', 'EC显示设置', 'admin_config_ec_name_of_region_2', '文本', ' ', 100, '', 1),
(181, 'EC_NAME_OF_REGION_3', '市', 'EC显示设置', 'admin_config_ec_name_of_region_3', '文本', ' ', 100, '', 1),
(182, 'EC_NAME_OF_REGION_4', '区', 'EC显示设置', 'admin_config_ec_name_of_region_4', '文本', ' ', 100, '', 1),
(183, 'EC_REGISTER_POINTS', '0', 'EC基本设置', 'admin_config_ec_register_points', '文本', ' ', 100, '', 1),
(184, 'EC_COMMENT_FACTOR', '0', 'EC基本设置', 'admin_config_ec_comment_factor', 'select', 'admin_config_ec_comment_factor_message', 100, '0,1,2,3', 1),
(185, 'EC_COMMENT_CHECK', '0', 'EC基本设置', 'admin_config_ec_comment_check', 'select', ' ', 100, '0,1', 1),
(186, 'EC_HASH_CODE', 'zhec', 'EC基本设置', 'admin_config_ec_hash_code', '文本', ' ', 100, '', 1),
(187, 'EC_UPLOAD_SIZE_LIMIT', '1024', 'EC基本设置', 'admin_config_ec_upload_size_limit', '文本', 'admin_config_ec_upload_size_limit_message', 100, '', 1),
(188, 'EC_MESSAGE_CHECK', '1', 'EC基本设置', 'admin_config_ec_message_check', 'select', ' ', 100, '0,1', 1),
(189, 'EC_USE_SURPLUS', '1', 'EC购物流程', 'admin_config_ec_use_surplus', '布尔(1/0)', ' ', 100, '', 1),
(190, 'EC_USE_HOW_OOS', '1', 'EC购物流程', 'admin_config_ec_use_how_oos', '布尔(1/0)', ' ', 100, '', 1),
(191, 'EC_CAN_INVOICE', '1', 'EC购物流程', 'admin_config_ec_can_invoice', '布尔(1/0)', ' ', 100, '', 1),
(192, 'EC_INVOICE_CONTENT', '办公用品\r\n学校用品', 'EC购物流程', 'admin_config_ec_invoice_content', '多行文本', 'admin_config_ec_invoice_content_message', 100, '', 1),
(193, 'EC_USE_BONUS', '1', 'EC购物流程', 'admin_config_ec_use_bonus', '布尔(1/0)', ' ', 100, '', 1),
(194, 'EC_STOCK_DEC_TIME', '1', 'EC购物流程', 'admin_config_ec_stock_dec_time', 'select', ' ', 100, '0,1', 1),
(195, 'EC_MIN_GOODS_AMOUNT', '0', 'EC购物流程', 'admin_config_ec_min_goods_amount', '文本', 'admin_config_ec_min_goods_amount_message', 100, '', 1),
(196, 'EC_SEND_SERVICE_EMAIL', '0', 'EC购物流程', 'admin_config_ec_send_service_email', '布尔(1/0)', 'admin_config_ec_send_service_email_message', 100, '', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_contact`
--

CREATE TABLE IF NOT EXISTS `zh_contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `subject` varchar(255) DEFAULT NULL COMMENT '标题',
  `status` int(1) unsigned DEFAULT '0' COMMENT '状态',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '咨询时间',
  `finishtime` int(10) unsigned DEFAULT NULL COMMENT '处理完成时间',
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- テーブルのデータのダンプ `zh_contact`
--

INSERT INTO `zh_contact` (`id`, `name`, `email`, `subject`, `status`, `addtime`, `finishtime`, `message`) VALUES
(3, '周鸿1', '136871204@qq.com', 'aaa1', 1, 1445503786, NULL, 'aaa1\r\naaaaa1');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_content`
--

CREATE TABLE IF NOT EXISTS `zh_content` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('人気','トップ','推薦','画像','エキス','スライド','マスタ推薦') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` int(6) NOT NULL DEFAULT '0' COMMENT '点击数',
  `source` char(60) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  `content_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_num` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `tag` varchar(255) NOT NULL DEFAULT '' COMMENT '占位，不用的字段',
  `read_credits` smallint(6) NOT NULL DEFAULT '0' COMMENT '阅读金币',
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=46 ;

--
-- テーブルのデータのダンプ `zh_content`
--

INSERT INTO `zh_content` (`aid`, `cid`, `title`, `flag`, `new_window`, `seo_title`, `thumb`, `click`, `source`, `redirecturl`, `html_path`, `allowreply`, `addtime`, `updatetime`, `color`, `template`, `url_type`, `arc_sort`, `content_state`, `keywords`, `description`, `uid`, `favorites`, `comment_num`, `tag`, `read_credits`) VALUES
(3, 24, 'METACMSデーもシステム公開しました！！！', 'トップ,推薦,画像', 0, '', 'upload/content/2016/08/04/85361470279066.png', 101, '', '', '', 1, 1470279051, 1472024182, '', '', 3, 100, 1, '開し,まし,ム公,ステ,デー,もシ,METACMS', 'METACMSデーもシステム公開しました！！！', 1, 0, 0, 'システムニュース', 0),
(4, 24, 'METACMSにはEC機能を追加', 'トップ,画像', 0, '', 'upload/content/2016/08/04/93321470279137.png', 103, '', '', '', 1, 1470279093, 1470279217, '', '', 3, 100, 1, '追加,機能,EC,には,METACMS', 'METACMSにはEC機能を追加', 1, 0, 0, 'システムニュース', 0),
(5, 23, '管理画面ログイン方法', '画像', 0, '', 'upload/content/2016/08/10/61051470817598.png', 102, '', '', '', 1, 1470817454, 1470817614, '', '', 3, 100, 1, 'wwwmetaphasedemocom,adminphpID,metaphasePW,metaphase,http,レス,画面,ログ,イン', '管理画面ログインアドレス：http://www.metaphasedemo.com/admin.phpID:metaphasePW:metaphase', 1, 0, 0, '', 0),
(45, 23, '操作マニュアル延期', '', 0, '', '', 100, '', '', '', 1, 1472024433, 1472024479, '', '', 3, 100, 1, 'する,こと,が優,先す,るこ,なる,とに,修正,るバ', '操作マニュアル延期することになるバッグ修正することが優先することになる', 1, 0, 0, 'マニュアル', 0),
(41, 24, 'これは初めての文章です', '画像', 0, '', 'upload/content/2016/08/18/68791471505358.jpg', 0, '', '', '', 1, 1471507250, 1471507250, '', '', 3, 100, 1, '', '文章テストです。。。。', 35, 0, 0, '', 0),
(42, 24, '文章発表問題1', '画像', 0, '', 'upload/content/2016/08/18/10091471507553.jpg', 0, '', '', '', 1, 1471507557, 1471507557, '', '', 3, 100, 1, '', '文章発表問題発表成功しても、エラーが出る修正してください', 36, 0, 0, '', 0),
(43, 24, '私が新規登録しました', '', 0, '', '', 1, '', '', '', 1, 1471942729, 1471942729, '', '', 3, 100, 1, '', '私が新規登録しました', 37, 0, 1, '', 0),
(44, 24, 'システムタ問題がある？', '', 0, '', '', 100, '', '', '', 1, 1472024356, 1472024378, '', '', 3, 100, 1, 'ある,題が,タ問,テム,シス', 'システムタ問題がある？', 1, 0, 0, 'システムニュース', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_content_data`
--

CREATE TABLE IF NOT EXISTS `zh_content_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

--
-- テーブルのデータのダンプ `zh_content_data`
--

INSERT INTO `zh_content_data` (`aid`, `content`) VALUES
(3, '<p>METACMSデーもシステム公開しました！！！</p><p><br/></p>'),
(4, '<p>METACMSにはEC機能を追加</p>'),
(5, '<p>管理画面ログインアドレス：<a _src="http://www.metaphasedemo.com/admin.php" href="http://www.metaphasedemo.com/admin.php">http://www.metaphasedemo.com/admin.php</a><br/></p><p>ID:metaphase</p><p>PW:metaphase</p><p><br/></p><p><br/> </p>'),
(43, '<p>私が新規登録しました</p>'),
(44, '<p>システムタ問題がある？</p>'),
(45, '<p>操作マニュアル延期することになる</p><p><br/></p><p>バッグ修正することが優先することになる<br/></p>'),
(41, '<p>文章テストです。。。。</p><p><br/></p>'),
(42, '<p>文章発表問題</p><p>発表成功しても、エラーが出る</p><p>修正してください</p><p style="text-align:center"><img style="width: 197px; height: 152px;" src="http://www.metacms.com/upload/editor/2016/08/18/5451471507511.jpg" title="Koala.jpg"/></p>');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_content_tag`
--

CREATE TABLE IF NOT EXISTS `zh_content_tag` (
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型cid',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章aid',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '标签id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户uid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='内容标签表';

--
-- テーブルのデータのダンプ `zh_content_tag`
--

INSERT INTO `zh_content_tag` (`mid`, `cid`, `aid`, `tid`, `uid`) VALUES
(1, 24, 44, 1, 1),
(1, 24, 3, 1, 1),
(1, 23, 45, 2, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_custom_js`
--

CREATE TABLE IF NOT EXISTS `zh_custom_js` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) DEFAULT NULL COMMENT '标签名称',
  `description` varchar(255) DEFAULT NULL COMMENT 'js描述',
  `options` text COMMENT 'js属性设置',
  `name` varchar(100) DEFAULT NULL COMMENT 'JS名称',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `username` char(30) DEFAULT NULL COMMENT '添加者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='自定义js' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_account_log`
--

CREATE TABLE IF NOT EXISTS `zh_ec_account_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `user_id` mediumint(8) unsigned NOT NULL COMMENT '用户登录后保存在session中的id号，跟users表中的user_id对应',
  `user_money` decimal(10,2) NOT NULL COMMENT '用户该笔记录的余额',
  `frozen_money` decimal(10,2) NOT NULL COMMENT '被冻结的资金',
  `rank_points` mediumint(9) NOT NULL COMMENT '等级积分，跟消费积分是分开的',
  `pay_points` mediumint(9) NOT NULL COMMENT '消费积分，跟等级积分是分开的',
  `change_time` int(10) unsigned NOT NULL COMMENT '该笔操作发生的时间',
  `change_desc` varchar(255) NOT NULL COMMENT '该笔操作的备注，一般是，充值或者提现。也可是是管理员后台写的任何在备注',
  `change_type` tinyint(3) unsigned NOT NULL COMMENT '操作类型，0为充值，1为提现，2为管理员调节，99为其他类型',
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- テーブルのデータのダンプ `zh_ec_account_log`
--

INSERT INTO `zh_ec_account_log` (`log_id`, `user_id`, `user_money`, `frozen_money`, `rank_points`, `pay_points`, `change_time`, `change_desc`, `change_type`) VALUES
(1, 5, '1100000.00', '0.00', 0, 0, 1242140736, '11', 2),
(2, 3, '400000.00', '0.00', 0, 0, 1242140752, '21312', 2),
(3, 2, '300000.00', '0.00', 0, 0, 1242140775, '300000', 2),
(4, 1, '50000.00', '0.00', 0, 0, 1242140811, '50', 2),
(5, 5, '0.00', '10000.00', 0, 0, 1242140853, '32', 2),
(6, 1, '-400.00', '0.00', 0, 0, 1242142274, '支付订单 2009051298180', 99),
(7, 1, '-975.00', '0.00', 0, 0, 1242142324, '支付订单 2009051255518', 99),
(8, 1, '0.00', '0.00', 960, 960, 1242142390, '订单 2009051255518 赠送的积分', 99),
(9, 1, '0.00', '0.00', 385, 385, 1242142432, '订单 2009051298180 赠送的积分', 99),
(10, 1, '-2310.00', '0.00', 0, 0, 1242142549, '支付订单 2009051267570', 99),
(11, 1, '0.00', '0.00', 2300, 2300, 1242142589, '订单 2009051267570 赠送的积分', 99),
(12, 1, '-5989.00', '0.00', 0, 0, 1242142681, '支付订单 2009051230249', 99),
(13, 1, '-8610.00', '0.00', 0, 0, 1242142808, '支付订单 2009051276258', 99),
(14, 1, '0.00', '0.00', 0, -1, 1242142910, '参加夺宝奇兵夺宝奇兵之夏新N7 ', 99),
(15, 1, '0.00', '0.00', 0, -1, 1242142935, '参加夺宝奇兵夺宝奇兵之诺基亚N96 ', 99),
(16, 1, '0.00', '0.00', 0, 100000, 1242143867, '奖励', 2),
(17, 1, '-10.00', '0.00', 0, 0, 1242143920, '支付订单 2009051268194', 99),
(18, 1, '0.00', '0.00', 0, -17000, 1242143920, '支付订单 2009051268194', 99),
(19, 1, '0.00', '0.00', -960, -960, 1242144185, '由于退货或未发货操作，退回订单 2009051255518 赠送的积分', 99),
(20, 1, '975.00', '0.00', 0, 0, 1242144185, '由于取消、无效或退货操作，退回支付订单 2009051255518 时使用的预付款', 99),
(21, 1, '0.00', '0.00', 960, 960, 1242576445, '订单 2009051719232 赠送的积分', 99),
(22, 3, '-1000.00', '0.00', 0, 0, 1242973612, '追加使用余额支付订单：2009051227085', 99),
(23, 1, '-13806.60', '0.00', 0, 0, 1242976699, '支付订单 2009052224892', 99),
(24, 1, '0.00', '0.00', 14045, 14045, 1242976740, '订单 2009052224892 赠送的积分', 99),
(25, 1, '0.00', '0.00', -2300, -2300, 1245045334, '由于退货或未发货操作，退回订单 2009051267570 赠送的积分', 99),
(26, 1, '2310.00', '0.00', 0, 0, 1245045334, '由于取消、无效或退货操作，退回支付订单 2009051267570 时使用的预付款', 99),
(27, 1, '0.00', '0.00', 17044, 17044, 1245045443, '订单 2009061585887 赠送的积分', 99),
(28, 1, '17054.00', '0.00', 0, 0, 1245045515, '1', 99),
(29, 1, '0.00', '0.00', -17044, -17044, 1245045515, '由于退货或未发货操作，退回订单 2009061585887 赠送的积分', 99),
(30, 1, '-3196.30', '0.00', 0, 0, 1245045672, '支付订单 2009061525429', 99),
(31, 1, '-1910.00', '0.00', 0, 0, 1245047978, '支付订单 2009061503335', 99),
(32, 1, '0.00', '0.00', 1900, 1900, 1245048189, '订单 2009061503335 赠送的积分', 99),
(33, 1, '0.00', '0.00', -1900, -1900, 1245048212, '由于退货或未发货操作，退回订单 2009061503335 赠送的积分', 99),
(34, 1, '1910.00', '0.00', 0, 0, 1245048212, '由于取消、无效或退货操作，退回支付订单 2009061503335 时使用的预付款', 99),
(35, 1, '-500.00', '0.00', 0, 0, 1245048585, '支付订单 2009061510313', 99),
(36, 0, '20.00', '-20.00', 0, 0, 1455664932, '解冻拍卖活动的保证金：测试拍卖1', 99),
(37, 0, '50.00', '-50.00', 0, 0, 1459211282, '解冻拍卖活动的保证金：拍卖活动——索爱C702c(第2期)', 99),
(38, 11, '0.00', '0.00', 0, -2000, 1464820552, '支付订单 2016060290025', 99),
(39, 11, '0.00', '0.00', 0, -2000, 1464821010, '支付订单 2016060253457', 99),
(40, 11, '0.00', '0.00', 0, -2000, 1464821135, '支付订单 2016060244931', 99);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_ad`
--

CREATE TABLE IF NOT EXISTS `zh_ec_ad` (
  `ad_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `position_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '0,站外广告；从1开始代表的是该广告所处的广告位，同表ad_position中的字段position_id的值',
  `media_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '广告类型，0，图片；1，flash;2,代码；3，文字',
  `ad_name` varchar(60) NOT NULL COMMENT '该条广告记录的广告名称',
  `ad_link` varchar(255) NOT NULL COMMENT '广告链接地址',
  `ad_code` text NOT NULL COMMENT '广告链接的表现，文字广告就是文字或图片和flash就是它们的地址，代码广告就是代码内容',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '广告开始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '广告结束时间',
  `link_man` varchar(60) NOT NULL COMMENT '广告联系人',
  `link_email` varchar(60) NOT NULL COMMENT '广告联系人的邮箱',
  `link_phone` varchar(60) NOT NULL COMMENT '广告联系人的电话',
  `click_count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '该广告点击数',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '该广告是否关闭，1，开启；0，关闭；关闭后广告将不再有效，直至重新开启',
  PRIMARY KEY (`ad_id`),
  KEY `position_id` (`position_id`),
  KEY `enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告列表配置表，包括站内站外的图片，文字，flash，代码广告' AUTO_INCREMENT=6 ;

--
-- テーブルのデータのダンプ `zh_ec_ad`
--

INSERT INTO `zh_ec_ad` (`ad_id`, `position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(1, 0, 0, '图片测试广告11（站外）', '', '1451356487440394469.jpg', 1451318400, 1453910400, '', '', '', 0, 1),
(2, 2, 0, '图片测试广告12（图片）', '', '1451427011991996069.jpg', 1451404800, 1453996800, '', '', '', 0, 1),
(4, 2, 2, '代码广告1', '', 'aaaaa\r\nbbb\r\nccc', 1451404800, 1453996800, '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_admin_log`
--

CREATE TABLE IF NOT EXISTS `zh_ec_admin_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '写日志时间',
  `user_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '该日志所记录的操作者id，同admin的user_id',
  `log_info` varchar(255) NOT NULL DEFAULT '' COMMENT '管理操作内容',
  `ip_address` varchar(15) NOT NULL DEFAULT '' COMMENT '管理者登录ip',
  PRIMARY KEY (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员操作日志表' AUTO_INCREMENT=1482 ;

--
-- テーブルのデータのダンプ `zh_ec_admin_log`
--

INSERT INTO `zh_ec_admin_log` (`log_id`, `log_time`, `user_id`, `log_info`, `ip_address`) VALUES
(778, 1453931869, 1, '编辑商品标签: 自主研发手机', '127.0.0.1'),
(777, 1453931864, 1, '编辑商品标签: 自主研发手机', '127.0.0.1'),
(776, 1453931844, 1, '编辑商品标签: 音乐手机', '127.0.0.1'),
(775, 1453931843, 1, '编辑商品标签: 音乐手机', '127.0.0.1'),
(774, 1453931842, 1, '编辑商品标签: 自主研发手机', '127.0.0.1'),
(716, 1451501037, 1, '移除广告: ', '127.0.0.1'),
(715, 1451501026, 1, '移除广告: ', '127.0.0.1'),
(773, 1453931838, 1, '编辑商品标签: 自主研发手机', '127.0.0.1'),
(772, 1453931830, 1, '添加商品标签: 自主研发手机', '127.0.0.1'),
(717, 1451955253, 1, '删除管理员日志: ', '127.0.0.2'),
(771, 1453931822, 1, '编辑商品标签: 音乐手机', '127.0.0.1'),
(711, 1451426979, 1, '编辑广告: 图片测试广告11（站外）', '127.0.0.1'),
(710, 1451417863, 1, '添加广告: 文本广告', '127.0.0.1'),
(709, 1451417795, 1, '添加广告: 代码广告1', '127.0.0.1'),
(718, 1451955290, 1, '删除管理员日志: ', '127.0.0.1'),
(719, 1451956016, 1, '删除管理员日志: ', '127.0.0.1'),
(706, 1451356487, 1, '添加广告: 图片测试广告1（站外）', '127.0.0.1'),
(705, 1450653918, 1, '删除广告位置: ', '127.0.0.1'),
(704, 1450653676, 1, '修改广告位置: 500', '127.0.0.1'),
(703, 1450653670, 1, '修改广告位置: 501', '127.0.0.1'),
(702, 1450653544, 1, '修改广告位置: 100', '127.0.0.1'),
(701, 1450653539, 1, '修改广告位置: 101', '127.0.0.1'),
(700, 1450653278, 1, '修改广告位置: 测试广告11', '127.0.0.1'),
(699, 1450652923, 1, '编辑广告位置: 测试广告1', '127.0.0.1'),
(698, 1450652251, 1, '添加广告位置: 测试广告2', '127.0.0.1'),
(697, 1450651861, 1, '添加广告位置: 测试广告', '127.0.0.1'),
(696, 1450400604, 1, '批量删除商品属性: ', '127.0.0.1'),
(695, 1450398718, 1, '修改商品属性: 测试属性11', '127.0.0.1'),
(688, 1450312645, 1, '修改商品类型: 测试类型1', '127.0.0.1'),
(689, 1450312649, 1, '修改商品类型: 测试类型', '127.0.0.1'),
(690, 1450376677, 1, '移除商品类型: 测试属性3', '127.0.0.1'),
(691, 1450394342, 1, '添加商品属性: 测试属性5', '127.0.0.1'),
(692, 1450394796, 1, '修改商品属性: 测试属性5', '127.0.0.1'),
(693, 1450394818, 1, '修改商品属性: 测试属性51', '127.0.0.1'),
(694, 1450398581, 1, '修改商品属性: 测试属性11', '127.0.0.1'),
(687, 1450312644, 1, '修改商品类型: 书', '127.0.0.1'),
(686, 1450130970, 1, '修改商品品牌: 诺基亚', '127.0.0.1'),
(685, 1450130967, 1, '修改商品品牌: 诺基亚1', '127.0.0.1'),
(684, 1449801996, 1, '修改商品品牌: Apuweiser-riche', '127.0.0.1'),
(683, 1449801983, 1, '修改商品品牌: Apuweiser-riche', '127.0.0.1'),
(682, 1449799596, 1, '添加商品品牌: Apuweiser-riche', '127.0.0.1'),
(681, 1449799564, 1, '添加商品品牌: apple', '127.0.0.1'),
(680, 1449793246, 1, '修改商品品牌: 诺基亚', '127.0.0.1'),
(679, 1449793242, 1, '修改商品品牌: 摩托罗拉', '127.0.0.1'),
(678, 1449793238, 1, '修改商品品牌: 诺基亚', '127.0.0.1'),
(677, 1449793228, 1, '修改商品品牌: 诺基亚', '127.0.0.1'),
(676, 1449793220, 1, '修改商品品牌: 诺基亚', '127.0.0.1'),
(675, 1449792839, 1, '修改商品品牌: 诺基亚', '127.0.0.1'),
(674, 1449792837, 1, '修改商品品牌: 诺基亚1', '127.0.0.1'),
(673, 1449792760, 1, 'editbrand: 诺基亚', '127.0.0.1'),
(672, 1449792755, 1, 'editbrand: 诺基亚1', '127.0.0.1'),
(671, 1449792747, 1, 'editbrand: 诺基亚', '127.0.0.1'),
(670, 1449696788, 1, '修改夺宝奇兵活动: 测试活动2', '127.0.0.1'),
(669, 1449696780, 1, '修改夺宝奇兵活动: 夺宝奇兵之诺基亚N96', '127.0.0.1'),
(668, 1449696772, 1, '修改夺宝奇兵活动: 夺宝奇兵之诺基亚N96 1', '127.0.0.1'),
(667, 1449696758, 1, '修改夺宝奇兵活动: 测试活动222', '127.0.0.1'),
(666, 1449692393, 1, '添加夺宝奇兵活动: 测试活动2', '127.0.0.1'),
(665, 1449692363, 1, '添加夺宝奇兵活动: 测试活动1', '127.0.0.1'),
(664, 1449518293, 1, '添加商品: 服1', '127.0.0.1'),
(663, 1449518238, 1, '添加商品分类: 服', '127.0.0.1'),
(662, 1449518211, 1, '添加属性(attgribute): 色', '127.0.0.1'),
(661, 1449518184, 1, '添加属性(attgribute): サイズ', '127.0.0.1'),
(770, 1453931771, 1, '删除商品标签: 自主研发手机1', '127.0.0.1'),
(769, 1453931757, 1, '编辑商品标签: 自主研发手机1', '127.0.0.1'),
(768, 1453931648, 1, '添加商品标签: 自主研发手机', '127.0.0.1'),
(767, 1453931636, 1, '删除商品标签: 1', '127.0.0.1'),
(766, 1453930787, 1, '添加商品标签: 自主研发手机', '127.0.0.1'),
(765, 1453860255, 1, '商品批量修改商品: ', '127.0.0.1'),
(764, 1453860216, 1, '商品批量修改商品: ', '127.0.0.1'),
(763, 1453860180, 1, '商品批量修改商品: ', '127.0.0.1'),
(762, 1453860134, 1, '商品批量修改商品: ', '127.0.0.1'),
(761, 1453854747, 1, '编辑商品: 诺基亚E66', '127.0.0.1'),
(760, 1453835238, 1, '批量上传成功商品: ', '127.0.0.1'),
(759, 1453835032, 1, '批量上传成功商品: ', '127.0.0.1'),
(758, 1453408822, 1, '编辑用户评论: ', '127.0.0.1'),
(757, 1453408816, 1, '编辑用户评论: ', '127.0.0.1'),
(756, 1453408092, 1, '删除评论: ', '127.0.0.1'),
(755, 1453406905, 1, '编辑用户评论: 回复', '127.0.0.1'),
(754, 1453341129, 1, '编辑商品: ZH手机3', '127.0.0.1'),
(753, 1453330542, 1, '添加商品: ZH手机3', '127.0.0.1'),
(752, 1453329202, 1, '还原商品: 摩托罗拉A810', '127.0.0.1'),
(751, 1453329192, 1, '删除商品: ZH手机', '127.0.0.1'),
(750, 1453329130, 1, '删除商品: ZH手机', '127.0.0.1'),
(749, 1453327998, 1, '还原商品: 索爱C702c', '127.0.0.1'),
(748, 1453321470, 1, '更新商品: 38', '127.0.0.1'),
(747, 1453321457, 1, '回收站货品: ', '127.0.0.1'),
(746, 1453321457, 1, '更新商品: ', '127.0.0.1'),
(745, 1453321451, 1, '更新商品: 38', '127.0.0.1'),
(744, 1453321405, 1, '回收站货品: ', '127.0.0.1'),
(743, 1453321405, 1, '更新商品: ', '127.0.0.1'),
(742, 1453321389, 1, '更新商品: 38', '127.0.0.1'),
(741, 1453321373, 1, '回收站货品: ', '127.0.0.1'),
(740, 1453321373, 1, '更新商品: ', '127.0.0.1'),
(739, 1453321349, 1, '回收站货品: ', '127.0.0.1'),
(738, 1453321349, 1, '更新商品: ', '127.0.0.1'),
(737, 1453318208, 1, '更新商品: 38', '127.0.0.1'),
(736, 1453318208, 1, '更新商品: 38', '127.0.0.1'),
(735, 1453250545, 1, '放入回收站商品: ZH手机', '127.0.0.1'),
(733, 1453245213, 1, '编辑商品: ZH手机1', '127.0.0.1'),
(734, 1453250541, 1, '放入回收站商品: ZH手机', '127.0.0.1'),
(732, 1453245062, 1, '添加商品: ZH手机', '127.0.0.1'),
(731, 1453235260, 1, '添加商品: ZH手机', '127.0.0.1'),
(730, 1453234885, 1, '添加商品: ZH手机', '127.0.0.1'),
(729, 1453234843, 1, '添加商品: ZH手机', '127.0.0.1'),
(728, 1453234772, 1, '添加商品: ZH手机', '127.0.0.1'),
(727, 1452473265, 1, '修改商品品牌: 测试品牌', '127.0.0.1'),
(726, 1452036572, 1, '移除商品分类: 书', '127.0.0.1'),
(725, 1452032359, 1, '编辑商品分类: 书', '127.0.0.1'),
(724, 1452032324, 1, '编辑商品分类: 书', '127.0.0.1'),
(723, 1452032309, 1, '编辑商品分类: 书', '127.0.0.1'),
(722, 1452026276, 1, '添加商品分类: 教育类数书籍', '127.0.0.1'),
(721, 1452025932, 1, '添加商品分类: 教育类数书籍', '127.0.0.1'),
(720, 1451956027, 1, '删除管理员日志: ', '127.0.0.1'),
(779, 1453931887, 1, '添加商品标签: 测试手机', '127.0.0.1'),
(780, 1453931891, 1, '编辑商品标签: 自主研发手机', '127.0.0.1'),
(781, 1454269327, 1, '修改夺宝奇兵活动: 测试活动22', '127.0.0.1'),
(782, 1454269379, 1, '添加夺宝奇兵活动: 测试活动3', '127.0.0.1'),
(783, 1454269386, 1, '修改夺宝奇兵活动: 测试活动33', '127.0.0.1'),
(784, 1454269469, 1, '修改夺宝奇兵活动: 测试活动22', '127.0.0.1'),
(785, 1454269731, 1, '修改夺宝奇兵活动: 测试活动2', '127.0.0.1'),
(786, 1454290868, 1, '添加红包类型: 测试用户发放红包', '127.0.0.1'),
(787, 1454290903, 1, '添加红包类型: 测试用户发放红包', '127.0.0.1'),
(788, 1454291643, 1, '编辑红包类型: 测试用户发放红包1', '127.0.0.1'),
(789, 1454291651, 1, '编辑红包类型: 测试用户发放红包', '127.0.0.1'),
(790, 1454292806, 1, '添加商品属性: 输出方式 ', '127.0.0.1'),
(791, 1454292813, 1, '添加商品属性: 恒电压（CV）', '127.0.0.1'),
(792, 1454292820, 1, '添加商品属性: 电压', '127.0.0.1'),
(793, 1454292826, 1, '添加商品属性: 电流', '127.0.0.1'),
(794, 1454292868, 1, '修改商品属性: 恒电压（CV）', '127.0.0.1'),
(795, 1454292876, 1, '修改商品属性: 电压', '127.0.0.1'),
(796, 1454351368, 1, '添加红包类型: 测试商品发放红包', '127.0.0.1'),
(797, 1454352478, 1, '添加红包类型: 测试线下发放红包', '127.0.0.1'),
(798, 1454372798, 1, '删除用户红包: 2', '127.0.0.1'),
(799, 1454372811, 1, '删除用户红包: 3', '127.0.0.1'),
(800, 1454379014, 1, '添加用户红包: 1000185960', '127.0.0.1'),
(801, 1454444131, 1, '编辑商品包装: 测试包装2', '127.0.0.1'),
(802, 1454444135, 1, '编辑商品包装: 测试包装2', '127.0.0.1'),
(803, 1454444141, 1, '编辑商品包装: 测试包装2', '127.0.0.1'),
(804, 1454444146, 1, '删除商品包装: 测试包装2', '127.0.0.1'),
(805, 1454453124, 1, '添加祝福贺卡: 测试贺卡', '127.0.0.1'),
(806, 1454453171, 1, '编辑祝福贺卡: 测试贺卡', '127.0.0.1'),
(807, 1454453176, 1, '编辑祝福贺卡: 测试贺卡1', '127.0.0.1'),
(808, 1454453186, 1, '编辑祝福贺卡: 测试贺卡1', '127.0.0.1'),
(809, 1454453197, 1, '编辑祝福贺卡: 测试贺卡2', '127.0.0.1'),
(810, 1454453216, 1, '编辑祝福贺卡: 测试贺卡2', '127.0.0.1'),
(811, 1454453223, 1, '删除祝福贺卡: 测试贺卡2', '127.0.0.1'),
(812, 1454615526, 1, '添加团购信息: 服1', '127.0.0.1'),
(813, 1455649754, 1, '添加拍卖活动: 测试拍卖', '127.0.0.1'),
(814, 1455652234, 1, '编辑拍卖活动: 测试拍卖1', '127.0.0.1'),
(815, 1455653445, 1, '添加拍卖活动: ZH手机', '127.0.0.1'),
(816, 1455653461, 1, '添加拍卖活动: ZH手机3', '127.0.0.1'),
(817, 1455653479, 1, '移除拍卖活动: ZH手机3', '127.0.0.1'),
(818, 1455653595, 1, '批量删除拍卖活动: ', '127.0.0.1'),
(819, 1455655965, 1, '编辑拍卖活动: 测试拍卖1', '127.0.0.1'),
(820, 1455664932, 1, '编辑拍卖活动: 测试拍卖1', '127.0.0.1'),
(821, 1455758125, 1, '添加优惠活动: 测试优惠', '127.0.0.1'),
(822, 1455820472, 1, '编辑优惠活动: 测试优惠', '127.0.0.1'),
(823, 1455820625, 1, '编辑优惠活动: 测试优惠', '127.0.0.1'),
(824, 1455820713, 1, '编辑优惠活动: 测试优惠', '127.0.0.1'),
(825, 1455820760, 1, '编辑优惠活动: 测试优惠1', '127.0.0.1'),
(826, 1455820778, 1, '添加优惠活动: 测试优惠2', '127.0.0.1'),
(827, 1455820785, 1, '添加优惠活动: 测试优惠3', '127.0.0.1'),
(828, 1455820873, 1, '删除优惠活动: 测试优惠3', '127.0.0.1'),
(829, 1455820905, 1, '删除优惠活动: 测试优惠2', '127.0.0.1'),
(830, 1455820911, 1, '添加优惠活动: 测试优惠2', '127.0.0.1'),
(831, 1455820914, 1, '批量删除优惠活动: ', '127.0.0.1'),
(832, 1455820943, 1, '添加优惠活动: 测试优惠2', '127.0.0.1'),
(833, 1455820947, 1, '批量删除优惠活动: ', '127.0.0.1'),
(834, 1455820966, 1, '添加优惠活动: 测试优惠2', '127.0.0.1'),
(835, 1455821025, 1, '批量删除优惠活动: ', '127.0.0.1'),
(836, 1455823125, 1, '编辑商品分类: 服装', '127.0.0.1'),
(837, 1455823149, 1, '添加商品分类: 女装', '127.0.0.1'),
(838, 1455823158, 1, '添加商品分类: 男装', '127.0.0.1'),
(839, 1455823173, 1, '添加商品分类: 男鞋女鞋', '127.0.0.1'),
(840, 1455823190, 1, '移除商品分类: 男鞋女鞋', '127.0.0.1'),
(841, 1455823236, 1, '添加商品分类: 新品', '127.0.0.1'),
(842, 1455823242, 1, '添加商品分类: 韩版', '127.0.0.1'),
(843, 1455823255, 1, '添加商品分类: 连衣裙', '127.0.0.1'),
(844, 1455823266, 1, '编辑商品分类: 连衣裙', '127.0.0.1'),
(845, 1455823287, 1, '编辑商品分类: 打底衫', '127.0.0.1'),
(846, 1455823310, 1, '添加商品分类: 潮搭', '127.0.0.1'),
(847, 1455823319, 1, '添加商品分类: 外套', '127.0.0.1'),
(848, 1455823327, 1, '添加商品分类: 夹克', '127.0.0.1'),
(849, 1455823351, 1, '添加商品分类: 毛衣', '127.0.0.1'),
(850, 1455823367, 1, '添加商品分类: 卫衣', '127.0.0.1'),
(851, 1455833811, 1, '新規商品カテゴリ: 妈妈装', '127.0.0.1'),
(852, 1456171145, 1, '添加批发方案: 服1', '127.0.0.1'),
(853, 1456172378, 1, '编辑批发方案: 服1', '127.0.0.1'),
(854, 1456172774, 1, '添加批发方案: 诺基亚原装5800耳机', '127.0.0.1'),
(855, 1456172812, 1, '删除批发方案: 诺基亚原装5800耳机', '127.0.0.1'),
(856, 1456172824, 1, '添加批发方案: 索爱原装M2卡读卡器', '127.0.0.1'),
(857, 1456172830, 1, '批量删除批发方案: ', '127.0.0.1'),
(858, 1456182725, 1, '添加批发方案: ZH手机3', '127.0.0.1'),
(859, 1456182725, 1, '添加批发方案: ZH手机2', '127.0.0.1'),
(860, 1456182725, 1, '添加批发方案: ZH手机4', '127.0.0.1'),
(861, 1456256659, 1, '添加超值礼包: 测试活动', '127.0.0.1'),
(862, 1456256688, 1, '添加超值礼包: 测试活动2', '127.0.0.1'),
(863, 1456256732, 1, '添加超值礼包: 测试活动3', '127.0.0.1'),
(864, 1456256826, 1, '添加超值礼包: 测试活动5', '127.0.0.1'),
(865, 1456258233, 1, '编辑超值礼包: 测试活动活动', '127.0.0.1'),
(866, 1456258258, 1, '编辑超值礼包: 测试活动', '127.0.0.1'),
(867, 1456258786, 1, '编辑超值礼包: 测试活动1', '127.0.0.1'),
(868, 1456271800, 1, '添加积分商城商品: 38', '127.0.0.1'),
(869, 1456273365, 1, '编辑积分商城商品: 38', '127.0.0.1'),
(870, 1456275530, 1, '编辑积分商城商品: 38', '127.0.0.1'),
(871, 1456275709, 1, '添加积分商城商品: 39', '127.0.0.1'),
(872, 1456275717, 1, '添加积分商城商品: 46', '127.0.0.1'),
(873, 1456275723, 1, '删除积分商城商品: 46', '127.0.0.1'),
(874, 1456275723, 1, '删除积分商城商品: 39', '127.0.0.1'),
(875, 1456275727, 1, '删除积分商城商品: 38', '127.0.0.1'),
(876, 1456426025, 1, '添加文章分类: 测试文章分类', '127.0.0.1'),
(877, 1456426392, 1, '添加文章分类: 测试文章分类2', '127.0.0.1'),
(878, 1456426569, 1, '添加文章分类: 测试文章分类3', '127.0.0.1'),
(879, 1456429585, 1, '编辑文章分类: 测试文章分类111', '127.0.0.1'),
(880, 1456429611, 1, '编辑文章分类: 测试文章分类111', '127.0.0.1'),
(881, 1456430442, 1, '删除文章分类: ', '127.0.0.1'),
(882, 1456432040, 1, '添加文章分类: 测试文章分类333', '127.0.0.1'),
(883, 1456432110, 1, '删除文章分类: ', '127.0.0.1'),
(884, 1456432118, 1, '添加文章分类: 测试文章分类333', '127.0.0.1'),
(885, 1456684133, 1, '添加文章标题: 测试文章1', '127.0.0.1'),
(886, 1456685627, 1, '编辑文章: 测试文章1111', '127.0.0.1'),
(887, 1456685796, 1, '编辑文章: 测试文章1111', '127.0.0.1'),
(888, 1456685808, 1, '编辑文章: 测试文章1111', '127.0.0.1'),
(889, 1456685962, 1, '编辑文章: 测试文章1', '127.0.0.1'),
(890, 1456686590, 1, '删除文章: 测试文章1', '127.0.0.1'),
(891, 1456686815, 1, '添加文章标题: 测试文章1', '127.0.0.1'),
(892, 1456686987, 1, '添加文章标题: 测试文章2', '127.0.0.1'),
(893, 1456690348, 1, '删除文章: ', '127.0.0.1'),
(894, 1456690348, 1, '删除文章: ', '127.0.0.1'),
(895, 1456696454, 1, '添加文章标题: 测试文章1', '127.0.0.1'),
(896, 1456696850, 1, '添加文章标题: 测试文章2', '127.0.0.1'),
(897, 1456696857, 1, '添加文章标题: 测试文章3', '127.0.0.1'),
(898, 1456708920, 1, '添加在线调查: 测试调查活动', '127.0.0.1'),
(899, 1456711194, 1, '添加在线调查选项: 测试选项1', '127.0.0.1'),
(900, 1456711360, 1, '添加在线调查选项: 测试选项2', '127.0.0.1'),
(901, 1456711626, 1, '编辑在线调查: 测试调查活动11', '127.0.0.1'),
(902, 1456711715, 1, '编辑在线调查: 测试调查活动', '127.0.0.1'),
(903, 1456711719, 1, '编辑在线调查: 您从哪里知道我们的网站', '127.0.0.1'),
(904, 1456711723, 1, '编辑在线调查: 测试调查活动1', '127.0.0.1'),
(905, 1456711839, 1, '编辑调查选项: 测试选项11', '127.0.0.1'),
(906, 1456711842, 1, '编辑调查选项: 测试选项2', '127.0.0.1'),
(907, 1456711883, 1, '编辑调查选项: 修改调查选项排序', '127.0.0.1'),
(908, 1456711886, 1, '编辑调查选项: 修改调查选项排序', '127.0.0.1'),
(909, 1456711888, 1, '编辑调查选项: 修改调查选项排序', '127.0.0.1'),
(910, 1456712233, 1, '删除调查选项: ', '127.0.0.1'),
(911, 1456712283, 1, '移除在线调查: ', '127.0.0.1'),
(912, 1456712296, 1, '添加在线调查: 测试调查活动', '127.0.0.1'),
(913, 1456712322, 1, '移除在线调查: ', '127.0.0.1'),
(914, 1456712405, 1, '添加在线调查: 测试调查活动', '127.0.0.1'),
(915, 1456712408, 1, '移除在线调查: ', '127.0.0.1'),
(916, 1456712479, 1, '添加在线调查: 测试调查活动', '127.0.0.1'),
(917, 1456712483, 1, '移除在线调查: ', '127.0.0.1'),
(918, 1456775403, 1, '添加会员注册项: 测试项目', '127.0.0.1'),
(919, 1456775779, 1, '编辑会员注册项: 测试项目1', '127.0.0.1'),
(920, 1456776094, 1, '编辑会员注册项: 测试项目12', '127.0.0.1'),
(921, 1456776096, 1, '编辑会员注册项: 密码找回问题', '127.0.0.1'),
(922, 1456776157, 1, '编辑会员注册项: 102', '127.0.0.1'),
(923, 1456776194, 1, '删除会员注册项: 测试项目12', '127.0.0.1'),
(924, 1456776207, 1, '添加会员注册项: 测试项目1', '127.0.0.1'),
(925, 1456776213, 1, '删除会员注册项: 测试项目1', '127.0.0.1'),
(926, 1456776251, 1, '添加会员注册项: 测试项目1', '127.0.0.1'),
(927, 1456776255, 1, '删除会员注册项: 测试项目1', '127.0.0.1'),
(928, 1456777008, 1, '添加会员注册项: 测试项目1', '127.0.0.1'),
(929, 1456945468, 1, '添加地区: 日本', '127.0.0.1'),
(930, 1456946122, 1, '编辑地区: 日本1', '127.0.0.1'),
(931, 1456946145, 1, '添加地区: 东北地方', '127.0.0.1'),
(932, 1456946151, 1, '添加地区: 岩手县', '127.0.0.1'),
(933, 1456946155, 1, '添加地区: 青森县', '127.0.0.1'),
(934, 1456946618, 1, '删除地区: 青森县', '127.0.0.1'),
(935, 1456946629, 1, '删除地区: 东北地方', '127.0.0.1'),
(936, 1456958018, 1, '编辑供应商: 湖北供货商3', '127.0.0.1'),
(937, 1456958750, 1, '删除供应商: 湖北供货商3', '127.0.0.1'),
(938, 1456966833, 1, '添加供货商: 测试供应商1', '127.0.0.1'),
(939, 1456967493, 1, '编辑供货商: 测试供应商1', '127.0.0.1'),
(940, 1457029797, 1, '编辑供货商: 测试供应商', '127.0.0.1'),
(941, 1457029866, 1, '编辑供货商: 测试供应商', '127.0.0.1'),
(942, 1457029873, 1, '编辑供货商: 测试供应商111', '127.0.0.1'),
(943, 1457029879, 1, '删除供应商: 测试供应商', '127.0.0.1'),
(944, 1457029949, 1, '添加供货商: 测试供应商', '127.0.0.1'),
(945, 1457030003, 1, '删除供应商: 测试供应商', '127.0.0.1'),
(946, 1457030029, 1, '添加供货商: 测试供应商', '127.0.0.1'),
(947, 1457030163, 1, '删除供应商: 测试供应商', '127.0.0.1'),
(948, 1457030544, 1, '删除供货商: 测试供应商111|', '127.0.0.1'),
(949, 1457030558, 1, '添加供货商: 测试供应商', '127.0.0.1'),
(950, 1457030612, 1, '删除供货商: 测试供应商|', '127.0.0.1'),
(951, 1457030628, 1, '添加供货商: 测试供应商', '127.0.0.1'),
(952, 1457030638, 1, '添加供货商: 测试供应商1', '127.0.0.1'),
(953, 1457030653, 1, '删除供货商: 测试供应商|测试供应商1|', '127.0.0.1'),
(954, 1457030667, 1, '添加供货商: 测试供应商1', '127.0.0.1'),
(955, 1457030722, 1, '删除供货商: 测试供应商1|', '127.0.0.1'),
(956, 1457036434, 1, '新規商品ブランド: 测试品牌2', '127.0.0.1'),
(957, 1457291163, 1, '移除商品分类: 潮搭', '127.0.0.1'),
(958, 1457291165, 1, '移除商品分类: 夹克', '127.0.0.1'),
(959, 1457291168, 1, '移除商品分类: 外套', '127.0.0.1'),
(960, 1457291170, 1, '移除商品分类: 男装', '127.0.0.1'),
(961, 1457291173, 1, '移除商品分类: 妈妈装', '127.0.0.1'),
(962, 1457291177, 1, '移除商品分类: 韩版', '127.0.0.1'),
(963, 1457291179, 1, '移除商品分类: 连衣裙', '127.0.0.1'),
(964, 1457291181, 1, '移除商品分类: 毛衣', '127.0.0.1'),
(965, 1457291184, 1, '移除商品分类: 卫衣', '127.0.0.1'),
(966, 1457291187, 1, '移除商品分类: 打底衫', '127.0.0.1'),
(967, 1457291189, 1, '移除商品分类: 女装', '127.0.0.1'),
(968, 1457291214, 1, '批量回收商品: ', '127.0.0.1'),
(969, 1457291229, 1, '删除商品: 服2', '127.0.0.1'),
(970, 1457291231, 1, '删除商品: 服1', '127.0.0.1'),
(971, 1457291234, 1, '移除商品分类: 服装', '127.0.0.1'),
(972, 1457291379, 1, '添加商品分类: 男装', '127.0.0.1'),
(973, 1457291386, 1, '添加商品分类: 女装', '127.0.0.1'),
(974, 1457291432, 1, '添加商品分类: 针织衫', '127.0.0.1'),
(975, 1457291442, 1, '添加商品分类: 内衣', '127.0.0.1'),
(976, 1457291451, 1, '添加商品分类: 针织背心', '127.0.0.1'),
(977, 1457291460, 1, '添加商品分类: 套头衫', '127.0.0.1'),
(978, 1457291472, 1, '添加商品分类: 内衣/套装', '127.0.0.1'),
(979, 1457291493, 1, '添加商品分类: T恤/POLO', '127.0.0.1'),
(980, 1457291503, 1, '添加商品分类: POLO衫', '127.0.0.1'),
(981, 1457291544, 1, '添加商品分类: 短袖T恤', '127.0.0.1'),
(982, 1457291560, 1, '添加商品分类: 衬衫', '127.0.0.1'),
(983, 1457291582, 1, '添加商品分类: 长袖衬衫', '127.0.0.1'),
(984, 1457291593, 1, '添加商品分类: 短袖衬衫', '127.0.0.1'),
(985, 1457297281, 1, '添加商品品牌: Apuweiser-riche', '127.0.0.1'),
(986, 1457297289, 1, '添加商品品牌: Birvin Uniform', '127.0.0.1'),
(987, 1457297294, 1, '添加商品品牌: COKITICA', '127.0.0.1'),
(988, 1457297301, 1, '添加商品品牌: DALLIANCE KELLY', '127.0.0.1'),
(989, 1457297321, 1, '添加商品: 女装1', '127.0.0.1'),
(990, 1457297429, 1, '添加商品: 女装2', '127.0.0.1'),
(991, 1457316744, 1, '编辑商品分类: 女装', '127.0.0.1'),
(992, 1457316856, 1, '编辑商品: 女装1', '127.0.0.1'),
(993, 1457316877, 1, '编辑商品: 女装2', '127.0.0.1'),
(994, 1457374856, 1, '移除商品类型: 服', '127.0.0.1'),
(995, 1457374882, 1, '添加商品属性: 材质', '127.0.0.1'),
(996, 1457374947, 1, '编辑商品分类: 女装', '127.0.0.1'),
(997, 1457375279, 1, '编辑商品: 女装1', '127.0.0.1'),
(998, 1457375820, 1, '编辑商品: 女装2', '127.0.0.1'),
(999, 1457376433, 1, '添加商品属性: 特色', '127.0.0.1'),
(1000, 1457376445, 1, '编辑商品分类: 女装', '127.0.0.1'),
(1431, 1471473963, 1, '削除管理者ログ: ', '127.0.0.1'),
(1432, 1471481082, 35, '新規商品: シンプル デザイン ビューティー 化粧 ポーチ 小物 入れ 使い方 自由 自在', '127.0.0.1'),
(1433, 1471481117, 35, '新規商品属性: 他', '127.0.0.1'),
(1434, 1471481130, 35, '変更商品: シンプル デザイン ビューティー 化粧 ポーチ 小物 入れ 使い方 自由 自在', '127.0.0.1'),
(1435, 1471898242, 1, '新規商品: テスト商品', '127.0.0.1'),
(1436, 1471898247, 1, '回収所に置く商品: テスト商品', '127.0.0.1'),
(1437, 1471898273, 1, '新規商品: テスト商品2', '127.0.0.1'),
(1438, 1471898284, 1, '新規商品: テスト商3', '127.0.0.1'),
(1439, 1471898291, 1, 'バッチ回収商品: ', '127.0.0.1'),
(1440, 1471911716, 1, '削除商品: テスト商3', '127.0.0.1'),
(1441, 1471912099, 1, 'バッチ戻す商品: ', '127.0.0.1'),
(1442, 1471912241, 1, 'バッチ削除商品: ', '127.0.0.1'),
(1443, 1471912250, 1, '回収所に置く商品: テスト商品2', '127.0.0.1'),
(1444, 1471918862, 35, '新規商品カテゴリ: バス・トイレ・洗面用品', '127.0.0.1'),
(1445, 1471918882, 35, '新規商品カテゴリ: トイレ用品', '127.0.0.1'),
(1446, 1471918895, 35, '新規商品カテゴリ: トイレファブリック', '127.0.0.1'),
(1447, 1471919052, 35, '新規商品ブランド: 明邦', '127.0.0.1'),
(1448, 1471919079, 35, '変更商品ブランド: 明邦', '127.0.0.1'),
(1449, 1471919134, 35, '新規商品属性: サイズ', '127.0.0.1'),
(1450, 1471919140, 35, '新規商品属性: 重量', '127.0.0.1'),
(1451, 1471919147, 35, '新規商品属性: 材質', '127.0.0.1'),
(1452, 1471919159, 35, '新規商品属性: 産地', '127.0.0.1'),
(1453, 1471919170, 35, '新規商品属性: 色', '127.0.0.1'),
(1454, 1471919236, 35, '新規商品: ねこのロールペーパーホルダー', '127.0.0.1'),
(1455, 1471919328, 35, '変更商品: ねこのロールペーパーホルダー', '127.0.0.1'),
(1456, 1471994699, 1, '卸载支付方式: bank', '127.0.0.1'),
(1457, 1471994725, 1, '卸载配送方式: 城际快递', '127.0.0.1'),
(1458, 1471994730, 1, '卸载配送方式: 市内快递', '127.0.0.1'),
(1459, 1471994734, 1, '卸载配送方式: 运费到付', '127.0.0.1'),
(1460, 1471994738, 1, '卸载配送方式: 邮政快递包裹', '127.0.0.1'),
(1461, 1471994742, 1, '卸载配送方式: 邮局平邮', '127.0.0.1'),
(1462, 1471994746, 1, '卸载配送方式: 申通快递', '127.0.0.1'),
(1463, 1471994749, 1, '卸载配送方式: 圆通速递', '127.0.0.1'),
(1464, 1472086621, 1, '添加用户: ectest2', '127.0.0.1'),
(1465, 1472089066, 1, '编辑会员: ectest2', '127.0.0.1'),
(1466, 1472089078, 1, '编辑会员: ectest2', '127.0.0.1'),
(1467, 1472089105, 1, '编辑会员: ectest2', '127.0.0.1'),
(1468, 1472090410, 1, '批量删除会员: ectest2', '127.0.0.1'),
(1469, 1472090433, 1, '添加用户: ectest2', '127.0.0.1'),
(1470, 1472090714, 1, '编辑会员: ectest2', '127.0.0.1'),
(1471, 1472090717, 1, '编辑会员: ectest2', '127.0.0.1'),
(1472, 1472090724, 1, '编辑会员: ectest2', '127.0.0.1'),
(1473, 1472090833, 1, '删除会员: ectest2', '127.0.0.1'),
(1474, 1472090871, 1, '添加用户: ectest2', '127.0.0.1'),
(1475, 1472090913, 1, '删除会员: ectest2', '127.0.0.1'),
(1476, 1472090972, 1, '添加用户: ectest2', '127.0.0.1'),
(1477, 1472090976, 1, '删除会员: ectest2', '127.0.0.1'),
(1478, 1472091073, 1, '添加用户: ectest2', '127.0.0.1'),
(1479, 1472091077, 1, '删除会员: ectest2', '127.0.0.1'),
(1480, 1472174610, 1, '新規ユーザ: ectest2', '127.0.0.1'),
(1481, 1472175891, 35, '新規商品: HG 機動戦士ガンダム 鉄血のオルフェンズ ガンダムアスタロト 1/144スケール 色分け済みプラモデル ', '127.0.0.1');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_ad_position`
--

CREATE TABLE IF NOT EXISTS `zh_ec_ad_position` (
  `position_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位自增id',
  `position_name` varchar(60) NOT NULL COMMENT '广告位名称',
  `ad_width` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位宽度',
  `ad_height` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位高度',
  `position_desc` varchar(255) NOT NULL COMMENT '广告位描述',
  `position_style` text NOT NULL COMMENT '广告位模板代码',
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告位置配置表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_ad_position`
--

INSERT INTO `zh_ec_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(2, '测试广告2', 100, 100, '测试广告2', '<table cellpadding="0" cellspacing="0">\r\n<foreach from="$ads" value="$ad">\r\n<tr><td>{$ad}</td></tr>\r\n</foreach>\r\n</table>');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_agency`
--

CREATE TABLE IF NOT EXISTS `zh_ec_agency` (
  `agency_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(255) NOT NULL,
  `agency_desc` text NOT NULL,
  PRIMARY KEY (`agency_id`),
  KEY `agency_name` (`agency_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `zh_ec_agency`
--

INSERT INTO `zh_ec_agency` (`agency_id`, `agency_name`, `agency_desc`) VALUES
(6, '上海办事处', '上海办事处');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_area_region`
--

CREATE TABLE IF NOT EXISTS `zh_ec_area_region` (
  `shipping_area_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '''配送区域的id号，等同于ecs_shipping_area的shipping_area_id的值',
  `region_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '地区列表，等同于ecs_region的region_id',
  PRIMARY KEY (`shipping_area_id`,`region_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='记录表ecs_shipping_area中的shipping_area_name的地区名包括ecs_region中的城市';

--
-- テーブルのデータのダンプ `zh_ec_area_region`
--

INSERT INTO `zh_ec_area_region` (`shipping_area_id`, `region_id`) VALUES
(6, 25);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_article`
--

CREATE TABLE IF NOT EXISTS `zh_ec_article` (
  `article_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `cat_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '该文章的分类，同article_cat的cat_id,如果不在，将自动成为保留类型而不能删除',
  `title` varchar(150) NOT NULL COMMENT '文章题目',
  `content` longtext NOT NULL COMMENT '文章内容',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `author_email` varchar(60) NOT NULL COMMENT '文章作者的email',
  `keywords` varchar(255) NOT NULL COMMENT '文章的关键字',
  `article_type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '文章类型，0，普通；1，置顶；2和大于2的，为保留文章，保留文章不能删除',
  `is_open` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示。1，显示；0，不显示',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章添加时间',
  `file_url` varchar(255) NOT NULL COMMENT '上传文件或者外部文件的url',
  `open_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0,正常；当该字段为1或者2时，会在文章最后添加一个链接“相关下载”，连接地址等于file_url的值；但程序在此处有bug',
  `link` varchar(255) NOT NULL COMMENT '该文章标题所引用的连接，如果该项有值将不能显示文章内容，即该表中content的值',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  PRIMARY KEY (`article_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章内容表' AUTO_INCREMENT=42 ;

--
-- テーブルのデータのダンプ `zh_ec_article`
--

INSERT INTO `zh_ec_article` (`article_id`, `cat_id`, `title`, `content`, `author`, `author_email`, `keywords`, `article_type`, `is_open`, `add_time`, `file_url`, `open_type`, `link`, `description`) VALUES
(1, 2, '免责条款', '', '', '', '', 0, 1, 1432537679, '', 0, '', NULL),
(2, 2, '隐私保护', '', '', '', '', 0, 1, 1432537679, '', 0, '', NULL),
(3, 2, '咨询热点', '', '', '', '', 0, 1, 1432537679, '', 0, '', NULL),
(4, 2, '联系我们', '', '', '', '', 0, 1, 1432537679, '', 0, '', NULL),
(5, 2, '公司简介', '', '', '', '', 0, 1, 1432537679, '', 0, '', NULL),
(6, -1, '用户协议', '', '', '', '', 0, 1, 1432537679, '', 0, '', NULL),
(7, 4, '三星电子宣布将在中国发布15款3G手机', '<p>全球领先的电子产品及第二大移动通信终端制造商三星电子今天在北京宣布，为全面支持中国开展3G移动通信业务，将在3G服务正式商用之际，向中国市场推出 15款3G手机。这些产品分别支持中国三大无线运营商的各种3G服务，并已经得到运营商的合作认可。凭借在电子和通信领域的整体技术实力和对消费者的准确 把握，三星电子已经开始全面发力中国的3G移动通信市场。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;2009年1月，中国政府宣布正式启动3G移动通信服务。并根据中国的实际情况，决定由三大运营商分别采用全部三种3G网络制式，&nbsp;即以中国自主知识产权为核心的TD-SCDMA，以欧洲为主要市场的WCDMA和源自北美的CDMA2000技术。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;多 年来，三星电子秉承&ldquo;做中国人民喜爱的企业，贡献于中国社会的企业&rdquo;的企业理念，准确地把握了中国社会的发展和市场的需求，推出了一系列深受中国消费者喜 爱的电子产品。为了配合中国推进具有自主知识产权的3G移动通信标准TD-SCDMA，&nbsp;三星电子从2000年开始在中国设立了通信技术研究院，&nbsp;开始进 行TD-SCDMA技术的研究。作为最早承诺支持中国3G标准的手机制造企业，三星电子已经先后投入了上亿元的研究费用，&nbsp;组建了几百人的研发团队。推出 的TD-SCDMA制式的产品，不仅通过了各级权威部门的试验和检测，也经历了2008年北京奥运会的现场考验。此次为中国移动定制的TD-SCDMA手 机，包括了满足高端商务需求的双待产品B7702C，以及数字电视手机、多媒体手机和时尚手机。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;作为世界第二大手机制造企业，三 星电子已经在全球3G市场积累了多年的技术和市场经验。最新的统计表明，在完全采用WCDMA标准的欧洲，三星电子的市场份额已经排名第二。在为中国联通 准备的产品中，不仅包括能够支持HSDPA的高端多媒体手机S7520U，也涵盖了能够支持高速上网、在线电影、在线音乐等适合不同消费需求的各种产品。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;而 在主要采用CDMA2000技术的北美市场，三星电子也取得了市场份额的第一名。即将陆续上市的支持中国电信3G服务的EVDO产品，有高端商务手机 W709。该机能够支持EVDO/GSM的双网双待功能，含800万像素拍摄系统。其他产品还包括音乐手机M609，双模手机W239，以及时尚设计的 F539等。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;作为世界上少数能够提供支持三种3G标准的终端厂商，三星电子正利用其在通信、半导体、显示器以及数字多媒体等方面 的优势，加快产品数字融合的进程。除上述3G手机产品外，三星电子也于近期推出了用于3G网络的上网卡和网络笔记本电脑。三星电子专务、无线事业部大中华 区高级副总裁卢基学先生说，&ldquo;上述15款新品，&nbsp;只是我们二季度新产品的一部分。随着中国3G移动通信市场的不断扩大，三星还将推出更多适合中国市场的终 端产品，以满足消费者对于通信和数字产品的不同需求。三星也将积极配合运营商业务的发展计划，加快技术和应用的研发。中国3G的移动通信市场前景将是非常 明亮的。&rdquo;</p>', '', '', '', 0, 0, 1241426864, '', 0, 'http://', NULL),
(8, 4, '诺基亚牵手移动 5款热门TD手机机型推荐', '<table width="100%" cellspacing="0" cellpadding="4" align="center" class="tableborder">\r\n<tbody>\r\n<tr>\r\n<td width="180" valign="top" class="altbg4">&nbsp;</td>\r\n<td height="100%" valign="top" class="altbg3">\r\n<table cellspacing="0" cellpadding="0" border="0" style="padding: 5px; table-layout: fixed; width: 973px; height: 2195px;">\r\n<tbody>\r\n<tr>\r\n<td valign="top">\r\n<div class="bbs_content clearfix">随着5月17日电信日的来临，自从09年初网民对于3G方面关注越来越多，目前国内3G网络主要有中国移动TD-SCDMA，中国联通WCDMA以及 中国电信的CDMA2000这三种制式。到底是哪一种网络制式能让消费者满意，相信好多消费者都难以判断。<br />\r\n<br />\r\n而作为3G网络最主要的组 成部分-手持终端（手机） ，相信也是好多消费者关注的焦点。目前，中国移动TD-SCDMA手机机型频频爆出，其中不乏亮点产品，像联想联想 Ophone、诺基亚、多普达 Magic等，下面就让笔者与大家一起来了解TD-SCDMA网络制式下的几款强势机型吧。<br />\r\n<br />\r\n诺基亚TD-SCDMA手机　型号：待定　参考报价：尚未上市<br />\r\n<br />\r\n随着国内3G网络发展速度加快及众多手机厂商纷纷跟进，诺基亚终于推出TD-SCDMA手机，这款诺基亚的首台TD-SCDMA测试手机型号目前仍无法 得知，但从键盘及菜单设计来看，我们可以是知道其并没有采用S60操作系统，只是配备了S40系统，机身直板造型与早期热卖的6300有几分相像。<br />\r\n<br />\r\n<p><img width="450" alt="" src="http://dstatic.esqimg.com/4812278/1.jpg" style="display: block;" /></p>\r\n<br />\r\n<br />\r\n图为：诺基亚TD-SCDMA手机<br />\r\n<br />\r\n虽然没有更多的参数资料，但是从曝光的图片我们可以知道这款诺基亚TD-SCDMA手机必定配备了QVGA分辨率的屏幕以及320万像素的摄像头，而标准的MP3以及蓝牙等功能自然不会缺少，在功能方面不会比以往的S40手机逊色。<br />\r\n<br />\r\n<p><img width="450" alt="" src="http://dstatic.esqimg.com/4812279/2.jpg" style="display: block;" /></p>\r\n<br />\r\n<br />\r\n图为：诺基亚TD-SCDMA手机<br />\r\n<br />\r\n这款诺基亚的TD手机最大的卖点便是提供了对TD-HSDPA技术的支持，最大的功能特色便是该技术被看为是TD网络下一步的演进技术，能够同时适用于 WCDMA和TD-SCDMA两种不同的网络支持，能够很好的支持非对称的数据业务，也就是说这款诺基亚手机的用户即便在全球漫游都能够使用到3G网络。 而其机身前置的摄像头也更是证实了其3G手机的身份。<br />\r\n<br />\r\n<p><img width="450" alt="" src="http://dstatic.esqimg.com/4812280/3.jpg" style="display: block;" /></p>\r\n<p><br />\r\n<br />\r\n图为：诺基亚TD-SCDMA手机<br />\r\n<br />\r\n从目前曝光的测试情况来看，通过这款诺基亚TD手机连接网络，其下载速度能够稳定在1.3Mbps左右，不过根据国内有些媒体的报道，诺基亚官方已经证实将于今天下半年配合运营商中国移动对出自己的第一款TD-SCDMA制式的S60手机，大家要拭目以待了。</p>\r\n<p>&nbsp;</p>\r\n图为：诺基亚TD-SCDMA手机<br />\r\n<br />\r\n最后较为耐人寻味的便是目前有业内人士指出目前曝光的的诺基亚TD手机其实是去年夏季就出现过的 TD测试手机，但是随着诺基亚拥有部分股份的TD芯片厂商&ldquo;凯明&rdquo;的倒闭，这款机型也就被取消了。尽管对于目前这款诺基亚的TD测试手机的身份尚无官方的 消息，但是诺基亚将推出TD手机遗失毫无悬念的事情了，相信大家也希望在TD制式下能够有更多的手机可以选择。</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '', '', '', 0, 0, 1241427051, '', 0, 'http://', NULL),
(9, 5, 'アフタープロセス', '', '', '', '', 0, 1, 1242576700, '', 0, 'http://', ''),
(10, 5, '買い物フロー', '', '', '', '', 0, 1, 1242576717, '', 0, 'http://', ''),
(11, 5, '注文方法', '', '', '', '', 0, 1, 1242576727, '', 0, 'http://', ''),
(12, 6, '如何分辨原装电池', '<p><font size="2">一般在购买时主要是依靠观察外观特征的方法来鉴别电池，而原装电池一般应具有以下一些特征：&nbsp;<br />\n<br />\n1、 电池外观整齐，外表面有一定的粗糙度且手感舒适，内表面手感光滑，灯光下能看见细密的纵向划痕&nbsp;<br />\n<br />\n2、 生产厂家字样应该轮廓清晰，且防伪标志亮度高，看上去有立体感，电池标贴 字迹清晰，有与电池类型相一致的电池件号<br />\n3、 电池标贴采用二次印刷技术，在一定光线下从斜面看，条形码部分的颜色比其他部分要黑，且用手触摸有凹凸感<br />\n<br />\n4、 原装电池电极与手机电池片宽度相等，电池电极下方标有&ldquo; + &rdquo;、&ldquo; - &rdquo;标志，电池电极片之间的隔离材料与外壳材料一致，但不是一体<br />\n<br />\n5、 原装电池装入手机时手感舒适，安装自如，电池按压部分卡位适当而且牢固<br />\n<br />\n6、 原装电池的金属触点采用优质的铜片，只有在正面看时才会有反光，而从其它角度看的话，都是比较暗淡的</font></p>', '', '', '', 1, 0, 1242576826, '', 0, 'http://', NULL),
(15, 7, '到着支払いエリア', '', '', '', '', 0, 1, 1242577023, '', 0, 'http://', ''),
(16, 7, '配送支払い検索方法', '', '', '', '', 0, 1, 1242577032, '', 0, 'http://', ''),
(17, 7, '支払い方法説明', '', '', '', '', 0, 1, 1242577041, '', 0, 'http://', ''),
(18, 10, '資金管理', '', '', '', '', 0, 1, 1242577127, '', 0, 'user.php?act=account_log', ''),
(19, 10, '私の収蔵', '', '', '', '', 0, 1, 1242577178, '', 0, 'user.php?act=collection_list', ''),
(20, 10, '私の注文', '', '', '', '', 0, 1, 1242577199, '', 0, 'user.php?act=order_list', ''),
(21, 8, '返品原則', '', '', '', '服务', 0, 1, 1242577293, '', 0, 'http://', ''),
(22, 8, 'アフター サービス保障', '', '', '', '售后', 0, 1, 1242577308, '', 0, 'http://', ''),
(23, 8, '商品品質保証', '', '', '', '质量', 1, 1, 1242577326, '', 0, 'http://', ''),
(24, 9, 'サイト故障報告', '', '', '', '', 0, 1, 1242577432, '', 0, 'http://', ''),
(25, 9, '选机咨询 ', '', '', '', '', 0, 0, 1242577448, '', 0, 'http://', NULL),
(26, 9, 'クレームと意見 ', '', '', '', '', 0, 1, 1242577459, '', 0, 'http://', ''),
(27, 4, '800万像素超强拍照机 LG Viewty Smart再曝光', '', '', '', '', 0, 0, 1242577702, '', 0, 'http://news.imobile.com.cn/index-a-view-id-66790.html', NULL),
(28, 11, '飞利浦9@9促销', '<p>&nbsp;</p>\r\n<div class="boxCenterList RelaArticle" id="com_v">\r\n<p align="left">作为一款性价比极高的入门级<font size="3" color="#ff0000"><strong>商务手机</strong></font>，飞利浦<a href="mailto:9@9v">Xenium&nbsp; 9@9v</a>三围大小为105&times;44&times;15.8mm，机身重量仅为<strong><font size="3" color="#ff0000">75g</font></strong>，装配了一块低规格1.75英寸128&times;160像素65000色CSTN显示屏。身正面采用月银色功能键区与屏幕数字键区相分隔，键盘设计较为<font size="3"><strong><font color="#ff0000">别</font><font color="#ff0000">致</font></strong></font>，中部导航键区采用钛金色的&ldquo;腰带&rdquo;彰显出浓郁的商务气息。</p>\r\n<p align="left">&nbsp;</p>\r\n<p align="left">此款手机采用<strong><font size="3" color="#ff0000">触摸屏</font></strong>设计，搭配精致的手写笔，可支持手写中文和英文两个版本。增强的内置系统还能识别潦草字迹，确保在移动中和匆忙时输入文字的识别率。手写指令功能还支持特定图案的瞬间调用，独特的手写记事本功能，可以在触摸屏上随意绘制个性化的图案并进行<strong><font size="3" color="#ff0000">记事提醒</font></strong>，让商务应用更加随意。</p>\r\n<p align="left">&nbsp;</p>\r\n<p align="left">&nbsp;作为入门级为数不多支持<strong><font size="3" color="#ff0000">双卡功能</font></strong>的手机，可以同时插入两张SIM卡，通过菜单随意切换，只需开启漫游自动切换模式，<a href="mailto:9@9V">9@9V</a>在该模式下能够判断网络情况，自动切换适合的手机号。</p>\r\n<p align="left">&nbsp;</p>\r\n<p align="left">&nbsp;</p>\r\n</div>\r\n<p>&nbsp;</p>', '', '', '', 0, 0, 1242578199, '', 0, 'http://', NULL),
(29, 11, '诺基亚5320 促销', '<p>&nbsp;</p>\r\n<div id="com_v" class="boxCenterList RelaArticle">\r\n<p>诺基亚5320XpressMusic音乐手机采用XpressMusic系列常见的黑红、黑蓝配色方案，而材质方便则选用的是经过<strong><font size="3" color="#ff0000">抛光处理</font></strong>的工程塑料；三围/体重为，为108&times;46&times;15mm/<strong><font size="3" color="#ff0000">90g</font></strong>，手感舒适。</p>\r\n<p>&nbsp;</p>\r\n<p>诺基亚5320采用的是一块可视面积为2.0英寸的<font size="3" color="#ff0000"><strong>1600万色</strong></font>屏幕，分辨率是常见的240&times;320像素（QVGA）。虽然屏幕不是特别大，但效果非常精细，色彩还原不错。</p>\r\n<p>&nbsp;</p>\r\n<p>手机背面，诺基亚为5320XM配备一颗<strong><font size="3" color="#ff0000">200W像素</font></strong>的摄像头，并且带有<strong><font size="3" color="#ff0000">两个LED的补光灯</font></strong>，可以实现拍照、摄像功能，并能通过彩信、邮件方式发送给朋友。</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p>&nbsp;</p>', '', '', '', 1, 0, 1242578676, '', 0, 'http://', NULL),
(30, 11, '促销诺基亚N96', '<p>&nbsp;</p>\r\n<div class="boxCenterList RelaArticle" id="com_v">\r\n<p>诺基亚N96采用了<strong><font size="3" color="#ff0000">双向滑盖</font></strong>设计，机身整体呈灰黑色，沉稳、大气，机身材质采用了高强度的塑料材质，手机背面采用了抛光面板的设计风格。N96三维体积103*55*20mm，重量为125g。屏幕方面，诺基亚N96配备一块<strong><font size="3" color="#ff0000">2.8英寸</font></strong>的屏幕，支持<strong><font size="3" color="#ff0000">1670万色</font></strong>显示，分辨率达到QVGA（320&times;240）水准。</p>\r\n<p>&nbsp;<img src="http://img2.zol.com.cn/product/21/896/ceN6LBMCid3X6.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p>诺基亚N96设置有专门的<strong><font size="3" color="#ff0000">音乐播放键</font></strong>和标准的3.5毫米音频插口，支持多格式音乐播放。内置了<strong><font size="3" color="#ff0000">多媒体播放器</font></strong>，支持FM调频收音机等娱乐功能。N96手机支持<strong><font size="3" color="#ff0000">N-Gage游戏平台</font></strong>，内置包括<font size="3" color="#ff0000"><strong>《PinBall》完整版</strong></font>在内的四款N-Gage游戏，除了手机本身内置的游戏，还可以从N-Gage的网站下载或者购买最新的游戏，而且可以在论坛里和其他玩家一起讨论。</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p>&nbsp;<img src="http://img2.zol.com.cn/product/21/898/cekkw57qJjSI.jpg" alt="" /></p>', '', '', '', 1, 0, 1242578826, '', 0, 'http://', NULL),
(13, 6, '如何分辨水货手机 ', '<p>\n<div class="artibody">\n<p><font size="2"><strong>1、&nbsp;什么是水货？</strong><br />\n提及水货手机，按照行业内的说法，可以将水货手机分成三类：A类、B类和C类。 </font></p>\n<p><font size="2">A类水货手机是指由国外、港澳台等地区在没有经过正常海关渠道的情况下进入国内市场的产品，就是我们常说的走私货， 与行货的主要差异是在输入法上，这类手机都是英文输入法或者是港澳台地区的繁体中文输入法。这类手机其最主要的目的是为了逃避国家关税或者因为该种产品曾 经过不正当改装而不能够通过正常渠道入关，质量一般没有大的问题。但由于逃避关税本身就是违法的，所以购买这类手机的用户根本得不到任何售后保障服务； </font></p>\n<p><font size="2">B类水货手机就是走私者将手机的系统软件由英文版升级至中文版后，偷运到内地，然后贴上非法渠道购买的入网标志，作为行货手机充数。 </font></p>\n<p><font size="2">C类水货手机则是那些由其他型号机改装、更换芯片等等方法做假&ldquo;生产&rdquo;出来的，或者就是从各地购买手机的部件，自己组装然后再贴上非法购买的入网标志。 </font></p>\n<p><font size="2">水货手机虽然不排除它是原厂正货的可能，但通过市场调研发现，绝大多数水货手机都是改版的次货，而且产品基本没有受国内厂商的保修许可。</font></p>\n<p><font size="2"><strong>2、水货有哪些？</strong>水货有两种，一种俗称港行，也称作水行，这种产品原本是在香港 及周边地区销售的，但是经过非法途径进入大陆地区销售。另一种是欧版水改机，也称作欧版，水改等，此种产品以英文改版机为主，通过刷改机内软件达到英文改 中文的目的，原来这类产品是销往欧美地区的，由于和大陆地区有相当大的价格差，所以通过走私进入中国市场。</font></p>\n<p><font size="2"><strong>3、水货手机的危害</strong><br />\n1、售后服务无保障 <br />\n手机作为精密类电子产品，软件、硬件方面都有可能产生不同的问题。购买正规渠道的手机，一旦出现问题，只要将问题反映给厂商客户服务中心并静候佳音就 可以了。大多数走私手机的贩卖点规模较小，根本没有资金和技术能力建立起自己的维修网点，因此他们往往制定非常苛刻的保修条件，将国家明令的一年保修期缩 短为三个月，并加入完全对走私手机经销商有利的诸如&ldquo;认为摔打&rdquo;等概念难以界定的排除条件(众所周知，手机很有可能发生摔撞事件)，是确确实实的霸王条 款。规定时间内手机出了故障，走私手机经销商会通过曲解条款尽可能地开脱保修责任。即使他们愿意承担保修服务，也需将手机发往广州、深圳等地，委托他人维 修。一来路途漫长，二来经手人繁多，小问题&ldquo;修&rdquo;成了大问题。最终走私手机经销商会以无法维修为由劝客户自行去当地正规客服维修。至于维修费用，他们自然 也不愿意出了。<br />\n<br />\n2、产品本身质量不过关<br />\n&nbsp;&nbsp;&nbsp; 现在很多奸商为了谋取暴利，经常使用C类的翻修或者组装手机冒充A类水货手机进行销售。作为消费者来说面对和正规行货之间巨大的价格差异，他们无法分辨想要购买的手机是否象销售商说的那样质量过硬，在销售商的巧舌如簧下只能眼看自己的钱包&ldquo;减肥&rdquo;。 </font></p>\n<p><font size="2">但是这类翻修或者组装的水货手机往往为了降低成本，其采用的配件往往也是不合格产品，甚至也是伪劣产品，可以想象由这样产品组装起来的手机的质量究竟可以好到那里去。目前在经常看到手机电池爆炸伤人的事件的报道，究其原因也是消费者购买了这些组装的水货手机。</font></p>\n<p><font size="2">而且不光这类手机硬件存在问题，包括手机使用的软件。由于组装的水货硬件规格根本无法保证和原场产品一致，手机使用的软件也会造成和手机硬件的冲突。频繁死机就是家常便饭，更有甚者会造成经常性的电话本丢失，无法联系到好友。</font></p>\n<p><br />\n<font size="2"><strong>4、如何分辨行、水货手机？</strong><br />\n1、看手机上是否贴有信息产业部&ldquo;进网许可&rdquo;标志。水货与正品的入网标志稍微有一点不同：真的入网标志一般都是针式打印机打印的，数字清晰，颜色较浅，仔细看有针打的凹痕；假的入网标志一般是普通喷墨打印机打印的，数字不很清晰，颜色较深，没有凹痕。 </font></p>\n<p><font size="2">2、检查手机的配置，包括中文说明书、电池、充电器等，如果是厂家原配，一般均贴有厂家的激光防伪标志。原厂配置的 中文说明书通常印刷精美，并与其他语言的说明书及相关产品资料的印刷质量、格式、风格等保持一致。不是原厂家配置的中文说明书通常印刷质量低劣，常出现错 别字，甚至字迹模糊。正品手机的包装盒中均附带有原厂合格证、原厂条码卡、原厂保修卡，而水货则没有。 </font></p>\n<p><font size="2">3、确认经销商的保修条例是否与厂家一致，在购买手机时应索要发票和保修卡。 </font></p>\n<p><font size="2">4、电子串号是否一致也是验证是否水货手机的重要途径。首先在手机上按&ldquo;*#06#&rdquo;，一般会在手机上显示15个数 字，这就是本手机的IMEI码。然后打开手机的电池盖，在手机里有一张贴纸，上面也有一个IMEI码，这个码应该同手机上显示的IMEI码完全一致。然后 再检查手机的外包装盒上的贴纸，上面也应该有一个IMEI码，这个码也应该同手机上显示的IMEI码完全一致。如果此三个码有不一致的地方，这个手机就有 问题。</font></p>\n</div>\n<p>&nbsp;</p>\n</p>', '', '', '', 0, 0, 1242576911, '', 0, 'http://', NULL),
(14, 6, '如何享受全国联保', '', '', '', '', 0, 0, 1242576927, '', 0, 'http://', NULL),
(31, 12, '诺基亚6681手机广告欣赏', '<object>\n<param value="always" name="allowScriptAccess" />\n<param value="transparent" name="wmode" />\n<param value="http://6.cn/player.swf?flag=0&amp;vid=nZNyu3nGNWWYjmtPQDY9nQ" name="movie" /><embed width="480" height="385" src="http://6.cn/player.swf?flag=0&amp;vid=nZNyu3nGNWWYjmtPQDY9nQ" allowscriptaccess="always" wmode="transparent" type="application/x-shockwave-flash"></embed></object>', '', '', '', 0, 0, 1242579069, '', 0, 'http://', NULL),
(32, 12, '手机游戏下载', '<p>三星SGHU308说明书下载，点击相关链接下载</p>', '', '', '', 1, 0, 1242579189, '', 0, 'http://soft.imobile.com.cn/index-a-list_softs-cid-1.html', NULL),
(33, 12, '三星SGHU308说明书下载', '<p>三星SGHU308说明书下载</p>', '', '', '', 1, 0, 1242579559, 'data/article/1245043292228851198.rar', 2, 'http://', NULL),
(34, 12, '3G知识普及', '<p>\n<h2>3G知识普及</h2>\n<div class="t_msgfont" id="postmessage_8792145"><font color="black">3G，全称为3rd Generation，中文含义就是指第三代数字通信。<br />\n</font><br />\n<font color="black">　　1995年问世的第一代<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%C4%A3%C4%E2">模拟</span>制式<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%CA%D6%BB%FA">手机</span>（1G）只能进行<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%D3%EF%D2%F4">语音</span>通话；<br />\n</font><br />\n<font color="black">　　1996到1997年出现的第二代GSM、TDMA等数字制式手机（2G）便增加了接收数据的功能，如接收电子邮件或网页；<br />\n</font><br />\n<font color="black">　　3G不是2009年诞生的，它是上个世纪的产物，而早在2007年国外就已经产生4G了，而<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%D6%D0%B9%FA">中国</span>也于2008年成功开发出<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%D6%D0%B9%FA">中国</span>4G，其网络传输的速度可达到每秒钟2G，也就相当于下一部电影只要一秒钟。在上世纪90年末的日韩电影如《我的野蛮女友》中，女主角使用的可以让对方看见自己的视频<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%B5%E7%BB%B0">电话</span>，就是属于3G技术的重要运用之一。日韩等国3G的运用是上世纪末期的事。而目前国外有些地区已经试运行3.5G甚至4G网络。<br />\n</font><br />\n<font color="black">　 </font><font color="black">（以下为误导）2009年问世的第三代（3G）与 前两代的主要区别是在传输声音和数据的速度上的提升，它能够在全球范围内更好地实现无缝漫游，并处理图像、音乐、视频流等多种媒体形式，提供包括网页浏 览、电话会议、电子商务等多种信息服务，同时也要考虑与已有第二代系统的良好兼容性。为了提供这种服务，无线网络必须能够支持不同的数据传输速度，也就是 说在室内、室外和行车的环境中能够分别支持至少2Mbps（兆比特／每秒）、384kbps（千比特／每秒）以及144kbps的传输速度。（此数值根据 网络环境会发生变化)。<br />\n</font><br />\n<font color="black">　　3G标准，国际电信联盟(ITU)目前一共确定了全球四大3G标准，它们分别是WCDMA、CDMA2000和TD-SCDMA和WiMAX。</font><br />\n<br />\n<font color="black">3G标准　　国际电信联盟（ITU）在2000年5月确定W-CDMA、CDMA2000、TD-SCDMA以 及WiMAX四大主流无线接口标准，写入3G技术指导性文件《2000年国际移动通讯计划》（简称IMT&mdash;2000）。 CDMA是Code Division Multiple Access (码分多址)的缩写，是第三代移动通信系统的技术基础。第一代移动通信系统采用频分多址(FDMA)的模拟调制方式，这种系统的主要缺点是频谱利用率低， 信令干扰话音业务。第二代移动通信系统主要采用时分多址(TDMA)的数字调制方式，提高了系统容量，并采用独立信道传送信令，使系统性能大大改善，但 TDMA的系统容量仍然有限，越区切换性能仍不完善。CDMA系统以其频率规划简单、系统容量大、频率复用系数高、抗多径能力强、通信质量好、软容量、软 切换等特点显示出巨大的发展潜力。下面分别介绍一下3G的几种标准：<br />\n</font><br />\n<br />\n<font color="black">　　 </font><br />\n<font color="black">(1) W-CDMA</font><font color="black"><br />\n</font><br />\n<br />\n<font color="black">　　也称为WCDMA，全称为Wideband CDMA，也称为CDMA Direct Spread，意为宽频分码多重存取，这是基于GSM网发展出来的3G技术规范，是欧洲提出的宽带CDMA技术，它与日本提出的宽带CDMA技术基本相 同，目前正在进一步融合。W-CDMA的支持者主要是以GSM系统为主的欧洲厂商，日本公司也或多或少参与其中，包括欧美的爱立信、阿尔卡特、<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%C5%B5%BB%F9%D1%C7">诺基亚</span>、 朗讯、北电，以及日本的NTT、富士通、夏普等厂商。 该标准提出了GSM(2G)-GPRS-EDGE-WCDMA(3G)的演进策略。这套系统能够架设在现有的GSM网络上，对于系统提供商而言可以较轻易 地过渡，但是GSM系统相当普及的亚洲对这套新技术的接受度预料会相当高。因此W-CDMA具有先天的市场优势。<br />\n</font><br />\n<br />\n<font color="black">　　 </font><br />\n<font color="black">(2)CDMA2000</font><font color="black"><br />\n</font><br />\n<br />\n<font color="black">　　CDMA2000是由窄带CDMA(CDMA IS95)技术发展而来的宽带CDMA技术，也称为CDMA Multi-Carrier，它是由美国高通北美公司为主导提出，<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%C4%A6%CD%D0%C2%DE%C0%AD">摩托罗拉</span>、Lucent 和后来加入的韩国三星都有参与，韩国现在成为该标准的主导者。这套系统是从窄频CDMAOne数字标准衍生出来的，可以从原有的CDMAOne结构直接升 级到3G，建设成本低廉。但目前使用CDMA的地区只有日、韩和北美，所以CDMA2000的支持者不如W-CDMA多。不过CDMA2000的研发技术 却是目前各标准中进度最快的，许多3G手机已经率先面世。该标准提出了从CDMA IS95(2G)-CDMA20001x-CDMA20003x(3G)的演进策略。CDMA20001x被称为2.5代移动通信技术。 CDMA20003x与CDMA20001x的主要区别在于应用了多路载波技术，通过采用三载波使带宽提高。目前<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%D6%D0%B9%FA%B5%E7%D0%C5">中国电信</span>正在采用这一方案向3G过渡，并已建成了CDMA IS95网络。<br />\n</font><br />\n<br />\n<font color="black">　　 </font><br />\n<font color="black">(3)TD-SCDMA</font><font color="black"><br />\n</font><br />\n<br />\n<font color="black">　　全称为Time Division - Synchronous CDMA(时分<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%CD%AC%B2%BD">同步</span>CDMA)，该标准是由中国大陆独自制定的3G标准，1999年6月29日，中国原邮电部电信科学技术研究院（大唐电信）向ITU提出。该标准将智能无线、<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%CD%AC%B2%BD">同步</span>CDMA和<span class="t_tag" onclick="tagshow(event)" href="http://mbbs.enet.com.cn/tag.php?name=%C8%ED%BC%FE">软件</span>无 线电等当今国际领先技术融于其中，在频谱利用率、对业务支持具有灵活性、频率灵活性及成本等方面的独特优势。另外，由于中国内的庞大的市场，该标准受到各 大主要电信设备厂商的重视，全球一半以上的设备厂商都宣布可以支持TD&mdash;SCDMA标准。 该标准提出不经过2.5代的中间环节，直接向3G过渡，非常适用于GSM系统向3G升级。<br />\n</font><br />\n<br />\n<font color="black">　　 </font><br />\n<font color="black">(4)WiMAX</font><font color="black"><br />\n</font><br />\n<br />\n<font color="black">　　WiMAX 的全名是微波存取全球互通(Worldwide Interoperability for Microwave Access)，又称为802&middot;16无线城域网，是又一种为企业和家庭用户提供&ldquo;最后一英里&rdquo;的宽带无线连接方案。将此技术与需要授权或免授权的微波设备 相结合之后，由于成本较低，将扩大宽带无线市场，改善企业与服务供应商的认知度。2007年10月19日，国际电信联盟在日内瓦举行的无线通信全体会议 上，经过多数国家投票通过，WiMAX正式被批准成为继WCDMA、CDMA2000和TD-SCDMA之后的第四个全球3G标准。</font></div>\n</p>', '', '', '', 0, 0, 1242580013, '', 0, 'http://', NULL),
(35, 4, '“沃”的世界我做主', '<p><strong>导语：<br />\n<br />\n</strong>&nbsp;&nbsp;&nbsp;&nbsp;今年5月17日，是每年一度的世界电信日。同时，也是值得中国人民高兴的日子。昨天，中国联通企业品牌下的全品牌业务&ldquo;沃&rdquo;开始试商用，这也就意味着继中国移动、中国电信之后，国内第三种3G网络将要走入我们的生活，为我们带来更加快速便捷的通信服务。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;沃，意味着此品牌将为用户提供一个丰盈的平台，为个人客户、家庭客户、集团客户和企业服务提供全面的支撑，它代表着中国联通全新的服务理念和创新的品牌精神，在3G时代，为客户提供精彩的信息化服务。<br />\n<br />\n&nbsp;&nbsp;&nbsp;&nbsp;下面小编为各位介绍几款各大手机品牌专为&ldquo;沃&rdquo;打造的定制机型，为您迎接&ldquo;沃&rdquo;的到来做好充分准备。</p>\n<p><strong>诺基亚6210si<br />\n<br />\n</strong>&nbsp;&nbsp;&nbsp;&nbsp;诺基亚6210s大家肯定不陌生，经典的滑盖导航手机。其实6210si 与6210s外观、参数、硬件配置几乎完全一样，只不过在6210s的基础上，增加了对WCDMA网络的支持，成为中国联通定制手机。6210si采用诺 基亚经典的滑盖机身设计，机身面板为钢琴烤漆材质，高贵优雅。机身背板则为磨砂外观工程塑料材质，美观的同时增加了手机与手掌间的摩擦系数，防止使用中手 机滑落。</p>\n<p><strong>摩托罗拉A3100<br />\n</strong><br />\n&nbsp;&nbsp;&nbsp;&nbsp;作为摩托罗拉旗下为中国联通定制的A3100，它有着经典的鹅卵石造型， 大气稳重。从最初的U6，到U9再到A3100，鹅卵石的辉煌依旧。A3100有着高贵的血统，钢琴烤漆黑色面板，金属拉丝机身以及 Windows&nbsp;Mobile&nbsp;6.1&nbsp;Professional操作系统，都告诉我们它绝对是一部不可多得的好手机。</p>\n<p><br />\n<strong>三星S7520U<br />\n</strong><br />\n&nbsp;&nbsp;&nbsp;&nbsp;三星S7520U外观造型时尚，镜面设计以及超薄的 98.4&times;55&times;11.6mm金属机身，更适合女性朋友使用。通观机身，最显眼的就要数这3.0英寸的超大触摸屏幕了，400x240的WQGVA级别分 辨率，能够比QVGA级别屏幕显示更为细腻，细节表现力更强。500万像素摄像头说明了该机还是一名拍照能手，捕捉精彩瞬间不在话下。</p>', '', '', '', 0, 0, 1242974613, '', 0, 'http://', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_article_cat`
--

CREATE TABLE IF NOT EXISTS `zh_ec_article_cat` (
  `cat_id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `cat_name` varchar(255) NOT NULL COMMENT '分类名称',
  `cat_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '分类类型；1，普通分类；2，系统分类；3，网店信息；4，帮助分类；5，网店帮助',
  `keywords` varchar(255) NOT NULL COMMENT '分类关键字',
  `cat_desc` varchar(255) NOT NULL COMMENT '分类说明文字',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '分类显示顺序',
  `show_in_nav` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否在导航栏显示；0，否；1，是',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父节点id，取值于该表cat_id字段',
  PRIMARY KEY (`cat_id`),
  KEY `cat_type` (`cat_type`),
  KEY `sort_order` (`sort_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章分类信息表' AUTO_INCREMENT=20 ;

--
-- テーブルのデータのダンプ `zh_ec_article_cat`
--

INSERT INTO `zh_ec_article_cat` (`cat_id`, `cat_name`, `cat_type`, `keywords`, `cat_desc`, `sort_order`, `show_in_nav`, `parent_id`) VALUES
(1, '系统分类', 2, '', '系统保留分类', 50, 0, 0),
(2, '网店信息', 3, '', '网店信息分类', 50, 0, 1),
(3, '网店帮助分类', 4, '', '网店帮助分类', 50, 0, 1),
(4, '3G资讯', 1, '', '', 50, 0, 0),
(5, '新米ガード', 5, '', '', 50, 0, 3),
(6, '携帯常識', 5, '', '手机常识 ', 50, 0, 3),
(7, '配送と決済', 5, '', '配送与支付 ', 50, 0, 3),
(8, 'サービス保障', 5, '', '', 50, 0, 3),
(9, '問い合わせ', 5, '', '联系我们 ', 50, 0, 3),
(10, '会員センタ', 5, '', '', 50, 0, 3),
(11, '手机促销', 1, '', '', 50, 0, 0),
(12, '站内快讯', 1, '', '', 50, 0, 0),
(15, '测试文章分类111', 1, '测试文章分类111', '测试文章分类111测试文章分类111\r\n测试文章分类111', 51, 0, 0),
(16, '测试文章分类2', 1, '', '', 52, 0, 0),
(19, '测试文章分类333', 1, '', '测试文章分类333测试文章分类333', 50, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_attribute`
--

CREATE TABLE IF NOT EXISTS `zh_ec_attribute` (
  `attr_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型，同ecs_goods_type的cat_id',
  `attr_name` varchar(60) NOT NULL DEFAULT '' COMMENT '属性名称',
  `attr_input_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '当添加商品时，该属性的添加类别；0，为手工输入；1，为选择输入；2，为多行文本输入',
  `attr_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '属性是否多选；0，否；1，是；如果可以多选，则可以自定义属性，并且可以根据值的不同定不同的价',
  `attr_values` text NOT NULL COMMENT '如果attr_input_type为1，即选择输入，则attr_name对应的值的取值就是该字段的值',
  `attr_index` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '属性是否可以检索；0，不需要检索；1，关键字检索；2，范围检索；该属性应该是如果检索的话，可以通过该属性找到有该属性的商品',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性显示的顺序，数字越大越靠前，如果数字一样则按id顺序',
  `is_linked` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否关联；0，不关联；1，关联；如果关联，那么用户在购买该商品时，具有有该属性相同值的商品将被推荐给用户',
  `attr_group` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '属性分组，相同的为一个属性组。该值应该取自ecs_goods_type的attr_group的值的顺序',
  PRIMARY KEY (`attr_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品类型属性表，该表记录的是每个商品类型的所有属性的配置情况，具体的商品的属性不在该表' AUTO_INCREMENT=253 ;

--
-- テーブルのデータのダンプ `zh_ec_attribute`
--

INSERT INTO `zh_ec_attribute` (`attr_id`, `cat_id`, `attr_name`, `attr_input_type`, `attr_type`, `attr_values`, `attr_index`, `sort_order`, `is_linked`, `attr_group`) VALUES
(244, 23, '色', 0, 1, '', 0, 0, 0, 0),
(243, 23, 'サイズ', 0, 0, '', 0, 0, 0, 0),
(242, 22, '対象年齢', 0, 0, '', 0, 0, 0, 0),
(241, 21, 'タイプ選択', 0, 1, '', 0, 0, 0, 0),
(240, 21, '耐荷重', 0, 0, '', 0, 0, 0, 0),
(239, 21, '原産国', 0, 0, '', 0, 0, 0, 0),
(238, 21, '本体重量', 0, 0, '', 0, 0, 0, 0),
(237, 21, 'カラー', 0, 0, '', 0, 0, 0, 0),
(236, 21, '材質', 0, 0, '', 0, 0, 0, 0),
(235, 21, 'サイズ', 0, 1, '', 0, 0, 0, 0),
(252, 24, '色', 0, 1, '', 0, 0, 0, 0),
(251, 24, '産地', 0, 0, '', 0, 0, 0, 0),
(250, 24, '材質', 0, 0, '', 0, 0, 0, 0),
(249, 24, '重量', 0, 0, '', 0, 0, 0, 0),
(248, 24, 'サイズ', 0, 0, '', 0, 0, 0, 0),
(247, 23, '他', 2, 0, '', 0, 0, 0, 0),
(246, 22, '他', 0, 0, '', 0, 0, 0, 0),
(245, 22, '対象性別', 0, 0, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_auction_log`
--

CREATE TABLE IF NOT EXISTS `zh_ec_auction_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `act_id` mediumint(8) unsigned NOT NULL COMMENT '拍卖活动的id，取值于ec_goods_activity的act_id字段',
  `bid_user` mediumint(8) unsigned NOT NULL COMMENT '出价的用户id，取值于ec_users的user_id',
  `bid_price` decimal(10,2) unsigned NOT NULL COMMENT '出价价格',
  `bid_time` int(10) unsigned NOT NULL COMMENT '出价时间',
  PRIMARY KEY (`log_id`),
  KEY `act_id` (`act_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='拍卖出价记录信息表' AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_ec_auction_log`
--

INSERT INTO `zh_ec_auction_log` (`log_id`, `act_id`, `bid_user`, `bid_price`, `bid_time`) VALUES
(1, 4, 1, '170.00', 1242144083);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_auto_manage`
--

CREATE TABLE IF NOT EXISTS `zh_ec_auto_manage` (
  `item_id` mediumint(8) NOT NULL COMMENT '如果是商品就是zh_goods的goods_id，如果是文章就是zh_article的article_id',
  `type` varchar(10) NOT NULL COMMENT 'goods是商品，article是文章',
  `starttime` int(10) NOT NULL COMMENT '上线时间',
  `endtime` int(10) NOT NULL COMMENT '下线时间',
  PRIMARY KEY (`item_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='处理文章，商品自动上下线的计划任务列表；需要安装计划任务插件才有效';

--
-- テーブルのデータのダンプ `zh_ec_auto_manage`
--

INSERT INTO `zh_ec_auto_manage` (`item_id`, `type`, `starttime`, `endtime`) VALUES
(1, 'goods', 1452873600, 1452268800),
(3, 'goods', 1452873600, 0),
(5, 'goods', 1452355200, 1454169600),
(41, 'article', 1461859200, 1466179200);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_back_order`
--

CREATE TABLE IF NOT EXISTS `zh_ec_back_order` (
  `back_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_sn` varchar(20) NOT NULL,
  `order_sn` varchar(20) NOT NULL,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `invoice_no` varchar(50) DEFAULT NULL,
  `add_time` int(10) unsigned DEFAULT '0',
  `shipping_id` tinyint(3) unsigned DEFAULT '0',
  `shipping_name` varchar(120) DEFAULT NULL,
  `user_id` mediumint(8) unsigned DEFAULT '0',
  `action_user` varchar(30) DEFAULT NULL,
  `consignee` varchar(60) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country` smallint(5) unsigned DEFAULT '0',
  `province` smallint(5) unsigned DEFAULT '0',
  `city` smallint(5) unsigned DEFAULT '0',
  `district` smallint(5) unsigned DEFAULT '0',
  `sign_building` varchar(120) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `zipcode` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `best_time` varchar(120) DEFAULT NULL,
  `postscript` varchar(255) DEFAULT NULL,
  `how_oos` varchar(120) DEFAULT NULL,
  `insure_fee` decimal(10,2) unsigned DEFAULT '0.00',
  `shipping_fee` decimal(10,2) unsigned DEFAULT '0.00',
  `update_time` int(10) unsigned DEFAULT '0',
  `suppliers_id` smallint(5) DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `return_time` int(10) unsigned DEFAULT '0',
  `agency_id` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`back_id`),
  KEY `user_id` (`user_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- テーブルのデータのダンプ `zh_ec_back_order`
--

INSERT INTO `zh_ec_back_order` (`back_id`, `delivery_sn`, `order_sn`, `order_id`, `invoice_no`, `add_time`, `shipping_id`, `shipping_name`, `user_id`, `action_user`, `consignee`, `address`, `country`, `province`, `city`, `district`, `sign_building`, `email`, `zipcode`, `tel`, `mobile`, `best_time`, `postscript`, `how_oos`, `insure_fee`, `shipping_fee`, `update_time`, `suppliers_id`, `status`, `return_time`, `agency_id`) VALUES
(1, '20090615054961769', '2009061585887', 15, '2009061585884', 1245044533, 3, '', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245044964, 2, 0, 1245045515, 0),
(2, '20090615055104671', '2009061585887', 15, '20090615', 1245044533, 3, '', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245045061, 1, 0, 1245045515, 0),
(3, '20090615055780744', '2009061585887', 15, '123232', 1245044533, 3, '', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245045443, 0, 0, 1245045515, 0),
(4, '20090615064331475', '2009061503335', 17, '00906150333512', 1245047978, 3, '', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245048189, 0, 0, 1245048212, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_bonus_type`
--

CREATE TABLE IF NOT EXISTS `zh_ec_bonus_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '红包类型流水号',
  `type_name` varchar(60) NOT NULL COMMENT '红包名称',
  `type_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '红包所值的金额',
  `send_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '红包发送类型.0,按用户如会员等级,会员名称发放;1,按商品类别发送;2,按订单金额所达到的额度发送;3,线下发送',
  `min_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '如果是按金额发送红包,该项是最小金额.即只要购买超过该金额的商品都可以领到红包',
  `max_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `send_start_date` int(11) NOT NULL DEFAULT '0' COMMENT '红包发送的开始时间',
  `send_end_date` int(11) NOT NULL DEFAULT '0' COMMENT '红包发送的结束时间',
  `use_start_date` int(11) NOT NULL DEFAULT '0' COMMENT '红包可以使用的开始时间',
  `use_end_date` int(11) NOT NULL DEFAULT '0' COMMENT '红包可以使用的结束时间',
  `min_goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可以使用该红包的商品的最低价格.即只要达到该价格的商品才可以使用红包',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='红包类型表' AUTO_INCREMENT=13 ;

--
-- テーブルのデータのダンプ `zh_ec_bonus_type`
--

INSERT INTO `zh_ec_bonus_type` (`type_id`, `type_name`, `type_money`, `send_type`, `min_amount`, `max_amount`, `send_start_date`, `send_end_date`, `use_start_date`, `use_end_date`, `min_goods_amount`) VALUES
(1, '用户红包', '2.00', 0, '0.00', '0.00', 1242057600, 1244736000, 1242057600, 1565884800, '500.00'),
(2, '商品红包', '10.00', 1, '0.00', '0.00', 1241971200, 1480176000, 1242057600, 1502467200, '500.00'),
(3, '订单红包', '20.00', 2, '1500.00', '0.00', 1242057600, 1309363200, 1242057600, 1257955200, '800.00'),
(4, '线下红包', '6.00', 3, '0.00', '0.00', 1242057600, 1244736000, 1242057600, 1255449600, '360.00'),
(10, '测试用户发放红包', '10.00', 0, '0.00', '0.00', 1454256000, 1456761600, 1454256000, 1467216000, '500.00'),
(11, '测试商品发放红包', '30.00', 1, '0.00', '0.00', 1454342400, 1464278400, 1454342400, 1472140800, '600.00'),
(12, '测试线下发放红包', '40.00', 3, '0.00', '0.00', 1454342400, 1456848000, 1454342400, 1469203200, '500.00');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_booking_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_booking_goods` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '登记该缺货记录的用户的id，取值ecs_users的user_id',
  `email` varchar(60) NOT NULL COMMENT '页面填的用户的email，默认取值于ecs_users的email',
  `link_man` varchar(60) NOT NULL COMMENT '页面填的用户的姓名，默认取值于ecs_users的consignee',
  `tel` varchar(60) NOT NULL COMMENT '页面填的用户的电话，默认取值于ecs_users的tel',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '缺货登记的商品id，取值于ecs_goods的 goods_id',
  `goods_desc` varchar(255) NOT NULL COMMENT '缺货登记时留的订购描述',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '订购数量',
  `booking_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '缺货登记的时间',
  `is_dispose` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否已经被处理',
  `dispose_user` varchar(30) NOT NULL COMMENT '处理该缺货登记的管理员用户名，取值于session,该session取值于ecs_admin_user的user_name',
  `dispose_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '处理的时间',
  `dispose_note` varchar(255) NOT NULL COMMENT '处理时管理员留的备注',
  PRIMARY KEY (`rec_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='缺货登记的订购和处理记录表' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_brand`
--

CREATE TABLE IF NOT EXISTS `zh_ec_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `brand_name` varchar(60) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `brand_logo` varchar(80) NOT NULL DEFAULT '' COMMENT '上传的该品牌公司logo图片',
  `brand_desc` text NOT NULL COMMENT '品牌描述',
  `site_url` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌的网址',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '品牌在前台页面的显示顺序，数字越大越靠后',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '该品牌是否显示，0，否；1，显示',
  PRIMARY KEY (`brand_id`),
  KEY `is_show` (`is_show`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- テーブルのデータのダンプ `zh_ec_brand`
--

INSERT INTO `zh_ec_brand` (`brand_id`, `brand_name`, `brand_logo`, `brand_desc`, `site_url`, `sort_order`, `is_show`) VALUES
(31, 'バンダイ', 'upload/ec/data/brandlogo/1470946266399037256.gif', '夢・クリエイション～楽しい時を創る企業の株式会社バンダイ公式サイトです。バンダイの情報を始め、人気のおもちゃ、模型、フィギュア、キャラクターグッズの商品情報やキャラクター情報が満載です。', 'http://www.bandai.co.jp/', 50, 1),
(32, 'FRIEND STREET', 'upload/ec/data/brandlogo/1471301569719028588.jpg', '', 'http://https://www.amazon.co.jp/s?me=A33Q24NITJ6KCP', 50, 1),
(33, '明邦', 'upload/ec/data/brandlogo/1471919079852800765.png', 'プラスチックケース、タックルボックス、ピルケース、工具箱、フィッシング、ケース、ボックス、パッケージ、プラスチック成形のことなら明邦化学工業。', 'http://meihokagaku.co.jp/', 50, 1),
(30, '不二貿易', 'upload/ec/data/brandlogo/1470783411016749653.png', '時代の変化に常に敏感に対応し、時代の動向を\r\n予測しながらビジネス展開してきた不二貿易。\r\n田坂商事の時代から現在に到るまで、\r\n50年の歴史から見る当社をご紹介いたします。', 'http://www.fujiboeki.jp/', 50, 1),
(29, '天馬Fits', 'upload/ec/data/brandlogo/1470620331992975617.gif', '半世紀にわたる「技術の進歩」への挑戦と、「人々の豊かな暮らし」への変わらぬ思いを礎に。\r\n', 'http://www.tenmacorp.co.jp/', 50, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_card`
--

CREATE TABLE IF NOT EXISTS `zh_ec_card` (
  `card_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `card_name` varchar(120) NOT NULL COMMENT '贺卡名称',
  `card_img` varchar(255) NOT NULL COMMENT '贺卡图纸的名称',
  `card_fee` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '贺卡所需费用',
  `free_money` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订单达到该字段的值后使用此贺卡免费',
  `card_desc` varchar(255) NOT NULL COMMENT '贺卡的描述',
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_card`
--

INSERT INTO `zh_ec_card` (`card_id`, `card_name`, `card_img`, `card_fee`, `free_money`, `card_desc`) VALUES
(1, '祝福贺卡', '1242108754847457261.jpg', '5.00', '9999.99', '把您的祝福带给您身边的人');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_cart`
--

CREATE TABLE IF NOT EXISTS `zh_ec_cart` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户登录id，取自session，',
  `session_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '登录的sessionid，如果该用户退出，该sessionid对应的购物车中的所有记录都将被删除',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id，取自表goods的goods_id',
  `goods_sn` varchar(60) NOT NULL COMMENT '商品的货号，取自表goods的goods_sn',
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(120) NOT NULL COMMENT '商品的名称，取自表goods的goods_name',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品的市场价，取自表goods的market_price',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品的本店价，取自表goods的shop_price',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品的购买数量，在购物车时，实际库存不减少',
  `goods_attr` text NOT NULL COMMENT '商品的属性，中括号里是该属性特有的价格',
  `is_real` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '取自goods的is_real',
  `extension_code` varchar(30) NOT NULL COMMENT '商品的扩展属性，取自goods的extension_code',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '该商品的父商品id，没有该值为0，有的话那该商品就是该id的配件',
  `rec_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '购物车商品类型，0，普通；1，团够；2，拍卖；3，夺宝奇兵',
  `is_gift` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '是否是赠品，0，否；其他，是参加优惠活动的id，取值于favourable_activity 的act_id',
  `is_shipping` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `can_handsel` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `goods_attr_id` varchar(255) NOT NULL COMMENT '该商品的属性的id，取自goods_attr的goods_attr_id，如果有多个，只记录了最后一个，可能是个bug',
  PRIMARY KEY (`rec_id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- テーブルのデータのダンプ `zh_ec_cart`
--

INSERT INTO `zh_ec_cart` (`rec_id`, `user_id`, `session_id`, `goods_id`, `goods_sn`, `product_id`, `goods_name`, `market_price`, `goods_price`, `goods_number`, `goods_attr`, `is_real`, `extension_code`, `parent_id`, `rec_type`, `is_gift`, `is_shipping`, `can_handsel`, `goods_attr_id`) VALUES
(72, 11, '4d4dfc5a8febb6598089a9c3e556f819', 32, 'ECS000032', 1, '诺基亚N85', '3612.00', '2750.00', 4, '颜色:黑色 \n', 1, '', 0, 0, 0, 0, 0, '163'),
(71, 0, '4d4dfc5a8febb6598089a9c3e556f819', 24, 'ECS000024', 2, 'P806', '2440.00', '1890.00', 1, '颜色:灰色 \n配件:线控耳机[40] \n', 1, '', 0, 0, 0, 0, 0, '167,344'),
(69, 11, '4d9597e23843660092cd7b93dfcb2e6e', 24, 'ECS000024', 2, 'P806', '2400.00', '0.00', 1, '颜色: 灰色\r\n配件: 数据线', 1, '', 0, 4, 0, 0, 0, '167,168'),
(70, 0, '4d4dfc5a8febb6598089a9c3e556f819', 24, 'ECS000024', 2, 'P806', '2400.00', '1850.00', 4, '颜色:灰色 \n', 1, '', 0, 0, 0, 0, 0, '167'),
(67, 0, 'b370dcd423f4de8f13fd6d9f7714bcb4', 5, 'ECS000005', 0, '索爱原装M2卡读卡器', '24.00', '20.00', 1, '', 1, '', 0, 0, 0, 0, 0, ''),
(66, 0, 'b370dcd423f4de8f13fd6d9f7714bcb4', 49, 'EC000033', 0, '美容液Ａ', '360.00', '250.00', 1, '', 1, '', 0, 0, 0, 1, 0, ''),
(65, 0, 'b370dcd423f4de8f13fd6d9f7714bcb4', 51, 'EC000051', 0, '美容液C', '390.00', '330.00', 1, '单选属性测试:大装[30] \n', 1, '', 0, 0, 0, 0, 0, '367'),
(64, 0, 'b370dcd423f4de8f13fd6d9f7714bcb4', 50, 'EC000050', 0, '美容液B', '480.00', '400.00', 1, '', 1, '', 0, 0, 0, 0, 0, ''),
(73, 11, '4d4dfc5a8febb6598089a9c3e556f819', 6, '', 0, '诺基亚N85大礼包', '3801.60', '3150.00', 2, '', 1, 'package_buy', 0, 0, 0, 0, 0, ''),
(74, 11, '4d4dfc5a8febb6598089a9c3e556f819', 32, 'ECS000032', 1, '诺基亚N85', '3624.00', '2762.00', 1, '配件:数据线[12] \n颜色:黑色 \n', 1, '', 0, 0, 0, 0, 0, '163,159'),
(75, 11, '4d4dfc5a8febb6598089a9c3e556f819', 25, 'ECS000025', 0, '小灵通/固话50元充值卡', '57.59', '48.00', 1, '', 0, 'virtual_card', 0, 0, 0, 0, 0, ''),
(76, 11, '2d949c3d3597df166654a093a6d3db12', 32, 'ECS000032', 1, '诺基亚N85', '3712.00', '2850.00', 1, '配件:蓝牙耳机[100] \n颜色:黑色 \n', 1, '', 0, 0, 0, 0, 0, '163,158'),
(78, 11, '2d949c3d3597df166654a093a6d3db12', 24, 'ECS000024', 2, 'P806', '2400.00', '0.00', 1, '颜色: 灰色\r\n配件: 数据线', 1, '', 0, 4, 0, 0, 0, '167,168'),
(79, 11, '45d9f86008c42af4603db386b8790298', 24, 'ECS000024', 2, 'P806', '2400.00', '0.00', 1, '颜色: 灰色\r\n配件: 线控耳机', 1, '', 0, 4, 0, 0, 0, '167,344'),
(80, 11, '3ab678bae5170b8ef0a95afd330518c9', 24, 'ECS000024', 2, 'P806', '2400.00', '0.00', 1, '颜色: 灰色\r\n配件: 数据线', 1, '', 0, 4, 0, 0, 0, '167,168'),
(84, 11, '3ab678bae5170b8ef0a95afd330518c9', 9, 'ECS000009', 0, '诺基亚E66', '3000.00', '2298.00', 1, '', 1, '', 0, 0, 0, 1, 0, ''),
(88, 11, '5566fe54cbf04eea50ab505c116117eb', 24, 'ECS000024', 2, 'P806', '2460.00', '1910.00', 1, '颜色:灰色 \n配件:数据线[20] \n配件:线控耳机[40] \n', 1, '', 0, 0, 0, 0, 0, '167,168,344'),
(87, 11, 'deac0b2b3e5870e31675dcb232e65280', 24, 'ECS000024', 2, 'P806', '2460.00', '1910.00', 2, '颜色:灰色 \n配件:数据线[20] \n配件:线控耳机[40] \n', 1, '', 0, 0, 0, 0, 0, '167,168,344'),
(89, 11, '67c72f29c1d2023b2036b92dfce6bd1c', 24, 'ECS000024', 2, 'P806', '2400.00', '1850.00', 2, '颜色:灰色 \n', 1, '', 0, 0, 0, 0, 0, '167'),
(90, 11, '67c72f29c1d2023b2036b92dfce6bd1c', 24, 'ECS000024', 2, 'P806', '2440.00', '1890.00', 1, '颜色:灰色 \n配件:线控耳机[40] \n', 1, '', 0, 0, 0, 0, 0, '167,344'),
(91, 11, '67c72f29c1d2023b2036b92dfce6bd1c', 20, 'ECS000020', 5, '三星BC01', '336.00', '238.00', 1, '颜色:黑色 \n', 1, '', 0, 0, 0, 0, 0, '194'),
(92, 11, '04709fef6c5a93f0c53a62f236ba5b05', 24, 'ECS000024', 2, 'P806', '2400.00', '1850.00', 1, '颜色:灰色 \n', 1, '', 0, 0, 0, 0, 0, '167'),
(93, 11, 'a4b496c4c38f7fe5362110d4839ffdc8', 24, 'ECS000024', 2, 'P806', '2460.00', '1910.00', 1, '颜色:灰色 \n配件:数据线[20] \n配件:线控耳机[40] \n', 1, '', 0, 0, 0, 0, 0, '167,168,344'),
(101, 0, '93o7v209rb5pe7picd241uiqh4', 57, 'EC000057', 0, 'カラフル デザイン ペン ケース ビューティー 小物 入れ 使い方 自由 自在', '1558.80', '1299.00', 1, '色:イエロー \n', 1, '', 0, 0, 0, 0, 0, '398'),
(99, 11, '4eb347b9c91331eae443f784e33a3481', 20, 'ECS000020', 5, '三星BC01', '336.00', '238.00', 1, '颜色:黑色 \n', 1, '', 0, 0, 0, 0, 0, '194'),
(100, 11, '4eb347b9c91331eae443f784e33a3481', 9, 'ECS000009', 0, '诺基亚E66', '3000.00', '2298.00', 1, '', 1, '', 0, 0, 0, 1, 0, ''),
(102, 0, '93o7v209rb5pe7picd241uiqh4', 59, 'EC000059', 0, 'シンプル デザイン ビューティー 化粧 ポーチ 小物 入れ 使い方 自由 自在', '1077.60', '898.00', 2, '色:オレンジ \n', 1, '', 0, 0, 0, 0, 0, '408'),
(103, 13, 'iakfftqg6o1agi8bap10mrq0t2', 57, 'EC000057', 0, 'カラフル デザイン ペン ケース ビューティー 小物 入れ 使い方 自由 自在', '1558.80', '1299.00', 1, '色:イエロー \n', 1, '', 0, 0, 0, 0, 0, '398'),
(105, 0, '101jpp294prq7qgftbiab4d0s0', 55, 'EC000055', 0, '不二貿易 キューブボックス 扉付き 幅34.5cm 組換え自由 ホワイト', '1431.60', '1193.00', 1, 'サイズ:幅34.5×奥行29.5×高さ34.5cm \nタイプ選択:オープンタイプ \n', 1, '', 0, 0, 0, 0, 0, '392,393');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_category`
--

CREATE TABLE IF NOT EXISTS `zh_ec_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `cat_name` varchar(90) NOT NULL DEFAULT '' COMMENT '分类名称',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '分类的关键字，可能是为了搜索',
  `cat_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '分类描述',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '该分类的父id，取值于该表的cat_id字段',
  `sort_order` tinyint(1) unsigned NOT NULL DEFAULT '50' COMMENT '该分类在页面显示的顺序，数字越大顺序越靠后；同数字，id在前的先显示',
  `template_file` varchar(50) NOT NULL DEFAULT '' COMMENT '不确定字段，按名字和表设计猜，应该是该分类的单独模板文件的名字',
  `measure_unit` varchar(15) NOT NULL DEFAULT '' COMMENT '该分类的计量单位',
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示在导航栏，0，不；1，显示在导航栏',
  `style` varchar(150) NOT NULL COMMENT '该分类的单独的样式表的包括文件名部分的文件路径',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否在前台页面显示，1，显示；0，不显示',
  `grade` tinyint(4) NOT NULL DEFAULT '0' COMMENT '该分类的最高和最低价之间的价格分级，当大于1时，会根据最大最小价格区间分成区间，会在页面显示价格范围，如0-300,300-600,600-900这种',
  `filter_attr` varchar(255) NOT NULL DEFAULT '0' COMMENT '如果该字段有值，则该分类将还会按照该值对应在表goods_attr的goods_attr_id所对应的属性筛选，如，封面颜色下有红，黑分类筛选 ',
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品分类表，记录商品分类信息' AUTO_INCREMENT=76 ;

--
-- テーブルのデータのダンプ `zh_ec_category`
--

INSERT INTO `zh_ec_category` (`cat_id`, `cat_name`, `keywords`, `cat_desc`, `parent_id`, `sort_order`, `template_file`, `measure_unit`, `show_in_nav`, `style`, `is_show`, `grade`, `filter_attr`) VALUES
(66, 'ホーム＆キッチン', '', '', 0, 50, '', '', 0, '', 1, 0, '236'),
(67, '収納用品', '', '', 66, 50, '', '', 0, '', 1, 0, ''),
(68, '収納ケース・ボックス', '', '', 67, 50, '', '', 0, '', 1, 0, ''),
(69, 'ベビー・おもちゃ・ホビー', '', '', 0, 50, '', '', 0, '', 1, 0, ''),
(70, 'おもちゃ', '', '', 69, 50, '', '', 0, '', 1, 0, ''),
(71, 'ドラッグストア', '', '', 0, 50, '', '', 0, '', 1, 0, ''),
(72, '化粧ポーチ・メイクケース', '', '', 71, 50, '', '', 0, '', 1, 0, ''),
(73, 'バス・トイレ・洗面用品', '', '', 66, 50, '', '', 0, '', 1, 0, ''),
(74, 'トイレ用品', '', '', 73, 50, '', '', 0, '', 1, 0, ''),
(75, 'トイレファブリック', '', '', 74, 50, '', '', 0, '', 1, 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_cat_recommend`
--

CREATE TABLE IF NOT EXISTS `zh_ec_cat_recommend` (
  `cat_id` smallint(5) NOT NULL COMMENT '商品分类id',
  `recommend_type` tinyint(1) NOT NULL COMMENT '推荐类型1:精品，2:最新，3:热门',
  PRIMARY KEY (`cat_id`,`recommend_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_ec_cat_recommend`
--

INSERT INTO `zh_ec_cat_recommend` (`cat_id`, `recommend_type`) VALUES
(3, 2),
(3, 3),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 3),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(28, 2),
(28, 3),
(66, 1),
(71, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_collect_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_collect_goods` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏记录的自增id',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '该条收藏记录的会员id，取值于ec_users的user_id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏的商品id，取值于ec_goods的goods_id',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '收藏时间',
  `is_attention` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否关注该收藏商品，1，是；0，否''',
  PRIMARY KEY (`rec_id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`goods_id`),
  KEY `is_attention` (`is_attention`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员收藏商品的记录列表，一条记录一个收藏商品' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_comment`
--

CREATE TABLE IF NOT EXISTS `zh_ec_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户评论的自增id',
  `comment_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户评论的类型；0，评论的是商品；1，评论的是文章',
  `id_value` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文章或者商品的id，文章对应的是ecs_article 的article_id；商品对应的是ecs_goods的goods_id',
  `email` varchar(60) NOT NULL COMMENT '评论时提交的email地址，默认取的ecs_users的email',
  `user_name` varchar(60) NOT NULL COMMENT '评论该文章或商品的人的名称，取值ecs_users的user_name',
  `content` text NOT NULL COMMENT '评论的内容',
  `comment_rank` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '该文章或者商品的星级；只有1到5星；由数字代替；其中5是代表5星',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论的时间',
  `ip_address` varchar(15) NOT NULL COMMENT '评论时的用户ip',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否被管理员批准显示，1，是；0，未批准显示',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论的父节点；取值该表的comment_id字段；如果该字段为0，则是一个普通评论，否则该条评论就是该字段的值所对应的评论的回复',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表该评论的用户的用户id，取值于ecs_users的user_id',
  PRIMARY KEY (`comment_id`),
  KEY `parent_id` (`parent_id`),
  KEY `id_value` (`id_value`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_crons`
--

CREATE TABLE IF NOT EXISTS `zh_ec_crons` (
  `cron_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `cron_code` varchar(20) NOT NULL COMMENT '该插件文件在相应路径下的不包括''''.php''''部分的文件名，运行该插件将通过该字段的值寻找将运行的文件',
  `cron_name` varchar(120) NOT NULL COMMENT '计划任务的名称',
  `cron_desc` text COMMENT '计划人物的描述',
  `cron_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '应该是用了设置计划任务执行的顺序的，即当同时触发2个任务时先执行哪一个，如果一样应该是id在前的先执行暂不确定',
  `cron_config` text NOT NULL COMMENT '对每次处理的数据的数量的值，类型，名称序列化；比如删几天的日志，每次执行几个商品或文章的处理',
  `thistime` int(10) NOT NULL DEFAULT '0' COMMENT '该计划任务上次被执行的时间',
  `nextime` int(10) NOT NULL COMMENT '该计划任务下次被执行的时间',
  `day` tinyint(2) NOT NULL COMMENT '如果该字段有值，则计划任务将在每月的这一天执行该计划人物',
  `week` varchar(1) NOT NULL COMMENT '如果该字段有值，则计划任务将在每周的这一天执行该计划人物',
  `hour` varchar(2) NOT NULL COMMENT '如果该字段有值，则该计划任务将在每天的这个小时段执行该计划任务',
  `minute` varchar(255) NOT NULL COMMENT '如果该字段有值，则该计划任务将在每小时的这个分钟段执行该计划任务，该字段的值可以多个，用空格间隔',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '该计划任务是否开启；0，关闭；1，开启',
  `run_once` tinyint(1) NOT NULL DEFAULT '0' COMMENT '执行后是否关闭，这个关闭的意思还得再研究下',
  `allow_ip` varchar(100) NOT NULL COMMENT '允许运行该计划人物的服务器ip',
  `alow_files` varchar(255) NOT NULL COMMENT '运行触发该计划人物的文件列表可多个值，为空代表所有许可的文件都可以',
  PRIMARY KEY (`cron_id`),
  KEY `nextime` (`nextime`),
  KEY `enable` (`enable`),
  KEY `cron_code` (`cron_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='计划任务插件安装配置信息' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_delivery_order`
--

CREATE TABLE IF NOT EXISTS `zh_ec_delivery_order` (
  `delivery_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_sn` varchar(20) NOT NULL,
  `order_sn` varchar(20) NOT NULL,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `invoice_no` varchar(50) DEFAULT NULL,
  `add_time` int(10) unsigned DEFAULT '0',
  `shipping_id` tinyint(3) unsigned DEFAULT '0',
  `shipping_name` varchar(120) DEFAULT NULL,
  `user_id` mediumint(8) unsigned DEFAULT '0',
  `action_user` varchar(30) DEFAULT NULL,
  `consignee` varchar(60) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country` smallint(5) unsigned DEFAULT '0',
  `province` smallint(5) unsigned DEFAULT '0',
  `city` smallint(5) unsigned DEFAULT '0',
  `district` smallint(5) unsigned DEFAULT '0',
  `sign_building` varchar(120) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `zipcode` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `best_time` varchar(120) DEFAULT NULL,
  `postscript` varchar(255) DEFAULT NULL,
  `how_oos` varchar(120) DEFAULT NULL,
  `insure_fee` decimal(10,2) unsigned DEFAULT '0.00',
  `shipping_fee` decimal(10,2) unsigned DEFAULT '0.00',
  `update_time` int(10) unsigned DEFAULT '0',
  `suppliers_id` smallint(5) DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `agency_id` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`delivery_id`),
  KEY `user_id` (`user_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- テーブルのデータのダンプ `zh_ec_delivery_order`
--

INSERT INTO `zh_ec_delivery_order` (`delivery_id`, `delivery_sn`, `order_sn`, `order_id`, `invoice_no`, `add_time`, `shipping_id`, `shipping_name`, `user_id`, `action_user`, `consignee`, `address`, `country`, `province`, `city`, `district`, `sign_building`, `email`, `zipcode`, `tel`, `mobile`, `best_time`, `postscript`, `how_oos`, `insure_fee`, `shipping_fee`, `update_time`, `suppliers_id`, `status`, `agency_id`) VALUES
(1, '20090615054961769', '2009061585887', 15, '2009061585884', 1245044533, 3, '城际快递', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245044964, 2, 1, 0),
(2, '20090615055104671', '2009061585887', 15, '20090615', 1245044533, 3, '城际快递', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245045061, 1, 1, 0),
(3, '20090615055780744', '2009061585887', 15, '123232', 1245044533, 3, '城际快递', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245045443, 0, 1, 0),
(4, '20090615060281017', '2009061525429', 16, '2009061525121', 1245045672, 3, '城际快递', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245045723, 2, 0, 0),
(5, '20090615064331475', '2009061503335', 17, '00906150333512', 1245047978, 3, '城际快递', 1, 'admin', '刘先生', '海兴大厦', 1, 2, 52, 502, '', 'ecshop@ecshop.com', '', '010-25851234', '13986765412', '', '', '等待所有商品备齐后再发', '0.00', '10.00', 1245048189, 0, 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_email_list`
--

CREATE TABLE IF NOT EXISTS `zh_ec_email_list` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '邮件订阅的自增id',
  `email` varchar(60) NOT NULL COMMENT '''邮件订阅所填的邮箱地址',
  `stat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否确认，可以用户确认也可以管理员确认；0，未确认；1，已确认',
  `hash` varchar(10) NOT NULL COMMENT '邮箱确认的验证码，系统生成后发送到用户邮箱，用户验证激活时通过该值判断是否合法；主要用来防止非法验证邮箱',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='增加电子杂志订阅表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_email_list`
--

INSERT INTO `zh_ec_email_list` (`id`, `email`, `stat`, `hash`) VALUES
(2, '1368712041@qq.com', 1, '6bf2989593');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_email_sendlist`
--

CREATE TABLE IF NOT EXISTS `zh_ec_email_sendlist` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '邮件发送队列自增id',
  `email` varchar(100) NOT NULL COMMENT '该邮件将要发送到的邮箱地址',
  `template_id` mediumint(8) NOT NULL COMMENT '该邮件的模板id，取值于ecs_mail_templates的template_id',
  `email_content` text NOT NULL COMMENT '邮件发送的内容',
  `error` tinyint(1) NOT NULL DEFAULT '0' COMMENT '错误次数，不知干什么用的，猜应该是发送邮件的失败记录',
  `pri` tinyint(10) NOT NULL COMMENT '该邮件发送的优先级；0，普通；1，高',
  `last_send` int(10) NOT NULL COMMENT '上一次发送的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='增加发送队列表' AUTO_INCREMENT=70 ;

--
-- テーブルのデータのダンプ `zh_ec_email_sendlist`
--

INSERT INTO `zh_ec_email_sendlist` (`id`, `email`, `template_id`, `email_content`, `error`, `pri`, `last_send`) VALUES
(24, '136871204@qq.com', 6, 'str:亲爱的test您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445573161),
(23, '136871204@qq.com', 6, 'str:亲爱的test您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445572979),
(22, 'yanan@metaphase.co.jp', 6, 'str:亲爱的yanan您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445486585),
(21, 'yaodi@metaphase.co.jp', 6, 'str:亲爱的yaodi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445486583),
(20, 'yaochen@metaphase.co.jp', 6, 'str:亲爱的yaochen您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445486583),
(19, 'yaochen@metaphase.co.jp', 6, 'str:亲爱的yaochen您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445484485),
(18, 'xiecong@metaphase.asia', 6, 'str:亲爱的xiecong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445484484),
(17, '136871204@qq.com', 6, 'str:亲爱的test您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445484484),
(16, '136871204@qq.com', 6, 'str:亲爱的test您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-22', 0, 1, 1445484256),
(25, 'yaochen@metaphase.co.jp', 6, 'str:亲爱的yaochen您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445574900),
(26, 'yaodi@metaphase.co.jp', 6, 'str:亲爱的yaodi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445574900),
(27, '136871204@qq.com', 6, 'str:亲爱的test您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575003),
(28, 'xiecong@metaphase.asia', 6, 'str:亲爱的xiecong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575003),
(29, 'yaochen@metaphase.co.jp', 6, 'str:亲爱的yaochen您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575004),
(30, 'yaodi@metaphase.co.jp', 6, 'str:亲爱的yaodi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575004),
(31, 'yanan@metaphase.co.jp', 6, 'str:亲爱的yanan您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575005),
(32, 'zhouhong@metaphase.co.jp', 6, 'str:亲爱的zhouhong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575005),
(33, 'tsukada@metaphase.co.jp', 6, 'str:亲爱的tsukada您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2015-10-23', 0, 1, 1445575006),
(34, 'vip@ecshop.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384309),
(35, 'text@ecshop.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384312),
(36, 'zuanshi@ecshop.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384315),
(37, '136871204@qq.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384318),
(38, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384349),
(39, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384760),
(40, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384764),
(41, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384767),
(42, '136871204@qq.com', 6, 'str:亲爱的zhouhong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384770),
(43, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384953),
(44, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384956),
(45, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384960),
(46, '136871204@qq.com', 6, 'str:亲爱的zhouhong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454384963),
(47, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385000),
(48, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385003),
(49, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385006),
(50, '136871204@qq.com', 6, 'str:亲爱的zhouhong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385011),
(51, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385082),
(52, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385104),
(53, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385107),
(54, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385111),
(55, '136871204@qq.com', 6, 'str:亲爱的zhouhong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385114),
(56, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385185),
(57, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385185),
(58, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385188),
(59, '136871204@qq.com', 6, 'str:亲爱的zhouhong您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385188),
(60, 'ecshop@ecshop.com', 6, 'str:亲爱的ecshop您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385591),
(61, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454385594),
(62, 'zuanshi@ecshop.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454400834),
(63, 'vip@ecshop.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454401605),
(64, 'text@ecshop.com', 6, 'str:亲爱的您好！\r\n\r\n恭喜您获得了1个红包，金额分别为\r\nZHSHOP2016-02-02', 0, 1, 1454401605),
(65, 'vip@ecshop.com', 6, 'str:亲爱的vip您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2016-05-31', 0, 1, 1464669974),
(66, 'text@ecshop.com', 6, 'str:亲爱的text您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2016-05-31', 0, 1, 1464669977),
(67, 'zuanshi@ecshop.com', 6, 'str:亲爱的zuanshi您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2016-05-31', 0, 1, 1464669981),
(68, '1368712042@qq.com', 6, 'str:亲爱的zhouhong2您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2016-05-31', 0, 1, 1464669984),
(69, 'hong@metaphase.asia', 6, 'str:亲爱的zhouhong1您好！\r\n\r\n恭喜您获得了1个红包，金额分别为￥2元\r\nZHSHOP2016-05-31', 0, 1, 1464669987);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_exchange_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_exchange_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `exchange_integral` int(10) unsigned NOT NULL DEFAULT '0',
  `is_exchange` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_ec_exchange_goods`
--

INSERT INTO `zh_ec_exchange_goods` (`goods_id`, `exchange_integral`, `is_exchange`, `is_hot`) VALUES
(24, 17000, 1, 1),
(19, 80000, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_favourable_activity`
--

CREATE TABLE IF NOT EXISTS `zh_ec_favourable_activity` (
  `act_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '优惠活动的自增id',
  `act_name` varchar(255) NOT NULL COMMENT '优惠活动的活动名称',
  `start_time` int(10) unsigned NOT NULL COMMENT '活动的开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '活动的结束时间',
  `user_rank` varchar(255) NOT NULL COMMENT '可以参加活动的用户信息，取值于ec_user_rank的rank_id；其中0是非会员，其他是相应的会员等级；多个值用逗号分隔',
  `act_range` tinyint(3) unsigned NOT NULL COMMENT '优惠范围；0，全部商品；1，按分类；2，按品牌；3，按商品',
  `act_range_ext` varchar(255) NOT NULL COMMENT '根据优惠活动范围的不同，该处意义不同；但是都是优惠范围的约束；如，如果是商品，该处是商品的id，如果是品牌，该处是品牌的id',
  `min_amount` decimal(10,2) unsigned NOT NULL COMMENT '订单达到金额下限，才参加活动',
  `max_amount` decimal(10,2) unsigned NOT NULL COMMENT '参加活动的订单金额下限，0，表示没有上限',
  `act_type` tinyint(3) unsigned NOT NULL COMMENT '参加活动的优惠方式；0，送赠品或优惠购买；1，现金减免；价格打折优惠',
  `act_type_ext` decimal(10,2) unsigned NOT NULL COMMENT '如果是送赠品，该处是允许的最大数量，0，无数量限制；现今减免，则是减免金额，单位元；打折，是折扣值，100算，8折就是80',
  `gift` text NOT NULL COMMENT '如果有特惠商品，这里是序列化后的特惠商品的id,name,price信息;取值于ecs_goods的goods_id，goods_name，价格是添加活动时填写的',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '活动在优惠活动页面显示的先后顺序，数字越大越靠后'', ',
  PRIMARY KEY (`act_id`),
  KEY `act_name` (`act_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_feedback`
--

CREATE TABLE IF NOT EXISTS `zh_ec_feedback` (
  `msg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '反馈信息自增id',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父节点，取自该表msg_id；反馈该值为0；回复反馈为节点id',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '反馈的用户的id',
  `user_name` varchar(60) NOT NULL COMMENT '反馈的用户的用户名',
  `user_email` varchar(60) NOT NULL COMMENT '反馈的用户的邮箱',
  `msg_title` varchar(200) NOT NULL COMMENT '反馈的标题，回复为reply',
  `msg_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '反馈的类型，0，留言；1，投诉；2，询问；3，售后；4，求购',
  `msg_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `msg_content` text NOT NULL COMMENT '反馈的内容',
  `msg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '反馈的时间',
  `message_img` varchar(255) NOT NULL DEFAULT '0' COMMENT '用户上传的文件的地址',
  `order_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '该反馈关联的订单id，由用户提交，取值于 ecs_order_info的order_id；0，为无匹配；',
  `msg_area` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1:表示在留言板留言，0:表示在用户中心留言',
  PRIMARY KEY (`msg_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `zh_ec_feedback`
--

INSERT INTO `zh_ec_feedback` (`msg_id`, `parent_id`, `user_id`, `user_name`, `user_email`, `msg_title`, `msg_type`, `msg_status`, `msg_content`, `msg_time`, `message_img`, `order_id`, `msg_area`) VALUES
(5, 0, 11, 'zhouhong1', 'hong@metaphase.asia', '买的东西有问题啊', 3, 1, '买的东西有问题啊买的东西有问题啊\r\n买的东西有问题啊', 1463007685, '11_20160512ljmhrh.jpg', 0, 1),
(4, 0, 1, 'test', ' ', '留言1', 5, 1, '留言1留言1留言1\r\n留言1留言1留言1', 1461713377, '', 19, 1),
(6, 5, 1, 'test', '136871204@qq.com', 'reply', 0, 0, '我在调查看看1\r\n我在调查看看我在调查看看1', 1472175513, '0', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_friend_link`
--

CREATE TABLE IF NOT EXISTS `zh_ec_friend_link` (
  `link_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_logo` varchar(255) NOT NULL DEFAULT '',
  `show_order` tinyint(3) unsigned NOT NULL DEFAULT '50',
  PRIMARY KEY (`link_id`),
  KEY `show_order` (`show_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接配置信息表' AUTO_INCREMENT=5 ;

--
-- テーブルのデータのダンプ `zh_ec_friend_link`
--

INSERT INTO `zh_ec_friend_link` (`link_id`, `link_name`, `link_url`, `link_logo`, `show_order`) VALUES
(1, 'metaphase', 'http://www.metaphase.co.jp', '', 50),
(2, 'amazon', 'https://www.amazon.co.jp/', '', 51),
(3, 'yahoo', 'http://www.yahoo.co.jp/', '', 52);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品的自增id',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属商品分类id，取值 ecs_category的cat_id',
  `goods_sn` varchar(60) NOT NULL COMMENT '商品的唯一货号',
  `goods_name` varchar(120) NOT NULL COMMENT '商品的名称',
  `goods_name_style` varchar(60) NOT NULL DEFAULT '+' COMMENT '商品名称显示的样式；包括颜色和字体样式；格式如#ff00ff+strong',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品点击数',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '品牌id，取值于ecs_brand 的 brand_id',
  `provider_name` varchar(100) NOT NULL COMMENT '供货人的名称，程序还没实现该功能',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存数量',
  `goods_weight` decimal(10,3) unsigned NOT NULL DEFAULT '0.000' COMMENT '商品的重量，以千克为单位',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场售价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '本店售价',
  `promote_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `promote_start_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '促销价格开始日期',
  `promote_end_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '促销价结束日期',
  `warn_number` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '商品报警数量',
  `keywords` varchar(255) NOT NULL COMMENT '商品关键字，放在商品页的关键字中，为搜索引擎收录用',
  `goods_brief` varchar(255) NOT NULL COMMENT '商品的简短描述',
  `goods_desc` text NOT NULL COMMENT '商品的详细描述',
  `goods_thumb` varchar(255) NOT NULL COMMENT '商品在前台显示的微缩图片，如在分类筛选时显示的小图片',
  `goods_img` varchar(255) NOT NULL COMMENT '商品的实际大小图片，如进入该商品页时介绍商品属性所显示的大图片',
  `original_img` varchar(255) NOT NULL COMMENT '应该是上传的商品的原始图片',
  `is_real` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否是实物，1，是；0，否；比如虚拟卡就为0，不是实物',
  `extension_code` varchar(30) NOT NULL COMMENT '商品的扩展属性，比如像虚拟卡',
  `is_on_sale` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '该商品是否开放销售，1，是；0，否',
  `is_alone_sale` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否能单独销售，1，是；0，否；如果不能单独销售，则只能作为某商品的配件或者赠品销售',
  `is_shipping` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '购买该商品可以使用的积分数量，估计应该是用积分代替金额消费；但程序好像还没有实现该功能',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品的添加时间',
  `sort_order` smallint(4) unsigned NOT NULL DEFAULT '100' COMMENT '应该是商品的显示顺序，不过该版程序中没实现该功能',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '商品是否已经删除，0，否；1，已删除',
  `is_best` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否是精品；0，否；1，是',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否是新品；0，否；1，是',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热销，0，否；1，是',
  `is_promote` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否特价促销；0，否；1，是',
  `bonus_type_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '购买该商品所能领到的红包类型',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近一次更新商品配置的时间',
  `goods_type` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类型id，取值表 goods_type的cat_id',
  `seller_note` varchar(255) NOT NULL COMMENT '商品的商家备注，仅商家可见',
  `give_integral` int(11) NOT NULL DEFAULT '-1' COMMENT '购买该商品时每笔成功交易赠送的积分数量',
  `rank_integral` int(11) NOT NULL DEFAULT '-1',
  `suppliers_id` smallint(5) unsigned DEFAULT NULL,
  `is_check` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_weight` (`goods_weight`),
  KEY `promote_end_date` (`promote_end_date`),
  KEY `promote_start_date` (`promote_start_date`),
  KEY `goods_number` (`goods_number`),
  KEY `sort_order` (`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- テーブルのデータのダンプ `zh_ec_goods`
--

INSERT INTO `zh_ec_goods` (`goods_id`, `cat_id`, `goods_sn`, `goods_name`, `goods_name_style`, `click_count`, `brand_id`, `provider_name`, `goods_number`, `goods_weight`, `market_price`, `shop_price`, `promote_price`, `promote_start_date`, `promote_end_date`, `warn_number`, `keywords`, `goods_brief`, `goods_desc`, `goods_thumb`, `goods_img`, `original_img`, `is_real`, `extension_code`, `is_on_sale`, `is_alone_sale`, `is_shipping`, `integral`, `add_time`, `sort_order`, `is_delete`, `is_best`, `is_new`, `is_hot`, `is_promote`, `bonus_type_id`, `last_update`, `goods_type`, `seller_note`, `give_integral`, `rank_integral`, `suppliers_id`, `is_check`) VALUES
(54, 68, 'EC000000', '天馬 Fits フィッツケース ロング ', '+', 8, 29, '', 10, '0.000', '2286.00', '1905.00', '0.00', 0, 0, 1, '', '住まいの収納、特に押入れ収納やウォークインクローゼット収納の整理整頓に便利な収納ボックス。\r\n押入れ半間に2個並べて使える、幅39cmのレギュラーサイズ。', '', 'upload/ec/images/201608/thumb_img/54_thumb_G_1470696623789.jpg', 'upload/ec/images/201608/goods_img/54_G_1470696623807.jpg', 'upload/ec/images/201608/source_img/54_G_1470696623504.jpg', 1, '', 1, 1, 0, 19, 1470696623, 100, 0, 0, 1, 0, 0, 0, 1471484211, 21, '', -1, -1, 0, NULL),
(55, 68, 'EC000055', '不二貿易 キューブボックス 扉付き 幅34.5cm 組換え自由 ホワイト', '+', 29, 30, '', 5, '0.000', '1431.60', '1193.00', '0.00', 0, 0, 1, '', '●規格：幅34.5*奥行29.5*高さ34.5cm●メーカー注文品に付き、受注後メーカー在庫を確認して納期をご連絡いたします。●こちらの商品はメーカー・取引先からの直送品となります。【代金引換払い】【お届け時間指定】はご利用になれませんので、あらかじめご了承ください。●北海道へは別途送料がかかります。また、沖縄・離島への配送料金は別途見積もりとなりますのでご了承ください。 ', '', 'upload/ec/images/201608/thumb_img/55_thumb_G_1470783561277.jpg', 'upload/ec/images/201608/goods_img/55_G_1470783561131.jpg', 'upload/ec/images/201608/source_img/55_G_1470783561984.jpg', 1, '', 1, 1, 0, 11, 1470783561, 100, 0, 1, 1, 0, 0, 0, 1471484208, 21, '', -1, -1, 0, NULL),
(56, 70, 'EC000056', 'RG 機動戦士ガンダムUC MSN-06S シナンジュ 1/144スケール 色分け済みプラモデル', '+', 2, 31, '', 10, '0.000', '3912.00', '3260.00', '0.00', 0, 0, 1, '', '', '', 'upload/ec/images/201608/thumb_img/56_thumb_G_1470946343258.jpg', 'upload/ec/images/201608/goods_img/56_G_1470946343495.jpg', 'upload/ec/images/201608/source_img/56_G_1470946343151.jpg', 1, '', 1, 1, 0, 32, 1470946343, 100, 0, 1, 0, 0, 0, 0, 1472175941, 22, '', -1, -1, 0, NULL),
(57, 72, 'EC000057', 'カラフル デザイン ペン ケース ビューティー 小物 入れ 使い方 自由 自在', '+', 6, 32, '', 99, '0.000', '1558.80', '1299.00', '0.00', 0, 0, 1, '', '', '', 'upload/ec/images/201608/thumb_img/57_thumb_G_1471301378235.jpg', 'upload/ec/images/201608/goods_img/57_G_1471301378807.jpg', 'upload/ec/images/201608/source_img/57_G_1471301378153.jpg', 1, '', 1, 1, 0, 12, 1471301378, 100, 0, 1, 0, 0, 0, 0, 1471484202, 23, '', -1, -1, 0, NULL),
(58, 70, 'EC000058', 'RG 1/144 ストライクフリーダムガンダム クリアカラー', '+', 1, 31, '', 20, '0.000', '5158.80', '4299.00', '0.00', 0, 0, 1, '', '', '', 'upload/ec/images/201608/thumb_img/58_thumb_G_1471389953365.jpg', 'upload/ec/images/201608/goods_img/58_G_1471389953897.jpg', 'upload/ec/images/201608/source_img/58_G_1471389953348.jpg', 1, '', 1, 1, 0, 42, 1471389953, 100, 0, 0, 0, 1, 0, 0, 1471484198, 22, '', -1, -1, 0, NULL),
(59, 72, 'EC000059', 'シンプル デザイン ビューティー 化粧 ポーチ 小物 入れ 使い方 自由 自在', '+', 8, 32, '', 20, '0.000', '1077.60', '898.00', '0.00', 0, 0, 1, '', '', '', 'upload/ec/images/201608/thumb_img/59_thumb_G_1471481082222.jpg', 'upload/ec/images/201608/goods_img/59_G_1471481082107.jpg', 'upload/ec/images/201608/source_img/59_G_1471481082793.jpg', 1, '', 1, 1, 0, 8, 1471481082, 100, 0, 1, 0, 0, 0, 0, 1471484195, 23, '', -1, -1, 0, NULL),
(63, 75, 'EC000062', 'ねこのロールペーパーホルダー', '+', 1, 33, '', 10, '0.000', '1254.00', '1045.00', '0.00', 0, 0, 1, '', '', '', 'upload/ec/images/201608/thumb_img/63_thumb_G_1471919236342.jpg', 'upload/ec/images/201608/goods_img/63_G_1471919236243.jpg', 'upload/ec/images/201608/source_img/63_G_1471919236042.jpg', 1, '', 1, 1, 0, 10, 1471919236, 100, 0, 0, 0, 0, 0, 0, 1472175937, 24, '', -1, -1, 0, NULL),
(61, 70, 'EC000061', 'テスト商品2', '+', 0, 0, '', 1, '0.000', '1560.00', '1300.00', '0.00', 0, 0, 1, '', '', '', '', '', '', 1, '', 1, 1, 0, 13, 1471898273, 100, 1, 0, 0, 0, 0, 0, 1471912099, 0, '', -1, -1, 0, NULL),
(64, 70, 'EC000064', 'HG 機動戦士ガンダム 鉄血のオルフェンズ ガンダムアスタロト 1/144スケール 色分け済みプラモデル ', '+', 2, 31, '', 10, '0.000', '970.80', '809.00', '0.00', 0, 0, 1, '', '', '', 'upload/ec/images/201608/thumb_img/64_thumb_G_1472175891959.jpg', 'upload/ec/images/201608/goods_img/64_G_1472175891326.jpg', 'upload/ec/images/201608/source_img/64_G_1472175891431.jpg', 1, '', 1, 1, 0, 8, 1472175891, 100, 0, 1, 0, 0, 0, 0, 1472175935, 22, '', -1, -1, 0, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods_activity`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods_activity` (
  `act_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `act_name` varchar(255) NOT NULL COMMENT '促销活动的名称',
  `act_desc` text NOT NULL COMMENT '促销活动的描述',
  `act_type` tinyint(3) unsigned NOT NULL COMMENT '0:夺宝奇兵,1:团购,2:拍卖,4:超值礼包',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '参加活动的id，取值于ec_goods的goods_id',
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(255) NOT NULL COMMENT '商品的名称，取值于zh_goods的goods_id',
  `start_time` int(10) unsigned NOT NULL COMMENT '活动开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '活动结束时间',
  `is_finished` tinyint(3) unsigned NOT NULL COMMENT '活动是否结束，0，结束；1，未结束',
  `ext_info` text NOT NULL COMMENT '序列化后的促销活动的配置信息，包括最低价，最高价，出价幅度，保证金等',
  PRIMARY KEY (`act_id`),
  KEY `act_name` (`act_name`,`act_type`,`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='拍卖活动和夺宝奇兵活动配置信息表' AUTO_INCREMENT=26 ;

--
-- テーブルのデータのダンプ `zh_ec_goods_activity`
--

INSERT INTO `zh_ec_goods_activity` (`act_id`, `act_name`, `act_desc`, `act_type`, `goods_id`, `product_id`, `goods_name`, `start_time`, `end_time`, `is_finished`, `ext_info`) VALUES
(23, '服装带手机大礼包', '服装带手机大礼包', 4, 0, 0, '', 1458178320, 1469179920, 0, 'a:1:{s:13:"package_price";s:2:"60";}');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods_article`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods_article` (
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品id，取自zh_goods的goods_id',
  `article_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文章id，取自 zh_article 的article_id',
  `admin_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '猜想是管理员的id，但是程序中似乎没有提及到',
  PRIMARY KEY (`goods_id`,`article_id`,`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章关联产品表，即文章中提到的相关产品';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods_attr`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '该具体属性属于的商品，取值于goods的goods_id',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '该具体属性属于的属性类型的id，取自attribute 的attr_id',
  `attr_value` text NOT NULL COMMENT '该具体属性的值',
  `attr_price` varchar(255) NOT NULL COMMENT '''该属性对应在商品原价格上要加的价格',
  PRIMARY KEY (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='具体商品的属性表' AUTO_INCREMENT=423 ;

--
-- テーブルのデータのダンプ `zh_ec_goods_attr`
--

INSERT INTO `zh_ec_goods_attr` (`goods_attr_id`, `goods_id`, `attr_id`, `attr_value`, `attr_price`) VALUES
(372, 54, 235, '幅39×奥行74×高さ18cm', '0'),
(371, 54, 237, 'CAP(カプチーノ)', '0'),
(370, 54, 236, '本体/ポリプロピレン、枠/スチロール樹脂', '0'),
(376, 54, 235, '幅44×奥行74×高さ18cm', '1200'),
(374, 54, 235, '幅39×奥行74×高さ30cm', '500'),
(373, 54, 235, '幅39×奥行74×高さ23cm', '300'),
(405, 58, 245, '男の子', '0'),
(404, 58, 242, '15歳から', '0'),
(403, 57, 244, 'ホワイト', ''),
(399, 57, 244, 'オレンジ', ''),
(400, 57, 244, 'グリーン', ''),
(401, 57, 244, 'ピンク', ''),
(402, 57, 244, 'ブルー', ''),
(398, 57, 244, 'イエロー', ''),
(396, 56, 242, '15才以上', '0'),
(397, 57, 243, '長さ　18.5cm 高さ　6cm 幅 3.5cm 重さ : 30ｇ', '0'),
(388, 55, 236, 'プリント紙化粧パーティクルボード', '0'),
(389, 55, 238, '4kg', '0'),
(390, 55, 239, 'マレーシア', '0'),
(391, 55, 240, '5kg', '0'),
(392, 55, 235, '幅34.5×奥行29.5×高さ34.5cm', ''),
(393, 55, 241, 'オープンタイプ', ''),
(394, 55, 241, '扉付きタイプ', '100'),
(395, 55, 241, '棚付きタイプ', '200'),
(408, 59, 244, 'オレンジ', ''),
(407, 59, 243, '長さ　9cm 高さ　7cm 幅 4.5cm 重さ : 20ｇ', '0'),
(406, 58, 246, '(C)創通・サンライズ', '0'),
(411, 59, 247, ' ☆人気の高いデザイン！コロンとしていてキュート！春を先取り入荷☆\r\n鮮やかな色。小回りの利く大きさ。日常に色を添えるマストアイテム！\r\nシンプル！可愛い！! ちょっとした小物入れに最適！!！\r\nアイディア次第で使い方自由自在。 （口紅 小物入れ ビューティー関係）', '0'),
(410, 59, 244, 'ブルー', ''),
(409, 59, 244, 'ピンク', ''),
(414, 63, 250, 'ポリエステル', '0'),
(413, 63, 249, '70g', '0'),
(412, 63, 248, 'W155XD55XH370(mm)', '0'),
(378, 54, 235, '幅44×奥行74×高さ30cm', '1600'),
(377, 54, 235, '幅44×奥行74×高さ23cm', '1400'),
(375, 54, 235, '幅39×奥行74×高さ35cm', '2400'),
(422, 64, 246, '(C)創通・サンライズ・MBS', '0'),
(421, 64, 242, '8才以上', '0'),
(419, 63, 252, '茶 豆柴', '50'),
(420, 63, 252, '黒 豆柴', '100'),
(418, 63, 252, '白 ネコ', '20'),
(417, 63, 252, 'トラ', '10'),
(416, 63, 252, 'クロ', ''),
(415, 63, 251, ' 中国', '0');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods_cat`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods_cat` (
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类id',
  PRIMARY KEY (`goods_id`,`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品的扩展分类';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods_gallery`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods_gallery` (
  `img_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品相册自增id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '图片属于商品的id',
  `img_url` varchar(255) NOT NULL COMMENT '实际图片url',
  `img_desc` varchar(255) NOT NULL COMMENT '图片说明信息',
  `thumb_url` varchar(255) NOT NULL COMMENT '微缩图片url',
  `img_original` varchar(255) NOT NULL COMMENT '根据名字猜，应该是上传的图片文件的最原始的文件的url',
  PRIMARY KEY (`img_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品相册表，只出现在页面的商品相册中' AUTO_INCREMENT=82 ;

--
-- テーブルのデータのダンプ `zh_ec_goods_gallery`
--

INSERT INTO `zh_ec_goods_gallery` (`img_id`, `goods_id`, `img_url`, `img_desc`, `thumb_url`, `img_original`) VALUES
(70, 54, 'upload/ec/images/201608/goods_img/54_P_1470696623119.jpg', '', 'upload/ec/images/201608/thumb_img/54_thumb_P_1470696623927.jpg', 'upload/ec/images/201608/source_img/54_P_1470696623587.jpg'),
(71, 55, 'upload/ec/images/201608/goods_img/55_P_1470783561165.jpg', '', 'upload/ec/images/201608/thumb_img/55_thumb_P_1470783561369.jpg', 'upload/ec/images/201608/source_img/55_P_1470783561710.jpg'),
(72, 56, 'upload/ec/images/201608/goods_img/56_P_1470946343258.jpg', '', 'upload/ec/images/201608/thumb_img/56_thumb_P_1470946343534.jpg', 'upload/ec/images/201608/source_img/56_P_1470946343695.jpg'),
(73, 57, 'upload/ec/images/201608/goods_img/57_P_1471301378729.jpg', '', 'upload/ec/images/201608/thumb_img/57_thumb_P_1471301378113.jpg', 'upload/ec/images/201608/source_img/57_P_1471301378834.jpg'),
(74, 57, 'upload/ec/images/201608/goods_img/57_P_1471301378763.jpg', '', 'upload/ec/images/201608/thumb_img/57_thumb_P_1471301378015.jpg', 'upload/ec/images/201608/source_img/57_P_1471301378692.jpg'),
(75, 57, 'upload/ec/images/201608/goods_img/57_P_1471301378768.jpg', '', 'upload/ec/images/201608/thumb_img/57_thumb_P_1471301378301.jpg', 'upload/ec/images/201608/source_img/57_P_1471301378199.jpg'),
(76, 57, 'upload/ec/images/201608/goods_img/57_P_1471301379767.jpg', '', 'upload/ec/images/201608/thumb_img/57_thumb_P_1471301379479.jpg', 'upload/ec/images/201608/source_img/57_P_1471301379947.jpg'),
(77, 58, 'upload/ec/images/201608/goods_img/58_P_1471389953230.jpg', '', 'upload/ec/images/201608/thumb_img/58_thumb_P_1471389953175.jpg', 'upload/ec/images/201608/source_img/58_P_1471389953755.jpg'),
(78, 59, 'upload/ec/images/201608/goods_img/59_P_1471481082300.jpg', '', 'upload/ec/images/201608/thumb_img/59_thumb_P_1471481082780.jpg', 'upload/ec/images/201608/source_img/59_P_1471481082787.jpg'),
(79, 63, 'upload/ec/images/201608/goods_img/63_P_1471919236335.jpg', '', 'upload/ec/images/201608/thumb_img/63_thumb_P_1471919236372.jpg', 'upload/ec/images/201608/source_img/63_P_1471919236580.jpg'),
(80, 64, 'upload/ec/images/201608/goods_img/64_P_1472175891810.jpg', '', 'upload/ec/images/201608/thumb_img/64_thumb_P_1472175891912.jpg', 'upload/ec/images/201608/source_img/64_P_1472175891210.jpg'),
(81, 64, 'upload/ec/images/201608/goods_img/64_P_1472175891937.jpg', '', 'upload/ec/images/201608/thumb_img/64_thumb_P_1472175891430.jpg', 'upload/ec/images/201608/source_img/64_P_1472175891577.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_goods_type`
--

CREATE TABLE IF NOT EXISTS `zh_ec_goods_type` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `cat_name` varchar(60) NOT NULL DEFAULT '' COMMENT '商品类型名',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型状态，1，为可用；0为不可用；不可用的类型，在添加商品的时候选择商品属性将不可选',
  `attr_group` varchar(255) NOT NULL COMMENT '商品属性分组，将一个商品类型的属性分成组，在显示的时候也是按组显示。该字段的值显示在属性的前一行，像标题的作用',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品类型表，该表每条记录就是一个商品类型' AUTO_INCREMENT=25 ;

--
-- テーブルのデータのダンプ `zh_ec_goods_type`
--

INSERT INTO `zh_ec_goods_type` (`cat_id`, `cat_name`, `enabled`, `attr_group`) VALUES
(21, '収納ケース・ボックス', 1, ''),
(22, 'おもちゃ', 1, ''),
(23, '化粧ポーチ・メイクケース', 1, ''),
(24, '面白いもの', 1, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_group_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_group_goods` (
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父商品id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '配件商品id''',
  `goods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '配件商品的价格',
  `admin_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '添加该配件的管理员的id',
  PRIMARY KEY (`parent_id`,`goods_id`,`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品配件配置表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_keywords`
--

CREATE TABLE IF NOT EXISTS `zh_ec_keywords` (
  `date` date NOT NULL DEFAULT '0000-00-00' COMMENT '搜索日期',
  `searchengine` varchar(20) NOT NULL COMMENT '搜索引擎，默认是ecshop',
  `keyword` varchar(90) NOT NULL COMMENT '搜索关键字，即用户填写的搜索内容',
  `count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '''搜索次数，按天累加',
  PRIMARY KEY (`date`,`searchengine`,`keyword`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_ec_keywords`
--

INSERT INTO `zh_ec_keywords` (`date`, `searchengine`, `keyword`, `count`) VALUES
('2009-04-21', 'ecshop', '诺基亚', 1),
('2009-04-27', 'ecshop', '智能手机', 1),
('2009-05-04', 'ecshop', '斤', 1),
('2009-05-10', 'ecshop', '诺基亚', 1),
('2009-05-11', 'ecshop', '智能手机', 1),
('2009-05-11', 'ecshop', '诺基亚', 1),
('2009-05-12', 'ecshop', '三星', 1),
('2009-05-12', 'ecshop', '智能手机', 1),
('2009-05-12', 'ecshop', 'p806', 1),
('2009-05-12', 'ecshop', '诺基亚', 1),
('2009-05-12', 'ecshop', '夏新', 1),
('2009-05-18', 'ecshop', '52', 2),
('2009-05-22', 'ecshop', 'p', 1),
('2016-03-02', 'ecshop', 'aaaaa', 6),
('2016-03-02', 'ecshop', 'k', 4),
('2016-03-02', 'ecshop', '8', 62),
('2016-04-05', 'ecshop', '8', 15),
('2016-04-06', 'ecshop', '8', 1),
('2016-04-21', 'ecshop', '8', 2),
('2016-05-10', 'ecshop', '我的tab2', 1),
('2016-05-10', 'ecshop', '8', 3),
('2016-05-10', 'ecshop', 'N85', 1),
('2016-05-12', 'ecshop', '8', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_link_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_link_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `link_goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '被关联的商品的id',
  `is_double` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否是双向关联；0，否；1，是',
  `admin_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '添加此关联商品信息的管理员id',
  PRIMARY KEY (`goods_id`,`link_goods_id`,`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关联商品信息表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_mail_templates`
--

CREATE TABLE IF NOT EXISTS `zh_ec_mail_templates` (
  `template_id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT COMMENT '邮件模板自增id''',
  `template_code` varchar(30) NOT NULL COMMENT '模板字符串名称，主要用于插件言语包时匹配语言包文件等用途',
  `is_html` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '邮件是否是html格式；0，否；1，是',
  `template_subject` varchar(200) NOT NULL COMMENT '该邮件模板的邮件主题',
  `template_content` text NOT NULL COMMENT '邮件模板的内容',
  `last_modify` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次修改模板的时间',
  `last_send` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近一次发送的时间，好像仅在杂志才记录',
  `type` varchar(10) NOT NULL COMMENT '该邮件模板的邮件类型；共2个类型；magazine，杂志订阅；template，关注订阅',
  PRIMARY KEY (`template_id`),
  UNIQUE KEY `template_code` (`template_code`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='各种邮件的模板配置模板包括杂志模板' AUTO_INCREMENT=15 ;

--
-- テーブルのデータのダンプ `zh_ec_mail_templates`
--

INSERT INTO `zh_ec_mail_templates` (`template_id`, `template_code`, `is_html`, `template_subject`, `template_content`, `last_modify`, `last_send`, `type`) VALUES
(1, 'send_password', 1, '密码找回', '{$user_name}您好！<br>\r\n<br>\r\n您已经进行了密码重置的操作，请点击以下链接(或者复制到您的浏览器):<br>\r\n<br>\r\n<a href="{$reset_email}" target="_blank">{$reset_email}</a><br>\r\n<br>\r\n以确认您的新密码重置操作！<br>\r\n<br>\r\n{$shop_name}<br>\r\n{$send_date}', 1446597547, 0, 'template'),
(2, 'order_confirm', 0, '订单确认通知', '亲爱的{$order.consignee}，你好！ \n\n我们已经收到您于 {$order.formated_add_time} 提交的订单，该订单编号为：{$order.order_sn} 请记住这个编号以便日后的查询。\n\n{$shop_name}\n{$sent_date}\n\n\n', 1158226370, 0, 'template'),
(3, 'deliver_notice', 1, '发货通知', '亲爱的{$order.consignee}。你好！</br></br>\n\n您的订单{$order.order_sn}已于{$send_time}按照您预定的配送方式给您发货了。</br>\n</br>\n{if $order.invoice_no}发货单号是{$order.invoice_no}。</br>{/if}\n</br>\n在您收到货物之后请点击下面的链接确认您已经收到货物：</br>\n<a href="{$confirm_url}" target="_blank">{$confirm_url}</a></br></br>\n如果您还没有收到货物可以点击以下链接给我们留言：</br></br>\n<a href="{$send_msg_url}" target="_blank">{$send_msg_url}</a></br>\n<br>\n再次感谢您对我们的支持。欢迎您的再次光临。 <br>\n<br>\n{$shop_name} </br>\n{$send_date}', 1194823291, 0, 'template'),
(4, 'order_cancel', 0, '订单取消', '亲爱的{$order.consignee}，你好！ \n\n您的编号为：{$order.order_sn}的订单已取消。\n\n{$shop_name}\n{$send_date}', 1156491130, 0, 'template'),
(5, 'order_invalid', 0, '密码找回', '亲爱的{$order.consignee}，你好！\r\n\r\n您的编号为：{$order.order_sn}的订单无效。\r\n\r\n{$shop_name}\r\n{$send_date}', 1446514567, 0, 'template'),
(6, 'send_bonus', 0, '发红包', '亲爱的{$username}您好！\r\n\r\n恭喜您获得了{$count}个红包，金额<if value=''$count'' gt 1>分别</if>为{$money}\r\n\r\n{$shop_name}\r\n{$send_date}\r\n', 1156491184, 0, 'template'),
(7, 'group_buy', 1, '团购商品', '亲爱的{$consignee}，您好！<br>\n<br>\n您于{$order_time}在本店参加团购商品活动，所购买的商品名称为：{$goods_name}，数量：{$goods_number}，订单号为：{$order_sn}，订单金额为：{$order_amount}<br>\n<br>\n此团购商品现在已到结束日期，并达到最低价格，您现在可以对该订单付款。<br>\n<br>\n请点击下面的链接：<br>\n<a href="{$shop_url}" target="_blank">{$shop_url}</a><br>\n<br>\n请尽快登录到用户中心，查看您的订单详情信息。 <br>\n<br>\n{$shop_name} <br>\n<br>\n{$send_date}', 1194824668, 0, 'template'),
(8, 'register_validate', 1, '邮件验证', '{$user_name}您好！<br><br>\r\n\r\n这封邮件是 {$shop_name} 发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。<br>\r\n请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:<br>\r\n<a href="{$validate_email}" target="_blank">{$validate_email}</a><br><br>\r\n\r\n{$shop_name}<br>\r\n{$send_date}', 1162201031, 0, 'template'),
(9, 'virtual_card', 0, '虚拟卡片', '亲爱的{$order.consignee}\r\n你好！您的订单{$order.order_sn}中{$goods.goods_name} 商品的详细信息如下:\r\n{foreach from=$virtual_card item=card}\r\n{if $card.card_sn}卡号：{$card.card_sn}{/if}{if $card.card_password}卡片密码：{$card.card_password}{/if}{if $card.end_date}截至日期：{$card.end_date}{/if}\r\n{/foreach}\r\n再次感谢您对我们的支持。欢迎您的再次光临。\r\n\r\n{$shop_name} \r\n{$send_date}', 1162201031, 0, 'template'),
(10, 'attention_list', 0, '关注商品', '亲爱的{$user_name}您好~\n\n您关注的商品 : {$goods_name} 最近已经更新,请您查看最新的商品信息\n\n{$goods_url}\r\n\r\n{$shop_name} \r\n{$send_date}', 1183851073, 0, 'template'),
(11, 'remind_of_new_order', 0, '新订单通知', '亲爱的店长，您好：\n   快来看看吧，又有新订单了。\n    订单号:{$order.order_sn} \n 订单金额:{$order.order_amount}，\n 用户购买商品:{foreach from=$goods_list item=goods_data}{$goods_data.goods_name}(货号:{$goods_data.goods_sn})    {/foreach} \n\n 收货人:{$order.consignee}， \n 收货人地址:{$order.address}，\n 收货人电话:{$order.tel} {$order.mobile}, \n 配送方式:{$order.shipping_name}(费用:{$order.shipping_fee}), \n 付款方式:{$order.pay_name}(费用:{$order.pay_fee})。\n\n               系统提醒\n               {$send_date}', 1196239170, 0, 'template'),
(12, 'goods_booking', 1, '缺货回复', '亲爱的{$user_name}。你好！</br></br>{$dispose_note}</br></br>您提交的缺货商品链接为</br></br><a href="{$goods_link}" target="_blank">{$goods_name}</a></br><br>{$shop_name} </br>{$send_date}', 0, 0, 'template'),
(13, 'user_message', 1, '留言回复', '亲爱的{$user_name}。你好！</br></br>对您的留言：</br>{$message_content}</br></br>店主作了如下回复：</br>{$message_note}</br></br>您可以随时回到店中和店主继续沟通。</br>{$shop_name}</br>{$send_date}', 0, 0, 'template'),
(14, 'recomment', 1, '用户评论回复', '亲爱的{$user_name}。你好！</br></br>对您的评论：</br>“{$comment}”</br></br>店主作了如下回复：</br>“{$recomment}”</br></br>您可以随时回到店中和店主继续沟通。</br>{$shop_name}</br>{$send_date}', 0, 0, 'template');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_member_price`
--

CREATE TABLE IF NOT EXISTS `zh_ec_member_price` (
  `price_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '折扣价自增id''',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id',
  `user_rank` tinyint(3) NOT NULL DEFAULT '0' COMMENT '会员登记id',
  `user_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '指定商品对指定会员等级的固定定价价格，单位元',
  PRIMARY KEY (`price_id`),
  KEY `goods_id` (`goods_id`,`user_rank`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品不按照会员的折扣定价，而是再单独为不同的会员等级定的价；' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_nav`
--

CREATE TABLE IF NOT EXISTS `zh_ec_nav` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '导航配置自增id',
  `ctype` varchar(10) DEFAULT NULL COMMENT 'c表示是商品分类',
  `cid` smallint(5) unsigned DEFAULT NULL COMMENT '商品分类中的cat_id',
  `name` varchar(255) NOT NULL COMMENT '导航显示标题',
  `ifshow` tinyint(1) NOT NULL COMMENT '是否显示',
  `vieworder` tinyint(1) NOT NULL COMMENT '页面显示顺序，数字越大越靠后',
  `opennew` tinyint(1) NOT NULL COMMENT '导航链接页面是否在新窗口打开，1，是；其他，',
  `url` varchar(255) NOT NULL COMMENT '链接的页面地址',
  `type` varchar(10) NOT NULL COMMENT '处于导航栏的位置，top为顶部；middle为中间；bottom,为底部',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `ifshow` (`ifshow`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- テーブルのデータのダンプ `zh_ec_nav`
--

INSERT INTO `zh_ec_nav` (`id`, `ctype`, `cid`, `name`, `ifshow`, `vieworder`, `opennew`, `url`, `type`) VALUES
(4, '', 0, '団体購入商品', 0, 20, 0, 'index?a=ec&c=EcGroupBuy&m=index', 'middle'),
(5, '', 0, '商品奇襲', 0, 22, 0, 'index.php?a=ec&c=EcSnatch&m=index', 'middle'),
(53, 'c', 66, 'ホーム＆キッチン', 0, 102, 0, 'index.php?a=ec&c=EcCategory&m=index&id=66', 'middle'),
(7, '', 0, '責任免状知らせ', 0, 1, 0, 'index.php?a=ec&c=EcArticle&m=index&id=1', 'bottom'),
(8, '', 0, 'プライバシー保護 ', 0, 2, 0, 'index.php?a=ec&c=EcArticle&m=index&id=2', 'bottom'),
(9, '', 0, 'ホットFAQ', 0, 3, 0, 'index.php?a=ec&c=EcArticle&m=index&id=3', 'bottom'),
(10, '', 0, '問い合わせ', 0, 4, 0, 'index.php?a=ec&c=EcArticle&m=index&id=4', 'bottom'),
(11, '', 0, '会社紹介', 0, 5, 0, 'index.php?a=ec&c=EcArticle&m=index&id=5', 'bottom'),
(12, '', 0, 'ロード方法', 0, 6, 0, 'index.php?a=ec&c=EcWholesale&m=index', 'bottom'),
(14, '', 0, '配達方式', 0, 7, 0, 'index.php?a=ec&c=EcMyship&m=index', 'bottom'),
(15, '', 0, 'メッセージボード', 0, 99, 0, 'index.php?a=Ec&c=EcMessage&m=index', 'middle'),
(20, '', 0, 'ECBBS', 0, 100, 1, 'http://metaphase.co.jp', 'middle'),
(21, '', 0, 'セール', 0, 21, 0, 'index.php?a=ec&c=EcActivity&m=index', 'middle'),
(23, '', 0, '見積書', 0, 6, 0, 'index.php?a=ec&c=EcQuotation&m=index', 'top'),
(24, '', 0, 'オークション', 0, 23, 0, 'index.php?a=ec&c=EcAuction&m=index', 'middle'),
(25, '', 0, 'ポイント商品', 0, 24, 0, 'index.php?a=ec&c=EcExchange&m=index', 'middle'),
(47, '', 0, 'カード', 1, 0, 0, 'index.php?a=ec&c=EcFlow&m=index', 'top'),
(48, '', 0, '購入センター', 0, 2, 0, 'index.php?a=ec&c=EcPickOut&m=index', 'top'),
(49, '', 0, 'タグ', 0, 5, 0, 'index.php?a=ec&c=EcTagCloud&m=index', 'top');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_order_action`
--

CREATE TABLE IF NOT EXISTS `zh_ec_order_action` (
  `action_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '流水号',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '被操作的交易号',
  `action_user` varchar(30) NOT NULL COMMENT '操作该次的人员',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '作何操作.0，未确认；1，已确认；2，已取消；3，无效；4，退货；',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '发货状态。0，未发货；1，已发货；2，已收货；3，备货中',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态.0,未付款;1,付款中;2,已付款;',
  `action_place` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_note` varchar(255) NOT NULL COMMENT '操作备注',
  `log_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`action_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='对订单操作日志表' AUTO_INCREMENT=28 ;

--
-- テーブルのデータのダンプ `zh_ec_order_action`
--

INSERT INTO `zh_ec_order_action` (`action_id`, `order_id`, `action_user`, `order_status`, `shipping_status`, `pay_status`, `action_place`, `action_note`, `log_time`) VALUES
(1, 2, 'admin', 1, 0, 2, 0, '[售后] 1132', 1242142350),
(2, 2, 'admin', 1, 1, 2, 0, '已经发货，注意接收', 1242142389),
(3, 1, 'admin', 1, 1, 2, 0, '已经发货，注意接收', 1242142432),
(4, 2, '买家', 1, 2, 2, 0, '', 1242142449),
(5, 1, '买家', 1, 2, 2, 0, '', 1242142451),
(6, 3, 'admin', 1, 1, 2, 0, '已经发货了，注意接收', 1242142589),
(7, 3, '买家', 1, 2, 2, 0, '', 1242142634),
(8, 5, 'admin', 1, 3, 2, 0, '', 1242142869),
(9, 6, 'admin', 3, 0, 0, 0, '暂时缺货', 1242143337),
(10, 7, 'admin', 1, 0, 0, 0, '', 1242143454),
(11, 1, 'admin', 1, 2, 2, 0, '[售后] 售后', 1242143773),
(12, 2, 'admin', 4, 0, 0, 0, '质量问题', 1242144185),
(13, 12, 'buyer', 2, 0, 0, 0, '用户取消', 1242576313),
(14, 13, 'admin', 1, 1, 0, 0, '11', 1242576445),
(15, 14, 'admin', 1, 3, 2, 0, '', 1242976715),
(16, 14, 'admin', 1, 1, 2, 0, '已经发货，请接收', 1242976740),
(17, 15, 'admin', 1, 0, 0, 0, '', 1245044587),
(18, 15, 'admin', 1, 0, 2, 0, '已经付款', 1245044644),
(19, 15, 'admin', 1, 4, 2, 0, '', 1245044964),
(20, 15, 'admin', 1, 4, 2, 0, '北京供货商', 1245045061),
(21, 3, 'admin', 4, 0, 0, 0, '不喜欢这个颜色', 1245045334),
(22, 15, 'admin', 1, 1, 2, 0, '', 1245045443),
(23, 15, 'admin', 4, 0, 0, 0, '退货', 1245045515),
(24, 16, 'admin', 1, 4, 2, 0, '上海供货', 1245045723),
(25, 17, 'admin', 1, 1, 2, 0, '', 1245048189),
(26, 17, 'admin', 4, 0, 0, 0, '退货', 1245048212),
(27, 19, 'admin', 1, 1, 2, 0, '', 1245384050);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_order_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_order_goods` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单商品信息自增id''',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '订单商品信息对应的详细信息id，取值order_info的order_id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的的id，取值表ecs_goods 的goods_id',
  `goods_name` varchar(120) NOT NULL COMMENT '商品的名称，取值表ecs_goods',
  `goods_sn` varchar(60) NOT NULL COMMENT '商品的唯一货号，取值ecs_goods',
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '商品的购买数量''',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品的市场售价，取值ecs_goods',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品的本店售价，取值ecs_goods ',
  `goods_attr` text NOT NULL COMMENT '购买该商品时所选择的属性；',
  `send_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '当不是实物时，是否已发货，0，否；1，是',
  `is_real` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否是实物，0，否；1，是；取值ecs_goods',
  `extension_code` varchar(30) NOT NULL COMMENT '商品的扩展属性，比如像虚拟卡。取值ecs_goods',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父商品id，取值于ecs_cart的parent_id；如果有该值则是值多代表的物品的配件',
  `is_gift` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '是否参加优惠活动，0，否；其他，取值于ecs_cart 的is_gift，跟其一样，是参加的优惠活动的id',
  `goods_attr_id` varchar(255) NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `order_id` (`order_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='订单的商品信息，注：订单的商品信息基本都是从购物车所对应的表中取来的' AUTO_INCREMENT=41 ;

--
-- テーブルのデータのダンプ `zh_ec_order_goods`
--

INSERT INTO `zh_ec_order_goods` (`rec_id`, `order_id`, `goods_id`, `goods_name`, `goods_sn`, `product_id`, `goods_number`, `market_price`, `goods_price`, `goods_attr`, `send_number`, `is_real`, `extension_code`, `parent_id`, `is_gift`, `goods_attr_id`) VALUES
(1, 1, 8, '飞利浦9@9v', 'ECS000008', 0, 1, '478.79', '385.00', '颜色:黑 \n', 0, 1, '', 0, 0, '231'),
(2, 2, 12, '摩托罗拉A810', 'ECS000012', 0, 1, '1179.60', '960.00', '', 0, 1, '', 0, 0, ''),
(3, 3, 17, '夏新N7', 'ECS000017', 0, 1, '2760.00', '2300.00', '', 0, 1, '', 0, 0, ''),
(4, 4, 22, '多普达Touch HD', 'ECS000022', 0, 1, '7198.80', '5999.00', '', 0, 1, '', 0, 0, ''),
(5, 5, 9, '诺基亚E66', 'ECS000009', 0, 3, '2757.60', '2200.00', '', 0, 1, '', 0, 0, ''),
(6, 5, 24, 'P806', 'ECS000024', 0, 1, '2400.00', '2000.00', '', 0, 1, '', 0, 0, ''),
(7, 6, 5, '索爱原装M2卡读卡器', 'ECS000005', 0, 1, '24.00', '20.00', '', 0, 1, '', 0, 0, ''),
(8, 7, 9, '诺基亚E66', 'ECS000009', 0, 1, '2757.60', '2298.00', '', 0, 1, '', 0, 0, ''),
(9, 8, 20, '三星BC01', 'ECS000020', 0, 1, '336.00', '238.00', '', 0, 1, '', 0, 0, ''),
(10, 8, 8, '飞利浦9@9v', 'ECS000008', 0, 1, '478.79', '385.00', '颜色:黑 \n', 0, 1, '', 0, 0, '231'),
(11, 9, 24, 'P806', 'ECS000024', 0, 1, '2400.00', '2000.00', '', 0, 1, '', 0, 0, ''),
(12, 10, 24, 'P806', 'ECS000024', 0, 1, '2400.00', '0.00', '', 0, 1, '', 0, 0, ''),
(13, 11, 23, '诺基亚N96', 'ECS000023', 0, 1, '4440.00', '3800.00', '附加配件: 原装电池 [+100]', 0, 1, '', 0, 0, ''),
(14, 12, 20, '三星BC01', 'ECS000020', 0, 1, '336.00', '238.00', '', 0, 1, '', 0, 0, ''),
(15, 13, 12, '摩托罗拉A810', 'ECS000012', 0, 1, '1179.60', '960.00', '', 0, 1, '', 0, 0, ''),
(16, 14, 15, '摩托罗拉A810', 'ECS000015', 0, 5, '705.60', '588.00', '', 0, 1, '', 0, 0, ''),
(17, 14, 20, '三星BC01', 'ECS000020', 0, 1, '336.00', '238.00', '', 0, 1, '', 0, 0, ''),
(18, 14, 22, '多普达Touch HD', 'ECS000022', 0, 1, '7198.80', '5999.00', '', 0, 1, '', 0, 0, ''),
(19, 14, 3, '诺基亚原装5800耳机', 'ECS000002', 0, 4, '81.60', '68.00', '颜色:银色 \n', 0, 1, '', 0, 0, ''),
(20, 14, 9, '诺基亚E66', 'ECS000009', 0, 2, '2757.60', '2298.00', '', 0, 1, '', 0, 0, ''),
(21, 15, 13, '诺基亚5320 XpressMusic', 'ECS000013', 0, 3, '1583.20', '1210.00', '颜色:红[10] \n', 0, 1, '', 0, 0, ''),
(22, 15, 14, '诺基亚5800XM', 'ECS000014', 0, 1, '3150.00', '2493.75', '', 0, 1, '', 0, 0, ''),
(23, 15, 24, 'P806', 'ECS000024', 0, 4, '2400.00', '1900.00', '', 0, 1, '', 0, 0, ''),
(24, 15, 9, '诺基亚E66', 'ECS000009', 0, 1, '2757.60', '2183.10', '', 0, 1, '', 0, 0, ''),
(25, 15, 8, '飞利浦9@9v', 'ECS000008', 0, 3, '478.79', '379.05', '颜色:黑 \n', 0, 1, '', 0, 0, '231'),
(26, 16, 12, '摩托罗拉A810', 'ECS000012', 0, 2, '1179.60', '933.85', '', 2, 1, '', 0, 0, ''),
(27, 16, 1, 'KD876', 'ECS000000', 0, 1, '1665.60', '1318.60', '', 0, 1, '', 0, 0, ''),
(28, 17, 24, 'P806', 'ECS000024', 0, 1, '2400.00', '1900.00', '', 0, 1, '', 0, 0, ''),
(29, 18, 24, 'P806', 'ECS000024', 0, 5, '2400.00', '100.00', '', 0, 1, '', 0, 0, ''),
(30, 19, 12, '摩托罗拉A810', 'ECS000012', 0, 2, '1179.60', '933.85', '', 2, 1, '', 0, 0, ''),
(31, 19, 24, 'P806', 'ECS000024', 0, 2, '2400.00', '1850.00', '颜色:灰色 \n', 2, 1, '', 0, 0, '167'),
(32, 20, 9, '诺基亚E66', 'ECS000009', 11, 3, '2757.60', '2200.00', '颜色:白色 \n', 0, 1, '', 0, 0, '227'),
(33, 21, 23, '诺基亚N96', 'ECS000023', 3, 2, '4440.00', '3700.00', '颜色:黑色 \n', 0, 1, '', 0, 0, '175'),
(37, 30, 24, 'P806', 'ECS000024', 2, 1, '2460.00', '1910.00', '颜色:灰色 \n配件:数据线[20] \n配件:线控耳机[40] \n', 0, 1, '', 0, 0, '167,168,344'),
(38, 31, 24, 'P806', 'ECS000024', 2, 1, '2460.00', '1910.00', '颜色:灰色 \n配件:数据线[20] \n配件:线控耳机[40] \n', 0, 1, '', 0, 0, '167,168,344'),
(39, 32, 23, '诺基亚N96', 'ECS000023', 3, 1, '4440.00', '3700.00', '颜色:黑色 \n', 0, 1, '', 0, 0, '175'),
(40, 33, 57, 'カラフル デザイン ペン ケース ビューティー 小物 入れ 使い方 自由 自在', 'EC000057', 0, 1, '1558.80', '1299.00', '色:イエロー \n', 0, 1, '', 0, 0, '398');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_order_info`
--

CREATE TABLE IF NOT EXISTS `zh_ec_order_info` (
  `order_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单详细信息自增id',
  `order_sn` varchar(20) NOT NULL COMMENT '订单号，唯一',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户id，同ecs_users的user_id',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态。0，未确认；1，已确认；2，已取消；3，无效；4，退货；',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '商品配送情况，0，未发货；1，已发货；2，已收货；3，备货中',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态；0，未付款；1，付款中；2，已付款',
  `consignee` varchar(60) NOT NULL COMMENT '收货人的姓名，用户页面填写，默认取值于表user_address',
  `country` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '收货人的国家，用户页面填写，默认取值于表user_address，其id对应的值在ecs_region',
  `province` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '收货人的省份，用户页面填写，默认取值于表user_address，其id对应的值在ecs_region',
  `city` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '收货人的城市，用户页面填写，默认取值于表user_address，其id对应的值在ecs_region',
  `district` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '收货人的地区，用户页面填写，默认取值于表user_address，其id对应的值在ecs_region',
  `address` varchar(255) NOT NULL COMMENT '收货人的详细地址，用户页面填写，默认取值于表user_address',
  `zipcode` varchar(60) NOT NULL COMMENT '收货人的邮编，用户页面填写，默认取值于表user_address',
  `tel` varchar(60) NOT NULL COMMENT '收货人的电话，用户页面填写，默认取值于表user_address',
  `mobile` varchar(60) NOT NULL COMMENT '收货人的手机，用户页面填写，默认取值于表user_address',
  `email` varchar(60) NOT NULL COMMENT '收货人的手机，用户页面填写，默认取值于表user_address',
  `best_time` varchar(120) NOT NULL COMMENT '收货人的最佳送货时间，用户页面填写，默认取值于表user_address',
  `sign_building` varchar(120) NOT NULL COMMENT '收货人的地址的标志性建筑，用户页面填写，默认取值于表user_address',
  `postscript` varchar(255) NOT NULL COMMENT '订单附言，由用户提交订单前填写',
  `shipping_id` tinyint(3) NOT NULL DEFAULT '0' COMMENT '用户选择的配送方式id，取值表ecs_shipping',
  `shipping_name` varchar(120) NOT NULL COMMENT '用户选择的配送方式的名称，取值表ecs_shipping',
  `pay_id` tinyint(3) NOT NULL DEFAULT '0' COMMENT '用户选择的支付方式的id，取值表ecs_payment',
  `pay_name` varchar(120) NOT NULL COMMENT '用户选择的支付方式的名称，取值表ecs_payment',
  `how_oos` varchar(120) NOT NULL COMMENT '缺货处理方式，等待所有商品备齐后再发； 取消订单；与店主协商',
  `how_surplus` varchar(120) NOT NULL COMMENT '根据字段猜测应该是余额处理方式，程序未作这部分实现',
  `pack_name` varchar(120) NOT NULL COMMENT '包装名称，取值表ecs_pack',
  `card_name` varchar(120) NOT NULL COMMENT '贺卡的名称，取值ecs_card ',
  `card_message` varchar(255) NOT NULL COMMENT '贺卡内容，由用户提交',
  `inv_payee` varchar(120) NOT NULL COMMENT '发票抬头，用户页面填写',
  `inv_content` varchar(120) NOT NULL COMMENT '发票内容，用户页面选择，取值ecs_shop_config的code字段的值为invoice_content的value',
  `goods_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品总金额',
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '配送费用',
  `insure_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '保价费用',
  `pay_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '支付费用,跟支付方式的配置相关，取值表ecs_payment',
  `pack_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '包装费用，取值表取值表ecs_pack',
  `card_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '贺卡费用，取值ecs_card ',
  `money_paid` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '已付款金额',
  `surplus` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '该订单使用余额的数量，取用户设定余额，用户可用余额，订单金额中最小',
  `integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '使用的积分的数量，取用户使用积分，商品可用积分，用户拥有积分中最小者',
  `integral_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '使用积分金额',
  `bonus` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '使用红包金额',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '应付款金额',
  `from_ad` smallint(5) NOT NULL DEFAULT '0' COMMENT '订单由某广告带来的广告id，应该取值于ecs_ad',
  `referer` varchar(255) NOT NULL COMMENT '订单的来源页面',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单生成时间',
  `confirm_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单确认时间',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单支付时间',
  `shipping_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单配送时间',
  `pack_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '包装id，取值取值表ecs_pack',
  `card_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '贺卡id，用户在页面选择，取值取值ecs_card ',
  `bonus_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '红包的id，ecs_user_bonus的bonus_id',
  `invoice_no` varchar(255) NOT NULL COMMENT '发货单号，发货时填写，可在订单查询查看',
  `extension_code` varchar(30) NOT NULL COMMENT '通过活动购买的商品的代号；GROUP_BUY是团购；AUCTION，是拍卖；SNATCH，夺宝奇兵；正常普通产品该处为空',
  `extension_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '通过活动购买的物品的id，取值ecs_goods_activity；如果是正常普通商品，该处为0',
  `to_buyer` varchar(255) NOT NULL COMMENT '商家给客户的留言,当该字段有值时可以在订单查询看到',
  `pay_note` varchar(255) NOT NULL COMMENT '付款备注，在订单管理里编辑修改',
  `agency_id` smallint(5) unsigned NOT NULL COMMENT '该笔订单被指派给的办事处的id，根据订单内容和办事处负责范围自动决定，也可以有管理员修改，取值于表ecs_agency',
  `inv_type` varchar(60) NOT NULL COMMENT '发票类型，用户页面选择，取值ecs_shop_config的code字段的值为invoice_type的value',
  `tax` decimal(10,2) NOT NULL COMMENT '发票税额',
  `is_separate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0，未分成或等待分成；1，已分成；2，取消分成；',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '能获得推荐分成的用户id，id取值于表ecs_users',
  `discount` decimal(10,2) NOT NULL COMMENT '折扣金额',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_sn` (`order_sn`),
  KEY `user_id` (`user_id`),
  KEY `order_status` (`order_status`),
  KEY `shipping_status` (`shipping_status`),
  KEY `pay_status` (`pay_status`),
  KEY `shipping_id` (`shipping_id`),
  KEY `pay_id` (`pay_id`),
  KEY `extension_code` (`extension_code`,`extension_id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户反馈信息表，包括留言，投诉，咨询等' AUTO_INCREMENT=34 ;

--
-- テーブルのデータのダンプ `zh_ec_order_info`
--

INSERT INTO `zh_ec_order_info` (`order_id`, `order_sn`, `user_id`, `order_status`, `shipping_status`, `pay_status`, `consignee`, `country`, `province`, `city`, `district`, `address`, `zipcode`, `tel`, `mobile`, `email`, `best_time`, `sign_building`, `postscript`, `shipping_id`, `shipping_name`, `pay_id`, `pay_name`, `how_oos`, `how_surplus`, `pack_name`, `card_name`, `card_message`, `inv_payee`, `inv_content`, `goods_amount`, `shipping_fee`, `insure_fee`, `pay_fee`, `pack_fee`, `card_fee`, `money_paid`, `surplus`, `integral`, `integral_money`, `bonus`, `order_amount`, `from_ad`, `referer`, `add_time`, `confirm_time`, `pay_time`, `shipping_time`, `pack_id`, `card_id`, `bonus_id`, `invoice_no`, `extension_code`, `extension_id`, `to_buyer`, `pay_note`, `agency_id`, `inv_type`, `tax`, `is_separate`, `parent_id`, `discount`) VALUES
(1, '2009051298180', 1, 1, 2, 2, '刘先生', 1, 2, 52, 500, '[中国 北京 北京 海淀区] 中关村海兴大厦', '100085', '010-25851234', '13986765412', 'ecshop@ecshop.com', '中午', '法院', '', 5, '申通快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '385.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '400.00', 0, '0.00', '0.00', '0.00', 0, '本站', 1242142274, 1242142274, 1242142274, 1242142432, 0, 0, 0, '122', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(2, '2009051255518', 1, 4, 0, 0, '刘先生', 1, 2, 52, 500, '[中国 北京 北京 海淀区] 中关村海兴大厦', '100085', '010-25851234', '13986765412', 'ecshop@ecshop.com', '中午', '法院', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '精品包装', '祝福贺卡', '晚来的祝福', '', '', '960.00', '10.00', '0.00', '0.00', '0.00', '5.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 0, '本站', 1242142324, 1242142324, 1242142324, 1242142389, 1, 1, 0, '111', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(3, '2009051267570', 1, 4, 0, 0, '刘先生', 1, 2, 52, 500, '[中国 北京 北京 海淀区] 中关村海兴大厦', '100085', '010-25851234', '13986765412', 'ecshop@ecshop.com', '中午', '法院', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '2300.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 0, '本站', 1242142549, 1242142549, 1242142549, 1242142589, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(4, '2009051230249', 1, 1, 0, 2, '刘先生', 1, 2, 52, 500, '[中国 北京 北京 海淀区] 中关村海兴大厦', '100085', '010-25851234', '13986765412', 'ecshop@ecshop.com', '中午', '法院', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '5999.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5989.00', 0, '0.00', '20.00', '0.00', 0, '本站', 1242142681, 1242142681, 1242142681, 0, 0, 0, 1, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(5, '2009051276258', 1, 1, 3, 2, '刘先生', 1, 2, 52, 500, '[中国 北京 北京 海淀区] 中关村海兴大厦', '100085', '010-25851234', '13986765412', 'ecshop@ecshop.com', '中午', '法院', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '8600.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8610.00', 0, '0.00', '0.00', '0.00', 0, '本站', 1242142808, 1242142808, 1242142808, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(6, '2009051217221', 3, 3, 0, 0, '叶先生', 1, 2, 52, 510, '通州区旗舰凯旋小区', '', '13588104710', '', 'text@ecshop.com', '', '', '', 5, '申通快递', 2, '银行汇款/转帐', '等待所有商品备齐后再发', '', '', '', '', '', '', '20.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '35.00', 0, '', 1242143292, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(7, '2009051227085', 3, 1, 0, 0, '叶先生', 1, 2, 52, 510, '通州区旗舰凯旋小区', '', '13588104710', '', 'text@ecshop.com', '', '', '', 5, '申通快递', 2, '银行汇款/转帐', '等待所有商品备齐后再发', '', '', '', '', '', '', '2298.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1000.00', 0, '0.00', '0.00', '1198.10', 0, '', 1242143383, 1242143454, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '114.90'),
(8, '2009051299732', 3, 0, 0, 0, '叶先生', 1, 2, 52, 510, '通州区旗舰凯旋小区', '', '13588104710', '', 'text@ecshop.com', '', '', '', 5, '申通快递', 2, '银行汇款/转帐', '等待所有商品备齐后再发', '', '', '', '', '', '', '623.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '638.00', 0, '', 1242143444, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(9, '2009051210718', 3, 0, 0, 0, '叶先生', 1, 2, 52, 510, '通州区旗舰凯旋小区', '', '13588104710', '', 'text@ecshop.com', '', '', '', 5, '申通快递', 2, '银行汇款/转帐', '等待所有商品备齐后再发', '', '', '', '', '', '', '2000.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '2015.00', 0, '', 1242143732, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(10, '2009051268194', 1, 1, 0, 2, '刘先生', 1, 2, 52, 500, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '0.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10.00', 17000, '0.00', '0.00', '0.00', 0, '', 1242143920, 1242143920, 1242143920, 0, 0, 0, 0, '', 'exchange_goods', 24, '', '', 0, '', '0.00', 0, 0, '0.00'),
(11, '2009051264945', 0, 1, 0, 0, '林小姐', 1, 2, 52, 500, '中关村海兴大厦', '', '135474510', '', 'linzi@116.com', '', '', '', 3, '城际快递', 2, '银行汇款/转帐', '', '', '', '', '', '', '', '3800.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '3810.00', 0, '管理员添加', 1242144250, 1242144363, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(12, '2009051712919', 1, 2, 0, 0, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 3, '货到付款', '等待所有商品备齐后再发', '', '', '', '', '', '', '238.00', '10.00', '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '253.00', 0, '本站', 1242576304, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(13, '2009051719232', 1, 1, 1, 0, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 3, '货到付款', '等待所有商品备齐后再发', '', '', '', '', '', '', '960.00', '10.00', '0.00', '5.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '975.00', 0, '本站', 1242576341, 1242576445, 0, 1242576445, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(14, '2009052224892', 1, 1, 1, 2, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '14045.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '13806.60', 0, '0.00', '5.00', '0.00', 0, '本站', 1242976699, 1242976699, 1242976699, 1242976740, 0, 0, 2, '1123344', '', 0, '', '', 0, '', '0.00', 0, 0, '243.40'),
(15, '2009061585887', 1, 4, 0, 0, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 2, '银行汇款/转帐', '等待所有商品备齐后再发', '', '', '', '', '', '', '17044.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '17054.00', 0, '本站', 1245044533, 1245044587, 1245044644, 1245045443, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(16, '2009061525429', 1, 1, 4, 2, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '3186.30', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3196.30', 0, '0.00', '0.00', '0.00', 0, '本站', 1245045672, 1245045672, 1245045672, 1245045723, 0, 0, 0, '2009061525121', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(17, '2009061503335', 1, 4, 0, 0, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '1900.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '0.00', 0, '本站', 1245047978, 1245047978, 1245047978, 1245048189, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(18, '2009061510313', 1, 1, 0, 2, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '500.00', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '500.00', 0, '0.00', '0.00', '0.00', 0, '本站', 1245048585, 1245048585, 1245048585, 0, 0, 0, 0, '', 'group_buy', 8, '', '', 0, '', '0.00', 0, 0, '0.00'),
(19, '2009061909851', 1, 1, 1, 2, '刘先生', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', 'ecshop@ecshop.com', '', '', '', 3, '城际快递', 1, '余额支付', '等待所有商品备齐后再发', '', '', '', '', '', '', '5567.70', '10.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5577.70', 0, '0.00', '0.00', '0.00', 0, '本站', 1245384008, 1245384008, 1245384008, 1245384049, 0, 0, 0, '232421', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(20, '2015060446460', 6, 0, 0, 0, '周鸿', 1, 25, 321, 2707, '地址1', '223221', '13167001526', '13167001526', '136871204@qq.com', '', '', '', 5, '申通快递', 4, '<font color="#FF0000">支付宝</font>', '等待所有商品备齐后再发', '', '', '', '', '', '', '6600.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '6615.00', 0, '本站', 1433382833, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(21, '2015060431552', 6, 0, 0, 0, '周鸿', 1, 25, 321, 2707, '地址1', '223221', '13167001526', '13167001526', '136871204@qq.com', '', '', '', 5, '申通快递', 4, '<font color="#FF0000">支付宝</font>', '等待所有商品备齐后再发', '', '', '', '', '', '', '7400.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '7415.00', 0, '本站', 1433385524, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '0.00', 0, 0, '0.00'),
(30, '2016060253457', 11, 0, 0, 0, '周鸿', 1, 25, 321, 2703, '延安西路205室', '021523', '111111111', '13167001526', '1368712041@qq.com', '', '大楼', 'sdfsdfsdf\r\nsdfsdfsd', 5, '申通快递', 4, '支付宝', '', '', '精品包装', '祝福贺卡', '', 'sdfsdf', '1', '1910.00', '15.00', '0.00', '0.00', '5.00', '5.00', '0.00', '0.00', 2000, '20.00', '0.00', '1934.10', 0, '来自本站', 1464821010, 0, 0, 0, 1, 1, 0, '', '', 0, '', '', 6, '1', '19.10', 0, 0, '0.00'),
(31, '2016060244931', 11, 0, 0, 0, '周鸿', 1, 25, 321, 2703, '延安西路205室', '021523', '111111111', '13167001526', '1368712041@qq.com', '', '大楼', 'sdfsdf\r\nsdfsdfsdf', 5, '申通快递', 4, '支付宝', '', '', '精品包装', '祝福贺卡', '', 'sdfsdf', '0', '1910.00', '15.00', '0.00', '0.00', '5.00', '5.00', '0.00', '0.00', 2000, '20.00', '0.00', '1934.10', 0, '来自本站', 1464821135, 0, 0, 0, 1, 1, 0, '', '', 0, '', '', 6, '1', '19.10', 0, 0, '0.00'),
(32, '2016060244759', 11, 0, 0, 0, '周鸿', 1, 25, 321, 2703, '延安西路205室', '021523', '111111111', '13167001526', '1368712041@qq.com', '', '大楼', '', 5, '申通快递', 4, '支付宝', '', '', '', '', '', '', '', '3700.00', '15.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '3530.00', 0, '来自本站', 1464821225, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 6, '', '0.00', 0, 0, '185.00'),
(33, '2016082683212', 13, 0, 0, 0, '周鸿', 1, 25, 321, 2707, '南曹路901弄154号602室1', '201102', '11111111', '13167001526', 'ectest1@qq.com', '双休日上午', '学校', '', 11, '上门取货', 3, '货到付款', '', '', '', '', '', '', '0', '1299.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', '1311.99', 0, '来自本站', 1472171478, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 6, '1', '12.99', 0, 0, '0.00');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_pack`
--

CREATE TABLE IF NOT EXISTS `zh_ec_pack` (
  `pack_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '包装配置的自增id',
  `pack_name` varchar(120) NOT NULL COMMENT '包装的名称',
  `pack_img` varchar(255) NOT NULL COMMENT '包装图纸',
  `pack_fee` decimal(6,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '包装的费用',
  `free_money` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '订单达到此金额可以免除该包装费用',
  `pack_desc` varchar(255) NOT NULL COMMENT '包装描述',
  PRIMARY KEY (`pack_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_pack`
--

INSERT INTO `zh_ec_pack` (`pack_id`, `pack_name`, `pack_img`, `pack_fee`, `free_money`, `pack_desc`) VALUES
(1, '精品包装', '1242108360911825791.jpg', '5.00', 10000, '精品包装，尽心为您设计一份不一样的礼物');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_package_goods`
--

CREATE TABLE IF NOT EXISTS `zh_ec_package_goods` (
  `package_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1',
  `admin_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`package_id`,`goods_id`,`admin_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_ec_package_goods`
--

INSERT INTO `zh_ec_package_goods` (`package_id`, `goods_id`, `product_id`, `goods_number`, `admin_id`) VALUES
(5, 6, 0, 1, 1),
(5, 5, 0, 1, 1),
(6, 4, 0, 1, 1),
(6, 7, 0, 1, 1),
(6, 32, 0, 1, 1),
(5, 31, 0, 1, 1),
(23, 3, 0, 1, 1),
(23, 4, 0, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_payment`
--

CREATE TABLE IF NOT EXISTS `zh_ec_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '已安装的支付方式自增id',
  `pay_code` varchar(20) NOT NULL COMMENT '支付方式的英文缩写，其实就是该支付方式处理插件的不带后缀的文件名部分',
  `pay_name` varchar(120) NOT NULL COMMENT '支付方式名称',
  `pay_fee` varchar(10) NOT NULL DEFAULT '0' COMMENT '支付费用',
  `pay_desc` text NOT NULL COMMENT '支付方式描述',
  `pay_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '支付方式在页面的显示顺序',
  `pay_config` text NOT NULL COMMENT '支付方式的配置信息，包括商户号和密钥什么的',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否可用，0，否；1，是',
  `is_cod` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否货到付款，0，否；1，是',
  `is_online` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否在线支付，0，否；1，是',
  PRIMARY KEY (`pay_id`),
  UNIQUE KEY `pay_code` (`pay_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- テーブルのデータのダンプ `zh_ec_payment`
--

INSERT INTO `zh_ec_payment` (`pay_id`, `pay_code`, `pay_name`, `pay_fee`, `pay_desc`, `pay_order`, `pay_config`, `enabled`, `is_cod`, `is_online`) VALUES
(1, 'balance', '余额支付', '0', '使用帐户余额支付。只有会员才能使用，通过设置信用额度，可以透支。', 0, 'a:0:{}', 1, 0, 1),
(2, 'bank', '银行汇款/转帐', '0', '银行名称\n收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。\n注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。', 0, 'a:0:{}', 0, 0, 0),
(3, 'cod', '货到付款', '0', '开通城市：×××\n货到付款区域：×××', 0, 'a:0:{}', 1, 1, 0),
(4, 'alipay', '<font color="#FF0000">支付宝</font>', '0', '支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br/>支付宝收款接口：在线即可开通，<font color="red"><b>零预付，免年费</b></font>，单笔阶梯费率，无流量限制。<br/><a href="http://cloud.ecshop.com/payment_apply.php?mod=alipay" target="_blank"><font color="red">立即在线申请</font></a>', 0, 'a:4:{i:0;a:3:{s:4:"name";s:14:"alipay_account";s:4:"type";s:4:"text";s:5:"value";s:0:"";}i:1;a:3:{s:4:"name";s:10:"alipay_key";s:4:"type";s:4:"text";s:5:"value";s:0:"";}i:2;a:3:{s:4:"name";s:14:"alipay_partner";s:4:"type";s:4:"text";s:5:"value";s:0:"";}i:3;a:3:{s:4:"name";s:17:"alipay_pay_method";s:4:"type";s:6:"select";s:5:"value";s:1:"0";}}', 0, 0, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_pay_log`
--

CREATE TABLE IF NOT EXISTS `zh_ec_pay_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `order_amount` decimal(10,2) unsigned NOT NULL,
  `order_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- テーブルのデータのダンプ `zh_ec_pay_log`
--

INSERT INTO `zh_ec_pay_log` (`log_id`, `order_id`, `order_amount`, `order_type`, `is_paid`) VALUES
(1, 1, '0.00', 0, 0),
(2, 2, '0.00', 0, 0),
(3, 3, '0.00', 0, 0),
(4, 4, '0.00', 0, 0),
(5, 5, '0.00', 0, 0),
(6, 6, '35.00', 0, 0),
(7, 7, '2198.10', 0, 0),
(8, 8, '638.00', 0, 0),
(9, 9, '2015.00', 0, 0),
(10, 10, '0.00', 0, 0),
(11, 11, '3810.00', 0, 0),
(12, 12, '253.00', 0, 0),
(13, 13, '975.00', 0, 0),
(14, 14, '0.00', 0, 0),
(15, 15, '17054.00', 0, 0),
(16, 16, '0.00', 0, 0),
(17, 17, '0.00', 0, 0),
(18, 18, '0.00', 0, 0),
(19, 20, '6615.00', 0, 0),
(20, 21, '7415.00', 0, 0),
(21, 22, '0.00', 0, 0),
(22, 23, '3715.00', 0, 0),
(23, 29, '1932.10', 0, 0),
(24, 30, '1934.10', 0, 0),
(25, 31, '1934.10', 0, 0),
(26, 32, '3530.00', 0, 0),
(27, 33, '1311.99', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_products`
--

CREATE TABLE IF NOT EXISTS `zh_ec_products` (
  `product_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_attr` varchar(50) DEFAULT NULL,
  `product_sn` varchar(60) DEFAULT NULL,
  `product_number` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_region`
--

CREATE TABLE IF NOT EXISTS `zh_ec_region` (
  `region_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `region_name` varchar(120) NOT NULL DEFAULT '',
  `region_type` tinyint(1) NOT NULL DEFAULT '2',
  `agency_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`region_id`),
  KEY `parent_id` (`parent_id`),
  KEY `region_type` (`region_type`),
  KEY `agency_id` (`agency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='地区列表' AUTO_INCREMENT=3420 ;

--
-- テーブルのデータのダンプ `zh_ec_region`
--

INSERT INTO `zh_ec_region` (`region_id`, `parent_id`, `region_name`, `region_type`, `agency_id`) VALUES
(1, 0, '中国', 0, 0),
(2, 1, '北京', 1, 0),
(3, 1, '安徽', 1, 0),
(4, 1, '福建', 1, 0),
(5, 1, '甘肃', 1, 0),
(6, 1, '广东', 1, 0),
(7, 1, '广西', 1, 0),
(8, 1, '贵州', 1, 0),
(9, 1, '海南', 1, 0),
(10, 1, '河北', 1, 0),
(11, 1, '河南', 1, 0),
(12, 1, '黑龙江', 1, 0),
(13, 1, '湖北', 1, 0),
(14, 1, '湖南', 1, 0),
(15, 1, '吉林', 1, 0),
(16, 1, '江苏', 1, 0),
(17, 1, '江西', 1, 0),
(18, 1, '辽宁', 1, 0),
(19, 1, '内蒙古', 1, 0),
(20, 1, '宁夏', 1, 0),
(21, 1, '青海', 1, 0),
(22, 1, '山东', 1, 0),
(23, 1, '山西', 1, 0),
(24, 1, '陕西', 1, 0),
(25, 1, '上海', 1, 0),
(26, 1, '四川', 1, 0),
(27, 1, '天津', 1, 0),
(28, 1, '西藏', 1, 0),
(29, 1, '新疆', 1, 0),
(30, 1, '云南', 1, 0),
(31, 1, '浙江', 1, 0),
(32, 1, '重庆', 1, 0),
(33, 1, '香港', 1, 0),
(34, 1, '澳门', 1, 0),
(35, 1, '台湾', 1, 0),
(36, 3, '安庆', 2, 0),
(37, 3, '蚌埠', 2, 0),
(38, 3, '巢湖', 2, 0),
(39, 3, '池州', 2, 0),
(40, 3, '滁州', 2, 0),
(41, 3, '阜阳', 2, 0),
(42, 3, '淮北', 2, 0),
(43, 3, '淮南', 2, 0),
(44, 3, '黄山', 2, 0),
(45, 3, '六安', 2, 0),
(46, 3, '马鞍山', 2, 0),
(47, 3, '宿州', 2, 0),
(48, 3, '铜陵', 2, 0),
(49, 3, '芜湖', 2, 0),
(50, 3, '宣城', 2, 0),
(51, 3, '亳州', 2, 0),
(52, 2, '北京', 2, 0),
(53, 4, '福州', 2, 0),
(54, 4, '龙岩', 2, 0),
(55, 4, '南平', 2, 0),
(56, 4, '宁德', 2, 0),
(57, 4, '莆田', 2, 0),
(58, 4, '泉州', 2, 0),
(59, 4, '三明', 2, 0),
(60, 4, '厦门', 2, 0),
(61, 4, '漳州', 2, 0),
(62, 5, '兰州', 2, 0),
(63, 5, '白银', 2, 0),
(64, 5, '定西', 2, 0),
(65, 5, '甘南', 2, 0),
(66, 5, '嘉峪关', 2, 0),
(67, 5, '金昌', 2, 0),
(68, 5, '酒泉', 2, 0),
(69, 5, '临夏', 2, 0),
(70, 5, '陇南', 2, 0),
(71, 5, '平凉', 2, 0),
(72, 5, '庆阳', 2, 0),
(73, 5, '天水', 2, 0),
(74, 5, '武威', 2, 0),
(75, 5, '张掖', 2, 0),
(76, 6, '广州', 2, 0),
(77, 6, '深圳', 2, 0),
(78, 6, '潮州', 2, 0),
(79, 6, '东莞', 2, 0),
(80, 6, '佛山', 2, 0),
(81, 6, '河源', 2, 0),
(82, 6, '惠州', 2, 0),
(83, 6, '江门', 2, 0),
(84, 6, '揭阳', 2, 0),
(85, 6, '茂名', 2, 0),
(86, 6, '梅州', 2, 0),
(87, 6, '清远', 2, 0),
(88, 6, '汕头', 2, 0),
(89, 6, '汕尾', 2, 0),
(90, 6, '韶关', 2, 0),
(91, 6, '阳江', 2, 0),
(92, 6, '云浮', 2, 0),
(93, 6, '湛江', 2, 0),
(94, 6, '肇庆', 2, 0),
(95, 6, '中山', 2, 0),
(96, 6, '珠海', 2, 0),
(97, 7, '南宁', 2, 0),
(98, 7, '桂林', 2, 0),
(99, 7, '百色', 2, 0),
(100, 7, '北海', 2, 0),
(101, 7, '崇左', 2, 0),
(102, 7, '防城港', 2, 0),
(103, 7, '贵港', 2, 0),
(104, 7, '河池', 2, 0),
(105, 7, '贺州', 2, 0),
(106, 7, '来宾', 2, 0),
(107, 7, '柳州', 2, 0),
(108, 7, '钦州', 2, 0),
(109, 7, '梧州', 2, 0),
(110, 7, '玉林', 2, 0),
(111, 8, '贵阳', 2, 0),
(112, 8, '安顺', 2, 0),
(113, 8, '毕节', 2, 0),
(114, 8, '六盘水', 2, 0),
(115, 8, '黔东南', 2, 0),
(116, 8, '黔南', 2, 0),
(117, 8, '黔西南', 2, 0),
(118, 8, '铜仁', 2, 0),
(119, 8, '遵义', 2, 0),
(120, 9, '海口', 2, 0),
(121, 9, '三亚', 2, 0),
(122, 9, '白沙', 2, 0),
(123, 9, '保亭', 2, 0),
(124, 9, '昌江', 2, 0),
(125, 9, '澄迈县', 2, 0),
(126, 9, '定安县', 2, 0),
(127, 9, '东方', 2, 0),
(128, 9, '乐东', 2, 0),
(129, 9, '临高县', 2, 0),
(130, 9, '陵水', 2, 0),
(131, 9, '琼海', 2, 0),
(132, 9, '琼中', 2, 0),
(133, 9, '屯昌县', 2, 0),
(134, 9, '万宁', 2, 0),
(135, 9, '文昌', 2, 0),
(136, 9, '五指山', 2, 0),
(137, 9, '儋州', 2, 0),
(138, 10, '石家庄', 2, 0),
(139, 10, '保定', 2, 0),
(140, 10, '沧州', 2, 0),
(141, 10, '承德', 2, 0),
(142, 10, '邯郸', 2, 0),
(143, 10, '衡水', 2, 0),
(144, 10, '廊坊', 2, 0),
(145, 10, '秦皇岛', 2, 0),
(146, 10, '唐山', 2, 0),
(147, 10, '邢台', 2, 0),
(148, 10, '张家口', 2, 0),
(149, 11, '郑州', 2, 0),
(150, 11, '洛阳', 2, 0),
(151, 11, '开封', 2, 0),
(152, 11, '安阳', 2, 0),
(153, 11, '鹤壁', 2, 0),
(154, 11, '济源', 2, 0),
(155, 11, '焦作', 2, 0),
(156, 11, '南阳', 2, 0),
(157, 11, '平顶山', 2, 0),
(158, 11, '三门峡', 2, 0),
(159, 11, '商丘', 2, 0),
(160, 11, '新乡', 2, 0),
(161, 11, '信阳', 2, 0),
(162, 11, '许昌', 2, 0),
(163, 11, '周口', 2, 0),
(164, 11, '驻马店', 2, 0),
(165, 11, '漯河', 2, 0),
(166, 11, '濮阳', 2, 0),
(167, 12, '哈尔滨', 2, 0),
(168, 12, '大庆', 2, 0),
(169, 12, '大兴安岭', 2, 0),
(170, 12, '鹤岗', 2, 0),
(171, 12, '黑河', 2, 0),
(172, 12, '鸡西', 2, 0),
(173, 12, '佳木斯', 2, 0),
(174, 12, '牡丹江', 2, 0),
(175, 12, '七台河', 2, 0),
(176, 12, '齐齐哈尔', 2, 0),
(177, 12, '双鸭山', 2, 0),
(178, 12, '绥化', 2, 0),
(179, 12, '伊春', 2, 0),
(180, 13, '武汉', 2, 0),
(181, 13, '仙桃', 2, 0),
(182, 13, '鄂州', 2, 0),
(183, 13, '黄冈', 2, 0),
(184, 13, '黄石', 2, 0),
(185, 13, '荆门', 2, 0),
(186, 13, '荆州', 2, 0),
(187, 13, '潜江', 2, 0),
(188, 13, '神农架林区', 2, 0),
(189, 13, '十堰', 2, 0),
(190, 13, '随州', 2, 0),
(191, 13, '天门', 2, 0),
(192, 13, '咸宁', 2, 0),
(193, 13, '襄樊', 2, 0),
(194, 13, '孝感', 2, 0),
(195, 13, '宜昌', 2, 0),
(196, 13, '恩施', 2, 0),
(197, 14, '长沙', 2, 0),
(198, 14, '张家界', 2, 0),
(199, 14, '常德', 2, 0),
(200, 14, '郴州', 2, 0),
(201, 14, '衡阳', 2, 0),
(202, 14, '怀化', 2, 0),
(203, 14, '娄底', 2, 0),
(204, 14, '邵阳', 2, 0),
(205, 14, '湘潭', 2, 0),
(206, 14, '湘西', 2, 0),
(207, 14, '益阳', 2, 0),
(208, 14, '永州', 2, 0),
(209, 14, '岳阳', 2, 0),
(210, 14, '株洲', 2, 0),
(211, 15, '长春', 2, 0),
(212, 15, '吉林', 2, 0),
(213, 15, '白城', 2, 0),
(214, 15, '白山', 2, 0),
(215, 15, '辽源', 2, 0),
(216, 15, '四平', 2, 0),
(217, 15, '松原', 2, 0),
(218, 15, '通化', 2, 0),
(219, 15, '延边', 2, 0),
(220, 16, '南京', 2, 0),
(221, 16, '苏州', 2, 0),
(222, 16, '无锡', 2, 0),
(223, 16, '常州', 2, 0),
(224, 16, '淮安', 2, 0),
(225, 16, '连云港', 2, 0),
(226, 16, '南通', 2, 0),
(227, 16, '宿迁', 2, 0),
(228, 16, '泰州', 2, 0),
(229, 16, '徐州', 2, 0),
(230, 16, '盐城', 2, 0),
(231, 16, '扬州', 2, 0),
(232, 16, '镇江', 2, 0),
(233, 17, '南昌', 2, 0),
(234, 17, '抚州', 2, 0),
(235, 17, '赣州', 2, 0),
(236, 17, '吉安', 2, 0),
(237, 17, '景德镇', 2, 0),
(238, 17, '九江', 2, 0),
(239, 17, '萍乡', 2, 0),
(240, 17, '上饶', 2, 0),
(241, 17, '新余', 2, 0),
(242, 17, '宜春', 2, 0),
(243, 17, '鹰潭', 2, 0),
(244, 18, '沈阳', 2, 0),
(245, 18, '大连', 2, 0),
(246, 18, '鞍山', 2, 0),
(247, 18, '本溪', 2, 0),
(248, 18, '朝阳', 2, 0),
(249, 18, '丹东', 2, 0),
(250, 18, '抚顺', 2, 0),
(251, 18, '阜新', 2, 0),
(252, 18, '葫芦岛', 2, 0),
(253, 18, '锦州', 2, 0),
(254, 18, '辽阳', 2, 0),
(255, 18, '盘锦', 2, 0),
(256, 18, '铁岭', 2, 0),
(257, 18, '营口', 2, 0),
(258, 19, '呼和浩特', 2, 0),
(259, 19, '阿拉善盟', 2, 0),
(260, 19, '巴彦淖尔盟', 2, 0),
(261, 19, '包头', 2, 0),
(262, 19, '赤峰', 2, 0),
(263, 19, '鄂尔多斯', 2, 0),
(264, 19, '呼伦贝尔', 2, 0),
(265, 19, '通辽', 2, 0),
(266, 19, '乌海', 2, 0),
(267, 19, '乌兰察布市', 2, 0),
(268, 19, '锡林郭勒盟', 2, 0),
(269, 19, '兴安盟', 2, 0),
(270, 20, '银川', 2, 0),
(271, 20, '固原', 2, 0),
(272, 20, '石嘴山', 2, 0),
(273, 20, '吴忠', 2, 0),
(274, 20, '中卫', 2, 0),
(275, 21, '西宁', 2, 0),
(276, 21, '果洛', 2, 0),
(277, 21, '海北', 2, 0),
(278, 21, '海东', 2, 0),
(279, 21, '海南', 2, 0),
(280, 21, '海西', 2, 0),
(281, 21, '黄南', 2, 0),
(282, 21, '玉树', 2, 0),
(283, 22, '济南', 2, 0),
(284, 22, '青岛', 2, 0),
(285, 22, '滨州', 2, 0),
(286, 22, '德州', 2, 0),
(287, 22, '东营', 2, 0),
(288, 22, '菏泽', 2, 0),
(289, 22, '济宁', 2, 0),
(290, 22, '莱芜', 2, 0),
(291, 22, '聊城', 2, 0),
(292, 22, '临沂', 2, 0),
(293, 22, '日照', 2, 0),
(294, 22, '泰安', 2, 0),
(295, 22, '威海', 2, 0),
(296, 22, '潍坊', 2, 0),
(297, 22, '烟台', 2, 0),
(298, 22, '枣庄', 2, 0),
(299, 22, '淄博', 2, 0),
(300, 23, '太原', 2, 0),
(301, 23, '长治', 2, 0),
(302, 23, '大同', 2, 0),
(303, 23, '晋城', 2, 0),
(304, 23, '晋中', 2, 0),
(305, 23, '临汾', 2, 0),
(306, 23, '吕梁', 2, 0),
(307, 23, '朔州', 2, 0),
(308, 23, '忻州', 2, 0),
(309, 23, '阳泉', 2, 0),
(310, 23, '运城', 2, 0),
(311, 24, '西安', 2, 0),
(312, 24, '安康', 2, 0),
(313, 24, '宝鸡', 2, 0),
(314, 24, '汉中', 2, 0),
(315, 24, '商洛', 2, 0),
(316, 24, '铜川', 2, 0),
(317, 24, '渭南', 2, 0),
(318, 24, '咸阳', 2, 0),
(319, 24, '延安', 2, 0),
(320, 24, '榆林', 2, 0),
(321, 25, '上海', 2, 6),
(322, 26, '成都', 2, 0),
(323, 26, '绵阳', 2, 0),
(324, 26, '阿坝', 2, 0),
(325, 26, '巴中', 2, 0),
(326, 26, '达州', 2, 0),
(327, 26, '德阳', 2, 0),
(328, 26, '甘孜', 2, 0),
(329, 26, '广安', 2, 0),
(330, 26, '广元', 2, 0),
(331, 26, '乐山', 2, 0),
(332, 26, '凉山', 2, 0),
(333, 26, '眉山', 2, 0),
(334, 26, '南充', 2, 0),
(335, 26, '内江', 2, 0),
(336, 26, '攀枝花', 2, 0),
(337, 26, '遂宁', 2, 0),
(338, 26, '雅安', 2, 0),
(339, 26, '宜宾', 2, 0),
(340, 26, '资阳', 2, 0),
(341, 26, '自贡', 2, 0),
(342, 26, '泸州', 2, 0),
(343, 27, '天津', 2, 0),
(344, 28, '拉萨', 2, 0),
(345, 28, '阿里', 2, 0),
(346, 28, '昌都', 2, 0),
(347, 28, '林芝', 2, 0),
(348, 28, '那曲', 2, 0),
(349, 28, '日喀则', 2, 0),
(350, 28, '山南', 2, 0),
(351, 29, '乌鲁木齐', 2, 0),
(352, 29, '阿克苏', 2, 0),
(353, 29, '阿拉尔', 2, 0),
(354, 29, '巴音郭楞', 2, 0),
(355, 29, '博尔塔拉', 2, 0),
(356, 29, '昌吉', 2, 0),
(357, 29, '哈密', 2, 0),
(358, 29, '和田', 2, 0),
(359, 29, '喀什', 2, 0),
(360, 29, '克拉玛依', 2, 0),
(361, 29, '克孜勒苏', 2, 0),
(362, 29, '石河子', 2, 0),
(363, 29, '图木舒克', 2, 0),
(364, 29, '吐鲁番', 2, 0),
(365, 29, '五家渠', 2, 0),
(366, 29, '伊犁', 2, 0),
(367, 30, '昆明', 2, 0),
(368, 30, '怒江', 2, 0),
(369, 30, '普洱', 2, 0),
(370, 30, '丽江', 2, 0),
(371, 30, '保山', 2, 0),
(372, 30, '楚雄', 2, 0),
(373, 30, '大理', 2, 0),
(374, 30, '德宏', 2, 0),
(375, 30, '迪庆', 2, 0),
(376, 30, '红河', 2, 0),
(377, 30, '临沧', 2, 0),
(378, 30, '曲靖', 2, 0),
(379, 30, '文山', 2, 0),
(380, 30, '西双版纳', 2, 0),
(381, 30, '玉溪', 2, 0),
(382, 30, '昭通', 2, 0),
(383, 31, '杭州', 2, 0),
(384, 31, '湖州', 2, 0),
(385, 31, '嘉兴', 2, 0),
(386, 31, '金华', 2, 0),
(387, 31, '丽水', 2, 0),
(388, 31, '宁波', 2, 0),
(389, 31, '绍兴', 2, 0),
(390, 31, '台州', 2, 0),
(391, 31, '温州', 2, 0),
(392, 31, '舟山', 2, 0),
(393, 31, '衢州', 2, 0),
(394, 32, '重庆', 2, 0),
(395, 33, '香港', 2, 0),
(396, 34, '澳门', 2, 0),
(397, 35, '台湾', 2, 0),
(398, 36, '迎江区', 3, 0),
(399, 36, '大观区', 3, 0),
(400, 36, '宜秀区', 3, 0),
(401, 36, '桐城市', 3, 0),
(402, 36, '怀宁县', 3, 0),
(403, 36, '枞阳县', 3, 0),
(404, 36, '潜山县', 3, 0),
(405, 36, '太湖县', 3, 0),
(406, 36, '宿松县', 3, 0),
(407, 36, '望江县', 3, 0),
(408, 36, '岳西县', 3, 0),
(409, 37, '中市区', 3, 0),
(410, 37, '东市区', 3, 0),
(411, 37, '西市区', 3, 0),
(412, 37, '郊区', 3, 0),
(413, 37, '怀远县', 3, 0),
(414, 37, '五河县', 3, 0),
(415, 37, '固镇县', 3, 0),
(416, 38, '居巢区', 3, 0),
(417, 38, '庐江县', 3, 0),
(418, 38, '无为县', 3, 0),
(419, 38, '含山县', 3, 0),
(420, 38, '和县', 3, 0),
(421, 39, '贵池区', 3, 0),
(422, 39, '东至县', 3, 0),
(423, 39, '石台县', 3, 0),
(424, 39, '青阳县', 3, 0),
(425, 40, '琅琊区', 3, 0),
(426, 40, '南谯区', 3, 0),
(427, 40, '天长市', 3, 0),
(428, 40, '明光市', 3, 0),
(429, 40, '来安县', 3, 0),
(430, 40, '全椒县', 3, 0),
(431, 40, '定远县', 3, 0),
(432, 40, '凤阳县', 3, 0),
(433, 41, '蚌山区', 3, 0),
(434, 41, '龙子湖区', 3, 0),
(435, 41, '禹会区', 3, 0),
(436, 41, '淮上区', 3, 0),
(437, 41, '颍州区', 3, 0),
(438, 41, '颍东区', 3, 0),
(439, 41, '颍泉区', 3, 0),
(440, 41, '界首市', 3, 0),
(441, 41, '临泉县', 3, 0),
(442, 41, '太和县', 3, 0),
(443, 41, '阜南县', 3, 0),
(444, 41, '颖上县', 3, 0),
(445, 42, '相山区', 3, 0),
(446, 42, '杜集区', 3, 0),
(447, 42, '烈山区', 3, 0),
(448, 42, '濉溪县', 3, 0),
(449, 43, '田家庵区', 3, 0),
(450, 43, '大通区', 3, 0),
(451, 43, '谢家集区', 3, 0),
(452, 43, '八公山区', 3, 0),
(453, 43, '潘集区', 3, 0),
(454, 43, '凤台县', 3, 0),
(455, 44, '屯溪区', 3, 0),
(456, 44, '黄山区', 3, 0),
(457, 44, '徽州区', 3, 0),
(458, 44, '歙县', 3, 0),
(459, 44, '休宁县', 3, 0),
(460, 44, '黟县', 3, 0),
(461, 44, '祁门县', 3, 0),
(462, 45, '金安区', 3, 0),
(463, 45, '裕安区', 3, 0),
(464, 45, '寿县', 3, 0),
(465, 45, '霍邱县', 3, 0),
(466, 45, '舒城县', 3, 0),
(467, 45, '金寨县', 3, 0),
(468, 45, '霍山县', 3, 0),
(469, 46, '雨山区', 3, 0),
(470, 46, '花山区', 3, 0),
(471, 46, '金家庄区', 3, 0),
(472, 46, '当涂县', 3, 0),
(473, 47, '埇桥区', 3, 0),
(474, 47, '砀山县', 3, 0),
(475, 47, '萧县', 3, 0),
(476, 47, '灵璧县', 3, 0),
(477, 47, '泗县', 3, 0),
(478, 48, '铜官山区', 3, 0),
(479, 48, '狮子山区', 3, 0),
(480, 48, '郊区', 3, 0),
(481, 48, '铜陵县', 3, 0),
(482, 49, '镜湖区', 3, 0),
(483, 49, '弋江区', 3, 0),
(484, 49, '鸠江区', 3, 0),
(485, 49, '三山区', 3, 0),
(486, 49, '芜湖县', 3, 0),
(487, 49, '繁昌县', 3, 0),
(488, 49, '南陵县', 3, 0),
(489, 50, '宣州区', 3, 0),
(490, 50, '宁国市', 3, 0),
(491, 50, '郎溪县', 3, 0),
(492, 50, '广德县', 3, 0),
(493, 50, '泾县', 3, 0),
(494, 50, '绩溪县', 3, 0),
(495, 50, '旌德县', 3, 0),
(496, 51, '涡阳县', 3, 0),
(497, 51, '蒙城县', 3, 0),
(498, 51, '利辛县', 3, 0),
(499, 51, '谯城区', 3, 0),
(500, 52, '东城区', 3, 0),
(501, 52, '西城区', 3, 0),
(502, 52, '海淀区', 3, 0),
(503, 52, '朝阳区', 3, 0),
(504, 52, '崇文区', 3, 0),
(505, 52, '宣武区', 3, 0),
(506, 52, '丰台区', 3, 0),
(507, 52, '石景山区', 3, 0),
(508, 52, '房山区', 3, 0),
(509, 52, '门头沟区', 3, 0),
(510, 52, '通州区', 3, 0),
(511, 52, '顺义区', 3, 0),
(512, 52, '昌平区', 3, 0),
(513, 52, '怀柔区', 3, 0),
(514, 52, '平谷区', 3, 0),
(515, 52, '大兴区', 3, 0),
(516, 52, '密云县', 3, 0),
(517, 52, '延庆县', 3, 0),
(518, 53, '鼓楼区', 3, 0),
(519, 53, '台江区', 3, 0),
(520, 53, '仓山区', 3, 0),
(521, 53, '马尾区', 3, 0),
(522, 53, '晋安区', 3, 0),
(523, 53, '福清市', 3, 0),
(524, 53, '长乐市', 3, 0),
(525, 53, '闽侯县', 3, 0),
(526, 53, '连江县', 3, 0),
(527, 53, '罗源县', 3, 0),
(528, 53, '闽清县', 3, 0),
(529, 53, '永泰县', 3, 0),
(530, 53, '平潭县', 3, 0),
(531, 54, '新罗区', 3, 0),
(532, 54, '漳平市', 3, 0),
(533, 54, '长汀县', 3, 0),
(534, 54, '永定县', 3, 0),
(535, 54, '上杭县', 3, 0),
(536, 54, '武平县', 3, 0),
(537, 54, '连城县', 3, 0),
(538, 55, '延平区', 3, 0),
(539, 55, '邵武市', 3, 0),
(540, 55, '武夷山市', 3, 0),
(541, 55, '建瓯市', 3, 0),
(542, 55, '建阳市', 3, 0),
(543, 55, '顺昌县', 3, 0),
(544, 55, '浦城县', 3, 0),
(545, 55, '光泽县', 3, 0),
(546, 55, '松溪县', 3, 0),
(547, 55, '政和县', 3, 0),
(548, 56, '蕉城区', 3, 0),
(549, 56, '福安市', 3, 0),
(550, 56, '福鼎市', 3, 0),
(551, 56, '霞浦县', 3, 0),
(552, 56, '古田县', 3, 0),
(553, 56, '屏南县', 3, 0),
(554, 56, '寿宁县', 3, 0),
(555, 56, '周宁县', 3, 0),
(556, 56, '柘荣县', 3, 0),
(557, 57, '城厢区', 3, 0),
(558, 57, '涵江区', 3, 0),
(559, 57, '荔城区', 3, 0),
(560, 57, '秀屿区', 3, 0),
(561, 57, '仙游县', 3, 0),
(562, 58, '鲤城区', 3, 0),
(563, 58, '丰泽区', 3, 0),
(564, 58, '洛江区', 3, 0),
(565, 58, '清濛开发区', 3, 0),
(566, 58, '泉港区', 3, 0),
(567, 58, '石狮市', 3, 0),
(568, 58, '晋江市', 3, 0),
(569, 58, '南安市', 3, 0),
(570, 58, '惠安县', 3, 0),
(571, 58, '安溪县', 3, 0),
(572, 58, '永春县', 3, 0),
(573, 58, '德化县', 3, 0),
(574, 58, '金门县', 3, 0),
(575, 59, '梅列区', 3, 0),
(576, 59, '三元区', 3, 0),
(577, 59, '永安市', 3, 0),
(578, 59, '明溪县', 3, 0),
(579, 59, '清流县', 3, 0),
(580, 59, '宁化县', 3, 0),
(581, 59, '大田县', 3, 0),
(582, 59, '尤溪县', 3, 0),
(583, 59, '沙县', 3, 0),
(584, 59, '将乐县', 3, 0),
(585, 59, '泰宁县', 3, 0),
(586, 59, '建宁县', 3, 0),
(587, 60, '思明区', 3, 0),
(588, 60, '海沧区', 3, 0),
(589, 60, '湖里区', 3, 0),
(590, 60, '集美区', 3, 0),
(591, 60, '同安区', 3, 0),
(592, 60, '翔安区', 3, 0),
(593, 61, '芗城区', 3, 0),
(594, 61, '龙文区', 3, 0),
(595, 61, '龙海市', 3, 0),
(596, 61, '云霄县', 3, 0),
(597, 61, '漳浦县', 3, 0),
(598, 61, '诏安县', 3, 0),
(599, 61, '长泰县', 3, 0),
(600, 61, '东山县', 3, 0),
(601, 61, '南靖县', 3, 0),
(602, 61, '平和县', 3, 0),
(603, 61, '华安县', 3, 0),
(604, 62, '皋兰县', 3, 0),
(605, 62, '城关区', 3, 0),
(606, 62, '七里河区', 3, 0),
(607, 62, '西固区', 3, 0),
(608, 62, '安宁区', 3, 0),
(609, 62, '红古区', 3, 0),
(610, 62, '永登县', 3, 0),
(611, 62, '榆中县', 3, 0),
(612, 63, '白银区', 3, 0),
(613, 63, '平川区', 3, 0),
(614, 63, '会宁县', 3, 0),
(615, 63, '景泰县', 3, 0),
(616, 63, '靖远县', 3, 0),
(617, 64, '临洮县', 3, 0),
(618, 64, '陇西县', 3, 0),
(619, 64, '通渭县', 3, 0),
(620, 64, '渭源县', 3, 0),
(621, 64, '漳县', 3, 0),
(622, 64, '岷县', 3, 0),
(623, 64, '安定区', 3, 0),
(624, 64, '安定区', 3, 0),
(625, 65, '合作市', 3, 0),
(626, 65, '临潭县', 3, 0),
(627, 65, '卓尼县', 3, 0),
(628, 65, '舟曲县', 3, 0),
(629, 65, '迭部县', 3, 0),
(630, 65, '玛曲县', 3, 0),
(631, 65, '碌曲县', 3, 0),
(632, 65, '夏河县', 3, 0),
(633, 66, '嘉峪关市', 3, 0),
(634, 67, '金川区', 3, 0),
(635, 67, '永昌县', 3, 0),
(636, 68, '肃州区', 3, 0),
(637, 68, '玉门市', 3, 0),
(638, 68, '敦煌市', 3, 0),
(639, 68, '金塔县', 3, 0),
(640, 68, '瓜州县', 3, 0),
(641, 68, '肃北', 3, 0),
(642, 68, '阿克塞', 3, 0),
(643, 69, '临夏市', 3, 0),
(644, 69, '临夏县', 3, 0),
(645, 69, '康乐县', 3, 0),
(646, 69, '永靖县', 3, 0),
(647, 69, '广河县', 3, 0),
(648, 69, '和政县', 3, 0),
(649, 69, '东乡族自治县', 3, 0),
(650, 69, '积石山', 3, 0),
(651, 70, '成县', 3, 0),
(652, 70, '徽县', 3, 0),
(653, 70, '康县', 3, 0),
(654, 70, '礼县', 3, 0),
(655, 70, '两当县', 3, 0),
(656, 70, '文县', 3, 0),
(657, 70, '西和县', 3, 0),
(658, 70, '宕昌县', 3, 0),
(659, 70, '武都区', 3, 0),
(660, 71, '崇信县', 3, 0),
(661, 71, '华亭县', 3, 0),
(662, 71, '静宁县', 3, 0),
(663, 71, '灵台县', 3, 0),
(664, 71, '崆峒区', 3, 0),
(665, 71, '庄浪县', 3, 0),
(666, 71, '泾川县', 3, 0),
(667, 72, '合水县', 3, 0),
(668, 72, '华池县', 3, 0),
(669, 72, '环县', 3, 0),
(670, 72, '宁县', 3, 0),
(671, 72, '庆城县', 3, 0),
(672, 72, '西峰区', 3, 0),
(673, 72, '镇原县', 3, 0),
(674, 72, '正宁县', 3, 0),
(675, 73, '甘谷县', 3, 0),
(676, 73, '秦安县', 3, 0),
(677, 73, '清水县', 3, 0),
(678, 73, '秦州区', 3, 0),
(679, 73, '麦积区', 3, 0),
(680, 73, '武山县', 3, 0),
(681, 73, '张家川', 3, 0),
(682, 74, '古浪县', 3, 0),
(683, 74, '民勤县', 3, 0),
(684, 74, '天祝', 3, 0),
(685, 74, '凉州区', 3, 0),
(686, 75, '高台县', 3, 0),
(687, 75, '临泽县', 3, 0),
(688, 75, '民乐县', 3, 0),
(689, 75, '山丹县', 3, 0),
(690, 75, '肃南', 3, 0),
(691, 75, '甘州区', 3, 0),
(692, 76, '从化市', 3, 0),
(693, 76, '天河区', 3, 0),
(694, 76, '东山区', 3, 0),
(695, 76, '白云区', 3, 0),
(696, 76, '海珠区', 3, 0),
(697, 76, '荔湾区', 3, 0),
(698, 76, '越秀区', 3, 0),
(699, 76, '黄埔区', 3, 0),
(700, 76, '番禺区', 3, 0),
(701, 76, '花都区', 3, 0),
(702, 76, '增城区', 3, 0),
(703, 76, '从化区', 3, 0),
(704, 76, '市郊', 3, 0),
(705, 77, '福田区', 3, 0),
(706, 77, '罗湖区', 3, 0),
(707, 77, '南山区', 3, 0),
(708, 77, '宝安区', 3, 0),
(709, 77, '龙岗区', 3, 0),
(710, 77, '盐田区', 3, 0),
(711, 78, '湘桥区', 3, 0),
(712, 78, '潮安县', 3, 0),
(713, 78, '饶平县', 3, 0),
(714, 79, '南城区', 3, 0),
(715, 79, '东城区', 3, 0),
(716, 79, '万江区', 3, 0),
(717, 79, '莞城区', 3, 0),
(718, 79, '石龙镇', 3, 0),
(719, 79, '虎门镇', 3, 0),
(720, 79, '麻涌镇', 3, 0),
(721, 79, '道滘镇', 3, 0),
(722, 79, '石碣镇', 3, 0),
(723, 79, '沙田镇', 3, 0),
(724, 79, '望牛墩镇', 3, 0),
(725, 79, '洪梅镇', 3, 0),
(726, 79, '茶山镇', 3, 0),
(727, 79, '寮步镇', 3, 0),
(728, 79, '大岭山镇', 3, 0),
(729, 79, '大朗镇', 3, 0),
(730, 79, '黄江镇', 3, 0),
(731, 79, '樟木头', 3, 0),
(732, 79, '凤岗镇', 3, 0),
(733, 79, '塘厦镇', 3, 0),
(734, 79, '谢岗镇', 3, 0),
(735, 79, '厚街镇', 3, 0),
(736, 79, '清溪镇', 3, 0),
(737, 79, '常平镇', 3, 0),
(738, 79, '桥头镇', 3, 0),
(739, 79, '横沥镇', 3, 0),
(740, 79, '东坑镇', 3, 0),
(741, 79, '企石镇', 3, 0),
(742, 79, '石排镇', 3, 0),
(743, 79, '长安镇', 3, 0),
(744, 79, '中堂镇', 3, 0),
(745, 79, '高埗镇', 3, 0),
(746, 80, '禅城区', 3, 0),
(747, 80, '南海区', 3, 0),
(748, 80, '顺德区', 3, 0),
(749, 80, '三水区', 3, 0),
(750, 80, '高明区', 3, 0),
(751, 81, '东源县', 3, 0),
(752, 81, '和平县', 3, 0),
(753, 81, '源城区', 3, 0),
(754, 81, '连平县', 3, 0),
(755, 81, '龙川县', 3, 0),
(756, 81, '紫金县', 3, 0),
(757, 82, '惠阳区', 3, 0),
(758, 82, '惠城区', 3, 0),
(759, 82, '大亚湾', 3, 0),
(760, 82, '博罗县', 3, 0),
(761, 82, '惠东县', 3, 0),
(762, 82, '龙门县', 3, 0),
(763, 83, '江海区', 3, 0),
(764, 83, '蓬江区', 3, 0),
(765, 83, '新会区', 3, 0),
(766, 83, '台山市', 3, 0),
(767, 83, '开平市', 3, 0),
(768, 83, '鹤山市', 3, 0),
(769, 83, '恩平市', 3, 0),
(770, 84, '榕城区', 3, 0),
(771, 84, '普宁市', 3, 0),
(772, 84, '揭东县', 3, 0),
(773, 84, '揭西县', 3, 0),
(774, 84, '惠来县', 3, 0),
(775, 85, '茂南区', 3, 0),
(776, 85, '茂港区', 3, 0),
(777, 85, '高州市', 3, 0),
(778, 85, '化州市', 3, 0),
(779, 85, '信宜市', 3, 0),
(780, 85, '电白县', 3, 0),
(781, 86, '梅县', 3, 0),
(782, 86, '梅江区', 3, 0),
(783, 86, '兴宁市', 3, 0),
(784, 86, '大埔县', 3, 0),
(785, 86, '丰顺县', 3, 0),
(786, 86, '五华县', 3, 0),
(787, 86, '平远县', 3, 0),
(788, 86, '蕉岭县', 3, 0),
(789, 87, '清城区', 3, 0),
(790, 87, '英德市', 3, 0),
(791, 87, '连州市', 3, 0),
(792, 87, '佛冈县', 3, 0),
(793, 87, '阳山县', 3, 0),
(794, 87, '清新县', 3, 0),
(795, 87, '连山', 3, 0),
(796, 87, '连南', 3, 0),
(797, 88, '南澳县', 3, 0),
(798, 88, '潮阳区', 3, 0),
(799, 88, '澄海区', 3, 0),
(800, 88, '龙湖区', 3, 0),
(801, 88, '金平区', 3, 0),
(802, 88, '濠江区', 3, 0),
(803, 88, '潮南区', 3, 0),
(804, 89, '城区', 3, 0),
(805, 89, '陆丰市', 3, 0),
(806, 89, '海丰县', 3, 0),
(807, 89, '陆河县', 3, 0),
(808, 90, '曲江县', 3, 0),
(809, 90, '浈江区', 3, 0),
(810, 90, '武江区', 3, 0),
(811, 90, '曲江区', 3, 0),
(812, 90, '乐昌市', 3, 0),
(813, 90, '南雄市', 3, 0),
(814, 90, '始兴县', 3, 0),
(815, 90, '仁化县', 3, 0),
(816, 90, '翁源县', 3, 0),
(817, 90, '新丰县', 3, 0),
(818, 90, '乳源', 3, 0),
(819, 91, '江城区', 3, 0),
(820, 91, '阳春市', 3, 0),
(821, 91, '阳西县', 3, 0),
(822, 91, '阳东县', 3, 0),
(823, 92, '云城区', 3, 0),
(824, 92, '罗定市', 3, 0),
(825, 92, '新兴县', 3, 0),
(826, 92, '郁南县', 3, 0),
(827, 92, '云安县', 3, 0),
(828, 93, '赤坎区', 3, 0),
(829, 93, '霞山区', 3, 0),
(830, 93, '坡头区', 3, 0),
(831, 93, '麻章区', 3, 0),
(832, 93, '廉江市', 3, 0),
(833, 93, '雷州市', 3, 0),
(834, 93, '吴川市', 3, 0),
(835, 93, '遂溪县', 3, 0),
(836, 93, '徐闻县', 3, 0),
(837, 94, '肇庆市', 3, 0),
(838, 94, '高要市', 3, 0),
(839, 94, '四会市', 3, 0),
(840, 94, '广宁县', 3, 0),
(841, 94, '怀集县', 3, 0),
(842, 94, '封开县', 3, 0),
(843, 94, '德庆县', 3, 0),
(844, 95, '石岐街道', 3, 0),
(845, 95, '东区街道', 3, 0),
(846, 95, '西区街道', 3, 0),
(847, 95, '环城街道', 3, 0),
(848, 95, '中山港街道', 3, 0),
(849, 95, '五桂山街道', 3, 0),
(850, 96, '香洲区', 3, 0),
(851, 96, '斗门区', 3, 0),
(852, 96, '金湾区', 3, 0),
(853, 97, '邕宁区', 3, 0),
(854, 97, '青秀区', 3, 0),
(855, 97, '兴宁区', 3, 0),
(856, 97, '良庆区', 3, 0),
(857, 97, '西乡塘区', 3, 0),
(858, 97, '江南区', 3, 0),
(859, 97, '武鸣县', 3, 0),
(860, 97, '隆安县', 3, 0),
(861, 97, '马山县', 3, 0),
(862, 97, '上林县', 3, 0),
(863, 97, '宾阳县', 3, 0),
(864, 97, '横县', 3, 0),
(865, 98, '秀峰区', 3, 0),
(866, 98, '叠彩区', 3, 0),
(867, 98, '象山区', 3, 0),
(868, 98, '七星区', 3, 0),
(869, 98, '雁山区', 3, 0),
(870, 98, '阳朔县', 3, 0),
(871, 98, '临桂县', 3, 0),
(872, 98, '灵川县', 3, 0),
(873, 98, '全州县', 3, 0),
(874, 98, '平乐县', 3, 0),
(875, 98, '兴安县', 3, 0),
(876, 98, '灌阳县', 3, 0),
(877, 98, '荔浦县', 3, 0),
(878, 98, '资源县', 3, 0),
(879, 98, '永福县', 3, 0),
(880, 98, '龙胜', 3, 0),
(881, 98, '恭城', 3, 0),
(882, 99, '右江区', 3, 0),
(883, 99, '凌云县', 3, 0),
(884, 99, '平果县', 3, 0),
(885, 99, '西林县', 3, 0),
(886, 99, '乐业县', 3, 0),
(887, 99, '德保县', 3, 0),
(888, 99, '田林县', 3, 0),
(889, 99, '田阳县', 3, 0),
(890, 99, '靖西县', 3, 0),
(891, 99, '田东县', 3, 0),
(892, 99, '那坡县', 3, 0),
(893, 99, '隆林', 3, 0),
(894, 100, '海城区', 3, 0),
(895, 100, '银海区', 3, 0),
(896, 100, '铁山港区', 3, 0),
(897, 100, '合浦县', 3, 0),
(898, 101, '江州区', 3, 0),
(899, 101, '凭祥市', 3, 0),
(900, 101, '宁明县', 3, 0),
(901, 101, '扶绥县', 3, 0),
(902, 101, '龙州县', 3, 0),
(903, 101, '大新县', 3, 0),
(904, 101, '天等县', 3, 0),
(905, 102, '港口区', 3, 0),
(906, 102, '防城区', 3, 0),
(907, 102, '东兴市', 3, 0),
(908, 102, '上思县', 3, 0),
(909, 103, '港北区', 3, 0),
(910, 103, '港南区', 3, 0),
(911, 103, '覃塘区', 3, 0),
(912, 103, '桂平市', 3, 0),
(913, 103, '平南县', 3, 0),
(914, 104, '金城江区', 3, 0),
(915, 104, '宜州市', 3, 0),
(916, 104, '天峨县', 3, 0),
(917, 104, '凤山县', 3, 0),
(918, 104, '南丹县', 3, 0),
(919, 104, '东兰县', 3, 0),
(920, 104, '都安', 3, 0),
(921, 104, '罗城', 3, 0),
(922, 104, '巴马', 3, 0),
(923, 104, '环江', 3, 0),
(924, 104, '大化', 3, 0),
(925, 105, '八步区', 3, 0),
(926, 105, '钟山县', 3, 0),
(927, 105, '昭平县', 3, 0),
(928, 105, '富川', 3, 0),
(929, 106, '兴宾区', 3, 0),
(930, 106, '合山市', 3, 0),
(931, 106, '象州县', 3, 0),
(932, 106, '武宣县', 3, 0),
(933, 106, '忻城县', 3, 0),
(934, 106, '金秀', 3, 0),
(935, 107, '城中区', 3, 0),
(936, 107, '鱼峰区', 3, 0),
(937, 107, '柳北区', 3, 0),
(938, 107, '柳南区', 3, 0),
(939, 107, '柳江县', 3, 0),
(940, 107, '柳城县', 3, 0),
(941, 107, '鹿寨县', 3, 0),
(942, 107, '融安县', 3, 0),
(943, 107, '融水', 3, 0),
(944, 107, '三江', 3, 0),
(945, 108, '钦南区', 3, 0),
(946, 108, '钦北区', 3, 0),
(947, 108, '灵山县', 3, 0),
(948, 108, '浦北县', 3, 0),
(949, 109, '万秀区', 3, 0),
(950, 109, '蝶山区', 3, 0),
(951, 109, '长洲区', 3, 0),
(952, 109, '岑溪市', 3, 0),
(953, 109, '苍梧县', 3, 0),
(954, 109, '藤县', 3, 0),
(955, 109, '蒙山县', 3, 0),
(956, 110, '玉州区', 3, 0),
(957, 110, '北流市', 3, 0),
(958, 110, '容县', 3, 0),
(959, 110, '陆川县', 3, 0),
(960, 110, '博白县', 3, 0),
(961, 110, '兴业县', 3, 0),
(962, 111, '南明区', 3, 0),
(963, 111, '云岩区', 3, 0),
(964, 111, '花溪区', 3, 0),
(965, 111, '乌当区', 3, 0),
(966, 111, '白云区', 3, 0),
(967, 111, '小河区', 3, 0),
(968, 111, '金阳新区', 3, 0),
(969, 111, '新天园区', 3, 0),
(970, 111, '清镇市', 3, 0),
(971, 111, '开阳县', 3, 0),
(972, 111, '修文县', 3, 0),
(973, 111, '息烽县', 3, 0),
(974, 112, '西秀区', 3, 0),
(975, 112, '关岭', 3, 0),
(976, 112, '镇宁', 3, 0),
(977, 112, '紫云', 3, 0),
(978, 112, '平坝县', 3, 0),
(979, 112, '普定县', 3, 0),
(980, 113, '毕节市', 3, 0),
(981, 113, '大方县', 3, 0),
(982, 113, '黔西县', 3, 0),
(983, 113, '金沙县', 3, 0),
(984, 113, '织金县', 3, 0),
(985, 113, '纳雍县', 3, 0),
(986, 113, '赫章县', 3, 0),
(987, 113, '威宁', 3, 0),
(988, 114, '钟山区', 3, 0),
(989, 114, '六枝特区', 3, 0),
(990, 114, '水城县', 3, 0),
(991, 114, '盘县', 3, 0),
(992, 115, '凯里市', 3, 0),
(993, 115, '黄平县', 3, 0),
(994, 115, '施秉县', 3, 0),
(995, 115, '三穗县', 3, 0),
(996, 115, '镇远县', 3, 0),
(997, 115, '岑巩县', 3, 0),
(998, 115, '天柱县', 3, 0),
(999, 115, '锦屏县', 3, 0),
(1000, 115, '剑河县', 3, 0),
(1001, 115, '台江县', 3, 0),
(1002, 115, '黎平县', 3, 0),
(1003, 115, '榕江县', 3, 0),
(1004, 115, '从江县', 3, 0),
(1005, 115, '雷山县', 3, 0),
(1006, 115, '麻江县', 3, 0),
(1007, 115, '丹寨县', 3, 0),
(1008, 116, '都匀市', 3, 0),
(1009, 116, '福泉市', 3, 0),
(1010, 116, '荔波县', 3, 0),
(1011, 116, '贵定县', 3, 0),
(1012, 116, '瓮安县', 3, 0),
(1013, 116, '独山县', 3, 0),
(1014, 116, '平塘县', 3, 0),
(1015, 116, '罗甸县', 3, 0),
(1016, 116, '长顺县', 3, 0),
(1017, 116, '龙里县', 3, 0),
(1018, 116, '惠水县', 3, 0),
(1019, 116, '三都', 3, 0),
(1020, 117, '兴义市', 3, 0),
(1021, 117, '兴仁县', 3, 0),
(1022, 117, '普安县', 3, 0),
(1023, 117, '晴隆县', 3, 0),
(1024, 117, '贞丰县', 3, 0),
(1025, 117, '望谟县', 3, 0),
(1026, 117, '册亨县', 3, 0),
(1027, 117, '安龙县', 3, 0),
(1028, 118, '铜仁市', 3, 0),
(1029, 118, '江口县', 3, 0),
(1030, 118, '石阡县', 3, 0),
(1031, 118, '思南县', 3, 0),
(1032, 118, '德江县', 3, 0),
(1033, 118, '玉屏', 3, 0),
(1034, 118, '印江', 3, 0),
(1035, 118, '沿河', 3, 0),
(1036, 118, '松桃', 3, 0),
(1037, 118, '万山特区', 3, 0),
(1038, 119, '红花岗区', 3, 0),
(1039, 119, '务川县', 3, 0),
(1040, 119, '道真县', 3, 0),
(1041, 119, '汇川区', 3, 0),
(1042, 119, '赤水市', 3, 0),
(1043, 119, '仁怀市', 3, 0),
(1044, 119, '遵义县', 3, 0),
(1045, 119, '桐梓县', 3, 0),
(1046, 119, '绥阳县', 3, 0),
(1047, 119, '正安县', 3, 0),
(1048, 119, '凤冈县', 3, 0),
(1049, 119, '湄潭县', 3, 0),
(1050, 119, '余庆县', 3, 0),
(1051, 119, '习水县', 3, 0),
(1052, 119, '道真', 3, 0),
(1053, 119, '务川', 3, 0),
(1054, 120, '秀英区', 3, 0),
(1055, 120, '龙华区', 3, 0),
(1056, 120, '琼山区', 3, 0),
(1057, 120, '美兰区', 3, 0),
(1058, 137, '市区', 3, 0),
(1059, 137, '洋浦开发区', 3, 0),
(1060, 137, '那大镇', 3, 0),
(1061, 137, '王五镇', 3, 0),
(1062, 137, '雅星镇', 3, 0),
(1063, 137, '大成镇', 3, 0),
(1064, 137, '中和镇', 3, 0),
(1065, 137, '峨蔓镇', 3, 0),
(1066, 137, '南丰镇', 3, 0),
(1067, 137, '白马井镇', 3, 0),
(1068, 137, '兰洋镇', 3, 0),
(1069, 137, '和庆镇', 3, 0),
(1070, 137, '海头镇', 3, 0),
(1071, 137, '排浦镇', 3, 0),
(1072, 137, '东成镇', 3, 0),
(1073, 137, '光村镇', 3, 0),
(1074, 137, '木棠镇', 3, 0),
(1075, 137, '新州镇', 3, 0),
(1076, 137, '三都镇', 3, 0),
(1077, 137, '其他', 3, 0),
(1078, 138, '长安区', 3, 0),
(1079, 138, '桥东区', 3, 0),
(1080, 138, '桥西区', 3, 0),
(1081, 138, '新华区', 3, 0),
(1082, 138, '裕华区', 3, 0),
(1083, 138, '井陉矿区', 3, 0),
(1084, 138, '高新区', 3, 0),
(1085, 138, '辛集市', 3, 0),
(1086, 138, '藁城市', 3, 0),
(1087, 138, '晋州市', 3, 0),
(1088, 138, '新乐市', 3, 0),
(1089, 138, '鹿泉市', 3, 0),
(1090, 138, '井陉县', 3, 0),
(1091, 138, '正定县', 3, 0),
(1092, 138, '栾城县', 3, 0),
(1093, 138, '行唐县', 3, 0),
(1094, 138, '灵寿县', 3, 0),
(1095, 138, '高邑县', 3, 0),
(1096, 138, '深泽县', 3, 0),
(1097, 138, '赞皇县', 3, 0),
(1098, 138, '无极县', 3, 0),
(1099, 138, '平山县', 3, 0),
(1100, 138, '元氏县', 3, 0),
(1101, 138, '赵县', 3, 0),
(1102, 139, '新市区', 3, 0),
(1103, 139, '南市区', 3, 0),
(1104, 139, '北市区', 3, 0),
(1105, 139, '涿州市', 3, 0),
(1106, 139, '定州市', 3, 0),
(1107, 139, '安国市', 3, 0),
(1108, 139, '高碑店市', 3, 0),
(1109, 139, '满城县', 3, 0),
(1110, 139, '清苑县', 3, 0),
(1111, 139, '涞水县', 3, 0),
(1112, 139, '阜平县', 3, 0),
(1113, 139, '徐水县', 3, 0),
(1114, 139, '定兴县', 3, 0),
(1115, 139, '唐县', 3, 0),
(1116, 139, '高阳县', 3, 0),
(1117, 139, '容城县', 3, 0),
(1118, 139, '涞源县', 3, 0),
(1119, 139, '望都县', 3, 0),
(1120, 139, '安新县', 3, 0),
(1121, 139, '易县', 3, 0),
(1122, 139, '曲阳县', 3, 0),
(1123, 139, '蠡县', 3, 0),
(1124, 139, '顺平县', 3, 0),
(1125, 139, '博野县', 3, 0),
(1126, 139, '雄县', 3, 0),
(1127, 140, '运河区', 3, 0),
(1128, 140, '新华区', 3, 0),
(1129, 140, '泊头市', 3, 0),
(1130, 140, '任丘市', 3, 0),
(1131, 140, '黄骅市', 3, 0),
(1132, 140, '河间市', 3, 0),
(1133, 140, '沧县', 3, 0),
(1134, 140, '青县', 3, 0),
(1135, 140, '东光县', 3, 0),
(1136, 140, '海兴县', 3, 0),
(1137, 140, '盐山县', 3, 0),
(1138, 140, '肃宁县', 3, 0),
(1139, 140, '南皮县', 3, 0),
(1140, 140, '吴桥县', 3, 0),
(1141, 140, '献县', 3, 0),
(1142, 140, '孟村', 3, 0),
(1143, 141, '双桥区', 3, 0),
(1144, 141, '双滦区', 3, 0),
(1145, 141, '鹰手营子矿区', 3, 0),
(1146, 141, '承德县', 3, 0),
(1147, 141, '兴隆县', 3, 0),
(1148, 141, '平泉县', 3, 0),
(1149, 141, '滦平县', 3, 0),
(1150, 141, '隆化县', 3, 0),
(1151, 141, '丰宁', 3, 0),
(1152, 141, '宽城', 3, 0),
(1153, 141, '围场', 3, 0),
(1154, 142, '从台区', 3, 0),
(1155, 142, '复兴区', 3, 0),
(1156, 142, '邯山区', 3, 0),
(1157, 142, '峰峰矿区', 3, 0),
(1158, 142, '武安市', 3, 0),
(1159, 142, '邯郸县', 3, 0),
(1160, 142, '临漳县', 3, 0),
(1161, 142, '成安县', 3, 0),
(1162, 142, '大名县', 3, 0),
(1163, 142, '涉县', 3, 0),
(1164, 142, '磁县', 3, 0),
(1165, 142, '肥乡县', 3, 0),
(1166, 142, '永年县', 3, 0),
(1167, 142, '邱县', 3, 0),
(1168, 142, '鸡泽县', 3, 0),
(1169, 142, '广平县', 3, 0),
(1170, 142, '馆陶县', 3, 0),
(1171, 142, '魏县', 3, 0),
(1172, 142, '曲周县', 3, 0),
(1173, 143, '桃城区', 3, 0),
(1174, 143, '冀州市', 3, 0),
(1175, 143, '深州市', 3, 0),
(1176, 143, '枣强县', 3, 0),
(1177, 143, '武邑县', 3, 0),
(1178, 143, '武强县', 3, 0),
(1179, 143, '饶阳县', 3, 0),
(1180, 143, '安平县', 3, 0),
(1181, 143, '故城县', 3, 0),
(1182, 143, '景县', 3, 0),
(1183, 143, '阜城县', 3, 0),
(1184, 144, '安次区', 3, 0),
(1185, 144, '广阳区', 3, 0),
(1186, 144, '霸州市', 3, 0),
(1187, 144, '三河市', 3, 0),
(1188, 144, '固安县', 3, 0),
(1189, 144, '永清县', 3, 0),
(1190, 144, '香河县', 3, 0),
(1191, 144, '大城县', 3, 0),
(1192, 144, '文安县', 3, 0),
(1193, 144, '大厂', 3, 0),
(1194, 145, '海港区', 3, 0),
(1195, 145, '山海关区', 3, 0),
(1196, 145, '北戴河区', 3, 0),
(1197, 145, '昌黎县', 3, 0),
(1198, 145, '抚宁县', 3, 0),
(1199, 145, '卢龙县', 3, 0),
(1200, 145, '青龙', 3, 0),
(1201, 146, '路北区', 3, 0),
(1202, 146, '路南区', 3, 0),
(1203, 146, '古冶区', 3, 0),
(1204, 146, '开平区', 3, 0),
(1205, 146, '丰南区', 3, 0),
(1206, 146, '丰润区', 3, 0),
(1207, 146, '遵化市', 3, 0),
(1208, 146, '迁安市', 3, 0),
(1209, 146, '滦县', 3, 0),
(1210, 146, '滦南县', 3, 0),
(1211, 146, '乐亭县', 3, 0),
(1212, 146, '迁西县', 3, 0),
(1213, 146, '玉田县', 3, 0),
(1214, 146, '唐海县', 3, 0),
(1215, 147, '桥东区', 3, 0),
(1216, 147, '桥西区', 3, 0),
(1217, 147, '南宫市', 3, 0),
(1218, 147, '沙河市', 3, 0),
(1219, 147, '邢台县', 3, 0),
(1220, 147, '临城县', 3, 0),
(1221, 147, '内丘县', 3, 0),
(1222, 147, '柏乡县', 3, 0),
(1223, 147, '隆尧县', 3, 0),
(1224, 147, '任县', 3, 0),
(1225, 147, '南和县', 3, 0),
(1226, 147, '宁晋县', 3, 0),
(1227, 147, '巨鹿县', 3, 0),
(1228, 147, '新河县', 3, 0),
(1229, 147, '广宗县', 3, 0),
(1230, 147, '平乡县', 3, 0),
(1231, 147, '威县', 3, 0),
(1232, 147, '清河县', 3, 0),
(1233, 147, '临西县', 3, 0),
(1234, 148, '桥西区', 3, 0),
(1235, 148, '桥东区', 3, 0),
(1236, 148, '宣化区', 3, 0),
(1237, 148, '下花园区', 3, 0),
(1238, 148, '宣化县', 3, 0),
(1239, 148, '张北县', 3, 0),
(1240, 148, '康保县', 3, 0),
(1241, 148, '沽源县', 3, 0),
(1242, 148, '尚义县', 3, 0),
(1243, 148, '蔚县', 3, 0),
(1244, 148, '阳原县', 3, 0),
(1245, 148, '怀安县', 3, 0),
(1246, 148, '万全县', 3, 0),
(1247, 148, '怀来县', 3, 0),
(1248, 148, '涿鹿县', 3, 0),
(1249, 148, '赤城县', 3, 0),
(1250, 148, '崇礼县', 3, 0),
(1251, 149, '金水区', 3, 0),
(1252, 149, '邙山区', 3, 0),
(1253, 149, '二七区', 3, 0),
(1254, 149, '管城区', 3, 0),
(1255, 149, '中原区', 3, 0),
(1256, 149, '上街区', 3, 0),
(1257, 149, '惠济区', 3, 0),
(1258, 149, '郑东新区', 3, 0),
(1259, 149, '经济技术开发区', 3, 0),
(1260, 149, '高新开发区', 3, 0),
(1261, 149, '出口加工区', 3, 0),
(1262, 149, '巩义市', 3, 0),
(1263, 149, '荥阳市', 3, 0),
(1264, 149, '新密市', 3, 0),
(1265, 149, '新郑市', 3, 0),
(1266, 149, '登封市', 3, 0),
(1267, 149, '中牟县', 3, 0),
(1268, 150, '西工区', 3, 0),
(1269, 150, '老城区', 3, 0),
(1270, 150, '涧西区', 3, 0),
(1271, 150, '瀍河回族区', 3, 0),
(1272, 150, '洛龙区', 3, 0),
(1273, 150, '吉利区', 3, 0),
(1274, 150, '偃师市', 3, 0),
(1275, 150, '孟津县', 3, 0),
(1276, 150, '新安县', 3, 0),
(1277, 150, '栾川县', 3, 0),
(1278, 150, '嵩县', 3, 0),
(1279, 150, '汝阳县', 3, 0),
(1280, 150, '宜阳县', 3, 0),
(1281, 150, '洛宁县', 3, 0),
(1282, 150, '伊川县', 3, 0),
(1283, 151, '鼓楼区', 3, 0),
(1284, 151, '龙亭区', 3, 0),
(1285, 151, '顺河回族区', 3, 0),
(1286, 151, '金明区', 3, 0),
(1287, 151, '禹王台区', 3, 0),
(1288, 151, '杞县', 3, 0),
(1289, 151, '通许县', 3, 0),
(1290, 151, '尉氏县', 3, 0),
(1291, 151, '开封县', 3, 0),
(1292, 151, '兰考县', 3, 0),
(1293, 152, '北关区', 3, 0),
(1294, 152, '文峰区', 3, 0),
(1295, 152, '殷都区', 3, 0),
(1296, 152, '龙安区', 3, 0),
(1297, 152, '林州市', 3, 0),
(1298, 152, '安阳县', 3, 0),
(1299, 152, '汤阴县', 3, 0),
(1300, 152, '滑县', 3, 0),
(1301, 152, '内黄县', 3, 0),
(1302, 153, '淇滨区', 3, 0),
(1303, 153, '山城区', 3, 0),
(1304, 153, '鹤山区', 3, 0),
(1305, 153, '浚县', 3, 0),
(1306, 153, '淇县', 3, 0),
(1307, 154, '济源市', 3, 0),
(1308, 155, '解放区', 3, 0),
(1309, 155, '中站区', 3, 0),
(1310, 155, '马村区', 3, 0),
(1311, 155, '山阳区', 3, 0),
(1312, 155, '沁阳市', 3, 0),
(1313, 155, '孟州市', 3, 0),
(1314, 155, '修武县', 3, 0),
(1315, 155, '博爱县', 3, 0),
(1316, 155, '武陟县', 3, 0),
(1317, 155, '温县', 3, 0),
(1318, 156, '卧龙区', 3, 0),
(1319, 156, '宛城区', 3, 0),
(1320, 156, '邓州市', 3, 0),
(1321, 156, '南召县', 3, 0),
(1322, 156, '方城县', 3, 0),
(1323, 156, '西峡县', 3, 0),
(1324, 156, '镇平县', 3, 0),
(1325, 156, '内乡县', 3, 0),
(1326, 156, '淅川县', 3, 0),
(1327, 156, '社旗县', 3, 0),
(1328, 156, '唐河县', 3, 0),
(1329, 156, '新野县', 3, 0),
(1330, 156, '桐柏县', 3, 0),
(1331, 157, '新华区', 3, 0),
(1332, 157, '卫东区', 3, 0),
(1333, 157, '湛河区', 3, 0),
(1334, 157, '石龙区', 3, 0),
(1335, 157, '舞钢市', 3, 0),
(1336, 157, '汝州市', 3, 0),
(1337, 157, '宝丰县', 3, 0),
(1338, 157, '叶县', 3, 0),
(1339, 157, '鲁山县', 3, 0),
(1340, 157, '郏县', 3, 0),
(1341, 158, '湖滨区', 3, 0),
(1342, 158, '义马市', 3, 0),
(1343, 158, '灵宝市', 3, 0),
(1344, 158, '渑池县', 3, 0),
(1345, 158, '陕县', 3, 0),
(1346, 158, '卢氏县', 3, 0),
(1347, 159, '梁园区', 3, 0),
(1348, 159, '睢阳区', 3, 0),
(1349, 159, '永城市', 3, 0),
(1350, 159, '民权县', 3, 0),
(1351, 159, '睢县', 3, 0),
(1352, 159, '宁陵县', 3, 0),
(1353, 159, '虞城县', 3, 0),
(1354, 159, '柘城县', 3, 0),
(1355, 159, '夏邑县', 3, 0),
(1356, 160, '卫滨区', 3, 0),
(1357, 160, '红旗区', 3, 0),
(1358, 160, '凤泉区', 3, 0),
(1359, 160, '牧野区', 3, 0),
(1360, 160, '卫辉市', 3, 0),
(1361, 160, '辉县市', 3, 0),
(1362, 160, '新乡县', 3, 0),
(1363, 160, '获嘉县', 3, 0),
(1364, 160, '原阳县', 3, 0),
(1365, 160, '延津县', 3, 0),
(1366, 160, '封丘县', 3, 0),
(1367, 160, '长垣县', 3, 0),
(1368, 161, '浉河区', 3, 0),
(1369, 161, '平桥区', 3, 0),
(1370, 161, '罗山县', 3, 0),
(1371, 161, '光山县', 3, 0),
(1372, 161, '新县', 3, 0),
(1373, 161, '商城县', 3, 0),
(1374, 161, '固始县', 3, 0),
(1375, 161, '潢川县', 3, 0),
(1376, 161, '淮滨县', 3, 0),
(1377, 161, '息县', 3, 0),
(1378, 162, '魏都区', 3, 0),
(1379, 162, '禹州市', 3, 0),
(1380, 162, '长葛市', 3, 0),
(1381, 162, '许昌县', 3, 0),
(1382, 162, '鄢陵县', 3, 0),
(1383, 162, '襄城县', 3, 0),
(1384, 163, '川汇区', 3, 0),
(1385, 163, '项城市', 3, 0),
(1386, 163, '扶沟县', 3, 0),
(1387, 163, '西华县', 3, 0),
(1388, 163, '商水县', 3, 0),
(1389, 163, '沈丘县', 3, 0),
(1390, 163, '郸城县', 3, 0),
(1391, 163, '淮阳县', 3, 0),
(1392, 163, '太康县', 3, 0),
(1393, 163, '鹿邑县', 3, 0),
(1394, 164, '驿城区', 3, 0),
(1395, 164, '西平县', 3, 0),
(1396, 164, '上蔡县', 3, 0),
(1397, 164, '平舆县', 3, 0),
(1398, 164, '正阳县', 3, 0),
(1399, 164, '确山县', 3, 0),
(1400, 164, '泌阳县', 3, 0),
(1401, 164, '汝南县', 3, 0),
(1402, 164, '遂平县', 3, 0),
(1403, 164, '新蔡县', 3, 0),
(1404, 165, '郾城区', 3, 0),
(1405, 165, '源汇区', 3, 0),
(1406, 165, '召陵区', 3, 0),
(1407, 165, '舞阳县', 3, 0),
(1408, 165, '临颍县', 3, 0),
(1409, 166, '华龙区', 3, 0),
(1410, 166, '清丰县', 3, 0),
(1411, 166, '南乐县', 3, 0),
(1412, 166, '范县', 3, 0),
(1413, 166, '台前县', 3, 0),
(1414, 166, '濮阳县', 3, 0),
(1415, 167, '道里区', 3, 0),
(1416, 167, '南岗区', 3, 0),
(1417, 167, '动力区', 3, 0),
(1418, 167, '平房区', 3, 0),
(1419, 167, '香坊区', 3, 0),
(1420, 167, '太平区', 3, 0),
(1421, 167, '道外区', 3, 0),
(1422, 167, '阿城区', 3, 0),
(1423, 167, '呼兰区', 3, 0),
(1424, 167, '松北区', 3, 0),
(1425, 167, '尚志市', 3, 0),
(1426, 167, '双城市', 3, 0),
(1427, 167, '五常市', 3, 0),
(1428, 167, '方正县', 3, 0),
(1429, 167, '宾县', 3, 0),
(1430, 167, '依兰县', 3, 0),
(1431, 167, '巴彦县', 3, 0),
(1432, 167, '通河县', 3, 0),
(1433, 167, '木兰县', 3, 0),
(1434, 167, '延寿县', 3, 0),
(1435, 168, '萨尔图区', 3, 0),
(1436, 168, '红岗区', 3, 0),
(1437, 168, '龙凤区', 3, 0),
(1438, 168, '让胡路区', 3, 0),
(1439, 168, '大同区', 3, 0),
(1440, 168, '肇州县', 3, 0),
(1441, 168, '肇源县', 3, 0),
(1442, 168, '林甸县', 3, 0),
(1443, 168, '杜尔伯特', 3, 0),
(1444, 169, '呼玛县', 3, 0),
(1445, 169, '漠河县', 3, 0),
(1446, 169, '塔河县', 3, 0),
(1447, 170, '兴山区', 3, 0),
(1448, 170, '工农区', 3, 0),
(1449, 170, '南山区', 3, 0),
(1450, 170, '兴安区', 3, 0),
(1451, 170, '向阳区', 3, 0),
(1452, 170, '东山区', 3, 0),
(1453, 170, '萝北县', 3, 0),
(1454, 170, '绥滨县', 3, 0),
(1455, 171, '爱辉区', 3, 0),
(1456, 171, '五大连池市', 3, 0),
(1457, 171, '北安市', 3, 0),
(1458, 171, '嫩江县', 3, 0),
(1459, 171, '逊克县', 3, 0),
(1460, 171, '孙吴县', 3, 0),
(1461, 172, '鸡冠区', 3, 0),
(1462, 172, '恒山区', 3, 0),
(1463, 172, '城子河区', 3, 0),
(1464, 172, '滴道区', 3, 0),
(1465, 172, '梨树区', 3, 0),
(1466, 172, '虎林市', 3, 0),
(1467, 172, '密山市', 3, 0),
(1468, 172, '鸡东县', 3, 0),
(1469, 173, '前进区', 3, 0),
(1470, 173, '郊区', 3, 0),
(1471, 173, '向阳区', 3, 0),
(1472, 173, '东风区', 3, 0),
(1473, 173, '同江市', 3, 0),
(1474, 173, '富锦市', 3, 0),
(1475, 173, '桦南县', 3, 0),
(1476, 173, '桦川县', 3, 0),
(1477, 173, '汤原县', 3, 0),
(1478, 173, '抚远县', 3, 0),
(1479, 174, '爱民区', 3, 0),
(1480, 174, '东安区', 3, 0),
(1481, 174, '阳明区', 3, 0),
(1482, 174, '西安区', 3, 0),
(1483, 174, '绥芬河市', 3, 0),
(1484, 174, '海林市', 3, 0),
(1485, 174, '宁安市', 3, 0),
(1486, 174, '穆棱市', 3, 0),
(1487, 174, '东宁县', 3, 0),
(1488, 174, '林口县', 3, 0),
(1489, 175, '桃山区', 3, 0),
(1490, 175, '新兴区', 3, 0),
(1491, 175, '茄子河区', 3, 0),
(1492, 175, '勃利县', 3, 0),
(1493, 176, '龙沙区', 3, 0),
(1494, 176, '昂昂溪区', 3, 0),
(1495, 176, '铁峰区', 3, 0),
(1496, 176, '建华区', 3, 0),
(1497, 176, '富拉尔基区', 3, 0),
(1498, 176, '碾子山区', 3, 0),
(1499, 176, '梅里斯达斡尔区', 3, 0),
(1500, 176, '讷河市', 3, 0),
(1501, 176, '龙江县', 3, 0),
(1502, 176, '依安县', 3, 0),
(1503, 176, '泰来县', 3, 0),
(1504, 176, '甘南县', 3, 0),
(1505, 176, '富裕县', 3, 0),
(1506, 176, '克山县', 3, 0),
(1507, 176, '克东县', 3, 0),
(1508, 176, '拜泉县', 3, 0),
(1509, 177, '尖山区', 3, 0),
(1510, 177, '岭东区', 3, 0),
(1511, 177, '四方台区', 3, 0),
(1512, 177, '宝山区', 3, 0),
(1513, 177, '集贤县', 3, 0),
(1514, 177, '友谊县', 3, 0),
(1515, 177, '宝清县', 3, 0),
(1516, 177, '饶河县', 3, 0),
(1517, 178, '北林区', 3, 0),
(1518, 178, '安达市', 3, 0),
(1519, 178, '肇东市', 3, 0),
(1520, 178, '海伦市', 3, 0),
(1521, 178, '望奎县', 3, 0),
(1522, 178, '兰西县', 3, 0),
(1523, 178, '青冈县', 3, 0),
(1524, 178, '庆安县', 3, 0),
(1525, 178, '明水县', 3, 0),
(1526, 178, '绥棱县', 3, 0),
(1527, 179, '伊春区', 3, 0),
(1528, 179, '带岭区', 3, 0),
(1529, 179, '南岔区', 3, 0),
(1530, 179, '金山屯区', 3, 0),
(1531, 179, '西林区', 3, 0),
(1532, 179, '美溪区', 3, 0),
(1533, 179, '乌马河区', 3, 0),
(1534, 179, '翠峦区', 3, 0),
(1535, 179, '友好区', 3, 0),
(1536, 179, '上甘岭区', 3, 0),
(1537, 179, '五营区', 3, 0),
(1538, 179, '红星区', 3, 0),
(1539, 179, '新青区', 3, 0),
(1540, 179, '汤旺河区', 3, 0),
(1541, 179, '乌伊岭区', 3, 0),
(1542, 179, '铁力市', 3, 0),
(1543, 179, '嘉荫县', 3, 0),
(1544, 180, '江岸区', 3, 0),
(1545, 180, '武昌区', 3, 0),
(1546, 180, '江汉区', 3, 0),
(1547, 180, '硚口区', 3, 0),
(1548, 180, '汉阳区', 3, 0),
(1549, 180, '青山区', 3, 0),
(1550, 180, '洪山区', 3, 0),
(1551, 180, '东西湖区', 3, 0),
(1552, 180, '汉南区', 3, 0),
(1553, 180, '蔡甸区', 3, 0),
(1554, 180, '江夏区', 3, 0),
(1555, 180, '黄陂区', 3, 0),
(1556, 180, '新洲区', 3, 0),
(1557, 180, '经济开发区', 3, 0),
(1558, 181, '仙桃市', 3, 0),
(1559, 182, '鄂城区', 3, 0),
(1560, 182, '华容区', 3, 0),
(1561, 182, '梁子湖区', 3, 0),
(1562, 183, '黄州区', 3, 0),
(1563, 183, '麻城市', 3, 0),
(1564, 183, '武穴市', 3, 0),
(1565, 183, '团风县', 3, 0),
(1566, 183, '红安县', 3, 0),
(1567, 183, '罗田县', 3, 0),
(1568, 183, '英山县', 3, 0),
(1569, 183, '浠水县', 3, 0),
(1570, 183, '蕲春县', 3, 0),
(1571, 183, '黄梅县', 3, 0),
(1572, 184, '黄石港区', 3, 0),
(1573, 184, '西塞山区', 3, 0),
(1574, 184, '下陆区', 3, 0),
(1575, 184, '铁山区', 3, 0),
(1576, 184, '大冶市', 3, 0),
(1577, 184, '阳新县', 3, 0),
(1578, 185, '东宝区', 3, 0),
(1579, 185, '掇刀区', 3, 0),
(1580, 185, '钟祥市', 3, 0),
(1581, 185, '京山县', 3, 0),
(1582, 185, '沙洋县', 3, 0),
(1583, 186, '沙市区', 3, 0),
(1584, 186, '荆州区', 3, 0),
(1585, 186, '石首市', 3, 0),
(1586, 186, '洪湖市', 3, 0),
(1587, 186, '松滋市', 3, 0),
(1588, 186, '公安县', 3, 0),
(1589, 186, '监利县', 3, 0),
(1590, 186, '江陵县', 3, 0),
(1591, 187, '潜江市', 3, 0),
(1592, 188, '神农架林区', 3, 0),
(1593, 189, '张湾区', 3, 0),
(1594, 189, '茅箭区', 3, 0),
(1595, 189, '丹江口市', 3, 0),
(1596, 189, '郧县', 3, 0),
(1597, 189, '郧西县', 3, 0),
(1598, 189, '竹山县', 3, 0),
(1599, 189, '竹溪县', 3, 0),
(1600, 189, '房县', 3, 0),
(1601, 190, '曾都区', 3, 0),
(1602, 190, '广水市', 3, 0),
(1603, 191, '天门市', 3, 0),
(1604, 192, '咸安区', 3, 0),
(1605, 192, '赤壁市', 3, 0),
(1606, 192, '嘉鱼县', 3, 0),
(1607, 192, '通城县', 3, 0),
(1608, 192, '崇阳县', 3, 0),
(1609, 192, '通山县', 3, 0),
(1610, 193, '襄城区', 3, 0),
(1611, 193, '樊城区', 3, 0),
(1612, 193, '襄阳区', 3, 0),
(1613, 193, '老河口市', 3, 0),
(1614, 193, '枣阳市', 3, 0),
(1615, 193, '宜城市', 3, 0),
(1616, 193, '南漳县', 3, 0),
(1617, 193, '谷城县', 3, 0),
(1618, 193, '保康县', 3, 0),
(1619, 194, '孝南区', 3, 0),
(1620, 194, '应城市', 3, 0),
(1621, 194, '安陆市', 3, 0),
(1622, 194, '汉川市', 3, 0),
(1623, 194, '孝昌县', 3, 0),
(1624, 194, '大悟县', 3, 0),
(1625, 194, '云梦县', 3, 0),
(1626, 195, '长阳', 3, 0),
(1627, 195, '五峰', 3, 0),
(1628, 195, '西陵区', 3, 0),
(1629, 195, '伍家岗区', 3, 0),
(1630, 195, '点军区', 3, 0),
(1631, 195, '猇亭区', 3, 0),
(1632, 195, '夷陵区', 3, 0),
(1633, 195, '宜都市', 3, 0),
(1634, 195, '当阳市', 3, 0),
(1635, 195, '枝江市', 3, 0),
(1636, 195, '远安县', 3, 0),
(1637, 195, '兴山县', 3, 0),
(1638, 195, '秭归县', 3, 0),
(1639, 196, '恩施市', 3, 0),
(1640, 196, '利川市', 3, 0),
(1641, 196, '建始县', 3, 0),
(1642, 196, '巴东县', 3, 0),
(1643, 196, '宣恩县', 3, 0),
(1644, 196, '咸丰县', 3, 0),
(1645, 196, '来凤县', 3, 0),
(1646, 196, '鹤峰县', 3, 0),
(1647, 197, '岳麓区', 3, 0),
(1648, 197, '芙蓉区', 3, 0),
(1649, 197, '天心区', 3, 0),
(1650, 197, '开福区', 3, 0),
(1651, 197, '雨花区', 3, 0),
(1652, 197, '开发区', 3, 0),
(1653, 197, '浏阳市', 3, 0),
(1654, 197, '长沙县', 3, 0),
(1655, 197, '望城县', 3, 0),
(1656, 197, '宁乡县', 3, 0),
(1657, 198, '永定区', 3, 0),
(1658, 198, '武陵源区', 3, 0),
(1659, 198, '慈利县', 3, 0),
(1660, 198, '桑植县', 3, 0),
(1661, 199, '武陵区', 3, 0),
(1662, 199, '鼎城区', 3, 0),
(1663, 199, '津市市', 3, 0),
(1664, 199, '安乡县', 3, 0),
(1665, 199, '汉寿县', 3, 0),
(1666, 199, '澧县', 3, 0),
(1667, 199, '临澧县', 3, 0),
(1668, 199, '桃源县', 3, 0),
(1669, 199, '石门县', 3, 0),
(1670, 200, '北湖区', 3, 0),
(1671, 200, '苏仙区', 3, 0),
(1672, 200, '资兴市', 3, 0),
(1673, 200, '桂阳县', 3, 0),
(1674, 200, '宜章县', 3, 0),
(1675, 200, '永兴县', 3, 0),
(1676, 200, '嘉禾县', 3, 0),
(1677, 200, '临武县', 3, 0),
(1678, 200, '汝城县', 3, 0),
(1679, 200, '桂东县', 3, 0),
(1680, 200, '安仁县', 3, 0),
(1681, 201, '雁峰区', 3, 0),
(1682, 201, '珠晖区', 3, 0),
(1683, 201, '石鼓区', 3, 0),
(1684, 201, '蒸湘区', 3, 0),
(1685, 201, '南岳区', 3, 0),
(1686, 201, '耒阳市', 3, 0),
(1687, 201, '常宁市', 3, 0),
(1688, 201, '衡阳县', 3, 0),
(1689, 201, '衡南县', 3, 0),
(1690, 201, '衡山县', 3, 0),
(1691, 201, '衡东县', 3, 0),
(1692, 201, '祁东县', 3, 0),
(1693, 202, '鹤城区', 3, 0),
(1694, 202, '靖州', 3, 0),
(1695, 202, '麻阳', 3, 0),
(1696, 202, '通道', 3, 0),
(1697, 202, '新晃', 3, 0),
(1698, 202, '芷江', 3, 0),
(1699, 202, '沅陵县', 3, 0),
(1700, 202, '辰溪县', 3, 0),
(1701, 202, '溆浦县', 3, 0),
(1702, 202, '中方县', 3, 0),
(1703, 202, '会同县', 3, 0),
(1704, 202, '洪江市', 3, 0),
(1705, 203, '娄星区', 3, 0),
(1706, 203, '冷水江市', 3, 0),
(1707, 203, '涟源市', 3, 0),
(1708, 203, '双峰县', 3, 0),
(1709, 203, '新化县', 3, 0),
(1710, 204, '城步', 3, 0),
(1711, 204, '双清区', 3, 0),
(1712, 204, '大祥区', 3, 0),
(1713, 204, '北塔区', 3, 0),
(1714, 204, '武冈市', 3, 0),
(1715, 204, '邵东县', 3, 0),
(1716, 204, '新邵县', 3, 0),
(1717, 204, '邵阳县', 3, 0),
(1718, 204, '隆回县', 3, 0),
(1719, 204, '洞口县', 3, 0),
(1720, 204, '绥宁县', 3, 0),
(1721, 204, '新宁县', 3, 0),
(1722, 205, '岳塘区', 3, 0),
(1723, 205, '雨湖区', 3, 0),
(1724, 205, '湘乡市', 3, 0),
(1725, 205, '韶山市', 3, 0),
(1726, 205, '湘潭县', 3, 0),
(1727, 206, '吉首市', 3, 0),
(1728, 206, '泸溪县', 3, 0),
(1729, 206, '凤凰县', 3, 0),
(1730, 206, '花垣县', 3, 0),
(1731, 206, '保靖县', 3, 0),
(1732, 206, '古丈县', 3, 0),
(1733, 206, '永顺县', 3, 0),
(1734, 206, '龙山县', 3, 0),
(1735, 207, '赫山区', 3, 0),
(1736, 207, '资阳区', 3, 0),
(1737, 207, '沅江市', 3, 0),
(1738, 207, '南县', 3, 0),
(1739, 207, '桃江县', 3, 0),
(1740, 207, '安化县', 3, 0),
(1741, 208, '江华', 3, 0),
(1742, 208, '冷水滩区', 3, 0),
(1743, 208, '零陵区', 3, 0),
(1744, 208, '祁阳县', 3, 0),
(1745, 208, '东安县', 3, 0),
(1746, 208, '双牌县', 3, 0),
(1747, 208, '道县', 3, 0),
(1748, 208, '江永县', 3, 0),
(1749, 208, '宁远县', 3, 0),
(1750, 208, '蓝山县', 3, 0),
(1751, 208, '新田县', 3, 0),
(1752, 209, '岳阳楼区', 3, 0),
(1753, 209, '君山区', 3, 0),
(1754, 209, '云溪区', 3, 0),
(1755, 209, '汨罗市', 3, 0),
(1756, 209, '临湘市', 3, 0),
(1757, 209, '岳阳县', 3, 0),
(1758, 209, '华容县', 3, 0),
(1759, 209, '湘阴县', 3, 0),
(1760, 209, '平江县', 3, 0),
(1761, 210, '天元区', 3, 0),
(1762, 210, '荷塘区', 3, 0),
(1763, 210, '芦淞区', 3, 0),
(1764, 210, '石峰区', 3, 0),
(1765, 210, '醴陵市', 3, 0),
(1766, 210, '株洲县', 3, 0),
(1767, 210, '攸县', 3, 0);
INSERT INTO `zh_ec_region` (`region_id`, `parent_id`, `region_name`, `region_type`, `agency_id`) VALUES
(1768, 210, '茶陵县', 3, 0),
(1769, 210, '炎陵县', 3, 0),
(1770, 211, '朝阳区', 3, 0),
(1771, 211, '宽城区', 3, 0),
(1772, 211, '二道区', 3, 0),
(1773, 211, '南关区', 3, 0),
(1774, 211, '绿园区', 3, 0),
(1775, 211, '双阳区', 3, 0),
(1776, 211, '净月潭开发区', 3, 0),
(1777, 211, '高新技术开发区', 3, 0),
(1778, 211, '经济技术开发区', 3, 0),
(1779, 211, '汽车产业开发区', 3, 0),
(1780, 211, '德惠市', 3, 0),
(1781, 211, '九台市', 3, 0),
(1782, 211, '榆树市', 3, 0),
(1783, 211, '农安县', 3, 0),
(1784, 212, '船营区', 3, 0),
(1785, 212, '昌邑区', 3, 0),
(1786, 212, '龙潭区', 3, 0),
(1787, 212, '丰满区', 3, 0),
(1788, 212, '蛟河市', 3, 0),
(1789, 212, '桦甸市', 3, 0),
(1790, 212, '舒兰市', 3, 0),
(1791, 212, '磐石市', 3, 0),
(1792, 212, '永吉县', 3, 0),
(1793, 213, '洮北区', 3, 0),
(1794, 213, '洮南市', 3, 0),
(1795, 213, '大安市', 3, 0),
(1796, 213, '镇赉县', 3, 0),
(1797, 213, '通榆县', 3, 0),
(1798, 214, '江源区', 3, 0),
(1799, 214, '八道江区', 3, 0),
(1800, 214, '长白', 3, 0),
(1801, 214, '临江市', 3, 0),
(1802, 214, '抚松县', 3, 0),
(1803, 214, '靖宇县', 3, 0),
(1804, 215, '龙山区', 3, 0),
(1805, 215, '西安区', 3, 0),
(1806, 215, '东丰县', 3, 0),
(1807, 215, '东辽县', 3, 0),
(1808, 216, '铁西区', 3, 0),
(1809, 216, '铁东区', 3, 0),
(1810, 216, '伊通', 3, 0),
(1811, 216, '公主岭市', 3, 0),
(1812, 216, '双辽市', 3, 0),
(1813, 216, '梨树县', 3, 0),
(1814, 217, '前郭尔罗斯', 3, 0),
(1815, 217, '宁江区', 3, 0),
(1816, 217, '长岭县', 3, 0),
(1817, 217, '乾安县', 3, 0),
(1818, 217, '扶余县', 3, 0),
(1819, 218, '东昌区', 3, 0),
(1820, 218, '二道江区', 3, 0),
(1821, 218, '梅河口市', 3, 0),
(1822, 218, '集安市', 3, 0),
(1823, 218, '通化县', 3, 0),
(1824, 218, '辉南县', 3, 0),
(1825, 218, '柳河县', 3, 0),
(1826, 219, '延吉市', 3, 0),
(1827, 219, '图们市', 3, 0),
(1828, 219, '敦化市', 3, 0),
(1829, 219, '珲春市', 3, 0),
(1830, 219, '龙井市', 3, 0),
(1831, 219, '和龙市', 3, 0),
(1832, 219, '安图县', 3, 0),
(1833, 219, '汪清县', 3, 0),
(1834, 220, '玄武区', 3, 0),
(1835, 220, '鼓楼区', 3, 0),
(1836, 220, '白下区', 3, 0),
(1837, 220, '建邺区', 3, 0),
(1838, 220, '秦淮区', 3, 0),
(1839, 220, '雨花台区', 3, 0),
(1840, 220, '下关区', 3, 0),
(1841, 220, '栖霞区', 3, 0),
(1842, 220, '浦口区', 3, 0),
(1843, 220, '江宁区', 3, 0),
(1844, 220, '六合区', 3, 0),
(1845, 220, '溧水县', 3, 0),
(1846, 220, '高淳县', 3, 0),
(1847, 221, '沧浪区', 3, 0),
(1848, 221, '金阊区', 3, 0),
(1849, 221, '平江区', 3, 0),
(1850, 221, '虎丘区', 3, 0),
(1851, 221, '吴中区', 3, 0),
(1852, 221, '相城区', 3, 0),
(1853, 221, '园区', 3, 0),
(1854, 221, '新区', 3, 0),
(1855, 221, '常熟市', 3, 0),
(1856, 221, '张家港市', 3, 0),
(1857, 221, '玉山镇', 3, 0),
(1858, 221, '巴城镇', 3, 0),
(1859, 221, '周市镇', 3, 0),
(1860, 221, '陆家镇', 3, 0),
(1861, 221, '花桥镇', 3, 0),
(1862, 221, '淀山湖镇', 3, 0),
(1863, 221, '张浦镇', 3, 0),
(1864, 221, '周庄镇', 3, 0),
(1865, 221, '千灯镇', 3, 0),
(1866, 221, '锦溪镇', 3, 0),
(1867, 221, '开发区', 3, 0),
(1868, 221, '吴江市', 3, 0),
(1869, 221, '太仓市', 3, 0),
(1870, 222, '崇安区', 3, 0),
(1871, 222, '北塘区', 3, 0),
(1872, 222, '南长区', 3, 0),
(1873, 222, '锡山区', 3, 0),
(1874, 222, '惠山区', 3, 0),
(1875, 222, '滨湖区', 3, 0),
(1876, 222, '新区', 3, 0),
(1877, 222, '江阴市', 3, 0),
(1878, 222, '宜兴市', 3, 0),
(1879, 223, '天宁区', 3, 0),
(1880, 223, '钟楼区', 3, 0),
(1881, 223, '戚墅堰区', 3, 0),
(1882, 223, '郊区', 3, 0),
(1883, 223, '新北区', 3, 0),
(1884, 223, '武进区', 3, 0),
(1885, 223, '溧阳市', 3, 0),
(1886, 223, '金坛市', 3, 0),
(1887, 224, '清河区', 3, 0),
(1888, 224, '清浦区', 3, 0),
(1889, 224, '楚州区', 3, 0),
(1890, 224, '淮阴区', 3, 0),
(1891, 224, '涟水县', 3, 0),
(1892, 224, '洪泽县', 3, 0),
(1893, 224, '盱眙县', 3, 0),
(1894, 224, '金湖县', 3, 0),
(1895, 225, '新浦区', 3, 0),
(1896, 225, '连云区', 3, 0),
(1897, 225, '海州区', 3, 0),
(1898, 225, '赣榆县', 3, 0),
(1899, 225, '东海县', 3, 0),
(1900, 225, '灌云县', 3, 0),
(1901, 225, '灌南县', 3, 0),
(1902, 226, '崇川区', 3, 0),
(1903, 226, '港闸区', 3, 0),
(1904, 226, '经济开发区', 3, 0),
(1905, 226, '启东市', 3, 0),
(1906, 226, '如皋市', 3, 0),
(1907, 226, '通州市', 3, 0),
(1908, 226, '海门市', 3, 0),
(1909, 226, '海安县', 3, 0),
(1910, 226, '如东县', 3, 0),
(1911, 227, '宿城区', 3, 0),
(1912, 227, '宿豫区', 3, 0),
(1913, 227, '宿豫县', 3, 0),
(1914, 227, '沭阳县', 3, 0),
(1915, 227, '泗阳县', 3, 0),
(1916, 227, '泗洪县', 3, 0),
(1917, 228, '海陵区', 3, 0),
(1918, 228, '高港区', 3, 0),
(1919, 228, '兴化市', 3, 0),
(1920, 228, '靖江市', 3, 0),
(1921, 228, '泰兴市', 3, 0),
(1922, 228, '姜堰市', 3, 0),
(1923, 229, '云龙区', 3, 0),
(1924, 229, '鼓楼区', 3, 0),
(1925, 229, '九里区', 3, 0),
(1926, 229, '贾汪区', 3, 0),
(1927, 229, '泉山区', 3, 0),
(1928, 229, '新沂市', 3, 0),
(1929, 229, '邳州市', 3, 0),
(1930, 229, '丰县', 3, 0),
(1931, 229, '沛县', 3, 0),
(1932, 229, '铜山县', 3, 0),
(1933, 229, '睢宁县', 3, 0),
(1934, 230, '城区', 3, 0),
(1935, 230, '亭湖区', 3, 0),
(1936, 230, '盐都区', 3, 0),
(1937, 230, '盐都县', 3, 0),
(1938, 230, '东台市', 3, 0),
(1939, 230, '大丰市', 3, 0),
(1940, 230, '响水县', 3, 0),
(1941, 230, '滨海县', 3, 0),
(1942, 230, '阜宁县', 3, 0),
(1943, 230, '射阳县', 3, 0),
(1944, 230, '建湖县', 3, 0),
(1945, 231, '广陵区', 3, 0),
(1946, 231, '维扬区', 3, 0),
(1947, 231, '邗江区', 3, 0),
(1948, 231, '仪征市', 3, 0),
(1949, 231, '高邮市', 3, 0),
(1950, 231, '江都市', 3, 0),
(1951, 231, '宝应县', 3, 0),
(1952, 232, '京口区', 3, 0),
(1953, 232, '润州区', 3, 0),
(1954, 232, '丹徒区', 3, 0),
(1955, 232, '丹阳市', 3, 0),
(1956, 232, '扬中市', 3, 0),
(1957, 232, '句容市', 3, 0),
(1958, 233, '东湖区', 3, 0),
(1959, 233, '西湖区', 3, 0),
(1960, 233, '青云谱区', 3, 0),
(1961, 233, '湾里区', 3, 0),
(1962, 233, '青山湖区', 3, 0),
(1963, 233, '红谷滩新区', 3, 0),
(1964, 233, '昌北区', 3, 0),
(1965, 233, '高新区', 3, 0),
(1966, 233, '南昌县', 3, 0),
(1967, 233, '新建县', 3, 0),
(1968, 233, '安义县', 3, 0),
(1969, 233, '进贤县', 3, 0),
(1970, 234, '临川区', 3, 0),
(1971, 234, '南城县', 3, 0),
(1972, 234, '黎川县', 3, 0),
(1973, 234, '南丰县', 3, 0),
(1974, 234, '崇仁县', 3, 0),
(1975, 234, '乐安县', 3, 0),
(1976, 234, '宜黄县', 3, 0),
(1977, 234, '金溪县', 3, 0),
(1978, 234, '资溪县', 3, 0),
(1979, 234, '东乡县', 3, 0),
(1980, 234, '广昌县', 3, 0),
(1981, 235, '章贡区', 3, 0),
(1982, 235, '于都县', 3, 0),
(1983, 235, '瑞金市', 3, 0),
(1984, 235, '南康市', 3, 0),
(1985, 235, '赣县', 3, 0),
(1986, 235, '信丰县', 3, 0),
(1987, 235, '大余县', 3, 0),
(1988, 235, '上犹县', 3, 0),
(1989, 235, '崇义县', 3, 0),
(1990, 235, '安远县', 3, 0),
(1991, 235, '龙南县', 3, 0),
(1992, 235, '定南县', 3, 0),
(1993, 235, '全南县', 3, 0),
(1994, 235, '宁都县', 3, 0),
(1995, 235, '兴国县', 3, 0),
(1996, 235, '会昌县', 3, 0),
(1997, 235, '寻乌县', 3, 0),
(1998, 235, '石城县', 3, 0),
(1999, 236, '安福县', 3, 0),
(2000, 236, '吉州区', 3, 0),
(2001, 236, '青原区', 3, 0),
(2002, 236, '井冈山市', 3, 0),
(2003, 236, '吉安县', 3, 0),
(2004, 236, '吉水县', 3, 0),
(2005, 236, '峡江县', 3, 0),
(2006, 236, '新干县', 3, 0),
(2007, 236, '永丰县', 3, 0),
(2008, 236, '泰和县', 3, 0),
(2009, 236, '遂川县', 3, 0),
(2010, 236, '万安县', 3, 0),
(2011, 236, '永新县', 3, 0),
(2012, 237, '珠山区', 3, 0),
(2013, 237, '昌江区', 3, 0),
(2014, 237, '乐平市', 3, 0),
(2015, 237, '浮梁县', 3, 0),
(2016, 238, '浔阳区', 3, 0),
(2017, 238, '庐山区', 3, 0),
(2018, 238, '瑞昌市', 3, 0),
(2019, 238, '九江县', 3, 0),
(2020, 238, '武宁县', 3, 0),
(2021, 238, '修水县', 3, 0),
(2022, 238, '永修县', 3, 0),
(2023, 238, '德安县', 3, 0),
(2024, 238, '星子县', 3, 0),
(2025, 238, '都昌县', 3, 0),
(2026, 238, '湖口县', 3, 0),
(2027, 238, '彭泽县', 3, 0),
(2028, 239, '安源区', 3, 0),
(2029, 239, '湘东区', 3, 0),
(2030, 239, '莲花县', 3, 0),
(2031, 239, '芦溪县', 3, 0),
(2032, 239, '上栗县', 3, 0),
(2033, 240, '信州区', 3, 0),
(2034, 240, '德兴市', 3, 0),
(2035, 240, '上饶县', 3, 0),
(2036, 240, '广丰县', 3, 0),
(2037, 240, '玉山县', 3, 0),
(2038, 240, '铅山县', 3, 0),
(2039, 240, '横峰县', 3, 0),
(2040, 240, '弋阳县', 3, 0),
(2041, 240, '余干县', 3, 0),
(2042, 240, '波阳县', 3, 0),
(2043, 240, '万年县', 3, 0),
(2044, 240, '婺源县', 3, 0),
(2045, 241, '渝水区', 3, 0),
(2046, 241, '分宜县', 3, 0),
(2047, 242, '袁州区', 3, 0),
(2048, 242, '丰城市', 3, 0),
(2049, 242, '樟树市', 3, 0),
(2050, 242, '高安市', 3, 0),
(2051, 242, '奉新县', 3, 0),
(2052, 242, '万载县', 3, 0),
(2053, 242, '上高县', 3, 0),
(2054, 242, '宜丰县', 3, 0),
(2055, 242, '靖安县', 3, 0),
(2056, 242, '铜鼓县', 3, 0),
(2057, 243, '月湖区', 3, 0),
(2058, 243, '贵溪市', 3, 0),
(2059, 243, '余江县', 3, 0),
(2060, 244, '沈河区', 3, 0),
(2061, 244, '皇姑区', 3, 0),
(2062, 244, '和平区', 3, 0),
(2063, 244, '大东区', 3, 0),
(2064, 244, '铁西区', 3, 0),
(2065, 244, '苏家屯区', 3, 0),
(2066, 244, '东陵区', 3, 0),
(2067, 244, '沈北新区', 3, 0),
(2068, 244, '于洪区', 3, 0),
(2069, 244, '浑南新区', 3, 0),
(2070, 244, '新民市', 3, 0),
(2071, 244, '辽中县', 3, 0),
(2072, 244, '康平县', 3, 0),
(2073, 244, '法库县', 3, 0),
(2074, 245, '西岗区', 3, 0),
(2075, 245, '中山区', 3, 0),
(2076, 245, '沙河口区', 3, 0),
(2077, 245, '甘井子区', 3, 0),
(2078, 245, '旅顺口区', 3, 0),
(2079, 245, '金州区', 3, 0),
(2080, 245, '开发区', 3, 0),
(2081, 245, '瓦房店市', 3, 0),
(2082, 245, '普兰店市', 3, 0),
(2083, 245, '庄河市', 3, 0),
(2084, 245, '长海县', 3, 0),
(2085, 246, '铁东区', 3, 0),
(2086, 246, '铁西区', 3, 0),
(2087, 246, '立山区', 3, 0),
(2088, 246, '千山区', 3, 0),
(2089, 246, '岫岩', 3, 0),
(2090, 246, '海城市', 3, 0),
(2091, 246, '台安县', 3, 0),
(2092, 247, '本溪', 3, 0),
(2093, 247, '平山区', 3, 0),
(2094, 247, '明山区', 3, 0),
(2095, 247, '溪湖区', 3, 0),
(2096, 247, '南芬区', 3, 0),
(2097, 247, '桓仁', 3, 0),
(2098, 248, '双塔区', 3, 0),
(2099, 248, '龙城区', 3, 0),
(2100, 248, '喀喇沁左翼蒙古族自治县', 3, 0),
(2101, 248, '北票市', 3, 0),
(2102, 248, '凌源市', 3, 0),
(2103, 248, '朝阳县', 3, 0),
(2104, 248, '建平县', 3, 0),
(2105, 249, '振兴区', 3, 0),
(2106, 249, '元宝区', 3, 0),
(2107, 249, '振安区', 3, 0),
(2108, 249, '宽甸', 3, 0),
(2109, 249, '东港市', 3, 0),
(2110, 249, '凤城市', 3, 0),
(2111, 250, '顺城区', 3, 0),
(2112, 250, '新抚区', 3, 0),
(2113, 250, '东洲区', 3, 0),
(2114, 250, '望花区', 3, 0),
(2115, 250, '清原', 3, 0),
(2116, 250, '新宾', 3, 0),
(2117, 250, '抚顺县', 3, 0),
(2118, 251, '阜新', 3, 0),
(2119, 251, '海州区', 3, 0),
(2120, 251, '新邱区', 3, 0),
(2121, 251, '太平区', 3, 0),
(2122, 251, '清河门区', 3, 0),
(2123, 251, '细河区', 3, 0),
(2124, 251, '彰武县', 3, 0),
(2125, 252, '龙港区', 3, 0),
(2126, 252, '南票区', 3, 0),
(2127, 252, '连山区', 3, 0),
(2128, 252, '兴城市', 3, 0),
(2129, 252, '绥中县', 3, 0),
(2130, 252, '建昌县', 3, 0),
(2131, 253, '太和区', 3, 0),
(2132, 253, '古塔区', 3, 0),
(2133, 253, '凌河区', 3, 0),
(2134, 253, '凌海市', 3, 0),
(2135, 253, '北镇市', 3, 0),
(2136, 253, '黑山县', 3, 0),
(2137, 253, '义县', 3, 0),
(2138, 254, '白塔区', 3, 0),
(2139, 254, '文圣区', 3, 0),
(2140, 254, '宏伟区', 3, 0),
(2141, 254, '太子河区', 3, 0),
(2142, 254, '弓长岭区', 3, 0),
(2143, 254, '灯塔市', 3, 0),
(2144, 254, '辽阳县', 3, 0),
(2145, 255, '双台子区', 3, 0),
(2146, 255, '兴隆台区', 3, 0),
(2147, 255, '大洼县', 3, 0),
(2148, 255, '盘山县', 3, 0),
(2149, 256, '银州区', 3, 0),
(2150, 256, '清河区', 3, 0),
(2151, 256, '调兵山市', 3, 0),
(2152, 256, '开原市', 3, 0),
(2153, 256, '铁岭县', 3, 0),
(2154, 256, '西丰县', 3, 0),
(2155, 256, '昌图县', 3, 0),
(2156, 257, '站前区', 3, 0),
(2157, 257, '西市区', 3, 0),
(2158, 257, '鲅鱼圈区', 3, 0),
(2159, 257, '老边区', 3, 0),
(2160, 257, '盖州市', 3, 0),
(2161, 257, '大石桥市', 3, 0),
(2162, 258, '回民区', 3, 0),
(2163, 258, '玉泉区', 3, 0),
(2164, 258, '新城区', 3, 0),
(2165, 258, '赛罕区', 3, 0),
(2166, 258, '清水河县', 3, 0),
(2167, 258, '土默特左旗', 3, 0),
(2168, 258, '托克托县', 3, 0),
(2169, 258, '和林格尔县', 3, 0),
(2170, 258, '武川县', 3, 0),
(2171, 259, '阿拉善左旗', 3, 0),
(2172, 259, '阿拉善右旗', 3, 0),
(2173, 259, '额济纳旗', 3, 0),
(2174, 260, '临河区', 3, 0),
(2175, 260, '五原县', 3, 0),
(2176, 260, '磴口县', 3, 0),
(2177, 260, '乌拉特前旗', 3, 0),
(2178, 260, '乌拉特中旗', 3, 0),
(2179, 260, '乌拉特后旗', 3, 0),
(2180, 260, '杭锦后旗', 3, 0),
(2181, 261, '昆都仑区', 3, 0),
(2182, 261, '青山区', 3, 0),
(2183, 261, '东河区', 3, 0),
(2184, 261, '九原区', 3, 0),
(2185, 261, '石拐区', 3, 0),
(2186, 261, '白云矿区', 3, 0),
(2187, 261, '土默特右旗', 3, 0),
(2188, 261, '固阳县', 3, 0),
(2189, 261, '达尔罕茂明安联合旗', 3, 0),
(2190, 262, '红山区', 3, 0),
(2191, 262, '元宝山区', 3, 0),
(2192, 262, '松山区', 3, 0),
(2193, 262, '阿鲁科尔沁旗', 3, 0),
(2194, 262, '巴林左旗', 3, 0),
(2195, 262, '巴林右旗', 3, 0),
(2196, 262, '林西县', 3, 0),
(2197, 262, '克什克腾旗', 3, 0),
(2198, 262, '翁牛特旗', 3, 0),
(2199, 262, '喀喇沁旗', 3, 0),
(2200, 262, '宁城县', 3, 0),
(2201, 262, '敖汉旗', 3, 0),
(2202, 263, '东胜区', 3, 0),
(2203, 263, '达拉特旗', 3, 0),
(2204, 263, '准格尔旗', 3, 0),
(2205, 263, '鄂托克前旗', 3, 0),
(2206, 263, '鄂托克旗', 3, 0),
(2207, 263, '杭锦旗', 3, 0),
(2208, 263, '乌审旗', 3, 0),
(2209, 263, '伊金霍洛旗', 3, 0),
(2210, 264, '海拉尔区', 3, 0),
(2211, 264, '莫力达瓦', 3, 0),
(2212, 264, '满洲里市', 3, 0),
(2213, 264, '牙克石市', 3, 0),
(2214, 264, '扎兰屯市', 3, 0),
(2215, 264, '额尔古纳市', 3, 0),
(2216, 264, '根河市', 3, 0),
(2217, 264, '阿荣旗', 3, 0),
(2218, 264, '鄂伦春自治旗', 3, 0),
(2219, 264, '鄂温克族自治旗', 3, 0),
(2220, 264, '陈巴尔虎旗', 3, 0),
(2221, 264, '新巴尔虎左旗', 3, 0),
(2222, 264, '新巴尔虎右旗', 3, 0),
(2223, 265, '科尔沁区', 3, 0),
(2224, 265, '霍林郭勒市', 3, 0),
(2225, 265, '科尔沁左翼中旗', 3, 0),
(2226, 265, '科尔沁左翼后旗', 3, 0),
(2227, 265, '开鲁县', 3, 0),
(2228, 265, '库伦旗', 3, 0),
(2229, 265, '奈曼旗', 3, 0),
(2230, 265, '扎鲁特旗', 3, 0),
(2231, 266, '海勃湾区', 3, 0),
(2232, 266, '乌达区', 3, 0),
(2233, 266, '海南区', 3, 0),
(2234, 267, '化德县', 3, 0),
(2235, 267, '集宁区', 3, 0),
(2236, 267, '丰镇市', 3, 0),
(2237, 267, '卓资县', 3, 0),
(2238, 267, '商都县', 3, 0),
(2239, 267, '兴和县', 3, 0),
(2240, 267, '凉城县', 3, 0),
(2241, 267, '察哈尔右翼前旗', 3, 0),
(2242, 267, '察哈尔右翼中旗', 3, 0),
(2243, 267, '察哈尔右翼后旗', 3, 0),
(2244, 267, '四子王旗', 3, 0),
(2245, 268, '二连浩特市', 3, 0),
(2246, 268, '锡林浩特市', 3, 0),
(2247, 268, '阿巴嘎旗', 3, 0),
(2248, 268, '苏尼特左旗', 3, 0),
(2249, 268, '苏尼特右旗', 3, 0),
(2250, 268, '东乌珠穆沁旗', 3, 0),
(2251, 268, '西乌珠穆沁旗', 3, 0),
(2252, 268, '太仆寺旗', 3, 0),
(2253, 268, '镶黄旗', 3, 0),
(2254, 268, '正镶白旗', 3, 0),
(2255, 268, '正蓝旗', 3, 0),
(2256, 268, '多伦县', 3, 0),
(2257, 269, '乌兰浩特市', 3, 0),
(2258, 269, '阿尔山市', 3, 0),
(2259, 269, '科尔沁右翼前旗', 3, 0),
(2260, 269, '科尔沁右翼中旗', 3, 0),
(2261, 269, '扎赉特旗', 3, 0),
(2262, 269, '突泉县', 3, 0),
(2263, 270, '西夏区', 3, 0),
(2264, 270, '金凤区', 3, 0),
(2265, 270, '兴庆区', 3, 0),
(2266, 270, '灵武市', 3, 0),
(2267, 270, '永宁县', 3, 0),
(2268, 270, '贺兰县', 3, 0),
(2269, 271, '原州区', 3, 0),
(2270, 271, '海原县', 3, 0),
(2271, 271, '西吉县', 3, 0),
(2272, 271, '隆德县', 3, 0),
(2273, 271, '泾源县', 3, 0),
(2274, 271, '彭阳县', 3, 0),
(2275, 272, '惠农县', 3, 0),
(2276, 272, '大武口区', 3, 0),
(2277, 272, '惠农区', 3, 0),
(2278, 272, '陶乐县', 3, 0),
(2279, 272, '平罗县', 3, 0),
(2280, 273, '利通区', 3, 0),
(2281, 273, '中卫县', 3, 0),
(2282, 273, '青铜峡市', 3, 0),
(2283, 273, '中宁县', 3, 0),
(2284, 273, '盐池县', 3, 0),
(2285, 273, '同心县', 3, 0),
(2286, 274, '沙坡头区', 3, 0),
(2287, 274, '海原县', 3, 0),
(2288, 274, '中宁县', 3, 0),
(2289, 275, '城中区', 3, 0),
(2290, 275, '城东区', 3, 0),
(2291, 275, '城西区', 3, 0),
(2292, 275, '城北区', 3, 0),
(2293, 275, '湟中县', 3, 0),
(2294, 275, '湟源县', 3, 0),
(2295, 275, '大通', 3, 0),
(2296, 276, '玛沁县', 3, 0),
(2297, 276, '班玛县', 3, 0),
(2298, 276, '甘德县', 3, 0),
(2299, 276, '达日县', 3, 0),
(2300, 276, '久治县', 3, 0),
(2301, 276, '玛多县', 3, 0),
(2302, 277, '海晏县', 3, 0),
(2303, 277, '祁连县', 3, 0),
(2304, 277, '刚察县', 3, 0),
(2305, 277, '门源', 3, 0),
(2306, 278, '平安县', 3, 0),
(2307, 278, '乐都县', 3, 0),
(2308, 278, '民和', 3, 0),
(2309, 278, '互助', 3, 0),
(2310, 278, '化隆', 3, 0),
(2311, 278, '循化', 3, 0),
(2312, 279, '共和县', 3, 0),
(2313, 279, '同德县', 3, 0),
(2314, 279, '贵德县', 3, 0),
(2315, 279, '兴海县', 3, 0),
(2316, 279, '贵南县', 3, 0),
(2317, 280, '德令哈市', 3, 0),
(2318, 280, '格尔木市', 3, 0),
(2319, 280, '乌兰县', 3, 0),
(2320, 280, '都兰县', 3, 0),
(2321, 280, '天峻县', 3, 0),
(2322, 281, '同仁县', 3, 0),
(2323, 281, '尖扎县', 3, 0),
(2324, 281, '泽库县', 3, 0),
(2325, 281, '河南蒙古族自治县', 3, 0),
(2326, 282, '玉树县', 3, 0),
(2327, 282, '杂多县', 3, 0),
(2328, 282, '称多县', 3, 0),
(2329, 282, '治多县', 3, 0),
(2330, 282, '囊谦县', 3, 0),
(2331, 282, '曲麻莱县', 3, 0),
(2332, 283, '市中区', 3, 0),
(2333, 283, '历下区', 3, 0),
(2334, 283, '天桥区', 3, 0),
(2335, 283, '槐荫区', 3, 0),
(2336, 283, '历城区', 3, 0),
(2337, 283, '长清区', 3, 0),
(2338, 283, '章丘市', 3, 0),
(2339, 283, '平阴县', 3, 0),
(2340, 283, '济阳县', 3, 0),
(2341, 283, '商河县', 3, 0),
(2342, 284, '市南区', 3, 0),
(2343, 284, '市北区', 3, 0),
(2344, 284, '城阳区', 3, 0),
(2345, 284, '四方区', 3, 0),
(2346, 284, '李沧区', 3, 0),
(2347, 284, '黄岛区', 3, 0),
(2348, 284, '崂山区', 3, 0),
(2349, 284, '胶州市', 3, 0),
(2350, 284, '即墨市', 3, 0),
(2351, 284, '平度市', 3, 0),
(2352, 284, '胶南市', 3, 0),
(2353, 284, '莱西市', 3, 0),
(2354, 285, '滨城区', 3, 0),
(2355, 285, '惠民县', 3, 0),
(2356, 285, '阳信县', 3, 0),
(2357, 285, '无棣县', 3, 0),
(2358, 285, '沾化县', 3, 0),
(2359, 285, '博兴县', 3, 0),
(2360, 285, '邹平县', 3, 0),
(2361, 286, '德城区', 3, 0),
(2362, 286, '陵县', 3, 0),
(2363, 286, '乐陵市', 3, 0),
(2364, 286, '禹城市', 3, 0),
(2365, 286, '宁津县', 3, 0),
(2366, 286, '庆云县', 3, 0),
(2367, 286, '临邑县', 3, 0),
(2368, 286, '齐河县', 3, 0),
(2369, 286, '平原县', 3, 0),
(2370, 286, '夏津县', 3, 0),
(2371, 286, '武城县', 3, 0),
(2372, 287, '东营区', 3, 0),
(2373, 287, '河口区', 3, 0),
(2374, 287, '垦利县', 3, 0),
(2375, 287, '利津县', 3, 0),
(2376, 287, '广饶县', 3, 0),
(2377, 288, '牡丹区', 3, 0),
(2378, 288, '曹县', 3, 0),
(2379, 288, '单县', 3, 0),
(2380, 288, '成武县', 3, 0),
(2381, 288, '巨野县', 3, 0),
(2382, 288, '郓城县', 3, 0),
(2383, 288, '鄄城县', 3, 0),
(2384, 288, '定陶县', 3, 0),
(2385, 288, '东明县', 3, 0),
(2386, 289, '市中区', 3, 0),
(2387, 289, '任城区', 3, 0),
(2388, 289, '曲阜市', 3, 0),
(2389, 289, '兖州市', 3, 0),
(2390, 289, '邹城市', 3, 0),
(2391, 289, '微山县', 3, 0),
(2392, 289, '鱼台县', 3, 0),
(2393, 289, '金乡县', 3, 0),
(2394, 289, '嘉祥县', 3, 0),
(2395, 289, '汶上县', 3, 0),
(2396, 289, '泗水县', 3, 0),
(2397, 289, '梁山县', 3, 0),
(2398, 290, '莱城区', 3, 0),
(2399, 290, '钢城区', 3, 0),
(2400, 291, '东昌府区', 3, 0),
(2401, 291, '临清市', 3, 0),
(2402, 291, '阳谷县', 3, 0),
(2403, 291, '莘县', 3, 0),
(2404, 291, '茌平县', 3, 0),
(2405, 291, '东阿县', 3, 0),
(2406, 291, '冠县', 3, 0),
(2407, 291, '高唐县', 3, 0),
(2408, 292, '兰山区', 3, 0),
(2409, 292, '罗庄区', 3, 0),
(2410, 292, '河东区', 3, 0),
(2411, 292, '沂南县', 3, 0),
(2412, 292, '郯城县', 3, 0),
(2413, 292, '沂水县', 3, 0),
(2414, 292, '苍山县', 3, 0),
(2415, 292, '费县', 3, 0),
(2416, 292, '平邑县', 3, 0),
(2417, 292, '莒南县', 3, 0),
(2418, 292, '蒙阴县', 3, 0),
(2419, 292, '临沭县', 3, 0),
(2420, 293, '东港区', 3, 0),
(2421, 293, '岚山区', 3, 0),
(2422, 293, '五莲县', 3, 0),
(2423, 293, '莒县', 3, 0),
(2424, 294, '泰山区', 3, 0),
(2425, 294, '岱岳区', 3, 0),
(2426, 294, '新泰市', 3, 0),
(2427, 294, '肥城市', 3, 0),
(2428, 294, '宁阳县', 3, 0),
(2429, 294, '东平县', 3, 0),
(2430, 295, '荣成市', 3, 0),
(2431, 295, '乳山市', 3, 0),
(2432, 295, '环翠区', 3, 0),
(2433, 295, '文登市', 3, 0),
(2434, 296, '潍城区', 3, 0),
(2435, 296, '寒亭区', 3, 0),
(2436, 296, '坊子区', 3, 0),
(2437, 296, '奎文区', 3, 0),
(2438, 296, '青州市', 3, 0),
(2439, 296, '诸城市', 3, 0),
(2440, 296, '寿光市', 3, 0),
(2441, 296, '安丘市', 3, 0),
(2442, 296, '高密市', 3, 0),
(2443, 296, '昌邑市', 3, 0),
(2444, 296, '临朐县', 3, 0),
(2445, 296, '昌乐县', 3, 0),
(2446, 297, '芝罘区', 3, 0),
(2447, 297, '福山区', 3, 0),
(2448, 297, '牟平区', 3, 0),
(2449, 297, '莱山区', 3, 0),
(2450, 297, '开发区', 3, 0),
(2451, 297, '龙口市', 3, 0),
(2452, 297, '莱阳市', 3, 0),
(2453, 297, '莱州市', 3, 0),
(2454, 297, '蓬莱市', 3, 0),
(2455, 297, '招远市', 3, 0),
(2456, 297, '栖霞市', 3, 0),
(2457, 297, '海阳市', 3, 0),
(2458, 297, '长岛县', 3, 0),
(2459, 298, '市中区', 3, 0),
(2460, 298, '山亭区', 3, 0),
(2461, 298, '峄城区', 3, 0),
(2462, 298, '台儿庄区', 3, 0),
(2463, 298, '薛城区', 3, 0),
(2464, 298, '滕州市', 3, 0),
(2465, 299, '张店区', 3, 0),
(2466, 299, '临淄区', 3, 0),
(2467, 299, '淄川区', 3, 0),
(2468, 299, '博山区', 3, 0),
(2469, 299, '周村区', 3, 0),
(2470, 299, '桓台县', 3, 0),
(2471, 299, '高青县', 3, 0),
(2472, 299, '沂源县', 3, 0),
(2473, 300, '杏花岭区', 3, 0),
(2474, 300, '小店区', 3, 0),
(2475, 300, '迎泽区', 3, 0),
(2476, 300, '尖草坪区', 3, 0),
(2477, 300, '万柏林区', 3, 0),
(2478, 300, '晋源区', 3, 0),
(2479, 300, '高新开发区', 3, 0),
(2480, 300, '民营经济开发区', 3, 0),
(2481, 300, '经济技术开发区', 3, 0),
(2482, 300, '清徐县', 3, 0),
(2483, 300, '阳曲县', 3, 0),
(2484, 300, '娄烦县', 3, 0),
(2485, 300, '古交市', 3, 0),
(2486, 301, '城区', 3, 0),
(2487, 301, '郊区', 3, 0),
(2488, 301, '沁县', 3, 0),
(2489, 301, '潞城市', 3, 0),
(2490, 301, '长治县', 3, 0),
(2491, 301, '襄垣县', 3, 0),
(2492, 301, '屯留县', 3, 0),
(2493, 301, '平顺县', 3, 0),
(2494, 301, '黎城县', 3, 0),
(2495, 301, '壶关县', 3, 0),
(2496, 301, '长子县', 3, 0),
(2497, 301, '武乡县', 3, 0),
(2498, 301, '沁源县', 3, 0),
(2499, 302, '城区', 3, 0),
(2500, 302, '矿区', 3, 0),
(2501, 302, '南郊区', 3, 0),
(2502, 302, '新荣区', 3, 0),
(2503, 302, '阳高县', 3, 0),
(2504, 302, '天镇县', 3, 0),
(2505, 302, '广灵县', 3, 0),
(2506, 302, '灵丘县', 3, 0),
(2507, 302, '浑源县', 3, 0),
(2508, 302, '左云县', 3, 0),
(2509, 302, '大同县', 3, 0),
(2510, 303, '城区', 3, 0),
(2511, 303, '高平市', 3, 0),
(2512, 303, '沁水县', 3, 0),
(2513, 303, '阳城县', 3, 0),
(2514, 303, '陵川县', 3, 0),
(2515, 303, '泽州县', 3, 0),
(2516, 304, '榆次区', 3, 0),
(2517, 304, '介休市', 3, 0),
(2518, 304, '榆社县', 3, 0),
(2519, 304, '左权县', 3, 0),
(2520, 304, '和顺县', 3, 0),
(2521, 304, '昔阳县', 3, 0),
(2522, 304, '寿阳县', 3, 0),
(2523, 304, '太谷县', 3, 0),
(2524, 304, '祁县', 3, 0),
(2525, 304, '平遥县', 3, 0),
(2526, 304, '灵石县', 3, 0),
(2527, 305, '尧都区', 3, 0),
(2528, 305, '侯马市', 3, 0),
(2529, 305, '霍州市', 3, 0),
(2530, 305, '曲沃县', 3, 0),
(2531, 305, '翼城县', 3, 0),
(2532, 305, '襄汾县', 3, 0),
(2533, 305, '洪洞县', 3, 0),
(2534, 305, '吉县', 3, 0),
(2535, 305, '安泽县', 3, 0),
(2536, 305, '浮山县', 3, 0),
(2537, 305, '古县', 3, 0),
(2538, 305, '乡宁县', 3, 0),
(2539, 305, '大宁县', 3, 0),
(2540, 305, '隰县', 3, 0),
(2541, 305, '永和县', 3, 0),
(2542, 305, '蒲县', 3, 0),
(2543, 305, '汾西县', 3, 0),
(2544, 306, '离石市', 3, 0),
(2545, 306, '离石区', 3, 0),
(2546, 306, '孝义市', 3, 0),
(2547, 306, '汾阳市', 3, 0),
(2548, 306, '文水县', 3, 0),
(2549, 306, '交城县', 3, 0),
(2550, 306, '兴县', 3, 0),
(2551, 306, '临县', 3, 0),
(2552, 306, '柳林县', 3, 0),
(2553, 306, '石楼县', 3, 0),
(2554, 306, '岚县', 3, 0),
(2555, 306, '方山县', 3, 0),
(2556, 306, '中阳县', 3, 0),
(2557, 306, '交口县', 3, 0),
(2558, 307, '朔城区', 3, 0),
(2559, 307, '平鲁区', 3, 0),
(2560, 307, '山阴县', 3, 0),
(2561, 307, '应县', 3, 0),
(2562, 307, '右玉县', 3, 0),
(2563, 307, '怀仁县', 3, 0),
(2564, 308, '忻府区', 3, 0),
(2565, 308, '原平市', 3, 0),
(2566, 308, '定襄县', 3, 0),
(2567, 308, '五台县', 3, 0),
(2568, 308, '代县', 3, 0),
(2569, 308, '繁峙县', 3, 0),
(2570, 308, '宁武县', 3, 0),
(2571, 308, '静乐县', 3, 0),
(2572, 308, '神池县', 3, 0),
(2573, 308, '五寨县', 3, 0),
(2574, 308, '岢岚县', 3, 0),
(2575, 308, '河曲县', 3, 0),
(2576, 308, '保德县', 3, 0),
(2577, 308, '偏关县', 3, 0),
(2578, 309, '城区', 3, 0),
(2579, 309, '矿区', 3, 0),
(2580, 309, '郊区', 3, 0),
(2581, 309, '平定县', 3, 0),
(2582, 309, '盂县', 3, 0),
(2583, 310, '盐湖区', 3, 0),
(2584, 310, '永济市', 3, 0),
(2585, 310, '河津市', 3, 0),
(2586, 310, '临猗县', 3, 0),
(2587, 310, '万荣县', 3, 0),
(2588, 310, '闻喜县', 3, 0),
(2589, 310, '稷山县', 3, 0),
(2590, 310, '新绛县', 3, 0),
(2591, 310, '绛县', 3, 0),
(2592, 310, '垣曲县', 3, 0),
(2593, 310, '夏县', 3, 0),
(2594, 310, '平陆县', 3, 0),
(2595, 310, '芮城县', 3, 0),
(2596, 311, '莲湖区', 3, 0),
(2597, 311, '新城区', 3, 0),
(2598, 311, '碑林区', 3, 0),
(2599, 311, '雁塔区', 3, 0),
(2600, 311, '灞桥区', 3, 0),
(2601, 311, '未央区', 3, 0),
(2602, 311, '阎良区', 3, 0),
(2603, 311, '临潼区', 3, 0),
(2604, 311, '长安区', 3, 0),
(2605, 311, '蓝田县', 3, 0),
(2606, 311, '周至县', 3, 0),
(2607, 311, '户县', 3, 0),
(2608, 311, '高陵县', 3, 0),
(2609, 312, '汉滨区', 3, 0),
(2610, 312, '汉阴县', 3, 0),
(2611, 312, '石泉县', 3, 0),
(2612, 312, '宁陕县', 3, 0),
(2613, 312, '紫阳县', 3, 0),
(2614, 312, '岚皋县', 3, 0),
(2615, 312, '平利县', 3, 0),
(2616, 312, '镇坪县', 3, 0),
(2617, 312, '旬阳县', 3, 0),
(2618, 312, '白河县', 3, 0),
(2619, 313, '陈仓区', 3, 0),
(2620, 313, '渭滨区', 3, 0),
(2621, 313, '金台区', 3, 0),
(2622, 313, '凤翔县', 3, 0),
(2623, 313, '岐山县', 3, 0),
(2624, 313, '扶风县', 3, 0),
(2625, 313, '眉县', 3, 0),
(2626, 313, '陇县', 3, 0),
(2627, 313, '千阳县', 3, 0),
(2628, 313, '麟游县', 3, 0),
(2629, 313, '凤县', 3, 0),
(2630, 313, '太白县', 3, 0),
(2631, 314, '汉台区', 3, 0),
(2632, 314, '南郑县', 3, 0),
(2633, 314, '城固县', 3, 0),
(2634, 314, '洋县', 3, 0),
(2635, 314, '西乡县', 3, 0),
(2636, 314, '勉县', 3, 0),
(2637, 314, '宁强县', 3, 0),
(2638, 314, '略阳县', 3, 0),
(2639, 314, '镇巴县', 3, 0),
(2640, 314, '留坝县', 3, 0),
(2641, 314, '佛坪县', 3, 0),
(2642, 315, '商州区', 3, 0),
(2643, 315, '洛南县', 3, 0),
(2644, 315, '丹凤县', 3, 0),
(2645, 315, '商南县', 3, 0),
(2646, 315, '山阳县', 3, 0),
(2647, 315, '镇安县', 3, 0),
(2648, 315, '柞水县', 3, 0),
(2649, 316, '耀州区', 3, 0),
(2650, 316, '王益区', 3, 0),
(2651, 316, '印台区', 3, 0),
(2652, 316, '宜君县', 3, 0),
(2653, 317, '临渭区', 3, 0),
(2654, 317, '韩城市', 3, 0),
(2655, 317, '华阴市', 3, 0),
(2656, 317, '华县', 3, 0),
(2657, 317, '潼关县', 3, 0),
(2658, 317, '大荔县', 3, 0),
(2659, 317, '合阳县', 3, 0),
(2660, 317, '澄城县', 3, 0),
(2661, 317, '蒲城县', 3, 0),
(2662, 317, '白水县', 3, 0),
(2663, 317, '富平县', 3, 0),
(2664, 318, '秦都区', 3, 0),
(2665, 318, '渭城区', 3, 0),
(2666, 318, '杨陵区', 3, 0),
(2667, 318, '兴平市', 3, 0),
(2668, 318, '三原县', 3, 0),
(2669, 318, '泾阳县', 3, 0),
(2670, 318, '乾县', 3, 0),
(2671, 318, '礼泉县', 3, 0),
(2672, 318, '永寿县', 3, 0),
(2673, 318, '彬县', 3, 0),
(2674, 318, '长武县', 3, 0),
(2675, 318, '旬邑县', 3, 0),
(2676, 318, '淳化县', 3, 0),
(2677, 318, '武功县', 3, 0),
(2678, 319, '吴起县', 3, 0),
(2679, 319, '宝塔区', 3, 0),
(2680, 319, '延长县', 3, 0),
(2681, 319, '延川县', 3, 0),
(2682, 319, '子长县', 3, 0),
(2683, 319, '安塞县', 3, 0),
(2684, 319, '志丹县', 3, 0),
(2685, 319, '甘泉县', 3, 0),
(2686, 319, '富县', 3, 0),
(2687, 319, '洛川县', 3, 0),
(2688, 319, '宜川县', 3, 0),
(2689, 319, '黄龙县', 3, 0),
(2690, 319, '黄陵县', 3, 0),
(2691, 320, '榆阳区', 3, 0),
(2692, 320, '神木县', 3, 0),
(2693, 320, '府谷县', 3, 0),
(2694, 320, '横山县', 3, 0),
(2695, 320, '靖边县', 3, 0),
(2696, 320, '定边县', 3, 0),
(2697, 320, '绥德县', 3, 0),
(2698, 320, '米脂县', 3, 0),
(2699, 320, '佳县', 3, 0),
(2700, 320, '吴堡县', 3, 0),
(2701, 320, '清涧县', 3, 0),
(2702, 320, '子洲县', 3, 0),
(2703, 321, '长宁区', 3, 0),
(2704, 321, '闸北区', 3, 0),
(2705, 321, '闵行区', 3, 0),
(2706, 321, '徐汇区', 3, 0),
(2707, 321, '浦东新区', 3, 0),
(2708, 321, '杨浦区', 3, 0),
(2709, 321, '普陀区', 3, 0),
(2710, 321, '静安区', 3, 0),
(2711, 321, '卢湾区', 3, 0),
(2712, 321, '虹口区', 3, 0),
(2713, 321, '黄浦区', 3, 0),
(2714, 321, '南汇区', 3, 0),
(2715, 321, '松江区', 3, 0),
(2716, 321, '嘉定区', 3, 0),
(2717, 321, '宝山区', 3, 0),
(2718, 321, '青浦区', 3, 0),
(2719, 321, '金山区', 3, 0),
(2720, 321, '奉贤区', 3, 0),
(2721, 321, '崇明县', 3, 0),
(2722, 322, '青羊区', 3, 0),
(2723, 322, '锦江区', 3, 0),
(2724, 322, '金牛区', 3, 0),
(2725, 322, '武侯区', 3, 0),
(2726, 322, '成华区', 3, 0),
(2727, 322, '龙泉驿区', 3, 0),
(2728, 322, '青白江区', 3, 0),
(2729, 322, '新都区', 3, 0),
(2730, 322, '温江区', 3, 0),
(2731, 322, '高新区', 3, 0),
(2732, 322, '高新西区', 3, 0),
(2733, 322, '都江堰市', 3, 0),
(2734, 322, '彭州市', 3, 0),
(2735, 322, '邛崃市', 3, 0),
(2736, 322, '崇州市', 3, 0),
(2737, 322, '金堂县', 3, 0),
(2738, 322, '双流县', 3, 0),
(2739, 322, '郫县', 3, 0),
(2740, 322, '大邑县', 3, 0),
(2741, 322, '蒲江县', 3, 0),
(2742, 322, '新津县', 3, 0),
(2743, 322, '都江堰市', 3, 0),
(2744, 322, '彭州市', 3, 0),
(2745, 322, '邛崃市', 3, 0),
(2746, 322, '崇州市', 3, 0),
(2747, 322, '金堂县', 3, 0),
(2748, 322, '双流县', 3, 0),
(2749, 322, '郫县', 3, 0),
(2750, 322, '大邑县', 3, 0),
(2751, 322, '蒲江县', 3, 0),
(2752, 322, '新津县', 3, 0),
(2753, 323, '涪城区', 3, 0),
(2754, 323, '游仙区', 3, 0),
(2755, 323, '江油市', 3, 0),
(2756, 323, '盐亭县', 3, 0),
(2757, 323, '三台县', 3, 0),
(2758, 323, '平武县', 3, 0),
(2759, 323, '安县', 3, 0),
(2760, 323, '梓潼县', 3, 0),
(2761, 323, '北川县', 3, 0),
(2762, 324, '马尔康县', 3, 0),
(2763, 324, '汶川县', 3, 0),
(2764, 324, '理县', 3, 0),
(2765, 324, '茂县', 3, 0),
(2766, 324, '松潘县', 3, 0),
(2767, 324, '九寨沟县', 3, 0),
(2768, 324, '金川县', 3, 0),
(2769, 324, '小金县', 3, 0),
(2770, 324, '黑水县', 3, 0),
(2771, 324, '壤塘县', 3, 0),
(2772, 324, '阿坝县', 3, 0),
(2773, 324, '若尔盖县', 3, 0),
(2774, 324, '红原县', 3, 0),
(2775, 325, '巴州区', 3, 0),
(2776, 325, '通江县', 3, 0),
(2777, 325, '南江县', 3, 0),
(2778, 325, '平昌县', 3, 0),
(2779, 326, '通川区', 3, 0),
(2780, 326, '万源市', 3, 0),
(2781, 326, '达县', 3, 0),
(2782, 326, '宣汉县', 3, 0),
(2783, 326, '开江县', 3, 0),
(2784, 326, '大竹县', 3, 0),
(2785, 326, '渠县', 3, 0),
(2786, 327, '旌阳区', 3, 0),
(2787, 327, '广汉市', 3, 0),
(2788, 327, '什邡市', 3, 0),
(2789, 327, '绵竹市', 3, 0),
(2790, 327, '罗江县', 3, 0),
(2791, 327, '中江县', 3, 0),
(2792, 328, '康定县', 3, 0),
(2793, 328, '丹巴县', 3, 0),
(2794, 328, '泸定县', 3, 0),
(2795, 328, '炉霍县', 3, 0),
(2796, 328, '九龙县', 3, 0),
(2797, 328, '甘孜县', 3, 0),
(2798, 328, '雅江县', 3, 0),
(2799, 328, '新龙县', 3, 0),
(2800, 328, '道孚县', 3, 0),
(2801, 328, '白玉县', 3, 0),
(2802, 328, '理塘县', 3, 0),
(2803, 328, '德格县', 3, 0),
(2804, 328, '乡城县', 3, 0),
(2805, 328, '石渠县', 3, 0),
(2806, 328, '稻城县', 3, 0),
(2807, 328, '色达县', 3, 0),
(2808, 328, '巴塘县', 3, 0),
(2809, 328, '得荣县', 3, 0),
(2810, 329, '广安区', 3, 0),
(2811, 329, '华蓥市', 3, 0),
(2812, 329, '岳池县', 3, 0),
(2813, 329, '武胜县', 3, 0),
(2814, 329, '邻水县', 3, 0),
(2815, 330, '利州区', 3, 0),
(2816, 330, '元坝区', 3, 0),
(2817, 330, '朝天区', 3, 0),
(2818, 330, '旺苍县', 3, 0),
(2819, 330, '青川县', 3, 0),
(2820, 330, '剑阁县', 3, 0),
(2821, 330, '苍溪县', 3, 0),
(2822, 331, '峨眉山市', 3, 0),
(2823, 331, '乐山市', 3, 0),
(2824, 331, '犍为县', 3, 0),
(2825, 331, '井研县', 3, 0),
(2826, 331, '夹江县', 3, 0),
(2827, 331, '沐川县', 3, 0),
(2828, 331, '峨边', 3, 0),
(2829, 331, '马边', 3, 0),
(2830, 332, '西昌市', 3, 0),
(2831, 332, '盐源县', 3, 0),
(2832, 332, '德昌县', 3, 0),
(2833, 332, '会理县', 3, 0),
(2834, 332, '会东县', 3, 0),
(2835, 332, '宁南县', 3, 0),
(2836, 332, '普格县', 3, 0),
(2837, 332, '布拖县', 3, 0),
(2838, 332, '金阳县', 3, 0),
(2839, 332, '昭觉县', 3, 0),
(2840, 332, '喜德县', 3, 0),
(2841, 332, '冕宁县', 3, 0),
(2842, 332, '越西县', 3, 0),
(2843, 332, '甘洛县', 3, 0),
(2844, 332, '美姑县', 3, 0),
(2845, 332, '雷波县', 3, 0),
(2846, 332, '木里', 3, 0),
(2847, 333, '东坡区', 3, 0),
(2848, 333, '仁寿县', 3, 0),
(2849, 333, '彭山县', 3, 0),
(2850, 333, '洪雅县', 3, 0),
(2851, 333, '丹棱县', 3, 0),
(2852, 333, '青神县', 3, 0),
(2853, 334, '阆中市', 3, 0),
(2854, 334, '南部县', 3, 0),
(2855, 334, '营山县', 3, 0),
(2856, 334, '蓬安县', 3, 0),
(2857, 334, '仪陇县', 3, 0),
(2858, 334, '顺庆区', 3, 0),
(2859, 334, '高坪区', 3, 0),
(2860, 334, '嘉陵区', 3, 0),
(2861, 334, '西充县', 3, 0),
(2862, 335, '市中区', 3, 0),
(2863, 335, '东兴区', 3, 0),
(2864, 335, '威远县', 3, 0),
(2865, 335, '资中县', 3, 0),
(2866, 335, '隆昌县', 3, 0),
(2867, 336, '东  区', 3, 0),
(2868, 336, '西  区', 3, 0),
(2869, 336, '仁和区', 3, 0),
(2870, 336, '米易县', 3, 0),
(2871, 336, '盐边县', 3, 0),
(2872, 337, '船山区', 3, 0),
(2873, 337, '安居区', 3, 0),
(2874, 337, '蓬溪县', 3, 0),
(2875, 337, '射洪县', 3, 0),
(2876, 337, '大英县', 3, 0),
(2877, 338, '雨城区', 3, 0),
(2878, 338, '名山县', 3, 0),
(2879, 338, '荥经县', 3, 0),
(2880, 338, '汉源县', 3, 0),
(2881, 338, '石棉县', 3, 0),
(2882, 338, '天全县', 3, 0),
(2883, 338, '芦山县', 3, 0),
(2884, 338, '宝兴县', 3, 0),
(2885, 339, '翠屏区', 3, 0),
(2886, 339, '宜宾县', 3, 0),
(2887, 339, '南溪县', 3, 0),
(2888, 339, '江安县', 3, 0),
(2889, 339, '长宁县', 3, 0),
(2890, 339, '高县', 3, 0),
(2891, 339, '珙县', 3, 0),
(2892, 339, '筠连县', 3, 0),
(2893, 339, '兴文县', 3, 0),
(2894, 339, '屏山县', 3, 0),
(2895, 340, '雁江区', 3, 0),
(2896, 340, '简阳市', 3, 0),
(2897, 340, '安岳县', 3, 0),
(2898, 340, '乐至县', 3, 0),
(2899, 341, '大安区', 3, 0),
(2900, 341, '自流井区', 3, 0),
(2901, 341, '贡井区', 3, 0),
(2902, 341, '沿滩区', 3, 0),
(2903, 341, '荣县', 3, 0),
(2904, 341, '富顺县', 3, 0),
(2905, 342, '江阳区', 3, 0),
(2906, 342, '纳溪区', 3, 0),
(2907, 342, '龙马潭区', 3, 0),
(2908, 342, '泸县', 3, 0),
(2909, 342, '合江县', 3, 0),
(2910, 342, '叙永县', 3, 0),
(2911, 342, '古蔺县', 3, 0),
(2912, 343, '和平区', 3, 0),
(2913, 343, '河西区', 3, 0),
(2914, 343, '南开区', 3, 0),
(2915, 343, '河北区', 3, 0),
(2916, 343, '河东区', 3, 0),
(2917, 343, '红桥区', 3, 0),
(2918, 343, '东丽区', 3, 0),
(2919, 343, '津南区', 3, 0),
(2920, 343, '西青区', 3, 0),
(2921, 343, '北辰区', 3, 0),
(2922, 343, '塘沽区', 3, 0),
(2923, 343, '汉沽区', 3, 0),
(2924, 343, '大港区', 3, 0),
(2925, 343, '武清区', 3, 0),
(2926, 343, '宝坻区', 3, 0),
(2927, 343, '经济开发区', 3, 0),
(2928, 343, '宁河县', 3, 0),
(2929, 343, '静海县', 3, 0),
(2930, 343, '蓟县', 3, 0),
(2931, 344, '城关区', 3, 0),
(2932, 344, '林周县', 3, 0),
(2933, 344, '当雄县', 3, 0),
(2934, 344, '尼木县', 3, 0),
(2935, 344, '曲水县', 3, 0),
(2936, 344, '堆龙德庆县', 3, 0),
(2937, 344, '达孜县', 3, 0),
(2938, 344, '墨竹工卡县', 3, 0),
(2939, 345, '噶尔县', 3, 0),
(2940, 345, '普兰县', 3, 0),
(2941, 345, '札达县', 3, 0),
(2942, 345, '日土县', 3, 0),
(2943, 345, '革吉县', 3, 0),
(2944, 345, '改则县', 3, 0),
(2945, 345, '措勤县', 3, 0),
(2946, 346, '昌都县', 3, 0),
(2947, 346, '江达县', 3, 0),
(2948, 346, '贡觉县', 3, 0),
(2949, 346, '类乌齐县', 3, 0),
(2950, 346, '丁青县', 3, 0),
(2951, 346, '察雅县', 3, 0),
(2952, 346, '八宿县', 3, 0),
(2953, 346, '左贡县', 3, 0),
(2954, 346, '芒康县', 3, 0),
(2955, 346, '洛隆县', 3, 0),
(2956, 346, '边坝县', 3, 0),
(2957, 347, '林芝县', 3, 0),
(2958, 347, '工布江达县', 3, 0),
(2959, 347, '米林县', 3, 0),
(2960, 347, '墨脱县', 3, 0),
(2961, 347, '波密县', 3, 0),
(2962, 347, '察隅县', 3, 0),
(2963, 347, '朗县', 3, 0),
(2964, 348, '那曲县', 3, 0),
(2965, 348, '嘉黎县', 3, 0),
(2966, 348, '比如县', 3, 0),
(2967, 348, '聂荣县', 3, 0),
(2968, 348, '安多县', 3, 0),
(2969, 348, '申扎县', 3, 0),
(2970, 348, '索县', 3, 0),
(2971, 348, '班戈县', 3, 0),
(2972, 348, '巴青县', 3, 0),
(2973, 348, '尼玛县', 3, 0),
(2974, 349, '日喀则市', 3, 0),
(2975, 349, '南木林县', 3, 0),
(2976, 349, '江孜县', 3, 0),
(2977, 349, '定日县', 3, 0),
(2978, 349, '萨迦县', 3, 0),
(2979, 349, '拉孜县', 3, 0),
(2980, 349, '昂仁县', 3, 0),
(2981, 349, '谢通门县', 3, 0),
(2982, 349, '白朗县', 3, 0),
(2983, 349, '仁布县', 3, 0),
(2984, 349, '康马县', 3, 0),
(2985, 349, '定结县', 3, 0),
(2986, 349, '仲巴县', 3, 0),
(2987, 349, '亚东县', 3, 0),
(2988, 349, '吉隆县', 3, 0),
(2989, 349, '聂拉木县', 3, 0),
(2990, 349, '萨嘎县', 3, 0),
(2991, 349, '岗巴县', 3, 0),
(2992, 350, '乃东县', 3, 0),
(2993, 350, '扎囊县', 3, 0),
(2994, 350, '贡嘎县', 3, 0),
(2995, 350, '桑日县', 3, 0),
(2996, 350, '琼结县', 3, 0),
(2997, 350, '曲松县', 3, 0),
(2998, 350, '措美县', 3, 0),
(2999, 350, '洛扎县', 3, 0),
(3000, 350, '加查县', 3, 0),
(3001, 350, '隆子县', 3, 0),
(3002, 350, '错那县', 3, 0),
(3003, 350, '浪卡子县', 3, 0),
(3004, 351, '天山区', 3, 0),
(3005, 351, '沙依巴克区', 3, 0),
(3006, 351, '新市区', 3, 0),
(3007, 351, '水磨沟区', 3, 0),
(3008, 351, '头屯河区', 3, 0),
(3009, 351, '达坂城区', 3, 0),
(3010, 351, '米东区', 3, 0),
(3011, 351, '乌鲁木齐县', 3, 0),
(3012, 352, '阿克苏市', 3, 0),
(3013, 352, '温宿县', 3, 0),
(3014, 352, '库车县', 3, 0),
(3015, 352, '沙雅县', 3, 0),
(3016, 352, '新和县', 3, 0),
(3017, 352, '拜城县', 3, 0),
(3018, 352, '乌什县', 3, 0),
(3019, 352, '阿瓦提县', 3, 0),
(3020, 352, '柯坪县', 3, 0),
(3021, 353, '阿拉尔市', 3, 0),
(3022, 354, '库尔勒市', 3, 0),
(3023, 354, '轮台县', 3, 0),
(3024, 354, '尉犁县', 3, 0),
(3025, 354, '若羌县', 3, 0),
(3026, 354, '且末县', 3, 0),
(3027, 354, '焉耆', 3, 0),
(3028, 354, '和静县', 3, 0),
(3029, 354, '和硕县', 3, 0),
(3030, 354, '博湖县', 3, 0),
(3031, 355, '博乐市', 3, 0),
(3032, 355, '精河县', 3, 0),
(3033, 355, '温泉县', 3, 0),
(3034, 356, '呼图壁县', 3, 0),
(3035, 356, '米泉市', 3, 0),
(3036, 356, '昌吉市', 3, 0),
(3037, 356, '阜康市', 3, 0),
(3038, 356, '玛纳斯县', 3, 0),
(3039, 356, '奇台县', 3, 0),
(3040, 356, '吉木萨尔县', 3, 0),
(3041, 356, '木垒', 3, 0),
(3042, 357, '哈密市', 3, 0),
(3043, 357, '伊吾县', 3, 0),
(3044, 357, '巴里坤', 3, 0),
(3045, 358, '和田市', 3, 0),
(3046, 358, '和田县', 3, 0),
(3047, 358, '墨玉县', 3, 0),
(3048, 358, '皮山县', 3, 0),
(3049, 358, '洛浦县', 3, 0),
(3050, 358, '策勒县', 3, 0),
(3051, 358, '于田县', 3, 0),
(3052, 358, '民丰县', 3, 0),
(3053, 359, '喀什市', 3, 0),
(3054, 359, '疏附县', 3, 0),
(3055, 359, '疏勒县', 3, 0),
(3056, 359, '英吉沙县', 3, 0),
(3057, 359, '泽普县', 3, 0),
(3058, 359, '莎车县', 3, 0),
(3059, 359, '叶城县', 3, 0),
(3060, 359, '麦盖提县', 3, 0),
(3061, 359, '岳普湖县', 3, 0),
(3062, 359, '伽师县', 3, 0),
(3063, 359, '巴楚县', 3, 0),
(3064, 359, '塔什库尔干', 3, 0),
(3065, 360, '克拉玛依市', 3, 0),
(3066, 361, '阿图什市', 3, 0),
(3067, 361, '阿克陶县', 3, 0),
(3068, 361, '阿合奇县', 3, 0),
(3069, 361, '乌恰县', 3, 0),
(3070, 362, '石河子市', 3, 0),
(3071, 363, '图木舒克市', 3, 0),
(3072, 364, '吐鲁番市', 3, 0),
(3073, 364, '鄯善县', 3, 0),
(3074, 364, '托克逊县', 3, 0),
(3075, 365, '五家渠市', 3, 0),
(3076, 366, '阿勒泰市', 3, 0),
(3077, 366, '布克赛尔', 3, 0),
(3078, 366, '伊宁市', 3, 0),
(3079, 366, '布尔津县', 3, 0),
(3080, 366, '奎屯市', 3, 0),
(3081, 366, '乌苏市', 3, 0),
(3082, 366, '额敏县', 3, 0),
(3083, 366, '富蕴县', 3, 0),
(3084, 366, '伊宁县', 3, 0),
(3085, 366, '福海县', 3, 0),
(3086, 366, '霍城县', 3, 0),
(3087, 366, '沙湾县', 3, 0),
(3088, 366, '巩留县', 3, 0),
(3089, 366, '哈巴河县', 3, 0),
(3090, 366, '托里县', 3, 0),
(3091, 366, '青河县', 3, 0),
(3092, 366, '新源县', 3, 0),
(3093, 366, '裕民县', 3, 0),
(3094, 366, '和布克赛尔', 3, 0),
(3095, 366, '吉木乃县', 3, 0),
(3096, 366, '昭苏县', 3, 0),
(3097, 366, '特克斯县', 3, 0),
(3098, 366, '尼勒克县', 3, 0),
(3099, 366, '察布查尔', 3, 0),
(3100, 367, '盘龙区', 3, 0),
(3101, 367, '五华区', 3, 0),
(3102, 367, '官渡区', 3, 0),
(3103, 367, '西山区', 3, 0),
(3104, 367, '东川区', 3, 0),
(3105, 367, '安宁市', 3, 0),
(3106, 367, '呈贡县', 3, 0),
(3107, 367, '晋宁县', 3, 0),
(3108, 367, '富民县', 3, 0),
(3109, 367, '宜良县', 3, 0),
(3110, 367, '嵩明县', 3, 0),
(3111, 367, '石林县', 3, 0),
(3112, 367, '禄劝', 3, 0),
(3113, 367, '寻甸', 3, 0),
(3114, 368, '兰坪', 3, 0),
(3115, 368, '泸水县', 3, 0),
(3116, 368, '福贡县', 3, 0),
(3117, 368, '贡山', 3, 0),
(3118, 369, '宁洱', 3, 0),
(3119, 369, '思茅区', 3, 0),
(3120, 369, '墨江', 3, 0),
(3121, 369, '景东', 3, 0),
(3122, 369, '景谷', 3, 0),
(3123, 369, '镇沅', 3, 0),
(3124, 369, '江城', 3, 0),
(3125, 369, '孟连', 3, 0),
(3126, 369, '澜沧', 3, 0),
(3127, 369, '西盟', 3, 0),
(3128, 370, '古城区', 3, 0),
(3129, 370, '宁蒗', 3, 0),
(3130, 370, '玉龙', 3, 0),
(3131, 370, '永胜县', 3, 0),
(3132, 370, '华坪县', 3, 0),
(3133, 371, '隆阳区', 3, 0),
(3134, 371, '施甸县', 3, 0),
(3135, 371, '腾冲县', 3, 0),
(3136, 371, '龙陵县', 3, 0),
(3137, 371, '昌宁县', 3, 0),
(3138, 372, '楚雄市', 3, 0),
(3139, 372, '双柏县', 3, 0),
(3140, 372, '牟定县', 3, 0),
(3141, 372, '南华县', 3, 0),
(3142, 372, '姚安县', 3, 0),
(3143, 372, '大姚县', 3, 0),
(3144, 372, '永仁县', 3, 0),
(3145, 372, '元谋县', 3, 0),
(3146, 372, '武定县', 3, 0),
(3147, 372, '禄丰县', 3, 0),
(3148, 373, '大理市', 3, 0),
(3149, 373, '祥云县', 3, 0),
(3150, 373, '宾川县', 3, 0),
(3151, 373, '弥渡县', 3, 0),
(3152, 373, '永平县', 3, 0),
(3153, 373, '云龙县', 3, 0),
(3154, 373, '洱源县', 3, 0),
(3155, 373, '剑川县', 3, 0),
(3156, 373, '鹤庆县', 3, 0),
(3157, 373, '漾濞', 3, 0),
(3158, 373, '南涧', 3, 0),
(3159, 373, '巍山', 3, 0),
(3160, 374, '潞西市', 3, 0),
(3161, 374, '瑞丽市', 3, 0),
(3162, 374, '梁河县', 3, 0),
(3163, 374, '盈江县', 3, 0),
(3164, 374, '陇川县', 3, 0),
(3165, 375, '香格里拉县', 3, 0),
(3166, 375, '德钦县', 3, 0),
(3167, 375, '维西', 3, 0),
(3168, 376, '泸西县', 3, 0),
(3169, 376, '蒙自县', 3, 0),
(3170, 376, '个旧市', 3, 0),
(3171, 376, '开远市', 3, 0),
(3172, 376, '绿春县', 3, 0),
(3173, 376, '建水县', 3, 0),
(3174, 376, '石屏县', 3, 0),
(3175, 376, '弥勒县', 3, 0),
(3176, 376, '元阳县', 3, 0),
(3177, 376, '红河县', 3, 0),
(3178, 376, '金平', 3, 0),
(3179, 376, '河口', 3, 0),
(3180, 376, '屏边', 3, 0),
(3181, 377, '临翔区', 3, 0),
(3182, 377, '凤庆县', 3, 0),
(3183, 377, '云县', 3, 0),
(3184, 377, '永德县', 3, 0),
(3185, 377, '镇康县', 3, 0),
(3186, 377, '双江', 3, 0),
(3187, 377, '耿马', 3, 0),
(3188, 377, '沧源', 3, 0),
(3189, 378, '麒麟区', 3, 0),
(3190, 378, '宣威市', 3, 0),
(3191, 378, '马龙县', 3, 0),
(3192, 378, '陆良县', 3, 0),
(3193, 378, '师宗县', 3, 0),
(3194, 378, '罗平县', 3, 0),
(3195, 378, '富源县', 3, 0),
(3196, 378, '会泽县', 3, 0),
(3197, 378, '沾益县', 3, 0),
(3198, 379, '文山县', 3, 0),
(3199, 379, '砚山县', 3, 0),
(3200, 379, '西畴县', 3, 0),
(3201, 379, '麻栗坡县', 3, 0),
(3202, 379, '马关县', 3, 0),
(3203, 379, '丘北县', 3, 0),
(3204, 379, '广南县', 3, 0),
(3205, 379, '富宁县', 3, 0),
(3206, 380, '景洪市', 3, 0),
(3207, 380, '勐海县', 3, 0),
(3208, 380, '勐腊县', 3, 0),
(3209, 381, '红塔区', 3, 0),
(3210, 381, '江川县', 3, 0),
(3211, 381, '澄江县', 3, 0),
(3212, 381, '通海县', 3, 0),
(3213, 381, '华宁县', 3, 0),
(3214, 381, '易门县', 3, 0),
(3215, 381, '峨山', 3, 0),
(3216, 381, '新平', 3, 0),
(3217, 381, '元江', 3, 0),
(3218, 382, '昭阳区', 3, 0),
(3219, 382, '鲁甸县', 3, 0),
(3220, 382, '巧家县', 3, 0),
(3221, 382, '盐津县', 3, 0),
(3222, 382, '大关县', 3, 0),
(3223, 382, '永善县', 3, 0),
(3224, 382, '绥江县', 3, 0),
(3225, 382, '镇雄县', 3, 0),
(3226, 382, '彝良县', 3, 0),
(3227, 382, '威信县', 3, 0),
(3228, 382, '水富县', 3, 0),
(3229, 383, '西湖区', 3, 0),
(3230, 383, '上城区', 3, 0),
(3231, 383, '下城区', 3, 0),
(3232, 383, '拱墅区', 3, 0),
(3233, 383, '滨江区', 3, 0),
(3234, 383, '江干区', 3, 0),
(3235, 383, '萧山区', 3, 0),
(3236, 383, '余杭区', 3, 0),
(3237, 383, '市郊', 3, 0),
(3238, 383, '建德市', 3, 0),
(3239, 383, '富阳市', 3, 0),
(3240, 383, '临安市', 3, 0),
(3241, 383, '桐庐县', 3, 0),
(3242, 383, '淳安县', 3, 0),
(3243, 384, '吴兴区', 3, 0),
(3244, 384, '南浔区', 3, 0),
(3245, 384, '德清县', 3, 0),
(3246, 384, '长兴县', 3, 0),
(3247, 384, '安吉县', 3, 0),
(3248, 385, '南湖区', 3, 0),
(3249, 385, '秀洲区', 3, 0),
(3250, 385, '海宁市', 3, 0),
(3251, 385, '嘉善县', 3, 0),
(3252, 385, '平湖市', 3, 0),
(3253, 385, '桐乡市', 3, 0),
(3254, 385, '海盐县', 3, 0),
(3255, 386, '婺城区', 3, 0),
(3256, 386, '金东区', 3, 0),
(3257, 386, '兰溪市', 3, 0),
(3258, 386, '市区', 3, 0),
(3259, 386, '佛堂镇', 3, 0),
(3260, 386, '上溪镇', 3, 0),
(3261, 386, '义亭镇', 3, 0),
(3262, 386, '大陈镇', 3, 0),
(3263, 386, '苏溪镇', 3, 0),
(3264, 386, '赤岸镇', 3, 0),
(3265, 386, '东阳市', 3, 0),
(3266, 386, '永康市', 3, 0),
(3267, 386, '武义县', 3, 0),
(3268, 386, '浦江县', 3, 0),
(3269, 386, '磐安县', 3, 0),
(3270, 387, '莲都区', 3, 0),
(3271, 387, '龙泉市', 3, 0),
(3272, 387, '青田县', 3, 0),
(3273, 387, '缙云县', 3, 0),
(3274, 387, '遂昌县', 3, 0),
(3275, 387, '松阳县', 3, 0),
(3276, 387, '云和县', 3, 0),
(3277, 387, '庆元县', 3, 0),
(3278, 387, '景宁', 3, 0),
(3279, 388, '海曙区', 3, 0),
(3280, 388, '江东区', 3, 0),
(3281, 388, '江北区', 3, 0),
(3282, 388, '镇海区', 3, 0),
(3283, 388, '北仑区', 3, 0),
(3284, 388, '鄞州区', 3, 0),
(3285, 388, '余姚市', 3, 0),
(3286, 388, '慈溪市', 3, 0),
(3287, 388, '奉化市', 3, 0),
(3288, 388, '象山县', 3, 0),
(3289, 388, '宁海县', 3, 0),
(3290, 389, '越城区', 3, 0),
(3291, 389, '上虞市', 3, 0),
(3292, 389, '嵊州市', 3, 0),
(3293, 389, '绍兴县', 3, 0),
(3294, 389, '新昌县', 3, 0),
(3295, 389, '诸暨市', 3, 0),
(3296, 390, '椒江区', 3, 0),
(3297, 390, '黄岩区', 3, 0),
(3298, 390, '路桥区', 3, 0),
(3299, 390, '温岭市', 3, 0),
(3300, 390, '临海市', 3, 0),
(3301, 390, '玉环县', 3, 0),
(3302, 390, '三门县', 3, 0),
(3303, 390, '天台县', 3, 0),
(3304, 390, '仙居县', 3, 0),
(3305, 391, '鹿城区', 3, 0),
(3306, 391, '龙湾区', 3, 0),
(3307, 391, '瓯海区', 3, 0),
(3308, 391, '瑞安市', 3, 0),
(3309, 391, '乐清市', 3, 0),
(3310, 391, '洞头县', 3, 0),
(3311, 391, '永嘉县', 3, 0),
(3312, 391, '平阳县', 3, 0),
(3313, 391, '苍南县', 3, 0),
(3314, 391, '文成县', 3, 0),
(3315, 391, '泰顺县', 3, 0),
(3316, 392, '定海区', 3, 0),
(3317, 392, '普陀区', 3, 0),
(3318, 392, '岱山县', 3, 0),
(3319, 392, '嵊泗县', 3, 0),
(3320, 393, '衢州市', 3, 0),
(3321, 393, '江山市', 3, 0),
(3322, 393, '常山县', 3, 0),
(3323, 393, '开化县', 3, 0),
(3324, 393, '龙游县', 3, 0),
(3325, 394, '合川区', 3, 0),
(3326, 394, '江津区', 3, 0),
(3327, 394, '南川区', 3, 0),
(3328, 394, '永川区', 3, 0),
(3329, 394, '南岸区', 3, 0),
(3330, 394, '渝北区', 3, 0),
(3331, 394, '万盛区', 3, 0),
(3332, 394, '大渡口区', 3, 0),
(3333, 394, '万州区', 3, 0),
(3334, 394, '北碚区', 3, 0),
(3335, 394, '沙坪坝区', 3, 0),
(3336, 394, '巴南区', 3, 0),
(3337, 394, '涪陵区', 3, 0),
(3338, 394, '江北区', 3, 0),
(3339, 394, '九龙坡区', 3, 0),
(3340, 394, '渝中区', 3, 0),
(3341, 394, '黔江开发区', 3, 0),
(3342, 394, '长寿区', 3, 0),
(3343, 394, '双桥区', 3, 0),
(3344, 394, '綦江县', 3, 0),
(3345, 394, '潼南县', 3, 0),
(3346, 394, '铜梁县', 3, 0),
(3347, 394, '大足县', 3, 0),
(3348, 394, '荣昌县', 3, 0),
(3349, 394, '璧山县', 3, 0),
(3350, 394, '垫江县', 3, 0),
(3351, 394, '武隆县', 3, 0),
(3352, 394, '丰都县', 3, 0),
(3353, 394, '城口县', 3, 0),
(3354, 394, '梁平县', 3, 0),
(3355, 394, '开县', 3, 0),
(3356, 394, '巫溪县', 3, 0),
(3357, 394, '巫山县', 3, 0),
(3358, 394, '奉节县', 3, 0),
(3359, 394, '云阳县', 3, 0),
(3360, 394, '忠县', 3, 0),
(3361, 394, '石柱', 3, 0),
(3362, 394, '彭水', 3, 0),
(3363, 394, '酉阳', 3, 0),
(3364, 394, '秀山', 3, 0),
(3365, 395, '沙田区', 3, 0),
(3366, 395, '东区', 3, 0),
(3367, 395, '观塘区', 3, 0),
(3368, 395, '黄大仙区', 3, 0),
(3369, 395, '九龙城区', 3, 0),
(3370, 395, '屯门区', 3, 0),
(3371, 395, '葵青区', 3, 0),
(3372, 395, '元朗区', 3, 0),
(3373, 395, '深水埗区', 3, 0),
(3374, 395, '西贡区', 3, 0),
(3375, 395, '大埔区', 3, 0),
(3376, 395, '湾仔区', 3, 0),
(3377, 395, '油尖旺区', 3, 0),
(3378, 395, '北区', 3, 0),
(3379, 395, '南区', 3, 0),
(3380, 395, '荃湾区', 3, 0),
(3381, 395, '中西区', 3, 0),
(3382, 395, '离岛区', 3, 0),
(3383, 396, '澳门', 3, 0),
(3384, 397, '台北', 3, 0),
(3385, 397, '高雄', 3, 0),
(3386, 397, '基隆', 3, 0),
(3387, 397, '台中', 3, 0),
(3388, 397, '台南', 3, 0),
(3389, 397, '新竹', 3, 0),
(3390, 397, '嘉义', 3, 0),
(3391, 397, '宜兰县', 3, 0),
(3392, 397, '桃园县', 3, 0),
(3393, 397, '苗栗县', 3, 0),
(3394, 397, '彰化县', 3, 0),
(3395, 397, '南投县', 3, 0),
(3396, 397, '云林县', 3, 0),
(3397, 397, '屏东县', 3, 0),
(3398, 397, '台东县', 3, 0),
(3399, 397, '花莲县', 3, 0),
(3400, 397, '澎湖县', 3, 0),
(3401, 3, '合肥', 2, 0),
(3402, 3401, '庐阳区', 3, 0),
(3403, 3401, '瑶海区', 3, 0),
(3404, 3401, '蜀山区', 3, 0),
(3405, 3401, '包河区', 3, 0),
(3406, 3401, '长丰县', 3, 0),
(3407, 3401, '肥东县', 3, 0),
(3408, 3401, '肥西县', 3, 0),
(3415, 0, '日本1', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_reg_extend_info`
--

CREATE TABLE IF NOT EXISTS `zh_ec_reg_extend_info` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `reg_field_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- テーブルのデータのダンプ `zh_ec_reg_extend_info`
--

INSERT INTO `zh_ec_reg_extend_info` (`Id`, `user_id`, `reg_field_id`, `content`) VALUES
(6, 13, 104, '住所1'),
(4, 12, 104, '浦东南曹路901弄'),
(5, 11, 104, '浦东南曹路901弄'),
(7, 13, 105, '会社1'),
(8, 21, 104, 'ectest2'),
(9, 21, 105, 'ectest2');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_reg_fields`
--

CREATE TABLE IF NOT EXISTS `zh_ec_reg_fields` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `reg_field_name` varchar(60) NOT NULL,
  `dis_order` tinyint(3) unsigned NOT NULL DEFAULT '100',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_need` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- テーブルのデータのダンプ `zh_ec_reg_fields`
--

INSERT INTO `zh_ec_reg_fields` (`id`, `reg_field_name`, `dis_order`, `display`, `type`, `is_need`) VALUES
(1, 'MSN', 0, 0, 1, 0),
(2, 'QQ', 0, 0, 1, 0),
(3, '会社電話', 0, 0, 1, 0),
(4, '家庭電話', 0, 0, 1, 0),
(5, '携帯', 0, 1, 1, 0),
(6, 'パスワード問題', 0, 1, 1, 1),
(105, '会社名', 100, 1, 0, 1),
(104, '住所', 100, 1, 0, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_sessions`
--

CREATE TABLE IF NOT EXISTS `zh_ec_sessions` (
  `sesskey` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `expiry` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'session创建时间',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '如果不是管理员，记录用户id',
  `adminid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '如果是管理员记录管理员id',
  `ip` char(15) NOT NULL COMMENT '客户端ip',
  `user_name` varchar(60) NOT NULL,
  `user_rank` tinyint(3) NOT NULL,
  `discount` decimal(3,2) NOT NULL,
  `email` varchar(60) NOT NULL,
  `data` char(255) NOT NULL COMMENT '序列化后的session数据，如果session数据大于255则将数据存到表ecs_sessions_data，此处为空',
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='session记录表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_sessions_data`
--

CREATE TABLE IF NOT EXISTS `zh_ec_sessions_data` (
  `sesskey` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `expiry` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'session创建时间',
  `data` longtext NOT NULL COMMENT 'session序列化后的数据',
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='session数据表（超过255字节的session内容会保存在该表）';

--
-- テーブルのデータのダンプ `zh_ec_sessions_data`
--

INSERT INTO `zh_ec_sessions_data` (`sesskey`, `expiry`, `data`) VALUES
('c70175d1c8397b12d8d6b7e06d92d428', 4294967295, 'aaa'),
('9b8eefa8ef157bb453326eb0042839ce', 2901344719, 'aaa'),
('901751d941f39d709f9c239703f31f20', 4294967295, 'aaa'),
('62bb119dda74ca4f0afc277379c91ed4', 4294967295, 'aaa'),
('41e5b416660119f801c29a82fb7d86e9', 4294967295, 'aaa'),
('88bf99c1cd92424d7bce6b2dc85b011e', 4294967295, 'aaa'),
('46b2b0197cfd4697ba89d2c4d22f65f1', 4294967295, 'a:25:{s:3:"uid";s:1:"1";s:8:"nickname";s:4:"test";s:8:"username";s:4:"test";s:5:"email";s:16:"136871204@qq.com";s:12:"validatecode";s:0:"";s:7:"regtime";s:10:"1432112415";s:9:"logintime";s:10:"1458639620";s:5:"regip";s:9:"127.0.0.1";s:6:"lastip";s:9:"127.0.0.1";s:10:"user_state";s:1:"1";s:13:"lock_end_time";s:1:"0";s:2:"qq";s:0:"";s:3:"sex";s:1:"1";s:7:"favicon";s:0:"";s:7:"credits";s:1:"0";s:3:"rid";s:1:"1";s:22:"allow_user_set_credits";s:1:"1";s:9:"signature";s:0:"";s:6:"domain";s:4:"test";s:8:"spec_num";s:1:"1";s:4:"icon";s:44:"http://www.works.com/data/image/user/250.png";s:8:"language";s:2:"ja";s:10:"ec_from_ad";i:0;s:10:"ec_referer";s:12:"来自本站";s:10:"login_fail";i:0;}'),
('799d332c6d953363bca0f5ac51f22a11', 2917792703, 'a:26:{s:3:"uid";s:1:"1";s:8:"nickname";s:4:"test";s:8:"username";s:4:"test";s:5:"email";s:16:"136871204@qq.com";s:12:"validatecode";s:0:"";s:7:"regtime";s:10:"1432112415";s:9:"logintime";s:10:"1458875700";s:5:"regip";s:9:"127.0.0.1";s:6:"lastip";s:9:"127.0.0.1";s:10:"user_state";s:1:"1";s:13:"lock_end_time";s:1:"0";s:2:"qq";s:0:"";s:3:"sex";s:1:"1";s:7:"favicon";s:0:"";s:7:"credits";s:1:"0";s:3:"rid";s:1:"1";s:22:"allow_user_set_credits";s:1:"1";s:9:"signature";s:0:"";s:6:"domain";s:4:"test";s:8:"spec_num";s:1:"1";s:4:"icon";s:44:"http://www.works.com/data/image/user/250.png";s:8:"language";s:2:"ja";s:10:"ec_from_ad";i:0;s:10:"ec_referer";s:12:"来自本站";s:10:"login_fail";i:0;s:12:"captcha_word";s:16:"OTZlYmY1Y2M1NQ==";}'),
('590fbfc7853a8c738ec7f509b569658e', 4294967295, 'a:30:{s:3:"uid";N;s:8:"nickname";N;s:8:"username";N;s:5:"email";N;s:12:"validatecode";N;s:7:"regtime";N;s:9:"logintime";N;s:5:"regip";N;s:6:"lastip";N;s:10:"user_state";N;s:13:"lock_end_time";N;s:2:"qq";N;s:3:"sex";N;s:7:"favicon";N;s:7:"credits";N;s:3:"rid";N;s:22:"allow_user_set_credits";N;s:9:"signature";N;s:6:"domain";N;s:8:"spec_num";N;s:4:"icon";N;s:8:"language";N;s:10:"ec_from_ad";i:0;s:10:"ec_referer";s:12:"来自本站";s:10:"login_fail";i:0;s:12:"captcha_word";s:16:"MzFlZDcxMDNlZg==";s:13:"captcha_login";s:16:"NWEzMmRlMjEwYQ==";s:12:"ec_last_time";s:10:"1458764367";s:10:"ec_last_ip";s:9:"127.0.0.1";s:13:"ec_login_fail";i:0;}'),
('22d753b0407bbeb5bbe94d472fd147de', 4294967295, 'a:25:{s:3:"uid";s:1:"1";s:8:"nickname";s:4:"test";s:8:"username";s:4:"test";s:5:"email";s:16:"136871204@qq.com";s:12:"validatecode";s:0:"";s:7:"regtime";s:10:"1432112415";s:9:"logintime";s:10:"1459130412";s:5:"regip";s:9:"127.0.0.1";s:6:"lastip";s:9:"127.0.0.1";s:10:"user_state";s:1:"1";s:13:"lock_end_time";s:1:"0";s:2:"qq";s:0:"";s:3:"sex";s:1:"1";s:7:"favicon";s:0:"";s:7:"credits";s:1:"0";s:3:"rid";s:1:"1";s:22:"allow_user_set_credits";s:1:"1";s:9:"signature";s:0:"";s:6:"domain";s:4:"test";s:8:"spec_num";s:1:"1";s:4:"icon";s:44:"http://www.works.com/data/image/user/250.png";s:8:"language";s:2:"ja";s:10:"ec_from_ad";i:0;s:10:"ec_referer";s:12:"来自本站";s:10:"login_fail";i:0;}');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_shipping`
--

CREATE TABLE IF NOT EXISTS `zh_ec_shipping` (
  `shipping_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `shipping_code` varchar(20) NOT NULL COMMENT '配送方式的字符串代号',
  `shipping_name` varchar(120) NOT NULL COMMENT '配送方式的名称',
  `shipping_desc` varchar(255) NOT NULL COMMENT '配送方式的描述',
  `insure` varchar(10) NOT NULL DEFAULT '0' COMMENT '保价费用，单位元，或者是百分数，该值直接输出为报价费用',
  `support_cod` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否支持货到付款，1，支持；0，不支持',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '该配送方式是否被禁用，1，可用；0，禁用',
  `shipping_print` text NOT NULL,
  `print_bg` varchar(255) DEFAULT NULL,
  `config_lable` text,
  `print_model` tinyint(1) DEFAULT '0',
  `shipping_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipping_id`),
  KEY `shipping_code` (`shipping_code`,`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='配送方式配置信息表' AUTO_INCREMENT=13 ;

--
-- テーブルのデータのダンプ `zh_ec_shipping`
--

INSERT INTO `zh_ec_shipping` (`shipping_id`, `shipping_code`, `shipping_name`, `shipping_desc`, `insure`, `support_cod`, `enabled`, `shipping_print`, `print_bg`, `config_lable`, `print_model`, `shipping_order`) VALUES
(11, 'cac', '上门取货', '买家自己到商家指定地点取货', '0', 1, 1, '', '', '', 2, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_shipping_area`
--

CREATE TABLE IF NOT EXISTS `zh_ec_shipping_area` (
  `shipping_area_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `shipping_area_name` varchar(150) NOT NULL COMMENT '配送方式中的配送区域的名字',
  `shipping_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '该配送区域所属的配送方式，同ecs_shipping的shipping_id',
  `configure` text NOT NULL COMMENT '序列化的该配送区域的费用配置信息',
  PRIMARY KEY (`shipping_area_id`),
  KEY `shipping_id` (`shipping_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='配送方式所属的配送区域和配送费用信息' AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `zh_ec_shipping_area`
--

INSERT INTO `zh_ec_shipping_area` (`shipping_area_id`, `shipping_area_name`, `shipping_id`, `configure`) VALUES
(6, 'shanghai', 11, 'a:3:{i:0;a:2:{s:4:"name";s:10:"free_money";s:5:"value";s:0:"";}i:1;a:2:{s:4:"name";s:16:"fee_compute_mode";s:5:"value";s:0:"";}i:2;a:2:{s:4:"name";s:7:"pay_fee";s:5:"value";s:0:"";}}');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_snatch_log`
--

CREATE TABLE IF NOT EXISTS `zh_ec_snatch_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `snatch_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '夺宝奇兵活动号，取值于ec_goods_activity的act_id字段',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '出价的用户id，取值于ec_users的user_id',
  `bid_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '出价的价格',
  `bid_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '出价的时间',
  PRIMARY KEY (`log_id`),
  KEY `snatch_id` (`snatch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_snatch_log`
--

INSERT INTO `zh_ec_snatch_log` (`log_id`, `snatch_id`, `user_id`, `bid_price`, `bid_time`) VALUES
(1, 2, 1, '17.00', 1242142910),
(2, 1, 1, '50.00', 1242142935);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_suppliers`
--

CREATE TABLE IF NOT EXISTS `zh_ec_suppliers` (
  `suppliers_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `suppliers_name` varchar(255) DEFAULT NULL COMMENT '控货商名称',
  `suppliers_desc` mediumtext COMMENT '供货商描述',
  `is_check` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`suppliers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- テーブルのデータのダンプ `zh_ec_suppliers`
--

INSERT INTO `zh_ec_suppliers` (`suppliers_id`, `suppliers_name`, `suppliers_desc`, `is_check`) VALUES
(1, '北京供货商', '北京供货商', 1),
(2, '上海供货商', '上海供货商', 1),
(6, '湖北供货商', '湖北供货商描述\r\n湖北供货商描述', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_tag`
--

CREATE TABLE IF NOT EXISTS `zh_ec_tag` (
  `tag_id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '商品标签自增id',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户的id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id',
  `tag_words` varchar(255) NOT NULL COMMENT '标签内容',
  PRIMARY KEY (`tag_id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品的标记' AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_template`
--

CREATE TABLE IF NOT EXISTS `zh_ec_template` (
  `filename` varchar(30) NOT NULL COMMENT '该条模板配置属于哪个模板页面',
  `region` varchar(40) NOT NULL COMMENT '该条模板配置在它所属的模板文件中的位置',
  `library` varchar(40) NOT NULL COMMENT '该条模板配置在它所属的模板文件中的位置处应该引入的lib的相对目录地址',
  `sort_order` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '模板文件中这个位置的引入lib项的值的显示顺序',
  `id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '字段意义待查',
  `number` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '每次显示多少个值',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '属于哪个动态项，0，固定项；1，分类下的商品；2，品牌下的商品；3，文章列表；4，广告位',
  `theme` varchar(60) NOT NULL COMMENT '该模板配置项属于哪套模板的模板名',
  `remarks` varchar(30) NOT NULL COMMENT '备注，可能是预留字段，没有值所以没确定用途',
  KEY `filename` (`filename`,`region`),
  KEY `theme` (`theme`),
  KEY `remarks` (`remarks`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模板设置数据表';

--
-- テーブルのデータのダンプ `zh_ec_template`
--

INSERT INTO `zh_ec_template` (`filename`, `region`, `library`, `sort_order`, `id`, `number`, `type`, `theme`, `remarks`) VALUES
('index', '左边区域', '/library/vote_list.lbi', 8, 0, 0, 0, 'default', ''),
('index', '左边区域', '/library/email_list.lbi', 9, 0, 0, 0, 'default', ''),
('index', '左边区域', '/library/order_query.lbi', 6, 0, 0, 0, 'default', ''),
('index', '左边区域', '/library/cart.lbi', 0, 0, 0, 0, 'default', ''),
('index', '左边区域', '/library/promotion_info.lbi', 3, 0, 0, 0, 'default', ''),
('EcIndex', '左边区域', '/library/auction.lbi', 4, 0, 3, 0, 'v5', ''),
('EcIndex', '左边区域', '/library/group_buy.lbi', 5, 0, 3, 0, 'v5', ''),
('EcIndex', '', '/library/recommend_promotion.lbi', 0, 0, 4, 0, 'v5', ''),
('EcIndex', '右边主区域', '/library/recommend_hot.lbi', 2, 0, 10, 0, 'v5', ''),
('EcIndex', '右边主区域', '/library/recommend_new.lbi', 1, 0, 10, 0, 'v5', ''),
('EcIndex', '右边主区域', '/library/recommend_best.lbi', 0, 0, 10, 0, 'v5', ''),
('index', '左边区域', '/library/invoice_query.lbi', 7, 0, 0, 0, 'default', ''),
('index', '左边区域', '/library/top10.lbi', 2, 0, 0, 0, 'default', ''),
('index', '左边区域', '/library/category_tree.lbi', 1, 0, 0, 0, 'default', ''),
('EcIndex', '', '/library/brands.lbi', 0, 0, 11, 0, 'v5', ''),
('category', '左边区域', '/library/category_tree.lbi', 1, 0, 0, 0, 'default', ''),
('EcCategory', '右边区域', '/library/recommend_best.lbi', 0, 0, 5, 0, 'v5', ''),
('category', '右边区域', '/library/goods_list.lbi', 1, 0, 0, 0, 'default', ''),
('category', '右边区域', '/library/pages.lbi', 2, 0, 0, 0, 'default', ''),
('category', '左边区域', '/library/cart.lbi', 0, 0, 0, 0, 'default', ''),
('category', '左边区域', '/library/price_grade.lbi', 3, 0, 0, 0, 'default', ''),
('category', '左边区域', '/library/filter_attr.lbi', 2, 0, 0, 0, 'default', ''),
('EcIndex', '全宽行', '/library/cat_goods.lbi', 3, 4, 5, 1, 'v3', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_topic`
--

CREATE TABLE IF NOT EXISTS `zh_ec_topic` (
  `topic_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '专题自增id',
  `title` varchar(255) NOT NULL DEFAULT '''''' COMMENT '专题名称',
  `intro` text NOT NULL COMMENT '专题介绍',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '专题开始时间',
  `end_time` int(10) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `data` text NOT NULL COMMENT '专题数据内容，包括分类，商品等',
  `template` varchar(255) NOT NULL DEFAULT '''''' COMMENT '专题模板文件',
  `css` text NOT NULL COMMENT '专题样式代码',
  `topic_img` varchar(255) DEFAULT NULL COMMENT '专题图片',
  `title_pic` varchar(255) DEFAULT NULL,
  `base_style` char(6) DEFAULT NULL,
  `htmls` mediumtext,
  `keywords` varchar(255) DEFAULT NULL COMMENT '专题页面关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '专题页面描述',
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='专题活动配置表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_topic`
--

INSERT INTO `zh_ec_topic` (`topic_id`, `title`, `intro`, `start_time`, `end_time`, `data`, `template`, `css`, `topic_img`, `title_pic`, `base_style`, `htmls`, `keywords`, `description`) VALUES
(1, '夏新优惠大酬宾', '<p>夏新产品优惠开始了</p>', 1241107200, 1246291200, 'O:8:"stdClass":1:{s:7:"default";a:1:{i:0;s:11:"夏新N7|17";}}', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_users`
--

CREATE TABLE IF NOT EXISTS `zh_ec_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员资料自增id',
  `email` varchar(60) NOT NULL COMMENT '会员邮箱',
  `user_name` varchar(60) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '用户密码',
  `question` varchar(255) NOT NULL COMMENT '安全问题',
  `answer` varchar(255) NOT NULL COMMENT '安全问题答案',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别，0，保密；1，男；2，女',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日日期',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户现有资金',
  `frozen_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户冻结资金',
  `pay_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '消费积分',
  `rank_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员等级积分',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收货信息id，取值表ecs_user_address',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次登录时间',
  `last_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '应该是最后一次修改信息时间，该表信息从其他表同步过来考虑',
  `last_ip` varchar(15) NOT NULL COMMENT '最后一次登录ip',
  `visit_count` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `user_rank` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '会员登记id，取值ecs_user_rank',
  `is_special` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ec_salt` varchar(10) DEFAULT NULL,
  `salt` varchar(10) NOT NULL DEFAULT '0',
  `parent_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '推荐人会员id',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(60) NOT NULL COMMENT '昵称',
  `msn` varchar(60) NOT NULL COMMENT 'msn',
  `qq` varchar(20) NOT NULL COMMENT 'qq',
  `office_phone` varchar(20) NOT NULL COMMENT '办公电话',
  `home_phone` varchar(20) NOT NULL COMMENT '家庭电话',
  `mobile_phone` varchar(20) NOT NULL COMMENT '手机',
  `is_validated` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credit_line` decimal(10,2) unsigned NOT NULL COMMENT '信用额度，目前2.6.0版好像没有作实现',
  `passwd_question` varchar(50) DEFAULT NULL,
  `passwd_answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `parent_id` (`parent_id`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- テーブルのデータのダンプ `zh_ec_users`
--

INSERT INTO `zh_ec_users` (`user_id`, `email`, `user_name`, `password`, `question`, `answer`, `sex`, `birthday`, `user_money`, `frozen_money`, `pay_points`, `rank_points`, `address_id`, `reg_time`, `last_login`, `last_time`, `last_ip`, `visit_count`, `user_rank`, `is_special`, `ec_salt`, `salt`, `parent_id`, `flag`, `alias`, `msn`, `qq`, `office_phone`, `home_phone`, `mobile_phone`, `is_validated`, `credit_line`, `passwd_question`, `passwd_answer`) VALUES
(1, 'ecshop@ecshop.com', 'ecshop', '554fcae493e564ee0dc75bdf2ebf94ca', '', '', 0, '1960-03-03', '0.00', '0.00', 98388, 15390, 1, 0, 1245048540, '0000-00-00 00:00:00', '0.0.0.0', 11, 0, 0, NULL, '0', 0, 0, '', '', '', '', '', '', 0, '0.00', NULL, NULL),
(2, 'vip@ecshop.com', 'vip', '232059cb5361a9336ccf1b8c2ba7657a', '', '', 0, '1949-01-01', '0.00', '0.00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '', 0, 0, 0, NULL, '0', 0, 0, '', '', '', '', '', '', 0, '0.00', NULL, NULL),
(3, 'text@ecshop.com', 'text', '1cb251ec0d568de6a929b520c4aed8d1', '', '', 0, '1949-01-01', '0.00', '0.00', 0, 0, 2, 0, 1242973574, '0000-00-00 00:00:00', '0.0.0.0', 2, 0, 0, NULL, '0', 0, 0, '', '', '', '', '', '', 0, '0.00', NULL, NULL),
(5, 'zuanshi@ecshop.com', 'zuanshi', '815a71fb334412e7ba4595741c5a111d', '', '', 0, '1949-01-01', '0.00', '10000.00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '', 0, 3, 0, NULL, '0', 0, 0, '', '', '', '', '', '', 0, '0.00', NULL, NULL),
(13, 'ectest1@qq.com', 'ectest1', 'd220939cf360860e21a3db2082a858a4', '', '', 0, '0000-00-00', '0.00', '0.00', 0, 0, 7, 1471294766, 1472168469, '0000-00-00 00:00:00', '127.0.0.1', 8, 0, 0, '9002', '0', 0, 0, '', '', '', '', '', '11111111111', 0, '0.00', 'friend_birthday', '11111111'),
(12, '1368712042@qq.com', 'zhouhong2', 'e6cb099cce5109c07ee8b8fce1b08bad', '', '', 0, '0000-00-00', '0.00', '0.00', 0, 0, 0, 1462738054, 1462738593, '0000-00-00 00:00:00', '127.0.0.1', 2, 0, 0, '5831', '0', 0, 0, '', '', '', '', '', '13167001526', 0, '0.00', 'old_address', '周家渡'),
(11, 'hong@metaphase.asia', 'zhouhong1', 'a6a6b8b1b603b81fdf76abd129105338', '', '', 0, '1956-01-01', '0.00', '0.00', 4994000, 0, 6, 1458594464, 1464898431, '0000-00-00 00:00:00', '127.0.0.1', 35, 0, 0, '3246', '0', 0, 0, '', '', '', '', '', '13167001526', 0, '0.00', 'old_address', 'zhoujiadu'),
(26, 'ectest2@qq.com', 'ectest2', '1686650a7046b9060ac05101c98d0f2d', '', '', 0, '1956-01-01', '0.00', '0.00', 0, 0, 0, 1472174610, 0, '0000-00-00 00:00:00', '', 0, 0, 0, NULL, '0', 0, 0, '', '', '', '', '', '', 0, '0.00', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_user_account`
--

CREATE TABLE IF NOT EXISTS `zh_ec_user_account` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户登录后保存在session中的id号，跟users表中的user_id对应',
  `admin_user` varchar(255) NOT NULL COMMENT '操作该笔交易的管理员的用户名',
  `amount` decimal(10,2) NOT NULL COMMENT '资金的数目，正数为增加，负数为减少',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '记录插入时间',
  `paid_time` int(10) NOT NULL DEFAULT '0' COMMENT '记录更新时间',
  `admin_note` varchar(255) NOT NULL COMMENT '管理员的被准',
  `user_note` varchar(255) NOT NULL COMMENT '用户的被准',
  `process_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '操作类型，1，退款；0，预付费，其实就是充值',
  `payment` varchar(90) NOT NULL COMMENT '支付渠道的名称，取自payment的pay_name字段',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已经付款，０，未付；１，已付',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `is_paid` (`is_paid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户资金流动表，包括提现和充值' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_user_address`
--

CREATE TABLE IF NOT EXISTS `zh_ec_user_address` (
  `address_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `address_name` varchar(50) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户表中的流水号',
  `consignee` varchar(60) NOT NULL COMMENT '收货人的名字',
  `email` varchar(60) NOT NULL COMMENT '收货人的email',
  `country` smallint(5) NOT NULL DEFAULT '0' COMMENT '收货人的国家',
  `province` smallint(5) NOT NULL DEFAULT '0' COMMENT '收货人的省份',
  `city` smallint(5) NOT NULL DEFAULT '0' COMMENT '收货人的城市',
  `district` smallint(5) NOT NULL DEFAULT '0' COMMENT '收货人的地区',
  `address` varchar(120) NOT NULL COMMENT '收货人的详细地址',
  `zipcode` varchar(60) NOT NULL COMMENT '收货人的邮编',
  `tel` varchar(60) NOT NULL COMMENT '收货人的电话',
  `mobile` varchar(60) NOT NULL COMMENT '收货人的手机',
  `sign_building` varchar(120) NOT NULL COMMENT '收货地址的标志性建筑名',
  `best_time` varchar(120) NOT NULL COMMENT '收货人的最佳收货时间',
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='收货人的信息表' AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `zh_ec_user_address`
--

INSERT INTO `zh_ec_user_address` (`address_id`, `address_name`, `user_id`, `consignee`, `email`, `country`, `province`, `city`, `district`, `address`, `zipcode`, `tel`, `mobile`, `sign_building`, `best_time`) VALUES
(1, '', 1, '刘先生', 'ecshop@ecshop.com', 1, 2, 52, 502, '海兴大厦', '', '010-25851234', '13986765412', '', ''),
(2, '', 3, '叶先生', 'text@ecshop.com', 1, 2, 52, 510, '通州区旗舰凯旋小区', '', '13588104710', '', '', ''),
(3, '', 6, '周鸿', '136871204@qq.com', 1, 25, 321, 2707, '地址1', '223221', '13167001526', '13167001526', '', ''),
(4, '', 11, '周鸿', '1368712041@qq.com', 1, 8, 112, 975, '延安西路205室', '021523', '111111111', '13167001526', '大楼', ''),
(6, '', 11, '周鸿', 'hong@metaphase.asia', 1, 25, 321, 2707, '南曹路', '021523', '111111111', '13167001526', '学校', '早上6点'),
(7, '', 13, '周鸿', 'ectest1@qq.com', 1, 25, 321, 2707, '南曹路901弄154号602室1', '201102', '11111111', '13167001526', '学校', '双休日上午');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_user_bonus`
--

CREATE TABLE IF NOT EXISTS `zh_ec_user_bonus` (
  `bonus_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '红包的流水号',
  `bonus_type_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '红包发送类型.0,按用户如会员等级,会员名称发放;1,按商品类别发送;2,按订单金额所达到的额度发送;3,线下发送',
  `bonus_sn` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '红包号,如果为0就是没有红包号.如果大于0,就需要输入该红包号才能使用红包',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '该红包属于某会员的id.如果为0,就是该红包不属于某会员',
  `used_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '红包使用的时间',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '使用了该红包的交易号',
  `emailed` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '猜的，应该是是否已经将红包发送到用户的邮箱；1，是；0，否；',
  PRIMARY KEY (`bonus_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='已经发送的红包信息列表' AUTO_INCREMENT=109 ;

--
-- テーブルのデータのダンプ `zh_ec_user_bonus`
--

INSERT INTO `zh_ec_user_bonus` (`bonus_id`, `bonus_type_id`, `bonus_sn`, `user_id`, `used_time`, `order_id`, `emailed`) VALUES
(1, 3, 0, 1, 1242142681, 4, 0),
(2, 4, 1000003379, 1, 1242976699, 14, 0),
(3, 4, 1000018450, 0, 0, 0, 0),
(4, 4, 1000023774, 0, 0, 0, 0),
(5, 4, 1000039394, 0, 0, 0, 0),
(6, 4, 1000049305, 0, 0, 0, 0),
(7, 4, 1000052248, 0, 0, 0, 0),
(8, 4, 1000061542, 0, 0, 0, 0),
(9, 4, 1000070278, 0, 0, 0, 0),
(10, 4, 1000080588, 0, 0, 0, 0),
(11, 4, 1000091405, 0, 0, 0, 0),
(24, 3, 0, 1, 0, 0, 0),
(25, 3, 0, 1, 0, 0, 0),
(26, 3, 0, 1, 0, 0, 0),
(27, 3, 0, 1, 0, 0, 0),
(28, 3, 0, 1, 0, 0, 0),
(29, 3, 0, 1, 0, 0, 0),
(30, 3, 0, 1, 0, 0, 0),
(31, 3, 0, 1, 0, 0, 0),
(106, 1, 0, 5, 0, 0, 1),
(105, 1, 0, 3, 0, 0, 1),
(79, 10, 0, 2, 0, 0, 1),
(78, 10, 0, 6, 0, 0, 1),
(77, 10, 0, 5, 0, 0, 1),
(76, 10, 0, 3, 0, 0, 1),
(75, 10, 0, 2, 0, 0, 1),
(82, 10, 0, 6, 0, 0, 1),
(74, 10, 0, 6, 0, 0, 1),
(73, 10, 0, 5, 0, 0, 1),
(72, 10, 0, 3, 0, 0, 1),
(71, 10, 0, 2, 0, 0, 1),
(70, 10, 0, 5, 0, 0, 1),
(69, 10, 0, 6, 0, 0, 1),
(68, 10, 0, 5, 0, 0, 1),
(104, 1, 0, 2, 0, 0, 1),
(96, 12, 1000117619, 0, 0, 0, 0),
(94, 12, 1000097707, 0, 0, 0, 0),
(84, 10, 0, 2, 0, 0, 1),
(85, 10, 0, 3, 0, 0, 1),
(86, 10, 0, 5, 0, 0, 1),
(87, 10, 0, 6, 0, 0, 1),
(88, 10, 0, 2, 0, 0, 1),
(89, 10, 0, 3, 0, 0, 1),
(90, 10, 0, 5, 0, 0, 1),
(91, 10, 0, 6, 0, 0, 1),
(92, 10, 0, 1, 0, 0, 1),
(93, 10, 0, 3, 0, 0, 1),
(99, 12, 1000146697, 0, 0, 0, 0),
(100, 12, 1000156160, 0, 0, 0, 0),
(101, 12, 1000164092, 0, 0, 0, 0),
(102, 12, 1000170102, 0, 0, 0, 0),
(103, 12, 1000185960, 0, 0, 0, 0),
(107, 1, 0, 12, 0, 0, 1),
(108, 1, 0, 11, 1464820552, 29, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_user_rank`
--

CREATE TABLE IF NOT EXISTS `zh_ec_user_rank` (
  `rank_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员等级编号，其中0是非会员',
  `rank_name` varchar(30) NOT NULL COMMENT '会员等级名称',
  `min_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '该等级的最低积分',
  `max_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '该等级的最高积分',
  `discount` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '该会员等级的商品折扣',
  `show_price` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否在不是该等级会员购买页面显示该会员等级的折扣价格.1,显示;0,不显示',
  `special_rank` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否事特殊会员等级组.0,不是;1,是',
  PRIMARY KEY (`rank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `zh_ec_user_rank`
--

INSERT INTO `zh_ec_user_rank` (`rank_id`, `rank_name`, `min_points`, `max_points`, `discount`, `show_price`, `special_rank`) VALUES
(1, '注册用户', 0, 10000, 100, 1, 0),
(2, 'vip', 10000, 10000000, 95, 1, 0),
(3, '代销用户', 0, 0, 90, 0, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_virtual_card`
--

CREATE TABLE IF NOT EXISTS `zh_ec_virtual_card` (
  `card_id` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '虚拟卡卡号自增id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '该虚拟卡对应的商品id，取值于表ecs_goods',
  `card_sn` varchar(60) NOT NULL COMMENT '加密后的卡号',
  `card_password` varchar(60) NOT NULL COMMENT '加密后的密码',
  `add_date` int(11) NOT NULL DEFAULT '0' COMMENT '卡号添加日期',
  `end_date` int(11) NOT NULL DEFAULT '0' COMMENT '卡号截至使用日期',
  `is_saled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否卖出，0，否；1，是',
  `order_sn` varchar(20) NOT NULL COMMENT '卖出该卡号的交易号，取值表ecs_order_info',
  `crc32` varchar(12) NOT NULL DEFAULT '0' COMMENT 'crc32后的key',
  PRIMARY KEY (`card_id`),
  KEY `goods_id` (`goods_id`),
  KEY `car_sn` (`card_sn`),
  KEY `is_saled` (`is_saled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='虚拟卡卡号库' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_volume_price`
--

CREATE TABLE IF NOT EXISTS `zh_ec_volume_price` (
  `price_type` tinyint(1) unsigned NOT NULL,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `volume_number` smallint(5) unsigned NOT NULL DEFAULT '0',
  `volume_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`price_type`,`goods_id`,`volume_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_ec_volume_price`
--

INSERT INTO `zh_ec_volume_price` (`price_type`, `goods_id`, `volume_number`, `volume_price`) VALUES
(1, 1, 5, '1366.00'),
(1, 9, 3, '2200.00'),
(1, 9, 5, '2100.00'),
(1, 13, 3, '1200.00'),
(1, 13, 5, '1150.00'),
(1, 36, 200, '270.00'),
(1, 36, 100, '280.00'),
(1, 37, 3, '2200.00'),
(1, 37, 5, '2100.00'),
(1, 49, 10, '290.00'),
(1, 48, 100, '4500.00'),
(1, 48, 200, '4000.00'),
(1, 49, 20, '280.00'),
(1, 52, 10, '2950.00');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_vote`
--

CREATE TABLE IF NOT EXISTS `zh_ec_vote` (
  `vote_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '在线调查自增id',
  `vote_name` varchar(250) NOT NULL COMMENT '在线调查主题',
  `start_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '在线调查开始时间',
  `end_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '在线调查结束时间',
  `can_multi` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '能否多选，0，可以；1，不可以',
  `vote_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票人数也可以说投票次数',
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站调查信息记录表' AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `zh_ec_vote`
--

INSERT INTO `zh_ec_vote` (`vote_id`, `vote_name`, `start_time`, `end_time`, `can_multi`, `vote_count`) VALUES
(1, 'このサイトを知る方法', 1213200000, 1474387200, 0, 1),
(6, '好きな買いたいのブランド', 1459180800, 1471536000, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_vote_log`
--

CREATE TABLE IF NOT EXISTS `zh_ec_vote_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '投票记录自增id',
  `vote_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '关联的投票主题id，取值表ecs_vote',
  `ip_address` varchar(15) NOT NULL COMMENT '投票的ip地址',
  `vote_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '投票的时间',
  PRIMARY KEY (`log_id`),
  KEY `vote_id` (`vote_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票记录表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_ec_vote_log`
--

INSERT INTO `zh_ec_vote_log` (`log_id`, `vote_id`, `ip_address`, `vote_time`) VALUES
(1, 6, '127.0.0.1', 1461188426),
(2, 1, '127.0.0.1', 1470349095);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_vote_option`
--

CREATE TABLE IF NOT EXISTS `zh_ec_vote_option` (
  `option_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '投票选项自增id',
  `vote_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '关联的投票主题id，取值表zh_vote',
  `option_name` varchar(250) NOT NULL COMMENT '投票选项的值',
  `option_count` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '该选项的票数',
  `option_order` tinyint(3) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`option_id`),
  KEY `vote_id` (`vote_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='投票的选项内容表' AUTO_INCREMENT=9 ;

--
-- テーブルのデータのダンプ `zh_ec_vote_option`
--

INSERT INTO `zh_ec_vote_option` (`option_id`, `vote_id`, `option_name`, `option_count`, `option_order`) VALUES
(1, 1, 'BBS', 1, 100),
(2, 1, '友達', 0, 100),
(3, 1, '友情リンク', 0, 100),
(7, 6, 'samsung', 0, 100),
(6, 6, 'apple', 0, 100),
(8, 6, 'xiaomi', 1, 100);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_ec_wholesale`
--

CREATE TABLE IF NOT EXISTS `zh_ec_wholesale` (
  `act_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '批发方案自增id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `rank_ids` varchar(255) NOT NULL COMMENT '适用会员登记，多个值之间用逗号分隔，取值于ec_user_rank',
  `prices` text NOT NULL COMMENT '序列化后的商品属性，数量，价格',
  `enabled` tinyint(3) unsigned NOT NULL COMMENT '批发方案是否可用',
  PRIMARY KEY (`act_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `zh_ec_wholesale`
--

INSERT INTO `zh_ec_wholesale` (`act_id`, `goods_id`, `goods_name`, `rank_ids`, `prices`, `enabled`) VALUES
(1, 21, '金立 A30', '1,2', 'a:1:{i:0;a:2:{s:4:"attr";a:1:{i:120;s:1:"0";}s:7:"qp_list";a:2:{i:0;a:2:{s:8:"quantity";i:50;s:5:"price";d:1700;}i:1;a:2:{s:8:"quantity";i:100;s:5:"price";d:1680;}}}}', 1),
(2, 38, '服1', '2,3', 'a:1:{i:0;a:2:{s:4:"attr";a:2:{i:219;s:3:"296";i:220;s:3:"298";}s:7:"qp_list";a:1:{i:0;a:2:{s:8:"quantity";i:200;s:5:"price";d:180;}}}}', 1),
(5, 44, 'ZH手机3', '2,3', '', 1),
(6, 43, 'ZH手机2', '2,3', '', 1),
(7, 45, 'ZH手机4', '2,3', '', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_erp_company`
--

CREATE TABLE IF NOT EXISTS `zh_erp_company` (
  `company_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `company_name` varchar(60) NOT NULL DEFAULT '' COMMENT '公司名',
  `company_pw` char(40) NOT NULL DEFAULT '' COMMENT '密码',
  `company_points` varchar(50) NOT NULL DEFAULT '0' COMMENT '点数',
  `company_login_id` varchar(225) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公司表格' AUTO_INCREMENT=17 ;

--
-- テーブルのデータのダンプ `zh_erp_company`
--

INSERT INTO `zh_erp_company` (`company_id`, `company_name`, `company_pw`, `company_points`, `company_login_id`) VALUES
(16, 'KL1', '111111', '190', 'KL');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_erp_points_log`
--

CREATE TABLE IF NOT EXISTS `zh_erp_points_log` (
  `log_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `company_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '公司id，同zh_erp_company的company_id',
  `log_title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `log_status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1，买入；2，作业中；3，作业完了',
  `log_content` text NOT NULL,
  `log_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点数',
  `starttime` int(10) NOT NULL DEFAULT '0' COMMENT '开始时间',
  PRIMARY KEY (`log_id`),
  KEY `cat_id` (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- テーブルのデータのダンプ `zh_erp_points_log`
--

INSERT INTO `zh_erp_points_log` (`log_id`, `company_id`, `log_title`, `log_status`, `log_content`, `log_points`, `starttime`) VALUES
(31, 16, '购买200积分', 4, '购买200积分', 200, 1467270376),
(32, 16, '修改首页的banner', 1, '修改首页的banner修改首页的banner\r\n修改首页的banner', 10, 1467270393);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_favorite`
--

CREATE TABLE IF NOT EXISTS `zh_favorite` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL,
  `cid` smallint(5) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收藏夹' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_favourable_activity`
--

CREATE TABLE IF NOT EXISTS `zh_favourable_activity` (
  `act_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '优惠活动的自增id',
  `act_name` varchar(255) NOT NULL COMMENT '优惠活动的活动名称',
  `start_time` int(10) unsigned NOT NULL COMMENT '活动的开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '活动的结束时间',
  `user_rank` varchar(255) NOT NULL COMMENT '可以参加活动的用户信息，取值于user_rank的rank_id；其中0是非会员，其他是相应的会员等级；多个值用逗号分隔',
  `act_range` tinyint(3) unsigned NOT NULL COMMENT '优惠范围；0，全部商品；1，按分类；2，按品牌；3，按商品',
  `act_range_ext` varchar(255) NOT NULL COMMENT '根据优惠活动范围的不同，该处意义不同；但是都是优惠范围的约束；如，如果是商品，该处是商品的id，如果是品牌，该处是品牌的id',
  `min_amount` decimal(10,2) unsigned NOT NULL COMMENT '订单达到金额下限，才参加活动',
  `max_amount` decimal(10,2) unsigned NOT NULL COMMENT '参加活动的订单金额下限，0，表示没有上限',
  `act_type` tinyint(3) unsigned NOT NULL COMMENT '参加活动的优惠方式；0，送赠品或优惠购买；1，现金减免；价格打折优惠',
  `act_type_ext` decimal(10,2) unsigned NOT NULL COMMENT '如果是送赠品，该处是允许的最大数量，0，无数量限制；现今减免，则是减免金额，单位元；打折，是折扣值，100算，8折就是80',
  `gift` text NOT NULL COMMENT '如果有特惠商品，这里是序列化后的特惠商品的id,name,price信息;取值于zh_goods的goods_id，goods_name，价格是添加活动时填写的',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '活动在优惠活动页面显示的先后顺序，数字越大越靠后',
  PRIMARY KEY (`act_id`),
  KEY `act_name` (`act_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_favourable_activity`
--

INSERT INTO `zh_favourable_activity` (`act_id`, `act_name`, `start_time`, `end_time`, `user_rank`, `act_range`, `act_range_ext`, `min_amount`, `max_amount`, `act_type`, `act_type_ext`, `gift`, `sort_order`) VALUES
(1, '5.1诺基亚优惠活动', 1241107200, 1253030400, '1,2', 2, '1', '500.00', '5000.00', 2, '95.00', 'a:0:{}', 50);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_field`
--

CREATE TABLE IF NOT EXISTS `zh_field` (
  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `field_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 正常 0 禁用',
  `field_type` varchar(255) NOT NULL DEFAULT '' COMMENT '字段类型 text|textarea|radio|checkbox|image|images|datetime|',
  `table_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '字段所在表 1 主表 2 副表',
  `table_name` varchar(255) NOT NULL DEFAULT '' COMMENT '所在表名',
  `field_name` varchar(255) NOT NULL DEFAULT '' COMMENT '字段name名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '字段标题 ',
  `tips` varchar(255) NOT NULL DEFAULT '' COMMENT '字段提示',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 开启 0 关闭',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为系统字段',
  `fieldsort` mediumint(9) NOT NULL DEFAULT '100' COMMENT '字段排序',
  `set` text COMMENT '字段设置',
  `css` varchar(255) NOT NULL DEFAULT '' COMMENT 'CSS样式',
  `minlength` char(255) NOT NULL DEFAULT '' COMMENT '最小字数',
  `maxlength` char(255) NOT NULL DEFAULT '' COMMENT '最大字数',
  `validate` char(255) NOT NULL DEFAULT '' COMMENT '正则验证',
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否必须输入',
  `error` varchar(255) NOT NULL DEFAULT '' COMMENT '错误提示',
  `isunique` tinyint(1) NOT NULL DEFAULT '0' COMMENT '值唯一',
  `isbase` tinyint(1) NOT NULL DEFAULT '1' COMMENT '作为基本信息',
  `issearch` tinyint(1) NOT NULL DEFAULT '1' COMMENT '作为搜索条件',
  `isadd` tinyint(1) NOT NULL DEFAULT '1' COMMENT '在前台投稿中显示',
  PRIMARY KEY (`fid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='模型字段' AUTO_INCREMENT=342 ;

--
-- テーブルのデータのダンプ `zh_field`
--

INSERT INTO `zh_field` (`fid`, `mid`, `field_state`, `field_type`, `table_type`, `table_name`, `field_name`, `title`, `tips`, `enable`, `is_system`, `fieldsort`, `set`, `css`, `minlength`, `maxlength`, `validate`, `required`, `error`, `isunique`, `isbase`, `issearch`, `isadd`) VALUES
(1, 1, 1, 'title', 1, 'content', 'title', 'タイトル', '', 1, 1, 1, 'a:2:{s:4:"size";s:3:"300";s:7:"default";s:0:"";}', '', '0', '100', '', 1, '', 0, 1, 1, 1),
(2, 1, 1, 'input', 1, 'content', 'html_path', 'htmlファイル名', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(3, 1, 1, 'flag', 1, 'content', 'flag', '属性', '', 1, 1, 12, '', '', '0', '', '', 0, '', 0, 1, 1, 0),
(4, 1, 1, 'input', 1, 'content', 'seo_title', 'SEOタイトル', '', 1, 1, 13, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(5, 1, 1, 'thumb', 1, 'content', 'thumb', 'サムネイル', '', 1, 1, 20, '', '', '0', '', '', 0, '', 0, 0, 0, 1),
(6, 1, 1, 'cid', 1, 'content', 'cid', 'カテゴリ', '', 1, 1, 2, '', '', '0', '', '', 0, '', 0, 1, 0, 1),
(7, 1, 1, 'input', 1, 'content', 'source', '来源', '', 1, 1, 26, 'a:3:{s:4:"size";s:3:"150";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(8, 1, 1, 'input', 1, 'content', 'redirecturl', '遷移リンク', '', 1, 1, 21, 'a:3:{s:4:"size";s:3:"150";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '/^http:///', 0, '', 0, 0, 0, 0),
(9, 1, 1, 'box', 1, 'content', 'allowreply', '返信許可', '', 1, 1, 23, 'a:3:{s:7:"options";s:12:"1| 是,2|否";s:9:"form_type";s:5:"radio";s:7:"default";s:1:"1";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(10, 1, 1, 'datetime', 1, 'content', 'addtime', '新規時間', '', 1, 1, 25, 'a:1:{s:6:"format";s:1:"1";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(11, 1, 1, 'template', 1, 'content', 'template', 'テンプレート', '', 1, 1, 100, '', '', '0', '', '', 0, '', 0, 1, 0, 0),
(12, 1, 1, 'tag', 1, 'content', 'tag', 'tag', '', 1, 1, 17, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(13, 1, 1, 'box', 1, 'content', 'url_type', '文章アクセス方式', '', 1, 1, 100, 'a:3:{s:7:"options";s:45:"1|静态访问,2|动态访问 ,3|继承栏目";s:9:"form_type";s:5:"radio";s:7:"default";s:1:"3";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(14, 1, 1, 'number', 1, 'content', 'arc_sort', 'ソート', '', 1, 1, 100, 'a:5:{s:10:"field_type";s:9:"mediumint";s:11:"num_integer";s:1:"6";s:11:"num_decimal";s:1:"2";s:4:"size";s:3:"150";s:7:"default";s:3:"100";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(15, 1, 1, 'input', 1, 'content', 'keywords', 'キーワード', '', 1, 1, 18, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(16, 1, 1, 'textarea', 1, 'content', 'description', '説明', '', 1, 1, 19, 'a:3:{s:5:"width";s:3:"500";s:6:"height";s:3:"100";s:7:"default";s:0:"";}', '', '0', '', '', 0, '', 0, 1, 0, 1),
(17, 1, 1, 'content', 2, 'content_data', 'content', '本文', '', 1, 1, 14, '', '', '0', '', '', 0, '', 0, 1, 0, 1),
(18, 1, 1, 'number', 1, 'content', 'click', 'クリック数', '', 1, 1, 100, 'a:4:{s:11:"num_integer";s:1:"6";s:11:"num_decimal";s:1:"2";s:4:"size";s:3:"150";s:7:"default";s:3:"100";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(19, 1, 1, 'number', 1, 'content', 'read_credits', '閲読金貨', '', 1, 0, 100, 'a:5:{s:10:"field_type";s:8:"smallint";s:11:"num_integer";s:1:"6";s:11:"num_decimal";s:1:"2";s:4:"size";s:3:"150";s:7:"default";s:1:"0";}', '', '0', '', '/^[0-9-]+$/', 0, '', 0, 0, 0, 0),
(341, 19, 1, 'files', 1, 'news', 'testfile', 'testfile', '', 1, 0, 100, 'a:2:{s:3:"num";s:2:"10";s:8:"filetype";s:19:"zip,rar,doc,ppt,mp4";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(340, 19, 1, 'input', 1, 'news', 'inputtest', '単桁テキスト', '単桁テキストテスト', 1, 0, 3, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(339, 19, 0, 'number', 1, 'news', 'read_credits', '閲読金貨', '', 1, 0, 100, 'a:5:{s:10:"field_type";s:8:"smallint";s:11:"num_integer";s:1:"6";s:11:"num_decimal";s:1:"2";s:4:"size";s:3:"150";s:7:"default";s:1:"0";}', '', '0', '', '/^[0-9-]+$/', 0, '', 0, 0, 0, 0),
(336, 19, 0, 'textarea', 1, 'news', 'description', '説明', '', 1, 1, 100, 'a:3:{s:5:"width";s:3:"500";s:6:"height";s:3:"100";s:7:"default";s:0:"";}', '', '0', '', '', 0, '', 0, 1, 0, 1),
(335, 19, 0, 'input', 1, 'news', 'keywords', 'キーワード', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(337, 19, 0, 'content', 2, 'news_data', 'content', '本文', '', 1, 1, 100, '', '', '0', '', '', 0, '', 0, 1, 0, 1),
(338, 19, 0, 'number', 1, 'news', 'click', 'クリック数', '', 1, 1, 100, 'a:4:{s:11:"num_integer";s:1:"6";s:11:"num_decimal";s:1:"2";s:4:"size";s:3:"150";s:7:"default";s:3:"100";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(334, 19, 0, 'number', 1, 'news', 'arc_sort', 'ソート', '', 1, 1, 100, 'a:5:{s:10:"field_type";s:9:"mediumint";s:11:"num_integer";s:1:"6";s:11:"num_decimal";s:1:"2";s:4:"size";s:3:"150";s:7:"default";s:3:"100";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(330, 19, 0, 'datetime', 1, 'news', 'addtime', '新規時間', '', 1, 1, 100, 'a:1:{s:6:"format";s:1:"1";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(331, 19, 0, 'template', 1, 'news', 'template', 'テンプレート', '', 1, 1, 100, '', '', '0', '', '', 0, '', 0, 1, 0, 0),
(332, 19, 0, 'tag', 1, 'news', 'tag', 'tag', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(333, 19, 0, 'box', 1, 'news', 'url_type', '文章アクセス方式', '', 1, 1, 100, 'a:3:{s:7:"options";s:45:"1|静态访问,2|动态访问 ,3|继承栏目";s:9:"form_type";s:5:"radio";s:7:"default";s:1:"3";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(329, 19, 0, 'box', 1, 'news', 'allowreply', '返信許可', '', 1, 1, 100, 'a:3:{s:7:"options";s:12:"1| 是,2|否";s:9:"form_type";s:5:"radio";s:7:"default";s:1:"1";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(328, 19, 0, 'input', 1, 'news', 'redirecturl', '遷移リンク', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"150";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '/^http:///', 0, '', 0, 0, 0, 0),
(325, 19, 0, 'thumb', 1, 'news', 'thumb', 'サムネイル', '', 1, 1, 100, '', '', '0', '', '', 0, '', 0, 0, 0, 1),
(326, 19, 1, 'cid', 1, 'news', 'cid', 'カテゴリ', '', 1, 1, 2, '', '', '0', '', '', 0, '', 0, 1, 0, 1),
(327, 19, 0, 'input', 1, 'news', 'source', '来源', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"150";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 0, 0, 0),
(324, 19, 0, 'input', 1, 'news', 'seo_title', 'SEOタイトル', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(323, 19, 1, 'flag', 1, 'news', 'flag', '属性', '', 1, 1, 100, '', '', '0', '', '', 0, '', 0, 1, 1, 0),
(322, 19, 0, 'input', 1, 'news', 'html_path', 'htmlファイル名', '', 1, 1, 100, 'a:3:{s:4:"size";s:3:"300";s:7:"default";s:0:"";s:8:"ispasswd";s:1:"0";}', '', '0', '', '', 0, '', 0, 1, 0, 0),
(321, 19, 1, 'title', 1, 'news', 'title', 'タイトル', '', 1, 1, 1, 'a:2:{s:4:"size";s:3:"300";s:7:"default";s:0:"";}', '', '0', '100', '', 1, '', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_icon`
--

CREATE TABLE IF NOT EXISTS `zh_icon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `webid` int(11) DEFAULT NULL,
  `kind` char(50) NOT NULL,
  `picurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- テーブルのデータのダンプ `zh_icon`
--

INSERT INTO `zh_icon` (`id`, `webid`, `kind`, `picurl`) VALUES
(1, 1, '热门', '/upload/icon/hot.png'),
(2, 1, '促销', '/upload/icon/chuxiao.png'),
(3, 1, '打折', '/upload/icon/discount.png'),
(4, 1, '活动', '/upload/icon/huodong.png'),
(5, 1, '特价', '/upload/icon/special.png'),
(6, 1, '抢购', '/upload/icon/buy.png');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_kindorderlist`
--

CREATE TABLE IF NOT EXISTS `zh_kindorderlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(2) unsigned DEFAULT '0',
  `typeid` int(1) unsigned DEFAULT NULL COMMENT '栏目类型',
  `aid` varchar(255) DEFAULT NULL COMMENT '文章的aid',
  `classid` int(11) DEFAULT NULL COMMENT '分类id',
  `displayorder` int(11) unsigned DEFAULT '9999' COMMENT '排序ID',
  `istejia` int(1) unsigned DEFAULT '0' COMMENT '特惠',
  `isding` int(1) unsigned DEFAULT '0' COMMENT '是否置顶',
  `isjian` int(1) unsigned DEFAULT '0' COMMENT '是否推荐',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `displayorder` (`displayorder`),
  KEY `isding` (`isding`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ssmall分类排序表' AUTO_INCREMENT=24 ;

--
-- テーブルのデータのダンプ `zh_kindorderlist`
--

INSERT INTO `zh_kindorderlist` (`id`, `webid`, `typeid`, `aid`, `classid`, `displayorder`, `istejia`, `isding`, `isjian`) VALUES
(1, 0, 1, '17', 6, 1, 0, 0, 0),
(2, 0, 1, '19', 6, 2, 0, 0, 0),
(3, 0, 1, '18', 6, 3, 0, 0, 0),
(4, 1, 1, '17', 6, 3, 0, 0, 0),
(5, 1, 1, '20', 6, 1, 0, 0, 0),
(6, 1, 1, '18', 6, 2, 0, 0, 0),
(7, 1, 1, '19', 6, 4, 0, 0, 0),
(8, 1, 1, '18', 11, 1, 0, 0, 0),
(9, 1, 1, '19', 11, 2, 0, 0, 0),
(10, 1, 1, '17', 11, 3, 0, 0, 0),
(11, 2, 1, '21', 6, 1, 0, 0, 0),
(12, 2, 1, '17', 6, 2, 0, 0, 0),
(13, 2, 1, '22', 12, 2, 0, 0, 0),
(14, 2, 1, '21', 12, 1, 0, 0, 0),
(15, 3, 1, '18', 6, 1, 0, 0, 0),
(16, 3, 1, '23', 6, 2, 0, 0, 0),
(17, 3, 1, '18', 11, 9999, 0, 0, 0),
(18, 1, 1, '25', 6, 5, 0, 0, 0),
(19, 1, 1, '24', 6, 6, 0, 0, 0),
(20, 1, 1, '17', 8, 1, 0, 0, 0),
(21, 1, 1, '24', 8, 2, 0, 0, 0),
(22, 1, 1, '22', 8, 3, 0, 0, 0),
(23, 1, 1, '26', 27, 9999, 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line`
--

CREATE TABLE IF NOT EXISTS `zh_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(11) unsigned DEFAULT '1',
  `aid` int(11) unsigned DEFAULT NULL COMMENT '文章ID',
  `linetype` varchar(50) DEFAULT NULL COMMENT '线路类型',
  `linename` varchar(255) DEFAULT NULL COMMENT '线路标题',
  `lineicon` varchar(100) DEFAULT NULL,
  `oldname` varchar(255) DEFAULT NULL COMMENT '批发商线路名称',
  `wholesale` varchar(255) DEFAULT NULL COMMENT '批发商名称',
  `wholesalel` varchar(255) DEFAULT NULL COMMENT '批发商联系方式',
  `starttime` int(11) DEFAULT NULL COMMENT '有效期开始时间',
  `endtime` int(11) DEFAULT NULL COMMENT '有效期结束时间',
  `seotitle` varchar(100) DEFAULT NULL COMMENT 'seo标题',
  `startcity` varchar(255) DEFAULT NULL COMMENT '出发城市',
  `overcity` varchar(255) DEFAULT NULL COMMENT '目的城市',
  `linedate` varchar(255) DEFAULT NULL COMMENT '出团日期',
  `lineclassid` varchar(255) DEFAULT NULL COMMENT '对应专线',
  `tprice` decimal(10,0) DEFAULT NULL COMMENT '同行价',
  `profit` decimal(10,0) DEFAULT NULL COMMENT '利润',
  `lineprice` int(11) unsigned DEFAULT NULL COMMENT '线路报价',
  `lineday` int(3) unsigned DEFAULT NULL COMMENT '线路天数',
  `linenight` int(5) DEFAULT NULL COMMENT '多少晚',
  `linephone` int(11) DEFAULT NULL COMMENT '线路电话',
  `linespot` longtext COMMENT '线路途经景点',
  `linepic` varchar(255) DEFAULT NULL COMMENT '线路图片',
  `linedoc` text COMMENT '线路行程word版地址',
  `tagword` varchar(255) DEFAULT NULL COMMENT 'tag词',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `jieshao` longtext COMMENT '线路行程',
  `biaozhun` longtext COMMENT '服务标准',
  `beizu` longtext COMMENT '温鑫提示(备注)',
  `payment` longtext COMMENT '付款方式',
  `feeinclude` longtext COMMENT '费用包含',
  `features` longtext COMMENT '行程特色',
  `description` varchar(700) DEFAULT NULL COMMENT '描述',
  `shownum` int(11) DEFAULT '1' COMMENT '浏览次数',
  `seatleft` int(11) DEFAULT NULL COMMENT '空位数',
  `storeprice` int(11) DEFAULT NULL COMMENT '门市价',
  `childprice` int(11) DEFAULT NULL COMMENT '小孩报价',
  `transport` longtext COMMENT '交通方式',
  `linebefore` int(11) DEFAULT NULL COMMENT '提前报名天数',
  `isjian` int(11) DEFAULT '0' COMMENT '是否推荐',
  `isding` int(11) DEFAULT '0' COMMENT '是否置顶',
  `istejia` int(3) DEFAULT NULL COMMENT '用于置顶的字段',
  `yesjian` int(11) unsigned DEFAULT '0' COMMENT '前台推荐次数',
  `nojian` int(11) unsigned DEFAULT '0' COMMENT '前台不推荐次数',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  `modtime` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  `reserved1` longtext COMMENT '线路内容自定义1',
  `reserved2` longtext COMMENT '线路内容自定义2',
  `reserved3` longtext COMMENT '线路内容自定义3',
  `displayorder` int(11) DEFAULT '9999' COMMENT '排列顺序',
  `isbold` int(2) DEFAULT '0' COMMENT '是否加粗',
  `color` varchar(255) DEFAULT NULL COMMENT '标题颜色',
  `bigpic` varchar(255) DEFAULT NULL COMMENT '大图地址',
  `ssmaltype` int(1) DEFAULT '0',
  `ssmalprovince` int(1) DEFAULT NULL COMMENT '省',
  `ssmalcity` int(1) DEFAULT NULL COMMENT '市',
  `ssmalarea` int(1) DEFAULT NULL COMMENT '景区',
  `sdisplayorder` int(11) DEFAULT '9999',
  `childrule` varchar(255) NOT NULL DEFAULT '' COMMENT '小孩说明',
  `kindlist` varchar(255) DEFAULT NULL COMMENT '所属目的地',
  `themelist` varchar(255) DEFAULT NULL COMMENT '主题',
  `webidfs` varchar(255) DEFAULT NULL COMMENT '子站webid',
  `attrid` varchar(255) DEFAULT NULL COMMENT '主站属性',
  `satisfyscore` varchar(255) DEFAULT NULL COMMENT '满意度',
  `bookcount` int(11) unsigned DEFAULT NULL COMMENT '预订次数',
  `ishidden` int(3) DEFAULT '0',
  `childkind` varchar(255) DEFAULT NULL COMMENT '所属子站分类',
  `txtjieshao` mediumtext,
  `isstyle` varchar(255) DEFAULT NULL,
  `sellpoint` varchar(255) DEFAULT NULL COMMENT '卖点',
  `upstyle` int(1) NOT NULL DEFAULT '0',
  `piclist` text,
  `distance` int(6) DEFAULT NULL,
  `zijiaseat` varchar(255) DEFAULT NULL,
  `zijiaprice` varchar(255) DEFAULT NULL,
  `zijiacar` varchar(255) DEFAULT NULL COMMENT '车辆名称(类型)',
  `jifencomment` int(11) DEFAULT '0' COMMENT '评论送积分',
  `jifentprice` int(11) DEFAULT '0' COMMENT '积分抵现金',
  `jifenbook` int(11) DEFAULT '0' COMMENT '预订送积分',
  `dingjin` int(11) DEFAULT '0' COMMENT '是否支持定金',
  `showrepast` int(1) DEFAULT '1' COMMENT '是否显示餐饮',
  `paytype` int(1) DEFAULT '1' COMMENT '支付方式',
  `template` varchar(255) DEFAULT 'line_show.htm' COMMENT '使用模板',
  `iconlist` varchar(255) DEFAULT NULL,
  `supplierlist` varchar(255) DEFAULT NULL,
  `babyrule` varchar(225) NOT NULL,
  `holiday` varchar(100) DEFAULT NULL,
  `corporationnum` int(11) DEFAULT '1',
  `magrecommend` longtext,
  `shotcontent` longtext,
  `linesn` varchar(100) DEFAULT NULL,
  `baf` int(3) DEFAULT '0',
  `hotlinetel` varchar(100) DEFAULT NULL,
  `hotlines` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kindlist` (`kindlist`),
  KEY `searchkey` (`kindlist`(50),`attrid`(50)),
  KEY `lineday` (`lineday`),
  KEY `lineprice` (`lineprice`),
  KEY `attrid` (`attrid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=35 ;

--
-- テーブルのデータのダンプ `zh_line`
--

INSERT INTO `zh_line` (`id`, `webid`, `aid`, `linetype`, `linename`, `lineicon`, `oldname`, `wholesale`, `wholesalel`, `starttime`, `endtime`, `seotitle`, `startcity`, `overcity`, `linedate`, `lineclassid`, `tprice`, `profit`, `lineprice`, `lineday`, `linenight`, `linephone`, `linespot`, `linepic`, `linedoc`, `tagword`, `keyword`, `jieshao`, `biaozhun`, `beizu`, `payment`, `feeinclude`, `features`, `description`, `shownum`, `seatleft`, `storeprice`, `childprice`, `transport`, `linebefore`, `isjian`, `isding`, `istejia`, `yesjian`, `nojian`, `addtime`, `modtime`, `reserved1`, `reserved2`, `reserved3`, `displayorder`, `isbold`, `color`, `bigpic`, `ssmaltype`, `ssmalprovince`, `ssmalcity`, `ssmalarea`, `sdisplayorder`, `childrule`, `kindlist`, `themelist`, `webidfs`, `attrid`, `satisfyscore`, `bookcount`, `ishidden`, `childkind`, `txtjieshao`, `isstyle`, `sellpoint`, `upstyle`, `piclist`, `distance`, `zijiaseat`, `zijiaprice`, `zijiacar`, `jifencomment`, `jifentprice`, `jifenbook`, `dingjin`, `showrepast`, `paytype`, `template`, `iconlist`, `supplierlist`, `babyrule`, `holiday`, `corporationnum`, `magrecommend`, `shotcontent`, `linesn`, `baf`, `hotlinetel`, `hotlines`) VALUES
(29, 2, 0, '', '上海到大阪 4日游', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 2060, 4, 4, 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433536, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,11', '', '', '', '', 0, 0, '', '', '', '上海到大阪 4日游', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(30, 2, 0, '', '上海到名古屋3日游', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 0, 3, 3, 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443586868, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,13', '', '', '', '', 0, 0, '', '', '', '上海到名古屋3日游线路卖点', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '1', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(31, 3, 0, '', '北京到冲绳 4日游', '', '', '', '', 0, 0, '', '3', '', '', '', '0', '0', 0, 4, 4, 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443593888, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,35', '', '', '157,153,45', '', 0, 0, '', '', '', '北京到冲绳 4日游 沙滩海洋游泳海鲜', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(22, 2, 0, '', '上海出发 东京-北海道 快乐游4日', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 0, 4, 4, 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433625, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,8,14,12', '', '', '157,45', '', 0, 0, '', '', '', '上海出发 东京-北海道 快乐游 东京迪斯尼', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '1', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(23, 3, 0, '', '北京 日本大阪深度游3日', '', '', '', '', 0, 0, '', '3', '', '', '', '0', '0', 0, 3, 3, 0, '', '', '', '', '', '', '', '', '', '', '', '', 2, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433678, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,11', '', '', '85,86,84', '', 0, 0, '', '', '', '北京 日本大阪深度游3日 日本的名胜古迹，庙会，烟花大会', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(25, 6, NULL, NULL, '青岛去北海道2日游', '', NULL, NULL, NULL, NULL, NULL, '', '9', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, 'upload/original/line/2015/09/21/20801442819297.jpg', '', NULL, '', '', '', '', '', '', '', '', 1, NULL, 0, NULL, '飞机', 0, 0, 0, NULL, 0, 0, NULL, 1443433718, '', '', '', 9999, 0, '', NULL, 0, NULL, NULL, NULL, 9999, '', '6,12', NULL, NULL, '45,142', '', 0, 0, NULL, NULL, '', '青岛去北海道2日游 北海道2天玩够', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 'line_show.htm', '', NULL, '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(26, 3, NULL, NULL, '北京-美国3日游', '', NULL, NULL, NULL, NULL, NULL, '', '3', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', '', 1, NULL, 0, NULL, '', 0, 0, 0, NULL, 0, 0, NULL, 1443433651, '', '', '', 9999, 0, '', NULL, 0, NULL, NULL, NULL, 9999, '', '1,27,31', NULL, NULL, '', '', 0, 0, NULL, NULL, '', '北京-美国3日游 深度旅游', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 'line_show.htm', '', NULL, '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(27, 2, NULL, NULL, '上海到意大利 3日', '', NULL, NULL, NULL, NULL, NULL, '', '2', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', '', 1, NULL, 0, NULL, '', 0, 0, 0, NULL, 0, 0, NULL, 1443433610, '', '', '', 9999, 0, '', NULL, 0, NULL, NULL, NULL, 9999, '', '1,26,29', NULL, NULL, '', '', 0, 0, NULL, NULL, '', '上海到意大利 3日 感受艺术气息', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 'line_show.htm', '', NULL, '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(28, 2, 0, '', '上海到巴西 3日游', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 1200, 3, 3, 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433601, '&lt;p&gt;简要行程简要行程简要行程简要行程简要行程&lt;/p&gt;&lt;p&gt;简要行程简要行程简要行程简要行程&lt;/p&gt;', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '1,27,32', '', '', '', '', 0, 0, '', '', '', '上海到巴西 3日游 世界杯开始了', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(24, 3, 0, '', '北京 日本 东京深度游 4天 超棒1', '', '', '', '', 0, 0, '', '3', '', '', '', '0', '0', 0, 4, 4, 0, '', '', '', '', '', '', '', '', '', '', '', '', 2, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433658, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,8,10,14', '', '', '157,45', '', 0, 0, '', '', '', '北京 日本 东京深度游 4天 迪斯尼 新宿', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '5,6', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(17, 2, 0, '', '上海出发大阪+京都+箱根+东京-大阪7日游', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 0, 7, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', 2, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433617, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,8,11,24,25', '', '', '157,45', '', 0, 0, '', '', '', '日本大阪+京都+箱根+东京7日6晚跟团游(3钻)·聚划算=东阪2天净free+2.5h新干线+1晚温泉', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '4,5', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(18, 3, NULL, NULL, '北京出发  京都-大阪3日游', '', NULL, NULL, NULL, NULL, NULL, '', '3', NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', '', 3, NULL, 0, NULL, '', 0, 0, 0, NULL, 0, 0, NULL, 1443433670, '', '', '', 9999, 0, '', NULL, 0, NULL, NULL, NULL, 9999, '', '6,24,11', NULL, NULL, '', '', 0, 0, NULL, NULL, '', '北京出发  京都-大阪3日游 富士山，日本美食', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 'line_show.htm', '', NULL, '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(19, 6, 0, '', '大连出发去 日本+大阪+北海道4日游', '', '', '', '', 0, 0, '', '8', '', '', '', '0', '0', 0, 4, 4, 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1443433731, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,11,12', '', '', '143,45', '', 0, 0, '', '', '', '大连出发去 日本+大阪+北海道4日游 滑雪温泉', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(20, 6, 0, '', '&lt;广州出发-日本，箱根，北海道4日游&gt;广州直飞， 畅快赏枫，立减', '', '', '', '', 0, 0, '', '5', '', '', '', '0', '0', 1300, 3, 3, 0, '', 'upload/original/line/2015/09/18/92531442563368.jpg', 'upload/original/line/2015/10/14/39101444807594.pdf||,', '', '', '', '&lt;table height=&quot;120&quot; width=&quot;675&quot;&gt;&lt;tbody&gt;&lt;tr class=&quot;firstRow&quot;&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航班信息&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航空公司&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航班号&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;起飞机场&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;起飞时间&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;到达机场&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;到达时间&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;去程&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;日本航空&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;JL872&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;上海浦东国际机场&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;09:00AM&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;东京成田机场&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;21:35PM&lt;br/&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;返程&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;日本航空&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;JL872&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;上海成田机场&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;09:00AM&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;上海浦东国际机场&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;21:35PM&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;【散客接】：游客在成都市二环内含接不送。&lt;/p&gt;&lt;p&gt;【证件说明】：请您在签订合同的时候提供有效的身份证件以及随行人员的身份证件及姓名，行\r\n程中也请您随身携带有效期内的身份证件（国内游客：身份证、军官证，国际游客：护照），住宿及景区同样出示证件！敬请配合旅行社工作！如因个人原因没有带\r\n有效身份证件造成无法办理入住手续而造成的损失，游客自行承担责任。&lt;/p&gt;&lt;p&gt;【不可抗力免责说明】：由于不可抗力等不可归责于旅行社的的客观原因或\r\n旅游者个人原因，造成旅游者经济损失的，旅行社不承担赔偿责任。如恶劣天气、自然灾害、火车延误、汽车塞车等不可抗力原因如造成团队行程更改，延误、滞留\r\n或提前结束时，旅行社不承担责任。因此发生的费用增减，按未发生费用退还游客，超支费用由游客承担的办法处理。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;【退\r\n团说明】: \r\n游客报名后因故不能参加本次旅游，可在出发前换人参团，在旅行社重新签订合同；如果确认退团，游客须承担大小交通损失费，出发前7天内要求退团，还须赔偿\r\n旅行社业务预订损失费。如出发前3天内退团，按照团款的90%损失费赔偿给旅行社；出发后如中途取消，所有团款不退。&lt;/p&gt;&lt;p&gt;【保险说明】：旅行社\r\n已经购买旅行社责任险，建议游客购买旅游人身伤害意外险，为自己提供全方位的保障。旅行社责任险是旅行社投保，保险公司承保旅行社在组织旅游活动过程中因\r\n疏忽、过失造成事故所应承担的法律赔偿责任的险种。旅游人身意外伤害险(请关注各保险公司对于投保游客年龄的限制，对于70岁以上游客，保险公司一般是不\r\n接受投保)，游客自行缴费即为该保险的投保人和受益人，由保险公司对游客受到的意外伤害进行承保，意外伤害的定义是【指遭受外来的、突发的、非本意的、非\r\n疾病的客观事件直接致使身体受到的伤害】。游客认真阅读旅游人身意外伤害险的具体条款并无异议后，自己在保险公司购买或委托旅行社代为购买。游客如办理旅\r\n游意外险，国内游另交10元/人，由旅行社代游客到保险公司购买，理赔额度解释权归保险公司所有)，70岁以上请自行办理保险，保险公司的赔付额为最终赔\r\n付，旅行社不再进行赔偿。游客应保证自身身体条件能够顺利完成旅游活动，游客自身疾病不在保险赔付范围之列，由自身疾病所产生一切费用均自理，一切后果均\r\n自担，旅行社及保险公司均不承担责任。因道路交通事故造成游客人身及财产损失，将依据《道路交通事故处理办法》进行赔偿，我社给予协助。游客在旅游活动\r\n中，发生意外伤害时，旅行社协助游客联络医疗机构进行救治并向保险公司报案，游客或其家属自行缴付医疗费用，因游客或家属拒付医疗费用造成的各种伤害和风\r\n险旅行社不承担责任，治疗结束后旅行社协助游客办理保险赔付手续。&lt;/p&gt;&lt;p&gt;【导游服务说明】：常规散客拼团，旅行社安排随车导游一名，提供行程解说\r\n及沿途食宿安排及沿途风土人情介绍服务，不陪同客人进入有讲解员或属于自然风景观光的旅游景区（例：九寨沟及牟托寨景区有专业讲解员，黄龙景区为自然风景\r\n观光）；为提高旅游接待水平，烦请您与我们共同督促导游人员严格遵守行业规定，有任何关于导游服务不达标的问题，敬请在第一时间反馈给旅行社，便于我们及\r\n时监督管理，改善服务。&lt;/p&gt;&lt;p&gt;【健康说明】：本次长途旅行，时间长、温差大、部分地区海拔高，报名前请仔细阅读相关注意事项。游客在充分了解旅途\r\n的辛苦和行程中医疗条件有限的前提下，确定自己的身体健康状况适合参加本次旅游活动后方可报名参团。因个人既有病史和身体残障在旅游行程中引起的疾病进一\r\n步发作和伤亡，旅行社不承担任何责任，现有的保险公司责任险和意外险条款中，此种情况也列入保险公司的免赔范围。旅行社为非健康医疗专业咨询机构，无法判\r\n定游客的身体健康状况是否适合参加本次旅游活动，游客在旅行社签订旅游合同，即视为游客已经了解本次旅行的辛苦程度和行程中医疗条件有限的前提，并征得专\r\n业医生的同意。①报名时旅游者应确保身体健康，保证自身条件能够完成旅游活动，身体健康状况不佳者，请咨询医生是否可以参加本次旅游活动，根据自身情况备\r\n好常用药和急救药品，因自身疾病而引起的后果，游客自行承担责任;出团前游客须签字确认《旅游者健康状况确认书》;②游客出现急症请主动通知工作人员，旅\r\n行社将协助游客就进送往当地医疗机构检查治疗;③有听力、视力障碍的游客须有健康旅伴陪同方可参团;个人有精神疾病和无行为控制能力的不能报名参团；④有\r\n心、肺、脑和血液系统疾病患者以及其它不适合长途疲劳的人群以及75岁以上老人及孕妇，不宜报名参加旅行社团。为了你的安全请勿隐瞒病情，你可另择其它线\r\n路(如隐瞒病情,后果自负)。&lt;/p&gt;&lt;p&gt;【安全说明】：①旅行社的导游人员和其他工作人员无法为游客提供一对一的服务，旅行社工作人员在接待游客报名\r\n时已经充分告知本行程中的注意事项和对游客身体健康的要求，旅游活动中游客必须注意自身安全和随行未成年人的安全，保管好个人财物，贵重物品随身携带，如\r\n财物发生遗失请立即向当地公安机关报案②景区所在地区为藏羌等少数民族聚居区，在旅游中请尊重当地少数民族的宗教信仰和民俗风情；为了您的安全，请入夜后\r\n避免单独出行，个别思想开放者请不要在景区有所作为以免造成不必要的重大损失！自由活动期间，请注意保护自身人生安全及财物安全，过马路请小心；③沿途停\r\n车加水或上厕所等任何一个停留地点，请你上下车注意脚下、头顶及周边安全，不要在汽车道公路边崖边活动停留，沿途上厕所大部份都有当地人收费，请主动付\r\n费，不要与当地人发生无谓的争吵。&lt;/p&gt;&lt;p&gt;【未成年人保护说明】：旅行社不接受未满十八周岁、不具备完全民事行为能力的未成年人单独参团。未成年人必须有成年人陪伴方可参团，一起报名参团的成人即为其参团过程中的监护人，有责任和义务做好未成年人的安全防范工作。&lt;/p&gt;&lt;p&gt;【甲方代表与合同变更说明】：甲方（即旅游者）签订合同的代表必须征得合同内所有游客的同意，方可代表甲方与旅行社签订合同，合同变更的相关事宜也必须由合同签订人携带合同到旅行社进行变更。&lt;/p&gt;&lt;p&gt;【气\r\n候说明】：九寨沟为高山气候，要有足够的御寒衣物，需准备长袖衣裤、羊毛衫、夹克衫。即使是夏季也早晚凉、中午热，因此要注意保暖，特别预防感冒和上呼吸\r\n道感染。景区日照强，紫外线强。牟尼沟(黄龙)景区海拔4070-2800米,部分游客可能有轻微高原反应，请自备抗高原反应的药物或氧气。九寨沟口海拔\r\n约1900米，沟内海拔最高点长海3100米，大多数游客没有高原反应，请放心游玩。&lt;/p&gt;&lt;p&gt;【不能影响其他游客的利益】。&lt;/p&gt;&lt;p&gt;【特别约\r\n定说明】：①行程中发生纠纷，旅游者不得以拒绝登（下）车（机、船）、入住酒店等行为拖延行程或者脱团，否则，除承担给旅行社和其他游客造成的实际损失\r\n外，还要承担旅游费用20-30%的违约金。②服务质量以在九寨途中填写的《行程满意度调查表或旅行社服务质量跟踪表》为准，请团友认真填写；在行程中，\r\n如对服务及接待标准有异议，请及时与带团导游沟通或直接反馈回旅行社。③请您仔细阅读行程及游客须知，如有异议，请在签订本次行程计划合约前提出，协议一\r\n旦签订，旅行社即按行程内容安排接待，如若您没有按相关注意事项执行，造成的一切责任后果及相关损失将由您自行承担。&lt;/p&gt;&lt;p&gt;【其它提醒】：藏民的\r\n卫生生活习惯都与汉族有所不同，湿纸巾、个人卫生用品，提前要带足这些东西。适量饮用酥油茶、奶制品、红景天等饮料可增强对高原气候的适应能力，饮食宜有\r\n节制，不可暴饮暴食，以免增加肠胃负担，身份证、护照（外籍人士）、银行卡(农行/建行/邮政储蓄)、信用卡、现金等（现金不要带太多）；背包、腰包(放\r\n随身重要物品),防水雨具；防寒服，旅游鞋（最好是防水旅游鞋），排汗保暖内衣1－2套，换洗内衣裤若干，厚棉袜若干，防晒霜（50SPFPA+以上）、\r\n太阳镜、太阳帽、润肤霜、唇膏；感冒药、肠胃药、阿斯匹林、安定、头痛粉等物品；全球通手机、相机、充电器、备用电池(充电设备多的,最好准备一个轻便的\r\n多用插线板,免得大家抢插座)。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;&amp;nbsp;&lt;span id=&quot;1348816711927E&quot;&gt;&lt;span style=&quot;font-size: larger&quot;&gt;网上预订：直接通过网站下单，在线选择产品并填写相关信息后，提交订单。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;span style=&quot;font-size: larger&quot;&gt;在线预订：拨打咨询/预订电话，由客服帮助您完成信息的确认和下单操作。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;费用包含往返飞机票&lt;/p&gt;&lt;p&gt;包含所有酒店，食宿&lt;br/&gt;&lt;/p&gt;', '', '', 190, 0, 3000, 0, '汽车,火车', 0, 0, 0, 0, 0, 0, 0, 1444814312, '&lt;p&gt;啊啊啊啊啊&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;(住宿）：单房差（若产生单男单女或自然单间我社有权安排三人间，或客人自付单房差）。&lt;/p&gt;&lt;p&gt;(其他）：其它个人消费，成都食宿、各地至成都往返大交通、景区便民设施，交通保险、行程 中约定的自理自费内容、酒水、个人消费、景区内索道、沿途小门票、行程中备注未含的餐及住宿等！请当地现付，备有说明除外。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;签证类型&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;个人旅游签证&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;办理时长&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;收齐材料后需10个工作日&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;入境次数&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;单次&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;可停留天数&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;15天（以领馆签发为准）&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;签证有效期&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;3个月（以领馆签发为准）&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot;arrange_time list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;受理范围&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;1、适用于长期居住、工作地为上海、浙江、江苏、安徽、江西的申请人； &lt;br/&gt;\r\n2、以下两种情况，携程会与领馆进行申请，获得同意后也可在上海申请：&lt;br/&gt;\r\n（1）不符合领区要求，但与领区内的亲属（父母、子女、配偶、兄弟姐妹、公婆、岳父母、媳妇女婿、祖父母、外祖父母、孙子女、外孙子女）同行且同时申请相同类型签证；&lt;br/&gt;\r\n（2）学生户籍为领区内，目前在领区外上学；&lt;br/&gt;\r\n3、必须以观光为目的（不得在日从事有收入的活动）；&lt;br/&gt;\r\n4、全程机票（或船票）及酒店需在携程预订；&lt;br/&gt;\r\n5、税前年收入大于10万元；&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;签证办理流程&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong class=&quot;radius&quot;&gt;1&lt;/strong&gt;选择签证&lt;span class=&quot;gt&quot;&gt;&amp;gt;&lt;/span&gt;&lt;strong class=&quot;radius&quot;&gt;2&lt;/strong&gt;填写/核对信息&lt;span class=&quot;gt&quot;&gt;&amp;gt;&lt;/span&gt;&lt;strong class=&quot;radius&quot;&gt;3&lt;/strong&gt;支付&lt;span class=&quot;gt&quot;&gt;&amp;gt;&lt;/span&gt;&lt;strong class=&quot;radius&quot;&gt;4&lt;/strong&gt;提交材料&lt;span class=&quot;gt&quot;&gt;&amp;gt;&lt;/span&gt;&lt;strong class=&quot;radius&quot;&gt;5&lt;/strong&gt;送签（面试）&lt;span class=&quot;gt&quot;&gt;&amp;gt;&lt;/span&gt;&lt;strong class=&quot;radius&quot;&gt;6&lt;/strong&gt;出签&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,12,24,25', '', '', '45,156,157,153,154,155', '', 0, 0, '', '', '2', '富士山五合目 银座 忍野八海 金阁寺 祗园 日本料理 购物 1晚温泉酒店', 0, 'upload/original/line/2015/10/12/47031444631781.jpg||Desert,upload/original/line/2015/10/12/51121444631782.jpg||Jellyfish,upload/original/line/2015/10/12/37011444631783.jpg||Koala', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '1,3,5', '', '', '国庆', 30, '景点,文化,祭典', '&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;ul class=&quot;fix list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;span class=&quot;price_txt_01&quot;&gt;航空：&lt;/span&gt;&lt;span class=&quot;price_txt_02&quot;&gt;南方航空，舒适航班，直飞&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span class=&quot;price_txt_01&quot;&gt;酒店住宿：&lt;/span&gt;&lt;span class=&quot;price_txt_02&quot;&gt;一晚民俗温泉酒店. 体验日式温泉3-4人一间&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span class=&quot;price_txt_01&quot;&gt;组合：&lt;/span&gt;&lt;span class=&quot;price_txt_02&quot;&gt;古韵京都、壮观富士山、潮流东京、关西大阪等，游遍日本景点&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span class=&quot;price_txt_01&quot;&gt;传统美食：&lt;/span&gt;&lt;span class=&quot;price_txt_02&quot;&gt;日式和风料理，和洋自助餐，日式涮锅浓汤拉面等丰富美食&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;', 'HIS0002365', 0, '400-200-666-888', '22,30,31'),
(21, 2, NULL, NULL, '上海 日本北海道5日深度游', '', NULL, NULL, NULL, NULL, NULL, '', '2', NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', '', 2, NULL, 0, NULL, '', 0, 0, 0, NULL, 0, 0, NULL, 1443433632, '', '', '', 9999, 0, '', NULL, 0, NULL, NULL, NULL, 9999, '', '6,12', NULL, NULL, '', '', 0, 0, NULL, NULL, '', '上海 日本北海道5日深度游 温泉 滑雪', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 1, 'line_show.htm', '1', NULL, '', '', 1, NULL, NULL, NULL, 0, NULL, NULL),
(32, 2, 0, '', '冲绳5日4晚游', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 4980, 5, 5, 0, '', '', '', '', '', '', '&lt;p&gt;​&lt;/p&gt;&lt;table height=&quot;120&quot; width=&quot;675&quot;&gt;&lt;tbody&gt;&lt;tr class=&quot;firstRow&quot;&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航班信息&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;日期&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航班号&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;起飞机场&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;起飞时间&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;到达机场&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;到达时间&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;去程&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;12月30日&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;H01331&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;上海浦东&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;15:00&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;冲绳那霸&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;18:10&lt;br/&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;返程&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;1月3日&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;H01332&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;冲绳那霸&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;19:00&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;上海浦东&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;19:50&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p&gt;        &lt;br/&gt;&lt;/p&gt;', '&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;★赴日个人旅游签证申请资料和担保&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;申请&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;期限：出发前&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;10&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;个工作日&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;护照，彩照&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;张（&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;寸），身份证和户口本原件，在职证明或营业执照（盖公章），签证申请表，行程单，酒店预约单，机票，资产材料等。详情请咨询本社&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;※&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;如果护照签发地不在上海领区，则需要另外提供居住证（暂住证）&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '', '', '', '', 44, 0, 1000, 0, '', 0, 0, 0, 0, 0, 0, 0, 1445243078, '&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;《&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;旅行条件&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;》&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;利用航空：吉祥航空经济舱 （托运行李每人最多可携带&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;件，每件不超过&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;23&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;公斤） &lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆酒店双人标准间（含早） &lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆酒店&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;⇔&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;机场往返接送 &lt;/span&gt;　&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;&lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;◆单间差：&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;2700&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;元起（全程） &lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;◆午晚餐：自理 &lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆全程无司机、导游， &lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆日程加减：不可（需另行报价）&amp;nbsp; &lt;br/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆开团人数：&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;人以上&amp;nbsp; &lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆住宿酒店：请参考上列酒店&lt;/span&gt;　　&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆航班时刻随时更新，具体出发时间以航空公司官网为准。 &lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆所有照片均为参考照片。因季节&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;/&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;气候的变化，会与当地实景有出入。&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆出团前航班时间、酒店安排可能会有更改&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;,&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;最终行程以出发前的日程通知为准，&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆我社保留因签证、航空公司、现地交通、汇率及其它不可抗力因素而调整行程及价格的权利。&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:red;font-weight:bold&quot;&gt;◆以上为特价商品。由于出发日期，机位数量的关系，恕不保证机位，请提早预约。 &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p style=&quot;;line-height:104%;text-align:justify;text-justify:inter-ideograph;direction:ltr;unicode-bidi:embed;vertical-align:baseline&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;◆&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:red;font-weight:bold&quot;&gt;本产品不包含个人签证费用&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;（签证费用每人&lt;/span&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black&quot;&gt;600&lt;/span&gt;&lt;span style=&quot;font-size: 16px;font-family:黑体;color:black&quot;&gt;元）。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;★签证注意事项：&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;1&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;.&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;本行程需做日本个人旅游签证，签证所需要材料请咨&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;&amp;nbsp; &lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;询销售人员。&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;2.&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;出发时客人必须携带本人护照和签证&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;, &lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;回国后须返还所发&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;【 &lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;归国报告书&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;】 &lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;消签。&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;3.&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;全程&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;自由行动，请客人按照预约酒店和日程表活动。&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;5.&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;出团前航班时间、酒店安排可能会有更改&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;,&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;最终行程以出发前的日程通知为准，&lt;/span&gt;&lt;/p&gt;&lt;p&gt; &lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;6.&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;我&lt;/span&gt;&lt;span style=&quot;font-size: 15px;font-family:黑体;color:black&quot;&gt;社保留因签证、航空公司、现地交通、汇率及其它不可抗力因素而调整行程及价格的权利&lt;/span&gt;&lt;span style=&quot;font-size:15px;font-family:黑体;color:black&quot;&gt;。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;​&lt;br/&gt;&lt;/p&gt;', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,35', '', '', '45,156', '', 0, 0, '', '', '2', '', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 2, '', '&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;                                &lt;/p&gt;&lt;p&gt;HIS元旦冲绳大礼包 &lt;br/&gt;&lt;/p&gt;&lt;p&gt;机场至酒店免费接送 ！！！&lt;br/&gt;&lt;/p&gt;&lt;p&gt;免费赠送wifi 4g高速上网 ！！！&lt;/p&gt;&lt;p&gt;入住酒店全程包含早餐！！！&lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;&lt;p&gt;                            &lt;/p&gt;', '', 0, '021-3331-2136', '');
INSERT INTO `zh_line` (`id`, `webid`, `aid`, `linetype`, `linename`, `lineicon`, `oldname`, `wholesale`, `wholesalel`, `starttime`, `endtime`, `seotitle`, `startcity`, `overcity`, `linedate`, `lineclassid`, `tprice`, `profit`, `lineprice`, `lineday`, `linenight`, `linephone`, `linespot`, `linepic`, `linedoc`, `tagword`, `keyword`, `jieshao`, `biaozhun`, `beizu`, `payment`, `feeinclude`, `features`, `description`, `shownum`, `seatleft`, `storeprice`, `childprice`, `transport`, `linebefore`, `isjian`, `isding`, `istejia`, `yesjian`, `nojian`, `addtime`, `modtime`, `reserved1`, `reserved2`, `reserved3`, `displayorder`, `isbold`, `color`, `bigpic`, `ssmaltype`, `ssmalprovince`, `ssmalcity`, `ssmalarea`, `sdisplayorder`, `childrule`, `kindlist`, `themelist`, `webidfs`, `attrid`, `satisfyscore`, `bookcount`, `ishidden`, `childkind`, `txtjieshao`, `isstyle`, `sellpoint`, `upstyle`, `piclist`, `distance`, `zijiaseat`, `zijiaprice`, `zijiacar`, `jifencomment`, `jifentprice`, `jifenbook`, `dingjin`, `showrepast`, `paytype`, `template`, `iconlist`, `supplierlist`, `babyrule`, `holiday`, `corporationnum`, `magrecommend`, `shotcontent`, `linesn`, `baf`, `hotlinetel`, `hotlines`) VALUES
(33, 2, 0, '', '东京北海道7日游', '', '', '', '', 0, 0, '', '2', '', '', '', '0', '0', 3980, 7, 7, 0, '', '', '', '', '', '&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;table cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;457&quot;&gt;  &lt;colgroup&gt;&lt;col style=&quot;;width:61px&quot; width=&quot;62&quot;/&gt;  &lt;col style=&quot;;width:123px&quot; width=&quot;123&quot;/&gt;  &lt;col style=&quot;;width:140px&quot; width=&quot;141&quot;/&gt;  &lt;col style=&quot;;width:132px&quot; width=&quot;132&quot;/&gt;  &lt;/colgroup&gt;&lt;tbody&gt;&lt;tr class=&quot;firstRow&quot; style=&quot;;height:54px&quot; height=&quot;54&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;54&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black;font-weight:bold&quot;&gt;日期&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;123&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black;font-weight:bold&quot;&gt;航班&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;140&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black;font-weight:bold&quot;&gt;出发&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;132&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black;font-weight:bold&quot;&gt;到达&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:36px&quot; height=&quot;36&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;36&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第一天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;123&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;HO1385&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;140&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;上海浦东&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;20&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;：&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;50&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;132&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;羽田机场&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;01&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;：&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;00+1&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:36px&quot; height=&quot;36&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;36&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第二天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;123&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;ANA&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;（全日空）&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;140&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;羽田机场（当日转机）&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;132&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;札幌&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;机场&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:54px&quot; height=&quot;54&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;54&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第三天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td colspan=&quot;3&quot; style=&quot;&quot; width=&quot;396&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black&quot;&gt;在&lt;/span&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black&quot;&gt;北海道&lt;/span&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black&quot;&gt;自由&lt;/span&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black&quot;&gt;行&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:36px&quot; height=&quot;36&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;36&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第四天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;123&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;ANA&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;（全日空）&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;140&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;札幌&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;机场&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;132&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;羽田机场&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:36px&quot; height=&quot;36&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;36&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第五天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td colspan=&quot;3&quot; rowspan=&quot;2&quot; style=&quot;&quot; width=&quot;396&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:21px;font-family:宋体;color:black&quot;&gt;在东京自由行&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:36px&quot; height=&quot;36&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;36&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第六天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt;  &lt;tr style=&quot;;height:36px&quot; height=&quot;36&quot;&gt;   &lt;td style=&quot;&quot; height=&quot;36&quot; width=&quot;61&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;第七天&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;123&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;HO1386&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;140&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;羽田机场&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;01:50&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;   &lt;td style=&quot;&quot; width=&quot;132&quot;&gt;   &lt;p style=&quot;;text-align:center;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:14px;font-family:宋体;color:black&quot;&gt;上海浦东&lt;/span&gt;&lt;span style=&quot;font-size:14px;font-family:Calibri;color:black&quot;&gt;03:40&lt;/span&gt;&lt;/p&gt;   &lt;/td&gt;  &lt;/tr&gt; &lt;/tbody&gt;&lt;/table&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;table height=&quot;120&quot; width=&quot;675&quot;&gt;&lt;tbody&gt;&lt;tr class=&quot;firstRow&quot;&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航班信息&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;航班号&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;word-break: break-all;&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;起飞机场&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;起飞时间&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;                                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;到达机场&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;                                                &lt;span style=&quot;color: rgb(0, 176, 240);&quot;&gt;到达时间&lt;br/&gt;&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;去程&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;H01385&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;上海浦东&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;20:50&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;羽田机场&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;01:00&lt;br/&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;返程&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;H01386&lt;br/&gt;&lt;/td&gt;&lt;td valign=&quot;top&quot; width=&quot;83&quot;&gt;羽田机场&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;01:50&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot; width=&quot;83&quot;&gt;上海浦东&lt;br/&gt;&lt;/td&gt;&lt;td rowspan=&quot;1&quot; colspan=&quot;1&quot; valign=&quot;top&quot;&gt;03:40&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', '&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;    &lt;span style=&quot;color: rgb(165, 165, 165);&quot;&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体;&quot;&gt;①&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;以上价格包含上海到东京国际往返机票&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: Calibri; font-weight: bold;&quot;&gt;,&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;东京到北海道国内往返机票&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: Calibri; font-weight: bold;&quot;&gt;,&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;北海道&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: Calibri; font-weight: bold;&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;晚酒店费用&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: Calibri; font-weight: bold;&quot;&gt;,&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;及国际国内各种税&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;    &lt;span style=&quot;color: rgb(191, 191, 191);&quot;&gt;&lt;span style=&quot;font-size: 15px; font-family: Calibri;&quot;&gt;②&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;东京&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: Calibri; font-weight: bold;&quot;&gt;·&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;北海道航段可自由选择各时段的航班（需另付差价） &lt;br/&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;    &lt;span style=&quot;color: rgb(191, 191, 191);&quot;&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; color: black; font-weight: bold;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(165, 165, 165);&quot;&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体;&quot;&gt;③&lt;/span&gt;&lt;span style=&quot;font-size: 15px; font-family: 宋体; font-weight: bold;&quot;&gt;东京住宿可代理预订（需另计费）&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;    &lt;br/&gt;&lt;/p&gt;', '', '', '', '', 13, 0, 0, 0, '飞机', 0, 0, 0, 0, 0, 0, 0, 1445243710, '', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,8,12', '', '', '45,156', '', 0, 0, '', '', '1', '10,11,12月出发 两人同行1人价格', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 0, '', '                                                                                                                                                                                                                                                                                                            ', '', 0, '021-3331-2136', ''),
(34, 2, 0, '', '鸭子游览船', '', '', '', '', 0, 0, '', '0', '', '', '', '0', '0', 299, 1, 1, 0, '', '', '', '', '', '&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black;font-weight:bold&quot;&gt;鸭子游览船&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black;font-weight:bold&quot;&gt;鸭子游览船&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black;font-weight:bold&quot;&gt;鸭子游览船&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black;font-weight:bold&quot;&gt;鸭子游览船&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black;font-weight:bold&quot;&gt;鸭子游览船&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '', '', '', '', '', '', 4, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1445243523, '&lt;p&gt;集合地：******&lt;/p&gt;&lt;p style=&quot;;text-align:left;direction:ltr;unicode-bidi:embed&quot;&gt;&lt;span style=&quot;font-size:16px;font-family:黑体;color:black;font-weight:bold&quot;&gt;鸭子游览船&lt;/span&gt;&lt;/p&gt;&lt;p&gt;​&lt;br/&gt;&lt;/p&gt;', '', '', 9999, 0, '', '', 0, 0, 0, 0, 9999, '', '6,11', '', '', '45,157', '', 0, 0, '', '', '1', '水陆两栖巴士环游大阪！    成人299元/儿童199元', 0, '', 0, '', '', '', 0, 0, 0, 0, 1, 1, 'line_show.htm', '', '', '', '', 0, '', '                                                                                                                        ', '', 0, '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_attr`
--

CREATE TABLE IF NOT EXISTS `zh_line_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT NULL,
  `aid` int(11) unsigned DEFAULT NULL,
  `attrname` varchar(255) DEFAULT NULL,
  `displayorder` int(11) unsigned DEFAULT NULL,
  `isopen` int(11) unsigned DEFAULT '0',
  `issystem` int(11) unsigned DEFAULT '0',
  `channeldispaly` int(1) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `destid` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=158 ;

--
-- テーブルのデータのダンプ `zh_line_attr`
--

INSERT INTO `zh_line_attr` (`id`, `webid`, `aid`, `attrname`, `displayorder`, `isopen`, `issystem`, `channeldispaly`, `pid`, `destid`, `litpic`, `description`) VALUES
(45, 1, 42, '旅行方式', 1, 1, 0, 0, 0, '4149', NULL, NULL),
(157, 1, NULL, '当地游', 9999, 1, 0, NULL, 45, NULL, NULL, NULL),
(153, 1, NULL, '省心跟团游', 9999, 1, 0, NULL, 45, NULL, NULL, NULL),
(154, 1, NULL, '快乐自助游', 9999, 1, 0, NULL, 45, NULL, NULL, NULL),
(155, 1, NULL, '特色游', 9999, 1, 0, NULL, 45, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_content`
--

CREATE TABLE IF NOT EXISTS `zh_line_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT '1',
  `columnname` varchar(30) DEFAULT NULL COMMENT '在线路中使用的字段名称',
  `chinesename` varchar(100) DEFAULT NULL COMMENT '中文显示名称',
  `displayorder` int(3) DEFAULT '0' COMMENT '显示顺序',
  `issystem` int(1) DEFAULT NULL,
  `isopen` int(1) DEFAULT NULL COMMENT '是否使用1，0',
  `isline` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='线路内容分类表' AUTO_INCREMENT=11 ;

--
-- テーブルのデータのダンプ `zh_line_content`
--

INSERT INTO `zh_line_content` (`id`, `webid`, `columnname`, `chinesename`, `displayorder`, `issystem`, `isopen`, `isline`) VALUES
(1, 1, 'linespot', '途经景点', 11, 1, 1, 0),
(2, 1, 'jieshao', '行程安排', 3, 1, 1, 0),
(3, 1, 'biaozhun', '航班信息', 2, 0, 1, 0),
(4, 1, 'beizu', '注意事项', 9, 0, 1, 0),
(5, 1, 'payment', '如何预定', 10, 1, 1, 0),
(6, 1, 'feeinclude', '费用包含', 4, 0, 1, 0),
(7, 1, 'features', '线路特色', 6, 1, 0, 0),
(8, 1, 'reserved1', '产品概要', 1, 0, 1, 0),
(9, 1, 'reserved2', '费用不含', 7, 0, 1, 0),
(10, 1, 'reserved3', '签证信息', 8, 0, 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_day`
--

CREATE TABLE IF NOT EXISTS `zh_line_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT '1',
  `aid` int(11) unsigned DEFAULT NULL,
  `word` int(3) unsigned DEFAULT NULL COMMENT '天数(只能输入数字)',
  `isdisplay` int(1) unsigned DEFAULT '0' COMMENT '是否在前台显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='线路天数分类表' AUTO_INCREMENT=15 ;

--
-- テーブルのデータのダンプ `zh_line_day`
--

INSERT INTO `zh_line_day` (`id`, `webid`, `aid`, `word`, `isdisplay`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 2, 1),
(3, 1, 3, 3, 1),
(4, 1, 4, 4, 1),
(5, 1, 5, 5, 1),
(6, 1, 6, 6, 1),
(7, 1, 7, 7, 1),
(8, 1, 8, 8, 1),
(9, 1, 9, 9, 1),
(10, 1, 10, 10, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_jieshao`
--

CREATE TABLE IF NOT EXISTS `zh_line_jieshao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lineid` int(11) unsigned DEFAULT NULL,
  `day` int(11) unsigned DEFAULT NULL COMMENT '第N天',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `breakfirsthas` tinyint(1) DEFAULT '0' COMMENT '早餐是否选择',
  `breakfirst` varchar(255) DEFAULT NULL,
  `transport` varchar(255) DEFAULT NULL COMMENT '交通',
  `hotel` varchar(255) DEFAULT NULL COMMENT '住宿',
  `jieshao` text COMMENT '行程内容',
  `lunchhas` tinyint(1) DEFAULT '0',
  `lunch` varchar(255) DEFAULT NULL COMMENT '午餐描述',
  `supperhas` tinyint(1) unsigned DEFAULT '0' COMMENT '是否有晚餐',
  `supper` varchar(255) DEFAULT NULL COMMENT '晚餐描述',
  `tjieshao` text,
  `timg` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- テーブルのデータのダンプ `zh_line_jieshao`
--

INSERT INTO `zh_line_jieshao` (`id`, `lineid`, `day`, `title`, `breakfirsthas`, `breakfirst`, `transport`, `hotel`, `jieshao`, `lunchhas`, `lunch`, `supperhas`, `supper`, `tjieshao`, `timg`) VALUES
(27, 32, 5, '冲绳那霸→上海浦東', 1, '酒店早餐', '飞机', '自己温馨的家', '', 1, '自理', 1, '自理', '酒店退房后，前往冲绳那霸机场。搭乘吉祥航空公司航班HO1332，\r\n19：00 起飞，20：40到达上海浦东。\r\n', ''),
(28, 33, 1, '上海到东京羽田机场', 1, '自理', '', '住宿可代理预定', '', 1, '自理', 1, '自理', '', ''),
(29, 33, 2, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(30, 33, 3, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(31, 33, 4, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(32, 33, 5, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(33, 33, 6, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(34, 33, 7, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(35, 34, 1, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(22, 20, 4, '', 0, '', '', '', '', 0, '', 0, '', '', ''),
(23, 32, 1, '上海浦东  -&gt; 冲绳那霸', 1, '自理', '飞机', '（4星）冲绳太平洋酒店 或 （3星）冲绳那霸nest酒店', '', 1, '自理', 1, '自理', '搭乘吉祥航空公司航班HO1331，14：50起飞，18：10抵达冲绳那霸机场。\r\n出关后，工作人员接机，前往酒店', ''),
(24, 32, 2, '可自行安排行程，也可参加自费项目（需另付费）', 1, '酒店早餐', '汽车', '（4星）冲绳太平洋酒店 或 （3星）冲绳那霸nest酒店', '', 1, '自理', 1, '自理', '①　美之岛观光一日游   \r\n②　乘坐水中观光船“虎鲸号”，漫游冲绳海底     \r\n③　参观琉球村 ', ''),
(25, 32, 3, '自由活动', 1, '酒店早餐', '', '（4星）冲绳太平洋酒店 或 （3星）冲绳那霸nest酒店', '', 1, '自理', 1, '自理', '自由活动', ''),
(26, 32, 4, '自由活动', 1, '酒店早餐', '', '（4星）冲绳太平洋酒店 或 （3星）冲绳那霸nest酒店', '', 1, '自理', 1, '自理', '自由活动', ''),
(19, 20, 1, '广州出发到日本', 1, '自己家里', '飞机', '5星级酒店', '<p>从广州飞到日本，机场购物从广州飞到日本，机场购物从广州飞到日本，机场购物</p><p>从广州飞到日本，机场购物从广州飞到日本，机场购物​<br/></p>', 1, '飞机餐', 1, '日式料理', '从广州飞到日本，机场购物\r\n从广州飞到日本，机场购物', 'upload/original/line/2015/10/14/89371444797802.jpg||Hydrangeas,upload/original/line/2015/10/14/74751444797804.jpg||Koala'),
(20, 20, 2, '箱根一日游', 1, '酒店', '汽车,电车', '5星级酒店', '<p>箱根很好玩箱根很好玩箱根很好玩箱根很好玩</p>', 1, '日式火锅', 1, '日式自助餐', '箱根很好玩', 'upload/original/line/2015/10/14/88591444805516.jpg||Hydrangeas,upload/original/line/2015/10/14/59341444805517.jpg||Jellyfish,upload/original/line/2015/10/14/68621444805518.jpg||Koala'),
(21, 20, 3, '日本回家咯', 0, '', '', '', '', 0, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_kindlist`
--

CREATE TABLE IF NOT EXISTS `zh_line_kindlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kindid` int(11) unsigned NOT NULL DEFAULT '0',
  `seotitle` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tagword` varchar(255) DEFAULT NULL,
  `jieshao` text,
  `isfinishseo` int(1) unsigned NOT NULL DEFAULT '0',
  `displayorder` int(4) unsigned DEFAULT '9999',
  `isnav` int(1) unsigned DEFAULT '0' COMMENT '是否导航',
  `ishot` int(1) unsigned DEFAULT '0' COMMENT '是否热门',
  `shownum` int(8) DEFAULT NULL,
  `templetpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kindid` (`kindid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ssmall线路分类总表' AUTO_INCREMENT=69 ;

--
-- テーブルのデータのダンプ `zh_line_kindlist`
--

INSERT INTO `zh_line_kindlist` (`id`, `kindid`, `seotitle`, `keyword`, `description`, `tagword`, `jieshao`, `isfinishseo`, `displayorder`, `isnav`, `ishot`, `shownum`, `templetpath`) VALUES
(51, 8, '', '', '', '', '', 0, 1, 0, 1, 0, ''),
(52, 11, '', '', '', '', '', 0, 4, 0, 1, 0, ''),
(53, 12, '', '', '', '', '', 0, 12, 0, 1, 0, ''),
(54, 6, '', '', '', '', '', 0, 1, 1, 0, 0, ''),
(55, 1, '', '', '', '', '', 0, 2, 1, 0, 0, ''),
(56, 27, '', '', '', '', '', 0, 2, 0, 1, 0, ''),
(58, 35, '', '', '', '', '', 0, 2, 0, 1, 0, ''),
(59, 36, '', '', '', '', '', 0, 3, 0, 0, NULL, ''),
(60, 24, '', '', '', '', '', 0, 5, 0, 0, NULL, ''),
(61, 37, '', '', '', '', '', 0, 6, 0, 0, NULL, ''),
(62, 38, '', '', '', '', '', 0, 7, 0, 0, NULL, ''),
(63, 39, '', '', '', '', '', 0, 8, 0, 0, NULL, ''),
(64, 40, '', '', '', '', '', 0, 9, 0, 0, NULL, ''),
(65, 41, '', '', '', '', '', 0, 10, 0, 0, NULL, ''),
(66, 25, '', '', '', '', '', 0, 11, 0, 0, NULL, ''),
(67, 13, '', '', '', '', '', 0, 13, 0, 1, 0, ''),
(68, 26, '', '', '', '', '', 0, 1, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_pricelist`
--

CREATE TABLE IF NOT EXISTS `zh_line_pricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT '1',
  `aid` int(11) unsigned DEFAULT NULL,
  `lowerprice` int(11) DEFAULT NULL,
  `highprice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='线路价格分段表' AUTO_INCREMENT=19 ;

--
-- テーブルのデータのダンプ `zh_line_pricelist`
--

INSERT INTO `zh_line_pricelist` (`id`, `webid`, `aid`, `lowerprice`, `highprice`) VALUES
(1, 1, 1, NULL, 2000),
(2, 1, NULL, 2001, 4000),
(3, 1, 2, 4001, 6000),
(4, 1, 3, 6001, 8000),
(5, 1, 4, 5001, 10000),
(6, 1, 5, 8001, 10000),
(17, 1, NULL, 10000, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_suit`
--

CREATE TABLE IF NOT EXISTS `zh_line_suit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lineid` int(11) NOT NULL,
  `suitname` varchar(255) DEFAULT NULL,
  `description` text,
  `displayorder` int(11) DEFAULT '999999',
  `jifenbook` int(11) DEFAULT '0',
  `jifentprice` int(11) DEFAULT '0',
  `jifencomment` int(11) DEFAULT '0',
  `propgroup` varchar(6) DEFAULT NULL,
  `paytype` tinyint(1) unsigned DEFAULT '1',
  `dingjin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineid` (`lineid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- テーブルのデータのダンプ `zh_line_suit`
--

INSERT INTO `zh_line_suit` (`id`, `lineid`, `suitname`, `description`, `displayorder`, `jifenbook`, `jifentprice`, `jifencomment`, `propgroup`, `paytype`, `dingjin`) VALUES
(9, 32, '四星酒店套餐', '&lt;p&gt;入住（4星酒店）冲绳太平洋酒店&lt;br/&gt;&lt;/p&gt;', 999999, 0, 0, 0, '2', 0, ''),
(10, 32, '三星酒店套餐', '&lt;p&gt;入住（3星）冲绳那霸nest酒店&lt;br/&gt;&lt;/p&gt;', 1, 0, 0, 0, '2', 0, ''),
(7, 20, '10-11月套餐', '', 999999, 0, 0, 0, '2,1,3', 0, ''),
(8, 20, '12月套餐', '', 999999, 0, 0, 0, '2,1', 0, ''),
(12, 33, '套餐1', '', 999999, 0, 0, 0, '2', 0, ''),
(13, 34, '套餐1', '', 999999, 0, 0, 0, '2,1', 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_line_suit_price`
--

CREATE TABLE IF NOT EXISTS `zh_line_suit_price` (
  `lineid` int(11) NOT NULL,
  `suitid` int(11) NOT NULL DEFAULT '0',
  `day` int(11) NOT NULL DEFAULT '0',
  `childprofit` int(11) DEFAULT NULL,
  `childbasicprice` int(11) DEFAULT NULL,
  `childprice` int(11) DEFAULT NULL,
  `oldprofit` int(11) DEFAULT NULL,
  `oldbasicprice` int(11) DEFAULT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `adultprofit` int(11) DEFAULT NULL,
  `adultbasicprice` int(11) DEFAULT NULL,
  `adultprice` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL COMMENT '描述',
  `number` int(11) DEFAULT NULL COMMENT '库存',
  PRIMARY KEY (`suitid`,`day`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `zh_line_suit_price`
--

INSERT INTO `zh_line_suit_price` (`lineid`, `suitid`, `day`, `childprofit`, `childbasicprice`, `childprice`, `oldprofit`, `oldbasicprice`, `oldprice`, `adultprofit`, `adultbasicprice`, `adultprice`, `description`, `number`) VALUES
(34, 13, 1462377600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462291200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462204800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462118400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462032000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461945600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461859200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461772800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461686400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461600000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461513600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461427200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461340800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461254400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461168000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1461081600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460995200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460908800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460822400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460736000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460649600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460563200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460476800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460390400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460304000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460217600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460131200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1460044800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459958400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459872000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456416000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456502400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456588800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456675200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456761600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456848000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456934400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457020800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457107200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457193600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457280000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457366400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457452800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457539200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457625600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457712000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457798400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457884800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1457971200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458057600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458144000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458230400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458316800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458403200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458489600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458576000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458662400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458748800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458835200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1458921600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459008000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459094400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459180800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459267200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459353600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459440000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459526400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459612800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459699200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1459785600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456329600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456156800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456243200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455984000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1456070400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455811200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455897600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455638400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455724800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455465600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455552000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455292800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455379200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455120000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455206400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454947200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1455033600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454774400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454860800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454601600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454688000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454428800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454515200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454256000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454342400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454083200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1454169600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453910400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453996800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453737600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453824000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453564800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453651200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453392000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453478400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453219200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453305600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453046400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1453132800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452873600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452960000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452700800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452787200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452528000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452614400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452355200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452441600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452182400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452268800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452009600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1452096000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451836800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451923200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451664000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451750400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451491200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451577600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451318400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451404800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451145600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451232000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450972800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1451059200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450800000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450886400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450627200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450713600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450454400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450540800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450281600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450368000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450108800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450195200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449936000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1450022400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449763200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449849600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449590400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449676800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449417600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449504000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449244800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449331200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449072000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1449158400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448899200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448985600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447257600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447344000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447430400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447516800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447603200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447689600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447776000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447862400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447948800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448035200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448121600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448208000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448294400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448380800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448467200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448553600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448640000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448726400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1448812800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447171200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1447084800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446998400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446912000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446825600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446739200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446652800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446566400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446480000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446393600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446307200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446220800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446134400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1446048000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445961600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445875200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445788800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445702400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445616000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445529600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(33, 12, 1445443200, 0, 0, 0, 0, 0, 0, 0, 5480, 5480, '', -1),
(33, 12, 1446048000, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1446652800, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1447257600, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1447862400, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1448467200, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1449072000, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1449676800, 0, 0, 0, 0, 0, 0, 0, 3980, 3980, '', -1),
(33, 12, 1450281600, 0, 0, 0, 0, 0, 0, 0, 4980, 4980, '', -1),
(33, 12, 1450886400, 0, 0, 0, 0, 0, 0, 0, 4980, 4980, '', -1),
(34, 13, 1445184000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445270400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445356800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1445443200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(32, 10, 1451404800, 0, 0, 0, 0, 0, 0, 0, 4980, 4980, '&amp;lt;p&amp;gt;入住（3星）冲绳那霸nest酒店&amp;lt;br/&amp;g', -1),
(32, 9, 1451404800, 0, 0, 0, 0, 0, 0, 0, 5280, 5280, '&amp;lt;p&amp;gt;入住（4星酒店）冲绳太平洋酒店&amp;lt;br/&amp;gt', -1),
(20, 8, 1451145600, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 8, 1451059200, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 8, 1450540800, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 8, 1450454400, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 8, 1449936000, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 8, 1449849600, 200, 1000, 1200, 0, 0, 0, 400, 1000, 1400, '', -1),
(20, 8, 1449331200, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 8, 1449244800, 200, 1000, 1200, 0, 0, 0, 300, 1000, 1300, '', -1),
(20, 7, 1448812800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448726400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448640000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448553600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448467200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448380800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448294400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448208000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448121600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1448035200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447948800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447862400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447776000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447689600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447603200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447516800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447430400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447344000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447257600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447171200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1447084800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446998400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446912000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446825600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446739200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446652800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446566400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446480000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446393600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446307200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446220800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1446134400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', 94),
(20, 7, 1446048000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445961600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445875200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445788800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445702400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445616000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445529600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445443200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445356800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445270400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445184000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445097600, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1445011200, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1444924800, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1444838400, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(20, 7, 1444665600, 500, 1000, 1500, 0, 0, 0, 600, 1000, 1600, '', -1),
(20, 7, 1444752000, 300, 1000, 1300, 200, 1000, 1200, 600, 1000, 1600, '', -1),
(34, 13, 1462723200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462636800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462550400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462464000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462809600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462896000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1462982400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463068800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463155200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463241600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463328000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463414400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463500800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463587200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463673600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463760000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463846400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1463932800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464019200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464105600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464192000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464278400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464364800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464451200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464537600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464624000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464710400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464796800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464883200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1464969600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465056000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465142400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465228800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465315200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465401600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465488000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465574400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465660800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465747200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465833600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1465920000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466006400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466092800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466179200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466265600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466352000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466438400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466524800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466611200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466697600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466784000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466870400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1466956800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467043200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467129600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467216000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467302400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467388800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467475200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467561600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467648000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467734400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467820800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467907200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1467993600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468080000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468166400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468252800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468339200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468425600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468512000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468598400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468684800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468771200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468857600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1468944000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469030400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469116800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469203200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469289600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469376000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469462400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469548800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469635200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469721600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469808000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469894400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1469980800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470067200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470153600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470240000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470326400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470412800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470499200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470585600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470672000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470758400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470844800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1470931200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471017600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471104000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471190400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471276800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471363200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471449600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471536000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471622400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471708800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471795200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471881600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1471968000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472054400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472140800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472227200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472313600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472400000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472486400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472572800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472659200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472745600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472832000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1472918400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473004800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473091200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473177600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473264000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473350400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473436800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473523200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473609600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473696000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473782400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473868800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1473955200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474041600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474128000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474214400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474300800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474387200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474473600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474560000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474646400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474732800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474819200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474905600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1474992000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475078400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475164800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475251200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475337600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475424000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475510400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475596800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475683200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475769600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475856000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1475942400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476028800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476115200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476201600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476288000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476374400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476460800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476547200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476633600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476720000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476806400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476892800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1476979200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477065600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477152000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477238400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477324800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477411200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477497600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477584000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477670400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477756800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477843200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1477929600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478016000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478102400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478188800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478275200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478361600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478448000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478534400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478620800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478707200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478793600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478880000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1478966400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479052800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479139200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479225600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479312000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479398400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479484800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479571200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479657600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479744000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479830400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1479916800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480003200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480089600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480176000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480262400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480348800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480435200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480521600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480608000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480694400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480780800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480867200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1480953600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481040000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481126400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481212800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481299200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481385600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481472000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481558400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481644800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481731200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481817600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481904000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1481990400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482076800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482163200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482249600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482336000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482422400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482508800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482595200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482681600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482768000, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482854400, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1482940800, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1483027200, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1),
(34, 13, 1483113600, 0, 199, 199, 0, 0, 0, 0, 299, 299, '', -1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_link`
--

CREATE TABLE IF NOT EXISTS `zh_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `webname` char(100) NOT NULL DEFAULT '' COMMENT '网站名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '网站logo',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `tid` tinyint(1) NOT NULL DEFAULT '2' COMMENT '友情链接类型',
  `qq` char(15) NOT NULL DEFAULT '' COMMENT '站长qq',
  `comment` text NOT NULL COMMENT '网站介绍',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_link_config`
--

CREATE TABLE IF NOT EXISTS `zh_link_config` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `webname` char(100) NOT NULL DEFAULT '' COMMENT '网站名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT 'logo',
  `email` varchar(255) NOT NULL COMMENT '站长邮箱',
  `comment` text NOT NULL COMMENT '申请说明',
  `allow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开放申请',
  `code` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示验证码',
  `qq` char(15) NOT NULL DEFAULT '' COMMENT '联系QQ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='本网站友情链接信息' AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_link_config`
--

INSERT INTO `zh_link_config` (`id`, `webname`, `url`, `logo`, `email`, `comment`, `allow`, `code`, `qq`) VALUES
(1, 'metaphase', 'http://localhost/zhcms', 'zh/Plugin/Link/Data/logo.png', 'hong@metaphase.co.jp', '1、请先在贵站做好后盾网的友情链接\r\n2、将右侧‘文字链接’或‘图片链接’代码复制到贵站\r\n3、凡开通我站友情链接且内容健康的网站，经管理员审核后，将显示在此友情链接页面\r\n4、首页友情连接，要求pr>=2、alexa < 10000；其他页面连接根据具体页面而定（请具体咨询）\r\n5、贵网站要在百度google都有记录收录，且网站访问速度不能太慢', 1, 1, '2300071698');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_link_type`
--

CREATE TABLE IF NOT EXISTS `zh_link_type` (
  `tid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` char(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统类型',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接分类' AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `zh_link_type`
--

INSERT INTO `zh_link_type` (`tid`, `type_name`, `system`) VALUES
(1, '友情链接', 1),
(2, '合作伙伴', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_menu_favorite`
--

CREATE TABLE IF NOT EXISTS `zh_menu_favorite` (
  `uid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  KEY `gid` (`uid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员权限分配表';

--
-- テーブルのデータのダンプ `zh_menu_favorite`
--

INSERT INTO `zh_menu_favorite` (`uid`, `nid`) VALUES
(1, 20),
(1, 13);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_model`
--

CREATE TABLE IF NOT EXISTS `zh_model` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` char(255) NOT NULL DEFAULT '' COMMENT '模型名称',
  `table_name` char(255) NOT NULL DEFAULT '' COMMENT '主表名',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用 1 开启 0 关闭',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '模型描述',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 系统模型  2 普通模型',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='模型表' AUTO_INCREMENT=20 ;

--
-- テーブルのデータのダンプ `zh_model`
--

INSERT INTO `zh_model` (`mid`, `model_name`, `table_name`, `enable`, `description`, `is_system`) VALUES
(1, '普通文章', 'content', 1, '', 1),
(19, 'ニュース', 'news', 1, 'ニュース', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_navigation`
--

CREATE TABLE IF NOT EXISTS `zh_navigation` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(30) NOT NULL DEFAULT '菜单名称' COMMENT '菜单名',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `target` enum('_self','_blank') NOT NULL DEFAULT '_self' COMMENT '打开方式',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `list_order` mediumint(100) NOT NULL DEFAULT '100' COMMENT '排序',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站前台导航' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_news`
--

CREATE TABLE IF NOT EXISTS `zh_news` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目cid',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `flag` set('画像') DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  `seo_title` char(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `click` int(6) NOT NULL DEFAULT '0' COMMENT '点击数',
  `source` char(60) NOT NULL DEFAULT '' COMMENT '来源',
  `redirecturl` varchar(255) NOT NULL DEFAULT '' COMMENT '转向链接',
  `html_path` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义生成的静态文件地址',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许回复',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `color` char(7) NOT NULL DEFAULT '' COMMENT '标题颜色',
  `template` varchar(255) NOT NULL DEFAULT '' COMMENT '模板',
  `url_type` tinyint(80) NOT NULL DEFAULT '3' COMMENT '文章访问方式  1 静态访问  2 动态访问  3 继承栏目',
  `arc_sort` mediumint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `content_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态  1 已审核 0 未审核',
  `keywords` varchar(100) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `uid` int(10) unsigned NOT NULL COMMENT '用户uid',
  `favorites` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `comment_num` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `tag` varchar(255) NOT NULL DEFAULT '' COMMENT '占位，不用的字段',
  `read_credits` smallint(6) NOT NULL DEFAULT '0' COMMENT '阅读金币',
  `inputtest` varchar(255) NOT NULL DEFAULT '',
  `testfile` mediumtext,
  PRIMARY KEY (`aid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_news_data`
--

CREATE TABLE IF NOT EXISTS `zh_news_data` (
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表ID',
  `content` text COMMENT '内容',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章正文表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_node`
--

CREATE TABLE IF NOT EXISTS `zh_node` (
  `nid` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL COMMENT '中文标题',
  `app_group` char(30) NOT NULL DEFAULT 'Zhcms' COMMENT '应用组',
  `app` char(30) NOT NULL DEFAULT '' COMMENT '应用',
  `control` char(30) NOT NULL DEFAULT '' COMMENT '控制器',
  `method` char(30) NOT NULL DEFAULT '' COMMENT '方法',
  `param` char(100) NOT NULL DEFAULT '' COMMENT '参数',
  `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1 显示 0 不显示',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '类型 1 权限控制菜单   2 普通菜单 ',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) NOT NULL DEFAULT '100' COMMENT '排序',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统菜单 1 是  0 不是',
  `favorite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '后台常用菜单   1 是  0 不是',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='节点表（后台菜单也使用）' AUTO_INCREMENT=287 ;

--
-- テーブルのデータのダンプ `zh_node`
--

INSERT INTO `zh_node` (`nid`, `title`, `app_group`, `app`, `control`, `method`, `param`, `comment`, `state`, `type`, `pid`, `list_order`, `is_system`, `favorite`) VALUES
(1, 'menu_title_t1_content', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 8, 0, 0),
(2, 'menu_title_t2_content_manage', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 1, 10, 0, 0),
(16, 'menu_title_t1_system', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 10, 0, 0),
(21, 'menu_title_t3_system_setting_admin_menu', 'Zhcms', 'Admin', 'Node', 'index', '', '', 1, 1, 19, 100, 0, 0),
(3, 'menu_title_t3_content_related_manage_upload_file', 'Zhcms', 'Admin', 'Attachment', 'index', '', '', 1, 1, 10, 100, 0, 0),
(12, 'menu_title_t3_content_other_operate_backup', 'Zhcms', 'Admin', 'Backup', 'index', '', '', 1, 1, 79, 100, 0, 1),
(10, 'menu_title_t2_content_related_manage', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 1, 12, 0, 0),
(13, 'menu_title_t3_content_manage_category_manage', 'Zhcms', 'Admin', 'Category', 'index', '', '', 1, 1, 2, 20, 0, 1),
(14, 'menu_title_t3_content_related_manage_model', 'Zhcms', 'Admin', 'Model', 'index', '', '', 1, 1, 10, 100, 0, 0),
(15, 'menu_title_t3_content_related_manage_flag', 'Zhcms', 'Admin', 'Flag', 'index', 'mid=1', '', 1, 1, 10, 100, 0, 0),
(19, 'menu_title_t2_system_setting', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 16, 100, 0, 0),
(4, 'menu_title_t3_content_manage_content', 'Zhcms', 'Admin', 'Content', 'index', '', '', 1, 1, 2, 10, 0, 1),
(11, 'menu_title_t2_system_admin', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 16, 100, 0, 0),
(17, 'menu_title_t3_system_admin_manage', 'Zhcms', 'Admin', 'Administrator', 'index', '', '', 1, 1, 11, 100, 0, 0),
(18, 'menu_title_t3_system_admin_role_manage', 'Zhcms', 'Admin', 'Role', 'index', '', '', 1, 1, 11, 100, 0, 0),
(20, 'menu_title_t3_system_setting_site', 'Zhcms', 'Admin', 'Config', 'edit', 'webid=1', '', 1, 1, 19, 90, 0, 0),
(5, 'menu_title_t2_content_html_create', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 1, 11, 0, 0),
(6, 'menu_title_t3_content_html_create_category', 'Zhcms', 'Admin', 'Html', 'create_category', '', '', 1, 1, 5, 102, 0, 0),
(8, 'menu_title_t3_content_html_create_top', 'Zhcms', 'Admin', 'Html', 'create_index', '', '', 1, 1, 5, 101, 0, 1),
(9, 'menu_title_t3_content_html_create_content', 'Zhcms', 'Admin', 'Html', 'create_content', '', '', 1, 1, 5, 103, 0, 0),
(28, 'menu_title_t3_personal_info_password', 'Zhcms', 'Admin', 'Personal', 'edit_password', '', '', 1, 1, 29, 100, 0, 0),
(27, 'menu_title_t3_personal_info_edit', 'Zhcms', 'Admin', 'Personal', 'edit_info', '', '', 1, 1, 29, 100, 0, 0),
(26, 'menu_title_t1_personal', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 100, 0, 0),
(29, 'menu_title_t2_personal_info', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 26, 100, 0, 0),
(61, 'menu_title_t3_content_html_create_all', 'Zhcms', 'Admin', 'Html', 'create_all', '', '一気に全部静態作成', 1, 1, 5, 100, 0, 1),
(30, 'menu_title_t1_member', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 100, 0, 0),
(31, 'menu_title_t2_member_manage', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 30, 100, 0, 0),
(32, 'menu_title_t3_member_manage_info', 'Zhcms', 'Admin', 'User', 'index', '', '', 1, 1, 31, 100, 0, 0),
(33, 'menu_title_t3_member_manage_check', 'Zhcms', 'Admin', 'User', 'index', 'state=0', '', 1, 1, 31, 100, 0, 0),
(34, 'menu_title_t2_member_group', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 30, 100, 0, 0),
(35, 'menu_title_t3_member_group_manage', 'Zhcms', 'Admin', 'Group', 'index', '', '', 1, 1, 34, 100, 0, 0),
(36, 'menu_title_t1_template', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 100, 0, 0),
(37, 'menu_title_t2_template_manage', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 36, 100, 0, 0),
(38, 'menu_title_t3_template_manage_style', 'Zhcms', 'Admin', 'TemplateStyle', 'style_list', '', '', 1, 1, 37, 90, 0, 0),
(39, 'menu_title_t3_template_manage_file', 'Zhcms', 'Admin', 'TemplateStyle', 'show_dir', '', '', 0, 1, 37, 100, 0, 0),
(70, 'menu_title_t3_content_related_manage_tag', 'Zhcms', 'Admin', 'Tag', 'index', '', '', 1, 1, 10, 100, 0, 0),
(69, 'menu_title_t3_content_other_operate_keysearch', 'Zhcms', 'Admin', 'Search', 'index', '', '', 1, 1, 79, 100, 0, 0),
(79, 'menu_title_t2_content_other_operate', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 1, 100, 0, 0),
(80, 'menu_title_t3_content_other_operate_navigation', 'Zhcms', 'Admin', 'Navigation', 'index', '', '', 1, 1, 79, 100, 0, 0),
(91, 'menu_title_t1_plugin', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 1000, 0, 0),
(92, 'menu_title_t2_plugin_manage', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 91, 99, 0, 0),
(93, 'menu_title_t3_plugin_manage_info', 'Zhcms', 'Admin', 'Plugin', 'plugin_list', '', '', 1, 1, 92, 100, 0, 0),
(94, 'menu_title_t2_plugin_using', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 91, 100, 0, 0),
(180, 'menu_title_t3_content_manage_check', 'Zhcms', 'Admin', 'ContentAudit', 'content', '', '', 1, 1, 2, 11, 0, 1),
(156, 'BUG管理', 'Zhcms', 'Admin', 'Bug', 'showBug', '', '', 1, 1, 154, 100, 0, 0),
(179, 'menu_title_t3_content_related_manage_comment', 'Zhcms', 'Admin', 'Comment', 'index', '', '', 1, 1, 10, 100, 0, 0),
(184, 'menu_title_t3_content_manage_category_add', 'Zhcms', 'Admin', 'Category', 'add', '', '', 0, 1, 2, 21, 0, 0),
(185, 'menu_title_t3_content_manage_category_del', 'Zhcms', 'Admin', 'Category', 'del', '', '', 0, 1, 2, 22, 0, 0),
(186, 'menu_title_t3_content_manage_category_edit', 'Zhcms', 'Admin', 'Category', 'edit', '', '', 0, 1, 2, 23, 0, 0),
(187, 'menu_title_t3_content_manage_category_bulkedit', 'Zhcms', 'Admin', 'Category', 'BulkEdit', '', '', 0, 1, 2, 24, 0, 0),
(200, 'menu_title_t3_content_other_operate_db_manage', 'Zhcms', 'Admin', 'Table', 'contentReplace', '', '', 1, 1, 79, 100, 0, 0),
(206, 'menu_title_t1_ec', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 100, 0, 0),
(207, 'menu_title_t2_ec_goods', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 1, 0, 0),
(208, 'menu_title_t3_ec_goods_brand', 'Zhcms', 'Admin', 'EcBrand', 'index', 'act=list', '', 1, 1, 207, 4, 0, 0),
(209, 'menu_title_t3_ec_goods_type', 'Zhcms', 'Admin', 'EcGoodsType', 'index', 'act=manage', '', 1, 1, 207, 5, 0, 0),
(212, 'menu_title_t3_ec_goods_manage', 'Zhcms', 'Admin', 'EcGoods', 'index', 'act=list', '', 1, 1, 207, 1, 0, 0),
(211, 'menu_title_t3_plugin_using_frend_links', 'Plugin', 'Link', 'Manage', 'index', '', '', 1, 1, 94, 100, 0, 0),
(210, 'menu_title_t3_ec_goods_category', 'Zhcms', 'Admin', 'EcCategory', 'index', 'act=list', '', 1, 1, 207, 2, 0, 0),
(213, 'menu_title_t2_ec_authority', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 100, 0, 0),
(214, 'menu_title_t3_ec_authority_suppliers', 'Zhcms', 'Admin', 'EcSuppliers', 'index', 'act=list', '', 1, 1, 213, 100, 0, 0),
(243, 'menu_title_t3_ec_sales_snatch', 'Zhcms', 'Admin', 'EcSnatch', 'index', 'act=list', '', 1, 1, 223, 1, 0, 0),
(217, 'menu_title_t3_ec_goods_virtual_card', 'Zhcms', 'Admin', 'EcGoods', 'index', 'act=list&extension_code=virtual_card', '', 1, 1, 207, 13, 0, 0),
(218, 'menu_title_t2_ec_user', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 100, 0, 0),
(219, 'menu_title_t3_ec_user_rank', 'Zhcms', 'Admin', 'EcUserRank', 'index', 'act=list', '', 1, 1, 218, 100, 0, 0),
(220, 'menu_title_t2_ec_article', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 100, 0, 0),
(221, 'menu_title_t3_ec_article_cat', 'Zhcms', 'Admin', 'EcArticlecat', 'index', 'act=list', '', 1, 1, 220, 1, 0, 0),
(222, 'menu_title_t3_ec_article_manage', 'Zhcms', 'Admin', 'EcArticle', 'index', 'act=list', '', 1, 1, 220, 2, 0, 0),
(223, 'menu_title_t2_ec_sales', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 2, 0, 0),
(224, 'menu_title_t3_ec_sales_bonus', 'Zhcms', 'Admin', 'EcBonus', 'index', 'act=list', '', 1, 1, 223, 2, 0, 0),
(225, 'menu_title_t2_site', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 16, 100, 0, 0),
(226, 'menu_title_t3_site_manage', 'Zhcms', 'Admin', 'Weblist', 'index', '', '', 1, 1, 225, 100, 0, 0),
(227, 'menu_title_t1_tour', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 100, 0, 0),
(228, 'menu_title_t2_tour_type', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 227, 100, 0, 0),
(229, 'menu_title_t3_tour_type_destination', 'Zhcms', 'Admin', 'TourDestination', 'destination', '', '', 1, 1, 228, 100, 0, 0),
(230, 'menu_title_t3_site_mainnav', 'Zhcms', 'Admin', 'Mainnav', 'index', 'webid=1', '', 1, 1, 225, 100, 0, 0),
(231, 'menu_title_t3_tour_type_line_category', 'Zhcms', 'Admin', 'Line', 'price', '', '', 1, 1, 228, 100, 0, 0),
(232, 'menu_title_t3_tour_type_startplace', 'Zhcms', 'Admin', 'Startplace', 'index', '', '', 1, 1, 228, 100, 0, 0),
(233, 'menu_title_t2_tour_product', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 227, 100, 0, 0),
(234, 'menu_title_t3_tour_product_line', 'Zhcms', 'Admin', 'Line', 'index', '', '', 1, 1, 233, 100, 0, 0),
(235, 'menu_title_t3_tour_product_line_order', 'Zhcms', 'Admin', 'TourOrder', 'index', 'typeid=1', '', 1, 1, 233, 100, 0, 0),
(236, 'menu_title_t3_content_manage_contact', 'Zhcms', 'Admin', 'contact', 'index', '', '', 1, 1, 2, 100, 0, 0),
(237, 'menu_title_t3_system_admin_log', 'Zhcms', 'Admin', 'EcAdminLogs', 'index', 'act=list', '', 1, 1, 213, 100, 0, 0),
(238, 'menu_title_t3_template_manage_mail', 'Zhcms', 'Admin', 'MailTemplate', 'index', '', '', 1, 1, 37, 100, 0, 0),
(239, 'menu_title_t3_ec_goods_tag_manage', 'Zhcms', 'Admin', 'EcTagManage', 'index', 'act=list', '', 1, 1, 207, 12, 0, 0),
(272, 'menu_title_t3_ec_system_friend_link', 'Zhcms', 'Admin', 'EcFriendLink', 'index', 'act=list', '', 1, 1, 244, 100, 0, 0),
(241, 'menu_title_t3_ec_goods_trash', 'Zhcms', 'Admin', 'EcGoods', 'index', 'act=trash', '', 1, 1, 207, 6, 0, 0),
(244, 'menu_title_t2_ec_system', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 100, 0, 0),
(245, 'menu_title_t3_ec_system_navigator', 'Zhcms', 'Admin', 'EcNavigator', 'index', 'act=list', '', 1, 1, 244, 100, 0, 0),
(246, 'menu_title_t3_ec_system_flashplay', 'Zhcms', 'Admin', 'EcFlashplay', 'index', 'act=list', '', 1, 1, 244, 100, 0, 0),
(247, 'menu_title_t2_ec_ad', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 4, 0, 0),
(248, 'menu_title_t3_ec_ad_position', 'Zhcms', 'Admin', 'EcAdPosition', 'index', 'act=list', '', 1, 1, 247, 100, 0, 0),
(249, 'menu_title_t3_content_manage_collection', 'Zhcms', 'Admin', 'Collection', 'manage', '', '', 1, 1, 2, 100, 0, 0),
(250, 'menu_title_t3_ec_ads', 'Zhcms', 'Admin', 'EcAds', 'index', 'act=list', '', 1, 1, 247, 100, 0, 0),
(251, 'menu_title_t3_ec_goods_comment_manage', 'Zhcms', 'Admin', 'EcCommentManage', 'index', 'act=list', '', 1, 1, 207, 3, 0, 0),
(252, 'menu_title_t3_ec_goods_picture_batch', 'Zhcms', 'Admin', 'EcPictureBatch', 'index', '', '', 1, 1, 207, 7, 0, 0),
(253, 'menu_title_t3_ec_goods_export', 'Zhcms', 'Admin', 'EcGoodsExport', 'index', 'act=goods_export', '', 1, 1, 207, 9, 0, 0),
(254, 'menu_title_t3_ec_goods_batch', 'Zhcms', 'Admin', 'EcGoodsBatch', 'index', 'act=add', '', 1, 1, 207, 8, 0, 0),
(255, 'menu_title_t3_ec_goods_batch_select', 'Zhcms', 'Admin', 'EcGoodsBatch', 'index', 'act=select', '', 1, 1, 207, 10, 0, 0),
(256, 'menu_title_t3_ec_goods_gen_goods_script', 'Zhcms', 'Admin', 'EcGenGoodsScript', 'index', 'act=setup', '', 1, 1, 207, 11, 0, 0),
(257, 'menu_title_t3_ec_goods_virtual_card_change', 'Zhcms', 'Admin', 'EcVirtualCard', 'index', 'act=change', '', 1, 1, 207, 14, 0, 0),
(258, 'menu_title_t3_ec_goods_auto', 'Zhcms', 'Admin', 'EcGoodsAuto', 'index', 'act=list', '', 1, 1, 207, 15, 0, 0),
(259, 'menu_title_t3_ec_sales_pack', 'Zhcms', 'Admin', 'EcPack', 'index', 'act=list', '', 1, 1, 223, 3, 0, 0),
(260, 'menu_title_t3_ec_sales_card', 'Zhcms', 'Admin', 'EcCard', 'index', 'act=list', '', 1, 1, 223, 4, 0, 0),
(261, 'menu_title_t3_ec_sales_group_buy', 'Zhcms', 'Admin', 'EcGroupBuy', 'index', 'act=list', '', 1, 1, 223, 5, 0, 0),
(262, 'menu_title_t3_ec_sales_topic', 'Zhcms', 'Admin', 'EcTopic', 'index', 'act=list', '', 1, 1, 223, 6, 0, 0),
(263, 'menu_title_t3_ec_sales_auction', 'Zhcms', 'Admin', 'EcAuction', 'index', 'act=list', '', 1, 1, 223, 7, 0, 0),
(264, 'menu_title_t3_ec_sales_favourable', 'Zhcms', 'Admin', 'EcFavourable', 'index', 'act=list', '', 1, 1, 223, 8, 0, 0),
(265, 'menu_title_t3_ec_sales_wholesale', 'Zhcms', 'Admin', 'EcWholesale', 'index', 'act=list', '', 1, 1, 223, 9, 0, 0),
(266, 'menu_title_t3_ec_sales_package', 'Zhcms', 'Admin', 'EcPackage', 'index', 'act=list', '', 1, 1, 223, 10, 0, 0),
(267, 'menu_title_t3_ec_sales_exchange_goods', 'Zhcms', 'Admin', 'EcExchangeGoods', 'index', 'act=list', '', 1, 1, 223, 11, 0, 0),
(268, 'menu_title_t3_ec_article_auto', 'Zhcms', 'Admin', 'EcArticleAuto', 'index', 'act=list', '', 1, 1, 220, 3, 0, 0),
(269, 'menu_title_t3_ec_article_vote', 'Zhcms', 'Admin', 'EcVote', 'index', 'act=list', '', 1, 1, 220, 4, 0, 0),
(270, 'menu_title_t3_ec_system_reg_fields', 'Zhcms', 'Admin', 'EcRegFields', 'index', 'act=list', '', 1, 1, 244, 2, 0, 0),
(271, 'menu_title_t3_ec_system_area_manage', 'Zhcms', 'Admin', 'EcAreaManage', 'index', 'act=list', '', 1, 1, 244, 100, 0, 0),
(273, 'menu_title_t2_ec_order', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 3, 0, 0),
(274, 'menu_title_t3_ec_order_list', 'Zhcms', 'Admin', 'EcOrder', 'index', 'act=list', '', 1, 1, 273, 1, 0, 0),
(275, 'menu_title_t3_ec_authority_agency', 'Zhcms', 'Admin', 'EcAgency', 'index', 'act=list', '', 1, 1, 213, 100, 0, 0),
(276, 'menu_title_t2_ec_tpl', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 100, 0, 0),
(277, 'menu_title_t3_ec_tpl_template', 'Zhcms', 'Admin', 'EcTemplate', 'index', 'act=setup', '', 1, 1, 276, 100, 0, 0),
(278, 'menu_title_t2_ec_email', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 206, 100, 0, 0),
(279, 'menu_title_t3_ec_email_list', 'Zhcms', 'Admin', 'EcEmailList', 'index', 'act=list', '', 1, 1, 278, 100, 0, 0),
(280, 'menu_title_t3_ec_users', 'Zhcms', 'Admin', 'EcUsers', 'index', 'act=list', '', 1, 1, 218, 100, 0, 0),
(281, 'menu_title_t3_ec_user_msg', 'Zhcms', 'Admin', 'EcUserMsg', 'index', 'act=list_all', '', 1, 1, 218, 100, 0, 0),
(282, 'menu_title_t3_ec_system_shipping', 'Zhcms', 'Admin', 'EcShipping', 'index', 'act=list', '', 1, 1, 244, 100, 0, 0),
(283, 'menu_title_t3_ec_system_payment', 'Zhcms', 'Admin', 'EcPayment', 'index', 'act=list', '', 1, 1, 244, 100, 0, 0),
(284, 'menu_title_t1_erp', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 0, 100, 0, 0),
(285, 'menu_title_t2_erp_base', 'Zhcms', 'Admin', '', '', '', '', 1, 1, 284, 100, 0, 0),
(286, 'menu_title_t3_erp_company', 'Zhcms', 'Admin', 'ErpCompany', 'index', 'act=manage', '', 1, 1, 285, 100, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_plugin`
--

CREATE TABLE IF NOT EXISTS `zh_plugin` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `install_time` date DEFAULT NULL COMMENT '安装时间',
  `version` varchar(100) NOT NULL DEFAULT '' COMMENT '版本号',
  `team` varchar(100) NOT NULL DEFAULT '' COMMENT '团队名称',
  `app` char(50) NOT NULL DEFAULT '' COMMENT '应用名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `web` varchar(255) NOT NULL DEFAULT '' COMMENT '官方网址',
  `pubdate` date DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='插件列表' AUTO_INCREMENT=20 ;

--
-- テーブルのデータのダンプ `zh_plugin`
--

INSERT INTO `zh_plugin` (`pid`, `name`, `install_time`, `version`, `team`, `app`, `email`, `web`, `pubdate`) VALUES
(19, '友情链接', '2015-06-16', '1.0', '周鸿', 'Link', 'hong@metaphase.co.jp', 'www.metaphase.co.jp', '2014-02-09');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_role`
--

CREATE TABLE IF NOT EXISTS `zh_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '描述',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理组 1 是 0 不是',
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系统角色',
  `creditslower` mediumint(9) NOT NULL DEFAULT '0' COMMENT '积分<=时为此会员组',
  `comment_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '评论不需要审核  1 不需要  2 需要',
  `allowsendmessage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '允许发短消息  1 允许  2 不允许',
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='角色表' AUTO_INCREMENT=29 ;

--
-- テーブルのデータのダンプ `zh_role`
--

INSERT INTO `zh_role` (`rid`, `rname`, `title`, `admin`, `system`, `creditslower`, `comment_state`, `allowsendmessage`) VALUES
(1, 'スーパー管理者', 'スーパー管理者', 1, 1, 10000, 1, 1),
(2, '内容編集者', '内容編集者', 1, 1, 10000, 1, 1),
(3, '発表スタッフ', '発表スタッフ', 1, 1, 10000, 1, 1),
(4, 'Level0', '游客', 0, 1, 0, 0, 0),
(5, 'Level1', '新手上路', 0, 0, 100, 1, 1),
(6, 'Level2', '小学生', 0, 0, 250, 1, 1),
(7, 'Level3', '中学生', 0, 0, 450, 1, 1),
(8, 'Level4', '高中生', 0, 0, 700, 1, 1),
(9, 'Level5', '大学生', 0, 0, 1050, 1, 1),
(10, 'Level6', '研究生', 0, 0, 1450, 1, 1),
(27, '社員テスト', '会社会員内部テスト用', 1, 0, 0, 1, 1),
(28, 'Level7', '', 0, 0, 2000, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_search`
--

CREATE TABLE IF NOT EXISTS `zh_search` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'mid',
  `word` char(100) NOT NULL DEFAULT '' COMMENT '搜索关键词',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '1' COMMENT '搜索次数',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `name` (`word`) USING BTREE,
  KEY `total` (`total`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='搜索结果表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_search`
--

INSERT INTO `zh_search` (`sid`, `mid`, `word`, `total`) VALUES
(1, 1, 'システムニュース', 18),
(2, 1, 'マニュアル', 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_search_keyword`
--

CREATE TABLE IF NOT EXISTS `zh_search_keyword` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) DEFAULT NULL,
  `keynumber` int(11) unsigned DEFAULT '1',
  `displayorder` int(4) DEFAULT '9999' COMMENT '排序',
  `isopen` int(1) DEFAULT '0' COMMENT '是否开启',
  `addtime` int(10) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='搜索词表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_search_keyword`
--

INSERT INTO `zh_search_keyword` (`id`, `keyword`, `keynumber`, `displayorder`, `isopen`, `addtime`) VALUES
(1, '成都日本泰国上海旅游测试日游', 35, 9999, 0, 1444892137),
(2, '日本东京北海道旅游', 7, 9999, 0, 1444893525);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_session`
--

CREATE TABLE IF NOT EXISTS `zh_session` (
  `sessid` char(32) NOT NULL DEFAULT '',
  `data` text,
  `atime` int(10) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`sessid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='session会话表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_shop_config`
--

CREATE TABLE IF NOT EXISTS `zh_shop_config` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `store_range` varchar(255) NOT NULL DEFAULT '',
  `store_dir` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=904 ;

--
-- テーブルのデータのダンプ `zh_shop_config`
--

INSERT INTO `zh_shop_config` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES
(1, 0, 'shop_info', 'group', '', '', '', 1),
(2, 0, 'basic', 'group', '', '', '', 1),
(3, 0, 'display', 'group', '', '', '', 1),
(4, 0, 'shopping_flow', 'group', '', '', '', 1),
(5, 0, 'smtp', 'group', '', '', '', 1),
(6, 0, 'hidden', 'hidden', '', '', '', 1),
(7, 0, 'goods', 'group', '', '', '', 1),
(8, 0, 'sms', 'group', '', '', '', 1),
(9, 0, 'wap', 'group', '', '', '', 1),
(101, 1, 'shop_name', 'text', '', '', 'ECSHOP', 1),
(102, 1, 'shop_title', 'text', '', '', 'ECSHOP演示站', 1),
(103, 1, 'shop_desc', 'text', '', '', 'ECSHOP演示站', 1),
(104, 1, 'shop_keywords', 'text', '', '', 'ECSHOP演示站', 1),
(105, 1, 'shop_country', 'manual', '', '', '1', 1),
(106, 1, 'shop_province', 'manual', '', '', '2', 1),
(107, 1, 'shop_city', 'manual', '', '', '52', 1),
(108, 1, 'shop_address', 'text', '', '', '', 1),
(109, 1, 'qq', 'text', '', '', '', 1),
(110, 1, 'ww', 'text', '', '', '', 1),
(111, 1, 'skype', 'text', '', '', '', 1),
(112, 1, 'ym', 'text', '', '', '', 1),
(113, 1, 'msn', 'text', '', '', '', 1),
(114, 1, 'service_email', 'text', '', '', '', 1),
(115, 1, 'service_phone', 'text', '', '', '', 1),
(116, 1, 'shop_closed', 'select', '0,1', '', '0', 1),
(117, 1, 'close_comment', 'textarea', '', '', '', 1),
(118, 1, 'shop_logo', 'file', '', '../themes/{$template}/images/', '', 1),
(119, 1, 'licensed', 'select', '0,1', '', '1', 1),
(120, 1, 'user_notice', 'textarea', '', '', '用户中心公告！', 1),
(121, 1, 'shop_notice', 'textarea', '', '', '欢迎光临手机网,我们的宗旨：诚信经营、服务客户！\r\n<MARQUEE onmouseover=this.stop() onmouseout=this.start() \r\nscrollAmount=3><U><FONT color=red>\r\n<P>咨询电话010-10124444  010-21252454 8465544</P></FONT></U></MARQUEE>', 1),
(122, 1, 'shop_reg_closed', 'select', '1,0', '', '0', 1),
(201, 2, 'lang', 'manual', '', '', 'zh_cn', 1),
(202, 2, 'icp_number', 'text', '', '', '', 1),
(203, 2, 'icp_file', 'file', '', '../cert/', '', 1),
(204, 2, 'watermark', 'file', '', '../images/', '', 1),
(205, 2, 'watermark_place', 'select', '0,1,2,3,4,5', '', '1', 1),
(206, 2, 'watermark_alpha', 'text', '', '', '65', 1),
(207, 2, 'use_storage', 'select', '1,0', '', '1', 1),
(208, 2, 'market_price_rate', 'text', '', '', '1.2', 1),
(209, 2, 'rewrite', 'select', '0,1,2', '', '0', 1),
(210, 2, 'integral_name', 'text', '', '', '积分', 1),
(211, 2, 'integral_scale', 'text', '', '', '1', 1),
(212, 2, 'integral_percent', 'text', '', '', '1', 1),
(213, 2, 'sn_prefix', 'text', '', '', 'ECS', 1),
(214, 2, 'comment_check', 'select', '0,1', '', '1', 1),
(215, 2, 'no_picture', 'file', '', '../images/', '', 1),
(218, 2, 'stats_code', 'textarea', '', '', '', 1),
(219, 2, 'cache_time', 'text', '', '', '3600', 1),
(220, 2, 'register_points', 'text', '', '', '0', 1),
(221, 2, 'enable_gzip', 'select', '0,1', '', '0', 1),
(222, 2, 'top10_time', 'select', '0,1,2,3,4', '', '0', 1),
(223, 2, 'timezone', 'options', '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', '', '8', 1),
(224, 2, 'upload_size_limit', 'options', '-1,0,64,128,256,512,1024,2048,4096', '', '64', 1),
(226, 2, 'cron_method', 'select', '0,1', '', '0', 1),
(227, 2, 'comment_factor', 'select', '0,1,2,3', '', '0', 1),
(228, 2, 'enable_order_check', 'select', '0,1', '', '1', 1),
(229, 2, 'default_storage', 'text', '', '', '1', 1),
(230, 2, 'bgcolor', 'text', '', '', '#FFFFFF', 1),
(231, 2, 'visit_stats', 'select', 'on,off', '', 'on', 1),
(232, 2, 'send_mail_on', 'select', 'on,off', '', 'off', 1),
(233, 2, 'auto_generate_gallery', 'select', '1,0', '', '1', 1),
(234, 2, 'retain_original_img', 'select', '1,0', '', '1', 1),
(235, 2, 'member_email_validate', 'select', '1,0', '', '1', 1),
(236, 2, 'message_board', 'select', '1,0', '', '1', 1),
(239, 2, 'certificate_id', 'hidden', '', '', '', 1),
(240, 2, 'token', 'hidden', '', '', '', 1),
(241, 2, 'certi', 'hidden', '', '', 'http://service.shopex.cn/openapi/api.php', 1),
(242, 2, 'send_verify_email', 'select', '1,0', '', '0', 1),
(243, 2, 'ent_id', 'hidden', '', '', '', 1),
(244, 2, 'ent_ac', 'hidden', '', '', '', 1),
(245, 2, 'ent_sign', 'hidden', '', '', '', 1),
(246, 2, 'ent_email', 'hidden', '', '', '', 1),
(301, 3, 'date_format', 'hidden', '', '', 'Y-m-d', 1),
(302, 3, 'time_format', 'text', '', '', 'Y-m-d H:i:s', 1),
(303, 3, 'currency_format', 'text', '', '', '￥%s元', 1),
(304, 3, 'thumb_width', 'text', '', '', '100', 1),
(305, 3, 'thumb_height', 'text', '', '', '100', 1),
(306, 3, 'image_width', 'text', '', '', '230', 1),
(307, 3, 'image_height', 'text', '', '', '230', 1),
(312, 3, 'top_number', 'text', '', '', '10', 1),
(313, 3, 'history_number', 'text', '', '', '5', 1),
(314, 3, 'comments_number', 'text', '', '', '5', 1),
(315, 3, 'bought_goods', 'text', '', '', '3', 1),
(316, 3, 'article_number', 'text', '', '', '8', 1),
(317, 3, 'goods_name_length', 'text', '', '', '7', 1),
(318, 3, 'price_format', 'select', '0,1,2,3,4,5', '', '5', 1),
(319, 3, 'page_size', 'text', '', '', '10', 1),
(320, 3, 'sort_order_type', 'select', '0,1,2', '', '0', 1),
(321, 3, 'sort_order_method', 'select', '0,1', '', '0', 1),
(322, 3, 'show_order_type', 'select', '0,1,2', '', '1', 1),
(323, 3, 'attr_related_number', 'text', '', '', '5', 1),
(324, 3, 'goods_gallery_number', 'text', '', '', '5', 1),
(325, 3, 'article_title_length', 'text', '', '', '16', 1),
(326, 3, 'name_of_region_1', 'text', '', '', '国家', 1),
(327, 3, 'name_of_region_2', 'text', '', '', '省', 1),
(328, 3, 'name_of_region_3', 'text', '', '', '市', 1),
(329, 3, 'name_of_region_4', 'text', '', '', '区', 1),
(330, 3, 'search_keywords', 'text', '', '', '', 0),
(332, 3, 'related_goods_number', 'text', '', '', '4', 1),
(333, 3, 'help_open', 'select', '0,1', '', '1', 1),
(334, 3, 'article_page_size', 'text', '', '', '10', 1),
(335, 3, 'page_style', 'select', '0,1', '', '1', 1),
(336, 3, 'recommend_order', 'select', '0,1', '', '0', 1),
(337, 3, 'index_ad', 'hidden', '', '', 'sys', 1),
(401, 4, 'can_invoice', 'select', '1,0', '', '1', 1),
(402, 4, 'use_integral', 'select', '1,0', '', '1', 1),
(403, 4, 'use_bonus', 'select', '1,0', '', '1', 1),
(404, 4, 'use_surplus', 'select', '1,0', '', '1', 1),
(405, 4, 'use_how_oos', 'select', '1,0', '', '1', 1),
(406, 4, 'send_confirm_email', 'select', '1,0', '', '0', 1),
(407, 4, 'send_ship_email', 'select', '1,0', '', '0', 1),
(408, 4, 'send_cancel_email', 'select', '1,0', '', '0', 1),
(409, 4, 'send_invalid_email', 'select', '1,0', '', '0', 1),
(410, 4, 'order_pay_note', 'select', '1,0', '', '1', 1),
(411, 4, 'order_unpay_note', 'select', '1,0', '', '1', 1),
(412, 4, 'order_ship_note', 'select', '1,0', '', '1', 1),
(413, 4, 'order_receive_note', 'select', '1,0', '', '1', 1),
(414, 4, 'order_unship_note', 'select', '1,0', '', '1', 1),
(415, 4, 'order_return_note', 'select', '1,0', '', '1', 1),
(416, 4, 'order_invalid_note', 'select', '1,0', '', '1', 1),
(417, 4, 'order_cancel_note', 'select', '1,0', '', '1', 1),
(418, 4, 'invoice_content', 'textarea', '', '', '', 1),
(419, 4, 'anonymous_buy', 'select', '1,0', '', '1', 1),
(420, 4, 'min_goods_amount', 'text', '', '', '0', 1),
(421, 4, 'one_step_buy', 'select', '1,0', '', '0', 1),
(422, 4, 'invoice_type', 'manual', '', '', 'a:2:{s:4:"type";a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:0:"";}s:4:"rate";a:3:{i:0;d:1;i:1;d:1.5;i:2;d:0;}}', 1),
(423, 4, 'stock_dec_time', 'select', '1,0', '', '0', 1),
(424, 4, 'cart_confirm', 'options', '1,2,3,4', '', '3', 0),
(425, 4, 'send_service_email', 'select', '1,0', '', '0', 1),
(426, 4, 'show_goods_in_cart', 'select', '1,2,3', '', '3', 1),
(427, 4, 'show_attr_in_cart', 'select', '1,0', '', '1', 1),
(501, 5, 'smtp_host', 'text', '', '', 'localhost', 1),
(502, 5, 'smtp_port', 'text', '', '', '25', 1),
(503, 5, 'smtp_user', 'text', '', '', '', 1),
(504, 5, 'smtp_pass', 'password', '', '', '', 1),
(505, 5, 'smtp_mail', 'text', '', '', '', 1),
(506, 5, 'mail_charset', 'select', 'UTF8,GB2312,BIG5', '', 'UTF8', 1),
(507, 5, 'mail_service', 'select', '0,1', '', '0', 0),
(508, 5, 'smtp_ssl', 'select', '0,1', '', '0', 0),
(601, 6, 'integrate_code', 'hidden', '', '', 'ecshop', 1),
(602, 6, 'integrate_config', 'hidden', '', '', '', 1),
(603, 6, 'hash_code', 'hidden', '', '', 'efa94d8d85f5282fef9d275b3809aaf0', 1),
(604, 6, 'template', 'hidden', '', '', 'default', 1),
(605, 6, 'install_date', 'hidden', '', '', '1432537681', 1),
(606, 6, 'ecs_version', 'hidden', '', '', 'v2.7.3', 1),
(607, 6, 'sms_user_name', 'hidden', '', '', '', 1),
(608, 6, 'sms_password', 'hidden', '', '', '', 1),
(609, 6, 'sms_auth_str', 'hidden', '', '', '', 1),
(610, 6, 'sms_domain', 'hidden', '', '', '', 1),
(611, 6, 'sms_count', 'hidden', '', '', '', 1),
(612, 6, 'sms_total_money', 'hidden', '', '', '', 1),
(613, 6, 'sms_balance', 'hidden', '', '', '', 1),
(614, 6, 'sms_last_request', 'hidden', '', '', '', 1),
(616, 6, 'affiliate', 'hidden', '', '', 'a:3:{s:6:"config";a:7:{s:6:"expire";d:24;s:11:"expire_unit";s:4:"hour";s:11:"separate_by";i:0;s:15:"level_point_all";s:2:"5%";s:15:"level_money_all";s:2:"1%";s:18:"level_register_all";i:2;s:17:"level_register_up";i:60;}s:4:"item";a:4:{i:0;a:2:{s:11:"level_point";s:3:"60%";s:11:"level_money";s:3:"60%";}i:1;a:2:{s:11:"level_point";s:3:"30%";s:11:"level_money";s:3:"30%";}i:2;a:2:{s:11:"level_point";s:2:"7%";s:11:"level_money";s:2:"7%";}i:3;a:2:{s:11:"level_point";s:2:"3%";s:11:"level_money";s:2:"3%";}}s:2:"on";i:1;}', 1),
(617, 6, 'captcha', 'hidden', '', '', '12', 1),
(618, 6, 'captcha_width', 'hidden', '', '', '100', 1),
(619, 6, 'captcha_height', 'hidden', '', '', '20', 1),
(620, 6, 'sitemap', 'hidden', '', '', 'a:6:{s:19:"homepage_changefreq";s:6:"hourly";s:17:"homepage_priority";s:3:"0.9";s:19:"category_changefreq";s:6:"hourly";s:17:"category_priority";s:3:"0.8";s:18:"content_changefreq";s:6:"weekly";s:16:"content_priority";s:3:"0.7";}', 0),
(621, 6, 'points_rule', 'hidden', '', '', '', 0),
(622, 6, 'flash_theme', 'hidden', '', '', 'dynfocus', 1),
(623, 6, 'stylename', 'hidden', '', '', '', 1),
(701, 7, 'show_goodssn', 'select', '1,0', '', '1', 1),
(702, 7, 'show_brand', 'select', '1,0', '', '1', 1),
(703, 7, 'show_goodsweight', 'select', '1,0', '', '1', 1),
(704, 7, 'show_goodsnumber', 'select', '1,0', '', '1', 1),
(705, 7, 'show_addtime', 'select', '1,0', '', '1', 1),
(706, 7, 'goodsattr_style', 'select', '1,0', '', '1', 1),
(707, 7, 'show_marketprice', 'select', '1,0', '', '1', 1),
(801, 8, 'sms_shop_mobile', 'text', '', '', '', 1),
(802, 8, 'sms_order_placed', 'select', '1,0', '', '0', 1),
(803, 8, 'sms_order_payed', 'select', '1,0', '', '0', 1),
(804, 8, 'sms_order_shipped', 'select', '1,0', '', '0', 1),
(901, 9, 'wap_config', 'select', '1,0', '', '0', 1),
(902, 9, 'wap_logo', 'file', '', '../images/', '', 1),
(903, 2, 'message_check', 'select', '1,0', '', '1', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_sysconfig`
--

CREATE TABLE IF NOT EXISTS `zh_sysconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webid` int(3) DEFAULT NULL,
  `varname` varchar(30) DEFAULT NULL COMMENT '变量名称',
  `info` varchar(255) DEFAULT NULL COMMENT '参数描述',
  `value` mediumtext COMMENT '变量值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='系统变量配置表' AUTO_INCREMENT=81 ;

--
-- テーブルのデータのダンプ `zh_sysconfig`
--

INSERT INTO `zh_sysconfig` (`id`, `webid`, `varname`, `info`, `value`) VALUES
(1, 0, 'cfg_medias_dir', '上传路径', '/uploads'),
(2, 0, 'cfg_cmspath', '网站路径', ''),
(3, 0, 'cfg_cli_time', '时差值', '8'),
(5, 0, 'cfg_webname', '网站名称', 'ZH旅游'),
(6, 0, 'cfg_keywords', '关键词', 'ZH旅游首页关键词'),
(7, 0, 'cfg_description', '描述', 'ZH旅游首页描述'),
(8, 0, 'cfg_indextitle', '首页标题', 'ZH旅游CMS'),
(9, 0, 'cfg_index_zhuti', '首页主题', ''),
(10, 0, 'cfg_indexcode', '首页代码', ''),
(11, 0, 'cfg_gonggao', '公告', '<p>\n                <span style="color: #808080">上海metaphase<a href="http://www.metaphase.asia/">www.metaphase.asia</a>，电话：13167001526</span>\n</p>'),
(75, 0, 'cfg_phone', NULL, '13167001526'),
(12, 0, 'cfg_tongjicode', '统计代码 ', ''),
(13, 0, 'cfg_df_style', '网站样式', 'smore'),
(14, 0, 'cfg_weathcode', '天气代码', '  '),
(16, 0, 'cfg_beian', '网站备案号', ''),
(17, 0, 'cfg_powerby', '网站版权信息', '思途旅游网'),
(18, 0, 'cfg_indexname', '主页链接名', '首页'),
(21, 0, 'cfg_notallowstr', '评论禁用词语', '她妈|它妈|他妈|你妈|去死|贱人|SB|航空票|飞航空票'),
(22, 0, 'cfg_feedback_time', '评论间隔时间', '0'),
(25, 0, 'cfg_tplcache_dir', '缓存目录', '/data/tplcache'),
(26, 0, 'cfg_taposition', '客服位置', '0'),
(27, 0, 'cfg_taindex', '是否在中间弹出', '1'),
(28, 0, 'cfg_logo', 'logo图片', '/uploads/main/adimg/20140303/20140303104231.gif'),
(29, 0, 'cfg_logourl', 'logo连接位置', 'http://www.stourweb.com'),
(30, 0, 'cfg_logoalt', 'logo alt标识', '思途旅游CMS'),
(31, 0, 'cfg_lxslogo', '旅行社标识', '/uploads/main/adimg/20130918/20130918175433.gif'),
(32, 0, 'cfg_lxslogoalt', 'lxglogo alt标识', 'jjf'),
(33, 0, 'cfg_lxslogourl', '旅行社logo连接地址', 'http://www.suv.com'),
(35, 0, 'cfg_Email139', '默认139邮箱', 'd@139.com'),
(36, 0, 'cfg_lineEmail', '线路139Email', ''),
(37, 0, 'cfg_carEmail', '车务139Email', ''),
(38, 0, 'cfg_hotelEmail', '酒店139Email', ''),
(39, 0, 'cfg_indexphoto', '相册首页滚动情况', '0'),
(40, 0, 'cfg_payment', '签约付款', '\n<p>&nbsp;<span id="1348816711927E"><span style="font-size: larger">网上预订：直接通过网站下单，在线选择产品并填写相关信息后，提交订单。</span></span></p>\n<p>&nbsp;<span style="font-size: larger">在线预订：拨打咨询/预订电话，由客服帮助您完成信息的确认和下单操作。</span></p>'),
(41, 0, 'cfg_qsmaillcontent', '邮件内容设置', '<p>我们已经收到并处理了您的提问，欢迎回来访问本站，查看我们的回复；如果您还有疑问，欢迎您提问，我们将尽快回复您！</p>'),
(42, 0, 'cfg_corephrases', '核心词组', '旅游,思途旅游,思途旅游CMS'),
(45, 0, 'cfg_wenda_open', '是否开启问答', '0'),
(46, 0, 'cfg_logodisplay', '网站LOGO显示栏目', '0,1,2,3,5,4,6,8,13,'),
(47, 0, 'cfg_color', '线路字体颜色', '1'),
(48, 0, 'cfg_wenEmail', '提问139email', ''),
(49, 0, 'cfg_indexlinktitle', '首页连接title', ''),
(60, 0, 'cfg_html_kefu', '客服代码', '第三方客服'),
(61, 0, 'cfg_html_editor', '使用的编辑器', 'slineeditor'),
(64, 0, 'cfg_df_img', '默认图片', '/uploads/main/adimg/20140128/20140128115836.jpg'),
(65, 0, 'cfg_alipay_account', '支付宝帐号', ''),
(66, 0, 'cfg_alipay_signtype', '支付宝签约类型', 'cash'),
(67, 0, 'cfg_alipay_pid', '合作者身份ID', ''),
(68, 0, 'cfg_alipay_key', '交易安全校验码', ''),
(69, 0, 'cfg_web_open', '网站开关', '1'),
(70, 0, 'cfg_logoalt', 'logo标识', '思途旅游CMS'),
(71, 0, 'cfg_alipay_signtype', '签约类型', 'cash'),
(72, 0, 'cfg_py_open', '评论', '1'),
(74, 0, 'cfg_supplier_msg', '客户{#LINKMAN#}预订{#PRODUCTNAME#}产品,联系电话:{#PHONE#},人数:{#NUMBER#},单价:{#PRICE#},总价:{#TOTALPRICE#},请尽快处理.', '1'),
(76, 0, 'cfg_mobile_phone', NULL, ''),
(77, 0, 'cfg_weibo_url', NULL, 'http://weibo.com/u/1594449317/home?wvr=5'),
(78, 0, 'cfg_weixin_logo', NULL, '/uploads/main/allimg/20150901/20150901151213.jpg'),
(79, 0, 'cfg_mobile_open', NULL, '1'),
(80, 0, 'cfg_auto_time', NULL, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_system_message`
--

CREATE TABLE IF NOT EXISTS `zh_system_message` (
  `mid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收信人',
  `message` varchar(200) NOT NULL DEFAULT '' COMMENT '消息内容',
  `state` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否阅读  1 已经阅读 0 未阅读',
  `sendtime` int(11) unsigned NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统消息表' AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_system_message`
--

INSERT INTO `zh_system_message` (`mid`, `uid`, `message`, `state`, `sendtime`) VALUES
(1, 1, ' <a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=43''>私が新規登録しました</a>新しいコメントがある', 0, 1471947387);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_tag`
--

CREATE TABLE IF NOT EXISTS `zh_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) DEFAULT '' COMMENT 'tag字符',
  `total` mediumint(9) DEFAULT '1' COMMENT '次数',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `name` (`tag`),
  KEY `total` (`total`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Tag标签表' AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `zh_tag`
--

INSERT INTO `zh_tag` (`tid`, `tag`, `total`) VALUES
(1, 'システムニュース', 4),
(2, 'マニュアル', 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_template_tag`
--

CREATE TABLE IF NOT EXISTS `zh_template_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` mediumint(8) unsigned DEFAULT NULL COMMENT '类型  1 arclist',
  `options` text COMMENT '标签属性',
  `name` varchar(100) DEFAULT NULL COMMENT '标签名称',
  `content` text COMMENT '标签内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台管理员自定义模板标签' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_tour_destinations`
--

CREATE TABLE IF NOT EXISTS `zh_tour_destinations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kindname` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT '0' COMMENT '本表从属关系父id',
  `seotitle` varchar(255) DEFAULT NULL COMMENT '优化标题',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `tagword` varchar(255) DEFAULT NULL COMMENT 'tag词',
  `jieshao` text COMMENT '目的地介绍',
  `kindtype` int(1) unsigned DEFAULT NULL COMMENT '1:栏目分类 2:其它分类',
  `isopen` int(1) unsigned DEFAULT '1' COMMENT '是否开启',
  `isfinishseo` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否完成优化设置',
  `displayorder` int(4) unsigned DEFAULT '9999' COMMENT '排序',
  `isnav` int(1) unsigned DEFAULT '0' COMMENT '是否开启导航',
  `templetpath` varchar(255) DEFAULT NULL COMMENT '目的地模板',
  `ishot` int(1) unsigned DEFAULT '0' COMMENT '是否热门',
  `litpic` varchar(255) DEFAULT NULL COMMENT '封面图',
  `piclist` text COMMENT '目的地图片',
  `istopnav` tinyint(3) DEFAULT '0' COMMENT '是否开启智能导航',
  `pinyin` varchar(255) DEFAULT NULL COMMENT '拼音',
  `templet` varchar(255) DEFAULT NULL COMMENT '模板路径',
  `iswebsite` int(1) DEFAULT '0' COMMENT '是否开启子站',
  `weburl` varchar(50) DEFAULT NULL COMMENT '子站域名',
  `webroot` varchar(50) DEFAULT NULL COMMENT '子站目录',
  `webprefix` varchar(50) DEFAULT NULL COMMENT '子站主机头',
  `opentypeids` varchar(255) DEFAULT NULL COMMENT '针对其它栏目此目的地是否开启',
  PRIMARY KEY (`id`),
  KEY `IDX_PINYIN` (`pinyin`) USING BTREE,
  KEY `IDX_PID` (`pid`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='目的地总表' AUTO_INCREMENT=40 ;

--
-- テーブルのデータのダンプ `zh_tour_destinations`
--

INSERT INTO `zh_tour_destinations` (`id`, `kindname`, `pid`, `seotitle`, `keyword`, `description`, `tagword`, `jieshao`, `kindtype`, `isopen`, `isfinishseo`, `displayorder`, `isnav`, `templetpath`, `ishot`, `litpic`, `piclist`, `istopnav`, `pinyin`, `templet`, `iswebsite`, `weburl`, `webroot`, `webprefix`, `opentypeids`) VALUES
(36, '国内游', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 9999, 0, NULL, 0, NULL, NULL, 0, 'guoneiyou', NULL, 0, NULL, NULL, NULL, '1,2,3,4,5,6,13'),
(37, '出境游', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 9999, 0, NULL, 0, NULL, NULL, 0, 'chujingyou', NULL, 0, NULL, NULL, NULL, '1,2,3,4,5,6,13'),
(38, '日本旅行', 0, '', '', '', '', '', 0, 1, 0, 9999, 0, '', 0, '', '', 0, 'ribenlvxing', '', 0, '', '', '', ''),
(39, '未命名', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 9999, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_tour_member_order`
--

CREATE TABLE IF NOT EXISTS `zh_tour_member_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ordersn` varchar(255) DEFAULT NULL COMMENT '订单号',
  `memberid` int(11) unsigned DEFAULT NULL COMMENT '会员id',
  `typeid` int(3) unsigned DEFAULT NULL COMMENT '订单类型',
  `webid` int(3) unsigned DEFAULT NULL COMMENT '所属站点',
  `productaid` int(11) unsigned DEFAULT NULL COMMENT '产品aid',
  `productname` varchar(255) DEFAULT NULL COMMENT '产品名称',
  `productautoid` int(11) unsigned DEFAULT NULL COMMENT '对应产品表自增id(第三方后台用)',
  `litpic` varchar(255) DEFAULT NULL COMMENT '产品图片',
  `price` float(10,2) unsigned DEFAULT NULL COMMENT '价格(单价)',
  `childprice` float(10,2) unsigned DEFAULT NULL COMMENT '小孩报价',
  `usedate` varchar(255) DEFAULT NULL COMMENT '使用日期',
  `dingnum` int(3) unsigned DEFAULT NULL COMMENT '数量',
  `childnum` int(11) unsigned DEFAULT '0' COMMENT '儿童数量',
  `ispay` int(10) unsigned DEFAULT '0' COMMENT '是否已经付款',
  `status` int(1) unsigned DEFAULT '0' COMMENT '订单状态',
  `linkman` varchar(255) DEFAULT NULL COMMENT '订单联系人',
  `linktel` varchar(255) DEFAULT NULL COMMENT '订单联系电话',
  `linkemail` varchar(100) DEFAULT NULL COMMENT '联系人邮件',
  `linkqq` varchar(16) DEFAULT NULL COMMENT '联系人QQ',
  `isneedpiao` int(1) unsigned DEFAULT '0' COMMENT '是否需要发票',
  `addtime` int(10) unsigned DEFAULT NULL COMMENT '预订时间',
  `finishtime` int(10) unsigned DEFAULT NULL COMMENT '成交时间',
  `ispinlun` int(1) unsigned DEFAULT '0' COMMENT '是否已经评论,1:已评论,0:未评论',
  `jifencomment` int(11) DEFAULT '0' COMMENT '评论送积分',
  `jifentprice` int(11) DEFAULT '0' COMMENT '积分抵现金',
  `jifenbook` int(11) DEFAULT '0' COMMENT '预订送积分',
  `dingjin` int(11) DEFAULT '0' COMMENT '是否支持定金',
  `suitid` int(11) DEFAULT '0' COMMENT '用于预订产品有子分类时',
  `paytype` int(1) DEFAULT '1' COMMENT '支付方式',
  `oldnum` int(11) DEFAULT '0' COMMENT '老人数量',
  `oldprice` float(10,2) DEFAULT '0.00' COMMENT '老人价格',
  `usejifen` int(1) unsigned DEFAULT '0' COMMENT '是否使用积分',
  `needjifen` int(11) unsigned DEFAULT NULL COMMENT '需要的积分',
  `pid` int(11) DEFAULT '0' COMMENT '父级订单id',
  `haschild` int(1) unsigned DEFAULT '0' COMMENT '是否有子级订单',
  `remark` mediumtext,
  `kindlist` varchar(255) DEFAULT '' COMMENT '所属目的地',
  `handleshop` varchar(4) DEFAULT NULL,
  `linksex` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- テーブルのデータのダンプ `zh_tour_member_order`
--

INSERT INTO `zh_tour_member_order` (`id`, `ordersn`, `memberid`, `typeid`, `webid`, `productaid`, `productname`, `productautoid`, `litpic`, `price`, `childprice`, `usedate`, `dingnum`, `childnum`, `ispay`, `status`, `linkman`, `linktel`, `linkemail`, `linkqq`, `isneedpiao`, `addtime`, `finishtime`, `ispinlun`, `jifencomment`, `jifentprice`, `jifenbook`, `dingjin`, `suitid`, `paytype`, `oldnum`, `oldprice`, `usejifen`, `needjifen`, `pid`, `haschild`, `remark`, `kindlist`, `handleshop`, `linksex`) VALUES
(1, '0109100737', 1, 1, 2, 3, '成都到泰国(10月国庆套餐)', 3, '', 1100.00, 1020.00, '2015-10-01', 1, 1, 0, 0, '', '13167001526', '', '', 0, 1441876419, 0, 0, 10, 1, 200, 0, 7, 1, 1, 1150.00, 0, 0, 0, 0, '', '1,2', NULL, NULL),
(2, '0109105923', 1, 1, 2, 3, '成都到泰国(10月国庆套餐)', 3, NULL, 1100.00, 1020.00, '2015-10-01', 1, 1, 0, 1, '联系人1', '13167001526', '136871204@qq.com', NULL, 0, 1441882572, NULL, 0, 10, 1, 200, 0, 7, 1, 1, 1150.00, 0, 0, 0, 0, '订单留言', '1,2', NULL, NULL),
(3, '0109104097', 1, 1, 2, 3, '成都到泰国(10月国庆套餐)', 3, NULL, 1100.00, 1020.00, '2015-10-01', 1, 1, 0, 1, '联系人1', '13167001526', '136871204@qq.com', NULL, 0, 1441882589, NULL, 0, 10, 1, 200, 0, 7, 1, 1, 1150.00, 0, 0, 0, 0, '订单留言', '1,2', NULL, NULL),
(4, '0109103422', 1, 1, 3, 3, '成都到泰国(10月国庆套餐)', 3, NULL, 1100.00, 1020.00, '2015-10-01', 1, 1, 0, 1, '联系人1', '13167001526', '136871204@qq.com', NULL, 0, 1441882663, NULL, 0, 10, 1, 200, 0, 7, 1, 1, 1150.00, 0, 0, 0, 0, '订单留言', '1,2', NULL, NULL),
(5, '0109100618', 1, 1, 3, 3, '成都到泰国(10月国庆套餐)', 3, NULL, 1100.00, 1020.00, '2015-10-01', 1, 1, 0, 1, '联系人1', '13167001526', '136871204@qq.com', NULL, 0, 1441882760, NULL, 0, 10, 1, 200, 0, 7, 1, 1, 1150.00, 0, 0, 0, 0, '订单留言', '1,2', NULL, NULL),
(6, '0109100255', 1, 1, 5, 3, '成都到泰国(10月国庆套餐)', 3, '', 1101.00, 1020.00, '2015-10-01', 1, 1, 0, 1, '联系人1', '13167001526', '136871204@qq.com', '', 0, 1441882797, 0, 0, 10, 1, 200, 0, 7, 1, 1, 1150.00, 0, 0, 0, 0, '订单留言', '1,2', NULL, NULL),
(22, '0110194588', 1, 1, 1, 0, '&lt;广州出发-日本，箱根，北海道4日游&gt;广州直飞， 畅快赏枫，立减(10-11月套餐)', 20, NULL, 1600.00, 1300.00, '2015-10-30', 1, 1, 0, 0, 'aaa', '11111111111', '111@test.com', NULL, 0, 1445225591, NULL, 0, 0, 0, 0, 0, 7, 0, 1, 1200.00, 0, NULL, 0, 0, '111222', '6,12,24,25', '1', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_tour_member_order_tourer`
--

CREATE TABLE IF NOT EXISTS `zh_tour_member_order_tourer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(255) DEFAULT '0' COMMENT '订单编号',
  `tourername` varchar(255) DEFAULT '0' COMMENT '游客姓名',
  `sex` enum('男','女') DEFAULT '男',
  `cardtype` varchar(255) DEFAULT '0' COMMENT '证件类型',
  `cardnumber` varchar(255) DEFAULT '0' COMMENT '证件号码',
  `mobile` varchar(15) DEFAULT '0' COMMENT '手机',
  `fnamealp` varchar(255) DEFAULT NULL,
  `lnamealp` varchar(255) DEFAULT NULL,
  `birthdayy` varchar(10) DEFAULT NULL,
  `birthdaym` varchar(10) DEFAULT NULL,
  `birthdayd` varchar(10) DEFAULT NULL,
  `passbook` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='订单游客表' AUTO_INCREMENT=37 ;

--
-- テーブルのデータのダンプ `zh_tour_member_order_tourer`
--

INSERT INTO `zh_tour_member_order_tourer` (`id`, `orderid`, `tourername`, `sex`, `cardtype`, `cardnumber`, `mobile`, `fnamealp`, `lnamealp`, `birthdayy`, `birthdaym`, `birthdayd`, `passbook`) VALUES
(36, '22', 'a3', '男', '0', '0', '0', 'a', '3', '1986', '04', '13', 'a33333'),
(35, '22', 'a2', '男', '0', '0', '0', 'a', '2', '1986', '04', '12', 'a22222'),
(34, '22', 'a1', '男', '0', '0', '0', 'a', '1', '1986', '04', '11', 'a11111');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_tour_model`
--

CREATE TABLE IF NOT EXISTS `zh_tour_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型id',
  `modulename` varchar(255) DEFAULT NULL COMMENT '模块名称',
  `pinyin` varchar(255) DEFAULT NULL COMMENT '拼音标识',
  `correct` varchar(255) DEFAULT NULL COMMENT '修正pinyin字段',
  `maintable` varchar(255) DEFAULT NULL COMMENT '主表',
  `addtable` varchar(255) DEFAULT NULL COMMENT '附加表',
  `attrtable` varchar(255) DEFAULT 'model_attr' COMMENT '属性表',
  `issystem` int(1) DEFAULT '0' COMMENT '是否系统',
  `isopen` int(1) DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pinyin` (`pinyin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='思途模型表' AUTO_INCREMENT=102 ;

--
-- テーブルのデータのダンプ `zh_tour_model`
--

INSERT INTO `zh_tour_model` (`id`, `modulename`, `pinyin`, `correct`, `maintable`, `addtable`, `attrtable`, `issystem`, `isopen`) VALUES
(1, '线路', 'line', 'lines', 'line', 'line_extend_field', 'line_attr', 1, 1),
(2, '酒店', 'hotel', 'hotels', 'hotel', 'hotel_extend_field', 'hotel_attr', 1, 1),
(3, '租车', 'car', 'cars', 'car', 'car_extend_field', 'car_attr', 1, 1),
(4, '文章', 'article', 'raiders', 'article', 'article_extend_field', 'article_attr', 1, 1),
(5, '景点', 'spot', 'spots', 'spot', 'spot_extend_field', 'spot_attr', 1, 1),
(6, '相册', 'photo', 'photos', 'photo', 'photo_extend_field', 'photo_attr', 1, 1),
(7, '保险', 'insurance', NULL, 'insurance', NULL, 'model_attr', 0, 1),
(8, '签证', 'visa', NULL, 'visa', 'visa_extend_field', 'null', 1, 1),
(10, '问答', 'wenda', 'questions', 'question', NULL, 'model_attr', 1, 1),
(11, '结伴', 'jieban', NULL, 'jieban', 'jieban_extend_field', 'jieban_attr', 1, 1),
(13, '团购', 'tuan', NULL, 'tuan', 'tuan_extend_field', 'tuan_attr', 1, 1),
(14, '私人定制', 'dingzhi', NULL, 'customize', 'customize_extend_field', 'dingzhi_attr', 1, 1),
(101, '游记', 'notes', NULL, 'notes', '', '', 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_upload`
--

CREATE TABLE IF NOT EXISTS `zh_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `name` varchar(255) DEFAULT '' COMMENT '原文件名',
  `filename` varchar(100) NOT NULL DEFAULT '' COMMENT '文件名',
  `basename` varchar(100) NOT NULL DEFAULT '' COMMENT '有扩展名的文件名',
  `path` char(200) NOT NULL DEFAULT '' COMMENT '文件路径 ',
  `ext` varchar(45) NOT NULL DEFAULT '' COMMENT '扩展名',
  `image` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片',
  `size` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `uptime` int(10) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否使用 1 使用 0 未使用',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  `mid` smallint(6) NOT NULL DEFAULT '0' COMMENT '模型mid',
  PRIMARY KEY (`id`),
  KEY `basename` (`basename`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='上传文件' AUTO_INCREMENT=148 ;

--
-- テーブルのデータのダンプ `zh_upload`
--

INSERT INTO `zh_upload` (`id`, `name`, `filename`, `basename`, `path`, `ext`, `image`, `size`, `uptime`, `state`, `uid`, `mid`) VALUES
(1, 'Chrysanthemum', '93431433749502', '93431433749502.jpg', 'upload/content/2015/06/08/93431433749502.jpg', 'jpg', 1, 879394, 1433749502, 1, 1, 0),
(2, 'Desert', '65751433749504', '65751433749504.jpg', 'upload/content/2015/06/08/65751433749504.jpg', 'jpg', 1, 845941, 1433749505, 1, 1, 0),
(3, 'Hydrangeas', '16721433749510', '16721433749510.jpg', 'upload/content/2015/06/08/16721433749510.jpg', 'jpg', 1, 595284, 1433749511, 1, 1, 0),
(4, 'Jellyfish', '28011433749512', '28011433749512.jpg', 'upload/content/2015/06/08/28011433749512.jpg', 'jpg', 1, 775702, 1433749513, 1, 1, 0),
(5, 'Lighthouse', '68991433749513', '68991433749513.jpg', 'upload/content/2015/06/08/68991433749513.jpg', 'jpg', 1, 561276, 1433749514, 1, 1, 0),
(6, 'Penguins', '97291433749514', '97291433749514.jpg', 'upload/content/2015/06/08/97291433749514.jpg', 'jpg', 1, 777835, 1433749515, 1, 1, 0),
(7, 'Tulips', '5831433749515', '5831433749515.jpg', 'upload/content/2015/06/08/5831433749515.jpg', 'jpg', 1, 620888, 1433749516, 1, 1, 0),
(8, 'Hydrangeas', '3971433749527', '3971433749527.jpg', 'upload/content/2015/06/08/3971433749527.jpg', 'jpg', 1, 595284, 1433749528, 1, 1, 0),
(9, 'Jellyfish', '43871433749708', '43871433749708.jpg', 'upload/content/2015/06/08/43871433749708.jpg', 'jpg', 1, 775702, 1433749708, 1, 1, 0),
(10, 'Chrysanthemum', '55641433749718', '55641433749718.jpg', 'upload/content/2015/06/08/55641433749718.jpg', 'jpg', 1, 879394, 1433749718, 1, 1, 0),
(11, '1', '62691433749743', '62691433749743.jpg', 'upload/content/2015/06/08/62691433749743.jpg', 'jpg', 1, 845941, 1433749743, 1, 1, 0),
(12, '3', '82911433749744', '82911433749744.jpg', 'upload/content/2015/06/08/82911433749744.jpg', 'jpg', 1, 595284, 1433749744, 1, 1, 0),
(13, '5', '49601433749744', '49601433749744.jpg', 'upload/content/2015/06/08/49601433749744.jpg', 'jpg', 1, 775702, 1433749745, 1, 1, 0),
(14, '2', '7551433749745', '7551433749745.jpg', 'upload/content/2015/06/08/7551433749745.jpg', 'jpg', 1, 780831, 1433749745, 1, 1, 0),
(15, '6', '50451433749746', '50451433749746.jpg', 'upload/content/2015/06/08/50451433749746.jpg', 'jpg', 1, 561276, 1433749746, 1, 1, 0),
(16, '4', '81771433749746', '81771433749746.jpg', 'upload/content/2015/06/08/81771433749746.jpg', 'jpg', 1, 777835, 1433749746, 1, 1, 0),
(17, '4', '72781433749747', '72781433749747.jpg', 'upload/content/2015/06/08/72781433749747.jpg', 'jpg', 1, 620888, 1433749747, 1, 1, 0),
(18, 'bg', '71051433750047', '71051433750047.jpg', 'upload/content/2015/06/08/71051433750047.jpg', 'jpg', 1, 879394, 1433750047, 1, 1, 0),
(19, 'Chrysanthemum', '78151433750047', '78151433750047.jpg', 'upload/content/2015/06/08/78151433750047.jpg', 'jpg', 1, 879394, 1433750048, 1, 1, 0),
(20, 'Desert', '3231433750048', '3231433750048.jpg', 'upload/content/2015/06/08/3231433750048.jpg', 'jpg', 1, 845941, 1433750048, 1, 1, 0),
(21, 'Hydrangeas', '43091433750048', '43091433750048.jpg', 'upload/content/2015/06/08/43091433750048.jpg', 'jpg', 1, 595284, 1433750049, 1, 1, 0),
(22, 'Jellyfish', '77081433750049', '77081433750049.jpg', 'upload/content/2015/06/08/77081433750049.jpg', 'jpg', 1, 775702, 1433750049, 1, 1, 0),
(23, 'Koala', '90181433750049', '90181433750049.jpg', 'upload/content/2015/06/08/90181433750049.jpg', 'jpg', 1, 780831, 1433750050, 1, 1, 0),
(24, 'Lighthouse', '10221433750050', '10221433750050.jpg', 'upload/content/2015/06/08/10221433750050.jpg', 'jpg', 1, 561276, 1433750050, 1, 1, 0),
(25, 'Penguins', '48461433750050', '48461433750050.jpg', 'upload/content/2015/06/08/48461433750050.jpg', 'jpg', 1, 777835, 1433750051, 1, 1, 0),
(26, 'Tulips', '32841433750051', '32841433750051.jpg', 'upload/content/2015/06/08/32841433750051.jpg', 'jpg', 1, 620888, 1433750051, 1, 1, 0),
(27, 'bg', '36411433750072', '36411433750072.jpg', 'upload/content/2015/06/08/36411433750072.jpg', 'jpg', 1, 879394, 1433750072, 1, 1, 0),
(28, 'Chrysanthemum', '65731433750073', '65731433750073.jpg', 'upload/content/2015/06/08/65731433750073.jpg', 'jpg', 1, 879394, 1433750073, 1, 1, 0),
(29, 'Desert', '94231433750073', '94231433750073.jpg', 'upload/content/2015/06/08/94231433750073.jpg', 'jpg', 1, 845941, 1433750073, 1, 1, 0),
(30, 'Hydrangeas', '87821433750074', '87821433750074.jpg', 'upload/content/2015/06/08/87821433750074.jpg', 'jpg', 1, 595284, 1433750074, 1, 1, 0),
(31, 'Jellyfish', '23781433750074', '23781433750074.jpg', 'upload/content/2015/06/08/23781433750074.jpg', 'jpg', 1, 775702, 1433750074, 1, 1, 0),
(32, 'Koala', '51621433750075', '51621433750075.jpg', 'upload/content/2015/06/08/51621433750075.jpg', 'jpg', 1, 780831, 1433750075, 1, 1, 0),
(33, 'Lighthouse', '91191433750075', '91191433750075.jpg', 'upload/content/2015/06/08/91191433750075.jpg', 'jpg', 1, 561276, 1433750075, 1, 1, 0),
(34, 'Penguins', '75241433750075', '75241433750075.jpg', 'upload/content/2015/06/08/75241433750075.jpg', 'jpg', 1, 777835, 1433750076, 1, 1, 0),
(35, 'Tulips', '54961433750076', '54961433750076.jpg', 'upload/content/2015/06/08/54961433750076.jpg', 'jpg', 1, 620888, 1433750076, 1, 1, 0),
(36, 'pic_640x480_1', '16721436348409', '16721436348409.png', 'upload/content/2015/07/08/16721436348409.png', 'png', 1, 194437, 1436348409, 1, 1, 0),
(37, 'pic_640x480_1', '23241436349647', '23241436349647.png', 'upload/content/2015/07/08/23241436349647.png', 'png', 1, 194437, 1436349647, 1, 1, 0),
(38, 'pic_640x480_2', '21941436349647', '21941436349647.png', 'upload/content/2015/07/08/21941436349647.png', 'png', 1, 194950, 1436349648, 1, 1, 0),
(39, 'pic_640x480_3', '36961436349648', '36961436349648.png', 'upload/content/2015/07/08/36961436349648.png', 'png', 1, 194142, 1436349648, 1, 1, 0),
(40, 'topbanner2_pc', '67341437447724', '67341437447724.jpg', 'upload/content/2015/07/21/67341437447724.jpg', 'jpg', 1, 14863, 1437447724, 1, 1, 0),
(41, 'topbanner2_pc', '26071437447729', '26071437447729.jpg', 'upload/content/2015/07/21/26071437447729.jpg', 'jpg', 1, 14863, 1437447729, 1, 1, 0),
(42, 'pic_600x822_1', '76301437623457', '76301437623457.png', 'upload/content/2015/07/23/76301437623457.png', 'png', 1, 304164, 1437623458, 1, 1, 0),
(43, 'pc_710x355_1', '75511437623467', '75511437623467.jpg', 'upload/content/2015/07/23/75511437623467.jpg', 'jpg', 1, 13941, 1437623467, 1, 1, 0),
(44, 'pc_710x355_1', '5551437623499', '5551437623499.jpg', 'upload/content/2015/07/23/5551437623499.jpg', 'jpg', 1, 13941, 1437623499, 1, 1, 0),
(45, 'pic_600x822_1', '23461437623528', '23461437623528.png', 'upload/content/2015/07/23/23461437623528.png', 'png', 1, 304164, 1437623528, 1, 1, 0),
(46, 'pc_710x355_1', '95571437623582', '95571437623582.jpg', 'upload/content/2015/07/23/95571437623582.jpg', 'jpg', 1, 13941, 1437623582, 1, 1, 0),
(47, 'pic_600x822_1', '7991437623582', '7991437623582.png', 'upload/content/2015/07/23/7991437623582.png', 'png', 1, 304164, 1437623582, 1, 1, 0),
(48, 'pc_710x355_1', '58071437623823', '58071437623823.jpg', 'upload/content/2015/07/23/58071437623823.jpg', 'jpg', 1, 13941, 1437623823, 1, 1, 0),
(49, 'pic_600x822_1', '8601437623823', '8601437623823.png', 'upload/content/2015/07/23/8601437623823.png', 'png', 1, 304164, 1437623824, 1, 1, 0),
(50, 'pc_710x355_1', '83321437624098', '83321437624098.jpg', 'upload/content/2015/07/23/83321437624098.jpg', 'jpg', 1, 13941, 1437624098, 1, 1, 0),
(51, 'pic_600x822_1', '77281437624098', '77281437624098.png', 'upload/content/2015/07/23/77281437624098.png', 'png', 1, 304164, 1437624098, 1, 1, 0),
(52, 'pc_710x355_1', '36091437624132', '36091437624132.jpg', 'upload/content/2015/07/23/36091437624132.jpg', 'jpg', 1, 13941, 1437624132, 1, 1, 0),
(53, 'pic_600x822_1', '96521437624132', '96521437624132.png', 'upload/content/2015/07/23/96521437624132.png', 'png', 1, 304164, 1437624132, 1, 1, 0),
(54, 'pc_710x355_1', '71411437624258', '71411437624258.jpg', 'upload/content/2015/07/23/71411437624258.jpg', 'jpg', 1, 13941, 1437624258, 1, 1, 0),
(55, 'pic_600x822_1', '26161437624258', '26161437624258.png', 'upload/content/2015/07/23/26161437624258.png', 'png', 1, 304164, 1437624258, 1, 1, 0),
(56, 'pc_710x355_1', '76671437624300', '76671437624300.jpg', 'upload/content/2015/07/23/76671437624300.jpg', 'jpg', 1, 13941, 1437624300, 1, 1, 0),
(57, 'pic_600x822_1', '69011437624300', '69011437624300.png', 'upload/content/2015/07/23/69011437624300.png', 'png', 1, 304164, 1437624300, 1, 1, 0),
(58, 'pc_710x355_1', '56831437624470', '56831437624470.jpg', 'upload/content/2015/07/23/56831437624470.jpg', 'jpg', 1, 13941, 1437624470, 1, 1, 0),
(59, 'pic_600x822_1', '43581437624470', '43581437624470.png', 'upload/content/2015/07/23/43581437624470.png', 'png', 1, 304164, 1437624470, 1, 1, 0),
(60, 'pc_710x355_1', '86361437624494', '86361437624494.jpg', 'upload/content/2015/07/23/86361437624494.jpg', 'jpg', 1, 13941, 1437624494, 1, 1, 0),
(61, 'pic_600x822_1', '41271437624494', '41271437624494.png', 'upload/content/2015/07/23/41271437624494.png', 'png', 1, 304164, 1437624494, 1, 1, 0),
(62, 'pc_710x355_1', '13411437625356', '13411437625356.jpg', 'upload/content/2015/07/23/13411437625356.jpg', 'jpg', 1, 13941, 1437625356, 1, 1, 0),
(63, 'pic_600x822_1', '64901437625356', '64901437625356.png', 'upload/content/2015/07/23/64901437625356.png', 'png', 1, 304164, 1437625356, 1, 1, 0),
(64, 'pic_600x822_1', '13281437625452', '13281437625452.png', 'upload/content/2015/07/23/13281437625452.png', 'png', 1, 304164, 1437625452, 1, 1, 0),
(65, 'pic_600x822_1', '32451437625462', '32451437625462.png', 'upload/content/2015/07/23/32451437625462.png', 'png', 1, 304164, 1437625462, 1, 1, 0),
(66, 'pc_710x355_1', '1751437625768', '1751437625768.jpg', 'upload/content/2015/07/23/1751437625768.jpg', 'jpg', 1, 13941, 1437625768, 1, 1, 0),
(67, 'pic_600x822_1', '25061437625768', '25061437625768.png', 'upload/content/2015/07/23/25061437625768.png', 'png', 1, 304164, 1437625768, 1, 1, 0),
(68, 'pc_710x355_1', '37721437625788', '37721437625788.jpg', 'upload/content/2015/07/23/37721437625788.jpg', 'jpg', 1, 13941, 1437625788, 1, 1, 0),
(69, 'pic_600x822_1', '14841437625788', '14841437625788.png', 'upload/content/2015/07/23/14841437625788.png', 'png', 1, 304164, 1437625788, 1, 1, 0),
(70, 'pc_710x355_1', '15301437625812', '15301437625812.jpg', 'upload/content/2015/07/23/15301437625812.jpg', 'jpg', 1, 13941, 1437625812, 1, 1, 0),
(71, 'pic_600x822_1', '98151437625812', '98151437625812.png', 'upload/content/2015/07/23/98151437625812.png', 'png', 1, 304164, 1437625812, 1, 1, 0),
(72, 'pc_710x355_1', '81401437625853', '81401437625853.jpg', 'upload/content/2015/07/23/81401437625853.jpg', 'jpg', 1, 13941, 1437625853, 1, 1, 0),
(73, 'pic_600x822_1', '30671437625853', '30671437625853.png', 'upload/content/2015/07/23/30671437625853.png', 'png', 1, 304164, 1437625854, 1, 1, 0),
(74, 'pc_710x355_1', '73561437625901', '73561437625901.jpg', 'upload/content/2015/07/23/73561437625901.jpg', 'jpg', 1, 13941, 1437625901, 1, 1, 0),
(75, 'pic_600x822_1', '16471437625901', '16471437625901.png', 'upload/content/2015/07/23/16471437625901.png', 'png', 1, 304164, 1437625902, 1, 1, 0),
(76, 'pc_710x355_1', '47851437625922', '47851437625922.jpg', 'upload/content/2015/07/23/47851437625922.jpg', 'jpg', 1, 13941, 1437625922, 1, 1, 0),
(77, 'pic_600x822_1', '77601437625922', '77601437625922.png', 'upload/content/2015/07/23/77601437625922.png', 'png', 1, 304164, 1437625922, 1, 1, 0),
(78, 'pc_710x355_1', '33641437625959', '33641437625959.jpg', 'upload/content/2015/07/23/33641437625959.jpg', 'jpg', 1, 13941, 1437625959, 1, 1, 0),
(79, 'pic_600x822_1', '22691437625959', '22691437625959.png', 'upload/content/2015/07/23/22691437625959.png', 'png', 1, 304164, 1437625960, 1, 1, 0),
(80, 'Chrysanthemum', '72871442222685', '72871442222685.jpg', 'upload/content/2015/09/14/72871442222685.jpg', 'jpg', 1, 879394, 1442222686, 1, 1, 0),
(81, 'Jellyfish', '26031442222686', '26031442222686.jpg', 'upload/content/2015/09/14/26031442222686.jpg', 'jpg', 1, 775702, 1442222686, 1, 1, 0),
(82, 'bg', '86701442398570', '86701442398570.jpg', 'upload/content/2015/09/16/86701442398570.jpg', 'jpg', 1, 879394, 1442398571, 1, 1, 0),
(83, 'Desert', '84831442399125', '84831442399125.jpg', 'upload/content/2015/09/16/84831442399125.jpg', 'jpg', 1, 845941, 1442399125, 1, 1, 0),
(84, 'Hydrangeas', '14531442399261', '14531442399261.jpg', 'upload/content/2015/09/16/14531442399261.jpg', 'jpg', 1, 595284, 1442399261, 1, 1, 0),
(85, 'Koala', '7591442399289', '7591442399289.jpg', 'upload/content/2015/09/16/7591442399289.jpg', 'jpg', 1, 780831, 1442399289, 1, 1, 0),
(86, 'Hydrangeas', '18761442399828', '18761442399828.jpg', 'upload/content/2015/09/16/18761442399828.jpg', 'jpg', 1, 595284, 1442399828, 1, 1, 0),
(87, 'Koala', '65951442464683', '65951442464683.jpg', 'upload/content/2015/09/17/65951442464683.jpg', 'jpg', 1, 780831, 1442464683, 1, 1, 0),
(88, 'Tulips', '99931442464703', '99931442464703.jpg', 'upload/content/2015/09/17/99931442464703.jpg', 'jpg', 1, 620888, 1442464704, 1, 1, 0),
(89, 'Lighthouse', '9341442464737', '9341442464737.jpg', 'upload/content/2015/09/17/9341442464737.jpg', 'jpg', 1, 561276, 1442464737, 1, 1, 0),
(90, 'Hydrangeas', '18021442464750', '18021442464750.jpg', 'upload/content/2015/09/17/18021442464750.jpg', 'jpg', 1, 595284, 1442464750, 1, 1, 0),
(91, 'Jellyfish', '87021442464771', '87021442464771.jpg', 'upload/content/2015/09/17/87021442464771.jpg', 'jpg', 1, 775702, 1442464771, 1, 1, 0),
(92, 'Chrysanthemum', '94911442464784', '94911442464784.jpg', 'upload/content/2015/09/17/94911442464784.jpg', 'jpg', 1, 879394, 1442464784, 1, 1, 0),
(93, 'pic (2)', '7291442818893', '7291442818893.jpg', 'upload/content/2015/09/21/7291442818893.jpg', 'jpg', 1, 39715, 1442818893, 1, 1, 0),
(94, 'pic (3)', '9781442818903', '9781442818903.jpg', 'upload/content/2015/09/21/9781442818903.jpg', 'jpg', 1, 42039, 1442818903, 1, 1, 0),
(95, 'pic (4)', '40831442818912', '40831442818912.jpg', 'upload/content/2015/09/21/40831442818912.jpg', 'jpg', 1, 40021, 1442818912, 1, 1, 0),
(96, 'pic (5)', '65931442818932', '65931442818932.jpg', 'upload/content/2015/09/21/65931442818932.jpg', 'jpg', 1, 39292, 1442818932, 1, 1, 0),
(97, 'pic (6)', '54701442818943', '54701442818943.jpg', 'upload/content/2015/09/21/54701442818943.jpg', 'jpg', 1, 35977, 1442818943, 1, 1, 0),
(98, 'pic (7)', '48911442819102', '48911442819102.jpg', 'upload/content/2015/09/21/48911442819102.jpg', 'jpg', 1, 39163, 1442819102, 1, 1, 0),
(99, 'pic (8)', '12191442819110', '12191442819110.jpg', 'upload/content/2015/09/21/12191442819110.jpg', 'jpg', 1, 43251, 1442819110, 1, 1, 0),
(100, 'pic (9)', '28811442819132', '28811442819132.jpg', 'upload/content/2015/09/21/28811442819132.jpg', 'jpg', 1, 42101, 1442819132, 1, 1, 0),
(101, 'pic (10)', '40651442819140', '40651442819140.jpg', 'upload/content/2015/09/21/40651442819140.jpg', 'jpg', 1, 42453, 1442819140, 1, 1, 0),
(102, 'pic', '22301442819155', '22301442819155.jpg', 'upload/content/2015/09/21/22301442819155.jpg', 'jpg', 1, 39282, 1442819155, 1, 1, 0),
(103, 'pic (2)', '69311442819164', '69311442819164.jpg', 'upload/content/2015/09/21/69311442819164.jpg', 'jpg', 1, 39715, 1442819164, 1, 1, 0),
(104, '240x200 (2)', '53931442827933', '53931442827933.jpg', 'upload/content/2015/09/21/53931442827933.jpg', 'jpg', 1, 5348, 1442827933, 1, 1, 0),
(105, '240x200 (3)', '39961442827954', '39961442827954.jpg', 'upload/content/2015/09/21/39961442827954.jpg', 'jpg', 1, 5663, 1442827954, 1, 1, 0),
(106, '240x200 (4)', '97391442827982', '97391442827982.jpg', 'upload/content/2015/09/21/97391442827982.jpg', 'jpg', 1, 5069, 1442827982, 1, 1, 0),
(107, '240x200 (5)', '79851442828002', '79851442828002.jpg', 'upload/content/2015/09/21/79851442828002.jpg', 'jpg', 1, 4749, 1442828002, 1, 1, 0),
(108, '240x200 (6)', '7531442828023', '7531442828023.jpg', 'upload/content/2015/09/21/7531442828023.jpg', 'jpg', 1, 5032, 1442828023, 1, 1, 0),
(109, '240x200 (9)', '7681442828043', '7681442828043.jpg', 'upload/content/2015/09/21/7681442828043.jpg', 'jpg', 1, 5492, 1442828043, 1, 1, 0),
(110, '240x80_1', '85061442828737', '85061442828737.jpg', 'upload/content/2015/09/21/85061442828737.jpg', 'jpg', 1, 4059, 1442828737, 1, 1, 0),
(111, '240x80_2', '44881442828750', '44881442828750.jpg', 'upload/content/2015/09/21/44881442828750.jpg', 'jpg', 1, 4477, 1442828750, 1, 1, 0),
(112, '240x80_3', '67081442828765', '67081442828765.jpg', 'upload/content/2015/09/21/67081442828765.jpg', 'jpg', 1, 4166, 1442828765, 1, 1, 0),
(113, '240x80_4', '21081442828790', '21081442828790.jpg', 'upload/content/2015/09/21/21081442828790.jpg', 'jpg', 1, 4046, 1442828790, 1, 1, 0),
(114, '240x80_5', '2881442828804', '2881442828804.jpg', 'upload/content/2015/09/21/2881442828804.jpg', 'jpg', 1, 4061, 1442828804, 1, 1, 0),
(115, '240x80_6', '50161442828817', '50161442828817.jpg', 'upload/content/2015/09/21/50161442828817.jpg', 'jpg', 1, 4209, 1442828817, 1, 1, 0),
(116, '240x80_10', '63101442828830', '63101442828830.jpg', 'upload/content/2015/09/21/63101442828830.jpg', 'jpg', 1, 4658, 1442828830, 1, 1, 0),
(117, '240x80_2', '89971442829397', '89971442829397.jpg', 'upload/content/2015/09/21/89971442829397.jpg', 'jpg', 1, 4477, 1442829397, 1, 1, 0),
(118, '240x80_8', '64331442829416', '64331442829416.jpg', 'upload/content/2015/09/21/64331442829416.jpg', 'jpg', 1, 4811, 1442829416, 1, 1, 0),
(119, '240x80_6', '40991442829430', '40991442829430.jpg', 'upload/content/2015/09/21/40991442829430.jpg', 'jpg', 1, 4209, 1442829430, 1, 1, 0),
(120, '240x80_4', '5451442829443', '5451442829443.jpg', 'upload/content/2015/09/21/5451442829443.jpg', 'jpg', 1, 4046, 1442829443, 1, 1, 0),
(121, '240x80_7', '63611442829455', '63611442829455.jpg', 'upload/content/2015/09/21/63611442829455.jpg', 'jpg', 1, 4463, 1442829455, 1, 1, 0),
(122, '240x80_10', '39101442829466', '39101442829466.jpg', 'upload/content/2015/09/21/39101442829466.jpg', 'jpg', 1, 4658, 1442829466, 1, 1, 0),
(123, '240x80_4', '81501442829479', '81501442829479.jpg', 'upload/content/2015/09/21/81501442829479.jpg', 'jpg', 1, 4046, 1442829479, 1, 1, 0),
(124, 'Chrysanthemum', '35401445411646', '35401445411646.jpg', 'upload/content/2015/10/21/35401445411646.jpg', 'jpg', 1, 879394, 1445411647, 1, 1, 0),
(125, 'Koala', '47841445412859', '47841445412859.jpg', 'upload/content/2015/10/21/47841445412859.jpg', 'jpg', 1, 780831, 1445412859, 1, 1, 0),
(126, 'Koala', '41261445412946', '41261445412946.jpg', 'upload/content/2015/10/21/41261445412946.jpg', 'jpg', 1, 780831, 1445412946, 1, 1, 0),
(127, 'Koala', '8651445498969', '8651445498969.jpg', 'upload/content/2015/10/22/8651445498969.jpg', 'jpg', 1, 780831, 1445498970, 1, 1, 0),
(128, 'Jellyfish', '40491445498981', '40491445498981.jpg', 'upload/content/2015/10/22/40491445498981.jpg', 'jpg', 1, 775702, 1445498981, 1, 1, 0),
(129, 'Desert', '41711445498992', '41711445498992.jpg', 'upload/content/2015/10/22/41711445498992.jpg', 'jpg', 1, 845941, 1445498992, 1, 1, 0),
(130, 'Hydrangeas', '23311445499013', '23311445499013.jpg', 'upload/content/2015/10/22/23311445499013.jpg', 'jpg', 1, 595284, 1445499013, 1, 1, 0),
(131, 'Tulips', '61231445499023', '61231445499023.jpg', 'upload/content/2015/10/22/61231445499023.jpg', 'jpg', 1, 620888, 1445499024, 1, 1, 0),
(132, 'Hydrangeas', '10671445500369', '10671445500369.jpg', 'upload/content/2015/10/22/10671445500369.jpg', 'jpg', 1, 595284, 1445500369, 1, 1, 0),
(133, 'Jellyfish', '92421445500369', '92421445500369.jpg', 'upload/content/2015/10/22/92421445500369.jpg', 'jpg', 1, 775702, 1445500370, 1, 1, 0),
(134, 'Koala', '85471445500370', '85471445500370.jpg', 'upload/content/2015/10/22/85471445500370.jpg', 'jpg', 1, 780831, 1445500370, 1, 1, 0),
(135, '_2016-08-03T10-40-34.497Z', '33351470220877', '33351470220877.png', 'upload/content/2016/08/03/33351470220877.png', 'png', 1, 45146, 1470220877, 1, 1, 0),
(136, '11', '83371470220989', '83371470220989.png', 'upload/content/2016/08/03/83371470220989.png', 'png', 1, 21177, 1470220989, 1, 1, 0),
(137, '11', '85361470279066', '85361470279066.png', 'upload/content/2016/08/04/85361470279066.png', 'png', 1, 21177, 1470279066, 1, 1, 0),
(138, '_2016-08-03T10-40-34.497Z', '93321470279137', '93321470279137.png', 'upload/content/2016/08/04/93321470279137.png', 'png', 1, 45146, 1470279137, 1, 1, 0),
(139, '', '61051470817598', '61051470817598.png', 'upload/content/2016/08/10/61051470817598.png', 'png', 1, 21177, 1470817598, 1, 1, 0),
(140, '2', '67201471505251', '67201471505251.jpg', 'upload/content/2016/08/18/67201471505251.jpg', 'jpg', 1, 100010, 1471505251, 1, 35, 0),
(141, '2', '68791471505358', '68791471505358.jpg', 'upload/content/2016/08/18/68791471505358.jpg', 'jpg', 1, 100010, 1471505358, 1, 35, 0),
(142, '2', '46991471507501', '46991471507501.jpg', 'upload/content/2016/08/18/46991471507501.jpg', 'jpg', 1, 100010, 1471507501, 1, 36, 0),
(143, 'getqrcode', '10091471507553', '10091471507553.jpg', 'upload/content/2016/08/18/10091471507553.jpg', 'jpg', 1, 40143, 1471507553, 1, 36, 0),
(144, 'anessa.sql', '86011474451033', '86011474451033.zip', 'upload/content/2016/09/21/86011474451033.zip', 'zip', 0, 167859, 1474451033, 0, 1, 0),
(146, '1', '74471474454638', '74471474454638.rar', 'upload/content/2016/09/21/74471474454638.rar', 'rar', 0, 351034, 1474454638, 0, 1, 0),
(147, '2', '83451474454639', '83451474454639.zip', 'upload/content/2016/09/21/83451474454639.zip', 'zip', 0, 1945453, 1474454639, 0, 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_user`
--

CREATE TABLE IF NOT EXISTS `zh_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` char(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `code` char(30) NOT NULL DEFAULT '' COMMENT '密码key',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `validatecode` char(50) NOT NULL DEFAULT '' COMMENT '邮箱验证key',
  `regtime` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `regip` char(255) NOT NULL DEFAULT '' COMMENT '注册IP',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `user_state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1  正常  0 锁定',
  `lock_end_time` int(10) NOT NULL DEFAULT '0' COMMENT '锁定到期时间',
  `qq` char(20) NOT NULL DEFAULT '' COMMENT 'qq号码',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 男 2 女 3 保密',
  `favicon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `credits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `rid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `allow_user_set_credits` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '允许前台会员设置投稿积分',
  `signature` varchar(255) NOT NULL DEFAULT '' COMMENT '个性签名',
  `domain` char(20) NOT NULL DEFAULT '' COMMENT '个性域名',
  `spec_num` mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '空间访问数',
  `icon` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `language` char(20) NOT NULL DEFAULT '''''' COMMENT '选择语言',
  `suppliers_id` smallint(5) unsigned DEFAULT '0',
  `agency_id` smallint(5) unsigned NOT NULL COMMENT '该管理员负责的办事处的id，同zh_agency的agency_id字段。如果管理员没负责办事处，则此处为0',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户现有资金',
  `pay_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '消费积分',
  `user_rank` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '会员登记id，取值zh_user_rank',
  `rank_points` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员等级积分',
  `action_list` text NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `domain` (`domain`),
  KEY `password` (`password`),
  KEY `credits` (`credits`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=38 ;

--
-- テーブルのデータのダンプ `zh_user`
--

INSERT INTO `zh_user` (`uid`, `nickname`, `username`, `password`, `code`, `email`, `validatecode`, `regtime`, `logintime`, `regip`, `lastip`, `user_state`, `lock_end_time`, `qq`, `sex`, `favicon`, `credits`, `rid`, `allow_user_set_credits`, `signature`, `domain`, `spec_num`, `icon`, `language`, `suppliers_id`, `agency_id`, `user_money`, `pay_points`, `user_rank`, `rank_points`, `action_list`) VALUES
(1, 'test', 'test', '8f6b4a6f71a604a8e6309aa45ea0affe', '392b529bed', '136871204@qq.com', '', 1432112415, 1482915932, '127.0.0.1', '127.0.0.1', 1, 0, '', 1, '', 1, 1, 1, '', 'test', 2, '', 'ja', 0, 0, '0.00', 0, 0, 0, 'delivery_view,back_view'),
(37, 'test2', 'test2', 'f7df80c8c46ab5a45da5bd04dd5eedd1', '8c9ace456d', 'test2@qq.com', 'dff17bab', 1471942707, 1471947415, '127.0.0.1', '127.0.0.1', 1, 0, '', 1, '', 100, 4, 1, '', 'zhcms37', 0, '', '''''', 0, 0, '0.00', 0, 0, 0, ''),
(35, 'metaphase', 'metaphase', '1fef2fde8547425c1e36f340f5a85097', '6e3a5d05e4', 'metaphase@qq.com', '', 1470215063, 1472204368, '127.0.0.1', '127.0.0.1', 1, 0, '', 1, '', 100, 27, 1, '', 'zhcms35', 1, '', 'ja', 0, 0, '0.00', 0, 0, 0, ''),
(36, 'test1', 'test1', '71f08f88555b1b11a8b7e15da5e57d65', '2f76dd0d38', 'test1@qq.com', '9e541d9f', 1470984773, 1471947403, '127.0.0.1', '127.0.0.1', 1, 0, '', 1, '', 100, 4, 1, 'test1のサインですが', 'test1', 1, '', '''''', 0, 0, '0.00', 0, 0, 0, ''),
(34, 'zhouhong', 'zhouhong', 'bc8b4e99f7441e004e86632e33bcf8ec', '3c375c97c8', 'hong@metaphase.asia', '', 1470214440, 1470214996, '127.0.0.1', '127.0.0.1', 1, 0, '', 1, '', 100, 27, 1, '', 'zhcms34', 1, '', 'ja', 0, 0, '0.00', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_user_deny_ip`
--

CREATE TABLE IF NOT EXISTS `zh_user_deny_ip` (
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '拒绝访问ip',
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='拒绝访问ip';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_user_dynamic`
--

CREATE TABLE IF NOT EXISTS `zh_user_dynamic` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户uid',
  `content` text NOT NULL COMMENT '内容',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='会员动态' AUTO_INCREMENT=204 ;

--
-- テーブルのデータのダンプ `zh_user_dynamic`
--

INSERT INTO `zh_user_dynamic` (`did`, `uid`, `content`, `addtime`) VALUES
(1, 1, '发表了文章：<a target=''_blank'' href=''http://192.168.1.105:8092/mycms/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=19''>测试1</a>', 1433749772),
(2, 1, '发表了文章：<a target=''_blank'' href=''http://192.168.1.105:8092/mycms/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=20''>测试2</a>', 1433750089),
(3, 1, '发表了文章：<a target=''_blank'' href=''http://localhost:8092/mycms/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=21''>测试3</a>', 1436348433),
(4, 1, '发表了文章：<a target=''_blank'' href=''http://localhost:8092/mycms/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=22''>测试4</a>', 1436843283),
(5, 1, '发表了文章：<a target=''_blank'' href=''http://localhost:8092/mycms/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=23''>测试5</a>', 1436843289),
(6, 1, '发表了文章：<a target=''_blank'' href=''http://localhost:8092/mycms/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=24''>banner1</a>', 1437447731),
(7, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=25''>111</a>', 1442395375),
(8, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=19''>banner1</a>', 1442398097),
(9, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=20''>主站banner2</a>', 1442399128),
(10, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=21''>上海站点banner1</a>', 1442399263),
(11, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=22''>上海站点banner2</a>', 1442399291),
(12, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=23''>主站banner3</a>', 1442399832),
(13, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=24''>北京首页banner1</a>', 1442464686),
(14, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=25''>北京首页banner2</a>', 1442464706),
(15, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=26''>苏州首页banner1</a>', 1442464739),
(16, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=27''>苏州首页banner2</a>', 1442464752),
(17, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=28''>其他站点banner1</a>', 1442464773),
(18, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=8&cid=6&aid=29''>其他站点banner2</a>', 1442464786),
(19, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=9&cid=7&aid=19''>全国banner1</a>', 1442827936),
(20, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=9&cid=7&aid=20''>全国站banner2</a>', 1442827956),
(21, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=9&cid=7&aid=21''>上海站banner1</a>', 1442827984),
(22, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=9&cid=7&aid=22''>北京站banner1</a>', 1442828004),
(23, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=9&cid=7&aid=23''>苏州站banner1</a>', 1442828028),
(24, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=9&cid=7&aid=24''>其他站banner1</a>', 1442828046),
(25, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=19''>全国站banner1</a>', 1442828740),
(26, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=20''>全国站banner2</a>', 1442828754),
(27, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=21''>全国站banner3</a>', 1442828771),
(28, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=22''>上海站banner1</a>', 1442828792),
(29, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=23''>北京站banner1</a>', 1442828806),
(30, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=24''>苏州站banner1</a>', 1442828819),
(31, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=10&cid=8&aid=25''>其他站banner1</a>', 1442828831),
(32, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=19''>全国banner1</a>', 1442829401),
(33, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=20''>全国站banner2</a>', 1442829419),
(34, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=21''>全国站banner3</a>', 1442829432),
(35, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=22''>上海站banner1</a>', 1442829445),
(36, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=23''>北京站banner1</a>', 1442829457),
(37, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=24''>苏州站banner1</a>', 1442829468),
(38, 1, '发表了文章：<a target=''_blank'' href=''http://admin.his.com/index.php?a=Index&c=Index&m=content&mid=11&cid=9&aid=25''>其他站banner1</a>', 1442829482),
(39, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=12&cid=12&aid=19''>jfashion</a>', 1445411649),
(40, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=12&cid=13&aid=20''>上海修曼人才网站</a>', 1445412865),
(41, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=12&cid=11&aid=21''>スルガ精機中国</a>', 1445412951),
(42, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=13&cid=16&aid=19''>周鸿</a>', 1445498972),
(43, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=13&cid=16&aid=20''>谢聪</a>', 1445498983),
(44, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=13&cid=16&aid=21''>毕超</a>', 1445498994),
(45, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=13&cid=16&aid=22''>姚晨</a>', 1445499015),
(46, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=13&cid=16&aid=23''>姚笛</a>', 1445499026),
(47, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=26''>网页设计师  （针对社会化媒体方面）（2名）</a>', 1451291622),
(48, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=27''>网页设计师  （针对社会化媒体方面）（2名）</a>', 1451291642),
(49, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=28''>网页设计师  （针对社会化媒体方面）（2名）</a>', 1451292890),
(50, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=29''>网页设计师  （针对社会化媒体方面）（2名）</a>', 1451292908),
(51, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=30''>高级网页设计师（1名）</a>', 1451292908),
(52, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=31''>网页设计师（2名）</a>', 1451292908),
(53, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=32''>视觉设计师（3名）</a>', 1451292908),
(54, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=33''>动画师（1名）</a>', 1451292908),
(55, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=34''>商品编辑经理（2名）</a>', 1451292908),
(56, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=35''>资深设计师（3名）</a>', 1451292908),
(57, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=36''>创意文案（1名）</a>', 1451292908),
(58, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=37''>工业设计师（1名）</a>', 1451292908),
(59, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=38''>工业设计师（1名）</a>', 1451292908),
(60, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=39''>网页设计师（1名）</a>', 1451292908),
(61, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=40''>H5移动端研发工程师（2名）</a>', 1451292908),
(62, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=41''>商业产品经理（2名）</a>', 1451292908),
(63, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=42''>web前端开发（2名）</a>', 1451292908),
(64, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=43''>网页视觉设计师-过期（1名）</a>', 1451292909),
(65, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=44''>平面设计师（2名）</a>', 1451292909),
(66, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=45''>网络运营专员（2名）</a>', 1451292909),
(67, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=46''>WEB网页前端设计师（3名）</a>', 1451292909),
(68, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=47''>美工（1名）</a>', 1451292909),
(69, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=48''>项目经理（3名）</a>', 1451292909),
(70, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=49''>资深产品设计-21cake（1名）</a>', 1451292909),
(71, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=50''>电商设计师（1名）</a>', 1451292909),
(72, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=51''>客户服务/AE（2名）</a>', 1451292909),
(73, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=52''>资深网页/视觉设计师（1名）</a>', 1451292909),
(74, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=53''>设计作品评审（2名）</a>', 1451292909),
(75, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=54''>网页设计师WEB设计师（1名）</a>', 1451292909),
(76, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=55''>网站重构工程师&amp;nbsp;&amp;nbsp;（1名）</a>', 1451292909),
(77, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=56''>网页设计师（1名）</a>', 1451292909),
(78, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=57''>京东网页设计（北京）（1名）</a>', 1451292909),
(79, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=58''>高级视觉设计师（1名）</a>', 1451292909),
(80, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=59''>天猫美工/网页设计（1名）</a>', 1451292909),
(81, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=60''>美工设计（2名）</a>', 1451292909),
(82, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=61''>&amp;nbsp;资深网页设计师（工作地点：徐家汇）（3名）</a>', 1451292909),
(83, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=62''>网页设计师-天猫淘宝电商（1名）</a>', 1451292909),
(84, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=63''>广告设计师（2名）</a>', 1451292909),
(85, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=64''>网页设计师（H5方向）（2名）</a>', 1451292909),
(86, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=65''>网页设计师（4名）</a>', 1451292909),
(87, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=66''>美工/网页设计（2名）</a>', 1451292909),
(88, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=67''>视觉设计师（2名）</a>', 1451292909),
(89, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=68''>包装设计师（2名）</a>', 1451292909),
(90, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=69''>WEB前端工程师（1名）</a>', 1451292909),
(91, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=70''>网页设计师（8名）</a>', 1451292910),
(92, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=71''>牛掰的网页设计师（2名）</a>', 1451292910),
(93, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=72''>Web前端开发（可接受实习生）(DIV + CSS)（2名）</a>', 1451292910),
(94, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=73''>网页视觉设计师（10名）</a>', 1451292910),
(95, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=74''>WEB前端工程师--H5（2名）</a>', 1451292910),
(96, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=75''>美术指导（1名）</a>', 1451292910),
(97, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=76''>广告设计（素材制作）（1名）</a>', 1451292910),
(98, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=77''>资深网页设计师（3名）</a>', 1451292910),
(99, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=78''>网页设计师（2名）</a>', 1451292910),
(100, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=79''>网页设计师（3名）</a>', 1451292910),
(101, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=80''>网页兼平面设计师（3名）</a>', 1451292910),
(102, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=81''>网页设计师（小仙肉）（5名）</a>', 1451292910),
(103, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=82''>网站设计师&amp;UI设计师（5名）</a>', 1451292910),
(104, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=83''>平面设计（1名）</a>', 1451292910),
(105, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=84''>网页设计师（3名）</a>', 1451292910),
(106, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=85''>资深包装设计师（5名）</a>', 1451292910),
(107, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=86''>设计总监（1名）</a>', 1451292910),
(108, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=87''>unity3d游戏主美（1名）</a>', 1451292910),
(109, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=88''>策划（3名）</a>', 1451292910),
(110, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=89''>电商设计师（1名）</a>', 1451292910),
(111, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=90''>网页设计经理（3名）</a>', 1451292910),
(112, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=91''>web前端工程师（10名）</a>', 1451292910),
(113, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=92''>资深视觉设计师（1名）</a>', 1451292910),
(114, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=93''>视觉设计师（2名）</a>', 1451292910),
(115, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=94''>用户界面设计师（专业知识分享讨论社区平台）（2名）</a>', 1451292910),
(116, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=95''>创意周边设计策划（1名）</a>', 1451292910),
(117, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=96''>资深/网页设计师（1名）</a>', 1451292910),
(118, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=97''>网页设计师（2名）</a>', 1451292910),
(119, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=98''>WEB设计师（广州、珠海）（10名）</a>', 1451292910),
(120, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=99''>网页设计师（2名）</a>', 1451292910),
(121, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=100''>视觉设计师（2名）</a>', 1451292910),
(122, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=101''>GUI设计师（1名）</a>', 1451292910),
(123, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=102''>网页设计师（2名）</a>', 1451292910),
(124, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=103''>高级视觉设计师（4名）</a>', 1451292910),
(125, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=104''>资深网站视觉设计师（1名）</a>', 1451292910),
(126, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=105''>网页设计师（2名）</a>', 1451292911),
(127, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=106''>平面设计师（2名）</a>', 1451292911),
(128, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=107''>内容编辑（2名）</a>', 1451292911),
(129, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=108''>家具表现设计师（2名）</a>', 1451292911),
(130, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=109''>WEB设计师（2名）</a>', 1451292911),
(131, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=110''>高级用户体验研究设计师（2名）</a>', 1451292911),
(132, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=111''>网页重构工程师（3名）</a>', 1451292911),
(133, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=112''>有能耐的网页设计师（3名）</a>', 1451292911),
(134, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=113''>WEB前端工程师--H5（2名）</a>', 1451292911),
(135, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=114''>前端开发工程师（2名）</a>', 1451292911),
(136, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=115''>页游-高级视觉设计师（1名）</a>', 1451292911),
(137, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=116''>资深网页设计师（3名）</a>', 1451292911),
(138, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=117''>网页设计/美工（1名）</a>', 1451292911),
(139, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=118''>资深时尚网页设计（3名）</a>', 1451292911),
(140, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=119''>视觉推广设计师（2名）</a>', 1451292911),
(141, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=120''>主设计师/设计主管（2名）</a>', 1451292911),
(142, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=121''>电商设计师（2名）</a>', 1451292911),
(143, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=122''>资深网页视觉设计师（1名）</a>', 1451292911),
(144, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=123''>资深网页设计师 （1名）</a>', 1451292911),
(145, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=124''>网页设计师（工作地点：徐家汇）（1名）</a>', 1451292911),
(146, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=125''>视觉创意指导（1名）</a>', 1451292911),
(147, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=126''>网页设计师（2名）</a>', 1451292911),
(148, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=127''>包装设计师（1名）</a>', 1451292911),
(149, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=128''>网页设计师（上海）（1名）</a>', 1451292911),
(150, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=129''>资深天猫美工（5名）</a>', 1451292911),
(151, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=130''>网页/APP视觉设计师（3名）</a>', 1451292911),
(152, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=131''>UE&amp;nbsp;Designer（1名）</a>', 1451292911),
(153, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=132''>设计作品评审实习生（2名）</a>', 1451292911),
(154, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=133''>互动设计师（2名）</a>', 1451292912),
(155, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=134''>资深互动广告文案（2名）</a>', 1451292912),
(156, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=135''>平面创意设计师（实体品牌店）（1名）</a>', 1451292912),
(157, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=136''>网页设计师（5名）</a>', 1451292912),
(158, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=137''>网页设计师（2名）</a>', 1451292912),
(159, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=138''>网页设计师（3名）</a>', 1451292912),
(160, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=139''>网页兼平面设计师（1名）</a>', 1451292912),
(161, 1, '发表了文章：<a target=''_blank'' href=''http://www.works.com/index.php?a=Index&c=Index&m=content&mid=7&cid=4&aid=140''>UI设计师（1名）</a>', 1451292912),
(162, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=17&aid=1''>METACMSデーもシステム公開しました！！！</a>', 1470220217),
(163, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=17&aid=2''>METACMSにはEC機能を追加</a>', 1470220936),
(164, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=3''>METACMSデーもシステム公開しました！！！</a>', 1470279071),
(165, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=4''>METACMSにはEC機能を追加</a>', 1470279140),
(166, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=18&cid=&aid=19''>テストニュース</a>', 1470630300),
(167, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=18&cid=&aid=20''>テストニュース</a>', 1470630302),
(168, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=18&cid=&aid=21''>テストニュース</a>', 1470630311),
(169, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=19&cid=27&aid=19''>テストニュース</a>', 1470630539),
(170, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=23&aid=5''>管理画面ログイン方法</a>', 1470817617),
(171, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=6''>これは初めての文章です</a>', 1471505266),
(172, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=7''>これは初めての文章です</a>', 1471505272),
(173, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=16''>これは初めての文章です</a>', 1471506097),
(174, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=17''>これは初めての文章です</a>', 1471506114),
(175, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=18''>これは初めての文章です</a>', 1471506126),
(176, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=19''>これは初めての文章です</a>', 1471506249),
(177, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=20''>これは初めての文章です</a>', 1471506295),
(178, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=21''>これは初めての文章です</a>', 1471506303),
(179, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=22''>これは初めての文章です</a>', 1471506308),
(180, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=23''>これは初めての文章です</a>', 1471506316),
(181, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=24''>これは初めての文章です</a>', 1471506367),
(182, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=25''>これは初めての文章です</a>', 1471506377),
(183, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=26''>これは初めての文章です</a>', 1471506385),
(184, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=27''>これは初めての文章です</a>', 1471506391),
(185, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=28''>これは初めての文章です</a>', 1471506398),
(186, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=29''>これは初めての文章です</a>', 1471506405),
(187, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=30''>これは初めての文章です</a>', 1471506414),
(188, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=31''>これは初めての文章です</a>', 1471506461),
(189, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=32''>これは初めての文章です</a>', 1471506467),
(190, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=33''>これは初めての文章です</a>', 1471506472),
(191, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=34''>これは初めての文章です</a>', 1471506478),
(192, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=35''>これは初めての文章です</a>', 1471506489),
(193, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=36''>これは初めての文章です</a>', 1471506495),
(194, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=37''>これは初めての文章です</a>', 1471506646),
(195, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=38''>これは初めての文章です</a>', 1471506703),
(196, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=39''>これは初めての文章です</a>', 1471507076),
(197, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=40''>これは初めての文章です</a>', 1471507174),
(198, 35, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=41''>これは初めての文章です</a>', 1471507250),
(199, 36, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=42''>文章発表問題</a>', 1471507524),
(200, 37, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=43''>私が新規登録しました</a>', 1471942729),
(201, 1, 'コメントを発表: <a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=43''>aaaaa</a>', 1471947387),
(202, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=24&aid=44''>システムタ問題がある？</a>', 1472024378),
(203, 1, '发表了文章：<a target=''_blank'' href=''http://www.metacms.com/index.php?a=Index&c=Index&m=content&mid=1&cid=23&aid=45''>操作マニュアル延期</a>', 1472024480);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_user_follow`
--

CREATE TABLE IF NOT EXISTS `zh_user_follow` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户uid',
  `fans_uid` int(11) unsigned DEFAULT NULL COMMENT '粉丝uid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员关注表';

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_user_guest`
--

CREATE TABLE IF NOT EXISTS `zh_user_guest` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guest_uid` int(11) unsigned NOT NULL COMMENT '访问id',
  `uid` int(11) unsigned NOT NULL COMMENT '被访问空间Uid',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='空间访客表' AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `zh_user_guest`
--

INSERT INTO `zh_user_guest` (`gid`, `guest_uid`, `uid`) VALUES
(1, 36, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_user_message`
--

CREATE TABLE IF NOT EXISTS `zh_user_message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(10) unsigned NOT NULL,
  `to_uid` int(10) unsigned NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `user_message_state` tinyint(1) NOT NULL COMMENT '是否查阅  1 已阅读  2 未读',
  `sendtime` int(10) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短消息' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_weblist`
--

CREATE TABLE IF NOT EXISTS `zh_weblist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `weburl` varchar(255) DEFAULT NULL COMMENT '网站地址',
  `webid` int(11) DEFAULT NULL,
  `webroot` varchar(255) DEFAULT NULL,
  `webprefix` varchar(255) DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT NULL COMMENT '是否主站',
  `name1` varchar(225) NOT NULL,
  `displayorder` int(11) NOT NULL DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='sline网站列表' AUTO_INCREMENT=11 ;

--
-- テーブルのデータのダンプ `zh_weblist`
--

INSERT INTO `zh_weblist` (`id`, `webname`, `weburl`, `webid`, `webroot`, `webprefix`, `is_main`, `name1`, `displayorder`) VALUES
(1, '中国', 'http://admin.his.com/', 0, 'china', 'www', 0, '', 9999),
(2, '上海支店', 'http://admin.his.com/shanghai', NULL, 'shanghai', 'shanghai', 1, '', 9999),
(3, '北京支店', 'http://admin.his.com/beijing', NULL, 'beijing', 'beijing', 1, '', 9999),
(6, '其他支店', 'http://admin.his.com/other', NULL, 'other', 'other', 1, '', 9999);

-- --------------------------------------------------------

--
-- テーブルの構造 `zh_zhanku`
--

CREATE TABLE IF NOT EXISTS `zh_zhanku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `comeform` varchar(255) NOT NULL DEFAULT '' COMMENT '来源',
  `time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `recruit_num` varchar(255) NOT NULL DEFAULT '' COMMENT '招聘人数',
  `company` varchar(255) NOT NULL DEFAULT '' COMMENT '公司',
  `salary` varchar(255) NOT NULL DEFAULT '' COMMENT '工资',
  `workin_place` varchar(255) NOT NULL DEFAULT '' COMMENT '工作城市',
  `experience` varchar(255) NOT NULL DEFAULT '' COMMENT '工作经验',
  `full_part_time` varchar(255) NOT NULL DEFAULT '' COMMENT '工作时间',
  `duty` text COMMENT '工作职责',
  `request` text COMMENT '工作要求',
  `department` varchar(255) NOT NULL DEFAULT '' COMMENT '部门',
  `work_address` varchar(255) NOT NULL DEFAULT '' COMMENT '工作地址',
  `company_img` varchar(255) NOT NULL DEFAULT '' COMMENT '公司图片',
  `company_simple_name` varchar(255) NOT NULL DEFAULT '' COMMENT '公司简称',
  `company_detail_name` varchar(255) NOT NULL DEFAULT '' COMMENT '公司全称',
  `company_home_page_url` varchar(255) NOT NULL DEFAULT '' COMMENT '公司网站链接',
  `industry_attr` varchar(255) NOT NULL DEFAULT '' COMMENT '公司行业',
  `company_home_page_name` varchar(255) NOT NULL DEFAULT '' COMMENT '公司网站名称',
  `enterprise_size` varchar(255) NOT NULL DEFAULT '' COMMENT '公司规模',
  `enterprise_nature` varchar(255) NOT NULL DEFAULT '' COMMENT '公司性质',
  `enterprise_tag` text COMMENT '公司tag',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='zhanku表' AUTO_INCREMENT=211 ;

--
-- テーブルのデータのダンプ `zh_zhanku`
--

INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(1, '商品编辑经理', '站酷招聘', 1453084882, '2名', '北京动乐网络科技有限公司', '15k-20k', '北京 ', '经验3-5年', '全职', '1、负责商城商品的分类、调整、内容编辑，制定品类运营规则、规划并执行；<br>2、负责建立商城商品编辑部门工作流程、任务量化方案、绩效考核方案；<br>3、负责类目消费信息的搜集与分析，相关商品的消费者心理研究；<br>4、负责所有频道、专场的每日内容更新、编辑工作，&nbsp;完成编辑部门的运营和维护', '1、具有本科及以上学历<br>2、具有三年及以上电商行业运营编辑管理工作经验，有母婴编辑管理经验者优先考虑；<br>3、有一定的数据分析能力和文字功底，掌握行业知识，了解行业动态；<br>4、具备出色的统筹能力、团队协作能力，扎实敬业', '电商运营部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0118/20160118104122867.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(2, '资深天猫美工', '站酷招聘', 1453084882, '5名', '一加三餐（上海）电子商务有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '岗位概述：<br>1、负责天猫的店铺页面（首页、二级页和宝贝页）的美工制作及上传；<br>2、负责制作天猫上的活动促销图片及广告Banner，并根据店铺活动实际情况及时更新；<br>3、根据店铺实际情况做好宝贝图片的页面位置排版工作；<br>4、收集竞争对手的店铺信息，做出有针对性的图片呈现变化；<br>5、完成领导交代的其他事宜。', '岗位要求：<br>1、大专以上学历，艺术设计相关专业；<br>2、有一年以上的美工工作经验,&nbsp;有淘宝店铺美工经验者优先；<br>3、能够熟练运用PS、DW等制图软件，了解淘宝代码的运用；<br>4、有极强的执行能力，做事认真仔细；<br>5、有较强的敬业精神和团队合作精神。', '创意部', '徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层', '2016/0118/20160118104123474.png', '一加三餐', '一加三餐（上海）电子商务有限公司', 'http://www.ecmoho.com', '电子商务', 'www.ecmoho.com', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(3, '网页设计师', '站酷招聘', 1453084884, '2名', '深圳市富途网络科技有限公司', '面议', '深圳 ', '经验不限', '全职', '1、  负责富途网站、专题网页、活动页面的视觉设计；2、  根据交互稿或者产品需求文档完成和改进产品视觉设计；3、  与相关部门配合，独立完成公司产品的设计及实现。4、  参与界面规范的制定与实施；', '有志于UI设计，懂得互联网web视觉创作和表现，熟练PS、AI 1、  网页设计相关工作经验1年以上，具备网页设计与活动专题设计的相关经验；2、  独立创新的风格设定能力、优秀的视觉表达能力；3、  具备自己独有的设计风格，并成功运用在产品设计中；4、  有良好的图形表达能力和沟通能力，有手绘能力者优先！5、  熟练掌握Photoshop、Coreldraw、Illustrator、Flash等设计软件，其中flash强者优先；6、  了解Dreamweaver 等网页制作软件,对HTML、CSS等制作技术有一定了解；', '', '广东省-深圳市-南山区', '2016/0118/20160118104124458.jpg', '富途网络', '深圳市富途网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(4, '资深时尚网页设计', '站酷招聘', 1453084884, '3名', '北京创锐文化传媒有限公司', '12k-15k', '北京 ', '经验3-5年', '全职', '1.负责公司自营服装业务的创意设计工作；<br>2.负责网站活动类系列视觉创意设计工作；<br>3.负责对外广告形象创意设计；&nbsp;<br>4.指导并协助flash设计师完成互动类表现工作。&nbsp;&nbsp;<br>', '1.&nbsp;教育背景：本科及以上学历，美术/设计类专业优先；<br>2.&nbsp;工作经验：设计行业工作3年以上，有时尚、服装类网站工作经验；<br>3.&nbsp;基础素质要求：美术基本功扎实，审美能力优秀，有创意和平面设计基础，对网页设计有一定见解和思路，善于沟通和学习；责任心强，富有团队精神，工作踏实细心。<br>4.&nbsp;专业能力要求：熟练掌握PS/AI等主流设计软件，具有独立设计能力，可以根据要求设计网页、造型、界面；具备一定的手绘能力。', '创意部', '东四十条A口，中汇广场B座20层', '2016/0118/20160118104124185.png', '聚美优品', '北京创锐文化传媒有限公司', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '电子商务', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '500-1000人', '私营企业', '           	          '),
(5, '创意文案', '站酷招聘', 1453084884, '1名', '光合线（北京）广告策划有限公司', '5k-8k', '北京 ', '经验不限', '全职', '你必须是：<br>紧跟潮流，思维活跃<br>文艺起来像张爱玲，二逼起来像留一手<br>的普通青年<br><br>你最好是：<br>干过几年广告（资历不重要，我们更看重你这个人）<br>又碰巧伺候过互联网金融、快消之类的客户（看，我们的客户很高大上吧）<br>爱玩三国杀（因为我们爱玩，这是一种深刻的“企业文化”）<br><br>你要做的是：<br>想概念，写东西', '看作品<br>', '创意部', '北京市-朝阳区', '2016/0118/20160118104124510.jpg', '光合线广告', '光合线（北京）广告策划有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(6, '客户服务/AE', '站酷招聘', 1453084885, '2名', '光合线（北京）广告策划有限公司', '面议', '北京 ', '经验不限', '全职', '你是公司与客户的桥梁。', '1、性格开朗大方；<br>2、有正规广告公司AE工作经验；<br>2、优秀的理解和沟通能力；<br>4、团队意识强，服务过地产客户者优先。', '客户', '北京市-朝阳区', '2016/0118/20160118104125773.jpg', '光合线广告', '光合线（北京）广告策划有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(7, 'Web全栈工程师', '站酷招聘', 1453084885, '5名', '上海博广广告传媒有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '负责移动端Web开发，参与创新型的页面制作工作。', '1、本科及以上学历，至少1年以上WEB开发经验；<br>2、熟悉HTML5、CSS3、JAVASCRIPT前端编程技能，有响应式页面开发经验<br>3、熟悉Java或C#，有面向对象编程开发经验<br>4、熟悉MySQL或SQL&nbsp;Server，了解视图、存储过程等常用数据库对象<br>5、有较强的逻辑思维与抽象思维，对常用算法有一定了解<br>6、能够在手机上开发出兼容性较好的移动网站者优先<br>PS:公司年轻化，萌宠陪伴，妹子多。', '技术部', '上海市闸北区108创意广场金座716-717室', '2016/0118/20160118104126948.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '),
(8, '商业产品经理', '站酷招聘', 1453084886, '2名', '智者四海（北京）技术有限公司', '面议', '北京 ', '经验3-5年', '全职', '企业服务、企业需求型产品的设计<br>跟进用户反馈并据此不断优化平台的用户体验<br>与研发、运营团队配合推动产品按时、高质上线并保证产品落地<br>', '3&nbsp;年以上独立&nbsp;B&nbsp;端产品设计经验和能力<br>有企业客户经验，了解企业客户需求<br>在移动商业变现有一定了解<br>较强的学习、沟通、数据分析能力<br><br>加分项<br>理解知乎，热爱知乎，是知乎的重度用户', '产品组', '北京市-海淀区', '2016/0118/20160118104126491.png', '知乎', '智者四海（北京）技术有限公司', 'http://www.zhihu.com', '互联网', 'www.zhihu.com', '100-200人', '私营企业', '           	          	<span class="label">问答社区</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">包早午餐</span>          	          	<span class="label">固定团建</span>          	          	<span class="label">零食咖啡</span>          	          	<span class="label">优秀团队</span>          	          	<span class="label">工作挑战</span>          	          	<span class="label">潜力巨大</span>          	          '),
(9, '前端开发工程师', '站酷招聘', 1453084887, '1名', '北京大疆文化传媒有限责任公司', '5k-8k', '北京 ', '经验不限', '全职', '1.&nbsp;根据设计稿和规范文档完成web和mobile界面制作与交互编写；<br>2.&nbsp;解决多浏览器的兼容性；<br>3.&nbsp;编写基础控件，业务组件；<br>4.&nbsp;配合技术部服务器端开发工程师完成项目整体开发；<br>5.&nbsp;参与前端构建与技术预研。<br>&nbsp;', '1.&nbsp;本科及以上学历，专业不限； <br>2.&nbsp;知名互联网企业工作经验3年以上（同时具有&nbsp;web&nbsp;和&nbsp;h5开发开发经验）； <br>3.&nbsp;熟练掌握W3C标准，制作兼容性良好的页面（含&nbsp;ps&nbsp;切图）；<br> 4.&nbsp;精通Jquery，RequireJs，等框架，了解&nbsp;backbone&nbsp;等&nbsp;mvc，mvvm&nbsp;框架；<br>5.&nbsp;熟练使用&nbsp;bootstrap&nbsp;easyui&nbsp;等快速开发框架；<br>6.&nbsp;有大型单页交互应用实战；<br>7.&nbsp;有前端工程意识，熟练使用前端构建工具；<br> 8.&nbsp;了解服务器端开发语言PHP、PYTHON等；<br>9.&nbsp;掌握日常&nbsp;linux&nbsp;操作。', '品牌部', '北京市朝阳区三里屯外交公寓', '2016/0118/20160118104127320.png', '大疆传媒', '北京大疆文化传媒有限责任公司', 'http://studiochina.dji.com/cn', '艺术/文化传播', 'http://studiochina.dji.com/cn', '1-50人', '私营企业', '           	          	<span class="label">dji</span>          	          '),
(10, '美术指导', '站酷招聘', 1453084887, '1名', '深圳市鹏文惠华广告有限公司', '面议', '深圳 ', '经验不限', '全职', '1.负责配合总监完成各项设计任务；<br>2.&nbsp;负责团队日常设计内容的质量把控、团队成员技能提升、重要项目的执行、大型项目的推进。', '1.美术或相关院校毕业，四年以上相关工作经验；<br>2.熟悉多种设计软件能协助总监完成提案工作；<br>3.保持对工作热情，良好沟通能力，对自己出品有追求。<br>4.主要负责项目的创意执行，能独立进行项目设计工作；<br>5.有责任心，工作积极高效，善于沟通与协作；<br>6.优秀的审美意识和艺术修养，较强的创意能力，思路开阔；<br>7.有Digital工作经验者优先考虑；<br>', '设计部', '广东省-深圳市-南山区', '2016/0118/20160118104127375.png', '鹏文惠华设计', '深圳市鹏文惠华广告有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          	<span class="label">广告创意</span>          	          	<span class="label">营销策划</span>          	          	<span class="label">文化活动</span>          	          	<span class="label">网页设计</span>          	          '),
(11, '设计作品评审', '站酷招聘', 1453084888, '2名', '北京站酷网络科技有限公司', '面议', '北京 ', '经验不限', '全职', '1、配合编辑进行UGC内容的运营，达到站酷网内容运营要求；&nbsp;<br><br>2、参与策划&执行社区专题活动；<br><br>3、配合市场营销部门，对各类商业活动进行协助跟进。', '1、&nbsp;热爱设计创意行业，有志于长期从事这一行业。设计相关专业应届毕业生优先；<br><br>2、&nbsp;注重细节和工作质量，做事认真负责；<br><br>3、&nbsp;具备设计行业基础知识以及对设计类内容的鉴赏能力；<br><br>4、&nbsp;熟悉HTML代码，熟悉Photoshop、Dreamweaver等软件，对页面维护有一定经验。', '内容编辑部', '北京市-朝阳区', '2016/0118/20160118104128971.jpg', '站酷网', '北京站酷网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(12, 'Web前端开发', '站酷招聘', 1453084888, '2名', '上海莫凡信息技术有限公司', '面议', '上海 ', '经验不限', '全职', '1、负责将设计师设计的PSD稿子生成HTML代码，并实现相应的交互效果;2、根据客户需求制作相应的HTML代码；', '1、精通DIV+CSS，熟悉Javascript。2、了解浏览器对前端代码的兼容性，能够撰写兼容多浏览器的前端代码；3、熟悉Web前端制作的流程和规范，1年或以上的工作经验；4、了解PHP程序开发者优先考虑；5、良好的沟通能力，有团队协作精神、踏实上进者优化考虑。', '', '上海市-黄浦区', '2016/0118/20160118104128422.jpg', 'MoreFun莫凡', '上海莫凡信息技术有限公司', 'http://www.morefun.me', '电子商务', 'www.morefun.me', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '),
(13, '高级广告策划', '站酷招聘', 1453084888, '3名', '上海博广广告传媒有限公司', '8k-12k', '上海 ', '经验3-5年', '全职', '1、根据客户及市场需求，独立提出具有创意及竞争力的策划案，并完成公开提案；&lt;br&gt;2、向客户阐述和表达创意观点，能够策略性地说服引导客户；&lt;br&gt;3、积极参与小组头脑风暴，完成与公司产品人群相关的创意策略； &lt;br&gt;4、敏锐捕捉互联网及新媒体态势，总结提炼并运用到策划创意工作中。&lt;br&gt;5、与外部、内部相关部门或人员保持良好的沟通，组织并监督创意作品的完成，确保画面、文字的构成符合策略及创意标准；&lt;br&gt;6、组织、管理创意团队，培训、激励并挖掘团队成员的潜力；&lt;br&gt;7、组织及安排内部各项业务重要的策划、业务会。', '1、全日制本科以上学历，广告、新闻、媒体传播、中文等相关专业优先。&lt;br&gt;2、至少1-2年4A广告公司从业经历，1以上年团队管理经验；在广告创意领域内具备丰富的知识和经验；&lt;br&gt;3、有独立策划网络战役经验或能力，能带领团队扛起创意输出大旗。&lt;br&gt;4、出色提案、谈判及拿下项目能力，具备广告整合设计策略把控及创意表现竞争力；&lt;br&gt;5、熟悉掌握互联网营销及互动新媒体的特点与最新趋势，任职经历中成功策划并实施过以数字营销为主的传播案例，请附作品或案例。&lt;br&gt;6、能够独立作出策划及创意策略，有清晰的文案理念， 富有想象力，逻辑及判断能力卓越，优秀的创意能力和执行力；&lt;br&gt;7、优秀英语口语及书面表达能力者优先。', '策划部', '上海市闸北区108创意广场金座716-717室', '2016/0118/20160118104128719.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '),
(14, '视觉设计师', '站酷招聘', 1453084888, '3名', '深圳市青木文化传播有限公司', '面议', '深圳 ', '经验不限', '全职', '视觉传达', '1. 2年以上视觉设计相关工作经验； 2. 熟练操作Photoshop、Illustrator、3d软件、手绘能力、优先考虑；3. 良好的沟通能力，积极主动，对工作富有高度的热情及耐心； 4. 有较强的抗压能力。', '', '广东省-深圳市-南山区', '2016/0118/20160118104128262.jpg', 'treedom', '深圳市青木文化传播有限公司', 'http://treedom.cn', '互联网', 'treedom.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          '),
(15, '网络运营专员', '站酷招聘', 1453084889, '2名', '北京博特创想文化有限公司', '面议', '北京 ', '经验不限', '全职', '1、把我们公司的产品包装成营销服务产品；负责我公司自有产品的营销推广策划与执行。<br>2、负责公司未来淘宝店与天猫店的日常运营，包括：店铺设计策划、宝贝描述页的策划与分析优化等。&nbsp;<br>', '1、对市场具有敏锐地洞察力，热爱市场策划工作，积极、勇于接受挑战；&nbsp;<br>2、了解互联网营销等新营销，是深度的互联网网民，思维活跃，对新事物新互联网技术特别敏感充满兴趣；有网络运营推广经验者优先；<br>3、具备一定的数据分析能力，能够清晰且有感染力的表达能力；&nbsp;<br>4、具备高度的敬业和团队合作精神，有较强的责任心，工作细致负责；&nbsp;<br>5、有丰富的市场营销、销售团队管理、策划执行经验者，优先考虑。<br>', '设计部', '北京市-西城区', '2016/0118/20160118104129726.jpg', '博特创想', '北京博特创想文化有限公司', 'http://www.besthinking.com.cn', '艺术/文化传播', 'www.besthinking.com.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">错峰上班不打卡</span>          	          	<span class="label">加班包餐包打车</span>          	          	<span class="label">带薪旅游</span>          	          	<span class="label">每天下午茶</span>          	          '),
(16, '项目经理', '站酷招聘', 1453084889, '3名', '北京博特创想文化有限公司', '面议', '北京 ', '经验不限', '全职', '1、建立并维护新老客户关系，为企业树立良好的口碑；&nbsp;<br>2、在项目进展中，能与客户、设计团队进行双向沟通并有很好的项目协调能力；&nbsp;<br>3、会制作完美的PPT，把公司开发的产品及时准确的传达到客户手中；&nbsp;<br>4、新老客户的开发及跟踪回访；&nbsp;<br>5、负责公司产品的后期印刷、加工、发货等事宜。<br>', '职位要求：<br>1、有两年及以上广告、传媒、设计公司的工作经验；&nbsp;<br>1、具有优秀的语言表达能力、商务谈判能力及项目提案能力；&nbsp;<br>2、有强烈的进取心，头脑清晰、反应机敏，具有良好的职业素养和职业道德；&nbsp;<br>3、有良好的团队意识、协调能力和合作能力；&nbsp;<br>', '设计部', '北京市-西城区', '2016/0118/20160118104129737.jpg', '博特创想', '北京博特创想文化有限公司', 'http://www.besthinking.com.cn', '艺术/文化传播', 'www.besthinking.com.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">错峰上班不打卡</span>          	          	<span class="label">加班包餐包打车</span>          	          	<span class="label">带薪旅游</span>          	          	<span class="label">每天下午茶</span>          	          '),
(17, '前端开发工程师H5', '站酷招聘', 1453084889, '4名', '北京易动纷享科技有限责任公司', '12k-15k', '北京 ', '经验1-3年', '全职', '1.参与公司web前端的架构设计和标准和规范制定；<br>2.利用各种Web技术实现web产品的交互效果，参与项目开发；<br>3.对产品经理、设计师提出的需求给出技术评估和解决方案；', '1.精通HTML和CSS&nbsp;及JavaScript、熟悉前端mvc/mvvm开发框架（例如backbone/angularjs等）优先； <br>2.熟练使用前端技术开发单页面应用（SPA）； <br>3.熟练解决页面兼容性问题； <br>4.有jQuery、Zepto、Angular、Bootstrap等框架的使用经验，对ECMA规范有一定了解； <br>5.熟练掌握HTML5相关技术，如：WebSocket,&nbsp;Web&nbsp;Storage,&nbsp;Cross-document消息传递,XMLHttpRequest&nbsp;Level&nbsp;2等;<br>6.&nbsp;熟悉移动端Web绘图相关高级特性,&nbsp;如canvas,&nbsp;webGL,&nbsp;CSS3动画效果等。', '研发中心', '北京市海淀区知春里-地铁站卫星大厦', '2016/0118/20160118104129778.png', '纷享销客', '北京易动纷享科技有限责任公司', 'http://www.fxiaoke.com', '互联网', 'www.fxiaoke.com', '1000人以上', '私营企业', '           	          	<span class="label">连接企业一切</span>          	          '),
(18, '网页设计师-天猫淘宝电商', '站酷招聘', 1453084890, '1名', '上海宠乐宠物用品有限公司', '面议', '上海 ', '经验不限', '全职', '1、公司旗下所有电商平台的相关设计；&nbsp;<br>2、平台首页、banner、活动页、产品描述页等。', '1、丰富的知识储备，开阔的眼界，从电影到非洲大迁徙。&nbsp;<br>2、细微的洞察力，上大号时都在观察门板的阴影结构。&nbsp;<br>3、时间允许的情况下，偏激的在意作品细节，较客观的考虑用户体验。&nbsp;<br>4、无性别、专业、学历要求，作品说话。&nbsp;<br>5、不需要&nbsp;能承受压力，但接受的工作需按时完成。&nbsp;<br>6、不需要&nbsp;为人和善、谦虚踏实，但必须有责任心、诚实守信。&nbsp;<br>7、不认为国外作品都是好作品，不把创意两字挂嘴边。&nbsp;<br>8、面试需带电子档作品集，或站酷、dribbble、behance等个人主页。<br>9、认同smartisan价值观，你没看错。', '创意部', '上海市-闵行区', '2016/0118/20160118104130971.jpg', '乐宠控股', '上海宠乐宠物用品有限公司', 'http://weibo.com/u/2628202111&nbsp;http://www.weibaquan.com/&nbsp;http://qpet.taobao.com/', '电子商务', 'http://weibo.com/u/2628202111&nbsp;http://www.weibaquan.com/&nbsp;http://qpet.taobao.com/', '100-200人', '私营企业', '           	          	<span class="label">福利</span>          	          '),
(19, 'WEB设计师', '站酷招聘', 1453084890, '10名', '广州华多网络科技有限公司', '面议', '广州 ', '经验不限', '全职', '1、负责网站产品界面设计、制定相关产品的设计规范； &lt;br&gt;2、根据需求提供界面优化建议，完成产品最终的视觉设计； &lt;br&gt;3、负责网站页面设计/专题及产品日常维护性设计和新项目的开发性界面设计工作。 &lt;br&gt;   ', '-最好是美术专业，本科或以上。&lt;br&gt;-最好有两年以上相关领域从业经验。&lt;br&gt;-最好热爱游戏，了解多玩和YY的产品。&lt;br&gt;-最好年轻有活力，开朗易沟通。&lt;br&gt;-最好有绝活儿，平时深藏不露，关键时刻可以拯救世界的那种。&lt;br&gt;如果以上你都不具备，问题也不大，但以下条件你必须具备:&lt;br&gt;必须有责任心&lt;br&gt;必须诚实正直&lt;br&gt;必须热爱设计&lt;br&gt;必须能拿出来一堆很酷的作品。&lt;br&gt;&lt;br&gt;简历和作品请发至 yypic@yy.com &lt;br&gt;标题格式：【广州】WEB设计师+姓名 or 【珠海】WEB设计师+姓名 &lt;br&gt;  ', 'YY', '广东省-广州市-天河区', '2016/0118/20160118104130859.jpg', '多玩YY', '广州华多网络科技有限公司', '', '互联网', '', '1000人以上', '私营企业', '           	          '),
(20, '网页视觉设计师', '站酷招聘', 1453084890, '10名', '深圳市朋沃科技有限公司', '面议', '深圳 ', '经验不限', '全职', '主要工作负责腾讯游戏类专题页面，官网，海报周边，手机端页面，广告。', '1、美术相关专业或计算机相关专业；2、一年以上设计工作经验，美术功底良好，较强的设计能力，有创意及良好的色彩感觉； 3、能熟练使用Photoshop、Flash、Dreamweaver等流行设计软件； 4、一年以上互联网网站美术设计经验，熟悉网页设计的规范，能独立完成设计案例； 5、有游戏/电商类专题、活动页面、UI设计或者懂手绘经验者优先；6、具有良好的沟通能力、学习能力、适应能力、优秀的团队合作能力。', '', '广东省-深圳市-宝安区', '2016/0118/20160118104130848.jpg', 'PALWO', '深圳市朋沃科技有限公司', 'http://www.palwo.com', '艺术/文化传播', 'www.palwo.com', '50-100人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(21, '高级UI设计师', '站酷招聘', 1453084891, '1名', '柒佰（北京）科技发展有限公司', '15k-20k', '北京 ', '经验3-5年', '全职', '1、负责参与产品的页面设计；<br>2、根据产品特点，把控整体设计风格、交互效果，页面制作及流程完善；<br>3、为日常的运营活动及功能维护提供视觉支持和持续优化。<br>', '1、美术、设计或相关专业，能够熟练使用Photoshop、Illustrator、&nbsp;Flash、Dreamweaver等软件；<br>2、从事设计行业工作3年以上，有WEB电商页面项目和移动端的设计经验；<br>3、足够的自主思维和需求把握能力。具备一定的交互知识；对产品流程、用户操作流程及用户需求有深入理解；热爱用户界面设计，对于改善用户体验有深刻认识，能够从用户体验角度来设计界面；<br>4、具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br><br>投递简历请附带作品。', '数字产品部', '北京市东城区77文化创意产业园', '2016/0118/20160118104131921.png', '700Bike', '柒佰（北京）科技发展有限公司', 'http://www.700bike.com', '互联网', 'http://www.700bike.com', '50-100人', '私营企业', '           	          	<span class="label">自行车</span>          	          	<span class="label">电商</span>          	          	<span class="label">网站&APP</span>          	          	<span class="label">城市通勤</span>          	          	<span class="label">生活方式</span>          	          	<span class="label">健康潮流</span>          	          	<span class="label">简单快乐</span>          	          	<span class="label">环境Cool</span>          	          '),
(22, '资深WEB设计师', '站酷招聘', 1453084891, '1名', '传成文化传媒（上海）有限公司', '面议', '北京 ', '经验不限', '全职', '1、负责公司官网、产品网站及专题页、运营、推广等相关页面设计；<br>2、负责产品后台页面设计调试及操作体验优化；<br>3、把控页面视觉方向，与各部门顺畅沟通，高标准按时完成页面设计任务；<br>4、不断学习先进WEB设计理念，持续改进设计思路和方法<br>', '1、3年以上网页设计工作经验，有成功的线上作品；<br>2、优秀的网站设计理念和审美理念，能根据产品特色快速制定设计标准；<br>3、熟练操作Photoshop、Illustrator、Flash等相关设计软件；<br>4、熟练使用HTML、CSS、JS等网页技术，能够和产品、工程师进行良好的沟通；<br>5、有高度的责任心，具备优秀合作态度、沟通能力及团队精神，并富有工作激情、创造力和责任感，能承受高强度的工作压力；<br>6、有团队管理经验者优先。<br>', '设计部', '北京市-朝阳区', '2016/0118/20160118104131785.jpg', 'Earth2113', '传成文化传媒（上海）有限公司', '', '艺术/文化传播', '', '1-50人', '私营企业', '           	          '),
(23, '高级视觉设计师', '站酷招聘', 1453084891, '1名', '北京动乐网络科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '&nbsp;1、主要负责公司官网及商城的视觉设计，以及产品及促销专题页面设计等工作；<br>&nbsp;2、负责公司广告Banner图片及促销专题页面设计、制作及维护，整体提升公司品牌视觉感<br>&nbsp;3、负责设计制作和优化公司产品详情页文字信息及图片，需要结合产品的特性制作成图文并茂的、有美感的、有较强实用性及吸引力的详细信息页面；<br>４、完善视觉设计流程，实现产品在用户体验上的一致性；<br>&nbsp;5、参与对视觉设计规范的维护、更新、实施；参与前瞻性产品的创意设计<br>&nbsp;6、完成领导上级交给的其他工作<br>', '1.&nbsp;本科及以上学历，美术、设计等相关专业<br>2.&nbsp;三年以上互联网或移动端视觉设计经验；<br>3.&nbsp;丰富的视觉表现力，精通色彩、图形、信息和&nbsp;gui&nbsp;设计原则及方法<br>4.&nbsp;熟练使用&nbsp;Photoshop&nbsp;、&nbsp;Freehand&nbsp;、&nbsp;illustrator&nbsp;等平面设计软件<br>5.&nbsp;具有良好的价值观，能融入团队协作；<br>6.&nbsp;请提供近期设计作品。<br>', '信息运营部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0118/20160118104131666.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(24, '高级网页设计师', '站酷招聘', 1453084891, '1名', '深圳市阿牛哥智慧生活医药有限公司', '8k-12k', '深圳 ', '经验3-5年', '全职', '1、负责大型医药电商网站PC端UI界面创意、设计及网页制作；<br>2、负责大型医药电商网站移动端H5版UI界面创意、设计及网页制作；<br>3、负责天猫、京东及管网旗舰店等产品详情页美术创意、设计及网页制作；<br>4、参与用户交互研究，把握官网、天猫等平台整体风格、视觉效果；<br>5、紧密配合产品经理、市场部、开发团队，完成页面设计。<br>6、完成公司的其他UI或平面的设计工作。<br>', '1、美术或设计专业本科以上学历；<br>2、扎实的美术基础和设计功底；<br>3、熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4、数量掌握Dreamweaver&nbsp;等网页制作软件,熟悉HTML、CSS等技术；<br>4、对PC端及移动端（APP）UI设计趋势有灵敏触觉和领悟能力；<br>5、对界面设计、图片处理、平面设计有深刻的理解，有敏锐设计感；<br>6、对视觉用户研究有一定经验和见解，对互联网产品可用性有深入的认识；<br>7、有团队精神和工作激情，能适应较高强度的工作环境。<br><br>---------------------------------------------------------------------<br>赶快加入阿牛哥……….<br><br>我们给你的，&nbsp;不会是一份朝九晚五，待遇看资历，上班忙炒股的工作！<br>而是一份让你倍感兴奋、既有前途更有钱途的工作。&nbsp;<br>&nbsp;<br>一个财富弯道超车的机遇<br>行业著名大咖独创的商业模式，上有云端互联的健康管理，下有智慧医疗和智慧药店的专业服务体系，形成完整的健康服务及商业闭环。<br>&nbsp;<br>大咖问你，Are&nbsp;you&nbsp;OK？<br>创始团队包含各领域精英，深受投资界热捧！<br>当接地气的医药，遇到飘天上的智能生活，连接的机遇悄然发生，火箭开始准备起飞，你准备好跟着我们去改变中国，去成为中国智慧健康领域的阿牛哥吗？<br>&nbsp;<br>开放、个性是唯一标签<br>开放办公环境，85、90后妹子靓仔遍地，我们鼓励你提出不同观点，支持随时开撕！<br>至于领导？领导是什么？是牛么？可以拉马车么？<br>&nbsp;<br>我们唯一的承诺是你可以完全做你自己，告别职场“装”时代！<br>我们为每位提供良好的发展空间，如果你能一个人顶几个人用，快速适应环境且扛得住压力，那么毫不犹豫来上班吧！<br>否则，你失去的会是一个短时间内加速成长自己，同时也失去高成长高回报的高速发展空间的机会。<br>这儿，有你最想要的青春！<br>', '用户体验设计部', '南山大道', '2016/0118/20160118104131611.png', '阿牛哥', '深圳市阿牛哥智慧生活医药有限公司', 'http://www.zanwj.com/', '互联网', 'http://www.zanwj.com/', '1-50人', '私营企业', '           	          	<span class="label">移动医疗</span>          	          	<span class="label">医药电商</span>          	          	<span class="label">良好的办公环境</span>          	          	<span class="label">优秀的团队</span>          	          	<span class="label">#轻松的工作氛围</span>          	          '),
(25, '网站重构工程师&nbsp;&nbsp;', '站酷招聘', 1453084892, '1名', '莉莉丝科技（上海）有限公司', '12k-15k', '上海 ', '经验1-3年', '全职', '1)	负责公司及游戏产品的官网制作、日常维护、更新等<br>2)	审核外包项目的页面重构品质<br>3)	负责参与设计体验、流程的制定和规范<br>4)	通过技术提升网站的用户体验和可用性<br>5)	懂设计，可负责部分设计工作<br>', '1)	本科以上学历，从事网页设计及重构工作2年以上<br>2)	对符合web标准的网站重构有丰富经验，有成功案例<br>3)	精通html、css能快构建出兼容主流浏览器的页面&nbsp;<br>4)	熟悉javascript语言，对性能优化有一定了解&nbsp;<br>5)	了解至少一种后台语言的开发机制(如php，Java等)<br>6)	熟练使用Photoshop，有较好审美及设计能力<br>7)	热爱游戏行业，能接受挑战并承受工作压力<br>', '研发部', '上海市闵行区新意城商务广场', '2016/0118/20160118104132218.png', '莉莉丝', '莉莉丝科技（上海）有限公司', 'http://www.lilithgame.com/', '游戏', 'http://www.lilithgame.com/', '100-200人', '私营企业', '           	          	<span class="label">萌妹子多</span>          	          	<span class="label">16薪</span>          	          '),
(26, '网页设计师', '站酷招聘', 1453084892, '2名', '深圳市汇石金融科技有限公司', '20k-25k', '深圳 ', '经验3-5年', '全职', '职位描述<br>工作内容：<br>1）负责产品的UI/UE设计，监控UI设计师的页面呈现，把控UI设计师对UE设计理解及呈现的完美到位；&nbsp;<br>2)&nbsp;对产品的易用性和功能分析，进行用户研究；参与产品前期界面视觉设计、流行趋势分析、UI规范；<br>3)&nbsp;结合用户体验，优化完善设计流程，高质量完成产品；<br>4)&nbsp;产品的整体视觉风格设计及后期跟进，与产品技术配合，进行跨部门合作的协调和沟通，共同推动产品的最终实现；<br>5)&nbsp;分享设计经验、推动提高团队的设计能力。<br><br>工作地址<br>深圳市南山区深南大道瑞思中心34层（世界之窗地铁站C1出口）', '大专以上学历，美术、艺术设计或相关专业；<br>1)&nbsp;精通Photoshop、Illustartor等设计软件；<br>2)&nbsp;3年以上的互联网或移动互联网优秀产品设计经验，时刻关注互联网动态，对业界新技术有热烈的好奇心和钻研精神；<br>3)&nbsp;热爱设计，拥有宽广的行业（平面设计、互联网）视野与时尚的审美标准；<br>4）有较强的美术功底和创意能力，热爱交互设计和视觉设计，具备良好的美感，对页面的色彩和布局有较好的把握<br>5)&nbsp;具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br>注：（投递简历时请附作品，无作品不接受面试）', '产品', '益田假日广场瑞思国际中心3414', '2016/0118/20160118104133239.png', '汇石金融', '深圳市汇石金融科技有限公司', 'http://www.currone.com', '互联网', 'www.currone.com', '1-50人', '私营企业', '           	          	<span class="label">绩效奖金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">氛围活跃</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">金融证券</span>          	          	<span class="label">互联网</span>          	          	<span class="label">对冲基金</span>          	          '),
(27, '平面设计师', '站酷招聘', 1453084893, '2名', '廿一客（上海）电子商务有限公司', '5k-8k', '上海 ', '经验不限', '全职', '1、公司各类平面视觉相关设计执行；&nbsp;<br>2、公司产品，宣传，展示及各项活动的设计与制作工作；&nbsp;<br>3、配合各部门设计相关的平面宣传资料；&nbsp;<br>4、公司品牌形象传达系统的维护与更新工作。&nbsp;', '1、正规美术院校设计专业，良好的审美意识及艺术修养；&nbsp;<br>2、能独立完成各种平面设计工作；&nbsp;<br>3、熟练运用相关专业设计软件，熟悉设计输出、印刷流程、工艺材料等相关专业知识&nbsp;；<br>4、工作踏实认真，责任心强，良好的沟通能力、团队协作精神及服务意识；&nbsp;<br>5、较强的创意能力，能承受一定的工作压力；<br>&nbsp;<br>面试时需携带近期设计作品，应届生也可。&nbsp;&nbsp;&nbsp;&nbsp;<br>', '品牌推广部', '春中路588号', '2016/0118/20160118104133795.jpg', '21Cake', '廿一客（上海）电子商务有限公司', 'http://www.21cake.com', '电子商务', 'www.21cake.com', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">吃到爽</span>          	          	<span class="label">大食堂</span>          	          '),
(28, '包装设计师', '站酷招聘', 1453084893, '2名', '北京创锐文化传媒有限公司', '5k-8k', '北京 ', '经验1-3年', '全职', '1、负责聚美优品产品包装设计<br>2、能够独立完成设计的整体方案，具备丰富的空间想象力及创新能力；<br>3、对色彩敏感，对流行有敏锐的洞察力，有悟性；&nbsp;<br>4、能很好地在设计中体现品牌设计理念，充分理解需求、设计思路符合市场产品的规律；', '1.&nbsp;正规院校大学专科以上学历，包装或平面设计相关专业<br>2.&nbsp;熟悉印刷工艺、印刷流程等<br>3.&nbsp;熟练使用Photoshop、Illustrator等相关工作软件<br>4.&nbsp;有化妆品包装设计经验者优先<br>5.&nbsp;善于表达和沟通，可以进行部门间的合作 <br>6.&nbsp;请附简历及作品', 'OBM事业部', '东四十条A口，中汇广场B座20层', '2016/0118/20160118104133338.png', '聚美优品', '北京创锐文化传媒有限公司', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '电子商务', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '500-1000人', '私营企业', '           	          '),
(29, '工业设计师', '站酷招聘', 1453084894, '1名', '北京米蒂艾思广告传媒有限公司', '5k-8k', '北京 ', '经验不限', '全职', '&nbsp;1、负责搜集及整理设计案所需资讯；主导或参与合作客户的产品规划、产品设计。&nbsp;2、负责以使用者需求及项目条件限制，完成初步概念设计，提供2D和3D渲染效果图；&nbsp;3、负责确认设计概念的发展能达成设计案的需求，特别是使用者需求的满足；&nbsp;4、负责项目中期及后期，工程相关工作的配合，确保设计案最终达成。5.', '岗位要求：<br>1、要求至少有2-3年工作经验，<br>2、有好的手绘和创意能力，扎实的美术功底；<br>3、熟练使用3DMAX、CAD、Photoshop等设计软件；<br>4、对生产工艺及材料有一定的了解，<br>5、如会摄影则优先录取并会有相应的工资加成。<br><br>注：投递简历请附个人作品或将作品发至hr@ritimes.com<br><br>', '设计部', '北京市朝阳区高碑店新村一区', '2016/0118/20160118104134891.jpg', '米蒂艾思', '北京米蒂艾思广告传媒有限公司', '', '广告/公关/会展', '', '50-100人', '私营企业', '           	          '),
(30, '平面设计', '站酷招聘', 1453084894, '1名', '上海态趣服装有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '岗位职责： <br>1. 负责品牌平面视觉的形象设计 <br>2. 设计品牌画册、DM、礼品包装、海报、店铺平面视觉、网站视觉、活动视觉等 <br>3. 监督跟进所有平面物料最后成品质量<br>4. 大片拍摄策划提案，监控大片质量 5. 以及上级安排的其它任务 ', '职位要求： <br>1. 了解潮流品牌风格，把握潮牌调性<br> 2. 能熟练运用Photoshop、Illustrator、Dreamweaver等应用软件 <br>3. 成熟的绘画技巧，对色彩、图形、字体敏感；有丰富的想象力和创造力 <br>4. 有团队合作精神，认真负责 <br>5. 需要有1-2年相关工作经验<br> 6. 有相关行业经验的优先录用  ', '市场部', '上海世贸商城', '2016/0118/20160118104134316.jpg', 'THETHING', '上海态趣服装有限公司', 'http://www.thething.cn', '其他', 'www.thething.cn', '1-50人', '私营企业', '           	          '),
(31, 'WEB网页前端设计师', '站酷招聘', 1453084894, '3名', '上海奕尚网络信息有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1.熟悉W3C标准，精通WEB前端HTML5/XHTML/HTML/CSS/JavaScript等主流技术<br>2.能熟练手工编写HTML5及DIV+CSS代码，并对各种常用浏览器做到良好兼容，确保网页可以跨平台跨浏览器运行（PC及移动端）<br>3.熟练运用常见AJAX框架，熟悉Javascript，&nbsp;掌握一些常用JS库，如JQuery<br>4.能熟练使用Photoshop,Dreamweaver等软件<br>5.较强的责任心和耐心，良好的团队合作意识，性格踏实稳重，能承受高强度的工作压力<br>6.有手机端开发经验者优先考虑', '1.大专以上学历<br>2.相关电子商务网站一年以上工作经验', '设计部', '上海市长宁区金钟路-道路', '2016/0118/20160118104134543.jpg', '奕尚网络', '上海奕尚网络信息有限公司', '', '电子商务', '', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '),
(32, '项目经理助理', '站酷招聘', 1453084894, '3名', '上海博广广告传媒有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、根据项目需求，跟进各类制作品的进程，质量，时间把控，成本把控；&lt;br&gt;2、维护客户关系，根进并落实项目进度和制作情况，现场监督项目质量和协调；&lt;br&gt;3、遵守公司制作流程相关规定，控制项目预算；&lt;br&gt;4、负责客户广告投放的总结、归档，内部资料的整理归纳；&lt;br&gt;5、 对项目执行进行跟踪、监控、反馈及阶段性总结及数据报表；&lt;br&gt;6、.负责协调活动相关人员、物料、流程执行。', '1、大专以上学历，两年以上互联网或广告公司客户执行经验；中文、广告、公关、营销专业优先；&lt;br&gt;2、工作认真负责、个性积极主动、性格开朗、讲求效率、乐于接受挑战；&lt;br&gt;3、善于与客户建立良好关系，沟通能力强，耐心、细心，能够承受工作压力；&lt;br&gt;4、熟悉办公软件，熟练使用WORD，EXCEL和POWERPOINT, 有较好的文字功底； &lt;br&gt;5、出色的口头表达、逻辑清晰，能高效的和各部门协调；&lt;br&gt;6、有强烈的工作责任心和团队合作精神，能快速适应不同的工作环境；&lt;br&gt;7、具备良好的商务沟通和人际交往能力，工作积极主动，具有较强的团队协作意识； &lt;br&gt;8、具有较高能动性，可以独立判断机会和风险，在工作团队中能及时寻求和提供帮助。', '项目部', '上海市闸北区108创意广场金座716-717室', '2016/0118/20160118104134788.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          ');
INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(33, '天猫美工/网页设计', '站酷招聘', 1453084895, '1名', '百互润贸易（上海）有限公司', '5k-8k', '上海 ', '经验不限', '全职', '1、负责天猫商城店铺的设计装修、负责店铺的整体形象、首页、产品展示页面等模块的美工设计；<br>2、负责对上架产品进行排版、优化店内宝贝描述、美化产品图片等；<br>3、定期更新设计店铺促销图片及页面。同时配合促销活动，调整及修改产品页面及店铺主页更新 ；<br>4、店铺的日常维护及其他设计调整；<br>5、图片尺寸调整、实物修片等美工；', '1、美术、平面设计等相关专业，专科以上学历；<br>2、熟悉天猫商城店铺的设计装修流程、熟悉店铺的整体形象、首页、产品展示页面等模块的美工设计；<br>3、熟悉店铺上下架流程，对上架产品进行排版、优化店内宝贝描述、美化产品图片等熟练掌握 ；<br>4、精通设计软件Photoshop、Illustrator等，熟悉Dreamweaver、HTML等网页及图形制作软件；<br>5、有良好的沟通及策略理解能力、极强的责任性和独立完成工作的能力；<br>6、有化妆品电子商务美工、网页设计或平面设计工作经验优先 ；<br>面试时请提供设计作品。', '皮肤美容事业部', '上海市静安区东方众鑫大厦', '2016/0118/20160118104135212.jpg', '百润', '百互润贸易（上海）有限公司', '', '电子商务', '', '200-500人', '外商独资', '           	          '),
(34, '高级美术指导', '站酷招聘', 1453084895, '5名', '宁波中哲慕尚电子商务有限公司', '8k-12k', '宁波 ', '经验不限', '全职', '我们需要你做什么？<br>1、	店铺整体视觉设计方向指导及建议；<br>2、	进行高质量的产品视觉设计；<br>3、	完成中等以上活动项目的平面设计工作，与文案、运营协作进行设计提案；<br>4、	有效指导团队完成设计工作；<br>5、	理解视觉营销，进行数据分析与提案。<br>', '我们需要怎样的你？<br>1、	精通Photoshop，并熟练使用AI、AE、DW等软件；<br>2、	优秀的沟通协调和团队合作能力，对互联网用户行为及习惯有深刻理解；<br>3、	绝佳的审美和创新能力，符合电子商务唯快不破的理念；<br>4、	具备整体运营思路，架构店铺视觉设计方向。<br>', '品牌项目部', '杉杉路111号', '2016/0118/20160118104135652.png', 'GXG', '宁波中哲慕尚电子商务有限公司', 'https://gxg.tmall.com', '电子商务', 'https://gxg.tmall.com', '200-500人', '私营企业', '           	          	<span class="label">好玩</span>          	          	<span class="label">创意</span>          	          	<span class="label">团队旅行</span>          	          	<span class="label">带薪假期</span>          	          	<span class="label">各种趴</span>          	          	<span class="label">时尚high</span>          	          '),
(35, '资深网页设计师', '站酷招聘', 1453084895, '3名', '上海友尊文化传播有限公司', '12k-15k', '上海 ', '经验3-5年', '全职', '1、负责网站前端页面（包括PC端与移动端）的创意与设计；PC/移动网站的WEB端、移动端整体UI设计、视觉设计；<br>2、配合市场运营部门，完成网站推广图、专题活动页面策划与设计；<br>3、负责策划设计网站的整体风格、布局、视觉感受及内容设计；<br>4、分析业务需求，研究用户行为和使用场景，优化产品设计；<br>5、负责完善网站推广页面及维护。', '1、有3年及以上的移动互联网、软件或者互联网行业视觉设计工作经验&nbsp;<br>2、具有良好的美术功底及审美能力，较强的视觉设计和创意能力&nbsp;<br>3、良好的沟通能力，善于对设计的表达<br>4.、良好的创造力和审美感知力，能够独立创作并有很多创意，乐于学习；<br>5、&nbsp;请提供相关的设计作品案例到招聘邮箱供参考；<br>6、有团队合作精神，富有激情及责任心。&nbsp;<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！公司网址：www.uimix.com', '设计部', '淞兴西路258号5号楼5109室（半岛1919）', '2016/0118/20160118104135556.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(36, '资深网页设计师 ', '站酷招聘', 1453084896, '1名', '上海莫凡信息技术有限公司', '8k-12k', '上海 ', '经验不限', '全职', '1、追求震撼的视觉体验的设计;<br>2、改善和优化电商页面的用户体验，并能给出具体的方案；<br>3、配合产品开发进度完成设计工作并适时对相关业务开展提出建议和解决办法。', '1、精通Photoshop、Illustrato、Indesign等工具；<br>2、对电商及Web实现有较深入的了解；<br>3、具有一定的美术鉴赏、排版/色彩搭配能力；<br>4、思维活跃，具有创新意识；<br>5、具备高度的责任心、诚信的工作作风、优秀的学习和沟通能力及团队精神；<br>6、艺术设计类专业，并从事网站设计1-2年以上工作经历；<br>数位板经验者优先；', '设计部', '上海市-闵行区', '2016/0118/20160118104136469.jpg', 'MoreFun莫凡', '上海莫凡信息技术有限公司', 'http://www.morefun.me', '电子商务', 'www.morefun.me', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '),
(37, '平面设计师', '站酷招聘', 1453084896, '2名', '正谷（北京）农业发展有限公司', '面议', '北京 ', '经验1-3年', '全职', '你将大展身手的领域：<br>产品包装设计；<br>企业刊物设计排版；<br>网页、移动端平面设计；<br>活动物料设计和视觉效果把控；<br>品牌宣传活动、产品发布会、日常活动等，与品牌一同成长。<br>', '我们希望你是这样的小伙伴：<br>爱设计，爱创意，更爱生活和自己。把设计和生活都当作爱好来呵护；<br>有个性，有性格；兼具合作精神；	<br>认可有机行业、环保理念优先。<br>	<br>具有平面设计实际操作经验2年以上；<br>具有良好的沟通能力，团队协作精神，工作认真严谨，积极主动，有很强的责任心；<br>设计基本功扎实，有独立设计能力；<br>精通Photoshop/&nbsp;Illastrator/InDesigh等平面设计软件，有手绘能力；<br>UI设计、网页设计、flash设计（可使用简单代码）、摄影、版画特长者优先。<br>', '品牌文化部', '北京市-朝阳区', '2016/0118/20160118104136404.jpg', '正谷有机农业', '正谷（北京）农业发展有限公司', '', '其他', '', '100-200人', '私营企业', '           	          '),
(38, '资深设计师', '站酷招聘', 1453084896, '3名', '上海奕尚网络信息有限公司', '8k-12k', '上海 ', '经验不限', '全职', '1、负责公司属下品牌的平面图片设计工作。以符合客户活动要求及审美为前提。<br>2、与市场部，运营部，客服部相关部门相协调，不断调整公司页面视觉，以达到最完美的图片设计以促进销售。&nbsp;3、具有独立页面设计的能力，也有带领设计师团队工作完成项目的能力。&nbsp;【加分の个人魅力】情商高，轻微完美主义，经得起甲方龟毛の审核，受得了邮件来来回回の改改改，有一颗温柔抗虐の坚强的心', '1、具有三年以上平面设计经验，具网页设计或电子商务背景的尤佳。<br>&nbsp;2、能熟练使用adobe软件，如photoshop，illustrator，会使用dreamwaver，可以读懂基本html代码，对css，java等代码有所了解，如有淘宝，天猫等第三方电子商务平台设计经验的更佳。<br>&nbsp;3、具有良好的审美，对时尚及流行趋势敏感。<br>&nbsp;4、具有责任心，耐心，纪律性。有团队合作精神，能够在压力之下工作。<br>&nbsp;5、具有良好的领导能力和沟通能力，能够合理安排和分配工作。&nbsp;时尚，最时尚。。。（情不自禁唱起来的节奏）&nbsp;如果你恰好符合以上条件（颜值够高的话以上软性条件可适当放宽=_=），且对服装行业感兴趣，对设计充满热情，请立即将简历发送给我们!', '设计部 ', '上海市长宁区金钟路-道路', '2016/0118/20160118104136431.jpg', '奕尚网络', '上海奕尚网络信息有限公司', '', '电子商务', '', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '),
(39, '美工', '站酷招聘', 1453084896, '1名', '北京动乐网络科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '1、负责公司网站设计装修、新品详情页设计及图片处理上传、设计制作、逐步形成品牌风格；<br>2、根据品牌活动完成活动促销页面设计；<br>3、负责网站相关活动的策划、专题页面的设计等；<br>4、领导临时安排的其它工作<br>', '1、熟练使用Photoshop、AI、Dreamweaver、IIIustrator、HTML语言等相关设计软件，对图片渲染和视觉效果有较好的把控和认识；<br>2、具有２年以上的网页设计工作经验；本科及以上学历<br>3、具有良好的网店设计能力，较强的创意、策划能力，良好的文字表达能力；<br>4、工作认真、有责任心、踏实肯干，富有团队精神<br>', '电商运营部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0118/20160118104136131.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(40, '高级视觉设计师', '站酷招聘', 1453084897, '4名', '北京智能管家科技有限公司', '20k-25k', '北京 ', '经验3-5年', '全职', '工作职责：<br>1、设计趋势分析，把控平台及平台产品的整体视觉风格和系统VI；<br>2、负责为运营活动以及日常维护提供视觉设计支持；<br>3、协同市场营销一同完成对外的品牌及产品的视觉传达设计；<br>4、参与开创性产品的定义和前期开发，完成动态演示DEMO；<br>5、管理视觉设计师团队。', '职位要求：<br>1、本科或以上学历，5年及以上的视觉传达设计从业经验；<br>2、有4A广告公司从业背景优先考虑；<br>3、热爱创新性设计，执行力强，热心好学；<br>4、拥有广阔的设计视角和敏锐度更佳，如平面设计，交互设计，产品设计等；<br>5、具有分享精神，良好的沟通和团队合作能力。', '设计部', '北京市朝阳区北苑路甲13号北辰泰岳11层', '2016/0118/20160118104137142.png', 'roobo', '北京智能管家科技有限公司', 'http://www.roobo.com.cn', '互联网', 'www.roobo.com.cn', '200-500人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">帅哥美女</span>          	          	<span class="label">优秀团队</span>          	          	<span class="label">智能硬件</span>          	          '),
(41, '资深网站视觉设计师', '站酷招聘', 1453084897, '1名', '网易（杭州）网络有限公司', '12k-15k', '杭州 ', '经验3-5年', '全职', '1.具备良好的审美能力、动手能力、沟通能力、有相关的设计工作经验；<br>2.&nbsp;负责游戏运营及品牌宣传的推广设计工作；<br>3.&nbsp;设计时，根据需求进行系统分析，设计出符合要求的设计作品；<br>4.&nbsp;关注所负责产品的设计动向，为产品提供专业的美术意见及建议。', '1.&nbsp;热爱游戏，对UI设计趋势有灵敏触觉和领悟能力；<br>2.&nbsp;关注用户体验设计，并对网站的易用性有一定研究；<br>3.&nbsp;良好的创意思维和理解能力，有深厚的美术功底；<br>4.&nbsp;能熟练使用Photoshop、Flash、Illustrator、Fireworks、After&nbsp;Effects等流行设计软件；<br>5.&nbsp;设计相关专业学历，3年以上设计工作经验；（能力优秀者可放宽）<br>6.&nbsp;具备良好合作态度及团队精神，并富有工作激情、创造力和责任感。', '网易游戏', '网商路599号', '2016/0118/20160118104137537.png', '网易', '网易（杭州）网络有限公司', 'http://www.163.com', '互联网', 'www.163.com', '1000人以上', '私营企业', '           	          	<span class="label">网易</span>          	          	<span class="label">态度</span>          	          	<span class="label">游戏</span>          	          	<span class="label">电子商务</span>          	          	<span class="label">教育</span>          	          	<span class="label">音乐</span>          	          	<span class="label">社交</span>          	          '),
(42, '资深网页设计师-深圳', '站酷招聘', 1453084897, '10名', '北京深度沟通广告有限公司', '15k-20k', '深圳 ', '经验不限', '全职', '注：网站视觉设计、移动app界面设计，不仅是图标设计，不是平面设计。<br><br>1、与公司UCD团队一起完成高质量网站项目、移动app项目；&nbsp;<br>2、视觉设计提案、视觉风格定义、视觉规范制定、视觉设计；&nbsp;<br>3、撰写ppt，诠释并分享视觉作品。', '1、4年以上本职位工作经验；&nbsp;<br>2、优异的设计创意能力及独立完成个案的能力（看作品）；&nbsp;<br>3、设计要可以讲出道理，思维要严谨；&nbsp;<br>4、有较强的创新能力，对色彩的把握独到，能把设计风格和栏目特色进行有效的结合；&nbsp;<br>5、良好的沟通、领悟能力，具有团队合作精神和敬业精神，能与团队其他成员进行有效沟通；&nbsp;<br>7、有对作品全程负责的态度和毅力，像素级精确设计；<br>具备以下能力者优先考虑：&nbsp;<br>1、优秀的企业网站设计作品、成熟的app设计作品；&nbsp;<br>2、有带队经验。', '用户体验', '坂田华为基地', '2016/0118/20160118104137187.png', 'DEEP深度沟通', '北京深度沟通广告有限公司', 'http://www.deeping.cn', '互联网', 'www.deeping.cn', '50-100人', '私营企业', '           	          	<span class="label">用户体验</span>          	          	<span class="label">UCD</span>          	          	<span class="label">UE</span>          	          	<span class="label">UX</span>          	          '),
(43, '网页设计师', '站酷招聘', 1453084898, '1名', '上海凯淳实业有限公司', '8k-12k', '上海 ', '经验3-5年', '全职', '1.负责互联网推广及全网电商平台创意视觉管理（利用高质量的视觉创意，达成高转化的实际售卖效果）；<br>2.负责店铺产品的界面设计，制定相关产品的设计规范；<br>3.负责辅助线下项目的配合物料设计；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。<br><br>', '1、具有丰富互动广告及商业网站设计和制作经验，热衷提供高质量、简洁、具有传播力的视觉创意；<br>2、品德端正，性情温善，具有良好的沟通能力，理解力强，有团队合作意识，具有敬业负责的精神；<br>3、具有良好的美术设计功底，不低于三年同等行业工作经验，一经录用，公司将提供有足够竞争力的薪资及发展环境；<br>4、精通Photoshop，熟悉&nbsp;Flash、Illustrator等设计制作软件；<br>5、能吃苦耐劳，可接受加班；<br>6、简历中必须提供近期设计作品及最成功的作品。<br><br>工作地址<br>上海市南京西路388号仙乐斯广场', '创意部', '上海市南京西路388号仙乐斯广场', '2016/0118/20160118104138816.jpg', '凯淳实业', '上海凯淳实业有限公司', '', '电子商务', '', '1000人以上', '私营企业', '           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '),
(44, '视觉设计师', '站酷招聘', 1453084898, '2名', '北京站酷网络科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '	我们是小团队作战，所以需要各种多面手<br>	你或能独立完成产品界面设计(Web、APP)<br>	你或能独立完成线上活动专题设计<br>	你或能独立完成平面相关设计(平面物料和站酷周边)<br>	并能帮助团队完成日常运营设计(在线广告和小活动)<br>', '	热爱站酷，适应力强，具备良好的团队合作精神，能承受工作压力<br>	良好的手绘创作能力，发达的视觉细胞<br>	界面设计、网页设计、平面设计、相关专业优先<br>	熟练使用各种设计工具(PS、AI)<br>', '用户体验中心', '北京市-朝阳区', '2016/0118/20160118104138115.jpg', '站酷网', '北京站酷网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(45, '设计作品评审实习生', '站酷招聘', 1453084898, '2名', '北京站酷网络科技有限公司', '面议', '北京 ', '经验不限', '全职', '1.&nbsp;协助编辑进行UGC内容审核；&nbsp;<br>2.&nbsp;参与策划&执行社区专题活动；<br>3.&nbsp;协助编辑完成“站酷画我”内容审核；<br>', '1.&nbsp;&nbsp;热爱设计创意行业，有志于长期从事这一行业。设计相关专业应届毕业生优先；<br>2.&nbsp;&nbsp;注重细节和工作质量，做事认真负责。<br>3.&nbsp;&nbsp;具备设计行业基础知识以及对设计类内容的鉴赏能力；<br>4.&nbsp;&nbsp;熟悉HTML代码，熟悉Photoshop、Dreamweaver等软件，对页面维护有一定经验。<br>&nbsp;<br>实习期满，通过考核可优先转为正式员工，入职待遇从优', '内容编辑部', '北京市-朝阳区', '2016/0118/20160118104138134.jpg', '站酷网', '北京站酷网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(46, '广告设计师', '站酷招聘', 1453084899, '2名', '在线途游（北京）科技有限公司', '8k-12k', '北京 ', '经验不限', '全职', '1.&nbsp;主要负责公司效果广告投放的广告图文素材制作；<br>2.&nbsp;配合投放人员的需求制作不同风格的素材，并根据投放人员的数据反馈更换或优化素材；<br>3.&nbsp;了解最新的设计发展趋势，收集行业竞品的信息，从美术角度配合投放人员共同提高投放效果；<br>4.&nbsp;协助完成市场品牌的其它平面设计需求。', '1.&nbsp;有设计经验或相关专业本科以上学历；（能力优秀者可放宽到大专学历）<br>2.&nbsp;审美观正常，有设计动手能力，色彩搭配感觉好；<br>3.&nbsp;熟练使用Photoshop、Illustrator、Flash等相关的设计软件（至少其中两种）；<br>4.&nbsp;面试需带作品或发作品链接。', '美术设计部', '北苑路', '2016/0118/20160118104139905.png', '途游棋牌', '在线途游（北京）科技有限公司', 'http://www.tuyoo.com/', '游戏', 'http://www.tuyoo.com/', '100-200人', '私营企业', '           	          	<span class="label">途游游戏</span>          	          '),
(47, 'unity3d游戏主美', '站酷招聘', 1453084899, '1名', '在线途游（北京）科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '岗位职责：<br>1、负责UI、场景、原画、特效的总体风格设计，并对团队成员的工作进行指导和约束；<br>2、分解和管理美术资源数量、质量和速度，管理和统筹外包资源完成情况； <br>3、与策划、技术团队沟通合作，从美术角度给整个项目提出建议。<br>', '任职要求：<br>1、大学专科及以上学历，美术或动画专业毕业；3年以上游戏美术设计经验，熟悉游戏美术设计管理流程 ；<br>2、熟悉各类型游戏，对游戏品质和美术表现方式有自己的见解和看法；<br>3、熟练掌握各种美术制作软件，能够独立担当设计任务；<br>4、具有团队合作精神，富于创造力，良好的理解力，流畅的沟通能力，能够承受工作压力；<br>5、有unity引擎制作经验者优先，曾经在网游公司担任主美职位者优先；<br>6、简历中需要附带能够体现该岗位能力的作品。', '美术', '北京市朝阳区', '2016/0118/20160118104139106.png', '途游棋牌', '在线途游（北京）科技有限公司', 'http://www.tuyoo.com/', '游戏', 'http://www.tuyoo.com/', '100-200人', '私营企业', '           	          	<span class="label">途游游戏</span>          	          '),
(48, '文案策划', '站酷招聘', 1453084899, '5名', '上海博广广告传媒有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、抓取社会化媒体、事件、话题等进行网络活动策划；&lt;br&gt;2、配合部门同事指定执行计划，完善细化文案创意，完成从概念到创意到执行的具体工作； &lt;br&gt;3、负责整体创意文案撰写工作，含微博及微信内容、论坛软文、新闻公关稿等；&lt;br&gt;4、配合部门同事完成内容资料及数据搜集、提炼、整合。', '喜思考，不封闭，手快，爱沟通，会取经，实习生也欢迎&lt;br&gt; 1、是不是圈内人，是不是科班出身，是男是女，都无关紧要。只要你本身热爱互联网，关注八卦时事，即能上知乎、网易和大神胡扯，也能静下心来做140个字的“微博控”。&lt;br&gt;2、对某一个领域，如体育、金融、IT等专精，或其他相关杂业“游戏、八卦、明星”等深入了解。&lt;br&gt;3、手快，活好，头脑转得动，资深网虫+创造思维，有情趣更佳。', '策划部', '上海市闸北区108创意广场金座716-717室', '2016/0118/20160118104139248.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '),
(49, '前端开发工程师', '站酷招聘', 1453084900, '2名', '上海奕尚网络信息有限公司', '面议', '上海 ', '经验不限', '全职', '1、较强的责任心和耐心，良好的团队合作意识，性格踏实稳重，能承受高强度的工作压力；<br>2、有手机端开发经验者优先考虑；<br>3、熟悉W3C标准，精通WEB前端HTML5/XHTML/HTML/CSS/JavaScript等主流技术；<br>4、能熟练手工编写HTML5及DIV+CSS代码，并对各种常用浏览器做到良好兼容，确保网页可以跨平台跨浏览器运行（PC及移动端）；<br>', '<br>1、熟练运用常见AJAX框架，熟悉Javascript，&nbsp;掌握一些常用JS库，如JQuery；<br>2、能熟练使用Photoshop,Dreamweaver等软件。<br><br>欢迎加入我们脑洞大开欢乐和谐的设计师大家庭，we&nbsp;need&nbsp;u!&nbsp;', '设计部', '上海市-长宁区', '2016/0118/20160118104140967.jpg', '奕尚网络', '上海奕尚网络信息有限公司', '', '电子商务', '', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '),
(50, '资深产品设计-21cake', '站酷招聘', 1453084900, '1名', '廿一客（上海）电子商务有限公司', '面议', '上海 ', '经验不限', '全职', '1.&nbsp;全面负责公司新产品及周边用品的外观设计与革新工作.&nbsp;<br>2.&nbsp;能独立完成产品创意,二维平面及三维建模和渲染工作.&nbsp;<br>3.&nbsp;配合市场需求,进行产品上市前,中,后的外观设计开发与推进.&nbsp;<br>4.&nbsp;能够独立分析和解决产品研发过程中遇到的各类设计问题.&nbsp;<br>5.&nbsp;配合完成公司各种产品包装的设计优化.&nbsp;<br>', '1.&nbsp;三年以上工作经验,工业设计类本科及以上学历.具备良好的审美与艺术鉴赏力.&nbsp;<br>2.&nbsp;熟练使用Photoshop，犀牛等2D.3D设计与渲染软件.&nbsp;<br>3.&nbsp;突出的创新设计能力及产品外观审美能力，熟悉各种材料工艺与加工方式.&nbsp;<br>4.&nbsp;良好的沟通能力及团队合作精神，较强的自我管理能力及工作责任心.&nbsp;<br>5.&nbsp;有家居及相关行业设计经验者优先；&nbsp;<br>（面试时需携带近期设计作品）<br>', '品牌推广部', '春中路588号', '2016/0118/20160118104140418.jpg', '21Cake', '廿一客（上海）电子商务有限公司', 'http://www.21cake.com', '电子商务', 'www.21cake.com', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">吃到爽</span>          	          	<span class="label">大食堂</span>          	          '),
(51, '设计总监', '站酷招聘', 1453084900, '1名', '北京优艾众合创意文化传播有限公司', '25k-30k', '北京 ', '经验3-5年', '全职', 'UIDWOKRS是一个优质年轻创意设计团队，只要你觉得自己行，没有太多限制。<br>但需要有团队管理与项目管理能力，沟通没问题。', '1.把控团队的创意与创意执行。<br>2.管理设计团队。<br>3.项目的协调与沟通。<br>', '创意设计', '北京市-朝阳区', '2016/0118/20160118104140450.jpg', 'UID WORKS', '北京优艾众合创意文化传播有限公司', 'http://www.uidworks.com', '广告/公关/会展', 'www.uidworks.com', '1-50人', '私营企业', '           	          	<span class="label">uidworks</span>          	          '),
(52, '资深互动广告文案', '站酷招聘', 1453084901, '2名', '上海利宣广告有限公司', '8k-12k', '上海 ', '经验不限', '全职', '为一系列知名国际品牌提供互动创意的想法和文案产出，客户涵盖化妆品，汽车，服装配饰，家装，IT等。<br><br>工作涉及活动创作，网站，横幅广告，移动应用程序和社交媒体提案<br>负责品牌的社交媒体常规内容撰文<br>负责和参与品牌社交媒体帐户的定位与年度规划<br>社交媒体活动创意想法<br>网络媒体新闻通稿，软文撰写<br><br>请将作品简历发送至以下邮箱：momo.li@net-show.cn&nbsp;,&nbsp;lee.li@net-show.cn&nbsp;,&nbsp;winn.wang@net-show.cn<br>', '热爱文字,博览群书,爱好广泛<br>有天马行空,机灵古怪的想法<br>具有很强的文字功底,对文字精益求精<br>熟悉网络,擅长用网络语言与用户沟通,了解互动整合营销<br>具有很强的时间及团队合作观念,善于沟通<br>高度适应能力以及抗压能力<br><br>公司福利<br>每月综合补助（加班餐补，出租车费报销）<br>员工年度体检<br>员工年度旅游（境外为主）<br>组织不定期团建活动（如各类专业培训、拓展训练、聚餐等）<br>庆生会、节日祝福及礼品等<br>', '创意部', '灵石路658号802室（大宁财智中心）', '2016/0118/20160118104141850.png', 'Net-show', '上海利宣广告有限公司', 'http://net-show.cn', '广告/公关/会展', 'http://net-show.cn', '50-100人', '私营企业', '           	          	<span class="label">弹性工作</span>          	          	<span class="label">年底分红</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">人性化管理</span>          	          '),
(53, '&nbsp;资深网页设计师', '站酷招聘', 1453084901, '3名', '上海凯淳实业有限公司', '8k-12k', '上海 ', '经验不限', '全职', '岗位职责：<br>1.负责淘宝天猫旗舰店网站的设计、改版；<br>2.负责旗舰店产品的界面设计，制定相关产品的设计规范；<br>3.负责线上推广活动相关的视觉设计和前端实现，包括EDM、页面、专题、Banner等；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。', '岗位要求：<br>1、有较强的美术功底和出色的网页平面设计审美功力；&nbsp;<br>2、能够熟练使用Dreamweaver、Flash、Fireworks、Photoshop等设计工具；<br>3、能独立策划、设计、制作高品位的网页；<br>4、了解网页制作技术如javascript、HTML、CSS等编程语言；&nbsp;<br>5、善于沟通，具有良好的职业素质和团队合作精神，并能与项目开发人员合作完成项目。<br><br><br>P.S.请务必在简历中附带个人作品', 'Creative', '上海市-徐汇区', '2016/0118/20160118104141758.jpg', '凯淳实业', '上海凯淳实业有限公司', '', '电子商务', '', '1000人以上', '私营企业', '           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '),
(54, '资深网页设计师', '站酷招聘', 1453084901, '3名', '一加三餐（上海）电子商务有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '资深设计师（请务必附作品或链接）<br><br>工作描述：<br>1、艺术设计类专业，并从事网站设计1-2年以上工作经历；<br>2、有良好的美术功底，具有良好的艺术审美观及独特的创意理念；<br>3、负责网站创意、设计、页面制作及网页广告、相关图片、动效等制作工作&nbsp;<br>4、引导并规范网站的界面表现，优化用户体验，并确保技术实施&nbsp;<br>5、配合产品开发进度完成设计工作并适时对相关业务开展提出建议和解决办法&nbsp;<br>6、对设计行业富有激情&nbsp;<br>', '职位要求：<br>1、精通Photoshop、Flash、Dreamweaver等工具。&nbsp;<br>2、了解网站建设的流程和网页设计制作流程&nbsp;<br>2、具有一定的美术鉴赏、色彩搭配能力。&nbsp;<br>3、有良好的学习能力、沟通能力及团队协作能力。&nbsp;<br>4、电商设计及相关工作经验者优先。<br>5、提供五个以上个人作品，要求正式上线，并能通过网站地址访问。<br><br>', '创意部', '上海市-徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层', '2016/0118/20160118104141612.png', '一加三餐', '一加三餐（上海）电子商务有限公司', 'http://www.ecmoho.com', '电子商务', 'www.ecmoho.com', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(55, '网页设计师', '站酷招聘', 1453084902, '1名', '上海凯淳实业有限公司', '5k-8k', '上海 ', '经验不限', '全职', '岗位职责：<br>1.负责天猫旗舰店网站的设计、改版；&nbsp;<br>2.负责旗舰店产品的界面设计，制定相关产品的设计规范；&nbsp;<br>3.负责线上推广活动相关的视觉设计和前端实现，包括EDM、页面、专题、Banner等；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。', '任职资格：<br>1、有较强的美术功底和出色的网页平面设计审美功力；&nbsp;<br>2、能够熟练使用Dreamweaver、Flash、Fireworks、Photoshop等设计工具；&nbsp;<br>3、能独立策划、设计、制作高品位的网页；&nbsp;<br>4、了解网页制作技术如javascript、HTML、CSS等编程语言；&nbsp;<br>5、善于沟通，具有良好的职业素质和团队合作精神，并能与项目开发人员合作完成项目。', 'Creative', '上海市-徐汇区', '2016/0118/20160118104142243.jpg', '凯淳实业', '上海凯淳实业有限公司', '', '电子商务', '', '1000人以上', '私营企业', '           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '),
(56, '网页设计师WEB设计师', '站酷招聘', 1453084902, '1名', '深圳市大疆创新科技有限公司', '8k-12k', '深圳 ', '经验不限', '全职', '工作职责：<br>负责DJI&nbsp;内部软件界面设计，网页设计等.', '-请一定要发送作品到邮箱，作品与审美风格为首要评判标准；<br><br>-在4A广告设计公司、大型互联网公司有相关工作经验者优先；<br><br>-需具备一定的专业素质，项目经验，良好的沟通协做能力，独立的创新思维;<br><br>-英语熟练，能够与外国人进行沟通；<br><br>-熟练的Photoshop，AI，Sketch等软件操作技术，并具备一定的学习能力.<br><br>-有海外留学、游学、工作经验者优先。<br><br><br><br>有意者请发送简历及作品到&nbsp;kay.hu@dji.com，并标明应聘岗位。', '设计部', '深圳市南山区创维半导体设计大厦', '2016/0118/20160118104142881.jpg', '大疆创新', '深圳市大疆创新科技有限公司', '', '生产/加工/制造', '', '1000人以上', '私营企业', '           	          '),
(57, '策划', '站酷招聘', 1453084902, '3名', '上海友尊文化传播有限公司', '8k-12k', '上海 ', '经验3-5年', '全职', '1、负责网站页面布局策划、给客户宣扬策划方案，界面流程及逻辑设计策划相关资源整合及管理，并审查页面设计成果；<br>2、负责平台网站的策划，协助提供网站新功能的总体规划以及细节策划文档；<br>3、完成网站内容构架、频道栏目策划、网站相关的产品策划、功能设计策划、界面设计策划；&nbsp;<br>4、执行网站规划、配合组织网站定位、网站风格、业务方向综合策划及对网站定位提出建议；<br>&nbsp;5、懂营销，熟悉网络营销，略懂优化。<br>', '1、专科以上学历，有相关工作经验者优先考虑；&nbsp;<br>2、熟悉网站内容构架、网站相关的产品策划、功能设计策划、界面设计策划；&nbsp;<br>3、能熟练应用办公软件，有良好的文字表达能力、较强的策划能力、扎实的网络营销基础；<br>&nbsp;4、较强的独立操作能力、逻辑思维能力，才思敏捷；<br>&nbsp;5、思路清晰，结构严谨并富有创意，踏实肯干，能承受较强的工作压力。<br>', '项目部', '淞兴西路258号5号楼5109室（半岛1919）', '2016/0118/20160118104142378.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(58, '用户界面设计师', '站酷招聘', 1453084902, '2名', '站酷猎头', '15k-20k', '北京 ', '经验3-5年', '全职', '1.和产品设计师一起制订产品策略<br>2.让&nbsp;Web&nbsp;端更具视觉吸引力和更易使用<br>', '1.可以为复杂的问题找到简单优雅的解决方案<br>2.设计工具的使用不会成为遏制想象力的瓶颈<br>3.了解技术的限制并能将自己的设计思路准确传递给其他人<br>4.心思细腻，迷恋细节，像素完美<br><br>', '设计部', '', '2016/0118/20160118104142220.png', '站酷猎头', '站酷猎头', 'http://www.zcool.com.cn', '互联网', 'www.zcool.com.cn', '50-100人', '私营企业', '           	          	<span class="label">为企业推荐优秀的设计人才</span>          	          	<span class="label">为设计师提供优质的工作机会</span>          	          '),
(59, '电商设计师', '站酷招聘', 1453084903, '2名', '上海可望创意设计有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、负责客户品牌的日常电商广告设计及线下设计<br>2、有独到的创意及设计手法，寻求最佳的视觉设计方案；<br>3、用视觉设计推荐商品、体现商品优势；<br>4、参加设计创意讨论、提出合理性设计方案。 ', '1、1~3年以上设计工作经验； <br>2、大专以上学历，美、术相关专业优先； <br>3、有较强美术功底，能熟练运用Photoshop、Illustrator等软件工具；<br>4、热爱并执着于视觉设计、网页设计；<br>5、具有深厚的美术功底和良好的创意构思能力，对色彩有深刻的把握力、独特的设计风格、独到的创意视点与创新意识；<br>6、有天猫店铺设计或电商设计经验优先。 ', '设计师', '上海市黄浦区旺角广场', '2016/0118/20160118104143133.png', '可望创意', '上海可望创意设计有限公司', 'http://www.coreonesh.com', '广告/公关/会展', 'www.coreonesh.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">绩效奖金</span>          	          '),
(60, '互动设计师', '站酷招聘', 1453084903, '2名', '上海利宣广告有限公司', '5k-8k', '上海 ', '经验不限', '全职', '为一系列知名国际品牌提供互动创意的想法和制作，客户涵盖化妆品，汽车，服装配饰，家装，IT等。<br>主要负责客户的网站（官网，minisite），微信，微博的视觉设计，熟知国内各大社交平台。<br>在创意设计总监的指导下完成客户的创意表现。<br>了解客户需求，并密切与客户部，策略部和其他部门合作，将客户需求贯彻到创意中。<br>注重创意工作的出品质量，保证产品美术创作符合客户的诉求点。<br>维护和提高公司的创意标准和程序。<br><br>请将作品简历发送至以下邮箱：momo.li@net-show.cn&nbsp;,&nbsp;lee.li@net-show.cn&nbsp;,&nbsp;winn.wang@net-show.cn<br><br><br><br><br>', '美术设计，UI设计相关专业2年以上经验<br>熟练操作AI，PHOTOSHOP等设计软件<br>有扎实的美术功底，具备手绘能力，略懂程序<br>高度适应能力以及抗压能力<br><br>公司福利<br>每月综合补助（加班餐补，出租车费报销）<br>员工年度体检<br>员工年度旅游（境外为主）<br>组织不定期团建活动（如各类专业培训、拓展训练、聚餐等）<br>庆生会、节日祝福及礼品等<br>', '创意部', '灵石路658号802室（大宁财智中心）', '2016/0118/20160118104143650.png', 'Net-show', '上海利宣广告有限公司', 'http://net-show.cn', '广告/公关/会展', 'http://net-show.cn', '50-100人', '私营企业', '           	          	<span class="label">弹性工作</span>          	          	<span class="label">年底分红</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">人性化管理</span>          	          '),
(61, '网页设计师', '站酷招聘', 1453084903, '5名', '一加三餐（上海）电子商务有限公司', '5k-8k', '上海 ', '经验不限', '全职', '1、独立负责天猫店铺的装修设计、活动促销页面等等<br>2、负责公司商品的图片的处理<br>3、商品描述模板设计以及信息上架<br>4、独立电子商务网站图片的设计<br><br>', '1、有着优秀的独力设计能力，熟练运用photoshop，懂Dreamweaver等设计软件先考虑。<br>2、有着非常好的审美意识，具有良好的版式设计和整体布局感觉先。<br>3、有着非常好的创意和想法，并且可以把想法转化为图像。<br>4、讲求实效，有强烈的责任感，能用心深入细节，追求完美，能够承受工作压力。<br>5、一年以上相关工作经验。<br>', '创意部', '徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层', '2016/0118/20160118104143250.png', '一加三餐', '一加三餐（上海）电子商务有限公司', 'http://www.ecmoho.com', '电子商务', 'www.ecmoho.com', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(62, '网页设计/美工', '站酷招聘', 1453084904, '1名', '北京动乐网络科技有限公司', '8k-12k', '北京 ', '经验3-5年', '全职', '1、负责页面广告图设计，有独立完成整个广告设计的工作能力；<br><br>2、&nbsp;独立完成海报、logo及网页的设计制作上传；<br><br>3、了解CSS+Html页面制作流程及基础代码；<br><br>4、逻辑思维清晰，做事认真、细致，表达能力强，具备良好的工作习惯<br>', '1、&nbsp;精通&nbsp;Photoshop、Dreamweaer、Illustrator、sketch等；<br>2、熟悉&nbsp;Html、css&nbsp;,会切图；<br>3、有较强的平面设计感觉及良好的美术基础；<br>4、有良好的学习能力、沟通能力和领悟能力，能够承受较大的工作压力；<br>5、有良好的团队合作意识，耐心、诚恳，有强烈的责任心和积极主动的工作态度；<br>6、2年以上网站设计相关经验，熟悉网站建设流程；<br>7、有Wap端、H5设计经验者优先。简历需附带个人作品或作品链接<br>', '平台事业部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0118/20160118104144228.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(63, '网页设计师', '站酷招聘', 1453084904, '5名', '北京创锐文化传媒有限公司', '5k-8k', '北京 ', '经验1-3年', '全职', '1.&nbsp;负责网站产品及活动类系列视觉创意设计工作；<br>2.&nbsp;负责对外广告形象创意设计；&nbsp;<br>', '1.本科及以上学历，设计类相关专业；&nbsp;<br>2.有1年以上相关工作经验；&nbsp;<br>3.擅长视觉设计和创意表现类的工作；&nbsp;<br>3.掌握各种视觉设计软件，并精通至少2种；<br>4.习惯先动脑，后动手,&nbsp;有较强执行能力；&nbsp;<br>备注：投递简历时请附带个人作品&nbsp;，谢谢', '创意部', '东四十条A口，中汇广场B座20层', '2016/0118/20160118104144317.png', '聚美优品', '北京创锐文化传媒有限公司', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '电子商务', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '500-1000人', '私营企业', '           	          '),
(64, '网页设计师', '站酷招聘', 1453084904, '3名', '北京奇虎科技有限公司', '面议', '北京 ', '经验不限', '全职', '1.负责公司游戏产品的相关视觉设计工作；<br>2.参与项目创意前期视觉用户研究、设计流行趋势分析，主导设定整体视觉风格和VI设计；<br>3.负责定期分享优秀案例或设计心得。<br>', '1.能独立完成平面、网站等视觉设计；<br>2.&nbsp;开过像素眼，拥有无影手，有一定设计理论知识，具有创新能力，色彩感强，对各种设计趋势有灵敏触觉和领悟能力；<br>3.有较好的沟通能力，具备团队合作精神，并富有创造力和责任感，能承受高强度的工作压力；<br>4.学历不限，无论你是潜力股还是设计大牛，我们都非常欢迎。<br>', '游戏部门', '北京市朝阳区奇虎360', '2016/0118/20160118104144917.jpg', '奇虎360', '北京奇虎科技有限公司', 'http://www.360.cn/', '互联网', 'http://www.360.cn/', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          ');
INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(65, '主设计师/设计主管', '站酷招聘', 1453084905, '2名', '上海马克华菲电子商务有限公司', '面议', '上海 ', '经验3-5年', '全职', '岗位职责：<br>1、负责马克华菲MF或RESHAKE品牌所有线上平台(天猫、京东、一号店、优购、唯品会等)的整体形象设计，把握线上渠道整体风格和视觉呈现，全面提升整体视觉效果。<br>2、管理设计团队，与运营部，策划部，视觉部密切配合，根据公司的营销活动方案完成天猫旗舰店及其他平台的大型活动、店铺活动的主题页面设计和广告图片的设计任务。<br>3、监控天猫、京东、一号店、优购、唯品会等活动页面效果并优化用户体验。<br>4、负责大型设计项目和外界供应商的对接工作。', '任职资格：<br>1、美术、设计或相关专业大专以上学历，有扎实的美术功底。<br>2、3年以上平面设计、网页设计工作经验，有电商平台设计经验，服装或时尚行业工作经验优先。<br>3、有敏锐的时尚触觉，较强的色彩搭配能力及审美观念。<br>4、精通Photoshop、Illustrator 、Dreamweaver等设计软件，丰富的平面设计经验。<br>5、具备良好团队管理能力，并富有工作激情、创新欲望和责任感，并能推动团队的设计能力。<br>关于马克华菲<br>官方网站：www.markfairwhale.com<br>天猫-马克华菲官方旗舰店： http://fairwhale.tmall.com<br>天猫-华菲型格官方旗舰店：http://fairwhaleshake.tmall.com<br>天猫-马克新绅士官方旗舰店：http://makexinshenshi.tmall.com', '电子商务部', '上海市徐汇区龙漕路-地铁站', '2016/0118/20160118104145345.png', '马克华菲', '上海马克华菲电子商务有限公司', 'http://www.markfairwhale.com', '其他', 'www.markfairwhale.com', '1000人以上', '私营企业', '           	          	<span class="label">时尚</span>          	          	<span class="label">服装</span>          	          	<span class="label">潮人</span>          	          	<span class="label">幸福</span>          	          '),
(66, '页游-高级视觉设计师', '站酷招聘', 1453084905, '1名', '深圳市迅雷网络技术有限公司', '12k-15k', '深圳 ', '经验3-5年', '全职', '1.负责云加速产品设计：牛X页游官网、游戏官网、积分官网、金钻官网、平台官网、游戏盒子以及运营活动页相关设计工作；&nbsp;<br>2.根据产品和运营需求，独立完成设计方案，并对方案进行总结评估；&nbsp;<br>3.配合交互，前端调整视觉设计，跟进项目上线发布。', '1.美术或相关专业毕业，具备设计相关工作经验2年以上;&nbsp;<br>2.对产品流程、用户流程及用户需求有深入理解，了解网站开发工作流程和页面制作流程;&nbsp;<br>3.有良好的创意理念和页面版式规划能力，能很好的把握色彩与网页布局，熟悉用户体验;&nbsp;<br>4.具备优秀的视觉表达能力,，有门户网页设计与活动专题设计的相关经验，具备自己独有的设计风格,并成功运用在产品设计中。', '云加速', '科技园', '2016/0118/20160118104145268.jpg', '迅雷', '深圳市迅雷网络技术有限公司', '', '互联网', '', '1000人以上', '私营企业', '           	          '),
(67, 'web前端工程师', '站酷招聘', 1453084905, '10名', '上海友尊文化传播有限公司', '面议', '上海 ', '经验1-3年', '全职', '1、Web页面和交互制作于开发。<br>2、移动客户端应用和交互制作(HTML5、mobile&nbsp;js)。<br>3、要有团队意识、良好的合作态度、激情、责任心和沟通能力。<br>', '1、&nbsp;熟练掌握DIV&nbsp;CSS样式编写，能精确规划网页结构，融入bootstrap、foundation等新颖技术,熟悉canvas绘图原理。<br>2、&nbsp;熟悉Dreamweaver、webstorm等设计软件，并根据界面设计图制作出符合规范的网页。<br>3、&nbsp;熟练运用各种javascript网页特效。熟悉jq、angularjs、json等js开发框架。<br>注：按照产品计划完成前端实现、符合web标准并保证质量。熟悉HTTP协议及W3C相关互联网规范；较强的文档编写能力；熟悉Jquery框架，熟练掌握Javascript。<br>UIMIX感谢设计师小主、贵人们的投递：<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;丰厚项目季度奖及超级棒棒哒年终奖&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！）<br>公司网址：www.uimix.com<br>（备注：薪资待遇根据能力定义，以上只是大框架，能者多酬劳！）<br>', '开发部', '上海市-宝山区', '2016/0118/20160118104145541.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(68, 'WEB前端工程师--H5', '站酷招聘', 1453084906, '2名', '辉塔信息技术咨询（上海）有限公司', '面议', '上海 ', '经验不限', '全职', '1、负责将网页效果图切成HTML代码；<br>2、网站前端页面制作、优化，以及JS互动效果实现；<br>3、能够不断的对前端代码进行优化，使网站符合SEO的要求；<br>4、调试网站页面在不同浏览器下的兼容性；<br>5、调试手机端页面在有不同手机终端下的兼容性；<br>6、负责与设计人员和开发人员的沟通。<br>', '1、精通DIV+CSS流动布局的HTML代码编写，熟练手写标准WEB页面符合W3C标准；熟练使用常规网站制作软件；<br>2、精通JavaScript开发,能够熟练的使用JavaScript进行面向对象编程；<br>3、熟悉调整各种跨浏览器兼容性技术；<br>4、熟悉手机端html5页面开发；<br>5、具备较强的快速学习能力，独立解决问题能力和抗压能力；<br>', '技术部', '上海市-浦东新区', '2016/0118/20160118104146191.jpg', 'faceui', '辉塔信息技术咨询（上海）有限公司', 'http://www.faceui.com', '互联网', 'www.faceui.com', '50-100人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">交通补助</span>          	          '),
(69, '家具表现设计师', '站酷招聘', 1453084906, '2名', '北京造化科技有限公司', '8k-12k', '北京 ', '经验不限', '全职', '首先去看zaozuo.com，这个命题才能继续<br><br>这是一个最感性又温柔的职位<br>你需要理解和品位生活，同时又是一个关注张力和表现力的人<br><br>为什么在这个场景里，这个人的鞋子如此优雅<br>为什么在这个餐厅，桌上的食物看上去无比诱人<br>为什么在这条街道，灯光显得无比灿烂<br>为什么那件外套，在这个橱窗里闲的如此诱惑<br><br>你要解读你看到的一切，变成一种对生活的理解<br>造作的产品是需要这样的设计师来设计ta的表现力，如何在拍摄时摆放，如何讲述，可以让人怦然心动？如何在网页上呈现才能让人无法拒绝？<br><br>这是一项我们极其重视的技能<br><br>哪怕花一年遇到你，也是缘分<br>祝我们有缘相见<br>', '1：仅仅PS就够了<br>2：必须热爱生活，造作是做生活方式的<br>3：好品味<br>4：一个负责之人<br>5：勇于否定自己，向前迈步<br>6：可以熟练的运用你的平面手腕，把聆听到的每一个产品的故事，用图片讲述出来（最重要）<br>7：了解简单的UI知识<br>', '设计部、运营部', '北京市朝阳区北京造化科技有限公司', '2016/0118/20160118104146185.png', '造化科技', '北京造化科技有限公司', 'http://zaozuo.com', '电子商务', 'zaozuo.com', '50-100人', '其他', '           	          	<span class="label">活力无限</span>          	          '),
(70, '网页设计师偏运营类', '站酷招聘', 1453084906, '1名', '上海春迪网络科技有限公司', '12k-15k', '上海 ', '经验1-3年', '全职', '设计，拍摄产品推广图片。', '1、三年以上平面设计相关工作经验，有运营经验优先，有丰富的品牌、宣传品、推广活动、包装等方面的设计经验&nbsp;<br>2、扎实的美术功底及整体色彩，布局把握能力，视觉美感及创意构思能力；熟练使用photoshop，illustrator等绘图软件及dreamwear等平面设计软件&nbsp;<br>3、熟练使用日常办公软件&nbsp;<br>4、创意构思能力；表达沟通能力&nbsp;<br>5、注重细节，能接受创业企业，对未来拥有梦想并拥有高度责任感，能承受一定的加班和工作压力', '设计部', '上海市黄浦区淮海中华大厦', '2016/0118/20160118104146427.png', '发条科技', '上海春迪网络科技有限公司', '', '互联网', '', '1-50人', '私营企业', '           	          	<span class="label">微信</span>          	          	<span class="label">互联网</span>          	          '),
(71, '视觉设计师', '站酷招聘', 1453084907, '2名', '上海迈若网络科技有限公司', '面议', '上海 ', '经验不限', '全职', '网页设计，UI相关工作', '任职要求：&nbsp;<br>1.&nbsp;有较强的美术功底和良好的设计表现力，能准确把握网站的整体风格及视觉表现，对网站的结构策划有一定经验。<br>2.&nbsp;三年以上网站设计、有平面设计经验者优先&nbsp;。&nbsp;<br>3.&nbsp;领悟能力强，能够理解先进的技术和概念，较强的创新能力。&nbsp;<br>4.&nbsp;精通Photoshop，&nbsp;flash，fireworks&nbsp;等软件。&nbsp;<br>5.&nbsp;良好的沟通能力及团队协作能力，富有责任心，学习能力强，能承受较强的工作压力&nbsp;', '设计部', '上海市-长宁区', '2016/0118/20160118104147102.jpg', '迈若网络', '上海迈若网络科技有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          	<span class="label">季度奖金</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">节日福利</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">团队轻松</span>          	          	<span class="label">工作激情</span>          	          '),
(72, '网页设计师', '站酷招聘', 1453084907, '2名', '深圳市阿牛哥智慧生活医药有限公司', '5k-8k', '深圳 ', '经验1-3年', '全职', '1、负责大型医药电商网站PC端UI界面创意、设计及网页制作；<br>2、负责大型医药电商网站移动端H5版UI界面创意、设计及网页制作；<br>3、负责天猫、京东及管网旗舰店等产品详情页美术创意、设计及网页制作；<br>4、参与用户交互研究，把握官网、天猫等平台整体风格、视觉效果；<br>5、紧密配合产品经理、市场部、开发团队，完成页面设计。<br>6、完成网页的制作；<br>7、完成公司的其他UI或平面的设计工作。<br>', '1、美术或设计专业专科以上学历；<br>2、扎实的美术基础和设计功底；<br>3、熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4、数量掌握Dreamweaver&nbsp;等网页制作软件,熟悉HTML、CSS等技术；<br>4、对PC端及移动端（APP）UI设计趋势有灵敏触觉和领悟能力；<br>5、对界面设计、图片处理、平面设计有深刻的理解，有敏锐设计感；<br>6、对视觉用户研究有一定经验和见解，对互联网产品可用性有深入的认识；<br>7、有团队精神和工作激情，能适应较高强度的工作环境。<br><br>---------------------------------------------------------------------<br>赶快加入阿牛哥……….<br><br>我们给你的，&nbsp;不会是一份朝九晚五，待遇看资历，上班忙炒股的工作！<br>而是一份让你倍感兴奋、既有前途更有钱途的工作。&nbsp;<br>&nbsp;<br>一个财富弯道超车的机遇<br>行业著名大咖独创的商业模式，上有云端互联的健康管理，下有智慧医疗和智慧药店的专业服务体系，形成完整的健康服务及商业闭环。<br>&nbsp;<br>大咖问你，Are&nbsp;you&nbsp;OK？<br>创始团队包含各领域精英，深受投资界热捧！<br>当接地气的医药，遇到飘天上的智能生活，连接的机遇悄然发生，火箭开始准备起飞，你准备好跟着我们去改变中国，去成为中国智慧健康领域的阿牛哥吗？<br>&nbsp;<br>开放、个性是唯一标签<br>开放办公环境，85、90后妹子靓仔遍地，我们鼓励你提出不同观点，支持随时开撕！<br>至于领导？领导是什么？是牛么？可以拉马车么？<br>&nbsp;<br>我们唯一的承诺是你可以完全做你自己，告别职场“装”时代！<br>我们为每位提供良好的发展空间，如果你能一个人顶几个人用，快速适应环境且扛得住压力，那么毫不犹豫来上班吧！<br>否则，你失去的会是一个短时间内加速成长自己，同时也失去高成长高回报的高速发展空间的机会。<br>这儿，有你最想要的青春！<br>', '用户体验设计部', '南山大道', '2016/0118/20160118104147130.png', '阿牛哥', '深圳市阿牛哥智慧生活医药有限公司', 'http://www.zanwj.com/', '互联网', 'http://www.zanwj.com/', '1-50人', '私营企业', '           	          	<span class="label">移动医疗</span>          	          	<span class="label">医药电商</span>          	          	<span class="label">良好的办公环境</span>          	          	<span class="label">优秀的团队</span>          	          	<span class="label">#轻松的工作氛围</span>          	          '),
(73, '网页设计师', '站酷招聘', 1453084907, '1名', '上海态趣服装有限公司', '面议', '上海 ', '经验不限', '全职', '1.&nbsp;负责网页设计', '1.&nbsp;对潮流文化及街头着装风格有独特理解者优先<br>2.&nbsp;能熟练运用Photoshop、Illustratorr等应用软件<br>3.&nbsp;成熟的绘画技巧，对色彩、图形、字体敏感；有丰富的想象力和创造力<br>4.&nbsp;有团队合作精神，认真负责<br>5.&nbsp;需要有1-2年相关工作经验<br>6.&nbsp;有相关行业经验的优先录用', '设计部', '上海市-长宁区', '2016/0118/20160118104147642.jpg', 'THETHING', '上海态趣服装有限公司', 'http://www.thething.cn', '其他', 'www.thething.cn', '1-50人', '私营企业', '           	          '),
(74, '网页设计师', '站酷招聘', 1453084907, '2名', '昊盈信息技术（成都）有限公司', '面议', '成都 ', '经验1-3年', '全职', '请通过此链接投递您的简历：https://nexa-corp.workable.com/jobs/171998<br>我们只考虑通过公司网页应聘的人选<br><br>1.Website&#39;s&nbsp;design&nbsp;and&nbsp;front-end&nbsp;implement<br>公司网页的视觉设计和前端代码实现<br>2.Create&nbsp;brand&nbsp;visual&nbsp;design&nbsp;assets&nbsp;based&nbsp;on&nbsp;brand&nbsp;concept<br>品牌视觉设计<br>3.Create&nbsp;other&nbsp;visual&nbsp;design&nbsp;related&nbsp;assets<br>其他相关的视觉设计', '1.Above&nbsp;college&nbsp;degrees,major&nbsp;in&nbsp;graphic&nbsp;design,art-related&nbsp;fields.&nbsp;have&nbsp;excellent&nbsp;artistic&nbsp;capacity<br>平面设计等相关专业大专以上学历，有扎实美术功底和手绘基础<br>2.Have&nbsp;a&nbsp;good&nbsp;command&nbsp;of&nbsp;photoshop，Illustrator，dreamweaver&nbsp;etc.<br>精通使用photoshop，Illustrator，dreamweaver等设计软件<br>3.Familiar&nbsp;with&nbsp;html，css，div+css<br>熟悉html，css，div+css布局<br>4.Have&nbsp;insightful&nbsp;view&nbsp;on&nbsp;website&nbsp;design&&nbsp;development&nbsp;tendency<br>对网站设计有独到见解，对网站设计发展趋势有很好的把握<br>5.Skills：Learning&nbsp;skill,&nbsp;Innovation,&nbsp;Initiative&nbsp;consciousness<br>领悟力强，较强的创新能力和主动意识。', 'Post-production', '成都市锦江区ifs国际金融中心一号办公楼', '2016/0118/20160118104148338.png', '昊盈信息技术', '昊盈信息技术（成都）有限公司', 'http://www.nexa-corp.com', '互联网', 'www.nexa-corp.com', '1-50人', '私营企业', '           	          	<span class="label">手机游戏</span>          	          	<span class="label">市场研究</span>          	          '),
(75, '网页兼平面设计师', '站酷招聘', 1453084908, '3名', '上海慨一实业有限公司', '8k-12k', '上海 ', '经验3-5年', '全职', '负责公司网页以及平面设计的工作。', '1、3年以上网页设计工作经验，有成熟的网页设计作品；<br>2、熟练使用&nbsp;PS、AI&nbsp;、FLASH等图像处理软件；<br>3、熟知线上线下物料；<br>4、会网页的同时也会平面设计；<br>5、能接受加班；<br>6、团队合作意识较强。', '设计部', '静安区南京西路934号406室', '2016/0118/20160118104148548.jpg', '慨一实业', '上海慨一实业有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(76, '高级用户体验研究设计师', '站酷招聘', 1453084908, '2名', '上海洛可可整合设计有限公司', '面议', '上海 ', '经验1-3年', '全职', '1、负责设计实施各种用户研究，分析用户需求及产品使用行为，统计分析各项用户体验研究数据，为设计及产品开发提供依据和建议；<br>2、产品可用性测试：理解设计需求及问题，设计测试方案，进行测试工作并完成测试报告；<br>3、项目管理：负责与客户的沟通过，推动项目顺利执行，按时交付设计成果；&nbsp;&nbsp;<br>4、制作用户访谈、问卷调查等具体执行方案；执行用户访谈，与用户进行面对面的沟通，了解用户特征，挖掘用户需求，并能快速记录所获得的重点信息；&nbsp;<br>5、运用专家评估、桌面研究、竞争分析等方法对相关产品进行用户体验水平评估；&nbsp;<br>6、对收集到的用户、市场等信息进行整理分析，并提出设计改进建议，制作相应的研究报告；&nbsp;', '1、熟练掌握各种用户研究方法，有坚实的统计和数据分析基础，逻辑分析能力强，善于独立思考，善表达与沟通；<br>2、有独立执行深度访谈、可用性测试、专家评估、问卷调查等用户研究工作的经历和能力，须有相关案例介绍；<br>3、思维活跃，能接受挑战，认真踏实，做事细致严谨，积极主动，并能同时应对多个项目，能针对不同项目有效权衡和分配工作时间；<br>4、心理学、社会学、统计学、人机交互或相关专业，本科以上学历，硕士学历者优先；', 'UED部门', '上海市-黄浦区', '2016/0118/20160118104148146.png', '上海洛可可', '上海洛可可整合设计有限公司', 'http://www.lkkdesign.com', '艺术/文化传播', 'www.lkkdesign.com', '500-1000人', '私营企业', '           	          	<span class="label">独具一格的设计公司</span>          	          '),
(77, '平面设计师', '站酷招聘', 1453084908, '1名', '上海随时信息科技有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、负责公司品牌营销资料以及VI视觉传达创意、设计和制作<br>2、完成公司的平面设计和印刷品设计需求，包括PPT、海报、宣传品、创意展示、印刷品、微信以及微信美工等<br>3、配合市场推广、活动策划进行相应专题推广页面的设计制作、图片处理等', '1、美术或其他相关专业，优秀的色彩以及图形把握能力，具备独立设计操作能力<br>2、1年以上平面设计或网站美工经验，熟练掌握图形设计软件<br>3、对图片有较强的审美力，能根据需求设计版面风格<br>4、做事认真细致，善于沟通<br>5、具备优秀的执行力以及良好的工作习惯<br>', '市场部', '国定东路200号4幢302室', '2016/0118/20160118104148337.png', '领路', '上海随时信息科技有限公司', 'http://www.mentornow.com/', '互联网', 'http://www.mentornow.com/', '1-50人', '私营企业', '           	          	<span class="label">高前景</span>          	          	<span class="label">团队优秀</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">年终奖</span>          	          	<span class="label">苹果电脑</span>          	          '),
(78, '包装设计师', '站酷招聘', 1453084909, '1名', '上海一融设计咨询有限公司', '12k-15k', '上海 ', '经验不限', '全职', '包装设计师，具备3d设计能力，如善用c4d软件。&nbsp;协助并执行设计概念', '包装设计师，具备3d设计能力，如善用c4d软件。&nbsp;协助并执行设计概念', '设计部', '淮海西路666号2206室', '2016/0118/20160118104149985.jpg', 'Rong', '上海一融设计咨询有限公司', 'http://www.rong-design.com', '广告/公关/会展', 'www.rong-design.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          '),
(79, '广告设计', '站酷招聘', 1453084909, '1名', '在线途游（北京）科技有限公司', '面议', '北京 ', '经验不限', '全职', '1.&nbsp;主要负责公司效果广告投放的广告图文素材制作；<br>&nbsp;<br>2.&nbsp;配合投放人员的需求制作不同风格的素材，并根据投放人员的数据反馈更换或优化<br>素材；<br>&nbsp;<br>3.&nbsp;了解最新的设计发展趋势，收集行业竞品的信息，从美术角度配合投放人员共同提<br>高投放效果；<br>&nbsp;<br>4.&nbsp;协助完成市场品牌的其它平面设计需求。', '1.&nbsp;大专及以上学历，美术、艺术设计、工业设计、平面设计、广告设计等相关专业&nbsp;或<br>有1年以上相关经验；<br>&nbsp;<br>2.&nbsp;有扎实的美术功底和优秀的设计动手能力，审美观正常，色彩搭配感觉好，能够围<br>绕产品需求做出不同风格的素材；<br>&nbsp;<br>3.&nbsp;熟练使用Photoshop、Illustrator、Flash等相关的设计软件（至少其中一种）；<br>&nbsp;<br>4.&nbsp;学习能力强，乐于沟通。能够根据工作需求不断学习；<br>&nbsp;<br>5.&nbsp;做事严谨认真，对自己的工作成果负责；<br>&nbsp;<br>6.&nbsp;面试需带作品或发作品链接。', '品牌市场中心', '北京市-朝阳区', '2016/0118/20160118104149274.png', '途游棋牌', '在线途游（北京）科技有限公司', 'http://www.tuyoo.com/', '游戏', 'http://www.tuyoo.com/', '100-200人', '私营企业', '           	          	<span class="label">途游游戏</span>          	          '),
(80, '创意周边设计策划', '站酷招聘', 1453084909, '1名', '成都超有爱科技有限公司', '8k-12k', '成都 ', '经验不限', '全职', '百词斩周边产品策划<br><br>如果你是一枚种草小能手，总是能安利身边的朋友各种有趣，好玩，漂亮的产品<br>如果你是资深剁手族，国内外有什么设计师品牌，各种小众大众品牌都很熟悉<br>如果你觉得像line那样的周边产品萌萌哒<br>如果你热爱日本的周边文化<br>如果你总是觉得很多品牌的产品要么设计low，要么质量差，要么.......<br>如果你认为你总是有很多想法，想要把他们实践出来，想要设计出让朋友们都觉得为你而骄傲的产品<br><br><br>那么这个职位就简直就是为你量身定做了！<br><br>在这里，你会为百词斩策划周边产品，并与设计师合作将产品设计—&gt;生产—&gt;上架<br>在这里，可以满足你天马行空的想法，并且看到你的idea被很多百词斩的用户喜欢和欣赏<br>在这里，我们会提供让你的朋友们都觉得：“哇，不错哦。”的薪资与工作环境<br>', '工作内容：<br>1．收集广泛的国内外各种创意类产品的信息和动态，了解目标产品的功能和特性，评估与分析其市场潜力。<br>2．定期将收集的产品进行分类、筛选和询价，形成产品备选池。<br>3.&nbsp;为百词斩做周边产品策划，并与设计合作将产品商品化。<br>4．为产品寻找OEM代工厂并跟进生产和质检。<br>喜闻乐见的加分条件：开过淘宝小C店，或经营过任何线上平台网店，或线下实体店。', '运营部门', '成都市武侯区天府软件园e区', '2016/0118/20160118104149996.png', '百词斩', '成都超有爱科技有限公司', 'http://www.baicizhan.com', '互联网', 'www.baicizhan.com', '50-100人', '私营企业', '           	          	<span class="label">Mac</span>          	          	<span class="label">期权诱惑</span>          	          	<span class="label">税后薪资</span>          	          	<span class="label">可口饭菜</span>          	          	<span class="label">不加班</span>          	          	<span class="label">健身年卡</span>          	          '),
(81, '美工/网页设计', '站酷招聘', 1453084910, '2名', '百互润贸易（上海）有限公司', '面议', '上海 ', '经验1-3年', '全职', '1、负责天猫或其他平台（京东、聚美、1号店等）的设计装修、负责店铺的整体形象、首页、产品展示页面等模块的美工设计&nbsp;<br>2、负责上架产品进行排版、优化宝贝描述、美化产品图片等&nbsp;<br>3、定期更新设计店铺促销图片及页面，同时配合促销活动，调整及修改产品页面及店铺主页更新&nbsp;<br>4、店铺的日常维护及其他设计调整&nbsp;<br>5、图片尺寸调整、实物修片等美工&nbsp;<br>', '1、美术、平面设计等相关专业，专科以上学历&nbsp;<br>2、熟悉天猫或其他平台（京东、聚美、1号店）的设计装修流程、熟悉店铺的整体形象、首页、产品展示页面等模块的美工设计&nbsp;<br>3、精通设计软件Photoshop、Illustrator等，熟悉Dreamweaver、HTML等网页及图形制作软件&nbsp;<br>4、有良好的沟通及策略理解能力、极强的责任性和独立完成工作的能力<br>5、良好的抗压能力，并能接受工作需要的加班安排&nbsp;<br>6、有化妆品电子商务美工、网页设计或平面设计工作经验优先&nbsp;<br>面试时请提供设计作品<br>', '消费品事业部', '南京西路699号', '2016/0118/20160118104150144.jpg', '百润', '百互润贸易（上海）有限公司', '', '电子商务', '', '200-500人', '外商独资', '           	          '),
(82, '网页重构工程师', '站酷招聘', 1453084910, '3名', '深圳市玖作文化传播有限公司', '8k-12k', '深圳 ', '经验不限', '全职', '我们服务：腾讯、京东、网易、迅雷、百度、一号店等。<br>我们所做的东西，会在这些平台发布，让你的作品得到全国人的关注、议论。<br>与行业最TOP的人共事，获得行业新资料及知识。<br>加入我们，我们是WISEMIND&nbsp;-&nbsp;玖作文化。', '要求<br>1，精通XHTML及DIV布局重构，可快速构建稳健的HTML页面，精通CSS2.0样式表。<br>2，熟悉jQuery等常用前端代码库的使用。<br>3，熟悉html5及css3，有案例者优先。<br>4，对前端技术有强烈的兴趣，喜欢钻研；<br>5，踏实可靠，对待工作有强烈责任心，沟通良好；<br>6，工作经验1-2年；&nbsp;<br><br>官网：www.wisemind.cc<br>微博：weibo.com/szwisemind<br>邮箱：wisemindcareer@qq.com', '开发部', '广东省-深圳市-南山区', '2016/0118/20160118104150203.jpg', 'WISEMIND', '深圳市玖作文化传播有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(83, 'H5移动端研发工程师', '站酷招聘', 1453084910, '2名', '北京百舜华年文化传播有限公司', '20k-25k', '北京 ', '经验3-5年', '全职', '利用HTML5相关技术实现趣味休闲游戏研发，移动端内容维护；<br>解决移动设备包括iOS和Android的WebKit兼容性问题；', '熟悉H5开发常用算法；<br>精通Javascript、HTML/HTML5/XML、CSS/CSS3、Ajax、html5&nbsp;Canvas等前端开发技术<br>熟悉cocos2d-html5、cocos2d-jsbinding、QuarkJS或createsJS等html5框架<br>具有HTML5开发经验，熟悉html5标准；<br>使用HTML5的相关技术进行设计和开发，包括各种UI的研发；<br>使用HTML5进行图形化设计，制作动画效果；', '开发部', '北京市东城区银河soho(a座)', '2016/0118/20160118104150829.png', '魔漫相机', '北京百舜华年文化传播有限公司', 'http://www.momentcamoffical.com', '互联网', 'www.momentcamoffical.com', '50-100人', '私营企业', '           	          	<span class="label">九险一金</span>          	          	<span class="label">下午茶</span>          	          	<span class="label">零食铺子</span>          	          	<span class="label">员工活动</span>          	          	<span class="label">14薪</span>          	          	<span class="label">艺术气息浓郁</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">节日福利丰厚</span>          	          	<span class="label">成长空间</span>          	          '),
(84, '动画师', '站酷招聘', 1453084910, '1名', '深圳市青木文化传播有限公司', '面议', '深圳 ', '经验不限', '全职', '1、熟悉动画原理，有动画方面自己的创意。<br><br>2、精通flash、AE、PS,无纸动画软件。<br><br>3、具备动画制作的基础，懂得动画表演、运动规律、视听语言等。', '1、大专以上学历，有AE动画经验优先。<br><br>2、具备较好的美术修养，有构图意识，色彩关系意识，画面层次意识等。<br><br>3、良好的理解能力和学习能力，对待工作认真负责，善于思考，能够高效高质独立的完成工作。<br><br>PS：投简历请附上作品。', '设计部', '南山大道与创业路交界处南园枫叶大厦16M', '2016/0118/20160118104150290.jpg', 'treedom', '深圳市青木文化传播有限公司', 'http://treedom.cn', '互联网', 'treedom.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          '),
(85, 'UI设计师', '站酷招聘', 1453084911, '1名', '柒佰（北京）科技发展有限公司', '12k-15k', '北京 ', '经验1-3年', '全职', '1、负责参与产品的页面设计；<br>2、根据产品特点，把控整体设计风格、交互效果，页面制作及流程完善；<br>3、为日常的运营活动及功能维护提供视觉支持和持续优化。', '1、美术、设计或相关专业，能够熟练使用Photoshop、Illustrator、&nbsp;Flash、Dreamweaver等软件；<br>2、从事设计行业工作1年以上，有WEB电商页面项目和移动端的设计经验；<br>3、足够的自主思维和需求把握能力。具备一定的交互知识；对产品流程、用户操作流程及用户需求有深入理解；热爱用户界面设计，对于改善用户体验有深刻认识，能够从用户体验角度来设计界面；<br>4、具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br><br>投递简历请附带作品。', '数字产品部', '北京市东城区77文化创意产业园', '2016/0118/20160118104151483.png', '700Bike', '柒佰（北京）科技发展有限公司', 'http://www.700bike.com', '互联网', 'http://www.700bike.com', '50-100人', '私营企业', '           	          	<span class="label">自行车</span>          	          	<span class="label">电商</span>          	          	<span class="label">网站&APP</span>          	          	<span class="label">城市通勤</span>          	          	<span class="label">生活方式</span>          	          	<span class="label">健康潮流</span>          	          	<span class="label">简单快乐</span>          	          	<span class="label">环境Cool</span>          	          '),
(86, '网页设计经理', '站酷招聘', 1453084911, '3名', '站酷猎头', '20k-25k', '北京 ', '经验3-5年', '全职', '1.负责网站产品的创意设计工作；<br>2.负责网站活动类系列视觉创意设计工作；<br>3.负责对外广告形象创意设计；&nbsp;<br>4.指导flash设计师完成互动类表现工作。&nbsp;<br>', '1.&nbsp;教育背景：本科及以上学历，美术/设计类专业优先；<br>2.&nbsp;工作经验：设计行业工作3年以上，最好有时尚、服装类网站工作经验；<br>3.&nbsp;基础素质要求：美术基本功扎实，审美能力优秀，有创意和平面设计基础，对网页设计有一定见解和思路，善于沟通和学习；责任心强，富有团队精神，工作踏实细心。<br>4.&nbsp;专业能力要求：熟练掌握PS/AI等主流设计软件，具有独立设计能力，可以根据要求设计网页、造型、界面；具备一定的手绘能力。<br>', '创意部', '', '2016/0118/20160118104151776.png', '站酷猎头', '站酷猎头', 'http://www.zcool.com.cn', '互联网', 'www.zcool.com.cn', '50-100人', '私营企业', '           	          	<span class="label">为企业推荐优秀的设计人才</span>          	          	<span class="label">为设计师提供优质的工作机会</span>          	          '),
(87, '资深/中级视觉设计师', '站酷招聘', 1453084912, '4名', '北京深度沟通广告有限公司', '12k-15k', '北京 ', '经验3-5年', '全职', '1、负责公司重点项目和日常项目的支持；<br>2、项目提案设计、主要风格设计、项目全程设计；<br>3、部分项目全程沟通、协调，对策划、设计、制作、程序的全程负责。', '1、5年以上本职位工作经验；<br>2、优异的设计创意能力及独立完成个案的能力；<br>3、优秀的人机交互思想，具有整体框架性设计思维；<br>4、有较强的创新能力，对色彩的把握独到，能把设计风格和栏目特色进行有效的结合；<br>5、善于把握客户需求，对页面设计从多层面考虑；<br>6、有一定领导能力，有对作品全程负责的态度和毅力；<br>7、良好的沟通、领悟能力，具有团队合作精神和敬业精神，能与团队其他成员进行有效沟通；<br>8、像素级精确设计。<br><br>具备以下能力者优先考虑：<br>1、具备移动平台（iPhone，Android等）设计经验；<br>2、有带队经验；<br>3、有UED团队经验。<br><br>[应聘方式]：发送简历至 hr@deeping.cn<br>邮件标题请如以下格式：【职位名称】 + 姓名 + 【站酷网】，谢谢！<br>PS：请务必在简历中附上5个主要作品，作品可以网站链接形式发送，期待您的加入！', '用户体验部', '北京市-朝阳区', '2016/0118/20160118104152608.png', 'DEEP深度沟通', '北京深度沟通广告有限公司', 'http://www.deeping.cn', '互联网', 'www.deeping.cn', '50-100人', '私营企业', '           	          	<span class="label">用户体验</span>          	          	<span class="label">UCD</span>          	          	<span class="label">UE</span>          	          	<span class="label">UX</span>          	          '),
(88, '高级网页设计师', '站酷招聘', 1453084912, '2名', '北京凯罗天下科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '1.&nbsp;负责萝卜品牌（luobo.cn）WEB端/移动端官网设计重构及长期维护；<br>2.&nbsp;负责萝卜相关子站点及H5的设计。', '1.&nbsp;3年以上网页/移动站点设计经验；<br>2.&nbsp;优秀的平面美术功底及审美能力；<br>3.&nbsp;熟悉目前主流网页设计风格，对网页设计有独到理解；<br>4.&nbsp;应聘时请附个人作品。', '设计部', '建外SOHO东区9号楼', '2016/0118/20160118104152589.png', '飞鱼科技', '北京凯罗天下科技有限公司', '', '游戏', '', '200-500人', '私营企业', '           	          '),
(89, 'WEB前端工程师--H5', '站酷招聘', 1453084912, '2名', '辉塔信息技术咨询（上海）有限公司', '面议', '北京 ', '经验不限', '全职', '1、负责将网页效果图切成HTML代码；&nbsp;<br>2、网站前端页面制作、优化，以及JS互动效果实现；&nbsp;<br>3、能够不断的对前端代码进行优化，使网站符合SEO的要求；&nbsp;<br>4、调试网站页面在不同浏览器下的兼容性；&nbsp;<br>5、调试手机端页面在有不同手机终端下的兼容性；&nbsp;<br>6、负责与设计人员和开发人员的沟通。&nbsp;', '1、精通DIV+CSS流动布局的HTML代码编写，熟练手写标准WEB页面符合W3C标准；熟练使用常规网站制作软件；&nbsp;<br>2、精通JavaScript开发,能够熟练的使用JavaScript进行面向对象编程；&nbsp;<br>3、熟悉调整各种跨浏览器兼容性技术；&nbsp;<br>4、熟悉手机端html5页面开发；&nbsp;<br>5、具备较强的快速学习能力，独立解决问题能力和抗压能力；&nbsp;', '设计部', '北京市-朝阳区', '2016/0118/20160118104152427.jpg', 'faceui', '辉塔信息技术咨询（上海）有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(90, 'WEB设计师', '站酷招聘', 1453084912, '2名', '上海莫凡信息技术有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、具基本美术功底，配合项目组根据客户提供的资料进行规范和分析；<br>2、随时根据市场上最新的美术设计时尚元素，注重相关资料和图库的收集和调整；<br>3、能够根据客户需求，直接将客户所想的转化为设计作品；', '1、&nbsp;能独立完成项目的设计以及有较好的表达能力；<br>2、&nbsp;熟练操作PHOTOSHOP&nbsp;AI等相关设计软件；<br>3、&nbsp;具有1年以上网页或电商设计工作经验,&nbsp;有创意和设计能力；<br>4、&nbsp;热爱设计工作，工作认真负责，富有创意；<br>5、&nbsp;具有团队合作精神,能够吃苦耐劳；<br>6、&nbsp;设计相关专业专科以上学历；<br>7、&nbsp;有成熟的作品.', '设计部', '上海市-闵行区', '2016/0118/20160118104152539.jpg', 'MoreFun莫凡', '上海莫凡信息技术有限公司', 'http://www.morefun.me', '电子商务', 'www.morefun.me', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '),
(91, 'web前端开发', '站酷招聘', 1453084913, '2名', '智车优行科技（北京）有限公司', '15k-20k', '北京 ', '经验1-3年', '全职', '职位描述：<br>1.负责页面的切图工作；<br>2.协同程序员进行页面的调整和修改；<br>3.负责网站的页面呈现和重构。<br>', '任职要求：&nbsp;<br>1.熟练掌握HTML、CSS，Javascript，熟悉页面架构和布局。对Web标准和标签语义化有深入理解并有充分的经验<br>2.有两年以上网页重构经验；<br>3.对浏览器兼容与性能优化方面有丰富的经验；<br>4.有界面交互的产品感觉；<br>5.具有较强的学习能力和上进心。<br>', '智能应用部', '北京市朝阳区融科望京中心-b座', '2016/0118/20160118104153259.jpg', '智车优行', '智车优行科技（北京）有限公司', 'http://www.zhicheauto.com/', '互联网', 'http://www.zhicheauto.com/', '50-100人', '私营企业', '           	          	<span class="label">互联网+</span>          	          	<span class="label">智能硬件</span>          	          	<span class="label">车联网</span>          	          	<span class="label">智能汽车</span>          	          '),
(92, '资深/网页设计师', '站酷招聘', 1453084913, '1名', '百互润贸易（上海）有限公司', '面议', '上海 ', '经验3-5年', '全职', '1、按策划方案及网页设计规范进行网页美工设计，把握网页的整体风格及视觉效果&nbsp;<br>2、配合业务部门各类公关广告活动的推广页面设计工作：包括UI界面、横幅广告、邮件DM&nbsp;<br>3、设计友好的网页互交界面：包括专题设计、视觉设计、互交设计、用户体验和可用性分析&nbsp;<br>4、根据品牌风格定位和品牌推广策略，制作完善的客户提案&nbsp;<br>5、负责后期页面builder，后期维护工作&nbsp;<br>6、负责策划中项目的创意概念提供与沟通<br><br>', '1、大专及以上学历，美术、设计、计算机等相关专业&nbsp;<br>2、三年以上大型网站网页设计、制作经验。擅长图标设计，整体配色设计&nbsp;<br>3、熟练掌握网站主体风格设计，UI交互设计，用户体验设计&nbsp;<br>4、精通Photoshop、Flash、Illustrators、等设计软件，熟悉HTML、JavaScript&nbsp;DIV&nbsp;+&nbsp;CSS制作规范，架构页面程序&nbsp;<br>5、熟悉网页制作流程，能够独立完成首页及各级页面设计，动画以及HTML静态页面制作&nbsp;<br>6、了解网页SEO优化，web标准等&nbsp;<br>7、具有较高的艺术设计能力和美术功底，有一定的创意策划能力。对设计潮流把握准确&nbsp;<br>8、有优秀的团队合作意识，学习沟通能力。耐心、诚恳，有强烈的责任心和积极主动的工作态度&nbsp;<br>9、具有成熟的商业作品、丰富的设计案例尤佳<br>', '消费品事业部', '上海市-静安区', '2016/0118/20160118104153400.jpg', '百润', '百互润贸易（上海）有限公司', '', '电子商务', '', '200-500人', '外商独资', '           	          '),
(93, '视觉推广设计师', '站酷招聘', 1453084914, '2名', '北京搜狐新媒体信息技术有限公司', '15k-20k', '北京 ', '经验3-5年', '全职', '1.负责搜狐大客户的视觉创意；配合搜狐营销体系出品视觉方案；&nbsp;<br>2.sohu&nbsp;app，手机搜狐，搜狐网广告的创新。（精通web设计，mobile&nbsp;h5设计，手绘设计，动画设计）；<br>3.能把策略型思考落地为创意作品，表现出来。&nbsp;<br><br>', '1.具备优秀的设计能力，勇于创新，创意丰富；<br>2.把握互动创意和设计的前沿的趋势。具备优秀的互联网思维；<br>3.拥有良好的商业手绘功底优先，有优秀的网站作品优先；<br>4.熟练使用设计软件，Photoshop,flash,Illustrator等；<br>5.熟悉iOS和Android交互体验和UI设计规范；<br>6.具备良好合作态度及团队精神，有强烈的责任感,求完美，能够承受工作压力；<br>7.3年以上互联网，广告，互动营销行业相关工作经验。', '广告营销中心', '北京市海淀区搜狐媒体大厦', '2016/0118/20160118104154397.jpg', '搜狐', '北京搜狐新媒体信息技术有限公司', '', '互联网', '', '1000人以上', '私营企业', '           	          '),
(94, '网页设计师', '站酷招聘', 1453084914, '8名', '上海友尊文化传播有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '1.&nbsp;负责网站前端页面（包括PC端与移动端）的创意与设计；<br>2.负责完善网站推广页面及维护；<br>3.熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4.了解Dreamweaver&nbsp;等网页制作软件,对HTML、CSS等制作技术有一定了解；<br>', '1、网页设计相关工作经验1年以上，具备网页设计与活动专题设计的相关经验；有较强的网站设计能力，有门户网站设计经验，有较强的美术功底；（如无经验者大学毕业生，需提交优秀作品）<br>2、独立创新的风格设定能力、优秀的视觉表达能力；<br>3、具备自己独有的设计风格，并成功运用在产品设计中；<br>4、良好的团队合作精神，待人热忱，思维敏捷，良好的人际沟通能力，责任心强；<br>5、有很好的自学能力和上进心，能把握最新的设计趋势。<br>UIMIX感谢设计师小主、贵人们的投递：<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;丰厚项目季度奖以及超级棒棒哒年终奖&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！）<br>公司网址：www.uimix.com<br>（备注：薪资待遇根据能力定义，以上只是大框架，能者多酬劳！）<br>', '设计组', '上海市-宝山区', '2016/0118/20160118104154476.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(95, '网页设计师', '站酷招聘', 1453084914, '2名', '智车优行科技（北京）有限公司', '12k-15k', '北京 ', '经验3-5年', '全职', '1、配合运营部门完成公司文化宣传及项目活动平面设计工作；<br>2、海报、新闻文案配图设计等；<br>3、根据外宣活动方案，进行平面设计创意；<br>4、配合公司线上线下活动网页、微营销等推广设计；<br>', '1、3年以上相关工作经验；<br>2、能独立设计轻APP页面；<br>3、能独立设计完成微博微信图片等平面设计方案；<br>4、对设计趋势具有敏锐的洞察力，具备优秀的视觉设计表现能力；<br>5、良好的沟通能力，思维活跃，有创意，有激情<br>6、熟练Photoshop、AI、等软件。', '设计部', '北京市朝阳区融科望京中心-b座', '2016/0118/20160118104154879.jpg', '智车优行', '智车优行科技（北京）有限公司', 'http://www.zhicheauto.com/', '互联网', 'http://www.zhicheauto.com/', '50-100人', '私营企业', '           	          	<span class="label">互联网+</span>          	          	<span class="label">智能硬件</span>          	          	<span class="label">车联网</span>          	          	<span class="label">智能汽车</span>          	          ');
INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(96, 'UI设计师', '站酷招聘', 1453084914, '1名', '北京奇虎科技有限公司', '12k-15k', '北京 ', '经验1-3年', '全职', '1.为好搜（原360搜索）移动搜索及垂搜产品线服务，通过分析产品需求，提供优秀设计及创意；<br>2.负责产品界面、手机客户端界面的视觉设计及在线推广设计；<br>3.参与产品前期界面视觉用户研究、设计流行趋势分析，对网站产品进行持续视觉优化；<br>4.从全局角度把握界面美观度、色彩风格、图标、插图、产品气质品牌形象。<br>5.设定网站、手机应用及产品界面的整体视觉风格和VI设计，参与设计体验、流程的制定和规范；<br>6.分享设计经验、推动提高团队的设计能力。', '1.熟练photoshop、Illustrator等相关设计软件，对网站前端技术有基本的了解。<br>2.具有专业的视觉设计能力,能阐述具有说服力的设计理论.有比较全面的设计知识。<br>3.熟悉web端、移动客户端视觉设计，擅长把握各种设计风格。<br>4.对用户体验有深刻的认识，能够针对用户体验踊跃提出自己的建议并能不断推动改进的优先。<br>5.具备良好合作态度及团队精神，并富有工作激情、创造力和责任感。', '搜索事业部', '北京市朝阳区奇虎360', '2016/0118/20160118104154484.jpg', '奇虎360', '北京奇虎科技有限公司', 'http://www.360.cn/', '互联网', 'http://www.360.cn/', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(97, '助理Web设计师', '站酷招聘', 1453087592, '1名', '上海铭塔飞信息技术有限公司', '面议', '上海 ', '经验不限', '全职', '助理设计师通过工作提升自身WEB设计实力。<br>同时需要协助设计师进行WEB设计工作并且完成工作任务。', '年龄要求：20-30岁<br>学历要求：大专以上<br><br>对Web网站设计有极深的兴趣、Web以外（纸媒体、包装，广告等）有经验者。<br>Photoshop使用经验者。<br>在设计公司有工作经验者优先。<br><br>无工作经验者也没有关系，注重个人综合素质和设计潜力，公司愿意通过实际的案例训练培养与其共同成长。<br><br>补充：具有实际相关工作经验者，请注明本人作品的URL地址。', '设计部', '上海市长宁区延安西路-地铁站', '2016/0118/20160118112632787.jpg', 'Metaphase', '上海铭塔飞信息技术有限公司', '', '互联网', '', '1-50人', '私营企业', '           	          '),
(98, 'Web设计师', '站酷招聘', 1453087593, '1名', '上海铭塔飞信息技术有限公司', '面议', '上海 ', '经验不限', '全职', '我司客户主要以日系企业为主，提供网站的搭建制作等服务。<br>1、同客户担当一起，针对网站课题进行设计提案从而解决问题。<br>2、使用Photoshop等设计工具对客户网站的页面和Banner横幅广告进行全新设计；<br>3、对既有网站进行修改等。', '年龄要求：20-30岁<br>学历要求：大专以上<br><br>应聘资格（技能）：<br>具备网站制作公司从业经验<br>熟练使用Photoshop进行网页设计<br>对HTML、CSS等网页脚本有一定理解<br><br>若对HTML・CSS不了解的话，只有Photoshop设计经验者也可。<br><br>补充：具有实际相关工作经验者，请注明本人作品的URL地址。', '设计部', '上海市长宁区延安西路地铁-地铁站', '2016/0118/20160118112633712.jpg', 'Metaphase', '上海铭塔飞信息技术有限公司', '', '互联网', '', '1-50人', '私营企业', '           	          '),
(99, '资深网页设计师', '站酷招聘', 1454038821, '2名', '上海班田企业形象策划有限公司', '面议', '上海 ', '经验不限', '全职', '1、调研客户的品牌，做最适合客户的设计； 2、深入理解用户体验，做最易用的设计； 3、细节的完美体现，做最精致的设计； 4、沟通顺畅，高效对接工作每个环节； ', '1. 从事网页设计工作至少5年以上； 2. 美术基本功扎实，对PS/AI/CD/FL应用软件超级熟练； 3. 曾服务过至少3个知名品牌以上，作品数量需要达到30个以上； 4. 对时尚以及社会要有强烈认识； 5. 有独立创新能力及工作执行力； 6. 能与团队人员合作及沟通能力；', '', '上海市-杨浦区', '2016/0129/20160129114021326.png', '班田互动创意', '上海班田企业形象策划有限公司', 'http://www.brandsh.cn', '互联网', 'www.brandsh.cn', '1-50人', '私营企业', '           	          	<span class="label">数字营销</span>          	          	<span class="label">网页设计</span>          	          	<span class="label">社交媒体</span>          	          	<span class="label">APP</span>          	          '),
(100, '资深网页设计师', '站酷招聘', 1454038821, '5名', '上海磐特文化传播有限公司', '8k-12k', '上海 ', '经验5-7年', '全职', '参与网站、微站、app等项目的设计和建设提报<br>设计和创意平面主视觉和网站主视觉layout；<br>和网页程序员沟通，协助完成视觉设计到网页制作的转变；<br>制作网页前端程序，html页面，css，html5，切片<br>熟知企业官网、电商类网站、crm类后台管理；<br>维护更新网站内容；<br>能独立提出多种可执行设计方案，并撰写PPT说明。', '有独立操作网整站设计经验<br>对网页平面设计、app界面设计熟练掌握<br>对网页前端程序、html、css掌握，会html5者俱佳<br>懂得后台管理和程序是怎么一回事，能顺利和程序员共同协作并测试<br>具有一定的视觉眼光和品味，善于寻找网页设计素材，提高工作效率<br>擅长表达自己的设计思路和想法去说服客户<br>有一定的设计和传播素材库，所以反应迅速<br>抗压能力强、体力好<br>需附作品', '数字广告部', '上海市徐汇区田林路192号华鑫科技园101室', '2016/0129/20160129114021424.png', '美腾库博', '上海磐特文化传播有限公司', 'http://www.exmatecube.com ', '互联网', 'www.exmatecube.com ', '1-50人', '私营企业', '           	          	<span class="label">创意设计</span>          	          	<span class="label">数字广告</span>          	          	<span class="label">涨工资快</span>          	          	<span class="label">有高手带</span>          	          	<span class="label">老板幽默</span>          	          	<span class="label">气氛轻松</span>          	          	<span class="label">交通方便</span>          	          	<span class="label">团队旅游</span>          	          	<span class="label">可午睡</span>          	          '),
(101, '网页设计师', '站酷招聘', 1454038822, '3名', '上海班田企业形象策划有限公司', '面议', '上海 ', '经验不限', '全职', '1、调研客户的品牌，做最适合客户的设计；2、深入理解用户体验，做最易用的设计； 3、细节的完美体现，做最精致的设计； 4、沟通顺畅，高效对接工作每个环节；', '1、专科及以上学历；2、一年以上网页设计工作经验； 3、具有优秀的审美能力以及独特的创意，有较强的平面设计和网页设计创意能力； 4、精通Photoshop、Illustrator等设计软件（有优秀作品者优先） 5、对HTML、DIV+CSS布局有一定了解；', '', '上海市-杨浦区', '2016/0129/20160129114022182.png', '班田互动创意', '上海班田企业形象策划有限公司', 'http://www.brandsh.cn', '互联网', 'www.brandsh.cn', '1-50人', '私营企业', '           	          	<span class="label">数字营销</span>          	          	<span class="label">网页设计</span>          	          	<span class="label">社交媒体</span>          	          	<span class="label">APP</span>          	          '),
(102, '网页设计助理', '站酷招聘', 1454038822, '2名', '深圳欣米文化传播有限公司', '面议', '深圳 ', '经验一年以下', '全职', '我们是一群对设计偏执狂热的人，我们崇尚有价值的好设计，我们倡导自由激发式的工作氛围，我们追求极致的细节和生活态度。如果你热爱着设计，那么请加入我们。<br>主要负责公司视觉设计工作&nbsp;(电商、游戏等类）<br>公司网站：CIMIDESIGN.COM', '1.&nbsp;具备较强的沟通表达协调能力，踏实认真、性格开朗积极、有较强的抗压能力；<br>2.&nbsp;熟悉PS/AI等看家工具；<br>3.&nbsp;学习能力强，积极、主动，对设计富有激情', '设计部', '深圳市宝安区西乡-地铁站', '2016/0129/20160129114022532.png', '欣米文化', '深圳欣米文化传播有限公司', 'http://www.cimidesign.com', '互联网', 'www.cimidesign.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">开黑</span>          	          	<span class="label">国外旅游</span>          	          	<span class="label">LOL开黑</span>          	          '),
(103, '网页前端设计师', '站酷招聘', 1454038822, '1名', '广州银汉科技有限公司', '12k-15k', '广州 ', '经验3-5年', '全职', '岗位职责：<br>负责公司官网、产品网站、活动专题、手机H5页面等网站重构搭建及相关前端开发工作。<br><br>', '任职要求：<br>1、&nbsp;本科，三年以上网站重构、前端开发工作经验，有网站交互设计，技术开发，移动端页面重构开发等经验优先；<br>2、有良好的代码编写习惯及项目文件管理，能制定相关开发规范，高效响应需求；<br>3、精通HTML5，CSS3，熟悉JS，JQ，能做基础javascript开发；<br>4、有良好的理解和沟通表达能力，能承受工作压力，接受挑战。', '设计中心', '中山大道238号勤天大厦', '2016/0129/20160129114022247.png', '银汉公司', '广州银汉科技有限公司', 'http://www.yh.cn', '游戏', 'www.yh.cn', '500-1000人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年底双薪</span>          	          	<span class="label">年终奖</span>          	          	<span class="label">年度体检</span>          	          	<span class="label">年假</span>          	          	<span class="label">伙食补贴</span>          	          	<span class="label">免费</span>          	          	<span class="label">下午茶</span>          	          '),
(104, '网页视觉设计师', '站酷招聘', 1454038822, '10名', '深圳欣米文化传播有限公司', '面议', '深圳 ', '经验不限', '全职', '我们是一群对设计偏执狂热的人，我们崇尚有价值的好设计，我们倡导自由激发式的工作氛围，我们追求极致的细节和生活态度。如果你热爱着设计，那么请加入我们。<br>主要负责公司视觉设计工作&nbsp;(电商、游戏等类）<br>公司网站：CIMIDESIGN.COM', '1.&nbsp;具备较强的沟通表达协调能力，踏实认真、性格开朗积极、有较强的抗压能力；<br>2.&nbsp;二年以上的网页设计经验和相关作品<br>3.&nbsp;精通PS/AI等看家工具；<br>4.&nbsp;拥有宽广的行业视野及优秀的审美；<br><br>', '设计部', '深圳市宝安区西乡-地铁站', '2016/0129/20160129114023219.png', '欣米文化', '深圳欣米文化传播有限公司', 'http://www.cimidesign.com', '互联网', 'www.cimidesign.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">开黑</span>          	          	<span class="label">国外旅游</span>          	          	<span class="label">LOL开黑</span>          	          '),
(105, '资深设计师/设计师', '站酷招聘', 1454038823, '3名', '北京天纳广告有限公司', '面议', '北京 ', '经验不限', '全职', '参与创意，负责网页设计表现执行', '具备较强专业控制力<br>具备原创性<br>不以干行活为终极职业目标<br><br><br>有意应聘者请将简历和作品发至：hr@tamnaaaa.com', '创意部', '北京市朝阳区22院街艺术区', '2016/0129/20160129114023405.png', '天纳', '北京天纳广告有限公司', 'http://www.tamnaaaa.com', '影视/媒体', 'www.tamnaaaa.com', '1-50人', '私营企业', '           	          	<span class="label">天纳</span>          	          	<span class="label">TAMNAAAA</span>          	          '),
(106, '中级视觉设计师专题', '站酷招聘', 1454038823, '2名', '南京卓奇软件设计有限公司 ', '5k-8k', '南京 ', '经验1-3年', '全职', '1、负责偏向推广、营销、海报方向的页面视觉设计；<br>2、部分平面相关的设计；<br>3、页面中视觉元素的创意与绘制；<br>', '1、1年以上从业经验，学历不限；<br>2、熟练使用&nbsp;Ps&nbsp;或&nbsp;Sketch，Ai&nbsp;等视觉设计软件；<br>3、有一定相关项目经验；<br>4、热爱设计，有良好的美术功底，手绘能力优秀者优先；<br>5、良好的沟通能力，以及团队协作精神；', '设计部门', '珠江路88号新世界中心B座', '2016/0129/20160129114023337.jpg', '卓奇设计', '南京卓奇软件设计有限公司 ', 'http://www.zocdesign.net', '互联网', 'www.zocdesign.net', '50-100人', '私营企业', '           	          	<span class="label">高薪</span>          	          	<span class="label">福利全面</span>          	          	<span class="label">追求卓越</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">工作灵活</span>          	          	<span class="label">环境优良</span>          	          	<span class="label">年轻进取</span>          	          	<span class="label">下午茶</span>          	          '),
(107, '资深视觉设计', '站酷招聘', 1454038823, '1名', '南京卓奇软件设计有限公司 ', '12k-15k', '南京 ', '经验3-5年', '全职', '工作职责<br>-	负责偏向推广、营销、海报方向的页面视觉设计<br>-	部分平面相关的设计<br>-	页面中视觉元素的创意与绘制<br>-	设计反馈的翻译者，能够将客户等非设计专业人士的意见转化整理为实际可行的修改点；<br>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;能够担当视觉专题设计小组领导工作，给中级视觉&nbsp;初级视觉给予指导<br>', '职位要求<br>-	3年以上从业经验，学历不限；<br>-	优秀的审美，有能力提供让人眼前一亮的设计；<br>-	有一定相关项目经验；<br>-	热爱设计，有良好的美术功底，手绘能力优秀者优先；<br>-	良好的沟通能力，以及团队协作精神；<br>', '设计部门', '玄武区珠江路88号新世界中心B座1611', '2016/0129/20160129114023173.jpg', '卓奇设计', '南京卓奇软件设计有限公司 ', 'http://www.zocdesign.net', '互联网', 'www.zocdesign.net', '50-100人', '私营企业', '           	          	<span class="label">高薪</span>          	          	<span class="label">福利全面</span>          	          	<span class="label">追求卓越</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">工作灵活</span>          	          	<span class="label">环境优良</span>          	          	<span class="label">年轻进取</span>          	          	<span class="label">下午茶</span>          	          '),
(108, '文案策划经理', '站酷招聘', 1454038823, '3名', '北京蓝桃文化有限公司', '8k-12k', '北京 ', '经验1-3年', '全职', '1、关注互联网新鲜事，熟知网络语言，擅长“一句顶一万句”。<br>2、负责提供优质、高效的创意方案，确保满足客户需求；&nbsp;<br>3、关注客户及竞品的品牌策略与市场策略，提出对应的方案；<br>4、极佳的文字驾驭和创作能力，能独立撰写完成各种活动策划和品牌基础物料的撰写。', '1、两年以上互联网公司市场部、4A公司、数字营销公司经验；<br>2、能够独立策划、文案撰写，有赋予事件以意义的策划能力<br>3、有在活动前期掌控传播、造势的能力，了解传播规律和常用媒介；了解互联网用户心理，有“网感”<br>4、了解活动策划中如何制造亮点，能够预知流程中的用户气氛<br>5、对于高强度爆发的活动执行工作，有兴奋感<br>6、较好的逻辑思维能力，创意想法多，有良好的执行力。', '品牌部', '广顺北大街融创动力产业园B223', '2016/0129/20160129114024589.png', '蓝桃文化', '北京蓝桃文化有限公司', 'http://www.lantaochina.com', '广告/公关/会展', 'www.lantaochina.com', '50-100人', '私营企业', '           	          '),
(109, '文案', '站酷招聘', 1454038824, '1名', '北京蓝桃文化有限公司', '面议', '北京 ', '经验不限', '全职', '1、组织参与重要项目的创意构思、文案及客户提案,&nbsp;给予前期提案、设计创意说明及后期结案报告等服务。&nbsp;&nbsp;&nbsp;&nbsp;<br>2、在设计师指导下，执行并监督所负责项目的创意构思和文案。&nbsp;&nbsp;&nbsp;&nbsp;<br>3、稿件思路清晰，能够完成稿件写作思路规划。&nbsp;&nbsp;&nbsp;&nbsp;<br>4、协助项目经理进行创意提案，保证工作的顺利推进。&nbsp;&nbsp;&nbsp;&nbsp;<br>5、独立撰写各类稿件（新闻稿、综述稿、评论稿、专访稿等）、策划方案、报告等。', '1、新闻学、传播学、中文、经济管理类相关专业，大学本科以上学历。&nbsp;&nbsp;&nbsp;&nbsp;<br>2、熟悉品牌推广行业，三年以上市场策划及文案工作经验，有整合推广成功案例者优先。&nbsp;&nbsp;&nbsp;&nbsp;<br>3、能够准确捕捉产品亮点，具备恰如其分的文字表现能力。&nbsp;&nbsp;&nbsp;&nbsp;<br>4、熟悉专业创意方法，思维敏捷，洞察力强，文字功底扎实，语言表达能力强。&nbsp;&nbsp;&nbsp;&nbsp;<br>5、能独立完成项目、广告等推广文案的撰写。', '设计部', '广顺北大街融创动力产业园B223', '2016/0129/20160129114024281.png', '蓝桃文化', '北京蓝桃文化有限公司', 'http://www.lantaochina.com', '广告/公关/会展', 'www.lantaochina.com', '50-100人', '私营企业', '           	          '),
(110, '网页设计师', '站酷招聘', 1454038824, '5名', '上海磐特文化传播有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '品牌类、产品类、活动类、电商类网站页面设计；<br>电脑端和手机端网站前端页面设计；<br>APP和交互多媒体界面设计；<br>制作html页面，切片，和程序员对接；<br>维护更新网站内容；<br>面试请带好相关作品。', '工作经验：同等岗位工作，1年以上<br>专业要求：多媒体设计、艺术设计、装潢设计、平面设计、计算机开发<br><br>整体要求：<br><br>有成熟的商业作品，包含但不限于平面设计（vi、平面排版、主视觉类）或者网站设计（网站、app软件、游戏），丰富的设计素材库，创意和动手设计能力强,良好团队合作能力,吃苦耐劳,具备良好的艺术鉴赏度和时尚敏锐度<br><br>技能要求：<br><br>熟练使用平面设计软件(PS,AI),掌握网页设计软件(Dreamweaver)、网页动画软件（flash）、非编类软件（AE,PM）<br>', '数字广告部', '上海市徐汇区田林路192号华鑫科技园101室', '2016/0129/20160129114024196.png', '美腾库博', '上海磐特文化传播有限公司', 'http://www.exmatecube.com ', '互联网', 'www.exmatecube.com ', '1-50人', '私营企业', '           	          	<span class="label">创意设计</span>          	          	<span class="label">数字广告</span>          	          	<span class="label">涨工资快</span>          	          	<span class="label">有高手带</span>          	          	<span class="label">老板幽默</span>          	          	<span class="label">气氛轻松</span>          	          	<span class="label">交通方便</span>          	          	<span class="label">团队旅游</span>          	          	<span class="label">可午睡</span>          	          '),
(111, '平面设计主管', '站酷招聘', 1454038824, '1名', '上海马克华菲电子商务有限公司', '12k-15k', '上海 ', '经验1-3年', '全职', '岗位职责：<br>1、负责马克华菲品牌所有线上平台(天猫、京东、一号店、优购、唯品会等)的整体形象设计，把握线上渠道整体风格和视觉呈现，全面提升整体视觉效果<br>2、管理设计团队，与运营部，策划部，视觉部密切配合，根据公司的营销活动方案完成天猫旗舰店及其他平台的大型活动、店铺活动的主题页面设计和广告图片的设计任务<br>3、监控天猫、京东、一号店、优购、唯品会等活动页面效果并优化用户体验<br>4、负责大型设计项目和外界供应商的对接工作<br>', '任职资格：<br>1、美术、设计或相关专业大专以上学历，有扎实的美术功底<br>2、3年以上平面设计、网页设计工作经验，有电商平台设计经验，服装或时尚行业工作经验优先<br>3、有敏锐的时尚触觉，较强的色彩搭配能力及审美观念<br>4、精通Photoshop、Illustrator&nbsp;、Dreamweaver等设计软件，丰富的平面设计经验<br>5、具备良好团队管理能力，并富有工作激情、创新欲望和责任感，并能推动团队的设计能力<br>', '电商事业部', '上海市徐汇区龙漕路-地铁站', '2016/0129/20160129114024640.png', '马克华菲', '上海马克华菲电子商务有限公司', 'http://www.markfairwhale.com', '其他', 'www.markfairwhale.com', '1000人以上', '私营企业', '           	          	<span class="label">时尚</span>          	          	<span class="label">服装</span>          	          	<span class="label">潮人</span>          	          	<span class="label">幸福</span>          	          '),
(112, '网页设计师', '站酷招聘', 1454039652, '1名', '上海态趣服装有限公司', '面议', '上海 ', '经验不限', '全职', '1.&nbsp;负责网页设计', '1.&nbsp;对潮流文化及街头着装风格有独特理解者优先<br>2.&nbsp;能熟练运用Photoshop、Illustratorr等应用软件<br>3.&nbsp;成熟的绘画技巧，对色彩、图形、字体敏感；有丰富的想象力和创造力<br>4.&nbsp;有团队合作精神，认真负责<br>5.&nbsp;需要有1-2年相关工作经验<br>6.&nbsp;有相关行业经验的优先录用', '设计部', '上海市-长宁区', '2016/0129/20160129115412678.jpg', 'THETHING', '上海态趣服装有限公司', 'http://www.thething.cn', '其他', 'www.thething.cn', '1-50人', '私营企业', '           	          '),
(113, '互动设计师', '站酷招聘', 1454039652, '2名', '上海利宣广告有限公司', '5k-8k', '上海 ', '经验不限', '全职', '为一系列知名国际品牌提供互动创意的想法和制作，客户涵盖化妆品，汽车，服装配饰，家装，IT等。<br>主要负责客户的网站（官网，minisite），微信，微博的视觉设计，熟知国内各大社交平台。<br>在创意设计总监的指导下完成客户的创意表现。<br>了解客户需求，并密切与客户部，策略部和其他部门合作，将客户需求贯彻到创意中。<br>注重创意工作的出品质量，保证产品美术创作符合客户的诉求点。<br>维护和提高公司的创意标准和程序。<br><br>请将作品简历发送至以下邮箱：momo.li@net-show.cn&nbsp;,&nbsp;lee.li@net-show.cn&nbsp;,&nbsp;winn.wang@net-show.cn<br><br><br><br><br>', '美术设计，UI设计相关专业2年以上经验<br>熟练操作AI，PHOTOSHOP等设计软件<br>有扎实的美术功底，具备手绘能力，略懂程序<br>高度适应能力以及抗压能力<br><br>公司福利<br>每月综合补助（加班餐补，出租车费报销）<br>员工年度体检<br>员工年度旅游（境外为主）<br>组织不定期团建活动（如各类专业培训、拓展训练、聚餐等）<br>庆生会、节日祝福及礼品等<br>', '创意部', '灵石路658号802室（大宁财智中心）', '2016/0129/20160129115412210.png', 'Net-show', '上海利宣广告有限公司', 'http://net-show.cn', '广告/公关/会展', 'http://net-show.cn', '50-100人', '私营企业', '           	          	<span class="label">弹性工作</span>          	          	<span class="label">年底分红</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">人性化管理</span>          	          '),
(114, '资深网页设计师', '站酷招聘', 1454039653, '2名', '上海班田企业形象策划有限公司', '面议', '上海 ', '经验不限', '全职', '1、调研客户的品牌，做最适合客户的设计； 2、深入理解用户体验，做最易用的设计； 3、细节的完美体现，做最精致的设计； 4、沟通顺畅，高效对接工作每个环节； ', '1. 从事网页设计工作至少5年以上； 2. 美术基本功扎实，对PS/AI/CD/FL应用软件超级熟练； 3. 曾服务过至少3个知名品牌以上，作品数量需要达到30个以上； 4. 对时尚以及社会要有强烈认识； 5. 有独立创新能力及工作执行力； 6. 能与团队人员合作及沟通能力；', '', '上海市-杨浦区', '2016/0129/20160129115413638.png', '班田互动创意', '上海班田企业形象策划有限公司', 'http://www.brandsh.cn', '互联网', 'www.brandsh.cn', '1-50人', '私营企业', '           	          	<span class="label">数字营销</span>          	          	<span class="label">网页设计</span>          	          	<span class="label">社交媒体</span>          	          	<span class="label">APP</span>          	          '),
(115, '资深网页设计师', '站酷招聘', 1454039653, '3名', '一加三餐（上海）电子商务有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '资深设计师（请务必附作品或链接）<br><br>工作描述：<br>1、艺术设计类专业，并从事网站设计1-2年以上工作经历；<br>2、有良好的美术功底，具有良好的艺术审美观及独特的创意理念；<br>3、负责网站创意、设计、页面制作及网页广告、相关图片、动效等制作工作&nbsp;<br>4、引导并规范网站的界面表现，优化用户体验，并确保技术实施&nbsp;<br>5、配合产品开发进度完成设计工作并适时对相关业务开展提出建议和解决办法&nbsp;<br>6、对设计行业富有激情&nbsp;<br>', '职位要求：<br>1、精通Photoshop、Flash、Dreamweaver等工具。&nbsp;<br>2、了解网站建设的流程和网页设计制作流程&nbsp;<br>2、具有一定的美术鉴赏、色彩搭配能力。&nbsp;<br>3、有良好的学习能力、沟通能力及团队协作能力。&nbsp;<br>4、电商设计及相关工作经验者优先。<br>5、提供五个以上个人作品，要求正式上线，并能通过网站地址访问。<br><br>', '创意部', '上海市-徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层', '2016/0129/20160129115413100.png', '一加三餐', '一加三餐（上海）电子商务有限公司', 'http://www.ecmoho.com', '电子商务', 'www.ecmoho.com', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(116, '网页设计师', '站酷招聘', 1454039653, '2名', '深圳市阿牛哥智慧生活医药有限公司', '5k-8k', '深圳 ', '经验1-3年', '全职', '1、负责大型医药电商网站PC端UI界面创意、设计及网页制作；<br>2、负责大型医药电商网站移动端H5版UI界面创意、设计及网页制作；<br>3、负责天猫、京东及管网旗舰店等产品详情页美术创意、设计及网页制作；<br>4、参与用户交互研究，把握官网、天猫等平台整体风格、视觉效果；<br>5、紧密配合产品经理、市场部、开发团队，完成页面设计。<br>6、完成网页的制作；<br>7、完成公司的其他UI或平面的设计工作。<br>', '1、美术或设计专业专科以上学历；<br>2、扎实的美术基础和设计功底；<br>3、熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4、数量掌握Dreamweaver&nbsp;等网页制作软件,熟悉HTML、CSS等技术；<br>4、对PC端及移动端（APP）UI设计趋势有灵敏触觉和领悟能力；<br>5、对界面设计、图片处理、平面设计有深刻的理解，有敏锐设计感；<br>6、对视觉用户研究有一定经验和见解，对互联网产品可用性有深入的认识；<br>7、有团队精神和工作激情，能适应较高强度的工作环境。<br><br>---------------------------------------------------------------------<br>赶快加入阿牛哥……….<br><br>我们给你的，&nbsp;不会是一份朝九晚五，待遇看资历，上班忙炒股的工作！<br>而是一份让你倍感兴奋、既有前途更有钱途的工作。&nbsp;<br>&nbsp;<br>一个财富弯道超车的机遇<br>行业著名大咖独创的商业模式，上有云端互联的健康管理，下有智慧医疗和智慧药店的专业服务体系，形成完整的健康服务及商业闭环。<br>&nbsp;<br>大咖问你，Are&nbsp;you&nbsp;OK？<br>创始团队包含各领域精英，深受投资界热捧！<br>当接地气的医药，遇到飘天上的智能生活，连接的机遇悄然发生，火箭开始准备起飞，你准备好跟着我们去改变中国，去成为中国智慧健康领域的阿牛哥吗？<br>&nbsp;<br>开放、个性是唯一标签<br>开放办公环境，85、90后妹子靓仔遍地，我们鼓励你提出不同观点，支持随时开撕！<br>至于领导？领导是什么？是牛么？可以拉马车么？<br>&nbsp;<br>我们唯一的承诺是你可以完全做你自己，告别职场“装”时代！<br>我们为每位提供良好的发展空间，如果你能一个人顶几个人用，快速适应环境且扛得住压力，那么毫不犹豫来上班吧！<br>否则，你失去的会是一个短时间内加速成长自己，同时也失去高成长高回报的高速发展空间的机会。<br>这儿，有你最想要的青春！<br>', '用户体验设计部', '南山大道', '2016/0129/20160129115413521.png', '阿牛哥', '深圳市阿牛哥智慧生活医药有限公司', 'http://www.zanwj.com/', '互联网', 'http://www.zanwj.com/', '1-50人', '私营企业', '           	          	<span class="label">移动医疗</span>          	          	<span class="label">医药电商</span>          	          	<span class="label">良好的办公环境</span>          	          	<span class="label">优秀的团队</span>          	          	<span class="label">#轻松的工作氛围</span>          	          '),
(117, '包装设计师', '站酷招聘', 1454039653, '1名', '上海一融设计咨询有限公司', '12k-15k', '上海 ', '经验不限', '全职', '包装设计师，具备3d设计能力，如善用c4d软件。&nbsp;协助并执行设计概念', '包装设计师，具备3d设计能力，如善用c4d软件。&nbsp;协助并执行设计概念', '设计部', '淮海西路666号2206室', '2016/0129/20160129115413929.jpg', 'Rong', '上海一融设计咨询有限公司', 'http://www.rong-design.com', '广告/公关/会展', 'www.rong-design.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          '),
(118, '资深网页设计师', '站酷招聘', 1454039654, '5名', '上海磐特文化传播有限公司', '8k-12k', '上海 ', '经验5-7年', '全职', '参与网站、微站、app等项目的设计和建设提报<br>设计和创意平面主视觉和网站主视觉layout；<br>和网页程序员沟通，协助完成视觉设计到网页制作的转变；<br>制作网页前端程序，html页面，css，html5，切片<br>熟知企业官网、电商类网站、crm类后台管理；<br>维护更新网站内容；<br>能独立提出多种可执行设计方案，并撰写PPT说明。', '有独立操作网整站设计经验<br>对网页平面设计、app界面设计熟练掌握<br>对网页前端程序、html、css掌握，会html5者俱佳<br>懂得后台管理和程序是怎么一回事，能顺利和程序员共同协作并测试<br>具有一定的视觉眼光和品味，善于寻找网页设计素材，提高工作效率<br>擅长表达自己的设计思路和想法去说服客户<br>有一定的设计和传播素材库，所以反应迅速<br>抗压能力强、体力好<br>需附作品', '数字广告部', '上海市徐汇区田林路192号华鑫科技园101室', '2016/0129/20160129115414297.png', '美腾库博', '上海磐特文化传播有限公司', 'http://www.exmatecube.com ', '互联网', 'www.exmatecube.com ', '1-50人', '私营企业', '           	          	<span class="label">创意设计</span>          	          	<span class="label">数字广告</span>          	          	<span class="label">涨工资快</span>          	          	<span class="label">有高手带</span>          	          	<span class="label">老板幽默</span>          	          	<span class="label">气氛轻松</span>          	          	<span class="label">交通方便</span>          	          	<span class="label">团队旅游</span>          	          	<span class="label">可午睡</span>          	          '),
(119, '平面设计', '站酷招聘', 1454039654, '1名', '上海态趣服装有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '岗位职责： <br>1. 负责品牌平面视觉的形象设计 <br>2. 设计品牌画册、DM、礼品包装、海报、店铺平面视觉、网站视觉、活动视觉等 <br>3. 监督跟进所有平面物料最后成品质量<br>4. 大片拍摄策划提案，监控大片质量 5. 以及上级安排的其它任务 ', '职位要求： <br>1. 了解潮流品牌风格，把握潮牌调性<br> 2. 能熟练运用Photoshop、Illustrator、Dreamweaver等应用软件 <br>3. 成熟的绘画技巧，对色彩、图形、字体敏感；有丰富的想象力和创造力 <br>4. 有团队合作精神，认真负责 <br>5. 需要有1-2年相关工作经验<br> 6. 有相关行业经验的优先录用  ', '市场部', '上海世贸商城', '2016/0129/20160129115414147.jpg', 'THETHING', '上海态趣服装有限公司', 'http://www.thething.cn', '其他', 'www.thething.cn', '1-50人', '私营企业', '           	          '),
(120, '视觉设计师', '站酷招聘', 1454039654, '2名', '上海迈若网络科技有限公司', '面议', '上海 ', '经验不限', '全职', '网页设计，UI相关工作', '任职要求：&nbsp;<br>1.&nbsp;有较强的美术功底和良好的设计表现力，能准确把握网站的整体风格及视觉表现，对网站的结构策划有一定经验。<br>2.&nbsp;三年以上网站设计、有平面设计经验者优先&nbsp;。&nbsp;<br>3.&nbsp;领悟能力强，能够理解先进的技术和概念，较强的创新能力。&nbsp;<br>4.&nbsp;精通Photoshop，&nbsp;flash，fireworks&nbsp;等软件。&nbsp;<br>5.&nbsp;良好的沟通能力及团队协作能力，富有责任心，学习能力强，能承受较强的工作压力&nbsp;', '设计部', '上海市-长宁区', '2016/0129/20160129115414243.jpg', '迈若网络', '上海迈若网络科技有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          	<span class="label">季度奖金</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">节日福利</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">团队轻松</span>          	          	<span class="label">工作激情</span>          	          '),
(121, '网页重构工程师', '站酷招聘', 1454039654, '3名', '深圳市玖作文化传播有限公司', '8k-12k', '深圳 ', '经验不限', '全职', '我们服务：腾讯、京东、网易、迅雷、百度、一号店等。<br>我们所做的东西，会在这些平台发布，让你的作品得到全国人的关注、议论。<br>与行业最TOP的人共事，获得行业新资料及知识。<br>加入我们，我们是WISEMIND&nbsp;-&nbsp;玖作文化。', '要求<br>1，精通XHTML及DIV布局重构，可快速构建稳健的HTML页面，精通CSS2.0样式表。<br>2，熟悉jQuery等常用前端代码库的使用。<br>3，熟悉html5及css3，有案例者优先。<br>4，对前端技术有强烈的兴趣，喜欢钻研；<br>5，踏实可靠，对待工作有强烈责任心，沟通良好；<br>6，工作经验1-2年；&nbsp;<br><br>官网：www.wisemind.cc<br>微博：weibo.com/szwisemind<br>邮箱：wisemindcareer@qq.com', '开发部', '广东省-深圳市-南山区', '2016/0129/20160129115414127.jpg', 'WISEMIND', '深圳市玖作文化传播有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(122, '网页设计师', '站酷招聘', 1454039654, '1名', '上海凯淳实业有限公司', '8k-12k', '上海 ', '经验3-5年', '全职', '1.负责互联网推广及全网电商平台创意视觉管理（利用高质量的视觉创意，达成高转化的实际售卖效果）；<br>2.负责店铺产品的界面设计，制定相关产品的设计规范；<br>3.负责辅助线下项目的配合物料设计；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。<br><br>', '1、具有丰富互动广告及商业网站设计和制作经验，热衷提供高质量、简洁、具有传播力的视觉创意；<br>2、品德端正，性情温善，具有良好的沟通能力，理解力强，有团队合作意识，具有敬业负责的精神；<br>3、具有良好的美术设计功底，不低于三年同等行业工作经验，一经录用，公司将提供有足够竞争力的薪资及发展环境；<br>4、精通Photoshop，熟悉&nbsp;Flash、Illustrator等设计制作软件；<br>5、能吃苦耐劳，可接受加班；<br>6、简历中必须提供近期设计作品及最成功的作品。<br><br>工作地址<br>上海市南京西路388号仙乐斯广场', '创意部', '上海市南京西路388号仙乐斯广场', '2016/0129/20160129115414721.jpg', '凯淳实业', '上海凯淳实业有限公司', '', '电子商务', '', '1000人以上', '私营企业', '           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '),
(123, '网页设计师', '站酷招聘', 1454039655, '3名', '上海班田企业形象策划有限公司', '面议', '上海 ', '经验不限', '全职', '1、调研客户的品牌，做最适合客户的设计；2、深入理解用户体验，做最易用的设计； 3、细节的完美体现，做最精致的设计； 4、沟通顺畅，高效对接工作每个环节；', '1、专科及以上学历；2、一年以上网页设计工作经验； 3、具有优秀的审美能力以及独特的创意，有较强的平面设计和网页设计创意能力； 4、精通Photoshop、Illustrator等设计软件（有优秀作品者优先） 5、对HTML、DIV+CSS布局有一定了解；', '', '上海市-杨浦区', '2016/0129/20160129115415740.png', '班田互动创意', '上海班田企业形象策划有限公司', 'http://www.brandsh.cn', '互联网', 'www.brandsh.cn', '1-50人', '私营企业', '           	          	<span class="label">数字营销</span>          	          	<span class="label">网页设计</span>          	          	<span class="label">社交媒体</span>          	          	<span class="label">APP</span>          	          '),
(124, 'H5移动端研发工程师', '站酷招聘', 1454039655, '2名', '北京百舜华年文化传播有限公司', '20k-25k', '北京 ', '经验3-5年', '全职', '利用HTML5相关技术实现趣味休闲游戏研发，移动端内容维护；<br>解决移动设备包括iOS和Android的WebKit兼容性问题；', '熟悉H5开发常用算法；<br>精通Javascript、HTML/HTML5/XML、CSS/CSS3、Ajax、html5&nbsp;Canvas等前端开发技术<br>熟悉cocos2d-html5、cocos2d-jsbinding、QuarkJS或createsJS等html5框架<br>具有HTML5开发经验，熟悉html5标准；<br>使用HTML5的相关技术进行设计和开发，包括各种UI的研发；<br>使用HTML5进行图形化设计，制作动画效果；', '开发部', '北京市东城区银河soho(a座)', '2016/0129/20160129115415153.png', '魔漫相机', '北京百舜华年文化传播有限公司', 'http://www.momentcamoffical.com', '互联网', 'www.momentcamoffical.com', '50-100人', '私营企业', '           	          	<span class="label">九险一金</span>          	          	<span class="label">下午茶</span>          	          	<span class="label">零食铺子</span>          	          	<span class="label">员工活动</span>          	          	<span class="label">14薪</span>          	          	<span class="label">艺术气息浓郁</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">节日福利丰厚</span>          	          	<span class="label">成长空间</span>          	          '),
(125, 'WEB设计师', '站酷招聘', 1454039655, '10名', '广州华多网络科技有限公司', '面议', '广州 ', '经验不限', '全职', '1、负责网站产品界面设计、制定相关产品的设计规范； &lt;br&gt;2、根据需求提供界面优化建议，完成产品最终的视觉设计； &lt;br&gt;3、负责网站页面设计/专题及产品日常维护性设计和新项目的开发性界面设计工作。 &lt;br&gt;   ', '-最好是美术专业，本科或以上。&lt;br&gt;-最好有两年以上相关领域从业经验。&lt;br&gt;-最好热爱游戏，了解多玩和YY的产品。&lt;br&gt;-最好年轻有活力，开朗易沟通。&lt;br&gt;-最好有绝活儿，平时深藏不露，关键时刻可以拯救世界的那种。&lt;br&gt;如果以上你都不具备，问题也不大，但以下条件你必须具备:&lt;br&gt;必须有责任心&lt;br&gt;必须诚实正直&lt;br&gt;必须热爱设计&lt;br&gt;必须能拿出来一堆很酷的作品。&lt;br&gt;&lt;br&gt;简历和作品请发至 yypic@yy.com &lt;br&gt;标题格式：【广州】WEB设计师+姓名 or 【珠海】WEB设计师+姓名 &lt;br&gt;  ', 'YY', '广东省-广州市-天河区', '2016/0129/20160129115415927.jpg', '多玩YY', '广州华多网络科技有限公司', '', '互联网', '', '1000人以上', '私营企业', '           	          '),
(126, '动画师', '站酷招聘', 1454039655, '1名', '深圳市青木文化传播有限公司', '面议', '深圳 ', '经验不限', '全职', '1、熟悉动画原理，有动画方面自己的创意。<br><br>2、精通flash、AE、PS,无纸动画软件。<br><br>3、具备动画制作的基础，懂得动画表演、运动规律、视听语言等。', '1、大专以上学历，有AE动画经验优先。<br><br>2、具备较好的美术修养，有构图意识，色彩关系意识，画面层次意识等。<br><br>3、良好的理解能力和学习能力，对待工作认真负责，善于思考，能够高效高质独立的完成工作。<br><br>PS：投简历请附上作品。', '设计部', '南山大道与创业路交界处南园枫叶大厦16M', '2016/0129/20160129115415194.jpg', 'treedom', '深圳市青木文化传播有限公司', 'http://treedom.cn', '互联网', 'treedom.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          '),
(127, '创意文案', '站酷招聘', 1454039656, '1名', '光合线（北京）广告策划有限公司', '5k-8k', '北京 ', '经验不限', '全职', '你必须是：<br>紧跟潮流，思维活跃<br>文艺起来像张爱玲，二逼起来像留一手<br>的普通青年<br><br>你最好是：<br>干过几年广告（资历不重要，我们更看重你这个人）<br>又碰巧伺候过互联网金融、快消之类的客户（看，我们的客户很高大上吧）<br>爱玩三国杀（因为我们爱玩，这是一种深刻的“企业文化”）<br><br>你要做的是：<br>想概念，写东西', '看作品<br>', '创意部', '北京市-朝阳区', '2016/0129/20160129115416276.jpg', '光合线广告', '光合线（北京）广告策划有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(128, '高级美术指导', '站酷招聘', 1454039656, '5名', '宁波中哲慕尚电子商务有限公司', '8k-12k', '宁波 ', '经验不限', '全职', '我们需要你做什么？<br>1、	店铺整体视觉设计方向指导及建议；<br>2、	进行高质量的产品视觉设计；<br>3、	完成中等以上活动项目的平面设计工作，与文案、运营协作进行设计提案；<br>4、	有效指导团队完成设计工作；<br>5、	理解视觉营销，进行数据分析与提案。<br>', '我们需要怎样的你？<br>1、	精通Photoshop，并熟练使用AI、AE、DW等软件；<br>2、	优秀的沟通协调和团队合作能力，对互联网用户行为及习惯有深刻理解；<br>3、	绝佳的审美和创新能力，符合电子商务唯快不破的理念；<br>4、	具备整体运营思路，架构店铺视觉设计方向。<br>', '品牌项目部', '杉杉路111号', '2016/0129/20160129115416110.png', 'GXG', '宁波中哲慕尚电子商务有限公司', 'https://gxg.tmall.com', '电子商务', 'https://gxg.tmall.com', '200-500人', '私营企业', '           	          	<span class="label">好玩</span>          	          	<span class="label">创意</span>          	          	<span class="label">团队旅行</span>          	          	<span class="label">带薪假期</span>          	          	<span class="label">各种趴</span>          	          	<span class="label">时尚high</span>          	          ');
INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(129, '资深/网页设计师', '站酷招聘', 1454039656, '1名', '百互润贸易（上海）有限公司', '面议', '上海 ', '经验3-5年', '全职', '1、按策划方案及网页设计规范进行网页美工设计，把握网页的整体风格及视觉效果&nbsp;<br>2、配合业务部门各类公关广告活动的推广页面设计工作：包括UI界面、横幅广告、邮件DM&nbsp;<br>3、设计友好的网页互交界面：包括专题设计、视觉设计、互交设计、用户体验和可用性分析&nbsp;<br>4、根据品牌风格定位和品牌推广策略，制作完善的客户提案&nbsp;<br>5、负责后期页面builder，后期维护工作&nbsp;<br>6、负责策划中项目的创意概念提供与沟通<br><br>', '1、大专及以上学历，美术、设计、计算机等相关专业&nbsp;<br>2、三年以上大型网站网页设计、制作经验。擅长图标设计，整体配色设计&nbsp;<br>3、熟练掌握网站主体风格设计，UI交互设计，用户体验设计&nbsp;<br>4、精通Photoshop、Flash、Illustrators、等设计软件，熟悉HTML、JavaScript&nbsp;DIV&nbsp;+&nbsp;CSS制作规范，架构页面程序&nbsp;<br>5、熟悉网页制作流程，能够独立完成首页及各级页面设计，动画以及HTML静态页面制作&nbsp;<br>6、了解网页SEO优化，web标准等&nbsp;<br>7、具有较高的艺术设计能力和美术功底，有一定的创意策划能力。对设计潮流把握准确&nbsp;<br>8、有优秀的团队合作意识，学习沟通能力。耐心、诚恳，有强烈的责任心和积极主动的工作态度&nbsp;<br>9、具有成熟的商业作品、丰富的设计案例尤佳<br>', '消费品事业部', '上海市-静安区', '2016/0129/20160129115416600.jpg', '百润', '百互润贸易（上海）有限公司', '', '电子商务', '', '200-500人', '外商独资', '           	          '),
(130, 'web前端工程师', '站酷招聘', 1454039656, '10名', '上海友尊文化传播有限公司', '面议', '上海 ', '经验1-3年', '全职', '1、Web页面和交互制作于开发。<br>2、移动客户端应用和交互制作(HTML5、mobile&nbsp;js)。<br>3、要有团队意识、良好的合作态度、激情、责任心和沟通能力。<br>', '1、&nbsp;熟练掌握DIV&nbsp;CSS样式编写，能精确规划网页结构，融入bootstrap、foundation等新颖技术,熟悉canvas绘图原理。<br>2、&nbsp;熟悉Dreamweaver、webstorm等设计软件，并根据界面设计图制作出符合规范的网页。<br>3、&nbsp;熟练运用各种javascript网页特效。熟悉jq、angularjs、json等js开发框架。<br>注：按照产品计划完成前端实现、符合web标准并保证质量。熟悉HTTP协议及W3C相关互联网规范；较强的文档编写能力；熟悉Jquery框架，熟练掌握Javascript。<br>UIMIX感谢设计师小主、贵人们的投递：<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;丰厚项目季度奖及超级棒棒哒年终奖&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！）<br>公司网址：www.uimix.com<br>（备注：薪资待遇根据能力定义，以上只是大框架，能者多酬劳！）<br>', '开发部', '上海市-宝山区', '2016/0129/20160129115416151.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(131, '资深WEB设计师', '站酷招聘', 1454039657, '1名', '传成文化传媒（上海）有限公司', '面议', '北京 ', '经验不限', '全职', '1、负责公司官网、产品网站及专题页、运营、推广等相关页面设计；<br>2、负责产品后台页面设计调试及操作体验优化；<br>3、把控页面视觉方向，与各部门顺畅沟通，高标准按时完成页面设计任务；<br>4、不断学习先进WEB设计理念，持续改进设计思路和方法<br>', '1、3年以上网页设计工作经验，有成功的线上作品；<br>2、优秀的网站设计理念和审美理念，能根据产品特色快速制定设计标准；<br>3、熟练操作Photoshop、Illustrator、Flash等相关设计软件；<br>4、熟练使用HTML、CSS、JS等网页技术，能够和产品、工程师进行良好的沟通；<br>5、有高度的责任心，具备优秀合作态度、沟通能力及团队精神，并富有工作激情、创造力和责任感，能承受高强度的工作压力；<br>6、有团队管理经验者优先。<br>', '设计部', '北京市-朝阳区', '2016/0129/20160129115417304.jpg', 'Earth2113', '传成文化传媒（上海）有限公司', '', '艺术/文化传播', '', '1-50人', '私营企业', '           	          '),
(132, '包装设计师', '站酷招聘', 1454039657, '2名', '北京创锐文化传媒有限公司', '5k-8k', '北京 ', '经验1-3年', '全职', '1、负责聚美优品产品包装设计<br>2、能够独立完成设计的整体方案，具备丰富的空间想象力及创新能力；<br>3、对色彩敏感，对流行有敏锐的洞察力，有悟性；&nbsp;<br>4、能很好地在设计中体现品牌设计理念，充分理解需求、设计思路符合市场产品的规律；', '1.&nbsp;正规院校大学专科以上学历，包装或平面设计相关专业<br>2.&nbsp;熟悉印刷工艺、印刷流程等<br>3.&nbsp;熟练使用Photoshop、Illustrator等相关工作软件<br>4.&nbsp;有化妆品包装设计经验者优先<br>5.&nbsp;善于表达和沟通，可以进行部门间的合作 <br>6.&nbsp;请附简历及作品', 'OBM事业部', '东四十条A口，中汇广场B座20层', '2016/0129/20160129115417424.png', '聚美优品', '北京创锐文化传媒有限公司', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '电子商务', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '500-1000人', '私营企业', '           	          '),
(133, '商品编辑经理', '站酷招聘', 1454039657, '2名', '北京动乐网络科技有限公司', '15k-20k', '北京 ', '经验3-5年', '全职', '1、负责商城商品的分类、调整、内容编辑，制定品类运营规则、规划并执行；<br>2、负责建立商城商品编辑部门工作流程、任务量化方案、绩效考核方案；<br>3、负责类目消费信息的搜集与分析，相关商品的消费者心理研究；<br>4、负责所有频道、专场的每日内容更新、编辑工作，&nbsp;完成编辑部门的运营和维护', '1、具有本科及以上学历<br>2、具有三年及以上电商行业运营编辑管理工作经验，有母婴编辑管理经验者优先考虑；<br>3、有一定的数据分析能力和文字功底，掌握行业知识，了解行业动态；<br>4、具备出色的统筹能力、团队协作能力，扎实敬业', '电商运营部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0129/20160129115417468.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(134, 'Web全栈工程师', '站酷招聘', 1454039657, '5名', '上海博广广告传媒有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '负责移动端Web开发，参与创新型的页面制作工作。', '1、本科及以上学历，至少1年以上WEB开发经验；<br>2、熟悉HTML5、CSS3、JAVASCRIPT前端编程技能，有响应式页面开发经验<br>3、熟悉Java或C#，有面向对象编程开发经验<br>4、熟悉MySQL或SQL&nbsp;Server，了解视图、存储过程等常用数据库对象<br>5、有较强的逻辑思维与抽象思维，对常用算法有一定了解<br>6、能够在手机上开发出兼容性较好的移动网站者优先<br>PS:公司年轻化，萌宠陪伴，妹子多。', '技术部', '上海市闸北区108创意广场金座716-717室', '2016/0129/20160129115418675.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '),
(135, '设计作品评审', '站酷招聘', 1454039658, '2名', '北京站酷网络科技有限公司', '面议', '北京 ', '经验不限', '全职', '1、配合编辑进行UGC内容的运营，达到站酷网内容运营要求；&nbsp;<br><br>2、参与策划&执行社区专题活动；<br><br>3、配合市场营销部门，对各类商业活动进行协助跟进。', '1、&nbsp;热爱设计创意行业，有志于长期从事这一行业。设计相关专业应届毕业生优先；<br><br>2、&nbsp;注重细节和工作质量，做事认真负责；<br><br>3、&nbsp;具备设计行业基础知识以及对设计类内容的鉴赏能力；<br><br>4、&nbsp;熟悉HTML代码，熟悉Photoshop、Dreamweaver等软件，对页面维护有一定经验。', '内容编辑部', '北京市-朝阳区', '2016/0129/20160129115418118.jpg', '站酷网', '北京站酷网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(136, '高级网页设计师', '站酷招聘', 1454039658, '1名', '深圳市阿牛哥智慧生活医药有限公司', '8k-12k', '深圳 ', '经验3-5年', '全职', '1、负责大型医药电商网站PC端UI界面创意、设计及网页制作；<br>2、负责大型医药电商网站移动端H5版UI界面创意、设计及网页制作；<br>3、负责天猫、京东及管网旗舰店等产品详情页美术创意、设计及网页制作；<br>4、参与用户交互研究，把握官网、天猫等平台整体风格、视觉效果；<br>5、紧密配合产品经理、市场部、开发团队，完成页面设计。<br>6、完成公司的其他UI或平面的设计工作。<br>', '1、美术或设计专业本科以上学历；<br>2、扎实的美术基础和设计功底；<br>3、熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4、数量掌握Dreamweaver&nbsp;等网页制作软件,熟悉HTML、CSS等技术；<br>4、对PC端及移动端（APP）UI设计趋势有灵敏触觉和领悟能力；<br>5、对界面设计、图片处理、平面设计有深刻的理解，有敏锐设计感；<br>6、对视觉用户研究有一定经验和见解，对互联网产品可用性有深入的认识；<br>7、有团队精神和工作激情，能适应较高强度的工作环境。<br><br>---------------------------------------------------------------------<br>赶快加入阿牛哥……….<br><br>我们给你的，&nbsp;不会是一份朝九晚五，待遇看资历，上班忙炒股的工作！<br>而是一份让你倍感兴奋、既有前途更有钱途的工作。&nbsp;<br>&nbsp;<br>一个财富弯道超车的机遇<br>行业著名大咖独创的商业模式，上有云端互联的健康管理，下有智慧医疗和智慧药店的专业服务体系，形成完整的健康服务及商业闭环。<br>&nbsp;<br>大咖问你，Are&nbsp;you&nbsp;OK？<br>创始团队包含各领域精英，深受投资界热捧！<br>当接地气的医药，遇到飘天上的智能生活，连接的机遇悄然发生，火箭开始准备起飞，你准备好跟着我们去改变中国，去成为中国智慧健康领域的阿牛哥吗？<br>&nbsp;<br>开放、个性是唯一标签<br>开放办公环境，85、90后妹子靓仔遍地，我们鼓励你提出不同观点，支持随时开撕！<br>至于领导？领导是什么？是牛么？可以拉马车么？<br>&nbsp;<br>我们唯一的承诺是你可以完全做你自己，告别职场“装”时代！<br>我们为每位提供良好的发展空间，如果你能一个人顶几个人用，快速适应环境且扛得住压力，那么毫不犹豫来上班吧！<br>否则，你失去的会是一个短时间内加速成长自己，同时也失去高成长高回报的高速发展空间的机会。<br>这儿，有你最想要的青春！<br>', '用户体验设计部', '南山大道', '2016/0129/20160129115418955.png', '阿牛哥', '深圳市阿牛哥智慧生活医药有限公司', 'http://www.zanwj.com/', '互联网', 'http://www.zanwj.com/', '1-50人', '私营企业', '           	          	<span class="label">移动医疗</span>          	          	<span class="label">医药电商</span>          	          	<span class="label">良好的办公环境</span>          	          	<span class="label">优秀的团队</span>          	          	<span class="label">#轻松的工作氛围</span>          	          '),
(137, '设计作品评审实习生', '站酷招聘', 1454039658, '2名', '北京站酷网络科技有限公司', '面议', '北京 ', '经验不限', '全职', '1.&nbsp;协助编辑进行UGC内容审核；&nbsp;<br>2.&nbsp;参与策划&执行社区专题活动；<br>3.&nbsp;协助编辑完成“站酷画我”内容审核；<br>', '1.&nbsp;&nbsp;热爱设计创意行业，有志于长期从事这一行业。设计相关专业应届毕业生优先；<br>2.&nbsp;&nbsp;注重细节和工作质量，做事认真负责。<br>3.&nbsp;&nbsp;具备设计行业基础知识以及对设计类内容的鉴赏能力；<br>4.&nbsp;&nbsp;熟悉HTML代码，熟悉Photoshop、Dreamweaver等软件，对页面维护有一定经验。<br>&nbsp;<br>实习期满，通过考核可优先转为正式员工，入职待遇从优', '内容编辑部', '北京市-朝阳区', '2016/0129/20160129115418503.jpg', '站酷网', '北京站酷网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(138, '页游-高级视觉设计师', '站酷招聘', 1454039658, '1名', '深圳市迅雷网络技术有限公司', '12k-15k', '深圳 ', '经验3-5年', '全职', '1.负责云加速产品设计：牛X页游官网、游戏官网、积分官网、金钻官网、平台官网、游戏盒子以及运营活动页相关设计工作；&nbsp;<br>2.根据产品和运营需求，独立完成设计方案，并对方案进行总结评估；&nbsp;<br>3.配合交互，前端调整视觉设计，跟进项目上线发布。', '1.美术或相关专业毕业，具备设计相关工作经验2年以上;&nbsp;<br>2.对产品流程、用户流程及用户需求有深入理解，了解网站开发工作流程和页面制作流程;&nbsp;<br>3.有良好的创意理念和页面版式规划能力，能很好的把握色彩与网页布局，熟悉用户体验;&nbsp;<br>4.具备优秀的视觉表达能力,，有门户网页设计与活动专题设计的相关经验，具备自己独有的设计风格,并成功运用在产品设计中。', '云加速', '科技园', '2016/0129/20160129115418501.jpg', '迅雷', '深圳市迅雷网络技术有限公司', '', '互联网', '', '1000人以上', '私营企业', '           	          '),
(139, '资深产品设计-21cake', '站酷招聘', 1454039659, '1名', '廿一客（上海）电子商务有限公司', '面议', '上海 ', '经验不限', '全职', '1.&nbsp;全面负责公司新产品及周边用品的外观设计与革新工作.&nbsp;<br>2.&nbsp;能独立完成产品创意,二维平面及三维建模和渲染工作.&nbsp;<br>3.&nbsp;配合市场需求,进行产品上市前,中,后的外观设计开发与推进.&nbsp;<br>4.&nbsp;能够独立分析和解决产品研发过程中遇到的各类设计问题.&nbsp;<br>5.&nbsp;配合完成公司各种产品包装的设计优化.&nbsp;<br>', '1.&nbsp;三年以上工作经验,工业设计类本科及以上学历.具备良好的审美与艺术鉴赏力.&nbsp;<br>2.&nbsp;熟练使用Photoshop，犀牛等2D.3D设计与渲染软件.&nbsp;<br>3.&nbsp;突出的创新设计能力及产品外观审美能力，熟悉各种材料工艺与加工方式.&nbsp;<br>4.&nbsp;良好的沟通能力及团队合作精神，较强的自我管理能力及工作责任心.&nbsp;<br>5.&nbsp;有家居及相关行业设计经验者优先；&nbsp;<br>（面试时需携带近期设计作品）<br>', '品牌推广部', '春中路588号', '2016/0129/20160129115419367.jpg', '21Cake', '廿一客（上海）电子商务有限公司', 'http://www.21cake.com', '电子商务', 'www.21cake.com', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">吃到爽</span>          	          	<span class="label">大食堂</span>          	          '),
(140, '&nbsp;资深网页设计师', '站酷招聘', 1454039659, '3名', '上海凯淳实业有限公司', '8k-12k', '上海 ', '经验不限', '全职', '岗位职责：<br>1.负责淘宝天猫旗舰店网站的设计、改版；<br>2.负责旗舰店产品的界面设计，制定相关产品的设计规范；<br>3.负责线上推广活动相关的视觉设计和前端实现，包括EDM、页面、专题、Banner等；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。', '岗位要求：<br>1、有较强的美术功底和出色的网页平面设计审美功力；&nbsp;<br>2、能够熟练使用Dreamweaver、Flash、Fireworks、Photoshop等设计工具；<br>3、能独立策划、设计、制作高品位的网页；<br>4、了解网页制作技术如javascript、HTML、CSS等编程语言；&nbsp;<br>5、善于沟通，具有良好的职业素质和团队合作精神，并能与项目开发人员合作完成项目。<br><br><br>P.S.请务必在简历中附带个人作品', 'Creative', '上海市-徐汇区', '2016/0129/20160129115419211.jpg', '凯淳实业', '上海凯淳实业有限公司', '', '电子商务', '', '1000人以上', '私营企业', '           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '),
(141, '前端开发工程师', '站酷招聘', 1454039659, '1名', '北京大疆文化传媒有限责任公司', '5k-8k', '北京 ', '经验不限', '全职', '1.&nbsp;根据设计稿和规范文档完成web和mobile界面制作与交互编写；<br>2.&nbsp;解决多浏览器的兼容性；<br>3.&nbsp;编写基础控件，业务组件；<br>4.&nbsp;配合技术部服务器端开发工程师完成项目整体开发；<br>5.&nbsp;参与前端构建与技术预研。<br>&nbsp;', '1.&nbsp;本科及以上学历，专业不限； <br>2.&nbsp;知名互联网企业工作经验3年以上（同时具有&nbsp;web&nbsp;和&nbsp;h5开发开发经验）； <br>3.&nbsp;熟练掌握W3C标准，制作兼容性良好的页面（含&nbsp;ps&nbsp;切图）；<br> 4.&nbsp;精通Jquery，RequireJs，等框架，了解&nbsp;backbone&nbsp;等&nbsp;mvc，mvvm&nbsp;框架；<br>5.&nbsp;熟练使用&nbsp;bootstrap&nbsp;easyui&nbsp;等快速开发框架；<br>6.&nbsp;有大型单页交互应用实战；<br>7.&nbsp;有前端工程意识，熟练使用前端构建工具；<br> 8.&nbsp;了解服务器端开发语言PHP、PYTHON等；<br>9.&nbsp;掌握日常&nbsp;linux&nbsp;操作。', '品牌部', '北京市朝阳区三里屯外交公寓', '2016/0129/20160129115419227.png', '大疆传媒', '北京大疆文化传媒有限责任公司', 'http://studiochina.dji.com/cn', '艺术/文化传播', 'http://studiochina.dji.com/cn', '1-50人', '私营企业', '           	          	<span class="label">dji</span>          	          '),
(142, '网页设计助理', '站酷招聘', 1454039660, '2名', '深圳欣米文化传播有限公司', '面议', '深圳 ', '经验一年以下', '全职', '我们是一群对设计偏执狂热的人，我们崇尚有价值的好设计，我们倡导自由激发式的工作氛围，我们追求极致的细节和生活态度。如果你热爱着设计，那么请加入我们。<br>主要负责公司视觉设计工作&nbsp;(电商、游戏等类）<br>公司网站：CIMIDESIGN.COM', '1.&nbsp;具备较强的沟通表达协调能力，踏实认真、性格开朗积极、有较强的抗压能力；<br>2.&nbsp;熟悉PS/AI等看家工具；<br>3.&nbsp;学习能力强，积极、主动，对设计富有激情', '设计部', '深圳市宝安区西乡-地铁站', '2016/0129/20160129115420614.png', '欣米文化', '深圳欣米文化传播有限公司', 'http://www.cimidesign.com', '互联网', 'www.cimidesign.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">开黑</span>          	          	<span class="label">国外旅游</span>          	          	<span class="label">LOL开黑</span>          	          '),
(143, '主设计师/设计主管', '站酷招聘', 1454039660, '2名', '上海马克华菲电子商务有限公司', '面议', '上海 ', '经验3-5年', '全职', '岗位职责：<br>1、负责马克华菲MF或RESHAKE品牌所有线上平台(天猫、京东、一号店、优购、唯品会等)的整体形象设计，把握线上渠道整体风格和视觉呈现，全面提升整体视觉效果。<br>2、管理设计团队，与运营部，策划部，视觉部密切配合，根据公司的营销活动方案完成天猫旗舰店及其他平台的大型活动、店铺活动的主题页面设计和广告图片的设计任务。<br>3、监控天猫、京东、一号店、优购、唯品会等活动页面效果并优化用户体验。<br>4、负责大型设计项目和外界供应商的对接工作。', '任职资格：<br>1、美术、设计或相关专业大专以上学历，有扎实的美术功底。<br>2、3年以上平面设计、网页设计工作经验，有电商平台设计经验，服装或时尚行业工作经验优先。<br>3、有敏锐的时尚触觉，较强的色彩搭配能力及审美观念。<br>4、精通Photoshop、Illustrator 、Dreamweaver等设计软件，丰富的平面设计经验。<br>5、具备良好团队管理能力，并富有工作激情、创新欲望和责任感，并能推动团队的设计能力。<br>关于马克华菲<br>官方网站：www.markfairwhale.com<br>天猫-马克华菲官方旗舰店： http://fairwhale.tmall.com<br>天猫-华菲型格官方旗舰店：http://fairwhaleshake.tmall.com<br>天猫-马克新绅士官方旗舰店：http://makexinshenshi.tmall.com', '电子商务部', '上海市徐汇区龙漕路-地铁站', '2016/0129/20160129115420346.png', '马克华菲', '上海马克华菲电子商务有限公司', 'http://www.markfairwhale.com', '其他', 'www.markfairwhale.com', '1000人以上', '私营企业', '           	          	<span class="label">时尚</span>          	          	<span class="label">服装</span>          	          	<span class="label">潮人</span>          	          	<span class="label">幸福</span>          	          '),
(144, '平面设计师', '站酷招聘', 1454039660, '1名', '上海随时信息科技有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、负责公司品牌营销资料以及VI视觉传达创意、设计和制作<br>2、完成公司的平面设计和印刷品设计需求，包括PPT、海报、宣传品、创意展示、印刷品、微信以及微信美工等<br>3、配合市场推广、活动策划进行相应专题推广页面的设计制作、图片处理等', '1、美术或其他相关专业，优秀的色彩以及图形把握能力，具备独立设计操作能力<br>2、1年以上平面设计或网站美工经验，熟练掌握图形设计软件<br>3、对图片有较强的审美力，能根据需求设计版面风格<br>4、做事认真细致，善于沟通<br>5、具备优秀的执行力以及良好的工作习惯<br>', '市场部', '国定东路200号4幢302室', '2016/0129/20160129115420751.png', '领路', '上海随时信息科技有限公司', 'http://www.mentornow.com/', '互联网', 'http://www.mentornow.com/', '1-50人', '私营企业', '           	          	<span class="label">高前景</span>          	          	<span class="label">团队优秀</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">年终奖</span>          	          	<span class="label">苹果电脑</span>          	          '),
(145, '资深天猫美工', '站酷招聘', 1454039660, '5名', '一加三餐（上海）电子商务有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '岗位概述：<br>1、负责天猫的店铺页面（首页、二级页和宝贝页）的美工制作及上传；<br>2、负责制作天猫上的活动促销图片及广告Banner，并根据店铺活动实际情况及时更新；<br>3、根据店铺实际情况做好宝贝图片的页面位置排版工作；<br>4、收集竞争对手的店铺信息，做出有针对性的图片呈现变化；<br>5、完成领导交代的其他事宜。', '岗位要求：<br>1、大专以上学历，艺术设计相关专业；<br>2、有一年以上的美工工作经验,&nbsp;有淘宝店铺美工经验者优先；<br>3、能够熟练运用PS、DW等制图软件，了解淘宝代码的运用；<br>4、有极强的执行能力，做事认真仔细；<br>5、有较强的敬业精神和团队合作精神。', '创意部', '徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层', '2016/0129/20160129115421511.png', '一加三餐', '一加三餐（上海）电子商务有限公司', 'http://www.ecmoho.com', '电子商务', 'www.ecmoho.com', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(146, 'WEB设计师', '站酷招聘', 1454039661, '2名', '上海莫凡信息技术有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、具基本美术功底，配合项目组根据客户提供的资料进行规范和分析；<br>2、随时根据市场上最新的美术设计时尚元素，注重相关资料和图库的收集和调整；<br>3、能够根据客户需求，直接将客户所想的转化为设计作品；', '1、&nbsp;能独立完成项目的设计以及有较好的表达能力；<br>2、&nbsp;熟练操作PHOTOSHOP&nbsp;AI等相关设计软件；<br>3、&nbsp;具有1年以上网页或电商设计工作经验,&nbsp;有创意和设计能力；<br>4、&nbsp;热爱设计工作，工作认真负责，富有创意；<br>5、&nbsp;具有团队合作精神,能够吃苦耐劳；<br>6、&nbsp;设计相关专业专科以上学历；<br>7、&nbsp;有成熟的作品.', '设计部', '上海市-闵行区', '2016/0129/20160129115421648.jpg', 'MoreFun莫凡', '上海莫凡信息技术有限公司', 'http://www.morefun.me', '电子商务', 'www.morefun.me', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '),
(147, '美工/网页设计', '站酷招聘', 1454039661, '2名', '百互润贸易（上海）有限公司', '面议', '上海 ', '经验1-3年', '全职', '1、负责天猫或其他平台（京东、聚美、1号店等）的设计装修、负责店铺的整体形象、首页、产品展示页面等模块的美工设计&nbsp;<br>2、负责上架产品进行排版、优化宝贝描述、美化产品图片等&nbsp;<br>3、定期更新设计店铺促销图片及页面，同时配合促销活动，调整及修改产品页面及店铺主页更新&nbsp;<br>4、店铺的日常维护及其他设计调整&nbsp;<br>5、图片尺寸调整、实物修片等美工&nbsp;<br>', '1、美术、平面设计等相关专业，专科以上学历&nbsp;<br>2、熟悉天猫或其他平台（京东、聚美、1号店）的设计装修流程、熟悉店铺的整体形象、首页、产品展示页面等模块的美工设计&nbsp;<br>3、精通设计软件Photoshop、Illustrator等，熟悉Dreamweaver、HTML等网页及图形制作软件&nbsp;<br>4、有良好的沟通及策略理解能力、极强的责任性和独立完成工作的能力<br>5、良好的抗压能力，并能接受工作需要的加班安排&nbsp;<br>6、有化妆品电子商务美工、网页设计或平面设计工作经验优先&nbsp;<br>面试时请提供设计作品<br>', '消费品事业部', '南京西路699号', '2016/0129/20160129115421704.jpg', '百润', '百互润贸易（上海）有限公司', '', '电子商务', '', '200-500人', '外商独资', '           	          '),
(148, '平面设计师', '站酷招聘', 1454039661, '2名', '廿一客（上海）电子商务有限公司', '5k-8k', '上海 ', '经验不限', '全职', '1、公司各类平面视觉相关设计执行；&nbsp;<br>2、公司产品，宣传，展示及各项活动的设计与制作工作；&nbsp;<br>3、配合各部门设计相关的平面宣传资料；&nbsp;<br>4、公司品牌形象传达系统的维护与更新工作。&nbsp;', '1、正规美术院校设计专业，良好的审美意识及艺术修养；&nbsp;<br>2、能独立完成各种平面设计工作；&nbsp;<br>3、熟练运用相关专业设计软件，熟悉设计输出、印刷流程、工艺材料等相关专业知识&nbsp;；<br>4、工作踏实认真，责任心强，良好的沟通能力、团队协作精神及服务意识；&nbsp;<br>5、较强的创意能力，能承受一定的工作压力；<br>&nbsp;<br>面试时需携带近期设计作品，应届生也可。&nbsp;&nbsp;&nbsp;&nbsp;<br>', '品牌推广部', '春中路588号', '2016/0129/20160129115421187.jpg', '21Cake', '廿一客（上海）电子商务有限公司', 'http://www.21cake.com', '电子商务', 'www.21cake.com', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">吃到爽</span>          	          	<span class="label">大食堂</span>          	          '),
(149, '网页视觉设计师', '站酷招聘', 1454039661, '10名', '深圳市朋沃科技有限公司', '面议', '深圳 ', '经验不限', '全职', '主要工作负责腾讯游戏类专题页面，官网，海报周边，手机端页面，广告。', '1、美术相关专业或计算机相关专业；2、一年以上设计工作经验，美术功底良好，较强的设计能力，有创意及良好的色彩感觉； 3、能熟练使用Photoshop、Flash、Dreamweaver等流行设计软件； 4、一年以上互联网网站美术设计经验，熟悉网页设计的规范，能独立完成设计案例； 5、有游戏/电商类专题、活动页面、UI设计或者懂手绘经验者优先；6、具有良好的沟通能力、学习能力、适应能力、优秀的团队合作能力。', '', '广东省-深圳市-宝安区', '2016/0129/20160129115421879.jpg', 'PALWO', '深圳市朋沃科技有限公司', 'http://www.palwo.com', '艺术/文化传播', 'www.palwo.com', '50-100人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(150, '高级视觉设计师', '站酷招聘', 1454039662, '1名', '北京动乐网络科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '&nbsp;1、主要负责公司官网及商城的视觉设计，以及产品及促销专题页面设计等工作；<br>&nbsp;2、负责公司广告Banner图片及促销专题页面设计、制作及维护，整体提升公司品牌视觉感<br>&nbsp;3、负责设计制作和优化公司产品详情页文字信息及图片，需要结合产品的特性制作成图文并茂的、有美感的、有较强实用性及吸引力的详细信息页面；<br>４、完善视觉设计流程，实现产品在用户体验上的一致性；<br>&nbsp;5、参与对视觉设计规范的维护、更新、实施；参与前瞻性产品的创意设计<br>&nbsp;6、完成领导上级交给的其他工作<br>', '1.&nbsp;本科及以上学历，美术、设计等相关专业<br>2.&nbsp;三年以上互联网或移动端视觉设计经验；<br>3.&nbsp;丰富的视觉表现力，精通色彩、图形、信息和&nbsp;gui&nbsp;设计原则及方法<br>4.&nbsp;熟练使用&nbsp;Photoshop&nbsp;、&nbsp;Freehand&nbsp;、&nbsp;illustrator&nbsp;等平面设计软件<br>5.&nbsp;具有良好的价值观，能融入团队协作；<br>6.&nbsp;请提供近期设计作品。<br>', '信息运营部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0129/20160129115422687.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(151, '资深网页设计师', '站酷招聘', 1454039662, '3名', '上海友尊文化传播有限公司', '12k-15k', '上海 ', '经验3-5年', '全职', '1、负责网站前端页面（包括PC端与移动端）的创意与设计；PC/移动网站的WEB端、移动端整体UI设计、视觉设计；<br>2、配合市场运营部门，完成网站推广图、专题活动页面策划与设计；<br>3、负责策划设计网站的整体风格、布局、视觉感受及内容设计；<br>4、分析业务需求，研究用户行为和使用场景，优化产品设计；<br>5、负责完善网站推广页面及维护。', '1、有3年及以上的移动互联网、软件或者互联网行业视觉设计工作经验&nbsp;<br>2、具有良好的美术功底及审美能力，较强的视觉设计和创意能力&nbsp;<br>3、良好的沟通能力，善于对设计的表达<br>4.、良好的创造力和审美感知力，能够独立创作并有很多创意，乐于学习；<br>5、&nbsp;请提供相关的设计作品案例到招聘邮箱供参考；<br>6、有团队合作精神，富有激情及责任心。&nbsp;<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！公司网址：www.uimix.com', '设计部', '淞兴西路258号5号楼5109室（半岛1919）', '2016/0129/20160129115422736.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(152, '网页前端设计师', '站酷招聘', 1454039662, '1名', '广州银汉科技有限公司', '12k-15k', '广州 ', '经验3-5年', '全职', '岗位职责：<br>负责公司官网、产品网站、活动专题、手机H5页面等网站重构搭建及相关前端开发工作。<br><br>', '任职要求：<br>1、&nbsp;本科，三年以上网站重构、前端开发工作经验，有网站交互设计，技术开发，移动端页面重构开发等经验优先；<br>2、有良好的代码编写习惯及项目文件管理，能制定相关开发规范，高效响应需求；<br>3、精通HTML5，CSS3，熟悉JS，JQ，能做基础javascript开发；<br>4、有良好的理解和沟通表达能力，能承受工作压力，接受挑战。', '设计中心', '中山大道238号勤天大厦', '2016/0129/20160129115422176.png', '银汉公司', '广州银汉科技有限公司', 'http://www.yh.cn', '游戏', 'www.yh.cn', '500-1000人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年底双薪</span>          	          	<span class="label">年终奖</span>          	          	<span class="label">年度体检</span>          	          	<span class="label">年假</span>          	          	<span class="label">伙食补贴</span>          	          	<span class="label">免费</span>          	          	<span class="label">下午茶</span>          	          '),
(153, '网站重构工程师&nbsp;&nbsp;', '站酷招聘', 1454039662, '1名', '莉莉丝科技（上海）有限公司', '12k-15k', '上海 ', '经验1-3年', '全职', '1)	负责公司及游戏产品的官网制作、日常维护、更新等<br>2)	审核外包项目的页面重构品质<br>3)	负责参与设计体验、流程的制定和规范<br>4)	通过技术提升网站的用户体验和可用性<br>5)	懂设计，可负责部分设计工作<br>', '1)	本科以上学历，从事网页设计及重构工作2年以上<br>2)	对符合web标准的网站重构有丰富经验，有成功案例<br>3)	精通html、css能快构建出兼容主流浏览器的页面&nbsp;<br>4)	熟悉javascript语言，对性能优化有一定了解&nbsp;<br>5)	了解至少一种后台语言的开发机制(如php，Java等)<br>6)	熟练使用Photoshop，有较好审美及设计能力<br>7)	热爱游戏行业，能接受挑战并承受工作压力<br>', '研发部', '上海市闵行区新意城商务广场', '2016/0129/20160129115422400.png', '莉莉丝', '莉莉丝科技（上海）有限公司', 'http://www.lilithgame.com/', '游戏', 'http://www.lilithgame.com/', '100-200人', '私营企业', '           	          	<span class="label">萌妹子多</span>          	          	<span class="label">16薪</span>          	          '),
(154, '前端开发工程师H5', '站酷招聘', 1454039663, '4名', '北京易动纷享科技有限责任公司', '12k-15k', '北京 ', '经验1-3年', '全职', '1.参与公司web前端的架构设计和标准和规范制定；<br>2.利用各种Web技术实现web产品的交互效果，参与项目开发；<br>3.对产品经理、设计师提出的需求给出技术评估和解决方案；', '1.精通HTML和CSS&nbsp;及JavaScript、熟悉前端mvc/mvvm开发框架（例如backbone/angularjs等）优先； <br>2.熟练使用前端技术开发单页面应用（SPA）； <br>3.熟练解决页面兼容性问题； <br>4.有jQuery、Zepto、Angular、Bootstrap等框架的使用经验，对ECMA规范有一定了解； <br>5.熟练掌握HTML5相关技术，如：WebSocket,&nbsp;Web&nbsp;Storage,&nbsp;Cross-document消息传递,XMLHttpRequest&nbsp;Level&nbsp;2等;<br>6.&nbsp;熟悉移动端Web绘图相关高级特性,&nbsp;如canvas,&nbsp;webGL,&nbsp;CSS3动画效果等。', '研发中心', '北京市海淀区知春里-地铁站卫星大厦', '2016/0129/20160129115423365.png', '纷享销客', '北京易动纷享科技有限责任公司', 'http://www.fxiaoke.com', '互联网', 'www.fxiaoke.com', '1000人以上', '私营企业', '           	          	<span class="label">连接企业一切</span>          	          '),
(155, '网页设计师-天猫淘宝电商', '站酷招聘', 1454039663, '1名', '上海宠乐宠物用品有限公司', '面议', '上海 ', '经验不限', '全职', '1、公司旗下所有电商平台的相关设计；&nbsp;<br>2、平台首页、banner、活动页、产品描述页等。', '1、丰富的知识储备，开阔的眼界，从电影到非洲大迁徙。&nbsp;<br>2、细微的洞察力，上大号时都在观察门板的阴影结构。&nbsp;<br>3、时间允许的情况下，偏激的在意作品细节，较客观的考虑用户体验。&nbsp;<br>4、无性别、专业、学历要求，作品说话。&nbsp;<br>5、不需要&nbsp;能承受压力，但接受的工作需按时完成。&nbsp;<br>6、不需要&nbsp;为人和善、谦虚踏实，但必须有责任心、诚实守信。&nbsp;<br>7、不认为国外作品都是好作品，不把创意两字挂嘴边。&nbsp;<br>8、面试需带电子档作品集，或站酷、dribbble、behance等个人主页。<br>9、认同smartisan价值观，你没看错。', '创意部', '上海市-闵行区', '2016/0129/20160129115423190.jpg', '乐宠控股', '上海宠乐宠物用品有限公司', 'http://weibo.com/u/2628202111&nbsp;http://www.weibaquan.com/&nbsp;http://qpet.taobao.com/', '电子商务', 'http://weibo.com/u/2628202111&nbsp;http://www.weibaquan.com/&nbsp;http://qpet.taobao.com/', '100-200人', '私营企业', '           	          	<span class="label">福利</span>          	          '),
(156, '网页设计师', '站酷招聘', 1454039663, '3名', '上海奕尚网络信息有限公司', '8k-12k', '上海 ', '经验不限', '全职', '1、负责公司属下品牌的平面图片设计工作。以符合客户活动要求及审美为前提。&lt;br&gt;2、与市场部，运营部，客服部相关部门相协调，不断调整公司页面视觉，以达到最完美的图片设计以促进销售。 3、具有独立页面设计的能力，也有带领设计师团队工作完成项目的能力。 【加分の个人魅力】情商高，轻微完美主义，经得起甲方龟毛の审核，受得了邮件来来回回の改改改，有一颗温柔抗虐の坚强的心', '1、具有三年以上平面设计经验，具网页设计或电子商务背景的尤佳。&lt;br&gt; 2、能熟练使用adobe软件，如photoshop，illustrator，会使用dreamwaver，可以读懂基本html代码，对css，java等代码有所了解，如有淘宝，天猫等第三方电子商务平台设计经验的更佳。&lt;br&gt; 3、具有良好的审美，对时尚及流行趋势敏感。&lt;br&gt; 4、具有责任心，耐心，纪律性。有团队合作精神，能够在压力之下工作。&lt;br&gt; 5、具有良好的领导能力和沟通能力，能够合理安排和分配工作。 时尚，最时尚。。。（情不自禁唱起来的节奏） 如果你恰好符合以上条件（颜值够高的话以上软性条件可适当放宽=_=），且对服装行业感兴趣，对设计充满热情，请立即将简历发送给我们!', '设计部 ', '上海市长宁区金钟路-道路', '2016/0129/20160129115423128.jpg', '奕尚网络', '上海奕尚网络信息有限公司', '', '电子商务', '', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '),
(157, '网页设计师', '站酷招聘', 1454039664, '2名', '深圳市汇石金融科技有限公司', '20k-25k', '深圳 ', '经验3-5年', '全职', '职位描述<br>工作内容：<br>1）负责产品的UI/UE设计，监控UI设计师的页面呈现，把控UI设计师对UE设计理解及呈现的完美到位；&nbsp;<br>2)&nbsp;对产品的易用性和功能分析，进行用户研究；参与产品前期界面视觉设计、流行趋势分析、UI规范；<br>3)&nbsp;结合用户体验，优化完善设计流程，高质量完成产品；<br>4)&nbsp;产品的整体视觉风格设计及后期跟进，与产品技术配合，进行跨部门合作的协调和沟通，共同推动产品的最终实现；<br>5)&nbsp;分享设计经验、推动提高团队的设计能力。<br><br>工作地址<br>深圳市南山区深南大道瑞思中心34层（世界之窗地铁站C1出口）', '大专以上学历，美术、艺术设计或相关专业；<br>1)&nbsp;精通Photoshop、Illustartor等设计软件；<br>2)&nbsp;3年以上的互联网或移动互联网优秀产品设计经验，时刻关注互联网动态，对业界新技术有热烈的好奇心和钻研精神；<br>3)&nbsp;热爱设计，拥有宽广的行业（平面设计、互联网）视野与时尚的审美标准；<br>4）有较强的美术功底和创意能力，热爱交互设计和视觉设计，具备良好的美感，对页面的色彩和布局有较好的把握<br>5)&nbsp;具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br>注：（投递简历时请附作品，无作品不接受面试）', '产品', '益田假日广场瑞思国际中心3414', '2016/0129/20160129115424398.png', '汇石金融', '深圳市汇石金融科技有限公司', 'http://www.currone.com', '互联网', 'www.currone.com', '1-50人', '私营企业', '           	          	<span class="label">绩效奖金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">弹性工作</span>          	          	<span class="label">氛围活跃</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">金融证券</span>          	          	<span class="label">互联网</span>          	          	<span class="label">对冲基金</span>          	          '),
(158, '网页视觉设计师', '站酷招聘', 1454039664, '10名', '深圳欣米文化传播有限公司', '面议', '深圳 ', '经验不限', '全职', '我们是一群对设计偏执狂热的人，我们崇尚有价值的好设计，我们倡导自由激发式的工作氛围，我们追求极致的细节和生活态度。如果你热爱着设计，那么请加入我们。<br>主要负责公司视觉设计工作&nbsp;(电商、游戏等类）<br>公司网站：CIMIDESIGN.COM', '1.&nbsp;具备较强的沟通表达协调能力，踏实认真、性格开朗积极、有较强的抗压能力；<br>2.&nbsp;二年以上的网页设计经验和相关作品<br>3.&nbsp;精通PS/AI等看家工具；<br>4.&nbsp;拥有宽广的行业视野及优秀的审美；<br><br>', '设计部', '深圳市宝安区西乡-地铁站', '2016/0129/20160129115424668.png', '欣米文化', '深圳欣米文化传播有限公司', 'http://www.cimidesign.com', '互联网', 'www.cimidesign.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">开黑</span>          	          	<span class="label">国外旅游</span>          	          	<span class="label">LOL开黑</span>          	          ');
INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(159, '资深网站视觉设计师', '站酷招聘', 1454039664, '1名', '网易（杭州）网络有限公司', '12k-15k', '杭州 ', '经验3-5年', '全职', '1.具备良好的审美能力、动手能力、沟通能力、有相关的设计工作经验；<br>2.&nbsp;负责游戏运营及品牌宣传的推广设计工作；<br>3.&nbsp;设计时，根据需求进行系统分析，设计出符合要求的设计作品；<br>4.&nbsp;关注所负责产品的设计动向，为产品提供专业的美术意见及建议。', '1.&nbsp;热爱游戏，对UI设计趋势有灵敏触觉和领悟能力；<br>2.&nbsp;关注用户体验设计，并对网站的易用性有一定研究；<br>3.&nbsp;良好的创意思维和理解能力，有深厚的美术功底；<br>4.&nbsp;能熟练使用Photoshop、Flash、Illustrator、Fireworks、After&nbsp;Effects等流行设计软件；<br>5.&nbsp;设计相关专业学历，3年以上设计工作经验；（能力优秀者可放宽）<br>6.&nbsp;具备良好合作态度及团队精神，并富有工作激情、创造力和责任感。', '网易游戏', '网商路599号', '2016/0129/20160129115424163.png', '网易', '网易（杭州）网络有限公司', 'http://www.163.com', '互联网', 'www.163.com', '1000人以上', '私营企业', '           	          	<span class="label">网易</span>          	          	<span class="label">态度</span>          	          	<span class="label">游戏</span>          	          	<span class="label">电子商务</span>          	          	<span class="label">教育</span>          	          	<span class="label">音乐</span>          	          	<span class="label">社交</span>          	          '),
(160, '资深设计师/设计师', '站酷招聘', 1454039664, '3名', '北京天纳广告有限公司', '面议', '北京 ', '经验不限', '全职', '参与创意，负责网页设计表现执行', '具备较强专业控制力<br>具备原创性<br>不以干行活为终极职业目标<br><br><br>有意应聘者请将简历和作品发至：hr@tamnaaaa.com', '创意部', '北京市朝阳区22院街艺术区', '2016/0129/20160129115424802.png', '天纳', '北京天纳广告有限公司', 'http://www.tamnaaaa.com', '影视/媒体', 'www.tamnaaaa.com', '1-50人', '私营企业', '           	          	<span class="label">天纳</span>          	          	<span class="label">TAMNAAAA</span>          	          '),
(161, '资深网页设计师-深圳', '站酷招聘', 1454039665, '10名', '北京深度沟通广告有限公司', '15k-20k', '深圳 ', '经验不限', '全职', '注：网站视觉设计、移动app界面设计，不仅是图标设计，不是平面设计。<br><br>1、与公司UCD团队一起完成高质量网站项目、移动app项目；&nbsp;<br>2、视觉设计提案、视觉风格定义、视觉规范制定、视觉设计；&nbsp;<br>3、撰写ppt，诠释并分享视觉作品。', '1、4年以上本职位工作经验；&nbsp;<br>2、优异的设计创意能力及独立完成个案的能力（看作品）；&nbsp;<br>3、设计要可以讲出道理，思维要严谨；&nbsp;<br>4、有较强的创新能力，对色彩的把握独到，能把设计风格和栏目特色进行有效的结合；&nbsp;<br>5、良好的沟通、领悟能力，具有团队合作精神和敬业精神，能与团队其他成员进行有效沟通；&nbsp;<br>7、有对作品全程负责的态度和毅力，像素级精确设计；<br>具备以下能力者优先考虑：&nbsp;<br>1、优秀的企业网站设计作品、成熟的app设计作品；&nbsp;<br>2、有带队经验。', '用户体验', '坂田华为基地', '2016/0129/20160129115425845.png', 'DEEP深度沟通', '北京深度沟通广告有限公司', 'http://www.deeping.cn', '互联网', 'www.deeping.cn', '50-100人', '私营企业', '           	          	<span class="label">用户体验</span>          	          	<span class="label">UCD</span>          	          	<span class="label">UE</span>          	          	<span class="label">UX</span>          	          '),
(162, 'Web设计师', '站酷招聘', 1454039665, '1名', '上海铭塔飞信息技术有限公司', '面议', '上海 ', '经验不限', '全职', '我司客户主要以日系企业为主，提供网站的搭建制作等服务。<br>1、同客户担当一起，针对网站课题进行设计提案从而解决问题。<br>2、使用Photoshop等设计工具对客户网站的页面和Banner横幅广告进行全新设计；<br>3、对既有网站进行修改等。', '年龄要求：20-30岁<br>学历要求：大专以上<br><br>应聘资格（技能）：<br>具备网站制作公司从业经验<br>熟练使用Photoshop进行网页设计<br>对HTML、CSS等网页脚本有一定理解<br><br>若对HTML・CSS不了解的话，只有Photoshop设计经验者也可。<br><br>补充：具有实际相关工作经验者，请注明本人作品的URL地址。', '设计部', '上海市长宁区延安西路地铁-地铁站', '2016/0129/20160129115425329.jpg', 'Metaphase', '上海铭塔飞信息技术有限公司', '', '互联网', '', '1-50人', '私营企业', '           	          '),
(163, '网络运营专员', '站酷招聘', 1454039665, '2名', '北京博特创想文化有限公司', '面议', '北京 ', '经验不限', '全职', '1、把我们公司的产品包装成营销服务产品；负责我公司自有产品的营销推广策划与执行。<br>2、负责公司未来淘宝店与天猫店的日常运营，包括：店铺设计策划、宝贝描述页的策划与分析优化等。&nbsp;<br>', '1、对市场具有敏锐地洞察力，热爱市场策划工作，积极、勇于接受挑战；&nbsp;<br>2、了解互联网营销等新营销，是深度的互联网网民，思维活跃，对新事物新互联网技术特别敏感充满兴趣；有网络运营推广经验者优先；<br>3、具备一定的数据分析能力，能够清晰且有感染力的表达能力；&nbsp;<br>4、具备高度的敬业和团队合作精神，有较强的责任心，工作细致负责；&nbsp;<br>5、有丰富的市场营销、销售团队管理、策划执行经验者，优先考虑。<br>', '设计部', '北京市-西城区', '2016/0129/20160129115425401.jpg', '博特创想', '北京博特创想文化有限公司', 'http://www.besthinking.com.cn', '艺术/文化传播', 'www.besthinking.com.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">错峰上班不打卡</span>          	          	<span class="label">加班包餐包打车</span>          	          	<span class="label">带薪旅游</span>          	          	<span class="label">每天下午茶</span>          	          '),
(164, 'WEB网页前端设计师', '站酷招聘', 1454039665, '3名', '上海奕尚网络信息有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1.熟悉W3C标准，精通WEB前端HTML5/XHTML/HTML/CSS/JavaScript等主流技术<br>2.能熟练手工编写HTML5及DIV+CSS代码，并对各种常用浏览器做到良好兼容，确保网页可以跨平台跨浏览器运行（PC及移动端）<br>3.熟练运用常见AJAX框架，熟悉Javascript，&nbsp;掌握一些常用JS库，如JQuery<br>4.能熟练使用Photoshop,Dreamweaver等软件<br>5.较强的责任心和耐心，良好的团队合作意识，性格踏实稳重，能承受高强度的工作压力<br>6.有手机端开发经验者优先考虑', '1.大专以上学历<br>2.相关电子商务网站一年以上工作经验', '设计部', '上海市长宁区金钟路-道路', '2016/0129/20160129115425708.jpg', '奕尚网络', '上海奕尚网络信息有限公司', '', '电子商务', '', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '),
(165, '中级视觉设计师专题', '站酷招聘', 1454039666, '2名', '南京卓奇软件设计有限公司 ', '5k-8k', '南京 ', '经验1-3年', '全职', '1、负责偏向推广、营销、海报方向的页面视觉设计；<br>2、部分平面相关的设计；<br>3、页面中视觉元素的创意与绘制；<br>', '1、1年以上从业经验，学历不限；<br>2、熟练使用&nbsp;Ps&nbsp;或&nbsp;Sketch，Ai&nbsp;等视觉设计软件；<br>3、有一定相关项目经验；<br>4、热爱设计，有良好的美术功底，手绘能力优秀者优先；<br>5、良好的沟通能力，以及团队协作精神；', '设计部门', '珠江路88号新世界中心B座', '2016/0129/20160129115426361.jpg', '卓奇设计', '南京卓奇软件设计有限公司 ', 'http://www.zocdesign.net', '互联网', 'www.zocdesign.net', '50-100人', '私营企业', '           	          	<span class="label">高薪</span>          	          	<span class="label">福利全面</span>          	          	<span class="label">追求卓越</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">工作灵活</span>          	          	<span class="label">环境优良</span>          	          	<span class="label">年轻进取</span>          	          	<span class="label">下午茶</span>          	          '),
(166, '项目经理助理', '站酷招聘', 1454039666, '3名', '上海博广广告传媒有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、根据项目需求，跟进各类制作品的进程，质量，时间把控，成本把控；&lt;br&gt;2、维护客户关系，根进并落实项目进度和制作情况，现场监督项目质量和协调；&lt;br&gt;3、遵守公司制作流程相关规定，控制项目预算；&lt;br&gt;4、负责客户广告投放的总结、归档，内部资料的整理归纳；&lt;br&gt;5、 对项目执行进行跟踪、监控、反馈及阶段性总结及数据报表；&lt;br&gt;6、.负责协调活动相关人员、物料、流程执行。', '1、大专以上学历，两年以上互联网或广告公司客户执行经验；中文、广告、公关、营销专业优先；&lt;br&gt;2、工作认真负责、个性积极主动、性格开朗、讲求效率、乐于接受挑战；&lt;br&gt;3、善于与客户建立良好关系，沟通能力强，耐心、细心，能够承受工作压力；&lt;br&gt;4、熟悉办公软件，熟练使用WORD，EXCEL和POWERPOINT, 有较好的文字功底； &lt;br&gt;5、出色的口头表达、逻辑清晰，能高效的和各部门协调；&lt;br&gt;6、有强烈的工作责任心和团队合作精神，能快速适应不同的工作环境；&lt;br&gt;7、具备良好的商务沟通和人际交往能力，工作积极主动，具有较强的团队协作意识； &lt;br&gt;8、具有较高能动性，可以独立判断机会和风险，在工作团队中能及时寻求和提供帮助。', '项目部', '上海市闸北区108创意广场金座716-717室', '2016/0129/20160129115426333.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '),
(167, '高级用户体验研究设计师', '站酷招聘', 1454039666, '2名', '上海洛可可整合设计有限公司', '面议', '上海 ', '经验1-3年', '全职', '1、负责设计实施各种用户研究，分析用户需求及产品使用行为，统计分析各项用户体验研究数据，为设计及产品开发提供依据和建议；<br>2、产品可用性测试：理解设计需求及问题，设计测试方案，进行测试工作并完成测试报告；<br>3、项目管理：负责与客户的沟通过，推动项目顺利执行，按时交付设计成果；&nbsp;&nbsp;<br>4、制作用户访谈、问卷调查等具体执行方案；执行用户访谈，与用户进行面对面的沟通，了解用户特征，挖掘用户需求，并能快速记录所获得的重点信息；&nbsp;<br>5、运用专家评估、桌面研究、竞争分析等方法对相关产品进行用户体验水平评估；&nbsp;<br>6、对收集到的用户、市场等信息进行整理分析，并提出设计改进建议，制作相应的研究报告；&nbsp;', '1、熟练掌握各种用户研究方法，有坚实的统计和数据分析基础，逻辑分析能力强，善于独立思考，善表达与沟通；<br>2、有独立执行深度访谈、可用性测试、专家评估、问卷调查等用户研究工作的经历和能力，须有相关案例介绍；<br>3、思维活跃，能接受挑战，认真踏实，做事细致严谨，积极主动，并能同时应对多个项目，能针对不同项目有效权衡和分配工作时间；<br>4、心理学、社会学、统计学、人机交互或相关专业，本科以上学历，硕士学历者优先；', 'UED部门', '上海市-黄浦区', '2016/0129/20160129115426202.png', '上海洛可可', '上海洛可可整合设计有限公司', 'http://www.lkkdesign.com', '艺术/文化传播', 'www.lkkdesign.com', '500-1000人', '私营企业', '           	          	<span class="label">独具一格的设计公司</span>          	          '),
(168, '网页兼平面设计师', '站酷招聘', 1454039666, '3名', '上海慨一实业有限公司', '8k-12k', '上海 ', '经验3-5年', '全职', '负责公司网页以及平面设计的工作。', '1、3年以上网页设计工作经验，有成熟的网页设计作品；<br>2、熟练使用&nbsp;PS、AI&nbsp;、FLASH等图像处理软件；<br>3、熟知线上线下物料；<br>4、会网页的同时也会平面设计；<br>5、能接受加班；<br>6、团队合作意识较强。', '设计部', '静安区南京西路934号406室', '2016/0129/20160129115426606.jpg', '慨一实业', '上海慨一实业有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(169, '资深网页设计师 ', '站酷招聘', 1454039667, '1名', '上海莫凡信息技术有限公司', '8k-12k', '上海 ', '经验不限', '全职', '1、追求震撼的视觉体验的设计;<br>2、改善和优化电商页面的用户体验，并能给出具体的方案；<br>3、配合产品开发进度完成设计工作并适时对相关业务开展提出建议和解决办法。', '1、精通Photoshop、Illustrato、Indesign等工具；<br>2、对电商及Web实现有较深入的了解；<br>3、具有一定的美术鉴赏、排版/色彩搭配能力；<br>4、思维活跃，具有创新意识；<br>5、具备高度的责任心、诚信的工作作风、优秀的学习和沟通能力及团队精神；<br>6、艺术设计类专业，并从事网站设计1-2年以上工作经历；<br>数位板经验者优先；', '设计部', '上海市-闵行区', '2016/0129/20160129115427720.jpg', 'MoreFun莫凡', '上海莫凡信息技术有限公司', 'http://www.morefun.me', '电子商务', 'www.morefun.me', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '),
(170, '资深视觉设计', '站酷招聘', 1454039667, '1名', '南京卓奇软件设计有限公司 ', '12k-15k', '南京 ', '经验3-5年', '全职', '工作职责<br>-	负责偏向推广、营销、海报方向的页面视觉设计<br>-	部分平面相关的设计<br>-	页面中视觉元素的创意与绘制<br>-	设计反馈的翻译者，能够将客户等非设计专业人士的意见转化整理为实际可行的修改点；<br>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;能够担当视觉专题设计小组领导工作，给中级视觉&nbsp;初级视觉给予指导<br>', '职位要求<br>-	3年以上从业经验，学历不限；<br>-	优秀的审美，有能力提供让人眼前一亮的设计；<br>-	有一定相关项目经验；<br>-	热爱设计，有良好的美术功底，手绘能力优秀者优先；<br>-	良好的沟通能力，以及团队协作精神；<br>', '设计部门', '玄武区珠江路88号新世界中心B座1611', '2016/0129/20160129115427314.jpg', '卓奇设计', '南京卓奇软件设计有限公司 ', 'http://www.zocdesign.net', '互联网', 'www.zocdesign.net', '50-100人', '私营企业', '           	          	<span class="label">高薪</span>          	          	<span class="label">福利全面</span>          	          	<span class="label">追求卓越</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">工作灵活</span>          	          	<span class="label">环境优良</span>          	          	<span class="label">年轻进取</span>          	          	<span class="label">下午茶</span>          	          '),
(171, '文案策划经理', '站酷招聘', 1454039667, '3名', '北京蓝桃文化有限公司', '8k-12k', '北京 ', '经验1-3年', '全职', '1、关注互联网新鲜事，熟知网络语言，擅长“一句顶一万句”。<br>2、负责提供优质、高效的创意方案，确保满足客户需求；&nbsp;<br>3、关注客户及竞品的品牌策略与市场策略，提出对应的方案；<br>4、极佳的文字驾驭和创作能力，能独立撰写完成各种活动策划和品牌基础物料的撰写。', '1、两年以上互联网公司市场部、4A公司、数字营销公司经验；<br>2、能够独立策划、文案撰写，有赋予事件以意义的策划能力<br>3、有在活动前期掌控传播、造势的能力，了解传播规律和常用媒介；了解互联网用户心理，有“网感”<br>4、了解活动策划中如何制造亮点，能够预知流程中的用户气氛<br>5、对于高强度爆发的活动执行工作，有兴奋感<br>6、较好的逻辑思维能力，创意想法多，有良好的执行力。', '品牌部', '广顺北大街融创动力产业园B223', '2016/0129/20160129115427211.png', '蓝桃文化', '北京蓝桃文化有限公司', 'http://www.lantaochina.com', '广告/公关/会展', 'www.lantaochina.com', '50-100人', '私营企业', '           	          '),
(172, '文案', '站酷招聘', 1454039667, '1名', '北京蓝桃文化有限公司', '面议', '北京 ', '经验不限', '全职', '1、组织参与重要项目的创意构思、文案及客户提案,&nbsp;给予前期提案、设计创意说明及后期结案报告等服务。&nbsp;&nbsp;&nbsp;&nbsp;<br>2、在设计师指导下，执行并监督所负责项目的创意构思和文案。&nbsp;&nbsp;&nbsp;&nbsp;<br>3、稿件思路清晰，能够完成稿件写作思路规划。&nbsp;&nbsp;&nbsp;&nbsp;<br>4、协助项目经理进行创意提案，保证工作的顺利推进。&nbsp;&nbsp;&nbsp;&nbsp;<br>5、独立撰写各类稿件（新闻稿、综述稿、评论稿、专访稿等）、策划方案、报告等。', '1、新闻学、传播学、中文、经济管理类相关专业，大学本科以上学历。&nbsp;&nbsp;&nbsp;&nbsp;<br>2、熟悉品牌推广行业，三年以上市场策划及文案工作经验，有整合推广成功案例者优先。&nbsp;&nbsp;&nbsp;&nbsp;<br>3、能够准确捕捉产品亮点，具备恰如其分的文字表现能力。&nbsp;&nbsp;&nbsp;&nbsp;<br>4、熟悉专业创意方法，思维敏捷，洞察力强，文字功底扎实，语言表达能力强。&nbsp;&nbsp;&nbsp;&nbsp;<br>5、能独立完成项目、广告等推广文案的撰写。', '设计部', '广顺北大街融创动力产业园B223', '2016/0129/20160129115427804.png', '蓝桃文化', '北京蓝桃文化有限公司', 'http://www.lantaochina.com', '广告/公关/会展', 'www.lantaochina.com', '50-100人', '私营企业', '           	          '),
(173, '资深互动广告文案', '站酷招聘', 1454039668, '2名', '上海利宣广告有限公司', '8k-12k', '上海 ', '经验不限', '全职', '为一系列知名国际品牌提供互动创意的想法和文案产出，客户涵盖化妆品，汽车，服装配饰，家装，IT等。<br><br>工作涉及活动创作，网站，横幅广告，移动应用程序和社交媒体提案<br>负责品牌的社交媒体常规内容撰文<br>负责和参与品牌社交媒体帐户的定位与年度规划<br>社交媒体活动创意想法<br>网络媒体新闻通稿，软文撰写<br><br>请将作品简历发送至以下邮箱：momo.li@net-show.cn&nbsp;,&nbsp;lee.li@net-show.cn&nbsp;,&nbsp;winn.wang@net-show.cn<br>', '热爱文字,博览群书,爱好广泛<br>有天马行空,机灵古怪的想法<br>具有很强的文字功底,对文字精益求精<br>熟悉网络,擅长用网络语言与用户沟通,了解互动整合营销<br>具有很强的时间及团队合作观念,善于沟通<br>高度适应能力以及抗压能力<br><br>公司福利<br>每月综合补助（加班餐补，出租车费报销）<br>员工年度体检<br>员工年度旅游（境外为主）<br>组织不定期团建活动（如各类专业培训、拓展训练、聚餐等）<br>庆生会、节日祝福及礼品等<br>', '创意部', '灵石路658号802室（大宁财智中心）', '2016/0129/20160129115428542.png', 'Net-show', '上海利宣广告有限公司', 'http://net-show.cn', '广告/公关/会展', 'http://net-show.cn', '50-100人', '私营企业', '           	          	<span class="label">弹性工作</span>          	          	<span class="label">年底分红</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">人性化管理</span>          	          '),
(174, '视觉设计师', '站酷招聘', 1454039668, '3名', '深圳市青木文化传播有限公司', '面议', '深圳 ', '经验不限', '全职', '视觉传达', '1. 2年以上视觉设计相关工作经验； 2. 熟练操作Photoshop、Illustrator、3d软件、手绘能力、优先考虑；3. 良好的沟通能力，积极主动，对工作富有高度的热情及耐心； 4. 有较强的抗压能力。', '', '广东省-深圳市-南山区', '2016/0129/20160129115428356.jpg', 'treedom', '深圳市青木文化传播有限公司', 'http://treedom.cn', '互联网', 'treedom.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          '),
(175, '客户服务/AE', '站酷招聘', 1454039668, '2名', '光合线（北京）广告策划有限公司', '面议', '北京 ', '经验不限', '全职', '你是公司与客户的桥梁。', '1、性格开朗大方；<br>2、有正规广告公司AE工作经验；<br>2、优秀的理解和沟通能力；<br>4、团队意识强，服务过地产客户者优先。', '客户', '北京市-朝阳区', '2016/0129/20160129115428627.jpg', '光合线广告', '光合线（北京）广告策划有限公司', '', '广告/公关/会展', '', '1-50人', '私营企业', '           	          '),
(176, '天猫美工/网页设计', '站酷招聘', 1454039668, '1名', '百互润贸易（上海）有限公司', '5k-8k', '上海 ', '经验不限', '全职', '1、负责天猫商城店铺的设计装修、负责店铺的整体形象、首页、产品展示页面等模块的美工设计；<br>2、负责对上架产品进行排版、优化店内宝贝描述、美化产品图片等；<br>3、定期更新设计店铺促销图片及页面。同时配合促销活动，调整及修改产品页面及店铺主页更新 ；<br>4、店铺的日常维护及其他设计调整；<br>5、图片尺寸调整、实物修片等美工；', '1、美术、平面设计等相关专业，专科以上学历；<br>2、熟悉天猫商城店铺的设计装修流程、熟悉店铺的整体形象、首页、产品展示页面等模块的美工设计；<br>3、熟悉店铺上下架流程，对上架产品进行排版、优化店内宝贝描述、美化产品图片等熟练掌握 ；<br>4、精通设计软件Photoshop、Illustrator等，熟悉Dreamweaver、HTML等网页及图形制作软件；<br>5、有良好的沟通及策略理解能力、极强的责任性和独立完成工作的能力；<br>6、有化妆品电子商务美工、网页设计或平面设计工作经验优先 ；<br>面试时请提供设计作品。', '皮肤美容事业部', '上海市静安区东方众鑫大厦', '2016/0129/20160129115428262.jpg', '百润', '百互润贸易（上海）有限公司', '', '电子商务', '', '200-500人', '外商独资', '           	          '),
(177, '网页设计师', '站酷招聘', 1454039668, '5名', '上海磐特文化传播有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '品牌类、产品类、活动类、电商类网站页面设计；<br>电脑端和手机端网站前端页面设计；<br>APP和交互多媒体界面设计；<br>制作html页面，切片，和程序员对接；<br>维护更新网站内容；<br>面试请带好相关作品。', '工作经验：同等岗位工作，1年以上<br>专业要求：多媒体设计、艺术设计、装潢设计、平面设计、计算机开发<br><br>整体要求：<br><br>有成熟的商业作品，包含但不限于平面设计（vi、平面排版、主视觉类）或者网站设计（网站、app软件、游戏），丰富的设计素材库，创意和动手设计能力强,良好团队合作能力,吃苦耐劳,具备良好的艺术鉴赏度和时尚敏锐度<br><br>技能要求：<br><br>熟练使用平面设计软件(PS,AI),掌握网页设计软件(Dreamweaver)、网页动画软件（flash）、非编类软件（AE,PM）<br>', '数字广告部', '上海市徐汇区田林路192号华鑫科技园101室', '2016/0129/20160129115429700.png', '美腾库博', '上海磐特文化传播有限公司', 'http://www.exmatecube.com ', '互联网', 'www.exmatecube.com ', '1-50人', '私营企业', '           	          	<span class="label">创意设计</span>          	          	<span class="label">数字广告</span>          	          	<span class="label">涨工资快</span>          	          	<span class="label">有高手带</span>          	          	<span class="label">老板幽默</span>          	          	<span class="label">气氛轻松</span>          	          	<span class="label">交通方便</span>          	          	<span class="label">团队旅游</span>          	          	<span class="label">可午睡</span>          	          '),
(178, '视觉设计师', '站酷招聘', 1454039669, '2名', '北京站酷网络科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '	我们是小团队作战，所以需要各种多面手<br>	你或能独立完成产品界面设计(Web、APP)<br>	你或能独立完成线上活动专题设计<br>	你或能独立完成平面相关设计(平面物料和站酷周边)<br>	并能帮助团队完成日常运营设计(在线广告和小活动)<br>', '	热爱站酷，适应力强，具备良好的团队合作精神，能承受工作压力<br>	良好的手绘创作能力，发达的视觉细胞<br>	界面设计、网页设计、平面设计、相关专业优先<br>	熟练使用各种设计工具(PS、AI)<br>', '用户体验中心', '北京市-朝阳区', '2016/0129/20160129115429995.jpg', '站酷网', '北京站酷网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(179, '网页设计师', '站酷招聘', 1454039669, '5名', '北京创锐文化传媒有限公司', '5k-8k', '北京 ', '经验1-3年', '全职', '1.&nbsp;负责网站产品及活动类系列视觉创意设计工作；<br>2.&nbsp;负责对外广告形象创意设计；&nbsp;<br>', '1.本科及以上学历，设计类相关专业；&nbsp;<br>2.有1年以上相关工作经验；&nbsp;<br>3.擅长视觉设计和创意表现类的工作；&nbsp;<br>3.掌握各种视觉设计软件，并精通至少2种；<br>4.习惯先动脑，后动手,&nbsp;有较强执行能力；&nbsp;<br>备注：投递简历时请附带个人作品&nbsp;，谢谢', '创意部', '东四十条A口，中汇广场B座20层', '2016/0129/20160129115429295.png', '聚美优品', '北京创锐文化传媒有限公司', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '电子商务', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '500-1000人', '私营企业', '           	          '),
(180, '网页设计/美工', '站酷招聘', 1454039669, '1名', '北京动乐网络科技有限公司', '8k-12k', '北京 ', '经验3-5年', '全职', '1、负责页面广告图设计，有独立完成整个广告设计的工作能力；<br><br>2、&nbsp;独立完成海报、logo及网页的设计制作上传；<br><br>3、了解CSS+Html页面制作流程及基础代码；<br><br>4、逻辑思维清晰，做事认真、细致，表达能力强，具备良好的工作习惯<br>', '1、&nbsp;精通&nbsp;Photoshop、Dreamweaer、Illustrator、sketch等；<br>2、熟悉&nbsp;Html、css&nbsp;,会切图；<br>3、有较强的平面设计感觉及良好的美术基础；<br>4、有良好的学习能力、沟通能力和领悟能力，能够承受较大的工作压力；<br>5、有良好的团队合作意识，耐心、诚恳，有强烈的责任心和积极主动的工作态度；<br>6、2年以上网站设计相关经验，熟悉网站建设流程；<br>7、有Wap端、H5设计经验者优先。简历需附带个人作品或作品链接<br>', '平台事业部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0129/20160129115429189.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(181, '项目经理', '站酷招聘', 1454039670, '3名', '北京博特创想文化有限公司', '面议', '北京 ', '经验不限', '全职', '1、建立并维护新老客户关系，为企业树立良好的口碑；&nbsp;<br>2、在项目进展中，能与客户、设计团队进行双向沟通并有很好的项目协调能力；&nbsp;<br>3、会制作完美的PPT，把公司开发的产品及时准确的传达到客户手中；&nbsp;<br>4、新老客户的开发及跟踪回访；&nbsp;<br>5、负责公司产品的后期印刷、加工、发货等事宜。<br>', '职位要求：<br>1、有两年及以上广告、传媒、设计公司的工作经验；&nbsp;<br>1、具有优秀的语言表达能力、商务谈判能力及项目提案能力；&nbsp;<br>2、有强烈的进取心，头脑清晰、反应机敏，具有良好的职业素养和职业道德；&nbsp;<br>3、有良好的团队意识、协调能力和合作能力；&nbsp;<br>', '设计部', '北京市-西城区', '2016/0129/20160129115430716.jpg', '博特创想', '北京博特创想文化有限公司', 'http://www.besthinking.com.cn', '艺术/文化传播', 'www.besthinking.com.cn', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">错峰上班不打卡</span>          	          	<span class="label">加班包餐包打车</span>          	          	<span class="label">带薪旅游</span>          	          	<span class="label">每天下午茶</span>          	          '),
(182, 'WEB前端工程师--H5', '站酷招聘', 1454039670, '2名', '辉塔信息技术咨询（上海）有限公司', '面议', '北京 ', '经验不限', '全职', '1、负责将网页效果图切成HTML代码；&nbsp;<br>2、网站前端页面制作、优化，以及JS互动效果实现；&nbsp;<br>3、能够不断的对前端代码进行优化，使网站符合SEO的要求；&nbsp;<br>4、调试网站页面在不同浏览器下的兼容性；&nbsp;<br>5、调试手机端页面在有不同手机终端下的兼容性；&nbsp;<br>6、负责与设计人员和开发人员的沟通。&nbsp;', '1、精通DIV+CSS流动布局的HTML代码编写，熟练手写标准WEB页面符合W3C标准；熟练使用常规网站制作软件；&nbsp;<br>2、精通JavaScript开发,能够熟练的使用JavaScript进行面向对象编程；&nbsp;<br>3、熟悉调整各种跨浏览器兼容性技术；&nbsp;<br>4、熟悉手机端html5页面开发；&nbsp;<br>5、具备较强的快速学习能力，独立解决问题能力和抗压能力；&nbsp;', '设计部', '北京市-朝阳区', '2016/0129/20160129115430514.jpg', 'faceui', '辉塔信息技术咨询（上海）有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          '),
(183, '网页设计师', '站酷招聘', 1454039670, '8名', '上海友尊文化传播有限公司', '8k-12k', '上海 ', '经验1-3年', '全职', '1.&nbsp;负责网站前端页面（包括PC端与移动端）的创意与设计；<br>2.负责完善网站推广页面及维护；<br>3.熟悉运用Photoshop、AI、Flash等设计相关的软件；<br>4.了解Dreamweaver&nbsp;等网页制作软件,对HTML、CSS等制作技术有一定了解；<br>', '1、网页设计相关工作经验1年以上，具备网页设计与活动专题设计的相关经验；有较强的网站设计能力，有门户网站设计经验，有较强的美术功底；（如无经验者大学毕业生，需提交优秀作品）<br>2、独立创新的风格设定能力、优秀的视觉表达能力；<br>3、具备自己独有的设计风格，并成功运用在产品设计中；<br>4、良好的团队合作精神，待人热忱，思维敏捷，良好的人际沟通能力，责任心强；<br>5、有很好的自学能力和上进心，能把握最新的设计趋势。<br>UIMIX感谢设计师小主、贵人们的投递：<br>(宽裕的上班时间，上午10：30上班&nbsp;中午午休两小时&nbsp;&nbsp;每日鲜美水果及甜品供应&nbsp;&nbsp;&nbsp;超长14天春节假期另附5天年假&nbsp;年终境外游&nbsp;&nbsp;&nbsp;丰厚项目季度奖以及超级棒棒哒年终奖&nbsp;&nbsp;不忘记我们每一位可爱的同事生日&nbsp;&nbsp;&nbsp;&nbsp;独具特色的六一儿童节假&nbsp;聚集80后90后思想活跃、奋发向上、轻松自由的设计大咖们的UIMIX欢迎您的加入！）<br>公司网址：www.uimix.com<br>（备注：薪资待遇根据能力定义，以上只是大框架，能者多酬劳！）<br>', '设计组', '上海市-宝山区', '2016/0129/20160129115430314.jpg', 'uimix', '上海友尊文化传播有限公司', 'http://www.uimix.com', '互联网', 'www.uimix.com', '1-50人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">年度境外游</span>          	          	<span class="label">#五险一金</span>          	          '),
(184, '网页设计师', '站酷招聘', 1454039670, '1名', '上海凯淳实业有限公司', '5k-8k', '上海 ', '经验不限', '全职', '岗位职责：<br>1.负责天猫旗舰店网站的设计、改版；&nbsp;<br>2.负责旗舰店产品的界面设计，制定相关产品的设计规范；&nbsp;<br>3.负责线上推广活动相关的视觉设计和前端实现，包括EDM、页面、专题、Banner等；&nbsp;<br>4.负责各类宣传品的设计与日常广告设计。', '任职资格：<br>1、有较强的美术功底和出色的网页平面设计审美功力；&nbsp;<br>2、能够熟练使用Dreamweaver、Flash、Fireworks、Photoshop等设计工具；&nbsp;<br>3、能独立策划、设计、制作高品位的网页；&nbsp;<br>4、了解网页制作技术如javascript、HTML、CSS等编程语言；&nbsp;<br>5、善于沟通，具有良好的职业素质和团队合作精神，并能与项目开发人员合作完成项目。', 'Creative', '上海市-徐汇区', '2016/0129/20160129115430445.jpg', '凯淳实业', '上海凯淳实业有限公司', '', '电子商务', '', '1000人以上', '私营企业', '           	          	<span class="label">电子商务</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">交通补助</span>          	          	<span class="label">年终双薪</span>          	          	<span class="label">弹性工作时间</span>          	          	<span class="label">员工旅游</span>          	          	<span class="label">节日福利</span>          	          '),
(185, '助理Web设计师', '站酷招聘', 1454039671, '1名', '上海铭塔飞信息技术有限公司', '面议', '上海 ', '经验不限', '全职', '助理设计师通过工作提升自身WEB设计实力。<br>同时需要协助设计师进行WEB设计工作并且完成工作任务。', '年龄要求：20-30岁<br>学历要求：大专以上<br><br>对Web网站设计有极深的兴趣、Web以外（纸媒体、包装，广告等）有经验者。<br>Photoshop使用经验者。<br>在设计公司有工作经验者优先。<br><br>无工作经验者也没有关系，注重个人综合素质和设计潜力，公司愿意通过实际的案例训练培养与其共同成长。<br><br>补充：具有实际相关工作经验者，请注明本人作品的URL地址。', '设计部', '上海市长宁区延安西路-地铁站', '2016/0129/20160129115431561.jpg', 'Metaphase', '上海铭塔飞信息技术有限公司', '', '互联网', '', '1-50人', '私营企业', '           	          '),
(186, '平面设计主管', '站酷招聘', 1454039671, '1名', '上海马克华菲电子商务有限公司', '12k-15k', '上海 ', '经验1-3年', '全职', '岗位职责：<br>1、负责马克华菲品牌所有线上平台(天猫、京东、一号店、优购、唯品会等)的整体形象设计，把握线上渠道整体风格和视觉呈现，全面提升整体视觉效果<br>2、管理设计团队，与运营部，策划部，视觉部密切配合，根据公司的营销活动方案完成天猫旗舰店及其他平台的大型活动、店铺活动的主题页面设计和广告图片的设计任务<br>3、监控天猫、京东、一号店、优购、唯品会等活动页面效果并优化用户体验<br>4、负责大型设计项目和外界供应商的对接工作<br>', '任职资格：<br>1、美术、设计或相关专业大专以上学历，有扎实的美术功底<br>2、3年以上平面设计、网页设计工作经验，有电商平台设计经验，服装或时尚行业工作经验优先<br>3、有敏锐的时尚触觉，较强的色彩搭配能力及审美观念<br>4、精通Photoshop、Illustrator&nbsp;、Dreamweaver等设计软件，丰富的平面设计经验<br>5、具备良好团队管理能力，并富有工作激情、创新欲望和责任感，并能推动团队的设计能力<br>', '电商事业部', '上海市徐汇区龙漕路-地铁站', '2016/0129/20160129115431347.png', '马克华菲', '上海马克华菲电子商务有限公司', 'http://www.markfairwhale.com', '其他', 'www.markfairwhale.com', '1000人以上', '私营企业', '           	          	<span class="label">时尚</span>          	          	<span class="label">服装</span>          	          	<span class="label">潮人</span>          	          	<span class="label">幸福</span>          	          '),
(187, '创意周边设计策划', '站酷招聘', 1454039671, '1名', '成都超有爱科技有限公司', '8k-12k', '成都 ', '经验不限', '全职', '百词斩周边产品策划<br><br>如果你是一枚种草小能手，总是能安利身边的朋友各种有趣，好玩，漂亮的产品<br>如果你是资深剁手族，国内外有什么设计师品牌，各种小众大众品牌都很熟悉<br>如果你觉得像line那样的周边产品萌萌哒<br>如果你热爱日本的周边文化<br>如果你总是觉得很多品牌的产品要么设计low，要么质量差，要么.......<br>如果你认为你总是有很多想法，想要把他们实践出来，想要设计出让朋友们都觉得为你而骄傲的产品<br><br><br>那么这个职位就简直就是为你量身定做了！<br><br>在这里，你会为百词斩策划周边产品，并与设计师合作将产品设计—&gt;生产—&gt;上架<br>在这里，可以满足你天马行空的想法，并且看到你的idea被很多百词斩的用户喜欢和欣赏<br>在这里，我们会提供让你的朋友们都觉得：“哇，不错哦。”的薪资与工作环境<br>', '工作内容：<br>1．收集广泛的国内外各种创意类产品的信息和动态，了解目标产品的功能和特性，评估与分析其市场潜力。<br>2．定期将收集的产品进行分类、筛选和询价，形成产品备选池。<br>3.&nbsp;为百词斩做周边产品策划，并与设计合作将产品商品化。<br>4．为产品寻找OEM代工厂并跟进生产和质检。<br>喜闻乐见的加分条件：开过淘宝小C店，或经营过任何线上平台网店，或线下实体店。', '运营部门', '成都市武侯区天府软件园e区', '2016/0129/20160129115431429.png', '百词斩', '成都超有爱科技有限公司', 'http://www.baicizhan.com', '互联网', 'www.baicizhan.com', '50-100人', '私营企业', '           	          	<span class="label">Mac</span>          	          	<span class="label">期权诱惑</span>          	          	<span class="label">税后薪资</span>          	          	<span class="label">可口饭菜</span>          	          	<span class="label">不加班</span>          	          	<span class="label">健身年卡</span>          	          '),
(188, 'unity3d游戏主美', '站酷招聘', 1454039671, '1名', '在线途游（北京）科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '岗位职责：<br>1、负责UI、场景、原画、特效的总体风格设计，并对团队成员的工作进行指导和约束；<br>2、分解和管理美术资源数量、质量和速度，管理和统筹外包资源完成情况； <br>3、与策划、技术团队沟通合作，从美术角度给整个项目提出建议。<br>', '任职要求：<br>1、大学专科及以上学历，美术或动画专业毕业；3年以上游戏美术设计经验，熟悉游戏美术设计管理流程 ；<br>2、熟悉各类型游戏，对游戏品质和美术表现方式有自己的见解和看法；<br>3、熟练掌握各种美术制作软件，能够独立担当设计任务；<br>4、具有团队合作精神，富于创造力，良好的理解力，流畅的沟通能力，能够承受工作压力；<br>5、有unity引擎制作经验者优先，曾经在网游公司担任主美职位者优先；<br>6、简历中需要附带能够体现该岗位能力的作品。', '美术', '北京市朝阳区', '2016/0129/20160129115431440.png', '途游棋牌', '在线途游（北京）科技有限公司', 'http://www.tuyoo.com/', '游戏', 'http://www.tuyoo.com/', '100-200人', '私营企业', '           	          	<span class="label">途游游戏</span>          	          '),
(189, '文案策划', '站酷招聘', 1454039672, '5名', '上海博广广告传媒有限公司', '5k-8k', '上海 ', '经验1-3年', '全职', '1、抓取社会化媒体、事件、话题等进行网络活动策划；&lt;br&gt;2、配合部门同事指定执行计划，完善细化文案创意，完成从概念到创意到执行的具体工作； &lt;br&gt;3、负责整体创意文案撰写工作，含微博及微信内容、论坛软文、新闻公关稿等；&lt;br&gt;4、配合部门同事完成内容资料及数据搜集、提炼、整合。', '喜思考，不封闭，手快，爱沟通，会取经，实习生也欢迎&lt;br&gt; 1、是不是圈内人，是不是科班出身，是男是女，都无关紧要。只要你本身热爱互联网，关注八卦时事，即能上知乎、网易和大神胡扯，也能静下心来做140个字的“微博控”。&lt;br&gt;2、对某一个领域，如体育、金融、IT等专精，或其他相关杂业“游戏、八卦、明星”等深入了解。&lt;br&gt;3、手快，活好，头脑转得动，资深网虫+创造思维，有情趣更佳。', '策划部', '上海市闸北区108创意广场金座716-717室', '2016/0129/20160129115432658.png', '博广传媒', '上海博广广告传媒有限公司', 'http://www.boguang001.com/', '互联网', 'http://www.boguang001.com/', '1-50人', '私营企业', '           	          	<span class="label">单身美女多</span>          	          	<span class="label">福利俱全</span>          	          	<span class="label">内有萌宠</span>          	          	<span class="label">满满小鲜肉</span>          	          	<span class="label">出国旅游</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">90后天堂</span>          	          	<span class="label">妖气十足</span>          	          '),
(190, '高级网页设计师', '站酷招聘', 1454039672, '2名', '北京凯罗天下科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '1.&nbsp;负责萝卜品牌（luobo.cn）WEB端/移动端官网设计重构及长期维护；<br>2.&nbsp;负责萝卜相关子站点及H5的设计。', '1.&nbsp;3年以上网页/移动站点设计经验；<br>2.&nbsp;优秀的平面美术功底及审美能力；<br>3.&nbsp;熟悉目前主流网页设计风格，对网页设计有独到理解；<br>4.&nbsp;应聘时请附个人作品。', '设计部', '建外SOHO东区9号楼', '2016/0129/20160129115432579.png', '飞鱼科技', '北京凯罗天下科技有限公司', '', '游戏', '', '200-500人', '私营企业', '           	          '),
(191, 'WEB前端工程师--H5', '站酷招聘', 1454039672, '2名', '辉塔信息技术咨询（上海）有限公司', '面议', '上海 ', '经验不限', '全职', '1、负责将网页效果图切成HTML代码；<br>2、网站前端页面制作、优化，以及JS互动效果实现；<br>3、能够不断的对前端代码进行优化，使网站符合SEO的要求；<br>4、调试网站页面在不同浏览器下的兼容性；<br>5、调试手机端页面在有不同手机终端下的兼容性；<br>6、负责与设计人员和开发人员的沟通。<br>', '1、精通DIV+CSS流动布局的HTML代码编写，熟练手写标准WEB页面符合W3C标准；熟练使用常规网站制作软件；<br>2、精通JavaScript开发,能够熟练的使用JavaScript进行面向对象编程；<br>3、熟悉调整各种跨浏览器兼容性技术；<br>4、熟悉手机端html5页面开发；<br>5、具备较强的快速学习能力，独立解决问题能力和抗压能力；<br>', '技术部', '上海市-浦东新区', '2016/0129/20160129115432837.jpg', 'faceui', '辉塔信息技术咨询（上海）有限公司', 'http://www.faceui.com', '互联网', 'www.faceui.com', '50-100人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">交通补助</span>          	          ');
INSERT INTO `zh_zhanku` (`id`, `title`, `comeform`, `time`, `recruit_num`, `company`, `salary`, `workin_place`, `experience`, `full_part_time`, `duty`, `request`, `department`, `work_address`, `company_img`, `company_simple_name`, `company_detail_name`, `company_home_page_url`, `industry_attr`, `company_home_page_name`, `enterprise_size`, `enterprise_nature`, `enterprise_tag`) VALUES
(192, '美工', '站酷招聘', 1454039672, '1名', '北京动乐网络科技有限公司', '面议', '北京 ', '经验3-5年', '全职', '1、负责公司网站设计装修、新品详情页设计及图片处理上传、设计制作、逐步形成品牌风格；<br>2、根据品牌活动完成活动促销页面设计；<br>3、负责网站相关活动的策划、专题页面的设计等；<br>4、领导临时安排的其它工作<br>', '1、熟练使用Photoshop、AI、Dreamweaver、IIIustrator、HTML语言等相关设计软件，对图片渲染和视觉效果有较好的把控和认识；<br>2、具有２年以上的网页设计工作经验；本科及以上学历<br>3、具有良好的网店设计能力，较强的创意、策划能力，良好的文字表达能力；<br>4、工作认真、有责任心、踏实肯干，富有团队精神<br>', '电商运营部', '北京市朝阳区酒仙桥10号恒通国际商务园B12C三层', '2016/0129/20160129115432931.png', '动乐网', '北京动乐网络科技有限公司', 'http://www.51dongle.com', '互联网', 'www.51dongle.com', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">带薪年假</span>          	          '),
(193, '前端开发工程师', '站酷招聘', 1454039672, '2名', '上海奕尚网络信息有限公司', '面议', '上海 ', '经验不限', '全职', '1、较强的责任心和耐心，良好的团队合作意识，性格踏实稳重，能承受高强度的工作压力；<br>2、有手机端开发经验者优先考虑；<br>3、熟悉W3C标准，精通WEB前端HTML5/XHTML/HTML/CSS/JavaScript等主流技术；<br>4、能熟练手工编写HTML5及DIV+CSS代码，并对各种常用浏览器做到良好兼容，确保网页可以跨平台跨浏览器运行（PC及移动端）；<br>', '<br>1、熟练运用常见AJAX框架，熟悉Javascript，&nbsp;掌握一些常用JS库，如JQuery；<br>2、能熟练使用Photoshop,Dreamweaver等软件。<br><br>欢迎加入我们脑洞大开欢乐和谐的设计师大家庭，we&nbsp;need&nbsp;u!&nbsp;', '设计部', '上海市-长宁区', '2016/0129/20160129115433978.jpg', '奕尚网络', '上海奕尚网络信息有限公司', '', '电子商务', '', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">定期体检</span>          	          	<span class="label">五险一金</span>          	          	<span class="label">商业保险</span>          	          	<span class="label">带薪年假</span>          	          	<span class="label">团队活动</span>          	          '),
(194, 'Web前端开发', '站酷招聘', 1454039673, '2名', '上海莫凡信息技术有限公司', '面议', '上海 ', '经验不限', '全职', '1、负责将设计师设计的PSD稿子生成HTML代码，并实现相应的交互效果;2、根据客户需求制作相应的HTML代码；', '1、精通DIV+CSS，熟悉Javascript。2、了解浏览器对前端代码的兼容性，能够撰写兼容多浏览器的前端代码；3、熟悉Web前端制作的流程和规范，1年或以上的工作经验；4、了解PHP程序开发者优先考虑；5、良好的沟通能力，有团队协作精神、踏实上进者优化考虑。', '', '上海市-黄浦区', '2016/0129/20160129115433845.jpg', 'MoreFun莫凡', '上海莫凡信息技术有限公司', 'http://www.morefun.me', '电子商务', 'www.morefun.me', '1-50人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">年13薪</span>          	          	<span class="label">年度旅游</span>          	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          	<span class="label">节日礼物</span>          	          '),
(195, '网页设计师偏运营类', '站酷招聘', 1454039673, '1名', '上海春迪网络科技有限公司', '12k-15k', '上海 ', '经验1-3年', '全职', '设计，拍摄产品推广图片。', '1、三年以上平面设计相关工作经验，有运营经验优先，有丰富的品牌、宣传品、推广活动、包装等方面的设计经验&nbsp;<br>2、扎实的美术功底及整体色彩，布局把握能力，视觉美感及创意构思能力；熟练使用photoshop，illustrator等绘图软件及dreamwear等平面设计软件&nbsp;<br>3、熟练使用日常办公软件&nbsp;<br>4、创意构思能力；表达沟通能力&nbsp;<br>5、注重细节，能接受创业企业，对未来拥有梦想并拥有高度责任感，能承受一定的加班和工作压力', '设计部', '上海市黄浦区淮海中华大厦', '2016/0129/20160129115433386.png', '发条科技', '上海春迪网络科技有限公司', '', '互联网', '', '1-50人', '私营企业', '           	          	<span class="label">微信</span>          	          	<span class="label">互联网</span>          	          '),
(196, '资深时尚网页设计', '站酷招聘', 1454039673, '3名', '北京创锐文化传媒有限公司', '12k-15k', '北京 ', '经验3-5年', '全职', '1.负责公司自营服装业务的创意设计工作；<br>2.负责网站活动类系列视觉创意设计工作；<br>3.负责对外广告形象创意设计；&nbsp;<br>4.指导并协助flash设计师完成互动类表现工作。&nbsp;&nbsp;<br>', '1.&nbsp;教育背景：本科及以上学历，美术/设计类专业优先；<br>2.&nbsp;工作经验：设计行业工作3年以上，有时尚、服装类网站工作经验；<br>3.&nbsp;基础素质要求：美术基本功扎实，审美能力优秀，有创意和平面设计基础，对网页设计有一定见解和思路，善于沟通和学习；责任心强，富有团队精神，工作踏实细心。<br>4.&nbsp;专业能力要求：熟练掌握PS/AI等主流设计软件，具有独立设计能力，可以根据要求设计网页、造型、界面；具备一定的手绘能力。', '创意部', '东四十条A口，中汇广场B座20层', '2016/0129/20160129115433430.png', '聚美优品', '北京创锐文化传媒有限公司', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '电子商务', 'http://bj.jumei.com/?referer=sogou_ppzq_bt&utm_content=title&utm_source=sogou_ppzq', '500-1000人', '私营企业', '           	          '),
(197, '网页设计师', '站酷招聘', 1454039673, '5名', '一加三餐（上海）电子商务有限公司', '5k-8k', '上海 ', '经验不限', '全职', '1、独立负责天猫店铺的装修设计、活动促销页面等等<br>2、负责公司商品的图片的处理<br>3、商品描述模板设计以及信息上架<br>4、独立电子商务网站图片的设计<br><br>', '1、有着优秀的独力设计能力，熟练运用photoshop，懂Dreamweaver等设计软件先考虑。<br>2、有着非常好的审美意识，具有良好的版式设计和整体布局感觉先。<br>3、有着非常好的创意和想法，并且可以把想法转化为图像。<br>4、讲求实效，有强烈的责任感，能用心深入细节，追求完美，能够承受工作压力。<br>5、一年以上相关工作经验。<br>', '创意部', '徐汇区天钥桥路1000号（近中山南二路）徐汇苑商务楼3层', '2016/0129/20160129115434142.png', '一加三餐', '一加三餐（上海）电子商务有限公司', 'http://www.ecmoho.com', '电子商务', 'www.ecmoho.com', '200-500人', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(198, 'UI设计师', '站酷招聘', 1454039674, '1名', '柒佰（北京）科技发展有限公司', '12k-15k', '北京 ', '经验1-3年', '全职', '1、负责参与产品的页面设计；<br>2、根据产品特点，把控整体设计风格、交互效果，页面制作及流程完善；<br>3、为日常的运营活动及功能维护提供视觉支持和持续优化。', '1、美术、设计或相关专业，能够熟练使用Photoshop、Illustrator、&nbsp;Flash、Dreamweaver等软件；<br>2、从事设计行业工作1年以上，有WEB电商页面项目和移动端的设计经验；<br>3、足够的自主思维和需求把握能力。具备一定的交互知识；对产品流程、用户操作流程及用户需求有深入理解；热爱用户界面设计，对于改善用户体验有深刻认识，能够从用户体验角度来设计界面；<br>4、具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br><br>投递简历请附带作品。', '数字产品部', '北京市东城区77文化创意产业园', '2016/0129/20160129115434329.png', '700Bike', '柒佰（北京）科技发展有限公司', 'http://www.700bike.com', '互联网', 'http://www.700bike.com', '50-100人', '私营企业', '           	          	<span class="label">自行车</span>          	          	<span class="label">电商</span>          	          	<span class="label">网站&APP</span>          	          	<span class="label">城市通勤</span>          	          	<span class="label">生活方式</span>          	          	<span class="label">健康潮流</span>          	          	<span class="label">简单快乐</span>          	          	<span class="label">环境Cool</span>          	          '),
(199, '广告设计', '站酷招聘', 1454039674, '1名', '在线途游（北京）科技有限公司', '面议', '北京 ', '经验不限', '全职', '1.&nbsp;主要负责公司效果广告投放的广告图文素材制作；<br>&nbsp;<br>2.&nbsp;配合投放人员的需求制作不同风格的素材，并根据投放人员的数据反馈更换或优化<br>素材；<br>&nbsp;<br>3.&nbsp;了解最新的设计发展趋势，收集行业竞品的信息，从美术角度配合投放人员共同提<br>高投放效果；<br>&nbsp;<br>4.&nbsp;协助完成市场品牌的其它平面设计需求。', '1.&nbsp;大专及以上学历，美术、艺术设计、工业设计、平面设计、广告设计等相关专业&nbsp;或<br>有1年以上相关经验；<br>&nbsp;<br>2.&nbsp;有扎实的美术功底和优秀的设计动手能力，审美观正常，色彩搭配感觉好，能够围<br>绕产品需求做出不同风格的素材；<br>&nbsp;<br>3.&nbsp;熟练使用Photoshop、Illustrator、Flash等相关的设计软件（至少其中一种）；<br>&nbsp;<br>4.&nbsp;学习能力强，乐于沟通。能够根据工作需求不断学习；<br>&nbsp;<br>5.&nbsp;做事严谨认真，对自己的工作成果负责；<br>&nbsp;<br>6.&nbsp;面试需带作品或发作品链接。', '品牌市场中心', '北京市-朝阳区', '2016/0129/20160129115434173.png', '途游棋牌', '在线途游（北京）科技有限公司', 'http://www.tuyoo.com/', '游戏', 'http://www.tuyoo.com/', '100-200人', '私营企业', '           	          	<span class="label">途游游戏</span>          	          '),
(200, '视觉推广设计师', '站酷招聘', 1454039674, '2名', '北京搜狐新媒体信息技术有限公司', '15k-20k', '北京 ', '经验3-5年', '全职', '1.负责搜狐大客户的视觉创意；配合搜狐营销体系出品视觉方案；&nbsp;<br>2.sohu&nbsp;app，手机搜狐，搜狐网广告的创新。（精通web设计，mobile&nbsp;h5设计，手绘设计，动画设计）；<br>3.能把策略型思考落地为创意作品，表现出来。&nbsp;<br><br>', '1.具备优秀的设计能力，勇于创新，创意丰富；<br>2.把握互动创意和设计的前沿的趋势。具备优秀的互联网思维；<br>3.拥有良好的商业手绘功底优先，有优秀的网站作品优先；<br>4.熟练使用设计软件，Photoshop,flash,Illustrator等；<br>5.熟悉iOS和Android交互体验和UI设计规范；<br>6.具备良好合作态度及团队精神，有强烈的责任感,求完美，能够承受工作压力；<br>7.3年以上互联网，广告，互动营销行业相关工作经验。', '广告营销中心', '北京市海淀区搜狐媒体大厦', '2016/0129/20160129115434594.jpg', '搜狐', '北京搜狐新媒体信息技术有限公司', '', '互联网', '', '1000人以上', '私营企业', '           	          '),
(201, '用户界面设计师', '站酷招聘', 1454039674, '2名', '站酷猎头', '15k-20k', '北京 ', '经验3-5年', '全职', '1.和产品设计师一起制订产品策略<br>2.让&nbsp;Web&nbsp;端更具视觉吸引力和更易使用<br>', '1.可以为复杂的问题找到简单优雅的解决方案<br>2.设计工具的使用不会成为遏制想象力的瓶颈<br>3.了解技术的限制并能将自己的设计思路准确传递给其他人<br>4.心思细腻，迷恋细节，像素完美<br><br>', '设计部', '', '2016/0129/20160129115435824.png', '站酷猎头', '站酷猎头', 'http://www.zcool.com.cn', '互联网', 'www.zcool.com.cn', '50-100人', '私营企业', '           	          	<span class="label">为企业推荐优秀的设计人才</span>          	          	<span class="label">为设计师提供优质的工作机会</span>          	          '),
(202, '高级UI设计师', '站酷招聘', 1454039675, '1名', '柒佰（北京）科技发展有限公司', '15k-20k', '北京 ', '经验3-5年', '全职', '1、负责参与产品的页面设计；<br>2、根据产品特点，把控整体设计风格、交互效果，页面制作及流程完善；<br>3、为日常的运营活动及功能维护提供视觉支持和持续优化。<br>', '1、美术、设计或相关专业，能够熟练使用Photoshop、Illustrator、&nbsp;Flash、Dreamweaver等软件；<br>2、从事设计行业工作3年以上，有WEB电商页面项目和移动端的设计经验；<br>3、足够的自主思维和需求把握能力。具备一定的交互知识；对产品流程、用户操作流程及用户需求有深入理解；热爱用户界面设计，对于改善用户体验有深刻认识，能够从用户体验角度来设计界面；<br>4、具备良好合作态度及团队精神，并富有工作激情、创新欲望和责任感，能承受高强度的工作压力。<br><br>投递简历请附带作品。', '数字产品部', '北京市东城区77文化创意产业园', '2016/0129/20160129115435464.png', '700Bike', '柒佰（北京）科技发展有限公司', 'http://www.700bike.com', '互联网', 'http://www.700bike.com', '50-100人', '私营企业', '           	          	<span class="label">自行车</span>          	          	<span class="label">电商</span>          	          	<span class="label">网站&APP</span>          	          	<span class="label">城市通勤</span>          	          	<span class="label">生活方式</span>          	          	<span class="label">健康潮流</span>          	          	<span class="label">简单快乐</span>          	          	<span class="label">环境Cool</span>          	          '),
(203, '高级视觉设计师', '站酷招聘', 1454039675, '4名', '北京智能管家科技有限公司', '20k-25k', '北京 ', '经验3-5年', '全职', '工作职责：<br>1、设计趋势分析，把控平台及平台产品的整体视觉风格和系统VI；<br>2、负责为运营活动以及日常维护提供视觉设计支持；<br>3、协同市场营销一同完成对外的品牌及产品的视觉传达设计；<br>4、参与开创性产品的定义和前期开发，完成动态演示DEMO；<br>5、管理视觉设计师团队。', '职位要求：<br>1、本科或以上学历，5年及以上的视觉传达设计从业经验；<br>2、有4A广告公司从业背景优先考虑；<br>3、热爱创新性设计，执行力强，热心好学；<br>4、拥有广阔的设计视角和敏锐度更佳，如平面设计，交互设计，产品设计等；<br>5、具有分享精神，良好的沟通和团队合作能力。', '设计部', '北京市朝阳区北苑路甲13号北辰泰岳11层', '2016/0129/20160129115435843.png', 'roobo', '北京智能管家科技有限公司', 'http://www.roobo.com.cn', '互联网', 'www.roobo.com.cn', '200-500人', '私营企业', '           	          	<span class="label">五险一金</span>          	          	<span class="label">帅哥美女</span>          	          	<span class="label">优秀团队</span>          	          	<span class="label">智能硬件</span>          	          '),
(204, '广告设计师', '站酷招聘', 1454039675, '2名', '在线途游（北京）科技有限公司', '8k-12k', '北京 ', '经验不限', '全职', '1.&nbsp;主要负责公司效果广告投放的广告图文素材制作；<br>2.&nbsp;配合投放人员的需求制作不同风格的素材，并根据投放人员的数据反馈更换或优化素材；<br>3.&nbsp;了解最新的设计发展趋势，收集行业竞品的信息，从美术角度配合投放人员共同提高投放效果；<br>4.&nbsp;协助完成市场品牌的其它平面设计需求。', '1.&nbsp;有设计经验或相关专业本科以上学历；（能力优秀者可放宽到大专学历）<br>2.&nbsp;审美观正常，有设计动手能力，色彩搭配感觉好；<br>3.&nbsp;熟练使用Photoshop、Illustrator、Flash等相关的设计软件（至少其中两种）；<br>4.&nbsp;面试需带作品或发作品链接。', '美术设计部', '北苑路', '2016/0129/20160129115435835.png', '途游棋牌', '在线途游（北京）科技有限公司', 'http://www.tuyoo.com/', '游戏', 'http://www.tuyoo.com/', '100-200人', '私营企业', '           	          	<span class="label">途游游戏</span>          	          '),
(205, 'UI设计师', '站酷招聘', 1454039676, '1名', '北京奇虎科技有限公司', '12k-15k', '北京 ', '经验1-3年', '全职', '1.为好搜（原360搜索）移动搜索及垂搜产品线服务，通过分析产品需求，提供优秀设计及创意；<br>2.负责产品界面、手机客户端界面的视觉设计及在线推广设计；<br>3.参与产品前期界面视觉用户研究、设计流行趋势分析，对网站产品进行持续视觉优化；<br>4.从全局角度把握界面美观度、色彩风格、图标、插图、产品气质品牌形象。<br>5.设定网站、手机应用及产品界面的整体视觉风格和VI设计，参与设计体验、流程的制定和规范；<br>6.分享设计经验、推动提高团队的设计能力。', '1.熟练photoshop、Illustrator等相关设计软件，对网站前端技术有基本的了解。<br>2.具有专业的视觉设计能力,能阐述具有说服力的设计理论.有比较全面的设计知识。<br>3.熟悉web端、移动客户端视觉设计，擅长把握各种设计风格。<br>4.对用户体验有深刻的认识，能够针对用户体验踊跃提出自己的建议并能不断推动改进的优先。<br>5.具备良好合作态度及团队精神，并富有工作激情、创造力和责任感。', '搜索事业部', '北京市朝阳区奇虎360', '2016/0129/20160129115436745.jpg', '奇虎360', '北京奇虎科技有限公司', 'http://www.360.cn/', '互联网', 'http://www.360.cn/', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(206, '资深/中级视觉设计师', '站酷招聘', 1454039676, '4名', '北京深度沟通广告有限公司', '12k-15k', '北京 ', '经验3-5年', '全职', '1、负责公司重点项目和日常项目的支持；<br>2、项目提案设计、主要风格设计、项目全程设计；<br>3、部分项目全程沟通、协调，对策划、设计、制作、程序的全程负责。', '1、5年以上本职位工作经验；<br>2、优异的设计创意能力及独立完成个案的能力；<br>3、优秀的人机交互思想，具有整体框架性设计思维；<br>4、有较强的创新能力，对色彩的把握独到，能把设计风格和栏目特色进行有效的结合；<br>5、善于把握客户需求，对页面设计从多层面考虑；<br>6、有一定领导能力，有对作品全程负责的态度和毅力；<br>7、良好的沟通、领悟能力，具有团队合作精神和敬业精神，能与团队其他成员进行有效沟通；<br>8、像素级精确设计。<br><br>具备以下能力者优先考虑：<br>1、具备移动平台（iPhone，Android等）设计经验；<br>2、有带队经验；<br>3、有UED团队经验。<br><br>[应聘方式]：发送简历至 hr@deeping.cn<br>邮件标题请如以下格式：【职位名称】 + 姓名 + 【站酷网】，谢谢！<br>PS：请务必在简历中附上5个主要作品，作品可以网站链接形式发送，期待您的加入！', '用户体验部', '北京市-朝阳区', '2016/0129/20160129115436436.png', 'DEEP深度沟通', '北京深度沟通广告有限公司', 'http://www.deeping.cn', '互联网', 'www.deeping.cn', '50-100人', '私营企业', '           	          	<span class="label">用户体验</span>          	          	<span class="label">UCD</span>          	          	<span class="label">UE</span>          	          	<span class="label">UX</span>          	          '),
(207, '网页设计经理', '站酷招聘', 1454039676, '3名', '站酷猎头', '20k-25k', '北京 ', '经验3-5年', '全职', '1.负责网站产品的创意设计工作；<br>2.负责网站活动类系列视觉创意设计工作；<br>3.负责对外广告形象创意设计；&nbsp;<br>4.指导flash设计师完成互动类表现工作。&nbsp;<br>', '1.&nbsp;教育背景：本科及以上学历，美术/设计类专业优先；<br>2.&nbsp;工作经验：设计行业工作3年以上，最好有时尚、服装类网站工作经验；<br>3.&nbsp;基础素质要求：美术基本功扎实，审美能力优秀，有创意和平面设计基础，对网页设计有一定见解和思路，善于沟通和学习；责任心强，富有团队精神，工作踏实细心。<br>4.&nbsp;专业能力要求：熟练掌握PS/AI等主流设计软件，具有独立设计能力，可以根据要求设计网页、造型、界面；具备一定的手绘能力。<br>', '创意部', '', '2016/0129/20160129115436795.png', '站酷猎头', '站酷猎头', 'http://www.zcool.com.cn', '互联网', 'www.zcool.com.cn', '50-100人', '私营企业', '           	          	<span class="label">为企业推荐优秀的设计人才</span>          	          	<span class="label">为设计师提供优质的工作机会</span>          	          '),
(208, '设计总监', '站酷招聘', 1454039676, '1名', '北京优艾众合创意文化传播有限公司', '25k-30k', '北京 ', '经验3-5年', '全职', 'UIDWOKRS是一个优质年轻创意设计团队，只要你觉得自己行，没有太多限制。<br>但需要有团队管理与项目管理能力，沟通没问题。', '1.把控团队的创意与创意执行。<br>2.管理设计团队。<br>3.项目的协调与沟通。<br>', '创意设计', '北京市-朝阳区', '2016/0129/20160129115436110.jpg', 'UID WORKS', '北京优艾众合创意文化传播有限公司', 'http://www.uidworks.com', '广告/公关/会展', 'www.uidworks.com', '1-50人', '私营企业', '           	          	<span class="label">uidworks</span>          	          '),
(209, '网页设计师', '站酷招聘', 1454039677, '3名', '北京奇虎科技有限公司', '面议', '北京 ', '经验不限', '全职', '1.负责公司游戏产品的相关视觉设计工作；<br>2.参与项目创意前期视觉用户研究、设计流行趋势分析，主导设定整体视觉风格和VI设计；<br>3.负责定期分享优秀案例或设计心得。<br>', '1.能独立完成平面、网站等视觉设计；<br>2.&nbsp;开过像素眼，拥有无影手，有一定设计理论知识，具有创新能力，色彩感强，对各种设计趋势有灵敏触觉和领悟能力；<br>3.有较好的沟通能力，具备团队合作精神，并富有创造力和责任感，能承受高强度的工作压力；<br>4.学历不限，无论你是潜力股还是设计大牛，我们都非常欢迎。<br>', '游戏部门', '北京市朝阳区奇虎360', '2016/0129/20160129115437777.jpg', '奇虎360', '北京奇虎科技有限公司', 'http://www.360.cn/', '互联网', 'http://www.360.cn/', '1000人以上', '私营企业', '           	          	<span class="label">岗位晋升</span>          	          	<span class="label">团队聚餐</span>          	          	<span class="label">午餐补助</span>          	          	<span class="label">节日礼物</span>          	          	<span class="label">绩效奖金</span>          	          	<span class="label">技能培训</span>          	          '),
(210, '网页设计师', '站酷招聘', 1454039677, '2名', '深圳市富途网络科技有限公司', '面议', '深圳 ', '经验不限', '全职', '1、  负责富途网站、专题网页、活动页面的视觉设计；2、  根据交互稿或者产品需求文档完成和改进产品视觉设计；3、  与相关部门配合，独立完成公司产品的设计及实现。4、  参与界面规范的制定与实施；', '有志于UI设计，懂得互联网web视觉创作和表现，熟练PS、AI 1、  网页设计相关工作经验1年以上，具备网页设计与活动专题设计的相关经验；2、  独立创新的风格设定能力、优秀的视觉表达能力；3、  具备自己独有的设计风格，并成功运用在产品设计中；4、  有良好的图形表达能力和沟通能力，有手绘能力者优先！5、  熟练掌握Photoshop、Coreldraw、Illustrator、Flash等设计软件，其中flash强者优先；6、  了解Dreamweaver 等网页制作软件,对HTML、CSS等制作技术有一定了解；', '', '广东省-深圳市-南山区', '2016/0129/20160129115437779.jpg', '富途网络', '深圳市富途网络科技有限公司', '', '互联网', '', '50-100人', '私营企业', '           	          ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
