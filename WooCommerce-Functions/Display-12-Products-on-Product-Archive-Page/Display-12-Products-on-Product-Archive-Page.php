<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
// Display 12 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
