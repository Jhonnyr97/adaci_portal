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
define( 'DB_NAME', 'adaci' );

/** Database username */
define( 'DB_USER', 'adaci' );

/** Database password */
define( 'DB_PASSWORD', 't8eW7npAt%uF$kq' );

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
define( 'AUTH_KEY',         '[z]M&6(B}&.f;0]ynlBBzW27Y,HuY/NE;F^A=q,[Nj|b3x_}_u.cT[m;W#z|>XC;' );
define( 'SECURE_AUTH_KEY',  'J?<5}Rm)tCE]$?%%-&;gE^t-SPoJ[N!_|{8#O*`UUDY^@#!SN^-|wUee<`q3bnWV' );
define( 'LOGGED_IN_KEY',    'mTfXUf;UC|9l5@+_`><FcNRUf#-]W7=I@p)8}l(/R|Y{b9=3|CQs=J8k,bay&_#=' );
define( 'NONCE_KEY',        '0+xz+n.)+l$Y~g3%4G[69A^;#58?DQ}/kllS?uZq$~A(=#[6nYnP3#F^<69_+@Pv' );
define( 'AUTH_SALT',        'Fd1|LSNmx`#EG%<}Kf/[uS`r;gtjcKP#rULE+OsWg_x2l(iq)G;(l@WYLuIKBXfH' );
define( 'SECURE_AUTH_SALT', '[N2*?<0;,GZ&AeAK)?gi_syd}3P}:3nHG{xtj@H;`1j2C^gC.I;qRK.suz?9UlbL' );
define( 'LOGGED_IN_SALT',   ' S7B>E}orCxQ~eyk,~$BVvC!BITziw)V>reTPRL.:T:9:^8V}y-*-<Gei!e`M22O' );
define( 'NONCE_SALT',       '<; O`0x_}N+>.JWFB(ncbb^:PHAfp2]o|&{)6otM9T]WE,kMOiuv7BxR!9W04[Ie' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'adaci_';

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
define('FS_METHOD', 'direct' );
define('ALLOW_UNFILTERED_UPLOADS', true);



/*if (strpos($_SERVER["REQUEST_URI"], 'sitemap')!==false || $_SERVER['HTTP_HOST'] !== 'adaci.demo1.bytestechnolab.com'){
    define( 'WP_SITEURL', 'http://adaci.demo1.bytestechnolab.com' );
    define( 'WP_HOME', 'http://adaci.demo1.bytestechnolab.com' ); 
} else {
    define( 'WP_SITEURL', 'http://adaciformanagement.demo1.bytestechnolab.com' );
    define( 'WP_HOME', 'http://adaciformanagement.demo1.bytestechnolab.com' );
}*/

/* Add any custom values between this line and the "stop editing" line. */


/* Multisite */
define('WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
define( 'DOMAIN_CURRENT_SITE', 'adaci.demo1.bytestechnolab.com' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

define('COOKIE_DOMAIN', $_SERVER['HTTP_HOST']);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
