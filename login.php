<?php
session_start();
require_once 'db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect Password!";
        }
    } else {
        $error = "User not found with this email!";
    }
}

include 'header.php';
?>

<div class="login-section">
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="img/logo.webp" class="brand-logo mb-2" alt="Logo">
            <h2>Welcome Back</h2>
            <p class="text-white-50">Please enter your details to sign in</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
                </div>
                <a href="#" class="forgot-pwd">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-login border-inner">Login Now</button>
        </form>
        <div class="text-center mt-4">
            <p class="text-white-50 mb-3">Or Login With</p>
            <div class="social-login">
                <a href="#" class="social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn" title="Google"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="text-center mt-5 signup-link">
            <p class="mb-0 text-white-50">Don't have an account? <a href="register.php">Sign Up Free</a></p>
        </div>
        <div class="text-center mt-3">
            <a href="index.php" class="btn-read-more text-white-50"><i class="bi bi-arrow-left me-2"></i>Back to Home</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

