<?php

/* Change address fields on checkout page */
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['billing_phone']['label'] = 'Phone Number';
     $fields['billing']['billing_phone']['required'] = true;
	 $fields['billing']['billing_country']['priority'] = 5;
	 $fields['shipping']['shipping_country']['priority'] = 5;
     return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
