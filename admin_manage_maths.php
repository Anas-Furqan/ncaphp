<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

include 'connection.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM maths WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $success = "Note deleted successfully!";
    } else {
        $error = "Error deleting note: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM maths");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Maths Notes</title>
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
                    <li><a href="admin_add_physics.php">Add Physics Notes XI</a></li>
                    <li><a href="admin_manage_physics.php">Manage Physics Notes XI</a></li>
                    <li><a href="admin_add_physics2.php">Add Physics Notes XII</a></li>
                    <li><a href="admin_manage_physics2.php">Manage Physics Notes XII</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Chemistry <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="admin_add_chemistry.php">Add Chemistry Notes XI</a></li>
                    <li><a href="admin_manage_chemistry.php">Manage Chemistry Notes XI</a></li>
                    <li><a href="admin_add_chemistry2.php">Add Chemistry Notes XII</a></li>
                    <li><a href="admin_manage_chemistry2.php">Manage Chemistry Notes XII</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Computer Science <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="admin_add_computer.php">Add Computer Notes XI</a></li>
                    <li><a href="admin_manage_computer.php">Manage Computer Notes XI</a></li>
                    <li><a href="admin_add_computer2.php">Add Computer Notes XII</a></li>
                    <li><a href="admin_manage_computer2.php">Manage Computer Notes XII</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Maths <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="admin_add_maths.php">Add Maths Notes XI</a></li>
                    <li><a href="admin_manage_maths.php">Manage Maths Notes XI</a></li>
                    <li><a href="admin_add_maths2.php">Add Maths Notes XII</a></li>
                    <li><a href="admin_manage_maths2.php">Manage Maths Notes XII</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Pak Studies <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="admin_add_pakstudies.php">Add Pak Studies Notes XI</a></li>
                    <li><a href="admin_manage_pakstudies.php">Manage Pak Studies Notes XI</a></li>
                    <li><a href="admin_add_pakstudies2.php">Add Pak Studies Notes XII</a></li>
                    <li><a href="admin_manage_pakstudies2.php">Manage Pak Studies Notes XII</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Urdu <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="admin_add_urdu.php">Add Urdu Notes XI</a></li>
                    <li><a href="admin_manage_urdu.php">Manage Urdu Notes XI</a></li>
                    <li><a href="admin_add_urdu2.php">Add Urdu Notes XII</a></li>
                    <li><a href="admin_manage_urdu2.php">Manage Urdu Notes XII</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">English <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="admin_add_english.php">Add English Notes XI</a></li>
                    <li><a href="admin_manage_english.php">Manage English Notes XI</a></li>
                    <li><a href="admin_add_english2.php">Add English Notes XII</a></li>
                    <li><a href="admin_manage_english2.php">Manage English Notes XII</a></li>
                </ul>
            </li>
            <li><a href="admin_user_crud.php">Manage Users</a></li>
            <li><a href="admin_feedback_crud.php">Manage Feedbacks</a></li>
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </div>
        <div class="admin-main">
            <h1>Manage Maths Notes</h1>
            <?php if (isset($success)) { echo '<p class="success">'.$success.'</p>'; } ?>
            <?php if (isset($error)) { echo '<p class="error">'.$error.'</p>'; } ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href="uploads/maths/<?php echo $row['file']; ?>" target="_blank">View PDF</a></td>
                        <td>
                            <a href="edit_physics.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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
