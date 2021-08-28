<?php
/**
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 *
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ming-Littlefish">
    <meta name="keywords" content="Ming-littlefish, UI, UE, UX, Product" />
    <meta name="description" content="" />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <link rel="Ming-littlefish icon" type="image/x-icon" href="<?php bloginfo('template_url');?>/img/ico/ming-littlefish-ico-156x156.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url');?>/img/ico/ming-littlefish-ico-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url');?>/img/ico/ming-littlefish-ico-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url');?>/img/ico/ming-littlefish-ico-144x144.png" />

    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_url');?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="<?php bloginfo('template_url');?>/css/main.css" rel="stylesheet">
    <!-- CSS files for plugins -->
    <link href="<?php bloginfo('template_url');?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url');?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url');?>/css/owl.transitions.css" rel="stylesheet">


    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/for-support-note.css" rel="stylesheet">
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/for-support-note.css" rel="stylesheet">
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/for-support-note.css" rel="stylesheet">
    <![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/for-support-note.css" rel="stylesheet">
    <![endif]-->


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="support-note">
        <p class="support-img"><img src="<?php bloginfo('template_url');?>/img/for-ie9.png"/></p>
        <p class="support-text">抱歉亲，您的浏览器版本过低，无法正常访问该小站，欢迎使用IE10以上的IE浏览器，或者使用Chrome、Firefox访问。</p>
        <p class="support-text align-right">By Ming-小鱼</p>
    </div>


	<div id="page">

        <a href="#" class="nav-trigger"><span class="cd-icon"></span></a>
        <nav id="navbar" class="sidebar-menu">
            <a class="m-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <span class="ming-little-fish">
                    <img class="ming" src="<?php bloginfo('template_url');?>/img/ming.png"/>
                    <img class="littlefish-2" src="<?php bloginfo('template_url');?>/img/littlefish.png"/>
                </span>
                <h1 data-hover="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></h1>
            </a>
            <ul id="site-navigation" role="navigation">
                <?php parse_str($_SERVER['QUERY_STRING'], $get); ?>
                <li>
                    <a <?php if ( $get['post_type'] == 'gallery'  ||  $get['gallery'] || $get['post_type'] == 'about'  ||  $get['about'] ) {}  else { echo "class=\"active\""; } ?> href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <i class="ti-control-play"></i>
                        <span class="txtOriginal">Blog</span>
                        <span class="txtHover">博客</span>
                    </a>
                </li>
                <li>
                    <a <?php if ( $get['post_type'] == 'gallery' ||  $get['gallery'] ) { echo "class=\"active\""; } ?> href="<?php echo esc_url( home_url( '/?post_type=gallery' ) ); ?>">
                        <i class="ti-control-play"></i>
                        <span class="txtOriginal">Gallery</span>
                        <span class="txtHover">画册</span>
                    </a>
                </li>
                <li>
                    <a <?php if ( $get['post_type'] == 'about'   ||  $get['about'] )  { echo "class=\"active\""; } ?> href="<?php echo esc_url( home_url( '/?post_type=about' ) ); ?>">
                        <i class="ti-control-play"></i>
                        <span class="txtOriginal">About</span>
                        <span class="txtHover">关于我</span>
                    </a>
                </li>
                <?php //wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
            </ul><!-- #site-navigation -->
            <span class="to-top"><a title="Top"><strong>TOP</strong></a></span>
        </nav><!-- #navbar -->

        <div class="overlay-nav"><span></span></div> <!-- overlay-nav -->
        <div class="overlay-content"><span></span></div> <!-- overlay-content -->

        <div id="main" class="main-content">

            <div id="bonfire-pageloader">
                <div class="bonfire-pageloader-icon">
                    <div class="loading_mming">
                        <span class="loading_w2"></span>
                        <span class="loading_fish"></span>
                        <span class="loading_w1"></span>
                    </div>
                    <p>游啊游...游啊游...</p>
                </div>
            </div>