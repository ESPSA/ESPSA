<?php
require 'dp.php';
$podcasts = $mysqli->query("SELECT title, description, video_url FROM podcasts ORDER BY publish_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPSA - Podcast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; }
        iframe { border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.3); }
        .description-text { text-align: center; margin-bottom: 30px; font-size: 1.1rem; line-height: 1.6; color: #555; }
        .back-to-top { position: fixed; bottom: 40px; right: 40px; display: none; background-color: #dc3545; color: #fff; padding: 10px 15px; border-radius: 50%; text-align: center; z-index: 1000; transition: opacity .3s ease; }
        .back-to-top.active { display:block; opacity:.7; }
        .back-to-top:hover { opacity:1; text-decoration:none; color:#fff; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
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
                <li class="nav-item"><a class="nav-link active" href="podcast.php">Podcast</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="container my-5 pt-5">
    <h1 class="text-center mb-4">Our Latest Podcast</h1>
    <p class="description-text">
        Welcome, students, to the ESPSA Podcast Series! Join our esteemed professors and industry experts as they share invaluable insights.
    </p>
    <?php while($p = $podcasts->fetch_assoc()): ?>
        <div class="ratio ratio-16x9 mb-4">
            <iframe src="<?php echo e($p['video_url']); ?>" title="<?php echo e($p['title']); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <h5 class="text-center mb-4"><?php echo e($p['title']); ?></h5>
        <p class="text-center mb-5"><?php echo e($p['description']); ?></p>
    <?php endwhile; ?>
    <div class="text-center">
        <button type="button" class="btn btn-secondary" disabled>Wait for the Episodes</button>
    </div>
</main>
<footer class="bg-black text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>About ESPSA</h5>
                <p>ESPSA is a scientific club dedicated to fostering innovation, research, and collaboration among university students.</p>
            </div>
            <div class="col-md-4 mb-4 text-center">
                <h5>Follow Us</h5>
                <a href="https://www.facebook.com/profile.php?id=61555934623623" target="_blank" class="text-white me-3 fs-4"><i class="fab fa-facebook-f"></i></a>
                <a href="https://youtube.com/@espsa-scientific-club?si=561Sei2Qg08z_YQ4" target="_blank" class="text-white fs-4"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Our Location</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d867.2689952005741!2d29.560881086063883!3d30.863399426126538!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1728322047867!5m2!1sen!2seg" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="archive.php" class="text-white">Archive</a>
            </div>
        </div>
        <div class="text-center mt-3">&copy; 2024 ESPSA. All rights reserved.</div>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
