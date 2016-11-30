<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'eagrariushome');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HO.,(/swyX7l*yu^f9Q;P}11UR(2zSgZSK<Gdlo68?sb8aIh~%txk<#ILRIq;}lL');
define('SECURE_AUTH_KEY',  '*z<z;pK%U6tn:q@5;xE&>khN!6S>Y]o<AU$T?7gK=fsp!xg(mbom$0a__iOj]x<k');
define('LOGGED_IN_KEY',    '&tFeto74z2~a%e*{u+yiHDsYtre4Ma&E?Pz0?Eb9,aXc}~F}OlVEGyEH3/[)}Q|x');
define('NONCE_KEY',        ',~ 9ztd9{vsx}_6m].4jd5X[in;Im+yl/9k!VTB>]8xG8,F;G;}uZ)d1E_~S!@?C');
define('AUTH_SALT',        'vC`l|sXg.,|^$_[4h_@fW#(_f~n@FWjO+Lxm|MG[!N!nnd<r3mDvnhI;ahN.8p8E');
define('SECURE_AUTH_SALT', '<Vh_2>~o<LJy1@k~Fk H:;gt1-6T-Y)F[Ul.rLUJZSDgNPXgY(kgiU?nNkw7=`:!');
define('LOGGED_IN_SALT',   'D1e)nX8l-6LxDE%z8m$KpFZW}l{A(r:9,uFv2[y+xCjd@US(:3m#Q:UU4@VT&~<p');
define('NONCE_SALT',       'JnG1v ms9%tz{2N>0Y6lF9{p:pos1!o~fo~MuUE;.lUoV, Swt~J;czQgx5T9#/W');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
