<?php
// File router utama

// Mendapatkan path dari URL
$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Mapping URL ke halaman
$routes = [
    '/' => '../app/views/home.php',
    '/home' => '../app/views/home.php',
    '/rentals' => '../app/views/rentals.php',
    '/cars' => '../app/views/cars.php',
    '/payments' => '../app/views/payments.php',
    '/login' => '../app/views/login.php',
    '/register' => '../app/views/register.php',
];

// Menentukan file berdasarkan path
if (array_key_exists($requestPath, $routes)) {
    // Gunakan realpath untuk memastikan path absolut
    $filePath = realpath(__DIR__ . '/' . $routes[$requestPath]);
    if ($filePath && file_exists($filePath)) {
        require $filePath;
    } else {
        // Jika file tidak ditemukan
        http_response_code(404);
        require realpath(__DIR__ . '/../app/views/404.php');
    }
} else {
    // Tampilkan halaman 404 jika route tidak ditemukan
    http_response_code(404);
    require realpath(__DIR__ . '/../app/views/404.php');
}
?>
