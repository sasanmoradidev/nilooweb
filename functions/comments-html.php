<?php
/*
**************   COMMENT DESIGN   **************
*/
function brick_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<div class="commentbox">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; 
	$author_name = get_comment_author( $comment_ID );
	?>
	
<div class="comment-inner-body">
    <div class="comment-details">
        <div class="row comments">
            <div class="col-xs-1 comment-avatar"><?php echo get_avatar( $comment, 32 ); ?></div>
            <div class="col-xs-11 comment-top-section">
            	<?php if ( $comment->comment_approved == '0' ) : ?>
            		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
            	<?php endif; ?> 
                <div class="top_comment">
                    <span class="author-name"> <?php echo $author_name; ?></span>
                	<span class="comment-date">
                		<?php echo get_comment_date('d/m/Y'); ?>
                	</span> 
                </div>
                <div class="comment_text">
                    <?php comment_text(); ?>
                </div>
            </div>	
        	
        </div>
    </div>
	
	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	
	<?php endif; ?>
	</div>
	</div>
<?php
}
//Comments

if( ! function_exists('brick_comment_form') ){

/**
 * Comment form
 */

function brick_comment_form($args = array(), $post_id = null ){
    $post_id = get_the_ID();

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';


    $req      = get_option( 'require_name_email' );

    $aria_req = ( $req ? " aria-required='true'" : '' );

    $html5    = 'html5' === $args['format'];
    $fields   =  array(
        'author' => '<div class="col-xs-12 col-md-5  field_wrapper"><div class="comment-form-author comment_field col-xs-12">
        <input class="form-control" id="author" placeholder="نام" name="author" type="text" 
        value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
        
        </div>',

        'email'  => '<div class="comment-form-email comment_field col-xs-12">
        <input id="email" class="form-control" name="email" placeholder="ایمیل" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' 
        value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
        
        </div> </div>
        ',
		'captcha' => '<div class="captcha-form">'.$captcha.'</div>',
		'comment_field'  => '<div class="col-xs-12 col-md-7 comment-text">
            <textarea class="form-control " id="comment" name="comment" placeholder="توضیحات" rows="3" aria-required="true"></textarea>
            
    </div>',

        'submit'  => '<div class="col-md-12 form-submit text-left">
        
        <input class="full-btn btn send-btn" id="submit" name="submit" type="submit" value="ثبت نظر" />      
		</div>
        ',

        );

$required_text = sprintf( ' ' . __('Required fields are marked %s', ZEETEXTDOMAIN), '<span class="required">*</span>' );

$defaults = array(
    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
    'must_log_in'          => '
    <div class="alert alert-danger must-log-in">' 
    . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) 
    . '</div>',

    'logged_in_as'  => '<div class="alert_by_comment"><div class="alert logged-in-as">' . sprintf( __( ' شما با نام کاربری <a href="%1$s" class="trn_elm_all">%2$s</a> وارد شده اید . <a href="%3$s" title="Log out of this account" class="trn_elm_all">خروج</a>', ZEETEXTDOMAIN ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div></div><div class="row form-group comment-form-comment">
    <div class="comment-text col-xs-12">
    <textarea class="form-control" id="comment" name="comment" placeholder="' . _x( 'توضیحات', 'noun', ZEETEXTDOMAIN ) . '" rows="8" aria-required="true"></textarea>
    </div><div class="col-md-12 form-submit text-left when_login">
		<div class="send_for_damin">
        <input class="comment-sent full-btn btn send-btn"  id="submit" name="submit" type="submit" value="ثبت نظر" />   
        </div></div></div>
',

    'comment_notes_before' => '',

    'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', ZEETEXTDOMAIN ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',

    'id_form'              => 'commentform',

    'id_submit'            => 'submit',

    'title_reply'          => __( 'Leave a Reply', ZEETEXTDOMAIN ),

    'title_reply_to'       => __( 'Leave a Reply to %s', ZEETEXTDOMAIN ),

    'cancel_reply_link'    => __( 'انصراف', ZEETEXTDOMAIN ),

    'label_submit'         => __( 'Post Comment', ZEETEXTDOMAIN ),

    'format'               => 'xhtml',
    );


$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

if ( comments_open( $post_id ) ) { ?>

<?php do_action( 'comment_form_before' ); ?>

<div id="respond" class="comment-respond">

    <h3 id="reply-title" class="comment-reply-title">     
	  <span class="bullet_comment"></span>
        <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
    </h3>

    <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) { ?>

    <?php echo $args['must_log_in']; ?>

    <?php do_action( 'comment_form_must_log_in_after' ); ?>

    <?php } else { ?>
    <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" 
        class="row form-horizontal border_bt comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>  >
        <?php do_action( 'comment_form_top' ); ?>

        <?php if ( is_user_logged_in() ) { ?>

        <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>

        <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>

        <?php } else { ?>

        <?php echo $args['comment_notes_before']; ?>

        <?php

        do_action( 'comment_form_before_fields' );

        foreach ( (array) $args['fields'] as $name => $field ) {
            echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
        }

        do_action( 'comment_form_after_fields' );

    } 

    echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); 

    echo $args['comment_notes_after']; ?>

        <?php comment_id_fields( $post_id ); ?>

    <?php do_action( 'comment_form', $post_id ); ?>

</form>
</div>

<?php } ?>

<?php do_action( 'comment_form_after' ); ?>
<?php } else { ?>
<?php do_action( 'comment_form_comments_closed' ); ?>
<?php } ?>
<?php
}
}
?>