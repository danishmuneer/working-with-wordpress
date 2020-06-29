<?php

/* Remove specific US States from shipping address STATE field */
function custom_us_states( $states ) {
    $non_allowed_us_states = array( 'AK', 'HI', 'AA', 'AE', 'AP'); 

    // Loop through your non allowed us states and remove them
    foreach( $non_allowed_us_states as $state_code ) {
        if( isset($states['US'][$state_code]) )
            unset( $states['US'][$state_code] );
    }
    return $states;
}
add_filter( 'woocommerce_states', 'custom_us_states', 10, 1 );
