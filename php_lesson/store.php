<!-- フォームから送信されたデータを処理し、
 index.php にリダイレクトする処理を行う-->
 <?php
require_once('functions.php');

var_dump($_POST);
savePostedData($_POST);
//$postはフォームのデータを格納
header('Location: ./index.php');
// データを保存した後、ブラウザに対してリダイレクトを指示するための header 関数
?>