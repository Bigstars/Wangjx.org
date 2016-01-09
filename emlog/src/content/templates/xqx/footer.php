<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div style="clear:both;"></div>
<div class="footer">
	&copy;&nbsp;&nbsp;2015&nbsp;&nbsp;/&nbsp;&nbsp;Theme by&nbsp;&nbsp;<a href="http://blog.wdyun.cn">goodstudy</a>&nbsp;&nbsp;/&nbsp;&nbsp;Powered by&nbsp;&nbsp;<a href="http://www.emlog.net" title="采用emlog系统">emlog</a>&nbsp;&nbsp;Author&nbsp;&nbsp;<a href="#">Jack Wang starccgs@163.com</a>
	<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?>
	<?php doAction('index_footer'); ?>
</div>
</body>
</html>
