// This code goes in the functions.php - enqueues the JS file in the footer

function custom_popuptips() {
	wp_enqueue_script('tip-popups', get_stylesheet_directory_uri(). "/tip-popups.js", array('jquery') ,'1.0', true );
}
add_action( 'wp_enqueue_scripts', 'custom_popuptips' );
