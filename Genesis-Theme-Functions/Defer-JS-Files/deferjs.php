<?php

// Defer javascript files for better page speed
function dfr_scripts( $tag, $handle ) {
	$defer = array(
		'jquery-migrate',
		'wp-embed'	
  	); /* add more tags here to defer if needed */
    $async = array(
		'hoverIntent'	
  	); /* add more tags here to async if needed */
	if ( in_array( $handle, $defer ) ) {
		  return str_replace(' src', ' defer src', $tag);
  	} elseif ( in_array( $handle, $async ) ) {
      return str_replace(' src', ' async src', $tag);
    } 
    return $tag;
} 
add_filter( 'script_loader_tag', 'dfr_scripts', 10, 2 );
