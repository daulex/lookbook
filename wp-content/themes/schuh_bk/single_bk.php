<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); 
if(!$_SESSION['views'])
	{$_SESSION['views']=array();}

?>
<?php

/*if(isset($_POST['id']))
{
      add_to_function($_POST['product']);
}

function add_to_function($var)
{
	if(!in_array($var,$_SESSION['views']))
array_push($_SESSION['views'],$var);

}*/ ?>
	<!-- <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" width="400px" height="400px"/> -->


<?php
$feat_image=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$url_arr = explode ('/', $feat_image);
$ct = count($url_arr);
$name = $url_arr[$ct-1];
$name_div = explode('.', $name);
$ct_dot = count($name_div);
$img_type = $name_div[$ct_dot -1];
$img_name=$name_div[0];
$separate_name=explode('-',$img_name);
$ct_dot1 = count($separate_name);
$separate_name[$ct_dot1-1]='{col}';
$needed=implode($separate_name,'-');
$my_var=$needed.'.'.$img_type;

?>
<section class="slider">
   <div class="product_header">
      <h1><?php the_title();?></h1>
      <h2>£ <?php echo get_post_meta($post->ID,'price_in_dollar',true);?>/   € <?php echo get_post_meta($post->ID,'price_in_pound',true);?></h2>
    </div>
        <div class="flexslider">
          <ul class="slides">
          <li data-thumb="<?php echo $feat_image;?>"><a class="Magic360" href="<?php echo $feat_image;?>" rel="filename:<?php echo $my_var;?>"><img src="<?php echo $feat_image;?>"/></a></li>
          <?php $attachments = new Attachments( 'my_attachments' ); ?>
          <?php if( $attachments->exist() ) : ?>
          <?php while( $attachments->get() ) : ?>
          <li data-thumb="<?php echo $attachments->src( 'full' ); ?>"><a><img src="<?php echo $attachments->src( 'full' ); ?>"/></a></li>
          <?php endwhile; ?>
          <?php endif; ?>
          </ul>
		  <div id="nav_dir">
               <?php previous_post_link('%link','<span class="right"></span>'); ?>
            <?php next_post_link('%link','<span class="left"></span>');?> 
               
              </div>
        </div> 
		
      </section>

  <script defer src="<?php echo get_template_directory_uri();?>/js/slider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    jQuery(function(){
      SyntaxHighlighter.all();
    });
    jQuery(window).load(function(){
      jQuery('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        maxItems:3,
        minItems:3,


        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });
  </script>
<!--<section class="product_detail clearfix">
    <div class="product_header">
      <h1><?php //the_title();?></h1>
      <h2>£ <?php //echo get_post_meta($post->ID,'price_in_dollar',true);?>/   € <?php //echo get_post_meta($post->ID,'price_in_pound',true);?></h2>
    </div>

    <div class="pikachoose clearfix">
        <ul id="pikame" class="jcarousel-skin-pika">
          <li> <a class="Magic360" href="<?php //echo $feat_image;?>" rel="filename:<?php //echo $my_var;?>"><img src="<?php //echo $feat_image;?>"/></a></li>
            <?php //$attachments = new Attachments( 'my_attachments' ); ?>
          <?php //if( $attachments->exist() ) : ?>
          <?php// while( $attachments->get() ) : ?>
          <li><a><img src="<?php //echo $attachments->src( 'full' ); ?>"/></a></li>
          <?php //endwhile; ?>
          <?php //endif; ?>
        </ul>
    </div>
    <div class="cart">
        <a href="" onclick="call_to_add(<?php echo $post->ID;?>)" class="add">Add to call-in</a>
        <a href="tel:02074455589">Call the Press Office: 020 7445 5589</a>
    </div>
</section>-->
<div class="cart">
        <a href="" onclick="call_to_add(<?php echo $post->ID;?>)" class="add">Add to call-in</a>
        <a href="tel:02074455589">Call the Press Office: 020 7445 5589</a>
    </div>
<?php
get_footer(); ?>
<script>
function call_to_add(items){
    jQuery.ajax({
      type: "POST",
      url:"<?php echo get_template_directory_uri();?>/page-templates/add_item_ajax.php",
       data: {'add_session':items},
      success:function(result){
         var obj = jQuery.parseJSON(result);
          jQuery(".fieldset1").fadeIn().html(obj[0]);
       jQuery(".no").html(obj[1]);
       
    },
    complete: function(){ 
   document.location.reload(); 
 }
  });
}
</script>

