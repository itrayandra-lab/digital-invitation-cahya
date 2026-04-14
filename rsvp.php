<?php
require_once 'config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$name       = trim($_POST['name']       ?? '');
$phone      = trim($_POST['phone']      ?? '');
$attendance = trim($_POST['attendance'] ?? '');
$guests     = (int)($_POST['guests']    ?? 1);

if (empty($name) || empty($attendance)) {
    echo json_encode(['success' => false, 'message' => 'Nama dan konfirmasi kehadiran wajib diisi.']);
    exit;
}

if (!in_array($attendance, ['hadir', 'tidak'])) {
    echo json_encode(['success' => false, 'message' => 'Pilihan kehadiran tidak valid.']);
    exit;
}

if (strlen($name) > 100 || strlen($phone) > 20) {
    echo json_encode(['success' => false, 'message' => 'Input terlalu panjang.']);
    exit;
}

saveRsvp($name, $phone, $attendance, $guests);
$msg = $attendance === 'hadir'
    ? 'Terima kasih! Kami menantikan kehadiran Anda. 🎉'
    : 'Terima kasih telah memberikan konfirmasi. Semoga kita bisa bertemu di lain kesempatan. 🙏';

echo json_encode(['success' => true, 'message' => $msg]);
