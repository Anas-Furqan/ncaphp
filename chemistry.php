<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php?message=Please log in to access this page.");
    exit;
}

// Database connection
$host = 'localhost';
$db = 'ncaphp';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch PDFs from the database
$query = $pdo->prepare("SELECT * FROM chemistry");
$query->execute();
$pdfs = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chemistry Notes | Your College Community</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chemistry.css">
</head>
<body>
    <!-- Header (Navbar) -->
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.php" class="logo">CollegeCommunity</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="notes.php">Notes</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>

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

    <main class="physics-container">
        <h1>Chemistry Notes</h1>
        <div class="pdf-grid">
            <?php foreach ($pdfs as $pdf): ?>
                <div class="pdf-item">
                    <embed src="uploads/<?php echo htmlspecialchars($pdf['filename']); ?>" type="application/pdf" class="pdf-preview" />
                    <div class="pdf-details">
                        <h3><?php echo htmlspecialchars($pdf['title']); ?></h3>
                        <div class="pdf-buttons">
                            <a href="uploads/<?php echo htmlspecialchars($pdf['filename']); ?>" target="_blank" class="button view">View PDF</a>
                            <a href="uploads/<?php echo htmlspecialchars($pdf['filename']); ?>" download class="button download">Download PDF</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
