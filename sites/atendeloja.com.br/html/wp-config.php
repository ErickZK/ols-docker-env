<?php
define( 'WP_CACHE', true );




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
 * This has been slightly modified (to read environment variables) for use in Docker.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */


// ** Database settings - You can get this info from your web host ** //
/** O nome do banco de dados */
/** O nome do banco de dados */
define( 'DB_NAME',     'wp_atendeloja' );

/** Usuário do banco de dados */
define( 'DB_USER',     'wp_atendeloja' );

/** Senha do banco de dados */
define( 'DB_PASSWORD', '137025' );

/** Host do banco de dados */
define( 'DB_HOST',     'mysql' );

/** Charset do banco de dados — pode ficar assim */
define( 'DB_CHARSET',  'utf8' );

/** Collate — normalmente deixa vazio */
define( 'DB_COLLATE',  '' );

define('WP_REDIS_HOST', 'ols-docker-env-redis-1'); // provavelmente configurado assim
define('WP_REDIS_PORT', 6379);

/**
 * Docker image fallback values above are sourced from the official WordPress installation wizard:
 * https://github.com/WordPress/WordPress/blob/1356f6537220ffdc32b9dad2a6cdbe2d010b7a88/wp-admin/setup-config.php#L224-L238
 * (However, using "example username" and "example password" in your database is strongly discouraged.  Please use strong, random credentials!)
 */




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
 * 
 */
 
define('FS_METHOD', 'direct');
define( 'FS_CHMOD_DIR', 0755 );
define( 'FS_CHMOD_FILE', 0644 );
define( 'DISABLE_WP_CRON', true );
define( 'WP_HTTP_BLOCK_EXTERNAL', false );

define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );
define('JWT_AUTH_SECRET_KEY', '8ad05b42b7034f9ff904d2b430c0d1ef62c7be062c20b3f1bf5f6ab03ebd40c641fa6957c28644b61b3d992ad8b889528e3d9622f9a3b520c074ba75472ebaa9a581045d0623b5268f64ac2a47f8ed3f6880546a35d6dfd5d55e460a68799a5608bbec0c9e9ae9b8a0545e668703bca846cb12522a99cb69efda9a8c7e4874da6fb68c41ca84e29e71245b7148bad530652bcbb7ea47263f109a1114fe8acffe98d605b098263e3580323f991c5bf03354c04def5246ff24cf438533404630e847df459cc938d03e4a996bad5d78a9936dff6bd134092c1c9a2fb02806318238f58f7b220d39b73e425708b53cce4302fc71404529fb917b5dfabbf954f9e2b1');
define('JWT_AUTH_CORS_ENABLE', true);
// (See also https://wordpress.stackexchange.com/a/152905/199287)

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
//define( 'WP_DEBUG', !!getenv_docker('WORDPRESS_DEBUG', '') );

/* Add any custom values between this line and the "stop editing" line. */

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also https://wordpress.org/support/article/administration-over-ssl/#using-a-reverse-proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
	$_SERVER['HTTPS'] = 'on';
}
// (we include this by default because reverse proxying is extremely common in container environments)

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';