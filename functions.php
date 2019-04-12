<?php

/* styles  */
function featured_news_enqueue_child_styles() {
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'magazine-7-style';

    $fonts_url = 'https://fonts.googleapis.com/css?family=EB+Garamond|Fira+Sans+Condensed|Merriweather';
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
    if ( '' === $product->get_price() || 0 == $product->get_price() ) 
    { $price = '';} 
    return $price;
}


//checkout com os campos bairro obrigatorio, 5 numeros no numero, e 30 no complemento
function wc_etc_bfield( $fields ) {
    $fields['billing_number']['maxlength'] = 5;
    $fields['billing_address_2']['maxlength'] = 30;
    $fields['billing_address_2']['label_class'] = array('');    
    $fields['billing_neighborhood']['required'] = true;

    $fields['billing_first_name']['placeholder'] = 'Primeiro Nome';
    $fields['billing_last_name']['placeholder'] = 'Sobrenome';
    $fields['billing_cpf']['placeholder'] = 'CPF';
    $fields['billing_postcode']['placeholder'] = 'CEP';
    $fields['billing_address_1']['placeholder'] = 'Nome da Rua';
    $fields['billing_number']['placeholder'] = 'Numero';
    $fields['billing_address_2']['placeholder'] = 'Complemento';
    $fields['billing_neighborhood']['placeholder'] = 'Bairro';
    $fields['billing_city']['placeholder'] = 'Cidade';
    $fields['billing_phone']['placeholder'] = 'Telefone';
    $fields['billing_cellphone']['placeholder'] = 'Celular';
    $fields['billing_email']['placeholder'] = 'Seu email';
    $fields['billing_company']['placeholder'] = 'Nome da empresa';
    $fields['billing_cnpj']['placeholder'] = 'CNPJ';

    return $fields;}
add_filter( 'woocommerce_billing_fields', 'wc_etc_bfield' );
function wc_etc_sfield( $fields ) {
    $fields['shipping_number']['maxlength'] = 5;
    $fields['shipping_address_2']['maxlength'] = 30;
    $fields['shipping_address_2']['label_class'] = array('');  
    $fields['shipping_neighborhood']['required'] = true;

    $fields['shipping_first_name']['placeholder'] = 'Primeiro Nome';
    $fields['shipping_last_name']['placeholder'] = 'Sobrenome';
    $fields['shipping_postcode']['placeholder'] = 'CEP';
    $fields['shipping_address_1']['placeholder'] = 'Nome da Rua';
    $fields['shipping_number']['placeholder'] = 'Numero';
    $fields['shipping_address_2']['placeholder'] = 'Complemento';
    $fields['shipping_neighborhood']['placeholder'] = 'Bairro';
    $fields['shipping_city']['placeholder'] = 'Cidade';
    $fields['shipping_company']['placeholder'] = 'Nome da empresa';

    return $fields;}
add_filter( 'woocommerce_shipping_fields', 'wc_etc_sfield' );
function wc_etc_ordernote( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;}
add_filter( 'woocommerce_checkout_fields' , 'wc_etc_ordernote' );