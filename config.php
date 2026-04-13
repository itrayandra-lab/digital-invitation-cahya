<?php
define('WISHES_FILE', __DIR__ . '/wishes.json');

function getWishes() {
    if (!file_exists(WISHES_FILE)) return [];
    $data = file_get_contents(WISHES_FILE);
    return json_decode($data, true) ?? [];
}

function saveWish($name, $message) {
    $wishes = getWishes();
    $wishes[] = [
        'name' => htmlspecialchars(trim($name), ENT_QUOTES, 'UTF-8'),
        'message' => htmlspecialchars(trim($message), ENT_QUOTES, 'UTF-8'),
        'time' => date('d M Y, H:i')
    ];
    file_put_contents(WISHES_FILE, json_encode($wishes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
