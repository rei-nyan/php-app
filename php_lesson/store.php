<?php
require_once('functions.php');

createData($_POST);
var_dump($_POST);
header('Location: ./index.php');
?>