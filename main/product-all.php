<section class="memo-all">
<?php
echo '<table>';
echo '<tr><th>タイトル</th><th>本文</th><th>カテゴリー</th><th></th></tr>';
require 'db-connect.php';

//$customer_idは配列
$customer_id=[$_SESSION['customer']['id']];

//キーワード検索
if (isset($_REQUEST['keyword'])) {
	$sql=$pdo->prepare("select * from memo_category2 where name like ? and memo_category2.customer_id= ?");
	$sql->execute(['%'.$_REQUEST['keyword'].'%', $customer_id[0]]);
}
//カテゴリー検索
else if (isset($_REQUEST['category_name'])) {
	$sql=$pdo->prepare("select * from memo_category2 where category_name like ? and memo_category2.customer_id='".$customer_id[0]."'");
	$sql->execute(['%'.$_REQUEST['category_name'].'%']);

}
else {
	//全表示
	$sql=$pdo->prepare("select * from memo_category2 where memo_category2.customer_id= ?");
	$sql->execute($customer_id);
}
foreach ($sql as $row) {
	$id=$row['id'];
	echo '<tr>';
	// echo '<td>', $id, '</td>';
	echo '<td>';
	echo '<a href="add-memo.php?id=', $id, '">', $row['name'], '</a>';
	// echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
	echo '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '<td>';
	echo '<a href="product.php?category_name=', $row['category_name'], '">', $row['category_name'], '</a>';
	echo '</td>';
	// echo '<td>', $row['category_name'], '</td>';
	echo '<td>';
	echo '<a href="product-delete.php?id=', $id, '">削除</a>';
	echo '</td>';
	echo '</tr>';
}
echo '</table>';
?>
</section>