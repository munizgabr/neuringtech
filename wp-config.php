<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'neuringtech' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wpPhS*<J&||d}=jJ!ziqmB CBWuOw%U^920z yVFW=6o@17@1az6Kv.D_NlR^r(S' );
define( 'SECURE_AUTH_KEY',  ':AU~Hz4.e!3[!Cr;fwpZ>.Oq=pGIdU!SOOF7%r4nkrAZ0[+_*k4L@;Uy:d[hg_ug' );
define( 'LOGGED_IN_KEY',    'gJHw|#)L=2`XEP8QT0lSAc{J_H |XqhOT+eRw?W9Zk ~[<y676doW|<YL5wq2<9,' );
define( 'NONCE_KEY',        '=T7b}IPJ5q@|R0p,)<M#axd>+sUom#5Ue{w.SO@hz=!^z;OOu7EwzZI!/c:?kjcs' );
define( 'AUTH_SALT',        'rJ{D>3PR/YlAhT~;?TYK#OFM-qq4V~e3VxrI|DPkF@4D:BXnx@N:UG??c :[*qKZ' );
define( 'SECURE_AUTH_SALT', 'ni|INUo89dhOe2_Rp{Xj HaWh_:eL|P.PO_x#q*_6Ox^5(9EkMh9e|Eu=| f!vmZ' );
define( 'LOGGED_IN_SALT',   'eK* uN>jqvE(H0BP}$:5yFIOHMQPEo:601zz$m-<n)5?y1wT%26}lUg`T!r5%@kT' );
define( 'NONCE_SALT',       'j<m_Cct|G`h|C:T91s+(=P4+/ZZ6<{6-*<J4[,`Fb<$qyp:^]jK~17vJ$.^}s#XP' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'ntech_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
