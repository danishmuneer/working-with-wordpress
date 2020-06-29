<?php

/* Place this code in the functions.php file. Do not include the opening PHP tag -
This replaces the "Search" text with a whitespace 
*/
function sp_search_button_text( $text ) {
	return ' ';
}
add_filter( 'genesis_search_button_text', 'sp_search_button_text' );
