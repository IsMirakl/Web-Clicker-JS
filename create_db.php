<?php
// Путь к файлу базы данных
$dbFile = 'database.db';
$db = new SQLite3($dbFile);

// Проверяем успешность соединения
if (!$db) {
    die("Ошибка открытия базы данных: " . $db->lastErrorMsg());
}

// Создаем таблицу users
$sql = <<<SQL
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    count INTEGER DEFAULT 0
);
SQL;

// Выполняем SQL-запрос
$result = $db->exec($sql);

// Проверяем результат выполнения запроса
if (!$result) {
    die("Ошибка создания таблицы: " . $db->lastErrorMsg());
} else {
    echo "Таблица users успешно создана.";
}

// Закрываем соединение с базой данных
$db->close();
