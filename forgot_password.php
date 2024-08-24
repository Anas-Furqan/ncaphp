<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'connection.php';
require 'vendor/autoload.php'; // Adjust the path to your autoload file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    if (empty($email)) {
        $error = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $reset_token = bin2hex(random_bytes(16));
                    $token_expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

                    $sql_insert = "UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?";
                    if ($stmt_insert = $conn->prepare($sql_insert)) {
                        $stmt_insert->bind_param("sss", $reset_token, $token_expiry, $email);
                        $stmt_insert->execute();
                        $stmt_insert->close();

                        // Send reset email using PHPMailer
                        $mail = new PHPMailer(true);
                        try {
                            //Server settings
                            $mail->isSMTP();                                     
                            $mail->Host       = 'smtp.gmail.com'; 
                            $mail->SMTPAuth   = true;                               
                            $mail->Username   = 'codewithanas12@gmail.com';                 
                            $mail->Password   = 'feisrgtfgrkjhbkz';                           
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                            $mail->Port       = 587;                                 

                            //Recipients
                            $mail->setFrom('codewithanas12@gmail.com', 'NCA BAHRIA');
                            $mail->addAddress($email);    

                            //Content
                            $mail->isHTML(true);                                  
                            $mail->Subject = 'Password Reset Request';
                            $mail->Body    = 'Click on the following link to reset your password: <a href="http://localhost/nca/reset_password.php?token=' . $reset_token . '">Reset Password</a>';

                            $mail->send();
                            $success = "A password reset link has been sent to your email.";
                        } catch (Exception $e) {
                            $error = "Failed to send email: {$mail->ErrorInfo}";
                        }
                    }
                } else {
                    $error = "No account found with that email.";
                }
            } else {
                $error = "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="./forgetReset.css">
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <p>Please enter your email address to request a password reset.</p>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" value="Send Reset Link">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
