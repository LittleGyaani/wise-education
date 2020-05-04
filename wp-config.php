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
define('DB_NAME', 'wise_education_final_DB');

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
define('AUTH_KEY',         'wlgG!Ja-K@/B}&1k`ZF!j#j:I;-]?9W|p#V>UhG-93uC9<?-0]5{k(6MGg?ef=5|');
define('SECURE_AUTH_KEY',  ' 0wCoTjYA1+oDEh)Um,AM^No !t$orQtJ`*$_Kh&Hw6bJei(Ls}yWa<}mB4G:i8v');
define('LOGGED_IN_KEY',    'z]5p<HN~42726>d{v;n.)Se|z`(o~+L[dK2:i4@0[,z`jat;I8LeT[q]65Lh~|]q');
define('NONCE_KEY',        '.(QO[bsB>2F.Pfxp]v7]x9o5?3.A}Q0(@:88X@=C:Ilm+mCSb}vlX?|.oY>&wP_|');
define('AUTH_SALT',        'W*)/<zG>554:*Gc)LfCbKEMz/x%U{.}u#zrsa7)S{)B!h; :[-?Cf%n{r7.[Xs|%');
define('SECURE_AUTH_SALT', ';((VP|n_2VvZghpDcAau)^IwJ!%R=Cu#:-Q!o 7W^o&s_5]~RwDhSAT3E/mBn0Kv');
define('LOGGED_IN_SALT',   'E}ZD%{H]UD-&b+kJ6Ofa%c^;<X@.cu)Zp@xI<r~o|M~yR89aeM):$PU/FpLr{`9x');
define('NONCE_SALT',       'u@+Ls-:n7!XDmR8]*@`VWxNPChsY(nydvZ,.pVjpg~F&+`:w=@[^6U[h0Lu|D6K#');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD','direct');