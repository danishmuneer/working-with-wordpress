<?php
/* remove structured data added by WooCommerce on the product pages */
function structured_data_product_nulled( $markup, $product ){
    if( is_product() ) {
        $markup = '';
    }
    return $markup;
}
add_filter( 'woocommerce_structured_data_product', 'structured_data_product_nulled', 10, 2 );
