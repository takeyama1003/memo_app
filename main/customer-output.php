<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<section style="text-align: center;">
<?php
require 'db-connect.php';
if (isset($_SESSION['customer'])) {//ログインしてて、このid以外で同じログイン名がないかチェック
	$id=$_SESSION['customer']['id'];
	$sql=$pdo->prepare('select * from customer where id!=? and login=?');
	$sql->execute([$id, $_REQUEST['login']]);
} else {//ログインしてなくて、同じログイン名がないかチェック
	$sql=$pdo->prepare('select * from customer where login=?');
	$sql->execute([$_REQUEST['login']]);
}

if (empty($sql->fetchAll())) {//空かチェック
	if (isset($_SESSION['customer'])) {
		$sql=$pdo->prepare('update customer set name=?, '.
			'login=?, password=? where id=?');
		$sql->execute([
			$_REQUEST['name'], $_REQUEST['login'], $_REQUEST['password'], $id]);
		$_SESSION['customer']=[
			'id'=>$id, 'name'=>$_REQUEST['name'], 'login'=>$_REQUEST['login'], 
			'password'=>$_REQUEST['password']];
		echo 'アカウント情報を更新しました。';
	} else {
		$sql=$pdo->prepare('insert into customer values(null,?,?,?)');
		$sql->execute([
			$_REQUEST['name'],$_REQUEST['login'], $_REQUEST['password']]);

		echo 'アカウント情報を登録しました。<br><br>';
		echo '<a href="login-input.php">ログイン＞</a>';
	}
} else {
	echo 'ログインIDがすでに使用されていますので、変更してください。';
}
?>
</section>
<?php require '../footer.php'; ?>
