<?php session_start(); ?>
<?php unset($_SESSION['customer']); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// if (isset($_SESSION['customer'])) {
// 	require 'menu.php'; 
// } 
?>
<!-- <form action="login-output.php" method="post"> -->
<form action="index.php" method="post">
ログイン名<input type="text" name="login"><br>
パスワード<input type="password" name="password"><br>
<input type="submit" value="ログイン">
</form>
<!-- <a href="customer-input.php">新規会員登録</a> -->
<?php require '../footer.php'; ?>
