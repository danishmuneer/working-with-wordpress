<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
function dan_search_filter( $query ) {
  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 9171,9101 ) ); // The array can contain an unlimited number of post IDs
  }
}
add_action( 'pre_get_posts', 'dan_search_filter' );
