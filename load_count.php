<?php
require_once 'db.php';

$user_id = $_GET['user_id'];

$stmt = $pdo->prepare("SELECT count FROM users WHERE id = :user_id");
$stmt->execute([':user_id' => $user_id]);
$row = $stmt->fetch();

echo json_encode(['count' => $row['count']]);
