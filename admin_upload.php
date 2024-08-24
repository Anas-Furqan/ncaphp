<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $fileTmpPath = $_FILES['pdf_file']['tmp_name'];
    $fileName = $_FILES['pdf_file']['name'];
    $fileType = $_FILES['pdf_file']['type'];

    // Database connection
    $host = 'localhost';
    $db = 'ncaphp';
    $user = 'root';
    $pass = '';

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($fileType === 'application/pdf') {
        $uploadFileDir = './uploads/';
        $destPath = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $title = $_POST['pdf_title'];
            $query = $pdo->prepare("INSERT INTO $subject (title, filename) VALUES (:title, :filename)");
            $query->bindParam(':title', $title);
            $query->bindParam(':filename', $fileName);
            if ($query->execute()) {
                $success = 'File uploaded successfully.';
            } else {
                $error = 'Database error.';
            }
        } else {
            $error = 'File upload error.';
        }
    } else {
        $error = 'Only PDF files are allowed.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload Notes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin_upload.css">
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

    <main class="admin-upload-container">
        <h1>Welcome to Your College Community Admin Panel</h1>
        <p>Manage and upload notes for various subjects easily using the sidebar below.</p>

        <div class="admin-sidebar">
            <h2>Upload Notes</h2>
            <ul>
                <li><a href="admin_upload.php?subject=chemistry">Chemistry</a></li>
                <li><a href="admin_upload.php?subject=computer_science">Computer Science</a></li>
                <li><a href="admin_upload.php?subject=maths">Maths</a></li>
                <li><a href="admin_upload.php?subject=pak_studies">Pak Studies</a></li>
                <li><a href="admin_upload.php?subject=urdu">Urdu</a></li>
                <li><a href="admin_upload.php?subject=english">English</a></li>
            </ul>
        </div>

        <div class="admin-main">
            <?php if (isset($success)): ?>
                <p class="success"><?php echo htmlspecialchars($success); ?></p>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="subject">Subject:</label>
                <select id="subject" name="subject" required>
                    <option value="chemistry">Chemistry</option>
                    <option value="computer_science">Computer Science</option>
                    <option value="maths">Maths</option>
                    <option value="pak_studies">Pak Studies</option>
                    <option value="urdu">Urdu</option>
                    <option value="english">English</option>
                </select>

                <label for="pdf_title">Title:</label>
                <input type="text" id="pdf_title" name="pdf_title" required>

                <label for="pdf_file">Upload PDF:</label>
                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required>

                <button type="submit" class="button upload">Upload PDF</button>
            </form>
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
