<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Ming_Littlefish
 * @since Ming_Littlefish 1.0
 *
 */
?>

    </div><!-- #main -->
</div><!-- #page -->
<footer id="colophon" >
    <span class="to-top-responsive"><a title="Top"><strong>TOP</strong></a></span>
    <div class="copyright">
        Copyright &copy; 2014-2018 Mingming. All rights reserved. &nbsp; Design by: Mingming <?php bloginfo( 'description' ); ?>
    </div>
</footer>

<!-- JavaScript -->
<script src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/modernizr.custom.js"></script>
<!-- JS Plugins -->
<script src="<?php bloginfo('template_url');?>/js/velocity.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery-html5Validate.js"></script>
<script src="<?php bloginfo('template_url');?>/js/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/main.js"></script>

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

<?php parse_str($_SERVER['QUERY_STRING'], $get);
//    if ( $get['post_type'] == 'gallery'  ||  $get['gallery'] || $get['post_type'] == 'about'  ||  $get['about'] ) {}  else {
//    if (is_home() || is_front_page()) {

    if ( $get['post_type'] == 'about' ) {
?>
    <script type="text/javascript">
        jQuery(window).load(function() {
            var mm_sound = $(".ming-little-fish");
            setTimeout(function(){
                mm_sound.append('<img class="littlefish" src="http://7sbrl2.com1.z0.glb.clouddn.com/ani-mm-sound.gif" /><audio id="mm_audio" autoplay="autoplay" controls="controls" hidden="hidden"><source src="http://7sbrl2.com1.z0.glb.clouddn.com/mm-welcome-sound.ogg" type="audio/ogg"><source src="http://7sbrl2.com1.z0.glb.clouddn.com/mm-welcome-sound.mp3" type="audio/mpeg"><source src="http://7sbrl2.com1.z0.glb.clouddn.com/mm-welcome-sound.wav" type="audio/wav"></audio>');
                mm_sound.addClass("rotateY360");
                $(".nav-trigger").append('<img class="littlefish-3" src="http://7sbrl2.com1.z0.glb.clouddn.com/ani-mm-sound.gif" />');
            },5000);
            setTimeout(function(){
                mm_sound.removeClass("rotateY360");
                $(".littlefish, .littlefish-3, #mm_audio").remove();
            },10000);
        });
    </script>

<?php } ?>
<?php //}} ?>

<?php wp_footer(); ?>
</body>
</html>