<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css ">
  <title>導入事例一覧 ログイン画面</title>
</head>

<body>

  <form action="todo_login_act.php" method="POST">
    <fieldset>
      <legend>ロボット導入事例入力 ログイン画面</legend>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="todo_register.php">ユーザ登録する</a>
    </fieldset>
  </form>

</body>

</html>