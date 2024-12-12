<?php
require_once('functions.php');
setToken(); // 追記
$todo = getSelectedTodo($_GET['id']);
// $_GET['id'] でURLクエリパラメータ（index.phpでURLのパラメータとして渡したid）を取得し、
// それをそのままfunctions.phpのgetSelectedTodo関数に渡す
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
<?php if (!empty($_SESSION['err'])): ?>
    <p><?= $_SESSION['err']; ?></p>
  <?php endif; ?><!-- 追記 -->
  <form action="store.php" method="post">
  <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">  <!--追記-->
    <input type="hidden" name="id" value="<?= e($_GET['id']); ?>">
    <input type="text" name="content" value="<?= e($todo) ?>">
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
  <?php unsetError(); ?>
</body>
</html>
