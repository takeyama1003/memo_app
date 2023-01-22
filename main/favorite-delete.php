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
	echo 'ブックマークからメモを削除しました。';
	echo '<hr>';
} else {
	echo 'ブックマークからメモを削除するには、ログインしてください。';
}
require 'favorite.php';
?>
<?php require '../footer.php'; ?>
