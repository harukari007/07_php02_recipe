<?php
// POSTデータ確認
// var_dump($_POST);
// exit();
    // タイムゾーンを日本時間に設定
    // date_default_timezone_set('Asia/Tokyo');
    // print_r($_POST);
    
    echo htmlspecialchars($_POST['recipe_name'], ENT_QUOTES, 'UTF-8');
    // デバック用の関数
    echo "<br>";

    // カテゴリー事の関数、条件分岐
if ($_POST['category'] === '食品') echo "食品";
if ($_POST['category'] === '自動車') echo "自動車";
if ($_POST['category'] === '化粧品') echo "化粧品";
echo "<br>";

if ($_POST['difficulty'] === '簡単'){
    echo "簡単";
} elseif ($_POST['difficulty']==='普通'){
    echo "普通";
} elseif($_POST['difficulty']==='難しい'){
    echo "難しい";
}
echo "<br>";

// 入力内容が数字であるかを確認する為の条件を指定する
if (is_numeric($_POST['budget'])) {
    echo number_format($_POST['budget']);
}
echo "<br>";

// nl2br関数を活用して、改行コードを反映させる
echo nl2br(htmlspecialchars($_POST['howto'],ENT_QUOTES,'UTF-8'));
echo "<br>";

$recipe_name = $_POST['recipe_name'];
$category = $_POST['category'];
$difficulty = $_POST['difficulty'];
$budget = $_POST['budget'];
$howto = $_POST['howto'];


include('functions.php');
$pdo = connect_to_db();

// // 各種項目設定
// $dbn = 'mysql:dbname=gs_lab10_01;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// // DB接続
// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// }

// DB接続
if (
    !isset($_POST['recipe_name']) || $_POST['recipe_name'] === '' ||
    !isset($_POST['category']) || $_POST['category'] === '' ||
    !isset($_POST['difficulty']) || $_POST['difficulty'] === '' ||
    !isset($_POST['budget']) || $_POST['budget'] === '' ||
    !isset($_POST['howto']) || $_POST['howto'] === ''
) {
    exit('接続されていません');
}


// SQL作成&実行

$sql = 'INSERT INTO recipes (id, recipe_name, category, difficulty, budget,howto) VALUES (NULL, :recipe_name, :category, :difficulty, :budget,:howto)';
$stmt = $pdo->prepare($sql);

// バインド変数を設定 仮置きする、
$stmt->bindValue(':recipe_name', $recipe_name, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_STR);
$stmt->bindValue(':budget', $budget, PDO::PARAM_STR);
$stmt->bindValue(':howto', $howto, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
    // 動かしている場所
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
    // SQL文のエラーが一番多い
}

header('Location:form.html');
exit();