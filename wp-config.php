<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testwork656' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '(iOy?C%(.S80;#-gv6r%%Ra=jA,ec~HU0hJY<W+<UINOj p|Fb{:^ox#EKhQ^Q]s' );
define( 'SECURE_AUTH_KEY',  'm|g],duU@JGC;x(M%+4).iBsU)aD?2P-ltZmT1J]5PtwH9vO[&v$28i7f`+ |+zo' );
define( 'LOGGED_IN_KEY',    'dW~M1h~3nrhzl@Ew>A3}~EGBj/Xf8QLFX}q]%kOuoYZw:>:{3u))u!V}A}{Q0ol/' );
define( 'NONCE_KEY',        '?3Jwi(f|hF#tK %et@@GO$c5WRHmFCSI7|33G_7$omn{C0c|d!)ip~+?sT+rXG1E' );
define( 'AUTH_SALT',        'jPyOX2#BnL5#=T(f+A1J^/]i=MH}vt%ouq!o![W$Gyf`r)Y:*^y4zSadMzsz}-N(' );
define( 'SECURE_AUTH_SALT', '[[Ai:-sAAJQ!91*(,=pxks;q<JoqZ$R(5(8Ey^1$R;`v6  8LmeRoVrd7ydjf|-N' );
define( 'LOGGED_IN_SALT',   '`eqS=Tb&_lwFBn1$m{;34FWZ{vo8V/9&]Z6*_F(3Jneqo_xd,{1Sd tqOcy$<<0,' );
define( 'NONCE_SALT',       '2X.HHXugLhg&eS*%ZbFhb#bS%}}EYLOf!OeSvx AE8YYpFKG erUe*}@yr=@CA=e' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
