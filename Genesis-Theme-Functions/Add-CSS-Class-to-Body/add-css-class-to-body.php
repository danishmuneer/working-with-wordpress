// Add specific CSS class by filter
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'custom-css-class-1','custom-css-class-2' ) );
} );
