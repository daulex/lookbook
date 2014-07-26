<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'lookbook');

/** MySQL database username */
//define('DB_USER', 'wordpress');

/** MySQL database password */
//define('DB_PASSWORD', 'i28NXsldIAZ');

/** MySQL hostname */
//define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DB_NAME', 'lookbook');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', '127.0.0.1:3306');
define('WP_HOME','http://localhost:8888/schuh');
define('WP_SITEURL','http://localhost:8888/schuh');

/* gareth local config */
// define('DB_NAME', 'lookbook');
// define('DB_USER', 'root');
// define('DB_PASSWORD', 'root');
// define('DB_HOST', 'localhost:8889');
// define('WP_HOME','http://10.0.1.21:8888/lookbook');
// define('WP_SITEURL','http://10.0.1.21:8888/lookbook');
/* end gareth local config */


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(F+$bm|!hRu9s+JmKS< (_|.tE,71Ei@DS1Wx84>(]dhdtTIk$yE-x?Fh0onT+}7');
define('SECURE_AUTH_KEY',  '5S%eC[J,Wx%V5~$_L%Zq?#,,*l4GE<WFjkbl;H/e}rR[@!ZVPO).+ZS%jNSPf8Tk');
define('LOGGED_IN_KEY',    'A.J-UKv#)~fG)Tbph+zL*|(6,GhXf+HqptG##8oSf7X=|=8B!K4`~>|RF!|Ax7;Q');
define('NONCE_KEY',        '5C$iZzz<cyoIQ}#jKo[ i3gkSl |#F2/6=t+8plN?vm:CxG=8q|8|WTdLeaNOOw.');
define('AUTH_SALT',        '2tT`v+-<Ho*%t6_ss+W~yiNBm 2kCat;ngE%_IkU00+O5l{^./EA&]*n`&h=j=1t');
define('SECURE_AUTH_SALT', '*_pgS-(w3;!4Ne{5!H~AnNj^i,9oa&d-IIHWn4$8Bs(}xepw)l9`[iuI+P@} ZL8');
define('LOGGED_IN_SALT',   'v>fUCCj)O-mc|lxA;7q?@<AEErs?^RHa&BO2d-biPHZRs]DIh![|yMR$%fyE,eJ}');
define('NONCE_SALT',       'n6!W|M!Y1Kpu$|ERYuztk7)&WnSel.jL1!SQ} i<6N}]>5rA7J_gWpda]1,AFJVo');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sc78_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');