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
 * Allow cross-domain from twitter
 */
 function mp_stacks_tweet_grid_head_meta(){
	echo '<meta name="twitter:widgets:csp" content="on">'; 
 }
 add_action( 'wp_head', 'mp_stacks_tweet_grid_head_meta' );