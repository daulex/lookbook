<?php session_start();?><?php
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
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/slider/demo.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/slider/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/meanmenu.css">
    <link href="<?php echo get_template_directory_uri();?>/css/base.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri();?>/css/right.css" rel="stylesheet" type="text/css" />
	 <script src="<?php echo get_template_directory_uri();?>/js/slider/modernizr.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<?php

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
?>
<?php $color=ot_get_option( 'color_in_frontend'); ?>
<body <?php body_class($header_color); ?>>
  	<div class="body_wrapper">
        <div class="container">
			<header id="masthead" class="site-header header" role="banner">
				<div class="logo">
                  <a href="<?php echo home_url();?>"><img src="<?php if($header_color=='light')echo ot_get_option( 'logo_light'); else echo ot_get_option('logo_dark'); ?>" alt="LOGO"/></a>
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

			<div class="callback_box">
                <form action="" class="cmxform" method="POST" id="no_id">
					<div class="fieldset1">
						<?php
						$my_counter=1;
						if($_SESSION['sku']){
						foreach($_SESSION['sku'] as $my_var)
						{?>
							<div class="get_child">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($my_var) )?>" width="100px" height="100px"/>
						<?php echo get_the_title($my_var);

						echo '$'.get_post_meta($my_var,'price_in_dollar',true).'/';
						echo '£'.get_post_meta($my_var,'price_in_pound',true);
						?>
						<input type="radio" name="mytype_<?php echo $my_counter;?>" value="image" class="images">Image<br/>
						<input type="radio" name="mytype_<?php echo $my_counter;?>" value="sample" class="newsletter">Sample
						<a href='javascript:void(0);' onclick="return delete_this(<?php echo $my_var;?>)">Delete</a>

						<fieldset id="newsletter_topics">
						        <input type="radio" class="topic_marketflash" value="marketflash" name="topic1_<?php echo $my_counter;?>" />
						        Pair
						        <input type="radio" class="topic_fuzz" value="fuzz" name="topic_<?php echo $my_counter;?>" />
						        Single
						</fieldset>
					</div>
						<?php
						$my_counter++;
						} ?>


					<input type="text" id="firstname" name="firstname" placeholder="First name"><br/>
					<input type="text" name="lastname" placeholder="Last name" required><br/>
					<input type="text" name="publication" placeholder="Publication name" required><br/>
					<input type="text" name="phone" placeholder="Phone number" required><br/>
					<input type="email" name="email" placeholder="Your email" required><br/>
					<input type="text" name="issue_date" >
					<input type="text" name="required_date" >

					<input type="textarea" name="comment" >

					<input type="submit" value="Submit">
					<?php
//var_dump($_SESSION['sku']);
					}

					else {
					  echo 'There are no items in your list';
					}

					?></div>
					</form>
		        </div>
		<div id="main" class="site-main">

			<script>
				function delete_this(image_id)
				{ 
					if (confirm('Are you sure you want to remove this product?') == false) {
						return false;
					}
					
					jQuery.ajax({
						type: "POST",
						url: "<?php echo get_template_directory_uri();?>/page-templates/load2.php",
						data: {'delete_session':image_id},
						error: function(xhr, status, error) {
						
						},
						success: function(result){
					  	$('.list_' + image_id).fadeOut(200, function() { $(this).remove(); });
					  }
					}); 
				}

			jQuery('.images').click(function(){
			//jQuery(this).parent().find("#newsletter_topics").hide();
			jQuery(this).parent().find("#newsletter_topics").attr("disabled","disabled");
			});

			jQuery('.newsletter').click(function(){
			//jQuery(this).parent().find("#newsletter_topics").hide();
			jQuery(this).parent().find("#newsletter_topics").removeAttr("disabled");
			});

</script>