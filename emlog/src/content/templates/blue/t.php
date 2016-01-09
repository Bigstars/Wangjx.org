<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content" class="content-area single" data-post-id="3354" role="article" itemscope itemtype="http://schema.org/Article">
<div class="comments" id="comments" data-no-instant>
<div class="list-group" id="respond">
	<div class="comment" id="comment-<?php echo $comment['cid']; ?>">
		<ol id="thread-comments">
    <ul>
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
			<li class="comment even thread-even depth-1 list-group-item parent top">
				<div class="comment-body">
					<a class="comment-author" data-instant><img src="<?php echo $avatar; ?>" class="avatar" width="60" height="60" /></a>
					<cite><?php echo $author; ?></cite>
					<div class="comment-content"><p><?php echo $val['t'].'<br/>'.$img;?></p></div>
					<div class="comment-meta">
						<time><?php echo $val['date'];?></time>
					</div>
				</div>
			</li><!-- #comment-## -->
    <?php endforeach;?>
		</ol>
	</div>
    </ul>
	</div>
	<ul class="pagination" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php echo my_page($twnum,Option::get('index_twnum'),$page,BLOG_URL.'t/?page=');?>
	</ul>
<?php
 include View::getView('side');
 include View::getView('footer');
?>