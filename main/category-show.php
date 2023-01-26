<?php session_start(); ?>
<?php
if (!isset($_SESSION['customer'])) {
	header('Location: https://one.main.jp/memo_app/main/login-input.php');
} 
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
	echo '<div class="btn">';
	echo '<a href="category-add.php">カテゴリー追加</a>';
	echo '</div>';
?>
<?php require 'category.php'; ?>
<?php require '../footer.php'; ?>
