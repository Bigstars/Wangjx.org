<div class="article container well">
<h4>友情链接</h1>
<?php
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
	<div class="box">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li style="margin-left: 0px;"><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank">
	<?php echo subString(strip_tags($value['link']),0,12); ?>
	</a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php ?>
</div>

<div style="height:10px;"></div>

<hr>

<footer id="zan-footer">	      	
Powered by <a title="自豪的采用 Emlog <?php echo Option::EMLOG_VERSION;?> 系统">EMLOG</a> . Theme Modify <a href="http://azt-lmt.com" target="_blank">azt-lmt.com</a> . <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> . <?php echo $footer_info; ?>
	<!--统计代码开始-->
<?php doAction('index_footer'); ?>

    <!--统计代码结束-->

</footer>



<div style="display: none;" class="fa fa-angle-up" id="gotop"></div>

<script type='text/javascript'>

	backTop=function (btnId){

		var btn=document.getElementById(btnId);

		var d=document.documentElement;

		var b=document.body;

		window.onscroll=set;

		btn.onclick=function (){

			btn.style.display="none";

			window.onscroll=null;

			this.timer=setInterval(function(){

				d.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);

				b.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);

				if((d.scrollTop+b.scrollTop)==0) clearInterval(btn.timer,window.onscroll=set);

			},10);

		};

		function set(){btn.style.display=(d.scrollTop+b.scrollTop>100)?'block':"none"}

	};

	backTop('gotop');

</script>


