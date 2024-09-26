<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php?message=Please log in to access this page.");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes | Your College Community</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="notes2.css">
</head>

<body>
    <!-- Header (Navbar) -->
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.php" class="logo"><img src="./images/logo.png" alt=""> NCA BAHRIA</a>
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
<br><br>
    <main class="notes-container">
        <h1>Second Year (XII) Notes by Field</h1>
        <div class="field-sections">
            <section class="field">
                <div class="field-header">
                    <img src="icons/computer-science.png" alt="Computer Science" class="field-icon">
                    <h2>Computer Science</h2>
                </div>
                <ul class="subject-list">
                <li><i class="fa-solid fa-calculator subject-icon"></i> <a href="maths2.php"> Mathematics</a></li>
                <li><i class="fa-solid fa-computer subject-icon"></i><a href="computer2.php"> Computer</a></li>
                <li><i class="fa-solid fa-atom subject-icon"></i><a href="physics2.php"> Physics</a></li>
                <li><i class="fa-solid fa-flag subject-icon"></i><a href="pakstudies2.php"> Pakistan Studies</a></li>
                <li><i class="fa-solid fa-language  subject-icon"></i> <a href="english2.php"> English</a></li>
                <li><i class="fa-solid fa-language  subject-icon"></i> <a href="urdu2.php"> Urdu</a></li>
                    
            </ul>
            </section>

            <section class="field">
                <div class="field-header">
                    <img src="icons/medical-science.png" alt="Medical Science" class="field-icon">
                    <h2>Medical Science</h2>
                </div>
                <ul class="subject-list">
                <li><i class="fa-solid fa-calculator subject-icon"></i> <a href="maths2.php"> Mathematics</a></li>
                <li><i class="fa-solid fa-flask subject-icon"></i><a href="chemistry2.php"> Chemistry</a></li>
                <li><i class="fa-solid fa-atom subject-icon"></i><a href="physics2.php"> Physics</a></li>
                <li><i class="fa-solid fa-flag subject-icon"></i><a href="pakstudies2.php"> Pakistan Studies</a></li>
                <li><i class="fa-solid fa-language  subject-icon"></i> <a href="english2.php"> English</a></li>
                <li><i class="fa-solid fa-language  subject-icon"></i> <a href="urdu2.php"> Urdu</a></li>
                </ul>
            </section>

            <section class="field">
                <div class="field-header">
                    <img src="icons/pre-engineering.png" alt="Pre-Engineering" class="field-icon">
                    <h2>Pre-Engineering</h2>
                </div>
                <ul class="subject-list">
                <li><i class="fa-solid fa-calculator subject-icon"></i> <a href="maths2.php"> Mathematics</a></li>
                <li><i class="fa-solid fa-flask subject-icon"></i><a href="chemistry2.php"> Chemistry</a></li>
                <li><i class="fa-solid fa-atom subject-icon"></i><a href="physics2.php"> Physics</a></li>
                <li><i class="fa-solid fa-flag subject-icon"></i><a href="pakstudies2.php"> Pakistan Studies</a></li>
                <li><i class="fa-solid fa-language  subject-icon"></i> <a href="english2.php"> English</a></li>
                <li><i class="fa-solid fa-language  subject-icon"></i> <a href="urdu2.php"> Urdu</a></li>
                </ul>
            </section>
        </div>
    </main>
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