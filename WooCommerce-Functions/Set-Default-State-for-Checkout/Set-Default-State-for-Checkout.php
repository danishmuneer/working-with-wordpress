<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
// set default state for checkout as FL
function change_default_checkout_state() {
  return 'FL'; // state code
}
add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );
