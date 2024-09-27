<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<?php
include 'connection.php';
$user_count = $conn->query("SELECT COUNT(*) FROM users")->fetch_row()[0];
$feedback_count = $conn->query("SELECT COUNT(*) FROM feedback")->fetch_row()[0];

// Physics Notes Count
$physics_xi_count = $conn->query("SELECT COUNT(*) FROM physics")->fetch_row()[0];
$physics_xii_count = $conn->query("SELECT COUNT(*) FROM physics2")->fetch_row()[0];

// Chemistry Notes Count
$chemistry_xi_count = $conn->query("SELECT COUNT(*) FROM chemistry")->fetch_row()[0];
$chemistry_xii_count = $conn->query("SELECT COUNT(*) FROM chemistry2")->fetch_row()[0];

// Maths Notes Count
$maths_xi_count = $conn->query("SELECT COUNT(*) FROM maths")->fetch_row()[0];
$maths_xii_count = $conn->query("SELECT COUNT(*) FROM maths2")->fetch_row()[0];

// English Notes Count
$english_xi_count = $conn->query("SELECT COUNT(*) FROM english")->fetch_row()[0];
$english_xii_count = $conn->query("SELECT COUNT(*) FROM english2")->fetch_row()[0];

// Urdu Notes Count
$urdu_xi_count = $conn->query("SELECT COUNT(*) FROM urdu")->fetch_row()[0];
$urdu_xii_count = $conn->query("SELECT COUNT(*) FROM urdu2")->fetch_row()[0];

// Computer Notes Count
$computer_xi_count = $conn->query("SELECT COUNT(*) FROM computer_science")->fetch_row()[0];
$computer_xii_count = $conn->query("SELECT COUNT(*) FROM computer_science2")->fetch_row()[0];

// Islamiat Notes Count
$islamiat_xi_count = $conn->query("SELECT COUNT(*) FROM islamiat")->fetch_row()[0];

// Pakistan Studies Notes Count
$pst_xii_count = $conn->query("SELECT COUNT(*) FROM pak_studies2")->fetch_row()[0];

// Close the connection
$conn->close();
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
            <ul>
                <li><a href="admin_dashboard.php">Dashboard NCA</a></li>
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
                    <a href="#" class="dropdown-toggle">Islamiat <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="admin_add_islamiat.php">Add Islamiat Notes XI</a></li>
                        <li><a href="admin_manage_islamiat.php">Manage Islamiat Notes XI</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">Pak Studies <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
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
                <li><a href="admin_contact_crud.php">Manage Contacts</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="admin-main">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Select an option from the sidebar to manage content.</p>

    <div class="card-container">
        <div class="card physics-card">
            <h2><i class="fas fa-user"></i> Total Users</h2>
            <p><?php echo $user_count; ?> Users have been registered</p>
        </div>

        <div class="card physics-card">
            <h2><i class="fas fa-comments"></i> Feedbacks</h2>
            <p><?php echo $feedback_count; ?>  feedbacks</p>
        </div>

        <div class="card physics-card">
            <h2><i class="fas fa-atom"></i> Physics</h2>
            <p>XI : <?php echo $physics_xi_count; ?> Files</p>
            <p>XII : <?php echo $physics_xii_count; ?> Files</p>
        </div>

        <div class="card physics-card">
            <h2><i class="fas fa-atom"></i> Physics</h2>
            <p>XI : <?php echo $physics_xi_count; ?> Files</p>
            <p>XII : <?php echo $physics_xii_count; ?> Files</p>
        </div>

        <!-- Physics Card -->
        <div class="card physics-card">
            <h2><i class="fas fa-atom"></i> Physics</h2>
            <p>XI : <?php echo $physics_xi_count; ?> Files</p>
            <p>XII : <?php echo $physics_xii_count; ?> Files</p>
        </div>

        <!-- Chemistry Card -->
        <div class="card chemistry-card">
            <h2><i class="fas fa-flask"></i> Chemistry</h2>
            <p>XI : <?php echo $chemistry_xi_count; ?> Files</p>
            <p>XII : <?php echo $chemistry_xii_count; ?> Files</p>
        </div>

        <!-- Maths Card -->
        <div class="card maths-card">
            <h2><i class="fas fa-square-root-alt"></i> Maths</h2>
            <p>XI : <?php echo $maths_xi_count; ?> Files</p>
            <p>XII : <?php echo $maths_xii_count; ?> Files</p>
        </div>

        <!-- English Card -->
        <div class="card english-card">
            <h2><i class="fas fa-book"></i> English</h2>
            <p>XI : <?php echo $english_xi_count; ?> Files</p>
            <p>XII : <?php echo $english_xii_count; ?> Files</p>
        </div>

        <!-- Urdu Card -->
        <div class="card urdu-card">
            <h2><i class="fas fa-pen-nib"></i> Urdu</h2>
            <p>XI : <?php echo $urdu_xi_count; ?> Files</p>
            <p>XII : <?php echo $urdu_xii_count; ?> Files</p>
        </div>

        <!-- Computer Card -->
        <div class="card computer-card">
            <h2><i class="fas fa-laptop-code"></i> Computer</h2>
            <p>XI : <?php echo $computer_xi_count; ?> Files</p>
            <p>XII : <?php echo $computer_xii_count; ?> Files</p>
        </div>

        <!-- Islamiat Card -->
        <div class="card islamiat-card">
            <h2><i class="fas fa-quran"></i> Islamiat</h2>
            <p>XI : <?php echo $islamiat_xi_count; ?> Files</p>
            <p>XII : Undefined</p>
        </div>

        <!-- Pakistan Studies Card -->
        <div class="card pst-card">
            <h2><i class="fas fa-flag"></i> Pakistan Studies</h2>
            <p>XI : Undefined</p>
            <p>XII : <?php echo $pst_xii_count; ?> Files</p>
        </div>
    </div>
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
<style>
 /* Container for the cards */
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly; 
    gap: 10px; 
    margin-top: 20px;
}

/* Individual cards */
.card {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    width: 20%; 
    text-align: center;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color: #333;
}

.card h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card h2 i {
    margin-right: 10px;
    font-size: 1.5em;
}

.card p {
    font-size: 1.2em;
    margin: 8px 0;
    color: #555;
}

/* Card hover effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Background images for each subject */
.physics-card {
    background: url('path_to_physics_bg_image.jpg') no-repeat center/cover;
}

.chemistry-card {
    background: url('path_to_chemistry_bg_image.jpg') no-repeat center/cover;
}

.maths-card {
    background: url('path_to_maths_bg_image.jpg') no-repeat center/cover;
}

/* Add a dark overlay for better contrast */
.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3); /* Dark overlay */
    border-radius: 10px;
    z-index: 0;
}

.card h2, .card p {
    position: relative;
    z-index: 1;
    color: #fff;
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
    .card {
        width: 100%; /* Full width for mobile view */
        max-width: 400px;
    }

    .card-container {
        flex-direction: column;
        align-items: center;
    }
}

</style>
</body>

</html>