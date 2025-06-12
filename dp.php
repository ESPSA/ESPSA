<?php
// Database and security helper
$env = parse_ini_file(__DIR__.'/.env');
if (!$env) {
    die('Environment configuration missing.');
}
if (($env['FORCE_HTTPS'] ?? 'false') === 'true') {
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        $httpsUrl = 'https://' . ($env['APP_DOMAIN'] ?? $_SERVER['HTTP_HOST']) . $_SERVER['REQUEST_URI'];
        header('Location: ' . $httpsUrl);
        exit;
    }
}
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
function csrf_token() {
    return $_SESSION['csrf_token'];
}
function verify_csrf($token) {
    return hash_equals($_SESSION['csrf_token'], $token);
}
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$mysqli = new mysqli($env['DB_HOST'], $env['DB_USER'], $env['DB_PASS'], $env['DB_NAME']);
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

function current_user() {
    global $mysqli;
    if (!empty($_SESSION['user_id'])) {
        $stmt = $mysqli->prepare('SELECT id, name, role FROM users WHERE id = ?');
        $stmt->bind_param('i', $_SESSION['user_id']);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    return null;
}

function require_login() {
    if (empty($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

function require_role($roles) {
    $user = current_user();
    if(!$user || !in_array($user['role'], (array)$roles, true)) {
        http_response_code(403);
        exit('Access denied');
    }
}
?>
