<?php
/**
 * The template for the blog entry header
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 *
 */
?>

<div class="post-title">
    <?php
    if ( is_single() ) :
        the_title( '<h2>', '</h2>' );
    else :
        the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;
    ?>

    <p class="post-meta">
        <strong>By: <?php the_author(); ?></strong>
        <em>&frasl;</em>
        <span class="category">Category : <a href="#"><?php the_category(',') ?></a></span>
        <em>&frasl;</em>
        <?php if ( comments_open() ): ?><span class="comment-num"><a href="<?php comments_link(); ?>">Comment : <?php comments_number( '0', '1', '%' ); ?></a></span><?php endif; ?>
        <em></em>
        <?php edit_post_link( __( 'Edit', 'Ming_Littlefish' ), '<span class="edit-link">', '</span>' ); ?>
    </p>
</div>

<div class="post-cover-img">
    <?php
    if ( is_single() )  {
        the_post_thumbnail();
    }
    else { ?>
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'Ming_Littlefish' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php } ?>
</div>