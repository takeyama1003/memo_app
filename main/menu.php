<nav>
<?php
if (isset($_SESSION['customer'])) {
    echo '<a href="index.php">ホーム</a>';
	echo '<a href="product.php">メモ</a>';
	echo '<a href="add-memo.php">新規メモ</a>';
	echo '<a href="category-show.php">カテゴリー</a>';
	echo '<a href="favorite-show.php">ブックマーク</a>';
    echo '<a href="customer-input.php">アカウント</a>';
    echo '<a href="javascript:void(0)" id="logout-btn" onclick="logoutBtnClick()">ログアウト</a>';
}
else {
    echo '<a href="customer-input.php">新規アカウント作成</a>';
	echo '<a href="login-input.php">ログイン</a>';
} 
?>
</nav>