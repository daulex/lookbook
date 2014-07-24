<?php

/**

 * The Template for displaying all single posts

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

get_header('test'); 
if(!$_SESSION)
	{$_SESSION=array();}
?>


<?php
$dark=ot_get_option('logo_dark');
$light=ot_get_option( 'logo_light');
$default=get_post_meta($post->ID,'color_picker',true);
$mysku=get_post_meta($post->ID,'sku',true);
$mysrc=wp_get_attachment_url(get_post_meta($post->ID,'360_image',true));
?>

<script>
jQuery(document).ready(function() {
		mainSlider();
});
	function mainSlider() {
		var winWidth = jQuery(window).width();
		if(winWidth<769){
		jQuery('.flexslider').flexslider({
		animation: "slide",
		slideshow:false,
		manualControls:"#mobile #control_nav .img_nav",
   		start: function() {
		//jQuery('.flex-viewport .slides li.360 .slide_img').css('height', jQuery(window).height());
		},
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
					} else {
						jQuery('#my_logo_image').attr('src','<?php echo $dark;?>');
				}
			}
		});
		} else {
		jQuery('.flexslider').flexslider({
		animation: "slide",
		slideshow:false,
		manualControls:"#desktop #control_nav .img_nav",
   		start: function() {
		//jQuery('.flex-viewport .slides li.360 .slide_img').css('height', jQuery(window).height());
		},
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
					} else {
						jQuery('#my_logo_image').attr('src','<?php echo $dark;?>');
				}
			}
		});	
		}
	}
jQuery(window).resize(function() {
	//alert ('ff');
		mainSlider();
});
</script>

<script type="text/javascript">
(function() {
    var sirv = document.createElement('script'); sirv.type = 'text/javascript';
sirv.async = true;
    sirv.src = document.location.protocol.replace('file:', 'http:') +
'//scripts.sirv.com/sirv.js';
    document.getElementsByTagName('script')[0].parentNode.appendChild(sirv);
	//jQuery('.flex-viewport .slides li').css('height', jQuery(window).height());

})();

</script>
<?php $my_query=get_post_meta($post->ID,'logo_list',true);
//var_dump($_SESSION);
if($my_query!=null){ ?>
<section class="product_page">
  <div class="product_detail slider clearfix">
             <div class="slider_container clearfix">
              <div id="box-360" style="background-color:<?php echo get_post_meta($post->ID, '360_background_color',true);?>" databg="<?php echo get_post_meta($post->ID, '360_background_color',true);?>">
                <div id="hide-360"></div>
                <div class="Sirv" id="<?php echo get_post_meta($post->ID,'color_picker',true);?>" data-effect="spin" data-src="<?php echo get_post_meta($post->ID,'360_image_link',true);?>"></div>
              </div>             
                <div class="flexslider">
                    <div class="product_header">
                    <h1><?php the_title();?></h1>
                    <h2>€ <?php echo get_post_meta($post->ID,'price_in_dollar',true);?>/ £   <?php echo get_post_meta($post->ID,'price_in_pound',true);?></h2>
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

          <li class="normalImage" style="<?php echo $background;?>" databg="<?php echo $my_que["color_picker"];?>">


<p style="display:none"><?php echo $my_que['sku'];?></p>
<span style="display:none"><?php echo $my_que['logos_items'];?></span>

            <div class="slide_img" id="<?php echo $header_color;?>" style="background:url(<?php echo $my_que['logos_items'];?>); background-size:auto 100%; background-repeat:no-repeat;background-position:50% bottom;"><!-- <img src="<?php echo $my_que['logos_items'];?>"/> --></div>

           </li>

<?php } ?>



                </ul>

             

                

             

              </div><?php //$feat=wp_get_attachment_url( get_post_thumbnail_id($post->ID));

//$thumb_360 = wp_get_attachment_url(get_post_meta($post->ID,'360_image',true));

//$thumb_360 = 'http://192.168.0.62/schuh/wp-content/uploads/2014/07/admin-ajax.php_.png';
$thumb_360 = 'http://wp.draftserver.com/schuh/wp-content/uploads/2014/07/3601.png';
?>

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

						  <?php if($link_360!='') { ?> <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $thumb_360; ?>&amp;w=294&h=250&amp;zc=1&a=tl"id="toggle-360" class="active"/><?php } ?>

<?php foreach($my_query as $query2) {?>

<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $query2['logos_items']; ?>&amp;w=294&h=250&amp;zc=1&a=tl" class="img_nav"/>

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

                  <a href="tel:<?php echo ot_get_option('phone_number');?>">Call the Press Office: <?php echo ot_get_option('phone_number');?></a>

              </div>

     

     <div class="cart mob">

                  <a href="#" onclick="call_to_add(<?php echo $post->ID;?>)" class="add"><span></span>Add to call-in</a>

                  <a href="tel:<?php echo ot_get_option('phone_number');?>" class="call_mob"><span></span>Phone schuh</a>

              </div>

              </div>

              </div>

 </section>

 <?php }?>



<?php

get_footer(); ?>





<script>

function call_to_add(items){

//alert(mysku+'   '+mysrc);
    jQuery.ajax({
      type: "POST",
      url:"<?php echo get_template_directory_uri();?>/page-templates/add_item_ajax.php",
       data: {'add_session':items},
      success:function(result){
         var obj = jQuery.parseJSON(result);
         //alert(obj[0]);
         if(obj[0]!=null){
         if(obj[1]==1){
          jQuery(".fieldset_one").html(obj[0]);
         }else{
          jQuery(obj[0]).appendTo(".callback_inner");}
		 // alert(obj[1]);
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


  <script>

jQuery(window).ready(function(){
function ColorScheme360() {
  var bgAttr =  jQuery('#box-360').attr('databg')
      jQuery('.slider_container').css('background', bgAttr);

    var divId = jQuery('#light').attr('id');
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

  ColorScheme360();
  });
  
  </script>


<script>
  jQuery(document).ready(function($){

      $("#box-360").bind('oanimationend animationend webkitAnimationEnd', function() { 
         if($(this).hasClass("fadeOutUp")){
          $(this).hide().removeAttr("class");
         }
      });
      $('.cycle-carousel-wrap img').addClass('slideCtrl');
      $('#toggle-360').removeClass('slideCtrl');
function slide360(){
  if($('#toggle-360').hasClass("active")){

          //$("#box-360").addClass('animated fadeOutUp');
          $("#box-360").slideUp();
          $('#toggle-360').removeClass('active');

        }else{
          //$("#box-360").show().addClass('animated fadeInDown');
          $("#box-360").slideDown();
          $('#toggle-360').addClass('active');
        }

}
function slide360_up(){
  if($('#toggle-360').hasClass("active")){

          //$("#box-360").addClass('animated fadeOutUp');
          $("#box-360").slideUp();
          $('#toggle-360').removeClass('active');

        }

}

   $("#toggle-360").on("click", function(e){
        e.preventDefault();
    slide360()

     });

    $(".slideCtrl").on("click", function(e){
        e.preventDefault();
      
        slide360_up()
     
     });





      
     

      // $(".thumb_slider").on("click", function(){
      //   if($("#box-360").is(":visible")){

      //     $("#box-360").addClass('animated fadeOutUp');

      //   }
      // });

      
    });
</script>

    <script>

jQuery(window).ready(function(){
  jQuery('#box-360').click(function(e){
    //alert('djffjfh');
      function ColorScheme360Click() {
        var bgAttr =  jQuery('#box-360').attr('databg')
            jQuery('.slider_container').css('background', bgAttr);

          var divId = jQuery('#light').attr('id');
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

        ColorScheme360Click();
        });
    });
  
  </script>



