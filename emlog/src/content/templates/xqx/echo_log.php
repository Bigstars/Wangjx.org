<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content">
<div class="content_one">
	<h2 class="content_one_title"><?php topflg($top); ?><?php echo $log_title; ?></h2>

	<div class="content_one_content">
		<?php echo $log_content; ?>
	</div>
	
	<p class="content_one_count"><?php echo gmdate('Y-n-j', $date); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php blog_author($author); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php blog_tag($logid); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php blog_sort($logid); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php editflg($value['logid'],$author); ?></p>
	
	<?php //doAction('log_related', $logData); ?>
	<?php //<div class="nextlog">neighbor_log($neighborLog); </div>?>
	<div class="content_comment">
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	</div>
	<div style="clear:both;"></div>
	<div class="m_nav"></div>
</div>
</div>

<?php
 include View::getView('footer');
?>