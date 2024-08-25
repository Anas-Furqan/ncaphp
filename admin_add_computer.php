<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "ncaphp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['file']['name'];
    $target_dir = "uploads/computer/";
    $target_file = $target_dir . basename($file);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO computer_science (title, description, file) VALUES ('$title', '$description', '$file')";
        if ($conn->query($sql) === TRUE) {
            $success = "Note added successfully!";
        } else {
            $error = "Error adding note: " . $conn->error;
        }
    } else {
        $error = "Failed to upload file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Computer Notes</title>
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Physics <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_physics.php">Add Physics Notes</a></li>
                        <li><a href="admin_manage_physics.php">Manage Physics Notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">Chemistry <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_chemistry.php">Add Chemistry Notes</a></li>
                        <li><a href="admin_manage_chemistry.php">Manage Chemistry Notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">Computer Science <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_computer.php">Add Computer Notes</a></li>
                        <li><a href="admin_manage_computer.php">Manage Computer Notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">Maths <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_maths.php">Add Maths Notes</a></li>
                        <li><a href="admin_manage_maths.php">Manage Maths Notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">Pak Studies <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_pakstudies.php">Add Pak Studies Notes</a></li>
                        <li><a href="admin_manage_pakstudies.php">Manage Pak Studies Notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">Urdu <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_urdu.php">Add Urdu Notes</a></li>
                        <li><a href="admin_manage_urdu.php">Manage Urdu Notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">English <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_english.php">Add English Notes</a></li>
                        <li><a href="admin_manage_english.php">Manage English Notes</a></li>
                    </ul>
                </li>
                <li><a href="admin_user_crud.php">Manage Users</a></li>
                <li><a href="admin_feedback_crud.php">Manage Feedbacks</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="admin-main">
            <h1>Add Computer Notes</h1>
            <?php if (isset($success)) { echo '<p class="success">'.$success.'</p>'; } ?>
            <?php if (isset($error)) { echo '<p class="error">'.$error.'</p>'; } ?>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>

                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="5" required></textarea>

                <label for="file">Upload PDF:</label>
                <input type="file" name="file" id="file" required>

                <button type="submit" name="submit">Add Note</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function(e) {
                e.preventDefault();
                $(this).next('.dropdown').slideToggle();
            });
        });
    </script>
</body>
</html>
