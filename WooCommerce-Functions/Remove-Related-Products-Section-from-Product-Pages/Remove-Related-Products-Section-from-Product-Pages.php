<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
// remove related product for woocommerce 3.0.5
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
