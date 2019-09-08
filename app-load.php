<?php
/**
 * Bootstrap file for setting the ABSPATH constant
 * and loading the mg-config.php file. The mg-config.php
 * file will then load the wp-settings.php file, which
 * will then set up the WordPress environment.
 *
 * If the mg-config.php file is not found then an error
 * will be displayed asking the visitor to set up the
 * mg-config.php file.
 *
 * Will also search for mg-config.php in WordPress' parent
 * directory to allow the WordPress directory to remain
 * untouched.
 *
 * @package WordPress
 */

// Define ABSPATH as this file's directory.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

/*
 * If mg-config.php exists in the application root, or if it exists in the root and wp-settings.php
 * doesn't, then load the mg-config.php.
 *
 * The secondary check for wp-settings.php has the added benefit of avoiding cases where
 * the current directory is a nested installation. For example:
 * `/` is root application A and `/blog/` is application B.
 *
 * If neither set of conditions is true, initiate loading the setup process.
 */
if ( file_exists( ABSPATH . 'mg-config.php') ) {

	// The config file resides in ABSPATH.
	require_once( ABSPATH . 'mg-config.php' );

} elseif ( @file_exists( dirname( ABSPATH ) . '/mg-config.php' ) && ! @file_exists( dirname( ABSPATH ) . '/wp-settings.php' ) ) {

	// The config file resides one level above ABSPATH but is not part of another installation.
	require_once( dirname( ABSPATH ) . '/mg-config.php' );

} else {

	// A config file doesn't exist.

	define( 'WPINC', 'wp-includes' );
	require_once( ABSPATH . WPINC . '/load.php' );

	// Standardize $_SERVER variables across setups.
	wp_fix_server_vars();

	require_once( ABSPATH . WPINC . '/functions.php' );

	$path = wp_guess_url() . '/wp-admin/setup-config.php';

	/*
	 * We're going to redirect to setup-config.php. While this shouldn't result
	 * in an infinite loop, that's a silly thing to assume, don't you think?
	 * If we're traveling in circles, our last-ditch effort is "Need more help?"
	 */
	if ( false === strpos( $_SERVER['REQUEST_URI'], 'setup-config' ) ) {
		header( 'Location: ' . $path );
		exit;
	}

	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	require_once( ABSPATH . WPINC . '/version.php' );

	wp_check_php_mysql_versions();
	wp_load_translations_early();

	// Die with an error message.
	$die  = sprintf(
		/* translators: %s: mg-config.php */
		__( 'There doesn\'t seem to be a %s file. This is needed before we can get started.' ),
		'<code>mg-config.php</code>'
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: %s: mg-config.php */
		__( 'You can create a %s file through a web interface, but this doesn\'t work for all server setups. The safest way is to manually create the file.' ),
		'<code>mg-config.php</code>'
	) . '</p>';
	$die .= '<p><a href="' . $path . '" class="button button-large">' . __( 'Create a Configuration File' ) . '</a>';

	wp_die( $die, __( 'Application &rsaquo; Error' ) );
}