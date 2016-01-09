<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php 
//blog：自定义分页函数 
function my_page($count, $perlogs, $page, $url, $anchor = '') { 
 $pnums = @ceil($count / $perlogs); 
 $re = ''; 
 $urlHome = preg_replace("|[?&/][^./?&=]*page[=/-]|", "", $url); 
 if($page > 1) { 
  $i = $page - 1; 
  $re = $re.'<li itemprop="name"><a class="prev page-numbers" href="'.$url.$i.'">« 上一页</a></li>'; 
 }
 $re=$re.'<li itemprop="name"><span class="page-numbers current">'.$page.' / '.$pnums.'</span></li>';
 if($page < $pnums) { 
  $i = $page + 1; 
  $re= $re.'<li itemprop="name"><a class="next page-numbers" href="'.$url.$i.'">下一页 »</a></li>'; 
 }
 return $re; 
} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<aside id="text-2" class="widget widget_text">
		<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
		<div class="textwidget">
			<p class="clearfix"><?php echo $user_cache[1]['des']; ?></p>
		</div>
	</aside>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<aside id="text-2" class="widget widget_text">
	<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</aside>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<aside id="tag_cloud-4" class="widget widget_tag_cloud">
	<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<div class="tagcloud">
	<?php foreach($tag_cache as $value): ?>
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?>个话题" style="font-size:<?php echo $value['fontsize']; ?>pt;"><?php echo $value['tagname']; ?></a>
	<?php endforeach; ?>
	</div>
	</aside>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<aside id="tag_cloud-4" class="widget widget_tag_cloud">
	<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<div class="tagcloud">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<a href="<?php echo Url::sort($value['sid']); ?>" title="<?php echo $value['lognum'] ?>篇文章"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
			<a href="<?php echo Url::sort($value['sid']); ?>" title="<?php echo $value['lognum'] ?>篇文章"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php endforeach; ?>
	</div>
	</aside>
<?php }?>
<?php
//widget：首页分类
function index_sort(){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<div class="inline-ul inline-ul-ml"><ul id="menu-left-menu" class="menu">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag"><a href="<?php echo Url::sort($value['sid']); ?>" title="<?php echo $value['lognum'] ?>篇文章"><?php echo $value['sortname']; ?></a></li>
	<?php if (!empty($value['children'])): ?>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
			<li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag"><a href="<?php echo Url::sort($value['sid']); ?>" title="<?php echo $value['lognum'] ?>篇文章"><?php echo $value['sortname']; ?></a></li>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul></div>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<aside id="tag_cloud-4" class="widget widget_tag_cloud">
	<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<ul id="newcomment">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><a><?php echo $value['t']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</aside>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
if($title=="by_miem"){
	?>
	<ul class="tab-panel tab-con3">
	<ul id="newcomment">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	<li><a class="comment-name" rel="nofollow" href="<?php echo $url; ?>"><span class="c-name"><?php echo $value['name']; ?> 说：</span><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</ul>
<?php 
}else{
}
}?>
<?php //widget：最新文章
function widget_newlog($title){
$index_newlognum = Option::get('index_newlognum');
if($title=="by_miem"){
?>
<ul class="tab-panel tab-con1">
<?php 
$db = MySql::getInstance();
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by date DESC limit 0,$index_newlognum"); while($row = $db->fetch_array($sql)){ $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].''; if (!empty($row['excerpt'])){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['excerpt'], $match); if(empty($match[1][0])) {
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$row['content'],$match);}}else{preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'],$match);}
$img = isset($match[0][0]) ? $match[0][0]:'<img src="图片地址" />';//无图片时显示
$date = gmdate('Y-m-d', $row['date']);
$content = strip_tags($logpost,'');
$content = mb_substr($content,0,100,'utf-8');//摘要字数修改本代码中的100这个即可
$comment = ($row['comnum'] != 0) ? ''.$row['comnum'].'' : '0'; $gid = $row['gid']; $tag = $db -> query("SELECT * FROM ".DB_PREFIX."tag WHERE gid LIKE '%,$gid,%'");?>
	<li>
		<div class="content">
			<p class="entry-meta"><a href=<?php echo Url::sort($row['sid']);?>"" rel="category tag"><?php echo $row['sortname'];?></a><span class="sep">&bull;</span><?php echo $date; ?><span class="space">&bull;</span> <?php echo $row['views'];?>Views</p>
			<h4 class="entry-title"><a rel="bookmark" href="<?php echo Url::log($row['gid']);?>"  title="<?php echo $row['title'];?>" target="_blank"><?php echo $row['title'];?></a></h4>
		</div>
	</li>
<?php };?>
</ul>
<?php 
}else{
}
}?>
<?php //widget：热门文章
function widget_hotlog($title){
$index_hotlognum = Option::get('index_hotlognum');
if($title=="by_miem"){
?>
<ul class="tab-panel tab-con2">
<?php $db = MySql::getInstance();$db = MySql::getInstance();
$time = time();
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND date > $time - 30*24*60*60 AND top='n' AND sortid=sid order by `views` DESC limit 0,$index_hotlognum");
while($row = $db->fetch_array($sql)){ $logpost = !empty($row['excerpt']) ? $row['excerpt'] :''.$row['content'].''; if (!empty($row['excerpt'])){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$row['excerpt'],$match);if(empty($match[1][0])){
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i",$row['content'],$match);}}else{preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'],$match);}
$img = isset($match[0][0]) ? $match[0][0]:'<img src="图片地址" />';//无图片时显示
$date = gmdate('Y-m-d', $row['date']);
$content = strip_tags($logpost,'');
$content = mb_substr($content,0,100,'utf-8');//摘要字数修改本代码中的100这个即可
$comment = ($row['comnum'] != 0) ? ''.$row['comnum'].'' : '0';
$gid = $row['gid'];?>
	<li>
		<div class="content">
			<p class="entry-meta"><?php echo $date; ?><span class="space">&bull;</span> <?php echo $row['views'];?>Views</p>
			<h4 class="entry-title"><a rel="bookmark" href="<?php echo Url::log($row['gid']);?>"  title="<?php echo $row['title'];?>" target="_blank"><?php echo $row['title'];?></a></h4>
		</div>
	</li>
<?php };?></ul>
<?php 
}else{
}
}?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<aside id="tag_cloud-4" class="widget widget_tag_cloud">
	<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<ul id="newcomment">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</aside>
<?php }?>
<?php 
//综合块
function widget_get_every(){
?>
	<div class="widget tabbed">
		<input type="radio" name="tabbed" id="tab1" checked="checked"/>
		<input type="radio" name="tabbed" id="tab2"/>
		<input type="radio" name="tabbed" id="tab3"/>
		<ul class="nav nav-tabs">
			<li class="tab1"><label for="tab1" data-toggle="tab">最新文章</label></li>
			<li class="tab2"><label for="tab2">热门文章</label></li>
			<li class="tab3"><label for="tab3">最新评论</label></li>
		</ul>
		<div class="tab-content">
<?php
		widget_newlog("by_miem");
		widget_hotlog("by_miem");
		widget_newcomm("by_miem");
		?>
		</div>
	</div>
<?php
}
?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<aside id="text-2" class="widget widget_text">
		<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
		<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
		<input name="keyword" class="search" type="text" class="bdcs-search-form-input" id="bdcs-search-form-input"  placeholder="搜索一下吧" autocomplete="off">
		<input type="submit" class="bdcs-search-form-submit " id="bdcs-search-form-submit" value="搜索">
		</form>
	</aside>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<aside id="text-2" class="widget widget_text">
		<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<?php foreach($record_cache as $value): ?>
		<div class="content">
			<h4 class="entry-title"><a rel="bookmark" href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></h4>
		</div>
	<?php endforeach; ?>
	</aside>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<aside id="text-2" class="widget widget_text">
		<h3 class="panel-heading widget-title"><?php echo $title; ?></h3>
	<?php echo $content; ?>
	</aside>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<aside id="linkcat-2" class="widget widget_links">
	<h3 class="widget-title"><span><?php echo $title; ?></span></h3>
	<ul class='xoxo blogroll'>
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</aside>
<?php }?> 
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<div class="top-menu fl">
	<ul id="menu-top" class="menu">
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'menu-item-type-custom menu-item-object-custom' : 'menu-item-type-taxonomy menu-item-object-category';
		?>
		<li class="menu-item <?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

		</li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
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
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
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
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div class="nav-previous">
	<a href="<?php echo Url::log($prevLog['gid']) ?>"><span class="meta-nav">←</span> <?php echo $prevLog['title'];?></a>
	</div>
	<?php endif;?>
	<?php if($nextLog):?>
	<div class="nav-next">
		<a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?> <span class="meta-nav">→</span></a>
	</div>
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment" id="comment-<?php echo $comment['cid']; ?>">
		<ol id="thread-comments">
			<li class="comment even thread-even depth-1 list-group-item parent top" id="comment-<?php echo $comment['cid']; ?>" data-comment-id="<?php echo $comment['cid']; ?>">
				<div class="comment-body" id="div-comment-<?php echo $comment['cid']; ?>">
					<a class="comment-author" data-instant><img src="<?php echo DuoshuoGravatar($comment['mail']); ?>" class="avatar" width="60" height="60" /></a>
					<cite><?php echo $comment['poster']; ?></cite>
					<div class="comment-content"><p><?php echo $comment['content']; ?></p></div>
					<div class="comment-meta">
						<time><?php echo $comment['date']; ?></time>
						<a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" rel="nofollow"><span class="glyphicon glyphicon-comment"></span>回复</a>
					</div>
				</div>
			</li><!-- #comment-## -->
		<?php blog_comments_children($comments, $comment['children']); ?>
		</ol>
	</div>
	<?php endforeach; ?>
    <div id="pagenavi">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<ul class="children">
		<li class="comment byuser comment-author-caibaojian bypostauthor odd alt depth-2 list-group-item" id="comment-<?php echo $comment['cid']; ?>" data-comment-id="<?php echo $comment['cid']; ?>">
			<div class="comment-body" id="div-comment-<?php echo $comment['cid']; ?>">
				<img src="<?php echo DuoshuoGravatar($comment['mail']); ?>" class="avatar" width="50" height="50" />
				<cite class="fn" ><?php echo $comment['poster']; ?></cite>
				<div class="comment-content"><p><?php echo $comment['content']; ?></p></div>
				<div class="comment-meta">
					<time>2015-02-11 14:52</time><?php if($comment['level'] < 4): ?><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" rel="nofollow"><span class="glyphicon glyphicon-comment"></span>回复</a><?php endif; ?>
				</div>
			</div>
		</li><!-- #comment-## -->
	<?php blog_comments_children($comments, $comment['children']);?>
	</ul><!-- .children -->
	<?php endforeach; ?>
<?php }?>
<?php
function DuoshuoGravatar($email, $s = 40, $d = 'mm', $g = 'g') {
	$hash = md5($email);
	$avatar = "http://gravatar.duoshuo.com/avatar/$hash?s=$s&d=$d&r=$g";
	return $avatar;
}
?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<h4 class="list-group-item">发表评论 <small id="cancel-comment-reply"></h4>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
		<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform" class="comment-form" role="form">
		<div id="comment-user" data-user-id="0">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == ROLE_VISITOR): ?>
			<div class="form-group">
				<label for="author" class="col-sm-2 control-label">名称</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1" placeholder="（必填）" aria-required='true' required />
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">电子邮件</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2" placeholder="（必填）（不会被公开）" aria-required='true' required />
				</div>
			</div>
			<div class="form-group">
				<label for="url" class="col-sm-2 control-label">站点</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3"/>
				</div>
			</div>
			</div>
			<?php endif; ?>
			<textarea class="form-control" name="comment" id="comment" rows="10" tabindex="4" required></textarea>
			<div id="comment-action" class="btn-toolbar clearfix" role="toolbar">
			<div class="btn-group">
				<?php echo $verifyCode; ?> <input class="btn btn-default" type="submit" id="comment_submit" value="发表评论" tabindex="6"/>
			</div>
	</div>
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
		</form>
	</div>
	</div>
	<?php endif; ?>
	</div>
<?php }?>
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
