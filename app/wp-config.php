<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'dizzain-template' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r}E_oAYq](jCL[oTyOa$M6^BEtFLo+b-U*}6Sj}U=o}_Oe{ ?UpZBz2|Q,]:#}9P' );
define( 'SECURE_AUTH_KEY',  '@Da^G_[ka{4Gfp.Fs 7#>Rq;?SR`f-@%n,c:`%q(ck{YpQ8mdJO:<F^k`c8IrArn' );
define( 'LOGGED_IN_KEY',    ')*ZIk~>%51=3%jX60Ci$R1opNs2]-{:ah)BC5$hPNs;QAOcS<^qL->NvhK>.3U.!' );
define( 'NONCE_KEY',        'taLnU4wpJ{Ss?>mrYY;&ow?/b0bk}4}gHY#MA1B*oqQF*nC>LS7Ov 3a)}E_jt?C' );
define( 'AUTH_SALT',        'eylJB]ffnP0Vo_(C28}[N>#>LA0~D!L<6Af*KA+pD_TC#mHwv3o<H*HO9,_R{Wi_' );
define( 'SECURE_AUTH_SALT', '8p$,BNtWM:|^v=@vRSmqF,+,xp}6R+Xr|z;}:u6w)M>&z7k5IUIMThx9B%%ujlKN' );
define( 'LOGGED_IN_SALT',   '$*peG8S9P)]~*:+4mD4MxE$Q+/Oc(xInakcFfwd@Y.| _S?zGj|Sf!3telw)6=.0' );
define( 'NONCE_SALT',       '.P74SK<=XwlDuV@6=UvnCWUsig}baAYr}7XVpH&_[I19/bH3`;>#fK/n*Oxrw>K ' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
