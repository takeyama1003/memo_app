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
if (isset($_SESSION['customer'])) {
	require 'search.php';
	//echo 'こんにちは、', $_SESSION['customer']['name'], 'さん。';
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