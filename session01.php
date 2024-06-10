<?php
// session変数を定義して値を入れよう
session_start();

// セッション変数に値を代入
$_SESSION['number'] = 100;
$_SESSION['text'] = 'Hello ,World';
$_SESSION['array'] = ['JavaScript', 'PHP', 'Swift', 'Rust'];
$_SESSION['PHP'] = ['A', 'B', 'C', 'D'];

echo"<pre>";
var_dump($_SESSION['array']);
echo"</pre>" ;
exit();

