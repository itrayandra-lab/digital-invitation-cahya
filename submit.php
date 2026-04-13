<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Nama dan ucapan tidak boleh kosong.']);
    exit;
}

if (strlen($name) > 100 || strlen($message) > 500) {
    echo json_encode(['success' => false, 'message' => 'Input terlalu panjang.']);
    exit;
}

saveWish($name, $message);
echo json_encode(['success' => true, 'message' => 'Ucapan berhasil dikirim!']);
