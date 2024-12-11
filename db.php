<?php
$dsn = 'sqlite:C:\Users\Lenovo\Desktop\Web-Clicker-JS\database.db'; // Укажите полный путь к файлу базы данных

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}
