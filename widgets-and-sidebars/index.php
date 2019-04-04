<?php

require get_stylesheet_directory().'/widgets-and-sidebars/sidebars.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-base.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-search.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-post.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-product.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-search-downloadable.php';


function oec_widgets() {

    register_widget( 'Estandarte_Categorised_Posts' );
    register_widget( 'Online_Shop_Advanced_Search_Widget' );

}
add_action( 'widgets_init', 'oec_widgets' );
