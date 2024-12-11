<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>

<body>
    <h1>Регистрация</h1>

    <?php
    require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            echo "<p style='color: red'>Введите имя пользователя.</p>";
        } elseif (empty($password)) {
            echo "<p style='color: red'>Введите пароль.</p>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $userExists = $stmt->fetch();

            if ($userExists !== false) {
                echo "<p style='color: red'>Имя пользователя уже занято.</p>";
            } else {
                // Добавляем нового пользователя
                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                $params = [
                    ':username' => $username,
                    ':password' => $hashedPassword
                ];
                if ($stmt->execute($params)) {
                    header("Location: index.html"); // Перенаправление на главную страницу после успешной регистрации
                    exit();
                } else {
                    echo "<p style='color: red'>Произошла ошибка при добавлении пользователя.</p>";
                }
            }
        }
    }
    ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Имя пользователя:</label><br>
        <input type="text" name="username" id="username"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password"><br><br>

        <button type="submit">Зарегистрироваться</button>
    </form>

</body>

</html>