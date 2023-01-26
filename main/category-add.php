<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<section class="category-add">
<?php
if (isset($_REQUEST['id'])) {
	$sql=$pdo->prepare('select * from category where category_id=?');
	$sql->execute([$_REQUEST['id']]);
	foreach ($sql as $row) {
		echo '<form action="category-add-output.php" method="post">';

		echo '<p>カテゴリー名</p>';
		//echo '<p>ID：', $row['category_id'], '</p>';

		echo '<p>';
		echo '<input type="text" name="category_name" value="', $row['category_name'],'">';
		echo '<input type="submit" value="保存">';
		echo '</p>';

		echo '<input type="hidden" name="category_id" value="', $row['category_id'], '">';
		echo '</form>';
	}
}
else{
	echo '<form action="category-add-output.php" method="post">';

	echo '<p>カテゴリー名</p>';
	echo '<p>';
	echo '<input type="text" name="name" value="">';
	echo '<input type="submit" value="保存">';
	echo '</p>';
	
	echo '</form>';
}
?>
</section>
<?php require '../footer.php'; ?>