<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */

get_header(); ?>

    <a class="to-back" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="Blog"></a>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <?php parse_str($_SERVER['QUERY_STRING'], $get); ?>
            <?php if ( $get['post_type'] == 'gallery'  ||  $get['gallery'] || $get['post_type'] == 'about'  ||  $get['about'] ) {}  else { ?>
                <?php if ( have_posts() ) { ?>
                    <header>
                        <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'Ming_Littlefish' ), single_cat_title( '', false ) ); ?></h1>

                        <?php if ( category_description() ) : // Show an optional category description ?>
                            <div class="archive-meta"><?php echo category_description(); ?></div>
                        <?php endif; ?>
                    </header><!-- .archive-header -->

                    <?php /* The loop */
                    while ( have_posts() )
                    {
                        the_post();
                        get_template_part( 'format/content', get_post_format() );
                    }
                    ?>
                <?php } else { ?>
                    <?php get_template_part( 'format/content', 'none' ); ?>
                <?php } ?>
            <?php } ?>


        </div><!-- #content -->
	</div><!-- #primary -->

<?php ming_littlefish_paging_nav(); ?>
<?php get_footer(); ?>