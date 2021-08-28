<?php
/**
 * The template for the gallery entry content
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="gallery-title">
        <h2><?php the_title(); ?></h2>
        <p class="post-meta"><?php the_time('Y年n月') ?></p>
        <hr/>
    </div>
    <?php the_content( __( 'Continue reading &rarr;', 'Ming_Littlefish' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'Ming_Littlefish' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
</div><!-- #post -->
