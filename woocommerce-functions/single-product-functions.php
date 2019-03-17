<?php

/**
 * 
 * ============================
 * Functions in the Product Page
 * ============================
 */

/**Moving woocommerce_template_single_excerpt */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 6 );

/** Reorganizing informations 
 *==========================
*/

/**----------- Removing 
 * -----------==========
*/


/**----------- adding or reinserting 
 * -----------=======================
*/
//function to end Div
function o_estandarte_close_div(){createElement(1,'/div');}


//first Block | IMG
add_action( 'woocommerce_before_single_product_summary', 'o_estandarte_product_img', 5 );
function o_estandarte_product_img(){createElement(1,'div','o_estandarte_product_img');}
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_product_additional_information_tab', 25 );
add_action( 'woocommerce_before_single_product_summary', 'o_estandarte_close_div', 25 );
//-----------------
//Second Block | INFO
add_action( 'woocommerce_before_single_product_summary', 'o_estandarte_product_info', 30 );
function o_estandarte_product_info(){createElement(1,'div','o_estandarte_product_info');}
add_action( 'woocommerce_single_product_summary', 'o_estandarte_product_price_div', 25 );
function o_estandarte_product_price_div(){createElement(1,'div','o_estandarte_cart');}
add_action( 'woocommerce_single_product_summary', 'o_estandarte_close_div', 35 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_product_description_tab', 65 );
add_action( 'woocommerce_single_product_summary', 'comments_template', 66 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 66 );
add_action( 'woocommerce_single_product_summary', 'o_estandarte_close_div', 70 );

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' );
function o_estandarte_product_aditional_inf_div(){createElement(1,'div','aditional_inf');}
add_action( 'woocommerce_single_product_summary', 'o_estandarte_product_aditional_inf_div', 65 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_product_additional_information_tab', 65 );
add_action( 'woocommerce_single_product_summary', 'o_estandarte_close_div', 65 );

//End full Block | ----------
add_action( 'woocommerce_after_single_product_summary', 'o_estandarte_product_end', 14 );
function o_estandarte_product_end(){createElement(1,'div','o_estandarte_product_end');}
add_action( 'woocommerce_after_single_product_summary', 'o_estandarte_close_div', 30 );


/**
 * Rerited
 *
 * @param array $tabs Array of tabs.
 * @return array
 */
function woocommerce_default_product_tabs( $tabs = array() ) {
    return $tabs;
}


/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
    global $product;
      
      $args['posts_per_page'] = 6;
      return $args;
  }
  add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
    function jk_related_products_args( $args ) {
      $args['posts_per_page'] = 7; // 4 related products
      $args['columns'] = 7; // arranged in 2 columns
      return $args;
  }