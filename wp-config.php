<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'crifip_beta_wordpresscrifip');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'crifip_user');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'tigedefrein');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'AzJR7<G|C[dUuEJy>% OYtftjN5o=b&oY/db!K?K!+(!zpMx.0TQAob|0WME-|hI');
define('SECURE_AUTH_KEY',  'wtz<{P)D4RV|QO=2!H,+qUO)-<yjP|G`HQ>]Q.A2EN-pK>#QDWv5uJQyy$y[?[+.');
define('LOGGED_IN_KEY',    '$ee=I~X9{6Qf[)xEGt#m%t#U6i?(Q5XyOlsM_NHiuzEDud- ~,RiEDd$.6b0Xs^,');
define('NONCE_KEY',        '@<,-9p&8hU:HIH^s@)Ks&|*0{E}8NOiXkhcHc/Y:f.]Zm7VvGVBj~^yv0@S9Mqd6');
define('AUTH_SALT',        'wBLCHT4zrZq&O&~a=t+#ixuHL;@u>,|#zLMF9RYL}W8d|UQVB-B.a*+?hh/6;>Z+');
define('SECURE_AUTH_SALT', 'uFV;ledTK)L+:|vIx7I<CJ:cG=eK^3=w`EiHeyrK;g#LnL|e0=h{tUv^.tssD+e/');
define('LOGGED_IN_SALT',   '6q__==;*f8T?{/e.1AA^=a-F?*{bIaE 5cfd[3C:R.Oba(Q55;ceR`xnkXgN|K@)');
define('NONCE_SALT',       '/3+S%o&EjncIJ*{X@%,(PRg5lA)n~a~bb:hgM&]Z%P 5dk`D7&,f&i;kq+=+hL)S');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');