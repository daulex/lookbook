<?php
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
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/animate.css">


     <script src="<?php echo get_template_directory_uri();?>/js/slider/modernizr.js"></script>
     <script src="<?php echo get_template_directory_uri();?>/js/vendor/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/slider/jquery.flexslider.js"></script>

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
$header_color=get_post_meta($post->ID,'color_picker',true);
//$header_color=ot_get_option( 'detail_page_color'); 
}
else{
$header_color=ot_get_option( 'detail_page_color'); 
}
//echo $header_color;
//echo get_page_template();
//$color=ot_get_option( 'color_in_frontend'); 
if(is_page_template( 'page-templates/product_list_template.php' ))
{
	$my_page=get_the_ID();
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
}

?>
<body <?php body_class($header_color); ?> <?php if(is_page_template( 'page-templates/product_list_template.php' )) { echo 'bgcolor="'.get_post_meta($my_page,$color,true).'"';/*echo "background-color:'".get_post_meta($my_page,$color,true)."'";*/ } ?> >

	<?php session_start();?>
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
	                    <span class="arrow"></span>Call-in Form<span class="no"><?php if(isset($_SESSION)) echo count($_SESSION); else echo '0';?></span>
	                </a>         
	            </div>
			</header><!-- #masthead -->
			<div class="message" style="display:none">
				Items added to the form.
			</div>
			<script>
jQuery('.fieldset_one').on('DOMNodeInserted', function(e) {
jQuery().ready(function() {
	// validate the comment form when it is submitted
	jQuery("#no_id").validate();
});
});
	</script>
			<div class="callback_box">
                <form action="<?php echo home_url();?>/form-handler" class="cmxform" method="POST" id="no_id">
					<div class="fieldset_one">
						<?php 
						if($_SESSION){ ?>
						<div class="collection">
							   <div class="callback_inner">
						<?php $i=0; foreach($_SESSION as $my_session)
						{$my_var=$my_session['id']; $i++;
						?>  
						<div class="list_<?php echo $my_var;?>">
						<div class="item_box">
						 <div class="item_pic">
						 	<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $my_session['src'];?>&amp;w=200&h=200&amp;zc=1&a=tl"/>
						</div>
						
						<div class="item_content">
							
						<h2><?php echo get_the_title($my_var);?></h2>
					<?php echo '<h3>$'.get_post_meta($my_var,'price_in_dollar',true).'/'.'£'.get_post_meta($my_var,'price_in_pound',true).$my_session['id'].'</h3>';
						?>
						<div class="radio_button border">
						<input type="hidden" name="the_id" value="<?php echo $i;?>">
						<label>Image</label>
						<input type="radio" name="myimage_<?php echo $i;?>" value="image" class="images">
						<label>Sample</label>
						<input type="radio" name="myimage_<?php echo $i;?>" value="sample" class="newsletter">
						</div>
						 <div class="radio_button">
						 <fieldset id="newsletter_topics_<?php echo $i;?>">
						 <label>Pair</label>
						        <input type="radio" class="topic_marketflash" value="pair" name="pair_<?php echo $i;?>" />
						<label>Single</label>
						        <input type="radio" class="topic_fuzz" value="single" name="pair_<?php echo $i;?>" />
						</fieldset>
						 </div>
						<a href='#' onclick = "delete_this(<?php echo $i;?>)" class="click_link">X</a>

						
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
                                      <input type="text"  placeholder="First name" name="firstname" id="firstname"  onfocus="hidethis(this)">
                                        <input type="text" placeholder="Last Name" name="lastname" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Publication Name" name="publication" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Phone number" name="phone" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Your mail" name="email" onfocus="hidethis(this)">
                                        
                                    </div>
                                    <div class="contact_right">
                                        <p><span>Issue date</span><input type="text" id="datepicker" name="issue_date" onfocus="hidethis(this)"></p>
                                        <p><span>When is the product required?</span><input type="text" id="datepicker1" name="required_date" onfocus="hidethis(this)"></p>
                                        <textarea name="my_comment" id="" ></textarea>
                                        
                                    </div>
                                </div>
                               <div class="border"><span class="form_border "></span></div>
                                <div class="call_button">
                                	<input type="submit" class="request" name="submit" value="Request"/>
                         <br/>
                                    <a href="tel:<?php echo ot_get_option('phone_number');?>" class="call">Or Call the Press Office: <?php echo ot_get_option('phone_number');?></a>
                                </div>
                        </div>
                        
                    </div><a href="#" class="closebox"></a>
                  <!--    <input type="submit" name="submit" value="submit"> -->
					<?php 
//var_dump($_SESSION['views']);
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
                      <p><a href="mailto:<?php echo get_post_meta(16,'email_1', true);?>"><?php echo get_post_meta(16,'email_1', true);?></a></p>
                      <p><?php echo get_post_meta(16,'phone_1', true);?></p>
                    </div>
                    <div class="contact_inside_second">
                       <h2><?php echo get_post_meta(16,'address_2', true);?></h2>
                       <p><a href="mailto:<?php echo get_post_meta(16,'email_2', true);?>"><?php echo get_post_meta(16,'email_2', true);?></a></p>
                       <p><?php echo get_post_meta(16,'phone_2', true);?></p>
                    </div>
                    <div class="contact_inside_third">
                       <h2><?php echo get_post_meta(16,'address_3', true);?></h2>
                       <p><a href="mailto:<?php echo get_post_meta(16,'email_3', true);?>"><?php echo get_post_meta(16,'email_3', true);?></a></p>
                       <p><?php echo get_post_meta(16,'phone_3', true);?></p>

                    </div>
                    <div class="contact_inside_fourth">
                       <h2><?php echo get_post_meta(16,'address_4', true);?></h2>
                       <p><a href="mailto:<?php echo get_post_meta(16,'email_4', true);?>"><?php echo get_post_meta(16,'email_4', true);?></a></p>
                       <p><?php echo get_post_meta(16,'phone_4', true);?></p>
                    </div>
                    <div class="contact_inside_last">
                       <h2></h2>
                       <ul class="social">
                          <li><a href="" class="twitter"></a></li>
                          <li><a href="" class="instagram"></a></li>
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
								jQuery(".fieldset_one").fadeIn().html('<div class="empty">nothing man</div>');
					            }
					           	   //jQuery(".fieldset1").fadeIn().html(obj[0]);
					               jQuery(".no").html(obj[1]);

					           },
					}); 
				}
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


jQuery('#no_id').submit(function(event){
var checkstatus=0;
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
if((jQuery("input[name=firstname]").val()=='')||(jQuery("input[name=firstname]").val()=="First name")){

	jQuery("input[name=firstname]").addClass('active');
	//jQuery(".fn").show();
checkstatus=1;
}

if((jQuery("input[name=lastname]").val()=='')||(jQuery("input[name=lastname]").val()=="Last Name")){
	jQuery("input[name=lastname]").addClass('active');checkstatus=1;}

if((jQuery("input[name=publication]").val()=='')||(jQuery("input[name=publication]").val()=="Publication Name"))
	{jQuery("input[name=publication]").addClass('active');checkstatus=1;}

if((jQuery("input[name=phone]").val()=='')||(jQuery("input[name=phone]").val()=="Phone number"))
	{jQuery("input[name=phone]").addClass('active');checkstatus=1;}

if((jQuery("input[name=email]").val()=='')||(jQuery("input[name=email]").val()=="Your mail")||(!emailReg.test( jQuery("input[name=email]").val())))
	{ 
		jQuery("input[name=email]").addClass('active');checkstatus=1;}

if(jQuery("input[name=issue_date]").val()=='')
	{jQuery("input[name=issue_date]").addClass('active');checkstatus=1;}

if(jQuery("input[name=required_date]").val()=='')
	{jQuery("input[name=required_date]").addClass('active');checkstatus=1;}
if(checkstatus != 0)
{
	event.preventDefault();
	return false;
}

});

function hidethis(x)
{
	//x.style.background="yellow";
	jQuery(x).removeClass('active');
	//x.removeClass('active');
//jQuery("."+my).hide();

}
</script>
<style>
input.active[type="text"]{border:2px solid red !important;}
</style>
