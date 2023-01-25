<?php 
session_start();
require '../header.php';
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
	require 'search.php';
	//echo 'こんにちは、', $_SESSION['customer']['name'], 'さん。';
	require 'category.php';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>

<?php require '../footer.php'; ?>