<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_theme_dev' );

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
define( 'AUTH_KEY',         '0+bAwnn?gTg@krj)OWQL:m~8}qNq3NO4Acu54DBUrzG}l{C_(*BoqpDz,U~2*oQS' );
define( 'SECURE_AUTH_KEY',  '=I51RA3#:M.:1Z-:Ki2bGdTN_S dttxnVl~>Rc=ZgZWT[ph2g.c<-NeB1]YT%C1y' );
define( 'LOGGED_IN_KEY',    '>auARXW+9*F%p$zuZMR*r0u1#KxdN?}wm-&dK4UGW3(v>:$_LAGvwXAmMo2l;?4S' );
define( 'NONCE_KEY',        't){op9qmt?io:,d]PN?=vO Tq!JnDR-O 6?pel7<jzV&^BWePX:{_Q5xR8*C<I~F' );
define( 'AUTH_SALT',        'UQqlFblO1cmG:>O Su6N>LYi^%j{{!EAl_{ qt>,.c]SP.P:hYyEjCz#Q%Pn(e^}' );
define( 'SECURE_AUTH_SALT', '2nCV=c4S~.>0][Lv^P7{?0Vm(6Z#g(=ZuUwZf|yz~ZdoLdTRFmH{h<t:.rb&r%R8' );
define( 'LOGGED_IN_SALT',   'OSn+f1HY<kI@C.p^NYnG9cz#%kjw4.LC*~?g~3NIOLU6PHuT :I,=.w^U9j1spXW' );
define( 'NONCE_SALT',       'JdEvQ{}2U0ove1V</0{*HO~bo+Z$YWApousv/b;v3<r?Z|/1!-Pu!i=w5eiTU3fj' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tbl_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}


# defining wp-content/uploads to avoid the error while uploading files
define( 'UPLOADS', 'wp-content/uploads', 755);
// $uploads_dir = wp_upload_dir(); // Get the uploads directory path

// // Define the desired directory permissions (e.g., 755 for read/write/execute for owner, read/execute for group and others)
// $desired_permissions = 0755;

// // Create the directory if it doesn't exist
// if (!is_dir($uploads_dir['basedir'])) {
//     mkdir($uploads_dir['basedir'], $desired_permissions, true);
// }

// // Change the directory permissions
// if (is_dir($uploads_dir['basedir'])) {
//     chmod($uploads_dir['basedir'], $desired_permissions);
// }

// // You can check if the permissions were successfully changed
// if (fileperms($uploads_dir['basedir']) === $desired_permissions) {
//     echo 'Permissions have been successfully changed.';
// } else {
//     echo 'Failed to change permissions.';
// }



/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
