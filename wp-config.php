<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sellace' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Be/}pGk@W*/i,G:pbH`y!z%o/};9qv[7<`($HUH~7L/D,7!*Q4u&N#w5@n106_aH' );
define( 'SECURE_AUTH_KEY',  'crC#4ILw>IPoNY?f}bxB}@T GCg<.?Qb|-AIafQ& ]Rr^M0HVpe3C>4F5OZR{eQ!' );
define( 'LOGGED_IN_KEY',    '`*`taBb|=A-F]CV<Wi2XK<MidmSYTbkw5GUs|P|~VEgA>4T1[2jL2;G+wg&o):0`' );
define( 'NONCE_KEY',        'StFvi[NUIZ[#2Ue6[fCO-N7E4Ws=bm&4 I]u1aBy88c3vQ~HI9o8(8a`4x?Qc>)M' );
define( 'AUTH_SALT',        'Q&SJwIo,jQrQ)NS,69;`sT%B:b&9V<dn3KDVKQT-+{6L(E0N-sNg2x0zH=vkYYR`' );
define( 'SECURE_AUTH_SALT', 'wwkF%u,$OkA1Mpa-I=wpFB %E>Ly~u%W!7!P!8XpNKp%!5&e^YaA8eL6gj}{Cl&L' );
define( 'LOGGED_IN_SALT',   '#Q^1*H3qWY-SRsNR!+dU.=%c=-1%bC.SwFaC5P&tw=klZHS6 E7lbP?6^[/ORN1%' );
define( 'NONCE_SALT',       'f !F:*D>PUB ^*Zo)LnMTwpyH<U%h.E$p}:fSH[lK`EA,;K64i}=ZA~5#T$,vV#c' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
