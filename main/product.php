<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<form action="product.php" method="post">
<!-- 商品検索 -->
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
<hr>
<?php require 'product-all.php'; ?>
<?php require '../footer.php'; ?>
