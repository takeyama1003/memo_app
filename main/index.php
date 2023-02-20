<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php 
$sql=$pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'], 'name'=>$row['name'], 'login'=>$row['login'], 
		'password'=>$row['password']];
}
?>
<?php require 'menu.php'; ?>
<?php 
//$customer_idは配列
$customer_id=[$_SESSION['customer']['id']];

if (isset($_SESSION['customer'])) {
	require 'search.php';
	//echo 'こんにちは、', $_SESSION['customer']['name'], 'さん。';
	
	$sql2=$pdo->query("select * from category where category.customer_id='" .$customer_id[0]."'"." AND category_name = '未分類'");//カスタマーID && 未分類

	foreach ($sql2 as $row2) {
		$categoryId = $row2['category_name'];
	}

	//未分類がなければ追加
	if(!$categoryId){
		$sql3=$pdo->prepare('insert into category values(null, ?, ?)');
		$sql3->execute(['未分類', $customer_id[0]]);
	}

	require 'category.php';

} 
else {
	echo '<section class="loginErrMessage">';
	echo '<p>';
	echo 'ログインIDまたはパスワードが違います。';
	echo '</p>';
	echo '</section>';
}
?>
<?php require '../footer.php'; ?>