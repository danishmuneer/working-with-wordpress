<?php 
/*^^^ Remove this php tag before adding this code to your theme's functions.php file */
// DeQueue the WC cart fragment resource to decrease page load time
function de_script() {
    wp_dequeue_script( 'wc-cart-fragments' );
    return true;
}
add_action( 'wp_print_scripts', 'de_script', 100 );
