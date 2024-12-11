<!-- 設定ファイル -->
<?php

ini_set('display_errors', 1);
// エラーメッセージを表示する設定
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// すべてのエラーレベルを報告するように設定
set_error_handler('errorHandler');
// エラーが発生した際にどのように処理するかを定義
function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    if ($errNo === E_NOTICE || $errNo === E_WARNING) {
        $errTitle = $errNo === E_NOTICE ? 'Notice' : 'Warning';
        $escapedErrStr = htmlspecialchars($errStr);
        $escapedErrFile = htmlspecialchars($errFile);

        echo '<b>' . $errTitle . '</b>: ' . $escapedErrStr . ' in <b>' . $escapedErrFile . '</b> on line <b>' . $errLine . '</b>';
        exit;
    }

    return false;
}
define('DSN', 'mysql:dbname=php_lesson;host=localhost;unix_socket=/tmp/mysql.sock');
define('DB_USER', 'root');
define('DB_PASSWORD', 'reirei43');
?>