<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */
?>

<header class="page-header">
	<h1 class="page-title">
        <i class="ti-face-sad  text-cc-orange"></i>
        <?php _e( 'Nothing Found', 'Ming_Littlefish' ); ?>
    </h1>
</header>

<div class="page-content nothing-find">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'Ming_Littlefish' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php } elseif ( is_search() ) { ?>

        <div class="search-mm">
            <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                <p>
                    <button class="btn" type="submit"><i class="ti-search"></i></button>
                    <label for="s">Search</label>
                    <input required='' name="s" id="s" type="text" />
                </p>
            </form>
        </div>
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'Ming_Littlefish' ); ?></p>

	<?php } else { ?>

        <div class="search-mm">
            <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                <p>
                    <button class="btn" type="submit"><i class="ti-search"></i></button>
                    <label for="s">Search</label>
                    <input required='' name="s" id="s" type="text" />
                </p>
            </form>
        </div>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'Ming_Littlefish' ); ?></p>

	<?php } ?>
</div><!-- .page-content -->
