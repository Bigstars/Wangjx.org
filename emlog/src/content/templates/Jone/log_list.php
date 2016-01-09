<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<section id="zan-bodyer">
<div class="container">
	<section class="row">
	<section id="mainstay">
	<div id="ie-warning" class="alert alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<i class="fa fa-warning"></i> 请注意，本博客主题并不支持低于IE8的浏览器，为了获得最佳效果，请下载最新的浏览器，推荐下载 <a href="http://www.google.cn/intl/zh-CN/chrome/" target="_blank"><i class="fa fa-compass"></i> Chrome</a> <a href="http://down.360safe.com/cse/360cse_7.5.3.186.exe" title="版本：7.5.3.186
大小：37.46M" target="_blank"><i class="fa fa-compass"></i>360极速浏览器</a>
	</div>
	<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
	<div class="article well clearfix">


		<div class="data-article hidden-xs">
			<span class="month"><?php echo gmdate('n', $value['date']);?>月
			</span>
			<span class="day"><?php echo gmdate('j', $value['date']); ?>
			</span>
		</div>
		<!-- PC端设备文章属性 -->
		<section class="visible-md visible-lg">
		<div class="title-article">
			<h1><a href="<?php echo $value['log_url']; ?>">
			<?php echo $value['log_title']; ?>
			</a></h1>
		</div>
		<div class="tag-article container">
			<span class="label label-zan"><i class="fa fa-tags"></i><?php blog_tag($value['logid']); ?>
			</span>
			<span class="label label-zan"><i class="fa fa-user"></i><?php blog_author($value['author']); ?>
			</span>
			<span class="label label-zan"><i class="fa fa-eye"></i><?php echo $value['views']; ?>
			</span>
		</div>
		<div class="content-article">
			
			<figure class="thumbnail"><a href="<?php echo $value['log_url']; ?>"><?php echo $thumb_img;?>
			</a></figure>
			<div class="alert alert-zan">

<?php echo $value['log_description']; ?>
			</div>
		</div>
		<a class="btn btn-danger pull-right read-more" href="<?php echo $value['log_url']; ?>"  title="详细阅读 <?php echo $value['log_title']; ?>
		">阅读全文 <span class="badge"><?php echo $value['views']; ?>
		</span></a>
		</section>
		<!-- PC端设备文章属性 -->
		<!-- 移动端设备文章属性 -->
		<section class="visible-xs visible-sm">
		<div class="title-article">
			<h4><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?>
			</a></h4>
		</div>
		<p>
			<i class="fa fa-calendar"></i><?php echo gmdate('n', $value['date']);?>
			-<?php echo gmdate('j', $value['date']); ?>
			<i class="fa fa-eye"></i><?php if(function_exists('the_views')) { the_views(); } ?>
		</p>
		<div class="content-article">

			<figure class="thumbnail"><a href="<?php echo $value['log_url']; ?>"><?php echo $thumb_img;?>
			</a></figure>
			<div class="alert alert-zan">
<?php echo $value['log_description']; ?>
			</div>
		</div>
		<a class="btn btn-danger pull-right read-more btn-block" href="<?php echo $value['log_url']; ?>"  title="详细阅读 <?php echo $value['log_title']; ?>
		">阅读全文 <span class="badge"><?php echo $value['comnum']; ?>
		</span></a>
		</section>
		<!-- 移动端设备文章属性 -->
	</div>
	<?php 
endforeach;
else:
?>
	<p>
		非常抱歉，没有相关文章.
	</p>
	<?php endif; ?>
	<div class="page_navi">
		<?php echo $page_url;?>
	</div>
</div>
</section>
<?php include View::getView('footer');?>
</body>
</html>