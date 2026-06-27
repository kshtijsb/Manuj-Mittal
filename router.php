<?php
// router.php
$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri, PHP_URL_PATH);
$decoded_path = urldecode($path);

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|ttf|woff|woff2|svg|json|xml|zip|pdf|xlsx)$/i', $decoded_path)) {
    return false;    // serve the requested resource as-is.
}

// If request is exactly / or directory with index.php
if ($decoded_path === '/' || is_dir(__DIR__ . $decoded_path)) {
    $indexPath = __DIR__ . rtrim($decoded_path, '/') . '/index.php';
    if (file_exists($indexPath)) {
        include $indexPath;
        return true;
    }
}

// If exact file exists (like an image with spaces, or something.html)
if (file_exists(__DIR__ . $decoded_path) && !is_dir(__DIR__ . $decoded_path)) {
    return false;
}

// If file.php exists, include it (to simulate clean URLs)
if (file_exists(__DIR__ . $decoded_path . '.php')) {
    include __DIR__ . $decoded_path . '.php';
    return true;
}

// Fallback 404
http_response_code(404);
echo "404 Not Found: " . htmlspecialchars($decoded_path);
