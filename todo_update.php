<?php
// 入力項目のチェック
// POSTデータ確認
// var_dump($_POST);
// exit();

if (
    !isset($_POST['recipe_name']) || $_POST['recipe_name'] === '' ||
    !isset($_POST['howto']) || $_POST['howto'] === '' ||
    !isset($_POST['id']) || $_POST['id'] === ''
) {
    exit('paramError');
}

$recipe_name = $_POST['recipe_name'];
$howto = $_POST['howto'];
$id = $_POST['id'];



include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE recipes SET recipe_name=:recipe_name, howto=:howto, category=:category, difficulty=:difficulty, budget=:budget WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':recipe_name', $recipe_name, PDO::PARAM_STR);
$stmt->bindValue(':howto', $howto, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location:recipe_read.php');
exit();



