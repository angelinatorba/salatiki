<?php
include 'conf.php';

$errors  = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = trim($_POST['user_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = trim($_POST['password'] ?? '');

    if ($user_name === '' || mb_strlen($user_name) < 2) {
        $errors[] = 'Имя должно быть не менее 2 символов';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Некорректный email';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Пароль должен быть не менее 6 символов';
    }

    if (!$errors) {
        $stmt = mysqli_prepare($conn, "SELECT user_id FROM users WHERE user_name = ? OR email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, 'ss', $user_name, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = 'Такое имя или email уже занято';
        }
        mysqli_stmt_close($stmt);
    }

    if (!$errors) {
        $stmt = mysqli_prepare($conn, "INSERT INTO users (user_name, email, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $user_name, $email, $password);

        if (mysqli_stmt_execute($stmt)) {
            $success = 'Регистрация успешна! Теперь можно войти.';
        } else {
            if (mysqli_errno($conn) === 1062) {
                $errors[] = 'Такое имя или email уже занято';
            } else {
                $errors[] = 'Ошибка: ' . mysqli_error($conn);
            }
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalog.css">
    <title>Salatnica - Регистрация</title>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <section class="catalog-hero">
        <div class="container">
            <h1 class="section-title">Регистрация</h1>
            <p class="section-subtitle">Создайте аккаунт</p>

            <?php foreach ($errors as $e): ?>
                <p style="color: red; text-align: center; margin-bottom: 10px;"><?= htmlspecialchars($e) ?></p>
            <?php endforeach; ?>

            <?php if ($success): ?>
                <p style="color: #5FB848; text-align: center;"><?= htmlspecialchars($success) ?></p>
                <p style="text-align: center; margin-top: 10px;">
                    <a href="login.php" class="add-to-cart">Перейти ко входу</a>
                </p>
            <?php else: ?>

            <form method="post" style="max-width: 360px; margin: 0 auto;">
                <p style="margin-bottom: 12px;">
                    <input type="text" name="user_name" placeholder="Имя" required
                           value="<?= htmlspecialchars($_POST['user_name'] ?? '') ?>"
                           style="width: 100%; padding: 12px 20px; border: 1px solid #ddd; border-radius: 20px;">
                </p>
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
                    <button type="submit" class="add-to-cart">Зарегистрироваться</button>
                </p>
            </form>

            <?php endif; ?>

            <p style="text-align: center; margin-top: 15px;">
                Уже есть аккаунт? <a href="login.php" style="color: #5FB848;">Войти</a>
            </p>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>