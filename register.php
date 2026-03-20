<?php
session_start();
require_once 'db_connect.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if username or email already exists
        $check_user = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($check_user);

        if ($result->num_rows > 0) {
            $error = "Username or Email already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                $success = "Registration successful! <a href='login.php'>Login here</a>";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}

include 'header.php';
?>

<div class="login-section">
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="img/logo.webp" class="brand-logo mb-2" alt="Logo">
            <h2>Create Account</h2>
            <p class="text-white-50">Join Aura Coffee today</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-login border-inner">Register Now</button>
        </form>
        <div class="text-center mt-5 signup-link">
            <p class="mb-0 text-white-50">Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

