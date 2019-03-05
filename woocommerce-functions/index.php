<?php


/***
 * Box to organize products img display on loop
 * 
 * 
 */
add_action('woocommerce_before_shop_loop_item_title', 'before_loop_item_title', 1);
function before_loop_item_title(){
    ?><div class="img-box"> <?php
}
add_action('woocommerce_before_shop_loop_item_title', 'after_loop_item_title', 20);
function after_loop_item_title(){
    ?> </div><?php
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );


/**
 * 
 * Functions in the Product Page
 * ============================
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 6 );