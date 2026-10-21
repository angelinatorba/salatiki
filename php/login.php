<?php
include 'conf.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $errors[] = 'Заполните все поля';
    }

    if (!$errors) {
        $stmt = mysqli_prepare($conn, "SELECT user_id, user_name, password, role FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user   = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($user && $password === $user['password']) {
            $_SESSION['user_id']   = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['role']      = $user['role'];
            header('Location: account.php');
            exit;
        } else {
            $errors[] = 'Неверный email или пароль';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalog.css">
    <title>Salatnica - Вход</title>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <section class="catalog-hero">
        <div class="container">
            <h1 class="section-title">Вход</h1>
            <p class="section-subtitle">Войдите в личный кабинет</p>

            <?php foreach ($errors as $e): ?>
                <p style="color: red; text-align: center; margin-bottom: 10px;"><?= htmlspecialchars($e) ?></p>
            <?php endforeach; ?>

            <form method="post" style="max-width: 360px; margin: 0 auto;">
                <p style="margin-bottom: 12px;">
                    <input type="email" name="email" placeholder="Email" required
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                           style="width: 100%; padding: 12px 20px; border: 1px solid #ddd; border-radius: 20px;">
                </p>
                <p style="margin-bottom: 12px;">
                    <input type="password" name="password" placeholder="Пароль" required
                           style="width: 100%; padding: 12px 20px; border: 1px solid #ddd; border-radius: 20px;">
                </p>
                <p style="text-align: center;">
                    <button type="submit" class="add-to-cart">Войти</button>
                </p>
            </form>

            <p style="text-align: center; margin-top: 15px;">
                Нет аккаунта? <a href="register.php" style="color: #5FB848;">Зарегистрироваться</a>
            </p>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>