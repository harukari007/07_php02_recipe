<?php
// sessionをスタートしてidを再生成しよう．
// 旧idと新idを表示しよう．

session_start();

// idを取得する
$old_session_id = session_id();
// var_dump($old_id);
// exit();

// id再生成
session_regenerate_id(true);
$new_session_id = session_id();

$new_id=session_id();
// var_dump($new_id);
// exit();

// 新旧のidを画面に表示して更新されていることを確認
echo "<p>旧id: {$old_session_id}</p>";
echo "<p>新id: {$new_session_id}</p>";
exit();

// 指定したsession変数の削除
unset($_SESSION[key]);

// session情報の全削除
$_SESSION = array();

// ブラウザに保存した情報の有効期限を操作
setcookie(session_name(), '', time() - 42000, '/');

// session領域自体をを破壊
session_destroy();

