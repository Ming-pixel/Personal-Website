<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */
?>
<article class="blog-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-data"><span class="day"><?php the_time('d') ?></span><span class="month"><?php the_time('Y年n月') ?></span><span class="post-data-bg"><i class="ti-crown"></i></span></div>

    <?php {
        get_template_part( 'inc/blog-entry-header' ) ;
        get_template_part( 'inc/blog-entry-content' ) ;
    } ?>

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
    <?php endif; ?>

</article>