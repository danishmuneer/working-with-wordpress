<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
// this sets default country on the cart page to US
function set_country_befor_cart_page(){
    WC()->customer->set_country('US'); //set country code of default country
    WC()->customer->set_shipping_country('US');
}
add_action('woocommerce_add_to_cart' , 'set_country_befor_cart_page');
