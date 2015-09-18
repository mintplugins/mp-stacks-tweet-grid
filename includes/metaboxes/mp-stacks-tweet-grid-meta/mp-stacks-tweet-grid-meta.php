<?php
/**
 * This page contains functions for modifying the metabox for embed_tweets as a media type
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    MP Stacks Tweet Grid
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2015, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Add Embed Tweets as a Media Type to the dropdown
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @param    array $args See link for description.
 * @return   void
 */
function mp_stacks_tweet_grid_create_meta_box(){	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_stacks_tweet_grid_add_meta_box = array(
		'metabox_id' => 'mp_stacks_tweet_grid_metabox', 
		'metabox_title' => __( '"Tweet Grid" Content-Type', 'mp_stacks_tweet_grid'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low',
		'metabox_content_via_ajax' => true,
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_stacks_tweet_grid_items_array = array(
		array(
			'field_id'			=> 'embed_tweets_per_row',
			'field_title' 	=> __( 'Tweets Per Row', 'mp_stacks_tweet_grid'),
			'field_description' 	=> 'How many tweets do you want from left to right before a new row starts?',
			'field_type' 	=> 'number',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'embed_tweet_description',
			'field_title' 	=> __( '<br />Add Your Tweets Below', 'mp_stacks_tweet_grid'),
			'field_description' 	=> '<br />Open up the following areas to add/remove new tweets.' ,
			'field_type' 	=> 'basictext',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'embed_tweet_code',
			'field_title' 	=> __( 'Tweet Code', 'mp_stacks_tweet_grid'),
			'field_description' 	=> 'Enter the embed code for this tweet.',
			'field_type' 	=> 'textarea',
			'field_value' => '',
			'field_repeater' => 'mp_embed_tweets_repeater'
		),
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_stacks_tweet_grid_add_meta_box = has_filter('mp_stacks_tweet_grid_meta_box_array') ? apply_filters( 'mp_stacks_tweet_grid_meta_box_array', $mp_stacks_tweet_grid_add_meta_box) : $mp_stacks_tweet_grid_add_meta_box;
	
	//Globalize the and populate mp_stacks_features_items_array (do this before filter hooks are run)
	global $global_mp_stacks_tweet_grid_items_array;
	$global_mp_stacks_tweet_grid_items_array = $mp_stacks_tweet_grid_items_array;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_stacks_tweet_grid_items_array = has_filter('mp_stacks_tweet_grid_items_array') ? apply_filters( 'mp_stacks_tweet_grid_items_array', $mp_stacks_tweet_grid_items_array) : $mp_stacks_tweet_grid_items_array;
	
	
	/**
	 * Create Metabox class
	 */
	global $mp_stacks_tweet_grid_meta_box;
	$mp_stacks_tweet_grid_meta_box = new MP_CORE_Metabox($mp_stacks_tweet_grid_add_meta_box, $mp_stacks_tweet_grid_items_array);
}
add_action('mp_brick_ajax_metabox', 'mp_stacks_tweet_grid_create_meta_box');
add_action('wp_ajax_mp_stacks_tweet_grid_metabox_content', 'mp_stacks_tweet_grid_create_meta_box');