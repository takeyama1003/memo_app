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

	$id=$_REQUEST['id'];

	$sql2=$pdo->prepare(
		'delete from product where id=?');
	$sql2->execute([$id]);

	echo 'メモを削除しました。';
	echo '<hr>';
} else {
	echo 'メモを削除するには、ログインしてください。';
}

?>
<?php require 'product-all.php'; ?>
<?php require '../footer.php'; ?>
