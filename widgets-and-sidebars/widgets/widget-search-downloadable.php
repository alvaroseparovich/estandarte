<?php
/**
 * Adds Magazine_7_Products_List widget.
 */

class Search_downloadable extends WC_Widget
{
    public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_downloadable_search';
		$this->widget_description = __( 'A downloadable search form for your store.', 'woocommerce' );
		$this->widget_id          = 'woocommerce_downloadable_search';
		$this->widget_name        = __( 'downloadable Search', 'woocommerce' );
		$this->settings           = array(
			'title' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Title', 'woocommerce' ),
			),
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args     Arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$this->widget_start( $args, $instance );

        $args = array(
            'posts_per_page'   => -1,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_status'      => 'publish',
            'meta_query' => array(
                array(
                    'key'     => '_downloadable',
                    'value'   => 'yes',
                    'compare' => 'LIKE',
                ),
            ),
        );

		get_product_search_form();

		$this->widget_end( $args );
	}
}