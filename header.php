<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aura Coffee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-3 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><img src="img/logo.webp" class="brand-logo" alt="Logo">Aura Coffee</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>076 0035091</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>AuraCoffee@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center bg-primary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-person fs-1 text-white me-3"></i>
                    <div class="text-start">
                        <?php if (isset($_SESSION['username'])): ?>
                            <h6 class="text-uppercase mb-1 text-white">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?></h6>
                            <a href="logout.php" class="text-white">Logout</a>
                        <?php else: ?>
                            <h6 class="text-uppercase mb-1 text-white">Account</h6>
                            <a href="login.php" class="text-white">Login / Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><img src="img/logo.webp" class="brand-logo" alt="Logo">Aura Coffee</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="menu.php" class="nav-item nav-link">Menu & Pricing</a>
                <a href="offers.php" class="nav-item nav-link">Special Offers</a>
                <a href="team.php" class="nav-item nav-link">Master Chefs</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <?php if (!isset($_SESSION['username'])): ?>
                    <a href="login.php" class="nav-item nav-link d-lg-none">Login</a>
                <?php else: ?>
                    <a href="logout.php" class="nav-item nav-link d-lg-none">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
