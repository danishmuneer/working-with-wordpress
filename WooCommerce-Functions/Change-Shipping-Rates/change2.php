<?php

/* Changes all available shipping method rates for Canada */
function change_shipping_method_rate_based_on_shipping_class_6( $rates, $package )
{
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;
	
	// Get shipping country
	$customer_shipping_country = $package['destination']['country'];
    
    if( 'CA' == $customer_shipping_country ) {
		foreach($rates as $method => $rate ) {
            if ( $rates[$method] != 'legacy_local_pickup' ) {
                $rates[$method]->cost = $rates[$method]->cost*1.4;
            }
        }
    }    
    return $rates;
}
add_filter( 'woocommerce_package_rates', 'change_shipping_method_rate_based_on_shipping_class_6', 15, 2 );
