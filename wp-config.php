<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'glqpyute_WPXXE');

/** Database username */
define('DB_USER', 'glqpyute_WPXXE');

/** Database password */
define('DB_PASSWORD', 'V4]iqSK!AIQ=4NVaZ');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '6d01d2b76401d0b6fcd3ed82b674219ef5f6afe34cc31df681da6364348ae0b1');
define('SECURE_AUTH_KEY', 'f7c20fde1f103036c19fbd966bbc10768b0e74793b47b8a5c6ad44644af5994b');
define('LOGGED_IN_KEY', 'e195b93439d97fa98fb753089e20ca0075e1a86b21827a3e74656ed81482b4cf');
define('NONCE_KEY', '739ba0582361b29094d49e2d88f78f8dee8e996fbc03eed2ccb4857e1ae80894');
define('AUTH_SALT', '396f9b03a0db945804ad289ba4a402f198f7c2b4348882356adcd63989f0a186');
define('SECURE_AUTH_SALT', '4249badbd7447010e926c49216ffbb6c51bcaefc2075984ea34ecde33e728318');
define('LOGGED_IN_SALT', '8af27dfddf4f6dad1cd22a40dfe6995015ed519f5a2722357e02e0fd81da24bd');
define('NONCE_SALT', '8ce9b885bc0cd746c07d82f0eec9649412f41ffbfe033f5b4cca0dcb681776f8');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dIV_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 20);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
