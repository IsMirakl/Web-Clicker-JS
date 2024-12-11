<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>

<body>
    <h1>Вход</h1>

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

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user !== false) {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;

                    header("Location: index.html");
                    exit();
                } else {
                    echo "<p style='color: red'>Неверный пароль.</p>";
                }
            } else {
                echo "<p style='color: red'>Пользователь не найден.</p>";
            }
        }
    }
    ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Имя пользователя:</label><br>
        <input type="text" name="username" id="username"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password"><br><br>

        <button type="submit">Войти</button>
    </form>

</body>

</html>