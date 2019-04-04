<?php
/**
 * Custom advertisement
 *
 * @package Acme Themes
 * @subpackage Online Shop
 * @since 1.0.0
 */
if ( ! class_exists( 'Online_Shop_Advanced_Search_Widget' ) ) :
	/**
	 * Class for adding advertisement widget
	 * A new way to add advertisement
	 * @package Acme Themes
	 * @subpackage Online Shop
	 * @since 1.0.0
	 */
	class Online_Shop_Advanced_Search_Widget extends WP_Widget {
		function __construct() {
			parent::__construct(
			/*Base ID of your widget*/
				'online_shop_advanced_search',
				/*Widget name will appear in UI*/
				esc_html__('AA - Estandarte Buscar Produtos', 'online-shop'),
				/*Widget description*/
				array( 'description' => esc_html__( 'Add Advanced WooCommerce Search Widget', 'online-shop' ), )
			);
		}

		/*defaults values for fields*/
		private $defaults = array(
			'online_shop_search_placeholder'  => 'Procurar',
			'es_search'  => 'pa_e'
		);

		public function form( $instance ) {
			/*merging arrays*/
			$instance = wp_parse_args( (array) $instance, $this->defaults);
			$online_shop_search_placeholder = esc_attr( $instance['online_shop_search_placeholder'] );
			$es_search = esc_attr( $instance['es_search'] );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'online_shop_search_placeholder' ) ); ?>"><?php esc_html_e( 'Placeholder Text', 'online-shop' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'online_shop_search_placeholder' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'online_shop_search_placeholder' ) ); ?>" type="text" value="<?php echo esc_attr( $online_shop_search_placeholder ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'es_search' ) ); ?>"><?php esc_html_e( 'query', 'online-shop' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'es_search' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'es_search' ) ); ?>" type="text" value="<?php echo esc_attr( $es_search ); ?>" />
			</p>
			<?php
		}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 * @return array
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['online_shop_search_placeholder'] = ( isset( $new_instance['online_shop_search_placeholder'] ) ) ?  sanitize_text_field( $new_instance['online_shop_search_placeholder'] ): '';
			$instance['es_search'] = ( isset( $new_instance['es_search'] ) ) ?  sanitize_text_field( $new_instance['es_search'] ): '';

			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 * @return void
		 *
		 */
		function widget( $args, $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults);
			global $online_shop_search_placeholder;
			$online_shop_search_placeholder = esc_attr( $instance['online_shop_search_placeholder'] );
			$es_search = esc_attr( $instance['es_search'] );
			echo $args['before_widget'];
			//if ( is_woocommerce_active() ) : ?>

                <div class="estandarte-product-search" id="estandarte-product-search">
                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php
                        global $online_shop_search_placeholder;
                        $terms = get_terms( array(
                            'taxonomy'   => $es_search,
                            'hide_empty' => true,
                            'parent'     => 0,
                        ) );
                    if (  ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                    <?php 
                        $current = ( isset( $_GET[$es_search] ) ) ? absint( $_GET[$es_search] ) : '' ; ?>
                            <select id="estandart-select" class="select_products" name="<?php echo esc_attr( $es_search ); ?>">
                                <option value=""><?php esc_html_e( 'Livros e Ebooks', 'online-shop' ); ?></option>
                                <?php foreach ( $terms as $cat ) : ?>
                                    <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php selected( $current, $cat->slug ); ?> ><?php echo esc_attr( $cat->name ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                        <input type="search" id="estandarte-text-field" class="search-field" placeholder="<?php echo esc_attr( $online_shop_search_placeholder ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <button class="fa fa-search searchsubmit" id="estandarte-search-btn" type="submit"></button>
                        <input type="hidden" name="post_type" value="product" />
                    </form><!-- .woocommerce-product-search -->
                </div><!-- .advance-product-search -->

				<style>
				input#estandarte-text-field {
					width: 69%;
				}
				button#estandarte-search-btn {
					line-height: 1.7;
					width: 30%;
				}
				select#estandart-select {
					width: 100%;
				}
				</style>

            <?php
                



			/*else :
				get_search_form();
			endif;*/
			echo $args['after_widget'];
		}
	}
endif;