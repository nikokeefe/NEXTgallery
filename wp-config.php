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
define('DB_NAME', 'nextgallery');

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
define('AUTH_KEY',         '?a3XQefRV#NVtANEjm(:|f_mW2.]cJAep$xS#M]S*e*P3;7_R*W]*.*@GD]9WJ8-');
define('SECURE_AUTH_KEY',  '*-I]k8[OuFI@g6e2,8J-T<uKPAIf_lr.7+SC$:uibK$sGqGD@kT;E{7Nvd)$fZyG');
define('LOGGED_IN_KEY',    '(<YBd(2=f+uL}=^:$3]a@aDAj7n#:*(M8XCS|(LPT:.EO:>+01a~5!%WtLVCu0$-');
define('NONCE_KEY',        'yD@{ngR(IBJaT0<?{),YILoB7#q,Zu6=;V$)u!X]Vs(u-64{e@~&rB3L1| *9G,g');
define('AUTH_SALT',        'WO}A&DvqcmhLO;t}Q`W2%&1/qvF(9+`jO>s4>}L}p@HLIjr>Uy%!S3.[Nm[kg?1U');
define('SECURE_AUTH_SALT', '(L?^s0cv,N*JH?baBoCZhBnnv97r22s> nbJ8T=fg]O}hRpM@#AzqRF[MVr8Dwfj');
define('LOGGED_IN_SALT',   'VjFHhrGoyu?h8C=7;9Y;#K_F)L5iyQbcmnbkqIq*JlPI!V>|7;?]{N~fjK%x7+1d');
define('NONCE_SALT',       'iP#qsT#u%n3wnQ{K@S]k}|S.%}vl$Z2WwGK+oT1XI9x)#j]ow#[QBsCKew5`h!]+');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
