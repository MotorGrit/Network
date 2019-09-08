<?php
/**
 * Front to the application
 *
 * This file loads app-header.php which then loads the theme.
 *
 * @package WordPress
 */

/**
 * Load the theme and implement it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

// Load the application and template.
require( dirname( __FILE__ ) . '/app-header.php' );