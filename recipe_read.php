<?php
session_start();
include('functions.php');
check_session_id();

$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM recipes;';

$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// SQL実行の処理

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
    <td>{$record["recipe_name"]}</td>
    <td>{$record["category"]}</td>
    <td>{$record["difficulty"]}</td>
    <td>{$record["budget"]}</td>
    <td>{$record["howto"]}</td>
    <td>
        <a href='todo_edit.php?id={$record["id"]}'>edit</a>
    </td>
    <td>
        <a href='todo_delete.php?id={$record["id"]}'>delete</a>
    </td>
    </tr>";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/read.css">
    <title>設備導入手順（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>設備導入手順（一覧画面） 【ユーザー名：<?= $_SESSION['username'] ?>】</legend>
        <a href="form.php">入力画面</a>
        <a href="todo_logout.php">ログアウト</a>
        <table>
            <thead>
                <tr>
                    <th>設備名</th>
                    <th>カテゴリ</th>
                    <th>難易度</th>
                    <th>予算（万円）</th>
                    <th>導入手順</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>

    <script>
        // PHPのデータをJSに渡す
        const resultArray = <?= json_encode($result) ?>;
        // 配列からタグ生成し，#outputに表示する
    </script>
</body>

</html>