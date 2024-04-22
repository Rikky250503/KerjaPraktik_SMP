<?php

// Set header untuk menanggapi JSON
header('Content-Type: application/json');

// Memuat file route.php
require_once __DIR__ . '/route.php';

// Mengambil metode HTTP dan path dari permintaan
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Menghapus query string dari path jika ada
$path = explode('?', $path)[0];

// Routing sederhana untuk REST API
if ($method === 'GET' && $path === '/api/*') {
    // Panggil fungsi atau aturan dari file route.php
    return response() -> json([
        "message" => "Home Page - Dashboard"
    ],200);

} elseif ($method === 'POST' && $path === '/api/*') {
    // Panggil fungsi atau aturan dari file route.php
} else {
    // Menangani rute yang tidak ditemukan
    http_response_code(404);
    echo json_encode(['error' => 'Halaman tidak ditemukan']);
}
