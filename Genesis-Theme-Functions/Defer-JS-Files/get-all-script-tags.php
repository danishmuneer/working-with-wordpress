<?php

function detect_enqueued_scripts() {
  global $wp_scripts;
  echo "<div style='display:none;'>Handles: ";
  foreach( $wp_scripts->queue as $handle ) {
   echo $handle . ', ';
  }
  echo "</div>";
}

add_action( 'wp_print_scripts', 'detect_enqueued_scripts' );
