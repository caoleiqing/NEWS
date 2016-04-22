<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title></title>
	<script src="<?php echo JS_PATH;?>appjs/zepto.js"></script>
	<script src="<?php echo JS_PATH;?>appjs/mui.min.js"></script>
	<link href="<?php echo CSS_PATH;?>appcss/mui.min.css" rel="stylesheet" />
	<script type="text/javascript" charset="UTF-8">
		mui.plusReady(function() {
			mui(".sidebar").on("tap", "a", function() {
				var title = $(this).html();
				var currurl = this.getAttribute("url");
				var newWin = plus.webview.create("currurl", "", {}, {
					title: title,
					url: currurl
				})
				newWin.setJsFile("_www/js/list_load.js")
			})
			mui(".top").on("tap", "a", function() {
				/*var title = $(this).html();
				 var currurl = this.getAttribute("url");*/
				var newWin = plus.webview.create("_www/index.html", "", {}, {
				})
				newWin.show();
			})
		})
	</script>
	<style>
		.sidebar,.top{
			font-size: 18px;
			-webkit-user-select: none;
			background: #eee;
			/*box-shadow: 3px 0 1px red inset;*/
		}

		.sidebar a {
			display: block;
			border-top: 1px solid #ddd;
			padding: 5% 10%;
			box-sizing: border-box;
			width: 100%;
			height: 10%;
			color: #333;
		}
		.top a {
			display: block;
			border-top: 1px solid #ddd;
			padding: 5% 10%;
			box-sizing: border-box;
			width: 100%;
			height: 10%;
			color: #333;
		}

		.sidebar a:active {
			background: #000;
			color: #eee;
		}

		.top a:nth-child(1) {
			border: 0;
			overflow: hidden;
			padding: 6%;
		}

		.top span {
			float: left;
			line-height: 80px;
			margin-right: 10px;
		}

		.top span:nth-child(1) {
			width: 80px;
			height: 80px;
			border-radius: 50%;
			text-align: center;
			background: darkred;
			color: #fff;
		}
	</style>
</head>

<body>
<div class="top">
	<a><span>新闻中心</span><span>所有栏目</span></a>
	<a href="javascript:;" url="_www/index.html">主页</a>
</div>
<div class="sidebar">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=70f0453b28d3b62324557276e5c8c8f2&action=category&catid=0&num=5&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'5',));}?>
	<?php $n=1;if(is_array($data)) foreach($data AS $k) { ?>
	<a href="javascript:;" url="<?php echo $k['url'];?>"><?php echo $k['catname'];?></a>
	<?php $n++;}unset($n); ?>
	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
</body>

</html>