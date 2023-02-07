<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'db-connect.php';
if (isset($_REQUEST['category_id'])) {
	$sql=$pdo->prepare('update category set category_name=? where category_id=?');
	if (empty($_REQUEST['category_name'])) {
		echo 'カテゴリー名を入力してください。';
	}
	else if ($sql->execute(
		[htmlspecialchars($_REQUEST['category_name']), $_REQUEST['category_id']]
	)) {
		echo '更新しました。';
	} 
	else {
		echo '更新に失敗しました。';
	}
}
else{
	$sql=$pdo->prepare('insert into category values(null, ?, ?)');
	if (empty($_REQUEST['name'])) {
		echo 'カテゴリー名を入力してください。';
	}
	else if ($sql->execute(
		[htmlspecialchars($_REQUEST['name']), $_REQUEST['customer_id']]
	)) {
		echo '追加しました。';
	} 
	else {
		echo '追加に失敗しました。';
	}
}

?>
<?php require '../footer.php'; ?>
