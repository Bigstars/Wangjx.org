 <?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<link href="<?php echo TEMPLATE_URL; ?>timeaxis/css/style_2.css" rel="stylesheet" type="text/css" />   
 <div id="zan-bodyer" style="padding-top: 30px;">
	<div class="container">
		<section class="row">
		<div>
			<article class="article well clearfix">

<div class="contenta">
	<div class="wrapper">
		<div class="light"><i></i></div>
		<hr class="line-left">
		<hr class="line-right">
		<div class="main">
			<h1 class="title"><a href='<?php echo BLOG_URL; ?>' id="ha">博客微语时间轴<i></i></a></h1>
			<div class="year">
				<h2><a href="#">伸缩<i></i></a></h2>
				<div class="list">
					<ul><br/>
					 <?php 
						 foreach($tws as $val):
					  ?> 
						<li class="cls highlight" class='li'>
							<p class="date"><?php echo $val['date']; ?></p>
							<p class="intro"><?php echo $val['t'];?></p>
						</li>
					<?php endforeach;?>
					</ul>
				</div>
			</div>
			<div class="page_num" style='float:right'><?php echo $pageurl;?></div>
		</div>
	</div>
</div>
</div>
 </article>
		</div>
		</section>
	</div>
</div>

<script type="text/javascript">
$(".main .year .list").each(function(e, target){
	var $target=  $(target),
	$ul = $target.find("ul");
	$target.height($ul.outerHeight()), $ul.css("position", "absolute");
}); 
$(".main .year>h2>a").click(function(e){
	e.preventDefault();
	$(this).parents(".year").toggleClass("close");
});
</script>
<?php
 include View::getView('footer');
?>