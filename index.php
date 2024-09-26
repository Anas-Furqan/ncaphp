<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Community Landing Page</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header (Navbar) -->
    <header>
        <nav class="navbar">
            <div class="container">

                <a href="index.php" class="logo"> <img src="./images/logo.png" alt=""> NCA BAHRIA</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Notes <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="notes.php">Notes XI (First Year)</a></li>
                            <li><a href="notes2.php">Notes XII (Second Year)</a></li>
                        </ul>
                    </li> -->
                    <li><a href="notes.php">Notes XI</a></li>
                    <li><a href="notes2.php">Notes XII</a></li>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Empower Your Learning with Community-Driven Resources</h1>
            <p>Find the notes you need, stay updated with the latest news, and be a part of our active college community.</p>
            <div class="cta-buttons">
                <a href="notes.php" class="btn">Explore Notes</a>
                <a href="news.php" class="btn">Read News</a>
            </div>
        </div>
    </section>

    <!-- Notes Section -->
    <section class="notes-section">
        <div class="container">
            <h2>Browse Notes by Subjects</h2>
            <p>Access a wide range of notes across all subjects tailored for your courses. Keep up with your studies with comprehensive resources compiled by fellow students.</p>
            <div class="notes-grid">
                <!-- Sample Subject Notes Cards -->
                <div class="note-card">
                    <a href="subject.php?subject=math">
                        <img src="images/math.jpg" alt="Math">
                        <h3>Math</h3>
                    </a>
                </div>
                <div class="note-card">
                    <a href="subject.php?subject=physics">
                        <img src="images/physics.jpg" alt="Physics">
                        <h3>Physics</h3>
                    </a>
                </div>
                <!-- Repeat for other subjects -->
            </div>
            <a href="notes.php" class="btn">View All Notes</a>
        </div>
    </section>

    <!-- News & Events Section -->
    <section class="news-section">
        <div class="container">
            <h2>Latest News & Upcoming Events</h2>
            <p>Stay informed about the latest happenings and events in our college community.</p>
            <div class="news-grid">
                <!-- Sample News Cards -->
                <div class="news-card">
                    <h3>Annual Sports Day</h3>
                    <p>Date: September 10, 2024</p>
                    <p>Join us for a day of exciting sports events!</p>
                    <a href="news-detail.php?id=1" class="btn">Read More</a>
                </div>
                <div class="news-card">
                    <h3>New Course Material Available</h3>
                    <p>Date: August 20, 2024</p>
                    <p>Check out the latest notes added by your peers.</p>
                    <a href="news-detail.php?id=2" class="btn">Read More</a>
                </div>
                <!-- Repeat for more news -->
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <p>Learn more about our community, our goals, and how we aim to help students succeed.</p>
            <p>Our mission is to provide comprehensive resources and a supportive community for students to thrive academically and socially. Join us in making our college experience memorable and enriching.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Get in Touch</h2>
            <p>Have questions or need support? We’re here to help.</p>
            <form action="contact.php" method="post" class="contact-form">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" placeholder="Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var dropdownToggle = document.querySelector('.dropdown-toggle');
    var dropdownMenu = document.querySelector('.dropdown-menu');
    
    dropdownToggle.addEventListener('click', function(e) {
        e.preventDefault();
        dropdownMenu.classList.toggle('show');
    });

    document.addEventListener('click', function(e) {
        if (!dropdownToggle.contains(e.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});

</script>
</html>