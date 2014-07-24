<?php
/**
 * Template Name: Product Listing Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();  $dummy_one=1;?>

<?php $my_page=get_the_ID();
$post_types='';

switch ($my_page) {
    case 8:
       $post_types='heels';
        break;
    case 12:
        $post_types='flats';
        break;
    case 14:
       $post_types='sports';
        break;
    case 10:
       $post_types='boots';
        break;
}
$color=$post_types.'_color';
?>

<?php
wp_reset_query();
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
  'post_type' => $post_types,
  'post_status' => 'publish',
  'posts_per_page' => 23,
  'orderby'=>'menu_order',
  'order'=>'ASC',
  'paged' => $paged,
  );
?>
<?php //$colors=ot_get_option( 'color_in_frontend'); ?>
 <?php //echo get_page_template(); ?>

<section class="product_content">
    <div class="isotope_block" style="background-color:<?php //echo get_post_meta($my_page,$color,true); ?>">


      <div class="product_list_page">

        <div class="item first-child">
                  <div class="item_iner">
        <h1><?php the_title();?></h1>
        </div>
              </div>
      <div class="loading_block" >

          <?php
          query_posts($args);
          if( have_posts() ) {
            while (have_posts()) : the_post();
          $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
          ?>

          <div class="item">
                  <div class="item_iner">
          <a href="<?php the_permalink() ?>"> <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $thumb; ?>&amp;w=200&h=200&amp;zc=1&a=tl"/>
            <span class="hover"><?php the_title();?></span>
          </a>
           </div>
                </div>

        <?php $dummy_one++;?>
              <?php
            endwhile; }?>
          </div>


    <div style="display:none">
            <?php  twentyfourteen_paging_nav();?>
          </div>
          <?php wp_reset_query();  ?>
        </div>
    </div>
</section>
<?php
get_footer();?>
   <script>
    var infinite_scroll = {
        loading: {
            img: "<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif",
            msgText: "<?php _e( '', 'custom' ); ?>",
            finishedMsg: "<?php _e( '', 'custom' ); ?>"
        },
        "nextSelector":".next",
        "navSelector":".navigation",
        "itemSelector":".loading_block .item",
        "contentSelector":".loading_block"
    };
    jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
    </script>