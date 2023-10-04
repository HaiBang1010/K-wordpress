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
define( 'DB_NAME', 'k-wordpress' );

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
define( 'AUTH_KEY',         '}|7q:uzO)&RS+g8[?*D9s/8Cs[R^zQW4<Y$-j73pzF1FeXS079[Q-[K @-723_HO' );
define( 'SECURE_AUTH_KEY',  '{OtSt#>@YipR{>|ZvY;Sb5?;7!;1kA6]HCv2~Y2_h,1JPVm49:L>5Qdk(geg}ItG' );
define( 'LOGGED_IN_KEY',    'A,;,gF>.5QHzQ:+D<+nun1[ZV Z??W~AAK2/}CpyNFWF^@&;&r]$sV-D-NAWy$pU' );
define( 'NONCE_KEY',        'j&L-J1qmnSPu%a4,&.4=E6~6y*!9C_^>F*k[a{31|; F`m.mKh;Ix|FJoE,!.N(=' );
define( 'AUTH_SALT',        'OM%=(u_g!,U{H0b/%::.7&1(vn1xUo,Oxn{Mvk7Z}5*s;rl!P$OXD_~A]vklzeF3' );
define( 'SECURE_AUTH_SALT', 'i0~0`KC@_H.OHZ1YK]eub&VzvGK5TpF-^!,z0o_wLo*hMN}w^_1W-bh=Zz?E!3Ws' );
define( 'LOGGED_IN_SALT',   'y25G PxPcK,J_ cByy/6Qu<6rBq [avf 0LO)Lv@+MhBg$Qjb:>Ak^(P2Xg~{V6=' );
define( 'NONCE_SALT',       '$76-#hP.+c!80k4PDM*$zsBk M)Yue#{X7qsZ2v+e<XPuLgvcc]%cE%i[AWL ?G}' );

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
