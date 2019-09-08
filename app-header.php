<?php
/**
 * Loads the app environment and template.
 *
 * @package WordPress
 */
if ( !isset( $wp_did_header ) ) {

	$wp_did_header = true;

	// Load the app library.
	require_once( dirname( __FILE__ ) . '/app-load.php' );

	// Set up the app query.
	wp();

	// Load the theme template.
	require_once( ABSPATH . WPINC . '/template-loader.php' );

}