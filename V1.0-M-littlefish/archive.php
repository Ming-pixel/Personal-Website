<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */

get_header(); ?>

    <a id="menu-trigger"><span class="menu-icon"></span><span class="triangle-top-right"></span></a>

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

<?php ming_littlefish_paging_nav(); ?>
<?php get_footer(); ?>