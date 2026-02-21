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
define( 'DB_NAME', 'proflines_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'MySQL-8.0' );

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
define( 'AUTH_KEY',         'Gq?-)>q$}%G+9EG4hTktD#mckND>}i}(i&,_ =.X5uNLe o$zFz781CG~bp&)zRp' );
define( 'SECURE_AUTH_KEY',  '| )_rhW^axv$Yc6Zb]VWW*B3&1zWM6i2,#-T~7, &?R?@HqQQ`fv,[]DL/N+HaS7' );
define( 'LOGGED_IN_KEY',    'J6=W;aCsf;K0+^/F-//qX%*nV.fV12LGk&hxrwU=96pRb;7)y.z:Sy&wSwu@ZjBW' );
define( 'NONCE_KEY',        ' f9+R!Uf=1*lK$7NwXS>$`_j1]8FY/G< WjKPy#%=$@Od3[|$/{yV5~K[5,0YENh' );
define( 'AUTH_SALT',        'B7T6e)-Dj)rx[c.e`,UU8/UHDHr]5|^UV~oxn8mH_,}6!OysW@(.{& (E5QMI7C^' );
define( 'SECURE_AUTH_SALT', '4`<[x/tl(oKN<&E)7BEBB>*B(EbL|$LA,K(UA95tx5AN {B/mh|l.o5wP}|bh#Fe' );
define( 'LOGGED_IN_SALT',   'V9Ruc:zL[dIV=8+,:J$5~RhnO%[jkfIF5?A.0`u%QjQL -!DrF{hIan/oHnZOk<[' );
define( 'NONCE_SALT',       'j4(/V6vkpfb;<]*DMj+Wo*}QeR.0B{XVo}eH6G<K^h28]mvEc&<F.tqD.>{,=$M{' );

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
