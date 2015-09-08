<?php 
function fitster_comments($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>
		<div class="komentarz" id="comment-<?php comment_ID(); ?>">
				<?php echo get_avatar($comment,$size='80' ); ?>
				<?php $user_name_str = substr(get_comment_author(),0, 20); ?>
				<a href="#"><?php echo $user_name_str;?></a>
				<span> - <?php echo get_comment_date().'&nbsp;'.get_comment_time();?></span>
				<?php edit_comment_link(__('(Edit)'),'&nbsp; ','') ?>
				 <?php if ($comment->comment_approved == '0') : ?>
				 <span>Twój Komentarz oczekuje na moderację.</span>
				 <?php endif; ?>
				<?php comment_text() ?>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>

<?php 
 }