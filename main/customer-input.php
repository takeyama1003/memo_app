<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<section class="customer-input">
<?php
$name=$login=$password='';
if (isset($_SESSION['customer'])) {
	$name=$_SESSION['customer']['name'];
	//$address=$_SESSION['customer']['address'];
	$login=$_SESSION['customer']['login'];
	$password=$_SESSION['customer']['password'];
}else{
	echo '<p>新規でアカウントを作成します。</p>';
	$returnText = '戻る＞';
}

echo '<form action="customer-output.php" method="post">';
echo '<dl>';

echo '<dt>お名前</dt>';
echo '<dd><input type="text" name="name" value="', $name,'"></dd>';

echo '<dt>ID</dt>';
echo '<dd><input type="text" name="login" value="', $login,'"></dd>';

echo '<dt>パスワード</dt>';
echo '<dd><input type="password" name="password" value="', $password, '"></dd>';

echo '<dd>';
echo '<a href="login-input.php">', $returnText,'</a>';
echo '<input type="submit" value="確定"></dd>';

// echo '<input type="hidden" name="uncategorized" value="未分類">';

echo '</dd>';

echo '</dl>';
echo '</form>';
?>
</section>
<?php require '../footer.php'; ?>
