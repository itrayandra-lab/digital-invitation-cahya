<?php
ob_start();
require_once 'config.php';

set_error_handler(function() { return true; });

$response = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response = ['success' => false, 'message' => 'Method not allowed'];
} else {
    $name       = trim($_POST['name']       ?? '');
    $phone      = trim($_POST['phone']      ?? '');
    $attendance = trim($_POST['attendance'] ?? '');
    $guests     = (int)($_POST['guests']    ?? 1);

    if (empty($name) || empty($attendance)) {
        $response = ['success' => false, 'message' => 'Nama dan konfirmasi kehadiran wajib diisi.'];
    } elseif (!in_array($attendance, ['hadir', 'tidak'])) {
        $response = ['success' => false, 'message' => 'Pilihan kehadiran tidak valid.'];
    } elseif (strlen($name) > 100 || strlen($phone) > 20) {
        $response = ['success' => false, 'message' => 'Input terlalu panjang.'];
    } else {
        saveRsvp($name, $phone, $attendance, $guests);
        $response = [
            'success' => true,
            'message' => $attendance === 'hadir'
                ? 'Terima kasih! Kami menantikan kehadiran Anda. 🎉'
                : 'Terima kasih telah memberikan konfirmasi. Semoga kita bisa bertemu di lain kesempatan. 🙏'
        ];
    }
}

ob_end_clean();
header('Content-Type: application/json');
echo json_encode($response);
