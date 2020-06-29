/* add order tracking functionality to order tracking page -
Replace 00000 for $target_postID with the post ID of the WordPress page that contains the html tracking form -
Replace 'xxx' in ID and key with your actual Google API information. This ensures API details are not added to the JS files that are publicly accessible
*/

function order_tracking() {
	$target_postID = 00000;
	global $post;
	if ( $post->ID == $target_postID ) {
		$params = array(
  			'ID' => 'xxx',
  			'key' => 'xxx',
		);
		wp_enqueue_script('ordertracking', get_stylesheet_directory_uri(). "/ordertracking.js", array('jquery') ,'1.0', true );
		wp_localize_script( "ordertracking", "data", $params );
	}
}
add_action( 'wp_enqueue_scripts', 'order_tracking' );
