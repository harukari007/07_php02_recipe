<?php

include('functions.php');
$pdo = connect_to_db();

// // DB接続
// $dbn = 'mysql:dbname=gs_lab10_01;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// }


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
// データが配列で格納されているか確認する為のコマンド
// echo "<pre>";
// var_dump($result);
// echo"</pre>";
// exit();

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
    <title>設備導入手順（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>設備導入手順（一覧画面）</legend>
        <a href="form.html">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>設備名</th>
                    <th>カテゴリ</th>
                    <th>難易度</th>
                    <th>予算（万円）</th>
                    <th>導入手順</th>
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