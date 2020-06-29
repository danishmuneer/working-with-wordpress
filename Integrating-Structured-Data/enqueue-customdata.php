<?php

/* add JSON-LD schema to all product pages-
replace ID and key with your Google API credentials
*/
function custom_jsonschema() {
	global $post;
	if ( is_singular('product') && ! is_user_logged_in() ) {
		$params = array(
  			'ID' => 'xxx',
  			'key' => 'yyy',
			'prodID' => $post->ID,
			'prodTitle' => $post->post_title,
			'prodURL' => get_permalink($post->ID),
		);
		wp_enqueue_script('custommicrodata', get_stylesheet_directory_uri(). "/custommicrodata.js", array('jquery') ,'1.0', true );
		wp_localize_script( "custommicrodata", "data", $params );
	}
}
add_action( 'wp_enqueue_scripts', 'custom_jsonschema' );
