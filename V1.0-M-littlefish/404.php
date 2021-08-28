<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
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

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="error-page">
    <a class="to-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>

    <div class="inner">
        <div class="inner-center">

            <header>
                <div class="top-img">
                    <img src="<?php bloginfo('template_url');?>/img/topimg/minglittlefish-404-error.svg" alt="404 ERROR"/>
                </div>

                <div>
                    <p class="text-center">
                        亲，飞船不在这里降落……
                        <!--
                        <?php// _e( '对不起！您找的文章可能已删除! 5秒后为您跳转至首页，请稍候..', 'Ming_Littlefish' ); ?>
                        <? //$lan = substr($HTTP_ACCEPT_LANGUAGE,0,5);print("<meta http-equiv='refresh' content = '5;URL = <?php echo esc_url( home_url( '/' ) ); ?>'>");?>
                        -->
                    </p>
                </div>

                <div class="search-mm">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                        <p>
                            <button class="btn" type="submit"><i class="ti-search"></i></button>
                            <label for="s">Search</label>
                            <input name="s" id="s" type="text" required/>
                        </p>
                    </form>
                </div>
            </header>

            <article>
                <div class="error-back">
                    <a class="btn btn-sky-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>">BLOG</a>
                    <span>OR</span>
                    <a class="btn btn-sky-blue" href="<?php echo esc_url( home_url( '/?post_type=about' ) ); ?>">CONTACT</a>
                </div>

            </article>

        </div>
    </div>

    <footer id="colophon" >
        <div class="copyright">
            &copy; Ming. All rights reserved. &nbsp; Design by: Ming Ming <?php bloginfo( 'description' ); ?>
        </div>
    </footer>
    </div>

    <!-- JavaScript -->
    <script src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/modernizr.custom.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/velocity.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/jquery-html5Validate.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/snap.svg-min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/main.js"></script>

    <?php parse_str($_SERVER['QUERY_STRING'], $get); ?>
    <?php if (  $get['gallery'] ||  $get['about'] ) { ?>
        <script type="text/javascript">
            $(function(){
                $('#gallery_top_include ').append('<h2 class="top-post-title"><?php the_title(); ?></h2><p><?php the_time('Y年n月d日') ?></p>');
            });
        </script>
    <?php } elseif (  $get['post_type'] == 'about' ) { ?>
        <div class="douchebag_safari">
            <input class="js-clear_field" tabindex="-1" name="fakeusernameremembered" type="text" />
            <input class="js-clear_field" tabindex="-1" name="fakepasswordremembered" type="password" />
        </div>
    <input type="text" name="fakeusernameremembered" id="fakeusernameremembered" value="" size="30" class="hide" />
    <input type="password" name="fakepasswordremembered" id="fakepasswordremembered" value="" size="30" class="hide" />
        <script type="text/javascript">
            $(function(){
                <!-- For input Autofill -->
                $('#form').on('submit', function () {
                    "use strict";
                    $('.js-clear_field').attr('disabled', 'disabled');
                });
            });
        </script>
    <?php } ?>

    <?php wp_footer(); ?>
</body>
</html>