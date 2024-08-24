<?php
// Start the session
session_start();

// Include database connection file
require 'connection.php';

// Initialize variables for error messages
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $usernameErr = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $passwordErr = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $passwordErr = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check for errors before inserting in the database
    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
        // Prepare a select statement to check if username or email already exists
        $sql = "SELECT id FROM users WHERE username = ? OR email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $param_username, $param_email);

            // Set parameters
            $param_username = $username;
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 0) {
                    // Username and email are available
                    $stmt->close();

                    // Insert the new user
                    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("sss", $param_username, $param_email, $param_password);

                        // Set parameters
                        $param_username = $username;
                        $param_email = $email;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

                        if ($stmt->execute()) {
                            // Registration successful
                            header("location: login.php");
                        } else {
                            echo "Something went wrong. Please try again later.";
                        }
                    }
                } else {
                    // Username or email is already taken
                    $emailErr = "This email or username is already registered.";
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="error"><?php echo $usernameErr; ?></span>
            </div>    
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Register">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>
