<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <h2>Admin Panel</h2>
            <ul>
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
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="admin-main">
            <h1>Welcome to the Admin Dashboard</h1>
            <p>Select an option from the sidebar to manage content.</p>
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
