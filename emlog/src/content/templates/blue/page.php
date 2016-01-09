<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content" class="content-area single" data-post-id="3354" role="article" itemscope itemtype="http://schema.org/Article">
<article class="post type-post status-publish format-standard hentry category-feature inner-box">
				<div class="panel-body">
					<div class="entry-header page-header">
						<h1 class="entry-title h3" itemprop="name"><?php echo $log_title; ?></h1>
					</div>
					<div class="entry-content"  itemprop="articleBody" data-no-instant>
						<p><?php echo $log_content; ?></p>
					</div>
				</div>
</article>
<div class="comments" id="comments" data-no-instant><div class="list-group"  id="respond">
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div class="list-group commentlist">
		<h3 class="list-group-item respond-title"><?php echo $comnum;?>则回应给&#8220;<?php echo $log_title; ?>&#8221;</h3>
		<?php blog_comments($comments); ?>
	</div>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>