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
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/main.css">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<?php 

if(ot_get_option( 'image_or_background')=='image')
{
        $color='';
	$background=ot_get_option('image_upload'). '';
        $img_cls = ' actImg';
}
elseif(ot_get_option( 'image_or_background')=='color_option'){
        $background='';
        $color=ot_get_option( 'color_in_frontend');
        $img_cls = '';
}
elseif(ot_get_option( 'image_or_background')=='image'){

}
$color_scheme_theme = ot_get_option( 'color_in_frontend');
$mainbgcolor = ot_get_option( 'color_pickup');

//echo $color.'hey'; ?>

<body <?php body_class($color_scheme_theme.$img_cls); ?> <?php echo $img_cls; if(ot_get_option( 'image_or_background')=='image'){ ?> style="background-image:url(<?php echo $background;?>)" width="100%" height="100%;" <?php } else { ?> bgcolor="<?php echo $mainbgcolor; ?>" <?php } ?>>