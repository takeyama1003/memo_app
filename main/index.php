<?php session_start(); ?>
<?php require '../header.php'; ?>
<!-- <//?php  ?> -->
<?php
// unset($_SESSION['customer']);
require 'db-connect.php';
$sql=$pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'], 'name'=>$row['name'], 'login'=>$row['login'], 
		'password'=>$row['password']];
}
require 'menu.php';

if (isset($_SESSION['customer'])) {

	echo '<form action="product.php" method="post">';

	//検索
	echo '<input type="text" name="keyword">';
	echo '<input type="submit" value="検索">';
	echo '</form>';
	echo '<hr>';

	echo 'こんにちは、', $_SESSION['customer']['name'], 'さん。';

	require 'category.php';

	// echo '<table>';
	// echo '<tr><th>ID</th><th>タイトル</th><th>本文</th><th>カテゴリー</th></tr>';
	// $sql=$pdo->prepare(
	// 	'select * from memo_category2 where memo_category2.customer_id=?');
	// $sql->execute([$_SESSION['customer']['id']]);
	// foreach ($sql as $row) {
	// 	$id=$row['id'];
	// 	echo '<tr>';
	// 	echo '<td>', $id, '</td>';
	// 	echo '<td>';
	// 	echo '<a href="add-memo.php?id=', $id, '">', $row['name'], '</a>';
	// 	echo '</td>';
	// 	echo '<td>', $row['price'], '</td>';
	// 	echo '<td>';
	// 	echo '<a href="product.php?category_name=', $row['category_name'], '">', $row['category_name'], '</a>';
	// 	echo '</td>';
	// 	echo '</tr>';
	// }
	// echo '</table>';

} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>


<?php require '../footer.php'; ?>
