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
define('DB_NAME', 'aktivdata1');

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
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WN ?p>>9@4=^y2<7?xC,5WrE/0vtl]FzPydy!)Mc4,r> `1pu2GVzrD08Q(,cb1q');
define('SECURE_AUTH_KEY',  'T0hlL)53%%$lOLTa6k+Y}2rx,`K&o9{[gFagITJ4a>~wtCHaB;YqYIF*WiH%XQiH');
define('LOGGED_IN_KEY',    'v`-c7RR)+q3h3a6sC*0NK91Sfp66CrwZ#!O,5294D$>9^k 5 PV6Ml}-W6JKM)4U');
define('NONCE_KEY',        'eg/#`tE8sNK-C0~U(s6/9nelIqjH5r@Htd><Hmz3_w7;+z6`/S4@3D;)oDh0o}uS');
define('AUTH_SALT',        'T2J1.I!E]c$mvzmRp}QcZ5?AF1<+jZJciMCXXC=#O!hwI{-]1fkHklQ<55xr~>XO');
define('SECURE_AUTH_SALT', ')/TS6/QP`d+M9KA#Bq7 Xi/tNwJWA!@`R4q,!])scQyGPY/5] j*isdg}E8Q]N3z');
define('LOGGED_IN_SALT',   '8L7}*5[lqD4:$Zu$L3y>LqQOXk<NcKwNy?gTF%){A:FoXrb_}-tetHjAQ!#Wk4U^');
define('NONCE_SALT',       'D}Bk{[AiREqfGz.9h-UpdW#_:.[6]=nW-7#$GNu5IWW%UybtSBFl4RsyCLZo.jH_');

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
