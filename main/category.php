<?php
// if (isset($_SESSION['customer'])) {
	
	echo '<table>';
	echo '<tr><th>ID</th><th>カテゴリー</th>';
	// echo '<th>本文</th><th></th></tr>';
	echo '<th></th></tr>';
	require 'db-connect.php';
	$sql=$pdo->query('select * from category where category_id not in (10)');
	//ファイル名取得
	$dir = basename($_SERVER['SCRIPT_NAME']);
	foreach ($sql as $row) {
		$id=$row['category_id'];
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td>';
		echo '<a href="product.php?category_name=', $row['category_name'], '">', $row['category_name'], '</a>';
		// echo '<a href="category-add.php?id='.$id.'">', $row['category_name'], '</a>';
		echo '</td>';
		echo '<td>';
		// echo '<a href="category-delete.php?id=', $id, '">削除</a>';
		if($dir == "category-show.php"){
			echo '<a href="category-add.php?id=', $id, '">編集</a>';
		}
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
// } else {
// 	echo 'お気に入りを表示するには、ログインしてください。';
// }
?>
