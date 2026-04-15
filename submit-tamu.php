<?php
ob_start();
require_once 'config.php';

set_error_handler(function() { return true; });

$response = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response = ['success' => false, 'message' => 'Method not allowed'];
} else {
    $name  = trim($_POST['name']  ?? '');
    $phone = trim($_POST['phone'] ?? '');

    if (empty($name) || empty($phone)) {
        $response = ['success' => false, 'message' => 'Nama dan nomor WhatsApp wajib diisi.'];
    } elseif (strlen($name) > 100 || strlen($phone) > 20) {
        $response = ['success' => false, 'message' => 'Input terlalu panjang.'];
    } elseif (!preg_match('/^[0-9+\-\s]{8,20}$/', $phone)) {
        $response = ['success' => false, 'message' => 'Format nomor WhatsApp tidak valid.'];
    } else {
        saveTamu($name, $phone);
        $response = ['success' => true];
    }
}

ob_end_clean();
header('Content-Type: application/json');
echo json_encode($response);
