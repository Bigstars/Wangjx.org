<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content" class="content-area single" data-post-id="3354" role="article" itemscope itemtype="http://schema.org/Article">
<article class="post type-post status-publish format-standard hentry category-feature inner-box">
				<div class="panel-body">
					<div class="entry-header page-header">
						<h1 class="entry-title h3" itemprop="name"><?php echo $log_title; ?></h1>
						<div class="entry-meta">
							<div class="entry-set-font">
								<span id="set-font-small" class="disabled">A<sup>-</sup></span>
								<span id="set-font-big">A<sup>+</sup></span>
							</div>
							<?php blog_author($author); ?>
							<i class="space">&bull;</i>
							<time class="entry-date" itemprop="datePublished"><?php echo gmdate('Y-n-j', $date); ?></time>
							<i class="space">&bull;</i>
							<?php blog_sort($logid); ?>
							<i class="space">&bull;</i>
							<span data-num-views="true"><?php echo $views;?></span>View
							<a href="<?php echo Url::log($logid);?>#comments" itemprop="discussionUrl" itemscope itemtype="http://schema.org/Comment" class="comments-number">
							<span itemprop="interactionCount"><?php echo $comnum;?></span>
							</a>
						</div>
					</div>
					<div class="entry-content"  itemprop="articleBody" data-no-instant>
						<p><?php echo $log_content; ?></p>
					</div>
					<div class="entry-details" itemprop="copyrightHolder" itemtype="http://schema.org/Organization" itemscope>
						原文链接：
						<a href="<?php echo Url::log($logid);?>" rel="bookmark"><?php echo $log_title; ?></a>
						版权所有，转载时请注明出处，违者必究。
						<br/>
						注明出处格式：<?php echo $blogname; ?> (
						<a href="<?php echo Url::log($logid);?>" title="<?php echo $log_title; ?>"><?php echo Url::log($logid);?></a>
						)
						<?php doAction('log_related', $logData); ?>
					</div>
				</div>
</article>
<div class="comments" id="comments" data-no-instant>
<div class="list-group"  id="respond">
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div class="list-group commentlist">
		<h3 class="list-group-item respond-title"><?php echo $comnum;?>则回应给&#8220;<?php echo $log_title; ?>&#8221;</h3>
		<?php blog_comments($comments); ?>
	</div>
</div>
				<nav class="navigation post-navigation" role="navigation">
					<div class="screen-reader-text">Post navigation</div>
					<div class="nav-links">
						<?php neighbor_log($neighborLog); ?>
					</div>
				</nav>
<?php
 include View::getView('side');
 include View::getView('footer');
?>