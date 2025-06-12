<?php
require 'dp.php';
$slug = $_GET['committee'] ?? '';
$stmt = $mysqli->prepare('SELECT * FROM committees WHERE slug = ?');
$stmt->bind_param('s', $slug);
$stmt->execute();
$committee = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPSA - Committee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <style>
        body {font-family:'Roboto',sans-serif;background-color:#f8f9fa;padding-top:80px;}
        .committee-header{text-align:center;padding:50px 0 30px 0;}
        .committee-header h1{font-family:'Oswald',sans-serif;color:#333;margin-bottom:10px;}
        .committee-header p{font-size:1.1rem;color:#555;}
        .committee-members{display:flex;justify-content:center;align-items:center;gap:40px;flex-wrap:wrap;margin-bottom:40px;}
        .committee-member{text-align:center;max-width:250px;}
        .committee-member img{width:150px;height:150px;object-fit:cover;border-radius:50%;margin-bottom:15px;border:3px solid #ddd;}
        .committee-member h4{font-family:'Oswald',sans-serif;color:#333;margin-bottom:5px;}
        .committee-member p{color:#555;}
        .committee-description{max-width:800px;margin:0 auto;text-align:center;}
        .navbar{background-color:#000;}
        .navbar-brand img{margin-right:10px;}
        .nav-link{color:#fff!important;}
        .nav-link.active{font-weight:bold;}
        footer{background-color:#000;color:#fff;padding:20px 0;text-align:center;}
        @media(max-width:768px){.committee-members{flex-direction:column;gap:20px;}}
        @media(max-width:576px){.committee-member img{width:120px;height:120px;}}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="ESPSA Logo" width="40" height="40" class="d-inline-block align-text-top">
            ESPSA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="competition.php">Competition</a></li>
                <li class="nav-item"><a class="nav-link" href="events.html">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="podcast.php">Podcast</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="committee-details">
    <?php if($committee): ?>
    <div class="container">
        <div class="committee-header">
            <h1><?php echo e($committee['name']); ?></h1>
            <p><?php echo e($committee['mission']); ?></p>
        </div>
        <div class="committee-members">
            <div class="committee-member">
                <img src="<?php echo e($committee['head_image']); ?>" alt="<?php echo e($committee['head_name']); ?>">
                <h4><?php echo e($committee['head_name']); ?></h4>
                <p><?php echo e($committee['head_title']); ?></p>
            </div>
            <?php if($committee['vice_head_name']): ?>
            <div class="committee-member">
                <img src="<?php echo e($committee['vice_head_image']); ?>" alt="<?php echo e($committee['vice_head_name']); ?>">
                <h4><?php echo e($committee['vice_head_name']); ?></h4>
                <p><?php echo e($committee['vice_head_title']); ?></p>
            </div>
            <?php endif; ?>
        </div>
        <div class="committee-description">
            <h3>About the Committee</h3>
            <p><?php echo e($committee['about']); ?></p>
        </div>
    </div>
    <?php else: ?>
    <div class="container text-center">
        <h2 class="mt-5">Committee Not Found</h2>
        <p>The committee you are looking for does not exist. Please check the URL or go back to the <a href="index.php">Home Page</a>.</p>
    </div>
    <?php endif; ?>
</section>
<footer>
    <div class="container">
        <a href="archive.php" class="text-white">Archive</a>
        <p class="mt-2">&copy; 2024 ESPSA. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
