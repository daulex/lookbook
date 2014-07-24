<?php
/**
 * Template Name: Landing Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header('landing'); ?>
<?php $color=ot_get_option( 'color_in_frontend'); ?>
  <div class="body_wrapper">
            <section class="home_content">
                <div class="container">
                    <div class="home_inner">
                        <img src="<?php if($color=='light')echo ot_get_option( 'landing_image_light'); else echo ot_get_option('landing_page_image_dark'); ?>" alt=""/>
                        <h2>LOOKBOOK</h2>
                        <h3><?php echo ot_get_option('seasonal_text');?></h3>
                        <a href="<?php echo get_permalink(38);?>">ENTER</a>
                    </div>
                </div>
            </section>
        </div>
<?php
get_footer('landing');?>
<script>
    var winHeight=jQuery(window).height();
    jQuery('.home_content').css('height',winHeight);
    jQuery(function(){
    jQuery(window).resize(function(){
        var h = jQuery(window).height();
        jQuery('.home_content').css('height',h);
        
        
    });
});
</script>
