<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base = (strpos($_SERVER['PHP_SELF'], '/php/') !== false) ? '../' : '';
?>
<header class="header">
    <div class="container">
        <div class="header-flex">
            <h2 class="logo">логотип</h2>
            <ul class="header-links">
                <li><a href="<?= $base ?>index.php" class="link">Главная</a></li>
                <li><a href="<?= $base ?>php/catalog.php" class="link">Каталог</a></li>
                <li><a href="#" class="link">Контакты</a></li>
                <li><a href="#" class="link">Отзывы</a></li>
            </ul>
            <ul class="cart">
                <li><img src="<?= $base ?>images/Group.svg" alt="корзина"></li>
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <li><a href="<?= $base ?>php/account.php" class="button"><?= htmlspecialchars($_SESSION['user_name']) ?></a></li>
                <?php else: ?>
                    <li><a href="<?= $base ?>php/login.php" class="button">Войти</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>