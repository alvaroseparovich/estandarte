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

 register_sidebar( $args = array(
	'name'          => "Loja",
	'id'            => "shop-sidebar",
	'description'   => 'Sidebar da loja',
	'class'         => 'shop-sidebar'
	)
 );
 register_sidebar( $args = array(
	'name'          => "Categoria de Produto",
	'id'            => "product-category-sidebar",
	'description'   => 'Sidebar da loja',
	'class'         => 'shop-sidebar'
	)
 );
 register_sidebar( $args = array(
	'name'          => "Tag de Produto",
	'id'            => "product-tag-sidebar",
	'description'   => 'Sidebar da loja',
	'class'         => 'shop-sidebar'
	)
 );
 register_sidebar( $args = array(
	'name'          => "Carrinho",
	'id'            => "cart-sidebar",
	'description'   => 'Sidebar da loja',
	'class'         => 'shop-sidebar'
	)
 );
 register_sidebar( $args = array(
	'name'          => "Checkout",
	'id'            => "checkout-sidebar",
	'description'   => 'Sidebar da loja',
	'class'         => 'shop-sidebar'
	)
 );
 register_sidebar( $args = array(
	'name'          => "Pagina de mina conta",
	'id'            => "account-sidebar",
	'description'   => 'Sidebar da loja',
	'class'         => 'shop-sidebar'
	)
 );