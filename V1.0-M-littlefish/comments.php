<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title"><?php printf( _n( 'Comment 1', 'Comments %1$s', 'Ming_Littlefish' ), get_comments_number() ); ?></h2>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'Ming_Littlefish' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'Ming_Littlefish' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'Ming_Littlefish' ) ); ?></div>
            </nav>
        <?php endif; ?>
        <ol class="comment-list">
            <?php wp_list_comments( array( 'callback' => 'ming_littlefish_comment' ) ); ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'Ming_Littlefish' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'Ming_Littlefish' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'Ming_Littlefish' ) ); ?></div>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'Ming_Littlefish' ); ?></p>
    <?php endif; ?>
    <?php comment_form( array(
        'comment_notes_after'	=> '',
        'comment_notes_before' => '',
        'title_reply'       	=> __( 'Leave a Comment', 'Ming_Littlefish' )
    )); ?>
</div>