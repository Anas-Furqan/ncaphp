<?php
// Start session to check if the user is logged in
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - College Community</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" href="style.css">
    <!-- Link to the specific CSS file for the about page -->
    <link rel="stylesheet" href="about.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
   <!-- Header (Navbar) -->
   <header>
        <nav class="navbar">
            <div class="container">
                
                <a href="index.php" class="logo"> <img src="./images/logo.png" alt=""> NCA BAHRIA</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="notes.php">Notes</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="feedback.php">Feedback</a></li>

                    <!-- Check if the user is logged in -->
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a href="#">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main content area -->
    <div class="about-container">
        <section class="about-intro">
            <div class="intro-content">
                <h1>About Our Community</h1>
                <p>Welcome to our college community website, where students, faculty, and staff come together to share knowledge, insights, and support. Our mission is to provide a collaborative platform for learning, growth, and community engagement.</p>
            </div>
            <div class="intro-image">
                <img src="images/about-intro.jpg" alt="Community Image">
            </div>
        </section>

        <section class="our-mission">
            <h2>Our Mission</h2>
            <p>To foster an inclusive environment that promotes educational excellence, innovation, and community spirit. We strive to empower students and faculty to achieve their highest potential by providing comprehensive resources and support.</p>
        </section>

        <section class="our-values">
            <h2>Our Values</h2>
            <div class="values-container">
                <div class="value-item">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Innovation</h3>
                    <p>We encourage creativity and out-of-the-box thinking to solve challenges and improve our community.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-users"></i>
                    <h3>Collaboration</h3>
                    <p>Working together is at the heart of everything we do. We believe in the power of teamwork and diverse perspectives.</p>
                </div>
                <div class="value-item">
                    <i class="fas fa-heart"></i>
                    <h3>Integrity</h3>
                    <p>Honesty and transparency guide our actions. We hold ourselves accountable to the highest ethical standards.</p>
                </div>
            </div>
        </section>

        <section class="meet-the-team">
            <h2>Meet the Team</h2>
            <div class="team-container">
                <div class="team-member">
                    <img src="images/team-member1.jpg" alt="Team Member 1">
                    <h3>Jane Doe</h3>
                    <p>Community Manager</p>
                </div>
                <div class="team-member">
                    <img src="images/team-member2.jpg" alt="Team Member 2">
                    <h3>John Smith</h3>
                    <p>Lead Developer</p>
                </div>
                <div class="team-member">
                    <img src="images/team-member3.jpg" alt="Team Member 3">
                    <h3>Emily Johnson</h3>
                    <p>Content Strategist</p>
                </div>
            </div>
        </section>
    </div>

    <footer>
    <div class="footer-container">
        <div class="footer-left">
            <h2>Your College Community</h2>
            <p>&copy; <?php echo date("Y"); ?> Your College. All rights reserved.</p>
        </div>
        <div class="footer-center">
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:info@yourcollege.com">info@yourcollege.com</a></p>
            <p>Phone: <a href="tel:+1234567890">+123-456-7890</a></p>
            <p>Address: 123 College St, City, Country</p>
        </div>
        <div class="footer-right">
            <h3>Follow Us</h3>
            <div class="social-links">
                <a href="https://facebook.com/yourcollege" target="_blank" class="social-icon facebook">Facebook</a>
                <a href="https://twitter.com/yourcollege" target="_blank" class="social-icon twitter">Twitter</a>
                <a href="https://instagram.com/yourcollege" target="_blank" class="social-icon instagram">Instagram</a>
                <a href="https://linkedin.com/company/yourcollege" target="_blank" class="social-icon linkedin">LinkedIn</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <ul class="footer-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="notes.php">Notes</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</footer>
</body>
</html>
