<?php
ob_start();
require_once 'config.php';

set_error_handler(function() { return true; });

$response = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response = ['success' => false, 'message' => 'Method not allowed'];
} else {
    $name    = trim($_POST['name']    ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($message)) {
        $response = ['success' => false, 'message' => 'Nama dan ucapan tidak boleh kosong.'];
    } elseif (strlen($name) > 100 || strlen($message) > 500) {
        $response = ['success' => false, 'message' => 'Input terlalu panjang.'];
    } else {
        saveWish($name, $message);
        $response = ['success' => true, 'message' => 'Ucapan berhasil dikirim!'];
    }
}

ob_end_clean();
header('Content-Type: application/json');
echo json_encode($response);
