<?php 
/*
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>

<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="bloggerinfo">
    <div id="bloggerinfoimg">
      <?php if (!empty($user_cache[1]['photo']['src'])): ?>
      <img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
      <?php endif;?>
    </div>
    <p class="face"><b><?php echo $name; ?></b><br/> <?php echo $user_cache[1]['des']; ?></p>
	<div class="clear"></div>
  </ul>
</li>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <div id="calendar"> </div>
  <script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script> 
</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="blogtags">
    <?php foreach($tag_cache as $value): ?>
	<span class="blogtags" style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;color:#ccc;"> <a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志"><?php echo $value['tagname']; ?></a></span>
    <?php endforeach; ?>
  </ul>
</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="blogsort">
    <?php foreach($sort_cache as $value): ?>
    <li> <a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a> 
    <?php endforeach; ?>
  </ul>
  <div class="clear"></div>
</li>
<?php }?>
<?php
//widget：最新碎语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="twitter">
    <?php foreach($newtws_cache as $value): ?>
    <?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank"> </a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?><p><?php echo smartDate($value['date']); ?></p></li>
    <?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
    <p class="more"><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
    <?php endif;?>
  </ul>
</li>
<?php }?>
<?php
//widget：随机碎语
function widget_twitter_random($title){
        global $CACHE; 
        $newtws_cache = $CACHE->readCache('newtw');
        $istwitter = Option::get('istwitter');
        ?>
<?php foreach($newtws_cache as $value){ ?>
<?php 
$count += count($value['t']);
        }
$number = mt_rand(0,$count-1);
echo $newtws_cache["$number"][content];
        ?>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="newcomment">
    <?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
		<li><img alt="" src="http://www.gravatar.com/avatar/<?php echo md5($value['mail']); ?>" class="avatar avatar-32 photo" height="32" width="32"><?php echo $value['name']; ?>:<br> <a href="<?php echo $url; ?>" title="查看"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
  </ul>
</li>
<?php }?>
<?php
//widget：最新日志
function widget_newlog($title){
?>
<div id="tab-title"><h3><span class="">最新文章</span><span class="">热门文章</span><span class="selected">随机文章</span></h3>
	<div id="tab-content">
		<?php global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
		<ul class="hide" style="display: none; ">
		<?php foreach($newLogs_cache as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>" rel="bookmark" title="详细阅读<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
		</ul>
		<?php $index_hotlognum = Option::get('index_hotlognum');
			$Log_Model = new Log_Model();
			$randLogs = $Log_Model->getHotLog($index_hotlognum);  ?>
		<ul class="hide" style="display: none; ">
		<?php foreach($randLogs as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
		</ul>
		<?php $index_randlognum = Option::get('index_randlognum');
				$Log_Model = new Log_Model();
				$randLogs = $Log_Model->getRandLog($index_randlognum);
		?>
		<ul class="hide" style="display: block; ">
		<?php foreach($randLogs as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>" rel="bookmark" title="详细阅读 <?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="logserch">
    <form name="keyform" method="get" id="sidebar_s" action="<?php echo BLOG_URL; ?>index.php">
      <input name="keyword" id="s" type="text" value="" />
      <input type="submit" id="logserch_logserch" class="button" value="搜索" />
    </form>
  </ul>
</li>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="record">
    <?php foreach($record_cache as $value): ?>
    <li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
    <?php endforeach; ?>
  </ul>
</li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="zidingyi">
    <?php echo $content; ?>
  </ul>
</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	if (!blog_tool_ishome()) return;
	?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="link">
    <?php foreach($link_cache as $value): ?>
    <li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
    <?php endforeach; ?>
  </ul>
</li>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE;
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul class="nav navbar-nav" id="menu-%e5%95%8a%e5%95%8a%e5%95%8a">
	<?php
	foreach($navi_cache as $value):
		if($value['url'] == 'admin'):
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
		$current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li class="<?php echo $current_tab;?>">
                <a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
                <?php if (!empty($value['children'])) :?>
                <ul class="dropdown-menu">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
		</ul>
                <?php endif;?>
                </li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
<?php if(!empty($log_cache_sort[$blogid])): ?>
<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
<?php endif;?>
<?php }?>
<?php
//blog：文件附件
function blog_att($blogid){
	global $CACHE;
	$log_cache_atts = $CACHE->readCache('logatts');
	$att = '';
	if(!empty($log_cache_atts[$blogid])){
		$att .= '附件下载：';
		foreach($log_cache_atts[$blogid] as $val){
			$att .= '<a href="'.BLOG_URL.$val['url'].'" target="_blank">'.$val['filename'].'</a> 附件大小：'.$val['size'];
		}
	}
	echo $att;
}
?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = ' ';
		foreach ($log_cache_tags[$blogid] as $key=>$value){
			$tag .= "<a href=\"".Url::tag($value['tagurl'])."\" class=\"tag".$key."\">".$value['tagname'].' </a>';
		}
		echo $tag.' ';
	}else {
		echo '暂无标签';
	}
}
?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){
	extract($neighborLog);?>
<div class="zan-page bs-example">
<ul class="pager">
<?php if($prevLog):?>
<li class="previous"><a href="<?php echo Url::log($prevLog['gid']) ?>" title="上一篇《<?php echo $prevLog['title'];?>》">上一篇</a></li><br/>
 <?php else:?>
  <li class="previous"><a title="上一篇：噢~这是最新的文章了">下一篇</a></li><br/>
<?php endif;?>
<?php if($nextLog && $prevLog):?>
<?php endif;?>
<?php if($nextLog):?>
<li class="next"><a href="<?php echo Url::log($nextLog['gid']) ?>" title="下一篇《<?php echo $nextLog['title'];?>》">下一篇</a></li>
<?php else:?>
  <li class="next"><a title="下一篇：没错，这就是小站第一篇文章">下一篇</a></li>
<?php endif;?>
</ul>
</div>
<?php }?>

<?php
//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb){
    if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
<div id="trackback_address">
  <p>引用地址:
    <input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
    <a name="tb"></a></p>
</div>
<?php endif; ?>
<?php foreach($tb as $key=>$value):?>
<ul id="trackback">
  <li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
  <li>BLOG: <?php echo $value['blog_name'];?></li>
  <li><?php echo $value['date'];?></li>
</ul>
<?php endforeach; ?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments,$comnum){
    extract($comments);
    if($commentStacks): ?>
	<a name="comments" class="comment-top"></a>
<h3 id="comments-title" class="comments-header"><i class="fa fa-comments"></i>评论列表</h3>
	<?php endif; ?>
     <ol class="commentlist">
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['content'] = preg_replace("|\[em_(\d+)\]|i",'<img src="' . BLOG_URL. 'admin/editor/plugins/emoticons/images/$1.gif" />',$comment['content']);
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank" class="upps">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<a name="<?php echo $comment['cid']; ?>"></a>
        <li id="comment-<?php echo $comment['cid']; ?>" class="comment byuser comment-author-qxk6 odd alt thread-odd thread-alt depth-1">
			<article id="div-comment-<?php echo $comment['cid']; ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if($isGravatar == 'y'): ?><img alt="" src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-70 wp-user-avatar wp-user-avatar-70 alignnone photo" height="70" width="70"><?php endif; ?>
                        
                        
                        						<b class="fn"><strong><?php echo $comment['poster']; ?> </strong></b>于<strong><span style="color:#FF9900;"><?php echo $comment['date']; ?></span></strong><span class="says"> 说道：</span>					</div>
					<!-- .comment-author -->

					<!-- .comment-metadata -->

									</footer><!-- .comment-meta -->

				<div class="comment-content">
					<p><?php echo $comment['content']; ?><div class="reply"><a  class="comment-reply-login" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>				</div></p>
				</div><!-- .comment-content -->

				<!-- .reply -->
			</article><!-- .comment-body -->

		<?php blog_comments_children($comments, $comment['children']); ?>
	</li>
	<?php endforeach; ?>
    </ol>
	<?php if($commentPageUrl) {?><br />
<div id="zan-page" class="clearfix">
	<ul class="pagination pagination-zan pull-right">	    <?php echo $commentPageUrl;?>
    </ul>
</div>
	<?php } ?>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child) {
	$comment = $comments[$child];
	$comment['content'] = preg_replace("|\[em_(\d+)\]|i",'<img src="' . BLOG_URL. 'admin/editor/plugins/emoticons/images/$1.gif" />',$comment['content']);
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank" class="upps">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<ol class="children">
		<a name="<?php echo $comment['cid']; ?>"></a>
        <li id="comment-<?php echo $comment['cid']; ?>" class="comment byuser comment-author-benz odd alt depth-2">
			<article id="div-comment-2035" class="comment-body">
			  <footer class="comment-meta">
					<div class="comment-author vcard">
                    		<?php if($isGravatar == 'y'): ?>
                            <img alt='' src='<?php echo getGravatar($comment['mail']); ?>' class='avatar avatar-70 wp-user-avatar wp-user-avatar-70 alignnone photo' height='70' width='70' /><?php endif; ?>
                        <b class="fn"><strong><?php echo $comment['poster']; ?></strong></b><span class="says">于<strong><span style="color:#FF9900;"><?php echo $comment['date']; ?></span></strong> 回复道：</span>					</div>
				  <!-- .comment-author --><!-- .comment-metadata -->

			  </footer><!-- .comment-meta -->

				<div class="comment-content">
					<p><?php echo $comment['content']; ?></p>
				</div><!-- .comment-content -->

				<div class="reply">
					<a class="comment-reply-login" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>				</div><!-- .reply -->
			</article><!-- .comment-body -->
</li><!-- #comment-## -->
		<?php blog_comments_children($comments, $comment['children']);?>
</ol><!-- .children -->
	<?php } ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
    <div class="article container well">
<div id="comment-place">
	<div class="comment-post" id="comment-post">
		<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
		<p class="comment-header"><b>发表评论：</b><a name="respond"></a></p>
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == ROLE_VISITOR): ?>
			<p>
				<input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1">
				<label for="author"><small>昵称</small></label>
			</p>
			<p>
				<input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2">
				<label for="email"><small>邮件地址 (选填)</small></label>
			</p>
			<p>
				<input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3">
				<label for="url"><small>个人主页 (选填)</small></label>
			</p>
			<?php endif; ?>
			<p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
			<p><?php echo $verifyCode; ?> <input type="submit" id="submit" value="发表评论" tabindex="6" /></p>
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
		</form>
	</div>
	</div>
    </div>
<?php endif; ?>
<?php }?>
<?php
//comment：输出等级
function echo_levels($comment_author_email,$comment_author_url){
  $DB = MySql::getInstance();
  $vip_list = array('"2398112878@qq.com"');
	if(in_array($comment_author_email,$vip_list)){
	   echo '<a class="vip" href="mailto:2398112878@qq.com" title="会员认证"></a>';
	  }

  $adminEmail = '"infreesu@hotmail.com"';
  if($comment_author_email==$adminEmail)
  {
	echo '<a class="vip" href="mailto:'.$comment_author_email.'" title="作者认证"></a>';
    echo '<a class="vp" href="mailto:infreesu@hotmail.com" title="管理员认证"></a><a class="vip7" title="特别认证"></a>';
  }
  
  $sql = "SELECT cid as author_count FROM emlog_comment WHERE mail = ".$comment_author_email;
  $res = $DB->query($sql);
  $author_count = mysql_num_rows($res);
  if($author_count>=5 && $author_count<10 && $comment_author_email!=$adminEmail)
    echo '<a class="vip1" title="路过酱油 LV.1"></a>';
  else if($author_count>=10 && $author_count<20 && $comment_author_email!=$adminEmail)
    echo '<a class="vip2" title="偶尔光临 LV.2"></a>';
  else if($author_count>=20 && $author_count<40 && $comment_author_email!=$adminEmail)
    echo '<a class="vip3" title="常驻人口 LV.3"></a>';
  else if($author_count>=40 && $author_count<80 && $comment_author_email!=$adminEmail)
    echo '<a class="vip4" title="以博为家 LV.4"></a>';
  else if($author_count>=80 &&$author_count<160 && $comment_author_email!=$adminEmail)
    echo '<a class="vip5" title="情牵小博 LV.5"></a>';
  else if($author_count>=160 && $author_coun<320 && $comment_author_email!=$adminEmail)
    echo '<a class="vip6" title="为博终老 LV.6"></a>';
  else if($author_count>=320 && $comment_author_email!=$adminEmail)
    echo '<a class="vip7" title="三世情牵 LV.7"></a>';
}
?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>