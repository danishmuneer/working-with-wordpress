<?php

/* Filter unwanted meta data from product table in the order emails */
function unset_specific_order_item_meta_data($formatted_meta, $item){
    // Only on emails notifications
    if( is_admin() || is_wc_endpoint_url() )
        return $formatted_meta;

    foreach( $formatted_meta as $key => $meta ){
        if( in_array( $meta->key, array('Qty', 'Total') ) )
            unset($formatted_meta[$key]);
    }
    return $formatted_meta;
}
add_filter( 'woocommerce_order_item_get_formatted_meta_data', 'unset_specific_order_item_meta_data', 10, 2);
