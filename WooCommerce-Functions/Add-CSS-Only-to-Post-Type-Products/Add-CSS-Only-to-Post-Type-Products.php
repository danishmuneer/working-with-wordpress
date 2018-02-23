<?php 
/*^^^ You might have to remove this php tag before adding this code to your theme's functions.php file */
// Add custom CSS to post_type = product
function product_page_styles() {
global $post;
if (isset($post)&&$post->post_type=='product') { ?>
   <style type="text/css">
   .gform_footer.top_label{display: none;} /* This is where you can put any CSS you want to execute only for post type 'products' */
   </style>
<?php } 
}
add_action( 'wp_head', 'product_page_styles' );
