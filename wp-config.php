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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mesamoving');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '1@>o?HlirYNfW&%?-gc&2m; fV>!$ir.j)Ei6}Dz<*G?F0V-6j(aX&a@#*`uzE2,');
define('SECURE_AUTH_KEY',  'Wqrq@PjSc@(6DbvM#5QY{=A8^.8&fB.]pl{W_Q{!4`^lV-u{XMyd{1G*,6pOF-A)');
define('LOGGED_IN_KEY',    'G:+`gM3,9jP-KH@G6>YnJq0+Fk/<|ll9I)dt lCsqCh_+4{iQCL_|ar+X?Is1^~(');
define('NONCE_KEY',        '&/*L;q9b5Vc]2!c_[?P5|oz(Wh3M`Yq|(@}U^vx=TR_~qnAc}srUA*s_NI^EVN6:');
define('AUTH_SALT',        'Mz@`EG/(_8.@vE:_1E)@g%Qk#;Tg-/~-b7m~v#K#L[-uh,A.:(andrbOC~H$Pd[4');
define('SECURE_AUTH_SALT', '|,FYhC`BcI$cSZR.@C4~I(x)v<RZ1`fL$_9kk:DwPI?Q5GUUXtfMU#1sWmS3-7tg');
define('LOGGED_IN_SALT',   '7a[H-m-FvOKBe8y>6MM(0Qor{37pPJ,f61bIL]|;pedS})Jrq_Z3$v|uVF)B5q/:');
define('NONCE_SALT',       '3rYOt9S(_,D<fcqODsD<5e%X5dio@3Tb0|vlBIZv!)Sh_f0Fs<.BQ^~}[c3uu&8=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

// Turns WordPress debugging on
define('WP_DEBUG', true);

// Tells WordPress to log everything to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Doesn't force the PHP 'display_errors' variable to be on
define('WP_DEBUG_DISPLAY', false);

// Hides errors from being displayed on-screen
@ini_set('display_errors', 0);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');