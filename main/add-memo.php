<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<section class="add-memo">
<?php
//$customer_idは配列
$customer_id=[$_SESSION['customer']['id']];

//メモ編集
if (isset($_REQUEST['id'])) {
	// $sql=$pdo->prepare('select * from product where id=?');
	$sql=$pdo->prepare('select * from product LEFT JOIN category ON product.category_id = category.category_id where product.id=?');
	$sql->execute([$_REQUEST['id']]);
	
	$sql2=$pdo->query("select * from category where category.customer_id='" .$customer_id[0]."'");

	foreach ($sql as $row) {
		echo '<form action="add-memo-output.php" method="post">';
		// echo '<p>ID：', $row['id'], '</p>';
		echo '<dl>';
		echo '<dt>カテゴリー</dt>';
		echo '<dd>';
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
		echo '</dd>';

		echo '<dt>タイトル</dt>';
		echo '<dd>','<input type="text" name="name" value="', $row['name'],'">', '</dd>';

		echo '<dt>本文</dt>';
		echo '<dd>','<textarea name="price" value="" rows="10" cols="33">', $row['price'], '</textarea></dd>';

		echo '<dd class="memo-btn">';
		echo '<a class="bm-btn" href="favorite-insert.php?id=', $row['id'], '">ブックマーク</a>';
		echo '<input type="submit" value="保存">';
		echo '</dd>';

		echo '</dl>';

		echo '<input type="hidden" name="id" value="', $row['id'], '">';
		echo '<input type="hidden" name="customer_id" value="'.$_SESSION['customer']['id'].'">';
		
		echo '</form>';
	}
}
//新規メモ追加
else{
	echo '<form action="add-memo-output.php" method="post">';

	echo '<dl>';
	echo '<dt>カテゴリー</dt>';
	echo '<dd>';
	$sql2=$pdo->query("select * from category where category.customer_id='" .$customer_id[0]."'");
	echo '<select name="category_id">';
	echo '<option value=""></option>';
		foreach ($sql2 as $row2) {
			echo '<option value="',$row2['category_id'],'">', $row2['category_name'], '</option>';
		}
	echo '</select>';
	echo '</dd>';

	echo '<dt>タイトル</dt>';
	echo '<dd>','<input type="text" name="name" value="">', '</dd>';

	echo '<dt>本文</dt>';
	echo '<dd>','<textarea name="price" value="" rows="10" cols="33"></textarea>', '</dd>';

	echo '<dd class="memo-btn">';
	echo '<input type="submit" value="保存">';
	echo '</dd>';

	echo '</dl>';
	echo '<input type="hidden" name="customer_id" value="'.$_SESSION['customer']['id'].'">';

	echo '</form>';
}
?>
</section>
<?php require '../footer.php'; ?>