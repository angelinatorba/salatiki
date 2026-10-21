<?php
include 'conf.php';

if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT user_id, user_name, email FROM users WHERE user_id = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user   = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalog.css">
    <title>Salatnica - Личный кабинет</title>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <section class="catalog-hero">
        <div class="container">
            <h1 class="section-title">Личный кабинет</h1>
            <p class="section-subtitle">Добро пожаловать, <?= htmlspecialchars($user['user_name']) ?>!</p>
        </div>
    </section>

    <section class="catalog">
        <div class="container">
            <div style="max-width: 500px; margin: 0 auto 60px; background: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                <p style="margin-bottom: 15px;"><b>Имя:</b> <?= htmlspecialchars($user['user_name']) ?></p>
                <p style="margin-bottom: 25px;"><b>Email:</b> <?= htmlspecialchars($user['email']) ?></p>
                <a href="catalog.php" class="add-to-cart">Перейти в каталог</a>
                <a href="logout.php" class="add-to-cart" style="background: #c0392b;">Выйти</a>
                </p>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>