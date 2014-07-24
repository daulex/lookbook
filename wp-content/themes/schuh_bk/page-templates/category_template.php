<?php
/**
 * Template Name: Show Category Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?><?php $color=ot_get_option( 'content_page_header_color');?>
<section class="inner_content">
    <div class="page_inner">
        <div class="product_box_first" style="background-color:<?php echo get_post_meta(8,'heels_color',true); ?>">
            <a href="<?php echo get_permalink(8);?>">Heels</a>
        </div>
        <div class="product_box_second" style="background-color:<?php echo get_post_meta(10,'boots_color',true); ?>">
            <a href="<?php echo get_permalink(10);?>">Boots</a>
        </div>
        <div class="product_box_third" style="background-color:<?php echo get_post_meta(12,'flats_color',true); ?>">
            <a href="<?php echo get_permalink(12);?>">Flats</a>
        </div>
        <div class="product_box_fourth" style="background-color:<?php echo get_post_meta(14,'sports_color',true); ?>">
            <a href="<?php echo get_permalink(14);?>">Sports</a>
        </div> 
    </div>
</section>
<?php get_footer();
