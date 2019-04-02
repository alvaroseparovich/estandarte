<?php

/* styles  */
function featured_news_enqueue_child_styles() {
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'magazine-7-style';

    $fonts_url = 'https://fonts.googleapis.com/css?family=EB+Garamond|Fira+Sans+Condensed';
    wp_enqueue_style('featured-news-google-fonts', $fonts_url, array(), null);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style(
        'featured-news',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'bootstrap', $parent_style ),
        wp_get_theme()->get('Version') );


}
add_action( 'wp_enqueue_scripts', 'featured_news_enqueue_child_styles' );


require get_stylesheet_directory().'/widgets-and-sidebars/index.php';

require get_stylesheet_directory().'/woocommerce-functions/index.php';

require get_stylesheet_directory().'/inc/index.php';


/**
* @snippet       Display &quot;FREE&quot; if WooCommerce Product Price is Zero or Empty - WooCommerce
* @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode    https://businessbloomer.com/?p=73147
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 3.5.3
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
 
add_filter( 'woocommerce_get_price_html', 'bbloomer_price_free_zero_empty', 100, 2 );
  
function bbloomer_price_free_zero_empty( $price, $product ){
 
if ( '' === $product->get_price() || 0 == $product->get_price() ) {
    $price = '<span class="woocommerce-Price-amount amount">-</span>';
} 
 
return $price;
}
