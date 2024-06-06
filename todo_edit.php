<?php
include('functions.php');

// id受け取り
$id = $_GET['id'];


// DB接続
$pdo = connect_to_db();


// SQL実行
$sql = 'SELECT * FROM recipes WHERE id=:id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_STR);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
  <form action="todo_update.php" method="POST">
    <fieldset>
      <legend>設備導入事例リスト（編集画面）</legend>
      <a href="recipe_read.php">一覧画面</a>
      <div>
        設備名: <input type="text" name="recipe_name" value=" <?= $record['recipe_name'] ?>">
      </div>
      <div>
        導入手順: <textarea type="text" name="howto" cols="40" rows="4" maxlength="320" value="<?= $record['howto'] ?>"></textarea>
      </div>
      <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>