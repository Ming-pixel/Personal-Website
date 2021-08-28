<?php
/**
 * Template Name:Other
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish
 */
get_header(); ?>

    <div>
        <?php
        if ( have_posts() )
        {
            while ( have_posts() )
            {
                the_post();
                get_template_part( 'format/other' );
            }
        }
        else  {
            get_template_part( 'format/content', 'none' );
        }
        ?>
    </div>


    <script type="text/javascript">
        $(function(){
            $('#gallery_top_include ').append('<h2 class="top-post-title"><?php the_title(); ?></h2><p><?php the_time('Y年n月d日') ?></p>');
        });
    </script>

<?php get_footer(); ?>