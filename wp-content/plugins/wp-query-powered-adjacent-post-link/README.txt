=== WP_Query Powered Adjacent Post Link ===
Contributors: ryan.burnette
Donate link: http://bit.ly/WPQPAPLdonate
Tags: previous post, next post, previous post link, next post link, WP_Query
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.0.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin for developers, WP_Query Powered Adjacent Post Link gives developers previous and next post buttons based on WP_Query arguments.

== Description ==

WP_Query Powered Adjacent Post Link is a plugin for developers. It adds the function `wpqpapl();` to WordPress which can return information on the previous and next post to the current. It accepts arguments for use in the WP_Query class.

WordPress developers should be familiar with WP_Query to use this plugin.

I created this plugin is because I frequently have situations where my posts are organizied using 'orderby' options other than the default chronological. The WordPress built-in adjacent post link functions do not operate according to this order and there is no option to make them do so. With this plugin theme developers can create previous and next links to posts while passing WP_Query arguments to the plugin. It does the work and passes the information back.

It works simply by creating a WP_Query with your arguments and passing back desired information about a previous or next post such as:

* ID
* Title
* Slug
* Permalink
* Entire Post Object

Performance is not a consideration in this plugin because it assumes that you are using some form of caching. Running many instances of the function in your theme will create additional queries for each use. Without caching this may have an impact on your site's performance.

== Usage ==

`wpqpapl($post_id,$args,$adj,$return);`

**$post_id** Pass the current post ID so the function knows what to check adjacency relative to. (required)

**$args** Pass arguments which will be fed directly into the WP_Query class. Be alert for errors which occur at this step as not all errors are handled by the plugin. (required)

**$adj** Pass either 'previous' or 'next'. You get the idea. (required)

**$return** Pass what you want returned. Pass nothing and the function will return the entire post object for the adjacency you have selected. The string can be any of the following:
- "ID"
- "title"
- "slug"
- "permalink"

The plugin always returns information, so use it in conjunction with `echo();` in your theme.

**Example:**

In this example I gather the permalink to the previous post while specifying arguments for a WP_Query result which matches the desired results.

`$args = array(  
	'post_type' => 'my_custom_post_type',  
	'orderby' => 'menu_order'  
);  
$previous_post_link = wpqpapl($post->ID,$args,'previous','permalink');  
`

== Changelog ==

= 1.0.0 =
* Initial release