<?php

//для дб
define('HASH_PASSWORD_KEY', '09z8409r8,633·3┼2p9u╘gS5641c`1`E#╞Е5/9');
//для других хеш паролей
define('HASH_GENERAL_KEY', '09z8409r8,633·3┼2p9u╘gS5641c`1`E#╞Е5/9');

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvs_photo');
define('DB_USER', 'paxa');
define('DB_PASS', '1111');
define('HOST_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define('URL', 'http://photosquare_t.ru/');
define('MAIN_DIR', dirname(__FILE__));
define('LIBS', 'libs/');
define('THEME', 'maria');
define('THEME_PATH', HOST_ROOT . 'view/theme/' . THEME . 'index.php');
define('STORAGE_PREVIEW', $_SERVER['DOCUMENT_ROOT'] . '/storage/cache/previews/');
define('STORAGE_MEDIUM', $_SERVER['DOCUMENT_ROOT'] . '/storage/cache/medium/');
define('STORAGE_PHOTO', $_SERVER['DOCUMENT_ROOT'] . '/storage/cache/images/');
define('STORAGE_UPLOAD_IMAGE', $_SERVER['DOCUMENT_ROOT'] . '/storage/uploads/');
define('NO_ERROR', '1');


/*  flag = 1 картинка только подгрузилась 
 * 0 используется
 * -77 в корзине
 * id_state_link  -33  означает корзину
 */
?>