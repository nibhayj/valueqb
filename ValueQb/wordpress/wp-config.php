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
define('DB_NAME', 'wordpressvalueqb');

/** MySQL database username */
define('DB_USER', 'wordpressvalueqb');

/** MySQL database password */
define('DB_PASSWORD', 'evoD380mx!');

/** MySQL hostname */
define('DB_HOST', 'wordpressvalueqb.db.4676942.hostedresource.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')U17~+3h!jq.Bvb3zi1omAk|tAzGmsD;uH(Hf[jZM#CW^vj}/jJS]{%) r(^+vyP');
define('SECURE_AUTH_KEY',  '-$M_!?QDqZU55+^YyuXlO+B2]uAS/B*Qxu/ar5%|e6-(p;* x7k cfH{?^93*WQ5');
define('LOGGED_IN_KEY',    '78stQTlGo%V^<+YUUdpyFR-1dNe ]hf]Qqf/Z.MY-C_*zTNk$W[j`V`&(A[(oEgZ');
define('NONCE_KEY',        'ct0V|wUtVcNQcid_ke#Oc:gLK+#|w;(+Gn!xXm7-fo3IL%PU]jj?Pq[;>4/Eaqv}');
define('AUTH_SALT',        'MQH;_tU6Q-juiH$V/kTt{.bNe<(Iylo AnP[5cza? qmp-L-0|=o1ZR%phiN}WZ-');
define('SECURE_AUTH_SALT', '~8KJAQ09Xdu|KS231!JR=FAAO;n|/7++@EMaYL{~?P1_)K?fF+b`%9.TNuvwyB;e');
define('LOGGED_IN_SALT',   'inR~r;pv$,?0VGOft4<0_~+Wc1X+uoSKD4g}`c*Xfd!f-&p0R9PWe-]kK.W=kejm');
define('NONCE_SALT',       'PYiapf_4WZ]rPPKohB3|)O&=m3SN{Qvtvjkz@q@^Hyf)y8-/f-_B3<$C^w65zHS#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

