<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
// Add specific CSS class by filter
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'custom-css-class-1','custom-css-class-2' ) ); // The array can contain an unlimited number of css classes
} );
