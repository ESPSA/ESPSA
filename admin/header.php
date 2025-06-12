<?php
require_once '../dp.php';
require_login();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo e($title ?? 'Admin'); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="css/admin.css">
</head>
<body>
<nav class="navbar navbar-dark bg-black fixed-top">
 <div class="container-fluid">
  <a class="navbar-brand" href="dashboard.php">ESPSA Admin</a>
  <span class="text-white ms-auto me-3"><?php echo e($user['name']); ?> (<?php echo e($user['role']); ?>)</span>
  <button class="navbar-toggler" type="button" id="menuToggle">
   <span class="navbar-toggler-icon"></span>
  </button>
 </div>
</nav>
<div class="d-flex">
 <div class="sidebar">
  <a href="dashboard.php">Dashboard</a>
  <a href="events.php">Events</a>
  <a href="tasks.php">Tasks</a>
  <a href="logout.php">Logout</a>
 </div>
 <div class="content flex-grow-1">
