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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_portfolio' );

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
define( 'AUTH_KEY',         'n19n7 EYLgA;wvXPc%2P7[_e-#ZGPiKS!y|q><(PLVn!qrSU,`O>i+Kn&)nS@uh}' );
define( 'SECURE_AUTH_KEY',  '-62pgy06y5eEVF#q^Etzc!.&4VN`=c,8V]=<=u,0H1Jl]Z([xvI8WvlWY1N>-u}+' );
define( 'LOGGED_IN_KEY',    '1pNdN*o$zLL*`y-a lvgdiyVqNE)|rn#E#6PaYC<k&y/,;WxCeDvolo-qS<^9Dzk' );
define( 'NONCE_KEY',        '(U}?N.?t(a*SL#@X/3>6N8F6:Pj/21R2.f8w=|%E;#o~]qx0fY;V]e$A9VxUxhuW' );
define( 'AUTH_SALT',        'R2oYC0t%ypsfh$OshJ3r&Xws/nJFb4>>=GTbHBjKRz,<{/`2s;e1T3nis2KvJ_<1' );
define( 'SECURE_AUTH_SALT', '*n+B,yu3-! ?oDA%*A^X*zq,*0I u$0JU],d&Qq{*mNYL1 WA%=X0-w&dt+#ma<<' );
define( 'LOGGED_IN_SALT',   'he9}LMdhd*]X>eF@--GeN6Sg-y -/wlnV<Cw3|YVu0RySMy~YA}(UNFZK6k1`!Z?' );
define( 'NONCE_SALT',       ': #05$FoiEpPE.a/j0jJ%nJgcw7mCpz^0R9^jN{7yVn$:]F/LPn]-@GJaU.l7j#V' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
