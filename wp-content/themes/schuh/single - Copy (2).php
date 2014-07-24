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

        <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/slider/jquery.flexslider.js"></script>
           <script>
  jQuery(document).ready(function() {
   jQuery('.flexslider').flexslider({
    animation: "slide",
    slideshow:false,
    manualControls:"#control_nav img"
  });
 });
  </script>
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

<?php $my_query=get_post_meta($post->ID,'logo_list',true);
if($my_query!=null){ ?>

<section class="product_detail slider clearfix">
 


             <div class="slider_container clearfix">
               
                <div class="flexslider">

                    <ul class="slides">
<?php
            foreach($my_query as $my_que)
            {
              if($my_que['background_type']=='image')
              {
                $background='background:url('.$my_que["background"].') top center no-repeat; width:100%;height:100%';
              }
              else{
              $background='background-color:'.$my_que["color_picker"];
              }
            
            ?>
                      
          <li style="<?php echo $background;?>">
            <div class="product_header">
                    <h1><?php the_title();?></h1>
                    <h2>£ <?php echo get_post_meta($post->ID,'price_in_dollar',true);?>/   € <?php echo get_post_meta($post->ID,'price_in_pound',true);?></h2>
                  </div>
                   <div id="nav_dir">
                   <span class="right_dir"><?php previous_post_link('%link','<span class="right"></span>'); ?></span>
                  <?php next_post_link('%link','<span class="left"></span>');?> 
                   
                  </div>
            <div class="slide_img"><img src="<?php echo $my_que['logos_items'];?>"/></div>
             <div class="cart deskstop">
                  <a href="#" onclick="call_to_add(<?php echo $post->ID;?>)" class="add">Add to call-in</a>
                  <a href="tel:02074455589">Call the Press Office: 020 7445 5589</a>
              </div>
           </li>
<?php } ?>
                </ul>
             
                
             
              </div>
               <div class="thumb_slider">
                      <div class="slideshow vertical" 
                          data-cycle-fx=carousel 
                          data-cycle-timeout=0 
                          data-cycle-next="#next3" 
                          data-cycle-prev="#prev3" 
                          data-cycle-pager="#pager3" 
                          data-cycle-carousel-visible=3
                          data-cycle-carousel-vertical=true 
                          data-allow-wrap=false 
                          id="control_nav">
<?php foreach($my_query as $query2) {?>
<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $query2['logos_items']; ?>&amp;w=147&h=125&amp;zc=1&a=tl"/>
<?php } ?>

                        </div>
                        <div class="center">
                            <a href="#" id="prev3"><< Prev </a>
                            <a href="#" id="next3"> Next >> </a>
                        </div>

                        
                    </div><!-- end of thumb_slider-->
     
     <div class="cart mob">
                  <a href="#" onclick="call_to_add(<?php echo $post->ID;?>)" class="add"><span></span>Add to call-in</a>
                  <a href="tel:02074455589" class="call_mob"><span></span>Phone schuh</a>
              </div>
              </div>
 </section>
 <?php }?>

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
         //alert(obj[2]);
         if(obj[0]!=null){
         if(obj[1]==1){
          jQuery(".fieldset_one").html(obj[0]);
         }else{
          jQuery(obj[0]).appendTo(".callback_inner");}
          jQuery(".no").html(obj[1]); }
           //jQuery(".message").show();
           jQuery(".message").html(obj[2]);
           //jQuery(".message").slideDown();
           setTimeout(function(){jQuery(".message").slideDown(),2500});
          setTimeout(function(){jQuery(".message").slideUp(),2500});
            jQuery(".message").hide();

          
          
    },
  });
}
</script>

