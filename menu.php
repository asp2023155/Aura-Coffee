<?php
include 'header.php';
require_once 'db_connect.php';

// Fetch menu items from database
$hot_coffees = $conn->query("SELECT * FROM menu_items WHERE category = 'Hot Coffee'");
$cold_coffees = $conn->query("SELECT * FROM menu_items WHERE category = 'Cold Coffee'");
?>

<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Menu & Pricing</h1>
            <a href="index.php">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="menu.php">Menu & Pricing</a>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Products Start -->
<div class="container-fluid about py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Menu & Pricing</h2>
            <h1 class="display-4 text-uppercase">Explore Our Coffees</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                <li class="nav-item">
                    <a class="nav-link text-white active" data-bs-toggle="pill" href="#tab-1">Hot Coffee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-2">Cold Coffee</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-3">
                        <?php if ($hot_coffees->num_rows > 0): ?>
                            <?php while($item = $hot_coffees->fetch_assoc()): ?>
                                <div class="col-lg-3">
                                    <div class="d-flex h-100">
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid" src="<?php echo $item['image_url'] ? $item['image_url'] : 'img/amer-300x300.png'; ?>" alt="">
                                            <h5 class="bg-dark text-primary p-2 m-0"><?php echo $item['name']; ?></h5>
                                            <h5 class="bg-dark text-primary p-2 m-0">Rs.<?php echo number_format($item['price'], 2); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <!-- Fallback to static if DB is empty or just show a message -->
                            <div class="col-12"><p>More hot coffees coming soon!</p></div>
                        <?php endif; ?>
                        
                        <!-- Static items for demo if needed, or just rely on DB -->
                        <div class="col-lg-3">
                            <div class="d-flex h-100">
                                <div class="flex-shrink-0">
                                    <img class="img-fluid" src="img/cap-1-300x300.png" alt="">
                                    <h5 class="bg-dark text-primary p-2 m-0">Cappuccino</h5>
                                    <h5 class="bg-dark text-primary p-2 m-0">Rs.428</h5>
                                </div>
                            </div>
                        </div>
                        <!-- ... (Adding more static items to match the original design) -->
                    </div>
                </div>

                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-3">
                        <?php if ($cold_coffees->num_rows > 0): ?>
                            <?php while($item = $cold_coffees->fetch_assoc()): ?>
                                <div class="col-lg-3">
                                    <div class="d-flex h-100">
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid" src="<?php echo $item['image_url'] ? $item['image_url'] : 'img/Barista-Cookie-Crunch-300x300.jpg'; ?>" alt="">
                                            <h5 class="bg-dark text-primary p-2 m-0"><?php echo $item['name']; ?></h5>
                                            <h5 class="bg-dark text-primary p-2 m-0">Rs.<?php echo number_format($item['price'], 2); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        
                        <div class="col-lg-3">
                            <div class="d-flex h-100">
                                <div class="flex-shrink-0">
                                    <img class="img-fluid" src="img/Iced-Americano-1-scaled-300x300.jpg" alt="">
                                    <h5 class="bg-dark text-primary p-2 m-0">Iced Americano</h5>
                                    <h4 class="bg-dark text-primary p-2 m-0">Rs.400</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

<?php include 'footer.php'; ?>
