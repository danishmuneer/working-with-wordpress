// set default country for checkout as US
function change_default_checkout_country() {
  return 'US'; // country code
}
add_filter( 'default_checkout_billing_country', 'change_default_checkout_country' );
