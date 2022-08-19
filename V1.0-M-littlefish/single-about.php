<?php
/**
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */

get_header(); ?>

    <a class="to-back" href="<?php echo esc_url( home_url( '/?post_type=about' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="About">
        <!--<i class="ti-close"></i>-->
    </a>
    <div id="primary" class="content-area single-padding-top">
        <div id="content" class="site-content" role="main">
        <?php /* The loop */
        while ( have_posts() ) {
            the_post();
            get_template_part( 'format/gallery-content', get_post_format());
            ming_littlefish_tag_meta();
            echo "<div class=\"comments-area-mm\" >";
            comments_template();
            echo "</div>";
        }
        ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php ming_littlefish_post_nav(); ?>
<?php get_footer(); ?>

