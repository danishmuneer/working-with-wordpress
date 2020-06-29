<?php

/* change background color of headings in failed order emails */
function change_heading_bgclr_failed_order( $css, $email ) { 
   if ( $email->id == 'failed_order' ) {
      $css .= '#template_header { background-color: red !important; }';
   }
   return $css;
}
add_filter( 'woocommerce_email_styles', 'change_heading_bgclr_failed_order', 9999, 2 );
