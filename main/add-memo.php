<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'db-connect.php';
if (isset($_REQUEST['id'])) {
	// $sql=$pdo->prepare('select * from product where id=?');
	$sql=$pdo->prepare('select * from product LEFT JOIN category ON product.category_id = category.category_id where product.id=?');
	$sql->execute([$_REQUEST['id']]);
	$sql2=$pdo->query('select * from category');
	foreach ($sql as $row) {
		echo '<form action="add-memo-output.php" method="post">';
		echo '<p>ID：', $row['id'], '</p>';
		echo '<p>カテゴリー：';
		echo '<select name="category_id">';
		//echo '<option value=""></option>';
			foreach ($sql2 as $row2) {
				if($row2['category_id'] == $row['category_id']){
					echo '<option value="',$row2['category_id'],'" selected>', $row2['category_name'], '</option>';
				}else{
					echo '<option value="',$row2['category_id'],'">', $row2['category_name'], '</option>';
				}
			}
		echo '</select>';
		echo '</p>';
		// echo '<p>カテゴリー：','<input type="text" name="category_id" value="', $row['category_name'],'">', '</p>';

		echo '<p>タイトル：','<input type="text" name="name" value="', $row['name'],'">', '</p>';
		echo '<p>本文：','<textarea name="price" value="" rows="5" cols="33">', $row['price'], '</textarea></p>';
		echo '<input type="hidden" name="id" value="', $row['id'], '">';
		echo '<input type="submit" value="保存">';
		echo '<input type="hidden" name="customer_id" value="'.$_SESSION['customer']['id'].'">';
		echo '</form>';
		echo '<p><a href="favorite-insert.php?id=', $row['id'], '">ブックマーク</a></p>';
	}
}
else{
	echo '<form action="add-memo-output.php" method="post">';
	echo '<table>';
	echo '<tr><td>カテゴリー</td><td>';
	$sql2=$pdo->query('select * from category');
	echo '<select name="category_id">';
	echo '<option value=""></option>';
		foreach ($sql2 as $row2) {
			echo '<option value="',$row2['category_id'],'">', $row2['category_name'], '</option>';
		}
	echo '</select>';
	// echo '<input type="text" name="category_id" value="">';
	echo '</td></tr>';
	echo '<tr><td>タイトル</td><td>';
	echo '<input type="text" name="name" value="">';
	echo '</td></tr>';
	echo '<tr><td>本文</td><td>';
	echo '<textarea name="price" value="" rows="5" cols="33"></textarea>';
	echo '</td></tr>';
	echo '</table>';
	echo '<input type="submit" value="保存">';
	echo '<input type="hidden" name="customer_id" value="'.$_SESSION['customer']['id'].'">';
	echo '</form>';
}
?>
<?php require '../footer.php'; ?>
