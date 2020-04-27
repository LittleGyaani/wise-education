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
define( 'DB_NAME', 'wise_education_DB' );

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
define( 'AUTH_KEY',         'Ubm3t/s8I&L$+}c<PnS^{m07<+Qr>`Aj,n{-y$.o*;`E[2Y2c]*v4D=!!+*=N[eX' );
define( 'SECURE_AUTH_KEY',  '%=3&{pOf&A}ry^2$ArJ@w.3h+t<xD.r1{W1:ZDy)6{lAJwy=s4~}K@M!*n#>m3#3' );
define( 'LOGGED_IN_KEY',    '~Es! w;A1yX]X_tyOWQR9]MxyV2RvJEQ+nK/cel4q!o9@K )|sr+J99OO.UK6>Wy' );
define( 'NONCE_KEY',        'Re@}|t  _Xs7bd:B1&{2qQh=oig$LB[5o9q,=vulLG}Cx:Zr|i}Nd>P0kP2Y[7{}' );
define( 'AUTH_SALT',        'S:%RDpjUWsa,F8>gvK1$$L8$|f_a^q.s@2EN<(6iLo^FnoCI6oX982VAmZb2Q{wG' );
define( 'SECURE_AUTH_SALT', 'lm*GkOu=GD*3Dy;4eSKVb9}0x}wshrgytN]$DQ6dI>hoI9ahc_G>o{<Z|e&)S9QU' );
define( 'LOGGED_IN_SALT',   'r~BaW1~/MI-!o] _5U$$y!CWGUBt;O0n!MM}I(->$L`s4?h>ec`$3zeQe[*+NG6%' );
define( 'NONCE_SALT',       '|.(y^2?:W?*IInFrHgTn/L|LqiT^Xx)N~nUF3gyVCl?xKI6a{YAJ6h&9IG*sY@@x' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'we_';

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

/** Local Development **/
define('FS_METHOD', 'direct');