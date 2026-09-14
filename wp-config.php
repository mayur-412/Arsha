<?php
/** WordPress configuration for Render + MySQL. */

define( 'DB_NAME', getenv('DB_NAME') ?: 'arsha' );
define( 'DB_USER', getenv('DB_USER') ?: 'avnadmin' );
define( 'DB_PASSWORD', getenv('DB_PASSWORD') ?: '' );
define( 'DB_HOST', getenv('DB_HOST') ?: 'localhost' );
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         getenv('AUTH_KEY') ?: 'replace-this-key' );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY') ?: 'replace-this-key' );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY') ?: 'replace-this-key' );
define( 'NONCE_KEY',        getenv('NONCE_KEY') ?: 'replace-this-key' );
define( 'AUTH_SALT',        getenv('AUTH_SALT') ?: 'replace-this-salt' );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'replace-this-salt' );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT') ?: 'replace-this-salt' );
define( 'NONCE_SALT',       getenv('NONCE_SALT') ?: 'replace-this-salt' );

$table_prefix = 'wp_';
define( 'WP_DEBUG', false );

define( 'WP_HOME', getenv('WP_HOME') ?: 'http://localhost' );
define( 'WP_SITEURL', getenv('WP_SITEURL') ?: WP_HOME );

if ( ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}
if ( ! empty( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}
if ( ! empty( $_SERVER['HTTP_X_FORWARDED_PORT'] ) ) {
    $_SERVER['SERVER_PORT'] = $_SERVER['HTTP_X_FORWARDED_PORT'];
} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['SERVER_PORT'] = '443';
}

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
