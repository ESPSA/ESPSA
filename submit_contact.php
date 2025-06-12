<?php
require_once 'dp.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf($_POST['csrf_token'] ?? '')) {
    http_response_code(400);
    exit('Invalid request');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$stmt = $mysqli->prepare('INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $name, $email, $message);
$stmt->execute();
$stmt->close();

header('Location: contact.php?success=1');
?>
