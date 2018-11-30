<?php
/**
 * Check and setup theme's default settings
 *
 * @package presise
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists ( 'presise_setup_theme_default_settings' ) ) {
	function presise_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$presise_posts_index_style = get_theme_mod( 'presise_posts_index_style' );
		if ( '' == $presise_posts_index_style ) {
			set_theme_mod( 'presise_posts_index_style', 'default' );
		}

		// Sidebar position.
		$presise_sidebar_position = get_theme_mod( 'presise_sidebar_position' );
		if ( '' == $presise_sidebar_position ) {
			set_theme_mod( 'presise_sidebar_position', 'right' );
		}

		// Container width.
		$presise_container_type = get_theme_mod( 'presise_container_type' );
		if ( '' == $presise_container_type ) {
			set_theme_mod( 'presise_container_type', 'container' );
		}
	}
}