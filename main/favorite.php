<section class="favorite">
<?php
	echo '<table>';
	echo '<tr><th>タイトル</th>';
	echo '<th>本文</th><th></th></tr>';
	require 'db-connect.php';
	$sql=$pdo->prepare(
		'select * from favorite, product '.
		'where favorite.customer_id=? and favorite.product_id=product.id');
	$sql->execute([$_SESSION['customer']['id']]);
	foreach ($sql as $row) {
		$id=$row['id'];
		echo '<tr>';
		echo '<td><a href="add-memo.php?id='.$id.'">', $row['name'], 
		'</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?id=', $id, 
			'">削除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
?>
</section>