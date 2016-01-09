<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div id="content" class="content-area archive" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
<div class="panel panel-default panel-archive" role="main"><div class="panel-body">
<?php doAction('index_loglist_top'); ?>
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
	<article class="post type-post status-publish format-standard hentry category-resource tag-jquery tag-59 inner-box" role="article" itemscope itemtype="http://schema.org/Article">
		<div class="entry-header">
			<h2 class="entry-title h2">
				<a href="<?php echo $value['log_url']; ?>" rel="bookmark" itemprop="url">
				<span itemprop="name"><?php echo $value['log_title']; ?></span>
				</a>
			</h2>
			<div class="entry-meta">
				<?php blog_author($value['author']); ?>
				<i class="space">&bull;</i>
				<time class="entry-date" itemprop="datePublished"><?php echo gmdate('Y-n-j', $value['date']); ?></time>
				<i class="space">&bull;</i>
				<?php blog_sort($value['logid']); ?>
				<i class="space">&bull;</i>
				<?php echo $value['views']; ?>View
				<a href="<?php echo $value['log_url']; ?>#comments" itemprop="discussionUrl" itemscope itemtype="http://schema.org/Comment" class="comments-number">
				<span itemprop="interactionCount"><?php echo $value['comnum']; ?></span>
				</a>
			</div>
		</div>
		<div class="entry-content" itemprop="description" data-no-instant>
			<?php echo $value['log_description']; ?>
		</div>
	</article>
<?php 
endforeach;
else:
?>
	<article class="post type-post status-publish format-standard hentry category-resource tag-jquery tag-59 inner-box" role="article" itemscope itemtype="http://schema.org/Article">
		<div class="entry-header">
			<h2 class="entry-title h2">
				<span itemprop="name">未找到</span>
			</h2>
		</div>
		<div class="entry-content" itemprop="description" data-no-instant>
			抱歉，没有符合您查询条件的结果。
		</div>
	</article>
<?php endif;?>

<ul class="pagination" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php $page_loglist = my_page($lognum, $index_lognum, $page, $pageurl); echo $page_loglist; ?>
</ul>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>