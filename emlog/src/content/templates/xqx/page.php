<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content">
<div class="content_one">
	<h2 class="content_one_title"><?php echo $log_title; ?></h2>

	<div class="content_one_content">
		<?php echo $log_content; ?>
	</div>
	
	<p class="content_one_count"><?php echo gmdate('Y-n-j', $date); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php editflg($value['logid'],$author); ?></p>
	
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