<?php 
/*^^^ Remove this php tag before adding this code to your theme's functions.php file
Hides 'ADD TO CART' button if TOTAL<150 and puts up a warning message
Change all occurences of 150 to whatever total you want to enforce as the minimum order value */

function hide_cartbutton( $form ) {
   ?> 
    <script type="text/javascript">

    gform.addFilter( 'gform_product_total', function(total, formId){
        if(total < 150) {
		jQuery(".single_add_to_cart_button").css("display", "none");
			if(document.getElementsByClassName("warning").length == 0) {
				jQuery( "<h3 class='warning'>We can only process orders above $150/-</h3>" ).insertAfter( ".single_add_to_cart_button" );
			}
		}
		else {
		jQuery(".single_add_to_cart_button").css("display", "");
		jQuery(".warning").remove();
		}
        return total;
    } );
    
</script>
<?php
return $form;
}
add_action( 'gform_enqueue_scripts_263', 'hide_cartbutton', 10, 2 ); 

/* Replace 263 with your gravity form number. If you want this code to run on all forms, just use 'gform_enqueue_scripts' */
