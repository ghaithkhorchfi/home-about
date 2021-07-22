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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'melkart' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '4YKfktuX/K`F/|V_G&u]M&F4=oO}[|um=%#Gh7a$NRTmc~JKA8m#y_i#.`xRwQ~f' );
define( 'SECURE_AUTH_KEY',  '#k-pc.daK$|maf9V7wMz}m>.k+j2?qGj YP7h-vdA.@vK}C+O}!Y(Y?4>Z%eB?8Y' );
define( 'LOGGED_IN_KEY',    'k/Fa0xh;B7h~TWEfc*6J+e4+4+o.Op1[id=[Pms88v>U}1!0:jpD#I<nawO8Wfbj' );
define( 'NONCE_KEY',        '2+nyK:tCXk2+@>@l`B+sglH*PepkDOEw/=[krvg7i0E3S(fd`caAnMt9B04KZ764' );
define( 'AUTH_SALT',        'P_H%yydVCYV_UD9>teDFt|6>m6Yw6lyTMXq#[<8[jQnR]}%i>_D=|$Q0~D})c=F#' );
define( 'SECURE_AUTH_SALT', '67mX]C;;04rQGT22]wsJU_/5(O4Iq{o5g_eOUr1>yBh.2S8]Qf~u%MEv1ce #k?r' );
define( 'LOGGED_IN_SALT',   't+E`b.M*,VAV[L~9IX(HF;ciFKl1hT-oXU/2awKdZ%_-2b4Vn4f==1P$>*4mk3TS' );
define( 'NONCE_SALT',       '_=yX<`j{1Gs{q5og$Q{I&F*mGz&X)Wj,I(]!n~;?JT6@5j,RbVOfq];.&u1$&T_f' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mel_';

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
