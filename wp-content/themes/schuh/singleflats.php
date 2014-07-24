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
$dark=ot_get_option('logo_dark');
$light=ot_get_option( 'logo_light');
$default=get_post_meta($post->ID,'color_picker',true);

?>
           <script>
  jQuery(document).ready(function() {
   jQuery('.flexslider').flexslider({
    animation: "slide",
	  slideshow:false,
    reverse:true,
    manualControls:"#control_nav img",
       after: function(slider){
       //jQuery('.slider_container').css('background', jQuery('.slider_container .flex-active-slide').css('backgroundColor'));
      var bgAttr =  jQuery('.slider_container .flex-active-slide').attr('databg')
  		jQuery('.slider_container').css('background', bgAttr);

		var divId = jQuery('.slider_container .flex-active-slide>div').attr('id');
    //alert(divId);
    if(divId==null){ divId="<?php echo $default;?>"}
    jQuery('body').removeClass('light');
    jQuery('body').removeClass('dark');
		jQuery('body').addClass(divId);
    if(divId=='light'){
      jQuery('#my_logo_image').attr('src','<?php echo $light;?>');
    }
    else{
      jQuery('#my_logo_image').attr('src','<?php echo $dark;?>');
    }
  
    }
  });
 });
  </script>
  
  <script type="text/javascript">
(function() {
    var sirv = document.createElement('script'); sirv.type = 'text/javascript';
sirv.async = true;
    sirv.src = document.location.protocol.replace('file:', 'http:') +
'//scripts.sirv.com/sirv.js';
    document.getElementsByTagName('script')[0].parentNode.appendChild(sirv);
})();
</script>


<?php $my_query=get_post_meta($post->ID,'logo_list',true);
if($my_query!=null){ ?>

<section class="product_page">
  <div class="product_detail slider clearfix">
             <div class="slider_container clearfix">
               
                <div class="flexslider">
                    <div class="product_header">
                    <h1><?php the_title();?></h1>
                    <h2>£ <?php echo get_post_meta($post->ID,'price_in_dollar',true);?>/   € <?php echo get_post_meta($post->ID,'price_in_pound',true);?></h2>
                  </div>
                   <div id="nav_dir">
                    <?php
					$link_360=get_post_meta($post->ID,'360_image_link',true);
					$image= get_post_meta($post->ID,'360_image',true); 
					
					$feat=wp_get_attachment_url( $image );
					
                $post_type=get_post_type($post->ID);
                   $my_post=get_post($post->ID);
					$menu_order_link=$my_post->menu_order;
					//echo $menu_order_link;
                   $next_menu=$my_post->menu_order+1;
                   $previous_menu=$my_post->menu_order-1;
                  $all=get_posts(array('post_type'=>$post_type));
                 // echo $next_menu;
                 // echo $previous_menu;

                   $next_args=array(
                    'post_type'=>$post_type,
                    'menu_order'=>$next_menu,
                    'post_status'=>'publish'
                    );
                   $prev_args=array(
                    'post_type'=>$post_type,
                    'menu_order'=>$previous_menu,
                    'post_status'=>'publish'
                    );

                   $next_post=get_posts($next_args);
                   $prev_post=get_posts($prev_args);
                   //var_dump($next_post);
                   //var_dump($prev_post);die;
                   
                   $next=get_post_permalink($next_post[0]->ID);
                    $previous=get_post_permalink($prev_post[0]->ID);
                    
                   // echo $next.'<br/>';
                    //echo $previous;

                    $count_post= wp_count_posts( $post_type);
                    $total=$count_post->publish;?>

                <span class="right_dir">
                  <?php if($menu_order_link!=$total) {?>
                  <a rel="prev" href="<?php echo $next;?>"><span class="left"></span></a>
                   <?php } ?>
                 <?php  //next_post_link('%link','<span class="right"></span>');?></span>
                 <?php if($previous_menu!=0) { ?>
                   <a rel="next" href="<?php echo $previous;?>"><span class="right"></span></a>
                   <?php } ?>
                   <?php //previous_post_link('%link','<span class="left"></span>'); ?>
                  </div>
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
              $header_color=$my_que['header_backend'];
             // var_dump($header_color);die;
            ?>            
          <li style="<?php echo $background;?>" databg="<?php echo $my_que["color_picker"];?>">
            <div class="slide_img" id="<?php echo $header_color;?>"><img src="<?php echo $my_que['logos_items'];?>"/></div>
           </li>
<?php } ?>
<?php if($link_360!='') { ?>
<li style="background-color:<?php echo get_post_meta($post->ID, '360_background_color',true);?>" databg="<?php echo get_post_meta($post->ID, '360_background_color',true);?>">
				<div class="slide_img" id="<?php echo get_post_meta($post->ID,'color_picker',true);?>"><div class="Sirv" data-effect="spin"
data-src="<?php echo get_post_meta($post->ID,'360_image_link',true);?>"></div></div>
				</li><?php } ?>
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
						  <?php if($link_360!='') { ?>
						 <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $feat; ?>&amp;w=294&h=250&amp;zc=1&a=tl"/><?php } ?>
						<?php foreach($my_query as $query2) {?>
						<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $query2['logos_items']; ?>&amp;w=294&h=250&amp;zc=1&a=tl"/>
						<?php } ?>

                        </div>
                        <?php if(count($my_query)>=3) {?>
                        <div class="center">
                            <a href="#" id="prev3"><< Prev </a>
                            <a href="#" id="next3"> Next >> </a>
                        </div>
					<?php } ?>
                        
                    </div><!-- end of thumb_slider-->

                     <div class="cart deskstop">
                  <a href="#" onclick="call_to_add(<?php echo $post->ID;?>)" class="add">Add to call-in</a>
                  <a href="tel:<?php echo ot_get_option('phone_number');?>">Call the Press Office:<?php echo ot_get_option('phone_number');?></a>
              </div>
     
     <div class="cart mob">
                  <a href="#" onclick="call_to_add(<?php echo $post->ID;?>)" class="add"><span></span>Add to call-in</a>
                  <a href="tel:02074455589" class="call_mob"><span></span>Phone schuh</a>
              </div>
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

