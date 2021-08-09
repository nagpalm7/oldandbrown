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

define('WP_MEMORY_LIMIT', '64M');
//@ini_set('upload_max_size' , '256M' );

//define('WP_SITEURL', 'http://65.1.193.38');
//define('WP_HOME', 'http://65.1.193.38');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wp-admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wpadminpass' );

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
define( 'AUTH_KEY',         'Eb4-`b,:O^dRF1~EBlsb[]z?EC}3ADdfxs`3mAygm P?dNXg}eb$fh -p50q0l:F' );
define( 'SECURE_AUTH_KEY',  'XB@*:,VxKZSGFv8SK5bPM#`Zx47LEVC[rv)/`.*kox#M!Ty^$K)A8ZON:_wh~eHJ' );
define( 'LOGGED_IN_KEY',    'DEezSjTI.gwf+@]}]iiMf$So;(X*67FG$M9sG9 ;?eux2Ht[F5Cq<?NtbB`J3JQH' );
define( 'NONCE_KEY',        '({2NNFYnN;B@jU&}yKtche3Fj -eurJ+Zjmbx ^>?Gbs>.tQoI|y?4dunCo6E.[6' );
define( 'AUTH_SALT',        'd;zEI]-E]3#tn.<2FTF<0K:KF#,-jof@&D`$Lwl)ME1}UmWg~Ys?fo>2~g1K|dft' );
define( 'SECURE_AUTH_SALT', '[6:p0q]Z#1Od$tKAr::>gOG&QNJ.D a;tgCpx41d,ygPF3].KV95AdAf!*}b@V4Z' );
define( 'LOGGED_IN_SALT',   '*`$4 ]H,$C34pLH] 5)hBP#:^V?#54vMkbzB:HGOLz{z5FfXtFE}fLV#$&]uE])D' );
define( 'NONCE_SALT',       'R5A7LrCCGr3I%uByKw0C8~mXEV]#]}iUQgZ=r$@%dF*?_eNAr/fwy/>^Dwh.?oR<' );

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
