<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'db-connect.php';
if (isset($_REQUEST['id'])) {
	$sql=$pdo->prepare('update product set name=?, price=?, category_id=?, customer_id=? where id=?');
	if (empty($_REQUEST['name'])) {
		echo 'タイトルを入力してください。';
	}
	else if (empty($_REQUEST['price'])) {
		echo '本文を入力してください。';
	}
	else if (empty($_REQUEST['category_id'])) {
		echo 'カテゴリーを入力してください。';
	}
	else if ($sql->execute(
		[htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], $_REQUEST['category_id'], $_REQUEST['customer_id'], $_REQUEST['id']]
	)) {
		echo '更新しました。';
	} 
	else {
		echo '更新に失敗しました。';
		// echo '<p>', $_REQUEST['name'], $_REQUEST['price'], $_REQUEST['id'], '</p>';
	}
}
else{
	$sql=$pdo->prepare('insert into product values(null, ?, ?, ?, ?)');
	if (empty($_REQUEST['name'])) {
		echo 'タイトルを入力してください。';
	}
	else if (empty($_REQUEST['price'])) {
		echo '本文を入力してください。';
	}
	else if (empty($_REQUEST['category_id'])) {
		echo 'カテゴリーを入力してください。';
	}
	else if ($sql->execute(
		[htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], $_REQUEST['category_id'], $_REQUEST['customer_id']]
	)) {
		echo '追加しました。';
	} 
	else {
		echo '追加に失敗しました。';
	}
}

?>
<?php require '../footer.php'; ?>
