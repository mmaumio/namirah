<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package namirah
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

/** COMMENTS WALKER */
class nm_walker_comment extends Walker_Comment {
     
    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>
         
    <?php }
     
    /** START_LVL 
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1; ?>
          <ul class="children">
    <?php }
 
    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
        </ul><!-- /.children -->
         
    <?php }
     
    /** START_EL */
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
         
        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <div id="comment-body-<?php comment_ID() ?>" class="post-comment">
             	<div class="comment-author">
             	<div class="author-thumb">
             		<?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
             	</div>
             	<div>
                <div class="comment-meta">
                    <cite class="fn"><?php echo get_comment_author_link( ); ?></cite>
                    <span class="says"><?php _e('says:', 'namirah'); ?></span>
                    <div><?php comment_date(); ?> at <?php comment_time(); ?> <?php edit_comment_link( '(Edit)' ); ?></div>
                </div><!-- /.comment-author -->
 
                <div id="comment-content-<?php comment_ID(); ?>" class="comment-body">
                    <?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'namirah'); ?></em>
                     
                    <?php else: comment_text(); ?>
                    <?php endif; ?>
                </div><!-- /.comment-content -->
 				</div>
 				</div>	
                <div class="reply">
                    <?php $reply_args = array(
                        'add_below' => '', 
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'] );
     
                    comment_reply_link( array_merge( $args, $reply_args ) );  ?>
                </div><!-- /.reply -->
            </div><!-- /.comment-body -->
 
    <?php }
 
    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
         
        </li><!-- /#comment-' . get_comment_ID() . ' -->
         
    <?php }
     
    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top 
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>
     
    </ul><!-- /#comment-list -->
 
    <?php }
}

?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'namirah' ),
					number_format_i18n( get_comments_number() ), '<span><em>' . get_the_title() . '</em></span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div class="comment-navigation clearfix" role="navigation">
			
			<div class="nav-previous pull-left"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'namirah' ) ); ?></div>
			<div class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav"></span>&rarr; ', 'namirah' ) ); ?></div>

		</div><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				wp_list_comments( array(
					'walker'      => new nm_walker_comment,
					'style'       => 'ol',
					'callback'    => null,
					'end-callback' => null,
          'per_page'    => '',
					'type'        => 'all',
					'page'        => '',
					'avatar_size' => 50,
				) );
		
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<div class="comment-navigation clearfix" role="navigation">
			
			<div class="nav-previous pull-left"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'namirah' ) ); ?></div>
			<div class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav"></span>&rarr; ', 'namirah' ) ); ?></div>

		</div><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'namirah' ); ?></p>
	<?php endif; ?>

	<?php
  $args = array(
      'id_submit' => 'btn-post-comment',
            'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'namirah' ) . '</label>
            <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
            'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                  '<p class="comment-form-author">' .
                  '<label for="author">' . __( 'Name ', 'namirah' ) . '<span class="required">*</span></label>
                  <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                  '" size="30" aria-required="true" /></p>',

                'email' =>
                  '<p class="comment-form-email"><label for="email">' . __( 'Email ', 'namirah' ) . '<span class="required">*</span></label>
                  <input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                  '" size="30" aria-required="true" /></p>',

                'url' =>
                  '<p class="comment-form-url"><label for="url">' .
                  __( 'Website', 'namirah' ) . '</label>' .
                  '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                  '" size="30" /></p>'
                )
            )
        );

  comment_form( $args ); ?>

</div><!-- #comments -->
