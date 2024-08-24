<?php
// Start the session
session_start();

// Include database connection file
require 'connection.php';

// Initialize variables
$username_or_email = $password = "";
$username_or_emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username or email
    if (empty(trim($_POST["username_or_email"]))) {
        $username_or_emailErr = "Please enter your username or email.";
    } else {
        $username_or_email = trim($_POST["username_or_email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $passwordErr = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check for errors before validating credentials
    if (empty($username_or_emailErr) && empty($passwordErr)) {
        // Prepare a select statement
        $sql = "SELECT id, username, email, password FROM users WHERE username = ? OR email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $param_username_or_email, $param_username_or_email);

            // Set parameters
            $param_username_or_email = $username_or_email;

            if ($stmt->execute()) {
                $stmt->store_result();

                // Check if username or email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to the welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $passwordErr = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username or email doesn't exist
                    $username_or_emailErr = "No account found with that username or email.";
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
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username or Email</label>
                <input type="text" name="username_or_email" class="form-control" value="<?php echo $username_or_email; ?>">
                <span class="error"><?php echo $username_or_emailErr; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Register now</a>.</p>
            <p><a href="forgot_password.php">Forgot your password?</a></p>
        </form>
    </div>    
</body>
</html>
