<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0B^&,|Om_sf6~]ufy itqXRKC(I`Qsn=^o%6NB%NR>4GUL uHt(~tS!|>}D*u;i,' );
define( 'SECURE_AUTH_KEY',  'zw<2T@3k#Nh,<F<qGVmTwiSaVt+N-XAvAG[UnQ.S0bT{/AR%3K{V90u8`D0S565W' );
define( 'LOGGED_IN_KEY',    '0ps_-M[tJ3U$JkgP>V`bw}Pg+.2<V?goL9m@_U8$#t:6C!wu3f]2,$~-IgV(Xz4X' );
define( 'NONCE_KEY',        '7[ 0/aZ5lGN^hU9`+iI@j}fs=hP$;$t%[I@+kR@mS;Mf#/)U!thMOuf[!?a|YeA9' );
define( 'AUTH_SALT',        '*E+7vb,%khw(qDOSA37+Ty|mWjvArq0>ndgSVq=;D0cA5G0|,B%>d{e*DG(yQ2B0' );
define( 'SECURE_AUTH_SALT', '~_@vlV$q*3O;IC+[;0e]co<{6,L5cQ?LEJxt*p`.fZSP0&vhQ}9MIbb1_5kB0_[{' );
define( 'LOGGED_IN_SALT',   '-i&@|$[5@=}(~.4C<gQxiHvm97]Tl2>xMsQTkjKKXa0Qs0R,dMoV^_s|oz|:gZjK' );
define( 'NONCE_SALT',       'mXM5PudQ1e9enn!CWa]U@Gz1{KTW?]T YwFi<*1;8r07K`E&L,<E`o3&+>Z9(,0J' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
