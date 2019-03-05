<?php
/* Registering all sidebars
 *
 *
**/

register_sidebar( $args = array(
	'name'          => "Home Page",
	'id'            => "home-page-content-sidebar",
	'description'   => 'widgets para serem mostradas na pagina home',
	'class'         => 'home-page-content-sidebar',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n",
)
 );