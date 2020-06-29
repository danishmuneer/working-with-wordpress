<?php

/* Changes "flat rate" shipping method rates if shipping class "Special Items" is present in the cart */
function change_shipping_method_rate_based_on_shipping_class( $rates, $package )
{
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    // HERE define your shipping class to find
    $class = array(208);
	
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

    // Checking in cart items
    $found = false;
	$item_price = $item_qty = 0;
    foreach( WC()->cart->get_cart() as $cart_item ){
	    $item_shipping_class_id = $cart_item['data']->get_shipping_class_id();
		
        
        if( in_array( $item_shipping_class_id, $class ) ){
            $found = true;  // Target shipping class found
			$item_price += $cart_item['data']->get_price(); // Sum line item prices that have target shipping class
			$item_qty += $cart_item['quantity']; // Sum line item prices that have target shipping class
			$item_total = $item_price * $item_qty;
        } 
    }
    
    if( $found ) {
		if( $item_total > 0 && $item_total < 301 ) {
			$rates[$method_id1]->cost = 190;
		}
		elseif ( $item_total > 300 && $item_total < 701) {
			$rates[$method_id1]->cost = 255;
		}
		elseif ( $item_total > 700 && $item_total < 1001) {
			$rates[$method_id1]->cost = 305;
		}
		elseif ( $item_total > 1000 && $item_total < 2001) {
			$rates[$method_id1]->cost = 400;
		}
		elseif ( $item_total > 2000 && $item_total < 4001) {
			$rates[$method_id1]->cost = 430;
		}
		elseif ( $item_total > 4000 ) {
			$rates[$method_id1]->cost = 530;
		}
	}
    return $rates;
}
add_filter( 'woocommerce_package_rates', 'change_shipping_method_rate_based_on_shipping_class', 10, 2 );
