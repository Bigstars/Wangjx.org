<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
    </div>
   </div><!-- #main -->
  </div><!-- #first .widget-area -->
 </div>
    <div class="container"></div>
    <div class="prefooter">
        <div class="container links">
            <?php widget_link('友情链接'); ?>
        </div>
    </div><!-- #prefooter -->
<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container footer-info">
			<div class="site-info">
			&copy;&nbsp;2015&nbsp;<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>&nbsp;版权所有&nbsp;|&nbsp;The Theme By <a href="#">小草</a>&nbsp;|&nbsp;From&nbsp;<a href="http://emlog.net">EMLOG</a>&nbsp;|&nbsp;<a href="https://github.com/Bigstars">Author Github</a><?php echo $icp; ?> <?php echo $footer_info; ?>
			<?php doAction('index_footer'); ?>
			</div>
</footer><!-- #colophon -->
<div class="btn-group-vertical floatButton">
<button type="button" class="btn btn-default" id="goTop" title="去顶部">
<span class="glyphicon glyphicon-arrow-up"></span>
</button>
<button type="button" class="btn btn-default" id="refresh" title="刷新">
<span class="glyphicon glyphicon-repeat"></span>
</button>
<button type="button" class="btn btn-default" id="goBottom" title="去底部">
<span class="glyphicon glyphicon-arrow-down"></span>
</button>
</div>
<script type='text/javascript' src='http://libs.baidu.com/jquery/1.9.1/jquery.min.js?ver=lastest'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>js/script.min.js?ver=20150116'></script>
</body>
</html>
