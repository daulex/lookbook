<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();?><?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- Demo CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/slider/flexslider.css" type="text/css" media="screen" />

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/meanmenu.css">
    <link href="<?php echo get_template_directory_uri();?>/css/base.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri();?>/css/right.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/uniform.default.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery-ui.css">


     <script src="<?php echo get_template_directory_uri();?>/js/slider/modernizr.js"></script>
	  <script src="<?php echo get_template_directory_uri();?>/js/vendor/jquery-1.11.0.min.js"></script>

     <script src="<?php echo get_template_directory_uri();?>/js/slider/jquery.cycle2.js"></script>
     <script src="<?php echo get_template_directory_uri();?>/js/slider/jquery.cycle2.carousel.js"></script>
     <script>jQuery.fn.cycle.defaults.autoSelector = '.slideshow';</script>
	 
	 
	 <script src="<?php echo get_template_directory_uri();?>/js/jquery.validate.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<?php 

//echo get_page_template();
if(is_page_template('page-templates/category_template.php')) { 
	$header_color=ot_get_option( 'content_page_header_color');  } 
elseif(is_page_template('page-templates/product_list_template.php')) 
	{$header_color=ot_get_option( 'listing_page_color'); }
elseif(is_single()){
$header_color='';//get_post_meta($post->ID,'color_picker',true);
//$header_color=ot_get_option( 'detail_page_color'); 
}
else{
$header_color=ot_get_option( 'detail_page_color'); 
}
//echo $header_color;
//echo get_page_template();
//$color=ot_get_option( 'color_in_frontend'); ?>
<body <?php body_class($header_color); ?>>
  	<div class="body_wrapper">
        <div class="container"><?php $color=ot_get_option( 'content_page_header_color'); ?>
			<header id="masthead" class="site-header header" role="banner">
				<div class="logo">
                  <a href="<?php echo home_url();?>"><img id="my_logo_image" src="<?php if($header_color=='light')echo ot_get_option( 'logo_light'); else echo ot_get_option('logo_dark'); ?>" alt="LOGO"/></a>
                </div>
	 			<div class="menu">
					<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav>

				</div>

				<div class="callback">
	                <a href="" class="callback_form">
	                    <span class="arrow"></span>Call-in Form<span class="no"><?php if(isset($_SESSION['sku'])) echo count($_SESSION['sku']); else echo '0';?></span>
	                </a>         
	            </div>
			</header><!-- #masthead -->
			<div class="message" style="display:none">
				Items added to the form.
			</div>
		<script>
jQuery('.fieldset_one').on('DOMNodeInserted', function(e) {
$().ready(function() {
	// validate the comment form when it is submitted
	$("#no_id").validate();
});
});
	</script>
			<div class="callback_box">
                <form action="<?php echo home_url();?>/form-handler" class="cmxform" method="POST" id="no_id">
					<div class="fieldset_one">
						<?php 
						if($_SESSION['sku']){ ?>
						<div class="collection">
							   <div class="callback_inner">
						<?php foreach($_SESSION['sku'] as $my_var)
						{?>  
						<div class="list_<?php echo $my_var;?>">
						<div class="item_box">
						 <div class="item_pic">
						 <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo wp_get_attachment_url( get_post_thumbnail_id($my_var) );?>&amp;w=200&h=200&amp;zc=1&a=tl"/>			</div>			 						
						<div class="item_content">
							
						<h2><?php echo get_the_title($my_var);?></h2>
					<?php echo '<h3>£'.get_post_meta($my_var,'price_in_pound',true).'/ $'.get_post_meta($my_var,'price_in_dollar',true).'</h3>';
						?>


						<div class="radio_button border">
							<input type="hidden" name="the_id" value="<?php echo $my_var;?>">
						<label>Image</label>
						<input type="radio" name="myimage_<?php echo $my_var;?>" value="image" class="images">
						<label>Sample</label>
						<input type="radio" name="myimage_<?php echo $my_var;?>" value="sample" class="newsletter">
						</div>
						 <div class="radio_button">
						 <fieldset id="newsletter_topics_<?php echo $my_var;?>">
						 <label>Pair</label>
						        <input type="radio" class="topic_marketflash" value="pair" name="pair_<?php echo $my_var;?>" />
						<label>Single</label>
						        <input type="radio" class="topic_fuzz" value="single" name="pair_<?php echo $my_var;?>" />
						</fieldset>
						 </div>
						<a href='#' onclick = "delete_this(<?php echo $my_var;?>)" class="click_link">X</a>

						
						</div>
					</div></div>
						<?php
						} ?>
					</div>
				</div>


					    <div class="contact">
                        <div class="form_content">
                            <h1>Call-in form</h1>
                                <div class="contact_box_inner">
                                    <div class="contact_left">
                                        <input type="text" placeholder="First Name" name="firstname" required>
                                        <input type="text" placeholder="Last Name" name="lastname" required>
                                        <input type="text" placeholder="Publication Name" name="publication">
                                        <input type="text" placeholder="Phone number" name="phone" required>
                                        <input type="email" placeholder="Your mail" name="email" required>
                                        
                                    </div>
                                    <div class="contact_right">
                                        <p><span>Issue date</span><input type="text" id="datepicker" name="issue_date" required></p>
                                        <p><span>When is the product required?</span><input type="text" id="datepicker1"  name="required_date" required></p>
                                        <textarea name="my_comment" id="" ></textarea>
                                        
                                    </div>
                                </div>
                               <div class="border"><span class="form_border "></span></div>
                                <div class="call_button">
                          <input type="submit" class="request" name="submit" value="Request"/><br/>
                                    <a href="tel:02074455589" class="call">Or Call the Press Office: 020 7445 5589</a>
                                </div>
                        </div>
                        
                    </div><a href="#" class="closebox"></a>
                  <!--    <input type="submit" name="submit" value="submit"> -->
					<?php 
//var_dump($_SESSION['sku']);
					}

					else {
					  echo '<div class="empty">There are no items in your list</div>';
					}

					?></div>
					
					</form>
		        </div>
		        <div class="contact_box">
                   <div class="contact_inside_first">
                      <h2><?php echo get_post_meta(16,'address_1', true);?></h2>
                      <p><?php echo get_post_meta(16,'email_1', true);?></p>
                      <p><?php echo get_post_meta(16,'phone_1', true);?></p>
                    </div>
                    <div class="contact_inside_second">
                       <h2><?php echo get_post_meta(16,'address_2', true);?></h2>
                       <p><?php echo get_post_meta(16,'email_2', true);?></p>
                       <p><?php echo get_post_meta(16,'phone_2', true);?></p>
                    </div>
                    <div class="contact_inside_third">
                       <h2><?php echo get_post_meta(16,'address_3', true);?></h2>
                       <p><?php echo get_post_meta(16,'email_3', true);?></p>
                       <p><?php echo get_post_meta(16,'phone_3', true);?></p>

                    </div>
                    <div class="contact_inside_fourth">
                       <h2><?php echo get_post_meta(16,'address_4', true);?></h2>
                       <p><?php echo get_post_meta(16,'email_4', true);?></p>
                       <p><?php echo get_post_meta(16,'phone_4', true);?></p>
                    </div>
                    <div class="contact_inside_last">
                       <h2></h2>
                       <ul class="social">
                          <li><a href="<?php echo get_post_meta(16,'twitter_link', true);?>" target="_blank" class="twitter"></a></li>
                          <li><a href="<?php echo get_post_meta(16,'instagram_link', true);?>" target="_blank" class="instagram"></a></li>
                      </ul>
                    </div>
                    <a href="" class="slide_up">vcvv</a>
                </div>


		<div id="main" class="site-main">
			<script>
				function delete_this(image_id)
				{ 
					jQuery.ajax({
					           type: "POST",
					           url: "<?php echo get_template_directory_uri();?>/page-templates/load2.php",
					           data: {'delete_session':image_id},
							   error: function(xhr, status, error) {
								},
					           success: function(result){
					            var obj = jQuery.parseJSON(result);
					            console.log(obj[0]);
					            jQuery('.list_'+image_id).remove();
					            if(obj[1]==0){
								jQuery(".fieldset_one").fadeIn().html('');
					            }
					           	   //jQuery(".fieldset1").fadeIn().html(obj[0]);
					               jQuery(".no").html(obj[1]);
					           },
					}); 
				}

			jQuery('body').on("click",".images",function(){
				 console.log('show clicked');
			var my_id=jQuery(this).closest(".radio_button").find("input[type=hidden]").val();
			//alert(my_id);
			jQuery(this).closest(".item_content").find("#newsletter_topics_"+my_id).find("span").removeClass("checked");
			jQuery(this).closest(".item_content").find("#newsletter_topics_"+my_id).attr("disabled","disabled");
			jQuery(this).closest(".item_content").find(".radio_button fieldset").css("color","gray");
			});

			jQuery('body').on("click",".newsletter",function(){
					var my_id=jQuery(this).closest(".radio_button").find("input[type=hidden]").val();
			jQuery(this).closest(".item_content").find(".radio_button fieldset").removeAttr("style");
			jQuery(this).closest(".item_content").find("#newsletter_topics_"+my_id).removeAttr("disabled");
			
			});

</script>
<script>
jQuery('.fieldset_one').on('DOMNodeInserted', function(e) {
            jQuery(function() {
                jQuery( "#datepicker" ).datepicker({
                    showOn: "button",
                    buttonImage: "<?php echo get_template_directory_uri();?>/images/calendar.gif",
                    buttonImageOnly: true
                });
                jQuery( "#datepicker1" ).datepicker({
                    showOn: "button",
                    buttonImage: "<?php echo get_template_directory_uri();?>/images/calendar.gif",
                    buttonImageOnly: true
                });
			 jQuery('input[type="radio"]').uniform();
            });
			    jQuery(function() {
  //Run this script only for IE
  if (navigator.appName === "Microsoft Internet Explorer") {
    jQuery("input[type=text]").each(function() {
      var p;
     // Run this script only for input field with placeholder attribute
      if (p = jQuery(this).attr('placeholder')) {
      // Input field's value attribute gets the placeholder value.
        jQuery(this).val(p);
        jQuery(this).css('color', 'gray');
        // On selecting the field, if value is the same as placeholder, it should become blank
        jQuery(this).focus(function() {
          if (p === jQuery(this).val()) {
            return jQuery(this).val('');
          }
        });
         // On exiting field, if value is blank, it should be assigned the value of placeholder
        jQuery(this).blur(function() {
          if (jQuery(this).val() === '') {
            return jQuery(this).val(p);
          }
        });
      }

    });
}
});
			});
        </script>