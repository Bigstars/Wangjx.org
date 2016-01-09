<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="zan-bodyer" style="padding-top: 30px;">
	<div class="container">
		<section class="row">
		<div>
			<article class="article container well">
			<!-- 大型设备文章属性 -->
			<div class="hidden-xs">
				<div class="title-article">
					<h1><a href="<?php echo $value['log_url']; ?>"><?php echo $log_title; ?>
					</a></h1>
				</div>
				<div class="tag-article container">
					<span class="label label-zan"><i class="fa fa-tags"></i><?php echo gmdate('n', $date); ?>-<?php echo gmdate('j', $date); ?>
					</span>
					<span class="label label-zan"><i class="fa fa-tags"></i><?php blog_tag($value['logid']); ?>
					</span>
					<span class="label label-zan"><i class="fa fa-user"></i><?php blog_author($author); ?>
					</span>
					<span class="label label-zan"><i class="fa fa-eye"></i><?php echo $views; ?>
					</span>
				</div>
			</div>
			<!-- 大型设备文章属性 -->
			<!-- 小型设备文章属性 -->
			<div class="visible-xs">
				<div class="title-article">
					<h4><a href="<?php echo $value['log_url']; ?>"><?php echo $log_title; ?>
					</a></h4>
				</div>
				<p>
					<i class="fa fa-calendar"></i> <?php echo gmdate('n', $date); ?>-<?php echo gmdate('j', $date); ?>
					<i class="fa fa-eye"></i> <?php echo $views; ?>
				</p>
			</div>
			<!-- 小型设备文章属性 -->
			<div class="centent-article">
			
				<figure class="thumbnail hidden-xs"><?php echo $thumb_img;?>
				</figure>
				<p>
<?php echo $log_content; ?>
				</p>
				<!-- 分页 -->
				<?php neighbor_log($neighborLog); ?>
				<!-- 分页 -->
			</div>
			</article>
			<!-- 相关文章 -->
			
			<div class="article container well">
				<?php blog_comments($comments,$comnum); ?>
				<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
		</div>
		</section>
	</div>
</div>
</body>
</html>
<?php
 include View::getView('footer');
?>