<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// if (isset($_SESSION['customer'])) {
	require 'db-connect.php';
	$sql=$pdo->prepare('insert into favorite values(?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo 'ブックマークに追加しました。';
	// echo '<hr>';
	require 'favorite.php';
// } else {
// 	echo 'お気に入りに商品を追加するには、ログインしてください。';
// }
?>
<?php require '../footer.php'; ?>
