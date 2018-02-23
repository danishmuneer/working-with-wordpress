<?php 
/*^^^ Remove this php tag before adding this code to your theme's functions.php file */
//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'dan_custom_footer' );
function dan_custom_footer() {
	?>
	<p>&copy; Copyright 1990-2018 &middot; Danish Muneer</p>
	<?php
}
