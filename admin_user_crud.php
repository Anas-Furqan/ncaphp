<?php
// Start session to check if the user is an admin
session_start();

// Check if the user is logged in and is an admin
// if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'anaslaravel@gmail.com') {
//     echo "<script>alert('Access denied. Admins only.'); window.location.href='login.php';</script>";
//     exit();
// }

// Include the database connection file
include 'connection.php';

// Handle user deletion
if (isset($_GET['delete'])) {
    $userId = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $userId);
    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully.'); window.location.href='user_crud.php';</script>";
    } else {
        echo "<script>alert('Failed to delete user.');</script>";
    }
    $stmt->close();
}

// Fetch all users from the database
$query = "SELECT * FROM users";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- Include your main CSS file -->
    <link rel="stylesheet" href="style.css">
    <!-- Include the specific CSS for this page -->
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
        <!-- Main content area -->
        <div class="admin-main">
            <h1>Manage Users</h1>
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <!-- <td><?php echo htmlspecialchars($row['password']); ?></td> -->
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a href="user_crud.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No users found.</p>
            <?php endif; ?>
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
