<?php 
/*^^^ Remove this php tag before adding this code to your theme's functions.php file */
// Configure quantity input value be '1'
add_filter( 'gform_field_value_default_quantity', 'dan_set_default_quantity' );
function dan_set_default_quantity() {
    return 1; // change this number to whatever you want the default quantity to be
}
