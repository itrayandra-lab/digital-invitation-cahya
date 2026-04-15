<?php
define('WISHES_FILE', __DIR__ . '/wishes.json');
define('RSVP_FILE',   __DIR__ . '/rsvp.json');
define('TAMU_FILE',   __DIR__ . '/tamu.json');
define('ADMIN_PASSWORD', 'apotek2026'); // ganti sesuai kebutuhan

function getWishes() {
    if (!file_exists(WISHES_FILE)) return [];
    $data = file_get_contents(WISHES_FILE);
    return json_decode($data, true) ?? [];
}

function saveWish($name, $message) {
    $wishes = getWishes();
    $wishes[] = [
        'name'    => htmlspecialchars(trim($name),    ENT_QUOTES, 'UTF-8'),
        'message' => htmlspecialchars(trim($message), ENT_QUOTES, 'UTF-8'),
        'time'    => date('d M Y, H:i'),
    ];
    file_put_contents(WISHES_FILE, json_encode($wishes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function getRsvp() {
    if (!file_exists(RSVP_FILE)) return [];
    $data = file_get_contents(RSVP_FILE);
    return json_decode($data, true) ?? [];
}

function saveRsvp($name, $phone, $attendance, $guests) {
    $list = getRsvp();
    $list[] = [
        'name'       => htmlspecialchars(trim($name),  ENT_QUOTES, 'UTF-8'),
        'phone'      => htmlspecialchars(trim($phone), ENT_QUOTES, 'UTF-8'),
        'attendance' => $attendance === 'hadir' ? 'hadir' : 'tidak',
        'guests'     => max(1, min(20, (int)$guests)),
        'time'       => date('d M Y, H:i'),
    ];
    file_put_contents(RSVP_FILE, json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function getTamu() {
    if (!file_exists(TAMU_FILE)) return [];
    $data = file_get_contents(TAMU_FILE);
    return json_decode($data, true) ?? [];
}

function saveTamu($name, $phone) {
    $list = getTamu();
    $list[] = [
        'name'  => htmlspecialchars(trim($name),  ENT_QUOTES, 'UTF-8'),
        'phone' => htmlspecialchars(trim($phone), ENT_QUOTES, 'UTF-8'),
        'time'  => date('d M Y, H:i'),
    ];
    file_put_contents(TAMU_FILE, json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
