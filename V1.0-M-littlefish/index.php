<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 *
 */


get_header(); ?>

    <a id="menu-trigger"><span class="menu-icon"></span><span class="triangle-top-right"></span></a>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

        <?php parse_str($_SERVER['QUERY_STRING'], $get); ?>

        <?php  if ( $get['post_type'] == 'about' ) { ?>

            <?php get_template_part( 'inc/top-include-about' ); ?>

            <div id="content_p3">
                <?php
                    $right_pwd = "mingming_works";
                    $pwd_input = $_POST['about_mm_pwd'];
                    $mm_pwd_submit = $_POST['submit'];

                    function mm_pwd_status($type, $message) {
                        global $pwd_status;
                        if($type == "error") {
                            $pwd_status = "<p class='wrong'>{$message}</p>";
                        } else {
                            $pwd_status = "<p class='successfully'>{$message}</p>";
                        }
                    }

                    $pwd_error = "Password is incorrect, please try again.";
                    $pwd_success = "";

                    if(empty($pwd_input) == false) {
                        if ($pwd_input != $right_pwd) mm_pwd_status("error", $pwd_error);
                    }
                ?>

                <?php if($_POST['about_mm_pwd']==$right_pwd) { ?>

                    <?php get_template_part( 'about-me' ); ?>
                    <div class="about-me-title">
                        <h1>战利品</h1>
                        <p>Works</p>
                    </div>
                    <div class="my_gallery  padding-top-none">
                        <div class="gallery_filter_btn">
                            <a href="#" rel="all" class="active btn btn-tine-blue">All</a>
                            <a href="#" rel="APP" class="btn btn-tine-indigo">APP</a>
                            <a href="#" rel="Web" class="btn btn-tine-text">Web</a>
                            <a href="#" rel="Print" class="btn btn-tine-light-green">Print</a>
                            <a href="#" rel="Infographic" class="btn btn-tine-amber">Infographic</a>
                            <a href="#" rel="Animation" class="btn btn-tine-red">Animation</a>
                            <a href="#" rel="Others" class="btn btn-tine-sky-blue">Others</a>
                        </div>
                        <div class="gallery_content">
                            <ul>
                                <?php
                                if ( have_posts() )
                                {
                                    while ( have_posts() )
                                    {
                                        the_post();
                                        get_template_part( 'format/gallery-list', get_post_format() );
                                    }
                                } else {
                                    get_template_part( 'format/content', 'none' );
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="about-me-title padding-none">
                        <h1>
                            <img class="yinhao" src="<?php bloginfo('template_url');?>/img/profile/mingming-overview.png" alt="ming"/>
                        </h1>
                        <p>了解更多，请输入Password</p>
                    </div>
                    <div class="search-mm" id="about_password">
                        <form name="f1" method="post" action="" autocomplete="off" >
                            <p>
                                <button class="btn" type="submit"><span>GO</span></button>
                                <label for="about_mm_pwd">Password</label>
                                <input value="" name="about_mm_pwd" id="about_mm_pwd" type="password" required/>
                            </p>
                        </form>
                    </div>
                    <?php global $pwd_status; echo $pwd_status;?>
                <?php } ?>

                <div class="about-me-title">
                    <h1>联系我</h1>
                    <p>Contact Me</p>
                </div>
                <div id="contact-carousel" class="owl-carousel">
                    <div class="item content-center">
                        <!--<p><i class="ti-email"></i></p>-->
                        <div class="about-me-end"><img src="<?php bloginfo('template_url');?>/img/profile/ming-littlefish-end.png"/></div>
                        <h3 class="text-h3">Email：<a href="mailto:minglittlefish@qq.com">minglittlefish@qq.com</a></h3>
                        <p><a class="btn btn-sky-blue contact-carousel-custom-next-trigger" href="#">Leave a message</a></p>
                    </div>
                    <div class="item"><?php contact_html(); ?></div>
                    <div class="item content-center">
                        <p><img src="<?php bloginfo('template_url');?>/img/profile/weibo-logo.jpg"/></p>
                        <h3 class="text-h3">微博：Ming_小鱼</h3>
                        <p><a class="btn btn-red" href="http://weibo.com/minglittlefish" target="_blank">关注我</a></p>
                    </div>
                </div>


                <!--<div class="about-me-end"><img src="--><?php //bloginfo('template_url');?><!--/img/profile/ming-littlefish-end.svg"/></div>-->

            </div>

        <?php  } elseif ( $get['post_type'] == 'gallery' ) { ?>
            <?php get_template_part( 'inc/top-include-gallery' ); ?>
            <div id="content_p2">
                <div class="my_gallery_static">
                    <div class="gallery_content">
                        <ul>
                            <?php
                            if ( have_posts() )
                            {
                                while ( have_posts() )
                                {
                                    the_post();
                                    get_template_part( 'format/gallery-list', get_post_format() );
                                }
                            } else {
                                get_template_part( 'format/content', 'none' );
                            }
                            ?>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
            </div>

        <?php } else { ?>

            <?php get_template_part( 'inc/top-include-blog' ); ?>
            <div id="content_p1">
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
        <?php } ?>
        </div>
    </div>


<?php ming_littlefish_paging_nav(); ?>

<?php get_footer(); ?>