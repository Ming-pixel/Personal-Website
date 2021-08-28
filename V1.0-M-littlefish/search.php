<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */

get_header(); ?>

    <a class="to-back" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="Blog"></a>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

                <?php if ( have_posts() ) { ?>

                    <header class="page-header">
                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Ming_Littlefish' ), get_search_query() ); ?></h1>

                    </header>

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

        </div><!-- #content -->
	</div><!-- #primary -->

<?php ming_littlefish_paging_nav(); ?>
<?php get_footer(); ?>