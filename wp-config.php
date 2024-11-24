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
define( 'DB_NAME', 'db_popcinema' );

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
define( 'AUTH_KEY',         '+ )zq*bSTA2+Kn<_H<}2LLBfktJ8=o`v=f_}g63#8PfXI,&/p~-|530tG*<J8Zl&' );
define( 'SECURE_AUTH_KEY',  '-AtTNd^R#QmT!!l$.cg6r.@S8GVA(MKxZMa+;hM8,HYlfwDgS58xXQfV(7(u$OJ?' );
define( 'LOGGED_IN_KEY',    'hBn~<qyptIv ;@hk0R`I~JJVu9G_pH7ZD+7lw<gnf3t0/sRUp&X|{]e0{l#;x53`' );
define( 'NONCE_KEY',        'Ok=;Of,|16f%|<,U}wA0UNMuI?%,y:WmBx1*3,YVqoBG] rNWp,OwL~XO2A 2RIU' );
define( 'AUTH_SALT',        '`p{+YN%r-s2|CdB&3fXxGt4a{18luqzFkD5X5v5mD}AFMCw;#Ry5~RfU<DZ:3<7e' );
define( 'SECURE_AUTH_SALT', 'of5Nt@y PX::#H=DxP?A(6i{$RPELypKe;dZjLn(S_]D)!WW!r$_:h6TH*v{o;(7' );
define( 'LOGGED_IN_SALT',   '#RC`1Yj,H+.t|%/N<^!,:`SFY`CZWwJ!<er7|Y7t`x8*KI]_(Qh|+nzx)1R5JmfU' );
define( 'NONCE_SALT',       'x4AF2R}&,H$DM: ~_i*|%h~YFV(^z,}yA%j}|]qO2af.lN@@:Ar1n>E-Qwsk?,Re' );

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
