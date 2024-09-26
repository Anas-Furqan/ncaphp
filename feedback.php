<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - College Community</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" href="style.css">
    <!-- Link to the specific CSS file for the feedback page -->
    <link rel="stylesheet" href="feedback.css">
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

    <!-- Main content area -->
    <div class="feedback-container">
        <section class="feedback-form">
            <h1>We Value Your Feedback</h1>
            <p>Your feedback helps us improve our community and services. Please let us know your thoughts.</p>
            <form action="submit_feedback.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Feedback</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Submit Feedback</button>
            </form>
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
