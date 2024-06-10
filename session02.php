<?php
// sessionに保存されている変数を取り出して表示しよう
session_start();

echo "<pre>";
var_dump($_SESSION['array']);
echo "</pre>";
exit();