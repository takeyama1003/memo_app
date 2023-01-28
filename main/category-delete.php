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

	$sql=$pdo->prepare(
		'delete from category where category_id=?');
	$sql->execute([$id]);

	//未分類に設定
	$sql2=$pdo->prepare(
		"UPDATE product SET category_id = 10 WHERE category_id = $id ");
	$sql2->execute([$id]);

	echo 'カテゴリーを削除しました。';
	// echo '<hr>';
} else {
	echo 'カテゴリーを削除するには、ログインしてください。';
}
// require 'category.php';
?>
<?php require '../footer.php'; ?>
