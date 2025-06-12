<?php
require_once 'dp.php';
// fetch about info
$about = $mysqli->query('SELECT * FROM about LIMIT 1')->fetch_assoc();
// fetch team
$team = $mysqli->query('SELECT name, role, image_url FROM heads');
// latest news
$news = $mysqli->query('SELECT title, content, link, image_url FROM news WHERE is_latest = TRUE ORDER BY published_date DESC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPSA - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .hero-section {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/hero1.jpg');
            height: 100vh;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .hero-section h1 { font-size: 3rem; font-family: 'Oswald', sans-serif; font-weight:700; }
        .hero-section p { font-size: 1.5rem; margin-top: 10px; }
        .hero-section a { margin-top:20px; font-size:1.2rem; padding:15px 30px; }
        .features-section { background-color:#f8f9fa; padding:60px 0; }
        .feature-box { padding:30px; text-align:center; transition: all 0.3s ease; }
        .feature-box:hover { transform:scale(1.05); }
        .feature-box i { font-size:3rem; color:#dc3545; margin-bottom:20px; }
        .feature-box h5 { font-family:'Oswald',sans-serif; font-size:1.5rem; margin-bottom:15px; }
        .feature-box p { font-size:1rem; }
        .team-section { padding:60px 0; }
        .news-section { background-color:#343a40; color:#fff; padding:60px 0; }
        .news-card { background-color:#495057; border:none; height:100%; transition:transform 0.3s; }
        .news-card:hover { transform:translateY(-10px); }
        .news-card-body { padding:20px; }
        .news-card-title { font-size:1.5rem; font-family:'Oswald',sans-serif; }
        .news-card p { font-size:1rem; }
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
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="competition.php">Competition</a></li>
                <li class="nav-item"><a class="nav-link" href="events.html">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="podcast.php">Podcast</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="hero-section">
    <div class="container">
        <h1>Empowering Scientists of Tomorrow</h1>
        <p>Innovate. Collaborate. Succeed.</p>
        <a href="join.html" class="btn btn-primary">Join Us</a>
    </div>
</section>
<main class="container my-5">
<section id="features" class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-box shadow">
                    <i class="fas fa-flask"></i>
                    <h5>Research Opportunities</h5>
                    <p>Engage in research projects and explore the scientific discoveries of tomorrow.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box shadow">
                    <i class="fas fa-robot"></i>
                    <h5>Technology Workshops</h5>
                    <p>Participate in hands-on workshops to enhance your technical skills and knowledge.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box shadow">
                    <i class="fas fa-users"></i>
                    <h5>Community Network</h5>
                    <p>Join a vibrant community of like-minded individuals and network with experts.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<h1 class="mb-4 section-title">About ESPSA</h1>
<p><?php echo e($about['description']); ?></p>
<h2 class="mt-4 section-title">Our Mission</h2>
<p><?php echo e($about['mission']); ?></p>
<h2 class="mt-4 section-title">Our Vision</h2>
<p><?php echo e($about['vision']); ?></p>
<h2 class="mt-4 section-title">Academic supervisor</h2>
<div class="row">
    <div class="col-md-4 text-center mb-4">
        <img src="<?php echo e($about['supervisor_image']); ?>" alt="<?php echo e($about['academic_supervisor']); ?>" class="rounded-circle mb-2" style="width:150px; height:150px; object-fit:cover;">
        <h4><?php echo e($about['academic_supervisor']); ?></h4>
        <p>Academic supervisor</p>
    </div>
</div>
<h2 class="mt-4 section-title">Our Team</h2>
<div class="row">
<?php while ($tm = $team->fetch_assoc()): ?>
    <div class="col-md-4 text-center mb-4">
        <img src="<?php echo e($tm['image_url']); ?>" alt="<?php echo e($tm['name']); ?>" class="rounded-circle mb-2" style="width:150px; height:150px; object-fit:cover;">
        <h4><?php echo e($tm['name']); ?></h4>
        <p><?php echo e($tm['role']); ?></p>
    </div>
<?php endwhile; ?>
</div>
<div class="text-center my-5">
    <a href="espsa_board.html" class="btn btn-danger px-4 py-2">Meet Our Team</a>
</div>
<div class="mb-5"></div>
<section id="news" class="news-section">
    <div class="container">
        <h2 class="text-center section-title">Latest News &amp; Updates</h2>
        <div class="row">
<?php while ($n = $news->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="news-card">
                    <img src="<?php echo e($n['image_url']); ?>" class="card-img-top" alt="news image">
                    <div class="news-card-body">
                        <h5 class="news-card-title"><?php echo e($n['title']); ?></h5>
                        <p><?php echo e($n['content']); ?></p>
                        <?php if ($n['link']): ?>
                        <a href="<?php echo e($n['link']); ?>" class="btn btn-light">Learn More</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
<?php endwhile; ?>
        </div>
    </div>
</section>
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
        <div class="text-center mt-3">
            &copy; 2024 ESPSA. All rights reserved.
        </div>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
