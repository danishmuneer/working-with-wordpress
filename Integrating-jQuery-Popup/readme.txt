#### Please read this before proceeding further

Integrating jQuery-Confirm popups on a WordPress website. Plugin documentation: https://github.com/craftpip/jquery-confirm or http://craftpip.github.io/jquery-confirm/

Using CDN approach to add jQuery-Confirm to WordPress. The links to plugin files can be added directly to footer.php before the ending </body> tag:

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

You can also host the files on your local server. Just change the 'href' or 'src' to your local link

jQuery-Confirm popups require Bootstrap (and jQuery). WordPress comes with latest stable version of jQuery so you don't need to add it again. The style.css included here has all the necessary style codes if you don't want to add Bootstrap to your website. If your WordPress website already has Bootstrap, you don't need the style.css. You might still need to adjust the CSS.

The tip-popups.js file contains a few different examples of how you can use jQuery-Confirm on WordPress. If you are using WooCommerce, note that you cannot use jQuery-Confirm on the checkout page. This is because JavaScript is disabled on checkout page.

The 'popup-tips.js' file must be placed in your theme folder where functions.php, style.css etc. files are present. 
