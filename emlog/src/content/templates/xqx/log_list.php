<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content">

<?php doAction('index_loglist_top'); ?>

<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<div class="content_one">
	<h2 class="content_one_title"><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
	<div class="content_one_content">
		<?php echo $value['log_description']; ?>
	</div>
	<p class="content_one_count"><?php echo gmdate('Y-n-j', $value['date']); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php blog_author($value['author']); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php blog_tag($value['logid']); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php blog_sort($value['logid']); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo $value['log_url']; ?>#comments">评论(<?php echo $value['comnum']; ?>)</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo $value['log_url']; ?>">浏览(<?php echo $value['views']; ?>)</a>&nbsp;&nbsp;/&nbsp;&nbsp;<?php editflg($value['logid'],$value['author']); ?></p>
	<div style="clear:both;"></div>
</div>
<div class="m_nav"></div>
<?php 
endforeach;
else:
?>
<div class="content_one">
	<h2 class="content_one_title">未找到</h2>
	<p class="content_one_title">抱歉，没有符合您查询条件的结果。</p>
</div>
<div class="m_nav"></div>
<?php endif;?>

<div id="pagenavi">
	<?php echo $page_url;?>
</div>
</div>
<?php
 include View::getView('footer');
?>