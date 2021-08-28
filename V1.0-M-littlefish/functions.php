<?php
/**
 * Ming_Littlefish functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 */
/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * Twenty Thirteen setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Ming_Littlefish 1.0
 */
function ming_littlefish_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'Ming_Littlefish' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'Ming_Littlefish', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */

//	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'Ming_Littlefish' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'ming_littlefish_setup' );

/**
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Ming_Littlefish 1.0
 *
 */
//function twentythirteen_fonts_url() {
//	$fonts_url = '';
//
//	/* Translators: If there are characters in your language that are not
//	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
//	 * into your own language.
//	 */
//	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'Ming_Littlefish' );
//
//	/* Translators: If there are characters in your language that are not
//	 * supported by Bitter, translate this to 'off'. Do not translate into your
//	 * own language.
//	 */
//	$bitter = _x( 'on', 'Bitter font: on or off', 'Ming_Littlefish' );
//
//	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
//		$font_families = array();
//
//		if ( 'off' !== $source_sans_pro )
//			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';
//
//		if ( 'off' !== $bitter )
//			$font_families[] = 'Bitter:400,700';
//
//		$query_args = array(
//			'family' => urlencode( implode( '|', $font_families ) ),
//			'subset' => urlencode( 'latin,latin-ext' ),
//		);
//		$fonts_url = add_query_arg( $query_args, "" );
//	}
//
//	return $fonts_url;
//}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Ming_Littlefish 1.0
 */
//function twentythirteen_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
//		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
//	if ( is_active_sidebar( 'sidebar-1' ) )
//		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
//	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2014-03-18', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
//	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
//	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
//	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
//	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
//	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
//}
//add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Ming_Littlefish 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function ming_littlefish_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'Ming_Littlefish' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'ming_littlefish_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Ming_Littlefish 1.0
 */
function ming_littlefish_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'Ming_Littlefish' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'Ming_Littlefish' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'Ming_Littlefish' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'Ming_Littlefish' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ming_littlefish_widgets_init' );

if ( ! function_exists( 'ming_littlefish_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Ming-Littlefish 1.0
 */
function ming_littlefish_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
    <!-- Page Preview -->
    <div class="preview">
        <?php if ( get_previous_posts_link() ) : ?>
            <div class="page-previous"><?php previous_posts_link( __( '<i class="ti-angle-left"></i><span>PREVIOUS</span>', 'Ming_Littlefish' ) ); ?></div>
        <?php endif; ?>
        <?php if ( get_next_posts_link() ) : ?>
            <div class="page-next"><?php next_posts_link( __( '<i class="ti-angle-right"></i><span>NEXT</span>', 'Ming_Littlefish' ) ); ?></div>
        <?php endif; ?>
    </div>
    <!-- Page Preview -->

	<?php
}
endif;

if ( ! function_exists( 'ming_littlefish_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Ming_Littlefish 1.0
*/
function ming_littlefish_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
    <!-- Post Preview -->
    <div class="preview">
        <div class="page-previous"><?php previous_post_link( '%link', _x( '<i class="ti-angle-left"></i><strong>PREVIOUS</strong><span class="preview-title">%title</span>', '', 'Ming_Littlefish' ) ); ?></div>
        <div class="page-next"><?php next_post_link( '%link', _x( '<i class="ti-angle-right"></i><strong>NEXT</strong><span class="preview-title">%title</span>', '','Ming_Littlefish' ) ); ?></div>
    </div>
    <!-- Post Preview -->
	<?php
}
endif;

if ( ! function_exists( 'ming_littlefish_tag_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own ming_littlefish_tag_meta() to override in a child theme.
 *
 * @since Ming_Littlefish 1.0
 */
function ming_littlefish_tag_meta() {

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'Ming_Littlefish' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

}
endif;


if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Ming_Littlefish 1.0
 */
function twentythirteen_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Ming_Littlefish 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Ming_Littlefish 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Ming_Littlefish 1.0
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Ming_Littlefish 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Ming_Littlefish 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );


/**
 * COMMENTS
 *
 * @since Ming_Littlefish 1.0
 */

if ( ! function_exists( 'ming_littlefish_comment' ) ) :
    function ming_littlefish_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php _e( 'Pingback:', 'Ming_Littlefish' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'Ming_Littlefish' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
        <?php else : ?>
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <div class="comment-meta">
                    <div class="comment-author vcard">
                        <img class="littlefish" src="<?php bloginfo('template_url');?>/img/littlefish.png">
                        <?php // if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 60 ); ?>
                        <?php printf( __( '%s', 'Ming_Littlefish' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </div>
                    <div class="comment-metadata">
                        <a class="comment-datetime" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <i class="ti-time"></i>
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'Ming_Littlefish' ), get_comment_date(), get_comment_time() ); ?>
                            </time>
                        </a>
                        <?php edit_comment_link( __( '<i class="ti-pencil"></i> Edit', 'Ming_Littlefish' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'Ming_Littlefish' ); ?></p>
                    <?php endif; ?>
                </div>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>
			<span class="reply btn">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'reply_text' => '<i class="ti-ink-pen"></i> Reply' ,'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</span>
            </article>
        <?php
        endif;
    }
endif;



/**
 * Add Works Post Type
 *
 * @since Ming_Littlefish 1.0
 */
add_action('init', 'cptui_register_my_cpt_works');
function cptui_register_my_cpt_works() {
    register_post_type('works', array(
        'post_type' => 'works',
        'label' => 'works',
        'description' => 'Ming Littlefish Works',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'works', 'with_front' => true),
        'query_var' => true,
        'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
        'labels' => array (
            'name' => 'works',
            'singular_name' => 'works',
            'menu_name' => 'works',
            'add_new' => 'Add works',
            'add_new_item' => 'Add New works',
            'edit' => 'Edit',
            'edit_item' => 'Edit works',
            'new_item' => 'New works',
            'view' => 'View works',
            'view_item' => 'View works',
            'search_items' => 'Search works',
            'not_found' => 'No works Found',
            'not_found_in_trash' => 'No works Found in Trash',
            'parent' => 'Parent works',
        )
    ) );
}


/**
 * Add Gallery Post Type
 *
 * @since Ming_Littlefish 1.0
 */
add_action( 'init', 'gallery_events' );
function gallery_events() {
    $labels = array(
        'name' => _x('Gallery', 'post type general name'),
        'singular_name' => _x('Gallery', 'post type singular name'),
        'add_new' => _x('Add New', 'Gallery'),
        'add_new_item' => __('Add New Gallery'),
        'edit_item' => __('Edit Gallery'),
        'new_item' => __('New Gallery'),
        'view_item' => __('View Gallery'),
        'search_items' => __('Search Gallery'),
        'not_found' =>  __('No Gallery found'),
        'not_found_in_trash' => __('No Gallery found in Trash'),
        'parent_item_colon' => ''
    );

    $supports = array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats');

    register_post_type( 'gallery',
        array(
            'labels' => $labels,
            'public' => true,
            'supports' => $supports
        )
    );
}


/**
 * Add About Post Type
 *
 * @since Ming_Littlefish 1.0
 */
add_action( 'init', 'about_events' );
function about_events() {
    $labels = array(
        'name' => _x('About', 'post type general name'),
        'singular_name' => _x('About', 'post type singular name'),
        'add_new' => _x('Add New', 'About'),
        'add_new_item' => __('Add New About'),
        'edit_item' => __('Edit About'),
        'new_item' => __('New About'),
        'view_item' => __('View About'),
        'search_items' => __('Search About'),
        'not_found' =>  __('No About found'),
        'not_found_in_trash' => __('No About found in Trash'),
        'parent_item_colon' => ''
    );

    $supports = array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats');

    register_post_type( 'About',
        array(
            'labels' => $labels,
            'public' => true,
            'supports' => $supports
        )
    );
}

/**
 * Search Filter
 *
 * @since Ming_Littlefish 1.0
 */
function SearchFilter($query) {
    if ($query->is_search) {
        // Insert the specific post type you want to search
        $query->set('post_type', 'post');
    }
    return $query;
}
// This filter will jump into the loop and arrange our results before they're returned
add_filter('pre_get_posts','SearchFilter');

function hls_set_query() {
    $query  = attribute_escape(get_search_query());
    if(strlen($query) > 0){
        echo '

      <script type="text/javascript">

        var hls_query  = "'.$query.'";

      </script>

    ';
    }
}




/**
 * Set Featured Image from URL
 *
 * @since Ming_Littlefish 1.0
 */
function url_is_image( $url ) {
    if ( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {
        return FALSE;
    }
    $ext = array( 'jpeg', 'jpg', 'gif', 'png' );
    $info = (array) pathinfo( parse_url( $url, PHP_URL_PATH ) );
    return isset( $info['extension'] )
    && in_array( strtolower( $info['extension'] ), $ext, TRUE );
}

add_filter( 'admin_post_thumbnail_html', 'thumbnail_url_field' );

add_action( 'save_post', 'thumbnail_url_field_save', 10, 2 );

add_filter( 'post_thumbnail_html', 'thumbnail_external_replace', 10, PHP_INT_MAX );

function thumbnail_url_field( $html ) {
    global $post;
    $value = get_post_meta( $post->ID, '_thumbnail_ext_url', TRUE ) ? : "";
    $nonce = wp_create_nonce( 'thumbnail_ext_url_' . $post->ID . get_current_blog_id() );
    $html .= '<input type="hidden" name="thumbnail_ext_url_nonce" value="'
        . esc_attr( $nonce ) . '">';
    $html .= '<div><p>' . __('Or', 'txtdomain') . '</p>';
    $html .= '<p>' . __( 'Enter the url for external image', 'txtdomain' ) . '</p>';
    $html .= '<p><input type="url" name="thumbnail_ext_url" value="' . $value . '"></p>';
    if ( ! empty($value) && url_is_image( $value ) ) {
        $html .= '<p><img style="max-width:150px;height:auto;" src="'
            . esc_url($value) . '"></p>';
        $html .= '<p>' . __( 'Leave url blank to remove.', 'txtdomain' ) . '</p>';
    }
    $html .= '</div>';
    return $html;
}

function thumbnail_url_field_save( $pid, $post ) {
$cap = $post->post_type === 'page' ? 'edit_page' : 'edit_post';
  if (
      ! current_user_can( $cap, $pid )
      || ! post_type_supports( $post->post_type, 'thumbnail' )
      || defined( 'DOING_AUTOSAVE' )
  ) {
      return;
  }
  $action = 'thumbnail_ext_url_' . $pid . get_current_blog_id();
  $nonce = filter_input( INPUT_POST, 'thumbnail_ext_url_nonce', FILTER_SANITIZE_STRING );
  $url = filter_input( INPUT_POST,  'thumbnail_ext_url', FILTER_VALIDATE_URL );
  if (
      empty( $nonce )
      || ! wp_verify_nonce( $nonce, $action )
      || ( ! empty( $url ) && ! url_is_image( $url ) )
  ) {
      return;
  }
  if ( ! empty( $url ) ) {
      update_post_meta( $pid, '_thumbnail_ext_url', esc_url($url) );
      if ( ! get_post_meta( $pid, '_thumbnail_id', TRUE ) ) {
          update_post_meta( $pid, '_thumbnail_id', 'by_url' );
      }
  } elseif ( get_post_meta( $pid, '_thumbnail_ext_url', TRUE ) ) {
      delete_post_meta( $pid, '_thumbnail_ext_url' );
      if ( get_post_meta( $pid, '_thumbnail_id', TRUE ) === 'by_url' ) {
          delete_post_meta( $pid, '_thumbnail_id' );
      }
  }
}

function thumbnail_external_replace( $html, $post_id ) {
    $url =  get_post_meta( $post_id, '_thumbnail_ext_url', TRUE );
    if ( empty( $url ) || ! url_is_image( $url ) ) {
        return $html;
    }
    $alt = get_post_field( 'post_title', $post_id ) . ' ' .  __( 'thumbnail', 'txtdomain' );
    $attr = array( 'alt' => $alt );
    $attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, NULL );
    $attr = array_map( 'esc_attr', $attr );
    $html = sprintf( '<img src="%s"', esc_url($url) );
    foreach ( $attr as $name => $value ) {
        $html .= " $name=" . '"' . $value . '"';
    }
    $html .= ' />';
    return $html;
}




/**
 * Plugin Name: Another Simple Contact Form
 * Description: A Plugin to generate simple contact form
 *
 * @since Ming_Littlefish 1.0
 *
 */
function contact_enqueue() {

    //Enqueue jQuery if not already loaded
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'contactjs', get_template_directory_uri().'/js/contact.js', array('jquery') );

    $localize = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    );
    wp_localize_script('contactjs', 'contact_massages', $localize);
}
add_action( 'wp_enqueue_scripts', 'contact_enqueue' );

function contact_ajax_simple_contact_form() {

    if ( isset( $_POST['contact_nonce'] ) && wp_verify_nonce( $_POST['contact_nonce'], 'contact_html' ) ) {
        $name = sanitize_text_field($_POST['message_name']);
        $email = sanitize_email($_POST['message_email']);
        $subject = sanitize_text_field($_POST['message_subject']);
        $message = wp_kses_data($_POST['message_text']);

        $headers[] = 'From: ' .  $name . " sent a massage from my Website " . ' <' . $email . '>' . "\r\n";
        $headers[] = 'Content-type: text/html' . "\r\n"; //Enables HTML ContentType. Remove it for Plain Text Messages
        $to = get_option( 'admin_email' );

        //function to generate response
        function my_contact_form_generate_response($type, $message){
            global $contact_tips;
            if($type == "success") {
                $contact_tips = "<div class='success'>{$message}</div>";
            } else {
                $contact_tips = "<div class='error'>{$message}</div>";
            }
            $contact_tips = $message;
        }

        //response messages
        $missing_name = "Please enter your name.";
        $missing_subject = "Please enter subject.";
        $missing_massage = "Please enter massage.";
        //$missing_content = "Please supply all information.";
        $email_invalid   = "Email Address Invalid.";
        $message_unsent  = "Message was not sent. Try Again.";
        $message_sent    = "Thanks! Your message has been sent.";


        //$hasError = false;
        //Check to make sure that the name field is not empty
        if (empty($name))
        {
            $hasError = true;
            my_contact_form_generate_response("error", $missing_name);
        }

        //Check to make sure that the subject field is not empty
        if (empty($subject))
        {
            $hasError = true;
            my_contact_form_generate_response("error", $missing_subject);
        }

        //Check to make sure sure that a valid email address is submitted
        if (empty($subject))
        {
            $hasError = true;
            my_contact_form_generate_response("error", $email_invalid);
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hasError = true;
            my_contact_form_generate_response("error", $email_invalid);
        } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\\.[A-Z]{2,4}$", trim($email))) {
            $hasError = true;
            my_contact_form_generate_response("error", $email_invalid);
        }

        //Check to make sure message were entered
        if (empty($message))
        {
            $hasError = true;
            my_contact_form_generate_response("error", $missing_massage);
        }

        if ($hasError != true) {
            //If there is no error, send the email
            $sent = wp_mail($to, $subject, strip_tags($message), $headers);
            if($sent) {
                my_contact_form_generate_response("success", $message_sent);
            } //message sent!
            else {
                my_contact_form_generate_response("error", $message_unsent);
            }//message wasn't sent
        }

//        $send_mail = mail($to, $subject, strip_tags($message), $headers);
//
//        if(!$send_mail)
//        {
//            //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
//            $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
//            die($output);
//        }else{
//            $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$name .' Thank you for your email'));
//            die($output);
//        }

    }
    die(); // Important
}
add_action( 'wp_ajax_simple_contact_form', 'contact_ajax_simple_contact_form' );
add_action( 'wp_ajax_nopriv_simple_contact_form', 'contact_ajax_simple_contact_form' );

function contact_html() { ?>
    <div class="contact-mm">
        <div id="respond">
            <form id="contact_main_form" autocomplete="off">
                <p>
                    <label for="message_name">Name: <span>*</span></label>
                    <input type="text" name="message_name" id="message_name" required />
                </p>
                <p>
                    <label for="message_email">Email: <span>*</span></label>
                    <input type="email" name="message_email" id="message_email" required />
                </p>
                <p>
                    <label for="message_subject">Subject:</label>
                    <input type="text" name="message_subject" id="message_subject" required />
                </p>
                <p>
                    <label for="message_text">Message: <span>*</span></label>
                    <textarea  name="message_text" id="message_text" required></textarea>
                </p>
                <p>
                    <input name="action" type="hidden" value="simple_contact_form" required />
                    <?php wp_nonce_field( 'contact_html', 'contact_nonce' ); ?>
                    <input type="submit" id="message_submit" name="message_submit"  value="Send Message"/>
                    <span class="contact_loading"> <em class="bounce1"></em> <em class="bounce2"></em> <em class="bounce3"></em> </span>
                    <?php
                        global $contact_tips;
                        echo $contact_tips;
                    ?>
                    <span class="formmessage"></span>
                </p>
            </form>
        </div>
    </div><!-- #primary -->
          <!-- .entry-contact -->
<?php }