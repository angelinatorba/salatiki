<?php
include 'conf.php';
include 'sortcat.php';
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
if ($sort === 'price_asc') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort === 'price_desc') {
    $sql .= " ORDER BY price DESC";
}

$category_id = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;
if ($category_id > 0) {
    $sql .= " WHERE category_id = ?";
    $params[] = $category_id;
} 

$stmt = $pdo->prepare($sql);
$stmt->execute($params ?? []);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/catalog.css">
<title>Salatnica - Меню</title>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <section class="catalog-hero">
        <div class="container">
            <h1 class="section-title">Меню</h1>
            <p class="section-subtitle">Наши салаты приготовлены из высококачественных и свежих продуктов. У нас каждый найдет себе салат по вкусу.</p>
            <div class="container-poisk">
                <form method="get">
                    <select name="sort">
                        <option value="">По цене</option>
                        <option value="price_asc">По возрастанию цены</option>
                        <option value="price_desc">По убыванию цены</option>
                    </select>
                    <button type="submit">Применить</button>
                </form>
                <form method="get">
                    <select name="category_id">
                        <option value="0">категории</option>
                        <option value="1">салаты</option>
                        <option value="2">напитки</option>
                    </select>
                    <button type="submit">Применить</button>
                </form>
            </div>
        </div>
    </section>

    <section class="catalog">
        <div class="container">
            <div class="catalog-grid">
            <?php $stmt = $pdo->query("SELECT * FROM products");
            $products = $stmt->fetchAll();
             ?>
<?php foreach ($products as $product){ ?>

                <article class="product-card">
                    <div class="product-img">
                        <img src="<?= htmlspecialchars($product["image"]) ?>" alt="<?= htmlspecialchars($product["product_name"]) ?>">
                    </div>
                    <div class="product-body">
                        <h3 class="product-title"><?= htmlspecialchars($product["product_name"]) ?></h3>
                        <p class="product-desc"><?= htmlspecialchars($product["description"]) ?></p>
                        <div class="product-footer">
                            <div class="product-price">
                                <span class="price-current"><?= htmlspecialchars($product["price"]) ?> ₽</span>
                            </div>
                            <a href="#" class="add-to-cart">В корзину</a>
                        </div>
                    </div>
                </article>
            <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>