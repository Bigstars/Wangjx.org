<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<link rel="icon" href="/favicon.png">
<!-- 设置标题 -->
<title>404-木有找到</title>
<!-- 设置描述性标签和关键词标签 -->
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<link rel="stylesheet" id="zanblog-style-css" href="<?php echo TEMPLATE_URL; ?>style.css?ver=2.0.7" type="text/css" media="all">
<link rel="stylesheet" id="bootstrap-style-css" href="<?php echo TEMPLATE_URL; ?>ui/css/bootstrap.css?ver=3.0.0" type="text/css" media="all">
<link rel="stylesheet" id="fontawesome-style-css" href="<?php echo TEMPLATE_URL; ?>ui/font-awesome/css/font-awesome.min.css?ver=4.0.1" type="text/css" media="all">
<link rel="stylesheet" id="icheck-style-css" href="<?php echo TEMPLATE_URL; ?>ui/css/flat/red.css?ver=3.9.2" type="text/css" media="all">
<link rel="stylesheet" id="custom-style-css" href="<?php echo TEMPLATE_URL; ?>ui/css/custom.css?ver=2.0.7" type="text/css" media="all">
<style type="text/css" adt="123"></style>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>ui/js/bootstrap.js?ver=3.0.0"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>ui/js/jquery.icheck.js?ver=3.9.2"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>ui/js/zanblog.js?ver=2.0.7"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>ui/js/custom.js?ver=2.0.7"></script>
<meta name="description" content="<?php echo $site_description; ?>
" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="emlog"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<?php doAction('index_head'); ?>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements Responsive IE8-->
<!--[if lt IE 9]>
<script src="<?php echo TEMPLATE_URL; ?>ui/js/modernizr.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>ui/js/respond.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>ui/js/html5shiv.js"></script>
<![endif]-->
</head>
<body>
<div style="background-image:url('<?php echo TEMPLATE_URL; ?>
	ui/images/ddtp.jpg');">
	<div style="height:60px;">
	</div>
	<div align="center">
		<a href="<?php echo BLOG_URL; ?>"><img src="<?php echo TEMPLATE_URL; ?>ui/images/g.jpg" class="txxz"></a>
		<font color="#FFFFFF">
		<h4><?php echo $bloginfo; ?>
		</h4>
		</font>
	</div>
	<div style="height:60px;">
	</div>
</div>

<div id="content" class="site-content" role="main">

	<div class="alert alert-danger text-center">

		<h1 class="page-title"><i class="fa fa-frown-o"></i> 无法找到该页面（404）</h1>

	</div>

	<div class="page-content well text-center">

		<h2>很遗憾，你所要寻找的页面已经丢失或者已经被删除。</h2>

		<h3>你可以回到 <a href="<?php echo BLOG_URL; ?>"><i class="fa fa-mail-forward"></i>主页</a><i class="fa fa-smile-o"></i></h3>

	</div>

</div>

	<?php include View::getView('footer');?>