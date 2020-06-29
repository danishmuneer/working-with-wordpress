<?php

/* hides "cart based" shipping method if shipping class "heavy items" is present in the cart */
function hide_shipping_method_based_on_shipping_class( $rates, $package )
{
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    // HERE define your shipping class to find
    $class = array(128,208);

	// Get customer country
    $country = WC()->session->get('customer')['shipping_country'];
    if( empty($country) ){
        $country = WC()->session->get('customer')['billing_country'];
    }
	
    // HERE define the shipping method to change rates for
    $method_id1 = 'flat_rate:1';
	if( $country == 'CA' ){
		$method_id1 = 'flat_rate:2';
	}
    $method_id2 = 'cart_based_rate';

    // Checking in cart items
    $found = $other = false;
    foreach( WC()->cart->get_cart() as $cart_item ){
	    $item_shipping_class_id = $cart_item['data']->get_shipping_class_id();
        
        if( in_array( $item_shipping_class_id, $class ) ){
            $found = true;  // Target shipping class found
        } elseif( ! empty($item_shipping_class_id) && ! in_array( $item_shipping_class_id, $class ) ){
	        $other = true;  // Other shipping classes found
        }
    }
    
    if( $found && ! $other ) {
        unset($rates[$method_id2]); // Remove the targeted method
	}
	elseif ( $found && $other ) 
        unset($rates[$method_id2]); // Remove the targeted method
    elseif ( ! $found && $other ) 
        unset($rates[$method_id1]); // Remove the targeted method
    	
    return $rates;
}
add_filter( 'woocommerce_package_rates', 'hide_shipping_method_based_on_shipping_class', 10, 2 );
