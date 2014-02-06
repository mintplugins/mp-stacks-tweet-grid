<?php 
/**
 * This file contains the function which hooks to a brick's content output
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Features
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * This function hooks to the brick output. If it is supposed to be a 'feature', then it will output the embed_tweets
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_brick_content_output_embed_tweets($default_content_output, $mp_stacks_content_type, $post_id){
	
	//If this stack content type is set to be an image	
	if ($mp_stacks_content_type == 'embed_tweets'){
		
		//Set default value for $content_output to NULL
		$content_output = NULL;	
		
		//Get Embed Tweets Metabox Repeater Array
		$embed_tweets_repeaters = get_post_meta($post_id, 'mp_embed_tweets_repeater', true);
		
		//Tweets per row
		$embed_tweets_per_row = get_post_meta($post_id, 'embed_tweets_per_row', true);
		$embed_tweets_per_row = empty( $embed_tweets_per_row ) ? '2' : $embed_tweets_per_row;

		//Tweets Output
		$embed_tweets_output = '<div class="mp-stacks-embed_tweets">';
		
		//Get Tweets CSS Output
		$embed_tweets_output .= '
		<style scoped>
			.mp-stacks-embed-tweet{ 
				width:' . (100/$embed_tweets_per_row) .'%;
			}
			@media screen and (max-width: 600px){
				.mp-stacks-feature{ 
					width:' . '100%;
				}
			}';
			
		$embed_tweets_output .= '</style>';
		
		//Set counter to 0
		$counter = 1;
		
		if ($embed_tweets_repeaters ){
			
			//Loop through each feature
			foreach( $embed_tweets_repeaters as $embed_tweets_repeater ){
							
					$embed_tweets_output .= '<div class="mp-stacks-embed-tweet">';
					
						$embed_tweets_output .= $embed_tweets_repeater['embed_tweet_code'];	
				
					$embed_tweets_output .= '</div>';
					
					if ( $embed_tweets_per_row == $counter ){
						
						//Add clear div to bump a new row
						$embed_tweets_output .= '<div class="mp-stacks-embed_tweets-clearedfix"></div>';
						
						//Reset counter
						$counter = 1;
					}
					else{
						
						//Increment Counter
						$counter = $counter + 1;
						
					}
					
			}
		}
		
		$embed_tweets_output .= '</div>';
		
		//Content output
		$content_output .= $embed_tweets_output;
		
		//Return
		return $content_output;
	}
	else{
		//Return
		return $default_content_output;
	}
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_embed_tweets', 10, 3);