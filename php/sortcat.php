<?php
include 'conf.php';

$sql = "SELECT * FROM products";
$params = [];

$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
if ($sort === 'price_asc') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort === 'price_desc') {
    $sql .= " ORDER BY price DESC";
}

$category_id = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;
echo "Выбранная сортировка:[". $sort ."]<br>";
if ($category_id > 0) {
    $sql .= " WHERE category_id = ?";
    $params[] = $category_id;
}
$stmt = $pdo->prepare($sql);
$stmt->execute($params ?? []);
$products = $stmt->fetchAll();
?>