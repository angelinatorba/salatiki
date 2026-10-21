<?php
include 'conf.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = trim($_POST['user_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    /*проверка на ошибку*/
    if ($user_name === '' || mb_strlen($user_name) < 3) {
        $errors[]= 'Логин должен содержать не меньше трёх символов';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[]= 'Некорректный email';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Пароль должен быть не менее 6 символов';
    }

    /*проверка на занятость логина и email*/
    if (!$errors) {
        $stmt = $conn->prepare('SELECT user_id FROM users WHERE user_name = ? OR email = ? LIMIT 1');
        $stmt->bind_param('ss', $user_name, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = 'Такой логин или email уже занят';
        }
        $stmt->close();
    }

    /*сохранение данных */
    if (!$errors) {
        $stmt = $conn->prepare('INSERT INTO users (user_name, email, password) VALUES (?,?,?)');
        $stmt->bind_param('sss', $user_name, $email, $password);

    if ($stmt->execute()) {
        $success = 'Регистрация успешна! Теперь можно войти.';
    } else {
        if ($conn->errno === 1062) {
            $errors[] = 'Такой логи или email уже занят';
        } else {
            $errors[] = 'Ошибка:' . $stmt->error;
        }
    }
    $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salatnica - Регистрация</title>
</head>
<body>
    <h1 class="title">Регистрация</h1>
    <?php foreach ($errors as $e): ?>
        <p><?= htmlspecialchars($e) ?></p>
    <?php endforeach; ?>

    <?php if ($success): ?>
        <p><?= htmlspecialchars($success) ?></p>
        <p><a href="login.php">Перейти ко входу</a></p>
    <?php else: ?>

    <form method="POST">
        <p>
            <label>Логин:<br>
            <input type="text" name="user_name" required value="<?=htmlspecialchars($_POST['user_name'] ?? '') ?>">
    </label>
    </p>
    <p>
    <label>Email:<br>
    <input type="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    </label>
    </p>
    <label>Пароль:<br>
    <input type="password" name="password" required>
    </label>
    </p>
    <p><button type="submit">Зарегистрироваться</button></p>
    </form>

    <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>

    <?php endif; ?>
</body>
</html>