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
define('DB_NAME', 'wordpress-content-extract-in-word-file');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Wlh&0>H?a#wL=FJfRPB&e|F+fsS0l3xx^3 3Z>-vz=}S/by.#GFx*PsT%SWr`d7m');
define('SECURE_AUTH_KEY',  ',?%tzGUQVe%AoE0N~O@v[Fdo(-`u2HafnsXjD55EQ]|cPt~AFOAl*9t3{G v+qQm');
define('LOGGED_IN_KEY',    'jhk6R~*ea@Q_R3T:i{71Y/3YZuYGtEd&e#G?+pAXR9Q*,{[Q4eUlBV6LztlCE`_F');
define('NONCE_KEY',        'PEE#M &DZ]I{_qKeE%VnJKfWVFe IpnDeBe-!459+0K8x/,b!NHtrI32;Hlstn=H');
define('AUTH_SALT',        '}`G6%6hI:T19(6TDI#//h%Ad1q]D%(U$SF2e<p+r;^$9[`#!PeuU!Kk2e%C*N82j');
define('SECURE_AUTH_SALT', 'C[stf1yQv.?_4mmC~=s_iw*{Zu@=SKwA#jRv~?m(XX}>CamL6 %uE=;agl}N/>Sw');
define('LOGGED_IN_SALT',   ')zz7f<=/7VIJuz6 ats[tD#+Ye(><Cr$&96fL*0LSnIeOyOl7N7a]ARf?P>{w}xA');
define('NONCE_SALT',       'Mh0 /c~QCM?fLH1`kja]D  pk4GKE9_|n/waMbtvCt!^V%/<#YdlG/AZLw`q$`y&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'luitel_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
