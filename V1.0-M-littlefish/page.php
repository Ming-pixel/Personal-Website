<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php
            if ( have_posts() )
            {
                while ( have_posts() )
                {
                    the_post();
                    get_template_part( 'format/content', get_post_format() );
                }
            }
            else  {
                get_template_part( 'format/content', 'none' );
            }
            ?>

        </div>
    </div>

<?php get_footer(); ?>