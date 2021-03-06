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


function createElement($echo = 1 , $element="div", $class = "", $id="", $content=""){

    if(strpos($element,'/')){
        $elementCreated = "</{$element}>";

        if($echo){
            echo $elementCreated;
        }else{
            return $elementCreated;
        }
    }
    else{
        $elementCreated = "<{$element} id='{$id}' class='{$class}'> {$content}";

        if($echo){
            echo $elementCreated;
        }else{
            return $elementCreated;
        }
    }
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 45;
  return $cols;
}




if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
    /**
    * Show the product H3 title in the product loop.
    */
    function woocommerce_template_loop_product_title() {
    echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
    if (wp_get_post_terms(get_post()->ID, "pa_autor") and ! is_wp_error( wp_get_post_terms(get_post()->ID, "pa_autor") ) ){
        echo '<h5 class="author">'. wp_get_post_terms(get_post()->ID, "pa_autor")[0]->name .'</h5>';  
    }else{
        echo "<h5 class='author'>-</h5>";
    }
    //var_dump(wp_get_post_terms(get_post()->ID, "pa_autor"));
    }
}


require get_stylesheet_directory().'/woocommerce-functions/single-product-functions.php';