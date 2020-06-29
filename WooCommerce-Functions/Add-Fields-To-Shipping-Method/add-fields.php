<?php

// Add custom fields to a specific selected shipping method
add_action( 'woocommerce_after_shipping_rate', 'carrier_custom_fields', 20, 2 );
function carrier_custom_fields( $method, $index ) {
    if( ! is_checkout()) return; // Only on checkout page

    $customer_carrier_method = 'legacy_local_pickup';

    if( $method->id != $customer_carrier_method ) return; // Only display for "local_pickup"

    $chosen_method_id = WC()->session->chosen_shipping_methods[ $index ];

    // If the chosen shipping method is 'legacy_local_pickup' we display
    if($chosen_method_id == $customer_carrier_method ):

    echo '<div class="custom-carrier">';

    woocommerce_form_field( 'carrier_name' , array(
        'type'          => 'text',
        'class'         => array('form-row-wide carrier-name'),
        'label'         => 'Enter Your Carrier Name',
        'required'      => true,
        'placeholder'   => 'Carrier Name',
    ), WC()->checkout->get_value( 'carrier_name' ));

    woocommerce_form_field( 'carrier_number' , array(
        'type'          => 'text',
        'class'         => array('form-row-wide carrier-number'),
        'label'         => 'Enter Your Carrier Account #',
        'required'      => true,
        'placeholder'   => 'Carrier Number',
    ), WC()->checkout->get_value( 'carrier_number' ));

    echo '</div>';
    endif;
}

// Check custom fields validation
add_action('woocommerce_checkout_process', 'carrier_checkout_process');
function carrier_checkout_process() {
    if( isset( $_POST['carrier_name'] ) && empty( $_POST['carrier_name'] ) )
        wc_add_notice( ( "Please don't forget to enter the shipping carrier name." ), "error" );

    if( isset( $_POST['carrier_number'] ) && empty( $_POST['carrier_number'] ) )
        wc_add_notice( ( "Please don't forget to enter the shipping carrier account number." ), "error" );
}

// Save custom fields to order meta data
add_action( 'woocommerce_checkout_update_order_meta', 'carrier_update_order_meta', 30, 1 );
function carrier_update_order_meta( $order_id ) {
    if( isset( $_POST['carrier_name'] ))
        update_post_meta( $order_id, '_carrier_name', sanitize_text_field( $_POST['carrier_name'] ) );

    if( isset( $_POST['carrier_number'] ))
        update_post_meta( $order_id, '_carrier_number', sanitize_text_field( $_POST['carrier_number'] ) );
}

// Front end: orders
add_action( 'woocommerce_order_details_after_order_table', 'display_custom_carrier_field_in_orders', 20, 1 );
// Admin (backend): orders
add_action( 'woocommerce_admin_order_data_after_order_details', 'display_custom_carrier_field_in_orders', 20, 1 );
// Email notifications
add_action( 'woocommerce_email_order_meta', 'display_custom_carrier_field_in_orders', 20, 1 );
function display_custom_carrier_field_in_orders( $order ) {

	$carrier_name   = get_post_meta( $order->get_id(), '_carrier_name', true );
	$carrier_number = get_post_meta( $order->get_id(), '_carrier_number', true );

	if( ! empty( $carrier_name ) )
		echo '<p class="carrier-info"><strong>'.__('Carrier Name').': </strong>'. $carrier_name . '</p>';

	if( ! empty( $carrier_number ) )
		echo '<p class="carrier-info"><strong>'.__('Carrier Number').': </strong>' . $carrier_number . '</p>';
}
