<?php
/*
Template Name:小清新
Description:小清新
Version:1.0
Author:goodstudy
Author Url:http://blog.wdyun.cn
Sidebar Amount:0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!--[if IE 7]>
	<script language="javascript" type="text/javascript">
           window.location.href="http://<?php echo TEMPLATE_URL;?>sorry.html"; 
    </script>
<![endif]-->
<!--[if IE 6]>
	<script language="javascript" type="text/javascript">
           window.location.href="http://<?php echo TEMPLATE_URL;?>sorry.html"; 
    </script>
<![endif]-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="goodstudy" />

<link href="<?php echo TEMPLATE_URL; ?>blog.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('#searchA').click(function(){
			$('#searchA').css({"visibility": "hidden"});
			$('#searchForm').css({"visibility": "visible"});
			$("#searchForm").animate({"opacity":"1","width":"100px"},200)
			$("#searchTxt").animate({"width":"100px"},200).focus().select();
		})
		$('#searchTxt').blur(function(){
			$('#searchForm').css({"visibility": "hidden","opacity":"1","width":"0"});
			$('#searchA').css({"visibility": "visible"});
			$("#searchTxt").css({"width":"0"})
		})
	})
</script>
<?php doAction('index_head'); ?>
</head>
<body>
<div class="header">
	<a class="header_wrap" href="<?php echo BLOG_URL;?>">
		<div class="header_img"></div>
	</a>
	<h1><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
    <h3><?php echo $bloginfo; ?></h3>
	<a href="<?php echo BLOG_URL;?>">
		<div id="nav"><?php blog_navi();?></div>
	</a>
	<div style="clear:both;"></div>
</div>
<div class="m_nav"></div>
