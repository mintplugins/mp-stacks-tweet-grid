<?php
/**
 * This file contains the enqueue scripts function for the features plugin
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Embed Tweets
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
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
 * Filter: mp_stacks_embed_tweets_css_location
 */
function mp_stacks_embed_tweets_enqueue_scripts(){
		
	//Enqueue features CSS
	wp_enqueue_style( 'mp_stacks_embed_tweets_css', plugins_url( 'css/embed-tweets.css', dirname( __FILE__ ) ) );

}
 
/**
 * Enqueue css face for social grid
 */
add_action( 'wp_enqueue_scripts', 'mp_stacks_embed_tweets_enqueue_scripts' );

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_embed_tweets_css_location
 */
function mp_stacks_embed_tweets_admin_enqueue_scripts(){
	
	//Enqueue Admin Embed Tweets CSS
	//wp_enqueue_style( 'mp_stacks_embed_tweets_css', plugins_url( 'css/admin-features.css', dirname( __FILE__ ) ) );

}
 
/**
 * Enqueue css face for social grid
 */
add_action( 'admin_enqueue_scripts', 'mp_stacks_embed_tweets_admin_enqueue_scripts' );