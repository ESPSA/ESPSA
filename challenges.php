<?php
require_once 'dp.php';
$stmt = $mysqli->prepare('SELECT title, content, image_url FROM challenges');
$stmt->execute();
$challenges = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competition Challenges</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="ESPSA Logo" width="40" height="40" class="d-inline-block align-text-top">
            ESPSA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="competition.php">Competition</a></li>
                <li class="nav-item"><a class="nav-link" href="events.html">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="podcast.php">Podcast</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="mt-5 pt-5">
    <div class="container">
        <?php while ($row = $challenges->fetch_assoc()): ?>
            <section class="content-section py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="<?php echo e($row['image_url']); ?>" class="img-fluid rounded" alt="challenge image">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="text-center mb-4"><?php echo e($row['title']); ?></h2>
                        <p><?php echo e($row['content']); ?></p>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
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
                <a href="https://www.facebook.com/profile.php?id=61555934623623" target="_blank" class="text-white me-3 fs-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://youtube.com/@espsa-scientific-club?si=561Sei2Qg08z_YQ4" target="_blank" class="text-white fs-4">
                    <i class="fab fa-youtube"></i>
                </a>
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
        <div class="text-center mt-3">
            &copy; 2024 ESPSA. All rights reserved.
        </div>
    </div>
</footer>
</body>
</html>
