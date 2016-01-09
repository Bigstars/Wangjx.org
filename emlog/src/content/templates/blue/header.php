<?php
/*
Template Name:Blue1
Description:大气的简洁蓝色主题<p style="color:red">请做一名懂得尊重版权的博主</p>主题出问题不提供修复等服务<p>作者博客：<a href="http://blog.200011.net">瓜情寡意</a></p>
Version:1.0
Author:小智哥哥
Author Url:http://blog.200011.net
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Cache-Control" content="no-transform " /> 
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
if(top.location!==self.location){top.location.href=self.location.href; }
</script><!--[if lt IE 9]><script src="<?php echo TEMPLATE_URL; ?>js/html5.js"></script><![endif]-->
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<link rel='stylesheet' id='blue-css'  href='<?php echo TEMPLATE_URL; ?>style.min.css?ver=4.1' type='text/css' media='all' />
<?php doAction('index_head'); ?>
</head>
<body class="home blog group-blog">
<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-content"><div class="container"><div class="logo"><div class="header-logo"><a href="<?php echo BLOG_URL; ?>" rel="home"><img src="<?php echo TEMPLATE_URL; ?>images/screenshot_64.png" width="64" height="64" alt="<?php echo $blogname; ?>" /></a></div><div class="header-text"><div class="name"><a href="<?php echo BLOG_URL; ?>" rel="home" id="name"><?php echo $blogname; ?></a></div><div class="description" id="desc"><?php echo $bloginfo; ?></div></div></div></div></div>
	<div class="navbar navbar-static-top" role="banner">
	<div class="navbar-bg">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".header-navbar-collapse"><span class="sr-only"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
							</div>
			<nav id="navbar" class="header-navbar-collapse" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php blog_navi();?>
			</nav><!-- #navbar -->
		</div>
	</div>
	<header class="breadcrumb-bg">
	<div class="container">
	<form name="keyform" method="get" action="http://localhost/index.php" role="search" class="bdcs-search-form fr" id="bdcs-search-form"> 
		<input name="keyword" class="search" type="text" class="bdcs-search-form-input" id="bdcs-search-form-input"  placeholder="搜索一下吧" autocomplete="off">
		<input type="submit" class="bdcs-search-form-submit " id="bdcs-search-form-submit" value="搜索">
	</form><?php index_sort(); ?>
	</div>
	</header><!-- .page-header -->
	</div>
</header>
<div id="main" class="container">
	<div class="row">
	<div class="primary">