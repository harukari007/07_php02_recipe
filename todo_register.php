<?php
session_start();
include('functions.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/register.css">
  <title>設備導入事例リスト ユーザ登録画面</title>
</head>

<body>
  <form action="todo_register_act.php" method="POST">
    <fieldset>
      <legend>設備導入事例リスト ユーザ登録画面</legend>
      <div>
        ユーザネーム: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <a href ="todo_register_act.php">登録</a>
      </div>
      <a href="todo_login.php">ログイン</a>
    </fieldset>
  </form>

</body>

</html>