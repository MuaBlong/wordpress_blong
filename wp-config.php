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
define( 'DB_NAME', 'tintuc' );

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
define( 'AUTH_KEY',         'CJG1vONo89>]u_Kjbq;}V`hFjN|O@o(B2lrM]yC3]*|Y2VbasKIeGJv1CcOnnU[V' );
define( 'SECURE_AUTH_KEY',  '4,#xJQhiy6cw?lv(P3+1Ek|oe+@XhyqgANgvR$)&PXrD6Aou^n!i:l,C5^3)&!y)' );
define( 'LOGGED_IN_KEY',    'n80~x9uD@d8H,u p1$SVRi1xkKHY<&=jAu{Ue%0JKUe!?A]xX]-=*_dl[;hEdDGx' );
define( 'NONCE_KEY',        ',Z<IjA+SLZ!@311/N+):f&^1WKU^O5mwD-Z`_~!p#~m-(Wi<socEPG[`ABR.uYdn' );
define( 'AUTH_SALT',        'W1Xqp8521]zB_fmHI,A@rzWZPRGhMeC.8MmLB!YQG.:+^c@t`n[{N=v[ZgMYS8BT' );
define( 'SECURE_AUTH_SALT', ')_M~3[W4K,v`XAKisvk]u>$`S,svZn9i25b5u5ATL%9=B1KGv`JVO]wovdVi4xi|' );
define( 'LOGGED_IN_SALT',   'u{Kq7=CnX :#1PfAbhC;K)FkUwKE:l>F,;hj4.fe=#a~gDu2Xk#,w[HV?|QN`FIp' );
define( 'NONCE_SALT',       'sfO1a=zEp:.87=dYGw9MM$Og8K6:]I.`{17q?lnrJg]{pHYF6.<aS}.g!f>Sl~8V' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
