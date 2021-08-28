<?php
/**
 * The template for the other format content
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content( __( 'Continue reading &rarr;', 'Ming_Littlefish' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'Ming_Littlefish' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
</div><!-- #post -->