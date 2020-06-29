<?php

/* Remove Canada from checkout if specific products are present in the cart */
function products_not_shipable_in_canada() {
    /* Only on checkout page (allowing customer to change the country in cart shipping calculator) */
    if( ! is_checkout() ) return;

    /* Set your products */
    $products = array(7820,7902);

    /* Get customer country */
    $country = WC()->session->get('customer')['shipping_country'];
    if( empty($country) ){
        $country = WC()->session->get('customer')['billing_country'];
    }
    /* For CANADA */
    if( $country == 'CA' ){
        /* Loop through cart items */
        foreach( WC()->cart->get_cart() as $item ){
            /* IF product is in cart */
            /*if( in_array( $item['data']->get_id(), $products ) ){ */ /* this is good for variation IDs */
			if( in_array( $item['product_id'], $products ) ){ /* this is good for product IDs */
                /* Avoid checkout and display an error notice */
                wc_add_notice( sprintf( 
                    __("The product %s can't be shipped to Canada, sorry.", "woocommerce" ),  
                    '"' . $item['data']->get_name() . '"'
                ), 'error' );
                break; /* Stop the loop */
            }
        }
    }
}
add_action( 'woocommerce_check_cart_items', 'products_not_shipable_in_canada' );
