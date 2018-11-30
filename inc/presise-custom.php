<?php
/**
 * CS Framework Customization.
 */
define( 'CS_ACTIVE_FRAMEWORK',   false  ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

if(!function_exists('presise_csf_init')){
	function presise_csf_init(){
		CSFramework_Metabox::instance(array());
	}

	add_action('init', 'presise_csf_init');
}

if(!function_exists('presise_cs_framework_metaboxes')){
	function presise_cs_framework_metaboxes($options){
		$options[]    = array(
			'id'        => '_presise_page_metaboxes',
			'title'     => __('Page Options', 'pesise'),
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'   => 'page_settings',
					'fields' => array(
						array(
							'id'            => 'hero_switch',
							'title'            => __('Page Header Type', 'presise'),
							'type'          => 'select',
							'label'   => __('Header Type', 'presise'),
							'options'=>array(
								'hero_slider'=>__("Hero Slider", "presise"),
								'normal_header'=>__("Normal Header", "presise"),
							),
							'default' => 'normal_header',
						),

						array(
							'id'              => __('hero_slides', 'presise'),
							'type'            => 'group',
							'title'           => 'Slides',
							'button_title'    => 'Add Slide',
							'accordion_title' => 'Add New Slide',
							'dependency'   => array( 'hero_switch', '==', 'hero_slider' ),
							'fields'          => array(
								array(
									'id'    => 'slide_text',
									'type'  => 'textarea',
									'title' => 'Slide Text',
								),
								array(
									'id'    => 'slide_image',
									'type'  => 'upload',
									'title' => 'Upload Image',
								),
							),
						),



					),
				),

			),
		);

		return $options;
	}
	add_filter( 'cs_metabox_options', 'presise_cs_framework_metaboxes' );
}




/**
 * Woocommerce Customization
 */
if ( ! function_exists( 'presise_template_loop_product_title' ) ) {
	function presise_template_loop_product_title() {
		echo '<div class="presise_title_wrap">';
		echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
	}

	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'presise_template_loop_product_title', 10 );
}

if ( ! function_exists( 'presise_title_wrap_end' ) ) {
	function presise_title_wrap_end() {
		printf( '</div><!--End Title Wrap-->' );
	}

	add_action( 'woocommerce_after_shop_loop_item', 'presise_title_wrap_end', 15 );
}

if ( ! function_exists( 'presise_show_product_loop_sale_flash' ) ) {

	/**
	 * Get the sale flash for the loop.
	 */
	function presise_show_product_loop_sale_flash() {
		echo '<div class="presise_product_thumb_image">';
		wc_get_template( 'loop/sale-flash.php' );
	}

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'presise_show_product_loop_sale_flash', 10 );
}


if ( ! function_exists( 'presise_product_thumbnail' ) ) {
	function presise_product_thumbnail() {

		global $post, $product;

		$mt_product_thumb = woocommerce_get_product_thumbnail( 'presise_image_square' ); // WPCS: XSS ok.

		if ( $product->is_on_sale() ) {
			printf( '%s</div>', $mt_product_thumb );
		}else{
			printf( '<div class="presise_product_thumb_image">%s</div>', $mt_product_thumb );
		}
	}

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'presise_product_thumbnail', 10 );
}
