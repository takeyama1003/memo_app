<section class="category">
<?php require 'db-connect.php'; ?>
<?php
	//$customer_idは配列
	$customer_id=[$_SESSION['customer']['id']];
	//echo $customer_id[0];

	$sql=$pdo->query("select * from category where category.customer_id='" .$customer_id[0]."'"." AND category_id not in (10)");//カスタマーID && 未分類

	//ファイル名取得(パス)
	$dir = basename($_SERVER['SCRIPT_NAME']);

	echo '<table>';
	echo '<tr><th>カテゴリー</th>';
	if($dir == "category-show.php"){
		echo '<th></th><th></th>';
	}
	echo '</tr>';
	foreach ($sql as $row) {
		$id=$row['category_id'];
		echo '<tr>';
		echo '<td>';
		echo '<a href="product.php?category_name=', $row['category_name'], '">', $row['category_name'], '</a>';
		echo '</td>';
		if($dir == "category-show.php"){
			echo '<td>';
			echo '<a href="category-add.php?id=', $id, '">編集</a>';
			echo '</td>';
			echo '<td>';
			echo '<a href="category-delete.php?id=', $id, '">削除</a>';
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>
</section>