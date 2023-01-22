<?php session_start(); ?>
<?php unset($_SESSION['customer']); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	echo '<div>ログアウトしました。</div>';
} else {
	// echo '<div>すでにログアウトしています。</div>';
	echo '<div>ログアウトしました。</div>';
}
//echo '<a href="login-input.php">ログイン</a>';
?>
<?php require '../footer.php'; ?>
