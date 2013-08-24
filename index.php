<? 
//session_start(); //логин
//header('Content-type: text/html; charset=utf-8;');  //Установка заголовка
//$mysqli = new MySQLi;
//$mysqli->connect( 'localhost', 'root','','t_mvs'); 
//$mysqli->set_charset('utf8') or die('not set charset');// кодировка данных из бд
//mb_internal_encoding('UTF-8'); // хз как работает но работает
//$mysqli->select_db('t_mvs') or die('cannot connnect to database');

require 'config/config.php';
require 'auth/auth.php';
function __autoload($class)
{
    //echo $class.'<br>';
    require(LIBS.$class.".php");
}

$app = new Bootstrap();
$app->init();
?>