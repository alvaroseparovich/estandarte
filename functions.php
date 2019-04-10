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


//---------------------------------------------------------
function human_time_diff_chinese( $from, $to = '' ) {
    if ( empty( $to ) ) {
      $to = time();
    }
  
    $diff = (int) abs( $to - $from );
  
    if ( $diff < HOUR_IN_SECONDS ) {
      $mins = round( $diff / MINUTE_IN_SECONDS );
      if ( $mins <= 1 )
        $mins = 1;
      /* translators: min=minute */
      $since = sprintf( _n( '%s min', '%s minutos', $mins ), $mins );
    } elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
        $hours = round( $diff / HOUR_IN_SECONDS );
        if ( $hours <= 1 )
            $hours = 1;
        $since = sprintf( _n( '%s hora', '%s horas', $hours ), $hours );
    } elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
        $days = round( $diff / DAY_IN_SECONDS );
        if ( $days <= 1 )
            $days = 1;
        $since = sprintf( _n( '%s dia', '%s dias', $days ), $days );
    } elseif ( $diff < MONTH_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
        $weeks = round( $diff / WEEK_IN_SECONDS );
        if ( $weeks <= 1 )
            $weeks = 1;
        $since = sprintf( _n( '%s semana', '%s semanas', $weeks ), $weeks );
    } elseif ( $diff < YEAR_IN_SECONDS && $diff >= MONTH_IN_SECONDS ) {
        $months = round( $diff / MONTH_IN_SECONDS );
        if ( $months <= 1 )
            $months = 1;
        $since = sprintf( _n( '%s mes', '%s meses', $months ), $months );
    } elseif ( $diff >= YEAR_IN_SECONDS ) {
        $years = round( $diff / YEAR_IN_SECONDS );
        if ( $years <= 1 )
            $years = 1;
        $since = sprintf( _n( '%s ano', '%s anos', $years ), $years );
    }
  
    return apply_filters( 'human_time_diff_chinese', $since, $diff, $from, $to );
  }