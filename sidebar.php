<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine 7
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$global_layout = magazine_7_get_option('global_content_alignment');
$page_layout = $global_layout;
// Check if single.

if (is_singular()) {
    $post_options = get_post_meta($post->ID, 'magazine-7-meta-content-alignment', true);
    if (!empty($post_options)) {
        $page_layout = $post_options;
    } else {
        $page_layout = $global_layout;
    }
}

if (is_front_page() || is_home() ) {
    $frontpage_layout = magazine_7_get_option('frontpage_content_alignment');
    if (!empty($frontpage_layout)) {
        $page_layout = $frontpage_layout;
    } else {
        $page_layout = $global_layout;
    }
}



if ($page_layout == 'full-width-content') {
    return;
}

if(is_shop()){
    open_aside();
    dynamic_sidebar( 'shop-sidebar' ); 
    close_aside();
}elseif (is_product_category()) {
    open_aside();
    dynamic_sidebar( 'product-category-sidebar' ); 
    close_aside();
}elseif (is_product_tag()) {
    open_aside();
    dynamic_sidebar( 'product-tag-sidebar' ); 
    close_aside();
}elseif (is_cart()) {
    open_aside();
    dynamic_sidebar( 'cart-sidebar' ); 
    close_aside();
}elseif (is_checkout()) {
    open_aside();
    dynamic_sidebar( 'checkout-sidebar' ); 
    close_aside();
}elseif (is_account_page()) {
    open_aside();
    dynamic_sidebar( 'account-sidebar' ); 
    close_aside();
}else{
    open_aside();
    dynamic_sidebar( 'sidebar-1' ); 
    close_aside();
}

function open_aside(){
    ?><aside id="secondary" class="widget-area"><?php
}
function close_aside(){echo"</aside><!-- #secondary -->";}
