<?php
/**
 * Custom hooks.
 *
 * @package presise
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'presise_site_info' ) ) {
  /**
   * Add site info hook to WP hook library.
   */
  function presise_site_info() {
    do_action( 'presise_site_info' );
  }
}

if ( ! function_exists( 'presise_add_site_info' ) ) {
  add_action( 'presise_site_info', 'presise_add_site_info' );

  /**
   * Add site info content.
   */
  function presise_add_site_info() {
    $the_theme = wp_get_theme();
    
    $site_info = sprintf(
      '<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
      esc_url( __( 'http://wordpress.org/', 'presise' ) ),
      sprintf(
        /* translators:*/
        esc_html__( 'Proudly powered by %s', 'presise' ), 'WordPress'
      ),
      sprintf( // WPCS: XSS ok.
        /* translators:*/
        esc_html__( 'Theme: %1$s by %2$s.', 'presise' ), $the_theme->get( 'Name' ), '<a href="' . esc_url( __( 'http://presise.biz', 'presise' ) ) . '">presise.biz</a>'
      ),
      sprintf( // WPCS: XSS ok.
        /* translators:*/
        esc_html__( 'Version: %1$s', 'presise' ), $the_theme->get( 'Version' )
      )
    );

    echo apply_filters( 'presise_site_info_content', $site_info ); // WPCS: XSS ok.
  }
}
