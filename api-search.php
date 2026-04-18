<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$phone = isset($_GET['phone']) ? trim($_GET['phone']) : '';

$file = __DIR__ . '/rsvp.json';
if (!file_exists($file)) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
    exit;
}

$data = json_decode(file_get_contents($file), true);

if (empty($phone)) {
    $results = $data;
} else {
    $results = array_values(array_filter($data, function($item) use ($phone) {
        return isset($item['phone']) && strpos($item['phone'], $phone) !== false;
    }));
}

echo json_encode([
    'status' => 'success',
    'query'  => $phone,
    'total'  => count($results),
    'data'   => $results
]);
