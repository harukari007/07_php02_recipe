<?php
session_start();
include('functions.php');
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>設備導入事例入力フォーム</title>
    <link rel="stylesheet" href="css/style.css ">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- フォーム入力画面を作成する(TOP) -->
    <form action="recipe_create.php" method="POST">
        <div class="robot">設備導入事例入力フォーム  【ユーザー名：<?= $_SESSION['username'] ?>】</div>
        <br>
        設備名：<input type="text" name="recipe_name" required>
        カテゴリ：
        <select name="category" id="">
            <option value="">選択してください</option>
            <option value="食品">食品</option>
            <option value="自動車">自動車</option>
            <option value="化粧品">化粧品</option>
        </select>
        <br>
        難易度：
        <input type="radio" name="difficulty" value="簡単">簡単
        <input type="radio" name="difficulty" value="普通" checked>普通
        <input type="radio" name="difficulty" value="難しい">難しい
        <br>
        予算：<input type="number" min="1" max="999999" name="budget">円
        <br>
        導入手順：
        <textarea name="howto" cols="40" rows="4" maxlength="320"></textarea>
        <br>
        <input type="submit" value="送信"></input>
    </form>
    <a href="recipe_read.php">導入手順一覧画面</a>

</body>