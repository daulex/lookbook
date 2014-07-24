<?php

/*
	Plugin Name: WP_Query Powered Adjacent Post Link
	Plugin URI: http://techstudio.co/wordpress/plugins/wp-query-powered-adjacent-post-link
	Description: A plugin for developers, WP_Query Powered Adjacent Post Link gives developers previous and next post buttons based on WP_Query arguments.
	Version: 1.0.0
	Author: Ryan Burnette
	Author URI: http://ryanburnette.com
	License: GPL2
*/

global $wpqpapl_upgrade_happened;

// Plugin Version
$wpqpapl_version = '1.0.0';
$wpqpapl_version_last_load = get_option('wpqpapl_version');
if ( $wpqpapl_version != $wpqpapl_version_last_load )
	$wpqpapl_upgrade_happened = TRUE;

// Make sure environment meets plugin requirements
include('functions/requirements.php');

// Where the magic happens
function wpqpapl($post_id=FALSE,$args=FALSE,$adj=FALSE,$return=FALSE) {

	// If variables are missing, return wpqpapl:Error:1
	if ( !$post_id || !$args || !$adj )
		return "wpqpapl:Error:1";

	// If $return variable is not understood, return wpqpapl:Error:2
	$return_options = array("ID", "title", "slug", "permalink");
	if ( $return && !in_array($return,$return_options) )
		return "wpqpapl:Error:2";

	// WP_Query
	$wpqpapl = new WP_Query($args);

	// Loop through the posts
	$i = 1;
	if ( $wpqpapl->have_posts() ) {
		while( $wpqpapl->have_posts() ) {
			$wpqpapl->next_post();

			if ( !$found ) {
				// First post
				if ( $i == 1 ) {
					$first = $wpqpapl->post;
					$previous = FALSE;
				}
				// Put previous post into variable
				elseif ( $i == 2 ) {
					$previous = $first;
					$next_previous = $wpqpapl->post;
				}
				elseif ( $i > 2 ) {
					$previous = $next_previous;
					$next_previous = $wpqpapl->post;
				}
			}

			// Put next post into variable
			if ( $i == 1 ) {
				$next = FALSE;
			}
			elseif ( $i > 1 ) {
				$next = $wpqpapl->post;
			}

			// Finalize when current post ID is found
			if ( $found )
				break;
			if ( $wpqpapl->post->ID == $post_id ) {
				$found = TRUE;
			}

			$i++;

		}
	}
	else {
		return "wpqpapl:Error:3";
	}

	if ( $found ) {
		switch ( $adj ) {
			case "previous" :
				return wpqpapl_post_part($return,$previous);
			case "next" :
				return wpqpapl_post_part($return,$next);
		}
	}
	// Never found post ID, return error
	else {
		return "wpqpapl:Error:4";
	}

}

// Returns either a part or the whole post variable
// No error checking because it should have already been checked
function wpqpapl_post_part($return,$post) {
	switch ( $return ) {
		case "ID" :
			return $post->ID;
		case "title" :
			return $post->post_title;
		case "slug" :
			return $post->post_name;
		case "permalink" :
			return get_permalink($post->ID);
	}
	// No cases matched, return the whole post object
	return $post;
}

// Set Version
add_option('wpqpapl_version',$wpqpapl_version);