<?php
require_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$count = $data['count'];

$stmt = $pdo->prepare("UPDATE users SET count = :count WHERE id = :user_id");
$stmt->execute([
    ':count' => $count,
    ':user_id' => $user_id
]);

echo json_encode(['message' => 'Count updated']);
