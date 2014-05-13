<?php
/**
 * This file contains the enqueue scripts function for the features plugin
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Tweet Grid
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Enqueue JS and CSS for features 
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_tweet_grid_css_location
 */
function mp_stacks_tweet_grid_enqueue_scripts(){
		
	//Enqueue features CSS
	wp_enqueue_style( 'mp_stacks_tweet_grid_css', plugins_url( 'css/embed-tweets.css', dirname( __FILE__ ) ) );

}
 
/**
 * Enqueue css face for social grid
 */
add_action( 'wp_enqueue_scripts', 'mp_stacks_tweet_grid_enqueue_scripts' );

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_tweet_grid_css_location
 */
function mp_stacks_tweet_grid_admin_enqueue_scripts(){
	
	//Enqueue Admin Embed Tweets CSS
	//wp_enqueue_style( 'mp_stacks_tweet_grid_css', plugins_url( 'css/admin-features.css', dirname( __FILE__ ) ) );

}
 
/**
 * Enqueue css face for social grid
 */
add_action( 'admin_enqueue_scripts', 'mp_stacks_tweet_grid_admin_enqueue_scripts' );

 
/**
 * Allow cross-domain from twitter
 */
 function mp_stacks_tweet_grid_head_meta(){
	echo '<meta name="twitter:widgets:csp" content="on">'; 
 }
 add_action( 'wp-head', 'mp_stacks_tweet_grid_head_meta' );