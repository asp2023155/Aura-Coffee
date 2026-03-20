<?php
session_start();
require_once 'db_connect.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        $success = "Message sent successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}

include 'header.php';
?>

<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Contact Us</h1>
            <a href="index.php">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="contact.php">Contact</a>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-fluid contact position-relative px-5" style="margin-top: 90px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-primary border-inner text-center text-white p-5 mb-5">
                    <i class="bi bi-envelope-open fs-1 text-white"></i>
                    <h6 class="text-uppercase my-2">Send Us a Message</h6>
                </div>

                <?php if ($success): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="contact.php" method="POST">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control bg-light border-0 px-4" placeholder="Your Name" style="height: 55px;" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="email" class="form-control bg-light border-0 px-4" placeholder="Your Email" style="height: 55px;" required>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="subject" class="form-control bg-light border-0 px-4" placeholder="Subject" style="height: 55px;" required>
                        </div>
                        <div class="col-sm-12">
                            <textarea name="message" class="form-control bg-light border-0 px-4 py-3" rows="4" placeholder="Message" required></textarea>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary border-inner w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include 'footer.php'; ?>

