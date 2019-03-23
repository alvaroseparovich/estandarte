<?php

require get_stylesheet_directory().'/inc/widget-base.php';

require get_stylesheet_directory().'/widgets-and-sidebars/sidebars.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-base.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/widget-post.php';

require get_stylesheet_directory().'/widgets-and-sidebars/widgets/product-widget.php';


function oec_widgets() {

    register_widget( 'Estandarte_Categorised_Posts' );

}
add_action( 'widgets_init', 'oec_widgets' );
