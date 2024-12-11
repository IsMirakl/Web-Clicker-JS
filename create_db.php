<?php
$dbFile = 'database.db';
$db = new SQLite3($dbFile);

if (!$db) {
    die("Ошибка открытия базы данных: " . $db->lastErrorMsg());
}

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    count INTEGER DEFAULT 0
);
SQL;

$result = $db->exec($sql);

if (!$result) {
    die("Ошибка создания таблицы: " . $db->lastErrorMsg());
} else {
    echo "Таблица users успешно создана.";
}

$db->close();
