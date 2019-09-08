<?php
/**
 * The base configuration for the Motor & Grit network
 *
 * The mg-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "mg-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * `ABSPATH`
 *
 * @package MG_Network
 */

/**
 * MySQL settings
 *
 * You can get this info from your web host.
 */

// Database name.
define( 'DB_NAME', 'database_name_here' );

// Database username.
define( 'DB_USER', 'username_here' );

// Database password.
define( 'DB_PASSWORD', 'password_here' );

// Database hostname.
define( 'DB_HOST', 'localhost' );

// Database charset to use in creating database tables.
define( 'DB_CHARSET', 'utf8' );

// Database collate type. Don't change this if in doubt.
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the WordPress.org secret-key service.
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'Put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'Put your unique phrase here' );
define( 'NONCE_KEY',        'Put your unique phrase here' );
define( 'AUTH_SALT',        'Put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'Put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'Put your unique phrase here' );
define( 'NONCE_SALT',       'Put your unique phrase here' );

/**#@-*/

/**
 * Database table prefix
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mg_';

/**
 * Debugging mode
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use `WP_DEBUG`
 * in their development environments.
 *
 * @see dev-reference/debugging.md
 */
define( 'WP_DEBUG', true );

// Multisite definitions.
define( 'WP_ALLOW_MULTISITE', true );

/**
 * End customization
 *
 * Do not add or edit anything below this comment block.
 */

// Absolute path to the this directory.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

// Set up vars and included files.
require_once( ABSPATH . 'wp-settings.php' );