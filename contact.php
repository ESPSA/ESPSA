<?php require 'dp.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPSA - Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Additional Styles for Contact Form */
        .contact-form {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
        <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.png" alt="ESPSA Logo" width="40" height="40" class="d-inline-block align-text-top">
          ESPSA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="competition.php">Competition</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="events.html">Events</a>
            </li>
                <li class="nav-item">
                        <a class="nav-link" href="podcast.php">Podcast</a>
                </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Contact Us Content -->
    <main class="container my-5 pt-5">
        <h1 class="mb-4">Contact Us</h1>
        <div class="row">
<!-- Contact Form -->
<div class="col-md-6 mb-4">
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Message sent successfully.</div>
    <?php endif; ?>
    <form action="submit_contact.php" method="post" class="contact-form">
        <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>

            <!-- Contact Information -->
            <div class="col-md-6 mb-4">
                <h4><i class="fas fa-map-marker-alt"></i> Our Location</h4>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d867.2689952005741!2d29.560881086063883!3d30.863399426126538!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1728322047867!5m2!1sen!2seg" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h4 class="mt-4"><i class="fas fa-phone"></i> Contact Details</h4>
                <p><i class="fas fa-envelope"></i> espsa.club@ejust.edu.eg</p>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-black text-white py-4">
        <div class="container">
            <div class="row">
                <!-- About ESPSA -->
                <div class="col-md-4 mb-4">
                    <h5>About ESPSA</h5>
                    <p>ESPSA is a scientific club dedicated to fostering innovation, research, and collaboration among university students.</p>
                </div>
                <!-- Social Media Icons -->
                <div class="col-md-4 mb-4 text-center">
                    <h5>Follow Us</h5>
                    <a href="https://www.facebook.com/profile.php?id=61555934623623" target="_blank" class="text-white me-3 fs-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://youtube.com/@espsa-scientific-club?si=561Sei2Qg08z_YQ4" target="_blank" class="text-white fs-4">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <!-- Google Maps Iframe -->
                <div class="col-md-4 mb-4">
                    <h5>Our Location</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d867.2689952005741!2d29.560881086063883!3d30.863399426126538!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1728322047867!5m2!1sen!2seg" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="text-center mt-3">
                &copy; 2024 ESPSA. All rights reserved.
            </div>
        </div>
    </footer>
    <!-- Back to Top Arrow -->
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
