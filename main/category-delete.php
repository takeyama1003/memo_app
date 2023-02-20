<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
//$customer_idは配列
$customer_id=[$_SESSION['customer']['id']];

if (isset($_SESSION['customer'])) {
	require 'db-connect.php';

	$id=$_REQUEST['id'];

	$sql=$pdo->prepare(
		'delete from category where category_id=?');
	$sql->execute([$id]);

	//カスタマーID && 未分類
	$sql3=$pdo->query("select * from category where category.customer_id='" .$customer_id[0]."'"." AND category_name = '未分類'");

	//未分類のカテゴリーID格納
	foreach ($sql3 as $row3) {
		$categoryId = $row3['category_id'];
	}

	//未分類に設定
	$sql2=$pdo->prepare(
		"UPDATE product SET category_id =".$categoryId." WHERE category_id = $id ");
	$sql2->execute([$id]);

	echo 'カテゴリーを削除しました。';
	
} else {
	echo 'カテゴリーを削除するには、ログインしてください。';
}
?>
<?php require '../footer.php'; ?>
