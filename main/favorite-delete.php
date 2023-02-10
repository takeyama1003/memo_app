<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	require 'db-connect.php';
	$sql=$pdo->prepare(
		'delete from favorite where customer_id=? and product_id=?');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo 'ブックマークから1件のメモを削除しました。';
} else {
	echo 'ブックマークからメモを削除するには、ログインしてください。';
}
?>
<?php require 'favorite.php'; ?>
<?php require '../footer.php'; ?>
